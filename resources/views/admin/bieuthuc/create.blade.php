<select >
    @if (!empty($list_khainiem))
        @foreach ($list_khainiem as $khainiem)
            <option value="{{ $khainiem->khainiem_id }}">{{ $khainiem->tenkhainiem."-".$khainiem->kyhieu }}
            </option>
        @endforeach
    @endif
</select>
<select >
    @if (!empty($list_hangso))
        @foreach ($list_hangso as $hangso)
            <option value="{{ $hangso->hangso_id }}">{{ $hangso->hangso }}
            </option>
        @endforeach
    @endif
</select>
<select >
    @if (!empty($list_loaipheptoan))
        @foreach ($list_loaipheptoan as $loaipheptoan)
            <option value="{{ $loaipheptoan->loaipheptoan_id }}">{{ $loaipheptoan->loaipheptoan }}
            </option>
        @endforeach
    @endif
</select>