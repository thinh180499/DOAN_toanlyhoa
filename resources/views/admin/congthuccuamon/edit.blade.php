@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.congthuccuamon.update', ['congthuccuamon' => $congthuccuamon->id]) }}" method="post">
        @method('PUT')
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
                    <label class="col-md-2 col-form-label" for="mon">Tên môn</label>
                    <div class="col-md-10">
                        <select name="mon" class="form-control">
                            @if (!empty($list_mon))
                                @foreach ($list_mon as $mon)
                                    <option <?php if ($congthuccuamon->mon_id == $mon->id) {
                                        echo 'selected ';
                                    } ?>value="{{ old('mon') ?? $mon->id }}">{{ $mon->tenmon }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="congthuc">Công thức</label>
                    <div class="col-md-10">
                        <select name="congthuc" class="form-control">
                            @if (!empty($list_congthuc))
                                @foreach ($list_congthuc as $congthuc)
                                    <option <?php if ($congthuccuamon->congthuc_id == $congthuc->id) {
                                        echo 'selected ';
                                    } ?>value="{{ old('congthuc') ?? $congthuc->id }}">
                                        {{ $congthuc->tencongthuc }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group now d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5">sửa</button>
                    <a href="{{ route('admin.congthuccuamon.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
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
