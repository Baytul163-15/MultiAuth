<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $product_id){
        if(Auth::check()){
            $existance = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if(!$existance){
                Wishlist::insert([
                    'user_id' => Auth::id(), 
                    'product_id' => $product_id, 
                    'created_at' => Carbon::now(),
                ]);
            }else{
                return response()->json(['error' => 'This Product Has Already On Youre Wishliat !']);
            }
            return response()->json(['success' => 'Successfully Added On Youre Wishliat']);
        }else{
            return response()->json(['error' => 'At First Login Your Account !']);
        }
    }

    public function WishlistView(){
        return view('frontend.wishlist.wishlist_view');
    }

    public function GetWishlistProduct(){
        $wishlists = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlists);
    }

    public function WishlistRemoved($id){
        Wishlist::where('user_id', Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Product Deleted Successfully !']);
    }
}
