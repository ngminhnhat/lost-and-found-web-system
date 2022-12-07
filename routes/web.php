<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

/*
|--------------------------------------------------------------------------
| Common Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [HomeController::class, 'index'])->name('trang-chu')->middleware('web');
Route::get('/home', [HomeController::class, 'index'])->name('trang-chu')->middleware('web');

Route::get('/dang-nhap', [UserController::class, 'login'])->name('dang-nhap')->middleware('guest');
Route::post('/dang-nhap', [UserController::class, 'login_process'])->name('xu-li-dang-nhap')->middleware('guest');

Route::get('/dang-xuat', [UserController::class, 'logout'])->name('dang-xuat')->middleware('auth');

Route::get('/quen-mat-khau', [UserController::class, 'forget'])->name('quen-mat-khau')->middleware('guest');
Route::post('/quen-mat-khau', [UserController::class, 'forget_process'])->name('xu-li-quen-mat-khau')->middleware('guest');

Route::get('/dang-ki', [UserController::class, 'create'])->name('dang-ki')->middleware('guest');
Route::post('/dang-ki', [UserController::class, 'store'])->name('xu-li-dang-ki')->middleware('guest');

//

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => '/tai-khoan', 'as' => 'tai-khoan.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index')->middleware('auth');
    Route::get('/chi-tiet/{id}', [UserController::class, 'show'])->name('chi-tiet')->middleware('web');
    Route::get('/cap-nhat/{id}', [UserController::class, 'edit'])->name('cap-nhat')->middleware('auth');
    Route::post('/cap-nhat/{id}', [UserController::class, 'update'])->name('xu-li-cap-nhat')->middleware('auth');
    Route::get('/doi-mat-khau/{id}', [UserController::class, 'edit_password'])->name('doi-mat-khau')->middleware('auth');
    Route::post('/doi-mat-khau/{id}', [UserController::class, 'update_password'])->name('xu-li-doi-mat-khau')->middleware('auth');
});

Route::group(['prefix' => '/bai-dang', 'as' => 'bai-dang.'], function () {
    Route::get('/', [PostController::class, 'index'])->name('index')->middleware('web');
    Route::get('/dang-bai', [PostController::class, 'create'])->name('dang-bai')->middleware('auth');
    Route::post('/dang-bai', [PostController::class, 'store'])->name('xu-li-dang-bai')->middleware('auth');
    Route::get('/chi-tiet/{id}', [PostController::class, 'show'])->name('chi-tiet')->middleware('web');
});

//

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index')->middleware('admin');
    Route::group(['prefix' => '/tai-khoan', 'as' => 'tai-khoan.'], function () {
        //Route::get('/', [AdminController::class, 'index'])->name('index')->middleware('admin');
        Route::get('/dang-bai', [PostController::class, 'create'])->name('dang-bai')->middleware('admin');
        Route::post('/dang-bai', [PostController::class, 'store'])->name('xu-li-dang-bai')->middleware('admin');
        Route::get('/chi-tiet/{id}', [PostController::class, 'show'])->name('chi-tiet')->middleware('admin');
    });
    Route::group(['prefix' => '/bai-dang', 'as' => 'bai-dang.'], function () {
        Route::post('/chap-thuan/{id}', [AdminController::class, 'accept_post'])->name('chap-thuan')->middleware('admin');
        Route::post('/tu-choi/{id}', [AdminController::class, 'decline_post'])->name('tu-choi')->middleware('admin');
        Route::get('/', [PostController::class, 'index'])->name('index')->middleware('admin');
        Route::get('/dang-bai', [PostController::class, 'create'])->name('dang-bai')->middleware('admin');
        Route::post('/dang-bai', [PostController::class, 'store'])->name('xu-li-dang-bai')->middleware('admin');
        Route::get('/chi-tiet/{id}', [PostController::class, 'show'])->name('chi-tiet')->middleware('admin');
    });
});

//