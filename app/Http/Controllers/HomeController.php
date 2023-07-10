<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donvi;
use App\Models\Chuyendonvi;
use App\Models\Congthuc;

class HomeController extends Controller
{
    public function __construct(){
        $congthuc =new Congthuc();
       $list_congthuccuavatly=$congthuc->danhsachcongthucvatly();
       $list_congthuccuatoan=$congthuc->danhsachcongthuctoan();
       $list_congthuccuahoa=$congthuc->danhsachcongthuchoa();
        //dd($list_congthuccuamon);
        view()->share(compact('list_congthuccuavatly','list_congthuccuatoan','list_congthuccuahoa'));
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
        $list_donvi = $donvi->danhsachdonvicuadodai();
       
        return view('dodai',compact('list_donvi'));
    }
    public function doidodai(Request $request){
        $request->validate([
            'a'=>'required|numeric|min:0',
        ],[
            'a.required'=>'độ dài bắt buộc phải nhập',
            'a.numeric'=>'độ dài điện buộc phải là số',
            'a.min'=>'độ dài phải lớn hơn 0',
        ]);
         $a = $request->input('a');
         $i = $request->input('i');
         $j = $request->input('j');
        // $a=6;
        // $i=2;
        // $j=3;
       
       
        $chuyendonvi= new Chuyendonvi();
        $ketqua=$chuyendonvi->chuyendonvithanh($a,$i,$j);
        //dd($ketqua);
        return response()->json(['ketqua' => $ketqua]);
    }
    public function thetich(){
        $donvi= new Donvi();
        
        $chuyendonvi= new Chuyendonvi();
        $list_donvi = $donvi->danhsachdonvicuathetich();
       
        return view('thetich',compact('list_donvi'));
    }
    public function doithetich(Request $request){
        $request->validate([
            'a'=>'required|numeric|min:0',
        ],[
            'a.required'=>'độ dài bắt buộc phải nhập',
            'a.numeric'=>'độ dài điện buộc phải là số',
            'a.min'=>'độ dài phải lớn hơn 0',
        ]);
         $a = $request->input('a');
         $i = $request->input('i');
         $j = $request->input('j');
        // $a=6;
        // $i=2;
        // $j=3;
       
       
        $chuyendonvi= new Chuyendonvi();
        $ketqua=$chuyendonvi->chuyendonvithanh($a,$i,$j);
        //dd($ketqua);
        return response()->json(['ketqua' => $ketqua]);
    }
    public function khoiluong(){
        $donvi= new Donvi();
        
        $chuyendonvi= new Chuyendonvi();
        $list_donvi = $donvi->danhsachdonvicuakhoiluong();
       
        return view('khoiluong',compact('list_donvi'));
    }
    public function doikhoiluong(Request $request){
        $request->validate([
            'a'=>'required|numeric|min:0',
        ],[
            'a.required'=>'độ dài bắt buộc phải nhập',
            'a.numeric'=>'độ dài điện buộc phải là số',
            'a.min'=>'độ dài phải lớn hơn 0',
        ]);
         $a = $request->input('a');
         $i = $request->input('i');
         $j = $request->input('j');
        // $a=6;
        // $i=2;
        // $j=3;
       
       
        $chuyendonvi= new Chuyendonvi();
        $ketqua=$chuyendonvi->chuyendonvithanh($a,$i,$j);
        //dd($ketqua);
        return response()->json(['ketqua' => $ketqua]);
    }
    //phương trình bậc 2
    public function phuongtrinhbachai(){
        return view('phuongtrinhbachai');
    }
    public function tinhphuongtrinhbachai(Request $request){
        $request->validate([
            'a'=>'required|numeric',
            'b'=>'required|numeric',
            'c'=>'required|numeric',
            ],[
            'a.required'=>'a bắt buộc phải nhập',
            'a.numeric'=>'a buộc phải là số',
            'b.required'=>'b bắt buộc phải nhập',
            'b.numeric'=>'b bắt buộc phải là số',
            'c.required'=>'c bắt buộc phải nhập',
            'c.numeric'=>'c bắt buộc phải là số',
        ]);
        $a=$_POST['a'];
        $b=$_POST['b'];
        $c=$_POST['c'];


        //giải phương trình
        if($a==0 && $b==0 && $c==0)
        {
            $ketqua="Phương trình: " . $a . "x2 + " . $b . "x + " . $c . " = 0";
            return view('phuongtrinhbachai',compact('ketqua'));
        }
        if ($a == 0) {
            if ($b == 0) {
                $ketqua="Phương trình vô nghiệm!";
            } else {
                $ketqua="Phương trình có một nghiệm: " . "x = " . (- $c / $b);
            }
            return view('phuongtrinhbachai',compact('ketqua','a','b','c'));
        }
        $delta = $b * $b - 4 * $a * $c;
        $x1 = "";
        $x2 = "";
        if ($delta > 0) {
            $x1 = (- $b + sqrt ( $delta )) / (2 * $a);
            $x2 = (- $b - sqrt ( $delta )) / (2 * $a);
            $ketqua= ("Phương trình có 2 nghiệm là: " . "x1 = " . $x1 . " và x2 = " . $x2);
        } else if ($delta == 0) {
            $x1 = (- $b / (2 * $a));
            $ketqua= ("Phương trình có nghiệm kép: x1 = x2 = " . $x1);
        } else {
            $ketqua= ("Phương trình vô nghiệm!");
        }
        return view('phuongtrinhbachai',compact('ketqua','a','b','c'));

    }
//phương trình bậc 1
public function phuongtrinhbacnhat(){
    return view('phuongtrinhbacnhat');
}
public function tinhphuongtrinhbacnhat(Request $request){
    $request->validate([
        'a'=>'required|numeric',
        'b'=>'required|numeric',
        ],[
        'a.required'=>'a bắt buộc phải nhập',
        'a.numeric'=>'a buộc phải là số',
        'b.required'=>'b bắt buộc phải nhập',
        'b.numeric'=>'b bắt buộc phải là số',
        
    ]);
    $a=$_POST['a'];
    $b=$_POST['b'];
    if($a==0){
        $ketqua="phương trình vô nghiệm";
        return view('phuongtrinhbacnhat',compact('ketqua','a','b'));
    }
    //tính kết quả
    $ketqua=-$b/$a;
    //xét kết quả là số vô hạn
    if(is_infinite($ketqua)){
        $ketqua="kết quả vượt qua giới hạn tính";
        return view('phuongtrinhbacnhat',compact('ketqua','a','b'));
    }
    else{
        $ketqua="x=".$ketqua;
        return view('phuongtrinhbacnhat',compact('ketqua','a','b'));
    }
   
}
    
}
