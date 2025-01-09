<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   */
  public function run(): void {
    // User::factory(10)->create();

    User::factory()->create([
      'email' => 'admin@mail.com',
      'name' => 'administrator',
      'password' => Hash::make('admin123'),
      'role' => 'admin',
      'last_login' => date('Y-m-d'),
    ]);
  }
}
