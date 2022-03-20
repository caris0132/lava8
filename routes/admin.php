<?php

use App\Http\Controllers\Backend\Auth\AdminAuthController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;

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

Route::match(['get', 'post'], '/login', [AdminAuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AdminAuthController::class, 'register'])->name('register');
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/', function() {
        return view('backend.dashboard.index');
    })->name('dashboard');

    Route::resources([
        'products' => ProductController::class,
        'product-categories' => ProductCategoryController::class
    ]);
});



