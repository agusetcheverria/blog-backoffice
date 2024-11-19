<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index'); 
})->name('index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/crear', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/guardar', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/editar/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/actualizar/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/eliminar/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/usuarios', [AuthController::class, 'index'])->name('users.index');
Route::get('/registro', [AuthController::class, 'register'])->name('users.create');
Route::post('/registro', [AuthController::class, 'store'])->name('users.store');
Route::get('/usuarios/editar/{id}', [AuthController::class, 'edit'])->name('users.edit');
Route::put('/usuarios/actualizar/{id}', [AuthController::class, 'update'])->name('users.update');
Route::delete('/usuarios/eliminar/{id}', [AuthController::class, 'destroy'])->name('users.destroy');
