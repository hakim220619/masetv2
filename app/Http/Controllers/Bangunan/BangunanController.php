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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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
        // Check if the directory exists, if not create it
        $uploadPath = public_path('storage/uploads/bangunan');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0775, true); // Create directories recursively
        }

        // Ambil semua input dari request
        $data = $request->all();
        dd($data);
        // 1. Filter data untuk field biasa
        $fieldData = [
            'nama_bangunan' => $data['nama_bangunan'],
            'foto_depan' => $this->uploadFile($request, 'foto_depan'),
            'foto_sisi_kiri' => $this->uploadFile($request, 'foto_sisi_kiri'),
            'foto_sisi_kanan' => $this->uploadFile($request, 'foto_sisi_kanan'),
            'bentuk_bangunan' => $data['bentuk_bangunan'] ?? null,
            'jenis_bangunan' => $data['jenis_bangunan'] ?? null,
            'jenis_bangunan_indeks_lantai' => $data['jenis_bangunan_indeks_lantai'] ?? null,
            'tahun_dibangun' => $data['tahun_dibangun'] ?? null,
            'tahun_renovasi' => $data['tahun_renovasi'] ?? null,
            'jenis_renovasi' => $data['jenis_renovasi'] ?? null,
            'bobot_renovasi' => $data['bobot_renovasi'] ?? null,
            'kondisi_visual' => $data['kondisi_visual'] ?? null,
            'catatan_khusus' => $data['catatan_khusus'] ?? null,
            'luas_bangunan_terpotong' => $data['luas_bangunan_terpotong'] ?? null,
            'luas_bangunan_imb' => $data['luas_bangunan_imb'] ?? null,
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

        // Handle dynamic data for fields like arrays (JSON)
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

        // Sanitize dynamic data: remove null values from arrays and filter out null values
        $dynamicData = array_filter($dynamicData, function ($value) {
            if (is_array($value)) {
                // If value is an array, remove null elements inside it
                return count(array_filter($value, fn($v) => $v !== null)) > 0;
            }
            return $value !== null;
        });

        // Insert dynamic data into the JSON field one by one if they are arrays
        $dynamicJsonData = [];
        foreach ($dynamicData as $key => $value) {
            if (is_array($value)) {
                $dynamicJsonData[$key] = array_map(function ($item) {
                    return $item !== null ? $item : null;
                }, $value);
            } else {
                $dynamicJsonData[$key] = $value;
            }
        }

        // Helper function to filter out null values
        // Helper function to replace null values with empty string
        // Helper function to remove null and empty string values
        // Helper function to remove null and empty string values, and reindex the array
        function filterNullValues($data)
        {
            // Remove null and empty strings
            $filtered = array_filter($data, function ($value) {
                return $value !== null && $value !== ''; // Remove null and empty strings
            });

            // Reindex the array so that keys are sequential starting from 0
            return array_values($filtered);
        }




        // Prepare dynamic fields as JSON
        $fotoLainnyaJson = json_encode($this->processFotoLainnya($request));
        $perlengkapanBangunanJson = json_encode(filterNullValues($data['perlengkapan_bangunan'] ?? []));
        $luasPintuJendelaJson = json_encode(filterNullValues($data['luas_nama_pintu_jendela'] ?? []));
        $luasBobotPintuJendelaJson = json_encode(filterNullValues($data['luas_bobot_pintu_jendela'] ?? []));
        $luasDindingJson = json_encode(filterNullValues($data['luas_nama_dinding'] ?? []));
        $luasBobotDindingJson = json_encode(filterNullValues($data['luas_bobot_dinding'] ?? []));
        $luasRangkaAtapDatarJson = json_encode(filterNullValues($data['luas_nama_rangka_atap_datar'] ?? []));
        $luasBobotRangkaAtapDatarJson = json_encode(filterNullValues($data['luas_bobot_rangka_atap_datar'] ?? []));
        $luasAtapDatarJson = json_encode(filterNullValues($data['luas_nama_atap_datar'] ?? []));
        $luasBobotAtapDatarJson = json_encode(filterNullValues($data['luas_bobot_atap_datar'] ?? []));
        $tipePondasiExistingJson = json_encode(filterNullValues($data['tipe_pondasi_existing'] ?? []));
        $bobotTipePondasiExistingJson = json_encode(filterNullValues($data['bobot_tipe_pondasi_existing'] ?? []));
        $tipeStrukturExistingJson = json_encode(filterNullValues($data['tipe_struktur_existing'] ?? []));
        $bobotTipeStrukturExistingJson = json_encode(filterNullValues($data['bobot_tipe_struktur_existing'] ?? []));
        $tipeRangkaAtapExistingJson = json_encode(filterNullValues($data['tipe_rangka_atap_existing'] ?? []));
        $bobotRangkaAtapExistingJson = json_encode(filterNullValues($data['bobot_rangka_atap_existing'] ?? []));
        $tipePenutupAtapExistingJson = json_encode(filterNullValues($data['tipe_penutup_atap_existing'] ?? []));
        $bobotPenutupAtapExistingJson = json_encode(filterNullValues($data['bobot_penutup_atap_existing'] ?? []));
        $tipeDindingExistingJson = json_encode(filterNullValues($data['tipe_tipe_dinding_existing'] ?? []));
        $bobotDindingExistingJson = json_encode(filterNullValues($data['bobot_tipe_dinding_existing'] ?? []));
        $tipePelapisDindingExistingJson = json_encode(filterNullValues($data['tipe_tipe_pelapis_dinding_existing'] ?? []));
        $bobotPelapisDindingExistingJson = json_encode(filterNullValues($data['bobot_tipe_pelapis_dinding_existing'] ?? []));
        $tipePintuJendelaExistingJson = json_encode(filterNullValues($data['tipe_tipe_pintu_jendela_existing'] ?? []));
        $bobotPintuJendelaExistingJson = json_encode(filterNullValues($data['bobot_tipe_pintu_jendela_existing'] ?? []));
        $tipeLantaiExistingJson = json_encode(filterNullValues($data['tipe_tipe_lantai_existing'] ?? []));
        $bobotLantaiExistingJson = json_encode(filterNullValues($data['bobot_tipe_lantai_existing'] ?? []));
        // dd($data['bobot_rangka_atap_existing']);
        // dd($tipeLantaiExistingJson);
        // Insert the data into the database
        $bangunan = Bangunan::create([
            ...$fieldData,
            'foto_lainnya' => $fotoLainnyaJson,
            'perlengkapan_bangunan' => $perlengkapanBangunanJson,
            'luas_nama_pintu_jendela' => $luasPintuJendelaJson,
            'luas_bobot_pintu_jendela' => $luasBobotPintuJendelaJson,
            'luas_nama_dinding' => $luasDindingJson,
            'luas_bobot_dinding' => $luasBobotDindingJson,
            'luas_nama_rangka_atap_datar' => $luasRangkaAtapDatarJson,
            'luas_bobot_rangka_atap_datar' => $luasBobotRangkaAtapDatarJson,
            'luas_nama_atap_datar' => $luasAtapDatarJson,
            'luas_bobot_atap_datar' => $luasBobotAtapDatarJson,
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
        return;
        // return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    private function uploadFile($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            // Generate a unique file name based on timestamp and random string
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/uploads/bangunan'), $fileName);
            return $fileName;
        }
        return null;
    }



    private function processFotoLainnya($request)
    {
        $fotoLainnya = [];

        // Check if 'judul_foto' exists and is an array
        if ($request->has('judul_foto') && is_array($request->judul_foto)) {
            $files = $request->hasFile('foto_lainnya') ? $request->file('foto_lainnya') : [];

            foreach ($request->judul_foto as $index => $judul) {
                $foto = null;

                if (isset($files[$index]) && $files[$index]->isValid()) {
                    // Get the file
                    $file = $files[$index];

                    // Generate a unique file name based on timestamp and random string
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                    // Move the file to the storage folder with the unique name
                    $file->move(public_path('storage/uploads/bangunan/foto_lainnya'), $fileName);

                    // Convert the file path to be accessible via the /storage/ URL
                    $foto = 'storage/uploads/bangunan/foto_lainnya/' . $fileName;
                }

                // Add the photo entry to the array
                $fotoLainnya[] = [
                    'judul' => $judul,
                    'foto'  => $foto,
                ];
            }
        }

        return $fotoLainnya;
    }
}
