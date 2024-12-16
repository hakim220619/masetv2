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
<h4>Data Pembanding – Tanah dan Bangunan</h4>
  <!-- Default -->
  <div class="row">  
    <!-- Default Icons Wizard -->
    <div class="col-12 mb-4">
      <div class="bs-stepper wizard-icons wizard-icons-example mt-2">
        <div class="bs-stepper-header">
          <div class="step" data-target="#account-details">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-account.svg#wizardAccount')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Step 1</span>
            </button>
          </div>
          <div class="line">
            <i class="ti ti-chevron-right"></i>
          </div>
          <div class="step" data-target="#personal-info">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 58 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-personal.svg#wizardPersonal')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Step 2</span>
            </button>
          </div>
          <div class="line">
            <i class="ti ti-chevron-right"></i>
          </div>
          <div class="step" data-target="#address">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-address.svg#wizardAddress')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Step 3</span>
            </button>
          </div>
          <div class="line">
            <i class="ti ti-chevron-right"></i>
          </div>
          <div class="step" data-target="#social-links">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-social-link.svg#wizardSocialLink')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Step 4</span>
            </button>
          </div>
          <div class="line">
            <i class="ti ti-chevron-right"></i>
          </div>
          <div class="step" data-target="#review-submit">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-icon">
                <svg viewBox="0 0 54 54">
                  <use xlink:href="{{asset('assets/svg/icons/form-wizard-submit.svg#wizardSubmit')}}"></use>
                </svg>
              </span>
              <span class="bs-stepper-label">Review & Submit</span>
            </button>
          </div>
        </div>
        <div class="bs-stepper-content">
          <form method="POST" action="{{ route('add_pembanding_bangunan') }}" enctype="multipart/form-data">
            <!-- Account Details -->
            @csrf
            <div id="account-details" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 1</h6>
                <small>Enter Step 1.</small>
              </div>
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
                  <input type="text" id="jenis_properti" name="jenis_properti" class="form-control" placeholder="Contoh : Rumah Tinggal, Ruko, dll" />
                </div> 
                <div>
                  <label class="form-label" for="jenis_bangunan">Jenis Bangunan</label> <br>
                  <input type="radio" id="jenis_bangunan" name="jenis_bangunan" class="form-check-input" />
                  <label class="form-check-label" for="jenis_bangunan">
                    Ruko/Rukan
                  </label>
                </div> 
                <div>
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
                <div>
                  <label class="form-label" for="foto_lainnya">Foto Lainnya (tabel)</label>
                  <input type="file" id="foto_lainnya" name="foto_lainnya" class="form-control" />
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="Nilai Perolehan">Nilai Perolehan / NJOP / PBB</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Tahun</th>
                      <th>Nilai Perolehan / NJOP (Rp)</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="tahun" name="tahun" class="form-control" /></td>
                      <td><input type="number" id="nilai_perolehan" name="nilai_perolehan" class="form-control" /></td>
                    </tr>
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
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev" disabled type="button"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next" type="button"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Personal Info -->
            <div id="personal-info" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 2</h6>
                <small>Enter Step 2.</small>
              </div>
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
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev" type="button"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next" type="button"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Address -->
            <div id="address" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 3</h6>
                <small>Enter Step 3.</small>
              </div>
              <div class="row g-3">
                <div>
                  <label class="form-label" for="bentuk_tanah">Bentuk Tanah</label>
                  <input type="text" id="bentuk_tanah" name="bentuk_tanah" class="form-control" placeholder="Persegi Panjang" />
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
                <div>
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
                                           
                               
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev" type="button"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button class="btn btn-primary btn-next" type="button"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Social Links -->
            <div id="social-links" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 4</h6>
                <small>Enter Step 4.</small>
              </div>
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
                  <label class="form-label" for="kontruksi_pondasi">Kontruksi Pondasi</label>
                  <select class="form-select" name="kontruksi_pondasi" id="kontruksi_pondasi" aria-label="Default select example">
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
                <div>
                  <label class="form-label" for="tipikal_bangunan">Tipikal Bangunan Sesuai Spek BTB MAPPI</label>
                  <select class="form-select" name="tipikal_bangunan" id="tipikal_bangunan" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Rumah Tinggal Sederhana 1 Lantai">Rumah Tinggal Sederhana 1 Lantai</option>
                    <option value="Rumah Tinggal Menengah 2 Lantai">Rumah Tinggal Menengah 2 Lantai</option>
                    <option value="Rumah Tinggal Mewah 2 Lantai">Rumah Tinggal Mewah 2 Lantai</option>
                 
                  </select>
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
                  <select class="form-select" name="pemberi_tugas" id="pemberi_tugas" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Bank Mandiri" >Bank Mandiri</option>
                 
                  </select>
                </div> 
                <div>
                  <label class="form-label" for="status_data_pembanding">Status Data Pembanding</label>
                  <select class="form-select" name="status_data_pembanding" id="status_data_pembanding" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Lengkap" >Lengkap</option>
                    <option value="Tidak Lengkap" >Tidak Lengkap</option>
                 
                  </select>
                </div>

              
                <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-label-secondary btn-prev" type="button"> <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button type="button" class="btn btn-primary btn-next" id="btn-review"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                </div>
              </div>
            </div>
            <!-- Review -->
            <div id="review-submit" class="content">
  
              <p class="fw-medium mb-2">Step 1</p>
              <table class="table table-borderless">
                  <tr>
                    <td style="font-weight: 800">Nomor Induk Pembanding</td>
                    <td>:</td>
                    <td><span id="review-nip"></span></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Nomor Induk Bangunan</td>
                    <td>:</td>
                    <td><span id="review-nib"></span></td>
                  </tr>   
                  <tr>
                    <td style="font-weight: 800">Nama Tanah dan Bangunan</td>
                    <td>:</td>
                    <td><span id="review-nama_tanah_n_bangunan"></span></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Foto Tampak Depan</td>
                    <td>:</td>
                    <td><img id="review-foto_tampak_depan" src="" height="150" width="150" alt="Foto Tampak Depan" style="max-width: 100%; height: auto;"/></td>
                  </tr>               
                  <tr>
                    <td style="font-weight: 800">Alamat</td>
                    <td>:</td>
                    <td><span id="review-alamat"></span></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Koordinat</td>
                    <td>:</td>
                    <td><span id="review-lat"></span>,<span id="review-long"></span></td>
                  </tr>
                  
                  
                  <tr>
                    <td style="font-weight: 800">Foto Tampak Sisi Kiri</td>
                    <td>:</td>
                    <td><img id="review-foto_tampak_sisi_kiri" src="" height="150" width="150" alt="Foto Sisi Kiri" style="max-width: 100%; height: auto;"/></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Foto Tampak Sisi Kanan</td>
                    <td>:</td>
                    <td><img id="review-foto_tampak_sisi_kanan" src="" height="150" width="150" alt="Foto Sisi Kanan" style="max-width: 100%; height: auto;"/></td>
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Foto Lainnya</td>
                    <td>:</td>
                    <td><img id="review-foto_lainnya" src="" height="150" width="150" alt="Foto Lainnya" style="max-width: 100%; height: auto;"/></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Nama Narasumber</td>
                    <td>:</td>
                    <td><span id="review-nama_narsum"></span></td>                    
                  </tr>
                  <tr>
                    <td style="font-weight: 800">Telepon</td>
                    <td>:</td>
                    <td><span id="review-telepon"></span></td>                  
                  </tr>
              </table>
              <hr>
              <p class="fw-medium mb-2">Step 2</p>
              <table class="table table-borderless">
                <tr>
                  <td style="font-weight: 800">Jenis Dokumen Hak Tanah</td>
                  <td>:</td>
                  <td><span id="review-jenis_dok_hak_tanah"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Peruntukan Kawasan</td>
                  <td>:</td>
                  <td><span id="review-perutuntukan_kawasan"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Jenis Data</td>
                  <td>:</td>
                  <td><span id="review-jenis_data"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Tanggal Penawaran / Waktu Transaksi</td>
                  <td>:</td>
                  <td><span id="review-tgl_penawaran"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Sumber Data</td>
                  <td>:</td>
                  <td><span id="review-sumber_data"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas Tanah (m2)</td>
                  <td>:</td>
                  <td><span id="review-luas_tanah"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Harga Penawaran/Transaksi (Rp)</td>
                  <td>:</td>
                  <td><span id="review-harga_penawaran"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Diskon (%)</td>
                  <td>:</td>
                  <td><span id="review-diskon"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Harga Sewa per Tahun (Rp/tahun)</td>
                  <td>:</td>
                  <td><span id="review-harga_sewa_per_tahun"></span></td>                     
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Penyesuaian Elemen Perbandingan</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Syarat Pembiayaan Batasan dilakukan pelunasan pembayaran (Kelunakan)</td>
                  <td>:</td>
                  <td><span id="review-pep_pembiayaan"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Kondisi Penjualan Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan Kondisi Pemaksa</td>
                  <td>:</td>
                  <td><span id="review-pep_penjualan"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Pengeluaran yang dilakukan segera setelah pembelian Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke fungsi atau peruntukan awal atau seharusnya</td>
                  <td>:</td>
                  <td><span id="review-pep_pengeluaran"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Kondisi Pasar Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga penawaran (Menggunakan Indikator Waktu Penawaran / Transaksi)</td>
                  <td>:</td>
                  <td><span id="review-pep_pasar"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Row Jalan (m)</td>
                  <td>:</td>
                  <td><span id="review-row_jalan"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Jalan</td>
                  <td>:</td>
                  <td><span id="review-tipe_jalan"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Kapasitas Jalan</td>
                  <td>:</td>
                  <td><span id="review-kapasitas_jalan"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Penggunaan Lahan Lingkungan Eksisting</td>
                  <td>:</td>
                  <td><span id="review-pengguna_lahan_lingkungan_eksisting"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Letak / Posisi Obyek</td>
                  <td>:</td>
                  <td><span id="review-letak_posisi_obyek"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Lokasi Aset</td>
                  <td>:</td>
                  <td><span id="review-letak_posisi_aset"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Bentuk Tanah</td>
                  <td>:</td>
                  <td><span id="review-bentuk_tanah"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Lebar Muka Tanah (m)</td>
                  <td>:</td>
                  <td><span id="review-lebar_muka_tanah"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Ketinggian Tanah dari Muka Jalan (m)</td>
                  <td>:</td>
                  <td><span id="review-ketinggian_tanah_dr_muka_jln"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Topografi / Elevasi</td>
                  <td>:</td>
                  <td><span id="review-topografi"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Tingkat Hunian (%)</td>
                  <td>:</td>
                  <td><span id="review-tingkat_hunian"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Kondisi Lingkungan Khusus</td>
                  <td>:</td>
                  <td><span id="review-kondisi_lingkungan_khusus"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Gambaran Objek terhadap Wilayah dan Lingkungan</td>
                  <td>:</td>
                  <td><span id="review-gambaran_objek"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Bentuk Bangunan</td>
                  <td>:</td>
                  <td><span id="review-bentuk_bangunan"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Jumlah Lantai</td>
                  <td>:</td>
                  <td><span id="review-jumlah_lantai"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Konstruksi Bangunan</td>
                  <td>:</td>
                  <td><span id="review-kontruksi_bangunan"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Konstruksi Lantai</td>
                  <td>:</td>
                  <td><span id="review-kontruksi_lantai"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Konstruksi Dinding</td>
                  <td>:</td>
                  <td><span id="review-kontruksi_dinding"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Konstruksi Atap</td>
                  <td>:</td>
                  <td><span id="review-kontruksi_atap"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Konstruksi Pondasi</td>
                  <td>:</td>
                  <td><span id="review-kontruksi_pondasi"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Versi BTB</td>
                  <td>:</td>
                  <td><span id="review-versi_btb"></span></td>                               
                </tr>                
                <tr>
                  <td style="font-weight: 800">Tipikal Bangunan Sesuai Spek BTB MAPPI</td>
                  <td>:</td>
                  <td><span id="review-tipikal_bangunan"></span></td>  
                  <td></td>
                  <td></td> 
                  <td style="font-weight: 800">Tahun Dibangun</td>
                  <td>:</td>
                  <td><span id="review-tahun_dibangun"></span></td>                               
                </tr>                
              </table>
              <hr>
              <p class="fw-medium mb-2">Step 3</p>
              <table class="table table-borderless">
                <tr>
                  <td style="font-weight: 800">Sumber Informasi Tahun Dibangun</td>
                  <td>:</td>
                  <td><span id="review-sumber_info_thn_dibangun"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Tahun Renovasi</td>
                  <td>:</td>
                  <td><span id="review-tahun_renovasi"></span></td>                    
                </tr>               
                <tr>
                  <td style="font-weight: 800">Kondisi Bangunan Secara Visual</td>
                  <td>:</td>
                  <td><span id="review-kondisi_bangunan_scr_visual"></span></td>                                      
                </tr>               
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Luas Bangunan Fisik</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Nomor/Nama Lantai (Area)</td>
                  <td>:</td>
                  <td><span id="review-lbf_no_or_nama_lantai"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Faktor Pengali Luas</td>
                  <td>:</td>
                  <td><span id="review-lbf_faktor_pengali_luas"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Luas Lantai (m2)</td>
                  <td>:</td>
                  <td><span id="review-lbf_luas_lantai"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas Bangunan Menurut IMB</td>
                  <td>:</td>
                  <td><span id="review-luas_bangunan_menurut_imb"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Luas Pintu dan Jendela</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Nama Area</td>
                  <td>:</td>
                  <td><span id="review-lpj_nama_area"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas (m2)</td>
                  <td>:</td>
                  <td><span id="review-lpj_luas"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Luas Dinding</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Nama Area</td>
                  <td>:</td>
                  <td><span id="review-ld_nama_area"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas (m2)</td>
                  <td>:</td>
                  <td><span id="review-ld_luas"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Luas Rangka Atap Datar</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Nama Area</td>
                  <td>:</td>
                  <td><span id="review-lrad_nama_area"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas (m2)</td>
                  <td>:</td>
                  <td><span id="review-lrad_luas"></span></td>                    
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Luas Atap Datar</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Nama Area</td>
                  <td>:</td>
                  <td><span id="review-lad_nama_area"></span></td> 
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Luas (m2)</td>
                  <td>:</td>
                  <td><span id="review-lad_luas"></span></td>                   
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tipe Pondasi Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Batu Kali</td>
                  <td>:</td>
                  <td><span id="review-tpe_batu_kali"></span></td> 
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot Pondasi Batu Kali (%)</td>
                  <td>:</td>
                  <td><span id="review-tpe_bobot_pondasi"></span></td>                   
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tambah Tipe Pondasi Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttpe_tipe_material"></span></td> 
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttpe_bobot"></span></td>                   
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tipe Struktur Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Beton Bertulang</td>
                  <td>:</td>
                  <td><span id="review-tse_beton_bertulang"></span></td> 
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot Struktur Beton Bertulang(%)</td>
                  <td>:</td>
                  <td><span id="review-tse_bobot_struktur_beton_bertulng"></span></td>                   
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tambah Tipe Struktur Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttse_tipe_material"></span></td> 
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttse_bobot"></span></td>                   
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Rangka Atap Eksisting</td>
                  <td>:</td>
                  <td><span id="review-tipe_rangka_atap_eksisting"></span></td>                 
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tambah Tipe Rangka Atap Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttrae_tipe_material"></span></td> 
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttrae_bobot"></span></td>                   
                </tr>
              </table>
              <hr>
              <p class="fw-medium mb-2">Step 4</p>
              <table class="table table-borderless">
                <tr>
                  <td style="font-weight: 800">Tipe Penutup Atap Eksisting</td>
                  <td>:</td>
                  <td><span id="review-tipe_penutup_atap_eksisting"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot Penutup Atap(%)</td>
                  <td>:</td>
                  <td><span id="review-bobot_penutup_atap"></span></td>               
                </tr>
                <tr>                                   
                  <td style="font-weight: 800">Tipe Plafon Eksisting</td>
                  <td>:</td>
                  <td><span id="review-tipe_plafon_eksisting"></span></td>             
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tambah Plafon Eksisting</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-tampe_tipe_material"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-tampe_bobot"></span></td>               
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Dinding Existing</td>
                  <td>:</td>
                  <td><span id="review-tipe_dinding_eksisting"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot Dinding(%)</td>
                  <td>:</td>
                  <td><span id="review-tde_bobot"></span></td>               
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tambah Tipe Dinding Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttde_tipe_material"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttde_bobot"></span></td>               
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Pelapis Dinding Eksisting</td>
                  <td>:</td>
                  <td><span id="review-tipe_pelapis_dinding_eksisting"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot Pelapis Dinding Cat (Diplester dan Diaci)</td>
                  <td>:</td>
                  <td><span id="review-ttde_bobot_pdc"></span></td>               
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tambah Tipe Pelapis Dinding Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttpde_tipe_material"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttpde_bobot"></span></td>               
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Pintu & Jendela Eksisting</td>
                  <td>:</td>
                  <td><span id="review-tipe_pintu_n_jendela_eksisting"></span></td>                
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tambah Tipe Pintu & Jendela Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttpdje_tipe_material"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttpdje_bobot"></span></td>               
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Lantai Eksisting</td>
                  <td>:</td>
                  <td><span id="review-tipe_lantai_eksisting"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot Lantai(%)</td>
                  <td>:</td>
                  <td><span id="review-tle_bobot_lantai"></span></td>               
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Tambah Tipe Lantai Existing</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Tipe Material</td>
                  <td>:</td>
                  <td><span id="review-ttle_tipe_material"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Bobot(%)</td>
                  <td>:</td>
                  <td><span id="review-ttle_bobot"></span></td>               
                </tr>
                <tr>
                  <td colspan="8" class="fs-5 fw-bold">Perlengkapan Bangunan</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Perlengkapan Bangunan</td>
                  <td>:</td>
                  <td><span id="review-perlengkapan_bangunan"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Penggunaan Bangunan</td>
                  <td>:</td>
                  <td><span id="review-penggunaan_bangunan"></span></td>               
                </tr>
                <tr>
                  <td style="font-weight: 800">Kondisi Bangunan</td>
                  <td>:</td>
                  <td><span id="review-kondisi_bangunan"></span></td>    
                  <td></td>
                  <td></td>  
                  <td style="font-weight: 800">Status Data Pembanding</td>
                  <td>:</td>
                  <td><span id="review-status_data_pembanding"></span></td>               
                </tr>
              </table>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev" type="button"> <i class="ti ti-arrow-left me-sm-1"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-success btn-submit" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Default Icons Wizard -->
  </div>
  
