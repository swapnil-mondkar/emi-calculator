<?php

use App\Http\Controllers\MonthController;
use App\Http\Controllers\EmiCombinationController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\Admin\AuthController;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('months', MonthController::class)->except('show');
    Route::resource('emi', EmiCombinationController::class)->except('show');
});

Route::get('/calculator', [CalculatorController::class, 'showForm'])->name('calculator.form');
Route::post('/calculator', [CalculatorController::class, 'calculate'])->name('calculator.calculate');
