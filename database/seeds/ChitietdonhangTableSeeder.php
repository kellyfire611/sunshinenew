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
        $faker = Faker\Factory::create();

        for ($i=1; $i <= 20; $i++) {
            $today = new DateTime();
            array_push($list, [
                'dh_ma'                   => $faker->numberBetween(1, 15),
                'sp_ma'                   => $faker->numberBetween(1, 30),
                'm_ma'                    => $faker->numberBetween(1, 20),
                'ctdh_soLuong'            => $faker->numberBetween(1, 20),
                'ctdh_donGia'             => round($faker->randomFloat(99999999, 80000, 6500000), -3),
            ]);
        }
        DB::table('cusc_chitietdonhang')->insert($list);
    }
}