<?php

namespace App\Http\Controllers\Pembanding_bangunan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembandingBangunanController extends Controller
{
    public function bangunan()
    {
        return view('content.pembanding.pembanding_bangunan');
    }
    public function add_pembanding_bangunan(Request $request) {
        $foto_tampak_depan = $request->file('foto_tampak_depan');
        $filename1 = $foto_tampak_depan->getClientOriginalName();
        $foto_tampak_depan->move(public_path('storage/images/pembanding_bangunan'), $filename1);

        $foto_tampak_sisi_kiri = $request->file('foto_tampak_sisi_kiri');
        $filename2 = $foto_tampak_sisi_kiri->getClientOriginalName();
        $foto_tampak_sisi_kiri->move(public_path('storage/images/pembanding_bangunan'), $filename2);

        $foto_tampak_sisi_kanan = $request->file('foto_tampak_sisi_kanan');
        $filename3 = $foto_tampak_sisi_kanan->getClientOriginalName();
        $foto_tampak_sisi_kanan->move(public_path('storage/images/pembanding_bangunan'), $filename3);

        $foto_lainnya = $request->file('foto_lainnya');
        $filename4 = $foto_lainnya->getClientOriginalName();
        $foto_lainnya->move(public_path('storage/images/pembanding_bangunan'), $filename4);

        $data = $request->except('_token');
        $data['foto_tampak_depan'] = $request->file('foto_tampak_depan')->getClientOriginalName();
        $data['foto_tampak_sisi_kiri'] = $request->file('foto_tampak_sisi_kiri')->getClientOriginalName();
        $data['foto_tampak_sisi_kanan'] = $request->file('foto_tampak_sisi_kanan')->getClientOriginalName();
        $data['foto_lainnya'] = $request->file('foto_lainnya')->getClientOriginalName();
        // $data['id_asset'] = $this->generateUniqueIdAsset();
        $data['created_at'] = now();

        DB::table('pembanding_bangunan')->insert($data);

        return view('content.pembanding.pembanding_bangunan');
    }
    public function detail_pembanding_bangunan($id) {
        $detail_pembanding_bangunan = DB::select("SELECT ROW_NUMBER() OVER () AS no, b.* 
                            FROM pembanding_bangunan b
                            WHERE b.id = $id
                            ORDER BY no ASC");
        $detail_pembanding_bangunan = $detail_pembanding_bangunan[0];
  
        return view('content.lihat_pembanding.detail_pembanding_bangunan', compact('detail_pembanding_bangunan'));
    }
    public function generateUniqueIdAsset()
    {
        $latestAsset = DB::table('pembanding_bangunan')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = $latestAsset ? ((int) substr($latestAsset->id_asset, -4)) + 1 : 1;

        return '2' . Carbon::now()->year . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}
