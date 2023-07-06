<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaidonvi;

class LoaidonviController extends Controller
{
    private $loaidonvi;
    public function __construct(){
        $this->loaidonvi=new Loaidonvi();
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_loaidonvi=$this->loaidonvi->danhsachloaidonvi();

        $title="danh sách loại đơn vị";
        return view('admin.loaidonvi.index',compact('list_loaidonvi','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm loại đơn vị";
        return view('admin.loaidonvi.create',compact('title'));
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
            'tenloaidonvi'=>'required',
        ],[
            'tenloaidonvi.required'=>'* loại đơn vị bắt buộc phải nhập',
        ]);
        //dd( $request->loaidonvi);
        $data=[
            $request->tenloaidonvi,
        ];
       //dd($data);
        $this->loaidonvi->themloaidonvi($data);
        return redirect()->route('admin.loaidonvi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->loaidonvi->chitietloaidonvi($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaidonvi=$this->loaidonvi->chitietloaidonvi($id);
        $title="Sửa loại đơn vị";
        $loaidonvi=$loaidonvi[0];

        return view('admin.loaidonvi.edit',compact('loaidonvi','title'));
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
            'tenloaidonvi'=>'required',
        ],[
            'tenloaidonvi.required'=>'tên loại đơn vị bắt buộc phải nhập',

        ]);
        $data=[
            $request->tenloaidonvi,
        ];
        $this->loaidonvi->sualoaidonvi($data,$id);

        return back()->with('msr','sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->loaidonvi->xoaloaidonvi($id);
        $title="danh sách khái niệm";
        return redirect()->route('admin.loaidonvi.index',compact('title'));
    }
}
