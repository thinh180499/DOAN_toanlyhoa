
<h4 class="mb-10">
    @if (!empty($title))
        {{ $title }}
    @endif
</h4>

<table class="table">
    <thead>
        <tr>
            <th>
                <h6>id</h6>
            </th>
            <th>
                <h6>khái niệm</h6>
            </th>
            <th>
                <h6>biểu thức</h6>
            </th>
            <th>
                <h6>Chức năng</h6>
            </th>
        </tr>
        <!-- end table row-->
    </thead>
    <tbody>
        @if (!empty($list_congthuc))
            @foreach ($list_congthuc as $congthuc)
                <tr>
                    <td class="min-width">
                        <p>{{ $congthuc->id }}</p>
                    </td>
                    <td class="min-width">
                        <p>{{ $congthuc->khainiem_id }}</p>
                    </td>
                    <td class="min-width">
                        <p>{{ $congthuc->bieuthuc_id }}</p>
                    </td>

                    <td class="min-width d-flex">
                        <a class="main-btn primary-btn rounded-md btn-hover me-3"
                            href="">Sửa</a>
                        <form
                            action=""
                            method="post">
                            @method('DELETE')
                            @csrf
                            <button class="main-btn danger-btn rounded-md btn-hover"
                                type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
                <!-- end table row -->
            @endforeach
        @else
            <tr>
                <td class="min-width">không có lý thuyết</td>
            </tr>
        @endif
    </tbody>
</table>