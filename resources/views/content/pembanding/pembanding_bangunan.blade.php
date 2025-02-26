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

<style>

  .form-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 20px;
  }
  #canvasContainer {
      flex: 2;
      border: 1px solid #ccc;
      position: relative;
  }
  canvas {
      width: 100%;
      height: 500px;
  }
  .controls {
      display: flex;
      justify-content: center;
      margin-top: 10px;
  }
  .controls button {
      margin: 5px;
      padding: 10px 15px;
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      font-size: 14px;
  }
  .controls button:hover {
      background-color: #0056b3;
  }
  .input-section {
      flex: 1;
      max-width: 400px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
  }
  .input-section label {
      display: block;
      margin-top: 10px;
      margin-bottom: 5px;
  }
  .input-section input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
  }
</style>
<style>
  .foto-lainnya-container {
      border: 1px solid #dee2e6;
      padding: 10px;
      border-radius: 5px;
  }

  .foto-lainnya-container .form-group {
      margin-bottom: 0;
  }

  .foto-lainnya-container label {
      font-weight: bold;
  }

  .foto-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 10px;
      padding: 5px;
  }

  .foto-item input {
      margin-right: 5px;
  }

  .foto-controls button {
      background: none;
      border: none;
      color: #007bff;
      font-size: 18px;
  }
</style>

@php
// Ambil semua header unik dari tabel master_data
$headers = DB::table('master_data')->select('label_header')->distinct()->pluck('label_header'); // Menghasilkan collection berisi semua header unik

$dataBangunan = [];
foreach ($headers as $header) {
    $dataBangunan[$header] = DB::table('master_data')
        ->where('label_header', $header)
        ->where('label_option', '!=', null)
        ->where('state', 'ON')
        ->get();
}
@endphp

