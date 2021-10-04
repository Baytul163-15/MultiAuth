<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hotdeals = Product::where('hot_deals',1)->orderBy('id','DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();
        $scape_category_6 = Category::skip(6)->first();
        $scape_product_6 = Product::where('status',1)->where('category_id',$scape_category_6->id)->orderBy('id','DESC')->get();
        $scape_category_1 = Category::skip(1)->first();
        $scape_cat_product_1 = Product::where('status',1)->where('category_id',$scape_category_1->id)->orderBy('id','DESC')->get();
        $scape_brand_1 = Brand::skip(1)->first();
        $scape_brand_product_1 = Product::where('status',1)->where('brand_id',$scape_brand_1->id)->orderBy('id','DESC')->get();
        return view('frontend.index', compact('categories','sliders','products','featured',
                    'hotdeals','special_offer','special_deals','scape_category_6','scape_product_6',
                    'scape_category_1','scape_cat_product_1','scape_brand_1','scape_brand_product_1'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
          $file = $request->file('profile_photo_path');
          @unlink(public_path('upload/user_imgs/'.$data->profile_photo_path));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/user_imgs'),$filename);
          $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function UserPasswordChange(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_change_password', compact('user'));
    }

    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }

    public function ProductDetails($id,$slug){
        $products = Product::findOrFail($id);
        $multiimage = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('products','multiimage'));
    }
}
