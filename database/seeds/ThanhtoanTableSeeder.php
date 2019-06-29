<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class ThanhtoanTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $today = new DateTime('2010-01-01 08:00:00');

        $list = [
            [
                'tt_ma'       => 1,
                'tt_ten'      => "Tiền mặt",
                'tt_dienGiai' => "Quý khách thanh toán trực tiếp tại cửa hàng",
                'tt_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'tt_capNhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'tt_ma'       => 2,
                'tt_ten'      => "Thanh toán khi nhận hàng",
                'tt_dienGiai' => "Nhân viên của chúng tôi sẽ liên lạc với Quý khách để nhận thông tin về địa chỉ và thời gian giao hàng. Nhân viên của chúng tôi sẽ đến giao hàng và nhận tiền sau khi Quý khách đã nhận và kiểm tra hàng.",
                'tt_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'tt_capNhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'tt_ma'       => 3,
                'tt_ten'      => "Chuyển khoản",
                'tt_dienGiai' => "<div style='text-align: justify'>Quý khách có thể đến bất kì Phòng giao dịch ngân hàng, ATM hoặc sử dụng tính năng Internet Banking để chuyển tiền vào một trong các tài khoản sau:</div>".
                    "<div style='text-align: center'><img src='public/template/images/info/atm.png'/></div>".
                    "<div style='text-align: justify; text-style: italic; margin-left: 20px'><b>Lưu ý:</b> Sau khi thanh toán, Quý khách cần thông báo lại cho chúng tôi thông tin chuyển khoản của Quý khách bao gồm: Tên người chuyển và số điện thoại hoặc nội dung chuyển khoản để chúng tôi kiểm tra thông tin.</div>".
                    "<div style='text-align: center'>HOTLINE HỖ TRỢ THANH TOÁN: 0939.123.456</div>",
                'tt_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'tt_capNhat'  => $today->format('Y-m-d H:i:s')
            ]
        ];
        DB::table('cusc_thanhtoan')->insert($list);
    }
}