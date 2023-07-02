<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mon extends Model
{
    use HasFactory;
    protected $table='mon';
    protected $fillable=['tenmon'];
    public function danhsachmon(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
}
