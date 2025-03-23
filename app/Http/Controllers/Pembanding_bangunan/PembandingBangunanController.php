<?php

namespace App\Http\Controllers\Pembanding_bangunan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\BangunanPembanding;
use Illuminate\Support\Facades\Log;

class PembandingBangunanController extends Controller
{
    public function bangunan()
    {
        return view('content.pembanding.pembanding_bangunan');
    }
    public function add_pembanding_bangunan(Request $request)
    {
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
    public function detail_pembanding_bangunan($id)
    {
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
    public function store_pembanding_bangunan(Request $request)
    {
        try {
            $data = $request->all();

            // Fungsi helper untuk mengkonversi array ke JSON string
            $toJsonString = function ($value) {
                if (empty($value)) {
                    return null;
                }
                if (is_array($value)) {
                    // Filter out null values and empty arrays
                    $filtered = array_filter($value, function ($item) {
                        return $item !== null && $item !== '';
                    });
                    return !empty($filtered) ? json_encode($filtered) : null;
                }
                return $value;
            };

            // Basic fields (non-array fields)
            $fieldData = [
                'nama_bangunan' => $data['nama_bangunan'] ?? null,
                'nama_kjpp' => $data['nama_kjpp'] ?? null,
                'provinsi' => $data['provinsi'] ?? null,
                'kode_pos' => $data['kode_pos'] ?? null,
                'alamat_lengkap' => $data['alamat_lengkap'] ?? null,
                'jenis_properti' => $data['jenis_properti'] ?? null,
                'id_jenis_bangunan' => $data['id_jenis_bangunan'] ?? null,
                'lat' => $data['lat'] ?? null,
                'long' => $data['long'] ?? null,
                'alamat' => $data['alamat'] ?? null,

                // Narasumber
                'nama_narsum' => $data['nama_narsum'] ?? null,
                'telepon' => $data['telepon'] ?? null,

                // Dokumen & Peruntukan
                'jenis_dok_hak_tanah' => $data['jenis_dok_hak_tanah'] ?? null,
                'zona_lindung' => $data['zona_lindung'] ?? null,
                'zona_budidaya' => $data['zona_budidaya'] ?? null,
                'koefisien_dasar_bangunan' => $data['koefisien_dasar_bangunan'] ?? null,
                'koefisien_lantai_bangunan' => $data['koefisien_lantai_bangunan'] ?? null,
                'garis_sempadan_bangunan' => $data['garis_sempadan_bangunan'] ?? null,
                'ketinggian' => $data['ketinggian'] ?? null,
                'row_jalan' => $data['row_jalan'] ?? null,
                'tipe_jalan' => $data['tipe_jalan'] ?? null,
                'kapasitas_jalan' => $data['kapasitas_jalan'] ?? null,
                'pengguna_lahan_lingkungan_eksisting' => $data['pengguna_lahan_lingkungan_eksisting'] ?? null,
                'letak_posisi_obyek' => $data['letak_posisi_obyek'] ?? null,
                'lokasi_aset' => $data['lokasi_aset'] ?? null,

                // Karakteristik Tanah
                'bentuk_tanah' => $data['bentuk_tanah'] ?? null,
                'lebar_muka_tanah' => $data['lebar_muka_tanah'] ?? null,
                'ketinggian_tanah_dr_muka_jln' => $data['ketinggian_tanah_dr_muka_jln'] ?? null,
                'tingkat_hunian' => $data['tingkat_hunian'] ?? null,

                // Karakteristik Ekonomi
                'kualitas_pendapatan' => $data['kualitas_pendapatan'] ?? null,
                'biaya_opreasional_ekonomi' => $data['biaya_opreasional_ekonomi'] ?? null,
                'ketentuan_sewa' => $data['ketentuan_sewa'] ?? null,
                'manajemen' => $data['manajemen'] ?? null,
                'bauran_penyewa' => $data['bauran_penyewa'] ?? null,

                // Komponen Non-Realty
                'ffe' => $data['ffe'] ?? null,
                'biaya_operasional' => $data['biaya_operasional'] ?? null,

                // Gambaran Objek
                'nm_pusat_kota' => $data['nm_pusat_kota'] ?? null,
                'nm_pusat_ekonomi' => $data['nm_pusat_ekonomi'] ?? null,
                'nm_jalan' => $data['nm_jalan'] ?? null,
                'kondisi_lingkungan' => $data['kondisi_lingkungan'] ?? null,
                'pemandangan' => $data['pemandangan'] ?? null,
                'keterangan_jarak_dr_bca' => $data['keterangan_jarak_dr_bca'] ?? null,

                // Data Transaksi
                'jenis_data' => $data['jenis_data'] ?? null,
                'tgl_penawaran' => $data['tgl_penawaran'] ?? null,
                'sumber_data' => $data['sumber_data'] ?? null,
                'luas_tanah' => $data['luas_tanah'] ?? null,
                'luas_tanah_terpotong' => $data['luas_tanah_terpotong'] ?? null,
                'luas_bangunan' => $data['luas_bangunan'] ?? null,
                'harga_penawaran' => $data['harga_penawaran'] ?? null,
                'diskon' => $data['diskon'] ?? null,
                'harga_sewa_per_tahun' => $data['harga_sewa_per_tahun'] ?? null,
                'skrap' => $data['skrap'] ?? null,

                // Penyusutan
                'kemunduran_fungsi' => $data['kemunduran_fungsi'] ?? null,
                'penjelasan_kemunduran_fungsi' => $data['penjelasan_kemunduran_fungsi'] ?? null,
                'kemunduran_ekonomis' => $data['kemunduran_ekonomis'] ?? null,
                'penjelasan_kemunduran_ekonomis' => $data['penjelasan_kemunduran_ekonomis'] ?? null,
                'maintenance' => $data['maintenance'] ?? null,

                // Penyesuaian Elemen
                'pep_pembiayaan' => $data['pep_pembiayaan'] ?? null,
                'pep_penjualan' => $data['pep_penjualan'] ?? null,
                'pep_pengeluaran' => $data['pep_pengeluaran'] ?? null,
                'pep_pasar' => $data['pep_pasar'] ?? null,

                // Data Bangunan
                'bentuk_bangunan' => $data['bentuk_bangunan'] ?? null,
                'kontruksi_bangunan' => $data['kontruksi_bangunan'] ?? null,
                'kontruksi_lantai' => $data['kontruksi_lantai'] ?? null,
                'kontruksi_dinding' => $data['kontruksi_dinding'] ?? null,
                'kontruksi_atap' => $data['kontruksi_atap'] ?? null,
                'kontruksi_pondasi' => $data['kontruksi_pondasi'] ?? null,
                'tipe_spek' => $data['tipe_spek'] ?? null,
                'penggunaan_bangunan' => $data['penggunaan_bangunan'] ?? null,
                'progres_pembangunan' => $data['progres_pembangunan'] ?? null,
                'kondisi_bangunan' => $data['kondisi_bangunan'] ?? null,

                // Data Pemberi Tugas
                'pemberi_tugas' => $data['pemberi_tugas'] ?? null,
                'jenis_aset' => $data['jenis_aset'] ?? null,
                'peruntukan' => $data['peruntukan'] ?? null,
                'topografi' => $data['topografi'] ?? null,
                'jenis_aset_lainnya' => $data['jenis_aset_lainnya'] ?? null,
                'jabatan_narasumber' => $data['jabatan_narasumber'] ?? null,
            ];

            // Handle array fields
            $arrayFields = [
                'kondisi_lingkungan_khusus',
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
                'bobot_tipe_lantai_existing',
                'keterangan_tahun_dibangun',
                'keterangan_tahun_direnovasi',
                'jenis_bangunan_detail'
            ];

            // Process array fields
            foreach ($arrayFields as $field) {
                $value = $data[$field] ?? [];
                if (is_string($value)) {
                    // If the value is already a JSON string, keep it as is
                    $fieldData[$field] = $value;
                } else {
                    // Convert array to JSON string
                    $fieldData[$field] = $toJsonString($value);
                }
            }

            // Handle file uploads
            if ($request->hasFile('foto_tampak_depan')) {
                $fieldData['foto_tampak_depan'] = $this->uploadFile($request, 'foto_tampak_depan');
            }
            if ($request->hasFile('foto_tampak_sisi_kiri')) {
                $fieldData['foto_tampak_sisi_kiri'] = $this->uploadFile($request, 'foto_tampak_sisi_kiri');
            }
            if ($request->hasFile('foto_tampak_sisi_kanan')) {
                $fieldData['foto_tampak_sisi_kanan'] = $this->uploadFile($request, 'foto_tampak_sisi_kanan');
            }

            // Handle foto lainnya
            $fieldData['foto_lainnya'] = $this->processFotoLainnya($request);
            $fieldData['tahun_nilai_njop'] = $this->tahun_nilai_njop($request);

            // Handle boolean and numeric fields
            $fieldData['basement'] = isset($data['basement']) ? 1 : 0;
            $fieldData['jumlah_lantai'] = $data['jumlah_lantai'] ?? 1;
            $fieldData['versi_btb'] = $data['versi_btb'] ?? '2024';
            $fieldData['status_data_pembanding'] = $data['status_data_pembanding'] ?? 'draft';

            // Add timestamps
            $fieldData['created_at'] = now();
            $fieldData['updated_at'] = now();

            // Debug log
            Log::info('Data yang akan diinsert:', array_map(function ($value) {
                return is_array($value) ? json_encode($value) : $value;
            }, $fieldData));

            // Create record
            $bangunan = BangunanPembanding::create($fieldData);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            Log::error('Error in store_pembanding_bangunan: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function processFotoLainnya($request)
    {
        if (!$request->has('judul_foto')) {
            return null;
        }

        try {
            $fotoLainnya = [];
            $files = $request->file('foto_lainnya') ?? [];
            $judulFoto = $request->judul_foto ?? [];

            foreach ($judulFoto as $index => $judul) {
                if (empty($judul)) continue;

                $foto = null;
                if (isset($files[$index]) && $files[$index]->isValid()) {
                    $file = $files[$index];
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/uploads/pembanding_bangunan/foto_lainnya'), $fileName);
                    $foto = 'storage/uploads/pembanding_bangunan/foto_lainnya/' . $fileName;
                }

                $fotoLainnya[] = [
                    'judul_foto' => $judul,
                    'foto_lainnya' => $foto
                ];
            }

            return !empty($fotoLainnya) ? json_encode($fotoLainnya) : null;
        } catch (\Exception $e) {
            Log::error('Error in processFotoLainnya: ' . $e->getMessage());
            return null;
        }
    }

    private function uploadFile($request, $fieldName)
    {
        try {
            if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
                $file = $request->file($fieldName);
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/uploads/pembanding_bangunan'), $fileName);
                return $fileName;
            }
            return null;
        } catch (\Exception $e) {
            Log::error('Error uploading file ' . $fieldName . ': ' . $e->getMessage());
            return null;
        }
    }

    private function tahun_nilai_njop($request)
    {
        $njop = [];
        $tahun_njop = $request->tahun_njop ?? [];
        $nilai_njop = $request->nilai_njop ?? [];

        // Loop through all entries
        foreach ($tahun_njop as $index => $tahun) {
            if (isset($nilai_njop[$index])) {
                $njop[] = [
                    'tahun_njop' => $tahun,
                    'nilai_njop' => $nilai_njop[$index]
                ];
            }
        }

        return !empty($njop) ? json_encode($njop) : null;
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

    public function editBangunan($id)
    {
        $data = BangunanPembanding::findOrFail($id);

        // Decode JSON fields
        $data->foto_lainnya = json_decode($data->foto_lainnya, true);
        $data->tahun_nilai_njop = json_decode($data->tahun_nilai_njop, true);
        $data->kondisi_lingkungan_khusus = json_decode($data->kondisi_lingkungan_khusus, true);

        return view('content.pembanding.edit.edit_bangunan', compact('data'));
    }

    public function updateBangunan(Request $request, $id)
    {
        try {
            $data = BangunanPembanding::findOrFail($id);
            $input = $request->all();

            // Handle file uploads
            $fileFields = [
                'foto_tampak_depan',
                'foto_tampak_sisi_kiri',
                'foto_tampak_sisi_kanan'
            ];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    // Delete old file
                    if ($data->$field) {
                        File::delete(public_path('storage/uploads/pembanding_bangunan/' . $data->$field));
                    }
                    // Upload new file
                    $input[$field] = $this->uploadFile($request, $field);
                }
            }

            // Handle foto lainnya
            if ($request->has('judul_foto')) {
                $newFotoLainnya = $this->processFotoLainnya($request);
                $existingFoto = json_decode($data->foto_lainnya, true) ?? [];
                $input['foto_lainnya'] = json_encode(array_merge($existingFoto, $newFotoLainnya));
            }

            // Process array fields
            $arrayFields = [
                'kondisi_lingkungan_khusus',
                'perlengkapan_bangunan',
                'tahun_nilai_njop'
            ];

            foreach ($arrayFields as $field) {
                if ($request->has($field)) {
                    $input[$field] = json_encode($request->$field);
                }
            }

            // Update data
            $data->update($input);

            return redirect()->route('bangunan.index')->with('success', 'Data bangunan berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error updating bangunan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data');
        }
    }
}
