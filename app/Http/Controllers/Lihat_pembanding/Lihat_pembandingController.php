<?php

namespace App\Http\Controllers\Lihat_pembanding;

use App\Http\Controllers\Controller;
use App\Models\PembandingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Lihat_pembandingController extends Controller
{
    public function lihat_pembanding() {

        $pembanding_bangunan = DB::table('pembanding_bangunan')->count();
        $pembanding_tanah_kosong = DB::table('pembanding_tanah_kosong')->count();
        $pembanding_retail = DB::table('pembanding_retail')->count();

        //query tabel object
        

        return view('content.lihat_pembanding.lihat_pembanding', compact('pembanding_bangunan','pembanding_tanah_kosong','pembanding_retail'));
    }
    public function bangunanView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.lihat_pembanding.view.bangunan', ['pageConfigs' => $pageConfigs]);
    }
    public function retailView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.lihat_pembanding.view.retail', ['pageConfigs' => $pageConfigs]);
    }
    public function tanahKosongView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.lihat_pembanding.view.tanahKosong', ['pageConfigs' => $pageConfigs]);
    }
    public function bangunanLoadData()
    {
        $data = PembandingModel::bangunanLoadData();
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    public function tanahKosongLoadData()
    {
        $data = PembandingModel::tanahKosongLoadData();
        // dd($data);
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    public function retailLoadData()
    {
        $data = PembandingModel::retailLoadData();
        // dd($data);
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
}
