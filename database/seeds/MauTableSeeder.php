<?php

use Illuminate\Database\Seeder;

class MauTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $list = [];
        $colors = [
            "Cam (Orange)", "Đen (Black)", "Đỏ (Red)", "Đỏ sậm (Maroon)", 
            "Đỏ thắm (Crimson)", "Hồng (Pink)", "Nâu (SaddleBrown)", "Ngọc bích (SeaGreen)", "Xanh da trời (SkyBlue)", 
            "Xanh dương (Blue)", "Xanh đọt chuối (Chartreuse)", "Xanh lá (Green)", "Xanh lơ (Cyan)", "Tím (Purple)", 
            "Tím cà (Orchid)", "Tím sen (Magenta)", "Trà (Teal)", "Trắng (White)", "Vàng (Yellow)"
        ];

        sort($colors);
        
        array_unshift($colors, "Phối màu");

        $today = new DateTime('2010-01-01 08:00:00');

        for ($i=0; $i < count($colors); $i++) { 
            array_push($list, [
                'm_ma'      => $i+1, 
                'm_ten'     => $colors[$i],
                'm_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'm_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }

        DB::table('cusc_mau')->insert($list);
    }
}