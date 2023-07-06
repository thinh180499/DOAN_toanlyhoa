<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donvi;
use App\Models\Chuyendonvi;
use App\Models\Congthuccuamon;
use App\Models\Mon;

class HomeController extends Controller
{
    public function __construct(){
        
        $mon=new Mon();
        $congthuccuamon=new Congthuccuamon();
        $list_mon=$mon->danhsachmon();
        $list_congthuccuamon=$congthuccuamon->danhsachcongthuccuamonkethop();
        //dd($list_congthuccuamon);
        view()->share(compact('list_mon','list_congthuccuamon'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dodai(){
        $donvi= new Donvi();
        
        $chuyendonvi= new Chuyendonvi();
        $list_donvi = $donvi->danhsachdonvi();
        $a=6;
         $i=2;
         $j=3;
         $ketqua=$chuyendonvi->chuyendonvithanh($a,$i,$j);
        //dd($ketqua);
        return view('dodai',compact('list_donvi'));
    }
    public function doidodai(Request $request){
        $request->validate([
            'a'=>'required|numeric|min:0.00000000000000000000001',
        ],[
            'a.required'=>'độ dài bắt buộc phải nhập',
            'a.numeric'=>'độ dài điện buộc phải là số',
            'a.min'=>'độ dài phải lớn hơn 0.00000000000000000000001',
        ]);
        $a = $request->input('a');
        $i = $request->input('i');
        $j = $request->input('j');
        $donvi= new Donvi();
        $ketqua=$donvi->chuyendonvi($a,$i,$j);
        return response()->json(['ketqua' => $ketqua]);
    }
    
}
