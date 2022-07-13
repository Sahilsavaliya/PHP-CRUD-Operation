<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ForgotPasswordController;
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

Route::post('/register', [ApiController::class,'register']);
Route::post('/login', [ApiController::class,'login']);
Route::get('/login', [ApiController::class,'login'])->name('login');
Route::middleware('auth:api')->get('/product', [ApiController::class,'product']);
Route::middleware('auth:api')->get('/category', [ApiController::class,'category']);

// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// });
// Route::post('/forgot-password', [ForgotPasswordController::class,'forgot_password'])->middleware('guest')->name('password.email');
// Route::get('/reset-password', function () {
//     return view('auth.reset_password');
// });
Route::post('/password/email', [ForgotPasswordController::class,'forgot'])->name('forgot');
Route::post('/password/reset', [ForgotPasswordController::class,'reset'])->name('reset');

// Route::post('/forgot-password', [ForgotPasswordController::Class,'forgotPassword'])->name('forgotPassword');
// Route::post('/reset-password', [ForgotPasswordController::Class,'reset'])->name('reset');



