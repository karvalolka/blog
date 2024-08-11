<?php

use App\Http\Controllers\Admin\Main\AdminIndexController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::group(['namespace' => 'Main'], function () {
Route::get('/', [IndexController::class, '__invoke']);
//});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminIndexController::class, '__invoke']);
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, '__invoke']);
    });
});

Auth::routes();
