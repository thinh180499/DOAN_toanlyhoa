<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hinhcuacongthuc extends Model
{
    use HasFactory;
    protected $table='hinhcuacongthucs';
    protected $fillable=['congthuc_id','img'];
    public function danhsachhinhcuacongthuc(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function themhinhcuacongthuc($data){
        $data[]=date('Y-m-d H:i:s');
        //dd($data);
        DB::insert('INSERT INTO hinhcuacongthucs(img,congthuc_id,created_at)value(?,?,?)',$data);
     }
     public function chitiethinhcuacongthuc($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suahinhcuacongthuc($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET img=?,congthuc_id=?,updated_at=?  WHERE id=?',$data);
    }
    public function xoahinhcuacongthuc($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);

    }
}
