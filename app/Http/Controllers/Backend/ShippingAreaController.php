<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division.view_division',compact('divisions'));
    }

    public function DivisionAdd(){
        return view('backend.ship.division.add_division');
    }

    public function DivisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',
        ]);

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-division')->with($notification);
    }

    public function DivisionEdit($id){
        $divisions = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('divisions'));
    }

    public function DivisionUpdate(Request $request, $id){
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-division')->with($notification);
    }

    public function DivisionDelete($id){
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Delete Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function DistrictView(){  
        $districts = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('backend.ship.district.view_district',compact('districts'));
    }

    public function DistrictAdd(){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        return view('backend.ship.district.add_district', compact('divisions'));
    }

    public function DistrictStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-district')->with($notification);
    }

    public function DistrictEdit($id){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district',compact('district','divisions'));
    }

    public function DistrictUpdate(Request $request, $id){
        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-district')->with($notification);
    }

    public function DistrictDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Delete Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
