<?php

use App\Events\Hello;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductController::class);
Route::get('getProductsDetail', [ProductController::class, "getProductsWithOrder"]);

Route::resource('admin', AdminController::class);
Route::resource('basket', BasketController::class);

Route::resource('order', OrderController::class);

Route::get('/broadcast', function(){
    broadcast(new Hello());
});
