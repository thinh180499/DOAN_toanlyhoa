<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Khainiem;

use App\Models\Bieuthuc;

class KhainiemController extends Controller
{
    private $khainiem;
    public function __construct()
    {
        $this->middleware('auth');
        $this->khainiem = new Khainiem();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_khainiem = $this->khainiem->danhsachkhainiem();
        //dd($list_khainiem);
        $title = "danh sách khái niệm";
        return view('admin.khainiem.index', compact('list_khainiem', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm khái niệm";
        return view('admin.khainiem.create', compact('title'));
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

            'tenkhainiem' => 'required',
            'dinhnghia' => 'required',
            'kyhieu' => 'required',
        ], [
            'tenkhainiem.required' => '* tên khái niệm bắt buộc phải nhập',
            'dinhnghia.required' => '* định nghĩa bắt buộc phải nhập',
            'kyhieu.required' => '* ký tự bắt buộc phải nhập',

        ]);
        if ($request->cotheam) {
            $i = 1;
        } else {
            $i = 0;
        }
        $data = [
            $this->khainiem->layidcuoidanhsach(),
            $request->tenkhainiem,
            $request->dinhnghia,
            $request->kyhieu,
            $i,
        ];
        //dd($data);
        $this->khainiem->themkhainiem($data);
        return redirect()->route('admin.khainiem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->khainiem->chitietkhainiem($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khainiem = $this->khainiem->chitietkhainiem($id);
        $title = "sửa khái niệm";
        $khainiem = $khainiem[0];

        return view('admin.khainiem.edit', compact('khainiem', 'title'));
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
            'tenkhainiem' => 'required|min:5',
            'dinhnghia' => 'required',
            'kyhieu' => 'required',

        ], [
            'tenkhainiem.required' => '* tên khái niệm bắt buộc phải nhập',
            'tenkhainiem.min' => '* tên khái niệm phải hơn 5 ký tự',
            'dinhnghia.required' => '* định nghĩa bắt buộc phải nhập',
            'kyhieu.required' => '* ký hiệu bắt buộc phải nhập',
        ]);
        if ($request->cotheam) {
            $i = 1;
        } else {
            $i = 0;
        }
        $data = [
            $request->tenkhainiem,
            $request->dinhnghia,
            $request->kyhieu,
            $i,
        ];
        $bieuthuc=new Bieuthuc();
        $khainiemupdata = $this->khainiem->chitietkhainiem($id);

        $idkhainiemupdata = $khainiemupdata[0];

        $vetruoc = $bieuthuc->xetvetruoc($idkhainiemupdata->khainiem_id);
        // $kiemtra = $this->khainiem->xetdonvicuakhainiem($idkhainiemupdata->id);
        // if (!empty($kiemtra[0]->id)) {
        //     return  redirect()->route('admin.khainiem.index')->with('msgloi', 'sửa không thành công vì khái niệm này tồn tại trong đơn vị của khái niệm');
        // }
        // //dd($kiemtra);
        $vesau = $bieuthuc->xetvesau($idkhainiemupdata->khainiem_id);
        if (!empty($vetruoc[0]->id)) {
            return  redirect()->route('admin.khainiem.index')->with('msgloi', 'sửa không thành công vì khái niệm này tồn tại trong biểu thức khác');
        }

        if (!empty($vesau[0]->id)) {
            return  redirect()->route('admin.khainiem.index')->with('msgloi', 'sửa không thành công vì khái niệm này tồn tại trong biểu thức khác');
        }
        // $kiemtra = $this->khainiem->xetcongthuc($idkhainiemupdata->khainiem_id);
        // if (!empty($kiemtra[0]->id)) {
        //     return  redirect()->route('admin.khainiem.index')->with('msgloi', 'sửa không thành công vì khái niệm này tồn tại trong công thức');
        // }

        //dd($khainiemupdata);
        $this->khainiem->suakhainiem($data, $id);
        return  redirect()->route('admin.khainiem.index')->with('msgthanhcong', 'sửa thành công');


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
        $khainiemupdata = $this->khainiem->chitietkhainiem($id);

        $idkhainiemupdata = $khainiemupdata[0];

        $vetruoc = $bieuthuc->xetvetruoc($idkhainiemupdata->khainiem_id);
        $kiemtra = $this->khainiem->xetdonvicuakhainiem($idkhainiemupdata->id);
        if (!empty($kiemtra[0]->id)) {
            return  redirect()->route('admin.khainiem.index')->with('msgloi', 'xóa không thành công vì khái niệm này tồn tại trong đơn vị của khái niệm');
        }
        //dd($kiemtra);
        $vesau = $bieuthuc->xetvesau($idkhainiemupdata->khainiem_id);
        if (!empty($vetruoc[0]->id)) {
            return  redirect()->route('admin.khainiem.index')->with('msgloi', 'xóa không thành công vì khái niệm này tồn tại trong biểu thức khác');
        }

        if (!empty($vesau[0]->id)) {
            return  redirect()->route('admin.khainiem.index')->with('msgloi', 'xóa không thành công vì khái niệm này tồn tại trong biểu thức khác');
        }
        $kiemtra = $this->khainiem->xetcongthuc($idkhainiemupdata->khainiem_id);
        if (!empty($kiemtra[0]->id)) {
            return  redirect()->route('admin.khainiem.index')->with('msgloi', 'xóa không thành công vì khái niệm này tồn tại trong công thức');
        }

        //dd($khainiemupdata);
        $this->khainiem->xoakhainiem($id);
        return  redirect()->route('admin.khainiem.index')->with('msgthanhcong', 'xóa thành công');
    }
}
