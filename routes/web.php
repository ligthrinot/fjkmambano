<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FianakavianaController;
use App\Http\Controllers\KristianinaController;
use App\Http\Controllers\GroupeDiakonaController;
use App\Http\Controllers\DiakonaController;
use App\Http\Controllers\BatisaController;
use App\Http\Controllers\FandraisanaController;

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

    Route::resource('fianakaviana', FianakavianaController::class);
    Route::resource('kristianina', KristianinaController::class);
    Route::resource('groupe_diakona', GroupeDiakonaController::class);
    Route::resource('diakona', DiakonaController::class);
    Route::post('diakona/{diakona}/terminer', [DiakonaController::class, 'terminer'])->name('diakona.terminer');
    Route::resource('fandraisana', FandraisanaController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
    Route::resource('batisa', BatisaController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
});

require __DIR__.'/auth.php';