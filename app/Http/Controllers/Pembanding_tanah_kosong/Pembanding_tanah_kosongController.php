<?php

namespace App\Http\Controllers\Pembanding_tanah_kosong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TanahKosong; // Impor model TanahKosong
use Illuminate\Support\Facades\Storage;

class Pembanding_tanah_kosongController extends Controller
{
    public function tanah_kosong()
    {
        
        return view('content.pembanding.pembanding_tanah_kosong');
    }
    public function store(Request $request)
    {
        // Validasi data
    
        $validated = $request->validate([
            'nama_tanah_kosong' => 'required|string|max:255',
            'nama_entitas' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'alamat_lengkap' => 'nullable|string',
            'keterangan_dasar_nilai' => 'nullable|string',
            'alamat' => 'nullable|string',
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric',
            'foto_tampak_depan' => 'nullable|image|mimes:jpg,jpeg,png|max:6048',
            'foto_tampak_sisi_kiri' => 'nullable|image|mimes:jpg,jpeg,png|max:6048',
            'foto_tampak_sisi_kanan' => 'nullable|image|mimes:jpg,jpeg,png|max:6048',
            'foto' => 'nullable|array',
            'foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:6048',
            'njop' => 'nullable|array',
            'njop.*.tahun' => 'nullable|integer',
            'njop.*.nilai_perolehan' => 'nullable|numeric',
            'nama_narsum' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:15',
            'jenis_dok_hak_tanah' => 'nullable|string',
            'zona_lindung' => 'nullable|string',
            'zona_budidaya' => 'nullable|string',
            'jenis_data' => 'nullable|string',
            'tgl_penawaran' => 'nullable|date',
            'sumber_data' => 'nullable|string',
            'luas_tanah' => 'nullable|integer',
            'luas_tanah_terpotong' => 'nullable|integer',
            'harga_penawaran' => 'nullable|numeric',
            'diskon' => 'nullable|integer',
            'harga_sewa_per_tahun' => 'nullable|numeric',
            'skrap' => 'nullable|integer',
            'kemunduran_fungsi' => 'nullable|integer',
            'penjelasan_kemunduran_fungsi' => 'nullable|string',
            'kemunduran_ekonomis' => 'nullable|integer',
            'penjelasan_kemunduran_ekonomis' => 'nullable|string',
            'maintenance' => 'nullable|integer',
            'pep_pembiayaan' => 'nullable|string',
            'pep_penjualan' => 'nullable|string',
            'pep_pengeluaran' => 'nullable|string',
            'pep_pasar' => 'nullable|string',
            'kdb' => 'nullable|integer',
            'klb' => 'nullable|integer',
            'gsb' => 'nullable|integer',
            'ketinggian' => 'nullable|integer',
            'row_jalan' => 'nullable|integer',
            'tipe_jalan' => 'nullable|string',
            'kapasitas_jalan' => 'nullable|string',
            'pengguna_lahan_lingkungan_eksisting' => 'nullable|string',
            'letak_posisi_obyek' => 'nullable|string',
            'letak_posisi_aset' => 'nullable|string',
            'bentuk_tanah' => 'nullable|string',
            'bentuk_tanah_lainnya' => 'nullable|string',
            'lebar_muka_tanah' => 'nullable|integer',
            'ketinggian_tanah_dr_muka_jln' => 'nullable|integer',
            'topografi' => 'nullable|string',
            'tingkat_hunian' => 'nullable|integer',
            'kondisi_lingkungan_khusus' => 'nullable|string',
            'kondisi_lingkungan_lainnya' => 'nullable|string',
            'keterangan_tambahan_lainnya' => 'nullable|string',
            'kualitas_pendapatan' => 'nullable|string',
            'biaya_operasional' => 'nullable|string',
            'ketentuan_sewa' => 'nullable|string',
            'manajemen' => 'nullable|string',
            'bauran_penyewa' => 'nullable|string',
            'ffe' => 'nullable|string',
            'mesin' => 'nullable|string',
            'nama_pusat_kota' => 'nullable|string',
            'nama_pusat_ekonomi' => 'nullable|string',
            'nama_jalan' => 'nullable|string',
            'kondisi_lingkungan' => 'nullable|string',
            'faktor_view' => 'nullable|string',
            'keterangan_jarak' => 'nullable|string',
            'pengguanan_tnh_saat_ini' => 'nullable|string',
            'pemberi_tugas' => 'nullable|string',
            'jenis_aset' => 'nullable|string',
            'peruntukan' => 'nullable|string',
            'jabatan_narasumber' => 'nullable|string',
            'status_data_pembanding' => 'nullable|string',
        ]);

        // Handle file uploads
        $pathDepan = $request->file('foto_tampak_depan')?->store('public/uploads');
        $pathKiri = $request->file('foto_tampak_sisi_kiri')?->store('public/uploads');
        $pathKanan = $request->file('foto_tampak_sisi_kanan')?->store('public/uploads');

        $fotoData = $request->input('foto');

        $fotoData = [];

        // Iterasi file dan judul
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $index => $file) {
                $judulFoto = $request->input("judul_foto.{$index}");
                
                // Simpan file ke storage
                $fileName = time() . "_{$index}_" . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/foto_lainnya', $fileName, 'public');

                $fotoData[] = [
                    'judul_foto' => $judulFoto,
                    'file_path' => $filePath,
                ];
            }
        }

        // Simpan JSON ke database atau sesuai kebutuhan
        $jsonFotoData = json_encode($fotoData);

        

        // Simpan data
        TanahKosong::create([
            'nama_tanah_kosong' => $request->nama_tanah_kosong,
            'nama_entitas' => $request->nama_entitas,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat_lengkap,
            'keterangan_dasar_nilai' => $request->keterangan_dasar_nilai,
            'alamat' => $request->alamat,
            'lat' => $request->lat,
            'long' => $request->long,
            'foto_tampak_depan' => $pathDepan,
            'foto_tampak_sisi_kiri' => $pathKiri,
            'foto_tampak_sisi_kanan' => $pathKanan,
            'foto_lainnya' => $jsonFotoData,
            'njop' => json_encode($request->njop),
            'nama_narsum' => $request->nama_narsum,
            'telepon' => $request->telepon,
            'jenis_dok_hak_tanah' => $request->jenis_dok_hak_tanah,
            'zona_lindung' => $request->zona_lindung,
            'zona_budidaya' => $request->zona_budidaya,
            'jenis_data' => $request->jenis_data,
            'tgl_penawaran' => $request->tgl_penawaran,
            'sumber_data' => $request->sumber_data,
            'luas_tanah' => $request->luas_tanah,
            'luas_tanah_terpotong' => $request->luas_tanah_terpotong,
            'harga_penawaran' => $request->harga_penawaran,
            'diskon' => $request->diskon,
            'harga_sewa_per_tahun' => $request->harga_sewa_per_tahun,
            'skrap' => $request->skrap,
            'kemunduran_fungsi' => $request->kemunduran_fungsi,
            'penjelasan_kemunduran_fungsi' => $request->penjelasan_kemunduran_fungsi,
            'kemunduran_ekonomis' => $request->kemunduran_ekonomis,
            'penjelasan_kemunduran_ekonomis' => $request->penjelasan_kemunduran_ekonomis,
            'maintenance' => $request->maintenance,
            'pep_pembiayaan' => $request->pep_pembiayaan,
            'pep_penjualan' => $request->pep_penjualan,
            'pep_pengeluaran' => $request->pep_pengeluaran,
            'pep_pasar' => $request->pep_pasar,
            'kdb' => $request->kdb,
            'klb' => $request->klb,
            'gsb' => $request->gsb,
            'ketinggian' => $request->ketinggian,
            'row_jalan' => $request->row_jalan,
            'tipe_jalan' => $request->tipe_jalan,
            'kapasitas_jalan' => $request->kapasitas_jalan,
            'pengguna_lahan_lingkungan_eksisting' => $request->pengguna_lahan_lingkungan_eksisting,
            'letak_posisi_obyek' => $request->letak_posisi_obyek,
            'letak_posisi_aset' => $request->letak_posisi_aset,
            'bentuk_tanah' => $request->bentuk_tanah,
            'bentuk_tanah_lainnya' => $request->bentuk_tanah_lainnya,
            'lebar_muka_tanah' => $request->lebar_muka_tanah,
            'ketinggian_tanah_dr_muka_jln' => $request->ketinggian_tanah_dr_muka_jln,
            'topografi' => $request->topografi,
            'tingkat_hunian' => $request->tingkat_hunian,
            'kondisi_lingkungan_khusus' => $request->kondisi_lingkungan_khusus,
            'kondisi_lingkungan_lainnya' => $request->kondisi_lingkungan_lainnya,
            'keterangan_tambahan_lainnya' => $request->keterangan_tambahan_lainnya,
            'kualitas_pendapatan' => $request->kualitas_pendapatan,
            'biaya_operasional' => $request->biaya_operasional,
            'ketentuan_sewa' => $request->ketentuan_sewa,
            'manajemen' => $request->manajemen,
            'bauran_penyewa' => $request->bauran_penyewa,
            'ffe' => $request->ffe,
            'mesin' => $request->mesin,
            'nama_pusat_kota' => $request->nama_pusat_kota,
            'nama_pusat_ekonomi' => $request->nama_pusat_ekonomi,
            'nama_jalan' => $request->nama_jalan,
            'kondisi_lingkungan' => $request->kondisi_lingkungan,
            'faktor_view' => $request->faktor_view,
            'keterangan_jarak' => $request->keterangan_jarak,
            'pengguanan_tnh_saat_ini' => $request->pengguanan_tnh_saat_ini,
            'pemberi_tugas' => $request->pemberi_tugas,
            'jenis_aset' => $request->jenis_aset,
            'peruntukan' => $request->peruntukan,
            'jabatan_narasumber' => $request->jabatan_narasumber,
            'status_data_pembanding' => $request->status_data_pembanding,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
