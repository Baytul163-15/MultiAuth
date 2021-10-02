<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\SubSubCategory;
use App\Models\Category;
use App\Models\Subcategory;

class SubSubCategoryController extends Controller
{
    public function SubSubCategoryView(){
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub subcategory.subsubcategory_view',compact('subsubcategory'));
    }

    public function AddSubSubCategory(){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        return view('backend.category.sub subcategory.subsubcategory_add',compact('categories'));
    }

    public function GetSubCategory($category_id){
        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
        ],[
            'category_id.required' => 'Input Category Name is Missing ! Plz Select Category.',
            'subcategory_id.required' => 'Input Sub-Category Name is Missing ! Plz Select Sub-Category.', 
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','_',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ','_',$request->subsubcategory_name_hin),
        ]);

        $notification = array(
            'message' => 'Sub-Subcategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $subcategories = Subcategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub subcategory.subsubcategory_edit', compact('categories','subcategories','subsubcategories')); 
    }

    public function SubSubCategoryUpdate(Request $request){
        $subsubcat_id = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','_',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ','_',$request->subsubcategory_name_hin),
        ]);

        $notification = array(
            'message' => 'Sub-Subcategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-Subcategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
