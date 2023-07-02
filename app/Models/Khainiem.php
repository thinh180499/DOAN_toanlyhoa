<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khainiem extends Model
{
    use HasFactory;
    protected $table='khainiem';
    protected $fillable=['tenkhainiem','dinhnghia','kyhieu'];
}