<h4>Data Pembanding – Tanah dan Bangunan</h4>
  <!-- Default -->
  <div class="row">  
    <!-- Default Icons Wizard -->
    <div class="col-12 mb-4">
      <div class="wizard-icons wizard-icons-example mt-2">
        
        <div class="content">
          <form method="POST" action="{{ route('add_pembanding_bangunan') }}" enctype="multipart/form-data">
            <!-- Account Details -->
            @csrf
            <div id="account-details" class="content">
              <div class="row g-3">
                <div>
                  <label class="form-label" for="nama_tanah_n_bangunan">Nama Tanah dan Bangunan</label>
                  <input type="text" id="nama_tanah_n_bangunan" name="nama_tanah_n_bangunan" class="form-control" placeholder="Rumah Bapak Budi" />                             
                </div>  
                <div>
                  <label class="form-label" for="nama_kjpp">Nama KJPP</label>
                  <input type="text" id="nama_kjpp" name="nama_kjpp" class="form-control" placeholder="Rumah Bapak Budi" />                             
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="Lokasi Obyek">Lokasi Obyek</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Provinsi</th>
                      <th>Kode Pos</th>
                    </tr>
                    <tr>
                      <td>
                        <select class="form-select" name="provinsi" id="provinsi" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                        </select> 
                      </td>
                      <td><input type="text" id="kode_pos" name="kode_pos" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>Alamat Lengkap</th>
                    </tr>     
                    <tr>                      
                      <td><textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap"></textarea></td>
                    </tr> 
                  </table>
                </div>   
                <div>
                  <label class="form-label" for="jenis_properti">Jenis Properti</label>
                  <input type="text" id="id_jenis_properti" name="jenis_properti" class="form-control" placeholder="Contoh : Rumah Tinggal, Ruko, dll" />
                </div> 
                <div>
                  <label class="form-label" for="jenis_bangunan">Jenis Bangunan</label> <br>
                  <input type="checkbox" id="id_jenis_bangunan" name="jenis_bangunan" onchange="toggleKeteranganField()" >
                  <label class="form-check-label" for="jenis_bangunan">
                    Ruko/Rukan
                  </label>
                </div> 
                <div id="keteranganField">
                  <label class="form-label" for="kpt_tabel_analisis_ruko">Keterangan Peruntukan Tanah pada Tabel Analisis Ruko</label>
                  <input type="text" id="kpt_tabel_analisis_ruko" name="kpt_tabel_analisis_ruko" class="form-control" placeholder="Berperuntukan Ruko" />
                </div> 
                <div>
                  <label class="form-label" for="kdn_tabel_analisis">Keterangan Dasar Nilai pada Tabel Analisis</label>
                  <input type="text" id="kdn_tabel_analisis" name="kdn_tabel_analisis" class="form-control" placeholder="Indikasi Nilai Liquidasi / Nilai Investasi / Nilai Sewa Pasar" />
                </div> 
                <div>
                  <label class="form-label" for="alamat">Koordinat Obyek</label>
                  <label class="form-label" for="alamat">Alamat</label>
                  <input type="text" id="alamat" name="alamat" class="form-control mb-2" placeholder="jl sukasari kecamatan baleendah bandung" readonly />
                  <div id="map" style="height: 400px; width: 100%;"></div>
                  <input type="text" id="lat" name="lat" class="form-control" placeholder="-8.9897878" hidden />
                  <input type="text" id="long" name="long" class="form-control" placeholder="89.8477748" hidden />
                </div>
                <div>
                  <label class="form-label" for="foto_tampak_depan">Upload Foto Tampak Depan</label>
                  <input type="file" id="foto_tampak_depan" name="foto_tampak_depan" class="form-control" />
                </div>
                <div>
                  <label class="form-label" for="foto_tampak_sisi_kiri">Upload Foto Tampak Sisi Kiri</label>
                  <input type="file" id="foto_tampak_sisi_kiri" name="foto_tampak_sisi_kiri" class="form-control"/>
                </div>
                <div>
                  <label class="form-label" for="foto_tampak_sisi_kanan">Upload Foto Tampak Sisi Kanan</label>
                  <input type="file" id="foto_tampak_sisi_kanan" name="foto_tampak_sisi_kanan" class="form-control" />
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="Foto Lainnya">Foto Lainnya</label>
                  <table class="table table-bordered" id="fotoLainnyaTable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Judul Foto</th>
                              <th>Upload Foto</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="row-number-foto">1</td>
                              <td><input type="text" name="judul_foto[]" class="form-control" /></td>
                              <td><input type="file" id="foto_lainnya" name="foto_lainnya[]" class="form-control" accept="image/*" /></td>
                              <td>
                                  <button type="button" class="btn btn-success btn-sm btn-action" onclick="addFotoRow()">+</button>
                                  <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeFotoRow(this)">-</button>
                              </td>
                          </tr>
                      </tbody>
                  </table>
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
                            <tr>
                                <td class="row-number">1</td>
                                <td><input type="number" name="tahun[]" class="form-control" /></td>
                                <td><input type="number" name="nilai_perolehan[]" class="form-control" /></td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addRow()">+</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeRow(this)">-</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="narasumber">Narasumber</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Nama Narasumber</th>
                      <th>Telepon</th>
                    </tr>
                    <tr>
                      <td><input type="text" id="nama_narsum" name="nama_narsum" class="form-control" placeholder="Bapak Ahmad Sudani" /></td>
                      <td><input type="number" id="telepon" name="telepon" class="form-control" placeholder="087654354243" /></td>
                    </tr>
                  </table>
                </div>
                <div>
                  <div>
                    <label class="form-label" for="jenis_dok_hak_tanah">Jenis Dokumen Hak Tanah</label>
                    <select name="jenis_dok_hak_tanah" id="jenis_dok_hak_tanah" class="form-select">
                      <option value="">Pilih..</option>
                      <option value="Hak Milik">Hak Milik</option>
                      <option value="Hak Guna Bangunan">Hak Guna Bangunan</option>
                      <option value="Hak Guna Usaha">Hak Guna Usaha</option>
                      <option value="Hak Pakai">Hak Pakai</option>
                      <option value="Hak Milik Satuan Rumah Susun">Hak Milik Satuan Rumah Susun</option>
                      <option value="Girik">Girik</option>
                      <option value="Akad Jual Beli">Akad Jual Beli</option>
                      <option value="Perjanjian Pengikatan Jual Beli">Perjanjian Pengikatan Jual Beli</option>
                      <option value="Surat Hijau">Surat Hijau</option>
                    </select>
                </div>
                </div>
              </div>
            </div>
            <!-- Personal Info -->
            <div id="personal-info" class="content">
              <div class="row g-3">
                <hr>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="perutuntukan_kawasan">Peruntukan Kawasan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Zona Lindung</th>
                      <th>Zona Budi Daya</th>
                    </tr>
                    <tr>
                      <td>
                        <select class="form-select" name="zona_lindung" id="zona_lindung" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Zona Hutan Lindung">Zona Hutan Lindung</option>
                          <option value="Zona Perlindungan Terhadap Kawasan Dibawahnya">Zona Perlindungan Terhadap Kawasan Dibawahnya</option>
                          <option value="Zona Perlindungan Setempat">Zona Perlindungan Setempat</option>
                          <option value="Zona Ruang Terbuka Hijau">Zona Ruang Terbuka Hijau</option>
                          <option value="Zona Suaka Alam dan Cagar Budaya">Zona Suaka Alam dan Cagar Budaya</option>
                          <option value="Zona Rawan Bencana Alam">Zona Rawan Bencana Alam</option>
                          <option value="Zona Lainnya">Zona Lainnya</option>
                        </select>
                      </td>
                      <td>
                        <select class="form-select" name="zona_budidaya" id="zona_budidaya" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Zona Perumahan">Zona Perumahan</option>
                          <option value="Zona Perdagangan dan Jasa">Zona Perdagangan dan Jasa</option>
                          <option value="Zona Perkantoran">Zona Perkantoran</option>
                          <option value="Zona Sarana Pelayanan Umum">Zona Sarana Pelayanan Umum</option>
                          <option value="Zona Indiustri">Zona Indiustri</option>
                          <option value="Zona Ruang Terbuka Non Hijau">Zona Ruang Terbuka Non Hijau</option>
                          <option value="Zona Peruntukan Lainnya">Zona Peruntukan Lainnya</option>
                          <option value="Zona Peruntukan Khusus">Zona Peruntukan Khusus</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>                   
                <div>
                  <label class="form-label" for="jenis_data">Jenis Data</label>
                  <select class="form-select" name="jenis_data" id="jenis_data" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Penawaran">Penawaran</option>
                    <option value="Transaksi">Transaksi</option>
                    <option value="Price on Offer">Price on Offer</option>
                  </select>
                </div>
                <div>
                  <label class="form-label" for="tgl_penawaran">Tanggal Penawaran / Waktu Transaksi</label>
                  <input type="datetime-local" id="tgl_penawaran" name="tgl_penawaran" class="form-control" />
                </div>
                <div>
                  <label class="form-label" for="sumber_data">Sumber Data</label>
                  <select class="form-select" aria-label="Default select example">
                    <option value="" disabled selected>Pilih sumber data</option>
                    <option value="Pemilik">Pemilik</option>
                    <option value="Perorangan">Perorangan</option>
                    <option value="Agen">Agen</option>
                  </select>
                </div>
                <div>
                  <label class="form-label" for="luas_tanah">Luas Tanah (m2)</label>
                  <input type="number" id="luas_tanah" name="luas_tanah" class="form-control" placeholder="44" />
                </div>
                <div>
                  <label class="form-label" for="luas_tanah_terpotong">Luas Tanah Terpotong (m2)</label>
                  <input type="number" id="luas_tanah_terpotong" name="luas_tanah_terpotong" class="form-control" placeholder="44" />
                </div>
                <div>
                  <label class="form-label" for="luas_bangunan_terpotong">Luas Bangunan Terpotong (m2)</label>
                  <input type="number" id="luas_bangunan_terpotong" name="luas_bangunan_terpotong" class="form-control" placeholder="44" />
                </div>
                <div>
                  <label class="form-label" for="harga_penawaran">Harga Penawaran/Transaksi (Rp)</label>
                  <input type="text" id="harga_penawaran" name="harga_penawaran" class="form-control" placeholder="4257000000" />
                </div>
                <div>
                  <label class="form-label" for="diskon">Diskon (%)</label>
                  <input type="number" id="diskon" name="diskon" class="form-control" placeholder="44" />
                </div>
                <div>
                  <label class="form-label" for="harga_sewa_per_tahun">Harga Sewa per Tahun (Rp/tahun)</label>
                  <input type="number" id="harga_sewa_per_tahun" name="harga_sewa_per_tahun" class="form-control" placeholder="4257000000" />
                </div>
                <div>
                  <label class="form-label" for="skrap">Skrap / Nilai Sisa (%)</label>
                  <input type="number" id="skrap" name="skrap" class="form-control" placeholder="44" />
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="penyusutan">Penyusutan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Kemunduran Fungsi (%)</th>
                      <th>Penjelasan Kemunduran Fungsi</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kemunduran_fungsi" name="kemunduran_fungsi" value="0" class="form-control" /></td>
                      <td><textarea class="form-control" name="penjelasan_kemunduran_fungsi"  id="penjelasan_kemunduran_fungsi"></textarea></td>
                    </tr>
                    <tr>
                      <th>Kemunduran Ekonomis (%)</th>
                      <th>Penjelasan Kemunduran Ekonomis</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kemunduran_ekonomis" name="kemunduran_ekonomis" value="0" class="form-control" /></td>
                      <td><textarea class="form-control" name="penjelasan_kemunduran_ekonomis"  id="penjelasan_kemunduran_ekonomis"></textarea></td>
                    </tr>  
                    <tr>
                      <th>Maintenance (%)</th>
                    </tr>     
                    <tr>
                      <td><input type="number" id="maintenance" name="maintenance" value="0" class="form-control" /></td>
                    </tr>             
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="penyesuaian_elemen_perbandingan">Penyesuaian Elemen Perbandingan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Syarat Pembiayaan
                        Batasan dilakukan pelunasan pembayaran (Kelunakan)                        
                      </th>
                      <th>Kondisi Penjualan
                        Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan Kondisi Pemaksa
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <select class="form-select" name="pep_pembiayaan" id="pep_pembiayaan" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Tunai">Tunai</option>
                          <option value="Kredit">Kredit</option>
                          <option value="Bertahap">Bertahap</option>
                        </select>
                      </td>
                      <td>
                        <select class="form-select" name="pep_penjualan" id="pep_penjualan" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Normal">Normal</option>
                          <option value="Jual Cepat">Jual Cepat</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Pengeluaran yang dilakukan segera setelah pembelian
                        Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke fungsi atau peruntukan awal atau seharusnya
                      </th>
                      <th>
                        Kondisi Pasar
                        Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga penawaran (Menggunakan Indikator Waktu Penawaran / Transaksi)
                      </th>
                    </tr>
                    <tr>
                      <td><input type="text" id="pep_pengeluaran" name="pep_pengeluaran" placeholder="Tidak Ada" class="form-control" /></td>
                      <td><input type="text" id="pep_pasar" name="pep_pasar" placeholder="Normal" class="form-control" /></td>
                    </tr>              
                  </table>
                </div> 
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="penggunaan">Penggunaan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>
                        Koefisien Dasar Bangunan (KDB) (%)                       
                      </th>
                      <th>
                        Koefisien Lantai Bangunan (KLB) (kali)
                      </th>
                    </tr>
                    <tr>            
                        <td><input type="number" id="koefisien_dasar_bangunan" name="koefisien_dasar_bangunan" class="form-control" /></td>
                        <td><input type="number" id="koefisien_lantai_bangunan" name="koefisien_lantai_bangunan" class="form-control" /></td>
                    </tr>
                    <tr>
                      <th>
                        Garis Sempadan Bangunan (GSB) (meter)
                      </th>
                      <th>
                        Ketinggian (lantai)
                      </th>
                    </tr>
                    <tr>
                      <td><input type="number" id="garis_sempadan_bangunan" name="garis_sempadan_bangunan" class="form-control" /></td>
                      <td><input type="number" id="ketinggian" name="ketinggian" class="form-control" /></td>
                    </tr>              
                  </table>
                </div>
                <div>
                  <label class="form-label" for="row_jalan">Row Jalan (m)</label>
                  <input type="number" id="row_jalan" name="row_jalan" class="form-control" placeholder="12" />
                </div>
                <div>
                  <label class="form-label" for="tipe_jalan">Tipe Jalan</label>
                  <input type="text" id="tipe_jalan" name="tipe_jalan" class="form-control" placeholder="Aspal" />
                </div>
                <div>
                    <label class="form-label" for="kapasitas_jalan">Kapasitas Jalan</label>
                    <input type="text" id="kapasitas_jalan" name="kapasitas_jalan" class="form-control" placeholder="> 1 Kendaraan Roda 4" />
                </div>
                <div>
                  <label class="form-label" for="pengguna_lahan_lingkungan_eksisting">Penggunaan Lahan Lingkungan Eksisting</label>
                  <select class="form-select" name="pengguna_lahan_lingkungan_eksisting" id="pengguna_lahan_lingkungan_eksisting" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Pemukiman/Perumahan" >Pemukiman/Perumahan</option>
                    <option value="Campuran" >Campuran</option>
                  </select>
                </div>
                <div>
                  <label class="form-label" for="letak_posisi_obyek">Letak / Posisi Obyek</label>
                  <select name="letak_posisi_obyek" id="letak_posisi_obyek" class="form-select">
                    <option value="">Pilih...</option>
                    <option value="Kuldesak">Kuldesak</option>
                    <option value="Interior">Interior</option>
                    <option value="Tusuk Sate">Tusuk Sate</option>
                    <option value="Sudut(Corner)">Sudut(Corner)</option>
                    <option value="Key">Key</option>
                    <option value="Flag">Flag</option>
                  </select>
              </div>
                <div>
                  <label class="form-label" for="lokasi_aset">Lokasi Aset</label>
                  <select class="form-select" name="lokasi_aset" id="lokasi_aset" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Depan">Depan</option>
                    <option value="Tengah">Tengah</option>
                    <option value="Belakang">Belakang</option>
                  </select>
                </div>  
              </div>
            </div>
            <!-- Address -->
            <div id="address" class="content">
           
              <div class="row g-3">
                <div>
                  <label class="form-label" for="bentuk_tanah">Bentuk Tanah</label>
                  <select name="letak_posisi_aset" id="letak_posisi_aset" class="form-select">
                    <option value="">Pilih...</option>
                    <option value="Beraturan">Beraturan</option>
                    <option value="Tidak Beraturan">Tidak Beraturan</option>
                    <option value="Persegi Panjang">Persegi Panjang</option>
                    <option value="Persegi Empat">Persegi Empat</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
              </div>
              <div>
                  <label class="form-label" for="lebar_muka_tanah">Lebar Muka Tanah (m)</label>
                  <input type="number" id="lebar_muka_tanah" name="lebar_muka_tanah" class="form-control" placeholder="22" />
              </div>
              <div>
                <label class="form-label" for="ketinggian_tanah_dr_muka_jln">Ketinggian Tanah dari Muka Jalan (m)</label>
                <input type="number" id="ketinggian_tanah_dr_muka_jln" name="ketinggian_tanah_dr_muka_jln" class="form-control" placeholder="0.1" />
              </div>
              <div>
                  <label class="form-label" for="topografi">Topografi / Elevasi</label>
                  <select class="form-select" name="topografi" id="topografi" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Rata">Rata</option>
                    <option value="Bergelombang">Bergelombang</option>
                  </select>
              </div>
              <div>
                <label class="form-label" for="tingkat_hunian">Tingkat Hunian (%)</label>
                <input type="number" id="tingkat_hunian" name="tingkat_hunian" class="form-control" placeholder="70" />
              </div>                 
                <div>
                  <div>
                      <label class="form-label" for="kondisi_lingkungan_khusus">Kondisi Lingkungan Khusus</label>
                  </div>
                  <select class="select2 form-select" name="kondisi_lingkungan_khusus" id="kondisi_lingkungan_khusus" aria-label="Default select example" multiple>
                    <option value="Bebas Banjir">Bebas Banjir</option>
                    <option value="Banjir Musiman">Banjir Musiman</option>
                    <option value="Rawan Banjir">Rawan Banjir</option>
                    <option value="Rawan Kebakaran">Rawan Kebakaran</option>
                    <option value="Rawan Bencana Alam">Rawan Bencana Alam</option>
                    <option value="Rawan Huru-hara">Rawan Huru-hara</option>
                    <option value="Dekat Kuburan">Dekat Kuburan</option>
                    <option value="Dekat Sekolahan/Pasar">Dekat Sekolahan/Pasar</option>
                    <option value="Lokasi Tusuk Sate">Lokasi Tusuk Sate</option>
                    <option value="Dekat Tempat Ibadah">Dekat Tempat Ibadah</option>
                    <option value="Dekat Kumpulan Bangunan Liar">Dekat Kumpulan Bangunan Liar</option>
                    <option value="Dekat Jurang/ Rawan Longsor">Dekat Jurang/ Rawan Longsor</option>
                    <option value="Dekat Pasar">Dekat Pasar</option>
                    <option value="Dekat Tegangan Tinggi">Dekat Tegangan Tinggi</option>
                    <option value="Dekat Terminal">Dekat Terminal</option>
                    <option value="Dekat Saluran Irigasi">Dekat Saluran Irigasi</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
                <div id="lainnyaInputContainer" style="display: none;">
                  <label class="form-label" for="kondisi_lingkungan_lainnya">Kondisi Lingkungan Lainnya</label>
                  <input type="text" id="kondisi_lingkungan_lainnya" name="kondisi_lingkungan_lainnya" class="form-control" />
                </div>
                <div>
                  <label class="form-label" for="keterangan_tambahan_lainnya">Keterangan Tambahan Lainnya</label>
                  <td><textarea class="form-control" name="keterangan_tambahan_lainnya" id="keterangan_tambahan_lainnya"></textarea></td>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="karakteristik_ekonomi">Karakteristik Ekonomi (Jika objek yang dinilai adalah Properti Komersial)</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>
                        Kualitas Pendapatan                      
                      </th>
                      <th>
                        Biaya Operasional
                      </th>
                    </tr>
                    <tr>            
                        <td>
                            <select class="form-select" name="kualitas_pendapatan" id="kualitas_pendapatan" aria-label="Default select example">
                              <option value="" selected disabled>Pilih...</option>
                              <option value="Rendah">Rendah</option>
                              <option value="Sedang">Sedang</option>
                              <option value="Tinggi">Tinggi</option>
                            </select>
                        </td>
                        <td>
                          <select class="form-select" name="biaya_opreasional" id="biaya_opreasional" aria-label="Default select example">
                            <option value="" selected disabled>Pilih...</option>
                            <option value="Rendah">Rendah</option>
                            <option value="Normal">Normal</option>
                            <option value="Tinggi">Tinggi</option>
                          </select>
                        </td>
                    </tr>
                    <tr>
                      <th>
                        Ketentuan Sewa
                      </th>
                      <th>
                        Manajemen
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <select class="form-select" name="ketentuan_sewa" id="ketentuan_sewa" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Mudah">Mudah</option>
                          <option value="Normal">Normal</option>
                          <option value="Ketat">Ketat</option>
                        </select>
                      </td>
                      <td>
                        <select class="form-select" name="manajemen" id="manajemen" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Kecil">Kecil</option>
                          <option value="Menengah">Menengah</option>
                          <option value="Besar">Besar</option>
                        </select>
                      </td>
                    </tr>  
                    <tr>
                      <th>
                        Bauran Penyewa
                      </th>
                    </tr> 
                    <tr>
                      <td>
                        <select class="form-select" name="ketentuan_sewa" id="ketentuan_sewa" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Terbatas">Terbatas</option>
                          <option value="Normal">Normal</option>
                          <option value="Beragam">Ketat</option>
                        </select>
                      </td>
                    </tr>            
                  </table>
                </div> 
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="kmpn_dlm_penjualan">Komponen Non-Realty dalam Penjualan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>
                        FFE                     
                      </th>
                      <th>
                        Biaya Operasional
                      </th>
                    </tr>
                    <tr>            
                        <td>
                          <input type="text" id="ffe" name="ffe" class="form-control" />
                        </td>
                        <td>
                          <input type="text" id="biaya_operasional" name="biaya_operasional" class="form-control" />
                        </td>
                    </tr>                             
                  </table>
                </div>                 
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="gambaran_object_thd_lingkungan">Gambaran Objek terhadap Wilayah dan Lingkungan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>
                        Jarak dengan CBD (Pusat Ekonomi) dari Pusat Kota. Nama Pusat Kota / Jarak                    
                      </th>
                      <th>
                        Jarak dengan CBD (Pusat Ekonomi) dari Pusat Ekonomi terdekat (Pasar Mall). Nama Pusat Ekonomi / Jarak
                      </th>
                    </tr>
                    <tr>            
                        <td>
                          <input type="text" id="nm_pusat_kota" name="nm_pusat_kota" placeholder="Nama pusat kota / Jarak" class="form-control" />
                        </td>
                        <td>
                          <input type="text" id="nm_pusat_ekonomi" name="nm_pusat_ekonomi" placeholder="Nama pusat ekonomi / Jarak" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                      <th>
                        Jarak dengan CBD (Pusat Ekonomi) dari Jalan Utama terdekat. Nama Jalan / Jarak
                      </th>
                      <th>
                        Kondisi Lingkungan Khusus yang mempengaruhi Nilai
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" id="nm_jalan" name="nm_jalan" placeholder="Nama jalan / Jarak" class="form-control" />
                      </td>
                      <td>
                        <input type="text" id="kondisi_lingkungan" name="kondisi_lingkungan"  class="form-control" />
                      </td>
                    </tr>  
                    <tr>
                      <th>
                        Faktor View (Pemandangan) untuk Properti yang faktor view dimungkinkan sangat berpengaruh pada nilai (contoh: apartemen, vila, dll)
                      </th>
                    </tr> 
                    <tr>
                      <td>
                        <input type="text" id="pemandangan" name="pemandangan"  class="form-control" />                        
                      </td>
                    </tr>            
                  </table>
                </div> 
                <div>
                  <div>
                    <label class="form-label" for="keterangan_jarak_dr_bca">Keterangan jarak dengan BCA terdekat (jika BCA)</label>
                    <div>
                      <small><i>Cantumkan jarak dan nama kantor cabang</i></small>
                    </div>
                  </div>
                  <input type="text" id="keterangan_jarak_dr_bca" name="keterangan_jarak_dr_bca" placeholder="± 1,4 Km (Bank BCA KCU Purwodadi)"  class="form-control" />                        
                </div> 
                <div>
                  <label class="form-label" for="bentuk_bangunan">Bentuk Bangunan</label>
                  <select class="form-select" name="ketentuan_sewa" id="ketentuan_sewa" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Bertingkat">Bertingkat</option>
                    <option value="Tidak Bertingkat">Tidak Bertingkat</option>
                  </select>
                </div>                 
              
              </div>
            </div>
            <!-- Social Links -->
            <div id="social-links" class="content">           
              <div class="row g-3">

                <div>
                  <label class="form-label" for="jumlah_lantai">Jumlah Lantai</label>
                  <select class="form-select" name="ketentuan_sewa" id="ketentuan_sewa" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    @for ($i = 1; $i <= 40; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>                      
                    @endfor
                  </select>
                </div>  
                <div>
                  <label class="form-label" for="basement">Basement</label>
                  <select class="form-select" name="basement" id="basement" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Ada Basement">Ada Basement</option>          
                    <option value="Tidak Ada Basement">Tidak Ada Basement</option>          
                  </select>
                </div>                   
                <div>
                  <label class="form-label" for="kontruksi_bangunan">Kontruksi Bangunan</label>
                  <select class="form-select" name="kontruksi_bangunan" id="kontruksi_bangunan" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Permanen">Permanen</option>          
                    <option value="Semi Permanen">Semi Permanen</option>          
                  </select>
                </div> 
                <div>
                  <label class="form-label" for="kontruksi_lantai">Kontruksi Lantai</label>
                  <select class="form-select" name="kontruksi_lantai" id="kontruksi_lantai" aria-label="Default select example">
                    <option value="" selected >Pilih...</option>
                    <option value="Keramik" >Keramik</option>
                    <option value="Marmer" >Marmer</option>
                    <option value="Ubin" >Ubin</option>
                    <option value="Tanah" >Tanah</option>
                    <option value="Teraso" >Teraso</option>
                    <option value="Granit" >Granit</option>
                    <option value="Semen" >Semen</option>
                    <option value="Rabat Beton" >Rabat Beton</option>
                    <option value="Flooring Kayu" >Flooring Kayu</option>
                    <option value="Lainnya" >Semen</option>                   
                  </select>
                </div> 
                <div>
                  <label class="form-label" for="kontruksi_dinding">Kontruksi Dinding</label>
                  <select class="form-select" name="kontruksi_dinding" id="kontruksi_dinding" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Bata" >Bata</option>
                    <option value="Batako" >Batako</option>
                    <option value="Kaca" >Kaca</option>
                    <option value="Beton Ringan" >Beton Ringan</option>
                    <option value="Beton" >Beton</option>
                    <option value="Lainnya" >Lainnya</option>
                 
                  </select>
                </div> 
                <div>
                  <label class="form-label" for="kontruksi_atap">Kontruksi atap</label>
                  <select class="form-select" name="kontruksi_atap" id="kontruksi_atap" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Genteng Beton" >Genteng Beton</option>
                    <option value="Genteng Baja" >Genteng Baja</option>
                    <option value="Genteng Sirap" >Genteng Sirap</option>
                    <option value="Genteng Jawa" >Genteng Jawa</option>
                    <option value="Asbes" >Asbes</option>
                    <option value="Seng" >Seng</option>
                    <option value="Dak Beton" >Dak Beton</option>
                    <option value="Galvalum" >Galvalum</option>
                    <option value="Lainnya" >Lainnya</option>                   
                  </select>
                </div> 
                <div>
                  <label class="form-label" for="kontruksi_pondasi">Kontruksi Pondasi</label>
                  <select class="form-select" name="kontruksi_pondasi" id="kontruksi_pondasi" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Beton Bertulang" >Beton Bertulang</option>
                    <option value="Pasangan Batu Kali" >Pasangan Batu Kali</option>
                    <option value="Umpak" >Umpak</option>
                    <option value="Rolag Bata" >Rolag Bata</option>
                    <option value="Kayu" >Kayu</option>
                    <option value="Lainnya" >Lainnya</option>                   
                  </select>
                </div> 
                <div>
                  <label class="form-label" for="versi_btb">Versi BTB</label>
                  <div>
                    <small><i>Mengupdate versi BTB akan mengubah tipe material bangunan. Mohon periksa kembali bobot material pada kotak-kotak isian dibawah ini sebelum menyimpan form.</i></small>
                  </div>
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
                <div class="form-group mb-3">
                  <label for="tipe_spek"><b>Tipikal Bangunan Sesuai Spek BTB MAPPI </b> <span
                          class="text-danger">*</span></label>
                  <select id="tipe_spek" name="tipe_spek" class="form-select" required>
                      <option value="" selected>- Select -</option>
                      <option value="100">Rumah Tinggal Sederhana 1 Lantai</option>
                      <option value="200">Rumah Tinggal Menengah 2 Lantai</option>
                      <option value="300">Rumah Tinggal Mewah 2 Lantai</option>
                      <option value="400">Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                      <option value="500">Bangunan Gudang 1 Lantai</option>
                      <option value="600">Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5 Lantai)</option>
                      <option value="700">Bangunan Gedung Bertingkat Sedang 8 Lantai + 1 Basement (5-8 Lantai)
                      </option>
                      <option value="800">Bangunan Gedung Bertingkat Tinggi 16 Lantai + 2 Basement (&gt;8 Lantai)
                      </option>
                      <option value="900">Bangunan Mall 4 Lantai + 1 Basement</option>
                      <option value="1000">Bangunan Hotel 8 Lantai</option>
                      <option value="1100">Bangunan Apartemen 14 Lantai + 2 Semi Basement</option>
                      <!-- More options... -->
                  </select>
              </div>

              <script>
                // Fungsi untuk menangani perubahan dropdown
                document.getElementById('tipe_spek').addEventListener('change', function() {
                    const selectedValue = this.value;

                    // Sembunyikan semua form terlebih dahulu
                    document.querySelectorAll('#dynamic-content > div').forEach(function(form) {
                        form.style.display = 'none'; // Pastikan semua form disembunyikan
                    });

                    // Tampilkan form sesuai pilihan dan sembunyikan yang lain
                    switch (selectedValue) {
                        case '100':
                            document.getElementById('100').style.display = 'block';
                            break;
                        case '200':
                            document.getElementById('200').style.display = 'block';
                            break;
                        case '300':
                            document.getElementById('300').style.display = 'block';
                            break;
                        case '400':
                            document.getElementById('400').style.display = 'block';
                            break;
                        case '500':
                            document.getElementById('500').style.display = 'block';
                            break;
                        case '600':
                            document.getElementById('600').style.display = 'block';
                            break;
                        case '700':
                            document.getElementById('700').style.display = 'block';
                            break;
                        case '800':
                            document.getElementById('800').style.display = 'block';
                            break;
                        case '900':
                            document.getElementById('900').style.display = 'block';
                            break;
                        case '1000':
                            document.getElementById('1000').style.display = 'block';
                            break;
                        case '1100':
                            document.getElementById('1100').style.display = 'block';
                            break;
                        default:
                                document.getElementById('100').style.display = 'none';
                                document.getElementById('200').style.display = 'none';
                                document.getElementById('300').style.display = 'none';
                                document.getElementById('400').style.display = 'none';
                                document.getElementById('500').style.display = 'none';
                                document.getElementById('600').style.display = 'none';
                                document.getElementById('700').style.display = 'none';
                                document.getElementById('800').style.display = 'none';
                                document.getElementById('900').style.display = 'none';
                                document.getElementById('1000').style.display = 'none';
                                document.getElementById('1100').style.display = 'none';
                            break;
                    }
                });    
            </script>

            <div id="dynamic-content">
                @include('content.form.100')
                @include('content.form.200')
                @include('content.form.300')
                @include('content.form.400')
                @include('content.form.500')
                @include('content.form.600')
                @include('content.form.700')
                @include('content.form.800')
                @include('content.form.900')
                @include('content.form.1000')
                @include('content.form.1100')
            </div>

                <div>
                  <label class="form-label" for="pengguaan_bangunan_saat_ini">Penggunaan Bangunan Saat Ini</label>
                  <input type="text" id="pengguaan_bangunan_saat_ini" name="pengguaan_bangunan_saat_ini" class="form-control" />
                </div>
                <div>
                  <div>
                      <label class="form-label" for="kondisi_lingkungan_khusus">Kondisi Lingkungan Khusus</label>
                  </div>
                  <select class="select2 form-select" name="perlengkapan_bangunan" id="perlengkapan_bangunan" aria-label="Default select example" multiple>
                    <option value="Listrik">Listrik</option>
                    <option value="Telepon">Telepon</option>
                    
                  </select>
                </div>
                <div>
                  <label class="form-label" for="pengguaan_bangunan">Penggunaan Bangunan</label>
                  <input type="text" id="pengguaan_bangunan" name="pengguaan_bangunan" class="form-control" />
                </div>
                <div>
                  <label class="form-label" for="progress_pembangunan">Progres Pembangunan jika aset dalam proses (dalam persen)</label>
                  <input type="text" id="progress_pembangunan" name="progress_pembangunan" class="form-control" />
                </div>
                <div>
                  <label class="form-label" for="kondisi_bangunan">Kondisi Bangunan</label>
                  <select class="form-select" name="kondisi_bangunan" id="kondisi_bangunan" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Terawat" >Terawat</option>
                    <option value="Tidak Terawat" >Tidak Terawat</option>
                 
                  </select>
                </div>
                <div>
                  <label class="form-label" for="pemberi_tugas">Pemberi Tugas</label><br>
                  <small><i>Formulir tambahan untuk melengkapi Laporan kepada Pemberi Tugas.</i></small>
                  <select class="form-select" name="pemberi_tugas" id="pemberi_tugas" aria-label="Default select example" onchange="toggleMandiriForm()">
                    <option value="" selected>Pilih...</option>
                    <option value="Bank Mandiri" >Bank Mandiri</option>                 
                  </select>
                </div> 
                <div id="formMandiriContainer" style="background-color: rgb(244, 241, 241); display: none;" class="p-3 rounded">
                  <label class="form-label" for="form_isi_mandiri">Form Isian Bank Mandiri</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>
                        Jenis Aset                     
                      </th>
                      <th>
                        Peruntukan / Zoning
                      </th>
                    </tr>
                    <tr>            
                        <td>
                          <select name="jenis_aset" id="jenis_aset" class="form-select" onchange="toggleJenisAsetInput()">
                            <option value="">Pilih...</option>
                            <option value="Campuran">Campuran</option>
                            <option value="Gedung Apartemen">Gedung Apartemen</option>
                            <option value="Gedung Kantor">Gedung Kantor</option>
                            <option value="Gudang">Gudang</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Kios">Kios</option>
                            <option value="Los Kerja/Bengkel/Workshop">Los Kerja/Bengkel/Workshop</option>
                            <option value="Pabrik">Pabrik</option>
                            <option value="Penginapan">Penginapan</option>
                            <option value="Ruang Kantor">Ruang Kantor</option>
                            <option value="Ruang Usaha">Ruang Usaha</option>
                            <option value="Ruko/Rukan">Ruko/Rukan</option>
                            <option value="Rumah Tinggal">Rumah Tinggal</option>
                            <option value="Rumah Walet">Rumah Walet</option>
                            <option value="Tanah Kosong">Tanah Kosong</option>
                            <option value="Tempat Ibadah">Tempat Ibadah</option>
                            <option value="Toko">Toko</option>
                            <option value="Unit Apartemen">Unit Apartemen</option>
                            <option value="Kantor & Pabrik">Kantor & Pabrik</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                        </td>
                        <td>
                          <select name="peruntukan" id="peruntukan" class="form-select">
                            <option value="">Pilih...</option>
                            <option value="Belum Ditentukan">Belum Ditentukan</option>
                            <option value="Campuran/Peralihan">Campuran/Peralihan</option>
                            <option value="Industri/Pergudangan">Industri/Pergudangan</option>
                            <option value="Perdagangan dan Jasa Komersial">Perdagangan dan Jasa Komersial</option>
                            <option value="Perumahan">Perumahan</option>
                            <option value="Pertanian">Pertanian</option>
                            <option value="Sarana Kesehatan">Sarana Kesehatan</option>
                            <option value="Sarana Pemerintah">Sarana Pemerintah</option>
                            <option value="Sarana Pendidikan">Sarana Pendidikan</option>
                            <option value="Fasilitas Umum">Fasilitas Umum</option>
                            <option value="Pemukiman Perkotaan">Pemukiman Perkotaan</option>
                          </select>
                        </td>
                    </tr>  
                    <tr id="jenis_aset_lainnya_row" style="display: none;">
                      <th>
                        Jenis Aset Campuran / Lainnya                    
                      </th>
                    </tr> 
                    <tr id="jenis_aset_lainnya_input_row" style="display: none;">
                      <td>
                        <input type="text" name="jenis_aset" id="jenis_aset" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <th>
                        Topografi                    
                      </th>
                      <th>
                        Jabatan (Status) Narasumber
                      </th>
                    </tr>
                    <tr>            
                        <td>
                          <select name="topografi" id="topografi" class="form-select">
                            <option value="">Pilih...</option>
                            <option value="Datar">Datar</option>
                            <option value="Miring">Miring</option>
                            <option value="Berbukit">Berbukit</option>
                            <option value="Terasering">Terasering</option>
                          </select>
                        </td>
                        <td>
                            <input type="text" name="jabatan_narasumber" id="jabatan_narasumber" class="form-control">
                        </td>
                    </tr>                           
                  </table>
                </div>   
                <div>
                  <label class="form-label" for="status_data_pembanding">Status Data Pembanding</label>
                  <select class="form-select" name="status_data_pembanding" id="status_data_pembanding" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Lengkap" >Lengkap</option>
                    <option value="Tidak Lengkap" >Tidak Lengkap</option>                 
                  </select>
                </div>
              </div>
            </div>
            <div>
              <button class="btn btn-success btn-submit mt-2" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Default Icons Wizard -->
  </div>
  
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
  var map = L.map('map').setView([1.966576931124596, 100.049384575934738], 13)
          
          var accessToken = 'pk.eyJ1IjoicmVkb2syNSIsImEiOiJjbG1zdzZ1Y2MwZHA2MmxxYzdvYm12cTlwIn0.2GTgMV076x87YJQJzM34jg';
  
          var satelliteLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + accessToken, {
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
  keteranganField.style.display = 'none';
  function toggleKeteranganField() {
      const checkbox = document.getElementById('id_jenis_bangunan');
      const keteranganField = document.getElementById('keteranganField');
      
      if (checkbox.checked) {
          keteranganField.style.display = 'block'; // Tampilkan field
      } else {
          keteranganField.style.display = 'none'; // Sembunyikan field
      }
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
  $(document).ready(function () {
      // Inisialisasi Select2
      $('#kondisi_lingkungan_khusus').select2();

      // Event listener untuk memantau perubahan pilihan
      $('#kondisi_lingkungan_khusus').on('change', function () {
          const selectedValues = $(this).val(); // Mendapatkan nilai yang dipilih sebagai array
          if (selectedValues && selectedValues.includes('Lainnya')) {
              $('#lainnyaInputContainer').show(); // Tampilkan input "Keterangan Tambahan Lainnya"
          } else {
              $('#lainnyaInputContainer').hide(); // Sembunyikan input
          }
      });
  });
</script>
<script>
  function toggleJenisAsetInput() {
      const jenisAsetSelect = document.getElementById('jenis_aset');
      const jenisAsetLainnyaRow = document.getElementById('jenis_aset_lainnya_row');
      const jenisAsetLainnyaInputRow = document.getElementById('jenis_aset_lainnya_input_row');

      if (jenisAsetSelect.value === 'Lainnya') {
          jenisAsetLainnyaRow.style.display = 'table-row';
          jenisAsetLainnyaInputRow.style.display = 'table-row';
      } else {
          jenisAsetLainnyaRow.style.display = 'none';
          jenisAsetLainnyaInputRow.style.display = 'none';
      }
  }
</script>
<script>
  // Fungsi untuk menampilkan atau menyembunyikan Form Isian Bank Mandiri
  function toggleMandiriForm() {
      const pemberiTugasSelect = document.getElementById('pemberi_tugas');
      const formMandiriContainer = document.getElementById('formMandiriContainer');

      if (pemberiTugasSelect.value === "Bank Mandiri") {
          formMandiriContainer.style.display = 'block'; // Tampilkan Form Isian Bank Mandiri
      } else {
          formMandiriContainer.style.display = 'none'; // Sembunyikan Form Isian Bank Mandiri
      }
  }

</script>

<script>
  const canvas = document.getElementById('drawingCanvas');
  const ctx = canvas.getContext('2d');

  let currentX = canvas.width / 2;
  let currentY = canvas.height / 2;
  const scale = 20; // 1 meter = 20px
  const points = []; // Store points for polygon
  const lines = []; // Store lines for undo functionality

  // Fungsi untuk menggambar titik awal
  function drawPoint(x, y) {
      ctx.beginPath();
      ctx.arc(x, y, 3, 0, 2 * Math.PI);
      ctx.fillStyle = 'red';
      ctx.fill();
  }

  // Gambar titik awal
  drawPoint(currentX, currentY);

  // Fungsi untuk menggambar garis
  function drawLine(x1, y1, x2, y2, length) {
      ctx.beginPath();
      ctx.moveTo(x1, y1);
      ctx.lineTo(x2, y2);
      ctx.strokeStyle = 'blue';
      ctx.lineWidth = 2;
      ctx.stroke();

      // Menambahkan panjang garis di atasnya
      const midX = (x1 + x2) / 2;
      const midY = (y1 + y2) / 2;
      ctx.fillStyle = 'black';
      ctx.font = '12px Arial';
      ctx.fillText(`${length.toFixed(2)} m`, midX, midY - 5);
  }

  // Fungsi untuk menghitung luas poligon
  function calculatePolygonArea(points) {
      let area = 0;
      const n = points.length;
      for (let i = 0; i < n; i++) {
          const x1 = points[i].x;
          const y1 = points[i].y;
          const x2 = points[(i + 1) % n].x;
          const y2 = points[(i + 1) % n].y;
          area += (x1 * y2 - x2 * y1);
      }
      return Math.abs(area / 2) / (scale * scale); // Convert from px² to m²
  }

  // Fungsi untuk memindahkan garis ke arah tertentu
  function move(direction) {
      const length = parseFloat(document.getElementById('line_length').value) || 0;
      const angle = parseFloat(document.getElementById('angle').value) || 0;
      const radians = (angle * Math.PI) / 180; // Konversi derajat ke radian
      const pixelLength = length * scale; // Konversi meter ke pixel

      let newX = currentX;
      let newY = currentY;

      if (direction === 'up') {
          newX += pixelLength * Math.sin(radians);
          newY -= pixelLength * Math.cos(radians);
      } else if (direction === 'down') {
          newX -= pixelLength * Math.sin(radians);
          newY += pixelLength * Math.cos(radians);
      } else if (direction === 'left') {
          newX -= pixelLength * Math.cos(radians);
          newY -= pixelLength * Math.sin(radians);
      } else if (direction === 'right') {
          newX += pixelLength * Math.cos(radians);
          newY += pixelLength * Math.sin(radians);
      }

      drawLine(currentX, currentY, newX, newY, length);
      lines.push({ x1: currentX, y1: currentY, x2: newX, y2: newY });
      points.push({ x: newX, y: newY });
      currentX = newX;
      currentY = newY;

      // Gambar titik di posisi baru
      drawPoint(currentX, currentY);

      // Hitung luas jika poligon memiliki lebih dari 2 titik
      if (points.length > 2) {
          const area = calculatePolygonArea(points);
          document.getElementById('polygon_area').value = area.toFixed(2);
      }
  }

  // Fungsi untuk menghapus garis terakhir
  document.getElementById('clearLastLineButton').addEventListener('click', () => {
      if (lines.length > 0) {
          lines.pop();
          points.pop();
          if (points.length > 0) {
              currentX = points[points.length - 1].x;
              currentY = points[points.length - 1].y;
          } else {
              currentX = canvas.width / 2;
              currentY = canvas.height / 2;
          }
          redrawCanvas();
      }
  });

  // Fungsi untuk menggambar ulang canvas
  function redrawCanvas() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      drawPoint(canvas.width / 2, canvas.height / 2);

      for (const line of lines) {
          drawLine(line.x1, line.y1, line.x2, line.y2, Math.hypot(line.x2 - line.x1, line.y2 - line.y1) / scale);
      }

      // Hitung luas jika poligon memiliki lebih dari 2 titik
      if (points.length > 2) {
          const area = calculatePolygonArea(points);
          document.getElementById('polygon_area').value = area.toFixed(2);
      } else {
          document.getElementById('polygon_area').value = '';
      }
  }
</script>
<script>
  function addRow() {
      const table = document.getElementById('luas_pintu_jendela').getElementsByTagName('tbody')[0];
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
      const table = document.getElementById('luas_pintu_jendela').getElementsByTagName('tbody')[0];
      if (table.rows.length > 1) {
          const row = button.parentNode.parentNode;
          table.deleteRow(row.rowIndex - 1); // Adjust for header row
          updateRowNumbers();
      }
  }

  function updateRowNumbers() {
      const rows = document.querySelectorAll('#luas_pintu_jendela .row-number');
      rows.forEach((cell, index) => {
          cell.textContent = index + 1;
      });
  }
</script>
<script>
  function addRow() {
      const table = document.getElementById('luas_dinding').getElementsByTagName('tbody')[0];
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
      const table = document.getElementById('luas_dinding').getElementsByTagName('tbody')[0];
      if (table.rows.length > 1) {
          const row = button.parentNode.parentNode;
          table.deleteRow(row.rowIndex - 1); // Adjust for header row
          updateRowNumbers();
      }
  }

  function updateRowNumbers() {
      const rows = document.querySelectorAll('#luas_dinding .row-number');
      rows.forEach((cell, index) => {
          cell.textContent = index + 1;
      });
  }
</script>


@endsection
