<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietnhap extends Model {
    public    $timestamps   = false;

    protected $table        = 'cusc_chitietnhap';
    protected $fillable     = ['ctn_soLuong', 'ctn_donGia'];
    protected $guarded      = ['pn_ma', 'sp_ma', 'm_ma'];

    protected $primaryKey   = ['pn_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;
}