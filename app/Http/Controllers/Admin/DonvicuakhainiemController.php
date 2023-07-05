<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donvi;

use App\Models\Khainiem;
use App\Models\Donvicuakhainiem;

class DonvicuakhainiemController extends Controller
{
    private $donvi;
    
    private $donvicuakhainiem;
    public function __construct(){
        $this->donvi=new Donvi();
        $this->donvicuakhainiem=new Donvicuakhainiem();
       // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khainiem=new Khainiem();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_donvi=$this->donvi->danhsachdonvitheoloai();
        $list_donvicuakhainiem=$this->donvicuakhainiem->danhsachdonvicuakhainiem();
        $title="danh sách đơn vị của khái niệm";
        return view('admin.donvicuakhainiem.index',compact('list_donvicuakhainiem','list_donvi','list_khainiem','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $khainiem=new Khainiem();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_donvi=$this->donvi->danhsachdonvitheoloai();
        $title="Thêm chuyển đơn vị";
        return view('admin.donvicuakhainiem.create',compact('list_khainiem','list_donvi','title'));
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

            
            'khainiem'=>'required',
            'donvi'=>'required',
        ],[
          
            'khainiem.required'=>'* ký tự bắt buộc phải nhập',
            'donvi.required'=>'* loại đơn vi bắt buộc phải nhập',

        ]);
        $data=[
            $request->khainiem,
            $request->donvi,
        ];
        $this->donvicuakhainiem->themdonvicuakhainiem($data);
        return redirect()->route('admin.donvicuakhainiem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->donvicuakhainiem->chitietdonvicuakhainiem($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donvicuakhainiem=$this->donvicuakhainiem->chitietdonvicuakhainiem($id);
        //dd($donvicuakhainiem);
        $khainiem=new Khainiem();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $title="sửa đơn vị của khái niệm";
        $donvicuakhainiem=$donvicuakhainiem[0];
        $list_donvi=$this->donvi->danhsachdonvi();
        return view('admin.donvicuakhainiem.edit',compact('list_khainiem','list_donvi','donvicuakhainiem','title'));
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

            
            'khainiem'=>'required',
            'donvi'=>'required',
        ],[
          
            'khainiem.required'=>'* ký tự bắt buộc phải nhập',
            'donvi.required'=>'* loại đơn vi bắt buộc phải nhập',

        ]);
        $data=[
            $request->khainiem,
            $request->donvi,
        ];
        $this->donvicuakhainiem->suadonvicuakhainiem($data,$id);

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
        $this->donvicuakhainiem->xoadonvicuakhainiem($id);
        $title="danh sách chuyển đơn vị";
        return redirect()->route('admin.donvicuakhainiem.index',compact('title'));
    }
}
