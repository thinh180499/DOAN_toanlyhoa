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
                            <th>Khái niệm</th>
                            <th>Biểu thức</th>
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
                                        {{ $congthuc->khainiem_id }}
                                    </td>
                                    <td>
                                        {{ $congthuc->bieuthuc_id }}
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
