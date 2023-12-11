<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        if(Auth::user()->role === "poster"){
            return redirect('/admin/items');
        }
        if(Auth::user()->role === "orderreceiver"){
            return redirect('/admin/orders');
        }
        return view("admin");
    }
    public function user(){
        $data = User::all();
        return view("user",["items"=>$data]);
    }
}
