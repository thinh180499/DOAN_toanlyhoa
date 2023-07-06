<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donvi;
use App\Models\Chuyendonvi;
use App\Models\Congthuccuamon;
use App\Models\Mon;
use App\Models\Congthuc;
use App\Models\Bieuthuc;
use App\Models\Hangso;
use App\Models\Khainiem;

class ChitietcongthucController extends Controller
{
    
    public function __construct(){
       
        $mon=new Mon();
        $congthuccuamon=new Congthuccuamon();
        $list_mon=$mon->danhsachmon();
        $list_congthuccuamon=$congthuccuamon->danhsachcongthuccuamonkethop();
        //dd($list_congthuccuamon);
        view()->share(compact('list_mon','list_congthuccuamon'));
    }
    public function chitietcongthuc($id){
        $khainiem=new Khainiem();
        $bieuthuc=new Bieuthuc();
        
        $congthuc=new Congthuc();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_bieuthuc=$bieuthuc->danhsachbieuthuc();
        $chitietcongthuc=$congthuc->chitietcongthuc($id);
        $chitietcongthuc=$chitietcongthuc[0];
        // $mangkhainiem=[];
        // $mangkhainiem[]=$this->phantucuabieuthuc($chitietcongthuc->bieuthuc_id,$mangkhainiem);
        // dd($mangkhainiem);
        return view('chitietcongthuc',compact('list_khainiem','list_bieuthuc','chitietcongthuc'));
    }
    public function phantucuabieuthuc($bieuthuc_id,$mangkhainiem){
        $khainiem=new Khainiem();
        $bieuthuc=new Bieuthuc();
        $hangso=new Hangso();
        $congthuc=new Congthuc();
        $chitietbieuthuc=$bieuthuc->chitietbieuthucid($bieuthuc_id);
        $chitietbieuthuc=$chitietbieuthuc[0];
        
        $vetruoclakhainiem=$khainiem->xacdinhlakhainiemid($chitietbieuthuc->vetruoc);
        //dd($vetruoclakhainiem);
        if(!empty($vetruoclakhainiem)){
           $vetruoc=$vetruoclakhainiem;
           //dd($vetruoc);
        }
        $vetruoclahangso=$hangso->xacdinhlahangsoid($chitietbieuthuc->vetruoc);
        //dd($vetruoclahangso);
        if(!empty($vetruoclahangso)){
            $vetruoc=$vetruoclahangso->hangso;
            //dd($vetruoc);
        }
        $vetruoclabieuthuc=$bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vetruoc);
        //dd($vetruoclabieuthuc->bieuthuc_id);
        if(!empty($vetruoclabieuthuc)){
            $mangkhainiem[]=$this->phantucuabieuthuc($vetruoclabieuthuc->bieuthuc_id,$mangkhainiem);
            //dd($vetruoc);
        }


        $vesaulakhainiem=$khainiem->xacdinhlakhainiemid($chitietbieuthuc->vesau);
        if(!empty($vesaulakhainiem)){
           $vesau=$vesaulakhainiem;
        }
        $vesaulahangso=$hangso->xacdinhlahangsoid($chitietbieuthuc->vesau);
        if(!empty($vesaulahangso)){
            $vesau=$vesaulahangso->hangso;
        }
        $vesaulabieuthuc=$bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vesau);
        if(!empty($vesaulabieuthuc)){
            $vesau=$this->phantucuabieuthuc($vesaulabieuthuc->bieuthuc_id,$mangkhainiem);
        }


        if($chitietbieuthuc->loaipheptoan_id=="LPT1"){
            echo "cộng";
        }
        if($chitietbieuthuc->loaipheptoan_id=="LPT2"){
            echo "trừ";
        }
        if($chitietbieuthuc->loaipheptoan_id=="LPT3"){
            echo "nhân";
        }
        if($chitietbieuthuc->loaipheptoan_id==" "){
            echo "chia";
        }
        if($chitietbieuthuc->loaipheptoan_id=="LPT5"){
            echo "lũy thừa";
        }
        if($chitietbieuthuc->loaipheptoan_id=="LPT6"){
            echo "căn";
        }
        $mangkhainiem[]=$chitietbieuthuc;
        return $mangkhainiem;
    }
}
