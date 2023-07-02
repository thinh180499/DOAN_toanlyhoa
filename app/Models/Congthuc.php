<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Congthuc extends Model
{
    use HasFactory;
    protected $table='congthuc';
    protected $fillable=['khainiem_id','bieuthuc_id'];
    public function danhsachcongthuc(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    
}
