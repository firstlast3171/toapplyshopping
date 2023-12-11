<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(){
        if(Auth::user()->role === "poster"){
            abort(403, 'Unauthorized action.');
        }
        return view("order");
    }
}
