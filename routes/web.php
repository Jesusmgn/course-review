<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;

// =============================================
// 🔹 RUTA PÚBLICA: Dashboard visible sin login
// =============================================
Route::get('/', function () {
    return view('dashboard'); // mostrará dashboard.blade.php sin login
})->name('dashboard.public');

// =============================================
// 🔹 RUTAS PROTEGIDAS (solo usuarios autenticados)
// =============================================
Route::middleware(['auth'])->group(function () {

    // Dashboard privado (si quieres mostrar versión personalizada al usuario logueado)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Cursos y reseñas protegidos
    Route::resource('courses', CourseController::class);
    Route::post('courses/{course}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // Perfil del usuario (opcional, si Breeze lo generó)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =============================================
// 🔹 RUTAS DE AUTENTICACIÓN DE BREEZE
// =============================================
require __DIR__.'/auth.php';
