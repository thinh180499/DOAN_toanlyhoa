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
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khái niệm</th>
                            <th>Định nghĩa</th>
                            <th>Ký hiệu</th>
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
                                        {{ $khainiem->dinhnghia }}
                                    </td>
                                    <td>
                                        {{ $khainiem->kyhieu }}
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info">Sửa</a>
                                        <form class="d-inline-block" action="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger">Xóa</button>
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
