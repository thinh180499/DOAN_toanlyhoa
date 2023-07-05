<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Khainiem;

use App\Models\Loaipheptoan;

use App\Models\Hangso;

class Bieuthuc extends Model
{
    use HasFactory;
    protected $table='bieuthucs';
    protected $fillable=['bieuthuc_id','loaipheptoan_id','vetruoc','vesau','bieuthuc'];
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
        $idbieuthuc="BT".$idbieuthuc;
        }else{
            $idbieuthuc="BT1";
        }
        return $idbieuthuc;
    }
    public function xacdinhlabieuthuc($id){
       
        $table=$this->table;
        
        $danhsachid=DB::table($table)
        ->where('bieuthuc_id',"=", $id)
        ->get();
        if(!empty($danhsachid[0]->id)){
        $khainiem=$danhsachid[0]->motabieuthuc;
        }else{
            $khainiem="";
        }
        return $khainiem;
    }
    public function motavemotbieuthuc($pheptoan_id,$vetruoc_id,$vesau_id){
        $table=$this->table;
        $mota="";
        $bieuthuc=new Bieuthuc();
        $khainiem=new Khainiem();
        $hangso=new Hangso();
        $loaipheptoan=new Loaipheptoan();


        $mota=$mota." ".$khainiem->xacdinhlakhainiem($vetruoc_id);
        $mota=$mota." ".$hangso->xacdinhlahangso($vetruoc_id);
        $mota=$mota." (".$bieuthuc->xacdinhlabieuthuc($vetruoc_id).")";
        $mota=$mota." ".$loaipheptoan->xacdinhloaipheptoan($pheptoan_id);
        $mota=$mota." ".$khainiem->xacdinhlakhainiem($vesau_id);
        $mota=$mota." ".$hangso->xacdinhlahangso($vesau_id);
        $mota=$mota." (".$bieuthuc->xacdinhlabieuthuc($vesau_id).")";
        dd($mota);

        
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
