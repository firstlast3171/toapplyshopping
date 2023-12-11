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
    Route::get('/admin/items', [ItemController::class,"index"])->name("items");
    Route::get('/admin/categories', [CategoryController::class,"index"])->name("categories");

    Route::get('/admin/profile', [ProfileController::class,"index"])->name("profile");
});
Route::middleware(['role:admin'])->group(function () {
    // Routes that only admin can access
    Route::get('/admin/users', [MainController::class,"user"])->name("users");
    Route::get('/admin/adduser', function(){
        return view("add_user");
    })->name('users.add');
    Route::post('/admin/adduser',[UserController::class,"add"]);
    Route::get('/admin/users/{id}', [UserController::class, 'editpage'])->name('users.edit');
    Route::post('/admin/users/{id}',[UserController::class,"edit"]);
    Route::delete('/admin/users/{id}',[UserController::class,"delete"])->name('users.delete');
});

