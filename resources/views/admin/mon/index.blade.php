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
                <a href="{{ route('admin.mon.create') }}" class="btn btn-success mb-4">Thêm môn</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên môn</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_mon))
                            @foreach ($list_mon as $mon)
                                <tr>
                                    <th scope="row">
                                        {{ $mon->id }}
                                    </th>
                                    <td>
                                        {{ $mon->tenmon }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.mon.edit',['mon' => $mon->id]) }}" class="btn btn-info">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.mon.destroy', ['mon' => $mon->id]) }}" method="post">
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
