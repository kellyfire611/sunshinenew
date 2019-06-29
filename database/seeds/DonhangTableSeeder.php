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

        for ($i=1; $i <= 3; $i++) {
            $today = new DateTime();
            array_push($list, [
                'kh_ma'                   => $i,
                'dh_thoiGianDatHang'      => $today->format('Y-m-d H:i:s'),
                'dh_thoiGianNhanHang'     => $today->format('Y-m-d H:i:s'),
                'dh_nguoiNhan'            => "dh_nguoiNhan $i",
                'dh_diaChi'               => "dh_diaChi $i",
                'dh_dienThoai'            => "dh_dienT $i",
                'dh_nguoiGui'             => "dh_nguoiGui $i",
                'dh_loiChuc'              => "dh_loiC $i",
                'dh_daThanhToan'          => $i,
                'nv_xuLy'                 => $i,
                'dh_ngayXuLy'             => $today->format('Y-m-d H:i:s'),
                'nv_giaoHang'             => $i,
                'dh_ngayLapPhieuGiao'     => $today->format('Y-m-d H:i:s'),
                'dh_ngayGiaoHang'         => $today->format('Y-m-d H:i:s'),
                'dh_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'dh_capNhat'              => $today->format('Y-m-d H:i:s'),
                'dh_trangThai'            => $i,
                'vc_ma'                   => $i,
                'tt_ma'                   => $i
            ]);
        }
        DB::table('cusc_donhang')->insert($list);
    }
}