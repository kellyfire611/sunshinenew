<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadonle extends Model {
    public    $timestamps   = false;

    protected $table        = 'cusc_hoadonle';
    protected $fillable     = ['hdl_nguoiMuaHang', 'hdl_dienThoai', 'hdl_diaChi', 'nv_lapHoaDon', 'hdl_ngayXuatHoaDon', 'dh_ma'];
    protected $guarded      = ['hdl_ma'];

    protected $primaryKey   = 'hdl_ma';

    protected $dates        = ['hdl_ngayXuatHoaDon'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}