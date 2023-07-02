<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doituong extends Model
{
    use HasFactory;
    protected $table='doituong';
    protected $fillable=['loaidoituong_id'];
}
