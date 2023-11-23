<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller{
     //
    public function ViewFee(){

        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee.view_fee', $data);
    }

    public function CategoryFeeAdd(){

        return view('backend.setup.fee.add_fee');
    }

    public function CategoryFeeStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

            $data = new FeeCategory();
            $data->name = $request->name;

            $data->save();

            $notification = array(
                'message' => 'fee Inserted successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('fee.category.view')->with($notification);
    }

    public function CategoryFeeEdit($id){

        $data['editData'] = FeeCategory::find($id);
        return view('backend.setup.fee.edit_fee', $data);
    }

    public function CategoryFeeUpdate(Request $request, $id){

        $data = FeeCategory::find($id);
        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Student fee Updated successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function CategoryFeeDelete($id){

        $data = FeeCategory::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student fee Delete successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }
}
