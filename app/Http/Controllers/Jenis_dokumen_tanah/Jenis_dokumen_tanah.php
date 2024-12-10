<?php

namespace App\Http\Controllers\Jenis_dokumen_tanah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Jenis_dokumen_tanah extends Controller
{
    public function index() {
        $jenis_dokumen_hak_tanah = DB::table('jenis_dokumen_hak_tanah')->get();
        return view('content.jenis_dokumen_tanah.jenis_dokumen_tanah',compact('jenis_dokumen_hak_tanah'));
    }
}
