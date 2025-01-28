<?php

namespace App\Http\Controllers\Laporan_penilaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanPenilaianController extends Controller
{
    public function laporan_bangunan() {
        return view('content.laporan_penilaian.laporan_bangunan');
    }
    public function laporan_tanah_kosong() {
        return view('content.laporan_penilaian.laporan_tanah_kosong');
    }
    public function laporan_retail() {
        return view('content.laporan_penilaian.laporan_retail');
    }
}
