<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donvi;

use App\Models\Loaidonvi;

class DonviController extends Controller
{
    private $donvi;
    public function __construct(){
        $this->donvi=new Donvi();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_donvi=$this->donvi->danhsachdonvitheoloai();
        $title="danh sách đơn vị";
        return view('admin.donvi.index',compact('list_donvi','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaidonvi=new Loaidonvi();
        $list_loaidonvi=$loaidonvi->danhsachloaidonvi();
        $title="Thêm đơn vị";
        return view('admin.donvi.create',compact('list_loaidonvi','title'));
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

            'tendonvi'=>'required',
            'kyhieu'=>'required',
            'loaidonvi'=>'required',
        ],[
            'tendonvi.required'=>'* tên khái niệm bắt buộc phải nhập',
            'kyhieu.required'=>'* ký tự bắt buộc phải nhập',
            'loaidonvi.required'=>'* loại đơn vi bắt buộc phải nhập',

        ]);
        $data=[
            $request->tendonvi,
            $request->kyhieu,
            $request->loaidonvi,
        ];
        //dd($data);
        $this->donvi->themdonvi($data);
        return redirect()->route('admin.donvi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->donvi->chitietdonvi($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donvi=$this->donvi->chitietdonvi($id);
        $title="Sửa đơn vị";
        $donvi=$donvi[0];
        $loaidonvi=new Loaidonvi();
        $list_loaidonvi=$loaidonvi->danhsachloaidonvi();
        return view('admin.donvi.edit',compact('list_loaidonvi','donvi','title'));
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

            'tendonvi'=>'required',
            'kyhieu'=>'required',
            'loaidonvi'=>'required',
        ],[
            'tendonvi.required'=>'* tên khái niệm bắt buộc phải nhập',
            'kyhieu.required'=>'* ký tự bắt buộc phải nhập',
            'loaidonvi.required'=>'* loại đơn vi bắt buộc phải nhập',

        ]);
        
        $data=[
            $request->tendonvi,
            $request->kyhieu,
            $request->loaidonvi,
        ];
        //dd($data);
        $this->donvi->suadonvi($data,$id);

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
        $donviupdata = $this->donvi->chitietdonvi($id);
        
        $iddonviupdata = $donviupdata[0];
        
        
        $kiemtra = $this->donvi->xettudonvi($iddonviupdata->id);
        if (!empty($kiemtra[0]->id)) {
            return  redirect()->route('admin.donvi.index')->with('msgloi', 'sửa không thành công vì đơn vị này tồn tại trong chuyển đơn vi');
        }
        $kiemtra = $this->donvi->xetdendonvi($iddonviupdata->id);
        if (!empty($kiemtra[0]->id)) {
            return  redirect()->route('admin.donvi.index')->with('msgloi', 'sửa không thành công vì đơn vị này tồn tại trong chuyển đơn vi');
        }
        $this->donvi->xoadonvi($id);
        $title="danh sách đơn vị";
        return redirect()->route('admin.donvi.index',compact('title'))->with('msgthanhcong', 'sửa thành công');
    }
}
