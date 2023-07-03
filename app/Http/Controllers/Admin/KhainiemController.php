<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Khainiem;

class KhainiemController extends Controller
{
    private $khainiem;
    public function __construct(){
        $this->middleware('auth');
        $this->khainiem=new Khainiem();
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_khainiem=$this->khainiem->danhsachkhainiem();
        //dd($list_khainiem);
        $title="danh sách khái niệm";
        return view('admin.khainiem.index',compact('list_khainiem','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $title="thêm khái niệm";
        return view('admin.khainiem.create',compact('title'));
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

            'tenkhainiem'=>'required',
            'dinhnghia'=>'required',
            'kytu'=>'required',
        ],[
            'tenkhainiem.required'=>'đơn vi bắt buộc phải nhập',
            'dinhnghia.min'=>'định nghĩa phải hơn 5 ký tự',
            'kytu.required'=>'ký tự bắt buộc phải nhập',
            
        ]);
        $data=[
            $request->tenkhainiem,
            $request->dinhnghia,
            $request->kytu,
        ];
        
        $this->khainiem->themkhainiem($data);
        return redirect()->route('admin.doituong.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->khainiem->chitietkhainiem($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
