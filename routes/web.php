<?php

use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('frontend.index');
});


Route::prefix('admin')->name('backend.')->group(function () {
    Route::get('', function () {
        return view('backend.dashboard.index');
    });

    Route::resources([
        'products' => BackendProductController::class,
    ]);
});

Route::resources([
    'products' => ProductController::class
]);
