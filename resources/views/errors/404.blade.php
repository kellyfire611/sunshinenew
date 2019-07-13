{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Shop Hoa tươi - Sunshine
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<div class="container">
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Xin lỗi, trang không tìm thấy</h3>

                <p>
                    Chúng tôi đã cố gắng tìm, nhưng không thấy trang bạn yêu cầu. Bạn có thể <a href="{{ route('frontend.home') }}">quay về Trang chủ</a> và xem tiếp các sản phẩm khác của chúng tôi!
                </p>
            </div>
        </div>
    </section>
</div>
@endsection