<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mon;

class MonController extends Controller
{
    private $mon;
    public function __construct(){
        $this->mon=new Mon();
       // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_mon=$this->mon->danhsachmon();

        $title="danh sách môn";
        return view('admin.mon.index',compact('list_mon','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm môn";
        return view('admin.mon.create',compact('title'));
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
            'tenmon'=>'required',
        ],[
            'tenmon.required'=>'* tên môn bắt buộc phải nhập',
        ]);
        //dd( $request->mon);
        $data=[
            $request->tenmon,
        ];
       //dd($data);
        $this->mon->themmon($data);
        return redirect()->route('admin.mon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->mon->chitietmon($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mon=$this->mon->chitietmon($id);
        $title="Sửa môn";
        $mon=$mon[0];

        return view('admin.mon.edit',compact('mon','title'));
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
            'tenmon'=>'required',
        ],[
            'tenmon.required'=>'tên môn bắt buộc phải nhập',

        ]);
        $data=[
            $request->tenmon,
        ];
        $this->mon->suamon($data,$id);

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
        $this->mon->xoamon($id);
        $title="danh sách khái niệm";
        return redirect()->route('admin.mon.index',compact('title'));
    }
}
