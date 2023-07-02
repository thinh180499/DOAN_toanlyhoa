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
                            <th>Tên đơn vị</th>
                            <th>Ký hiệu</th>
                            <th>Loại đơn vị id</th>
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
                                        {{ $donvi->loaidonvi_id }}
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
