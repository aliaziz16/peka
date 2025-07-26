<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\AdminDepartementController;
use App\Http\Controllers\AdminLeaderController;
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

// Admin CRUD Routes
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/posts', [AdminController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [AdminController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [AdminController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{id}/edit', [AdminController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{id}', [AdminController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{id}', [AdminController::class, 'destroy'])->name('admin.posts.destroy');
    
    // Category Management
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    
    // Departement Management
    Route::get('/admin/departements', [AdminDepartementController::class, 'index'])->name('admin.departements.index');
    Route::get('/admin/departements/create', [AdminDepartementController::class, 'create'])->name('admin.departements.create');
    Route::post('/admin/departements', [AdminDepartementController::class, 'store'])->name('admin.departements.store');
    Route::get('/admin/departements/{id}/edit', [AdminDepartementController::class, 'edit'])->name('admin.departements.edit');
    Route::put('/admin/departements/{id}', [AdminDepartementController::class, 'update'])->name('admin.departements.update');
    Route::delete('/admin/departements/{id}', [AdminDepartementController::class, 'destroy'])->name('admin.departements.destroy');
    
    // Leader Management
    Route::get('/admin/leaders', [AdminLeaderController::class, 'index'])->name('admin.leaders.index');
    Route::get('/admin/leaders/create', [AdminLeaderController::class, 'create'])->name('admin.leaders.create');
    Route::post('/admin/leaders', [AdminLeaderController::class, 'store'])->name('admin.leaders.store');
    Route::get('/admin/leaders/{id}/edit', [AdminLeaderController::class, 'edit'])->name('admin.leaders.edit');
    Route::put('/admin/leaders/{id}', [AdminLeaderController::class, 'update'])->name('admin.leaders.update');
    Route::delete('/admin/leaders/{id}', [AdminLeaderController::class, 'destroy'])->name('admin.leaders.destroy');
});
