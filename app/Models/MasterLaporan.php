<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLaporan extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $casts = [
    'obyek' => 'array',
    'obyek_id' => 'array',
    'bangunan_retail_uid' => 'array',
    'tanah_kosong_uid' => 'array',
    'dokumen_hak_tanah_jenis' => 'array',
    'dokumen_hak_tanah_nomor' => 'array',
    'dokumen_hak_tanah_nama_pemegang_hak' => 'array',
    'dokumen_hak_tanah_tgl_diterbitkan' => 'array',
    'dokumen_hak_tanah_tgl_berakhir' => 'array',
    'dokumen_hak_tanah_nomor_su/sg' => 'array',
    'dokumen_hak_tanah_tgl_su/sg' => 'array',
    'dokumen_hak_tanah_luas_tanah' => 'array',
    'dokumen_hak_tanah_kantor_agraria' => 'array',
    'dokumen_hak_tanah_kondisi_khusus' => 'array',
    'dokumen_imb_nama_bangunan' => 'array',
    'dokumen_imb_luas' => 'array',
    'foto_lainnya' => 'array',
    'njop_tahun' => 'array',
    'njop_nilai_perolehan' => 'array',
    'kondisi_lingkungan_khusus' => 'array',
    'perlengkapan_bangunan' => 'array',
    'pagar_sarana_pelengkap' => 'array',
    'pagar_bobot' => 'array',
    'pagar_adjusment_lain' => 'array',
    'pagar_sumber_informasi_tahun_dibangun' => 'array',
    'pagar_sumber_informasi_tahun_renovasi' => 'array',
    'perkerasan_sarana_pelengkap' => 'array',
    'perkerasan_bobot' => 'array',
    'perkerasan_adjusment_lain' => 'array',
    'perkerasan_sumber_informasi_tahun_dibangun' => 'array',
    'perkerasan_sumber_informasi_tahun_renovasi' => 'array',
    'kanopi_sarana_pelengkap' => 'array',
    'kanopi_bobot' => 'array',
    'kanopi_adjusment_lain' => 'array',
    'kanopi_sumber_informasi_tahun_dibangun' => 'array',
    'kanopi_sumber_informasi_tahun_renovasi' => 'array',
  ];

}
