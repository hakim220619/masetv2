@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Bangunan')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.scss',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.js',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
])
@endsection

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<h4>Edit Laporan Penilaian – Tanah Kosong</h4>
  <!-- Default -->
  <div class="row">
    <!-- Default Icons Wizard -->
    <div class="col-12 mb-4">
      <div class="wizard-icons wizard-icons-example mt-2">

        <div class="content">
          <form method="POST" action="{{ route('laporan-penilaian.update.tanah-kosong', $report->id) }}" enctype="multipart/form-data">
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
                      <td><input type="text" name="no_dokumen_kontrak" class="form-control" value="{{ old('no_dokumen_kontrak', $report->no_dokumen_kontrak) }}" /></td>
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
                    <select id="tujuan_penilaian" name="tujuan_penilaian" class="form-control" >
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
                @php
                    $pendekatan = old('pendekatan_penilaian', $report->pendekatan_penilaian ?? []);
                @endphp
                <div class="form-group">
                    <label><b>Pendekatan Penilaian</b></label>
                    <div>
                        <input type="checkbox" id="pendekatan_pasar" name="pendekatan_penilaian[]" value="Pendekatan Pasar (Market Approach)" {{ in_array('Pendekatan Pasar (Market Approach)', $pendekatan) ? 'checked' : '' }}>
                        <label for="pendekatan_pasar">Pendekatan Pasar (Market Approach)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="pendekatan_biaya" name="pendekatan_penilaian[]" value="Pendekatan Biaya (Cost Approach)" {{ in_array('Pendekatan Biaya (Cost Approach)', $pendekatan) ? 'checked' : '' }}>
                        <label for="pendekatan_biaya">Pendekatan Biaya (Cost Approach)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="pendekatan_pendapatan" name="pendekatan_penilaian[]" value="Pendekatan Pendapatan (Income Approach)" {{ in_array('Pendekatan Pendapatan (Income Approach)', $pendekatan) ? 'checked' : '' }}>
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
                    <input type="date" id="tanggal_penilaian" name="tanggal_penilaian" class="form-control" value="{{ old('tanggal_inspeksi', \Carbon\Carbon::parse($report->tanggal_penilaian)->format('Y-m-d')) }}">
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
                        <td><input type="text" id="tingkat_suku_bunga_suku_bunga_pinjaman" name="tingkat_suku_bunga_suku_bunga_pinjaman" class="form-control" value="{{ old('tingkat_suku_bunga_suku_bunga_pinjaman', $report->tingkat_suku_bunga_suku_bunga_pinjaman) }}"/></td>
                        <td><input type="text" id="sumberdata_suku_bunga_pinjaman" name="sumberdata_suku_bunga_pinjaman" class="form-control" value="{{ old('sumberdata_suku_bunga_pinjaman', $report->sumberdata_suku_bunga_pinjaman) }}"/></td>
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
                        <td><input type="text"name="admin_tim_penilai" class="form-control" value="{{ old('tim_penilai_qc', $report->admin_tim_penilai) }}"/></td>
                        <td><input type="text" name="tim_penilai_qc" class="form-control" value="{{ old('tim_penilai_qc', $report->tim_penilai_qc) }}"/></td>
                      </tr>
                      <tr>
                        <th>Penilai 1</th>
                        <th>Penilai 2</th>
                      </tr>
                      <tr>
                        <td><input type="text" name="penilai1_tim_penilai" class="form-control" value="{{ old('penilai1_tim_penilai', $report->penilai1_tim_penilai) }}"/></td>
                        <td><input type="text" name="penilai2_tim_penilai" class="form-control" value="{{ old('penilai2_tim_penilai', $report->penilai2_tim_penilai) }}"/></td>
                      </tr>
                      <tr>
                        <th>Reviewer</th>
                        <th>Penanggung Jawab (Penilai Publik)</th>
                      </tr>
                      <tr>
                        <td><input type="text" name="reviewer_tim_penilai" class="form-control" value="{{ old('penilai2_tim_penilai', $report->penilai2_tim_penilai) }}"/></td>
                        <td><input type="text" name="pj_tim_penilai" class="form-control" value="{{ old('penilai2_tim_penilai', $report->penilai2_tim_penilai) }}"/></td>
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
                        <td><input type="text" name="nama_pendamping_inpeksi" class="form-control" value="{{ old('nama_pendamping_inpeksi', $report->nama_pendamping_inpeksi) }}"/></td>
                        <td><input type="text" name="telepon_pendamping_inpeksi" class="form-control" value="{{ old('telepon_pendamping_inpeksi', $report->telepon_pendamping_inpeksi) }}"/></td>
                      </tr>
                      <tr>
                        <th>Status</th>
                      </tr>
                      <tr>
                        <td><input type="text" name="status_pendamping_inpeksi" class="form-control" value="{{ old('status_pendamping_inpeksi', $report->status_pendamping_inpeksi) }}" /></td>
                      </tr>
                      <tr>
                    </table>
                </div>
                @php
                    $kelengkapan = old('kelengkapan_dokumen', $report->kelengkapan_dokumen ?? []);
                @endphp

                <div class="form-group">
                    <label><b>Kelengkapan Dokumen Yang Diterima</b></label><br>

                    <div>
                        <input type="checkbox" id="sertifikat" name="kelengkapan_dokumen[]" value="Sertifikat/ Dokumen Hak Tanah"
                            {{ in_array('Sertifikat/ Dokumen Hak Tanah', $kelengkapan) ? 'checked' : '' }}>
                        <label for="sertifikat">Sertifikat/ Dokumen Hak Tanah</label>
                    </div>

                    <div>
                        <input type="checkbox" id="ijin_mendirikan" name="kelengkapan_dokumen[]" value="Ijin Mendirikan Bangunan"
                            {{ in_array('Ijin Mendirikan Bangunan', $kelengkapan) ? 'checked' : '' }}>
                        <label for="ijin_mendirikan">Ijin Mendirikan Bangunan</label>
                    </div>
                    <div>
                        <input type="checkbox" id="invoice" name="kelengkapan_dokumen[]" value="Invoice/ Pernyataan Kepemilikan"
                            {{ in_array('Invoice/ Pernyataan Kepemilikan', $kelengkapan) ? 'checked' : '' }}>
                        <label for="invoice">Invoice/ Pernyataan Kepemilikan</label>
                    </div>

                    <div>
                        <input type="checkbox" id="lainnya" name="kelengkapan_dokumen[]" value="Lainnya"
                            {{ in_array('Lainnya', $kelengkapan) ? 'checked' : '' }}>
                        <label for="lainnya">Lainnya</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="informasi_khusus"><b>Informasi Khusus</b></label><br>
                    <small class="form-text text-muted">
                        Informasi khusus terkait penugasan, kondisi objek, kendala inspeksi, dll (Sebagai pertimbangan reviewer)
                    </small>
                    <textarea id="informasi_khusus" name="informasi_khusus" class="form-control" rows="4">{{ old('informasi_khusus', $report->informasi_khusus) }}</textarea>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="batas">Batas batas</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Timur</th>
                      <th>Tenggara</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="batas_timur" class="form-control" value="{{ old('batas_timur', $master_report->batas_timur) }}"/></td>
                      <td><input type="text" name="batas_tenggara" class="form-control" value="{{ old('batas_tenggara', $master_report->batas_tenggara) }}" /></td>
                    </tr>
                    <tr>
                      <th>Selatan</th>
                      <th>Barat Daya</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="batas_selatan" class="form-control" value="{{ old('batas_selatan', $master_report->batas_selatan) }}" /></td>
                      <td><input type="text" name="batas_barat_daya" class="form-control" value="{{ old('batas_barat_daya', $master_report->batas_barat_daya) }}"/></td>
                    </tr>
                    <tr>
                      <th>Barat</th>
                      <th>Barat Laut</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="batas_barat" class="form-control" value="{{ old('batas_barat', $master_report->batas_barat) }}" /></td>
                      <td><input type="text" name="batas_barat_laut" class="form-control" value="{{ old('batas_barat_laut', $master_report->batas_barat_laut) }}"/></td>
                    </tr>
                    <tr>
                      <th>Utara</th>
                      <th>Timur Laut</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="batas_utara" class="form-control" value="{{ old('batas_utara', $master_report->batas_utara) }}" /></td>
                      <td><input type="text" name="batas_timur_laut" class="form-control" value="{{ old('batas_timur_laut', $master_report->batas_timur_laut) }}" /></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label for="Bentuk Kepemilikan"><b>Bentuk Kepemilikan</b></label>
                  <input type="text" id="bentuk_kepemilikan" name="bentuk_kepemilikan" class="form-control" placeholder="Bentuk Kepemilikan" value="{{ old('bentuk_kepemilikan', $master_report->bentuk_kepemilikan) }}">
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" >Dokumen Hak Tanah</label>
                  <div id="containerDokumen">
                    <div class="dokumen-set">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th>Jenis Dokumen Hak Tanah</th>
                            <th>Nomor</th>
                            <td style="width:4%" class="align-top" rowspan="10">
                              <button type="button" class="btn btn-sm btn-action" onclick="addTable()" style="color: rgb(0, 132, 255)">+</button><br>
                              <button type="button" class="btn btn-sm btn-action" onclick="removeTable(this)" style="color: rgb(0, 132, 255)">-</button><br>
                            </td>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Isi baris input seperti sebelumnya -->
                          <tr>
                            <td>
                              <select name="dokumen_hak_tanah_jenis[]" class="form-control" >
                                <option value="">- Select -</option>
                                <option value="Hak Milik">Hak Milik</option>
                                <option value="Hak Guna Bangunan">Hak Guna Bangunan</option>
                                <option value="Hak Guna Usaha">Hak Guna Usaha</option>
                                <option value="Hak Pakai">Hak Pakai</option>
                                <option value="Hak Milik Satuan Rumah Susun">Hak Milik Satuan Rumah Susun</option>
                                <option value="Girik">Girik</option>
                                <option value="Akad Jual Beli">Akad Jual Beli</option>
                                <option value="Perjanjian Pengikatan Jual Beli">Perjanjian Pengikatan Jual Beli</option>
                                <option value="Lain-lain">Lain-lain</option>
                              </select>
                            </td>
                            <td><input type="text" name="dokumen_hak_tanah_nomor[]" class="form-control" /></td>
                          </tr>
                          <tr>
                            <th>Nama Pemegang Hak</th>
                            <th>Tanggal Diterbitkan</th>
                          </tr>
                          <tr>
                            <td><input type="text" name="dokumen_hak_tanah_nama_pemegang_hak[]" class="form-control" /></td>
                            <td><input type="date" name="dokumen_hak_tanah_tgl_diterbitkan[]" class="form-control" /></td>
                          </tr>
                          <tr>
                            <th>Tanggal Berakhir</th>
                            <th>Nomor SU/GS</th>
                          </tr>
                          <tr>
                            <td><input type="date" name="dokumen_hak_tanah_tgl_berakhir[]" class="form-control" /></td>
                            <td><input type="text" name="dokumen_hak_tanah_nomor_su/sg[]" class="form-control" /></td>
                          </tr>
                          <tr>
                            <th>Tanggal SU/GS</th>
                            <th>Luas Tanah(m2)</th>
                          </tr>
                          <tr>
                            <td><input type="date" name="dokumen_hak_tanah_tgl_su/sg[]" class="form-control" /></td>
                            <td><input type="number" name="dokumen_hak_tanah_luas_tanah[]" class="form-control" /></td>
                          </tr>
                          <tr>
                            <th>Kantor Agraria</th>
                            <th>Kondisi Khusus (jika ada)</th>
                          </tr>
                          <tr>
                            <td><input type="text" name="dokumen_hak_tanah_kantor_agraria[]" class="form-control" /></td>
                            <td><input type="text" name="dokumen_hak_tanah_kondisi_khusus[]" class="form-control" /></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="dokumen_hak_tanah_print"><b>Dokumen Hak Tanah (print)</b></label><br>
                  <small class="form-text text-muted">
                      Informasi khusus terkait penugasan, kondisi objek, kendala inspeksi, dll (Sebagai pertimbangan reviewer)
                  </small>
                  <input type="text" id="dokumen_hak_tanah_print" name="dokumen_hak_tanah_print" class="form-control" value="{{ old('dokumen_hak_tanah_print', $master_report->dokumen_hak_tanah_print) }}" />
                </div>
                <div class="form-group">
                  <label for="keterangan_dokumen_tanah"><b>Keterangan Dokumen Tanah</b></label>
                  <textarea id="keterangan_dokumen_tanah" name="keterangan_dokumen_tanah" class="form-control" rows="4">{{ old('keterangan_dokumen_tanah', $master_report->keterangan_dokumen_tanah) }}</textarea>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="batas">Dokumen IMB</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Nomor IMB</th>
                      <th>Tanggal IMB</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="dokumen_imb_nomor" class="form-control" value="{{ old('dokumen_imb_nomor',$report->dokumen_imb_nomor) }}" /></td>
                      <td><input type="date" name="dokumen_imb_tgl_imb" class="form-control" value="{{ old('dokumen_imb_tgl_imb',$report->dokumen_imb_tgl_imb) }}"/></td>
                    </tr>
                    <tr>
                      <th>Diterbitkan Oleh</th>
                      <th>Status IMB</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="dokumen_imb_diterbitkan_oleh" class="form-control" value="{{ old('dokumen_imb_diterbitkan_oleh',$report->dokumen_imb_diterbitkan_oleh) }}" /></td>
                      <td><input type="text" name="dokumen_imb_status" class="form-control" value="{{ old('dokumen_imb_status',$report->dokumen_imb_status) }}" /></td>
                    </tr>
                    <tr>
                      <th>Nama Pemegang Ijin</th>
                      <th>Peruntukan Bangunan Sesuai IMB</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="dokumen_imb_nama_pemegang_ijin" class="form-control" value="{{ old('dokumen_imb_nama_pemegang_ijin',$report->dokumen_imb_nama_pemegang_ijin) }}" /></td>
                      <td><input type="text" name="dokumen_imb_peruntukan_bangunan" class="form-control" value="{{ old('dokumen_imb_peruntukan_bangunan',$report->dokumen_imb_peruntukan_bangunan) }}" /></td>
                    </tr>
                    <tr>
                      <th>Lokasi Bangunan Sesuai IMB</th>
                      <th>No. Sertifikat Tanah atas hak tersebut di IMB</th>
                    </tr>
                    <tr class="align-top">
                      <td><textarea name="dokumen_imb_lokasi_bangunan" class="form-control" rows="3">{{ old('dokumen_imb_lokasi_bangunan',$report->dokumen_imb_lokasi_bangunan) }}</textarea></td>
                      <td><input type="text" name="dokumen_imb_no_sertifikat_tanah" class="form-control" value="{{ old('dokumen_imb_no_sertifikat_tanah',$report->dokumen_imb_no_sertifikat_tanah) }}" /></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="form-label">Luas Bangunan Sesuai IMB</label>
                      </td>
                      <td></td>
                    </tr>
                    <tbody id="imb-bangunan-set">
                      <tr>
                        <th>Nama Bangunan</th>
                        <th>Luas(m²)</th>
                        <td style="width:4%" class="align-top" rowspan="2">
                          <button type="button" class="btn btn-sm btn-action" onclick="addRowImb()" style="color: rgb(0, 132, 255)">+</button><br>
                          <button type="button" class="btn btn-sm btn-action" onclick="removeRowImb(this)" style="color: rgb(0, 132, 255)">-</button>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="text" name="dokumen_imb_nama_bangunan[]" class="form-control" /></td>
                        <td><input type="number" name="dokumen_imb_luas[]" class="form-control" /></td>
                      </tr>
                    </tbody>
                    <tr>
                      <th>Keterangan</th>
                    </tr>
                    <tr>
                      <td><textarea type="text" name="dokumen_imb_keterangan" class="form-control" >{{ old('dokumen_imb_keterangan',$report->dokumen_imb_keterangan) }}</textarea></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label for="keterangan_dokumen_imb"><b>Keterangan Dokumen IMB</b></label>
                  <textarea id="keterangan_dokumen_imb" name="keterangan_dokumen_imb" class="form-control" rows="4">{{ old('keterangan_dokumen_imb',$report->keterangan_dokumen_imb) }}</textarea>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="lokasi_obyek">Peraturan Kawasan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Peruntukan Kawasan</th>
                      <th>Koefisien Dasar Bangunan(KDB)(%)</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="peraturan_kawasan_peruntukan_kawasan" class="form-control" value="{{ old('peraturan_kawasan_peruntukan_kawasan',$report->peraturan_kawasan_peruntukan_kawasan) }}"/></td>
                      <td><input type="number" name="peraturan_kawasan_kdb" class="form-control"  value="{{ old('peraturan_kawasan_kdb',$report->peraturan_kawasan_kdb) }}"/></td>
                    </tr>
                    <tr>
                      <th>Koefisien Lantai Bangunan(KLB)</th>
                      <th>Garis Sempadan Bangunan(GSB)(meter)</th>
                    </tr>
                    <tr>
                      <td><input type="number" name="peraturan_kawasan_klb" class="form-control" value="{{ old('peraturan_kawasan_klb', $report->peraturan_kawasan_klb) }}" /></td>
                      <td><input type="number" name="peraturan_kawasan_gsb" class="form-control" value="{{ old('peraturan_kawasan_gsb', $report->peraturan_kawasan_gsb) }}"/></td>
                    </tr>
                    <tr>
                      <th>Ketinggian(lantai)</th>
                      <th>Terkena Rencana Jalan</th>
                    </tr>
                    <tr>
                      <td><input type="number" name="peraturan_kawasan_ketinggian" class="form-control" value="{{ old('peraturan_kawasan_ketinggian', $report->peraturan_kawasan_ketinggian) }}" /></td>
                      <td><input type="text" name="peraturan_kawasan_terkena_rencana_jalan" class="form-control" value="{{ old('peraturan_kawasan_terkena_rencana_jalan', $report->peraturan_kawasan_terkena_rencana_jalan) }}"/></td>
                    </tr>
                    <tr>
                        <th>Penjelasan</th>
                    </tr>
                    <tr>
                        <td><textarea type="text" name="peraturan_kawasan_penjelasan" class="form-control" >{{ old('peraturan_kawasan_penjelasan', $report->peraturan_kawasan_penjelasan) }}</textarea></td>
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
                      <td><input type="text" name="analisis_data_hbu" class="form-control" value="{{ old('analisis_data_hbu',$master_report->analisis_data_hbu) }}"/></td>
                      <td><input type="text" name="analisis_data_pendekatan_penilaian" class="form-control" value="{{ old('analisis_data_hbu',$master_report->analisis_data_hbu) }}"/></td>
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
                      <td><input type="text" name="asumsi_penilaian_syarat_pembiayaan" class="form-control" value="{{ old('asumsi_penilaian_syarat_pembiayaan',$master_report->asumsi_penilaian_syarat_pembiayaan) }}" /></td>
                      <td><input type="text" name="asumsi_penilaian_kondisi_penjualan" class="form-control" value="{{ old('asumsi_penilaian_kondisi_penjualan',$master_report->asumsi_penilaian_kondisi_penjualan) }}"/></td>
                    </tr>
                    <tr>
                      <th>Pengeluaran yg dilakukan segera setelah pembelian</th>
                      <th>Kondisi pasar</th>
                    </tr>
                    <tr>
                      <td><input type="text" name="asumsi_penilaian_pengeluaran" class="form-control" value="{{ old('asumsi_penilaian_pengeluaran',$master_report->asumsi_penilaian_pengeluaran) }}"/></td>
                      <td><input type="text" name="asumsi_penilaian_kondisi_pasar" class="form-control" value="{{ old('asumsi_penilaian_pengeluaran',$master_report->asumsi_penilaian_pengeluaran) }}" /></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label for="jenis_properti"><b>Jenis Properti</b></label>
                  <input type="text" id="jenis_properti" name="jenis_properti" class="form-control" value="{{ old('jenis_properti',$master_report->jenis_properti) }}" />
                </div>
                <div class="form-group">
                  <label for="keterangan_dasar_nilai_tabel_analisis"><b>Keterangan Dasar Nilai pada Tabel Analisis</b></label>
                  <input type="text" id="keterangan_dasar_nilai_tabel_analisis" name="keterangan_dasar_nilai_tabel_analisis" class="form-control" value="{{ old('keterangan_dasar_nilai_tabel_analisis',$master_report->keterangan_dasar_nilai_tabel_analisis) }}" />
                </div>
                <div class="form-group">
                  <label for="koordinat"><b>Koordinat Obyek</b></label>
                  <div>
                      <input type="text" id="koordinat" name="koordinat" class="form-control"
                          placeholder="jl sukasari kecamatan baleendah bandung" />
                  </div>
                  <div id="map" style="height: 400px; width: 100%;"></div>
                  <input type="text" id="lat" name="lat" class="form-control"
                      placeholder="-8.9897878" hidden />
                  <input type="text" id="long" name="long" class="form-control"
                      placeholder="89.8477748" hidden />
                </div>
                <div class="form-group">
                  <label><b>Foto Tampak Depan</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                    Upload foto
                    </i>
                  </small>
                  <input type="file" class="form-control" name="foto_tampak_depan">
                </div>
                <div class="form-group">
                  <label><b>Foto Tampak Sisi Kiri</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                    Upload foto
                    </i>
                  </small>
                  <input type="file" class="form-control" name="foto_tampak_sisi_kiri">
                </div>
                <div class="form-group">
                  <label><b>Foto Tampak Sisi Kanan</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                    Upload foto
                    </i>
                  </small>
                  <input type="file" class="form-control" name="foto_tampak_sisi_kanan">
                </div>
                <div class="form-group">
                  <label><b>Foto Lainnya</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                    Upload foto
                    </i>
                  </small>
                  <input type="file" class="form-control" name="foto_lainnya">
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="Nilai Perolehan">Nilai Perolehan / NJOP / PBB</label>
                  <table class="table table-bordered" id="njopTable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Tahun</th>
                              <th>Nilai Perolehan / NJOP (Rp)</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if(old('njop_tahun', $master_report->njop_tahun))
                            @foreach(old('njop_tahun', $master_report->njop_tahun) as $index => $tahun)
                                <tr>
                                    <td class="row-number">{{ $index + 1 }}</td>
                                    <td>
                                        <input type="number" name="njop_tahun[]" class="form-control" value="{{ $tahun }}" />
                                    </td>
                                    <td>
                                        <input type="number" name="njop_nilai_perolehan[]" class="form-control"
                                               value="{{ old('njop_nilai_perolehan.'.$index, isset($master_report->njop_nilai_perolehan[$index]) ? $master_report->njop_nilai_perolehan[$index] : '') }}" />
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-action" onclick="addRowNjop()" style="color: rgb(0, 132, 255)">+</button><br>
                                        <button type="button" class="btn btn-sm btn-action" onclick="removeRowNjop(this)" style="color: rgb(0, 132, 255)">-</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="row-number">1</td>
                                <td>
                                    <input type="number" name="njop_tahun[]" class="form-control" />
                                </td>
                                <td>
                                    <input type="number" name="njop_nilai_perolehan[]" class="form-control" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-action" onclick="addRowNjop()" style="color: rgb(0, 132, 255)">+</button><br>
                                    <button type="button" class="btn btn-sm btn-action" onclick="removeRowNjop(this)" style="color: rgb(0, 132, 255)">-</button>
                                </td>
                            </tr>
                        @endif
                      </tbody>
                  </table>
                </div>
                <div class="form-group">
                  <label for="row_jalan"><b>Row Jalan(m)</b></label><br>
                  <small class="form-text text-muted">
                      <i>
                        Dalam satuan meter
                      </i>
                  </small>
                  <input type="number" id="row_jalan" name="row_jalan" class="form-control" value="{{ old('row_jalan',$master_report->row_jalan) }}"/>
                </div>
                <div class="form-group">
                  <label for="tipe_jalan"><b>Tipe Jalan</b></label>
                  <input type="text" id="tipe_jalan" name="tipe_jalan" class="form-control" value="{{ old('tipe_jalan',$master_report->tipe_jalan) }}"/>
                </div>
                <div class="form-group">
                  <label for="kapasitas_jalan"><b>Kapasistas Jalan</b></label>
                  <input type="text" id="kapasitas_jalan" name="kapasitas_jalan" class="form-control" value="{{ old('kapasitas_jalan',$master_report->kapasitas_jalan) }}" />
                </div>
                <div class="form-group">
                  <label for="penggunaan_lahan"><b>Penggunaan Lahan Lingkungan Eksisting</b></label>
                  <select id="penggunaan_lahan" name="penggunaan_lahan" class="form-control" >
                      <option value="">- Select -</option>
                      <option value="perumahan_pemukiman" {{ old('penggunaan_lahan',$master_report->penggunaan_lahan) == "perumahan_pemukiman" ? 'selected' : '' }}>Perumahan / Pemukiman</option>
                      <option value="campuran" {{ old('penggunaan_lahan',$master_report->penggunaan_lahan) == "campuran" ? 'selected' : '' }}>Campuran</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="posisi_obyek"><b>Letak / Posisi Obyek</b></label>
                  <select id="posisi_obyek" name="posisi_obyek" class="form-control" >
                      <option value="">- Select -</option>
                      <option value="Kuldesak" {{ old('posisi_obyek',$master_report->posisi_obyek) == "Kuldesak" ? 'selected' : '' }}>Kuldesak</option>
                      <option value="Interior" {{ old('posisi_obyek',$master_report->posisi_obyek) == "Interior" ? 'selected' : '' }}>Interior</option>
                      <option value="Tusuk Sate" {{ old('posisi_obyek',$master_report->posisi_obyek) == "Tusuk Sate" ? 'selected' : '' }}>Tusuk Sate</option>
                      <option value="Sudut" {{ old('posisi_obyek',$master_report->posisi_obyek) == "Sudut" ? 'selected' : '' }}>Sudut (Corner)</option>
                      <option value="Key" {{ old('posisi_obyek',$master_report->posisi_obyek) == "Key" ? 'selected' : '' }}>Key</option>
                      <option value="Flag" {{ old('posisi_obyek',$master_report->posisi_obyek) == "Flag" ? 'selected' : '' }}>Flag</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="lokasi_aset"><b>Lokasi Aset</b></label><br>
                  <small class="form-text text-muted">
                      <i>
                        Untuk menggambarkan kondisi Aset pada kawasan Ex. Perumahan, Ruko, Industri
                      </i>
                  </small>
                  <select id="lokasi_aset" name="lokasi_aset" class="form-control" >
                      <option value="">- Select -</option>
                      <option value="Depan" {{ old('lokasi_aset',$master_report->lokasi_aset) == "Depan" ? 'selected' : '' }}>Depan</option>
                      <option value="Tengah" {{ old('lokasi_aset',$master_report->lokasi_aset) == "Tengah" ? 'selected' : '' }}>Tengah</option>
                      <option value="Belakang" {{ old('lokasi_aset',$master_report->lokasi_aset) == "Belakang" ? 'selected' : '' }}>Belakang</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="bentuk_tanah"><b>Bentuk Tanah</b></label>
                  <select id="bentuk_tanah" name="bentuk_tanah" class="form-control" >
                      <option value="">- Select -</option>
                      <option value="Beraturan" {{ old('bentuk_tanah',$master_report->bentuk_tanah) == "Beraturan" ? 'selected' : '' }}>Beraturan</option>
                      <option value="Tidak Beraturan" {{ old('bentuk_tanah',$master_report->bentuk_tanah) == "Tidak Beraturan" ? 'selected' : '' }}>Tidak Beraturan</option>
                      <option value="Persegipanjang" {{ old('bentuk_tanah',$master_report->bentuk_tanah) == "Persegipanjang" ? 'selected' : '' }}>Persegipanjang</option>
                      <option value="Persegiempat" {{ old('bentuk_tanah',$master_report->bentuk_tanah) == "Persegiempat" ? 'selected' : '' }}>Persegiempat</option>
                      <option value="Lainnya" {{ old('bentuk_tanah',$master_report->bentuk_tanah) == "Lainnya" ? 'selected' : '' }}>Lainnya</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="lebar_muka_tanah"><b>Lebar Muka Tanah(m)</b></label><br>
                  <small class="form-text text-muted">
                      <i>
                        Dalam satuan meter
                      </i>
                  </small>
                  <input type="number" name="lebar_muka_tanah" id="lebar_muka_tanah" class="form-control" value="{{ old('lebar_muka_tanah',$master_report->lebar_muka_tanah) }}">
                </div>
                <div class="form-group">
                  <label for="ketinggian_muka_jalan"><b>Ketinggian Tanah dari Muka Jalan (m)</b></label><br>
                  <small class="form-text text-muted">
                      <i>
                        Dalam satuan meter
                      </i>
                  </small>
                  <input type="number" name="ketinggian_muka_jalan" id="ketinggian_muka_jalan" class="form-control" value="{{ old('ketinggian_muka_jalan',$master_report->ketinggian_muka_jalan) }}">
                </div>
                <div class="form-group">
                  <label for="topografi"><b>Topografi / Elevasi</b></label>
                  <select id="topografi" name="topografi" class="form-control" >
                      <option value="">- Select -</option>
                      <option value="Rata" {{ old('topografi',$master_report->topografi) == "Rata" ? 'selected' : '' }}>Rata</option>
                      <option value="Bergelombang" {{ old('topografi',$master_report->topografi) == "Bergelombang" ? 'selected' : '' }}>Bergelombang</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tingkat_hunian"><b>Tingkat Hunian(%)</b></label><br>
                  <small class="form-text text-muted">
                      <i>
                        Dalam satuan meter
                      </i>
                  </small>
                  <input type="number" name="tingkat_hunian" id="tingkat_hunian" class="form-control" value="{{ old('tingkat_hunian',$master_report->tingkat_hunian) }}">
                </div>
                @php
                    $kondisi_lingkungan = old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? []);
                @endphp
                <div class="form-group">
                  <label><b>Kondisi Lingkungan Khusus</b></label><br>
                  <input type="checkbox" id="bebas_banjir" name="kondisi_lingkungan_khusus[]" value="Bebas Banjir" {{ in_array('Bebas Banjir', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="bebas_banjir">Bebas Banjir</label> <br>
                  <input type="checkbox" id="banjir_musiman" name="kondisi_lingkungan_khusus[]" value="Banjir Musiman" {{ in_array('Banjir Musiman', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="banjir_musiman">Banjir Musiman</label> <br>
                  <input type="checkbox" id="rawan_banjir" name="kondisi_lingkungan_khusus[]" value="Rawan Banjir" {{ in_array('Rawan Banjir', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="rawan_banjir">Rawan Banjir</label> <br>
                  <input type="checkbox" id="rawan_kebakaran" name="kondisi_lingkungan_khusus[]" value="Rawan Kebakaran" {{ in_array('Rawan Kebakaran', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="rawan_kebakaran">Rawan Kebakaran</label> <br>
                  <input type="checkbox" id="rawan_bencana_alam" name="kondisi_lingkungan_khusus[]" value="Rawan Bencana Alam" {{ in_array('Rawan Bencana Alam', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="rawan_bencana_alam">Rawan Bencana Alam</label> <br>
                  <input type="checkbox" id="rawan_huru_hara" name="kondisi_lingkungan_khusus[]" value="Rawan Huru-Hara" {{ in_array('Rawan Huru-Hara', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="rawan_huru_hara">Rawan Huru-Hara</label> <br>
                  <input type="checkbox" id="Dekat Kuburan" name="kondisi_lingkungan_khusus[]" value="Dekat Kuburan" {{ in_array('Dekat Kuburan', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="Dekat Kuburan">Dekat Kuburan</label> <br>
                  <input type="checkbox" id="dekat_sekolahan" name="kondisi_lingkungan_khusus[]" value="Dekat Sekolahan/Pasar" {{ in_array('Dekat Sekolahan/Pasar', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="dekat_sekolahan">Dekat Sekolahan/Pasar</label> <br>
                  <input type="checkbox" id="lokasi_tusuk_sate" name="kondisi_lingkungan_khusus[]" value="Lokasi Tusuk Sate" {{ in_array('Lokasi Tusuk Sate', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="lokasi_tusuk_sate">Lokasi Tusuk Sate</label> <br>
                  <input type="checkbox" id="dekat_tempat_ibadah" name="kondisi_lingkungan_khusus[]" value="Dekat Tempat Ibadah" {{ in_array('Dekat Tempat Ibadah', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="dekat_tempat_ibadah">Dekat Tempat Ibadah</label> <br>
                  <input type="checkbox" id="dekat_kumpulan_bangunan_liar" name="kondisi_lingkungan_khusus[]" value="Dekat Kumpulan Bangunan Liar" {{ in_array('Dekat Kumpulan Bangunan Liar', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="dekat_kumpulan_bangunan_liar">Dekat Kumpulan Bangunan Liar</label> <br>
                  <input type="checkbox" id="dekat_jurang" name="kondisi_lingkungan_khusus[]" value="Dekat Jurang/ Rawan Longsor" {{ in_array('Dekat Jurang/ Rawan Longsor', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="dekat_jurang">Dekat Jurang/ Rawan Longsor</label> <br>
                  <input type="checkbox" id="dekat_pasar" name="kondisi_lingkungan_khusus[]" value="Dekat Pasar" {{ in_array('Dekat Pasar', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="dekat_pasar">Dekat Pasar</label> <br>
                  <input type="checkbox" id="dekat_tegangan_tinggi" name="kondisi_lingkungan_khusus[]" value="Dekat Tegangan Tinggi" {{ in_array('Dekat Tegangan Tinggi', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="dekat_tegangan_tinggi">Dekat Tegangan Tinggi</label> <br>
                  <input type="checkbox" id="dekat_terminal" name="kondisi_lingkungan_khusus[]" value="Dekat Terminal"{{ in_array('Dekat Terminal', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="dekat_terminal">Dekat Terminal</label> <br>
                  <input type="checkbox" id="dekat_saluran_irigasi" name="kondisi_lingkungan_khusus[]" value="Dekat Saluran Irigasi" {{ in_array('Dekat Saluran Irigasi', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="dekat_saluran_irigasi">Dekat Saluran Irigasi</label> <br>
                  <input type="checkbox" id="lain_lain" name="kondisi_lingkungan_khusus[]" value="Lain-lain" {{ in_array('Lain-lain', old('kondisi_lingkungan_khusus', $master_report->kondisi_lingkungan_khusus ?? [])) ? 'checked' : '' }}>
                  <label for="lain_lain">Lain-lain</label> <br>
                </div>
                <div class="form-group">
                  <label for="keterangan_tambahan_lainnya"><b>Keterangan Tambahan Lainnya</b></label>
                  <textarea id="keterangan_tambahan_lainnya" name="keterangan_tambahan_lainnya" class="form-control" rows="4">{{ old('keterangan_tambahan_lainnya',$master_report->keterangan_tambahan_lainnya) }}</textarea>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="lokasi_obyek">Karakteristik Ekonomi (Jika objek yang dinilai adalah Properti Komersial)</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Kualitas Pendapatan</th>
                      <th>Biaya Operasional</th>
                    </tr>
                    <tr>
                      <td>
                        <select id="karakteristik_ekonomi_kualitas_pendapatan" name="karakteristik_ekonomi_kualitas_pendapatan" class="form-control" >
                            <option value="">- Select -</option>
                            <option value="Rendah" {{ old('karakteristik_ekonomi_kualitas_pendapatan', $master_report->karakteristik_ekonomi_kualitas_pendapatan) == "Rendah" ? 'selected' : '' }}>Rendah</option>
                            <option value="Sedang" {{ old('karakteristik_ekonomi_kualitas_pendapatan', $master_report->karakteristik_ekonomi_kualitas_pendapatan) == "Sedang" ? 'selected' : '' }}>Sedang</option>
                            <option value="Tinggi" {{ old('karakteristik_ekonomi_kualitas_pendapatan', $master_report->karakteristik_ekonomi_kualitas_pendapatan) == "Tinggi" ? 'selected' : '' }}>Tinggi</option>
                        </select>
                      </td>
                      <td>
                        <select id="karakteristik_ekonomi_biaya_operasional" name="karakteristik_ekonomi_biaya_operasional" class="form-control" >
                            <option value="">- Select -</option>
                            <option value="Rendah" {{ old('karakteristik_ekonomi_biaya_operasional',$master_report->karakteristik_ekonomi_biaya_operasional) == "Rendah" ? 'selected' : '' }}>Rendah</option>
                            <option value="Normal" {{ old('karakteristik_ekonomi_biaya_operasional',$master_report->karakteristik_ekonomi_biaya_operasional) == "Normal" ? 'selected' : '' }}>Normal</option>
                            <option value="Tinggi" {{ old('karakteristik_ekonomi_biaya_operasional',$master_report->karakteristik_ekonomi_biaya_operasional) == "Tinggi" ? 'selected' : '' }}>Tinggi</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Ketentuan Sewa</th>
                      <th>Manajemen</th>
                    </tr>
                    <tr>
                      <td>
                        <select id="karakteristik_ekonomi_ketentuan_sewa" name="karakteristik_ekonomi_ketentuan_sewa" class="form-control" >
                            <option value="">- Select -</option>
                            <option value="Mudah" {{ old('karakteristik_ekonomi_ketentuan_sewa',$master_report->karakteristik_ekonomi_ketentuan_sewa) == "Mudah" ? 'selected' : '' }}>Mudah</option>
                            <option value="Normal" {{ old('karakteristik_ekonomi_ketentuan_sewa',$master_report->karakteristik_ekonomi_ketentuan_sewa) == "Normal" ? 'selected' : '' }}>Normal</option>
                            <option value="Ketat" {{ old('karakteristik_ekonomi_ketentuan_sewa',$master_report->karakteristik_ekonomi_ketentuan_sewa) == "Ketat" ? 'selected' : '' }}>Ketat</option>
                        </select>
                      </td>
                      <td>
                        <select id="karakteristik_ekonomi_manajemen" name="karakteristik_ekonomi_manajemen" class="form-control" >
                            <option value="">- Select -</option>
                            <option value="Kecil" {{ old('karakteristik_ekonomi_manajemen',$master_report->karakteristik_ekonomi_manajemen) == "Kecil" ? 'selected' : '' }}>Kecil</option>
                            <option value="Menengah" {{ old('karakteristik_ekonomi_manajemen',$master_report->karakteristik_ekonomi_manajemen) == "Menengah" ? 'selected' : '' }}>Menengah</option>
                            <option value="Besar" {{ old('karakteristik_ekonomi_manajemen',$master_report->karakteristik_ekonomi_manajemen) == "Besar" ? 'selected' : '' }}>Besar</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Bauran Penyewa</th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>
                        <select id="karakteristik_ekonomi_bauran_penyewa" name="karakteristik_ekonomi_bauran_penyewa" class="form-control" >
                            <option value="">- Select -</option>
                            <option value="Terbatas" {{ old('karakteristik_ekonomi_bauran_penyewa',$master_report->karakteristik_ekonomi_bauran_penyewa) == "Terbatas" ? 'selected' : '' }}>Terbatas</option>
                            <option value="Normal" {{ old('karakteristik_ekonomi_bauran_penyewa',$master_report->karakteristik_ekonomi_bauran_penyewa) == "Normal" ? 'selected' : '' }}>Normal</option>
                            <option value="Beragam" {{ old('karakteristik_ekonomi_bauran_penyewa',$master_report->karakteristik_ekonomi_bauran_penyewa) == "Beragam" ? 'selected' : '' }}>Beragam</option>
                        </select>
                      </td>
                      <td>
                      </td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label">Komponen Non-Realty dalam Penjualan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>FFE</th>
                      <th>Mesin</th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" id="komponen_non_realty_ffe" name="komponen_non_realty_ffe" class="form-control" value="{{ old('komponen_non_realty_ffe',$master_report->komponen_non_realty_ffe) }}"/>
                      </td>
                      <td>
                        <input type="text" id="komponen_non_realty_mesin" name="komponen_non_realty_mesin" class="form-control" value="{{ old('komponen_non_realty_mesin',$master_report->komponen_non_realty_mesin) }}"/>
                      </td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label">Gambaran Objek terhadap Wilayah dan Lingkungan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Kota. Nama Pusat Kota / Jarak</th>
                      <th>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Ekonomi terdekat (Pasar Mall). Nama Pusat Ekonomi / Jarak
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" name="gambaran_objek_dari_pusat_kota" class="form-control" value="{{ old('gambaran_objek_dari_pusat_kota',$master_report->gambaran_objek_dari_pusat_kota) }}" />
                      </td>
                      <td>
                        <input type="text" name="gambaran_objek_dari_pusat_ekonomi" class="form-control" value="{{ old('gambaran_objek_dari_pusat_ekonomi',$master_report->gambaran_objek_dari_pusat_ekonomi) }}" />
                      </td>
                    </tr>
                    <tr>
                      <th>Jarak dengan CBD (Pusat Ekonomi) dari Jalan Utama terdekat. Nama Jalan / Jarak</th>
                      <th>Kondisi Lingkungan Khusus yang mempengaruhi Nilai
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" name="gambaran_objek_dari_jalan_utama" class="form-control" value="{{ old('gambaran_objek_dari_jalan_utama',$master_report->gambaran_objek_dari_jalan_utama) }}" />
                      </td>
                      <td>
                        <input type="text" name="gambaran_objek_kondisi_lingkungan_khusus" class="form-control" value="{{ old('gambaran_objek_kondisi_lingkungan_khusus',$master_report->gambaran_objek_kondisi_lingkungan_khusus) }}" />
                      </td>
                    </tr>
                    <tr>
                      <th>Faktor View (Pemandangan) untuk Properti yang faktor view dimungkinkan sangat berpengaruh pada nilai (contoh: apartemen, vila, dll)</th>
                      <th>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" name="gambaran_objek_faktor_view" class="form-control" value="{{ old('gambaran_objek_faktor_view',$master_report->gambaran_objek_faktor_view) }}" />
                      </td>
                      <td>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label for="penggunaan_tanah_saat_ini"><b>Penggunaan Tanah Saat Ini</b></label>
                  <input type="text" id="penggunaan_tanah_saat_ini" name="penggunaan_tanah_saat_ini" class="form-control" value="{{ old('penggunaan_tanah_saat_ini',$master_report->penggunaan_tanah_saat_ini) }}"/>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label">Sarana Pelengkap PAGAR - BUT MAPPI</label>
                  <table class="table table-borderless">
                    <tr>
                      <td>
                        <label class="form-label">Tipe Material</label>
                      </td>
                      <td></td>
                    </tr>
                    <tbody id="pagar-but-set">
                      <tr>
                        <th>Sarana Pelengkap Pagar</th>
                        <th>Bobot(%)</th>
                        <td style="width:4%" class="align-top" rowspan="4">
                          <button type="button" class="btn btn-sm btn-action" onclick="addRowPagar()" style="color: rgb(0, 132, 255)">+</button><br>
                          <button type="button" class="btn btn-sm btn-action" onclick="removeRowPagar(this)" style="color: rgb(0, 132, 255)">-</button>
                       </td>
                      </tr>
                      <tr>
                        <td>
                            <select name="pagar_sarana_pelengkap[]" class="form-control">
                                <option value="">- Select -</option>
                                @foreach(['Rusak', 'Kurang Baik', 'Cukup', 'Baik', 'Baik Sekali', 'Baru'] as $option)
                                    <option value="{{ $option }}">
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="pagar_bobot[]" class="form-control" placeholder="100"
                                 />
                        </td>
                      </tr>
                      <tr>
                          <th>Adjustment Lain</th>
                          <th></th>
                      </tr>
                      <tr>
                          <td>
                              <input type="number" name="pagar_adjusment_lain[]" class="form-control"
                                  />
                          </td>
                          <td></td>
                      </tr>
                    </tbody>
                    <tr>
                      <th>Umur Ekonomis (tahun)</th>
                      <th>Kondisi Sarana Secara Visual</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="pagar_umur_ekonomis" name="pagar_umur_ekonomis" class="form-control" value="{{ old('pagar_umur_ekonomis') }}" /></td>
                      <td>
                        <select id="pagar_kondisi_sarana_secara_visual" name="pagar_kondisi_sarana_secara_visual" class="form-control" >
                          <option value="">- Select -</option>
                          <option value="Rusak" {{ old('pagar_kondisi_sarana_secara_visual') == "Rusak" ? 'selected' : '' }}>Rusak</option>
                          <option value="Kurang Baik" {{ old('pagar_kondisi_sarana_secara_visual') == "Kurang Baik" ? 'selected' : '' }}>Kurang Baik</option>
                          <option value="Cukup" {{ old('pagar_kondisi_sarana_secara_visual') == "Cukup" ? 'selected' : '' }}>Cukup</option>
                          <option value="Baik" {{ old('pagar_kondisi_sarana_secara_visual') == "Baik" ? 'selected' : '' }}>Baik</option>
                          <option value="Baik Sekali" {{ old('pagar_kondisi_sarana_secara_visual') == "Baik Sekali" ? 'selected' : '' }}>Baik Sekali</option>
                          <option value="Baru" {{ old('pagar_kondisi_sarana_secara_visual') == "Baru" ? 'selected' : '' }}>Baru</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Tahun Dibangun
                      </th>
                      <th>Sumber Informasi Tahun Dibangun</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="pagar_tahun_dibangun" name="pagar_tahun_dibangun" class="form-control" value="{{ old('pagar_tahun_dibangun', $report->pagar_tahun_dibangun) }}" /></td>
                      <td>
                        <div>
                          <input type="checkbox" id="pagar_tahun_dibangun_keterangan_pendamping" name="pagar_sumber_informasi_tahun_dibangun[]" value="Keterangan pendamping lokasi / pemilik">
                          <label for="pagar_tahun_dibangun_keterangan_pendamping">Keterangan pendamping lokasi / pemilik</label>
                        </div>
                        <div>
                          <input type="checkbox" id="pagar_tahun_dibangun_imb" name="pagar_sumber_informasi_tahun_dibangun[]" value="IMB">
                          <label for="pagar_tahun_dibangun_imb">IMB</label>
                        </div>
                        <div>
                          <input type="checkbox" id="pagar_tahun_dibangun_pengamatan_visual" name="pagar_sumber_informasi_tahun_dibangun[]" value="Pengamatan Visual">
                          <label for="pagar_tahun_dibangun_pengamatan_visual">Pengamatan Visual</label>
                        </div>
                        <div>
                          <input type="checkbox" id="pagar_tahun_dibangun_keterangan_lingkungan" name="pagar_sumber_informasi_tahun_dibangun[]" value="Keterangan Lingkungan">
                          <label for="pagar_tahun_dibangun_keterangan_lingkungan">Keterangan Lingkungan</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Tahun Renovasi
                      </th>
                      <th>Sumber Informasi Tahun Renovasi</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="pagar_tahun_renovasi" name="pagar_tahun_renovasi" class="form-control" value="{{ old('pagar_tahun_renovasi', $report->pagar_tahun_renovasi) }}" /></td>
                      <td>
                        <div>
                          <input type="checkbox" id="pagar_tahun_renovasi_keterangan_pendamping" name="pagar_sumber_informasi_tahun_renovasi[]" value="Keterangan pendamping lokasi / pemilik">
                          <label for="pagar_tahun_renovasi_keterangan_pendamping">Keterangan pendamping lokasi / pemilik</label>
                        </div>
                        <div>
                          <input type="checkbox" id="pagar_tahun_renovasi_imb" name="pagar_sumber_informasi_tahun_renovasi[]" value="IMB">
                          <label for="pagar_tahun_renovasi_imb">IMB</label>
                        </div>
                        <div>
                          <input type="checkbox" id="pagar_tahun_renovasi_pengamatan_visual" name="pagar_sumber_informasi_tahun_renovasi[]" value="Pengamatan Visual">
                          <label for="pagar_tahun_renovasi_pengamatan_visual">Pengamatan Visual</label>
                        </div>
                        <div>
                          <input type="checkbox" id="pagar_tahun_renovasi_keterangan_lingkungan" name="pagar_sumber_informasi_tahun_renovasi[]" value="Keterangan Lingkungan">
                          <label for="pagar_tahun_renovasi_keterangan_lingkungan">Keterangan Lingkungan</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Jenis Renovasi</th>
                      <th>Bobot Renovasi (%)</th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" id="pagar_jenis_renovasi" name="pagar_jenis_renovasi" class="form-control" value="{{ old('pagar_jenis_renovasi') }}"/>
                      </td>
                      <td><input type="number" id="pagar_bobot_renovasi" name="pagar_bobot_renovasi" class="form-control" value="{{ old('pagar_bobot_renovasi') }}" /></td>
                    </tr>
                    <tr>
                      <th>Luas Bangunan</th>
                      <th></th>
                    </tr>
                    <tr>
                      <td><input type="number" id="pagar_luas_bangunan" name="pagar_luas_bangunan" class="form-control" value="{{ old('pagar_luas_bangunan') }}" /></td>
                      <td></td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label">Sarana Pelengkap PERKERASAN - BUT MAPPI</label>
                  <table class="table table-borderless">
                    <tr>
                      <td>
                        <label class="form-label">Tipe Material</label>
                      </td>
                      <td></td>
                    </tr>
                    <tbody id="perkerasan-but-set">
                      <tr>
                        <th>Sarana Pelengkap Perkerasan</th>
                        <th>Bobot(%)</th>
                        <td style="width:4%" class="align-top" rowspan="4">
                          <button type="button" class="btn btn-sm btn-action" onclick="addRowPerkerasan()" style="color: rgb(0, 132, 255)">+</button><br>
                          <button type="button" class="btn btn-sm btn-action" onclick="removeRowPerkerasan(this)" style="color: rgb(0, 132, 255)">-</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <select name="perkerasan_sarana_pelengkap[]" class="form-control" >
                            <option value="">- Select -</option>
                            <option value="Rusak" {{ old('perkerasan_sarana_pelengkap') == "Rusak" ? 'selected' : '' }}>Rusak</option>
                            <option value="Kurang Baik" {{ old('perkerasan_sarana_pelengkap') == "Kurang Baik" ? 'selected' : '' }}>Kurang Baik</option>
                            <option value="Cukup" {{ old('perkerasan_sarana_pelengkap') == "Cukup" ? 'selected' : '' }}>Cukup</option>
                            <option value="Baik" {{ old('perkerasan_sarana_pelengkap') == "Baik" ? 'selected' : '' }}>Baik</option>
                            <option value="Baik Sekali" {{ old('perkerasan_sarana_pelengkap') == "Baik Sekali" ? 'selected' : '' }}>Baik Sekali</option>
                            <option value="Baru" {{ old('perkerasan_sarana_pelengkap') == "Baru" ? 'selected' : '' }}>Baru</option>
                          </select>
                        </td>
                        <td><input type="number" name="perkerasan_bobot[]" class="form-control" placeholder="100" /></td>
                      </tr>
                      <tr>
                        <th>Adjustment Lain</th>
                        <th></th>
                      </tr>
                      <tr>
                        <td><input type="number" name="perkerasan_adjustment_lain[]" class="form-control" /></td>
                        <td></td>
                      </tr>
                    </tbody>
                    <tr>
                      <th>Umur Ekonomis (tahun)</th>
                      <th>Kondisi Sarana Secara Visual</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="perkerasan_umur_ekonomis" name="perkerasan_umur_ekonomis" class="form-control" value="{{ old('perkerasan_umur_ekonomis') }}" /></td>
                      <td>
                        <select id="perkerasan_kondisi_sarana_secara_visual" name="perkerasan_kondisi_sarana_secara_visual" class="form-control" >
                          <option value="">- Select -</option>
                          <option value="Rusak" {{ old('perkerasan_kondisi_sarana_secara_visual') == "Rusak" ? 'selected' : '' }}>Rusak</option>
                          <option value="Kurang Baik" {{ old('perkerasan_kondisi_sarana_secara_visual') == "Kurang Baik" ? 'selected' : '' }}>Kurang Baik</option>
                          <option value="Cukup" {{ old('perkerasan_kondisi_sarana_secara_visual') == "Cukup" ? 'selected' : '' }}>Cukup</option>
                          <option value="Baik" {{ old('perkerasan_kondisi_sarana_secara_visual') == "Baik" ? 'selected' : '' }}>Baik</option>
                          <option value="Baik Sekali" {{ old('perkerasan_kondisi_sarana_secara_visual') == "Baik Sekali" ? 'selected' : '' }}>Baik Sekali</option>
                          <option value="Baru" {{ old('perkerasan_kondisi_sarana_secara_visual') == "Baru" ? 'selected' : '' }}>Baru</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Tahun Dibangun
                      </th>
                      <th>Sumber Informasi Tahun Dibangun</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="perkerasan_tahun_dibangun" name="perkerasan_tahun_dibangun" class="form-control" value="{{ old('perkerasan_tahun_dibangun', $report->perkerasan_tahun_dibangun) }}" /></td>
                      <td>
                        <div>
                          <input type="checkbox" id="perkerasan_tahun_dibangun_keterangan_pendamping" name="perkerasan_sumber_informasi_tahun_dibangun[]" value="Keterangan pendamping lokasi / pemilik">
                          <label for="perkerasan_tahun_dibangun_keterangan_pendamping">Keterangan pendamping lokasi / pemilik</label>
                        </div>
                        <div>
                          <input type="checkbox" id="perkerasan_tahun_dibangun_imb" name="perkerasan_sumber_informasi_tahun_dibangun[]" value="IMB">
                          <label for="perkerasan_tahun_dibangun_imb">IMB</label>
                        </div>
                        <div>
                          <input type="checkbox" id="perkerasan_tahun_dibangun_pengamatan_visual" name="perkerasan_sumber_informasi_tahun_dibangun[]" value="Pengamatan Visual">
                          <label for="perkerasan_tahun_dibangun_pengamatan_visual">Pengamatan Visual</label>
                        </div>
                        <div>
                          <input type="checkbox" id="perkerasan_tahun_dibangun_keterangan_lingkungan" name="perkerasan_sumber_informasi_tahun_dibangun[]" value="Keterangan Lingkungan">
                          <label for="perkerasan_tahun_dibangun_keterangan_lingkungan">Keterangan Lingkungan</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Tahun Renovasi
                      </th>
                      <th>Sumber Informasi Tahun Renovasi</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="perkerasan_tahun_renovasi" name="perkerasan_tahun_renovasi" class="form-control" value="{{ old('perkerasan_tahun_renovasi', $report->perkerasan_tahun_renovasi) }}" /></td>
                      <td>
                        <div>
                          <input type="checkbox" id="perkerasan_tahun_renovasi_keterangan_pendamping" name="perkerasan_sumber_informasi_tahun_renovasi[]" value="Keterangan pendamping lokasi / pemilik">
                          <label for="perkerasan_tahun_renovasi_keterangan_pendamping">Keterangan pendamping lokasi / pemilik</label>
                        </div>
                        <div>
                          <input type="checkbox" id="perkerasan_tahun_renovasi_imb" name="perkerasan_sumber_informasi_tahun_renovasi[]" value="IMB">
                          <label for="perkerasan_tahun_renovasi_imb">IMB</label>
                        </div>
                        <div>
                          <input type="checkbox" id="perkerasan_tahun_renovasi_pengamatan_visual" name="perkerasan_sumber_informasi_tahun_renovasi[]" value="Pengamatan Visual">
                          <label for="perkerasan_tahun_renovasi_pengamatan_visual">Pengamatan Visual</label>
                        </div>
                        <div>
                          <input type="checkbox" id="perkerasan_tahun_renovasi_keterangan_lingkungan" name="perkerasan_sumber_informasi_tahun_renovasi[]" value="Keterangan Lingkungan">
                          <label for="perkerasan_tahun_renovasi_keterangan_lingkungan">Keterangan Lingkungan</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Jenis Renovasi</th>
                      <th>Bobot Renovasi (%)</th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" id="perkerasan_jenis_renovasi" name="perkerasan_jenis_renovasi" class="form-control" value="{{ old('perkerasan_jenis_renovasi') }}"/>
                      </td>
                      <td><input type="number" id="perkerasan_bobot_renovasi" name="perkerasan_bobot_renovasi" class="form-control" value="{{ old('perkerasan_bobot_renovasi') }}" /></td>
                    </tr>
                    <tr>
                      <th>Luas Bangunan</th>
                      <th></th>
                    </tr>
                    <tr>
                      <td><input type="number" id="perkerasan_luas_bangunan" name="perkerasan_luas_bangunan" class="form-control" value="{{ old('perkerasan_luas_bangunan') }}" /></td>
                      <td></td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label">Sarana Pelengkap KANOPI - BUT MAPPI</label>
                  <table class="table table-borderless">
                    <tr>
                      <td>
                        <label class="form-label">Tipe Material</label>
                      </td>
                      <td></td>
                    </tr>
                    <tbody id="kanopi-but-set">
                      <tr>
                        <th>Sarana Pelengkap Kanopi</th>
                        <th>Bobot(%)</th>
                        <td style="width:4%" class="align-top" rowspan="4">
                          <button type="button" class="btn btn-sm btn-action" onclick="addRowKanopi()" style="color: rgb(0, 132, 255)">+</button><br>
                          <button type="button" class="btn btn-sm btn-action" onclick="removeRowKanopi(this)" style="color: rgb(0, 132, 255)">-</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <select name="kanopi_sarana_pelengkap[]" class="form-control" >
                            <option value="">- Select -</option>
                            <option value="Rusak" {{ old('kanopi_sarana_pelengkap') == "Rusak" ? 'selected' : '' }}>Rusak</option>
                            <option value="Kurang Baik" {{ old('kanopi_sarana_pelengkap') == "Kurang Baik" ? 'selected' : '' }}>Kurang Baik</option>
                            <option value="Cukup" {{ old('kanopi_sarana_pelengkap') == "Cukup" ? 'selected' : '' }}>Cukup</option>
                            <option value="Baik" {{ old('kanopi_sarana_pelengkap') == "Baik" ? 'selected' : '' }}>Baik</option>
                            <option value="Baik Sekali" {{ old('kanopi_sarana_pelengkap') == "Baik Sekali" ? 'selected' : '' }}>Baik Sekali</option>
                            <option value="Baru" {{ old('kanopi_sarana_pelengkap') == "Baru" ? 'selected' : '' }}>Baru</option>
                          </select>
                        </td>
                        <td><input type="number" name="kanopi_bobot[]" class="form-control" placeholder="100" /></td>
                      </tr>
                      <tr>
                        <th>Adjustment Lain</th>
                        <th></th>
                      </tr>
                      <tr>
                        <td><input type="number" name="kanopi_adjustment_lain[]" class="form-control" /></td>
                        <td></td>
                      </tr>
                    </tbody>
                    <tr>
                      <th>Umur Ekonomis (tahun)</th>
                      <th>Kondisi Sarana Secara Visual</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kanopi_umur_ekonomis" name="kanopi_umur_ekonomis" class="form-control" value="{{ old('kanopi_umur_ekonomis') }}" /></td>
                      <td>
                        <select id="kanopi_kondisi_sarana_secara_visual" name="kanopi_kondisi_sarana_secara_visual" class="form-control" >
                          <option value="">- Select -</option>
                          <option value="Rusak" {{ old('kanopi_kondisi_sarana_secara_visual') == "Rusak" ? 'selected' : '' }}>Rusak</option>
                          <option value="Kurang Baik" {{ old('kanopi_kondisi_sarana_secara_visual') == "Kurang Baik" ? 'selected' : '' }}>Kurang Baik</option>
                          <option value="Cukup" {{ old('kanopi_kondisi_sarana_secara_visual') == "Cukup" ? 'selected' : '' }}>Cukup</option>
                          <option value="Baik" {{ old('kanopi_kondisi_sarana_secara_visual') == "Baik" ? 'selected' : '' }}>Baik</option>
                          <option value="Baik Sekali" {{ old('kanopi_kondisi_sarana_secara_visual') == "Baik Sekali" ? 'selected' : '' }}>Baik Sekali</option>
                          <option value="Baru" {{ old('kanopi_kondisi_sarana_secara_visual') == "Baru" ? 'selected' : '' }}>Baru</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Tahun Dibangun
                      </th>
                      <th>Sumber Informasi Tahun Dibangun</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kanopi_tahun_dibangun" name="kanopi_tahun_dibangun" class="form-control" value="{{ old('kanopi_tahun_dibangun', $report->kanopi_tahun_dibangun) }}" /></td>
                      <td>
                        <div>
                          <input type="checkbox" id="kanopi_tahun_dibangun_keterangan_pendamping" name="kanopi_sumber_informasi_tahun_dibangun[]" value="Keterangan pendamping lokasi / pemilik">
                          <label for="kanopi_tahun_dibangun_keterangan_pendamping">Keterangan pendamping lokasi / pemilik</label>
                        </div>
                        <div>
                          <input type="checkbox" id="kanopi_tahun_dibangun_imb" name="kanopi_sumber_informasi_tahun_dibangun[]" value="IMB">
                          <label for="kanopi_tahun_dibangun_imb">IMB</label>
                        </div>
                        <div>
                          <input type="checkbox" id="kanopi_tahun_dibangun_pengamatan_visual" name="kanopi_sumber_informasi_tahun_dibangun[]" value="Pengamatan Visual">
                          <label for="kanopi_tahun_dibangun_pengamatan_visual">Pengamatan Visual</label>
                        </div>
                        <div>
                          <input type="checkbox" id="kanopi_tahun_dibangun_keterangan_lingkungan" name="kanopi_sumber_informasi_tahun_dibangun[]" value="Keterangan Lingkungan">
                          <label for="kanopi_tahun_dibangun_keterangan_lingkungan">Keterangan Lingkungan</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Tahun Renovasi
                      </th>
                      <th>Sumber Informasi Tahun Renovasi</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kanopi_tahun_renovasi" name="kanopi_tahun_renovasi" class="form-control" value="{{ old('kanopi_tahun_renovasi', $report->kanopi_tahun_renovasi) }}" /></td>
                      <td>
                        <div>
                          <input type="checkbox" id="kanopi_tahun_renovasi_keterangan_pendamping" name="kanopi_sumber_informasi_tahun_renovasi[]" value="Keterangan pendamping lokasi / pemilik">
                          <label for="kanopi_tahun_renovasi_keterangan_pendamping">Keterangan pendamping lokasi / pemilik</label>
                        </div>
                        <div>
                          <input type="checkbox" id="kanopi_tahun_renovasi_imb" name="kanopi_sumber_informasi_tahun_renovasi[]" value="IMB">
                          <label for="kanopi_tahun_renovasi_imb">IMB</label>
                        </div>
                        <div>
                          <input type="checkbox" id="kanopi_tahun_renovasi_pengamatan_visual" name="kanopi_sumber_informasi_tahun_renovasi[]" value="Pengamatan Visual">
                          <label for="kanopi_tahun_renovasi_pengamatan_visual">Pengamatan Visual</label>
                        </div>
                        <div>
                          <input type="checkbox" id="kanopi_tahun_renovasi_keterangan_lingkungan" name="kanopi_sumber_informasi_tahun_renovasi[]" value="Keterangan Lingkungan">
                          <label for="kanopi_tahun_renovasi_keterangan_lingkungan">Keterangan Lingkungan</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Jenis Renovasi</th>
                      <th>Bobot Renovasi (%)</th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" id="kanopi_jenis_renovasi" name="kanopi_jenis_renovasi" class="form-control" value="{{ old('kanopi_jenis_renovasi') }}"/>
                      </td>
                      <td><input type="number" id="kanopi_bobot_renovasi" name="kanopi_bobot_renovasi" class="form-control" value="{{ old('kanopi_bobot_renovasi') }}" /></td>
                    </tr>
                    <tr>
                      <th>Luas Bangunan</th>
                      <th></th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kanopi_luas_bangunan" name="kanopi_luas_bangunan" class="form-control" value="{{ old('kanopi_luas_bangunan') }}" /></td>
                      <td></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                  <label><b>Denah Tanah</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                      Upload gambar denah tanah
                    </i>
                  </small>
                  <input type="file" class="form-control" name="denah_tanah" id="imgDenah">
                </div>
                <div class="form-group">
                  <label><b>Peta Lokasi Obyek Penilaian dan Data Pembanding</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                      Upload gambar peta lokasi obyek dan data pembanding
                    </i>
                  </small>
                  <input type="file" class="form-control" name="gambar_peta_lokasi" id="imgDenah">
                </div>
                <div class="form-group">
                  <label><b>Verifikasi Sentuh Tanahku</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                    Upload foto / screenshot Sentuh Tanahku (untuk Bank BCA).
                    </i>
                  </small>
                  <input type="file" class="form-control" name="sentuh_tanahku" id="imgDenah">
                </div>
                <div class="form-group">
                  <label><b>Tata Kota GISTARU</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                      Upload foto / screenshot Tata Kota Gistaru (untuk Bank BCA).
                    </i>
                  </small>
                  <input type="file" class="form-control" name="gistaru" id="imgDenah">
                </div>
                <div class="form-group">
                  <label><b>Upload Laporan Terinci</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                      Maksimum 50 MB
                    </i>
                  </small>
                  <input type="file" class="form-control" name="laporan_terinci" id="imgDenah">
                </div>
                <div class="form-group">
                  <label><b>Upload Kertas Kerja</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                      Maksimum 50 MB
                    </i>
                  </small>
                  <input type="file" class="form-control" name="kertas_kerja" id="imgDenah">
                </div>
                <div class="form-group">
                  <label><b>Pilih Pemberi Tugas</b></label><br>
                  <small class="form-text text-muted">
                    <i>
                      Formulir tambahan untuk melengkapi Laporan kepada Pemberi Tugas.
                    </i>
                  </small>
                  <select name="pemberi_tugas" class="form-control">
                    <option value="" selected>- Select -</option>
                    <option value="Bank Mandiri">Bank Mandiri</option>
                  </select>
                </div>
            </div>
          </div>
          </div>
            <button class="btn btn-success btn-submit mt-3" type="submit">Edit Laporan</button>
          </form>
    </div>
    <!-- /Default Icons Wizard -->
  </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>
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

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([1.966576931124596, 100.049384575934738], 13)

            var accessToken =
                'pk.eyJ1IjoicmVkb2syNSIsImEiOiJjbG1zdzZ1Y2MwZHA2MmxxYzdvYm12cTlwIn0.2GTgMV076x87YJQJzM34jg';

            var satelliteLayer = L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + accessToken, {
                    attribution: '&copy; <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 30,
                    id: 'mapbox/streets-v11', // Ganti dengan jenis peta satelit yang diinginkan
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);

            var geocoder = L.Control.geocoder({
                defaultMarkGeocode: false
            }).on('markgeocode', function(e) {
                map.setView(e.geocode.center, 13);
            }).addTo(map);

            var marker
            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                document.getElementById('lat').value = lat;
                document.getElementById('long').value = lng;

                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        var address = data.display_name;
                        document.getElementById('koordinat').value = address;
                    });

                if (marker) {
                    map.removeLayer(marker);
                }

                marker = L.marker([lat, lng]).addTo(map);
            });

            map.invalidateSize();
        });
    </script>
<script>
  function addTable() {
    const container = document.getElementById("containerDokumen");
    const firstTable = container.querySelector(".dokumen-set");
    const clone = firstTable.cloneNode(true);

    // Bersihkan input di clone
    const inputs = clone.querySelectorAll("input, select");
    inputs.forEach(input => {
      if (input.tagName.toLowerCase() === 'select') {
        input.selectedIndex = 0;
      } else {
        input.value = "";
      }
    });

    container.appendChild(clone);
  }

  function removeTable(button) {
    const allTables = document.querySelectorAll(".dokumen-set");
    if (allTables.length > 1) {
      const toRemove = button.closest(".dokumen-set");
      toRemove.remove();
    } else {
      alert("Minimal satu form dokumen harus ada.");
    }
  }
</script>

<script>
  function addRowImb() {
    const tbody = document.getElementById("imb-bangunan-set");

    // Ambil dua baris terakhir di tbody sebagai template
    const rows = tbody.querySelectorAll("tr");
    const lastHeaderRow = rows[rows.length - 2];
    const lastInputRow = rows[rows.length - 1];

    const newHeaderRow = lastHeaderRow.cloneNode(true);
    const newInputRow = lastInputRow.cloneNode(true);

    // Kosongkan input di baris input
    newInputRow.querySelectorAll("input").forEach(input => input.value = "");

    // Ganti tombol tambah agar tetap satu saja di baris baru
    const allButtons = tbody.querySelectorAll("button[onclick='addRowImb()']");
    allButtons.forEach(btn => btn.style.display = 'none');

    const newAddBtn = newHeaderRow.querySelector("button[onclick='addRowImb()']");
    const newRemoveBtn = newHeaderRow.querySelector("button[onclick='removeRowImb(this)']");
    newAddBtn.style.display = 'inline';
    newRemoveBtn.style.display = 'inline';

    // Tambahkan kedua baris
    tbody.appendChild(newHeaderRow);
    tbody.appendChild(newInputRow);
  }

  function removeRowImb(button) {
  const currentRow = button.closest("tr"); // baris <th>
  const tbody = document.getElementById("imb-bangunan-set");
  const allRows = Array.from(tbody.querySelectorAll("tr"));
  const index = allRows.indexOf(currentRow);

  // Cek jumlah set (2 baris per set)
  const totalSets = allRows.length / 2;
  if (totalSets <= 1) {
    alert("Minimal satu data bangunan harus ada.");
    return;
  }

  // Hapus baris kedua (yang isinya input) dulu, baru baris pertama (yang isinya th + tombol)
  tbody.removeChild(allRows[index + 1]); // baris input
  tbody.removeChild(allRows[index]);     // baris th dan tombol

  // Tampilkan tombol + di baris TH terakhir yang masih ada
  const updatedRows = Array.from(tbody.querySelectorAll("tr"));
  if (updatedRows.length >= 2) {
    const lastThRow = updatedRows[updatedRows.length - 2];
    const addBtn = lastThRow.querySelector("button[onclick='addRowImb()']");
    if (addBtn) addBtn.style.display = 'inline';
  }
}
</script>

<script>
  function addRowNjop() {
      const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
      const newRow = table.insertRow();
      const rowCount = table.rows.length;

      newRow.innerHTML = `
    <td class="row-number">${rowCount}</td>
    <td><input type="number" name="njop_tahun[]" class="form-control" /></td>
    <td><input type="number" name="njop_nilai_perolehan[]" class="form-control" /></td>
    <td>
        <button type="button" class="btn btn-sm btn-action" onclick="addRowNjop()" style="color: rgb(0, 132, 255)">+</button><br>
                                <button type="button" class="btn btn-sm btn-action" onclick="removeRowNjop(this)" style="color: rgb(0, 132, 255)">-</button>
    </td>
`;
      updateRowNumbers();
  }

  function removeRowNjop(button) {
      const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
      if (table.rows.length > 1) {
          const row = button.parentNode.parentNode;
          table.deleteRow(row.rowIndex - 1); // Adjust for header row
          updateRowNumbers();
      }
  }

  function updateRowNumbers() {
      const rows = document.querySelectorAll('#njopTable .row-number');
      rows.forEach((cell, index) => {
          cell.textContent = index + 1;
      });
  }
</script>

<script>
  function addRowPagar() {
      // Ambil elemen tbody asli
      const tbody = document.getElementById("pagar-but-set");

      // Clone isi tbody sebagai fragment DOM baru
      const clone = tbody.cloneNode(true);

      // Bersihkan nilai input dan select di clone
      clone.querySelectorAll('input, select').forEach(el => {
          if (el.tagName === 'INPUT') el.value = '';
          else if (el.tagName === 'SELECT') el.selectedIndex = 0;
      });

      // Pastikan ID dihilangkan dari clone agar tidak duplikat
      clone.removeAttribute("id");

      // Sisipkan setelah tbody terakhir
      tbody.parentNode.insertBefore(clone, tbody.nextSibling);
  }

  function removeRowPagar(btn) {
      const tbody = btn.closest("tbody");

      // Jangan hapus jika hanya tinggal satu block
      const allTbody = document.querySelectorAll("#pagar-but-set, #pagar-but-set ~ tbody");
      if (allTbody.length > 1) {
          tbody.remove();
      }
  }
</script>

<script>
  function addRowPerkerasan() {
      // Ambil elemen tbody asli
      const tbody = document.getElementById("perkerasan-but-set");

      // Clone isi tbody sebagai fragment DOM baru
      const clone = tbody.cloneNode(true);

      // Bersihkan nilai input dan select di clone
      clone.querySelectorAll('input, select').forEach(el => {
          if (el.tagName === 'INPUT') el.value = '';
          else if (el.tagName === 'SELECT') el.selectedIndex = 0;
      });

      // Pastikan ID dihilangkan dari clone agar tidak duplikat
      clone.removeAttribute("id");

      // Sisipkan setelah tbody terakhir
      tbody.parentNode.insertBefore(clone, tbody.nextSibling);
  }

  function removeRowPerkerasan(btn) {
      const tbody = btn.closest("tbody");

      // Jangan hapus jika hanya tinggal satu block
      const allTbody = document.querySelectorAll("#perkerasan-but-set, #perkerasan-but-set ~ tbody");
      if (allTbody.length > 1) {
          tbody.remove();
      }
  }
</script>


<script>
  function addRowKanopi() {
      // Ambil elemen tbody asli
      const tbody = document.getElementById("kanopi-but-set");

      // Clone isi tbody sebagai fragment DOM baru
      const clone = tbody.cloneNode(true);

      // Bersihkan nilai input dan select di clone
      clone.querySelectorAll('input, select').forEach(el => {
          if (el.tagName === 'INPUT') el.value = '';
          else if (el.tagName === 'SELECT') el.selectedIndex = 0;
      });

      // Pastikan ID dihilangkan dari clone agar tidak duplikat
      clone.removeAttribute("id");

      // Sisipkan setelah tbody terakhir
      tbody.parentNode.insertBefore(clone, tbody.nextSibling);
  }

  function removeRowKanopi(btn) {
      const tbody = btn.closest("tbody");

      // Jangan hapus jika hanya tinggal satu block
      const allTbody = document.querySelectorAll("#kanopi-but-set, #kanopi-but-set ~ tbody");
      if (allTbody.length > 1) {
          tbody.remove();
      }
  }
</script>

@endsection
