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
    public function danhsachkhainiempag(){
        $table=$this->table;
        return DB::table($table)
        ->paginate(10);

    }
    public function timdanhsachkhainiem($key){
        $table=$this->table;
        return DB::table($table)
        ->where('tenkhainiem','like','%'.$key.'%')
        ->orwhere('dinhnghia','like','%'.$key.'%')
        ->paginate(10);

    }
    public function layidcuoidanhsach(){

        $table=$this->table;

        $danhsachid=DB::table($table)
        ->orderBy('id', 'desc')
        ->get();
        if(!empty($danhsachid[0]->id)){
        $idkhainiem=$danhsachid[0]->id;
        (int)$idkhainiem++;
        $idkhainiem="KN".$idkhainiem;
        }else{
            $idkhainiem="KN1";
        }
        return $idkhainiem;
    }
    public function xacdinhlakhainiem($id){

        $table=$this->table;

        $danhsachid=DB::table($table)
        ->where('khainiem_id',"=", $id)
        ->get();
        if(!empty($danhsachid[0]->id)){
        $khainiem=$danhsachid[0]->kyhieu;
        }else{
            $khainiem="";
        }
        return $khainiem;
    }
    public function xacdinhlakhainiemid($id){

        $table=$this->table;

        $danhsachid=DB::table($table)
        ->where('khainiem_id',"=", $id)
        ->get();
        if(!empty($danhsachid[0]->id)){
        $khainiem=$danhsachid[0];
        }else{
            $khainiem="";
        }
        return $khainiem;
    }
    public function themkhainiem($data){
        $table=$this->table;
        $data[]=date('Y-m-d H:i:s');
        // $count=DB::table($table)->count();
        // $count++;
        // $setid="KN".$count;
        DB::insert('INSERT INTO khainiems(khainiem_id,tenkhainiem,dinhnghia,kyhieu,cotheam,created_at)value(?,?,?,?,?,?)',$data);
     }
     public function chitietkhainiem($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
     }
     public function suakhainiem($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tenkhainiem=?,dinhnghia=?,kyhieu=?,cotheam=?,updated_at=? WHERE id=?',$data);
    }
    public function xoakhainiem($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);

    }
    public function timkiem(){
        if(request('tukhoa')){
            $tukhoa=request('tukhoa');
            $tukhoa="%".$tukhoa."%";
            return DB::table($this->table)
            ->join('congthucs', 'khainiems.khainiem_id', '=', 'congthucs.khainiem_id')
            ->where('tenkhainiem','like',$tukhoa)
            ->orwhere('dinhnghia','like',$tukhoa)
            // ->orwhere('congthucs.tencongthuc','like',$tukhoa)
            ->select('khainiems.*')
            ->get();
        }
    }
    public function xetcongthuc($id){
        $table=$this->table;
        $danhsachid=DB::table('congthucs')
        ->where('khainiem_id',"=", $id)
        ->get();
        return $danhsachid;
    }
    public function xetdonvicuakhainiem($id){
        $danhsachid=DB::table('donvicuakhainiems')
        ->where('khainiem_id',"=", $id)
        ->get();
        return $danhsachid;

    }

}
