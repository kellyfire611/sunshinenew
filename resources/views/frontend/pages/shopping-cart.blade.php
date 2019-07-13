{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Giỏ hàng Shop Hoa tươi - Sunshine
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')

<!-- Hiển thị giỏ hàng -->
<ngcart-cart template-url="{{ asset('vendor/ngCart/template/ngCart/cart.html') }}"></ngcart-cart>

<!-- Thông tin khách hàng -->
<div class="container" ng-controller="orderController">
    <form name="orderForm" ng-submit="submitOrderForm()" novalidate>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>Thông tin khách hàng</h2>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                <div class="alert alert-danger" ng-show="orderForm.$invalid">
                    <ul>
                        <!-- Thông báo lỗi kh_email -->
                        <li><span class="error" ng-show="orderForm.kh_email.$error.required">Vui lòng nhập email</span></li>
                        <li><span class="error" ng-show="!orderForm.kh_email.$error.required && orderForm.kh_email.$error.pattern">Chỉ chấp nhập GMAIL, vui lòng kiểm tra lại</span></li>

                        <!-- Thông báo lỗi kh_taiKhoan -->
                        <li><span class="error" ng-show="orderForm.kh_taiKhoan.$error.required">Vui lòng nhập tên tài khoản</span></li>
                        <li><span class="error" ng-show="orderForm.kh_taiKhoan.$error.minlength">Tên tài khoản phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_taiKhoan.$error.maxlength">Tên tài khoản phải <= 50 ký tự</span> </li> <!-- Thông báo lỗi kh_hoTen -->
                        <li><span class="error" ng-show="orderForm.kh_hoTen.$error.required">Vui lòng nhập Họ tên</span></li>
                        <li><span class="error" ng-show="orderForm.kh_hoTen.$error.minlength">Họ tên phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_hoTen.$error.maxlength">Họ tên phải <= 100 ký tự</span> </li> <!-- Thông báo lỗi kh_gioiTinh -->
                        <li><span class="error" ng-show="orderForm.kh_gioiTinh.$error.required">Vui lòng chọn giới tính</span></li>

                        <!-- Thông báo lỗi kh_ngaySinh -->
                        <li><span class="error" ng-show="orderForm.kh_ngaySinh.$error.required">Vui lòng nhập Ngày sinh</span></li>

                        <!-- Thông báo lỗi kh_diaChi -->
                        <li><span class="error" ng-show="orderForm.kh_diaChi.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_diaChi.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li> <!-- Thông báo lỗi kh_dienThoai -->
                        <li><span class="error" ng-show="orderForm.kh_dienThoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_dienThoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li> </li> </div> <div class="form-group">
                                    <label for="kh_taiKhoan">Tài khoản:</label>
                                    <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" ng-model="kh_taiKhoan" ng-minlength="6" ng-maxlength="50" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_hoTen">Họ tên:</label>
                    <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" ng-model="kh_hoTen" ng-minlength="6" ng-maxlength="100" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_gioiTinh">Giới tính:</label>
                    <select name="kh_gioiTinh" id="kh_gioiTinh" class="form-control" ng-model="kh_gioiTinh" ng-required=true>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kh_email">Email:</label>
                    <input type="email" class="form-control" id="kh_email" name="kh_email" ng-model="kh_email" ng-pattern="/^.+@gmail.com$/" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_ngaySinh">Ngày sinh:</label>
                    <input type="text" class="form-control" id="kh_ngaySinh" name="kh_ngaySinh" ng-model="kh_ngaySinh" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_diaChi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" ng-model="kh_diaChi" ng-minlength="6" ng-maxlength="250">
                </div>
                <div class="form-group">
                    <label for="kh_dienThoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="kh_dienThoai" name="kh_dienThoai" ng-model="kh_dienThoai" ng-minlength="6" ng-maxlength="11">
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <h2>Thông tin Đặt hàng</h2>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                <div class="alert alert-danger" ng-show="orderForm.$invalid">
                    <ul>
                        <!-- Thông báo lỗi dh_thoiGianDatHang -->
                        <li><span class="error" ng-show="orderForm.dh_thoiGianNhanHang.$error.required">Vui lòng nhập thời gian nhận hàng</span></li>

                        <!-- Thông báo lỗi dh_nguoiNhan -->
                        <li><span class="error" ng-show="orderForm.dh_nguoiNhan.$error.required">Vui lòng nhập tên người nhận</span></li>
                        <li><span class="error" ng-show="orderForm.dh_nguoiNhan.$error.minlength">Tên người nhận phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.dh_nguoiNhan.$error.maxlength">Tên người nhận phải <= 100 ký tự</span> </li> <!-- Thông báo lỗi dh_diaChi -->
                        <li><span class="error" ng-show="orderForm.dh_diaChi.$error.required">Vui lòng nhập Địa chỉ</span></li>
                        <li><span class="error" ng-show="orderForm.dh_diaChi.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.dh_diaChi.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li> <!-- Thông báo lỗi dh_dienThoai -->
                        <li><span class="error" ng-show="orderForm.dh_dienThoai.$error.required">Vui lòng nhập Điện thoại</span></li>
                        <li><span class="error" ng-show="orderForm.dh_dienThoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.dh_dienThoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li> <!-- Thông báo lỗi dh_nguoiGui -->
                        <li><span class="error" ng-show="orderForm.dh_nguoiGui.$error.required">Vui lòng nhập Người gửi</span></li>
                        <li><span class="error" ng-show="orderForm.dh_nguoiGui.$error.minlength">Người gửi phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.dh_nguoiGui.$error.maxlength">Người gửi phải <= 100 ký tự</span> </li> <!-- Thông báo lỗi dh_loiChuc -->
                        <li><span class="error" ng-show="orderForm.dh_loiChuc.$error.required">Vui lòng nhập Lời chúc</span></li>
                        <li><span class="error" ng-show="orderForm.dh_loiChuc.$error.minlength">Lời chúc phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.dh_loiChuc.$error.maxlength">Lời chúc phải <= 500 ký tự</span> </li> <!-- Thông báo lỗi vc_ma -->
                        <li><span class="error" ng-show="orderForm.vc_ma.$error.required">Vui lòng chọn Hình thức vận chuyển</span></li>

                        <!-- Thông báo lỗi tt_ma -->
                        <li><span class="error" ng-show="orderForm.tt_ma.$error.required">Vui lòng chọn Phương thức thanh toán</span></li>
                        </li>
                </div>
                <div class="form-group">
                    <label for="dh_thoiGianNhanHang">Thời gian nhận hàng:</label>
                    <input type="text" class="form-control" id="dh_thoiGianNhanHang" name="dh_thoiGianNhanHang" ng-model="dh_thoiGianNhanHang" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="dh_nguoiNhan">Người nhận:</label>
                    <input type="text" class="form-control" id="dh_nguoiNhan" name="dh_nguoiNhan" ng-model="dh_nguoiNhan" ng-minlength="6" ng-maxlength="100" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="dh_diaChi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" ng-model="dh_diaChi" ng-minlength="6" ng-maxlength="250" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="dh_dienThoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="dh_dienThoai" name="dh_dienThoai" ng-model="dh_dienThoai" ng-minlength="6" ng-maxlength="11" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="dh_nguoiGui">Người gửi:</label>
                    <input type="text" class="form-control" id="dh_nguoiGui" name="dh_nguoiGui" ng-model="dh_nguoiGui" ng-minlength="6" ng-maxlength="100" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="dh_loiChuc">Lời chúc:</label>
                    <textarea class="form-control" id="dh_loiChuc" name="dh_loiChuc" ng-model="dh_loiChuc" ng-minlength="6" ng-maxlength="500" ng-required=true></textarea>
                </div>
                <div class="form-group">
                    <label for="vc_ma">Hình thức vận chuyển:</label>
                    <select name="vc_ma" id="vc_ma" class="form-control" ng-model="vc_ma" ng-required=true>
                        @foreach($danhsachvanchuyen as $vc)
                        <option value="{{ $vc->vc_ma }}">{{ $vc->vc_ten }} ({{ $vc->vc_chiPhi }} đ)</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tt_ma">Phương thức thanh toán:</label>
                    <select name="tt_ma" id="tt_ma" class="form-control" ng-model="tt_ma" ng-required=true>
                        @foreach($danhsachphuongthucthanhtoan as $tt)
                        <option value="{{ $tt->tt_ma }}">{{ $tt->tt_ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Div Thông báo validate hợp lệ 
        Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$valid = true
        Sử dụng tiền chỉ lệnh ng-show="orderForm.$valid"
        -->
        <div class="alert alert-success" ng-show="orderForm.$valid">
            Thông tin hợp lệ, vui lòng bấm nút <b>"Thanh toán"</b> để hoàn tất ĐƠN HÀNG<br />
            Chúng tôi sẽ gởi mail đển quý khách. Xin chân thành cám ơn Quý Khách hàng đã tin tưởng sản phẩm của chúng tôi.
        </div>
        <!-- Nút submit form -->
        <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
            Thanh toán
        </button>
    </form>
</div>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    // Khai báo controller `orderController`
    app.controller('orderController', function($scope, $http, ngCart) {
        $scope.ngCart = ngCart;

        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitOrderForm = function() {
            debugger;
            // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
            if ($scope.orderForm.$valid) {
                // lấy data của Form
                var dataInputOrderForm_KhachHang = {
                    "kh_taiKhoan": $scope.orderForm.kh_taiKhoan.$viewValue,
                    "kh_hoTen": $scope.orderForm.kh_hoTen.$viewValue,
                    "kh_gioiTinh": $scope.orderForm.kh_gioiTinh.$viewValue,
                    "kh_email": $scope.orderForm.kh_email.$viewValue,
                    "kh_ngaySinh": $scope.orderForm.kh_ngaySinh.$viewValue,
                    "kh_diaChi": $scope.orderForm.kh_diaChi.$viewValue,
                    "kh_dienThoai": $scope.orderForm.kh_dienThoai.$viewValue,
                };

                var dataInputOrderForm_DatHang = {
                    "dh_thoiGianNhanHang": $scope.orderForm.dh_thoiGianNhanHang.$viewValue,
                    "dh_nguoiNhan": $scope.orderForm.dh_nguoiNhan.$viewValue,
                    "dh_diaChi": $scope.orderForm.dh_diaChi.$viewValue,
                    "dh_dienThoai": $scope.orderForm.dh_dienThoai.$viewValue,
                    "dh_nguoiGui": $scope.orderForm.dh_nguoiGui.$viewValue,
                    "dh_loiChuc": $scope.orderForm.dh_loiChuc.$viewValue,
                    "vc_ma": $scope.orderForm.vc_ma.$viewValue,
                    "tt_ma": $scope.orderForm.tt_ma.$viewValue,
                };

                var dataCart = ngCart.getCart();

                var dataInputOrderForm = {
                    "khachhang": dataInputOrderForm_KhachHang,
                    "donhang": dataInputOrderForm_DatHang,
                    "giohang": dataCart,
                    "_token": "{{ csrf_token() }}",
                };

                // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.order`
                $http({
                    url: "{{ route('frontend.order') }}",
                    method: "POST",
                    data: JSON.stringify(dataInputOrderForm)
                }).then(function successCallback(response) {
                    // Clear giỏ hàng ngCart
                    //$scope.ngCart.empty();

                    // Gởi mail thành công, thông báo cho khách hàng biết
                    swal('Đơn hàng hoàn tất!', 'Xin cám ơn Quý khách!', 'success');

                    // Chuyển sang trang Hoàn tất đặt hàng
                    if (response.data.redirectUrl) {
                        location.href = response.data.redirectUrl;
                    }
                }, function errorCallback(response) {
                    // Gởi mail không thành công, thông báo lỗi cho khách hàng biết
                    swal('Có lỗi trong quá trình thực hiện Đơn hàng!', 'Vui lòng thử lại sau vài phút.', 'error');
                    console.log(response);
                });
            }
        };
    });
</script>
@endsection