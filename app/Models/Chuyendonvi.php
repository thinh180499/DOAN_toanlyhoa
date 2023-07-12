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
    public function kiemtrachuyendonvi($i,$j){
        $table=$this->table;
        return DB::select('SELECT hesonhan FROM '.$table.' WHERE tudonvi='.$i.' AND dendonvi='.$j);
        
       
    }
    public function danhsachchuyendonvi(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
    public function themchuyendonvi($data){
        $table=$this->table;
        $data[]=date('Y-m-d H:i:s');
        DB::insert('INSERT INTO chuyendonvis(hesonhan,tudonvi,dendonvi,created_at)value(?,?,?,?)',$data);
     }
     public function chitietchuyendonvi($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suachuyendonvi($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET hesonhan=?,tudonvi=?,dendonvi=?,updated_at=? WHERE id=?',$data);
    }
    public function xoachuyendonvi($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
}
