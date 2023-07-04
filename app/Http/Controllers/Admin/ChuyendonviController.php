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
       // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_donvi=$this->donvi->danhsachdonvitheoloai();
        $list_chuyendonvi=$this->chuyendonvi->danhsachchuyendonvi();
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
        //
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
