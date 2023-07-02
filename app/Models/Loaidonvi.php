<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaidonvi extends Model
{
    use HasFactory;
    protected $table='doituonglabieuthuc';
    protected $fillable=['tenloaidonvi'];
}
