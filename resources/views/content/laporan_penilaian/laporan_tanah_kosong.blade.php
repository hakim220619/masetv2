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
<h4>Tambah Laporan Penilaian – Tanah Kosong</h4>
  <!-- Default -->
  <div class="row">  
    <!-- Default Icons Wizard -->
    <div class="col-12 mb-4">
      <div class="wizard-icons wizard-icons-example mt-2">
        
        <div class="content">
          <form method="POST" action="{{ route('laporan-tanah_kosong-store') }}" enctype="multipart/form-data">
            <!-- Account Details -->
            @csrf
            <div id="account-details" class="content">
              <div class="row g-3">
                <div class="form-group">
                  <label class="form-label" for="judul_laporan">Judul Laporan</label>
                  <input type="text" id="judul_laporan" name="judul_laporan" class="form-control"  />
                </div>   
                <div class="form-group">
                  <label class="form-label" for="nama_entitas">Nama Entitas</label>
                  <input type="text" id="nama_entitas" name="nama_entitas" class="form-control"  />
                </div>                 
                <div class="form-group">
                  <label class="form-label" for="judul_print_cover">Judul Print Cover Laporan untuk Umum</label>
                  <textarea class="form-control" name="judul_print_cover" id="judul_print_cover" cols="30" rows="10"></textarea>
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
                            echo "<option value='$year'>$year</option>";
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
                      <td><input type="text" id="no_laporan_penilaian" name="no_laporan_penilaian" class="form-control" /></td>
                      <td><input type="date" id="tgl_laporan_penilaian" name="tgl_laporan_penilaian" class="form-control"/></td>
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
                      <td><input type="text" id="no_dokumen_kontrak" name="no_dokumen_kontrak" class="form-control" /></td>
                      <td><input type="date" id="tgl_dokumen_kontrak" name="tgl_dokumen_kontrak" class="form-control"/></td>
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
                      <td><input type="text" id="nama_instansi_pemberi_tugas" name="nama_instansi_pemberi_tugas" class="form-control" /></td>
                      <td><input type="text" id="key_kcp_pemberi_tugas" name="key_kcp_pemberi_tugas" class="form-control"/></td>
                    </tr>
                    <tr>
                        <th>Contact Person Penugasan</th>
                        <th>Telepon</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="cp_penugasan_pemberi_tugas" name="cp_penugasan_pemberi_tugas" class="form-control" /></td>
                        <td><input type="text" id="telepon_pemberi_tugas" name="telepon_pemberi_tugas" class="form-control"/></td>
                    </tr>
                  </table>
                </div>
                <div class="form-group">
                    <label for="tujuan_penilaian"><b>Tujuan Penilaian sesuai SPI</b></label>
                    <select id="tujuan_penilaian" name="tujuan_penilaian" class="form-control" required>
                        <option value="" selected>- Select -</option>
                        <option value="jual_beli">Penilaian untuk kepentingan jual beli</option>
                        <option value="lelang_jual_beli_terbatas">Penilaian untuk tujuan lelang atau kepentingan jual beli dalam waktu terbatas</option>
                        <option value="penjaminan_utang">Penilaian untuk kepentingan penjaminan utang</option>
                        <option value="agun_bank">Penilaian untuk kepentingan agunan yang diambil alih pada perbankan</option>
                        <option value="sak_sap">Penilaian untuk kepentingan Standar Akuntansi Keuangan (SAK) atau Standar Akuntansi Pemerintah (SAP)</option>
                        <option value="pengadaan_tanah">Penilaian untuk kepentingan pengadaan tanah bagi kepentingan umum</option>
                        <option value="asuransi">Penilaian untuk kepentingan asuransi</option>
                        <option value="ipo">Penilaian untuk kepentingan rencana pencatatan saham di pasar modal/ IPO</option>
                        <option value="pelaporan_keuangan_sewa">Penilaian untuk kepentingan transaksi atau pelaporan keuangan atas obyek properti sewa</option>
                        <option value="transaksi_internal">Penilaian untuk kepentingan transaksi internal/ strategis</option>
                        <option value="jual_beli_dipindahkan">Penilaian untuk kepentingan jual beli pada aset yang dapat dipindahkan</option>
                        <option value="aset_tak_berwujud">Penilaian ekuitas/ aset tak berwujud untuk keperluan yudisial atau kepentingan dissenting shareholder</option>
                        <option value="transaksi_strategis_khusus">Penilaian untuk kepentingan transaksi internal/ strategis/ khusus</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tujuan_spesifik"><b>Tujuan Spesifik</b></label>
                   <input type="text" id="tujuan_spesifik" name="tujuan_spesifik" class="form-control" />
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="Debitur">Debitur</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Nama Debitur</th>
                      <th>Nama Yang Dihubungi</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="nama_debitur" name="nama_debitur" class="form-control" /></td>
                      <td><input type="text" id="nama_yang_dihubungi_debitur" name="nama_yang_dihubungi_debitur" class="form-control"/></td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="no_telepon_debitur" name="no_telepon_debitur" class="form-control" /></td>
                    </tr>
                  </table>
              </div>
              <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                <label class="form-label" for="pengguna_laporan">Pengguna Laporan</label>
                <table class="table table-borderless">
                  <tr>
                    <th>Nama / Instansi</th>
                    <th>Pilih Nama / Instansi</th>
                  </tr>
                  <tr>
                    <td><input type="text" id="nama_instansi_pengguna_laporan" name="nama_instansi_pengguna_laporan" class="form-control" /></td>
                    <td><input type="text" id="pilih_nama_instansi_pengguna_laporan" name="pilih_nama_instansi_pengguna_laporan" class="form-control"/></td>
                  </tr>
                  <tr>
                      <th>Alamat</th>
                  </tr>
                  <tr>
                      <td><textarea type="text" id="alamat" name="alamat" class="form-control" > </textarea></td>
                  </tr>
                </table>
            </div>
                <div class="form-group">
                    <label for="pengguna_laporan_khusus"><b>Pengguna Laporan Khusus</b></label>
                    <select id="pengguna_laporan_khusus" name="pengguna_laporan_khusus" class="form-control">
                        <option value="" selected>- Select -</option>
                        <option value="Otoritas Jasa Keuangan">Otoritas Jasa Keuangan</option>
                        <option value="Bursa Efek Indonesia">Bursa Efek Indonesia</option>                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori_kredit"><b>Kategori Kredit</b></label>
                    <input type="text" id="kategori_kredit" name="kategori_kredit" class="form-control"  placeholder="Konsumer (KPR)">
                </div>                
                <div class="form-group">
                    <label for="kategori_kredit_bca"><b>Kategori Kredit (khusus BCA)</b></label>
                    <select id="kategori_kredit_bca" name="kategori_kredit_bca" class="form-control">
                        <option value="" selected>- Select -</option>
                        <option value="Produktif">Produktif</option>
                        <option value="Konsumer">Konsumer</option>
                    </select>
                </div>                
                <div class="form-group">
                    <label for="tipe_jaminan"><b>Tipe Jaminan</b></label>
                    <input type="text" id="tipe_jaminan" name="tipe_jaminan" class="form-control"  placeholder="Rumah Tinggal">
                </div>                
                <div class="form-group">
                    <label for="lokasi_cabang_bank"><b>Lokasi Cabang Bank</b></label>
                    <input type="text" id="lokasi_cabang_bank" name="lokasi_cabang_bank" class="form-control"  placeholder="BCA KCU Madiun">
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="bap_final">BAP / Final</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Kota / Daerah</th>
                      <th>Pilih Nama / Instansi</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="kota_bap_final" name="kota_bap_final" class="form-control" /></td>
                      <td><input type="text" id="pilih_nama_instansi_daerah_bap_final" name="pilih_nama_instansi_daerah_bap_final" class="form-control"/></td>
                    </tr>
                  </table>
              </div>
                <div class="form-group">
                    <label for="dasar_nilai_spesifik"><b>Dasar Nilai Spesifik</b></label>
                    <input type="text" id="dasar_nilai_spesifik" name="dasar_nilai_spesifik" class="form-control" placeholder="">
                </div>                
                <div class="form-group">
                    <label><b>Pendekatan Penilaian</b></label>
                    <div>
                        <input type="checkbox" id="pendekatan_pasar" name="pendekatan_penilaian[]" value="Pendekatan Pasar">
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
                      <td><input type="text" id="provinsi_obyek" name="provinsi_obyek" class="form-control" /></td>
                      <td><input type="text" id="kabupaten_lokasi_obyek" name="kabupaten_lokasi_obyek" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Kecamatan</th>
                      <th>Kelurahan</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="kecamatan_lokasi_obyek" name="kecamatan_lokasi_obyek" class="form-control" /></td>
                      <td><input type="text" id="kelurahan_lokasi_obyek" name="kelurahan_lokasi_obyek" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Jalan/No/RT/RW</th>
                      <th>Kode Pos</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="rt_rw_lokasi_obyek" name="rt_rw_lokasi_obyek" class="form-control" /></td>
                      <td><input type="text" id="kode_pos_rt_rw_lokasi_obyek" name="kode_pos_rt_rw_lokasi_obyek" class="form-control"/></td>
                    </tr>
                    <tr>
                      <th>Wilayah Administratif Tingkat II (Laporan)</th>
                      <th>Wilayah Administratif Tingkat IV (Laporan)</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="wil_admint2_lokasi_obyek" name="wil_admint2_lokasi_obyek" class="form-control" /></td>
                      <td><input type="text" id="wil_admint4_lokasi_obyek" name="wil_admint4_lokasi_obyek" class="form-control"/></td>
                    </tr>
                    <tr>
                        <th>Alamat Lengkap (Laporan)</th>
                    </tr>
                    <tr>
                        <td><textarea type="text" id="alamat_lokasi_obyek" name="alamat_lokasi_obyek" class="form-control" > </textarea></td>
                    </tr>
                  </table>
              </div>  
                <div class="form-group">
                    <label for="tanggal_inspeksi"><b>Tanggal Inspeksi</b></label>
                    <input type="date" id="tanggal_inspeksi" name="tanggal_inspeksi" class="form-control">
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
                <div class="form-group">
                    <label for="informasi_khusus"><b>Informasi Khusus</b></label><br>
                    <small class="form-text text-muted">
                        Informasi khusus terkait penugasan, kondisi objek, kendala inspeksi, dll (Sebagai pertimbangan reviewer)
                    </small>
                    <textarea id="informasi_khusus" name="informasi_khusus" class="form-control" rows="4"></textarea>
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
  
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
  var map = L.map('map').setView([1.966576931124596, 100.049384575934738], 13)
          
          var accessToken = 'pk.eyJ1IjoicmVkb2syNSIsImEiOiJjbG1zdzZ1Y2MwZHA2MmxxYzdvYm12cTlwIn0.2GTgMV076x87YJQJzM34jg';
  
          var satelliteLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + accessToken, {
              attribution: '&copy; <a href="https://www.mapbox.com/">Mapbox</a>',
              maxZoom: 30,
              id: 'mapbox/satellite-streets-v12', // Ganti dengan jenis peta satelit yang diinginkan
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
                    document.getElementById('alamat').value = address;
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
  // Menambahkan baris baru ke tabel Foto Lainnya
  function addFotoRow() {
      const table = document.getElementById('fotoLainnyaTable').getElementsByTagName('tbody')[0];
      const newRow = table.insertRow();
      const rowCount = table.rows.length;

      newRow.innerHTML = `
          <td class="row-number-foto">${rowCount}</td>
          <td><input type="text" name="judul_foto[]" class="form-control" /></td>
          <td><input type="file" id="foto_lainnya" name="foto_lainnya[]" class="form-control" accept="image/*" /></td>
          <td>
              <button type="button" class="btn btn-success btn-sm btn-action" onclick="addFotoRow()">+</button>
              <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeFotoRow(this)">-</button>
          </td>
      `;
      updateFotoRowNumbers();
  }

  // Menghapus baris dari tabel Foto Lainnya
  function removeFotoRow(button) {
      const table = document.getElementById('fotoLainnyaTable').getElementsByTagName('tbody')[0];
      if (table.rows.length > 1) {
          const row = button.parentNode.parentNode;
          table.deleteRow(row.rowIndex - 1); // Menyesuaikan indeks untuk header
          updateFotoRowNumbers();
      }
  }

  // Memperbarui nomor urut di tabel Foto Lainnya
  function updateFotoRowNumbers() {
      const rows = document.querySelectorAll('#fotoLainnyaTable .row-number-foto');
      rows.forEach((cell, index) => {
          cell.textContent = index + 1;
      });
  }
</script>

<script>
  function addRow() {
      const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
      const newRow = table.insertRow();
      const rowCount = table.rows.length;

      newRow.innerHTML = `
          <td class="row-number">${rowCount}</td>
          <td><input type="number" name="tahun[]" class="form-control" /></td>
          <td><input type="number" name="nilai_perolehan[]" class="form-control" /></td>
          <td>
              <button type="button" class="btn btn-success btn-sm btn-action" onclick="addRow()">+</button>
              <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeRow(this)">-</button>
          </td>
      `;
      updateRowNumbers();
  }

  function removeRow(button) {
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
  document.addEventListener('DOMContentLoaded', function () {
      const dropdown = document.getElementById('bentuk_tanah');
      const inputGroup = document.getElementById('bentuk_tanah_lainnya_group');

      dropdown.addEventListener('change', function () {
          if (this.value === 'Lainnya') {
              inputGroup.style.display = 'block'; // Tampilkan input
          } else {
              inputGroup.style.display = 'none'; // Sembunyikan input
              document.getElementById('bentuk_tanah_lainnya').value = ''; // Reset nilai input
          }
      });
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

@endsection
