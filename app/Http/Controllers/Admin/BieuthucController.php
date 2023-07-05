<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bieuthuc;

use App\Models\Khainiem;

use App\Models\Loaipheptoan;

use App\Models\Hangso;

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
        $khainiem=new Khainiem();
        $hangso=new Hangso();
        $loaipheptoan=new Loaipheptoan();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_hangso=$hangso->danhsachhangso();
        $list_loaipheptoan=$loaipheptoan->danhsachloaipheptoan();
        $list_bieuthuc=$this->bieuthuc->danhsachbieuthuc();
        //dd($list_bieuthuc);
        $title="danh sách biểu thức";
        return view('admin.bieuthuc.index',compact('list_khainiem','list_hangso','list_loaipheptoan','list_bieuthuc','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khainiem=new Khainiem();
        $hangso=new Hangso();
        $loaipheptoan=new Loaipheptoan();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_hangso=$hangso->danhsachhangso();
        $list_loaipheptoan=$loaipheptoan->danhsachloaipheptoan();
        $list_bieuthuc=$this->bieuthuc->danhsachbieuthuc();
        $title="thêm biểu thức";
        return view('admin.bieuthuc.create',compact('list_khainiem','list_hangso','list_loaipheptoan','list_bieuthuc','title'));
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

            'loaipheptoan_id'=>'required',
            'vetruoc'=>'required',
            'vesau'=>'required',
        ],[
            'loaipheptoan_id.required'=>'tên khái niệm bắt buộc phải nhập',
            'vetruoc.required'=>'định nghĩa bắt buộc phải nhập',
            'vesau.required'=>'ký tự bắt buộc phải nhập',
            
        ]);
        //dd($request->vesau,);
        $data=[
            $this->bieuthuc->layidcuoidanhsach(),
            $request->loaipheptoan_id,
            $request->vetruoc,
            $request->vesau,
            $this->bieuthuc->motavemotbieuthuc( $request->loaipheptoan_id,$request->vetruoc,$request->vesau)
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
        $khainiem=new Khainiem();
        $hangso=new Hangso();
        $loaipheptoan=new Loaipheptoan();
        $list_khainiem=$khainiem->danhsachkhainiem();
        $list_hangso=$hangso->danhsachhangso();
        $list_loaipheptoan=$loaipheptoan->danhsachloaipheptoan();
        $list_bieuthuc=$this->bieuthuc->danhsachbieuthuc();
        $bieuthuc=$this->bieuthuc->chitietbieuthuc($id);
        $title="sửa khái niệm";
        $bieuthuc=$bieuthuc[0];  
        $vetruoc="";
        $vesau="";
        $tenkhainiem=$khainiem->xacdinhlakhainiem($bieuthuc->vetruoc);
        if(!empty($tenkhainiem)){
            $vetruoc=$tenkhainiem;
        }
        $lahangso=$hangso->xacdinhlahangso($bieuthuc->vetruoc);
        if(!empty($lahangso)){
            $vetruoc=$lahangso;
        }
        $motabieuthuc=$this->bieuthuc->xacdinhlabieuthuc($bieuthuc->vetruoc);
        if(!empty($motabieuthuc)){
            $vetruoc=$motabieuthuc;
        }


        $tenkhainiem=$khainiem->xacdinhlakhainiem($bieuthuc->vesau);
        if(!empty($tenkhainiem)){
            $vesau=$tenkhainiem;
        }
        $lahangso=$hangso->xacdinhlahangso($bieuthuc->vesau);
        if(!empty($lahangso)){
            $vesau=$lahangso;
        }
        $motabieuthuc=$this->bieuthuc->xacdinhlabieuthuc($bieuthuc->vesau);
        if(!empty($motabieuthuc)){
            $vesau=$motabieuthuc;
        }
        
        return view('admin.bieuthuc.edit',compact('list_khainiem','list_hangso','list_loaipheptoan','list_bieuthuc','bieuthuc','title','vetruoc','vesau'));
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

            'loaipheptoan_id'=>'required',
            'vetruoc'=>'required',
            'vesau'=>'required',
        ],[
            'loaipheptoan_id.required'=>'tên khái niệm bắt buộc phải nhập',
            'vetruoc.required'=>'định nghĩa bắt buộc phải nhập',
            'vesau.required'=>'ký tự bắt buộc phải nhập',
            
        ]);
        //dd($request->vetruoc,);
        $data=[
            $request->loaipheptoan_id,
            $request->vetruoc,
            $request->vesau,
            $this->bieuthuc->motavemotbieuthuc( $request->loaipheptoan_id,$request->vetruoc,$request->vesau)
        ];
        //dd($data);
        $this->bieuthuc->suabieuthuc($data,$id);

        return  redirect()->route('admin.bieuthuc.index')->with('msr','sửa thành công');
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
