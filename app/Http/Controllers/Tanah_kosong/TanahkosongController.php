<?php

namespace App\Http\Controllers\Tanah_kosong;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TanahkosongController extends Controller
{
    public function tanah_kosong()
    {
        return view('content.object.tanah_kosong.tanah_kosong');
    }
    public function add_tanah_kosong(Request $request) {
        $foto_tampak_depan = $request->file('foto_tampak_depan');
        $filename1 = $foto_tampak_depan->getClientOriginalName();
        $foto_tampak_depan->move(public_path('storage/images/bangunan'), $filename1);

        $foto_tampak_sisi_kiri = $request->file('foto_tampak_sisi_kiri');
        $filename2 = $foto_tampak_sisi_kiri->getClientOriginalName();
        $foto_tampak_sisi_kiri->move(public_path('storage/images/bangunan'), $filename2);

        $foto_tampak_sisi_kanan = $request->file('foto_tampak_sisi_kanan');
        $filename3 = $foto_tampak_sisi_kanan->getClientOriginalName();
        $foto_tampak_sisi_kanan->move(public_path('storage/images/bangunan'), $filename3);

        $foto_lainnya = $request->file('foto_lainnya');
        $filename4 = $foto_lainnya->getClientOriginalName();
        $foto_lainnya->move(public_path('storage/images/bangunan'), $filename4);

        $data = $request->except('_token');
        $data['foto_tampak_depan'] = $request->file('foto_tampak_depan')->getClientOriginalName();
        $data['foto_tampak_sisi_kiri'] = $request->file('foto_tampak_sisi_kiri')->getClientOriginalName();
        $data['foto_tampak_sisi_kanan'] = $request->file('foto_tampak_sisi_kanan')->getClientOriginalName();
        $data['foto_lainnya'] = $request->file('foto_lainnya')->getClientOriginalName();;
        $data['id_category'] = 2;
        $data['id_asset'] = $this->generateUniqueIdAsset();
        $data['created_at'] = now();


        DB::table('tanah_kosong')->insert($data);

        return view('content.object.tanah_kosong.tanah_kosong');
    }
    public function generateUniqueIdAsset()
    {
        $latestAsset = DB::table('tanah_kosong')
                          ->whereYear('created_at', Carbon::now()->year)
                          ->orderBy('id', 'desc')
                          ->first();

        $nextNumber = $latestAsset ? ((int) substr($latestAsset->id_asset, -4)) + 1 : 1;

        return '1' . Carbon::now()->year . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }  
    public function detail_tanah_kosong($id) {
        $detail_tanah_kosong = DB::select("SELECT ROW_NUMBER() OVER () AS no, t.* 
                            FROM tanah_kosong t, object_category oc 
                            WHERE t.id_category=oc.id 
                            AND t.id_category = 2
                            AND t.id = $id
                            ORDER BY no ASC");
        $detail_tanah_kosong = $detail_tanah_kosong[0];
        return view('content.object.tanah_kosong.detail_tanah_kosong', compact('detail_tanah_kosong'));
    }
}
