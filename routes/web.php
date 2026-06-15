<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ========================================
// Guest Routes (unauthenticated)
// ========================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// ========================================
// Authenticated Routes
// ========================================
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Password Reset (forced on first login)
    Route::get('/password/reset', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

    // Protected routes (require password to be reset)
    Route::middleware('force.password.reset')->group(function () {
        // Root Router (Redirect based on role)
        Route::get('/', function () {
            $role = auth()->user()->role;
            if ($role === 'admin_gudang') {
                return redirect()->route('admin_gudang.dashboard');
            }
            // Fallback for other roles (kasir, owner) for now
            return view('dashboard.DashboardAdmin', ['title' => 'Dashboard']);
        })->name('dashboard');

        // Admin Gudang Routes
        Route::middleware('role:admin_gudang')->prefix('admin-gudang')->name('admin_gudang.')->group(function () {
            
            // Dashboard Admin Gudang
            Route::get('/dashboard', function () {
                return view('dashboard.DashboardAdmin', ['title' => 'Dashboard Admin Gudang']);
            })->name('dashboard');

            // Master Barang
            Route::get('/items', function () {
                return view('adminGudang.masterData.MasterBarang', ['title' => 'Data Master Barang']);
            })->name('items.index');

            Route::get('/items/create', function () {
                return view('adminGudang.masterData.CreateBarang', ['title' => 'Tambah Master Barang']);
            })->name('items.create');
            
        });
    });
});
