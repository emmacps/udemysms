<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{
    //
    public function UserView(){
        
       // $allData = User::all();
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd(){

        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){

        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required|min:6',
        ]);

            $data = new User();
            $data->usertype = $request->usertype;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);

            $data->save();

            // $notification = array(
            //     'message' => 'User Inserted successfully',
            //     'alert-type' => 'success',
            // );

            return redirect()->route('user.view')->with($notification);
        
    }

    public function UserEdit($id){

        $data['editData'] = User::find($id);
        return view('backend.user.edit_user', $data);
    }

    public function UserUpdate(Request $request, $id){

            $data = User::find($id);
            $data->usertype = $request->usertype;
            $data->name = $request->name;
            $data->email = $request->email;

            $data->save();

            $notification = array(
                'message' => 'User Updated successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id){

        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Delete successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('user.view')->with($notification);

    }
}