<script>
  document.querySelector('#btn-review').addEventListener('click', function() {
    // Step 1
    document.getElementById('review-nip').innerHTML = document.getElementById('nip').value    
    document.getElementById('review-nib').innerHTML = document.getElementById('nib').value    
    document.getElementById('review-nama_tanah_n_bangunan').innerHTML = document.getElementById('nama_tanah_n_bangunan').value    
    document.getElementById('review-alamat').innerHTML = document.getElementById('alamat').value    
    document.getElementById('review-lat').innerHTML = document.getElementById('lat').value    
    document.getElementById('review-long').innerHTML = document.getElementById('long').value    
    const foto_tampak_depan = document.getElementById('foto_tampak_depan');
        if (foto_tampak_depan.files && foto_tampak_depan.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('review-foto_tampak_depan').src = e.target.result;
          }
          reader.readAsDataURL(foto_tampak_depan.files[0]);
        } else {
          document.getElementById('review-foto_tampak_depan').src = '';
        }

    const foto_tampak_sisi_kiri = document.getElementById('foto_tampak_sisi_kiri');
        if (foto_tampak_sisi_kiri.files && foto_tampak_sisi_kiri.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('review-foto_tampak_sisi_kiri').src = e.target.result;
          }
          reader.readAsDataURL(foto_tampak_sisi_kiri.files[0]);
        } else {
          document.getElementById('review-foto_tampak_sisi_kiri').src = '';
        }
    const foto_tampak_sisi_kanan = document.getElementById('foto_tampak_sisi_kanan');
        if (foto_tampak_sisi_kanan.files && foto_tampak_sisi_kanan.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('review-foto_tampak_sisi_kanan').src = e.target.result;
          }
          reader.readAsDataURL(foto_tampak_sisi_kanan.files[0]);
        } else {
          document.getElementById('review-foto_tampak_sisi_kanan').src = '';
        }
    const foto_lainnya = document.getElementById('foto_lainnya');
        if (foto_lainnya.files && foto_lainnya.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('review-foto_lainnya').src = e.target.result;
          }
          reader.readAsDataURL(foto_lainnya.files[0]);
        } else {
          document.getElementById('review-foto_lainnya').src = '';
        }
    document.getElementById('review-nama_narsum').innerHTML = document.getElementById('nama_narsum').value
    document.getElementById('review-telepon').innerHTML = document.getElementById('telepon').value
    document.getElementById('review-jenis_dok_hak_tanah').innerHTML = document.getElementById('jenis_dok_hak_tanah').value
    document.getElementById('review-perutuntukan_kawasan').innerHTML = document.getElementById('perutuntukan_kawasan').value
    document.getElementById('review-jenis_data').innerHTML = document.getElementById('jenis_data').value
    document.getElementById('review-tgl_penawaran').innerHTML = document.getElementById('tgl_penawaran').value
    document.getElementById('review-sumber_data').innerHTML = document.getElementById('sumber_data').value
    document.getElementById('review-luas_tanah').innerHTML = document.getElementById('luas_tanah').value
    document.getElementById('review-harga_penawaran').innerHTML = document.getElementById('harga_penawaran').value
    document.getElementById('review-harga_sewa_per_tahun').innerHTML = document.getElementById('harga_sewa_per_tahun').value
    document.getElementById('review-diskon').innerHTML = document.getElementById('diskon').value
    document.getElementById('review-pep_pembiayaan').innerHTML = document.getElementById('pep_pembiayaan').value
    document.getElementById('review-pep_penjualan').innerHTML = document.getElementById('pep_penjualan').value
    document.getElementById('review-pep_pengeluaran').innerHTML = document.getElementById('pep_pengeluaran').value
    document.getElementById('review-letak_posisi_aset').innerHTML = document.getElementById('letak_posisi_aset').value
    document.getElementById('review-pep_pasar').innerHTML = document.getElementById('pep_pasar').value
    document.getElementById('review-bentuk_bangunan').innerHTML = document.getElementById('bentuk_bangunan').value
    document.getElementById('review-row_jalan').innerHTML = document.getElementById('row_jalan').value
    document.getElementById('review-tipe_jalan').innerHTML = document.getElementById('tipe_jalan').value
    document.getElementById('review-kapasitas_jalan').innerHTML = document.getElementById('kapasitas_jalan').value
    document.getElementById('review-pengguna_lahan_lingkungan_eksisting').innerHTML = document.getElementById('pengguna_lahan_lingkungan_eksisting').value
    document.getElementById('review-letak_posisi_obyek').innerHTML = document.getElementById('letak_posisi_obyek').value
    document.getElementById('review-letak_posisi_aset').innerHTML = document.getElementById('letak_posisi_aset').value
    document.getElementById('review-bentuk_tanah').innerHTML = document.getElementById('bentuk_tanah').value
    document.getElementById('review-lebar_muka_tanah').innerHTML = document.getElementById('lebar_muka_tanah').value
    // Step 2
    document.getElementById('review-ketinggian_tanah_dr_muka_jln').innerHTML = document.getElementById('ketinggian_tanah_dr_muka_jln').value
    document.getElementById('review-topografi').innerHTML = document.getElementById('topografi').value
    document.getElementById('review-tingkat_hunian').innerHTML = document.getElementById('tingkat_hunian').value 
    document.getElementById('review-kondisi_lingkungan_khusus').innerHTML = document.getElementById('kondisi_lingkungan_khusus').value
    document.getElementById('review-gambaran_objek').innerHTML = document.getElementById('gambaran_objek').value
    document.getElementById('review-bentuk_bangunan').innerHTML = document.getElementById('bentuk_bangunan').value
    document.getElementById('review-jumlah_lantai').innerHTML = document.getElementById('jumlah_lantai').value
    document.getElementById('review-kontruksi_bangunan').innerHTML = document.getElementById('kontruksi_bangunan').value
    document.getElementById('review-kontruksi_lantai').innerHTML = document.getElementById('kontruksi_lantai').value
    document.getElementById('review-kontruksi_dinding').innerHTML = document.getElementById('kontruksi_dinding').value
    document.getElementById('review-kontruksi_atap').innerHTML = document.getElementById('kontruksi_atap').value
    document.getElementById('review-kontruksi_pondasi').innerHTML = document.getElementById('kontruksi_pondasi').value
    document.getElementById('review-versi_btb').innerHTML = document.getElementById('versi_btb').value
    document.getElementById('review-tipikal_bangunan').innerHTML = document.getElementById('tipikal_bangunan').value
    document.getElementById('review-tahun_dibangun').innerHTML = document.getElementById('tahun_dibangun').value
    document.getElementById('review-sumber_info_thn_dibangun').innerHTML = document.getElementById('sumber_info_thn_dibangun').value
    document.getElementById('review-tahun_renovasi').innerHTML = document.getElementById('tahun_renovasi').value
    document.getElementById('review-kondisi_bangunan_scr_visual').innerHTML = document.getElementById('kondisi_bangunan_scr_visual').value
    // Step 3
    document.getElementById('review-lbf_no_or_nama_lantai').innerHTML = document.getElementById('lbf_no_or_nama_lantai').value
    document.getElementById('review-lbf_faktor_pengali_luas').innerHTML = document.getElementById('lbf_faktor_pengali_luas').value
    document.getElementById('review-lbf_luas_lantai').innerHTML = document.getElementById('lbf_luas_lantai').value
    document.getElementById('review-luas_bangunan_menurut_imb').innerHTML = document.getElementById('luas_bangunan_menurut_imb').value
    document.getElementById('review-lpj_nama_area').innerHTML = document.getElementById('lpj_nama_area').value
    document.getElementById('review-lpj_luas').innerHTML = document.getElementById('lpj_luas').value
    document.getElementById('review-ld_nama_area').innerHTML = document.getElementById('ld_nama_area').value
    document.getElementById('review-ld_luas').innerHTML = document.getElementById('ld_luas').value
    document.getElementById('review-lrad_nama_area').innerHTML = document.getElementById('lrad_nama_area').value
    document.getElementById('review-lrad_luas').innerHTML = document.getElementById('lrad_luas').value
    document.getElementById('review-lad_nama_area').innerHTML = document.getElementById('lad_nama_area').value
    document.getElementById('review-lad_luas').innerHTML = document.getElementById('lad_luas').value
    document.getElementById('review-tpe_batu_kali').innerHTML = document.getElementById('tpe_batu_kali').value
    // Step 4
    document.getElementById('review-tpe_bobot_pondasi').innerHTML = document.getElementById('tpe_bobot_pondasi').value
    document.getElementById('review-ttpe_tipe_material').innerHTML = document.getElementById('ttpe_tipe_material').value
    document.getElementById('review-ttpe_bobot').innerHTML = document.getElementById('ttpe_bobot').value
    document.getElementById('review-tse_beton_bertulang').innerHTML = document.getElementById('tse_beton_bertulang').value
    document.getElementById('review-tse_bobot_struktur_beton_bertulng').innerHTML = document.getElementById('tse_bobot_struktur_beton_bertulng').value
    document.getElementById('review-ttse_tipe_material').innerHTML = document.getElementById('ttse_tipe_material').value
    document.getElementById('review-ttse_bobot').innerHTML = document.getElementById('ttse_bobot').value
    document.getElementById('review-tipe_rangka_atap_eksisting').innerHTML = document.getElementById('tipe_rangka_atap_eksisting').value
  
    document.getElementById('review-ttrae_tipe_material').innerHTML = document.getElementById('ttrae_tipe_material').value
    document.getElementById('review-ttrae_bobot').innerHTML = document.getElementById('ttrae_bobot').value
    document.getElementById('review-tipe_penutup_atap_eksisting').innerHTML = document.getElementById('tipe_penutup_atap_eksisting').value
    document.getElementById('review-bobot_penutup_atap').innerHTML = document.getElementById('bobot_penutup_atap').value
    document.getElementById('review-tipe_plafon_eksisting').innerHTML = document.getElementById('tipe_plafon_eksisting').value
    document.getElementById('review-tampe_bobot').innerHTML = document.getElementById('tampe_bobot').value
    document.getElementById('review-tampe_tipe_material').innerHTML = document.getElementById('tampe_tipe_material').value
    document.getElementById('review-tipe_dinding_eksisting').innerHTML = document.getElementById('tipe_dinding_eksisting').value
    document.getElementById('review-tde_bobot').innerHTML = document.getElementById('tde_bobot').value
    document.getElementById('review-ttde_bobot').innerHTML = document.getElementById('ttde_bobot').value
    document.getElementById('review-tipe_pelapis_dinding_eksisting').innerHTML = document.getElementById('tipe_pelapis_dinding_eksisting').value
    document.getElementById('review-ttde_bobot_pdc').innerHTML = document.getElementById('ttde_bobot_pdc').value
    document.getElementById('review-ttde_tipe_material').innerHTML = document.getElementById('ttde_tipe_material').value
    document.getElementById('review-ttpde_tipe_material').innerHTML = document.getElementById('ttpde_tipe_material').value
    document.getElementById('review-ttpde_bobot').innerHTML = document.getElementById('ttpde_bobot').value
    document.getElementById('review-ttpdje_tipe_material').innerHTML = document.getElementById('ttpdje_tipe_material').value
    document.getElementById('review-ttpdje_bobot').innerHTML = document.getElementById('ttpdje_bobot').value
    document.getElementById('review-tipe_lantai_eksisting').innerHTML = document.getElementById('tipe_lantai_eksisting').value
    document.getElementById('review-tle_bobot_lantai').innerHTML = document.getElementById('tle_bobot_lantai').value
    document.getElementById('review-ttle_tipe_material').innerHTML = document.getElementById('ttle_tipe_material').value
    document.getElementById('review-ttle_bobot').innerHTML = document.getElementById('ttle_bobot').value
    document.getElementById('review-tipe_pintu_n_jendela_eksisting').innerHTML = document.getElementById('tipe_pintu_n_jendela_eksisting').value
    document.getElementById('review-perlengkapan_bangunan').innerHTML = document.getElementById('perlengkapan_bangunan').value
    document.getElementById('review-penggunaan_bangunan').innerHTML = document.getElementById('penggunaan_bangunan').value
    document.getElementById('review-kondisi_bangunan').innerHTML = document.getElementById('kondisi_bangunan').value
    document.getElementById('review-status_data_pembanding').innerHTML = document.getElementById('status_data_pembanding').value      
  });
</script>
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

@endsection
