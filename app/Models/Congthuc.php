<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congthuc extends Model
{
    use HasFactory;
    protected $table='congthuc';
    protected $fillable=['khainiem_id','bieuthuc_id'];
}
