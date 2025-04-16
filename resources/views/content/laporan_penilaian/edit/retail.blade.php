@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Bangunan')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.scss',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
  'resources/assets/vendor/libs/select2/select2.scss'
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.js',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
  'resources/assets/vendor/libs/select2/select2.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/form-wizard-icons.js'])
@endsection

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />
<h4>Edit Laporan Penilaian – Office/Retail/Apartemen</h4>
  <!-- Default -->
  <div class="row">
    <!-- Default Icons Wizard -->
    <div class="col-12 mb-4">
      <div class="wizard-icons wizard-icons-example mt-2">

        <div class="content">
          <form method="POST" action="#" enctype="multipart/form-data">
            <!-- Account Details -->
            @csrf
            <div id="account-details" class="content">
              <div class="row g-3">
                <div class="form-group">
                  <label class="form-label" for="judul_laporan">Judul Laporan</label>
                  <input type="text" id="judul_laporan" name="judul_laporan" class="form-control" value="{{ old('judul_laporan', $report->judul_laporan) }}"/>
                </div>
                <div class="form-group">
                  <label class="form-label" for="nama_entitas">Nama Entitas</label>
                  <input type="text" id="nama_entitas" name="nama_entitas" class="form-control" value="{{ old('nama_entitas', $report->nama_entitas) }}" />
                </div>
                <div class="form-group">
                  <label class="form-label" for="judul_print_cover">Judul Print Cover Laporan untuk Umum</label>
                  <textarea class="form-control" name="judul_print_cover" id="judul_print_cover" cols="30" rows="10" >{{ old('judul_print_cover', $report->judul_print_cover) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="versi_btb">Versi BTP</label>
                    <?php
                    $currentYear = date("Y");
                    ?>

                    <select class="form-select" name="versi_btb" id="versi_btb" aria-label="Default select example">
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                            $year = $currentYear - $i;
                            echo "<option value='$year' {{ old('versi_btb', $report->versi_btb) == $year ? 'selected' : '' }}>$year</option>";
                        }
                        ?>
                    </select>
                </div>

                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="laporan_penilaian">Laporan Penilaian</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Nomor Laporan / Surat Final</th>
                      <th>Tanggal</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="no_laporan_penilaian" name="no_laporan_penilaian" class="form-control" value="{{ old('no_laporan_penilaian', $report->no_laporan_penilaian) }}"/></td>
                      <td><input type="date" id="tgl_laporan_penilaian" name="tgl_laporan_penilaian" class="form-control" value="{{ old('tgl_laporan_penilaian', \Carbon\Carbon::parse($report->tgl_laporan_penilaian)->format('Y-m-d')) }}"/></td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="Dokumen Kontrak">Dokumen Kontrak</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Nomor Kontrak / SPK / LPPA</th>
                      <th>Tanggal</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="no_dokumen_kontrak" name="no_dokumen_kontrak" class="form-control" value="{{ old('no_dokumen_kontrak', $report->no_dokumen_kontrak) }}" /></td>
                      <td><input type="date" id="tgl_dokumen_kontrak" name="tgl_dokumen_kontrak" class="form-control" value="{{ old('tgl_dokumen_kontrak', \Carbon\Carbon::parse($report->tgl_laporan_penilaian)->format('Y-m-d')) }}"/></td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="pemberi_tugas">Pemberi Tugas</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Nama / Instansi</th>
                      <th>Key KCP</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="nama_instansi_pemberi_tugas" name="nama_instansi_pemberi_tugas" class="form-control" value="{{ old('nama_instansi_pemberi_tugas', $report->nama_instansi_pemberi_tugas) }}" /></td>
                      <td><input type="text" id="key_kcp_pemberi_tugas" name="key_kcp_pemberi_tugas" class="form-control" value="{{ old('key_kcp_pemberi_tugas', $report->key_kcp_pemberi_tugas) }}"/></td>
                    </tr>
                    <tr>
                        <th>Contact Person Penugasan</th>
                        <th>Telepon</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="cp_penugasan_pemberi_tugas" name="cp_penugasan_pemberi_tugas" class="form-control" value="{{ old('cp_penugasan_pemberi_tugas', $report->cp_penugasan_pemberi_tugas) }}" /></td>
                        <td><input type="text" id="telepon_pemberi_tugas" name="telepon_pemberi_tugas" class="form-control" value="{{ old('telepon_pemberi_tugas', $report->telepon_pemberi_tugas) }}"/></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                    <label for="tujuan_penilaian"><b>Tujuan Penilaian sesuai SPI</b></label>
                    <select id="tujuan_penilaian" name="tujuan_penilaian" class="form-control" required>
                        <option value="">- Select -</option>
                        <option value="jual_beli" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "jual_beli" ? 'selected' : '' }}>Penilaian untuk kepentingan jual beli</option>
                        <option value="lelang_jual_beli_terbatas" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "lelang_jual_beli_terbatas" ? 'selected' : '' }}>Penilaian untuk tujuan lelang atau kepentingan jual beli dalam waktu terbatas</option>
                        <option value="penjaminan_utang" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "penjaminan_utang" ? 'selected' : '' }}>Penilaian untuk kepentingan penjaminan utang</option>
                        <option value="agun_bank" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "agun_bank" ? 'selected' : '' }}>Penilaian untuk kepentingan agunan yang diambil alih pada perbankan</option>
                        <option value="sak_sap" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "sak_sap" ? 'selected' : '' }}>Penilaian untuk kepentingan Standar Akuntansi Keuangan (SAK) atau Standar Akuntansi Pemerintah (SAP)</option>
                        <option value="pengadaan_tanah" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "pengadaan tanah" ? 'selected' : '' }}>Penilaian untuk kepentingan pengadaan tanah bagi kepentingan umum</option>
                        <option value="asuransi" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "asuransi" ? 'selected' : '' }}>Penilaian untuk kepentingan asuransi</option>
                        <option value="ipo" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "ipo" ? 'selected' : '' }}>Penilaian untuk kepentingan rencana pencatatan saham di pasar modal/ IPO</option>
                        <option value="pelaporan_keuangan_sewa" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "pelaporan_keuangan_sewa" ? 'selected' : '' }}>Penilaian untuk kepentingan transaksi atau pelaporan keuangan atas obyek properti sewa</option>
                        <option value="transaksi_internal" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "transaksi_internal" ? 'selected' : '' }}>Penilaian untuk kepentingan transaksi internal/ strategis</option>
                        <option value="jual_beli_dipindahkan" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "jual_beli_dipindahkan" ? 'selected' : '' }}>Penilaian untuk kepentingan jual beli pada aset yang dapat dipindahkan</option>
                        <option value="aset_tak_berwujud" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "aset_tak_berwujud" ? 'selected' : '' }}>Penilaian ekuitas/ aset tak berwujud untuk keperluan yudisial atau kepentingan dissenting shareholder</option>
                        <option value="transaksi_strategis_khusus" {{ old('tujuan_penilaian', $report->tujuan_penilaian) == "transaksi_strategis_khusus" ? 'selected' : '' }}>Penilaian untuk kepentingan transaksi internal/ strategis/ khusus</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tujuan_spesifik"><b>Tujuan Spesifik</b></label>
                   <input type="text" id="tujuan_spesifik" name="tujuan_spesifik" class="form-control" value="{{ old('tujuan_spesifik', $report->tujuan_spesifik) }}" />
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                    <label class="form-label" for="pengguna_laporan">Pengguna Laporan</label>
                    <table class="table table-borderless">
                      <tr>
                        <th>Nama / Instansi</th>
                        <th>Pilih Nama / Instansi</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="nama_instansi_pengguna_laporan" name="nama_instansi_pengguna_laporan" class="form-control" value="{{ old('nama_instansi_pengguna_laporan', $report->nama_instansi_pengguna_laporan) }}" /></td>
                        <td><input type="text" id="pilih_nama_instansi_pengguna_laporan" name="pilih_nama_instansi_pengguna_laporan" class="form-control" value="{{ old('pilih_nama_instansi_pengguna_laporan', $report->pilih_nama_instansi_pengguna_laporan) }}"/></td>
                      </tr>
                      <tr>
                          <th>Alamat</th>
                      </tr>
                      <tr>
                          <td><textarea type="text" id="alamat" name="alamat" class="form-control" >{{ old('alamat', $report->alamat) }}</textarea></td>
                      </tr>
                    </table>
                </div>
                <div class="form-group">
                    <label for="dasar_nilai_spesifik"><b>Dasar Nilai Spesifik</b></label>
                    <input type="text" id="dasar_nilai_spesifik" name="dasar_nilai_spesifik" class="form-control" placeholder="" value="{{ old('dasar_nilai_spesifik', $report->dasar_nilai_spesifik) }}">
                </div>
                <div class="form-group">
                    <label><b>Pendekatan Penilaian</b></label>
                    <div>
                        <input type="checkbox" id="pendekatan_pasar" name="pendekatan_penilaian[]" value="Pendekatan Pasar" >
                        <label for="pendekatan_pasar">Pendekatan Pasar (Market Approach)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="pendekatan_biaya" name="pendekatan_penilaian[]" value="Pendekatan Biaya">
                        <label for="pendekatan_biaya">Pendekatan Biaya (Cost Approach)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="pendekatan_pendapatan" name="pendekatan_penilaian[]" value="Pendekatan Pendapatan">
                        <label for="pendekatan_pendapatan">Pendekatan Pendapatan (Income Approach)</label>
                    </div>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                    <label class="form-label" for="lokasi_obyek">Lokasi Obyek</label>
                    <table class="table table-borderless">
                      <tr>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="provinsi_obyek" name="provinsi_obyek" class="form-control" value="{{ old('provinsi_obyek', $report->provinsi_obyek) }}" /></td>
                        <td><input type="text" id="kabupaten_lokasi_obyek" name="kabupaten_lokasi_obyek" class="form-control"  value="{{ old('kabupaten_lokasi_obyek', $report->kabupaten_lokasi_obyek) }}"/></td>
                      </tr>
                      <tr>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="kecamatan_lokasi_obyek" name="kecamatan_lokasi_obyek" class="form-control" value="{{ old('kecamatan_lokasi_obyek', $report->kecamatan_lokasi_obyek) }}" /></td>
                        <td><input type="text" id="kelurahan_lokasi_obyek" name="kelurahan_lokasi_obyek" class="form-control" value="{{ old('kelurahan_lokasi_obyek', $report->kelurahan_lokasi_obyek) }}"/></td>
                      </tr>
                      <tr>
                        <th>Jalan/No/RT/RW</th>
                        <th>Kode Pos</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="rt_rw_lokasi_obyek" name="rt_rw_lokasi_obyek" class="form-control" value="{{ old('rt_rw_lokasi_obyek', $report->rt_rw_lokasi_obyek) }}" /></td>
                        <td><input type="text" id="kode_pos_rt_rw_lokasi_obyek" name="kode_pos_rt_rw_lokasi_obyek" class="form-control" value="{{ old('kode_pos_rt_rw_lokasi_obyek', $report->kode_pos_rt_rw_lokasi_obyek) }}"/></td>
                      </tr>
                      <tr>
                        <th>Wilayah Administratif Tingkat II (Laporan)</th>
                        <th>Wilayah Administratif Tingkat IV (Laporan)</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="wil_admint2_lokasi_obyek" name="wil_admint2_lokasi_obyek" class="form-control" value="{{ old('wil_admint2_lokasi_obyek', $report->wil_admint2_lokasi_obyek) }}" /></td>
                        <td><input type="text" id="wil_admint4_lokasi_obyek" name="wil_admint4_lokasi_obyek" class="form-control" value="{{ old('wil_admint_4_lokasi_obyek', $report->wil_admint4_lokasi_obyek) }}" /></td>
                      </tr>
                      <tr>
                          <th>Alamat Lengkap (Laporan)</th>
                      </tr>
                      <tr>
                          <td><textarea type="text" id="alamat_lokasi_obyek" name="alamat_lokasi_obyek" class="form-control" > {{ old('alamat_lokasi_obyek', $report->alamat_lokasi_obyek) }}</textarea></td>
                      </tr>
                    </table>
                </div>
                <div class="form-group">
                    <label for="tanggal_inspeksi"><b>Tanggal Inspeksi</b></label>
                    <input type="date" id="tanggal_inspeksi" name="tanggal_inspeksi" class="form-control" value="{{ old('tanggal_inspeksi', \Carbon\Carbon::parse($report->tanggal_inspeksi)->format('Y-m-d')) }}">
                </div>
                <div class="form-group">
                    <label for="tanggal_penilaian"><b>Tanggal Penilaian</b></label>
                    <input type="date" id="tanggal_penilaian" name="tanggal_penilaian" class="form-control">
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                    <label class="form-label" for="suku_bunga_pinjaman">Suku Bunga Pinjaman (Interest During Construction)</label>
                    <table class="table table-borderless">
                      <tr>
                        <th>Tingkat Suku Bunga Pinjaman per Tahun (pada saat penilaian)
                            Satuan dalam persen per tahun</th>
                        <th>Sumber Data Suku Bunga</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="tingkat_suku_bunga_suku_bunga_pinjaman" name="tingkat_suku_bunga_suku_bunga_pinjaman" class="form-control" /></td>
                        <td><input type="text" id="sumberdata_suku_bunga_pinjaman" name="sumberdata_suku_bunga_pinjaman" class="form-control"/></td>
                      </tr>
                      <tr>
                        <th>Screenshot Sumber Data Suku Bunga (jika ada)</th>
                      </tr>
                      <tr>
                        <td><input type="file" id="screenshoot_sumber_suku_bunga_pinjaman" name="screenshoot_sumber_suku_bunga_pinjaman" class="form-control" /></td>
                      </tr>
                    </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                    <label class="form-label" for="tim_penilai">Tim Penilai</label>
                    <table class="table table-borderless">
                      <tr>
                        <th>Admin</th>
                        <th>Quality Control / Quality Assurance</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="admin_tim_penilai" name="admin_tim_penilai" class="form-control" /></td>
                        <td><input type="text" id="tim_penilai_qc" name="tim_penilai_qc" class="form-control"/></td>
                      </tr>
                      <tr>
                        <th>Penilai 1</th>
                        <th>Penilai 2</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="penilai1_tim_penilai" name="penilai1_tim_penilai" class="form-control" /></td>
                        <td><input type="text" id="penilai2_tim_penilai" name="penilai2_tim_penilai" class="form-control"/></td>
                      </tr>
                      <tr>
                        <th>Reviewer</th>
                        <th>Penanggung Jawab (Penilai Publik)</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="reviewer_tim_penilai" name="reviewer_tim_penilai" class="form-control" /></td>
                        <td><input type="text" id="pj_tim_penilai" name="pj_tim_penilai" class="form-control"/></td>
                      </tr>
                    </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                    <label class="form-label" for="pendamping_inpeksi">Pendamping Inspeksi</label>
                    <table class="table table-borderless">
                      <tr>
                        <th>Nama</th>
                        <th>Telepon</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="nama_pendamping_inpeksi" name="nama_pendamping_inpeksi" class="form-control" /></td>
                        <td><input type="text" id="telepon_pendamping_inpeksi" name="telepon_pendamping_inpeksi" class="form-control"/></td>
                      </tr>
                      <tr>
                        <th>Status</th>
                      </tr>
                      <tr>
                        <td><input type="text" id="status_pendamping_inpeksi" name="status_pendamping_inpeksi" class="form-control" /></td>
                      </tr>
                      <tr>
                    </table>
                </div>
                <div class="form-group">
                    <label><b>Kelengkapan Dokumen Yang Diterima</b></label><br>
                    <div>
                        <input type="checkbox" id="sertifikat" name="kelengkapan_dokumen[]" value="Sertifikat/ Dokumen Hak Tanah">
                        <label for="sertifikat">Sertifikat/ Dokumen Hak Tanah</label>
                    </div>
                    <div>
                        <input type="checkbox" id="ijin_mendirikan" name="kelengkapan_dokumen[]" value="Ijin Mendirikan Bangunan">
                        <label for="ijin_mendirikan">Ijin Mendirikan Bangunan</label>
                    </div>
                    <div>
                        <input type="checkbox" id="invoice" name="kelengkapan_dokumen[]" value="Invoice/ Pernyataan Kepemilikan">
                        <label for="invoice">Invoice/ Pernyataan Kepemilikan</label>
                    </div>
                    <div>
                        <input type="checkbox" id="lainnya" name="kelengkapan_dokumen[]" value="Lainnya">
                        <label for="lainnya">Lainnya</label>
                    </div>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="izin_layak_huni">Izin Layak Huni</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Tanggal</th>
                      <th>Nomor</th>
                    </tr>
                    <tr>
                      <td><input type="date" id="tgl_izin_layak_huni" name="tgl_izin_layak_huni" class="form-control" /></td>
                      <td><input type="text" id="no_izin_layak_huni" name="no_izin_layak_huni" class="form-control"/></td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="akta_pemisahan">Akta Pemisahan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Tanggal</th>
                      <th>Nomor</th>
                    </tr>
                    <tr>
                      <td><input type="date" id="tgl_akta_pemisahan" name="tgl_akta_pemisahan" class="form-control" /></td>
                      <td><input type="text" id="no_akta_pemisahan" name="no_akta_pemisahan" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Dibuat</th>
                      <th>Disahkan Oleh</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="dibuat_akta_pemisahan" name="dibuat_akta_pemisahan" class="form-control" /></td>
                      <td><input type="text" id="disahkan_oleh_akta_pemisahan" name="disahkan_oleh_akta_pemisahan" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Tanggal Disahkan</th>
                      <th>Nomor Pengesahan</th>
                    </tr>
                    <tr>
                      <td><input type="date" id="tgl_disahkan_akta_pemisahan" name="tgl_disahkan_akta_pemisahan" class="form-control" /></td>
                      <td><input type="text" id="no_pengesahan_akta_pemisahan" name="no_pengesahan_akta_pemisahan" class="form-control"/></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                    <label for="informasi_khusus"><b>Informasi Khusus</b></label><br>
                    <small class="form-text text-muted">
                        Informasi khusus terkait penugasan, kondisi objek, kendala inspeksi, dll (Sebagai pertimbangan reviewer)
                    </small>
                    <textarea id="informasi_khusus" name="informasi_khusus" class="form-control" rows="4"></textarea>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="batas">Batas batas</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Timur</th>
                      <th>Tenggara</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_timur" name="batas_timur" class="form-control" /></td>
                      <td><input type="text" id="batas_tenggara" name="batas_tenggara" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Selatan</th>
                      <th>Barat Daya</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_selatan" name="batas_selatan" class="form-control" /></td>
                      <td><input type="text" id="batas_barat_daya" name="batas_barat_daya" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>Barat</th>
                      <th>Barat Laut</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_barat" name="batas_barat" class="form-control" /></td>
                      <td><input type="text" id="batas_barat_daya" name="batas_barat_daya" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>Utara</th>
                      <th>Timur Laut</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_utara" name="batas_utara" class="form-control" /></td>
                      <td><input type="text" id="batas_timur_laut" name="batas_timur_laut" class="form-control" /></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label for="dasar_nilai_spesifik"><b>Bentuk Kepemilikan</b></label>
                  <input type="text" id="bentuk_kepemilikan" name="bentuk_kepemilikan" class="form-control" placeholder="Bentuk Kepemilikan">
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="batas">Dokumen Tanah</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Jenis Dokumen Hak Tanah</th>
                      <th>Nomor</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_timur" name="batas_timur" class="form-control" /></td>
                      <td><input type="text" id="batas_tenggara" name="batas_tenggara" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Nama Pemegang Hak</th>
                      <th>Tanggal Diterbitkan</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_selatan" name="batas_selatan" class="form-control" /></td>
                      <td><input type="text" id="batas_barat_daya" name="batas_barat_daya" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>Tanggal Berakhir</th>
                      <th>Nomor SU/GS</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_barat" name="batas_barat" class="form-control" /></td>
                      <td><input type="text" id="batas_barat_daya" name="batas_barat_daya" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>Tanggal SU/GS</th>
                      <th>Luas Tanah(m2)</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_utara" name="batas_utara" class="form-control" /></td>
                      <td><input type="text" id="batas_timur_laut" name="batas_timur_laut" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>Kantor Agraria</th>
                      <th>Kondisi Khusus (jika ada)</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_utara" name="batas_utara" class="form-control" /></td>
                      <td><input type="text" id="batas_timur_laut" name="batas_timur_laut" class="form-control" /></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label for="dokumen_hak_tanah_print"><b>Dokumen Hak Tanah (print)</b></label><br>
                  <small class="form-text text-muted">
                      Informasi khusus terkait penugasan, kondisi objek, kendala inspeksi, dll (Sebagai pertimbangan reviewer)
                  </small>
                  <input type="text" id="dokumen_hak_tanah_print" name="dokumen_hak_tanah_print" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="keterangan_dokumen_tanah"><b>Keterangan Dokumen Tanah</b></label>
                  <textarea id="keterangan_dokumen_tanah" name="keterangan_dokumen_tanah" class="form-control" rows="4"></textarea>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="batas">Dokumen IMB</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Nomor IMB</th>
                      <th>Tanggal IMB</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_timur" name="batas_timur" class="form-control" /></td>
                      <td><input type="text" id="batas_tenggara" name="batas_tenggara" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Diterbitkan Oleh</th>
                      <th>Status IMB</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_selatan" name="batas_selatan" class="form-control" /></td>
                      <td><input type="text" id="batas_barat_daya" name="batas_barat_daya" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>Nama Pemegang Ijin</th>
                      <th>Peruntukan Bangunan Sesuai IMB</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_barat" name="batas_barat" class="form-control" /></td>
                      <td><input type="text" id="batas_barat_daya" name="batas_barat_daya" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>Lokasi Bangunan Sesuai IMB</th>
                      <th>No. Sertifikat Tanah atas hak tersebut di IMB</th>
                    </tr>
                    <tr class="align-top">
                      <td><textarea id="keterangan_dokumen_tanah" name="keterangan_dokumen_tanah" class="form-control" rows="3"></textarea></td>
                      <td><input type="text" id="batas_timur_laut" name="batas_timur_laut" class="form-control" /></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="form-label" for="Luas Bangunan Sesuai IMB">Luas Bangunan Sesuai IMB</label>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Nama Bangunan</th>
                      <th>Luas(m2)</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_timur" name="batas_timur" class="form-control" /></td>
                      <td><input type="text" id="batas_tenggara" name="batas_tenggara" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Keterangan</th>
                    </tr>
                    <tr>
                      <td><textarea type="text" id="alamat_lokasi_obyek" name="alamat_lokasi_obyek" class="form-control" ></textarea></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label for="keterangan_dokumen_tanah"><b>Keterangan Dokumen IMB</b></label>
                  <textarea id="keterangan_dokumen_tanah" name="keterangan_dokumen_tanah" class="form-control" rows="4"></textarea>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="lokasi_obyek">Peraturan Kawasan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Peruntukan Kawasan</th>
                      <th>Koefisien Dasar Bangunan(KDB)(%)</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="provinsi_obyek" name="provinsi_obyek" class="form-control" value="{{ old('provinsi_obyek', $report->provinsi_obyek) }}" /></td>
                      <td><input type="text" id="kabupaten_lokasi_obyek" name="kabupaten_lokasi_obyek" class="form-control"  value="{{ old('kabupaten_lokasi_obyek', $report->kabupaten_lokasi_obyek) }}"/></td>
                    </tr>
                    <tr>
                      <th>Koefisien Lantai Bangunan(KLB)</th>
                      <th>Garis Sempadan Bangunan(GSB)(meter)</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="kecamatan_lokasi_obyek" name="kecamatan_lokasi_obyek" class="form-control" value="{{ old('kecamatan_lokasi_obyek', $report->kecamatan_lokasi_obyek) }}" /></td>
                      <td><input type="text" id="kelurahan_lokasi_obyek" name="kelurahan_lokasi_obyek" class="form-control" value="{{ old('kelurahan_lokasi_obyek', $report->kelurahan_lokasi_obyek) }}"/></td>
                    </tr>
                    <tr>
                      <th>Ketinggian(lantai)</th>
                      <th>Terkena Rencana Jalan</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="kecamatan_lokasi_obyek" name="kecamatan_lokasi_obyek" class="form-control" value="{{ old('kecamatan_lokasi_obyek', $report->kecamatan_lokasi_obyek) }}" /></td>
                      <td><input type="text" id="kelurahan_lokasi_obyek" name="kelurahan_lokasi_obyek" class="form-control" value="{{ old('kelurahan_lokasi_obyek', $report->kelurahan_lokasi_obyek) }}"/></td>
                    </tr>
                    <tr>
                        <th>Penjelasan</th>
                    </tr>
                    <tr>
                        <td><textarea type="text" id="alamat_lokasi_obyek" name="alamat_lokasi_obyek" class="form-control" ></textarea></td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="batas">Analisis Data</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>HBU</th>
                      <th>Pendekatan Penilaian</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_timur" name="batas_timur" class="form-control" /></td>
                      <td><input type="text" id="batas_tenggara" name="batas_tenggara" class="form-control"/></td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="batas">Asumsi Penilaian sesuai dengan Basis Nilai</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Syarat pembiayaan</th>
                      <th>Kondisi penjualan</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_timur" name="batas_timur" class="form-control" /></td>
                      <td><input type="text" id="batas_tenggara" name="batas_tenggara" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Pengeluaran yg dilakukan segera setelah pembelian</th>
                      <th>Kondisi pasar</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="batas_timur" name="batas_timur" class="form-control" /></td>
                      <td><input type="text" id="batas_tenggara" name="batas_tenggara" class="form-control"/></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label for="dokumen_hak_tanah_print"><b>Jenis Properti</b></label>
                  <input type="text" id="dokumen_hak_tanah_print" name="dokumen_hak_tanah_print" class="form-control" />
                </div>
                <div class="form-group">
                    <label><b>Status Input Data dari Admin</b></label><br>
                    <div style="display: flex; gap: 10px;">
                        <div>
                            <input type="radio" id="draft" name="status_data" value="draft" checked>
                            <label for="draft">Draft</label>
                        </div>
                        <div>
                            <input type="radio" id="publish" name="status_data" value="publish">
                            <label for="publish">Publish</label>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          </div>

            <button class="btn btn-success btn-submit" type="submit">Submit</button>
          </form>
    </div>
    <!-- /Default Icons Wizard -->
  </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

@endsection
