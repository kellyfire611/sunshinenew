<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class ChitietdonhangTableSeeder extends Seeder {
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
                'dh_ma'                   => $i,
                'sp_ma'                   => $i,
                'm_ma'                    => $i,
                'ctdh_soLuong'            => $i,
                'ctdh_donGia'             => $i
            ]);
        }
        DB::table('cusc_chitietdonhang')->insert($list);
    }
}