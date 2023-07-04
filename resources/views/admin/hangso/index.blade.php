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
                <a href="{{ route('admin.hangso.create') }}" class="btn btn-success mb-4">Thêm hằng số</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID hằng số</th>
                            <th>Hằng số</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_hangso))
                            @foreach ($list_hangso as $hangso)
                                <tr>
                                    <th scope="row">
                                        {{ $hangso->id }}
                                    </th>
                                    <td>
                                        {{ $hangso->hangso_id }}
                                    </td>
                                    <td>
                                        {{ $hangso->hangso }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.hangso.edit',['hangso' => $hangso->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.hangso.destroy', ['hangso' => $hangso->id]) }}" method="post">
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
