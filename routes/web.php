<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\webController;
use App\Http\Controllers\web\ajaxController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\web\webLoginController;
use App\Http\Controllers\web\webRegisterController;
use App\Http\Controllers\web\web_registerController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(webController::class)->prefix('webs')->group(function(){
  Route::get("index","index")->name("webs/index");
  Route::get("cart","cart")->name("webs/cart");
  Route::post("delete_cart","delete_cart")->name("webs/delete_cart");
});

Route::controller(ajaxController::class)->prefix('webs')->group(function(){
  Route::post("data_ajax","data_ajax")->name("webs/data_ajax");
  Route::post("search_ajax","search_ajax")->name("webs/search_ajax");
});

Route::controller(webLoginController::class)->prefix('webs')->group(function(){
  Route::get('login','login')->name('webs/login');
  Route::post('data/login','data')->name('datas/login');
  Route::get('logout','logout')->name('webs/logout');
  
});

Route::controller(webRegisterController::class)->prefix('webs')->group(function(){
Route::get('register','web_register')->name('webs/register');
Route::post('data_register','regi')->name('webs/data_register');
Route::get('view_cart','view_cart')->name('webs/view_cart');
});