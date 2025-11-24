<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/destination', function () {
    return view('destination');
});

Route::get('/crew', function () {
    return view('crew');
});

Route::get('/technology', function () {
    return view('technology');
});

// Route pour changer de langue
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');
