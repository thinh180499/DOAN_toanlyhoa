@php
    $dem = 1;
@endphp

@if (!empty($list_mon))
    @foreach ($list_mon as $mon)
        <li class="nav-item nav-item-has-children">
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_{{ $dem }}" aria-controls="ddmenu_{{ $dem }}"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22">
                        <path
                            d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                    </svg>
                </span>
                <span class="text">{{ $mon->tenmon }}</span>
            </a>
            <ul id="ddmenu_{{ $dem }}" class="collapse dropdown-nav">
                @if (!empty($list_congthuccuamon))
                    @foreach ($list_congthuccuamon as $congthuccuamon)
                        @if ($mon->id==$congthuccuamon->mon_id)
                            <li>
                                <a href="{{ route('chitietcongthuc',[$congthuccuamon->congthuc_id]) }}">{{ $congthuccuamon->tencongthuc }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </li>
        @php
            $dem++;
        @endphp
    @endforeach
@endif
<li class="nav-item nav-item-has-children">
    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon">
        <svg width="22" height="22" viewBox="0 0 22 22">
          <path d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
        </svg>
      </span>
      <span class="text">Khác</span>
    </a>
    <ul id="ddmenu_4" class="collapse dropdown-nav">
      <li>
        <a href="<?php echo route('dodai'); ?>">Độ dài</a>
        <a href="<?php echo route('thetich'); ?>">Thể tích</a>
        <a href="<?php echo route('khoiluong'); ?>">Khối lượng</a>
        <a href="<?php echo route('phuongtrinhbacnhat'); ?>">Phương trình bậc 1</a>
        <a href="<?php echo route('phuongtrinhbachai'); ?>">Phương trình bậc 2</a>
      </li>
    </ul>
  </li>
