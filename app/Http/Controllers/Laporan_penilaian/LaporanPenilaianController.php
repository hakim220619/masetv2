<?php

namespace App\Http\Controllers\Laporan_penilaian;

use App\Http\Controllers\Controller;
use App\Models\Bangunan;
use App\Models\LaporanPenilaian;
use App\Models\MasterLaporan;
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
        $master_report = MasterLaporan::where('laporan_id', $id)->first();
        // dd($master_report);
        $objects = Bangunan::all();
        if ($report->kategori_laporan_penilaian == "Tanah dan Bangunan"){
          return view('content.laporan_penilaian.edit.bangunan', compact('report','master_report','objects'));
        } elseif ($report->kategori_laporan_penilaian == "Tanah Kosong"){
          return view('content.laporan_penilaian.edit.tanah_kosong', compact('report','master_report','objects'));
        } else {
          return view('content.laporan_penilaian.edit.retail', compact('report','master_report','objects'));
        }
    }

    public function update_laporan_bangunan($id, Request $request){
      // dd($request['kelengkapan_dokumen']);
      $data_update = $request->validate([
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
        'nama_instansi_pengguna_laporan' => 'nullable|string|max:255',
        'pilih_nama_instansi_pengguna_laporan' => 'nullable|string|max:255',
        'alamat' => 'nullable|string',
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
        'tanggal_inspeksi' => 'required|date',
        'tanggal_penilaian' => 'required|date',
        'tingkat_suku_bunga_suku_bunga_pinjaman' => 'nullable|string|max:255',
        'sumberdata_suku_bunga_pinjaman' => 'nullable|string|max:255',
        'screenshoot_sumber_suku_bunga_pinjaman' => 'nullable|file|mimes:jpg,png,pdf',
        'admin_tim_penilai' => 'nullable|string',
        'tim_penilai_qc' => 'nullable|string',
        'penilai1_tim_penilai' => 'nullable|string',
        'penilai2_tim_penilai' => 'nullable|string',
        'reviewer_tim_penilai' => 'nullable|string',
        'pj_tim_penilai' => 'nullable|string',
        'nama_pendamping_inpeksi' => 'nullable|string',
        'telepon_pendamping_inpeksi' => 'nullable|string',
        'status_pendamping_inpeksi' => 'nullable|string',
        'kelengkapan_dokumen' => 'nullable|array',
        'informasi_khusus' => 'nullable|string',
      ]);
      $data_update['kelengkapan_dokumen'] = $request->input('kelengkapan_dokumen', null);
      $laporan = LaporanPenilaian::findOrFail($id);
      // dd($$data_update['nama_pendamping_inpeksi']);
      $laporan->update($data_update);

      $data_create = $request->validate([
        'batas_timur' => 'nullable|string',
        'batas_tenggara' => 'nullable|string',
        'batas_selatan' => 'nullable|string',
        'batas_barat_daya' => 'nullable|string',
        'batas_barat' => 'nullable|string',
        'batas_barat_laut' => 'nullable|string',
        'batas_utara' => 'nullable|string',
        'batas_timur_laut' => 'nullable|string',
        'bentuk_kepemilikan' => 'nullable|string',
        'dokumen_hak_tanah_jenis' => 'nullable|array',
        'dokumen_hak_tanah_nomor' => 'nullable|array',
        'dokumen_hak_tanah_nama_pemegang_hak' => 'nullable|array',
        'dokumen_hak_tanah_tgl_diterbitkan' => 'nullable|array',
        'dokumen_hak_tanah_tgl_berakhir' => 'nullable|array',
        'dokumen_hak_tanah_nomor_su/sg' => 'nullable|array',
        'dokumen_hak_tanah_tgl_su/sg' => 'nullable|array',
        'dokumen_hak_tanah_luas_tanah' => 'nullable|array',
        'dokumen_hak_tanah_kantor_agraria' => 'nullable|array',
        'dokumen_hak_tanah_kondisi_khusus' => 'nullable|array',
        'dokumen_hak_tanah_print' => 'nullable|string',
        'keterangan_dokumen_tanah' => 'nullable|string',
        'dokumen_imb_nomor' => 'nullable|string',
        'dokumen_imb_tgl_imb' => 'nullable|date',
        'dokumen_imb_diterbitkan_oleh' => 'nullable|string',
        'dokumen_imb_status_imb' => 'nullable|string',
        'dokumen_imb_nama_pemegang_ijin' => 'nullable|string',
        'dokumen_imb_peruntukan_bangunan' => 'nullable|string',
        'dokumen_imb_lokasi_bangunan' => 'nullable|string',
        'dokumen_imb_no_sertifikat_tanah' => 'nullable|string',
        'dokumen_imb_nama_bangunan' => 'nullable|array',
        'dokumen_imb_luas' => 'nullable|array',
        'dokumen_imb_keterangan' => 'nullable|string',
        'keterangan_dokumen_imb' => 'nullable|string',
        'peraturan_kawasan_peruntukan_kawasan' => 'nullable|string',
        'peraturan_kawasan_kdb' => 'nullable|numeric',
        'peraturan_kawasan_klb' => 'nullable|numeric',
        'peraturan_kawasan_gsb' => 'nullable|numeric',
        'peraturan_kawasan_ketinggian' => 'nullable|numeric',
        'peraturan_kawasan_rencana_terkena_jalan' => 'nullable|string',
        'peraturan_kawasan_penjelasan' => 'nullable|string',
        'analisis_data_hbu' => 'nullable|string',
        'analisis_data_pendekatan_penilaian' => 'nullable|string',
        'asumsi_penilaian_syarat_pembiayaan' => 'nullable|string',
        'asumsi_penilaian_kondisi_penjualan' => 'nullable|string',
        'asumsi_penilaian_pengeluaran' => 'nullable|string',
        'asumsi_penilaian_kondisi_pasar' => 'nullable|string',
        'jenis_properti' => 'nullable|string',
        'jenis_bangunan' => 'nullable|string',
        'peruntukan_tanah_tabel_analisis' => 'nullable|string',
        'keterangan_dasar_nilai_tabel_analisis' => 'nullable|string',
        'lat' => 'nullable|string',
        'long' => 'nullable|string',
        'njop_tahun' => 'nullable|array',
        'njop_nilai_perolehan' => 'nullable|array',
        'row_jalan' => 'nullable|numeric',
        'tipe_jalan' => 'nullable|string',
        'kapasitas jalan' => 'nullable|string',
        'penggunaan_lahan' => 'nullable|string',
        'posisi_obyek' => 'nullable|string',
        'lokasi_aset' => 'nullable|string',
        'bentuk_tanah' => 'nullable|string',
        'lebar_muka_tanah' => 'nullable|string',
        'ketinggian_muka_jalan' => 'nullable|string',
        'topografi' => 'nullable|string',
        'tingkat_hunian' => 'nullable|numeric',
        'kondisi_lingkungan_khusus' => 'nullable|array',
        'karakteristik_ekonomi_kualitas_pendapatan' => 'nullable|string',
        'karakteristik_ekonomi_biaya_operasional' => 'nullable|string',
        'karakteristik_ekonomi_ketentuan_sewa' => 'nullable|string',
        'karakteristik_ekonomi_manajemen' => 'nullable|string',
        'karakteristik_ekonomi_bauran_penyewa' => 'nullable|string',
        'komponen_non_realty_ffe' => 'nullable|string',
        'komponen_non_realty_mesin' => 'nullable|string',
        'gambaran_objek_dari_pusat_kota' => 'nullable|string',
        'gambaran_objek_pusat_ekonomi' => 'nullable|string',
        'gambaran_objek_dari_jalan_utama' => 'nullable|string',
        'gambaran_objek_kondisi_lingkungan_khusus' => 'nullable|string',
        'gambaran_objek_faktor_view' => 'nullable|string',
        'obyek' => 'nullable|array',
        'pagar_sarana_pelengkap' => 'nullable|array',
        'pagar_bobot' => 'nullable|array',
        'pagar_adjusment_lain' => 'nullable|array',
        'pagar_umur_ekonomis' => 'nullable|numeric',
        'pagar_kondisi_sarana_secara_visual' => 'nullable|string',
        'pagar_tahun_dibangun' => 'nullable|numeric',
        'pagar_sumber_informasi_tahun_dibangun' => 'nullable|array',
        'pagar_tahun_renovasi' => 'nullable|numeric',
        'pagar_sumber_informasi_tahun_renovasi' => 'nullable|array',
        'pagar_jenis_renovasi' => 'nullable|string',
        'pagar_bobot_renovasi' => 'nullable|numeric',
        'pagar_luas_bangunan' => 'nullable|numeric',
        'perkerasan_sarana_pelengkap' => 'nullable|array',
        'perkerasan_bobot' => 'nullable|array',
        'perkerasan_adjusment_lain' => 'nullable|array',
        'perkerasan_umur_ekonomis' => 'nullable|numeric',
        'perkerasan_kondisi_sarana_secara_visual' => 'nullable|string',
        'perkerasan_tahun_dibangun' => 'nullable|numeric',
        'perkerasan_sumber_informasi_tahun_dibangun' => 'nullable|array',
        'perkerasan_tahun_renovasi' => 'nullable|numeric',
        'perkerasan_sumber_informasi_tahun_renovasi' => 'nullable|array',
        'perkerasan_jenis_renovasi' => 'nullable|string',
        'perkerasan_bobot_renovasi' => 'nullable|numeric',
        'perkerasan_luas_bangunan' => 'nullable|numeric',
        'kanopi_sarana_pelengkap' => 'nullable|array',
        'kanopi_bobot' => 'nullable|array',
        'kanopi_adjusment_lain' => 'nullable|array',
        'kanopi_umur_ekonomis' => 'nullable|numeric',
        'kanopi_kondisi_sarana_secara_visual' => 'nullable|string',
        'kanopi_tahun_dibangun' => 'nullable|numeric',
        'kanopi_sumber_informasi_tahun_dibangun' => 'nullable|array',
        'kanopi_tahun_renovasi' => 'nullable|numeric',
        'kanopi_sumber_informasi_tahun_renovasi' => 'nullable|array',
        'kanopi_jenis_renovasi' => 'nullable|string',
        'kanopi_bobot_renovasi' => 'nullable|numeric',
        'kanopi_luas_bangunan' => 'nullable|numeric',
        'denah_tanah' => 'nullable|file|mimes:jpg,png,pdf',
        'denah_bangunan' => 'nullable|file|mimes:jpg,png,pdf',
        'gambar_peta_lokasi' => 'nullable|file|mimes:jpg,png,pdf',
        'sentuh_tanahku' => 'nullable|file|mimes:jpg,png,pdf',
        'gistaru' => 'nullable|file|mimes:jpg,png,pdf',
        'laporan_terinci' => 'nullable|file|mimes:jpg,png,pdf|max:51200',
        'kertas_kerja' => 'nullable|file|mimes:jpg,png,pdf|max:51200',
        'pemberi_tugas' => 'nullable|string',
        // tambahan edit retail (kuramg dokumen hak properti)
        'tgl_izin_layak_huni' => 'nullable|date',
        'no_izin_layak_huni' => 'nullable|string',
        'tgl_akta_pemisahan' => 'nullable|date',
        'no_akta_pemisahan' =>  'nullable|string',
        'dibuat_akta_pemisahan' => 'nullable|string',
        'disahkan_oleh_akta_pemisahan' => 'nullable|string',
        'tgl_disahkan_akta_pemisahan' => 'nullable|date',
        'no_pengesahan_akta_pemisahan' => 'nullable|string',
        'jenis_properti_retail' => 'nullable|string',
        'kondisi_properti' => 'nullable|string',
        'spesifikasi_properti' => 'nullable|string',
        'tipe_apartemen' => 'nullable|string',
        'posisi_lantai' => 'nullable|numeric',
        'biaya_properti_service_charge' => 'nullable|numeric',
        'biaya_properti_parkir' => 'nullable|numeric',
        'biaya_properti_utilitas' => 'nullable|numeric',
        'biaya_properti_overtime' => 'nullable|numeric',
        'grade_bangunan' => 'nullable|string',
        'fasilitas_bangunan' => 'nullable|string',
        'row_koridor' => 'nullable|numeric',
        'tipe_akses_koridor' => 'nullable|string',
        'luas_gross_bangunan_total' => 'nullable|numeric',
        'jumlah_lantai' => 'nullable|numeric',
        'penggunaan_saat_ini' => 'nullable|string',
        'bentuk_bangunan' => 'nullable|string',
        'basement' => 'nullable|string',
        'konstruksi_bangunan' => 'nullable|string',
        'konstruksi_lantai' => 'nullable|string',
        'konstruksi_dinding' => 'nullable|string',
        'konstruksi_atap' => 'nullable|string',
        'konstruksi_pondasi' => 'nullable|string',
        'retail_tahun_dibangun' => 'nullable|integer|digits:4',
        'retail_tahun_renovasi' => 'nullable|integer|digits:4',
        'penggunaan_bangunan_saat_ini' => 'nullable|string|max:30',
        'perlengkapan_bangunan' => 'nullable|array',
        'penggunaan_bangunan' => 'nullable|string|max:30',
        // tambahan edit tanah kosong
        'foto_tampak_depan' => 'nullable|file|mimes:jpg,png,pdf',
        'foto_tampak_kiri' => 'nullable|file|mimes:jpg,png,pdf',
        'foto_tampak_kanan' => 'nullable|file|mimes:jpg,png,pdf',
        'foto_lainnya' => 'nullable|file|mimes:jpg,png,pdf',
        'penggunaan_tanah_saat_ini' => 'nullable|string',
      ]);

      $data_create['laporan_id'] = $id;
      $data_create['obyek_id'] = $request->input('obyek_id', null);
      $data_create['bangunan_uid'] = null;
      $data_create['tanah_kosong_uid'] = null;

      $master_laporan = MasterLaporan::where('laporan_id',$id)->first();

      if($master_laporan){
        $master_laporan->update($data_create);
      } else {
        MasterLaporan::create($data_create);
      }
      return redirect()->route('laporan-penilaian.show', ['id' => $laporan->id])->with('success', 'Laporan Penilaian berhasil diedit!');
    }

    public function analisa($id) {
        $report = LaporanPenilaian::find($id);
        $ikk = DB::table('ikk')
        ->select('ikk_mappi','nama_kabupaten_kota')
        ->where('kode',$report->kabupaten_lokasi_obyek)
        ->first();
        $ikk->ikk_mappi = $ikk->ikk_mappi*100;
        $master_laporan = MasterLaporan::where('laporan_id', $id)->first();
        if ($master_laporan->obyek_id != null) {
          $obyek_penilaian = Bangunan::whereIn('id', $master_laporan->obyek_id)->get();
        } else {
          $obyek_penilaian = null;
        }
        // dd($obyek_penilaian);
        return view('content.laporan_penilaian.analisa', compact('report','ikk','obyek_penilaian'));
    }

    public function getData(Request $request){

    }
}
