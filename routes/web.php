<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/store', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');


