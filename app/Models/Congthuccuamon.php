<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congthuccuamon extends Model
{
    use HasFactory;
    protected $table='congthuccuamon';
    protected $fillable=['congthuc_id','mon_id'];
}
