<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class XuatxuTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $today = new DateTime('2010-01-01 08:00:00');

        $list = [
            [
                'xx_ma'      => 1,
                'xx_ten'     => "Kết hợp",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ], 
            [
                'xx_ma'      => 2,
                'xx_ten'     => "Tân Quy Đông, Sa Đéc",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ], 
            [
                'xx_ma'      => 3,
                'xx_ten'     => "Mỹ Phong, Mỹ Tho",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ], 
            [
                'xx_ma'      => 4,
                'xx_ten'     => "Vị Thanh, Hậu Giang",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ], 
            [
                'xx_ma'      => 5,
                'xx_ten'     => "Cái Mơn, Bến Tre",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ], 
            [
                'xx_ma'      => 6,
                'xx_ten'     => "Phước Định, Vĩnh Long",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ], 
            [
                'xx_ma'      => 7,
                'xx_ten'     => "Đà Lạt",
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ]            
        ];

        DB::table('cusc_xuatxu')->insert($list);
    }
}