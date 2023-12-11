<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        if(Auth::user()->role === "orderreceiver"){
            abort(403, 'Unauthorized action.');
        }
        return view("category");
    }
}
