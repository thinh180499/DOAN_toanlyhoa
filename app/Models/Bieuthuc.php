<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bieuthuc extends Model
{
    use HasFactory;
    protected $table='bieuthuc';
    protected $fillable=['vetrai','vephai','loaipheptoan_id'];
    public function danhsachbieuthuc(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function chitietbieuthuccuadoituong($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
    }
    public function thembieuthuc($data){
        DB::insert('INSERT INTO bieuthuc('.$this->table.')value(?,?,?)',$data);
     }
     public function suabieuthuc($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tenbieuthuc=?,dinhnghia=?,kyhieu=? WHERE id=?',$data);
    }
    public function xoabieuthuc($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id=?',[$id]);
    
    }
}
