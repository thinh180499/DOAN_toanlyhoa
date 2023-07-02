<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donvicuakhainiem extends Model
{
    use HasFactory;
    protected $table='donvicuakhainiem';
    protected $fillable=['khainiem_id','donvi_id'];
}
