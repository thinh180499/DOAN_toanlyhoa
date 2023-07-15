@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.congthuc.store') }}" method="post">

        @csrf

        <!-- ========== tables-wrapper start ========== -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-5">
                    @if (!empty($title))
                        {{ $title }}
                    @endif
                    @if (!empty($msr))
                        {{ $msr }}
                    @endif
                </h2>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="tenkhainiem">Tên khái niệm - ký hiệu</label>
                    <div class="col-md-10">
                        <select name="tenkhainiem" class="form-control">
                            @if (!empty($list_khainiem))
                                @foreach ($list_khainiem as $khainiem)
                                    <option value="{{ $khainiem->khainiem_id }}">
                                        {{ $khainiem->tenkhainiem . ' - ' . $khainiem->kyhieu }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('tenkhainiem')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="tencongthuc">Tên công thúc</label>
                    <div class="col-md-10">
                        <input name="tencongthuc" type="text" class="form-control" id="tencongthuc"
                            placeholder="Nhập tên công thúc" value="{{ old('tencongthuc') }}">
                        @error('tencongthuc')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Biểu thức</label>
                    <div class="col-md-10">
                        <select name="bieuthuc" class="form-control">
                            @if (!empty($list_bieuthuc))
                                @foreach ($list_bieuthuc as $bieuthuc)
                                    <option value="{{ $bieuthuc->bieuthuc_id }}">{{ $bieuthuc->motabieuthuc }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('bieuthuc')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-5">
                    <label class="col-md-2 col-form-label">Môn</label>
                    <div class="col-md-10">
                        <select name="mon" class="form-control">

                            <option value="1">Vật lý</option>
                            <option value="2">Toán học</option>
                            <option value="3">Hóa học</option>
                        </select>

                    </div>
                </div>
                <div class="form-group row d-flex justify-content-end pr-3">
                    <button type="submit" class="btn btn-success px-5">Thêm</button>
                    <a href="{{ route('admin.congthuc.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
                </div>
            </div>
        </div>
        <!-- end row -->

        </div>
        <!-- ========== tables-wrapper end ========== -->
    </form>
@endsection

@section('css')
    <style>
        .main-btn {
            padding: 0px 20px;
            height: 46px;
            line-height: 46px;
            max-width: 120px;
        }

        .select-style-1 .select-position::after {
            top: 65%
        }

    </style>
@endsection
