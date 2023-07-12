<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Congthuc extends Model
{
    use HasFactory;
    protected $table='congthucs';
    protected $fillable=['khainiem_id','bieuthuc_id','tencongthuc','mon'];
    public function danhsachcongthuc(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function danhsachcongthucvatly(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE mon =1');
    }
    public function danhsachcongthuctoan(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE mon =2');
    }
    public function danhsachcongthuchoa(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE mon =3');
    }

    public function danhsachcongthuccuakhainiem($id){
        $table=$this->table;
         $danhsachid=DB::table($table)
        ->where('khainiem_id',"=", $id)
        ->get();
        //dd($danhsachid);
        return $danhsachid;
    }

    public function themcongthuc($data){
        $table=$this->table;
        $data[]=date('Y-m-d H:i:s');
        // $count=DB::table($table)->count();
        // $setid="BT-".$count;
        DB::insert('INSERT INTO congthucs(khainiem_id,bieuthuc_id,tencongthuc,mon,created_at)value(?,?,?,?,?)',$data);
     }

     public function chitietcongthuc($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
    } 
    public function suacongthuc($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET khainiem_id=?,bieuthuc_id=?,tencongthuc=?,mon=?,updated_at=? WHERE id=?',$data);
    }
    public function xoacongthuc($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
    public function xethinhcuacongthuc($id){
        $table=$this->table;
        $danhsachid=DB::table('hinhcuacongthucs')
        ->where('congthuc_id',"=", $id)
        ->get();
        //dd($danhsachid);
        return $danhsachid;
       
    }
    public function xetcongthuccuamon($id){
        $table=$this->table;
        $danhsachid=DB::table('congthuccuamons')
        ->where('congthuc_id',"=", $id)
        ->get();
        return $danhsachid;
       
    }

}
