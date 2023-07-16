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
                        <a href="{{ route('admin.donvi.create') }}" class="btn btn-success">Thêm loại đơn vị</a>

                        <div class="search d-flex">
                            <input type="text" name="key" class="form-control search-box" placeholder="Tìm kiếm theo tên hoặc ký hiệu của đơn vị ..." value="{{ old('key') }}">
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
                            <th>Tên đơn vị</th>
                            <th>Ký hiệu</th>
                            <th>Loại đơn vị</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_donvi))
                            @foreach ($list_donvi as $donvi)
                                <tr>
                                    <th scope="row">
                                        {{ $donvi->id }}
                                    </th>
                                    <td>
                                        {{ $donvi->tendonvi }}
                                    </td>
                                    <td>
                                        {{ $donvi->kyhieu }}
                                    </td>
                                    <td>
                                        {{ $donvi->tenloaidonvi }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.donvi.edit',['donvi' => $donvi->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.donvi.destroy', ['donvi' => $donvi->id]) }}" method="post">
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
                {{ $list_donvi->appends(Request::except('page'))->links() }}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
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
