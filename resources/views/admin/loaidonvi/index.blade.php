@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h4 class="mb-10">
                @if (!empty($title))
                    {{ $title }}
                @endif
            </h4>

            <div class="table-responsive">
                <a href="{{ route('admin.loaidonvi.create') }}" class="btn btn-success mb-4">Thêm loại đơn vị</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên loại đơn vị</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_loaidonvi))
                            @foreach ($list_loaidonvi as $loaidonvi)
                                <tr>
                                    <th scope="row">
                                        {{ $loaidonvi->id }}
                                    </th>
                                    <td>
                                        {{ $loaidonvi->tenloaidonvi }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.loaidonvi.edit',['loaidonvi' => $loaidonvi->id]) }}" class="btn btn-info">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.loaidonvi.destroy', ['loaidonvi' => $loaidonvi->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Xóa</button>
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
