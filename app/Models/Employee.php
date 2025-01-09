<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
  /** @use HasFactory<\Database\Factories\EmployeeFactory> */
  use HasFactory;

  protected $primaryKey = 'nik';
  public $incrementing = false;
  protected $keyType = 'string';
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'nik',
    'full_name',
    'position',
    'wages',
    'incentive',
  ];
}
