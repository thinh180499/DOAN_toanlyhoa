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
    public function danhsachdonvicuadodai(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE loaidonvi_id=1');
        
    }
    public function danhsachdonvicuathetich(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE loaidonvi_id=2');
        
    }
    public function danhsachdonvicuakhoiluong(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE loaidonvi_id=3');
        
    }

    public function themdonvi($data){
        $data[]=date('Y-m-d H:i:s');
        $table=$this->table;
        
        DB::insert('INSERT INTO donvis(tendonvi,kyhieu,loaidonvi_id,created_at)value(?,?,?,?)',$data);
     }
     public function chitietdonvi($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suadonvi($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tendonvi=?,kyhieu=?,loaidonvi_id=?,updated_at=? WHERE id=?',$data);
    }
    public function xoadonvi($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
    public function xettudonvi($id){
        $table=$this->table;
        $danhsachid=DB::table('chuyendonvis')
        ->where('tudonvi',"=", $id)
        ->get();
        return $danhsachid;
       
    }
    public function xetdendonvi($id){
        $table=$this->table;
        $danhsachid=DB::table('chuyendonvis')
        ->where('dendonvi',"=", $id)
        ->get();
        return $danhsachid;
       
    }
}
