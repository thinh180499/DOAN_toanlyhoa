@extends('layouts.client')

@section('content')
    
            <div class="subject">
                <div class="row p-4">
                    <h2 class="text-start">Vật Lý</h2>
                </div>

                <div class="row">
                    @if (!empty($list_congthuccuavatly))
                        @foreach ($list_congthuccuavatly as $congthuccuavatly)
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
                                                <a href="chitietcongthuc/{{ $congthuccuavatly->id }}"
                                                    class="stretched-link">{{ $congthuccuavatly->tencongthuc }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- End Icon Cart -->
                                </div>
                                <!-- End Col -->
                            
                        @endforeach
                    @endif
                </div>

            </div>
        
            <div class="subject">
                <div class="row p-4">
                    <h2 class="text-start">Toán Học</h2>
                </div>

                <div class="row">
                    @if (!empty($list_congthuccuatoan))
                        @foreach ($list_congthuccuatoan as $congthuccuatoan)
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
                                                <a href="chitietcongthuc/{{ $congthuccuatoan->id }}"
                                                    class="stretched-link">{{ $congthuccuatoan->tencongthuc }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- End Icon Cart -->
                                </div>
                                <!-- End Col -->
                            
                        @endforeach
                    @endif
                </div>

            </div>
            <div class="subject">
                <div class="row p-4">
                    <h2 class="text-start">Hóa Học</h2>
                </div>

                <div class="row">
                    @if (!empty($list_congthuccuahoa))
                        @foreach ($list_congthuccuahoa as $congthuccuahoa)
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
                                                <a href="chitietcongthuc/{{ $congthuccuahoa->id }}"
                                                    class="stretched-link">{{ $congthuccuahoa->tencongthuc }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- End Icon Cart -->
                                </div>
                                <!-- End Col -->
                            
                        @endforeach
                    @endif
                </div>

            </div>
    </div>
    <div class="khac">
        <div class="row p-4">
            <h2 class="text-start">Chuyển Đơn Vị</h2>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6 position-relative">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <iconify-icon icon="mdi:weight"></iconify-icon>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">
                            Chuyển đổi đơn vị
                        </h6>
                        <h3 class="text-bold mb-10">
                            <a href="<?php echo route('dodai'); ?>"
                                class="stretched-link">Độ dài</a>
                        </h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->

            <div class="col-xl-3 col-lg-4 col-sm-6 position-relative">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <iconify-icon icon="mdi:weight"></iconify-icon>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">
                            Chuyển đổi đơn vị
                        </h6>
                        <h3 class="text-bold mb-10">
                            <a href="<?php echo route('thetich'); ?>"
                                class="stretched-link">Thể tích</a>
                        </h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->

            <div class="col-xl-3 col-lg-4 col-sm-6 position-relative">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <iconify-icon icon="mdi:weight"></iconify-icon>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">
                            Chuyển đổi đơn vị
                        </h6>
                        <h3 class="text-bold mb-10">
                            <a href="<?php echo route('khoiluong'); ?>"
                                class="stretched-link">Khối lượng</a>
                        </h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->

           
        </div>

    </div>
    <div class="khac">
        <div class="row p-4">
            <h2 class="text-start">Khác</h2>
        </div>

        <div class="row">
            

            <div class="col-xl-3 col-lg-4 col-sm-6 position-relative">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <iconify-icon icon="mdi:weight"></iconify-icon>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">
                            Tìm nghiệm
                        </h6>
                        <h3 class="text-bold mb-10">
                            <a href="<?php echo route('phuongtrinhbacnhat'); ?>"
                                class="stretched-link">Phương trình bậc 1</a>
                        </h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->

            <div class="col-xl-3 col-lg-4 col-sm-6 position-relative">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <iconify-icon icon="mdi:weight"></iconify-icon>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">
                            Tìm nghiệm
                        </h6>
                        <h3 class="text-bold mb-10">
                            <a href="<?php echo route('phuongtrinhbachai'); ?>"
                                class="stretched-link">Phương trình bậc 2</a>
                        </h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
        </div>

    </div>
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
