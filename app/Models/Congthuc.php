<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Congthuc extends Model
{
    use HasFactory;
    protected $table='congthucs';
    protected $fillable=['khainiem_id','bieuthuc_id','tencongthuc'];
    public function danhsachcongthuc(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }

    public function danhsachcongthuccuakhainiem(){
        $table=$this->table;
        return DB::select('SELECT congthuc.id,tenkhainiem,kyhieu,bieuthuc_id FROM '.$table.',khainiems WHERE khainiems.id='.$table.'.khainiem_id');
    }

    public function themcongthuc($data){
        $table=$this->table;
        // $count=DB::table($table)->count();
        // $setid="BT-".$count;
        DB::insert('INSERT INTO congthucs(khainiem_id,bieuthuc_id,tencongthuc)value(?,?,?)',$data);
     }

     public function chitietcongthuc($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
    } 
    public function suacongthuc($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET khainiem_id=?,bieuthuc_id=?,tencongthuc=? WHERE id=?',$data);
    }
    public function xoacongthuc($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }

}
