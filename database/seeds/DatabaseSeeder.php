<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(ChuDeTableSeeder::class);
        $this->call(KhachhangTableSeeder::class);
        $this->call(LoaiTableSeeder::class);
        $this->call(MauTableSeeder::class);
        $this->call(QuyenTableSeeder::class);
        $this->call(ThanhtoanTableSeeder::class);
        $this->call(VanchuyenTableSeeder::class);
        $this->call(XuatxuTableSeeder::class);
        $this->call(NhacungcapTableSeeder::class);
        $this->call(NhanvienTableSeeder::class);
        $this->call(SanphamTableSeeder::class);
        //$this->call(HinhanhTableSeeder::class);
        $this->call(KhuyenmaiTableSeeder::class);
        $this->call(GopyTableSeeder::class);
        $this->call(MauSanphamTableSeeder::class);
        $this->call(ChudeSanphamTableSeeder::class);
        $this->call(DonhangTableSeeder::class);
        $this->call(PhieunhapTableSeeder::class);
        $this->call(KhuyenmaiSanphamTableSeeder::class);
        $this->call(HoadonsiTableSeeder::class);
        $this->call(ChitietnhapTableSeeder::class);
        $this->call(ChitietdonhangTableSeeder::class);
        $this->call(HoadonleTableSeeder::class);
    }
}
