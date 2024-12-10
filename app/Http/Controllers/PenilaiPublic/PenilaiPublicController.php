<?php

namespace App\Http\Controllers\PenilaiPublic;

use App\Http\Controllers\Controller;
use App\Models\PenilaiPublicModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenilaiPublicController extends Controller
{
    public function penilai_public()
    {

        $bangunan = DB::table('bangunan')->count();
        $tanah_kosong = DB::table('tanah_kosong')->count();
        $retail = DB::table('retail')->count();

        //query tabel object

        return view('content.penilai_public.penilai_public', compact('bangunan', 'tanah_kosong', 'retail'));
    }
    public function bangunanView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.penilai_public.view.bangunan', ['pageConfigs' => $pageConfigs]);
    }
    public function retailView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.penilai_public.view.retail', ['pageConfigs' => $pageConfigs]);
    }
    public function tanahKosongView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.penilai_public.view.tanahKosong', ['pageConfigs' => $pageConfigs]);
    }
    public function bangunanLoadData()
    {
        $data = PenilaiPublicModel::bangunanLoadData();
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    public function tanahKosongLoadData()
    {
        $data = PenilaiPublicModel::tanahKosongLoadData();
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
        $data = PenilaiPublicModel::retailLoadData();
        // dd($data);
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    function acceptPenilaiPublic($id)
    {
        $checkApproval = DB::table('approval')->where('id_object', $id)->where('id_role', '5')->first();
        if ($checkApproval->last_update == 'OFF' || $checkApproval->last_update == null) {
            DB::table('approval')->where('id_object', $id)->where('id_role', '5')->update([
                'status' => 'true',
                'last_update' => 'ACCEPT',
                'id_user' => Auth::user()->id
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Approve Berhasil',
        ]);
    }
    function reportPenilaiPublic($id)
    {
        $checkApproval = DB::table('approval')->where('id_object', $id)->where('id_role', '5')->first();
        if ($checkApproval->last_update == 'OFF' || $checkApproval->last_update == null) {
            DB::table('approval')->where('id_object', $id)->where('id_role', '3')->update([
                'status' => 'true',
                'last_update' => 'REPORT',
                'id_user' => Auth::user()->id,
                'updated_at' => now()
            ]);
            DB::table('approval')->where('id_object', $id)->where('id_role', '5')->update([
                'status' => 'true',
                'last_update' => 'REPORT',
                'id_user' => Auth::user()->id,
                'updated_at' => now()
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Approve Berhasil',
        ]);
    }
}
