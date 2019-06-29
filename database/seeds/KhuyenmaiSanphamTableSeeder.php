<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class KhuyenmaiSanphamTableSeeder extends Seeder {
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
                'km_ma'                   => $i,
                'sp_ma'                   => $i,
                'm_ma'                    => $i,
                'kmsp_giaTri'             => "kmsp_giaTri $i",
                'kmsp_trangThai'          => $i
            ]);
        }
        DB::table('cusc_khuyenmai_sanpham')->insert($list);
    }
}