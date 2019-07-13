@extends('backend.layout.master')

@section('title')
Thêm mới Chủ đề
@endsection

@section('feature-title')
Thêm mới chủ đề    
@endsection

@section('feature-description')
Thêm mới Chủ đề. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmChuDe" name="frmChuDe" method="post" action="{{ route('backend.chude.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="cd_ten">Tên chủ đề</label>
        <input type="text" class="form-control" id="cd_ten" name="cd_ten" aria-describedby="cd_tenHelp" placeholder="Nhập tên chủ đề" value="{{ old('cd_ten') }}">
        <small id="cd_tenHelp" class="form-text text-muted">Nhập tên chủ đề. Giới hạn trong 50 ký tự.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmChuDe").validate({
            rules: {
                cd_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                }
            },
            messages: {
                cd_ten: {
                    required: "Vui lòng nhập tên Chủ đề",
                    minlength: "Tên Chủ đề phải có ít nhất 3 ký tự",
                    maxlength: "Tên Chủ đề không được vượt quá 50 ký tự"
                },
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Thêm class `invalid-feedback` cho field đang có lỗi
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
                // Thêm icon "Kiểm tra không Hợp lệ"
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                        .insertAfter(element);
                }
            },
            success: function (label, element) {
                // Thêm icon "Kiểm tra Hợp lệ"
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                        .insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
@endsection