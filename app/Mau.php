<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mau extends Model {
    const     CREATED_AT    = 'm_taoMoi';
    const     UPDATED_AT    = 'm_capNhat';

    protected $table        = 'cusc_mau';
    protected $fillable     = ['m_ten', 'm_taoMoi', 'm_capNhat', 'm_trangThai'];
    protected $guarded      = ['m_ma'];

    protected $primaryKey   = 'm_ma';

    protected $dates        = ['m_taoMoi', 'm_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}