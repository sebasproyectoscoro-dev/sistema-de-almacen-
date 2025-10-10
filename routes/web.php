<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');  


//rutas para categorias
Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index')->middleware('auth');
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create')->middleware('auth');
Route::post('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store')->middleware('auth');
Route::get('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show')->middleware('auth');
Route::get('/admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('categorias.edit')->middleware('auth');
Route::put('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update')->middleware('auth');
Route::delete('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categorias.destroy')->middleware('auth');



//rutas para productos
Route::get('/admin/productos/buscar', [App\Http\Controllers\ProductoController::class, 'buscar'])->name('productos.buscar')->middleware('auth');

Route::get('/admin/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index')->middleware('auth');
Route::get('/admin/productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create')->middleware('auth');
Route::post('/admin/productos/create', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store')->middleware('auth');
Route::get('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show')->middleware('auth');
Route::get('/admin/productos/{id}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit')->middleware('auth');
Route::put('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->  name('productos.update')->middleware('auth');
Route::delete('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy')->middleware('auth');     


//rutas para asignaciones
Route::get('/admin/asignaciones', [App\Http\Controllers\AsignacionEquipoController::class, 'index'])->name('asignaciones.index')->middleware('auth');
Route::get('/admin/asignaciones/create', [App\Http\Controllers\AsignacionEquipoController::class, 'create'])->name('asignaciones.create')->middleware('auth');
Route::post('/admin/asignaciones/create', [App\Http\Controllers\AsignacionEquipoController::class, 'store'])->name('asignaciones.store')->middleware('auth');
Route::get('/admin/asignaciones/{id}', [App\Http\Controllers\AsignacionEquipoController::class, 'show'])->name('asignaciones.show')->middleware('auth');
Route::get('/admin/asignaciones/{id}/edit', [App\Http\Controllers\AsignacionEquipoController::class, 'edit'])->name('asignaciones.edit')->middleware('auth');
Route::put('/admin/asignaciones/{id}', [App\Http\Controllers\AsignacionEquipoController::class, 'update'])->  name('asignaciones.update')->middleware('auth');
Route::delete('/admin/asignaciones/{id}', [App\Http\Controllers\AsignacionEquipoController::class, 'destroy'])->name('asignaciones.destroy')->middleware('auth');