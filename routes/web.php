<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
<<<<<<< HEAD


    Route::middleware(['auth', 'role:superuser'])->group(function () {
        Route::resource('admins', AdminController::class);
    });
    
=======
    Route::get('/login', [ProfileController::class, 'newusr'])->name('profile.signup');

    Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

    Route::get('auth/apple', [SocialAuthController::class, 'redirectToApple']);
    Route::get('auth/apple/callback', [SocialAuthController::class, 'handleAppleCallback']);
>>>>>>> bc9a493e29375829d0b63193fcf04d18c00228cc

});

require __DIR__.'/auth.php';
