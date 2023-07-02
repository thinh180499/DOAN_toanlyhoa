<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Congthuc;
use App\Models\Bieuthuc;
use App\Models\Loaipheptoan;
use App\Models\Doituong;
use App\Models\Doituonglabieuthuc;
use App\Models\Doituonglahangso;
use App\Models\Doituonglakhainiem;
use App\Models\Khainiem;

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
        $title="danh sách môn";
        return view('admin.congthuc.index',compact('list_congthuc','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $bieuthuc=new Bieuthuc();
        $doituong=new Doituong();
        $doituonglabieuthuc=new Doituonglabieuthuc();
        $doituonglahangso=new Doituonglahangso();
        $doituonglakhainiem=new Doituonglakhainiem();

        //chi tiết công thức
        $list_chitietcongthuc=$this->congthuc->chitietcongthuc($id);

        //chi tiết biểu thức
        $list_chitietbieuthuc=$bieuthuc->chitietbieuthuc($list_chitietcongthuc->bieuthuc_id);

        //xác định đối tượng vế trái
        $vetrai=$doituong->chitietdoituong($list_chitietbieuthuc->vetrai);
        if($vetrai->loaidoituong_id==1){
            $chitietvetrai=$doituonglakhainiem->chitiet($vetrai->id);
        }
        if($vetrai->loaidoituong_id=2){
            $chitietvetrai=$doituonglahangso->chitiet($vetrai->id);
        }
        if($vetrai->loaidoituong_id=3){
            $chitietvetrai=$doituonglabieuthuc->chitiet($vetrai->id);
        }


        //xác định đối tượng vế phải
        $vephai=$doituong->chitietdoituong($list_chitietbieuthuc->vephai);
        if($vephai->loaidoituong_id==1){
            $chitietvephai=$doituonglakhainiem->chitiet($vephai->id);
        }
        if($vephai->loaidoituong_id=2){
            $chitietvephai=$doituonglahangso->chitiet($vephai->id);
        }
        if($vephai->loaidoituong_id=3){
            $chitietvephai=$doituonglabieuthuc->chitiet($vephai->id);
        }
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
