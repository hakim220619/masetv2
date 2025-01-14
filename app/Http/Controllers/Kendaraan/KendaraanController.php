<?php

namespace App\Http\Controllers\Kendaraan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function kendaraan()
    {
        return view('content.object.kendaraan.kendaraan');
    }
    public function kendaraanView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.object.view.kendaraan.kendaraan', ['pageConfigs' => $pageConfigs]);
    }
}
