<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doituonglahangso extends Model
{
    use HasFactory;
    protected $table='doituonglahangso';
    protected $fillable=['doituong_id'];
}
