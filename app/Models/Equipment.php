<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  
  protected $table = "equipment_track";
  
  protected $fillable = [
      'asset_identification_number',
      'item_description',
      'serial_number',
      'quantity',
      'remarks',
      'station',
      'user',
      'account',
      'facilitate',
      'date',
      'status',
      'user_id'
  ];
}
