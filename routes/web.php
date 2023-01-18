<?php

use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loan-insert', [LoanController::class, 'index'])->name('loan-insert');
Route::post('/loan-insert', [LoanController::class, 'store']);
Route::get('/loans', [LoanController::class, 'loans'])->name('loans');
