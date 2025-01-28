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
        // Debugging to see all input data
        // dd($request->all());

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
            'progres_pembangunan' => $data['progres_pembangunan'] ?? null,
            'kondisi_bangunan' => $data['kondisi_bangunan'] ?? null,
            'status_data' => $data['status_data'] ?? 'draft',
        ];

        // 2. Handle dynamic data for fields like arrays (JSON)
        $dynamicData = collect($data)->except([
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
            'progres_pembangunan',
            'kondisi_bangunan',
            'status_data',
            'foto_lainnya',
        ])->toArray();

        // 3. Sanitize dynamic data: remove null values from arrays and filter out null values
        $dynamicData = array_filter($dynamicData, function ($value) {
            if (is_array($value)) {
                // If value is an array, remove null elements inside it
                return count(array_filter($value, fn($v) => $v !== null)) > 0;
            }
            return $value !== null;
        });

        // 4. Insert dynamic data into the JSON field one by one if they are arrays
        $dynamicJsonData = [];
        foreach ($dynamicData as $key => $value) {
            if (is_array($value)) {
                // If it's an array, insert each item individually into the JSON field
                $dynamicJsonData[$key] = array_map(function ($item) {
                    return $item !== null ? $item : null;
                }, $value);
            } else {
                // If it's not an array, just insert the value as is
                $dynamicJsonData[$key] = $value;
            }
        }

        // 5. Prepare the dynamic data for JSON encoding
        // $dynamicDataJson = !empty($dynamicJsonData) ? json_encode($dynamicJsonData) : null;
        $fotoLainnyaJson = json_encode($this->processFotoLainnya($request));

        // 6. Handle the dynamic fields that are arrays and need to be converted to JSON
        $perlengkapanBangunanJson = json_encode($data['perlengkapan_bangunan'] ?? []);
        $luasPintuJendelaJson = json_encode($data['luas_nama_pintu_jendela'] ?? []);
        $luasBobotPintuJendelaJson = json_encode($data['luas_bobot_pintu_jendela'] ?? []);
        $luasDindingJson = json_encode($data['luas_nama_dinding'] ?? []);
        $luasBobotDindingJson = json_encode($data['luas_bobot_dinding'] ?? []);
        $tipePondasiExistingJson = json_encode($data['tipe_pondasi_existing'] ?? []);
        $bobotTipePondasiExistingJson = json_encode($data['bobot_tipe_pondasi_existing'] ?? []);
        $tipeStrukturExistingJson = json_encode($data['tipe_struktur_existing'] ?? []);
        $bobotTipeStrukturExistingJson = json_encode($data['bobot_tipe_struktur_existing'] ?? []);
        $tipeRangkaAtapExistingJson = json_encode($data['tipe_rangka_atap_existing'] ?? []);
        $bobotRangkaAtapExistingJson = json_encode($data['bobot_rangka_atap_existing'] ?? []);
        $tipePenutupAtapExistingJson = json_encode($data['tipe_penutup_atap_existing'] ?? []);
        $bobotPenutupAtapExistingJson = json_encode($data['bobot_penutup_atap_existing'] ?? []);
        $tipeDindingExistingJson = json_encode($data['tipe_tipe_dinding_existing'] ?? []);
        $bobotDindingExistingJson = json_encode($data['bobot_tipe_dinding_existing'] ?? []);
        $tipePelapisDindingExistingJson = json_encode($data['tipe_tipe_pelapis_dinding_existing'] ?? []);
        $bobotPelapisDindingExistingJson = json_encode($data['bobot_tipe_pelapis_dinding_existing'] ?? []);
        $tipePintuJendelaExistingJson = json_encode($data['tipe_tipe_pintu_jendela_existing'] ?? []);
        $bobotPintuJendelaExistingJson = json_encode($data['bobot_tipe_pintu_jendela_existing'] ?? []);
        $tipeLantaiExistingJson = json_encode($data['tipe_tipe_lantai_existing'] ?? []);
        $bobotLantaiExistingJson = json_encode($data['bobot_tipe_lantai_existing'] ?? []);

        // 7. Insert the data into the database
        $bangunan = Bangunan::create([
            ...$fieldData,
            // 'dynamic_data' => $dynamicDataJson,
            'foto_lainnya' => $fotoLainnyaJson,
            'perlengkapan_bangunan' => $perlengkapanBangunanJson,
            'luas_nama_pintu_jendela' => $luasPintuJendelaJson,
            'luas_bobot_pintu_jendela' => $luasBobotPintuJendelaJson,
            'luas_nama_dinding' => $luasDindingJson,
            'luas_bobot_dinding' => $luasBobotDindingJson,
            'tipe_pondasi_existing' => $tipePondasiExistingJson,
            'bobot_tipe_pondasi_existing' => $bobotTipePondasiExistingJson,
            'tipe_struktur_existing' => $tipeStrukturExistingJson,
            'bobot_tipe_struktur_existing' => $bobotTipeStrukturExistingJson,
            'tipe_rangka_atap_existing' => $tipeRangkaAtapExistingJson,
            'bobot_rangka_atap_existing' => $bobotRangkaAtapExistingJson,
            'tipe_penutup_atap_existing' => $tipePenutupAtapExistingJson,
            'bobot_penutup_atap_existing' => $bobotPenutupAtapExistingJson,
            'tipe_tipe_dinding_existing' => $tipeDindingExistingJson,
            'bobot_tipe_dinding_existing' => $bobotDindingExistingJson,
            'tipe_tipe_pelapis_dinding_existing' => $tipePelapisDindingExistingJson,
            'bobot_tipe_pelapis_dinding_existing' => $bobotPelapisDindingExistingJson,
            'tipe_tipe_pintu_jendela_existing' => $tipePintuJendelaExistingJson,
            'bobot_tipe_pintu_jendela_existing' => $bobotPintuJendelaExistingJson,
            'tipe_tipe_lantai_existing' => $tipeLantaiExistingJson,
            'bobot_tipe_lantai_existing' => $bobotLantaiExistingJson,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }



    /**
     * Fungsi untuk memproses input Foto Lainnya
     */
    private function processFotoLainnya($request)
    {
        $fotoLainnya = [];

        // Check if there is any 'judul_foto' in the request
        if ($request->has('judul_foto') && is_array($request->judul_foto)) {
            // Make sure 'foto_lainnya' is also an array
            $files = $request->has('foto_lainnya') ? $request->file('foto_lainnya') : [];

            foreach ($request->judul_foto as $index => $judul) {
                // Handle the case where a photo might not be uploaded for the title
                $foto = isset($files[$index]) && $files[$index] ?
                    $files[$index]->store('bangunan/foto_lainnya') : null;

                // Add each item with its title and file to the fotoLainnya array
                $fotoLainnya[] = [
                    'judul' => $judul,
                    'foto'  => $foto,
                ];
            }
        }

        return $fotoLainnya;
    }
}
