@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
                <h2 class="mb-4">
                    @if (!empty($title))
                        {{ $title }}
                    @endif
                </h2>
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

            <div id="datatable-buttons_filter" class="dataTables_filter mb-4">
                <form action="">
                    <div class="input-group d-flex justify-content-between">
                        <a href="{{ route('admin.bieuthuc.create') }}" class="btn btn-success">Thêm biểu thức</a>

                        <div class="search d-flex">
                            <input type="text" name="key" class="form-control search-box" placeholder="Tìm kiếm theo vế trước và vế sau..." value="{{ old('key') }}">
                            <button class="btn btn-info" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
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
                                        @if (!empty($list_bieuthucall))
                                            @foreach ($list_bieuthucall as $key)
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
                                        @if (!empty($list_bieuthucall))
                                            @foreach ($list_bieuthucall as $key)
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
                {{ $list_bieuthuc->appends(Request::except('page'))->links() }}
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

        .search {
            width: 33%;
            margin-right: 1rem;
        }

        .search button {
            width: 15%;
        }

        input.search-box {
            display: inline-block;
        }
    </style>
@endsection
