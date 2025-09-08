<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TouristAttractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\FeedbackAdminController;

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search')->middleware('rate.limit.search');
Route::get('/attractions/{attraction}', [HomeController::class, 'show'])->name('attractions.show');
Route::get('/language/{locale}', [HomeController::class, 'changeLanguage'])->name('language.change');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Admin routes with /admin prefix
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () { return redirect()->route('admin.attractions.index'); })->name('dashboard');
    Route::resource('attractions', TouristAttractionController::class);
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('feedback', [FeedbackAdminController::class, 'index'])->name('feedback.index');
    Route::post('feedback/{feedback}/approve', [FeedbackAdminController::class, 'approve'])->name('feedback.approve');
    Route::post('feedback/{feedback}/reject', [FeedbackAdminController::class, 'reject'])->name('feedback.reject');
    Route::delete('feedback/{feedback}', [FeedbackAdminController::class, 'destroy'])->name('feedback.destroy');
});
