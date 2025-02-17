<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminLoginController;

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function() {

    Route::group(['middleware' => 'admin.guest'], function() {

        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'authenticate'])->name('admin.auth');

    });

    Route::group(['middleware' => 'admin.auth'], function() {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    });

});



