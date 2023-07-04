@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.hangso.store') }}" method="post">

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
                    <label class="col-md-2 col-form-label" for="hangso">Hằng số</label>
                    <div class="col-md-10">
                        <input name="hangso" type="text" class="form-control" id="hangso" placeholder="Nhập hằng số" value="{{ old('hangso') }}">
                        @error('hangso')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group now d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5">Thêm</button>
                    <a href="{{ route('admin.hangso.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
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
