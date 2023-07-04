<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Congthuc;

class CongthucController extends Controller
{
    private $congthuc;
    
    public function __construct(){
        $this->congthuc=new Congthuc();
       // $this->middleware('auth');
       
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $list_congthuc=$this->congthuc->danhsachcongthuc();
        
        $title="danh sách công thức";
        return view('admin.congthuc.index',compact('list_congthuc','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="thêm khái niệm";
        return view('admin.congthuc.create',compact('title'));
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

            'tencongthuc'=>'required',
            'dinhnghia'=>'required',
            'kyhieu'=>'required',
        ],[
            'tencongthuc.required'=>'tên khái niệm bắt buộc phải nhập',
            'dinhnghia.min'=>'định nghĩa bắt buộc phải nhập',
            'kyhieu.required'=>'ký tự bắt buộc phải nhập',
            
        ]);
        
        $data=[
            $request->tencongthuc,
            $request->dinhnghia,
            $request->kyhieu,
        ];
        //dd($data);
        $this->congthuc->themcongthuc($data);
        return redirect()->route('admin.congthuc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->congthuc->chitietcongthuc($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $congthuc=$this->congthuc->chitietcongthuc($id);
        $title="sửa khái niệm";
        $congthuc=$congthuc[0];  
        
        return view('admin.congthuc.edit',compact('congthuc','title'));
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
            'tencongthuc'=>'required|min:5',
            'dinhnghia'=>'required',
            'kyhieu'=>'required',
            
        ],[
            'tencongthuc.required'=>'tên khái niệm bắt buộc phải nhập',
            'tencongthuc.min'=>'tên khái niệm phải hơn 5 ký tự',
            'dinhnghia.required'=>'định nghĩa bắt buộc phải nhập',
            'kyhieu.required'=>'ký hiệu bắt buộc phải nhập',
        ]);
        $data=[
            $request->tencongthuc,
            $request->dinhnghia,
            $request->kyhieu,
        ];
        $this->congthuc->suacongthuc($data,$id);

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
        $this->congthuc->xoacongthuc($id);
        $title="danh sách khái niệm";  
        return redirect()->route('admin.congthuc.index',compact('title'));
    }
    
}
