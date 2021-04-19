<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SaveProduct;
use App\Http\Controllers\Api\ProductController;

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

Route::post('save-product', SaveProduct::class);
Route::get('get-products', [ProductController::class, 'getProducts']);
