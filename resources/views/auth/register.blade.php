@extends('layouts.app')

@section('custom-css')
<!-- Các style dành cho thư viện Daterangepicker -->
<link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <!-- Tên tài khoản -->
                        <div class="form-group{{ $errors->has('nv_taiKhoan') ? ' has-error' : '' }}">
                            <label for="nv_taiKhoan" class="col-md-4 control-label">Tên tài khoản</label>

                            <div class="col-md-6">
                                <input id="nv_taiKhoan" type="text" class="form-control" name="nv_taiKhoan" value="{{ old('nv_taiKhoan') }}" required autofocus>

                                @if ($errors->has('nv_taiKhoan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_taiKhoan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Mật khẩu -->
                        <div class="form-group{{ $errors->has('nv_matKhau') ? ' has-error' : '' }}">
                            <label for="nv_matKhau" class="col-md-4 control-label">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="nv_matKhau" type="password" class="form-control" name="nv_matKhau" required>

                                @if ($errors->has('nv_matKhau'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_matKhau') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Xác nhận mật khẩu -->
                        <div class="form-group">
                            <label for="nv_matKhau-confirm" class="col-md-4 control-label">Xác nhận mật khẩu</label>

                            <div class="col-md-6">
                                <input id="nv_matKhau-confirm" type="password" class="form-control" name="nv_matKhau_confirmation" required>
                            </div>
                        </div>

                        <!-- Họ tên -->
                        <div class="form-group{{ $errors->has('nv_hoTen') ? ' has-error' : '' }}">
                            <label for="nv_hoTen" class="col-md-4 control-label">Họ tên</label>

                            <div class="col-md-6">
                                <input id="nv_hoTen" type="text" class="form-control" name="nv_hoTen" value="{{ old('nv_hoTen') }}" required autofocus>

                                @if ($errors->has('nv_hoTen'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_hoTen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Giới tính -->
                        <div class="form-group{{ $errors->has('nv_gioiTinh') ? ' has-error' : '' }}">
                            <label for="nv_gioiTinh" class="col-md-4 control-label">Giới tính</label>

                            <div class="col-md-6">
                                <select class="form-control" name="nv_gioiTinh">
                                    <option value="0" {{ old('nv_hoTen') == '0' ? 'checked' : '' }}>Nữ</option>
                                    <option value="1" {{ old('nv_hoTen') == '1' ? 'checked' : '' }}>Nam</option>
                                    <option value="2" {{ old('nv_hoTen') == '2' ? 'checked' : '' }}>Khác</option>
                                </select>

                                @if ($errors->has('nv_gioiTinh'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_gioiTinh') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="form-group{{ $errors->has('nv_email') ? ' has-error' : '' }}">
                            <label for="nv_email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="nv_email" type="email" class="form-control" name="nv_email" value="{{ old('nv_email') }}" required autofocus>

                                @if ($errors->has('nv_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Ngày sinh -->
                        <div class="form-group" >
                            <label for="nv_ngaySinhDatepicker" class="col-md-4 control-label">Ngày sinh</label>

                            <div class="col-md-6">
                                <input id="nv_ngaySinhDatepicker" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nv_ngaySinh') ? ' has-error' : '' }}" style="display: none;">
                            <label for="nv_ngaySinh" class="col-md-4 control-label">Ngày sinh</label>

                            <div class="col-md-6">
                                <input id="nv_ngaySinh" type="text" class="form-control" name="nv_ngaySinh" value="{{ old('nv_ngaySinh') }}" required autofocus>

                                @if ($errors->has('nv_ngaySinh'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_ngaySinh') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Địa chỉ -->
                        <div class="form-group{{ $errors->has('nv_diaChi') ? ' has-error' : '' }}">
                            <label for="nv_diaChi" class="col-md-4 control-label">Địa chỉ</label>

                            <div class="col-md-6">
                                <input id="nv_diaChi" type="text" class="form-control" name="nv_diaChi" value="{{ old('nv_diaChi') }}" required autofocus>

                                @if ($errors->has('nv_diaChi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_diaChi') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Điện thoại -->
                        <div class="form-group{{ $errors->has('nv_dienThoai') ? ' has-error' : '' }}">
                            <label for="nv_dienThoai" class="col-md-4 control-label">Điện thoại</label>

                            <div class="col-md-6">
                                <input id="nv_dienThoai" type="text" class="form-control" name="nv_dienThoai" value="{{ old('nv_dienThoai') }}" required autofocus>

                                @if ($errors->has('nv_dienThoai'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_dienThoai') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng ký
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện Daterangepicker -->
<script type="text/javascript" src="{{ asset('vendor/momentjs/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.min.js') }}"></script>
<script>
    $(document).ready(function() {
        debugger;
        $('#nv_ngaySinhDatepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Đồng ý",
                "cancelLabel": "Hủy",
                "fromLabel": "Từ",
                "toLabel": "Đến",
                "customRangeLabel": "Tùy chọn",
                "weekLabel": "T",
                "daysOfWeek": [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                "firstDay": 1
            },
        }, function(start, end, label) {
            // Gán giá trị cho Ngày để gởi dữ liệu về Backend
            $('#nv_ngaySinh').val(start.format('YYYY-MM-DD HH:mm:ss'));
        });
        // callback function
    });
</script>
@endsection