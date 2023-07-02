<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Khainiem extends Model
{
    use HasFactory;
    protected $table='khainiem';
    protected $fillable=['tenkhainiem','dinhnghia','kyhieu'];
    public function danhsachkhainiem(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
}
