{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Liên hệ Shop Hoa tươi - Sunshine
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('themes/cozastore/images/bg-01.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Liên hệ
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116" ng-controller="contactController">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form name="contactForm" ng-submit="submitContactForm()" novalidate>
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Gởi lời nhắn cho công ty Sunshine
                    </h4>

                    <!-- Div Thông báo lỗi 
            Chỉ hiển thị khi các validate trong form `contactForm` không hợp lệ => contactForm.$invalid = true
            Sử dụng tiền chỉ lệnh ng-show="contactForm.$invalid"
            -->
                    <div class="alert alert-danger" ng-show="contactForm.$invalid">
                        <ul>
                            <!-- Thông báo lỗi email -->
                            <li><span class="error" ng-show="contactForm.email.$error.required">Vui lòng nhập email</span></li>
                            <li><span class="error" ng-show="!contactForm.email.$error.required && contactForm.email.$error.pattern">Chỉ chấp nhập GMAIL, vui lòng kiểm tra lại</span></li>

                            <!-- Thông báo lỗi message -->
                            <li><span class="error" ng-show="contactForm.message.$error.required">Vui lòng nhập lời nhắn</span></li>
                            <li><span class="error" ng-show="contactForm.message.$error.minlength">Lời nhắn phải > 6 ký tự</span></li>
                            <li><span class="error" ng-show="contactForm.message.$error.maxlength">Lời nhắn phải <= 250 ký tự</span> </li> </li> </div> <!-- Div Thông báo validate hợp lệ Chỉ hiển thị khi các validate trong form `contactForm` không hợp lệ=> contactForm.$valid = true
                                        Sử dụng tiền chỉ lệnh ng-show="contactForm.$valid"
                                        -->
                                        <div class="alert alert-success" ng-show="contactForm.$valid">
                                            Thông tin hợp lệ, vui lòng bấm nút <b>"Gởi lời nhắn"</b> để gởi mail đến Quản trị trang web<br />
                                            Xin chân thành cám ơn các đóng góp, ý kiến, thắc mắc của Quý Khách hàng.
                                        </div>

                                        <!-- Validate email -->
                                        <div class="bor8 m-b-20 how-pos4-parent">
                                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email của bạn" ng-model="email" ng-pattern="/^.+@gmail.com$/" ng-required=true>
                                            <span class="valid" ng-show="userInfo.email.$valid">Hợp lệ</span>
                                            <img class="how-pos4 pointer-none" src="{{ asset('themes/cozastore/images/icons/icon-email.png') }}" alt="ICON">
                                        </div>

                                        <!-- Validate lời nhắm -->
                                        <div class="bor8 m-b-30">
                                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="message" placeholder="Bạn cần chúng tôi giúp đỡ về vấn đề gì?" ng-model="message" ng-minlength="6" ng-maxlength="250" ng-required=true></textarea>
                                        </div>

                                        <!-- Nút submit form -->
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" ng-disabled="contactForm.$invalid">
                                            Gởi lời nhắn
                                        </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Địa chỉ
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            130 Xô Viết Nghệ Tỉnh, Phường An Hội, Quận Ninh Kiều, TP Cần Thơ
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Đường dây nóng
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            0915-659-223
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Email hỗ trợ
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            nentangtoituonglai@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bản đồ Địa chỉ công ty -->
        <div class="row mt-4">
            <div class="col-md-12 text-center mb-4">
                <h2>Địa chỉ liên hệ</h2>
            </div>
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.723612696626!2d105.78061631534743!3d10.03965089282403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a768a8090b%3A0x4756d383949cafbb!2zMTMwIFjDtCBWaeG6v3QgTmdo4buHIFTEqW5oLCBBbiBI4buZaSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1544352305719" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    // Khai báo controller `contactController`
    app.controller('contactController', function($scope, $http) {
        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitContactForm = function() {
            // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
            if ($scope.contactForm.$valid) {
                // lấy data của Form
                var dataInputContactForm = {
                    "email": $scope.contactForm.email.$viewValue,
                    "message": $scope.contactForm.message.$viewValue,
                    "_token": "{{ csrf_token() }}",
                };

                // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.contact.sendMailContactForm`
                $http({
                    url: "{{ route('frontend.contact.sendMailContactForm') }}",
                    method: "POST",
                    data: JSON.stringify(dataInputContactForm)
                }).then(function successCallback(response) {
                    // Gởi mail thành công, thông báo cho khách hàng biết
                    swal('Gởi mail thành công!', 'Chúng tôi sẽ trả lời Quý khách trong thời gian sớm nhất. Xin cám ơn!', 'success');

                }, function errorCallback(response) {
                    // Gởi mail không thành công, thông báo lỗi cho khách hàng biết
                    swal('Có lỗi trong quá trình gởi mail!', 'Vui lòng thử lại sau vài phút.', 'error');
                    console.log(response);
                });
            }
        };
    });
</script>
@endsection