<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doituonglahangso extends Model
{
    use HasFactory;
    protected $table='doituonglahangso';
    protected $fillable=['doituong_id'];
}
