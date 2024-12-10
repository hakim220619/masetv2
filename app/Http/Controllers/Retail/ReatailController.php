<?php

namespace App\Http\Controllers\Retail;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReatailController extends Controller
{
    public function retail()
    {
        return view('content.object.retail.retail');
    }
    public function add_retail(Request $request) {
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
        $data['id_category'] = 3;
        $data['id_asset'] = $this->generateUniqueIdAsset();
        $data['created_at'] = now();

        DB::table('retail')->insert($data);

        return view('content.object.retail.retail');
    }
    public function generateUniqueIdAsset()
    {
        $latestAsset = DB::table('retail')
                          ->whereYear('created_at', Carbon::now()->year)
                          ->orderBy('id', 'desc')
                          ->first();

        $nextNumber = $latestAsset ? ((int) substr($latestAsset->id_asset, -4)) + 1 : 1;

        return '1' . Carbon::now()->year . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    } 
    public function detail_retail($id) {
        $detail_retail = DB::select("SELECT ROW_NUMBER() OVER () AS no, b.* 
                            FROM retail b, object_category oc 
                            WHERE b.id_category=oc.id 
                            AND b.id_category = 3
                            AND b.id = $id
                            ORDER BY no ASC");
        $detail_retail = $detail_retail[0];
        return view('content.object.retail.detail_retail', compact('detail_retail'));
    }
}
