<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vvoiture', [App\Http\Controllers\VoitureController::class, 'vendu']);
Route::resource('/client', 'App\Http\Controllers\ClientController');
Route::resource('/utilisateur', 'App\Http\Controllers\UserController');
Route::resource('/voiture', 'App\Http\Controllers\VoitureController');
Route::resource('/operation', 'App\Http\Controllers\OperationController');
