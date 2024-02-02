<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("/login",[LoginController::class,"index"])->name("login");
Route::post("/login",[LoginController::class,"login"]);
Route::post('/logout', [LoginController::class, 'logout']);
Route::middleware(["auth"])->group(function(){
    Route::get('/', function(){
        return redirect('/admin');
    })->name("home");
    Route::get('/admin', [MainController::class,"index"])->name("admin.home");
    Route::get('/admin/orders', [OrderController::class,"index"])->name("order");

    // item
    Route::get('/admin/items', [ItemController::class,"index"])->name("items");
    Route::get('/admin/additem',[ItemController::class,"add_itemPage"]);
    Route::post('/admin/items',[ItemController::class,'add'])->name("items.add");
    Route::delete('/admin/items/{id}',[ItemController::class,'delete'])->name("items.delete");
    Route::get('/admin/items/edit/{id}',[ItemController::class,"editpage"]);
    Route::put('/admin/items/edit/{id}',[ItemController::class,'edit'])->name('items.edit');
    // item

    // category
    Route::get('/admin/categories', [CategoryController::class,"index"]);
    Route::get('/admin/addcategory', function(){
        return view("category.add_category");
    })->name('category.add');
    Route::post('/admin/addcategory',[CategoryController::class,"create"]);
    Route::delete('/admin/categories/{id}',[CategoryController::class,"delete"])->name('category.delete');
    // category

    Route::get('/admin/profile', [ProfileController::class,"index"])->name("profile");
});
Route::middleware(['role:admin'])->group(function () {
    // Routes that only admin can access
    Route::get('/admin/users', [MainController::class,"user"])->name("users");
    Route::get('/admin/adduser', function(){
        return view("users.add_user");
    })->name('users.add');
    Route::post('/admin/adduser',[UserController::class,"add"]);
    Route::get('/admin/users/{id}', [UserController::class, 'editpage'])->name('users.edit');
    Route::post('/admin/users/{id}',[UserController::class,"edit"]);
    Route::delete('/admin/users/{id}',[UserController::class,"delete"])->name('users.delete');
  
});

