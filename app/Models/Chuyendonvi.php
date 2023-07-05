<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chuyendonvi extends Model
{
    use HasFactory;
    protected $table='chuyendonvis';
    protected $fillable=['hesonhan','tudonvi','dendonvi'];
    public function chuyendonvithanh($a,$i,$j){
        $table=$this->table;
        $data=DB::select('SELECT hesonhan FROM '.$table.' WHERE tudonvi='.$i.' AND dendonvi='.$j);
        $hesonhan=$data[0]->hesonhan;
        $ketqua=$a*$hesonhan;
       return $ketqua;
    }
    public function danhsachchuyendonvi(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
    public function themchuyendonvi($data){
        $table=$this->table;
        
        DB::insert('INSERT INTO chuyendonvis(hesonhan,tudonvi,dendonvi)value(?,?,?)',$data);
     }
     public function chitietchuyendonvi($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suachuyendonvi($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET hesonhan=?,tudonvi=?,dendonvi=? WHERE id=?',$data);
    }
    public function xoachuyendonvi($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
}
