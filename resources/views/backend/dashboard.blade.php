@extends('backend.layout.master')

@section('title')
Trang quản trị hệ thống
@endsection

@section('feature-title')
Màn hình quản trị
@endsection

@section('feature-description')
Xem nhanh toàn hệ thống
@endsection

@section('content')

@endsection

@section('custom-css')
<style>
.dashboard-title {
    color: red;
    border-bottom: 2px solid red;
}
</style>
@endsection

@section('custom-scripts')
<script>
alert('Hello quản trị');
</script>
@endsection