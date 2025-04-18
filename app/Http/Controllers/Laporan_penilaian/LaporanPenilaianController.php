<?php

namespace App\Http\Controllers\Laporan_penilaian;

use App\Http\Controllers\Controller;
use App\Models\LaporanPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanPenilaianController extends Controller
{
    public function laporan_bangunan()
    {
      $provinsi = DB::table('ikk')
        ->select('nama_provinsi')
        ->distinct()
        ->get();
      return view('content.laporan_penilaian.laporan_bangunan',compact('provinsi'));
    }

    public function get_kabupaten(Request $request){
      $nama_provinsi = $request->input('nama_provinsi');
      $kabupaten = DB::table('ikk')
        ->select('kode','nama_kabupaten_kota')
        ->where('nama_provinsi', $nama_provinsi)
        ->where('nama_kabupaten_kota', '!=', $nama_provinsi)
        ->get();
      return response()->json($kabupaten);

    }
    public function laporan_tanah_kosong()
    {
      $provinsi = DB::table('ikk')
        ->select('nama_provinsi')
        ->distinct()
        ->get();
      return view('content.laporan_penilaian.laporan_tanah_kosong',compact('provinsi'));
    }
    public function laporan_retail()
    {
      $provinsi = DB::table('ikk')
        ->select('nama_provinsi')
        ->distinct()
        ->get();
      return view('content.laporan_penilaian.laporan_retail',compact('provinsi'));
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
            'no_dokumen_kontrak' => 'nullable|string|max:255',
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
            'no_dokumen_kontrak' => $request->no_dokumen_kontrak,
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
            'tingkat_suku_bunga_suku_bunga_pinjaman' =>  $request->tingkat_suku_bunga_suku_bunga_pinjaman,
            'sumberdata_suku_bunga_pinjaman' => $request->sumberdata_suku_bunga_pinjaman,
            'screenshoot_sumber_suku_bunga_pinjaman' => $request->screenshoot_sumber_suku_bunga_pinjaman,
            'admin_tim_penilai' => $request->admin_tim_penilai,
            'penilai1_tim_penilai' => $request->penilai1_tim_penilai,
            'penilai2_tim_penilai' => $request->penilai2_tim_penilai,
            'tim_penilai_qc' => $request->tim_penilai_qc,
            'reviewer_tim_penilai' => $request->reviewer_tim_penilai,
            'pj_tim_penilai' => $request->pj_tim_penilai,
            'nama_pendamping_inpeksi' => $request->nama_pendamping_inpeksi,
            'telepon_pendamping_inpeksi' => $request->telepon_pendamping_inpeksi,
            'status_pendamping_inpeksi' => $request->status_pendamping_inpeksi,
            'kelengkapan_dokumen' => json_encode($request->kelengkapan_dokumen),
            'tgl_izin_layak_huni' => $request->tgl_izin_layak_huni,
            'no_izin_layak_huni' => $request->no_izin_layak_huni,
            'tgl_akta_pemisahan' => $request->tgl_akta_pemisahan,
            'no_akta_pemisahan' =>  $request->no_akta_pemisahan,
            'dibuat_akta_pemisahan' => $request->dibuat_akta_pemisahan,
            'disahkan_oleh_akta_pemisahan' => $request->disahkan_oleh_akta_pemisahan,
            'tgl_disahkan_akta_pemisahan' => $request->tgl_disahkan_akta_pemisahan,
            'no_pengesahan_akta_pemisahan' => $request->no_pengesahan_akta_pemisahan,
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
            'no_dokumen_kontrak' => 'nullable|string|max:255',
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
            'kategori_laporan_penilaian' => 'Tanah Kosong',
            'judul_laporan' => $request->judul_laporan,
            'nama_entitas' => $request->nama_entitas,
            'judul_print_cover' => $request->judul_print_cover,
            'versi_btb' => $request->versi_btb,
            'no_laporan_penilaian' => $request->no_laporan_penilaian,
            'tgl_laporan_penilaian' => $request->tgl_laporan_penilaian,
            'no_dokumen_kontrak' => $request->no_dokumen_kontrak,
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
            'tingkat_suku_bunga_suku_bunga_pinjaman' =>  $request->tingkat_suku_bunga_suku_bunga_pinjaman,
            'sumberdata_suku_bunga_pinjaman' => $request->sumberdata_suku_bunga_pinjaman,
            'screenshoot_sumber_suku_bunga_pinjaman' => $request->screenshoot_sumber_suku_bunga_pinjaman,
            'admin_tim_penilai' => $request->admin_tim_penilai,
            'penilai1_tim_penilai' => $request->penilai1_tim_penilai,
            'penilai2_tim_penilai' => $request->penilai2_tim_penilai,
            'tim_penilai_qc' => $request->tim_penilai_qc,
            'reviewer_tim_penilai' => $request->reviewer_tim_penilai,
            'pj_tim_penilai' => $request->pj_tim_penilai,
            'nama_pendamping_inpeksi' => $request->nama_pendamping_inpeksi,
            'telepon_pendamping_inpeksi' => $request->telepon_pendamping_inpeksi,
            'status_pendamping_inpeksi' => $request->status_pendamping_inpeksi,
            'kelengkapan_dokumen' => json_encode($request->kelengkapan_dokumen),
            'informasi_khusus' => $request->informasi_khusus,
            'status_data' => $request->status_data,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return redirect()->route('laporan-tanah_kosong')->with('success', 'Laporan Penilaian Tanah Kosong berhasil disimpan!');
    }
    public function store_laporan_bangunan(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'nama_entitas' => 'required|string|max:255',
            'judul_print_cover' => 'nullable|string',
            'versi_btb' => 'required|string',
            'no_laporan_penilaian' => 'required|string|max:255',
            'tgl_laporan_penilaian' => 'required|date',
            'no_dokumen_kontrak' => 'nullable|string|max:255',
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
            'kategori_laporan_penilaian' => 'Tanah dan Bangunan',
            'judul_laporan' => $request->judul_laporan,
            'nama_entitas' => $request->nama_entitas,
            'judul_print_cover' => $request->judul_print_cover,
            'versi_btb' => $request->versi_btb,
            'no_laporan_penilaian' => $request->no_laporan_penilaian,
            'tgl_laporan_penilaian' => $request->tgl_laporan_penilaian,
            'no_dokumen_kontrak' => $request->no_doumen_kontrak,
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
            'tingkat_suku_bunga_suku_bunga_pinjaman' =>  $request->tingkat_suku_bunga_suku_bunga_pinjaman,
            'sumberdata_suku_bunga_pinjaman' => $request->sumberdata_suku_bunga_pinjaman,
            'screenshoot_sumber_suku_bunga_pinjaman' => $request->screenshoot_sumber_suku_bunga_pinjaman,
            'admin_tim_penilai' => $request->admin_tim_penilai,
            'penilai1_tim_penilai' => $request->penilai1_tim_penilai,
            'penilai2_tim_penilai' => $request->penilai2_tim_penilai,
            'tim_penilai_qc' => $request->tim_penilai_qc,
            'reviewer_tim_penilai' => $request->reviewer_tim_penilai,
            'pj_tim_penilai' => $request->pj_tim_penilai,
            'nama_pendamping_inpeksi' => $request->nama_pendamping_inpeksi,
            'telepon_pendamping_inpeksi' => $request->telepon_pendamping_inpeksi,
            'status_pendamping_inpeksi' => $request->status_pendamping_inpeksi,
            'kelengkapan_dokumen' => json_encode($request->kelengkapan_dokumen),
            'informasi_khusus' => $request->informasi_khusus,
            'status_data' => $request->status_data,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('laporan-bangunan')->with('success', 'Laporan Penilaian Tanah dan Bangunan berhasil disimpan!');
    }

    public function lihat_laporan()
    {
        $reports = LaporanPenilaian::paginate(9);
        // dd($reports);
        return view('content.laporan_penilaian.all_laporan', compact('reports'));
    }

    public function edit_laporan($id)
    {
        $report = LaporanPenilaian::find($id);
        if ($report->kategori_laporan_penilaian == "Tanah dan Bangunan"){
          return view('content.laporan_penilaian.edit.bangunan', compact('report'));
        } elseif ($report->kategori_laporan_penilaian == "Tanah Kosong"){
          return view('content.laporan_penilaian.edit.tanah_kosong', compact('report'));
        } else {
          return view('content.laporan_penilaian.edit.retail', compact('report'));
        }
    }

    public function analisa($id) {
        $report = LaporanPenilaian::find($id);
        $ikk = DB::table('ikk')
        ->select('ikk_mappi','nama_kabupaten_kota')
        ->where('kode',$report->kabupaten_lokasi_obyek)
        ->first();
        $ikk->ikk_mappi = $ikk->ikk_mappi*100;
        return view('content.laporan_penilaian.analisa', compact('report','ikk'));
    }

    public function getData(Request $request){

    }
}
