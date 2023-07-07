@extends('layouts.client')


@section('content')
    <div class="row mt-4">
        <div class="col tinhtoan">
            <div class="card-style cardform h-100">
                <div class="container">
                    <form action="{{ route('khoiluong') }}" method="post" id="input-form">
                        @csrf
                        <h2 class="mb-5">Chuyển đổi đơn vị độ dài</h2>

                        {{-- Phần đơn vị gốc --}}
                        <div class="row mb-4 d-flex flex-wrap justify-content-center">
                            {{-- input nhập --}}
                            <div class="col-xl-6 input-style-1">
                                <label>Từ</label>
                                <input type="number" name="a" id="input-number"
                                    value="{{ !empty($a) ? $a : false }}">
                            </div>

                            {{-- select gốc --}}
                           <div class="col-xl-6 select-style-1">
                                <label>&nbsp;</label>
                                <div class="select-position">
                                    <select name="i" id="select-from">
                                        @if (!empty($list_donvi))
                                            @foreach ($list_donvi as $donvi)
                                                <option value="{{ $donvi->id }}">
                                                    {{ $donvi->tendonvi . ' ' . $donvi->kyhieu }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <i class="lni lni-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 d-flex text-center ">
                            <i class="lni lni-arrows-horizontal conversion-icon"></i>
                        </div>

                        {{-- Phần đơn vị đích --}}
                        <div class="row mb-4 d-flex flex-wrap justify-content-center">
                            {{-- input kết quả --}}
                            <div class="col-xl-6 input-style-1">
                                <label>Chuyển đổi sang</label>
                                <input type="number" id="result" readonly>
                            </div>

                            {{-- Select đích --}}
                           <div class="col-xl-6 select-style-1">
                                <label>&nbsp;</label>
                                <div class="select-position">
                                    <select name="j" id="select-to">
                                        @if (!empty($list_donvi))
                                            @foreach ($list_donvi as $donvi)
                                                <option value="{{ $donvi->id }}">
                                                    {{ $donvi->tendonvi . ' ' . $donvi->kyhieu }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <i class="lni lni-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .select-style-1 {
            min-width: 50%
        }

        .select-style-1,
        .input-style-1 {
            margin-bottom: 10px
        }

        .select-style-1 .select-position select {
            font-size: 16px;
            padding: 12px 14px;
        }

        .select-style-1 .select-position::after {
            content: none;
        }

        .select-style-1 .select-position i {
            position: absolute;
            top: 17px;
            right: 10px;
        }

        .input-style-1 label,
        .select-style-1 label {
            width: 150%
        }

        i.conversion-icon {
            font-size: 35px;
            font-weight: bold
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Gọi hàm tính toán khi có thay đổi trong thẻ #input-number, thẻ #select-from, thẻ #select-to
            $('#input-number, #select-from, #select-to').on('change keyup', function() {
                unitConversion();
            });

            // Hàm thực hiện chuyển đổi
            function unitConversion() {
                var inputNumber = $('#input-number').val();

                // Kiểm tra ô input có rỗng hay không
                if (inputNumber === '') {
                    $('#result').text(''); // Xóa kết quả trong thẻ span
                    return;
                }

                var formData = $('#input-form').serialize();

                $.ajax({
                    url: '{{ route('khoiluong') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        $('#result').val(response.ketqua);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection
