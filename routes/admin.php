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
Route::get("/books/listado", [BooksController::class, 'listadoPdf'])->name("admin.books.listado-books");
Route::get('books/create', [BooksController::class, 'create'])->name('admin.books.create');
Route::post('books', [BooksController::class, 'store'])->name('admin.books.store');



Route::get('users', [UsersController::class, 'index'])->name('admin.users.index');
Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
Route::get("/users/listado", [UsersController::class, 'listadoPdf'])->name("admin.users.listado-users");
Route::get('users/create', [UsersController::class, 'create'])->name('admin.users.create');
Route::post('users', [UsersController::class, 'store'])->name('admin.users.store');





