<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Congthuc;
use App\Models\Bieuthuc;
use App\Models\Loaipheptoan;

class Khainiem extends Model
{
    use HasFactory;
    protected $table='khainiems';
    protected $fillable=['tenkhainiem','dinhnghia','kyhieu'];
    public function danhsachkhainiem(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
        
    }
    public function danhsachcongthuckhainiem(){
        $table=$this->table;
        return DB::table($table)
        ->select('khainiem.id','dinhnghia','kyhieu','bieuthuc_id')
        ->join('congthuc','khainiem.id','=','congthuc.khainiem_id')
        ->get();
    }
    public function demkhainiem(){
        $table=$this->table;
        $count=DB::table('khainiems')->count();
        $count++;
        $setid="KN".$count;
        return $setid;
    }
    public function themkhainiem($data){
        $table=$this->table;
        // $count=DB::table($table)->count();
        // $count++;
        // $setid="KN".$count;
        DB::insert('INSERT INTO khainiems(khainiem_id,tenkhainiem,dinhnghia,kyhieu)value(?,?,?,?)',$data);
     }
     public function suakhainiem($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET tenkhainiem=?,dinhnghia=?,kyhieu=? WHERE id=?',$data);
    }
    public function xoakhainiem($id){
        return DB::delete("DELETE FROM ".$this->table." WHERE id=?",[$id]);
    
    }
}
