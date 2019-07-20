<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class NhanvienTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $list = [];


        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        
        //1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng
        $roles     = 6;
        $employees = [1,   1,  1,  1,  2,  2];
        $ages      = [30, 25, 22, 20, 18, 18];
        $genders   = [VnBase::VnFemale, VnBase::VnMale, VnBase::VnMale, VnBase::VnFemale, VnBase::VnFemale, VnBase::VnFemale];

        $today = new DateTime('2010-01-01 08:00:00');
        
        array_push($list, [
            'nv_ma'        => 1,
            'nv_taiKhoan'  => "unknown",
            'nv_matKhau'   => bcrypt('123456'),
            'nv_hoTen'     => "Chưa phân công",
            'nv_gioiTinh'  => true,
            'nv_email'     => "unknown@sunshine.com",
            'nv_ngaySinh'  => $today->format('Y-m-d H:i:s'),
            'nv_diaChi'    => "unknown",
            'nv_dienThoai' => "01234567890",
            'nv_taoMoi'    => $today->format('Y-m-d H:i:s'),
            'nv_capNhat'   => $today->format('Y-m-d H:i:s'),
            'q_ma'         => 6
        ]);

        for ($i=0, $count = 2; $i < $roles; $i++) {
            for ($j=0; $j < $employees[$i]; $j++, $count++) { 
                $gender   = $genders[$i];
                $name     = $uFN->FullName($gender);
                $age      = $uPI->Age($ages[$i]);
                $birthYear= $uPI->BirthYearValue($age);
                $birthdate= $uPI->Birthdate($birthYear);
                $username = $uPI->Username($name, "", "", "", VnBase::VnLowerCase, VnBase::VnTrimShorthand, VnBase::VnTrue);
                $email    = "$username@sunshine.com";
                $password = bcrypt($username."@".$birthYear);
                $phone    = $uPI->Mobile("", VnBase::VnFalse);
                $address  = $uPI->Address();

                array_push($list, [
                    'nv_ma'        => $count,
                    'nv_taiKhoan'  => $username,
                    'nv_matKhau'   => $password,
                    'nv_hoTen'     => $name,
                    'nv_gioiTinh'  => $gender == VnBase::VnMale,
                    'nv_email'     => $email,
                    'nv_ngaySinh'  => $birthdate["birthdate"],
                    'nv_diaChi'    => $address,
                    'nv_dienThoai' => $phone,
                    'nv_taoMoi'    => $today->format('Y-m-d H:i:s'),
                    'nv_capNhat'   => $today->format('Y-m-d H:i:s'),
                    'q_ma'         => $i+1
                ]);

                if ($i == 0) {
                    DB::table('cusc_nhacungcap')->insert([[
                        'ncc_ma'        => 1,
                        'ncc_ten'       => "sunshine.com",
                        'ncc_daiDien'   => $name,
                        'ncc_diaChi'    => "1 Lý Tự Trọng, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ",
                        'ncc_dienThoai' => "0955667788",
                        'ncc_email'     => "cham.soc.khach.hang@sunshine.com",
                        'ncc_taoMoi'    => $today->format('Y-m-d H:i:s'),
                        'ncc_capNhat'   => $today->format('Y-m-d H:i:s'),
                        'xx_ma'         => 1
                    ]]);
                }
            }
        }

        // Admin
        array_push($list, [
            'nv_ma'        => 100,
            'nv_taiKhoan'  => "admin",
            'nv_matKhau'   => bcrypt('123456'),
            'nv_hoTen'     => "Quản trị hệ thống",
            'nv_gioiTinh'  => true,
            'nv_email'     => "admin@nentang.vn",
            'nv_ngaySinh'  => $today->format('Y-m-d H:i:s'),
            'nv_diaChi'    => "130 Xô Viết Nghệ Tỉnh, Quận Ninh Kiều, TP Cần Thơ",
            'nv_dienThoai' => "0915659223",
            'nv_taoMoi'    => $today->format('Y-m-d H:i:s'),
            'nv_capNhat'   => $today->format('Y-m-d H:i:s'),
            'q_ma'         => 2
        ]);
        DB::table('cusc_nhanvien')->insert($list);
    }
}