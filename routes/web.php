<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\MasterAdminController;
use App\Http\Controllers\MasterAuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [BeritaController::class, 'berita'])->name('blog.berita');
Route::get('/isi-berita', [BeritaController::class, 'isiBerita'])->name('blog.isi-berita');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('blog.show');
Route::get('/quotes', [QuoteController::class, 'index']);
Route::get('/leaders', [LeaderController::class, 'index']);
Route::get('/departemen', [DepartementController::class, 'index']);
Route::get('/sejarah', [BeritaController::class, 'sejarah']);
Route::get('/departemen/{id}', [DepartementController::class, 'show']);

// ========== MASTER ADMIN ==========
Route::get('/master/login', [MasterAuthController::class, 'showLogin'])->name('master.login');
Route::post('/master/login', [MasterAuthController::class, 'login']);
Route::get('/master/logout', [MasterAuthController::class, 'logout'])->name('master.logout');

Route::get('/master/dashboard', [MasterAdminController::class, 'index'])->name('master.dashboard');
Route::post('/master/admins', [MasterAdminController::class, 'store'])->name('master.admins.store');
Route::put('/master/admins/{id}', [MasterAdminController::class, 'update'])->name('master.admins.update');
Route::delete('/master/admins/{id}', [MasterAdminController::class, 'destroy'])->name('master.admins.destroy');
Route::post('/master/admins/{id}/approve', [MasterAdminController::class, 'approve'])->name('master.admins.approve');
Route::post('/master/admins/{id}/reject', [MasterAdminController::class, 'reject'])->name('master.admins.reject');


// ========== ADMIN ==========
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/register', [AdminAuthController::class, 'showRegister'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// tambah route admin lainnya di sini
