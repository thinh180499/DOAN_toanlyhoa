@extends('layouts.app')


@section('content')
<form action="{{ route('dodai') }}" method="post" id="input-form">
    @csrf
    <div class="row mb-4 d-flex flex-wrap justify-content-center">
        <h2 class="mb-5">Chuyển đổi đơn vị độ dài</h2>

        {{-- Phần đơn vị gốc --}}
        <div class="col-xxl-5 d-flex">
            {{-- input nhập --}}
            <div class="input-style-1">
                <label>Từ</label>
                <input type="number" name="a" id="input-number"
                    value="{{ !empty($a) ? $a : false }}">
            </div>

            {{-- select gốc --}}
            <div class="select-style-1">
                <label>&nbsp;</label>
                <div class="select-position">
                    <select name="i" id="select-from">
                        @if (!empty($list_donvi))
                        @foreach ($list_donvi as $donvi)
                        <option value="{{ $donvi->kyhieu }}">{{ $donvi->tendonvi." ".$donvi->kyhieu }}</option>
                         @endforeach
                         @endif
                    </select>
                    <i class="lni lni-chevron-down"></i>
                </div>
            </div>
        </div>


        {{-- Phần đơn vị đích --}}
        <div class="col-xxl-5 d-flex">
            {{-- input kết quả --}}
            <div class="input-style-1">
                <label>Chuyển đổi sang</label>
                <input type="number" id="result" readonly>
            </div>

            {{-- Select đích --}}
            <div class="select-style-1">
                <label>&nbsp;</label>
                <div class="select-position">
                    <select name="j" id="select-to">
                        @if (!empty($list_donvi))
                        @foreach ($list_donvi as $donvi)
                        <option value="{{ $donvi->kyhieu }}">{{ $donvi->tendonvi." ".$donvi->kyhieu }}</option>
                         @endforeach
                         @endif
                    </select>
                    <i class="lni lni-chevron-down"></i>
                </div>
            </div>
        </div>

    </div>
</form>
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
                    url: '{{ route('dodai') }}',
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
