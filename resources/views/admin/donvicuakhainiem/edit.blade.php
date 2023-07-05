@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.donvicuakhainiem.update',['donvicuakhainiem' => $donvicuakhainiem->id]) }}" method="post">
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

                <select name="khainiem">
                    @if (!empty($list_khainiem))
                        @foreach ($list_khainiem as $khainiem)
                            <option <?php if ($donvicuakhainiem->khainiem_id == $khainiem->id) {
                                echo 'selected ';
                            } ?>value="{{ old('khainiem')??$khainiem->id }}">{{ $khainiem->tenkhainiem." - ".$khainiem->kyhieu}}
                            </option>
                        @endforeach
                    @endif
                </select>
                <select name="donvi">
                    @if (!empty($list_donvi))
                        @foreach ($list_donvi as $donvi)
                            <option <?php if ($donvicuakhainiem->donvi_id == $donvi->id) {
                                echo 'selected ';
                            } ?>value="{{ old('donvi')??$donvi->id }}">{{ $donvi->tendonvi}}
                            </option>
                        @endforeach
                    @endif
                </select>
                <div class="form-group now d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5">sửa</button>
                    <a href="{{ route('admin.donvicuakhainiem.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
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


