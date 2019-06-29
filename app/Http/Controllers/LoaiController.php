<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoaiController extends Controller
{
    // action
    public function hienthimanhinhdanhsach() {
        return view('loai.manhinhdanhsach');
    }

    public function taomoi() {
        return '<h1>Tao moi</h1>';
    }
}
