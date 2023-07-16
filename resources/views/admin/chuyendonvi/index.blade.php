@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4">
                @if (!empty($title))
                    {{ $title }}
                @endif
            </h2>

            <div id="datatable-buttons_filter" class="dataTables_filter mb-4">
                <form action="">
                    <div class="input-group d-flex justify-content-between">
                        <a href="{{ route('admin.chuyendonvi.create') }}" class="btn btn-success">Thêm chuyển đơn vị</a>

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
                            <th>Hệ số nhân</th>
                            <th>Từ đơn vị</th>
                            <th>Đến đơn vị</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_chuyendonvi))
                            @foreach ($list_chuyendonvi as $chuyendonvi)
                                <tr>
                                    <th scope="row">
                                        {{ $chuyendonvi->id }}
                                    </th>
                                    <td>
                                        {{ $chuyendonvi->hesonhan }}
                                    </td>
                                    <td>
                                        @if (!empty($list_donvi))
                                            @foreach ($list_donvi as $donvi)
                                                @if($chuyendonvi->tudonvi == $donvi->id)
                                                    {{$donvi->tendonvi}}
                                                @endif

                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        @if (!empty($list_donvi))
                                        @foreach ($list_donvi as $donvi)
                                            @if($chuyendonvi->dendonvi == $donvi->id)
                                                {{$donvi->tendonvi}}
                                            @endif

                                        @endforeach
                                    @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.chuyendonvi.edit',['chuyendonvi' => $chuyendonvi->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.chuyendonvi.destroy', ['chuyendonvi' => $chuyendonvi->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger px-3" >Xóa</button>
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
                {{ $list_chuyendonvi->appends(Request::except('page'))->links() }}
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


