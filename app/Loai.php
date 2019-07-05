<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    const     CREATED_AT    = 'l_taoMoi';
    const     UPDATED_AT    = 'l_capNhat';

    protected $table        = 'cusc_loai';
    protected $fillable     = ['l_ten', 'l_taoMoi', 'l_capNhat', 'l_trangThai'];
    protected $guarded      = ['l_ma'];

    protected $primaryKey   = 'l_ma';

    protected $dates        = ['l_taoMoi', 'l_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function sanPhams()
    {
        return $this->hasMany('App\SanPham', 'l_ma', 'l_ma');
    }
}
