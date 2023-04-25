<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;


  

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [BooksController::class, 'principal'])->name('books.principal');
});

// Ruta para el home
Route::get('/', [BooksController::class, 'principal'])->name('books.principal');

// Rutas mas comunes para usuarios no registrados
Route::get('/category/{category}', [ApiBookController::class, 'category'])->name('apibooks.category');
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/popular', [BooksController::class, 'popular'])->name('books.popular');
Route::get('/book/{id}', [BooksController::class, 'show'])->name('book.show');
Route::get('/books/category/{category}', [BooksController::class ,'show_category'])->name('books.category');
Route::get('/books/years/{years}', [BooksController::class ,'show_years'])->name('books.years');


