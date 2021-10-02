<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        return view('backend.product.product_add', compact('brands','categories','subcategory'));
    }

    public function ProductStore(Request $request){
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'product_name_en' =>$request->product_name_en,
                'product_name_hin' =>$request->product_name_hin,
                'product_slug_en' =>strtolower(str_replace(' ','_',$request->product_name_en)),
                'product_slug_hin' =>str_replace(' ','_',$request->product_name_hin),
                'product_code' =>$request->product_code,
                'product_qty' =>$request->product_qty,
                'product_tags_en' =>$request->product_tags_en,
                'product_tags_hin' =>$request->product_tags_hin,
                'product_size_en' =>$request->product_size_en,
                'product_size_hin' =>$request->product_size_hin,
                'product_color_en' =>$request->product_color_en,
                'product_color_hin' =>$request->product_color_hin,           
                'selling_price' =>$request->selling_price,
                'discount_price' =>$request->discount_price,
                'short_descp_en' =>$request->short_descp_en,
                'short_descp_hin' =>$request->short_descp_hin,
                'long_descp_en' =>$request->long_descp_en,
                'long_descp_hin' =>$request->long_descp_hin, 
                'hot_deals' =>$request->hot_deals,
                'featured' =>$request->featured,
                'special_offer' =>$request->special_offer,
                'special_deals' =>$request->special_deals,
                'product_thambnail' => $save_url,
                'status' => 1,
                'created_at' => Carbon::now(),
            ]);

        //Multi images table insert data
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi_img/'.$make_name);
            $upload_path = 'upload/products/multi_img/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.manage')->with($notification);
    }

    public function ProductManage(){
        $products = Product::latest()->get();
        return view('backend.product.product_manage', compact('products'));
    }

    public function ProductEdit($id){
        $multiimage = MultiImg::where('product_id',$id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('brands','categories','subcategories','subsubcategories','products','multiimage'));
    }

    public function ProductUpdate(Request $request){
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' =>$request->product_name_en,
            'product_name_hin' =>$request->product_name_hin,
            'product_slug_en' =>strtolower(str_replace(' ','_',$request->product_name_en)),
            'product_slug_hin' =>str_replace(' ','_',$request->product_name_hin),
            'product_code' =>$request->product_code,
            'product_qty' =>$request->product_qty,
            'product_tags_en' =>$request->product_tags_en,
            'product_tags_hin' =>$request->product_tags_hin,
            'product_size_en' =>$request->product_size_en,
            'product_size_hin' =>$request->product_size_hin,
            'product_color_en' =>$request->product_color_en,
            'product_color_hin' =>$request->product_color_hin,           
            'selling_price' =>$request->selling_price,
            'discount_price' =>$request->discount_price,
            'short_descp_en' =>$request->short_descp_en,
            'short_descp_hin' =>$request->short_descp_hin,
            'long_descp_en' =>$request->long_descp_en,
            'long_descp_hin' =>$request->long_descp_hin, 
            'hot_deals' =>$request->hot_deals,
            'featured' =>$request->featured,
            'special_offer' =>$request->special_offer,
            'special_deals' =>$request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.manage')->with($notification);
    }

    public function MultiImgUpdate(Request $request){
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $gen_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi_img/'.$gen_name);
            $uploadimg = 'upload/products/multi_img/'.$gen_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadimg,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'MultiImage Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ThamblineUpdate(Request $request){
        $pro_id = $request->id;
        $old_img = $request->old_img;
        unlink($old_img);

        $image = $request->file('product_thambnail');
        $generation_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$generation_name);
        $upload_url = 'upload/products/thambnail/'.$generation_name;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $upload_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Image Thambnail Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function MultiimgDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'MultiImage Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactivated Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Activated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $image) {
            unlink($image->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
