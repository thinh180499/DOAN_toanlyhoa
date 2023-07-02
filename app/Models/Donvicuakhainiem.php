<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donvicuakhainiem extends Model
{
    use HasFactory;
    protected $table='donvicuakhainiem';
    protected $fillable=['khainiem_id','donvi_id'];
}
