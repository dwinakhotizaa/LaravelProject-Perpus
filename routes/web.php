<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;

Route::get('/', [UserController::class, 'home'])->name('home');

Route::resource('users', UserController::class);

Route::resource('loans', LoanController::class);
Route::get('/loans/{id}', [LoanController::class, 'show'])->name('loans.show');

Route::get('/loans/{id}/print', [LoanController::class, 'printPdf'])->name('loans.print');

Route::prefix('/books')->name('books.')->group(function() {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/store', [BookController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BookController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [BookController::class, 'update'])->name('update');
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('destroy');
});
