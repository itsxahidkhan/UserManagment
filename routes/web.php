<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportController;
use App\Http\Middleware\CheckAdmin;

// Show login form
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login request
Route::post('/login', [AuthController::class, 'login']);

// Show registration form
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Handle registration request
Route::post('/register', [AuthController::class, 'register']);

// Handle logout request
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// User List Route (Protected for Admin users)
Route::get('user-list', [AuthController::class, 'userList'])
    ->middleware('auth')
    ->name('user.list');

// Import Routes
Route::get('import', [ImportController::class, 'showImportForm'])->name('import.form');
Route::post('import', [ImportController::class, 'import'])->name('import');
Route::get('download-sample', [ImportController::class, 'downloadSample'])->name('download.sample');

//Route::get('export/', [ExportController::class, 'export']);
Route::get('/export-users', [ExportController::class, 'export'])->name('export.users');

Route::middleware([CheckAdmin::class])->group(function () {
    // Admin routes here
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});