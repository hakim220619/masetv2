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
use Illuminate\Support\Facades\Log;

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
    public function listObject(Request $request)
    {
        // Capture search and type parameters (optional)
        $search = $request->input('search');
        $type = $request->input('type');

        // Fetch objects based on optional filters
        $data = BangunanModel::listObject($search, $type);

        return response()->json([
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }
    public function destroy($id)
    {
        try {
            // Find the object by its ID using DB::table()
            $deleted = DB::table('bangunan')->where('id', $id)->delete();

            // Check if a row was deleted
            if ($deleted) {
                // Return a success response if deleted
                return response()->json(['message' => 'Obyek berhasil dihapus.'], 200);
            } else {
                // If no rows were deleted (ID not found), return a not found message
                return response()->json(['message' => 'Obyek tidak ditemukan.'], 404);
            }
        } catch (\Exception $e) {
            // In case of error, return an error response
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
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
        try {
            // Check if the directory exists, if not create it
            $uploadPath = public_path('storage/uploads/bangunan');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true); // Create directories recursively
            }

            // Ambil semua input dari request
            $data = $request->all();
            // dd($data);
            // 1. Filter data untuk field biasa
            $fieldData = [
                'nama_bangunan' => $data['nama_bangunan'],
                'foto_depan' => $this->uploadFile($request, 'foto_depan'),
                'foto_sisi_kiri' => $this->uploadFile($request, 'foto_sisi_kiri'),
                'foto_sisi_kanan' => $this->uploadFile($request, 'foto_sisi_kanan'),
                'bentuk_bangunan' => $data['bentuk_bangunan'] ?? null,
                'jenis_bangunan' => $this->getJenisBangunan($request) ?? null,
                'jenis_bangunan_indeks_lantai' => $this->getJenisBangunanIndeksLantai($request) ?? null,
                'jenis_bangunan_detail' => $data['jenis_bangunan_detail'] ?? null,
                'grade_gudang' => $data['grade_gudang'] ?? null,
                'tahun_dibangun' => $data['tahun_dibangun'] ?? null,
                'keterangan_tahun_dibangun' => json_encode($data['keterangan_tahun_dibangun'] ?? []),
                'tahun_renovasi' => $data['tahun_renovasi'] ?? null,
                'keterangan_tahun_direnovasi' => json_encode($data['keterangan_tahun_direnovasi'] ?? []),
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


            $jenisBangunanDetailJson = json_encode(filterNullValues($data['jenis_bangunan_detail'] ?? []));
            $jumlahLantaiRumahTinggalJson = json_encode(filterNullValues($data['jumlah_lantai_rumah_tinggal'] ?? []));
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
                'jenis_bangunan_detail' => $jenisBangunanDetailJson,
                'jumlah_lantai_rumah_tinggal' => $jumlahLantaiRumahTinggalJson,
            ]);
            // return;
            // dd([
            //     'field_data' => $fieldData,
            //     'jenis_bangunan' => $this->getJenisBangunan($request),
            //     'jenis_bangunan_detail' => $data['jenis_bangunan_detail'],
            //     'jenis_renovasi' => $data['jenis_renovasi'],
            //     'bobot_renovasi' => $data['bobot_renovasi'],
            //     'jenis_bangunan_indeks_lantai' => $this->getJenisBangunanIndeksLantai($request),
            //     'jumlah_lantai' => $data['jumlah_lantai'],
            // ]);
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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

        if ($request->has('judul_foto') && is_array($request->judul_foto)) {
            $files = $request->hasFile('foto_lainnya') ? $request->file('foto_lainnya') : [];

            foreach ($request->judul_foto as $index => $judul) {
                // Skip if no title and no file
                if (empty($judul) && !isset($files[$index])) {
                    continue;
                }

                $foto = null;

                if (isset($files[$index]) && $files[$index]->isValid()) {
                    $file = $files[$index];
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/uploads/bangunan/foto_lainnya'), $fileName);
                    $foto = 'storage/uploads/bangunan/foto_lainnya/' . $fileName;
                }

                $fotoLainnya[] = [
                    'judul' => $judul,
                    'foto'  => $foto,
                ];
            }
        }

        return $fotoLainnya;
    }

    // Tambahkan method helper untuk mengambil jenis bangunan
    private function getJenisBangunan($request)
    {
        // Cek semua kemungkinan input jenis_bangunan dari berbagai form
        $possibleInputs = [
            $request->input('jenis_bangunan'),
            $request->input('jenis_bangunan_100'),
            $request->input('jenis_bangunan_200'),
            $request->input('jenis_bangunan_300'),
            $request->input('jenis_bangunan_400'),
            $request->input('jenis_bangunan_500'),
            $request->input('jenis_bangunan_600'),
            $request->input('jenis_bangunan_700'),
            $request->input('jenis_bangunan_800'),
            $request->input('jenis_bangunan_900'),
            $request->input('jenis_bangunan_1000'),
            $request->input('jenis_bangunan_1100')
        ];

        // Ambil nilai yang tidak null
        foreach ($possibleInputs as $input) {
            if (!is_null($input)) {
                // Bersihkan string dari suffix _100, _1000, _1100
                return preg_replace('/_(?:100|200|300|400|500|600|700|800|900|1000|1100)$/', '', $input);
            }
        }

        return null;
    }

    // Tambahkan method helper untuk mengambil jenis bangunan indeks lantai
    private function getJenisBangunanIndeksLantai($request)
    {
        // Cek semua kemungkinan input jenis_bangunan_indeks_lantai dari berbagai form
        $possibleInputs = [
            $request->input('jenis_bangunan_indeks_lantai'),
            $request->input('jenis_bangunan_indeks_lantai_100'),
            $request->input('jenis_bangunan_indeks_lantai_200'),
            $request->input('jenis_bangunan_indeks_lantai_300'),
            $request->input('jenis_bangunan_indeks_lantai_400'),
            $request->input('jenis_bangunan_indeks_lantai_500'),
            $request->input('jenis_bangunan_indeks_lantai_600'),
            $request->input('jenis_bangunan_indeks_lantai_700'),
            $request->input('jenis_bangunan_indeks_lantai_800'),
            $request->input('jenis_bangunan_indeks_lantai_900'),
            $request->input('jenis_bangunan_indeks_lantai_1000'),
            $request->input('jenis_bangunan_indeks_lantai_1100')
        ];

        // Ambil nilai yang tidak null
        foreach ($possibleInputs as $input) {
            if (!is_null($input)) {
                // Bersihkan string dari suffix _100, _1000, _1100
                return preg_replace('/_(?:100|200|300|400|500|600|700|800|900|1000|1100)$/', '', $input);
            }
        }

        return null;
    }

    public function edit($id)
    {
        try {
            $bangunan = Bangunan::findOrFail($id);

            // Ambil tipe_spek yang tersimpan
            $tipeSpek = $bangunan->tipe_spek;

            // Data yang perlu ditambahkan suffix
            $fieldsNeedSuffix = [
                'jenis_bangunan',
                'jenis_bangunan_detail',
                'jenis_bangunan_indeks_lantai',
                'tipe_struktur_utama',
                'tipe_struktur_atap',
                'tipe_penutup_atap',
                'tipe_dinding',
                'tipe_pelapis_dinding',
                'tipe_pintu_jendela',
                'tipe_lantai',
                'bobot_struktur_utama',
                'bobot_struktur_atap',
                'bobot_penutup_atap',
                'bobot_dinding',
                'bobot_pelapis_dinding',
                'bobot_pintu_jendela',
                'bobot_lantai',
                // Tambahan field bobot
                'bobot_renovasi',
                'bobot_fasilitas',
                'bobot_sarana',
                'bobot_keamanan',
                'bobot_harga',
                'bobot_konstruksi',
                'bobot_material',
                'bobot_utilitas',
                'bobot_aksesibilitas',
                'bobot_lokasi',
                // Tambahan field tipe
                'grade_gudang',
                'tahun_dibangun',
                'keterangan_tahun_dibangun',
                'tahun_renovasi',
                'keterangan_tahun_direnovasi',
                'jenis_renovasi',
                'kondisi_visual',
                'catatan_khusus',
                'luas_bangunan_terpotong',
                'luas_bangunan_imb',
                'jumlah_lantai',
                'luas_nama_pintu_jendela',
                'luas_bobot_pintu_jendela',
                'luas_nama_dinding',
                'luas_bobot_dinding',
                'luas_nama_rangka_atap_datar',
                'luas_bobot_rangka_atap_datar',
                'luas_nama_atap_datar',
                'luas_bobot_atap_datar',
                'tipe_pondasi_existing',
                'bobot_tipe_pondasi_existing',
                'tipe_struktur_existing',
                'bobot_tipe_struktur_existing',
                'tipe_rangka_atap_existing',
                'bobot_rangka_atap_existing',
                'tipe_penutup_atap_existing',
                'bobot_penutup_atap_existing',
                'tipe_tipe_dinding_existing',
                'bobot_tipe_dinding_existing',
                'tipe_tipe_pelapis_dinding_existing',
                'bobot_tipe_pelapis_dinding_existing',
                'tipe_tipe_pintu_jendela_existing',
                'bobot_tipe_pintu_jendela_existing',
                'tipe_tipe_lantai_existing',
                'bobot_tipe_lantai_existing',
                'jumlah_lantai_rumah_tinggal',
                'jenis_bangunan_indeks_lantai',
            ];

            // Tambahkan suffix ke data sesuai tipe_spek
            $processedData = new \stdClass();
            foreach ($fieldsNeedSuffix as $field) {
                if (isset($bangunan->$field)) {
                    // Buat key baru dengan suffix
                    $newKey = $field . '_' . $tipeSpek;
                    $processedData->$newKey = $bangunan->$field;
                }
            }

            // Gabungkan properti dari processedData ke objek bangunan
            foreach (get_object_vars($processedData) as $key => $value) {
                $bangunan->$key = $value;
            }

            return view('content.object.bangunan.edit', [
                'bangunan' => $bangunan,
                'dataBangunan' => $this->getDataBangunan()
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data bangunan tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $bangunan = Bangunan::findOrFail($id);

            // Ambil semua input dari request
            $data = $request->all();

            // 1. Update field biasa
            $fieldData = [
                'nama_bangunan' => $data['nama_bangunan'],
                'bentuk_bangunan' => $data['bentuk_bangunan'] ?? null,
                'jenis_bangunan' => $this->getJenisBangunan($request) ?? null,
                'jenis_bangunan_indeks_lantai' => $this->getJenisBangunanIndeksLantai($request) ?? null,
                'jenis_bangunan_detail' => json_encode(filterNullValues($data['jenis_bangunan_detail'] ?? [])),
                'grade_gudang' => $data['grade_gudang'] ?? null,
                'tahun_dibangun' => $data['tahun_dibangun'] ?? null,
                'keterangan_tahun_dibangun' => json_encode($data['keterangan_tahun_dibangun'] ?? []),
                'tahun_renovasi' => $data['tahun_renovasi'] ?? null,
                'keterangan_tahun_direnovasi' => json_encode($data['keterangan_tahun_direnovasi'] ?? []),
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
                'jumlah_lantai_rumah_tinggal' => json_encode(filterNullValues($data['jumlah_lantai_rumah_tinggal'] ?? [])),
            ];

            // 2. Update foto jika ada
            if ($request->hasFile('foto_depan')) {
                if ($bangunan->foto_depan) {
                    Storage::delete('public/uploads/bangunan/' . $bangunan->foto_depan);
                }
                $fieldData['foto_depan'] = $this->uploadFile($request, 'foto_depan');
            }

            if ($request->hasFile('foto_sisi_kiri')) {
                if ($bangunan->foto_sisi_kiri) {
                    Storage::delete('public/uploads/bangunan/' . $bangunan->foto_sisi_kiri);
                }
                $fieldData['foto_sisi_kiri'] = $this->uploadFile($request, 'foto_sisi_kiri');
            }

            if ($request->hasFile('foto_sisi_kanan')) {
                if ($bangunan->foto_sisi_kanan) {
                    Storage::delete('public/uploads/bangunan/' . $bangunan->foto_sisi_kanan);
                }
                $fieldData['foto_sisi_kanan'] = $this->uploadFile($request, 'foto_sisi_kanan');
            }

            // 3. Update foto lainnya jika ada
            if ($request->has('judul_foto')) {
                $fieldData['foto_lainnya'] = $this->processFotoLainnya($request);
            }

            // 4. Update data JSON lainnya
            $jsonFields = [
                'perlengkapan_bangunan',
                'luas_nama_pintu_jendela',
                'luas_bobot_pintu_jendela',
                'luas_nama_dinding',
                'luas_bobot_dinding',
                'luas_nama_rangka_atap_datar',
                'luas_bobot_rangka_atap_datar',
                'luas_nama_atap_datar',
                'luas_bobot_atap_datar',
                'tipe_pondasi_existing',
                'bobot_tipe_pondasi_existing',
                'tipe_struktur_existing',
                'bobot_tipe_struktur_existing',
                'tipe_rangka_atap_existing',
                'bobot_rangka_atap_existing',
                'tipe_penutup_atap_existing',
                'bobot_penutup_atap_existing',
                'tipe_tipe_dinding_existing',
                'bobot_tipe_dinding_existing',
                'tipe_tipe_pelapis_dinding_existing',
                'bobot_tipe_pelapis_dinding_existing',
                'tipe_tipe_pintu_jendela_existing',
                'bobot_tipe_pintu_jendela_existing',
                'tipe_tipe_lantai_existing',
                'bobot_tipe_lantai_existing'
            ];

            foreach ($jsonFields as $field) {
                if (isset($data[$field])) {
                    $fieldData[$field] = json_encode(filterNullValues($data[$field]));
                }
            }

            // 5. Lakukan update
            $bangunan->update($fieldData);

            return redirect()->back()->with('success', 'Data bangunan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function getDataBangunan()
    {
        // Ambil semua header unik dari tabel master_data
        $headers = DB::table('master_data')
            ->select('label_header')
            ->distinct()
            ->pluck('label_header');

        $dataBangunan = [];

        // Untuk setiap header, ambil data yang sesuai
        foreach ($headers as $header) {
            $dataBangunan[$header] = DB::table('master_data')
                ->where('label_header', $header)
                ->where('label_option', '!=', null)
                ->where('state', 'ON')
                ->get();
        }

        return $dataBangunan;
    }
}
