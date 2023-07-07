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

    public function themloaidonvi($data){
        $table=$this->table;
        $data[]=date('Y-m-d H:i:s');
        DB::insert('INSERT INTO loaidonvis(tenloaidonvi,created_at)value(?,?)',$data);
     }

     public function chitietloaidonvi($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }

     public function sualoaidonvi($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tenloaidonvi=?,updated_at=? WHERE id=?',$data);
    }

    public function xoaloaidonvi($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);

    }
}
