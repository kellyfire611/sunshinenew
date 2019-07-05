<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenmaiSanpham extends Model {
    public    $timestamps   = false;

    protected $table        = 'cusc_khuyenmaisanpham';
    protected $fillable     = ['kmsp_giaTri', 'kmsp_trangThai'];
    protected $guarded      = ['km_ma', 'sp_ma', 'm_ma'];

    protected $primaryKey   = ['km_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;
}