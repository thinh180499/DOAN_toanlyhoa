<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chuyendonvi extends Model
{
    use HasFactory;
    protected $table='chuyendonvi';
    protected $fillable=['hesonhan','tudonvi_id','dendonvi_id'];
}
