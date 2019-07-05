<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vanchuyen extends Model {
    const     CREATED_AT    = 'vc_taoMoi';
    const     UPDATED_AT    = 'vc_capNhat';

    protected $table        = 'cusc_vanchuyen';
    protected $fillable     = ['vc_ten', 'vc_chiPhi', 'vc_dienGiai', 'vc_taoMoi', 'vc_capNhat', 'vc_trangThai'];
    protected $guarded      = ['vc_ma'];

    protected $primaryKey   = 'vc_ma';

    protected $dates        = ['vc_taoMoi', 'vc_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}