<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model {
    const     CREATED_AT    = 'ncc_taoMoi';
    const     UPDATED_AT    = 'ncc_capNhat';

    protected $table        = 'cusc_nhacungcap';
    protected $fillable     = ['ncc_ten', 'ncc_daiDien', 'ncc_diaChi', 'ncc_dienThoai', 'ncc_email', 'ncc_taoMoi', 'ncc_capNhat', 'ncc_trangThai', 'xx_ma'];
    protected $guarded      = ['ncc_ma'];

    protected $primaryKey   = 'ncc_ma';

    protected $dates        = ['ncc_taoMoi', 'ncc_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}