<?php

use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\PostingController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->group(function() {
    Route::get('/', [HomeAdminController::class, 'index']);

    // posting
    Route::prefix('posting')->group(function() {
        Route::get('/', [PostingController::class, 'index']);
        Route::post('/create', [PostingController::class, 'create']);
    });
});
