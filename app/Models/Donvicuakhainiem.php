<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donvicuakhainiem extends Model
{
    use HasFactory;
    protected $table='donvicuakhainiems';
    protected $fillable=['khainiem_id','donvi_id'];
    public function danhsachdonvicuakhainiem(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function themdonvicuakhainiem($data){
        $table=$this->table;
        
        DB::insert('INSERT INTO donvicuakhainiems(khainiem_id,donvi_id)value(?,?)',$data);
     }
     public function chitietdonvicuakhainiem($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suadonvicuakhainiem($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET khainiem_id=?,donvi_id=? WHERE id=?',$data);
    }
    public function xoadonvicuakhainiem($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
}
