@extends('backend.layout.master')

@section('title')
Danh sách Chủ đề
@endsection

@section('feature-title')
Danh sách chủ đề    
@endsection

@section('feature-description')
Danh sách các chủ đề có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.chude.create') }}" class="btn btn-primary">Thêm mới Chủ đề</a>
<table class="table table-striped table-bordered">
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
                <a href="{{ route('backend.chude.edit', ['id' => $chude->cd_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.chude.destroy', ['id' => $chude->cd_ma]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        <?php
        $stt++;
        ?>
        @endforeach
    </tbody>
</table>
@endsection
