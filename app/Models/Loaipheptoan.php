<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loaipheptoan extends Model
{
    use HasFactory;
    protected $table='loaipheptoans';
    protected $fillable=['loaipheptoan_id','loaipheptoan'];
    public function danhsachloaipheptoan(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function layidcuoidanhsach(){
       
        $table=$this->table;
        
        $danhsachid=DB::table($table)
        ->orderBy('id', 'desc')
        ->get();
        $idloaipheptoan=$danhsachid[0]->id;
        (int)$idloaipheptoan++;
        $idloaipheptoan="LPT-".$idloaipheptoan;

        return $idloaipheptoan;
    }
    public function themloaipheptoan($data){
        $table=$this->table;
        
        DB::insert('INSERT INTO loaipheptoans(loaipheptoan_id,loaipheptoan)value(?,?)',$data);
     }
     public function chitietloaipheptoan($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function sualoaipheptoan($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET loaipheptoan=? WHERE id=?',$data);
    }
    public function xoaloaipheptoan($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
}
