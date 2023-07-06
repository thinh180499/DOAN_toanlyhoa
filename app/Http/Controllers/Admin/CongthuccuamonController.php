<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Congthuc;

use App\Models\Mon;
use App\Models\Congthuccuamon;

class CongthuccuamonController extends Controller
{
    private $congthuc;

    private $congthuccuamon;
    public function __construct(){
        $this->congthuc=new Congthuc();
        $this->congthuccuamon=new Congthuccuamon();
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mon=new Mon();
        $list_mon=$mon->danhsachmon();
        $list_congthuc=$this->congthuc->danhsachcongthuc();
        $list_congthuccuamon=$this->congthuccuamon->danhsachcongthuccuamon();
        $title="Danh sách công thức của môn";
        return view('admin.congthuccuamon.index',compact('list_congthuccuamon','list_congthuc','list_mon','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mon=new Mon();
        $list_mon=$mon->danhsachmon();
        $list_congthuc=$this->congthuc->danhsachcongthuc();
        $title="Thêm công thức của môn";
        return view('admin.congthuccuamon.create',compact('list_mon','list_congthuc','title'));
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
            'mon'=>'required',
            'congthuc'=>'required',
        ],[
            'mon.required'=>'* tên môn bắt buộc phải chọn',
            'congthuc.required'=>'* công thức bắt buộc phải chọn',

        ]);
        $data=[
            $request->mon,
            $request->congthuc,
        ];
        $this->congthuccuamon->themcongthuccuamon($data);
        return redirect()->route('admin.congthuccuamon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->congthuccuamon->chitietcongthuccuamon($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $congthuccuamon=$this->congthuccuamon->chitietcongthuccuamon($id);
        //dd($congthuccuamon);
        $mon=new Mon();
        $list_mon=$mon->danhsachmon();
        $title="Sửa công thức của môn";
        $congthuccuamon=$congthuccuamon[0];
        $list_congthuc=$this->congthuc->danhsachcongthuc();
        return view('admin.congthuccuamon.edit',compact('list_mon','list_congthuc','congthuccuamon','title'));
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
            'mon'=>'required',
            'congthuc'=>'required',
        ],[
            'mon.required'=>'* tên môn bắt buộc phải chọn',
            'congthuc.required'=>'* công thức bắt buộc phải chọn',

        ]);
        $data=[
            $request->mon,
            $request->congthuc,
        ];
        $this->congthuccuamon->suacongthuccuamon($data,$id);

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
        $this->congthuccuamon->xoacongthuccuamon($id);
        $title="Danh sách công thức của môn";
        return redirect()->route('admin.congthuccuamon.index',compact('title'));
    }
}
