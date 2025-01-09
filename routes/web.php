<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('login'))->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/dashboard', fn() => view('dashboard'));
