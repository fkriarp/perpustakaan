<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/book')->name('book.')->group(function() {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/store', [BookController::class, 'store'])->name('store');
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('delete');
});

Route::prefix('/student')->name('student.')->group(function() {
    Route::get('/', [StudentController::class, 'index'])->name('index');
});

Route::prefix('/transaction')->name('transaction.')->group(function() {
    Route::get('/', [TransactionController::class, 'index'])->name('index');
});

Route::prefix('/report')->name('report.')->group(function() {
    Route::get('/', [ReportController::class, 'index'])->name('index');
});
