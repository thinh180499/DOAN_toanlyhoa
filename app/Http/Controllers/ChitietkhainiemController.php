<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Congthuccuamon;
use App\Models\Mon;
use App\Models\Congthuc;
use App\Models\Donvicuakhainiem;
use App\Models\Khainiem;

class ChitietkhainiemController extends Controller
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
    public function chitietkhainiem($id)
    {
        $khainiem = new Khainiem();
        $donvicuakhainiem = new Donvicuakhainiem();
        $congthuc = new Congthuc();
        $list_congthuc = $congthuc->danhsachcongthuc();
        
        $chitietkhainiem=$khainiem->chitietkhainiem($id);
        //dd($list_congthuc );
        $chitietkhainiem=$chitietkhainiem[0];
        //$list_donvichuakhainiem=$donvicuakhainiem->donvitheokhainiem($id);
        return view('chitietkhainiem', compact('list_congthuc', 'chitietkhainiem'));
    }
}
