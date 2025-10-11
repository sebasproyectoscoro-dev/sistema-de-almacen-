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

//rutas para ambirntes

Route::get('/admin/ambientes', [App\Http\Controllers\AmbienteController::class, 'index'])->name('ambientes.index')->middleware('auth');
Route::get('/admin/ambientes/create', [App\Http\Controllers\AmbienteController::class, 'create'])->name('ambientes.create')->middleware('auth');
Route::post('/admin/ambientes/create', [App\Http\Controllers\AmbienteController::class, 'store'])->name('ambientes.store')->middleware('auth');
Route::get('/admin/ambientes/{id}', [App\Http\Controllers\AmbienteController::class, 'show'])->name('ambientes.show')->middleware('auth');
Route::get('/admin/ambientes/{id}/edit', [App\Http\Controllers\AmbienteController::class, 'edit'])->name('ambientes.edit')->middleware('auth');
Route::put('/admin/ambientes/{id}', [App\Http\Controllers\AmbienteController::class, 'update'])->  name('ambientes.update')->middleware('auth');
Route::delete('/admin/ambientes/{id}', [App\Http\Controllers\AmbienteController::class, 'destroy'])->name('ambientes.destroy')->middleware('auth'); 

//rutas para conjunto 
Route::get('/admin/conjuntos', [App\Http\Controllers\ConjuntoEquipoController::class, 'index'])->name('conjuntos.index')->middleware('auth');
Route::get('/admin/conjuntos/create', [App\Http\Controllers\ConjuntoEquipoController::class, 'create'])->name('conjuntos.create')->middleware('auth');
Route::post('/admin/conjuntos/create', [App\Http\Controllers\ConjuntoEquipoController::class, 'store'])->name('conjuntos.store')->middleware('auth');
Route::get('/admin/conjuntos/{id}', [App\Http\Controllers\ConjuntoEquipoController::class, 'show'])->name('conjuntos.show')->middleware('auth');
Route::get('/admin/conjuntos/{id}/edit', [App\Http\Controllers\ConjuntoEquipoController::class, 'edit'])->name('conjuntos.edit')->middleware('auth');
Route::put('/admin/conjuntos/{id}', [App\Http\Controllers\ConjuntoEquipoController::class, 'update'])->  name('conjuntos.update')->middleware('auth');
Route::delete('/admin/conjuntos/{id}', [App\Http\Controllers\ConjuntoEquipoController::class, 'destroy'])->name('conjuntos.destroy')->middleware('auth'); 