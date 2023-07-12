<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Congthuccuamon;
use App\Models\Mon;
use App\Models\Congthuc;
use App\Models\Donvicuakhainiem;
use App\Models\Khainiem;
use App\Models\Bieuthuc;
use App\Models\Hangso;


class ChitietkhainiemController extends Controller
{
    public function __construct(){
        $congthuc =new Congthuc();
       $list_congthuccuavatly=$congthuc->danhsachcongthucvatly();
       $list_congthuccuatoan=$congthuc->danhsachcongthuctoan();
       $list_congthuccuahoa=$congthuc->danhsachcongthuchoa();
        //dd($list_congthuccuamon);
        view()->share(compact('list_congthuccuavatly','list_congthuccuatoan','list_congthuccuahoa'));
    }
    public function chitietkhainiem($id)
    {
        $bieuthuc = new Bieuthuc();
        $khainiem = new Khainiem();
        $donvicuakhainiem = new Donvicuakhainiem();
        $congthuc = new Congthuc();
        $list_congthuc = $congthuc->danhsachcongthuc();
        $list_bieuthuc = $bieuthuc->danhsachbieuthuc();
        $chitietkhainiem=$khainiem->chitietkhainiem($id);
        //dd($list_congthuc );
        $chitietkhainiem=$chitietkhainiem[0];
        $mangkhainiem = [];
        //dd($chitietkhainiem->khainiem_id);
        $list_congthuccuakhainiem = $congthuc->danhsachcongthuccuakhainiem($chitietkhainiem->khainiem_id);
        //dd($list_congthuccuakhainiem);
        foreach($list_congthuccuakhainiem as $congthuc)
        {
            $mangkhainiem = $this->phantukhainiemcuabieuthuc($congthuc->bieuthuc_id, $mangkhainiem);
        }
       
        //$list_donvichuakhainiem=$donvicuakhainiem->donvitheokhainiem($id);
        return view('chitietkhainiem', compact('list_bieuthuc','list_congthuc', 'chitietkhainiem','mangkhainiem'));
    }
    public function phantukhainiemcuabieuthuc($bieuthuc_id, $mangkhainiem)
    {
        $khainiem = new Khainiem();
        $bieuthuc = new Bieuthuc();
        $hangso = new Hangso();
        $chitietbieuthuc = $bieuthuc->chitietbieuthucid($bieuthuc_id);
        //$mangkhainiem[]=$chitietbieuthuc;
        $chitietbieuthuc = $chitietbieuthuc[0];

        $vetruoclakhainiem = $khainiem->xacdinhlakhainiemid($chitietbieuthuc->vetruoc);
        //dd($vetruoclakhainiem);
        if (!empty($vetruoclakhainiem)) {
            if(!empty($mangkhainiem))
            {
                
                $khongtontai=1;
                foreach($mangkhainiem as $key){
                    if($key->khainiem_id == $vetruoclakhainiem->khainiem_id){
                        $khongtontai=0;
                        break;
                    }
                }
                if($khongtontai){
                    $mangkhainiem[] = $vetruoclakhainiem;
                }
            }else{
                $mangkhainiem[] = $vetruoclakhainiem;
            }
           
            //dd($vetruoc);
        }
        $vetruoclahangso = $hangso->xacdinhlahangsoid($chitietbieuthuc->vetruoc);
        //dd($vetruoclahangso);
        if (!empty($vetruoclahangso)) {
            $vetruoc = $vetruoclahangso->hangso;
           //dd($vetruoc);
        }
        $vetruoclabieuthuc = $bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vetruoc);
        //dd($vetruoclabieuthuc->bieuthuc_id);
        if (!empty($vetruoclabieuthuc)) {
            $mangkhainiem = $this->phantukhainiemcuabieuthuc($vetruoclabieuthuc->bieuthuc_id, $mangkhainiem);
            //dd($vetruoc);
        }


        $vesaulakhainiem = $khainiem->xacdinhlakhainiemid($chitietbieuthuc->vesau);
        if (!empty($vesaulakhainiem)) {
            if(!empty($mangkhainiem))
            {
                $khongtontai=1;
                foreach($mangkhainiem as $key){
                    if($vesaulakhainiem->khainiem_id == $key->khainiem_id){
                        $khongtontai=0;
                        break;
                    }
                }
                if($khongtontai){
                    $mangkhainiem[] = $vesaulakhainiem;
                }
            }else{
                $mangkhainiem[] = $vesaulakhainiem;
                //dd($mangkhainiem);
            }
            
        }
        $vesaulahangso = $hangso->xacdinhlahangsoid($chitietbieuthuc->vesau);
        if (!empty($vesaulahangso)) {
            $vesau = $vesaulahangso->hangso;
            //dd($vesau);
        }
        $vesaulabieuthuc = $bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vesau);
        if (!empty($vesaulabieuthuc)) {
            $mangkhainiem = $this->phantukhainiemcuabieuthuc($vesaulabieuthuc->bieuthuc_id, $mangkhainiem);
        }

        return $mangkhainiem;
    }
}
