<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/', [AdminController::class, 'logout'])->name('logout');
route::get('/create_room', [AdminController::class, 'create_room']);
route::post('/add_room', [AdminController::class, 'add_room']);