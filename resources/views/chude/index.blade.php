<h1>Màn hình <span style="color: red;">danh sách Chủ đề</span></h1>
<a href="{{ route('chude.create') }}">Thêm mới Chủ đề</a>
<table border="1">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã chủ đề</th>
            <th>Tên chủ đề</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachchude as $chude)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $chude->cd_ma }}</td>
            <td>{{ $chude->cd_ten }}</td>
            <td>
                <a href="{{ route('chude.edit', ['id' => $chude->cd_ma]) }}">Sửa</a>
                <form method="post" action="{{ route('chude.destroy', ['id' => $chude->cd_ma]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button>Xóa</button>
                </form>
            </td>
        </tr>
        <?php
        $stt++;
        ?>
        @endforeach
    </tbody>
</table>
