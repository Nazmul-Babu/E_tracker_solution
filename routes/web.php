<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\DashboardController;

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

Route::redirect('/', 'dashboard');



// ===========================page========================
Route::get('dashboard',[DashboardController::class,'showdashboard'])->name('showdashboard');
Route::post('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('delete/{id}',[DashboardController::class,'delete'])->name('delete');
Route::get('edit/{id}',[DashboardController::class,'showedit'])->name('showedit');
Route::post('edit/{id}',[DashboardController::class,'edit'])->name('edit');
