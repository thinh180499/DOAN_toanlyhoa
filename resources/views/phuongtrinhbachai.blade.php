@extends('layouts.client')

@section('content')
    <div class="row mt-5">
        <div class="col">
            <div class="card-style cardform">

                <h2>giải phương trình bậc 2:</h2>
                {{-- @if ($errors->any())
                <h2 style="color: red;">
                    vui lòng kiểm tra lại dữ liệu
                </h2>
                 @endif --}}

                <form action="phuongtrinhbachai" method="post">

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="container-fluid mt-4 mb-4">
                        <div class="row justify-content-center">

                            <div class="col-auto border rounded-lg p-3 d-flex align-items-center">
                                <span class="mr-5">ax<sup>2</sup> + bx + c = </span>
                                <span>0</span>
                            </div>

                        </div>
                    </div>


                    <div class="container">
                        <div class="row d-flex flex-column">
                            <div class="col mb-4">
                                <label class="lb" for="ptbac2-a">Hệ số bậc 2, a</label>
                                <input type="number" id="ptbac2-a" name="a" placeholder="Nhập a" class="input"
                                    step="any" value="{{ isset($a) && is_numeric($a) ? $a : old('a') }}" />
                                @error('a')
                                    <p class="text-danger fs-6 mt-2">* {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col mb-4">
                                <label class="lb" for="ptbac2-b">Hệ số bậc 1, b</label>
                                <input type="number" id="ptbac2-b" name="b" placeholder="Nhập b" class="input"
                                    step="any" value="{{ isset($b) && is_numeric($b) ? $b : old('b') }}" />
                                @error('b')
                                    <p class="text-danger fs-6 mt-2">* {{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col mb-4">
                                <label class="lb" for="ptbac2-c">Hệ số tự do, c</label>
                                <input type="number" id="ptbac2-c" name="c" placeholder="Nhập c" class="input"
                                    step="any" value="{{ isset($c) && is_numeric($c) ? $c : old('c') }}" />
                                @error('c')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col d-flex align-items-center mb-4">
                                <button class="btn btn-primary me-5 py-0 px-4 calculate" type="submit">=</button>
                                <span>
                                    {!! isset($ketqua) ? $ketqua : false !!}
                                </span>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .container {

            max-width: 650px;
        }
    </style>
@endsection
