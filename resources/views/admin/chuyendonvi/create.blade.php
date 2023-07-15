@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.chuyendonvi.store') }}" method="post">

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
                    <label class="col-md-2 col-form-label" for="hesonhan">Hệ số nhân</label>
                    <div class="col-md-10">
                        <input name="hesonhan" type="text" class="form-control" id="hesonhan"
                            placeholder="Nhập hệ số nhân" value="{{ old('hesonhan') }}">
                        @error('hesonhan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="tudonvi">Từ đơn vị</label>
                    <div class="col-md-10">
                        <select name="tudonvi" class="form-control">
                            @if (!empty($list_donvi))
                                @foreach ($list_donvi as $donvi)
                                    <option value="{{ old('tudonvi') ?? $donvi->id }}">{{ $donvi->tendonvi }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-5">
                    <label class="col-md-2 col-form-label" for="dendonvi">Đên đơn vị</label>
                    <div class="col-md-10">
                        <select name="dendonvi" class="form-control">
                            @if (!empty($list_donvi))
                                @foreach ($list_donvi as $donvi)
                                    <option value="{{ old('dendonvi') ?? $donvi->id }}">{{ $donvi->tendonvi }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-end pr-3">
                    <button type="submit" class="btn btn-success px-5">Thêm</button>
                    <a href="{{ route('admin.chuyendonvi.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
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
