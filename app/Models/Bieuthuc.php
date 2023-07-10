<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Khainiem;

use App\Models\Loaipheptoan;

use App\Models\Congthuc;
use App\Models\Hangso;

class Bieuthuc extends Model
{
    use HasFactory;
    protected $table='bieuthucs';
    protected $fillable=['bieuthuc_id','loaipheptoan_id','vetruoc','vesau','motabieuthuc','htmlbieuthuc'];
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
            $khainiem="(".$danhsachid[0]->motabieuthuc.")";
        }else{
            $khainiem="";
        }
        return $khainiem;
    }
    public function xacdinhlabieuthuchtml($id){
       
        $table=$this->table;
        
        $danhsachid=DB::table($table)
        ->where('bieuthuc_id',"=", $id)
        ->get();
        
        if(!empty($danhsachid[0]->id)){
            $khainiem="(".$danhsachid[0]->htmlbieuthuc.")";
        }else{
            $khainiem="";
        }
        return $khainiem;
    }
    public function xacdinhlabieuthucid($id){
       
        $table=$this->table;
        
        $danhsachid=DB::table($table)
        ->where('bieuthuc_id',"=", $id)
        ->get();
        
        if(!empty($danhsachid[0]->id)){
            $khainiem=$danhsachid[0];
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

        $mota=$mota.$khainiem->xacdinhlakhainiem($vetruoc_id);
        $mota=$mota.$hangso->xacdinhlahangso($vetruoc_id);
        $mota=$mota.$bieuthuc->xacdinhlabieuthuc($vetruoc_id);
        $mota=$mota.$loaipheptoan->xacdinhloaipheptoan($pheptoan_id);
        $mota=$mota.$khainiem->xacdinhlakhainiem($vesau_id);
        $mota=$mota.$hangso->xacdinhlahangso($vesau_id);
        $mota=$mota.$bieuthuc->xacdinhlabieuthuc($vesau_id);
        // dd($mota);

        return $mota;
    }
    public function motavemotbieuthuchtml($pheptoan_id,$vetruoc_id,$vesau_id){
        
        $mota="";
        $motavetruoc="";
        $motavesau="";
        $bieuthuc=new Bieuthuc();
        $khainiem=new Khainiem();
        $hangso=new Hangso();
       
        $motavetruoc=$motavetruoc.$khainiem->xacdinhlakhainiem($vetruoc_id);
        $motavetruoc=$motavetruoc.$hangso->xacdinhlahangso($vetruoc_id);
        $motavetruoc=$motavetruoc.$bieuthuc->xacdinhlabieuthuchtml($vetruoc_id);
        //dd($motavetruoc);

        $motavesau=$motavesau.$khainiem->xacdinhlakhainiem($vesau_id);
        $motavesau=$motavesau.$hangso->xacdinhlahangso($vesau_id);
        $motavesau=$motavesau.$bieuthuc->xacdinhlabieuthuchtml($vesau_id);
        if ($pheptoan_id == "LPT1") {
            $mota= $motavetruoc." + ".$motavesau;
        }
        if ($pheptoan_id == "LPT2") {
            $mota= $motavetruoc." - ".$motavesau;
        }
        if ($pheptoan_id == "LPT3") {
            $mota= $motavetruoc." * ".$motavesau;
        }
        if ($pheptoan_id == "LPT4") {
            
            // $mota=$motavetruoc." <hr> ".$motavesau;
            $mota='<div class="phanso">' . '<span class="vetruoc">' . $motavetruoc . '</span>' . '<span class="vesau">' . $motavesau . '</span> </div>';
            
        }
        if ($pheptoan_id == "LPT5") {
            $mota=$motavetruoc." <sup> ".$motavesau." </sup> ";
        }
        if ($pheptoan_id == "LPT7") {
            $mota=" <sup> ".$motavesau." </sup>  &radic; ".$motavetruoc;
            
        }
         //dd($mota);

        return $mota;
    }
    public function chitietbieuthuc($id){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
    }
    public function chitietbieuthucid($id){
        $table=$this->table;
        $data[]=$id;
        return DB::select('SELECT * FROM '.$table.' WHERE bieuthuc_id=?',$data);
    }
    public function thembieuthuc($data){
        $table=$this->table;
        $data[]=date('Y-m-d H:i:s');
        // $count=DB::table($table)->count();
        // $setid="BT-".$count;
        DB::insert('INSERT INTO bieuthucs(bieuthuc_id,loaipheptoan_id,vetruoc,vesau,motabieuthuc,htmlbieuthuc,created_at)value(?,?,?,?,?,?,?)',$data);
     }
     public function suabieuthuc($data,$id){
        $data[]=date('Y-m-d H:i:s');
        $data[]=$id;
        //dd($data);
        
        
        return DB::update('UPDATE '.$this->table.' SET loaipheptoan_id=?,vetruoc=?,vesau=?,motabieuthuc=?,htmlbieuthuc=?,updated_at=? WHERE id=?',$data);
        
    }
    public function xoabieuthuc($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id=?',[$id]);
    }
    // public function suabieuthuctoanbo($data,$id){
    //     $data[]=$id;
    //     //dd($data);
    //     $bieuthuc=new Bieuthuc();
    //     DB::update('UPDATE '.$this->table.' SET loaipheptoan_id=?,vetruoc=?,vesau=?,motabieuthuc=? WHERE id=?',$data);
    //     $table=$this->table;
    //     $bieuthucupdata=DB::select('SELECT * FROM '.$table.' WHERE id='.$id);
    //     $idbieuthucupdata=$bieuthucupdata[0]->bieuthuc_id;
    //     $danhsachbieuthuc=DB::select('SELECT * FROM '.$table);
    //     foreach($danhsachbieuthuc as $bieuthuc){
    //         if($bieuthuc->vetruoc==$idbieuthucupdata){
    //             $databieuthuc=[
    //                 $bieuthuc->loaipheptoan_id,
    //                 $bieuthuc->vetruoc,
    //                 $bieuthuc->vesau,
    //                 $bieuthuc->motavemotbieuthuc( $bieuthuc->loaipheptoan_id,$bieuthuc->vetruoc,$bieuthuc->vesau)
    //             ];
    //             $bieuthuc->suabieuthuctoanbo($databieuthuc,$bieuthuc->bieuthuc_id);
    //         }
    //         if($bieuthuc->vesau==$idbieuthucupdata){
    //             $databieuthuc=[
    //                 $bieuthuc->loaipheptoan_id,
    //                 $bieuthuc->vetruoc,
    //                 $bieuthuc->vesau,
    //                 $bieuthuc->motavemotbieuthuc( $bieuthuc->loaipheptoan_id,$bieuthuc->vetruoc,$bieuthuc->vesau)
    //             ];
    //             $bieuthuc->suabieuthuctoanbo($databieuthuc,$bieuthuc->bieuthuc_id);
    //         }
    //     }
    // }
    public function xetvetruoc($id){
        $table=$this->table;
        $danhsachid=DB::table($table)
        ->where('vetruoc',"=", $id)
        ->get();
        return $danhsachid;
    }
    public function xetvesau($id){
        $table=$this->table;
        $danhsachid=DB::table($table)
        ->where('vesau',"=", $id)
        ->get();
        return $danhsachid;
       
    }
    public function xetcongthuc($id){
        $table=$this->table;
        $danhsachid=DB::table('congthucs')
        ->where('bieuthuc_id',"=", $id)
        ->get();
        return $danhsachid;
       
    }

}
