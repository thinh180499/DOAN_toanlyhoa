<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donvi;
use App\Models\Chuyendonvi;
use App\Models\Congthuccuamon;
use App\Models\Mon;
use App\Models\Congthuc;
use App\Models\Bieuthuc;
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
        //$ketqua=$this->bieuthuc();
        return view('chitietcongthuc',compact('list_khainiem','list_bieuthuc','chitietcongthuc'));
    }
    // public function bieuthuc($bieuthuc_id,){

    // }
}
