<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;


class StudentShiftController extends Controller{
    //
    public function ViewShift(){

        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function StudentshiftAdd(){

        return view('backend.setup.shift.add_shift');
    }

    public function StudentshiftStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

            $data = new StudentShift();
            $data->name = $request->name;

            $data->save();

            $notification = array(
                'message' => 'shift Inserted successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentshiftEdit($id){

        $data['editData'] = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', $data);
    }

    public function StudentshiftUpdate(Request $request, $id){

        $data = StudentShift::find($id);
        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Student shift Updated successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentshiftDelete($id){

        $data = StudentShift::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student shift Delete successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
}
