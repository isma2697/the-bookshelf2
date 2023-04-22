<?php

use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReservationController;
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

Route::middleware(['auth'])->group(function () {
    // Rutas para administradores aquí
    Route::get('books', [BooksController::class, 'index'])->name('admin.books.index');
    Route::delete('books/{book}', [BooksController::class, 'destroy'])->name('admin.books.destroy');
    Route::get("/books/listado", [BooksController::class, 'listadoPdf'])->name("admin.books.listado-books");
    Route::get('books/create', [BooksController::class, 'create'])->name('admin.books.create');
    Route::post('books', [BooksController::class, 'store'])->name('admin.books.store');
    Route::get('books/{book}/edit', [BooksController::class, 'edit'])->name('admin.books.edit');
    Route::put('books/{book}', [BooksController::class, 'update'])->name('admin.books.update');

    Route::post('/books/{book}/likes', [BooksController::class, 'toggleLike'])->name('likes.toggle');

    Route::post('/comments', [ComentarioController::class, 'store'])->name('comments.store');
    
    Route::post('/books/{book}/bookmark', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');

    Route::post('/books/{book}/reservations', [ReservationController::class, 'toggle'])->name('reservations.toggle');



    Route::get('users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
    Route::get("/users/listado", [UsersController::class, 'listadoPdf'])->name("admin.users.listado-users");
    Route::get('users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UsersController::class, 'update'])->name('admin.users.update');

    Route::get('loans', [LoanController::class, 'index'])->name('admin.loans.index');
    Route::get('/confirm-loan/{book}', [LoanController::class, 'edit'])->name('loans.confirm');
    //listado
    Route::get("/loans/listado", [LoanController::class, 'listadoPdf'])->name("admin.loans.listado-loans");

    Route::get('reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::post('/reservations/toggle/{book}', [ReservationController::class, 'toggle'])->name('reservations.toggle');

    Route::get('/confirm-reservation/{book}', [ReservationController::class, 'confirmReservation'])->name('reservations.confirm');

    // admin.reserve.listado.reservation
    Route::get("/reservations/listado", [ReservationController::class, 'listadoPdf'])->name("admin.reserve.listado.reservation");

    

});






