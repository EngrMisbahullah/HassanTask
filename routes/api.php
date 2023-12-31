<?php


use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



//User Routes
Route::controller(ProductController::class)->group(function(){
    Route::get('products','show');
    Route::post('products','store');
    Route::get('products/{id}','getDataById');
    Route::post('products/{id}','update');
    Route::delete('products/{id}','destroy');
});

