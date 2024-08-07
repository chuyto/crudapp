<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', [ProductoController::class, 'index'])->middleware(['auth', 'verified'])->name('productos.index');

// Ruta del dashboard (opcional, solo si aún quieres tener el dashboard disponible)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('productos', ProductoController::class);
});

// Rutas para el CRUD de productos
Route::middleware('auth')->group(function () {
    Route::get('/productos/search', [ProductoController::class, 'search'])->name('productos.search');
    Route::put('productos/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');
    Route::delete('productos/{id}/force-delete', [ProductoController::class, 'forceDelete'])->name('productos.forceDelete');
});

require __DIR__.'/auth.php';

