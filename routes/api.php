<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'register/',
], function () {
    Route::post('/', [UserController::class, 'register']);
});
Route::group([
    'prefix' => 'login/',
], function () {
    Route::post('/', [UserController::class, 'login']);
});

Route::group([
    'prefix' => 'product-import/',
    'middleware' => 'auth:sanctum',
], function () {
    Route::post('/', [ProductController::class, 'import']);
    
});

Route::group([
    'prefix' => 'products/',
    'middleware' => 'auth:sanctum',
], function () {
    Route::get('/', [ProductController::class, 'show']);
});