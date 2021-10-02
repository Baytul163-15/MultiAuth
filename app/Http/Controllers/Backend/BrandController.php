<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function AddBrand(){
        return view('backend.brand.create_brand');
    }

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_eng' => 'required',
            'brand_name_hin' => 'required',
            'brand_images' => 'required',
        ],[
            'brand_name_eng.required' => 'Input Brand Name in English Language', 
            'brand_name_hin.required' => 'Input Brand Name in Hindi Language', 
            'brand_images.required' => 'Input Image for brand', 
        ]);

        $image = $request->file('brand_images');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_eng' => $request->brand_name_eng,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_eng' => strtolower(str_replace(' ','_',$request->brand_name_eng)),
            'brand_slug_hin' => str_replace(' ','_',$request->brand_name_hin),
            'brand_images' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.brand')->with($notification);
    }

    public function BrandEdit($id){
        $brands = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brands'));
    }

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image; 

        if($request->file('brand_images')){
            unlink($old_img);
            $image = $request->file('brand_images');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_eng' => $request->brand_name_eng,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_eng' => strtolower(str_replace(' ','_',$request->brand_name_eng)),
                'brand_slug_hin' => str_replace(' ','_',$request->brand_name_hin),
                'brand_images' => $save_url,
            ]);

            $notification = array(
                'message' => 'Brand Update Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_eng' => $request->brand_name_eng,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_eng' => strtolower(str_replace(' ','_',$request->brand_name_eng)),
                'brand_slug_hin' => str_replace(' ','_',$request->brand_name_hin),
            ]);

            $notification = array(
                'message' => 'Brand Update Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_images;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
