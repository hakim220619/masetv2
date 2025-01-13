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
<h4>Data Pembanding – Tanah Kosong</h4>
  <!-- Default -->
  <div class="row">  
    <!-- Default Icons Wizard -->
    <div class="col-12 mb-4">
      <div class="wizard-icons wizard-icons-example mt-2">
        
        <div class="content">
          <form method="POST" action="{{ route('add_pembanding_tanah_kosong') }}" enctype="multipart/form-data">
            <!-- Account Details -->
            @csrf
            <div id="account-details" class="content">
              <div class="row g-3">
                <div>
                  <label class="form-label" for="nama_tanah_kosong">Judul / Nama Tanah Kosong </label>
                  <input type="text" id="nama_tanah_kosong" name="nama_tanah_kosong" class="form-control"  />
                </div>   
                <div>
                  <label class="form-label" for="nama_entitas">Nama Entitas</label>
                  <input type="text" id="nama_entitas" name="nama_entitas" class="form-control"  />
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
                  <label class="form-label" for="keterangan_dasar_nilai">Keterangan Dasar Nilai pada Tabel Analisis</label>
                  <input type="text" id="keterangan_dasar_nilai" name="keterangan_dasar_nilai" class="form-control" placeholder="indikasi niali liquiditas/nilai investasi/nilai sewa pasar"  />
                </div>             
                <div>
                  <label class="form-label" for="alamat">Titik Point</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" placeholder="jl sukasari kecamatan baleendah bandung" />
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
              </div>
            </div>
            <!-- Personal Info -->
            <div id="personal-info" class="content">            
              <div class="row g-3">
                <hr>
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
                  <select name="sumber_data" id="sumber_data" class="form-select">
                    <option value="">Pilih..</option>
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
              </div>
            </div>
            <!-- Address -->
            <div id="address" class="content">
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
            <div class="mb-2">
                <label class="form-label" for="bentuk_tanah">Bentuk Tanah</label>
                <select name="bentuk_tanah" id="bentuk_tanah" class="form-select">
                  <option value="">Pilih...</option>
                  <option value="Beraturan">Beraturan</option>
                  <option value="Tidak Beraturan">Tidak Beraturan</option>
                  <option value="Persegi Panjang">Persegi Panjang</option>
                  <option value="Persegi Empat">Persegi Empat</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <!-- Social Links -->
            <div>
              <div class="mb-3">
                  <label class="form-label" for="lebar_muka_tanah">Lebar Muka Tanah (m)</label>
                  <input type="number" id="lebar_muka_tanah" name="lebar_muka_tanah" class="form-control" placeholder="22" />
              </div>
            <div class="mb-3">
                <label class="form-label" for="ketinggian_tanah_dr_muka_jln">Ketinggian Tanah dari Muka Jalan (m)</label>
                <input type="number" id="ketinggian_tanah_dr_muka_jln" name="ketinggian_tanah_dr_muka_jln" class="form-control" placeholder="0.1" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="topografi">Topografi / Elevasi</label>
              <select class="form-select" name="topografi" id="topografi" aria-label="Default select example">
                <option value="" selected disabled>Pilih...</option>
                <option value="Rata">Rata</option>
                <option value="Bergelombang">Bergelombang</option>
              </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="tingkat_hunian">Tingkat Hunian (%)</label>
                <input type="number" id="tingkat_hunian" name="tingkat_hunian" class="form-control" placeholder="70" />
            </div>
            <div class="mb-3">
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
            <div class="mb-3">
              <label class="form-label" for="kondisi_lingkungan_lainnya">Kondisi Lingkungan Lainnya</label>
              <input type="text" id="kondisi_lingkungan_lainnya" name="kondisi_lingkungan_lainnya" class="form-control"  />
            </div>
            <div class="mb-3">
              <div class="mb-3">
                <label class="form-label" for="keterangan_tambahan_lainnya">Keterangan Lingkungan Lainnya</label>
                <textarea class="form-control" name="keterangan_tambahan_lainnya" id="keterangan_tambahan_lainnya" cols="30" rows="10"></textarea>
              </div>
              <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded mb-3">
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
              <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded mb-3">
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
              <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded mb-3">
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
              <div class="mb-3">
                <label class="form-label" for="keterangan_jarak">Keterangan jarak dengan BCA terdekat (jika BCA)</label>
                <input type="text" id="keterangan_jarak" name="keterangan_jarak" class="form-control" placeholder="+- 1,4 KM (Bank BCA KCU Purwodadi)" />                
              </div>  
              <div class="mb-3">
                <label class="form-label" for="pengguanan_tnh_saat_ini">Pengguanaan Tanah Saat Ini</label>
                <input type="text" id="pengguanan_tnh_saat_ini" name="pengguanan_tnh_saat_ini" class="form-control" placeholder="Tanah Pekarangan" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="pemberi_tugas">Pemberi Tugas</label>
                <input type="text" id="pemberi_tugas" name="pemberi_tugas" class="form-control" placeholder="Bank Mandiri" />                
              </div>  
              <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded mb-3">
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
                        <select name="jenis_aset" id="jenis_aset" class="form-select">
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
                  <tr>
                    <th>
                      Jenis Aset Campuran / Lainnya                    
                    </th>
                  </tr> 
                  <tr>
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
            <div class="mb-3">
                <label class="form-label" for="status_data_pembanding">Status Data Pembanding</label>
                <select name="status_data_pembanding" id="status_data_pembanding" class="form-control">
                  <option value="">Pilih Status</option>
                  <option value="Lengkap">Lengkap</option>
                  <option value="Tidak lengkap">Tidak Lengkap</option>
                </select>
            </div> 
            </div>      
             
            <button class="btn btn-success btn-submit" type="submit">Submit</button>
          </form>        
    </div>
    <!-- /Default Icons Wizard -->
  </div>
  
<script>
  document.querySelector('#btn-review').addEventListener('click', function() {
    // Step 1
    document.getElementById('review-nip').innerHTML = document.getElementById('nip').value    
    document.getElementById('review-nib').innerHTML = document.getElementById('nib').value    
    document.getElementById('review-nama_tanah_kosong').innerHTML = document.getElementById('nama_tanah_kosong').value    
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
   
    document.getElementById('review-pengguanan_tnh_saat_ini').innerHTML = document.getElementById('pengguanan_tnh_saat_ini').value
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

@endsection
