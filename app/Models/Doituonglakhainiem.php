<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doituonglakhainiem extends Model
{
    use HasFactory;
    protected $table='doituonglakhainiem';
    protected $fillable=['doituong_id','khainiem_id'];
}
