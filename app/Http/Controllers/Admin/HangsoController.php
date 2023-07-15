<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hangso;

use App\Models\Bieuthuc;

class HangsoController extends Controller
{
    private $hangso;
    public function __construct(){
        $this->middleware('auth');
        $this->hangso=new Hangso();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_hangso=$this->hangso->danhsachhangsopag();
        $title="danh sách các hằng số";
        return view('admin.hangso.index',compact('list_hangso','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm hằng số";
        return view('admin.hangso.create',compact('title'));
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
            'hangso'=>'required',
        ],[
            'hangso.required'=>'* hằng số bắt buộc phải nhập',
        ]);
        //dd( $request->hangso);
        $data=[
            $this->hangso->layidcuoidanhsach(),
            $request->hangso,
        ];
       //dd($data);
       $kiemtra=$this->hangso->trunghangso( $request->hangso);
       //dd(!empty($kiemtra));
       if(!empty($kiemtra)){
        return redirect()->route('admin.hangso.index')->with('msgloi', 'thêm không thành công vì hằng số đã tồn tại');;
       }

        $this->hangso->themhangso($data);
        return redirect()->route('admin.hangso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->hangso->chitiethangso($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hangso=$this->hangso->chitiethangso($id);
        $title="sửa hằng số";
        $hangso=$hangso[0];

        return view('admin.hangso.edit',compact('hangso','title'));
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
        $bieuthuc=new Bieuthuc();
        $request->validate([
            'hangso'=>'required',
        ],[
            'hangso.required'=>'tên khái niệm bắt buộc phải nhập',

        ]);
        $data=[
            $request->hangso,
        ];
        $hangsoupdata=$this->hangso->chitiethangso($id);

        $idhangsoupdata=$hangsoupdata[0]->hangso_id;
        $vetruoc=$bieuthuc->xetvetruoc($idhangsoupdata);

        $vesau=$bieuthuc->xetvesau($idhangsoupdata);
        if(!empty($vetruoc[0]->id)){
            return  redirect()->route('admin.hangso.index')->with('msgloi', 'sửa không thành công vì hằng số này tồn tại trong biểu thức khác');;
        }

        if(!empty($vesau[0]->id)){
            return  redirect()->route('admin.hangso.index')->with('msgloi', 'sửa không thành công vì hằng số này tồn tại trong biểu thức khác');;
        }
        //dd($hangsoupdata);
        $this->hangso->suahangso($data,$id);

        return  redirect()->route('admin.hangso.index')->with('msgthanhcong', 'sửa thành công');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bieuthuc=new Bieuthuc();
        $hangsoupdata=$this->hangso->chitiethangso($id);

        $idhangsoupdata=$hangsoupdata[0]->hangso_id;
        $vetruoc=$bieuthuc->xetvetruoc($idhangsoupdata);

        $vesau=$bieuthuc->xetvesau($idhangsoupdata);
        if(!empty($vetruoc[0]->id)){
            return  redirect()->route('admin.hangso.index')->with('msgloi', 'xóa không thành công vì hằng số này tồn tại trong biểu thức khác');;
        }

        if(!empty($vesau[0]->id)){
            return  redirect()->route('admin.hangso.index')->with('msgloi', 'xóa không thành công vì hằng số này tồn tại trong biểu thức khác');;
        }
        //dd($hangsoupdata);
        $this->hangso->xoahangso($id);

        return  redirect()->route('admin.hangso.index')->with('msgthanhcong', 'xóa thành công');;


    }
}
