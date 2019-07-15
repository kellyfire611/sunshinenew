<div style="background-color: #DAE8FC; text-align: center; ">
    <h1>HELLO LARAVEL</h1>
    <a href="https://nentang.vn">nentang.vn</a>
    <p>
        Hôm nay ngày: {{ date('d/m/Y H:i:s') }}
    </p>

    <?php
    $hoten = "<b>Dương Nguyễn Phú Cường</b>";
    ?>
    <p>HTML escaped: {{ $hoten }}</p>
    <p>HTML không escape: {!! $hoten !!}</p>
     {{-- sử dụng cú pháp @{{ }}, blade sẽ bỏ qua và output toàn bộ "{{ $variable }}" --}}
    <p>In ra đầy đủ @{{ $hoten }}</p>
</div>


