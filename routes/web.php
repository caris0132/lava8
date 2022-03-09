<?php

use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThumbController;
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


Route::get('/thumbs/{width}x{height}x{crop}/{src}', [ThumbController::class, 'thumb'])->where('src', '.*.(jpg|png)')->name('thumbs');

Route::resources([
    'products' => ProductController::class
]);
