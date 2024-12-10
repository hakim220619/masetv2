<?php

namespace App\Http\Controllers\Pembanding_tanah_kosong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pembanding_tanah_kosongController extends Controller
{
    public function tanah_kosong()
    {
        
        return view('content.pembanding.pembanding_tanah_kosong');
    }
    public function add_pembanding_tanah_kosong(Request $request) {
        $foto_tampak_depan = $request->file('foto_tampak_depan');
        $filename1 = $foto_tampak_depan->getClientOriginalName();
        $foto_tampak_depan->move(public_path('storage/images/pembanding_tanah_kosong'), $filename1);

        $foto_tampak_sisi_kiri = $request->file('foto_tampak_sisi_kiri');
        $filename2 = $foto_tampak_sisi_kiri->getClientOriginalName();
        $foto_tampak_sisi_kiri->move(public_path('storage/images/pembanding_tanah_kosong'), $filename2);

        $foto_tampak_sisi_kanan = $request->file('foto_tampak_sisi_kanan');
        $filename3 = $foto_tampak_sisi_kanan->getClientOriginalName();
        $foto_tampak_sisi_kanan->move(public_path('storage/images/pembanding_tanah_kosong'), $filename3);

        $foto_lainnya = $request->file('foto_lainnya');
        $filename4 = $foto_lainnya->getClientOriginalName();
        $foto_lainnya->move(public_path('storage/images/pembanding_tanah_kosong'), $filename4);

        $data = $request->except('_token');
        $data['foto_tampak_depan'] = $request->file('foto_tampak_depan')->getClientOriginalName();
        $data['foto_tampak_sisi_kiri'] = $request->file('foto_tampak_sisi_kiri')->getClientOriginalName();
        $data['foto_tampak_sisi_kanan'] = $request->file('foto_tampak_sisi_kanan')->getClientOriginalName();
        $data['foto_lainnya'] = $request->file('foto_lainnya')->getClientOriginalName();
        // $data['id_asset'] = $this->generateUniqueIdAsset();
        $data['created_at'] = now();

        DB::table('pembanding_tanah_kosong')->insert($data);

        return view('content.pembanding.pembanding_tanah_kosong');
    }
    public function detail_pembanding_tanah_kosong($id) {
        $detail_pembanding_tanah_kosong = DB::select("SELECT ROW_NUMBER() OVER () AS no, b.* 
                            FROM pembanding_tanah_kosong b
                            WHERE b.id = $id
                            ORDER BY no ASC");
        $detail_pembanding_tanah_kosong = $detail_pembanding_tanah_kosong[0];
  
        return view('content.lihat_pembanding.detail_pembanding_tanah_kosong', compact('detail_pembanding_tanah_kosong'));
    }
}
