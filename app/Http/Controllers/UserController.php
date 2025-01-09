<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller {
  public function login(Request $request) {
    $credentials = $request->validate([
      'email' => 'required|email|exists:users,email',
      'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }

  public function index(Request $request) {
    $viewData = [
      'users' => User::all()
    ];

    return view('user.index', $viewData);
  }

  public function create(Request $request) {
    return view('user.form');
  }

  public function show(Request $request, string $userEmail) {
    $user = User::where('email', $userEmail)->first();
    if ($user) {
      $viewData = [
        'user' => $user
      ];

      return view('user.form', $viewData);
    }
  }

  public function store(Request $request) {
    $userData =  $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required',
      'role' => 'required|in:admin,user',
    ]);

    User::create($userData);
    return redirect('/users');
  }

  public function update(Request $request, string $userEmail) {
    $user = User::where('email', $userEmail)->first();
    if ($user) {
      $userData =  $request->validate([
        'name' => 'required',
        'email' => [
          'required',
          'email',
          Rule::unique('users', 'email')->ignore($userEmail, 'email')
        ],
        'password' => 'nullable',
        'role' => 'required|in:admin,user',
      ]);

      if (is_null($userData['password'])) unset($userData['password']);

      $user->update($userData);
      return redirect('/users');
    }
  }

  public function destroy(Request $request, string $userEmail) {
    $user = User::where('email', $userEmail)->first();
    if ($user) {
      $user->delete();
      return redirect('/users');
    }
  }
}
