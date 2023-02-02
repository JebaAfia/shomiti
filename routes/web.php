<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\DepositController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/loans', [LoanController::class, 'loans'])->name('loans');
Route::get('/loan/insert', [LoanController::class, 'index'])->name('loan-insert');
Route::post('/loan/insert', [LoanController::class, 'store']);
Route::get('/loan/delete/{id}', [LoanController::class, 'delete']);
Route::get('/loan/edit/{id}', [LoanController::class, 'showName']);
Route::post('/loan/update', [LoanController::class, 'update'])->name('loan-update');

Route::get('/deposits', [DepositController::class, 'deposits'])->name('deposits');
Route::get('/deposit/insert/{id?}', [DepositController::class, 'index'])->name('deposit-insert');
Route::post('/deposit/insert', [DepositController::class, 'store']);
Route::get('/deposit/delete/{id}', [DepositController::class, 'delete']);
Route::get('/deposit/edit/{id}', [DepositController::class, 'showName']);
Route::post('/deposit/update', [DepositController::class, 'update'])->name('deposit-update');
