<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donvi extends Model
{
    use HasFactory;
    protected $table='donvi';
    protected $fillable=['tendonvi','kyhieu','loaidonvi_id'];
    public function danhsachdonvi(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
}
