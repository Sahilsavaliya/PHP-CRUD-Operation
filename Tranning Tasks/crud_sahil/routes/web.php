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
Route::get('product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
Route::get('product/restore-all', [ProductController::class, 'restoreAll'])->name('product.restoreAll');
Route::get('product/forcedlt/{id}', [ProductController::class, 'forcedlt'])->name('product.forcedlt');


Route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
Route::get('category/restore-all', [CategoryController::class, 'restoreAll'])->name('category.restoreAll');

Route::resource('/crud', LoginController::class);

Route::resource('/category', CategoryController::class);

Route::resource('/product', ProductController::class);

Route::resource('/', WelcomeController::class);
Route::get('/',[WelcomeController::class,'index']);
Route::get('/filterProduct', [WelcomeController::class, 'filterProduct'])->name('filterProduct');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


