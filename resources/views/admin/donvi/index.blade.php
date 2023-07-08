@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
                <h4 class="mb-10">
                    @if (!empty($title))
                        {{ $title }}
                    @endif
                </h4>
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

            <div class="table-responsive">
                <a href="{{ route('admin.donvi.create') }}" class="btn btn-success mb-4">Thêm loại đơn vị</a>
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
                                        <a href="{{ route('admin.donvi.edit',['donvi' => $donvi->id]) }}" class="btn btn-info">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.donvi.destroy', ['donvi' => $donvi->id]) }}" method="post">
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
