<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class DonhangTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $faker = Faker\Factory::create();

        for ($i=1; $i <= 15; $i++) {
            $today = new DateTime();
            array_push($list, [
                'kh_ma'                   => $i,
                'dh_thoiGianDatHang'      => $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now', $timezone = null),
                'dh_thoiGianNhanHang'     => $today->format('Y-m-d H:i:s'),
                'dh_nguoiNhan'            => "dh_nguoiNhan $i",
                'dh_diaChi'               => "dh_diaChi $i",
                'dh_dienThoai'            => "dh_dienT $i",
                'dh_nguoiGui'             => "dh_nguoiGui $i",
                'dh_loiChuc'              => "dh_loiC $i",
                'dh_daThanhToan'          => $i,
                'nv_xuLy'                 => $faker->numberBetween(1, 9),
                'dh_ngayXuLy'             => $today->format('Y-m-d H:i:s'),
                'nv_giaoHang'             => $faker->numberBetween(1, 9),
                'dh_ngayLapPhieuGiao'     => $today->format('Y-m-d H:i:s'),
                'dh_ngayGiaoHang'         => $today->format('Y-m-d H:i:s'),
                'dh_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'dh_capNhat'              => $today->format('Y-m-d H:i:s'),
                'dh_trangThai'            => $i,
                'vc_ma'                   => $faker->numberBetween(1, 5),
                'tt_ma'                   => $faker->numberBetween(1, 2)
            ]);
        }
        DB::table('cusc_donhang')->insert($list);
    }
}