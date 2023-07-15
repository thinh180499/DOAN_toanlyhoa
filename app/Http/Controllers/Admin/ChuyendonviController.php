<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donvi;

use App\Models\Chuyendonvi;


class ChuyendonviController extends Controller
{
    private $donvi;

    private $chuyendonvi;
    public function __construct(){
        $this->donvi=new Donvi();
        $this->chuyendonvi=new Chuyendonvi();
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
        $list_chuyendonvi=$this->chuyendonvi->danhsachchuyendonvipag();
        if($key=request()->key){
            $list_chuyendonvi=$this->chuyendonvi->timdanhsachchuyendonvipag($key);
        }
        $title="danh sách chuyển đơn vị";
        return view('admin.chuyendonvi.index',compact('list_chuyendonvi','list_donvi','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_donvi=$this->donvi->danhsachdonvitheoloai();
        $title="Thêm chuyển đơn vị";
        return view('admin.chuyendonvi.create',compact('list_donvi','title'));
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

            'hesonhan'=>'required',
            'tudonvi'=>'required',
            'dendonvi'=>'required',
        ],[
            'hesonhan.required'=>'* hệ số nhân bắt buộc phải nhập',
            'tudonvi.required'=>'* ký tự bắt buộc phải nhập',
            'dendonvi.required'=>'* loại đơn vi bắt buộc phải nhập',

        ]);
        $data=[
            $request->hesonhan,
            $request->tudonvi,
            $request->dendonvi,
        ];
        //dd($data);
        $kiemtra=$this->chuyendonvi->kiemtrachuyendonvi( $request->tudonvi, $request->dendonvi);
        //dd(empty($kiemtra[0]));
        if(empty($kiemtra)){
            $this->chuyendonvi->themchuyendonvi($data);
            $msgthanhcong="thêm chuyển đơn vị thành công";
        }
        $msgthanhcong="thêm chuyển đơn vị thành công";
        $kiemtra=$this->chuyendonvi->kiemtrachuyendonvi( $request->dendonvi,  $request->tudonvi);
        //dd($kiemtra);
        if(empty($kiemtra)){
            $data=[
                1/$request->hesonhan,
                $request->dendonvi,
                $request->tudonvi,
            ];
            //dd($data);
            $this->chuyendonvi->themchuyendonvi($data);
            $msgthanhcong=$msgthanhcong."và nghịch chuyển đơn vị thành công";
        }

        return redirect()->route('admin.chuyendonvi.index')->with('msgthanhcong');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->chuyendonvi->chitietchuyendonvi($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chuyendonvi=$this->chuyendonvi->chitietchuyendonvi($id);
        //dd($chuyendonvi);
        $title="sửa chuyển đơn vi";
        $chuyendonvi=$chuyendonvi[0];
        $list_donvi=$this->donvi->danhsachdonvi();
        return view('admin.chuyendonvi.edit',compact('list_donvi','chuyendonvi','title'));
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

            'hesonhan'=>'required',
            'tudonvi'=>'required',
            'dendonvi'=>'required',
        ],[
            'hesonhan.required'=>'* hệ số nhân bắt buộc phải nhập',
            'tudonvi.required'=>'* ký tự bắt buộc phải nhập',
            'dendonvi.required'=>'* loại đơn vi bắt buộc phải nhập',

        ]);
        $data=[
            $request->hesonhan,
            $request->tudonvi,
            $request->dendonvi,
        ];
        $this->chuyendonvi->suachuyendonvi($data,$id);

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
        $this->chuyendonvi->xoachuyendonvi($id);
        $title="danh sách chuyển đơn vị";
        return redirect()->route('admin.chuyendonvi.index',compact('title'));
    }
}
