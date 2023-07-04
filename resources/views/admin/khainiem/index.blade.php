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
                <a href="{{ route('admin.khainiem.create') }}" class="btn btn-success mb-4">Thêm khái niệm</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khái niệm</th>
                            <th>Ký hiệu</th>
                            <th>Định nghĩa</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_khainiem))
                            @foreach ($list_khainiem as $khainiem)
                                <tr>
                                    <th scope="row">
                                        {{ $khainiem->id }}
                                    </th>
                                    <td>
                                        {{ $khainiem->tenkhainiem }}
                                    </td>
                                    <td>
                                        {{ $khainiem->kyhieu }}
                                    </td>
                                    <td>
                                        {{ $khainiem->dinhnghia }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.khainiem.edit',['khainiem' => $khainiem->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.khainiem.destroy', ['khainiem' => $khainiem->id]) }}" method="post">
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
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        td:nth-child(4) {
          width: 55%;
        }
    </style>
@endsection
