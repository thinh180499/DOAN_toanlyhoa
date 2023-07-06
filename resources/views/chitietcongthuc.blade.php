@extends('layouts.layout')

@section('title', '')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-5 congthuc">
            <div class="card-style cardform h-100">
                <div class="mt-1 mb-80">
                    <h3 class="mb-4">Trong đó</h3>
                    <ul>
                        <li>n: số mol (mol)</li>
                        <li>m: khối lượng chất (gam)</li>
                        <li>M: khối lượng Mol (gam/mol)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-7 tinhtoan">
            <div class="card-style cardform h-100">
                <h2 class="mb-4">Tính số mol theo khối lượng:</h2>

                <form action="moltheokhoiluong" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="container-fluid mb-5">
                        <div class="row justify-content-center">
                            <div class="col-auto border rounded-lg p-3 d-flex align-items-center">
                                <div class="me-3">
                                    <span>n = </span>
                                </div>
                                <div>
                                    <span>m</span>
                                    <hr>
                                    <span>M</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container mb-4">
                        <div class="row d-flex flex-column">
                            <div class="col">
                                <div class="input-style-1">
                                    <label for="somolchattan">m: Khối lượng chất (gam)</label>
                                    <input type="number" id="somolchattan" name="a"
                                        placeholder="Nhập khối lượng chất" class="input" step="any"
                                        value="{{ isset($a) && is_numeric($a) ? $a : old('a') }}" />
                                    @error('a')
                                        <p class="text-danger fs-6 mt-2">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col mb-4">
                                <div class="input-style-1">
                                    <label for="thetichdungdich">M: Khối lượng mol (gam/mol)</label>
                                    <input type="number" id="thetichdungdich" name="b"
                                        placeholder="Nhập khối lượng mol" class="input" step="any"
                                        value="{{ isset($b) && is_numeric($b) ? $b : old('b') }}" />
                                    @error('b')
                                        <p class="text-danger fs-6 mt-2">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col d-flex align-items-center">
                                <button class="btn btn-primary me-5 py-0 px-4 calculate" type="submit">=</button>
                                <span>
                                    {!! isset($ketqua) ? $ketqua . ' (mol)' : false !!}
                                </span>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col lythuyet">
            <div class="mb-30">
                <h2 class="mb-30">Lý thuyết</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In ratione vel, eveniet sunt inventore nemo
                    debitis deleniti quisquam aliquid tenetur, earum maxime vitae id molestiae expedita quasi dolorum!
                    Consequatur, provident?</p>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .container {
            max-width: 500px;
        }

        hr {
            border: none;
            height: 2px;
            background: rgb(137, 137, 137);
        }
    </style>
@endsection
