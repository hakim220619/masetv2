<?php

namespace App\Http\Controllers\Object;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ObjectController extends Controller
{
    public function lihat_object() {

        $bangunan = DB::table('bangunan')->count();
        $tanah_kosong = DB::table('tanah_kosong')->count();
        $retail = DB::table('retail')->count();

        //query tabel object

        return view('content.object.lihat_object', compact('bangunan','tanah_kosong','retail'));
    }
}
