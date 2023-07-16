@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4">
                @if (!empty($title))
                    {{ $title }}
                @endif
            </h2>

            <div class="table-responsive">
                <form action="" class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" name="key" class="form-control" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <a href="{{ route('admin.donvicuakhainiem.create') }}" class="btn btn-success mb-4">Thêm đơn vị của khái niệm</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Khái niệm</th>
                            <th>Đơn vị</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_donvicuakhainiem))
                            @foreach ($list_donvicuakhainiem as $donvicuakhainiem)
                                <tr>
                                    <th scope="row">
                                        {{ $donvicuakhainiem->id }}
                                    </th>

                                    <td>
                                        @if (!empty($list_khainiem))
                                            @foreach ($list_khainiem as $khainiem)
                                                @if($donvicuakhainiem->khainiem_id == $khainiem->id)
                                                    {{$khainiem->tenkhainiem}}
                                                @endif

                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        @if (!empty($list_donvi))
                                        @foreach ($list_donvi as $donvi)
                                            @if($donvicuakhainiem->donvi_id == $donvi->id)
                                                {{$donvi->tendonvi}}
                                            @endif

                                        @endforeach
                                    @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.donvicuakhainiem.edit',['donvicuakhainiem' => $donvicuakhainiem->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.donvicuakhainiem.destroy', ['donvicuakhainiem' => $donvicuakhainiem->id]) }}" method="post">
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
                {{ $list_donvicuakhainiem->appends(Request::except('page'))->links() }}
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        td:nth-child(4) {
          width: 45%;
        }
    </style>
@endsection
