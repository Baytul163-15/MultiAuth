<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cupon;
use Carbon\Carbon;

class CuponController extends Controller
{
    public function CuponView(){
        $cupons = Cupon::orderBy('id', 'DESC')->get();
        return view('backend.cupon.view_cupon',compact('cupons'));
    }

    public function CuponAdd(){
        return view('backend.cupon.add_cupon');
    }

    public function CuponStore(Request $request){
        $request->validate([
            'cupon_name' => 'required',
            'cupon_discount' => 'required',
            'cupon_validity' => 'required',
        ]);

        Cupon::insert([
            'cupon_name' => strtoupper($request->cupon_name),
            'cupon_discount' => $request->cupon_discount,
            'cupon_validity' => $request->cupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cupon Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('cupons.view')->with($notification);
    }

    public function CuponEdit($id){
        $cupons = Cupon::findOrFail($id);
        return view('backend.cupon.edit_cupon',compact('cupons'));
    }

    public function CuponUpdate(Request $request, $id){
        Cupon::findOrFail($id)->update([
            'cupon_name' => strtoupper($request->cupon_name),
            'cupon_discount' => $request->cupon_discount,
            'cupon_validity' => $request->cupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cupon Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('cupons.view')->with($notification);
    }

    public function CuponDelete($id){
        Cupon::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Cupon Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
