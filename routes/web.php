<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\UserManagment\UserController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [DashbordController::class, 'dashbord'])->name('admin.index');
    Route::resource('/category', CategoryController::class, ['as' => 'admin']);
    Route::resource('/article', ArticleController::class, ['as' => 'admin']);
    Route::group(['prefix' => 'user_managment'], function () {
        Route::resource('/user', UserController::class, ['as' => 'admin.user_managment']);
    });
});

Route::get('/', function () {
    return view('blog.home');
});
Route::get('/categories', [BlogController::class, 'categoryIndex'])->name('categories');
Route::get('/blog/category/{slug?}', [BlogController::class, 'category'])->name('category');
Route::get('/blog/article/{slug?}', [BlogController::class, 'article'])->name('article');
