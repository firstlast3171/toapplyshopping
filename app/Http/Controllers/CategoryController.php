<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        if(Auth::user()->role === "orderreceiver"){
            abort(403, 'Unauthorized action.');
        }
        $data = Category::all();
        return view("category.category",["items"=>$data]);
    }

    public function create(CategoryRequest $request){
        if(Auth::user()->role === "orderreceiver"){
            abort(403, 'Unauthorized action.');
        }
        $data = $request->all();
        $model = new Category();
        $model->name = $data["name"];
        $model->description = $data["description"];
        $save = $model->save();
        if($save){
            return redirect('/admin/categories')->with("message","Add New Category Successfully");
        }else{
            echo "hello";
            return redirect('/admin/addcategory')->with("error","Something Wrong during adding new user. Try Again!");
        }
    }

    public function delete($id){
        $user = Category::findOrFail($id);

    
        $user->delete();

        return redirect('/admin/categories')->with('message', 'Category deleted successfully');
    }
}
