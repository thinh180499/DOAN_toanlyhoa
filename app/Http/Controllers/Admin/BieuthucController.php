<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bieuthuc;

class BieuthucController extends Controller
{
    private $bieuthuc;
    public function __construct(){
        $this->middleware('auth');
        $this->bieuthuc=new Bieuthuc();
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_bieuthuc=$this->bieuthuc->danhsachbieuthuc();
        //dd($list_bieuthuc);
        $title="danh sách khái niệm";
        return view('admin.bieuthuc.index',compact('list_bieuthuc','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="thêm khái niệm";
        return view('admin.bieuthuc.create',compact('title'));
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

            'tenbieuthuc'=>'required',
            'dinhnghia'=>'required',
            'kyhieu'=>'required',
        ],[
            'tenbieuthuc.required'=>'tên khái niệm bắt buộc phải nhập',
            'dinhnghia.min'=>'định nghĩa bắt buộc phải nhập',
            'kyhieu.required'=>'ký tự bắt buộc phải nhập',
            
        ]);
        
        $data=[
            $this->bieuthuc->layidcuoidanhsach(),
            $request->tenbieuthuc,
            $request->dinhnghia,
            $request->kyhieu,
        ];
        //dd($data);
        $this->bieuthuc->thembieuthuc($data);
        return redirect()->route('admin.bieuthuc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->bieuthuc->chitietbieuthuc($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bieuthuc=$this->bieuthuc->chitietbieuthuc($id);
        $title="sửa khái niệm";
        $bieuthuc=$bieuthuc[0];  
        
        return view('admin.bieuthuc.edit',compact('bieuthuc','title'));
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
            'tenbieuthuc'=>'required|min:5',
            'dinhnghia'=>'required',
            'kyhieu'=>'required',
            
        ],[
            'tenbieuthuc.required'=>'tên khái niệm bắt buộc phải nhập',
            'tenbieuthuc.min'=>'tên khái niệm phải hơn 5 ký tự',
            'dinhnghia.required'=>'định nghĩa bắt buộc phải nhập',
            'kyhieu.required'=>'ký hiệu bắt buộc phải nhập',
        ]);
        $data=[
            $request->tenbieuthuc,
            $request->dinhnghia,
            $request->kyhieu,
        ];
        $this->bieuthuc->suabieuthuc($data,$id);

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
        $this->bieuthuc->xoabieuthuc($id);
        $title="danh sách khái niệm";  
        return redirect()->route('admin.bieuthuc.index',compact('title'));
    }
}
