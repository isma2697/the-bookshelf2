<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;


  

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BooksController::class, 'principal'])->name('books.principal');

Route::get('/category', function () {
    return view('layouts.category-page');
});


Route::get('/apibooks', [ApiBookController::class, 'index'])->name('apibooks.index');
Route::get('/category/{category}', [ApiBookController::class, 'category'])->name('apibooks.category');
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/book/{id}', [BooksController::class, 'show'])->name('book.show');

