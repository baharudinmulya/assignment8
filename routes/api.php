<?php

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

use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\ProductController;
 
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);


  
Route::middleware('auth:api')->group(function () {
    Route::get('info-user/{id}', [PassportAuthController::class, 'info']);

    Route::get('products', [ProductController::class, 'show']);
    Route::get('product/{id}', [ProductController::class, 'tampil']);
    Route::post('createproduct', [ProductController::class, 'create']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('deleteproduct/{id}', [ProductController::class, 'delete']);
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     Route::get('info-user/{id}', [PassportAuthController::class, 'info']);
// });
