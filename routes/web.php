<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/accounts', [AccountsController::class, 'index'])->name('accounts.index');
    Route::get('/accounts/create', [AccountsController::class, 'create'])->name('accounts.create');
    Route::post('/accounts', [AccountsController::class, 'store'])->name('accounts.store');
    Route::get('/accounts/{login}/edit', [AccountsController::class, 'edit'])->name('accounts.edit');
    Route::put('/accounts/{login}', [AccountsController::class, 'update'])->name('accounts.update');
    Route::delete('/accounts/{login}', [AccountsController::class, 'delete'])->name('accounts.delete');
});

require __DIR__.'/auth.php';
