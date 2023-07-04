<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donvi extends Model
{
    use HasFactory;
    protected $table='donvis';
    protected $fillable=['tendonvi','kyhieu','loaidonvi_id'];
    public function danhsachdonvi(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
    public function danhsachdonvitheoloai(){
        $table=$this->table;
        return DB::select('SELECT '.$table.'.id,tendonvi,kyhieu,loaidonvis.tenloaidonvi FROM '.$table.',loaidonvis WHERE loaidonvi_id=loaidonvis.id');
        
    }

    public function themdonvi($data){
        $table=$this->table;
        
        DB::insert('INSERT INTO donvis(tendonvi,kyhieu,loaidonvi_id)value(?,?,?)',$data);
     }
     public function chitietdonvi($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suadonvi($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tendonvi=?,kyhieu=?,loaidonvi_id=? WHERE id=?',$data);
    }
    public function xoadonvi($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
}
