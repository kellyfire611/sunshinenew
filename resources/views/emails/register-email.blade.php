<table style="width: 100%; border-spacing: 0px">
    <tr>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; width: 153px; padding: 5px;"> <img src="https://nentang.vn/wp-content/uploads/2018/08/logo-nentang.jpg" style="width: 153px; height: 153px;" /> </td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; text-align: center; vertical-align: middle; padding: 5px;">
            <h1 style="color: red;">Shop hoa tươi Sunshine</h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;"> Đây là lời nhắn được gởi từ khách hàng có thông tin như sau: </td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Email thành viên:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ $data['nv_email'] }}</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Họ tên thành viên:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{!! $data['nv_hoTen'] !!}</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Link kích hoạt tài khoản:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
        <form class="d-inline" method="post" action="{{ route('activate', ['nv_ma' => $data['nv_ma']]) }}">
            {{ csrf_field() }}
            <button class="btn btn-danger">Click vào đây để kích hoạt tài khoản</button>
        </form>
    </tr>
</table>