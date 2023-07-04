<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaipheptoan;

class LoaipheptoanController extends Controller
{
    private $loaipheptoan;
    public function __construct(){
        $this->middleware('auth');
        $this->loaipheptoan=new Loaipheptoan();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_loaipheptoan=$this->loaipheptoan->danhsachloaipheptoan();
        $title="danh sách các hằng số";
        return view('admin.loaipheptoan.index',compact('list_loaipheptoan','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="thêm phép tính";
        return view('admin.loaipheptoan.create',compact('title'));
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

            'loaipheptoan'=>'required',
        ],[
            'loaipheptoan.required'=>'tên loại phép toán bắt buộc phải nhập',
        ]);
        
        $data=[
            $this->loaipheptoan->layidcuoidanhsach(),
            $request->loaipheptoan,
        ];
        //dd($data);
        $this->loaipheptoan->themloaipheptoan($data);
        return redirect()->route('admin.loaipheptoan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->loaipheptoan->chitietloaipheptoan($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaipheptoan=$this->loaipheptoan->chitietloaipheptoan($id);
        $title="sửa phép tính";
        $loaipheptoan=$loaipheptoan[0];  
        
        return view('admin.loaipheptoan.edit',compact('loaipheptoan','title'));
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
            'loaipheptoan'=>'required',
            
            
        ],[
            'loaipheptoan.required'=>'tên loại phép toán bắt buộc phải nhập',
            
        ]);
        $data=[
            $request->loaipheptoan,
        ];
        //dd($data);
        $this->loaipheptoan->sualoaipheptoan($data,$id);

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
        $this->loaipheptoan->xoaloaipheptoan($id);
        $title="danh sách khái niệm";  
        return redirect()->route('admin.loaipheptoan.index',compact('title'));
    }
}
