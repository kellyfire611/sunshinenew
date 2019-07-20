@extends('backend.layout.master')

@section('title')
Thêm mới Sản phẩm
@endsection

@section('feature-title')
Thêm mới Sản phẩm    
@endsection

@section('feature-description')
Thêm mới Sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('custom-css')
<style>
    .preview-upload {
        border: 1px dashed red;
        padding: 10px;
    }
    .preview-upload img {
        width: 100%;
    }
</style>
@endsection

@section('content')
<form method="post" action="{{ route('backend.sanpham.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loại sản phẩm</label>
        <select name="l_ma" class="form-control">
            @foreach($danhsachloai as $loai)
                @if(old('l_ma') == $loai->l_ma)
                <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ten">Tên sản phẩm</label>
        <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten') }}">
    </div>
    <div class="form-group">
        <label for="sp_giaGoc">Giá gốc</label>
        <input type="number" class="form-control" id="sp_giaGoc" name="sp_giaGoc" value="{{ old('sp_giaGoc') }}">
    </div>
    <div class="form-group">
        <label for="sp_giaGoc">Giá bán</label>
        <input type="number" class="form-control" id="sp_giaBan" name="sp_giaBan" value="{{ old('sp_giaBan') }}">
    </div>
    <div class="form-group">
        <div class="file-loading">
            <label>Hình đại diện</label>
            <input id="sp_hinh" type="file" name="sp_hinh">
            <div class="preview-upload">
                <img id='sp_hinh-upload'/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="sp_thongTin">Thông tin</label>
        <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ old('sp_thongTin') }}">
    </div>
    <div class="form-group">
        <label for="sp_danhGia">Đánh giá</label>
        <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" value="{{ old('sp_danhGia') }}">
    </div>
    <div class="form-group">
        <label for="sp_taoMoi">Ngày tạo mới</label>
        <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" value="{{ old('sp_taoMoi') }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="sp_capNhat">Ngày cập nhật</label>
        <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" value="{{ old('sp_capNhat') }}" data-mask-datetime>
    </div>
    <select name="sp_trangThai" class="form-control">
        <option value="1" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('sp_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    // Sử dụng FileReader để đọc dữ liệu tạm trước khi upload lên Server
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#sp_hinh-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Bắt sự kiện, ngay khi thay đổi file thì đọc lại nội dung và hiển thị lại hình ảnh mới trên khung preview-upload
    $("#sp_hinh").change(function(){
        readURL(this);
    }); 
</script>
@endsection