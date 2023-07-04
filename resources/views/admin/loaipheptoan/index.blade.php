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
                <a href="{{ route('admin.loaipheptoan.create') }}" class="btn btn-success mb-4">Thêm phép toán</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID loại phép toán</th>
                            <th>loại phép toán</th>
                            
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_loaipheptoan))
                            @foreach ($list_loaipheptoan as $loaipheptoan)
                                <tr>
                                    <th scope="row">
                                        {{ $loaipheptoan->id }}
                                    </th>
                                    <th scope="row">
                                        {{ $loaipheptoan->loaipheptoan_id }}
                                    </th>
                                    <td>
                                        {{ $loaipheptoan->loaipheptoan }}
                                    </td>
                                   
                                   
                                    <td>
                                        <a href="{{ route('admin.loaipheptoan.edit',['loaipheptoan' => $loaipheptoan->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.loaipheptoan.destroy', ['loaipheptoan' => $loaipheptoan->id]) }}" method="post">
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
        td:nth-child(5) {
          width: 60%;
        }
    </style>
@endsection
