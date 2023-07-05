<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bieuthuc extends Model
{
    use HasFactory;
    protected $table='bieuthucs';
    protected $fillable=['bieuthuc_id','loaipheptoan_id','vetruoc','vesau'];
    public function danhsachbieuthuc(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function layidcuoidanhsach(){
       
        $table=$this->table;
        
        $danhsachid=DB::table($table)
        ->orderBy('id', 'desc')
        ->get();
        //dd($danhsachid);
        if(!empty($danhsachid[0]->id)){
        $idbieuthuc=$danhsachid[0]->id;
        //dd($idbieuthuc);
        (int)$idbieuthuc++;
        $idbieuthuc="BT-".$idbieuthuc;
        }else{
            $idbieuthuc="BT-1";
        }
        return $idbieuthuc;
    }
    
    public function chitietbieuthuccuadoituong($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
    }
    public function thembieuthuc($data){
        $table=$this->table;
        // $count=DB::table($table)->count();
        // $setid="BT-".$count;
        DB::insert('INSERT INTO bieuthucs(bieuthuc_id,loaipheptoan_id,vetruoc,vesau)value(?,?,?,?)',$data);
     }
     public function suabieuthuc($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tenbieuthuc=?,dinhnghia=?,kyhieu=? WHERE id=?',$data);
    }
    public function xoabieuthuc($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id=?',[$id]);
    
    }
}
