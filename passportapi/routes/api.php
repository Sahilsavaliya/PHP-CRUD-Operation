<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//login register logout authentication
Route::post('/register', [ApiController::class,'register']);
Route::post('/login', [ApiController::class,'login']);
Route::get('/login', [ApiController::class,'login'])->name('login');
Route::middleware('auth:api')->post('/logout/{id}', [ApiController::class,'logout']);



//forgot password
Route::post('/password/email', [ForgotPasswordController::class,'forgot'])->name('forgot');
Route::post('/password/reset', [ForgotPasswordController::class,'reset'])->name('reset');

//category
Route::middleware('auth:api')->get('/category', [ApiController::class,'category']);
Route::middleware('auth:api')->post('/create_category', [ApiController::class,'create_category']);
Route::middleware('auth:api')->put('/update_category/{id}', [ApiController::class,'update_category']);
Route::middleware('auth:api')->delete('/delete_category/{id}', [ApiController::class,'delete_category']);

//product
Route::middleware('auth:api')->get('/product', [ApiController::class,'product']);
Route::middleware('auth:api')->post('/create_product', [ApiController::class,'create_product']);
Route::middleware('auth:api')->post('/update_product/{id}', [ApiController::class,'update_product']) ;
Route::middleware('auth:api')->delete('/delete_product/{id}', [ApiController::class,'delete_product']);

