<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller{
    //
    public function ViewGroup(){

        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }

    public function StudentGroupAdd(){

        return view('backend.setup.group.add_group');
    }

    public function StudentGroupStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

            $data = new StudentGroup();
            $data->name = $request->name;

            $data->save();

            $notification = array(
                'message' => 'group Inserted successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id){

        $data['editData'] = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', $data);
    }

    public function StudentGroupUpdate(Request $request, $id){

        $data = StudentGroup::find($id);
        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Student group Updated successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id){

        $data = StudentGroup::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student group Delete successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
