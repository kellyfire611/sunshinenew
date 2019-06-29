<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class HoadonleTableSeeder extends Seeder {
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
                'hdl_nguoiMuaHang'        => "hdl_nguoiMuaHang $i",
                'hdl_dienThoai'           => "hdl_dien $i",
                'hdl_diaChi'              => "hdl_diaChi $i",
                'nv_lapHoaDon'            => $i,
                'hdl_ngayXuatHoaDon'      => $today->format('Y-m-d H:i:s'),
                'dh_ma'                   => $i
            ]);
        }
        DB::table('cusc_hoadonle')->insert($list);
    }
}