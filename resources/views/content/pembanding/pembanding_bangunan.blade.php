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
                <div class="col-sm-6">
                  <label class="form-label" for="nip">Nomor Induk Pembanding</label>
                  <input type="text" id="nip" name="nip" class="form-control" placeholder="A-2022-001" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="nib">Nomor Induk Bangunan</label>
                  <input type="text" id="nib" name="nib" class="form-control" placeholder="B-2022-001" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="nama_tanah_n_bangunan">Nama Tanah dan Bangunan</label>
                  <input type="text" id="nama_tanah_n_bangunan" name="nama_tanah_n_bangunan" class="form-control" placeholder="A-2022-001" />
                </div>               
                <div>
                  <label class="form-label" for="alamat">Titik Point</label>
                  <label class="form-label" for="alamat">Alamat</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" placeholder="jl sukasari kecamatan baleendah bandung" />
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
                <div class="col-sm-6">
                  <label class="form-label" for="nama_narsum">Nama Narasumber</label>
                  <input type="text" id="nama_narsum" name="nama_narsum" class="form-control" placeholder="Bapak Ahmad Sudani" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="telepon">Telepon</label>
                  <input type="number" id="telepon" name="telepon" class="form-control" placeholder="087654354243" />
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
                <div class="col-sm-6">
                  <label class="form-label" for="jenis_dok_hak_tanah">Jenis Dokumen Hak Tanah</label>
                  <input type="text" id="jenis_dok_hak_tanah" name="jenis_dok_hak_tanah" class="form-control" placeholder="Hak Guna Bangunan" />
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="perutuntukan_kawasan">Peruntukan Kawasan</label>
                    </div>
                    <select class="form-select" name="perutuntukan_kawasan" id="perutuntukan_kawasan" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Zona Lindung">Zona Lindung</option>
                      <option value="Zona Budi Daya">Zona Budi Daya</option>
                    </select>
                </div>                
                <div class="col-sm-6">
                  <label class="form-label" for="jenis_data">Jenis Data</label>
                  <input type="text" id="jenis_data" name="jenis_data" class="form-control" placeholder="Penawaran" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="tgl_penawaran">Tanggal Penawaran / Waktu Transaksi</label>
                  <input type="datetime-local" id="tgl_penawaran" name="tgl_penawaran" class="form-control" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="sumber_data">Sumber Data</label>
                  <input type="text" id="sumber_data" name="sumber_data" class="form-control" placeholder="Penawaran" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="luas_tanah">Luas Tanah (m2)</label>
                  <input type="number" id="luas_tanah" name="luas_tanah" class="form-control" placeholder="44" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="harga_penawaran">Harga Penawaran/Transaksi (Rp)</label>
                  <input type="text" id="harga_penawaran" name="harga_penawaran" class="form-control" placeholder="4257000000" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="diskon">Diskon (%)</label>
                  <input type="number" id="diskon" name="diskon" class="form-control" placeholder="44" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="harga_sewa_per_tahun">Harga Sewa per Tahun (Rp/tahun)</label>
                  <input type="number" id="harga_sewa_per_tahun" name="harga_sewa_per_tahun" class="form-control" placeholder="4257000000" />
                </div>
                <hr>    
                <div>
                    <h5>Penyesuaian Elemen Perbandingan</h5>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="pep_pembiayaan">Syarat Pembiayaan Batasan dilakukan pelunasan pembayaran (Kelunakan)</label>
                    </div>
                    <select class="form-select" name="pep_pembiayaan" id="pep_pembiayaan" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Tunai">Tunai</option>
                      <option value="Non Tunai">Non Tunai</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="pep_penjualan">Kondisi Penjualan Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan Kondisi Pemaksa</label>
                    </div>
                    <select class="form-select" name="pep_penjualan" id="pep_penjualan" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Normal">Normal</option>
                      <option value="Tidak Normal">Tidak Normal</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="pep_pengeluaran">Pengeluaran yang dilakukan segera setelah pembelian Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke fungsi atau peruntukan awal atau seharusnya</label>
                    </div>
                    <select class="form-select" name="pep_pengeluaran" id="pep_pengeluaran" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="pep_pasar">Kondisi Pasar Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga penawaran (Menggunakan Indikator Waktu Penawaran / Transaksi)</label>
                    </div>
                    <input type="text" id="pep_pasar" name="pep_pasar" class="form-control" placeholder="Ditawarkan akhir 2023" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="row_jalan">Row Jalan (m)</label>
                    <input type="number" id="row_jalan" name="row_jalan" class="form-control" placeholder="12" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tipe_jalan">Tipe Jalan</label>
                    <input type="text" id="tipe_jalan" name="tipe_jalan" class="form-control" placeholder="Aspal" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="kapasitas_jalan">Kapasitas Jalan</label>
                    <input type="text" id="kapasitas_jalan" name="kapasitas_jalan" class="form-control" placeholder="> 1 Kendaraan Roda 4" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="pengguna_lahan_lingkungan_eksisting">Penggunaan Lahan Lingkungan Eksisting</label>
                    <input type="text" id="pengguna_lahan_lingkungan_eksisting" name="pengguna_lahan_lingkungan_eksisting" class="form-control" placeholder="Campur" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="letak_posisi_obyek">Letak / Posisi Obyek</label>
                    <input type="text" id="letak_posisi_obyek" name="letak_posisi_obyek" class="form-control" placeholder="Interior" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="letak_posisi_aset">Lokasi Aset</label>
                    <input type="text" id="letak_posisi_aset" name="letak_posisi_aset" class="form-control" placeholder="Tengah" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="bentuk_tanah">Bentuk Tanah</label>
                    <input type="text" id="bentuk_tanah" name="bentuk_tanah" class="form-control" placeholder="Persegi Panjang" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="lebar_muka_tanah">Lebar Muka Tanah (m)</label>
                    <input type="number" id="lebar_muka_tanah" name="lebar_muka_tanah" class="form-control" placeholder="22" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ketinggian_tanah_dr_muka_jln">Ketinggian Tanah dari Muka Jalan (m)</label>
                    <input type="number" id="ketinggian_tanah_dr_muka_jln" name="ketinggian_tanah_dr_muka_jln" class="form-control" placeholder="0.1" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="topografi">Topografi / Elevasi</label>
                    <input type="text" id="topografi" name="topografi" class="form-control" placeholder="Rata" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tingkat_hunian">Tingkat Hunian (%)</label>
                    <input type="number" id="tingkat_hunian" name="tingkat_hunian" class="form-control" placeholder="70" />
                </div>
                <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="kondisi_lingkungan_khusus">Kondisi Lingkungan Khusus</label>
                  </div>
                  <select class="form-select" name="kondisi_lingkungan_khusus" id="kondisi_lingkungan_khusus" aria-label="Default select example">
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
                <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="gambaran_objek">Gambaran Objek terhadap Wilayah dan Lingkungan</label>
                  </div>
                  <select class="form-select" name="gambaran_objek" id="gambaran_objek" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Jarak dengan CBD (Pusat Ekonomi) dari Pusat Kota. Nama Pusat Kota / Jarak">Jarak dengan CBD (Pusat Ekonomi) dari Pusat Kota. Nama Pusat Kota / Jarak</option>
                    <option value="Jarak dengan CBD (Pusat Ekonomi) dari Jalan Utama terdekat. Nama Jalan / Jarak">Jarak dengan CBD (Pusat Ekonomi) dari Jalan Utama terdekat. Nama Jalan / Jarak</option>
                    <option value="Nama Pusat Kota / Jarak Jarak dengan CBD (Pusat Ekonomi) dari Pusat Ekonomi terdekat (Pasar Mall). Nama Pusat Ekonomi / Jarak">Nama Pusat Kota / Jarak Jarak dengan CBD (Pusat Ekonomi) dari Pusat Ekonomi terdekat (Pasar Mall). Nama Pusat Ekonomi / Jarak</option>
                    <option value="Kondisi Lingkungan Khusus yang mempengaruhi Nilai">Kondisi Lingkungan Khusus yang mempengaruhi Nilai</option>
                    <option value="Faktor View (Pemandangan) untuk Properti yang faktor view dimungkinkan sangat berpengaruh pada nilai (contoh: apartemen, vila, dll)">Faktor View (Pemandangan) untuk Properti yang faktor view dimungkinkan sangat berpengaruh pada nilai (contoh: apartemen, vila, dll)</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="bentuk_bangunan">Bentuk Bangunan</label>
                  </div>
                  <select class="form-select" name="bentuk_bangunan" id="bentuk_bangunan" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Bertingkat">Bertingkat</option>
                    <option value="Tidak Bertingkat">Tidak Bertingkat</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="jumlah_lantai">Jumlah Lantai</label>
                  <input type="number" id="jumlah_lantai" name="jumlah_lantai" class="form-control" placeholder="1" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_bangunan">Konstruksi Bangunan</label>
                  <input type="text" id="kontruksi_bangunan" name="kontruksi_bangunan" class="form-control" placeholder="Permanent" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_lantai">Konstruksi Lantai</label>
                  <input type="text" id="kontruksi_lantai" name="kontruksi_lantai" class="form-control" placeholder="Keramik" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_dinding">Konstruksi Dinding</label>
                  <input type="text" id="kontruksi_dinding" name="kontruksi_dinding" class="form-control" placeholder="Bata" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_atap">Konstruksi Atap</label>
                  <input type="text" id="kontruksi_atap" name="kontruksi_atap" class="form-control" placeholder="Genteng Jawa" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="kontruksi_pondasi">Konstruksi Pondasi</label>
                  <input type="text" id="kontruksi_pondasi" name="kontruksi_pondasi" class="form-control" placeholder="Pasang Batu Kali" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="versi_btb">Versi BTB</label>
                  <input type="number" id="versi_btb" name="versi_btb" class="form-control" placeholder="2023" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="tipikal_bangunan">Tipikal Bangunan Sesuai Spek BTB MAPPI</label>
                  <input type="text" id="tipikal_bangunan" name="tipikal_bangunan" class="form-control" placeholder="Rumah Tinggal Sederhana" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="tahun_dibangun">Tahun Dibangun</label>
                  <input type="number" id="tahun_dibangun" name="tahun_dibangun" class="form-control" placeholder="2023" />
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
                <div class="col-sm-6">
                  <div>
                    <label class="form-label" for="sumber_info_thn_dibangun">Sumber Informasi Tahun Dibangun</label>
                  </div>
                    <select class="form-select" name="sumber_info_thn_dibangun" id="sumber_info_thn_dibangun" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Keterangan pendamping lokasi / pemilik">Keterangan pendamping lokasi / pemilik</option>
                      <option value="IMB">IMB</option>
                      <option value="Pengamatan visual">Pengamatan visual</option>
                      <option value="Keterangan lingkungan">Keterangan lingkungan</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                  <label class="form-label" for="tahun_renovasi">Tahun Renovasi</label>
                  <input type="number" id="tahun_renovasi" name="tahun_renovasi" class="form-control" placeholder="2023" />
                </div>  
                <div class="col-sm-6">
                  <label class="form-label" for="kondisi_bangunan_scr_visual">Kondisi Bangunan Secara Visual</label>
                  <input type="text" id="kondisi_bangunan_scr_visual" name="kondisi_bangunan_scr_visual" class="form-control" placeholder="Baik" />
                </div>
                <hr>
                  <div>
                      <h5>Luas Bangunan Fisik</h5>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lbf_no_or_nama_lantai">Nomor/Nama Lantai (Area)</label>
                    <input type="text" id="lbf_no_or_nama_lantai" name="lbf_no_or_nama_lantai" class="form-control" placeholder="Bangunan Rumah Tinggal 1" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lbf_faktor_pengali_luas">Faktor Pengali Luas</label>
                    <input type="number" id="lbf_faktor_pengali_luas" name="lbf_faktor_pengali_luas" class="form-control" placeholder="1" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lbf_luas_lantai">Luas Lantai (m2)</label>
                    <input type="number" id="lbf_luas_lantai" name="lbf_luas_lantai" class="form-control" placeholder="323" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="luas_bangunan_menurut_imb">Luas Bangunan Menurut IMB</label>
                    <input type="number" id="luas_bangunan_menurut_imb" name="luas_bangunan_menurut_imb" class="form-control" placeholder="333" />
                  </div>
                  <div>
                    <h5>Luas Pintu dan Jendela</h5>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lpj_nama_area">Nama Area</label>
                    <input type="text" id="lpj_nama_area" name="lpj_nama_area" class="form-control" placeholder="Pintu Kayu" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lpj_luas">Luas (m2)</label>
                    <input type="number" id="lpj_luas" name="lpj_luas" class="form-control" placeholder="44" />
                  </div>
                  <hr>
                <div>
                  <h5>Luas Dinding</h5>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="ld_nama_area">Nama Area</label>
                  <input type="text" id="ld_nama_area" name="ld_nama_area" class="form-control" placeholder="Luas Dinding Pasang Bata" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="ld_luas">Luas (m2)</label>
                  <input type="number" id="ld_luas" name="ld_luas" class="form-control" placeholder="44" />
                </div>
                <hr>
                <div>
                  <h5>Luas Rangka Atap Datar</h5>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lrad_nama_area">Nama Area</label>
                  <input type="text" id="lrad_nama_area" name="lrad_nama_area" class="form-control" placeholder="Luas Rangka Atap Datar" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lrad_luas">Luas (m2)</label>
                  <input type="number" id="lrad_luas" name="lrad_luas" class="form-control" placeholder="44" />
                </div>
                <hr>
                <div>
                  <h5>Luas Atap Datar</h5>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lad_nama_area">Nama Area</label>
                  <input type="text" id="lad_nama_area" name="lad_nama_area" class="form-control" placeholder="Luas Atap Datar" />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="lad_luas">Luas (m2)</label>
                  <input type="number" id="lad_luas" name="lad_luas" class="form-control" placeholder="44" />
                </div>
                <hr>    
                <div>
                    <h5>Tipe Pondasi Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tpe_batu_kali">Batu Kali</label>
                    <input type="text" id="tpe_batu_kali" name="tpe_batu_kali" class="form-control" placeholder="Tipe Pondasi Eksisting - Rumah Tinggal Menengah 2 Lantai" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tpe_bobot_pondasi">Bobot Pondasi Batu Kali (%)</label>
                    <input type="number" id="tpe_bobot_pondasi" name="tpe_bobot_pondasi" class="form-control" placeholder="44" />
                </div>
                <hr>    
                <div>
                    <h5>Tambah Tipe Pondasi Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttpe_tipe_material">Tipe Material</label>
                    <input type="text" id="ttpe_tipe_material" name="ttpe_tipe_material" class="form-control" placeholder="Batu Kali" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttpe_bobot">Bobot(%)</label>
                    <input type="number" id="ttpe_bobot" name="ttpe_bobot" class="form-control" placeholder="73" />
                </div>
                <hr>    
                <div>
                    <h5>Tipe Struktur Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tse_beton_bertulang">Beton Bertulang</label>
                    <input type="text" id="tse_beton_bertulang" name="tse_beton_bertulang" class="form-control" placeholder="Bobot Struktur Beton Bertulang" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="tse_bobot_struktur_beton_bertulng">Bobot Struktur Beton Bertulang(%)</label>
                    <input type="number" id="tse_bobot_struktur_beton_bertulng" name="tse_bobot_struktur_beton_bertulng" class="form-control" placeholder="73" />
                </div>
                <hr>    
                <div>
                    <h5>Tambah Tipe Struktur Eksisting</h5>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttse_tipe_material">Tipe Material</label>
                    <input type="text" id="ttse_tipe_material" name="ttse_tipe_material" class="form-control" placeholder="Baja Profil" />
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttse_bobot">Bobot(%)</label>
                    <input type="number" id="ttse_bobot" name="ttse_bobot" class="form-control" placeholder="73" />
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tipe_rangka_atap_eksisting">Tipe Rangka Atap Eksisting</label>
                    </div>
                    <select class="select2 form-select" name="tipe_rangka_atap_eksisting" id="tipe_rangka_atap_eksisting" multiple>
                      <option value="Dak Beton (Jika Pakai Balok)">Dak Beton (Jika Pakai Balok)</option>
                      <option value="Kayu (Atap Genteng)">Kayu (Atap Genteng)</option>
                      <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)">Kayu (Atap Asbes, Seng dll, Tanpa Reng)</option>
                      <option value="Baja Ringan (Atap Genteng)">Baja Ringan (Atap Genteng)</option>
                      <option value="Baja Ringan (Atap Asbes, Seng dll)">Baja Ringan (Atap Asbes, Seng dll)</option>
                    </select>
                </div>
                <hr>    
                <div>
                    <h5>Tambah Tipe Rangka Atap Existing</h5>
                </div>
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttrae_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttrae_tipe_material" id="ttrae_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="ttrae_bobot">Bobot(%)</label>
                    <input type="number" id="ttrae_bobot" name="ttrae_bobot" class="form-control" placeholder="73" />
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
                <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="tipe_penutup_atap_eksisting">Tipe Penutup Atap Eksisting</label>
                  </div>
                  <select class="form-select" name="tipe_penutup_atap_eksisting" id="tipe_penutup_atap_eksisting">
                    <option value="Asbes">Asbes</option>
                    <option value="Kayu (Atap Genteng)">Kayu (Atap Genteng)</option>
                    <option value="Dak Beton">Dak Beton</option>
                    <option value="Fibreglass">Fibreglass</option>
                    <option value="Genteng Tanah Liat">Genteng Tanah Liat</option>
                    <option value="Genteng Beton">Genteng Beton</option>
                    <option value="Genteng Metal">Genteng Metal</option>
                    <option value="Seng Gelombang">Seng Gelombang</option>
                    <option value="Spandek">Spandek</option>
                    <option value="PVC">PVC</option>
                  </select>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="bobot_penutup_atap">Bobot Penutup Atap(%)</label>
                <input type="number" class="form-control" id="bobot_penutup_atap" name="bobot_penutup_atap" placeholder="73">
              </div>
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="tipe_plafon_eksisting">Tipe Plafon Eksisting</label>
                  </div>
                  <select class="form-select" name="tipe_plafon_eksisting" id="tipe_plafon_eksisting" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Asbes">Asbes</option>
                    <option value="Beton Ekspose">Beton Ekspose</option>
                    <option value="GRC">GRC</option>
                    <option value="Gypsum">Gypsum</option>
                    <option value="Triplek">Triplek</option>
                  </select>
              </div> 
              <hr>    
              <div>
                  <h5>Tambah Plafon Eksisting</h5>
              </div>  
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="tampe_tipe_material">Tipe Material</label>
                  </div>
                  <select class="form-select" name="tampe_tipe_material" id="tampe_tipe_material" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="True">True</option>
                    <option value="False">False</option>
                  </select>
              </div> 
              <div class="col-sm-6">
                  <label class="form-label" for="tampe_bobot">Bobot(%)</label>
                  <input type="number" id="tampe_bobot" name="tampe_bobot" class="form-control" placeholder="73" />
              </div>     
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="tipe_dinding_eksisting">Tipe Dinding Existing</label>
                  </div>
                  <select class="form-select" name="tipe_dinding_eksisting" id="tipe_dinding_eksisting" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Batako">Batako</option>
                    <option value="Bata Merah">Bata Merah</option>
                    <option value="Bata Ringan">Bata Ringan</option>
                    <option value="Partisi Gypsumboard 2 Muka">Partisi Gypsumboard 2 Muka</option>
                    <option value="Rooster Bata">Rooster Bata</option>
                  </select>
              </div>   
              <div class="col-sm-6">
                <label class="form-label" for="tde_bobot">Bobot Dinding(%)</label>
                <input type="number" id="tde_bobot" name="tde_bobot" class="form-control" placeholder="73" />
              </div>   
              <hr>    
                <div>
                    <h5>Tambah Tipe Dinding Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttde_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttde_tipe_material" id="ttde_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttde_bobot">Bobot(%)</label>
                    <input type="number" id="ttde_bobot" name="ttde_bobot" class="form-control" placeholder="73" />
                </div>          
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tipe_pelapis_dinding_eksisting">Tipe Pelapis Dinding Eksisting</label>
                    </div>
                    <select class="form-select" name="tipe_pelapis_dinding_eksisting" id="tipe_pelapis_dinding_eksisting" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Dilapis Cat (Diplester dan Diaci)">Dilapis Cat (Diplester dan Diaci)</option>
                      <option value="Dilapis Keramik">Dilapis Keramik</option>
                      <option value="Dilapis Wallpaper">Dilapis Wallpaper</option>
                      <option value="Dilapis Mozaik">Dilapis Mozaik</option>
                      <option value="Dilapis Batu Alam">Dilapis Batu Alam</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttde_bobot_pdc">Bobot Pelapis Dinding Cat (Diplester dan Diaci)</label>
                    <input type="number" id="ttde_bobot_pdc" name="ttde_bobot_pdc" class="form-control" placeholder="73" />
                </div>   
                <hr>    
                <div>
                    <h5>Tambah Tipe Pelapis Dinding Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttpde_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttpde_tipe_material" id="ttpde_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttpde_bobot">Bobot(%)</label>
                    <input type="number" id="ttpde_bobot" name="ttpde_bobot" class="form-control" placeholder="73" />
                </div>
                <hr>    
                <div>
                    <h5>Tipe Pintu & Jendela Eksisting</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tipe_pintu_n_jendela_eksisting">Tipe Pintu & Jendela Eksisting</label>
                    </div>
                    <select class="form-select" name="tipe_pintu_n_jendela_eksisting" id="tipe_pintu_n_jendela_eksisting" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Pintu Kayu Panil">Pintu Kayu Panil</option>
                      <option value="Pintu Kayu Dobel Triplek/ HPL">Pintu Kayu Dobel Triplek/ HPL</option>
                      <option value="Pintu Kaca Rk Aluminium">Pintu Kaca Rk Aluminium</option>
                      <option value="Jendela Kaca Rk Kayu">Jendela Kaca Rk Kayu</option>
                      <option value="Jendela Kaca Rk Aluminium">Jendela Kaca Rk Aluminium</option>
                      <option value="Pintu KM UPVC/PVC">Pintu KM UPVC/PVC</option>
                    </select>
                </div>  
                <hr>    
                <div>
                    <h5>Tambah Tipe Pintu & Jendela Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttpdje_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttpdje_tipe_material" id="ttpdje_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttpdje_bobot">Bobot(%)</label>
                    <input type="number" id="ttpdje_bobot" name="ttpdje_bobot" class="form-control" placeholder="73" />
                </div>   
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="tipe_lantai_eksisting">Tipe Lantai Eksisting</label>
                    </div>
                    <select class="form-select" name="tipe_lantai_eksisting" id="tipe_lantai_eksisting" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="Granit/Homogenous Tile">Granit/Homogenous Tile</option>
                      <option value="Karpet">Karpet</option>
                      <option value="Keramik">Keramik</option>
                      <option value="Rabat Beton (Semen Ekspose)">Rabat Beton (Semen Ekspose)</option>
                      <option value="Teraso">Teraso</option>
                      <option value="Vynil">Vynil</option>
                      <option value="Papan Kayu">Papan Kayu</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="tle_bobot_lantai">Bobot Lantai(%)</label>
                    <input type="number" id="tle_bobot_lantai" name="tle_bobot_lantai" class="form-control" placeholder="73" />
                </div> 
                <hr>    
                <div>
                    <h5>Tambah Tipe Lantai Existing</h5>
                </div>  
                <div class="col-sm-6">
                    <div>
                        <label class="form-label" for="ttle_tipe_material">Tipe Material</label>
                    </div>
                    <select class="form-select" name="ttle_tipe_material" id="ttle_tipe_material" aria-label="Default select example">
                      <option value="" selected disabled>Pilih...</option>
                      <option value="True">True</option>
                      <option value="False">False</option>
                    </select>
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="ttle_bobot">Bobot(%)</label>
                    <input type="number" id="ttle_bobot" name="ttle_bobot" class="form-control" placeholder="73" />
                </div> 
                <div class="col-sm-6">
                    <label class="form-label" for="penggunaan_bangunan_saat_ini">Penggunaan Bangunan Saat Ini</label>
                    <input type="text" id="penggunaan_bangunan_saat_ini" name="penggunaan_bangunan_saat_ini" class="form-control" placeholder="Disewakan" />
                </div> 
                <div>
                  <h5>Perlengkapan Bangunan</h5>
              </div>               
              <div class="col-sm-6">
                  <div>
                      <label class="form-label" for="perlengkapan_bangunan">Perlengkapan Bangunan</label>
                  </div>
                  <select class="form-select" name="perlengkapan_bangunan" id="perlengkapan_bangunan" aria-label="Default select example">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="Listrik">Listrik</option>
                    <option value="Telepon">Telepon</option>
                    <option value="PDAM">PDAM</option>
                    <option value="Gas">Gas</option>
                    <option value="AC">AC</option>
                    <option value="Sumur Gali/Pompa">Sumur Gali/Pompa</option>
                  </select>
              </div>       
              <div class="col-sm-6">
                <label class="form-label" for="penggunaan_bangunan">Penggunaan Bangunan</label>
                <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan" class="form-control" placeholder="Rumah Tinggal" />
              </div> 
              <div class="col-sm-6">
                <label class="form-label" for="kondisi_bangunan">Kondisi Bangunan</label>
                <input type="text" id="kondisi_bangunan" name="kondisi_bangunan" class="form-control" placeholder="Baik" />
              </div> 
              <div class="col-sm-6">
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
