<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller{
    //

    public function ViewStudent(){

        $data['allData'] = studentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function StudentClassAdd(){

        return view('backend.setup.student_class.add_class');
    }

    public function StudentClassStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

            $data = new StudentClass();
            $data->name = $request->name;

            $data->save();

            $notification = array(
                'message' => 'Class Inserted successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassEdit($id){

        $data['editData'] = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', $data);
    }

    public function StudentClassUpdate(Request $request, $id){

        $data = StudentClass::find($id);
        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Student Class Updated successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassDelete($id){

        $data = StudentClass::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Studen class Delete successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}
