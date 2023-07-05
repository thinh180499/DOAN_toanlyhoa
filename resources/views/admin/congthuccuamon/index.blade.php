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
                <a href="{{ route('admin.congthuccuamon.create') }}" class="btn btn-success mb-4">Thêm công thức của môn</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Môn</th>
                            <th>Công thức</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_congthuccuamon))
                            @foreach ($list_congthuccuamon as $congthuccuamon)
                                <tr>
                                    <th scope="row">
                                        {{ $congthuccuamon->id }}
                                    </th>

                                    <td>
                                        @if (!empty($list_mon))
                                            @foreach ($list_mon as $mon)
                                                @if($congthuccuamon->mon_id == $mon->id)
                                                    {{$mon->tenmon}}
                                                @endif

                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        @if (!empty($list_congthuc))
                                        @foreach ($list_congthuc as $congthuc)
                                            @if($congthuccuamon->congthuc_id == $congthuc->id)
                                                {{$congthuc->tencongthuc}}
                                            @endif

                                        @endforeach
                                    @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.congthuccuamon.edit',['congthuccuamon' => $congthuccuamon->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.congthuccuamon.destroy', ['congthuccuamon' => $congthuccuamon->id]) }}" method="post">
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
