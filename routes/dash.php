<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\productController;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

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

Route::get('/mo', function () {
    return view('welcome');
});


Route::controller(userController::class)->middleware('AuthAdmin')->group(function(){
    Route::get('index','index')->name("dash/index");
    Route::get('add','add')->name("dash/add");
    Route::post('insert','insert')->name("dash/insert");
    Route::post('edit/{id}','edit')->name("dash/edit");
    Route::post('update/{id}','update')->name("dash/update");
    Route::post('delete/{id}','delete')->name("dash/delete");
    Route::get("logout","logout")->name("dash/logout");
});

Route::controller(productController::class,['as'=>'/product'])->middleware('AuthAdmin')->group(function(){
Route::get("product","index")->name("view/product");
Route::get("form","form")->name("form/product");
Route::post("data","data")->name("data/product");
Route::post("edite/{id}","edite")->name("edite/product");
Route::post("update_product/{id}","update")->name("update/product");
Route::post("delete_product/{id}","delete")->name("delete/product");
});

Route::controller(loginController::class)->middleware('guest:admin')->group(function(){
Route::get("login","login")->name("dash/login");
Route::post("adminLogin","data")->name("data/login");
});


    
