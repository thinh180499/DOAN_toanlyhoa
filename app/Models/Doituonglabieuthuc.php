<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doituonglabieuthuc extends Model
{
    use HasFactory;
    protected $table='doituonglabieuthuc';
    protected $fillable=['doituong_id','bieuthuc_id'];
}
