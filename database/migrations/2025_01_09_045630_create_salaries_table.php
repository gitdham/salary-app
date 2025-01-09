<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('salaries', function (Blueprint $table) {
      $table->id();
      $table->string('period');
      $table->date('date');
      $table->string('nik');
      $table->decimal('wages', 10);
      $table->decimal('incentive', 10);
      $table->decimal('insurance', 10);
      $table->decimal('total_salary', 10);
      $table->foreign('nik')->references('nik')->on('employees');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('salaries');
  }
};
