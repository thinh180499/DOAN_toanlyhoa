<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hinhcuacongthuc extends Model
{
    use HasFactory;
    protected $table='hinhcuacongthucs';
    protected $fillable=['congthuc_id','img'];
}
