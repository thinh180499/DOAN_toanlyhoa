<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bieuthuc extends Model
{
    use HasFactory;
    protected $table='bieuthuc';
    protected $fillable=['vetrai','vephai','loaipheptoan_id'];
}
