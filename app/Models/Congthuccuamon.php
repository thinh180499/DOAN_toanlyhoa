<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Congthuccuamon extends Model
{
    use HasFactory;
    protected $table='congthuccuamons';
    protected $fillable=['congthuc_id','mon_id'];
    public function danhsachcongthuccuamon(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function danhsachcongthuccuamonkethop(){
        $table=$this->table;
        return DB::table($table)
        ->join('congthucs', 'congthuccuamons.congthuc_id', '=', 'congthucs.id')
        ->select('congthuccuamons.*', 'congthucs.tencongthuc')
        ->get();
    }
    public function themcongthuccuamon($data){
        $data[]=date('Y-m-d H:i:s');
        $table=$this->table;

        DB::insert('INSERT INTO congthuccuamons(mon_id,congthuc_id,created_at)value(?,?,?)',$data);
     }
     public function chitietcongthuccuamon($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suacongthuccuamon($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET mon_id=?,congthuc_id=?,updated_at=? WHERE id=?',$data);
    }
    public function xoacongthuccuamon($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    }
}
