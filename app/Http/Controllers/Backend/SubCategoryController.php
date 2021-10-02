<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $subcategories = Subcategory::latest()->get();
        return view('backend.category.subcategory.subcategory_view', compact('subcategories'));
    }

    public function AddSubCategory(){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        return view('backend.category.subcategory.add_subcategory',compact('categories'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
        ],[
            'category_id.required' => 'Input Category Name is Missing ! Plz Select Category.',
            'subcategory_name_en.required' => 'Input subcategory Name in English Language', 
            'subcategory_name_hin.required' => 'Input subcategory Name in Hindi Language',  
        ]);

        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','_',$request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ','_',$request->subcategory_name_hin),
        ]);

        $notification = array(
            'message' => 'Sub Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('backend.category.subcategory.subcategory_edit', compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;

        Subcategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','_',$request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ','_',$request->subcategory_name_hin),
        ]);

        $notification = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){
        Subcategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Subcategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
