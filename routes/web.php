<?php

use App\Http\Controllers\ApiBookController;
use Illuminate\Support\Facades\Route;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('layouts.principal');
});

Route::get('/category', function () {
    return view('layouts.category-page');
});


Route::get('/admin/books', [BooksController::class, 'index'])->name('admin.books.index');
Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users.index');




Route::get('/apibooks', [ApiBookController::class, 'index'])->name('apibooks.index');
Route::get('/category/{category}', [ApiBookController::class, 'category'])->name('apibooks.category');
Route::get('/books', [BooksController::class, 'index'])->name('books.index');

