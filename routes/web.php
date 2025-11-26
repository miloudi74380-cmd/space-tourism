<?php

use App\Http\Controllers\Admin\CrewController as AdminCrewController;
use App\Http\Controllers\Admin\PlanetController;
use App\Http\Controllers\Admin\TechnologyController as AdminTechnologyController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TechnologyController;
use Illuminate\Support\Facades\Route;

// Public routes - Space Tourism site
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/destination', [DestinationController::class, 'index'])->name('destination');

Route::get('/crew', [CrewController::class, 'index'])->name('crew');

Route::get('/technology', [TechnologyController::class, 'index'])->name('technology');

// Language switcher
Route::get('/language/{locale}', [LanguageController::class, 'switch'])
    ->name('language.switch');

// Authentication routes
require __DIR__.'/auth.php';

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes - Protected by auth and role:admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('planets', PlanetController::class);
    Route::resource('crew', AdminCrewController::class);
    Route::resource('technologies', AdminTechnologyController::class);
    Route::resource('users', AdminUserController::class);
});
