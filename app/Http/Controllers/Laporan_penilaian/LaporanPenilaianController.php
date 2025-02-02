<?php

namespace App\Http\Controllers\Laporan_penilaian;

use App\Http\Controllers\Controller;
use App\Models\LaporanPenilaian;
use Illuminate\Http\Request;

class LaporanPenilaianController extends Controller
{
    public function laporan_bangunan() {
        return view('content.laporan_penilaian.laporan_bangunan');
    }
    public function laporan_tanah_kosong() {
        return view('content.laporan_penilaian.laporan_tanah_kosong');
    }
    public function laporan_retail() {
        return view('content.laporan_penilaian.laporan_retail');
    }
    public function store_laporan_bangunan() {
        
    }
    public function store_laporan_retail(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'nama_entitas' => 'required|string|max:255',
            'judul_print_cover' => 'nullable|string',
            'versi_btb' => 'required|string',
            'no_laporan_penilaian' => 'required|string|max:255',
            'tgl_laporan_penilaian' => 'required|date',
            'no_doumen_kontrak' => 'nullable|string|max:255',
            'tgl_dokumen_kontrak' => 'nullable|date',
            'nama_instansi_pemberi_tugas' => 'nullable|string|max:255',
            'key_kcp_pemberi_tugas' => 'nullable|string|max:255',
            'cp_penugasan_pemberi_tugas' => 'nullable|string|max:255',
            'telepon_pemberi_tugas' => 'nullable|string|max:20',
            'tujuan_penilaian' => 'required|string|max:255',
            'tujuan_spesifik' => 'nullable|string|max:255',
            'nama_debitur' => 'nullable|string|max:255',
            'nama_yang_dihubungi_debitur' => 'nullable|string|max:255',
            'no_telepon_debitur' => 'nullable|string|max:20',
            'nama_instansi_pengguna_laporan' => 'nullable|string|max:255',
            'pilih_nama_instansi_pengguna_laporan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'pengguna_laporan_khusus' => 'nullable|string|max:255',
            'kategori_kredit' => 'required|string|max:255',
            'kategori_kredit_bca' => 'nullable|string|max:255',
            'tipe_jaminan' => 'required|string|max:255',
            'lokasi_cabang_bank' => 'required|string|max:255',
            'kota_bap_final' => 'nullable|string|max:255',
            'pilih_nama_instansi_daerah_bap_final' => 'nullable|string|max:255',
            'dasar_nilai_spesifik' => 'nullable|string|max:255',
            'dasar_penilaian' => 'nullable|array', // Checkbox
            'pendekatan_penilaian' => 'nullable|array', // Checkbox
            'provinsi_obyek' => 'nullable|string|max:255',
            'kabupaten_lokasi_obyek' => 'nullable|string|max:255',
            'kecamatan_lokasi_obyek' => 'nullable|string|max:255',
            'kelurahan_lokasi_obyek' => 'nullable|string|max:255',
            'rt_rw_lokasi_obyek' => 'nullable|string|max:255',
            'kode_pos_rt_rw_lokasi_obyek' => 'nullable|string|max:10',
            'wil_admint2_lokasi_obyek' => 'nullable|string|max:255',
            'wil_admint4_lokasi_obyek' => 'nullable|string|max:255',
            'alamat_lokasi_obyek' => 'nullable|string',
            'tanggal_inspeksi' => 'nullable|date',
            'tanggal_penilaian' => 'nullable|date',
            'tingkat_suku_bunga_suku_bunga_pinjaman' => 'nullable|string|max:255',
            'sumberdata_suku_bunga_pinjaman' => 'nullable|string|max:255',
            'screenshoot_sumber_suku_bunga_pinjaman' => 'nullable|file|mimes:jpg,png,pdf',
            'kelengkapan_dokumen' => 'nullable|array',
            'informasi_khusus' => 'nullable|string',
            'status_data' => 'required|string|in:draft,publish',
        ]);

        // Simpan ke database
        LaporanPenilaian::create([
            'kategori_laporan_penilaian' => 'Office / Retail / Apartemen',
            'judul_laporan' => $request->judul_laporan,
            'nama_entitas' => $request->nama_entitas,
            'judul_print_cover' => $request->judul_print_cover,
            'versi_btb' => $request->versi_btb,
            'no_laporan_penilaian' => $request->no_laporan_penilaian,
            'tgl_laporan_penilaian' => $request->tgl_laporan_penilaian,
            'no_doumen_kontrak' => $request->no_doumen_kontrak,
            'tgl_dokumen_kontrak' => $request->tgl_dokumen_kontrak,
            'nama_instansi_pemberi_tugas' => $request->nama_instansi_pemberi_tugas,
            'key_kcp_pemberi_tugas' => $request->key_kcp_pemberi_tugas,
            'cp_penugasan_pemberi_tugas' => $request->cp_penugasan_pemberi_tugas,
            'telepon_pemberi_tugas' => $request->telepon_pemberi_tugas,
            'tujuan_penilaian' => $request->tujuan_penilaian,
            'nama_debitur' => $request->nama_debitur,
            'nama_yang_dihubungi_debitur' => $request->nama_yang_dihubungi_debitur,
            'no_telepon_debitur' => $request->no_telepon_debitur,
            'tujuan_spesifik' => $request->tujuan_spesifik,
            'kategori_kredit' => $request->kategori_kredit,
            'kategori_kredit_bca' => $request->kategori_kredit_bca,
            'tipe_jaminan' => $request->tipe_jaminan,
            'lokasi_cabang_bank' => $request->lokasi_cabang_bank,
            'dasar_nilai_spesifik' => $request->dasar_nilai_spesifik,
            'dasar_penilaian' => json_encode($request->dasar_penilaian),
            'pendekatan_penilaian' => json_encode($request->pendekatan_penilaian),
            'provinsi_obyek' => $request->provinsi_obyek,
            'kabupaten_lokasi_obyek' => $request->kabupaten_lokasi_obyek,
            'kecamatan_lokasi_obyek' => $request->kecamatan_lokasi_obyek,
            'kelurahan_lokasi_obyek' => $request->kelurahan_lokasi_obyek,
            'rt_rw_lokasi_obyek' => $request->rt_rw_lokasi_obyek,
            'kode_pos_rt_rw_lokasi_obyek' => $request->kode_pos_rt_rw_lokasi_obyek,
            'wil_admint2_lokasi_obyek' => $request->wil_admint2_lokasi_obyek,
            'wil_admint4_lokasi_obyek' => $request->wil_admint4_lokasi_obyek,
            'alamat_lokasi_obyek' => $request->alamat_lokasi_obyek,
            'nama_instansi_pengguna_laporan' => $request->nama_instansi_pengguna_laporan,
            'pilih_nama_instansi_pengguna_laporan' => $request->pilih_nama_instansi_pengguna_laporan,
            'pengguna_laporan_khusus' => $request->pengguna_laporan_khusus,
            'alamat' => $request->alamat,
            'kota_bap_final' => $request->kota_bap_final,
            'pilih_nama_instansi_daerah_bap_final' => $request->pilih_nama_instansi_daerah_bap_final,
            'tanggal_inspeksi' => $request->tanggal_inspeksi,
            'tanggal_penilaian' => $request->tanggal_penilaian,
            'informasi_khusus' => $request->informasi_khusus,
            'status_data' => $request->status_data,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('laporan-retail')->with('success', 'Laporan Penilaian Retail berhasil disimpan!');
    }
    public function store_laporan_tanah_kosong(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'nama_entitas' => 'required|string|max:255',
            'judul_print_cover' => 'nullable|string',
            'versi_btb' => 'required|string',
            'no_laporan_penilaian' => 'required|string|max:255',
            'tgl_laporan_penilaian' => 'required|date',
            'no_doumen_kontrak' => 'nullable|string|max:255',
            'tgl_dokumen_kontrak' => 'nullable|date',
            'nama_instansi_pemberi_tugas' => 'nullable|string|max:255',
            'key_kcp_pemberi_tugas' => 'nullable|string|max:255',
            'cp_penugasan_pemberi_tugas' => 'nullable|string|max:255',
            'telepon_pemberi_tugas' => 'nullable|string|max:20',
            'tujuan_penilaian' => 'required|string|max:255',
            'tujuan_spesifik' => 'nullable|string|max:255',
            'nama_debitur' => 'nullable|string|max:255',
            'nama_yang_dihubungi_debitur' => 'nullable|string|max:255',
            'no_telepon_debitur' => 'nullable|string|max:20',
            'nama_instansi_pengguna_laporan' => 'nullable|string|max:255',
            'pilih_nama_instansi_pengguna_laporan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'pengguna_laporan_khusus' => 'nullable|string|max:255',
            'kategori_kredit' => 'required|string|max:255',
            'kategori_kredit_bca' => 'nullable|string|max:255',
            'tipe_jaminan' => 'required|string|max:255',
            'lokasi_cabang_bank' => 'required|string|max:255',
            'kota_bap_final' => 'nullable|string|max:255',
            'pilih_nama_instansi_daerah_bap_final' => 'nullable|string|max:255',
            'dasar_nilai_spesifik' => 'nullable|string|max:255',
            'dasar_penilaian' => 'nullable|array', // Checkbox
            'pendekatan_penilaian' => 'nullable|array', // Checkbox
            'provinsi_obyek' => 'nullable|string|max:255',
            'kabupaten_lokasi_obyek' => 'nullable|string|max:255',
            'kecamatan_lokasi_obyek' => 'nullable|string|max:255',
            'kelurahan_lokasi_obyek' => 'nullable|string|max:255',
            'rt_rw_lokasi_obyek' => 'nullable|string|max:255',
            'kode_pos_rt_rw_lokasi_obyek' => 'nullable|string|max:10',
            'wil_admint2_lokasi_obyek' => 'nullable|string|max:255',
            'wil_admint4_lokasi_obyek' => 'nullable|string|max:255',
            'alamat_lokasi_obyek' => 'nullable|string',
            'tanggal_inspeksi' => 'nullable|date',
            'tanggal_penilaian' => 'nullable|date',
            'tingkat_suku_bunga_suku_bunga_pinjaman' => 'nullable|string|max:255',
            'sumberdata_suku_bunga_pinjaman' => 'nullable|string|max:255',
            'screenshoot_sumber_suku_bunga_pinjaman' => 'nullable|file|mimes:jpg,png,pdf',
            'kelengkapan_dokumen' => 'nullable|array',
            'informasi_khusus' => 'nullable|string',
            'status_data' => 'required|string|in:draft,publish',
        ]);

        // Simpan ke database
        LaporanPenilaian::create([
            'kategori_laporan_penilaian' => 'Office / Retail / Apartemen',
            'judul_laporan' => $request->judul_laporan,
            'nama_entitas' => $request->nama_entitas,
            'judul_print_cover' => $request->judul_print_cover,
            'versi_btb' => $request->versi_btb,
            'no_laporan_penilaian' => $request->no_laporan_penilaian,
            'tgl_laporan_penilaian' => $request->tgl_laporan_penilaian,
            'no_doumen_kontrak' => $request->no_doumen_kontrak,
            'tgl_dokumen_kontrak' => $request->tgl_dokumen_kontrak,
            'nama_instansi_pemberi_tugas' => $request->nama_instansi_pemberi_tugas,
            'key_kcp_pemberi_tugas' => $request->key_kcp_pemberi_tugas,
            'cp_penugasan_pemberi_tugas' => $request->cp_penugasan_pemberi_tugas,
            'telepon_pemberi_tugas' => $request->telepon_pemberi_tugas,
            'tujuan_penilaian' => $request->tujuan_penilaian,
            'nama_debitur' => $request->nama_debitur,
            'nama_yang_dihubungi_debitur' => $request->nama_yang_dihubungi_debitur,
            'no_telepon_debitur' => $request->no_telepon_debitur,
            'tujuan_spesifik' => $request->tujuan_spesifik,
            'kategori_kredit' => $request->kategori_kredit,
            'kategori_kredit_bca' => $request->kategori_kredit_bca,
            'tipe_jaminan' => $request->tipe_jaminan,
            'lokasi_cabang_bank' => $request->lokasi_cabang_bank,
            'dasar_nilai_spesifik' => $request->dasar_nilai_spesifik,
            'dasar_penilaian' => json_encode($request->dasar_penilaian),
            'pendekatan_penilaian' => json_encode($request->pendekatan_penilaian),
            'provinsi_obyek' => $request->provinsi_obyek,
            'kabupaten_lokasi_obyek' => $request->kabupaten_lokasi_obyek,
            'kecamatan_lokasi_obyek' => $request->kecamatan_lokasi_obyek,
            'kelurahan_lokasi_obyek' => $request->kelurahan_lokasi_obyek,
            'rt_rw_lokasi_obyek' => $request->rt_rw_lokasi_obyek,
            'kode_pos_rt_rw_lokasi_obyek' => $request->kode_pos_rt_rw_lokasi_obyek,
            'wil_admint2_lokasi_obyek' => $request->wil_admint2_lokasi_obyek,
            'wil_admint4_lokasi_obyek' => $request->wil_admint4_lokasi_obyek,
            'alamat_lokasi_obyek' => $request->alamat_lokasi_obyek,
            'nama_instansi_pengguna_laporan' => $request->nama_instansi_pengguna_laporan,
            'pilih_nama_instansi_pengguna_laporan' => $request->pilih_nama_instansi_pengguna_laporan,
            'pengguna_laporan_khusus' => $request->pengguna_laporan_khusus,
            'alamat' => $request->alamat,
            'kota_bap_final' => $request->kota_bap_final,
            'pilih_nama_instansi_daerah_bap_final' => $request->pilih_nama_instansi_daerah_bap_final,
            'tanggal_inspeksi' => $request->tanggal_inspeksi,
            'tanggal_penilaian' => $request->tanggal_penilaian,
            'informasi_khusus' => $request->informasi_khusus,
            'status_data' => $request->status_data,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('laporan-retail')->with('success', 'Laporan Penilaian Retail berhasil disimpan!');
    }

}
