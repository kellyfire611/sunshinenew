<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class HoadonsiTableSeeder extends Seeder {
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
                'hds_nguoiMuaHang'        => "hds_nguoiMuaHang $i",
                'hds_tenDonVi'            => "hds_tenDonVi $i",
                'hds_diaChi'              => "hds_diaChi $i",
                'hds_maSoThue'            => "hds_maSoThu $i",
                'hds_soTaiKhoan'          => "hds_soTaiKhoan $i",
                'nv_lapHoaDon'            => $i,
                'hds_ngayXuatHoaDon'      => $today->format('Y-m-d H:i:s'),
                'nv_thuTruong'            => $i,
                'hds_taoMoi'              => $today->format('Y-m-d H:i:s'),
                'hds_capNhat'             => $today->format('Y-m-d H:i:s'),
                'hds_trangThai'           => $i,
                'dh_ma'                   => $i,
                'tt_ma'                   => $i
            ]);
        }
        DB::table('cusc_hoadonsi')->insert($list);
    }
}