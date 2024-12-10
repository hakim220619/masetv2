<?php

namespace App\Http\Controllers\Reviewers;

use App\Http\Controllers\Controller;
use App\Models\ReviewersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewersController extends Controller
{
    public function reviewers()
    {

        $bangunan = DB::table('bangunan')->count();
        $tanah_kosong = DB::table('tanah_kosong')->count();
        $retail = DB::table('retail')->count();

        //query tabel object

        return view('content.reviewers.reviewers', compact('bangunan', 'tanah_kosong', 'retail'));
    }
    public function bangunanView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.reviewers.view.bangunan', ['pageConfigs' => $pageConfigs]);
    }
    public function retailView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.reviewers.view.retail', ['pageConfigs' => $pageConfigs]);
    }
    public function tanahKosongView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.reviewers.view.tanahKosong', ['pageConfigs' => $pageConfigs]);
    }
    public function bangunanLoadData()
    {
        $data = ReviewersModel::bangunanLoadData();
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    public function tanahKosongLoadData()
    {
        $data = ReviewersModel::tanahKosongLoadData();
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
        $data = ReviewersModel::retailLoadData();
        // dd($data);
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    function acceptReviewers($id)
    {
        $checkApproval = DB::table('approval')->where('id_object', $id)->where('id_role', '3')->first();
        if ($checkApproval->last_update == 'OFF' || $checkApproval->last_update == null) {
            DB::table('approval')->where('id_object', $id)->where('id_role', '3')->update([
                'status' => 'true',
                'last_update' => 'ACCEPT',
                'id_user' => Auth::user()->id,
                'updated_at' => now()
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Approve Berhasil',
        ]);
    }
    function reportReviewers($id)
    {
        $checkApproval = DB::table('approval')->where('id_object', $id)->where('id_role', '3')->first();
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
