<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PublicArtikelController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OwnerProfileController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\ReviewController;

// 0. RUTE AUTENTIKASI ADMIN (Login/Logout - di luar middleware auth)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// 1. RUTE PUBLIK
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/ikan-cupang', function() {
    return view('ikan-cupang');
});
Route::get('/tumbuhan', function() {
    return view('tumbuhan');
});
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/kategori/ikan', [KategoriController::class, 'ikan'])->name('kategori.ikan');
Route::get('/kategori/tumbuhan', [KategoriController::class, 'tumbuhan'])->name('kategori.tumbuhan');
Route::get('/artikel', [PublicArtikelController::class, 'index'])->name('artikel.index');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/produk/ikan', [ProductController::class, 'indexIkan'])->name('products.ikan');
Route::get('/produk/tumbuhan', [ProductController::class, 'indexTumbuhan'])->name('products.tumbuhan');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/produk/{slug}/pesan', [ProductController::class, 'order'])->name('products.order');
Route::post('/produk/{slug}/ulasan', [ProductController::class, 'review'])->name('products.review');

// 2. RUTE ADMIN (Perlu Login)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Rute Artikel Admin
    Route::get('/articles', [AdminArticleController::class, 'index']);
    Route::get('/articles/create', [AdminArticleController::class, 'create']);
    Route::post('/articles/import-word', [AdminArticleController::class, 'importWord']);
    Route::post('/articles', [AdminArticleController::class, 'store']);
    Route::get('/articles/{id}/edit', [AdminArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/articles/{id}', [AdminArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/articles/{id}', [AdminArticleController::class, 'destroy'])->name('articles.destroy');

    // Rute Produk Admin
    Route::get('/products', [AdminProductController::class, 'index']);
    Route::get('/products/create', [AdminProductController::class, 'create']);
    Route::post('/products', [AdminProductController::class, 'store']);
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::patch('/products/{id}/stock', [AdminProductController::class, 'updateStock'])->name('products.updateStock');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Rute Profil Pemilik
    Route::get('/owner-profile', [OwnerProfileController::class, 'edit']);
    Route::post('/owner-profile', [OwnerProfileController::class, 'update']);
    Route::delete('/owner-profile', [OwnerProfileController::class, 'destroy']);

    // Rute Ulasan (Balas Ulasan User)
    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::post('/reviews/{id}/reply', [ReviewController::class, 'reply'])->name('admin.reviews.reply');
    Route::get('/reviews/{id}/reply/edit', [ReviewController::class, 'editReply'])->name('admin.reviews.editReply');
    Route::put('/reviews/{id}/reply', [ReviewController::class, 'updateReply'])->name('admin.reviews.updateReply');
    Route::delete('/reviews/{id}/reply', [ReviewController::class, 'deleteReply'])->name('admin.reviews.deleteReply');

    // Rute Admin Kategori
    Route::get('/category-admins', [CategoryAdminController::class, 'index']);
    Route::get('/category-admins/create', [CategoryAdminController::class, 'create']);
    Route::post('/category-admins', [CategoryAdminController::class, 'store']);
    Route::get('/category-admins/{id}/edit', [CategoryAdminController::class, 'edit']);
    Route::put('/category-admins/{id}', [CategoryAdminController::class, 'update']);
    Route::delete('/category-admins/{id}', [CategoryAdminController::class, 'destroy']);
});
