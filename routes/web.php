<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Main\AdminIndexController;
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
        Route::get('/', [CategoryController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [CreateController::class, '__invoke'])->name('admin.category.create');
    });
});

Auth::routes();
