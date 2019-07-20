<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class KhachhangTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();

        $nCustomers = 30;
        $minFemales = 10;
        $maxFemales = 15;
        $nFemales   = VnBase::RandomNumber($minFemales, $maxFemales);
        $nMales     = $nCustomers - $nFemales;

        $females    = $uFN->FullNames(VnBase::VnFemale, $nFemales);
        $males      = $uFN->FullNames(VnBase::VnMale,   $nMales);

        $customers  = [];
        $m = 0;
        $f = 0;
        while ($m <= $nMales-1 || $f <= $nFemales-1) {
            if ($m == $nMales) {          //Đã chọn hết nam
                array_push($customers, ["gender"=>VnBase::VnFemale, "name"=>$females[$f]]);
                $f++;
            } else if ($f == $nFemales) { //Đã chọn hết nữ
                array_push($customers, ["gender"=>VnBase::VnMale,   "name"=>$males[$m]]);
                $m++;
            } else {
                if (VnBase::RandomNumber(0, 1000) < 550) {
                    array_push($customers, ["gender"=>VnBase::VnMale,   "name"=>$males[$m]]);
                    $m++;
                } else {
                    array_push($customers, ["gender"=>VnBase::VnFemale, "name"=>$females[$f]]);
                    $f++;
                }
            }
        }

        $today = new DateTime('2010-01-01 08:00:00');
        for ($i=1; $i <= $nCustomers; $i++) {
            $xs   = VnBase::RandomNumber(0, 1000);
            if ($xs > 100) {
                $step = "P";
                if ($xs < 400) {
                    $step .= "T";
                    $xs = VnBase::RandomNumber(0, 1000);
                    if ($xs < 400) {
                        $step .= VnBase::RandomNumber(1000, 10800);
                    } else if ($xs < 700) {
                        $step .= VnBase::RandomNumber(10801, 21600);
                    } else if ($xs < 900) {
                        $step .= VnBase::RandomNumber(21601, 43200);
                    } else {
                        $step .= VnBase::RandomNumber(43201, 86400);                    
                    }
                    $step .= "S";
                } else {
                    $xs = VnBase::RandomNumber(0, 1000);
                    if ($xs < 500) {
                        $step .= VnBase::RandomNumber(1, 5);
                    } else if ($xs < 800) {
                        $step .= VnBase::RandomNumber(6, 15);
                    } else {
                        $step .= VnBase::RandomNumber(16, 25);                    
                    }
                    $step .= "D";
                }
                $nextTime = new DateInterval($step);
                $today->add($nextTime);
            }

            $gender   = $customers[$i - 1]["gender"];
            $name     = $customers[$i - 1]["name"];
            $age      = $uPI->Age(12);
            $birthYear= $uPI->BirthYearValue($age);
            $birthdate= $uPI->Birthdate($birthYear);
            $email    = $uPI->Email   ($name, $birthdate, "", "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
            $username = $uPI->Username($name, $birthdate,     "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
            $password = bcrypt('123456');
            $phone    = $uPI->Mobile("", VnBase::VnFalse);
            $address  = $uPI->Address();

            array_push($list, [
                'kh_ma'        => $i,
                'kh_taiKhoan'  => $username,
                'kh_matKhau'   => $password,
                'kh_hoTen'     => $name,
                'kh_gioiTinh'  => $gender == VnBase::VnMale,
                'kh_email'     => $email,
                'kh_ngaySinh'  => $birthdate["birthdate"],
                'kh_diaChi'    => $address,
                'kh_dienThoai' => $phone,
                'kh_taoMoi'    => $today->format('Y-m-d H:i:s'),
                'kh_capNhat'   => $today->format('Y-m-d H:i:s'),
                'kh_trangThai' => ($i <= $nCustomers-3? 2: 3)
            ]);
        }
        // Admin
        array_push($list, [
            'kh_ma'        => $nCustomers+1,
            'kh_taiKhoan'  => 'dnpcuong',
            'kh_matKhau'   => bcrypt('123456'),
            'kh_hoTen'     => 'Dương Nguyễn Phú Cường',
            'kh_gioiTinh'  => $gender == VnBase::VnMale,
            'kh_email'     => 'admin@nentang.vn',
            'kh_ngaySinh'  => '1989-06-11',
            'kh_diaChi'    => '130 Xô Viết Nghệ Tỉnh, Quận Ninh Kiều, TP Cần Thơ',
            'kh_dienThoai' => '0915659223',
            'kh_taoMoi'    => $today->format('Y-m-d H:i:s'),
            'kh_capNhat'   => $today->format('Y-m-d H:i:s'),
            'kh_trangThai' => 2 // Khả dụng
        ]);
        DB::table('cusc_khachhang')->insert($list);
    }
}