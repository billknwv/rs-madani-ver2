<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\DoctorController as FrontendDoctorController;
use App\Http\Controllers\Frontend\ArticleController as FrontendArticleController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/', [FrontendProfileController::class, 'index'])->name('index');
    Route::get('/tentang-kami', [FrontendProfileController::class, 'index'])->name('about');
    Route::get('/sejarah', [FrontendProfileController::class, 'index'])->name('history');
    Route::get('/visi-misi', [FrontendProfileController::class, 'index'])->name('vision-mission');
    Route::get('/sambutan-direktur', [FrontendProfileController::class, 'index'])->name('director-message');
    Route::get('/struktur-organisasi', [FrontendProfileController::class, 'index'])->name('structure');
    Route::get('/akreditasi', [FrontendProfileController::class, 'index'])->name('accreditation');
});

Route::get('/layanan', [FrontendServiceController::class, 'index'])->name('layanan');
Route::get('/layanan/rawat-jalan/klinik/{clinicSlug}', [FrontendServiceController::class, 'clinicDetail'])->name('layanan.clinic-detail');
Route::get('/layanan/rawat-inap', [FrontendServiceController::class, 'rawatInap'])->name('layanan.rawat-inap');
Route::get('/layanan/rawat-inap/{roomSlug}', [FrontendServiceController::class, 'rawatInapDetail'])->name('layanan.rawat-inap.detail');
Route::get('/layanan/{slug}', [FrontendServiceController::class, 'detail'])->name('layanan.detail');

Route::get('/dokter', [FrontendDoctorController::class, 'index'])->name('dokter');
Route::get('/dokter/{doctor:slug}', [FrontendDoctorController::class, 'show'])->name('dokter.show');

Route::get('/artikel', [FrontendArticleController::class, 'index'])->name('artikel');
Route::get('/artikel/{slug}', [FrontendArticleController::class, 'show'])->name('artikel.show');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('articles', AdminArticleController::class)->except(['show']);
        Route::resource('doctors', AdminDoctorController::class)->except(['show']);
        Route::resource('services', AdminServiceController::class)->except(['show']);

        Route::get('/profiles', [AdminProfileController::class, 'index'])->name('profiles.index');
        Route::post('/profiles', [AdminProfileController::class, 'update'])->name('profiles.update');
    });
});
