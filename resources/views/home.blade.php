@extends('layouts.client')

@section('content')
    @if (!empty($list_mon))
        @foreach ($list_mon as $mon)
            <div class="subject">
                <div class="row p-4">
                    <h2 class="text-start">{{ $mon->tenmon }}</h2>
                </div>


                <div class="row">
                    @if (!empty($list_congthuccuamon))
                        @foreach ($list_congthuccuamon as $congthuccuamon)
                            @if ($mon->id == $congthuccuamon->mon_id)
                                <div class="col-xl-3 col-lg-4 col-sm-6 position-relative">
                                    <div class="icon-card mb-30">
                                        <div class="icon primary">
                                            <iconify-icon icon="mdi:weight"></iconify-icon>
                                        </div>
                                        <div class="content">
                                            <h6 class="mb-10">
                                                Công thức
                                            </h6>
                                            <h3 class="text-bold mb-10">
                                                <a href="chitietcongthuc/{{$congthuccuamon->congthuc_id}}"
                                                    class="stretched-link">{{ $congthuccuamon->tencongthuc }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- End Icon Cart -->
                                </div>
                                <!-- End Col -->
                            @endif
                        @endforeach
                    @endif


                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('css')
    <style>
        .icon-card .icon {
            max-width: 65px;
            width: 100%;
            height: 65px;
            font-size: 32px;
        }

        .icon-card {
            height: 80%;
        }
    </style>
@endsection
