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
<h4>Data Pembanding – Office/ Retail/ Apartemen</h4>
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
          <form method="POST" action="{{ route('add_pembanding_retail') }}" enctype="multipart/form-data">
            <!-- Account Details -->
            @csrf
            <div id="account-details" class="content">
              <div class="content-header mb-3">
                <h6 class="mb-0">Step 1</h6>
                <small>Enter Step 1.</small>
              </div>
              <div class="row g-3">                
                <div>
                  <label class="form-label" for="nama_retail">Nama Office/ Retail/ Apartemen</label>
                  <input type="text" id="nama_retail" name="nama_retail" class="form-control" placeholder="Retail Space - Lippo Plaza Jogja (Lantai 1) - Jl. Laksda Adisucipto No.32-34, Demangan, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta" />
                </div>               
                <div>
                  <label class="form-label" for="nama_kjpp">Nama KJPP</label>
                  <input type="text" id="nama_kjpp" name="nama_kjpp" class="form-control"  />
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
                  <label class="form-label" for="alamat">Koordinat Obyek</label>
                  <div>
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="jl sukasari kecamatan baleendah bandung" />
                  </div>
                  <div id="map" style="height: 400px; width: 100%;"></div>
                  <input type="text" id="lat" name="lat" class="form-control" placeholder="-8.9897878" hidden />
                  <input type="text" id="long" name="long" class="form-control" placeholder="89.8477748" hidden />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="foto_tampak_depan">Upload Foto Tampak Depan</label>
                  <input type="file" id="foto_tampak_depan" name="foto_tampak_depan" class="form-control" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="foto_tampak_sisi_kiri">Upload Foto Tampak Sisi Kiri</label>
                  <input type="file" id="foto_tampak_sisi_kiri" name="foto_tampak_sisi_kiri" class="form-control"/>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="foto_tampak_sisi_kanan">Upload Foto Tampak Sisi Kanan</label>
                  <input type="file" id="foto_tampak_sisi_kanan" name="foto_tampak_sisi_kanan" class="form-control" />
                </div>
                <div class="col-sm-6">
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
                <div>
                    <div>
                        <label class="form-label" for="jenis_properti">Jenis Properti</label>
                    </div>
                    <select class="form-select" name="jenis_properti" id="jenis_properti" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Office">Office</option>
                      <option value="Retail">Retail</option>
                      <option value="Apartemen">Apartemen</option>
                    </select>
                </div>   
                <div>
                    <div>
                        <label class="form-label" for="kondisi_properti">Kondisi Properti</label>
                    </div>
                    <select class="form-select" name="kondisi_properti" id="kondisi_properti" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Available">Available</option>
                      <option value="On Progress">On Progress</option>
                    </select>
                </div> 
                <div>
                  <label class="form-label" for="estimasi_properti">Estimasi Selesai Properti</label>
                  <input type="text" id="estimasi_properti" name="estimasi_properti" class="form-control"  />
                </div>    
                <div>
                    <div>
                        <label class="form-label" for="spesifikasi_properti">Spesifikasi Properti</label>
                    </div>
                    <select class="form-select" name="spesifikasi_properti" id="spesifikasi_properti" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Bare">Bare</option>
                      <option value="Semi Furnished">Semi Furnished</option>
                      <option value="Fully Furnished">Fully Furnished</option>
                    </select>
                </div>   
                <div>
                    <div>
                        <label class="form-label" for="tipe_apartemen">Tipe Apartemen (jika bangunan apartemen)</label>
                    </div>
                    <select class="form-select" name="tipe_apartemen" id="tipe_apartemen" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="1 BR">1 BR</option>
                      <option value="2 BR">2 BR</option>
                      <option value="3 BR">3 BR</option>
                      <option value="Penthouse">Penthouse</option>
                    </select>
                </div>   
                <div>
                  <label class="form-label" for="posisi_lantai">Posisi Lantai</label>
                  <input type="number" id="posisi_lantai" name="posisi_lantai" class="form-control" placeholder="3" />
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="biaya properti">Biaya Properti</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Service Charge (Rp)</th>
                      <th>Parkir (Rp)</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="service_charge" name="service_charge" class="form-control" placeholder="113280000" /></td>
                      <td><input type="number" id="parkir" name="parkir" class="form-control" placeholder="113280000" /></td>
                    </tr>
                    <tr>
                      <th>Utilitas (Rp)</th>
                      <th>Overtime (Rp)</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="utilitas" name="utilitas" class="form-control" placeholder="113280000" /></td>
                      <td><input type="number" id="overtime" name="overtime" class="form-control" placeholder="113280000" /></td>
                    </tr>
                  </table>
                </div>                
                <div>
                    <div>
                        <label class="form-label" for="grade_bangunan">Grade Bangunan</label>
                    </div>
                    <select class="form-select" name="grade_bangunan" id="grade_bangunan" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" for="fasilitas_bangunan">Fasilitas Bangunan</label>
                    <input type="text" id="fasilitas_bangunan" name="fasilitas_bangunan" class="form-control" placeholder="Kolam Renang" />
                </div>
                <div>
                    <label class="form-label" for="row_koridor">Row Koridor (meter)</label>
                    <input type="number" id="row_koridor" name="row_koridor" class="form-control" placeholder="8" />
                </div>
                <div>
                    <label class="form-label" for="tipe_akses_koridor">Tipe Akses Koridor</label>
                    <input type="text" id="tipe_akses_koridor" name="tipe_akses_koridor" class="form-control" placeholder="Granit" />
                </div>
                <div>
                    <label class="form-label" for="luas_bangunan_total">Luas Gross Bangunan Total (m2)</label>
                    <input type="number" id="luas_bangunan_total" name="luas_bangunan_total" class="form-control" placeholder="84" />
                </div>
                <div>
                    <label class="form-label" for="jumlah_lantai">Jumlah Lantai</label>
                    <input type="number" id="jumlah_lantai" name="jumlah_lantai" class="form-control" placeholder="2" />
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
                <div>
                    <label class="form-label" for="tgl_berakhir_dokumen">Tanggal Berakhir Dokumen</label>
                    <input type="date" id="tgl_berakhir_dokumen" name="tgl_berakhir_dokumen" class="form-control" placeholder="Hak Guna Bangunan" />
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
                    <label class="form-label" for="peruntukan_bangunan">Peruntukan Bangunan</label>
                    <select name="peruntukan_bangunan" id="peruntukan_bangunan" class="form-select">
                      <option value="">Pilih..</option>
                      <option value="Office">Office</option>
                      <option value="Retail">Retail</option>
                      <option value="Apartemen">Apartemen</option>
                      <option value="Mixed Use">Mixed Use</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" for="jenis_data">Jenis Data</label>
                    <select name="jenis_data" id="jenis_data" class="form-select">
                      <option value="">Pilih..</option>
                      <option value="Penawaran">Penawaran</option>
                      <option value="Transaksi">Transaksi</option>
                      <option value="Price On Offer">Price On Offer</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" for="tgl_penawaran">Tanggal Penawaran / Waktu Transaksi</label>
                    <input type="date" id="tgl_penawaran" name="tgl_penawaran" class="form-control"  />
                </div>
                <div>
                    <label class="form-label" for="sumber_data">Sumber Data</label>
                    <select name="sumber_data" id="sumber_data" class="form-select">
                      <option value="">Pilih..</option>
                      <option value="Pemilik">Pemilik</option>
                      <option value="Perorangan">Perorangan</option>
                      <option value="Agen">Agen</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" for="luas_semigross">Luas Semigross (m2)</label>
                    <input type="number" id="luas_semigross" name="luas_semigross" class="form-control" placeholder="80" />
                </div>
                <div>
                    <label class="form-label" for="luas_net">Luas Nett (m2)</label>
                    <input type="number" id="luas_net" name="luas_net" class="form-control" placeholder="80" />
                </div>
                <div>
                    <label class="form-label" for="harga_penawaran">Harga Penawaran/Transaksi (Rp)</label>
                    <input type="number" id="harga_penawaran" name="harga_penawaran" class="form-control" placeholder="329280000" />
                </div>
                <div>
                    <label class="form-label" for="diskon">Diskon (%)</label>
                    <input type="number" id="diskon" name="diskon" class="form-control" placeholder="10" />
                </div>
                <div>
                    <label class="form-label" for="harga_sewa_pertahun">Harga Sewa per Tahun (Rp/tahun)</label>
                    <input type="number" id="harga_sewa_pertahun" name="harga_sewa_pertahun" class="form-control" placeholder="329280000" />
                </div>
                <div>
                    <label class="form-label" for="skrap">Skrap / Nilai Sisa (%)</label>
                    <input type="number" id="skrap" name="skrap" class="form-control" placeholder="50" />
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="penyusutan">Penyusutan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Kemunduran Fungsi (%)</th>
                      <th>Penjelasan Kemunduran Fungsi</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kemunduran_fungsi" name="kemunduran_fungsi" class="form-control" placeholder="0" /></td>
                      <td><textarea class="form-control" name="penjelasan_kemunduran_fungsi" id="penjelasan_kemunduran_fungsi" cols="30" rows="10"></textarea></td>
                    </tr>
                    <tr>
                      <th>Kemunduran Ekonomis (%)</th>
                      <th>Penjelasan Kemunduran Ekonomis</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kemunduran_ekonomis" name="kemunduran_ekonomis" class="form-control" placeholder="0" /></td>
                      <td><textarea class="form-control" name="penjelasan_kemunduran_ekonomis" id="penjelasan_kemunduran_ekonomis" cols="30" rows="10"></textarea></td>
                    </tr>
                    <tr>
                      <th>Maintenance (%)</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="maintenance" name="maintenance" class="form-control" placeholder="0" /></td>
                    </tr>
                  </table>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="penyesuaian_elemen_perbandingan">Penyesuaian Elemen Perbandingan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Syarat Pembiayaan Batasan dilakukan pelunasan pembayaran (Kelunakan)</th>
                      <th>Kondisi Penjualan Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan Kondisi Pemaksa</th>
                    </tr>
                    <tr>
                      <td>                       
                        <select name="pep_pembiayaan" id="pep_pembiayaan" class="form-select">
                          <option value="">Pilih...</option>
                          <option value="Tunai">Tunai</option>
                          <option value="Kredit">Kredit</option>
                          <option value="Bertahap">Bertahap</option>
                        </select>
                      </td>
                      <td>
                        <select name="pep_penjualan" id="pep_penjualan" class="form-select">
                          <option value="">Pilih...</option>
                          <option value="Normal">Normal</option>
                          <option value="Jual Cepat">Jual Cepat</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Pengeluaran yang dilakukan segera setelah pembelian
                        Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke fungsi atau peruntukan awal atau seharusnya</th>
                      <th>Kondisi Pasar
                        Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga penawaran (Menggunakan Indikator Waktu Penawaran / Transaksi)
                        </th>
                    </tr>
                    <tr>
                      <td><input type="text" id="pep_pengeluaran" name="pep_pengeluaran" class="form-control" placeholder="Tidak Ada" /></td>
                      <td><input type="text" id="pep_pasar" name="pep_pasar" class="form-control" placeholder="Normal" /></td>
                    </tr>
                  </table>
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
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="penggunaan">Penggunaan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Koefisien Dasar Bangunan (KDB) (%)</th>
                      <th>Koefisien Lantai Bangunan (KLB) (kali)</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="kdb" name="kdb" class="form-control"  /></td>
                      <td><input type="number" id="klb" name="klb" class="form-control"  /></td>
                    </tr>
                    <tr>
                      <th>Garis Sempadan Bangunan (GSB) (meter)</th>
                      <th>Ketinggian (lantai)</th>
                    </tr>
                    <tr>
                      <td><input type="number" id="gsb" name="gsb" class="form-control" /></td>
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
                    <select name="pengguna_lahan_lingkungan_eksisting" id="pengguna_lahan_lingkungan_eksisting" class="form-select">
                      <option value="">Pilih...</option>
                      <option value="Perumahan/Pemukiman">Perumahan/Pemukiman</option>
                      <option value="Campuran">Campuran</option>
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
                    <label class="form-label" for="letak_posisi_aset">Lokasi Aset</label>
                    <select name="letak_posisi_aset" id="letak_posisi_aset" class="form-select">
                      <option value="">Pilih...</option>
                      <option value="Depan">Depan</option>
                      <option value="Tengah">Tengah</option>
                      <option value="Belakang">Belakang</option>
                    </select>
                </div>
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
                    <label class="form-label" for="bentuk_tanah_lainnya">Bentuk Tanah Lainnya</label>
                    <input type="text" id="bentuk_tanah_lainnya" name="bentuk_tanah_lainnya" class="form-control" />
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
                    <option value="" selected disabled>Pilih...</option>
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
                  </select>
                </div>
                <div>
                  <label class="form-label" for="kondisi_lingkungan_lainnya">Kondisi Lingkungan Lainnya</label>
                  <input type="text" id="kondisi_lingkungan_lainnya" name="kondisi_lingkungan_lainnya" class="form-control"  />
                </div>
                <div>
                  <label class="form-label" for="keterangan_tambahan_lainnya">Keterangan Lingkungan Lainnya</label>
                  <textarea class="form-control" name="keterangan_tambahan_lainnya" id="keterangan_tambahan_lainnya" cols="30" rows="10"></textarea>
                </div>
                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="karakteristik_ekonomi">Karakteristik Ekonomi (Jika objek yang dinilai adalah Properti Komersial)</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Kualitas Pendapatan</th>
                      <th>Biaya Operasional</th>
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
                        <select class="form-select" name="biaya_operasional" id="biaya_operasional" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Rendah">Rendah</option>
                          <option value="Normal">Normal</option>
                          <option value="Tinggi">Tinggi</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Ketentuan Sewa</th>
                      <th>Manajemen</th>
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
                      <th>Bauran Penyewa</th>
                    </tr>
                    <tr>
                      <td>
                        <select class="form-select" name="bauran_penyewa" id="bauran_penyewa" aria-label="Default select example">
                          <option value="" selected disabled>Pilih...</option>
                          <option value="Terbatas">Terbatas</option>
                          <option value="Normal">Normal</option>
                          <option value="Beragam">Besar</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>

                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="komponen_non_reality">Komponen Non-Realty dalam Penjualan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>FFE</th>
                      <th>Mesin</th>
                    </tr>
                    <tr>
                      <td>
                          <input type="text" id="ffe" name="ffe" class="form-control"  />
                      </td>
                      <td>
                        <input type="text" id="mesin" name="mesin" class="form-control"  />
                      </td>
                    </tr>                    
                  </table>
                </div>               

                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                  <label class="form-label" for="gambaran_objek">Gambaran Objek terhadap Wilayah dan Lingkungan</label>
                  <table class="table table-borderless">
                    <tr>
                      <th>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Kota. Nama Pusat Kota / Jarak</th>
                      <th>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Ekonomi terdekat (Pasar Mall). Nama Pusat Ekonomi / Jarak</th>
                    </tr>
                    <tr>
                      <td>
                          <input type="text" id="nama_pusat_kota" name="nama_pusat_kota" class="form-control" placeholder="Nama Pusat Kota/Jarak"  />
                      </td>
                      <td>
                        <input type="text" id="nama_pusat_ekonomi" name="nama_pusat_ekonomi" class="form-control" placeholder="Nama Pusat Ekonomi/Jarak"  />
                      </td>
                    </tr>                    
                    <tr>
                      <th>Jarak dengan CBD (Pusat Ekonomi) dari Jalan Utama terdekat. Nama Jalan / Jarak</th>
                      <th>Kondisi Lingkungan Khusus yang mempengaruhi Nilai</th>
                    </tr>
                    <tr>
                      <td>
                          <input type="text" id="nama_jalan" name="nama_jalan" class="form-control" placeholder="Nama Jalan/Jarak"  />
                      </td>
                      <td>
                        <input type="text" id="kondisi_lingkungan" name="kondisi_lingkungan" class="form-control" />
                      </td>
                    </tr>                    
                    <tr>
                      <th>Faktor View (Pemandangan) untuk Properti yang faktor view dimungkinkan sangat berpengaruh pada nilai (contoh: apartemen, vila, dll)
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" id="faktor_view" name="faktor_view" class="form-control" />
                      </td>
                    </tr>                    
                  </table>
                </div>
                
              <div>
                <label class="form-label" for="keterangan_jarak">Keterangan jarak dengan BCA terdekat (jika BCA)</label>
                <input type="text" id="keterangan_jarak" name="keterangan_jarak" class="form-control" placeholder="+- 1,4 KM (Bank BCA KCU Purwodadi)" />                
              </div>  
              <div>
                <label class="form-label" for="pemberi_tugas">Pemberi Tugas</label>
                <input type="text" id="pemberi_tugas" name="pemberi_tugas" class="form-control" placeholder="Bank Mandiri" />                
              </div>  
              <div>
                <label class="form-label" for="status_data_pembanding">Status Data Pembanding</label>
                <select name="status_data_pembanding" id="status_data_pembanding" class="form-control">
                  <option value="">Pilih Status</option>
                  <option value="Lengkap">Lengkap</option>
                  <option value="Tidak lengkap">Tidak Lengkap</option>
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
                    <td style="font-weight: 800">Nama Office/ Retail/ Apartemen</td>
                    <td>:</td>
                    <td><span id="review-nama_retail"></span></td>
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
                  <td style="font-weight: 800">Jenis Properti</td>
                  <td>:</td>
                  <td><span id="review-jenis_properti"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Kondisi Properti</td>
                  <td>:</td>
                  <td><span id="review-kondisi_properti"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Spesifikasi Properti</td>
                  <td>:</td>
                  <td><span id="review-spesifikasi_properti"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Tipe Apartemen (jika bangunan apartemen)</td>
                  <td>:</td>
                  <td><span id="review-tipe_apartemen"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Posisi Lantai</td>
                  <td>:</td>
                  <td><span id="review-posisi_lantai"></span></td>                  
                </tr>
                <tr>
                    <td colspan="8" class="fs-5 fw-bold">Biaya Properti</td>
                </tr>
                <tr>
                  <td style="font-weight: 800">Service Charge (Rp)</td>
                  <td>:</td>
                  <td><span id="review-service_charge"></span></td>                    
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Parkir (Rp)</td>
                  <td>:</td>
                  <td><span id="review-parkir"></span></td>                    
                </tr>
                <tr>
                  <td style="font-weight: 800">Utilitas (Rp)</td>
                  <td>:</td>
                  <td><span id="review-utilitas"></span></td>   
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Overtime (Rp)</td>
                  <td>:</td>
                  <td><span id="review-overtime"></span></td>                   
                </tr>
                <tr>
                  <td style="font-weight: 800">Grade Bangunan</td>
                  <td>:</td>
                  <td><span id="review-grade_bangunan"></span></td>   
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Fasilitas Bangunan</td>
                  <td>:</td>
                  <td><span id="review-fasilitas_bangunan"></span></td>                   
                </tr>
                <tr>
                  <td style="font-weight: 800">Row Koridor (meter)</td>
                  <td>:</td>
                  <td><span id="review-row_koridor"></span></td>   
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Tipe Akses Koridor</td>
                  <td>:</td>
                  <td><span id="review-tipe_akses_koridor"></span></td>                   
                </tr>
                <tr>
                  <td style="font-weight: 800">Luas Gross Bangunan Total (m2)</td>
                  <td>:</td>
                  <td><span id="review-luas_bangunan_total"></span></td>   
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Jumlah Lantai</td>
                  <td>:</td>
                  <td><span id="review-jumlah_lantai"></span></td>                   
                </tr>
                <tr>
                  <td style="font-weight: 800">Jenis Dokumen Hak Tanah</td>
                  <td>:</td>
                  <td><span id="review-jenis_dok_hak_tanah"></span></td>   
                  <td></td>
                  <td></td>
                  <td style="font-weight: 800">Tanggal Berakhir Dokumen</td>
                  <td>:</td>
                  <td><span id="review-tgl_berakhir_dokumen"></span></td>                   
                </tr>
                
              </table>
              <hr>
              <p class="fw-medium mb-2">Step 3</p>
              <table class="table table-borderless"> 
                <tr>
                    <td style="font-weight: 800">Peruntukan Bangunan</td>
                    <td>:</td>
                    <td><span id="review-peruntukan_bangunan"></span></td>   
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Jenis Data</td>
                    <td>:</td>
                    <td><span id="review-jenis_data"></span></td>                   
                </tr>
                <tr>
                    <td style="font-weight: 800">Tanggal Penawaran / Waktu Transaksi</td>
                    <td>:</td>
                    <td><span id="review-tgl_penawaran"></span></td>   
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Sumber Data</td>
                    <td>:</td>
                    <td><span id="review-sumber_data"></span></td>                   
                </tr>
                <tr>
                    <td style="font-weight: 800">Luas Semigross (m2)</td>
                    <td>:</td>
                    <td><span id="review-luas_semigross"></span></td>   
                    <td></td>
                    <td></td>
                    <td style="font-weight: 800">Luas Nett (m2)</td>
                    <td>:</td>
                    <td><span id="review-luas_net"></span></td>                   
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
                    <td><span id="review-harga_sewa_pertahun"></span></td>                   
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
                  
              </table>
              <hr>
              <p class="fw-medium mb-2">Step 4</p>
              <table class="table table-borderless">
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
    document.getElementById('review-nama_retail').innerHTML = document.getElementById('nama_retail').value    
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
    document.getElementById('review-jenis_properti').innerHTML = document.getElementById('jenis_properti').value
    document.getElementById('review-kondisi_properti').innerHTML = document.getElementById('kondisi_properti').value
    document.getElementById('review-spesifikasi_properti').innerHTML = document.getElementById('spesifikasi_properti').value
    document.getElementById('review-tipe_apartemen').innerHTML = document.getElementById('tipe_apartemen').value
    document.getElementById('review-posisi_lantai').innerHTML = document.getElementById('posisi_lantai').value
    document.getElementById('review-service_charge').innerHTML = document.getElementById('service_charge').value
    document.getElementById('review-parkir').innerHTML = document.getElementById('parkir').value
    document.getElementById('review-utilitas').innerHTML = document.getElementById('utilitas').value
    document.getElementById('review-overtime').innerHTML = document.getElementById('overtime').value
    document.getElementById('review-grade_bangunan').innerHTML = document.getElementById('grade_bangunan').value
    document.getElementById('review-fasilitas_bangunan').innerHTML = document.getElementById('fasilitas_bangunan').value
    document.getElementById('review-row_koridor').innerHTML = document.getElementById('row_koridor').value
    document.getElementById('review-tipe_akses_koridor').innerHTML = document.getElementById('tipe_akses_koridor').value
    document.getElementById('review-luas_bangunan_total').innerHTML = document.getElementById('luas_bangunan_total').value
    document.getElementById('review-jumlah_lantai').innerHTML = document.getElementById('jumlah_lantai').value
    document.getElementById('review-jenis_dok_hak_tanah').innerHTML = document.getElementById('jenis_dok_hak_tanah').value
    document.getElementById('review-tgl_berakhir_dokumen').innerHTML = document.getElementById('tgl_berakhir_dokumen').value
    document.getElementById('review-peruntukan_bangunan').innerHTML = document.getElementById('peruntukan_bangunan').value
    document.getElementById('review-jenis_data').innerHTML = document.getElementById('jenis_data').value
    document.getElementById('review-tgl_penawaran').innerHTML = document.getElementById('tgl_penawaran').value
    document.getElementById('review-sumber_data').innerHTML = document.getElementById('sumber_data').value
    // Step 2
    document.getElementById('review-luas_semigross').innerHTML = document.getElementById('luas_semigross').value
    document.getElementById('review-luas_net').innerHTML = document.getElementById('luas_net').value
    document.getElementById('review-harga_penawaran').innerHTML = document.getElementById('harga_penawaran').value 
    document.getElementById('review-diskon').innerHTML = document.getElementById('diskon').value
    document.getElementById('review-harga_sewa_pertahun').innerHTML = document.getElementById('harga_sewa_pertahun').value
   
    document.getElementById('review-pep_pembiayaan').innerHTML = document.getElementById('pep_pembiayaan').value
    document.getElementById('review-pep_penjualan').innerHTML = document.getElementById('pep_penjualan').value      
    document.getElementById('review-pep_pengeluaran').innerHTML = document.getElementById('pep_pengeluaran').value      
    document.getElementById('review-pep_pasar').innerHTML = document.getElementById('pep_pasar').value      
    document.getElementById('review-row_jalan').innerHTML = document.getElementById('row_jalan').value      
    document.getElementById('review-tipe_jalan').innerHTML = document.getElementById('tipe_jalan').value      
    document.getElementById('review-kapasitas_jalan').innerHTML = document.getElementById('kapasitas_jalan').value      
    document.getElementById('review-pengguna_lahan_lingkungan_eksisting').innerHTML = document.getElementById('pengguna_lahan_lingkungan_eksisting').value      
    document.getElementById('review-letak_posisi_obyek').innerHTML = document.getElementById('letak_posisi_obyek').value      
    document.getElementById('review-letak_posisi_aset').innerHTML = document.getElementById('letak_posisi_aset').value      
    document.getElementById('review-bentuk_tanah').innerHTML = document.getElementById('bentuk_tanah').value      
    document.getElementById('review-lebar_muka_tanah').innerHTML = document.getElementById('lebar_muka_tanah').value      
    document.getElementById('review-ketinggian_tanah_dr_muka_jln').innerHTML = document.getElementById('ketinggian_tanah_dr_muka_jln').value      
    document.getElementById('review-topografi').innerHTML = document.getElementById('topografi').value      
    document.getElementById('review-tingkat_hunian').innerHTML = document.getElementById('tingkat_hunian').value      
    document.getElementById('review-kondisi_lingkungan_khusus').innerHTML = document.getElementById('kondisi_lingkungan_khusus').value      
    document.getElementById('review-gambaran_objek').innerHTML = document.getElementById('gambaran_objek').value           
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
