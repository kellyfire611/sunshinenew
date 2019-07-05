<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thanhtoan extends Model {
    const     CREATED_AT    = 'tt_taoMoi';
    const     UPDATED_AT    = 'tt_capNhat';

    protected $table        = 'cusc_thanhtoan';
    protected $fillable     = ['tt_ten', 'tt_dienGiai', 'tt_taoMoi', 'tt_capNhat', 'tt_trangThai'];
    protected $guarded      = ['tt_ma'];

    protected $primaryKey   = 'tt_ma';

    protected $dates        = ['tt_taoMoi', 'tt_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}