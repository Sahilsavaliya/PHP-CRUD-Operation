<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/' ,[ProductController::class, 'dashboard']);
Route::resource('/crud', LoginController::class);

Route::resource('/category', CategoryController::class);

Route::resource('/product', ProductController::class);
Route::get('/filterProduct', [ProductController::class, 'filterProduct'])->name('filterProduct');

Route::resource('/', WelcomeController::class);
Route::get('/',[WelcomeController::class,'index']);
Route::get('/filterProduct', [WelcomeController::class, 'filterProduct'])->name('filterProduct');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
