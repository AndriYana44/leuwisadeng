<?php

use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\HalamanController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\PostingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Inv1Controller;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeAdminController::class, 'index']);
    Route::prefix('admin')->group(function() {
        Route::get('/', [HomeAdminController::class, 'index']);

        // posting
        Route::prefix('posting')->group(function() {
            // method get
            Route::get('/', [PostingController::class, 'index']);
            Route::get('/create', [PostingController::class, 'create']);

            // method post
            Route::post('/store', [PostingController::class, 'store']);
            Route::post('/edit/{id}', [PostingController::class, 'edit']);

            // method delete
            Route::delete('/delete/{id}', [PostingController::class, 'destroy']);

            // method patch
            Route::patch('/update/{id}', [PostingController::class, 'update']);
        });

        // halaman
        Route::prefix('halaman')->group(function() {
            // method get
            Route::get('/', [HalamanController::class, 'index']);
            Route::get('/create', [HalamanController::class, 'create']);
            Route::get('/download/{id}', [HalamanController::class, 'getLampiran']);

            // method post
            Route::post('/store', [HalamanController::class, 'store']);
            Route::post('/edit/{id}', [HalamanController::class, 'edit']);

            // method patch
            Route::patch('/update/{id}', [HalamanController::class, 'update']);

            // method delete
            Route::delete('/delete/{id}', [HalamanController::class, 'destroy']);
        });

        // agenda
        Route::prefix('agenda')->group(function() {
            // method get
            Route::get('/', [AgendaController::class, 'index']);
            Route::get('/create', [AgendaController::class, 'create']);
        });
    });
});

Route::post('/editor/upload-konten', [HalamanController::class, 'uploadKonten'])->name('upload');

Route::get('/', [HomeController::class, 'index']);
Route::prefix('inv1')->group(function() {
    Route::get('/penggunaan-it', [Inv1Controller::class, 'penggunaanIT']);
    Route::get('/penggunaan-it/download', [Inv1Controller::class, 'getDocPenggunaanIT']);
});