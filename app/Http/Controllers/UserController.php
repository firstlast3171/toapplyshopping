<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editpage($id){
        $data = User::find($id);
        return view("users.edit_user",["item"=>$data]);
    }

    public function edit(EditUserRequest $request,$id){
        $data = $request->all();
      
        $model = User::find($id);
        if($data["role"] === "Open this select menu"){
            $data["role"] = $model->role;
        }
        $model->username = $data["username"];
        $model->email = $data["email"];
        $model->phone = $data["phone"];
        $model->role = $data["role"];
        $save = $model->save();
        if($save){
            return redirect()->route('users')->with("message","Edited New User Successfully");
        }else{
            return redirect('/admin/adduser')->with("error","Something Wrong during editing new user. Try Again!");
        }
    }

    public function add(AddUserRequest $request){
        $data = $request->all();
        if($data["role"] === "Open this select menu"){
            $data["role"] = "poster";
        }
        $model = new User();
        $model->username = $data["username"];
        $model->email = $data["email"];
        $model->phone = $data["phone"];
        $model->password = $data["password"];
        $model->role = $data["role"];
        $save = $model->save();
        if($save){
            return redirect()->route('users')->with("message","Add New User Successfully");
        }else{
            echo "hello";
            return redirect('/admin/adduser')->with("error","Something Wrong during adding new user. Try Again!");
        }
    }
   
    public function delete($id)
    {
    
        $user = User::findOrFail($id);

    
        $user->delete();

        return redirect()->route('users')->with('message', 'User deleted successfully');
    }
}
