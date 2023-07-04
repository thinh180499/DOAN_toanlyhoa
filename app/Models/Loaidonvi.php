<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loaidonvi extends Model
{
    use HasFactory;
    protected $table='loaidonvis';
    protected $fillable=['tenloaidonvi'];
    public function danhsachloaidonvi(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
}
