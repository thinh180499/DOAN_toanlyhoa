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
                <a href="{{ route('admin.chuyendonvi.create') }}" class="btn btn-success mb-4">Thêm chuyển đơn vị</a>
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hệ số nhân</th>
                            <th>Từ đơn vị</th>
                            <th>Đến đơn vị</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($list_chuyendonvi))
                            @foreach ($list_chuyendonvi as $chuyendonvi)
                                <tr>
                                    <th scope="row">
                                        {{ $chuyendonvi->id }}
                                    </th>
                                    <td>
                                        {{ $chuyendonvi->hesonhan }}
                                    </td>
                                    <td>
                                        @if (!empty($list_donvi))
                                            @foreach ($list_donvi as $donvi)
                                                @if($chuyendonvi->tudonvi == $donvi->id) 
                                                    {{$donvi->tendonvi}}     
                                                @endif
                                                
                                            @endforeach
                                        @endif
                                        
                                    </td>
                                    <td>
                                        @if (!empty($list_donvi))
                                        @foreach ($list_donvi as $donvi)
                                            @if($chuyendonvi->dendonvi == $donvi->id) 
                                                {{$donvi->tendonvi}}  
                                            @endif
                                            
                                        @endforeach
                                    @endif
                                       
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.chuyendonvi.edit',['chuyendonvi' => $chuyendonvi->id]) }}" class="btn btn-info px-3 mr-2">Sửa</a>
                                        <form class="d-inline-block" action="{{ route('admin.chuyendonvi.destroy', ['chuyendonvi' => $chuyendonvi->id]) }}" method="post">
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
