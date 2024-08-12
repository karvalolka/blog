<?php

use App\Http\Controllers\Admin\Post\{PostController,
    CreateController as PostCreateController,
    DeleteController as PostDeleteController,
    EditController as PostEditController,
    ShowController as PostShowController,
    StoreController as PostStoreController,
    UpdateController as PostUpdateController
};
use App\Http\Controllers\Admin\Category\{CategoryController,
    CreateController,
    DeleteController,
    EditController,
    ShowController,
    StoreController,
    UpdateController
};
use App\Http\Controllers\Admin\Tag\{TagController,
    CreateController as TagCreateController,
    DeleteController as TagDeleteController,
    EditController as TagEditController,
    ShowController as TagShowController,
    StoreController as TagStoreController,
    UpdateController as TagUpdateController
};
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

    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, '__invoke'])->name('admin.post.index');
        Route::get('/create', [PostCreateController::class, '__invoke'])->name('admin.post.create');
        Route::post('/', [PostStoreController::class, '__invoke'])->name('admin.post.store');
        Route::get('/{post}', [PostShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('/{post}/edit', [PostEditController::class, '__invoke'])->name('admin.post.edit');
        Route::patch('/{post}', [PostUpdateController::class, '__invoke'])->name('admin.post.update');
        Route::delete('/{post}', [PostDeleteController::class, '__invoke'])->name('admin.post.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [CreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/', [StoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [ShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [EditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [UpdateController::class, '__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [DeleteController::class, '__invoke'])->name('admin.category.delete');
    });

    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, '__invoke'])->name('admin.tag.index');
        Route::get('/create', [TagCreateController::class, '__invoke'])->name('admin.tag.create');
        Route::post('/', [TagStoreController::class, '__invoke'])->name('admin.tag.store');
        Route::get('/{tag}', [TagShowController::class, '__invoke'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [TagEditController::class, '__invoke'])->name('admin.tag.edit');
        Route::patch('/{tag}', [TagUpdateController::class, '__invoke'])->name('admin.tag.update');
        Route::delete('/{tag}', [TagDeleteController::class, '__invoke'])->name('admin.tag.delete');
    });
});

Auth::routes();
