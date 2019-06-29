<?php

use Illuminate\Database\Seeder;

class ChuDeTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $list = [];

        $categories = ["Hoa cưới", "Hoa 20/10", "Hoa 14/2", "Hoa 8/3", "Hoa Tết", "Hoa 20/11", "Hoa mừng sinh nhật cha", 
                       "Hoa mừng sinh nhật mẹ", "Hoa mừng sinh nhật", "Hoa mừng sinh nhật OX, BX, người yêu", 
                       "Hoa mừng tốt nghiệp", "Hoa tình nhân", "Hoa chúc sức khỏe", "Hoa mừng giáng sinh", 
                       "Hoa chia buồn", "Hoa mừng tân gia", "Hoa mừng khai trương", "Hoa mừng thọ"];
        sort($categories);

        $today = new DateTime('2010-01-01 08:00:00');

        for ($i=1; $i <= count($categories); $i++) {
            array_push($list, [
                'cd_ma'      => $i,
                'cd_ten'     => $categories[$i-1],
                'cd_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'cd_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_chude')->insert($list);
    }
}