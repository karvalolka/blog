<?php

use App\Http\Controllers\Personal\Comment\DeleteCommentIndexController;
use App\Http\Controllers\Personal\Comment\EditCommentIndexController;
use App\Http\Controllers\Personal\Comment\UpdateCommentIndexController;
use App\Http\Controllers\Personal\Liked\DeleteIndexController;
use App\Http\Controllers\Admin\Category\{CategoryController,
    CreateController,
    DeleteController,
    EditController,
    ShowController,
    StoreController,
    UpdateController
};
use App\Http\Controllers\Admin\Main\AdminIndexController;
use App\Http\Controllers\Admin\Post\{CreateController as PostCreateController,
    DeleteController as PostDeleteController,
    EditController as PostEditController,
    PostController,
    ShowController as PostShowController,
    StoreController as PostStoreController,
    UpdateController as PostUpdateController
};
use App\Http\Controllers\Admin\Tag\{CreateController as TagCreateController,
    DeleteController as TagDeleteController,
    EditController as TagEditController,
    ShowController as TagShowController,
    StoreController as TagStoreController,
    TagController,
    UpdateController as TagUpdateController
};
use App\Http\Controllers\Admin\User\{CreateController as UserCreateController,
    DeleteController as UserDeleteController,
    EditController as UserEditController,
    ShowController as UserShowController,
    StoreController as UserStoreController,
    UpdateController as UserUpdateController,
    UserController
};
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Personal\Comment\CommentIndexController;
use App\Http\Controllers\Personal\Liked\LikedIndexController;
use App\Http\Controllers\Personal\Main\PersonalIndexController;
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
Route::get('/', [IndexController::class, '__invoke'])->name('main.index');

Route::prefix('personal')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PersonalIndexController::class, '__invoke'])->name('personal.home');
    Route::prefix('liked')->group(function () {
        Route::get('/', [LikedIndexController::class, '__invoke'])->name('personal.liked.index');
        Route::delete('/{post}', [DeleteIndexController::class, '__invoke'])->name('personal.liked.delete');
    });
    Route::prefix('comment')->group(function () {
        Route::get('/', [CommentIndexController::class, '__invoke'])->name('personal.comment.index');
        Route::get('/{comment}/edit', [EditCommentIndexController::class, '__invoke'])->name('personal.comment.edit');
        Route::patch('/{comment}', [UpdateCommentIndexController::class, '__invoke'])->name('personal.comment.update');
        Route::delete('/{comment}', [DeleteCommentIndexController::class, '__invoke'])->name('personal.comment.delete');
    });
});

Route::prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/', [AdminIndexController::class, '__invoke'])->name('admin.home');

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
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, '__invoke'])->name('admin.user.index');
        Route::get('/create', [UserCreateController::class, '__invoke'])->name('admin.user.create');
        Route::post('/', [UserStoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/{user}', [UserShowController::class, '__invoke'])->name('admin.user.show');
        Route::get('/{user}/edit', [UserEditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('/{user}', [UserUpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('/{user}', [UserDeleteController::class, '__invoke'])->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);
