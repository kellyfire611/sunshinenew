<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phieunhap extends Model {
    const     CREATED_AT    = 'pn_taoMoi';
    const     UPDATED_AT    = 'pn_capNhat';

    protected $table        = 'cusc_phieunhap';
    protected $fillable     = ['pn_nguoiGiao', 'pn_soHoaDon', 'pn_ngayXuatHoaDon', 'pn_ghiChu', 'nv_nguoiLapPhieu', 'pn_ngayLapPhieu', 'nv_keToan', 'pn_ngayXacNhan', 'nv_thuKho', 'pn_ngayNhapKho', 'pn_taoMoi', 'pn_capNhat', 'pn_trangThai', 'ncc_ma'];
    protected $guarded      = ['pn_ma'];

    protected $primaryKey   = 'pn_ma';

    protected $dates        = ['pn_ngayXuatHoaDon', 'pn_ngayLapPhieu', 'pn_ngayXacNhan', 'pn_ngayNhapKho', 'pn_taoMoi', 'pn_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}