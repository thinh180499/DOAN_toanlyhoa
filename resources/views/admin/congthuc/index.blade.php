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
                <a href="{{ route('admin.congthuc.create') }}" class="btn btn-success mb-4">Thêm công thức</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Khái niệm</th>
                            <th>Biểu thức</th>
                            <th>Tên công thức</th>
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
                                        @if (!empty($list_khainiem))
                                            @foreach ($list_khainiem as $khainiem)
                                                @if ($congthuc->khainiem_id == $khainiem->khainiem_id)
                                                    {{ $khainiem->kyhieu }}
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($list_bieuthuc))
                                            @foreach ($list_bieuthuc as $key)
                                                @if ($congthuc->bieuthuc_id == $key->bieuthuc_id)
                                                    {{ $key->motabieuthuc }}
                                                @endif
                                            @endforeach
                                        @endif
                                       
                                    </td>
                                    <td>
                                        {{ $congthuc->tencongthuc }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.congthuc.edit', ['congthuc' => $congthuc->id]) }}" 
                                            class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" 
                                            action="{{ route('admin.congthuc.destroy', ['congthuc' => $congthuc->id]) }}" 
                                            method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-3">Xóa</button>
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
