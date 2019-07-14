<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nhanvien;

class BackendController extends Controller
{
    public function dashboard() {
        return view('backend.dashboard');
    }

    public function activate(Request $request, $nv_ma) 
    {
        $nv = Nhanvien::find($nv_ma);
        $nv->nv_trangThai = 2; // Khả dụng
        $nv->save();

        return redirect()->route('frontend.home');
    }
}
