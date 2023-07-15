<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Congthuc;
use App\Models\Hinhcuacongthuc;
class HinhcuacongthucController extends Controller
{
    private $congthuc;

    private $hinhcuacongthuc;
    public function __construct(){
        $this->congthuc=new Congthuc();
        $this->hinhcuacongthuc=new Hinhcuacongthuc();
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_congthuc=$this->congthuc->danhsachcongthuc();
        $list_hinhcuacongthuc=$this->hinhcuacongthuc->danhsachhinhcuacongthucpag();
        $title="Danh sách hình của công thức";
        return view('admin.hinhcuacongthuc.index',compact('list_hinhcuacongthuc','list_congthuc','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_congthuc=$this->congthuc->danhsachcongthuc();
        $title="thêm hình của công thức";
        return view('admin.hinhcuacongthuc.create',compact('list_congthuc','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img'=>'required|mimes:jpg,jpeg,png,gif',
            'congthuc'=>'required',

        ],[
            'img.required'=>'img bắt buộc phải nhập',
            'congthuc.required'=>'công thức bắt buộc phải nhập',
        ]);

        $get_img=$request->file('img');

        $new_img=rand(0,99).'.'.$get_img->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $get_img->move($destinationPath,$new_img);


        $data=[
            $new_img,
            $request->congthuc,
        ];

        $this->hinhcuacongthuc->themhinhcuacongthuc($data);
        return redirect()->route('admin.hinhcuacongthuc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hinhcuacongthuc=$this->hinhcuacongthuc->chitiethinhcuacongthuc($id);
        $title="sửa hình của công thức";
        $hinhcuacongthuc=$hinhcuacongthuc[0];
        $list_congthuc=$this->congthuc->danhsachcongthuc();
        return view('admin.hinhcuacongthuc.edit',compact('list_congthuc','hinhcuacongthuc','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'img'=>'required|mimes:jpg,jpeg,png,gif',
            'congthuc'=>'required',

        ],[
            'img.required'=>'img bắt buộc phải nhập',
            'congthuc.required'=>'công thức bắt buộc phải nhập',
        ]);

        $get_img=$request->file('img');

        $new_img=rand(0,99).'.'.$get_img->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $get_img->move($destinationPath,$new_img);


        $data=[
            $new_img,
            $request->congthuc,
        ];

        $img=$this->hinhcuacongthuc->chitiethinhcuacongthuc($id);
        $img=$img[0]->img;
        unlink('images/'.$img);
        $this->hinhcuacongthuc->suahinhcuacongthuc($data,$id);
        return  redirect()->route('admin.hinhcuacongthuc.index')->with('msgthanhcong', 'sửa thành công');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img=$this->hinhcuacongthuc->chitiethinhcuacongthuc($id);
        $img=$img[0]->img;
        unlink('images/'.$img);
        $this->hinhcuacongthuc->xoahinhcuacongthuc($id);
        return  redirect()->route('admin.hinhcuacongthuc.index')->with('msgthanhcong', 'xóa thành công');;
    }
}
