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
    public function chitietcongthuc($id){
        $table=$this->table;
        return DB::table($table)
        ->select('khainiem.id','dinhnghia','kyhieu','bieuthuc_id')
        ->join('khainiem','khainiem.id','=','congthuc.khainiem_id')
        ->where('congthuc.id','=',$id)
        ->get();
    }
    
}
