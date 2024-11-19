<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('backoffice/posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('backoffice.posts.index');
    Route::get('/crear', [PostController::class, 'create'])->name('backoffice.posts.create');
    Route::post('/guardar', [PostController::class, 'store'])->name('backoffice.posts.store');
    Route::get('/editar/{id}', [PostController::class, 'edit'])->name('backoffice.posts.edit');
    Route::put('/actualizar/{id}', [PostController::class, 'update'])->name('backoffice.posts.update');
    Route::delete('/eliminar/{id}', [PostController::class, 'destroy'])->name('backoffice.posts.destroy');
});
