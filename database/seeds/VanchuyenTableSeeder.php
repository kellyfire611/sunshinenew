<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class VanchuyenTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $today = new DateTime('2010-01-01 08:00:00');

        $list = [
            [
                'vc_ma'       => 1,
                'vc_ten'      => "Miễn phí",
                'vc_chiPhi'   => 0,
                'vc_dienGiai' => "Nhận hàng trực tiếp tại cửa hàng.",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_ma'       => 2,
                'vc_ten'      => "Miễn phí (trong vòng 24h)",
                'vc_chiPhi'   => 0,
                'vc_dienGiai' => "Chỉ áp dụng tại nội ô Tp. Cần Thơ và đơn hàng được nhận trước ngày gửi ít nhất là 2 ngày.",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_ma'       => 3,
                'vc_ten'      => "Ưu tiên (trong vòng 8h)",
                'vc_chiPhi'   => 30000,
                'vc_dienGiai' => "Chỉ áp dụng tại nội ô Tp. Cần Thơ",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_ma'       => 4,
                'vc_ten'      => "Miễn phí (vận chuyển thường)",
                'vc_chiPhi'   => 0,
                'vc_dienGiai' => "Áp dụng cho các tỉnh thành. Quý khách sẽ thanh toán phí vận chuyển của bưu điện.",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_ma'       => 5,
                'vc_ten'      => "Miễn phí (vận chuyển nhanh)",
                'vc_chiPhi'   => 0,
                'vc_dienGiai' => "Áp dụng cho các tỉnh thành. Quý khách sẽ thanh toán phí vận chuyển của bưu điện.",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ]
        ];

        DB::table('cusc_vanchuyen')->insert($list);
    }
}