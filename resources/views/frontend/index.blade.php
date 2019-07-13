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
<div class="container text-center">
    <h1>{{ __('sunshine.welcome') }}</h1>
</div>

<!-- Slider -->
@include('frontend.widgets.homepage-slider')
<!-- Banner -->
@include('frontend.widgets.homepage-banner', [$data = $ds_top3_newest_loaisanpham])
<!-- Product -->
@include('frontend.widgets.product-list', [$data = $danhsachsanpham])
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
@endsection