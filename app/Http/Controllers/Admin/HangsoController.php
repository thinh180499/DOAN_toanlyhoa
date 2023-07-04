<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hangso;

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
        $list_hangso=$this->hangso->danhsachhangso();
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

        $data=[
            $this->hangso->layidcuoidanhsach(),
            $request->hangso,
        ];
        //dd($data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
