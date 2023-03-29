<?php


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

Route::middleware(['auth', 'admin'])->group(function () {
    // Rutas para administradores aquí
});
Route::get('books', [BooksController::class, 'index'])->name('admin.books.index');
Route::delete('books/{book}', [BooksController::class, 'destroy'])->name('admin.books.destroy');
Route::get('users', [UsersController::class, 'index'])->name('admin.users.index');
Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');

