<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hangso extends Model
{
    use HasFactory;
    protected $table='hangsos';
    protected $fillable=['hangso_id','hangso'];

    public function danhsachhangso(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }

    public function layidcuoidanhsach(){
       
        $table=$this->table;
        
        $danhsachid=DB::table($table)
        ->orderBy('id', 'desc')
        ->get();
        if(!empty($danhsachid[0]->id)){
            $idhangso=$danhsachid[0]->id;
            (int)$idhangso++;
            $idhangso="HS-".$idhangso;
        }else{
            $idhangso="HS-1";
        }
       
        //dd($idhangso);
        return $idhangso;
    }

    public function themhangso($data){
        $table=$this->table;
        
        DB::insert('INSERT INTO hangsos(hangso_id,hangso)value(?,?)',$data);
     }

     public function chitiethangso($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     
     public function suahangso($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET hangso=? WHERE id=?',$data);
    }
    
    public function xoahangso($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
}
