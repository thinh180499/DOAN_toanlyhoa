@extends('layouts.client')

{{-- @section('title', '{{ $chitietcongthuc->tencongthuc }}') --}}
@section('content')
    <form action="{{ route('chitietcongthuc', [$chitietcongthuc->id]) }}" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="row mt-4">
            <h2 class="mb-4">{{ $chitietcongthuc->tencongthuc }}</h2>

            <div class="col-lg-6 mb-4 mb-lg-0 congthuc">
                <div class="card-style cardform">
                    <div class="container ct">

                        @if (!empty($list_hinh))
                            @foreach ($list_hinh as $hinh)
                                @if ($chitietcongthuc->id == $hinh->congthuc_id)
                                    <div class="row img">
                                        <img src="{{ asset('images') . '/' . $hinh->img }}">
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        <div class="row congthuc mb-3 mt-3">
                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="spanborder d-flex align-items-center justify-content-center">
                                    @if (!empty($list_khainiem))
                                        @foreach ($list_khainiem as $khainiem)
                                            @if ($chitietcongthuc->khainiem_id == $khainiem->khainiem_id)
                                                <span>{{ $khainiem->kyhieu . ' = ' }}</span>&nbsp;&nbsp;
                                            @endif
                                        @endforeach
                                    @endif
                                    @if (!empty($list_bieuthuc))
                                        @foreach ($list_bieuthuc as $key)
                                            @if ($chitietcongthuc->bieuthuc_id == $key->bieuthuc_id)
                                                <span>{!! $key->htmlbieuthuc !!}</span>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row trongdo mx-auto">
                            <div class="d-flex flex-column">
                                @if (!empty($list_khainiem))
                                    @foreach ($list_khainiem as $khainiem)
                                        @if ($chitietcongthuc->khainiem_id == $khainiem->khainiem_id)
                                            <p>
                                                <strong>{{ $khainiem->kyhieu }}</strong>{{ ': ' . $khainiem->dinhnghia }}
                                            </p>
                                        @endif
                                    @endforeach
                                @endif

                                @if (!empty($mangkhainiem))
                                    @foreach ($mangkhainiem as $key)
                                        <p>
                                            <strong>{{ $key->kyhieu }}</strong>{{ ': ' . $key->dinhnghia }}
                                        </p>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 mb-lg-0 tinhtoan">
                <div class="card-style cardform">
                    <div class="container tt">

                        @if (!empty($mangkhainiem))
                            @foreach ($mangkhainiem as $key)
                                <div class="row input-style-1">
                                    <label>{{ $key->tenkhainiem . ' (' . $key->kyhieu . ') ' }}</label>

                                    <input type="number" name="{{ $key->khainiem_id }}"
                                        placeholder="Nhập {{ $key->tenkhainiem }}" class="input" step="any"
                                        value="{{ old($key->khainiem_id) }}" />
                                </div>
                            @endforeach
                        @endif

                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <button class="btn btn-primary me-5 py-0 px-4 calculate" type="submit">=</button>
                                <span>
                                    {!! isset($ketqua) ? $ketqua : false !!}
                                    @if ($errors->any())
                                        <p class="text-danger fs-6">* Kiểm tra dữ liệu nhập</p>
                                    @endif
                                </span>
                                @if (!empty($list_khainiem))
                                    @foreach ($list_khainiem as $khainiem)
                                        @if ($chitietcongthuc->khainiem_id == $khainiem->khainiem_id)
                                            @if (!empty($list_donvicuakhainiem))
                                                @foreach ($list_donvicuakhainiem as $donvicuakhainiem)
                                                    @if ($donvicuakhainiem->khainiem_id == $khainiem->id)
                                                        <span>&nbsp; {{ $donvicuakhainiem->kyhieu }} </span>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@section('css')
    <style>
        .col.congthuc,
        .col.tinhtoan {
            flex: 1;
        }

        .container.ct,
        .container.tt {
            max-width: 620px;
            min-height: 640px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 25px;
        }

        .card-style {
            padding: 40px;
        }

        .spanborder {
            border: 2px solid #aeaeae;
            padding: 25px;
        }

        .row.trongdo div {
            gap: 20px;
        }

        .row.img {
            justify-content: center;
        }

        .row.img img {
            max-width: 31rem;
        }

        hr {
            border: none;
            height: 2px;
            background: rgb(137, 137, 137);
        }
    </style>
@endsection
