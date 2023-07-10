@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
                <h4 class="mb-10">
                    @if (!empty($title))
                        {{ $title }}
                    @endif
                </h4>
                @if (session('msgthanhcong'))
                    <div class="alert alert-icon alert-info text-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <i class="mdi mdi-information mr-2"></i>
                        <strong>Thông báo: </strong>
                        {{ session('msgthanhcong') }}
                    </div>
                @endif
                @if (session('msgloi'))
                    <div class="alert alert-icon alert-danger text-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <i class="mdi mdi-block-helper mr-2"></i>
                        <strong>Thông báo: </strong>
                        {{ session('msgloi') }}
                    </div>
                @endif
            </div>


            <div class="table-responsive">
                <a href="{{ route('admin.bieuthuc.create') }}" class="btn btn-success mb-4">Thêm biểu thức</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID biểu thức</th>
                            <th>loại phép toán</th>
                            <th>Vế trước</th>
                            <th>Vế sau</th>
                            <th>Mô tả</th>
                            <th>Mô tả HTMl</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_bieuthuc))
                            @foreach ($list_bieuthuc as $bieuthuc)
                                <tr>
                                    <th scope="row">
                                        {{ $bieuthuc->id }}
                                    </th>
                                    <td>
                                        {{ $bieuthuc->bieuthuc_id }}
                                    </td>

                                    @if (!empty($list_loaipheptoan))
                                        @foreach ($list_loaipheptoan as $loaipheptoan)
                                            @if ($bieuthuc->loaipheptoan_id == $loaipheptoan->loaipheptoan_id)
                                                <td>
                                                    {{ $loaipheptoan->loaipheptoan }}
                                                </td>
                                            @endif
                                        @endforeach
                                    @endif



                                    <td>
                                        @if (!empty($list_khainiem))
                                            @foreach ($list_khainiem as $khainiem)
                                                @if ($khainiem->khainiem_id == $bieuthuc->vetruoc)
                                                    {{ $khainiem->kyhieu }}
                                                @endif
                                            @endforeach
                                        @endif
                                        @if (!empty($list_hangso))
                                            @foreach ($list_hangso as $hangso)
                                                @if ($bieuthuc->vetruoc == $hangso->hangso_id)
                                                    {{ $hangso->hangso }}
                                                @endif
                                            @endforeach
                                        @endif
                                        @if (!empty($list_bieuthuc))
                                            @foreach ($list_bieuthuc as $key)
                                                @if ($bieuthuc->vetruoc == $key->bieuthuc_id)
                                                    {!! $key->motabieuthuc !!}
                                                @endif
                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        @if (!empty($list_khainiem))
                                            @foreach ($list_khainiem as $khainiem)
                                                @if ($bieuthuc->vesau == $khainiem->khainiem_id)
                                                    {{ $khainiem->kyhieu }}
                                                @endif
                                            @endforeach
                                        @endif
                                        @if (!empty($list_hangso))
                                            @foreach ($list_hangso as $hangso)
                                                @if ($bieuthuc->vesau == $hangso->hangso_id)
                                                    {{ $hangso->hangso }}
                                                @endif
                                            @endforeach
                                        @endif
                                        @if (!empty($list_bieuthuc))
                                            @foreach ($list_bieuthuc as $key)
                                                @if ($bieuthuc->vesau == $key->bieuthuc_id)
                                                    {!! $key->motabieuthuc !!}
                                                @endif
                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        {!! $bieuthuc->motabieuthuc !!}
                                    </td>
                                    <td>
                                        {!! $bieuthuc->htmlbieuthuc !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.bieuthuc.edit', ['bieuthuc' => $bieuthuc->id]) }}"
                                            class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block"
                                            action="{{ route('admin.bieuthuc.destroy', ['bieuthuc' => $bieuthuc->id]) }}"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger px-3">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- end table row -->
                            @endforeach
                        @else
                            <tr>
                                <td class="min-width">không có lý thuyết</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('css')
    <style>
        .phanso {
            display: inline-block;
        }

        .phanso>span {
            display: block;
            padding-top: 2px;
        }

        .phanso span.vetruoc {
            text-align: center;
        }
        
        .phanso span.vesau {
            border-top: thin solid black;
            text-align: center;
        }
    </style>
@endsection
