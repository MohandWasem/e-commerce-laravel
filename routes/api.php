<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\productController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(productController::class)->group(function(){
    Route::get('product','index');
    Route::get('product/create','create');
    Route::get('product/edit/{id}','edit');
    Route::post('product/store','store');
    Route::post('product/update/{id}','update');
    Route::post('product/delete/{id}','delete');
});