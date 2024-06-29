<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/info', [UserController::class, 'show'])->name('user.profile');
    Route::delete('/reservation/{id}', [ReservationController::class, 'destroyReservation'])->name('reservation.destroy');
});

Route::get('/reservation/{id}', [ReservationController::class, 'showReservation'])->name('reservation.show');

Route::get('/books', [BookController::class, 'index'])->middleware(['auth'])->name('books.all');
Route::get('/books/{id}', [BookController::class, 'detail'])->middleware(['auth'])->name('book.detail');
Route::post('/books/{id}/reserve', [ReservationController::class, 'reserve'])->middleware(['auth'])->name('books.reserve');

require __DIR__.'/auth.php';
