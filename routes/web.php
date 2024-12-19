<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CompanyManager;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

Route::view('/', 'welcome');

Route::redirect('/','/dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['load.menu'])->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
});

Route::get('/companies', CompanyManager::class)->name('companies.index');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
