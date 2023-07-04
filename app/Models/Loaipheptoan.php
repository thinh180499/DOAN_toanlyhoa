<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loaipheptoan extends Model
{
    use HasFactory;
    protected $table='loaipheptoans';
    protected $fillable=['loaipheptoan_id','loaipheptoan'];
    public function loaipheptoan(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
}
