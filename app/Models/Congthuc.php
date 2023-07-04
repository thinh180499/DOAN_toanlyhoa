<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Congthuc extends Model
{
    use HasFactory;
    protected $table='congthucs';
    protected $fillable=['khainiem_id','bieuthuc_id'];
    public function danhsachcongthuc(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function danhsachcongthuccuakhainiem(){
        $table=$this->table;
        return DB::select('SELECT congthuc.id,tenkhainiem,kyhieu,bieuthuc_id FROM '.$table.',khainiems WHERE khainiems.id='.$table.'.khainiem_id');
    }
    public function chitietcongthuc($id){
        $table=$this->table;
        return DB::table($table)
        ->select('khainiems.id','dinhnghia','kyhieu','bieuthuc_id')
        ->join('khainiems','khainiems.id','=','congthuc.khainiem_id')
        ->where('congthuc.id','=',$id)
        ->get();
    }
    
}
