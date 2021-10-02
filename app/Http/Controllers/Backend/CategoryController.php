<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categorys = Category::latest()->get();
        return view('backend.category.category_view', compact('categorys'));
    }

    public function AddCategory(){
        return view('backend.category.create_category');
    }

    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_eng' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_eng.required' => 'Input Category Name in English Language', 
            'category_name_hin.required' => 'Input category Name in Hindi Language',  
        ]);

        Category::insert([
            'category_name_eng' => $request->category_name_eng,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_eng' => strtolower(str_replace(' ','_',$request->category_name_eng)),
            'category_slug_hin' => str_replace(' ','_',$request->category_name_hin),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request){
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_eng' => $request->category_name_eng,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_eng' => strtolower(str_replace(' ','_',$request->category_name_eng)),
            'category_slug_hin' => str_replace(' ','_',$request->category_name_hin),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
