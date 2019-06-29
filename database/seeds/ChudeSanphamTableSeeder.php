<?php
use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;

class ChudeSanphamTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker    = Faker\Factory::create('vi_VN');

        $nChuDe   = 3;
        $chude    = [];
        for ($i=1; $i <= $nChuDe; $i++) {
            array_push($chude, $i);
        }

        $list     = [];
        $nSanPham = 3;
        for ($sp_ma=1; $sp_ma <= $nSanPham; $sp_ma++) {
            $count = $faker->numberBetween(1, $nChuDe);
            $ds    = $faker->randomElements($chude, $count);
            foreach ($ds as $key => $cd_ma) {
                array_push($list, [
                    'sp_ma' => $sp_ma,
                    'cd_ma' => $cd_ma
                ]);
            }
        }
        DB::table('cusc_chude_sanpham')->insert($list);
    }
}