<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Congthuccuamon;
use App\Models\Mon;
use App\Models\Congthuc;
use App\Models\Donvicuakhainiem;
use App\Models\Khainiem;
use App\Models\Bieuthuc;

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
        //$list_donvichuakhainiem=$donvicuakhainiem->donvitheokhainiem($id);
        return view('chitietkhainiem', compact('list_bieuthuc','list_congthuc', 'chitietkhainiem'));
    }
}
