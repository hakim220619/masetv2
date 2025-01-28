<?php

namespace App\Http\Controllers\Bangunan;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Bangunan;
use App\Models\BangunanModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BangunanController extends Controller
{
    public function bangunan()
    {
        return view('content.object.bangunan.bangunan');
    }
    public function bangunanView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.object.view.bangunan', ['pageConfigs' => $pageConfigs]);
    }
    public function retailView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.object.view.retail', ['pageConfigs' => $pageConfigs]);
    }
    public function tanahKosongView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.object.view.tanahKosong', ['pageConfigs' => $pageConfigs]);
    }
    public function bangunanLoadData()
    {
        $data = BangunanModel::bangunanLoadData();
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    public function tanahKosongLoadData()
    {
        $data = BangunanModel::tanahKosongLoadData();
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
        $data = BangunanModel::retailLoadData();
        // dd($data);
        return response()->json([
            'draw' => intval(request()->input('draw')),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    public function add_bangunan(Request $request)
    {
        $id_bangunan = DB::table('bangunan')->max('id') + 1;
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
        $data['foto_lainnya'] = $request->file('foto_lainnya')->getClientOriginalName();
        $data['id_category'] = 1;
        $data['id'] = $id_bangunan;
        $obj['id_object'] = $id_bangunan;
        $obj['id_category'] = 1;
        Helpers::generateApproval($obj);
        $data['id_asset'] = $this->generateUniqueIdAsset();
        $data['created_at'] = now();

        DB::table('bangunan')->insert($data);

        return view('content.object.bangunan.bangunan');
    }
    public function generateUniqueIdAsset()
    {
        $latestAsset = DB::table('bangunan')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = $latestAsset ? ((int) substr($latestAsset->id_asset, -4)) + 1 : 1;

        return '1' . Carbon::now()->year . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
    public function detail_bangunan($id)
    {
        $detail_bangunan = DB::select("SELECT ROW_NUMBER() OVER () AS no, b.* 
                            FROM bangunan b, object_category oc 
                            WHERE b.id_category=oc.id 
                            AND b.id_category = 1
                            AND b.id = $id
                            ORDER BY no ASC");
        $detail_bangunan = $detail_bangunan[0];
        return view('content.object.bangunan.detail_bangunan', compact('detail_bangunan'));
    }

    function acceptSurveyor($id)
    {
        $checkApproval = DB::table('approval')->where('id_object', $id)->where('id_role', '1')->first();
        if ($checkApproval->last_update == 'OFF' || $checkApproval->last_update == null) {
            DB::table('approval')->where('id_object', $id)->where('id_role', '1')->update([
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

    public function store(Request $request)
    {
        // Ambil semua input dari request
        $data = $request->all();
    
        // 1. Filter data untuk field biasa
        $fieldData = [
            'nama_bangunan' => $data['nama_bangunan'],
            'foto_depan' => $request->file('foto_depan') ? $request->file('foto_depan')->store('bangunan') : null,
            'foto_sisi_kiri' => $request->file('foto_sisi_kiri') ? $request->file('foto_sisi_kiri')->store('bangunan') : null,
            'foto_sisi_kanan' => $request->file('foto_sisi_kanan') ? $request->file('foto_sisi_kanan')->store('bangunan') : null,
            'bentuk_bangunan' => $data['bentuk_bangunan'] ?? null,
            'jumlah_lantai' => $data['jumlah_lantai'] ?? 1,
            'basement' => isset($data['basement']) ? 1 : 0,
            'konstruksi_bangunan' => $data['konstruksi_bangunan'] ?? null,
            'konstruksi_lantai' => $data['konstruksi_lantai'] ?? null,
            'konstruksi_dinding' => $data['konstruksi_dinding'] ?? null,
            'konstruksi_atap' => $data['konstruksi_atap'] ?? null,
            'konstruksi_pondasi' => $data['konstruksi_pondasi'] ?? null,
            'versi_btb' => $data['versi_btb'] ?? '2024',
            'tipe_spek' => $data['tipe_spek'] ?? null,
            'penggunaan_bangunan' => $data['penggunaan_bangunan'] ?? null,
            'perlengkapan_bangunan' => json_encode($data['perlengkapan_bangunan'] ?? []),
            'progres_pembangunan' => $data['progres_pembangunan'] ?? null,
            'kondisi_bangunan' => $data['kondisi_bangunan'] ?? null,
            'status_data' => $data['status_data'] ?? 'draft',
        ];
    
        // 2. Filter data untuk input dinamis (@include)
        $dynamicData = collect($data)->except([
            '_token',
            'nama_bangunan',
            'foto_depan',
            'foto_sisi_kiri',
            'foto_sisi_kanan',
            'bentuk_bangunan',
            'jumlah_lantai',
            'basement',
            'konstruksi_bangunan',
            'konstruksi_lantai',
            'konstruksi_dinding',
            'konstruksi_atap',
            'konstruksi_pondasi',
            'versi_btb',
            'tipe_spek',
            'penggunaan_bangunan',
            'perlengkapan_bangunan',
            'progres_pembangunan',
            'kondisi_bangunan',
            'status_data',
            'judul_foto',
            'foto_lainnya',
        ])->toArray();

        $dynamicData = array_filter($dynamicData, function ($value) {
            if (is_array($value)) {
                // Jika value adalah array, hapus elemen null di dalamnya
                return count(array_filter($value, fn($v) => $v !== null)) > 0;
            }
            return $value !== null;
        });
    
        // 3. Simpan data ke database
        $bangunan = Bangunan::create([
            ...$fieldData,
            'dynamic_data' => !empty($dynamicData) ? json_encode($dynamicData) : null,
            'foto_lainnya' => json_encode($this->processFotoLainnya($request)),
        ]);
    
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    
    /**
     * Fungsi untuk memproses input Foto Lainnya
     */
    private function processFotoLainnya($request)
    {
        $fotoLainnya = [];
    
        if ($request->has('judul_foto')) {
            foreach ($request->judul_foto as $index => $judul) {
                $fotoLainnya[] = [
                    'judul' => $judul,
                    'foto' => $request->file('foto_lainnya')[$index]
                        ? $request->file('foto_lainnya')[$index]->store('bangunan/foto_lainnya')
                        : null,
                ];
            }
        }
    
        return $fotoLainnya;
    }
}
