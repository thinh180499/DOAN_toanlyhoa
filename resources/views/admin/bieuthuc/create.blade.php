@extends('layouts.admin')

@section('content')
    <h4 class="mb-4">Thêm biểu thức</h4>
    <div class="row mb-5">
        <div class="col">
            <label class="control-label mt-3 mt-lg-0">Vế trái</label>
            <div class="vetrai input-group">
                <input type="text" id="inputvetrai" class="form-control" readonly>
                <button class="xoainputvetrai btn btn-danger">Xóa</button>
            </div>
        </div>
        <div class="col">
            <label class="control-label mt-3 mt-lg-0">Phép toán</label>
            <select name="loaipheptoan" id="loaipheptoan" class="form-control">
                <option value="none" selected disabled hidden>Chọn một phép toán</option>
                @if (!empty($list_loaipheptoan))
                    @foreach ($list_loaipheptoan as $loaipheptoan)
                        <option value="{{ $loaipheptoan->loaipheptoan_id }}">{{ $loaipheptoan->loaipheptoan }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <label class="control-label mt-3 mt-lg-0">Vế phải</label>
            <div class="vephai input-group">
                <input type="text" id="inputvephai" class="form-control" readonly>
                <button class="xoainputvephai btn btn-danger">Xóa</button>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="doituong col form-group">
            <label class="control-label mt-3 mt-lg-0">Khái niệm</label>
            <select name="khainiem" class="form-control">
                <option value="none" selected disabled hidden>Chọn một khái niệm</option>
                @if (!empty($list_khainiem))
                    @foreach ($list_khainiem as $khainiem)
                        <option value="{{ $khainiem->khainiem_id }}">{{ $khainiem->kyhieu }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="doituong col form-group">
            <label class="control-label mt-3 mt-lg-0">Hằng số</label>
            <select name="hangso" class="form-control">
                <option value="none" selected disabled hidden>Chọn một hằng số</option>
                @if (!empty($list_hangso))
                    @foreach ($list_hangso as $hangso)
                        <option value="{{ $hangso->hangso_id }}">{{ $hangso->hangso }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="doituong col">
            {{-- Chỗ này thay bằng biểu thức --}}
            <label class="control-label mt-3 mt-lg-0">Biểu thức</label>
            <select name="" class="form-control">
                <option value="none" selected disabled hidden>Chọn một biểu thức</option>
                @if (!empty($list_bieuthuc))
                        @foreach ($list_bieuthuc as $bieuthuc)
                            <option value="{{ $bieuthuc->bieuthuc_id }}">{{ $bieuthuc->bieuthuc_id }}
                            </option>
                        @endforeach
                    @endif
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group now d-flex justify-content-end">
                <button class="btn btn-danger px-4" id="resetgiatri">Reset giá trị</button>

                <form action="{{ route('admin.bieuthuc.store') }}" method="post">

                    @csrf
                    {{-- <select name="loaipheptoan" id="loaipheptoansubmit" class="form-control">
                        <option value="{{ $loaipheptoan->loaipheptoan_id }}">{{ $loaipheptoan->loaipheptoan }}
                        </option>
                    </select> --}}
                    <input type="hidden" name="vetruoc" id="inputvetraisubmit">
                    <input type="hidden" name="loaipheptoan_id" id="loaipheptoansubmit">
                    <input type="hidden" name="vesau" id="inputvephaisubmit">
                    <button type="submit" class="btn btn-success px-5 ml-4">Thêm</button>
                </form>

                <a href="{{ route('admin.bieuthuc.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        input.form-control:focus {
            border: 3px solid #458bc4;
            background: #ffffff;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var inputvetrai = $('#inputvetrai');
            var inputvephai = $('#inputvephai');
            var loaipheptoan = $('#loaipheptoan');
            var inputvetraisubmit = $('#inputvetraisubmit');
            var inputvephaisubmit = $('#inputvephaisubmit');
            var loaipheptoansubmit = $('#loaipheptoansubmit');
            var inputhientai;

            inputvetrai.on('click', function() {
                inputhientai = inputvetrai;
            });

            inputvephai.on('click', function() {
                inputhientai = inputvephai;
            });

            document.getElementById('loaipheptoansubmit').value = document.getElementById('loaipheptoan').value;
            $('#loaipheptoan').on('change', function() {
                var inputloaipheptoanvalue = $(this).find("option:selected").val();
                loaipheptoansubmit.val(inputloaipheptoanvalue)
            });


            $('.doituong select').on('change', function() {
                var value = $(this).find("option:selected").text();
                var valuesubmit = $(this).find("option:selected").val();

                if (value !== "") {
                    if (inputhientai) {

                        if (inputhientai == inputvetrai) {
                            inputvetraisubmit.val(valuesubmit)
                        } else if (inputhientai == inputvephai) {
                            inputvephaisubmit.val(valuesubmit)
                        }
                        inputhientai.val(value);
                        inputhientai = null;
                        $(this).prop('selectedIndex',0);
                    } else {
                        alert('Hãy chọn ô bạn muốn nhập trước khi chọn giá trị');
                        $(this).prop('selectedIndex',0);
                    }
                }
            });

            $('.xoainputvetrai').on('click', function() {
                inputvetrai.val('');
                inputvetraisubmit.val('');
            });
            $('.xoainputvephai').on('click', function() {
                inputvephai.val('');
                inputvephaisubmit.val('');
            });

            $('#resetgiatri').on('click', function() {
                inputvetrai.val('');
                inputvetraisubmit.val('');
                inputvephai.val('');
                inputvephaisubmit.val('');
                $('select').val('');
                inputhientai = null;
            });
        });
    </script>
@endsection
