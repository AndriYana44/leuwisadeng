<?php

use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\DesaController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\HalamanController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostingController;
use App\Http\Controllers\Halaman;
use App\Http\Controllers\HomeController;
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

        // kategori
        Route::prefix('kategori')->group(function() {
            // method get
            Route::get('/', [KategoriController::class, 'index']);

            // method posting
            Route::post('/store', [KategoriController::class, 'store']);

            // method patch
            Route::patch('/update/{id}', [KategoriController::class, 'update']);

            // method delete
            Route::delete('/delete/{id}', [KategoriController::class, 'destroy']);
        });

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

            // method post
            Route::post('/store', [AgendaController::class, 'store']);
            Route::post('/edit/{id}', [AgendaController::class, 'edit']);

            // method patch
            Route::patch('/update/{id}', [AgendaController::class, 'update']);

            // method delete
            Route::delete('/delete/{id}', [AgendaController::class, 'destroy']);
        });

        // desa
        Route::prefix('desa')->group(function() {
            // method get
            Route::get('/', [DesaController::class, 'index']);
            Route::get('/create', [DesaController::class, 'create']);

            // method post
            Route::post('/store', [DesaController::class, 'store']);
            Route::post('/edit/{id}', [DesaController::class, 'edit']);

            // method patch
            Route::patch('/update/{id}', [DesaController::class, 'update']);

            // method delete
            Route::delete('/delete/{id}', [DesaController::class, 'destroy']);
        });

        // menu manager
        Route::prefix('menu')->group(function() {
            // method get
            Route::get('/', [MenuController::class, 'index']);
            Route::get('/create', [MenuController::class, 'create']);

            // method post
            Route::post('/create/parent', [MenuController::class, 'storeParent']);
            Route::post('/create/child', [MenuController::class, 'storeChild']);
            Route::post('/create/single', [MenuController::class, 'storeSingle']);

            // method delete
            Route::delete('/delete/{type}/{id}', [MenuController::class, 'destroy']);
        });

        // foto
        Route::prefix('foto')->group(function() {
            Route::get('/', [FotoController::class, 'index']);
            Route::get('/create', [FotoController::class, 'create']);
        });

        // album
        Route::prefix('album')->group(function() {
            Route::get('/', [AlbumController::class, 'index']);
            Route::post('/store', [AlbumController::class, 'store']);
            Route::patch('/update/{id}', [AlbumController::class, 'update']);
            Route::delete('/delete/{id}', [AlbumController::class, 'destroy']);
        });
    });
});

Route::post('/editor/upload-konten', [HalamanController::class, 'uploadKonten'])->name('upload');

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'index']);

// posting
Route::get('/posting/{slug}', [HomeController::class, 'getPosting']);
Route::get('/berita-terkini', [HomeController::class, 'beritaTerkini']);

// posting kategori
Route::get('/posting/kategori/{id}', [HomeController::class, 'beritaKategori']);

// agenda
Route::post('/posting/agenda/{id}', [HomeController::class, 'agenda']);

// desa
Route::get('/desa/{slug}', [HomeController::class, 'getDesa']);

// get page
Route::prefix('landing')->group(function() {
    Route::get('/{type?}/{slug}', [Halaman::class, 'index']);
    Route::get('/{type?}/{slug}/download/{lampiran}', [Halaman::class, 'download']);
});

// api
Route::get('/getKategoriPosting/{kategori}', [HomeController::class, 'getKategoriPosting']);