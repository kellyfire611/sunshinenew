<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    const     CREATED_AT    = 'cd_taoMoi';
    const     UPDATED_AT    = 'cd_capNhat';

    protected $table        = 'cusc_chude';
    protected $fillable     = ['cd_ten', 'cd_taoMoi', 'cd_capNhat', 'cd_trangThai'];
    protected $guarded      = ['cd_ma'];

    protected $primaryKey   = 'cd_ma';

    protected $dates        = ['cd_taoMoi', 'cd_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
