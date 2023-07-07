<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mon extends Model
{
    use HasFactory;
    protected $table='mons';
    protected $fillable=['tenmon'];
    public function danhsachmon(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);

    }

    public function themmon($data){
        $table=$this->table;
        $data[]=date('Y-m-d H:i:s');
        DB::insert('INSERT INTO mons(tenmon,created_at)value(?,?)',$data);
     }

     public function chitietmon($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }

     public function suamon($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tenmon=?,updated_at=? WHERE id=?',$data);
    }

    public function xoamon($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);

    }
}
