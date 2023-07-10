{{-- Vật lý --}}
<li class="nav-item nav-item-has-children">
    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22">
                <path
                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
            </svg>
        </span>
        <span class="text">Vật lý</span>
    </a>
    <ul id="ddmenu_1" class="collapse dropdown-nav">
        @if (!empty($list_congthuccuavatly))
            @foreach ($list_congthuccuavatly as $congthuccuavatly)
                    <li>
                        <a
                            href="{{ route('chitietcongthuc', [$congthuccuavatly->id]) }}">{{ $congthuccuavatly->tencongthuc }}
                        </a>
                    </li>
            @endforeach
        @endif
    </ul>
</li>

{{-- Toán học --}}
<li class="nav-item nav-item-has-children">
    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22">
                <path
                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
            </svg>
        </span>
        <span class="text">Toán học</span>
    </a>
    <ul id="ddmenu_2" class="collapse dropdown-nav">
        @if (!empty($list_congthuccuatoan))
            @foreach ($list_congthuccuatoan as $congthuccuatoan)
                    <li>
                        <a
                            href="{{ route('chitietcongthuc', [$congthuccuatoan->id]) }}">{{ $congthuccuatoan->tencongthuc }}
                        </a>
                    </li>
            @endforeach
        @endif
    </ul>
</li>

{{-- Hóa học --}}
<li class="nav-item nav-item-has-children">
    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3" aria-controls="ddmenu_3"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22">
                <path
                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
            </svg>
        </span>
        <span class="text">Hóa học</span>
    </a>
    <ul id="ddmenu_3" class="collapse dropdown-nav">
        @if (!empty($list_congthuccuahoa))
            @foreach ($list_congthuccuahoa as $congthuccuahoa)
                    <li>
                        <a
                            href="{{ route('chitietcongthuc', [$congthuccuahoa->id]) }}">{{ $congthuccuahoa->tencongthuc }}
                        </a>
                    </li>
            @endforeach
        @endif
    </ul>
</li>

{{-- Chuyển đổi đơn vị --}}
<li class="nav-item nav-item-has-children">
    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_4"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22">
                <path
                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
            </svg>
        </span>
        <span class="text">Chuyển đổi đơn vị</span>
    </a>
    <ul id="ddmenu_4" class="collapse dropdown-nav">
        <li>
            <a href="<?php echo route('dodai'); ?>">Độ dài</a>
            <a href="<?php echo route('thetich'); ?>">Thể tích</a>
            <a href="<?php echo route('khoiluong'); ?>">Khối lượng</a>
        </li>
    </ul>
</li>

{{-- Khác --}}
<li class="nav-item nav-item-has-children">
    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_5" aria-controls="ddmenu_5"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22">
                <path
                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
            </svg>
        </span>
        <span class="text">Khác</span>
    </a>
    <ul id="ddmenu_5" class="collapse dropdown-nav">
        <li>
            <a href="<?php echo route('phuongtrinhbacnhat'); ?>">Phương trình bậc 1</a>
            <a href="<?php echo route('phuongtrinhbachai'); ?>">Phương trình bậc 2</a>
        </li>
    </ul>
</li>
