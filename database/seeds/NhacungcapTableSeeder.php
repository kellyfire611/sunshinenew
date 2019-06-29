<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class NhacungcapTableSeeder extends Seeder {
    public function getCompanyName($fullname, $uFN) {
        $loaiDoanhNghiep = ["Cty TNHH TMDV ", "Cty TNHH ", "DNTN ", "Cty TNHH MTV "];
        $hoaDoanhNghiep  = ["Hoa Tươi ", "Hoa Cao Cấp ", "Hoa ", ""];
        $name1 = $loaiDoanhNghiep[VnBase::RandomNumber(0, count($loaiDoanhNghiep) - 1)];
        $name2 = $hoaDoanhNghiep [VnBase::RandomNumber(0, count($hoaDoanhNghiep) - 1)];
        $name  = $name1.$name2;

        $part  = explode(" ", $fullname);
        $nPart = count($part);
        $xs    = VnBase::RandomNumber(0, 1000);
        if ($xs < 400) {
            $part1 = $part[$nPart-1];
            
            $member = $uFN->FullName(VnBase::VnMixed);
            $part  = explode(" ", $member);
            $nPart = count($part);
            $part2 = $part[$nPart-1];

            $xs    = VnBase::RandomNumber(0, 1000);
            if ($xs < 750) {
                return $name.$part1." ".$part2;
            } else {
                return $name.$part2." ".$part1;
            }
        } else if ($xs < 700) {
            return $name.$part[$nPart-2]." ".$part[$nPart-1];
        } else if ($xs < 850) {
            return $name.$part[$nPart-1];
        } else if ($xs < 950) {
            return $name.$part[0]." ".$part[$nPart-1];
        } else {
            return $name.$part[$nPart-1]." ".$part[0];
        }
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        
        $nXuatXu = 6;
        $xuatXu  = [];
        $dsDiaChi= [
            [
                VnBase::RandomNumber(1, 200).", Khóm Tân Mỹ, P. Tân Quy Đông, TP. Sa Đéc, Đồng Tháp",
                VnBase::RandomNumber(1, 200).", Khóm Sa Nhiên, P. Tân Quy Đông, TP. Sa Đéc, Đồng Tháp",
                VnBase::RandomNumber(1, 200)." Lê Lợi, Khóm Tân Mỹ, P. Tân Quy Đông, TP. Sa Đéc, Đồng Tháp"
            ],
            [
                VnBase::RandomNumber(1, 200)." huyện lộ 90B, Ấp Mỹ Hòa, X. Mỹ Phong, TP. Mỹ Tho, Tiền Giang",
                VnBase::RandomNumber(1, 200).", Ấp Mỹ Hưng, X. Mỹ Phong, TP. Mỹ Tho, Tiền Giang",
                VnBase::RandomNumber(1, 200).", Ấp Hội Gia, X. Mỹ Phong, TP. Mỹ Tho, Tiền Giang"
            ],
            [
                VnBase::RandomNumber(1, 200).", X. Vị Thanh, H. Vị Thủy, Hậu Giang",
                VnBase::RandomNumber(1, 200).", Ấp 6, X. Vị Đông, H. Vị Thủy, Hậu Giang",
                VnBase::RandomNumber(1, 200).", Ấp 8, X. Vĩnh Trung, H. Vị Thủy, Hậu Giang",
            ],
            [
                VnBase::RandomNumber(1, 200)." Ấp Lân Tây, X. Phú Sơn, H. Chợ Lách, Bến Tre",
                VnBase::RandomNumber(1, 200)." Ấp An Hòa, X. Long Thới, H. Chợ Lách, Bến Tre",
                VnBase::RandomNumber(1, 200)." Ấp Tây Lộc, X. Vĩnh Thành, H. Chợ Lách, Bến Tre"
            ],
            [
                VnBase::RandomNumber(1,  80) ." Ấp Phước Định, X. Bình Hòa Phước, H. Long Hồ, Vĩnh Long",
                VnBase::RandomNumber(81, 150)." Ấp Phước Định, X. Bình Hòa Phước, H. Long Hồ, Vĩnh Long",
                VnBase::RandomNumber(151,200)." Ấp Phước Định, X. Bình Hòa Phước, H. Long Hồ, Vĩnh Long",
            ],
            [
                VnBase::RandomNumber(1, 200)." Thánh Mẫu, P. 7, TP. Đà Lạt, Lâm Đồng",
                VnBase::RandomNumber(1, 200)." Mai Anh Đào, P. 8, TP. Đà Lạt, Lâm Đồng",
                VnBase::RandomNumber(1, 200)." Trương Văn Hoàn, P. 9, Tp. Đà Lạt, Lâm Đồng",
                VnBase::RandomNumber(1, 200)." Phù Đổng Thiên Vương, P. 8, TP. Đà Lạt, Lâm Đồng",
                VnBase::RandomNumber(1, 200)." Nguyễn Đình Chiểu, P. 9, TP. Đà Lạt, Lâm Đồng",
            ]
        ];

        for ($i=1; $i <= $nXuatXu - 1; $i++) {
            $xs = VnBase::RandomNumber(0, 1000);
            if ($xs < 700) {
                $xuatXu[$i] = 1;
            } else if ($xs < 850) {
                $xuatXu[$i] = 2;
            } else {
                $xuatXu[$i] = 3;
            }
        }
        $xuatXu[$nXuatXu] = VnBase::RandomNumber(2, 5); //Đà Lạt

        $today = new DateTime('2010-01-01 08:00:00');

        for ($i=1, $count=2; $i <= $nXuatXu; $i++) {
            for ($j=0; $j < $xuatXu[$i]; $j++, $count++) { 
                $daiDien   = $uFN->FullName(VnBase::VnMixed);
                $email     = $uPI->Email($daiDien, "?", "", "?", "Ymd", VnBase::VnLowerCase, VnBase::VnTrimNormal);

                $tenNCC    = $this->getCompanyName($daiDien, $uFN);

                $diaChi    = $dsDiaChi[$i-1][$j];
                $dienThoai = $uPI->Mobile("", VnBase::VnFalse);
                
                array_push($list, [
                    'ncc_ma'        => $count,
                    'ncc_ten'       => $tenNCC,
                    'ncc_daiDien'   => $daiDien,
                    'ncc_diaChi'    => $diaChi,
                    'ncc_dienThoai' => $dienThoai,
                    'ncc_email'     => $email,
                    'ncc_taoMoi'    => $today->format('Y-m-d H:i:s'),
                    'ncc_capNhat'   => $today->format('Y-m-d H:i:s'),
                    'xx_ma'         => $i+1
                ]);
            }
        }
        DB::table('cusc_nhacungcap')->insert($list);
    }
}