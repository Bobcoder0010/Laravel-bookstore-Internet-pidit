<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;


// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\DashboardController;

// Route::middleware(['auth', 'role:superuser'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('admins', AdminController::class);
//     Route::resource('products', ProductController::class);
//     Route::resource('orders', OrderController::class);
//     Route::resource('customers', CustomerController::class);
// });


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profileedit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profileupdate', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profildelete', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Route::middleware(['auth', 'role:superuser'])->group(function () {
    //     Route::resource('admins', AdminController::class);
    // });
    

    Route::get('/login', [ProfileController::class, 'newusr'])->name('profile.signup');

    Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

    Route::get('auth/apple', [SocialAuthController::class, 'redirectToApple']);
    Route::get('auth/apple/callback', [SocialAuthController::class, 'handleAppleCallback']);


});

require __DIR__.'/auth.php';
