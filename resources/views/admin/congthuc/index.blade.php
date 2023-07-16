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
                        <a href="{{ route('admin.congthuc.create') }}" class="btn btn-success">Thêm công thức</a>

                        <div class="search d-flex">
                            <input type="text" name="key" class="form-control search-box" placeholder="Tìm kiếm theo tên công thức..." value="{{ old('key') }}">
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
                            <th>Khái niệm</th>
                            <th>Biểu thức</th>
                            <th>Tên công thức</th>
                            <th>Môn</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_congthuc))
                            @foreach ($list_congthuc as $congthuc)
                                <tr>
                                    <th scope="row">
                                        {{ $congthuc->id }}
                                    </th>
                                    <td>
                                        @if (!empty($list_khainiem))
                                            @foreach ($list_khainiem as $khainiem)
                                                @if ($congthuc->khainiem_id == $khainiem->khainiem_id)
                                                    {{ $khainiem->kyhieu }}
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($list_bieuthuc))
                                            @foreach ($list_bieuthuc as $key)
                                                @if ($congthuc->bieuthuc_id == $key->bieuthuc_id)
                                                    {!! $key->htmlbieuthuc !!}
                                                @endif
                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        {{ $congthuc->tencongthuc }}
                                    </td>
                                    <td>
                                        @if ($congthuc->mon == 1)
                                            Vật lý
                                        @endif
                                        @if ($congthuc->mon == 2)
                                            Toán học
                                        @endif
                                        @if ($congthuc->mon == 3)
                                            Hóa học
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.congthuc.edit', ['congthuc' => $congthuc->id]) }}"
                                            class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block"
                                            action="{{ route('admin.congthuc.destroy', ['congthuc' => $congthuc->id]) }}"
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
                {{ $list_congthuc->appends(Request::except('page'))->links() }}
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
