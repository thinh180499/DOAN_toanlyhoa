@extends('layouts.admin')


@section('content')
    <form action="{{ route('admin.bieuthuc.update', ['bieuthuc' => $bieuthuc->id]) }}" method="post">
        @method('PUT')
        @csrf
        <h2 class="mb-4">
            @if (!empty($title))
                {{ $title }}
            @endif
        </h2>
        <div class="row mb-5">
            <div class="col">
                <label class="control-label mt-3 mt-lg-0">Vế trước</label>
                <div class="vetruoc input-group">
                    <select name="vetruoc" id="selectvetruoc" class="form-control select2-multiple" required>
                        <option value="" selected disabled hidden>Chọn một đối tượng cho vế trước</option>
                        <optgroup label="Đối tượng là khái niệm">
                            @if (!empty($list_khainiem))
                                @foreach ($list_khainiem as $khainiem)
                                    <option <?php
                                    if ($bieuthuc->vetruoc == $khainiem->khainiem_id) {
                                        echo 'selected ';
                                    }
                                    ?> value="{{ $khainiem->khainiem_id }}">
                                        {{ $khainiem->kyhieu . ' - ' . $khainiem->tenkhainiem }}
                                    </option>
                                @endforeach
                            @endif
                        </optgroup>
                        <optgroup label="Đối tượng là hằng số">
                            @if (!empty($list_hangso))
                                @foreach ($list_hangso as $hangso)
                                    <option <?php
                                    if ($bieuthuc->vetruoc == $hangso->hangso_id) {
                                        echo 'selected ';
                                    }
                                    ?> value="{{ $hangso->hangso_id }}">
                                        {{ $hangso->hangso }}
                                    </option>
                                @endforeach
                            @endif
                        </optgroup>
                        <optgroup label="Đối tượng là biểu thức">
                            @if (!empty($list_bieuthuc))
                                @foreach ($list_bieuthuc as $bieuthucfor)
                                    <option <?php
                                    if ($bieuthuc->vetruoc == $bieuthucfor->bieuthuc_id) {
                                        echo 'selected ';
                                    }
                                    ?> value="{{ $bieuthucfor->bieuthuc_id }}">
                                        {{ $bieuthucfor->motabieuthuc }}
                                    </option>
                                @endforeach
                            @endif
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col">
                <label class="control-label mt-3 mt-lg-0">Phép toán</label>
                <select name="loaipheptoan_id" id="selectloaipheptoan" class="form-control select2-multiple">
                    @if (!empty($list_loaipheptoan))
                        @foreach ($list_loaipheptoan as $loaipheptoan)
                            <option <?php
                            if ($loaipheptoan->loaipheptoan_id == $bieuthuc->loaipheptoan_id) {
                                echo 'selected ';
                            }
                            ?> value="{{ $loaipheptoan->loaipheptoan_id }}">
                                {{ $loaipheptoan->loaipheptoan }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col">
                <label class="control-label mt-3 mt-lg-0">Vế sau</label>
                <div class="vesau input-group">
                    <select name="vesau" id="selectvesau" class="form-control select2-multiple" required>
                        <option value="" selected disabled hidden>Chọn một đối tượng cho vế sau</option>
                        <optgroup label="Đối tượng là khái niệm">
                            @if (!empty($list_khainiem))
                                @foreach ($list_khainiem as $khainiem)
                                    <option <?php
                                    if ($bieuthuc->vesau == $khainiem->khainiem_id) {
                                        echo 'selected ';
                                    }
                                    ?> value="{{ $khainiem->khainiem_id }}">
                                        {{ $khainiem->kyhieu . ' - ' . $khainiem->tenkhainiem }}
                                    </option>
                                @endforeach
                            @endif
                        </optgroup>
                        <optgroup label="Đối tượng là hằng số">
                            @if (!empty($list_hangso))
                                @foreach ($list_hangso as $hangso)
                                    <option <?php
                                    if ($bieuthuc->vesau == $hangso->hangso_id) {
                                        echo 'selected ';
                                    }
                                    ?> value="{{ $hangso->hangso_id }}">{{ $hangso->hangso }}
                                    </option>
                                @endforeach
                            @endif
                        </optgroup>
                        <optgroup label="Đối tượng là biểu thức">
                            @if (!empty($list_bieuthuc))
                                @foreach ($list_bieuthuc as $bieuthucfor)
                                    <option <?php
                                    if ($bieuthuc->vesau == $bieuthucfor->bieuthuc_id) {
                                        echo 'selected ';
                                    }
                                    ?> value="{{ $bieuthucfor->bieuthuc_id }}">
                                        {{ $bieuthucfor->motabieuthuc }}
                                    </option>
                                @endforeach
                            @endif
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group now d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5 ml-4">Thêm</button>
                    <a href="{{ route('admin.bieuthuc.index') }}" class="btn btn-light px-5 ml-4">Hủy</a>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('css')
    <!-- Plugin css -->
    <link href="{{ asset('admin1\assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('admin1\assets\libs\switchery\switchery.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin1\assets\libs\select2\select2.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        input.form-control:focus {
            border: 3px solid #458bc4;
            background: #ffffff;
        }

        .select2-container .select2-selection--single {
            height: calc(2em + .9rem + 2px);
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: calc(2em + .9rem + 2px);
            padding-left: 18px;
            padding-right: 30px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(2em + .9rem + 2px);
        }

        /* span ket qua tim kiem select2 */
        .select2-container--default .select2-results>.select2-results__options {
            max-height: 500px;
        }
    </style>
@endsection

@section('script')
    <!-- Vendor js -->
    <script src="{{ asset('admin1\assets\libs\moment\moment.min.js') }}"></script>
    <script src="{{ asset('admin1\assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('admin1\assets\libs\switchery\switchery.min.js') }}"></script>
    <script src="{{ asset('admin1\assets\libs\select2\select2.min.js') }}"></script>
    <script src="{{ asset('admin1\assets\libs\parsleyjs\parsley.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multiple').select2();
        });
    </script>
@endsection
