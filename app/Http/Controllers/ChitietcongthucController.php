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

    public function __construct()
    {

        $mon = new Mon();
        $congthuccuamon = new Congthuccuamon();
        $list_mon = $mon->danhsachmon();
        $list_congthuccuamon = $congthuccuamon->danhsachcongthuccuamonkethop();
        //dd($list_congthuccuamon);
        view()->share(compact('list_mon', 'list_congthuccuamon'));
    }
    public function chitietcongthuc($id)
    {
        $khainiem = new Khainiem();
        $bieuthuc = new Bieuthuc();

        $congthuc = new Congthuc();
        $list_khainiem = $khainiem->danhsachkhainiem();
        $list_bieuthuc = $bieuthuc->danhsachbieuthuc();
        $chitietcongthuc = $congthuc->chitietcongthuc($id);
        $chitietcongthuc = $chitietcongthuc[0];
        //dd($chitietcongthuc);
        $mangkhainiem = [];
        $mangkhainiem = $this->phantukhainiemcuabieuthuc($chitietcongthuc->bieuthuc_id, $mangkhainiem);
        //dd($mangkhainiem);
        return view('chitietcongthuc', compact('list_khainiem', 'list_bieuthuc', 'chitietcongthuc', 'mangkhainiem'));
    }
    public function phantucuabieuthuc($bieuthuc_id, $mangkhainiem)
    {
        $khainiem = new Khainiem();
        $bieuthuc = new Bieuthuc();
        $hangso = new Hangso();
        $chitietbieuthuc = $bieuthuc->chitietbieuthucid($bieuthuc_id);
        //dd($chitietbieuthuc);
        //$mangkhainiem[]=$chitietbieuthuc;
        $chitietbieuthuc = $chitietbieuthuc[0];
        //dd($chitietbieuthuc);
        $vetruoclakhainiem = $khainiem->xacdinhlakhainiemid($chitietbieuthuc->vetruoc);
        //dd($vetruoclakhainiem);
        if (!empty($vetruoclakhainiem)) {
            $vetruoc = $vetruoclakhainiem;
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
            $mangkhainiem = $this->phantucuabieuthuc($vetruoclabieuthuc->bieuthuc_id, $mangkhainiem);
            //dd($vetruoc);
        }


        $vesaulakhainiem = $khainiem->xacdinhlakhainiemid($chitietbieuthuc->vesau);
        if (!empty($vesaulakhainiem)) {
            $vesau = $vesaulakhainiem;
        }
        $vesaulahangso = $hangso->xacdinhlahangsoid($chitietbieuthuc->vesau);
        if (!empty($vesaulahangso)) {
            $vesau = $vesaulahangso->hangso;
        }
        $vesaulabieuthuc = $bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vesau);
        if (!empty($vesaulabieuthuc)) {
            $mangkhainiem   = $this->phantucuabieuthuc($vesaulabieuthuc->bieuthuc_id, $mangkhainiem);
        }


        if ($chitietbieuthuc->loaipheptoan_id == "LPT1") {
            echo "cộng ";
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT2") {
            echo "trừ ";
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT3") {
            echo "nhân ";
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT4") {
            echo "chia ";
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT5") {
            echo "lũy thừa ";
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT6") {
            echo "căn ";
        }
        $mangkhainiem[] = $chitietbieuthuc;
        return $mangkhainiem;
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
                foreach($mangkhainiem as $key){
                    if($key->khainiem_id !=$vetruoclakhainiem->khainiem_id){
                        $mangkhainiem[] = $vetruoclakhainiem;
                    }

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
                foreach($mangkhainiem as $key){
                    if($vesaulakhainiem->khainiem_id !=$key->khainiem_id){
                        $mangkhainiem[] = $vesaulakhainiem;
                        break;
                    }
                }
            }else{
                $mangkhainiem[] = $vesaulakhainiem;
                
            }
            
        }
        $vesaulahangso = $hangso->xacdinhlahangsoid($chitietbieuthuc->vesau);
        if (!empty($vesaulahangso)) {
            $vesau = $vesaulahangso->hangso;
        }
        $vesaulabieuthuc = $bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vesau);
        if (!empty($vesaulabieuthuc)) {
            $mangkhainiem = $this->phantukhainiemcuabieuthuc($vesaulabieuthuc->bieuthuc_id, $mangkhainiem);
        }



        
        return $mangkhainiem;
    }

    public function tinhcongthuc(Request $request, $id)
    {
        $khainiem = new Khainiem();
        $bieuthuc = new Bieuthuc();

        $congthuc = new Congthuc();
        $list_khainiem = $khainiem->danhsachkhainiem();
        $list_bieuthuc = $bieuthuc->danhsachbieuthuc();
        $chitietcongthuc = $congthuc->chitietcongthuc($id);
        $chitietcongthuc = $chitietcongthuc[0];
        //dd($chitietcongthuc);
        //dd($chitietcongthuc);
        $mangkhainiem = [];
        $mangkhainiem = $this->phantukhainiemcuabieuthuc($chitietcongthuc->bieuthuc_id, $mangkhainiem);
        $ketqua = 0;
        $ketqua = $this->ketquacongthuc($chitietcongthuc->bieuthuc_id, $ketqua, $request);
        //dd($mangkhainiem);
        return view('chitietcongthuc', compact('list_khainiem', 'list_bieuthuc', 'chitietcongthuc', 'mangkhainiem','ketqua'));
    }
    public function ketquacongthuc($bieuthuc_id, $ketqua, $request)
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
            $request->validate([
                $vetruoclakhainiem->khainiem_id => 'required|numeric|min:0',
            ]);
            $a = $request->input($vetruoclakhainiem->khainiem_id);
            //dd($vetruoc);
        }
        $vetruoclahangso = $hangso->xacdinhlahangsoid($chitietbieuthuc->vetruoc);
        //dd($vetruoclahangso);
        if (!empty($vetruoclahangso)) {
            $a = $vetruoclahangso->hangso;
            //dd($vetruoc);
        }
        $vetruoclabieuthuc = $bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vetruoc);
        //dd($vetruoclabieuthuc->bieuthuc_id);
        if (!empty($vetruoclabieuthuc)) {
            $a = $this->ketquacongthuc($vetruoclabieuthuc->bieuthuc_id, $ketqua, $request);
            //dd($vetruoc);
        }


        $vesaulakhainiem = $khainiem->xacdinhlakhainiemid($chitietbieuthuc->vesau);
        if (!empty($vesaulakhainiem)) {
            $request->validate([
                $vesaulakhainiem->khainiem_id => 'required|numeric|min:0',
            ]);
            $b = $request->input($vesaulakhainiem->khainiem_id);
        }
        $vesaulahangso = $hangso->xacdinhlahangsoid($chitietbieuthuc->vesau);
        if (!empty($vesaulahangso)) {
            $b = $vesaulahangso->hangso;
        }
        $vesaulabieuthuc = $bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vesau);
        if (!empty($vesaulabieuthuc)) {
            $b = $this->ketquacongthuc($vesaulabieuthuc->bieuthuc_id, $ketqua, $request);
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT1") {
            $ketqua = $a + $b;
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT2") {
            $ketqua = $a - $b;
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT3") {
            $ketqua = $a * $b;
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT4") {
            if($b==0){
                $ketqua="không tính được";
            }else{
                $ketqua = $a / $b;
            }
            
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT5") {
            $ketqua = pow($a, $b);
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT6") {
            $ketqua = pow($a, 1 / $b);
        }

        //dd($ketqua);
        return $ketqua;
    }
}
