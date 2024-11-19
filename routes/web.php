<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('index'); 
})->name('index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/crear', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/guardar', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/editar/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/actualizar/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/eliminar/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
