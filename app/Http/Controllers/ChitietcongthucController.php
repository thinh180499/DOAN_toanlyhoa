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

use App\Models\Donvicuakhainiem;

use App\Models\Hinhcuacongthuc;

class ChitietcongthucController extends Controller
{

    public function __construct(){
        $congthuc =new Congthuc();
       $list_congthuccuavatly=$congthuc->danhsachcongthucvatly();
       $list_congthuccuatoan=$congthuc->danhsachcongthuctoan();
       $list_congthuccuahoa=$congthuc->danhsachcongthuchoa();
        //dd($list_congthuccuamon);
        view()->share(compact('list_congthuccuavatly','list_congthuccuatoan','list_congthuccuahoa'));
    }
    public function chitietcongthuc($id)
    {
        $khainiem = new Khainiem();
        $bieuthuc = new Bieuthuc();
        $hinhcuacongthuc = new Hinhcuacongthuc();
        $congthuc = new Congthuc();

        $list_hinh = $hinhcuacongthuc->danhsachhinhcuacongthuc();
        $list_khainiem = $khainiem->danhsachkhainiem();
        $list_bieuthuc = $bieuthuc->danhsachbieuthuc();
        $chitietcongthuc = $congthuc->chitietcongthuc($id);
        $chitietcongthuc = $chitietcongthuc[0];
        //dd($chitietcongthuc);
        $mangkhainiem = [];
        $mangkhainiem = $this->phantukhainiemcuabieuthuc($chitietcongthuc->bieuthuc_id, $mangkhainiem);
        //dd($mangkhainiem);
        return view('chitietcongthuc', compact('list_hinh','list_khainiem', 'list_bieuthuc', 'chitietcongthuc', 'mangkhainiem'));
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

    public function tinhcongthuc(Request $request, $id)
    {
        $donvicuakhainiem = new Donvicuakhainiem();
        $khainiem = new Khainiem();
        $bieuthuc = new Bieuthuc();
        $hinhcuacongthuc = new Hinhcuacongthuc();
        $congthuc = new Congthuc();
        $list_donvicuakhainiem = $donvicuakhainiem->danhsachdonvicuakhainiemcodonvi();
        $list_khainiem = $khainiem->danhsachkhainiem();
        $list_bieuthuc = $bieuthuc->danhsachbieuthuc();
        $chitietcongthuc = $congthuc->chitietcongthuc($id);
        $chitietcongthuc = $chitietcongthuc[0];

        $list_hinh = $hinhcuacongthuc->danhsachhinhcuacongthuc();
        //dd($chitietcongthuc);
        //dd($chitietcongthuc);
        $mangkhainiem = [];
        $mangkhainiem = $this->phantukhainiemcuabieuthuc($chitietcongthuc->bieuthuc_id, $mangkhainiem);
        $ketqua = 0;
        $ketqua = $this->ketquacongthuc($chitietcongthuc->bieuthuc_id, $ketqua, $request);
        //dd($ketqua);
        return view('chitietcongthuc', compact('list_hinh','list_donvicuakhainiem','list_khainiem', 'list_bieuthuc', 'chitietcongthuc', 'mangkhainiem','ketqua'));
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
            if($vetruoclakhainiem->cotheam){
                $request->validate([
                    $vetruoclakhainiem->khainiem_id => 'required|numeric',
                ]);
            }else{
                $request->validate([
                    $vetruoclakhainiem->khainiem_id => 'required|numeric|min:0',
                ]);
            }

            (float)$a = $request->input($vetruoclakhainiem->khainiem_id);
            //dd($a);
        }
        $vetruoclahangso = $hangso->xacdinhlahangsoid($chitietbieuthuc->vetruoc);
        //dd($vetruoclahangso);
        if (!empty($vetruoclahangso)) {
            (float)$a = $vetruoclahangso->hangso;
            //dd($vetruoc);
        }
        $vetruoclabieuthuc = $bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vetruoc);
        //dd($vetruoclabieuthuc->bieuthuc_id);
        if (!empty($vetruoclabieuthuc)) {
            (float) $a = $this->ketquacongthuc($vetruoclabieuthuc->bieuthuc_id, $ketqua, $request);
            //dd($vetruoc);
        }


        $vesaulakhainiem = $khainiem->xacdinhlakhainiemid($chitietbieuthuc->vesau);
        if (!empty($vesaulakhainiem)) {
            if($vesaulakhainiem->cotheam){
                $request->validate([
                    $vesaulakhainiem->khainiem_id => 'required|numeric',
                ]);
            }else{
                $request->validate([
                    $vesaulakhainiem->khainiem_id => 'required|numeric|min:0',
                ]);
            }

            (float) $b = $request->input($vesaulakhainiem->khainiem_id);
            // dd($b);
        }
        $vesaulahangso = $hangso->xacdinhlahangsoid($chitietbieuthuc->vesau);
        if (!empty($vesaulahangso)) {
            (float)$b = $vesaulahangso->hangso;
        }
        $vesaulabieuthuc = $bieuthuc->xacdinhlabieuthucid($chitietbieuthuc->vesau);
        if (!empty($vesaulabieuthuc)) {
            (float)$b = $this->ketquacongthuc($vesaulabieuthuc->bieuthuc_id, $ketqua, $request);
        }


        if ($chitietbieuthuc->loaipheptoan_id == "LPT1") {
            (float)$ketqua = $a + $b;
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT2") {
            (float)$ketqua = $a - $b;
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT3") {
            (float) $ketqua = $a * $b;
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT4") {
            if($b==0){
                $ketqua="không tính được";
            }else{
                (float)$ketqua = $a / $b;
            }
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT5") {
            (float)$ketqua = pow($a, $b);
        }
        if ($chitietbieuthuc->loaipheptoan_id == "LPT7") {
            (float)$ketqua = pow($a, 1 / $b);

        }
        return $ketqua;
    }
}
