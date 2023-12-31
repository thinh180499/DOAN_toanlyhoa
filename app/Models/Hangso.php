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
    public function danhsachhangsopag(){
        $table=$this->table;
        //return DB::select('SELECT * FROM '.$table);
        return DB::table($table)
        ->paginate(10);
    }
    public function trunghangso($hangso){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE hangso='.$hangso);
     }

    public function layidcuoidanhsach(){

        $table=$this->table;

        $danhsachid=DB::table($table)
        ->orderBy('id', 'desc')
        ->get();
        if(!empty($danhsachid[0]->id)){
            $idhangso=$danhsachid[0]->id;
            (int)$idhangso++;
            $idhangso="HS".$idhangso;
        }else{
            $idhangso="HS1";
        }

        //dd($idhangso);
        return $idhangso;
    }
    public function xacdinhlahangso($id){

        $table=$this->table;

        $danhsachid=DB::table($table)
        ->where('hangso_id',"=", $id)
        ->get();
        if(!empty($danhsachid[0]->id)){
        $mota=$danhsachid[0]->hangso;
        }else{
            $mota="";
        }
        return $mota;
    }
    public function xacdinhlahangsoid($id){

        $table=$this->table;

        $danhsachid=DB::table($table)
        ->where('hangso_id',"=", $id)
        ->get();
        if(!empty($danhsachid[0]->id)){
        $mota=$danhsachid[0];
        }else{
            $mota="";
        }
        return $mota;
    }
    public function themhangso($data){
        $table=$this->table;
        $data[]=date('Y-m-d H:i:s');
        DB::insert('INSERT INTO hangsos(hangso_id,hangso,created_at)value(?,?,?)',$data);
     }

     public function chitiethangso($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }

     public function suahangso($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET hangso=?,updated_at=? WHERE id=?',$data);
    }

    public function xoahangso($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);

    }
}
