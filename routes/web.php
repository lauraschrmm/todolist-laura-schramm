<?php

use App\Http\Controllers\TodolistController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [TodolistController::class, 'index'])->name('index');
Route::post('/', [TodolistController::class, 'store'])->name('store');
Route::get('/todos/{todolist}/edit', [TodolistController::class, 'edit'])->name('edit');
Route::put('/todos/{todolist}', [TodolistController::class, 'update'])->name('update');
Route::delete('/{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy');
Route::resource('todolist', TodolistController::class);
Route::get('/logout', ['LogoutController@logout']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
