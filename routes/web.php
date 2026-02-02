<?php

use App\Http\Controllers\JetskiController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [JetskiController::class, 'index'])->name('home');
Route::get('/fleet', [JetskiController::class, 'fleet'])->name('fleet');
Route::get('/fleet/{slug}', [JetskiController::class, 'show'])->name('fleet.detail');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin routes (requires authentication and admin privileges)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [JetskiController::class, 'adminIndex'])->name('dashboard');
    Route::resource('jetskis', JetskiController::class)->except(['index', 'show']);
    Route::get('jetskis', [JetskiController::class, 'adminIndex'])->name('jetskis.index');
});

require __DIR__.'/auth.php';