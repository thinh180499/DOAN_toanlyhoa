<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Khainiem extends Model
{
    use HasFactory;
    protected $table='khainiems';
    protected $fillable=['tenkhainiem','dinhnghia','kyhieu'];
    public function danhsachkhainiem(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
    public function layidcuoidanhsach(){
       
        $table=$this->table;
        
        $danhsachid=DB::table($table)
        ->orderBy('id', 'desc')
        ->get();
        if(!empty($danhsachid)){
        $idkhainiem=$danhsachid[0]->id;
        (int)$idkhainiem++;
        $idkhainiem="KN-".$idkhainiem;
        }else{
            $idkhainiem="KN-1";
        }
        return $idkhainiem;
    }
    
    public function themkhainiem($data){
        $table=$this->table;
        // $count=DB::table($table)->count();
        // $count++;
        // $setid="KN".$count;
        DB::insert('INSERT INTO khainiems(khainiem_id,tenkhainiem,dinhnghia,kyhieu)value(?,?,?,?)',$data);
     }
     public function chitietkhainiem($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suakhainiem($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tenkhainiem=?,dinhnghia=?,kyhieu=? WHERE id=?',$data);
    }
    public function xoakhainiem($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
}
