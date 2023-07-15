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
                <a href="{{ route('admin.hinhcuacongthuc.create') }}" class="btn btn-success mb-4">Thêm hình của công thức</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hình</th>
                            <th>Công thức</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_hinhcuacongthuc))
                            @foreach ($list_hinhcuacongthuc as $hinhcuacongthuc)
                                <tr>
                                    <th scope="row">
                                        {{ $hinhcuacongthuc->id }}
                                    </th>

                                    <td>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <img src="{{ asset('images').'/'.$hinhcuacongthuc->img}}">
                                        </form>

                                    </td>
                                    <td>
                                        @if (!empty($list_congthuc))
                                        @foreach ($list_congthuc as $congthuc)
                                            @if($hinhcuacongthuc->congthuc_id == $congthuc->id)
                                                {{$congthuc->tencongthuc}}
                                            @endif

                                        @endforeach
                                    @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.hinhcuacongthuc.edit',['hinhcuacongthuc' => $hinhcuacongthuc->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.hinhcuacongthuc.destroy', ['hinhcuacongthuc' => $hinhcuacongthuc->id]) }}" method="post">
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
                {{ $list_hinhcuacongthuc->appends(Request::except('page'))->links() }}
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        td:nth-child(2) {
          width: 30%;
        }
        td:nth-child(3) {
          width: 25%;
        }
        img {
            width: 24rem;
        }
    </style>
@endsection
