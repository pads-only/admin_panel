<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//companies routes

Route::get('/companies', [CompaniesController::class, 'index'])->middleware(['auth', 'verified'])->name('companies.index');
Route::post('/companies', [CompaniesController::class, 'store'])->middleware(['auth', 'verified'])->name('companies.store');
Route::patch('/companies/{companies}', [CompaniesController::class, 'update'])->middleware(['auth', 'verified'])->name('companies.update');
Route::get('/companies/create', [CompaniesController::class, 'create'])->middleware(['auth', 'verified'])->name('companies.create');
Route::get('/companies/{companies}', [CompaniesController::class, 'show'])->middleware(['auth', 'verified'])->name('companies.show');
Route::delete('/companies/{companies}', [CompaniesController::class, 'destroy'])->middleware(['auth', 'verified'])->name('companies.destroy');
Route::get('/companies/{companies}/edit', [CompaniesController::class, 'edit'])->middleware(['auth', 'verified'])->name('companies.edit');


// companies routes end

Route::get('/employees', function () {
    return view('employees');
})->middleware(['auth', 'verified'])->name('employees');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
