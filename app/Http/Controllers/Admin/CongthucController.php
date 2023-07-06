<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Congthuc;

use App\Models\Bieuthuc;

use App\Models\Khainiem;


class CongthucController extends Controller
{
    private $congthuc;
    
    public function __construct(){
        $this->congthuc=new Congthuc();
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
        
        $khainiem=new Khainiem();
        $bieuthuc=new Bieuthuc();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_bieuthuc=$bieuthuc->danhsachbieuthuc();
        $title="danh sách công thức";
        return view('admin.congthuc.index',compact('list_khainiem','list_bieuthuc','list_congthuc','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khainiem=new Khainiem();
        $bieuthuc=new Bieuthuc();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_bieuthuc=$bieuthuc->danhsachbieuthuc();
        $title="thêm công thức";
        return view('admin.congthuc.create',compact('list_khainiem','list_bieuthuc','title'));
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
            'tencongthuc'=>'required',
            'bieuthuc'=>'required',
        ],[
            'tenkhainiem.required'=>'khái niệm bắt buộc phải nhập',
            'tencongthuc.required'=>'tên công thức bắt buộc phải nhập',
            'bieuthuc.required'=>'biểu thức bắt buộc phải nhập',
            
        ]);
        $data=[
            $request->tenkhainiem,
            $request->bieuthuc,
            $request->tencongthuc,
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
        $congthuc=$congthuc[0];
        //dd($congthuc);
        $khainiem=new Khainiem();
        $bieuthuc=new Bieuthuc();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_bieuthuc=$bieuthuc->danhsachbieuthuc();
        $title="sửa công thức";
        return view('admin.congthuc.edit',compact('list_khainiem','list_bieuthuc','congthuc','title'));
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
            'tenkhainiem'=>'required',
            'tencongthuc'=>'required',
            'bieuthuc'=>'required',
        ],[
            'tenkhainiem.required'=>'khái niệm bắt buộc phải nhập',
            'tencongthuc.required'=>'tên công thức bắt buộc phải nhập',
            'bieuthuc.required'=>'biểu thức bắt buộc phải nhập',
            
        ]);
        $data=[
            $request->tenkhainiem,
            $request->bieuthuc,
            $request->tencongthuc,
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
