<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/user',UserController::class);

Route::resource('/admin',AdminController::class);

Route::get('user_export',[UserController::class, 'get_user_data'])->name('user.export');

Route::get('/user/aprove/{id}',[UserController::class, 'aprove'])->name('user.aprove');

Route::get('/admin/active/{id}',[AdminController::class, 'active'])->name('admin.active');

Route::get('/admin/inactive/{id}',[AdminController::class, 'inactive'])->name('admin.inactive');


Route::get('/show_aprove',[UserController::class, 'show_aprove']); 


