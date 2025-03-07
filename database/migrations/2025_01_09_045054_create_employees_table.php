<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('employees', function (Blueprint $table) {
      $table->string('nik')->primary();
      $table->string('full_name');
      $table->string('position');
      $table->decimal('wages', 10);
      $table->decimal('incentive', 10);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('employees');
  }
};
