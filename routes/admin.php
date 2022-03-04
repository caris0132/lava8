<?php

use App\Http\Controllers\Backend\Auth\LoginController;
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

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth:admin')->group(function () {
    Route::get('/', function() {
        return view('backend.dashboard.index');
    })->name('dashboard');

    Route::resources([
        'products' => ProductController::class,
        'product-categories' => ProductCategory::class
    ]);
});



