@extends('layouts.client')

{{-- @section('title', '{{ $chitietcongthuc->tencongthuc }}') --}}
@section('content')
    <div class="row mt-4">
        <h2 class="mb-4">{{ $chitietkhainiem->tenkhainiem . ' (' . $chitietkhainiem->kyhieu . ')' }}</h2>

        <div class="col-lg-6 mb-4 mb-lg-0 khainiem">
            <div class="card-style cardform h-100">

                <div class="container kn">
                    <div class="row ctkn">
                        <h3 class="mb-4">Chi tiết khái niệm</h3>
                        @if (!empty($chitietkhainiem))
                            <p>{{ $chitietkhainiem->dinhnghia }}</p>
                        @endif
                    </div>
                    <div class="row knlq">
                        <h5 class="mb-3">Các khái niệm liên quan</h5>
                        @if (!empty($mangkhainiem))
                            @foreach ($mangkhainiem as $khainiem)
                                <p class="mb-1">
                                    <a href="{{ route('chitietkhainiem', [$khainiem->id]) }}">
                                        {{ $khainiem->tenkhainiem . ' (' . $khainiem->kyhieu . ')' }}
                                    </a>
                                </p>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6 mb-4 mb-lg-0 congthuc">
            <div class="card-style cardform h-100">

                <div class="container ct">
                    <div class="row congthuc d-flex flex-column">
                        <h3 class="mb-4">Các công thức tính
                            {{ $chitietkhainiem->tenkhainiem . ' (' . $chitietkhainiem->kyhieu . ')' }}
                        </h3>

                        @if (!empty($list_congthuc))
                            @foreach ($list_congthuc as $congthuc)
                                @if ($chitietkhainiem->khainiem_id == $congthuc->khainiem_id)
                                    @if (!empty($list_bieuthuc))
                                        @foreach ($list_bieuthuc as $bieuthuc)
                                            @if ($congthuc->bieuthuc_id == $bieuthuc->bieuthuc_id)
                                                <div class="mb-5">
                                                    <p class="mb-3">
                                                        {{ $congthuc->tencongthuc . ' (' . $bieuthuc->motabieuthuc . ')' }}
                                                    </p>
                                                    <div class="mx-auto d-flex align-items-center justify-content-center ">
                                                        <div class="spanborder d-flex align-items-center justify-content-center position-relative">
                                                            <a href="{{ route('chitietcongthuc', [$congthuc->id]) }}"
                                                                class="stretched-link">
                                                                <span>
                                                                    {!! $bieuthuc->htmlbieuthuc !!}
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
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
@endsection

@section('css')
    <style>
        .container.kn,
        .container.ct {
            max-width: 620px;
            /* max-height: 640px; */
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
            padding: 10px;
            min-width: 112px;
            transition: all 0.2s ease;
        }

        .spanborder:hover {
            box-shadow: rgba(0, 0, 0, 0.15) 7.4px 9.4px 3.2px;
        }

        .spanborder a {
            color: #5d657b;
        }

        hr {
            border: none;
            height: 2px;
            background: rgb(137, 137, 137);
        }
    </style>
@endsection
