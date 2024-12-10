<?php

namespace App\Http\Controllers\Pembanding_retail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pembanding_retailController extends Controller
{
    public function retail()
    {
        
        return view('content.pembanding.pembanding_retail');
    }
    public function add_pembanding_retail(Request $request) {
        $foto_tampak_depan = $request->file('foto_tampak_depan');
        $filename1 = $foto_tampak_depan->getClientOriginalName();
        $foto_tampak_depan->move(public_path('storage/images/pembanding_retail'), $filename1);

        $foto_tampak_sisi_kiri = $request->file('foto_tampak_sisi_kiri');
        $filename2 = $foto_tampak_sisi_kiri->getClientOriginalName();
        $foto_tampak_sisi_kiri->move(public_path('storage/images/pembanding_retail'), $filename2);

        $foto_tampak_sisi_kanan = $request->file('foto_tampak_sisi_kanan');
        $filename3 = $foto_tampak_sisi_kanan->getClientOriginalName();
        $foto_tampak_sisi_kanan->move(public_path('storage/images/pembanding_retail'), $filename3);

        $foto_lainnya = $request->file('foto_lainnya');
        $filename4 = $foto_lainnya->getClientOriginalName();
        $foto_lainnya->move(public_path('storage/images/pembanding_retail'), $filename4);

        $data = $request->except('_token');
        $data['foto_tampak_depan'] = $request->file('foto_tampak_depan')->getClientOriginalName();
        $data['foto_tampak_sisi_kiri'] = $request->file('foto_tampak_sisi_kiri')->getClientOriginalName();
        $data['foto_tampak_sisi_kanan'] = $request->file('foto_tampak_sisi_kanan')->getClientOriginalName();
        $data['foto_lainnya'] = $request->file('foto_lainnya')->getClientOriginalName();
        // $data['id_asset'] = $this->generateUniqueIdAsset();
        $data['created_at'] = now();

        DB::table('pembanding_retail')->insert($data);

        return view('content.pembanding.pembanding_retail');
    }
    public function detail_pembanding_retail($id) {
        $detail_pembanding_retail = DB::select("SELECT ROW_NUMBER() OVER () AS no, b.* 
                            FROM pembanding_retail b
                            WHERE b.id = $id
                            ORDER BY no ASC");
        $detail_pembanding_retail = $detail_pembanding_retail[0];
  
        return view('content.lihat_pembanding.detail_pembanding_retail', compact('detail_pembanding_retail'));
    }
}
