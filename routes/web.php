<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PqrsController;

/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
*/

Route::get('/', [PaginaController::class, 'inicio'])->name('inicio');

/*
|--------------------------------------------------------------------------
| Páginas públicas (cualquiera puede entrar)
|--------------------------------------------------------------------------
*/
Route::get('/productos', [PaginaController::class, 'producto'])->name('productos');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('nosotros');

/*
|--------------------------------------------------------------------------
| Formularios públicos (cualquiera puede enviar)
|--------------------------------------------------------------------------
*/
// Envío del formulario PQRS (contacto)
Route::post('/pqrs', [PqrsController::class, 'store'])->name('pqrs.store');

// Envío del formulario de solicitud de producto personalizado
Route::post('/solicitud-personalizada', [PqrsController::class, 'guardarSolicitud'])
    ->name('solicitud.guardar');

/*
|--------------------------------------------------------------------------
| Rutas que requieren autenticación
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Perfil del usuario (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Mensajes / PQRS (administración interna)
    Route::get('/registros', [PqrsController::class, 'index'])->name('registros');
    Route::get('/registros/{id}/editar', [PqrsController::class, 'edit'])->name('registros.edit');
    Route::put('/registros/{id}', [PqrsController::class, 'update'])->name('registros.update');
    Route::delete('/registros/{id}', [PqrsController::class, 'destroy'])->name('registros.destroy');

    // Ventas (solo autenticados)
    Route::get('/ventas', [PaginaController::class, 'ventas'])->name('ventas');
});

/*
|--------------------------------------------------------------------------
| Dashboard (Breeze)
|--------------------------------------------------------------------------
*/
Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

/*
|--------------------------------------------------------------------------
| Rutas de autenticación (login, register, etc.)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
