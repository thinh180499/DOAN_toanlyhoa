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
                    <label class="col-md-2 col-form-label" for="hesonhan">hệ số nhân</label>
                    <div class="col-md-10">
                        <input name="hesonhan" type="text" class="form-control" id="hesonhan" placeholder="Nhập tên đơn vi" value="{{ old('hesonhan') }}">
                        @error('hesonhan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                
                <select name="tudonvi">
                    @if (!empty($list_donvi))
                        @foreach ($list_donvi as $donvi)
                            <option value="{{ old('donvi')??$donvi->id }}">{{ $donvi->tendonvi}}
                            </option>
                        @endforeach
                    @endif
                </select>
                <select name="dendonvi">
                    @if (!empty($list_donvi))
                        @foreach ($list_donvi as $donvi)
                            <option value="{{ old('donvi')??$donvi->id }}">{{ $donvi->tendonvi}}
                            </option>
                        @endforeach
                    @endif
                </select>
                <div class="form-group now d-flex justify-content-end">
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
