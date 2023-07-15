@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.hinhcuacongthuc.update', ['hinhcuacongthuc' => $hinhcuacongthuc->id]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
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

                <div class="form-group row mb-5">
                    <label class="col-md-2 col-form-label">Hình hiện tại của công thức</label>
                    <div class="col-md-10">
                        <img src="{{ asset('images') . '/' . $hinhcuacongthuc->img }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Chọn hình muốn sửa</label>
                    <div class="col-md-10">
                        <input type="file" name="img" placeholder="nhập tên hình"
                            value="{{ old('img') ?? $hinhcuacongthuc->img }}">
                        @error('img')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-5">
                    <label class="col-md-2 col-form-label" for="congthuc">Công thức</label>
                    <div class="col-md-10">
                        <select name="congthuc" class="form-control">
                            @if (!empty($list_congthuc))
                                @foreach ($list_congthuc as $congthuc)
                                    <option <?php if ($hinhcuacongthuc->congthuc_id == $congthuc->id) {
                                        echo 'selected ';
                                    } ?>value="{{ old('congthuc') ?? $congthuc->id }}">
                                        {{ $congthuc->tencongthuc }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-end pr-3">
                    <button type="submit" class="btn btn-success px-5">Sửa</button>
                    <a href="{{ route('admin.hinhcuacongthuc.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
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

        img {
            width: 24rem;
        }

    </style>
@endsection
