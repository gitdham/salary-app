<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('login'))->name('login')
  ->middleware('guest');
Route::post('/login', [UserController::class, 'login'])
  ->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])
  ->middleware('auth');

Route::get('/dashboard', function () {
  $user = Auth::user();
  if ($user->role === 'admin') return view('dashboard-admin');
  else return view('dashboard-user');
})
  ->middleware('auth');

Route::get('/users', [UserController::class, 'index'])
  ->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])
  ->middleware('auth');
Route::post('/users', [UserController::class, 'store'])
  ->middleware('auth');
Route::get('/users/{id}', [UserController::class, 'show'])
  ->middleware('auth');
Route::put('/users/{id}', [UserController::class, 'update'])
  ->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])
  ->middleware('auth');
