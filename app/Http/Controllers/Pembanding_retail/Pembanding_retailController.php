<?php

namespace App\Http\Controllers\Pembanding_retail;

use App\Http\Controllers\Controller;
use App\Models\PembandingRetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pembanding_retailController extends Controller
{
    public function retail()
    {
        
        return view('content.pembanding.pembanding_retail');
    }
    public function add_pembanding_retail(Request $request) {
        // Validasi Input
        $validated = $request->validate([
            'nama_retail' => 'required|string|max:255',
            'nama_entitas' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'alamat_lengkap' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric',
            'kondisi_properti' => 'nullable|string|max:255',
            'estimasi_properti' => 'nullable|string|max:255',
            'spesifikasi_properti' => 'nullable|string|max:255',
            'tipe_apartemen' => 'nullable|string|max:255',
            'posisi_lantai' => 'nullable|integer',
            'jumlah_lantai' => 'nullable|integer',
            'row_koridor' => 'nullable|string',
            'luas_bangunan_total' => 'nullable|numeric',
            'fasilitas_bangunan' => 'nullable|string|max:255',
            'grade_bangunan' => 'nullable|string|max:255',
            'tipe_akses_koridor' => 'nullable|string|max:255',
            'jenis_dok_hak_tanah' => 'nullable|string|max:255',
            'tgl_berakhir_dokumen' => 'nullable|date',
            'peruntukan_bangunan' => 'nullable|string|max:255',
            'jenis_data' => 'nullable|string|max:255',
            'tgl_penawaran' => 'nullable|date',
            'sumber_data' => 'nullable|string|max:255',
            'luas_semigross' => 'nullable|numeric',
            'luas_net' => 'nullable|numeric',
            'harga_penawaran' => 'nullable|numeric',
            'diskon' => 'nullable|numeric',
            'harga_sewa_pertahun' => 'nullable|numeric',
            'skrap' => 'nullable|numeric',
            'row_jalan' => 'nullable|numeric',
            'tipe_jalan' => 'nullable|string|max:255',
            'kapasitas_jalan' => 'nullable|string|max:255',
            'pengguna_lahan_lingkungan_eksisting' => 'nullable|string|max:255',
            'letak_posisi_obyek' => 'nullable|string|max:255',
            'letak_posisi_aset' => 'nullable|string|max:255',
            'bentuk_tanah' => 'nullable|string|max:255',
            'bentuk_tanah_lainnya' => 'nullable|string|max:255',
            'lebar_muka_tanah' => 'nullable|numeric',
            'ketinggian_tanah_dr_muka_jln' => 'nullable|numeric',
            'topografi' => 'nullable|string|max:255',
            'tingkat_hunian' => 'nullable|numeric',
            'kondisi_lingkungan_lainnya' => 'nullable|string|max:255',
            'keterangan_tambahan_lainnya' => 'nullable|string',
            'keterangan_jarak' => 'nullable|string|max:255',
            'pemberi_tugas' => 'nullable|string|max:255',
            'jenis_aset' => 'nullable|string|max:255',
            'peruntukan' => 'nullable|string|max:255',
            'jenis_aset_campuran' => 'nullable|string|max:255',
            'topografi_isian' => 'nullable|string|max:255',
            'jabatan_narasumber' => 'nullable|string|max:255',
            'status_data_pembanding' => 'nullable|string|max:255',
        ]);

        // Handle Multiple Data Fields
        $validated['nilai_perolehan_njop'] = $this->formatMultipleData($request, 'tahun', 'nilai_perolehan');
        $validated['penyusutan'] = $this->formatMultipleData($request, [
            'kemunduran_fungsi',
            'penjelasan_kemunduran_fungsi',
            'kemunduran_ekonomis',
            'penjelasan_kemunduran_ekonomis',
            'maintenance',
        ]);
        $validated['penyesuaian_elemen_perbandingan'] = $this->formatMultipleData($request, [
            'pep_pembiayaan',
            'pep_penjualan',
            'pep_pengeluaran',
            'pep_pasar',
        ]);
        $validated['penggunaan'] = $this->formatMultipleData($request, [
            'kdb',
            'klb',
            'gsb',
            'ketinggian',
        ]);
        $validated['kondisi_lingkungan_khusus'] = $request->input('kondisi_lingkungan_khusus') ?? [];
        $validated['karakteristik_ekonomi'] = $this->formatMultipleData($request, [
            'kualitas_pendapatan',
            'biaya_operasional',
            'ketentuan_sewa',
            'manajemen',
            'bauran_penyewa',
        ]);
        $validated['komponen_non_reality'] = $this->formatMultipleData($request, ['ffe', 'mesin']);
        $validated['gambaran_objek'] = $this->formatMultipleData($request, [
            'nama_pusat_kota',
            'nama_pusat_ekonomi',
            'nama_jalan',
            'kondisi_lingkungan',
            'faktor_view',
        ]);

        // Handle File Uploads
        $validated['foto_lainnya'] = $this->uploadMultipleFiles($request, 'foto_lainnya');
        foreach (['foto_tampak_depan', 'foto_tampak_sisi_kiri', 'foto_tampak_sisi_kanan'] as $fotoField) {
            if ($request->hasFile($fotoField)) {
                $validated[$fotoField] = $request->file($fotoField)->store('uploads/foto', 'public');
            }
        }

        // Save to Database
        PembandingRetail::create($validated);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Format multiple data into JSON array.
     */
    private function formatMultipleData(Request $request, ...$fields)
    {
        $data = [];
        if (is_array($fields[0])) {
            foreach ($fields[0] as $field) {
                $data[$field] = $request->input($field) ?? [];
            }
        } else {
            foreach ($fields as $field) {
                $data[] = $request->input($field) ?? [];
            }
        }
        return $data;
    }

    /**
     * Handle multiple file uploads.
     */
    private function uploadMultipleFiles(Request $request, $field)
    {
        $files = [];
        if ($request->hasFile($field)) {
            foreach ($request->file($field) as $file) {
                $files[] = $file->store('uploads/foto', 'public');
            }
        }
        return $files;
    }
}
