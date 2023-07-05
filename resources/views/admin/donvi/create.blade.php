@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.donvi.store') }}" method="post">

        @csrf

        <!-- ========== tables-wrapper start ========== -->
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb-10">
                    @if (!empty($title))
                        {{ $title }}
                    @endif
                    @if (!empty($msr))
                        {{ $msr }}
                    @endif
                </h4>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="tendonvi">Tên đơn vị</label>
                    <div class="col-md-10">
                        <input name="tendonvi" type="text" class="form-control" id="tendonvi"
                            placeholder="Nhập tên đơn vi" value="{{ old('tendonvi') }}">
                        @error('tendonvi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="kyhieu">Ký hiệu</label>
                    <div class="col-md-10">
                        <input name="kyhieu" type="text" class="form-control" id="kyhieu" placeholder="Nhập ký hiệu"
                            value="{{ old('kyhieu') }}">
                        @error('kyhieu')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Loại đơn vị</label>
                    <div class="col-md-10">
                        <select name="loaidonvi" class="form-control">
                            @if (!empty($list_loaidonvi))
                                @foreach ($list_loaidonvi as $loaidonvi)
                                    <option value="{{ old('loaidonvi') ?? $loaidonvi->id }}">{{ $loaidonvi->tenloaidonvi }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group now d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5">Thêm</button>
                    <a href="{{ route('admin.donvi.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
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
