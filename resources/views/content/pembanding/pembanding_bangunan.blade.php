@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Bangunan')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.js', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/select2/select2.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/form-wizard-icons.js'])
@endsection

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
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

        .bg-section {
            background-color: none;
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
            <div class="content">
                <form method="POST" action="{{ route('store_pembanding_bangunan') }}" enctype="multipart/form-data">
                    <!-- Account Details -->
                    @csrf
                    <div id="account-details" class="content">
                        <div class="row g-3">
                            <div class="form-group mb-3">
                                <label for="nama_bangunan"><b>Nama Bangunan</b> <span class="text-danger">*</span></label>
                                <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                                    placeholder="Rumah Tinggal Pak Budi Sastro" required>
                            </div>
                            <div>
                                <label for="nama_kjpp"><b>Nama KJPP</b></label>
                                <input type="text" id="nama_kjpp" name="nama_kjpp" class="form-control"
                                    placeholder="Rumah Bapak Budi" />
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Lokasi Obyek"><b>Lokasi Obyek</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Provinsi</b></th>
                                        <th><b>Kode Pos</b></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="provinsi" id="provinsi"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                            </select>
                                        </td>
                                        <td><input type="text" id="kode_pos" name="kode_pos" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><b>Alamat Lengkap</b></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="jenis_properti"><b>Jenis Properti</b></label>
                                <input type="text" id="id_jenis_properti" name="jenis_properti" class="form-control"
                                    placeholder="Contoh : Rumah Tinggal, Ruko, dll" />
                            </div>
                            <div class="form-group mb-3">
                                <label><b>Jenis Bangunan</b></label><br>
                                <input type="checkbox" id="id_jenis_bangunan" name="id_jenis_bangunan" value="Ruko/Rukan">
                                <label for="id_jenis_bangunan">Ruko/Rukan</label>
                            </div>
                            <div id="keteranganField">
                                <label for="kpt_tabel_analisis_ruko"><b>Keterangan Peruntukan Tanah
                                        pada
                                        Tabel Analisis Ruko</b></label>
                                <input type="text" id="kpt_tabel_analisis_ruko" name="kpt_tabel_analisis_ruko"
                                    class="form-control" placeholder="Berperuntukan Ruko" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="kdn_tabel_analisis"><b>Keterangan Dasar Nilai pada Tabel
                                        Analisis</b></label>
                                <input type="text" id="kdn_tabel_analisis" name="kdn_tabel_analisis" class="form-control"
                                    placeholder="Indikasi Nilai Liquidasi / Nilai Investasi / Nilai Sewa Pasar" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat"><b>Koordinat Obyek</b></label>
                                <label for="alamat"><b>Alamat</b></label>
                                <input type="text" id="alamat" name="alamat" class="form-control mb-2"
                                    placeholder="jl sukasari kecamatan baleendah bandung" readonly />
                                <div id="map" style="height: 400px; width: 100%;"></div>
                                <input type="text" id="lat" name="lat" class="form-control"
                                    placeholder="-8.9897878" hidden />
                                <input type="text" id="long" name="long" class="form-control"
                                    placeholder="89.8477748" hidden />
                            </div>
                            <div>
                                <label for="foto_tampak_depan"><b>Upload Foto Tampak
                                        Depan</b></label>
                                <input type="file" id="foto_tampak_depan" name="foto_tampak_depan"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="foto_tampak_sisi_kiri"><b>Upload Foto Tampak Sisi
                                        Kiri</b></label>
                                <input type="file" id="foto_tampak_sisi_kiri" name="foto_tampak_sisi_kiri"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="foto_tampak_sisi_kanan"><b>Upload Foto Tampak Sisi
                                        Kanan</b></label>
                                <input type="file" id="foto_tampak_sisi_kanan" name="foto_tampak_sisi_kanan"
                                    class="form-control" />
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Foto Lainnya"><b>Foto Lainnya</b></label>
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
                                            <td><input type="text" name="judul_foto[]" class="form-control" />
                                            </td>
                                            <td><input type="file" id="foto_lainnya" name="foto_lainnya[]"
                                                    class="form-control" accept="image/*" /></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm btn-action"
                                                    onclick="addFotoRow()">+</button>
                                                <button type="button" class="btn btn-danger btn-sm btn-action"
                                                    onclick="removeFotoRow(this)">-</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Nilai Perolehan"><b>Nilai Perolehan / NJOP /
                                        PBB</b></label>
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
                                            <td><input type="number" id="tahun_njop" name="tahun_njop[]"
                                                    class="form-control" placeholder="2024" /></td>
                                            <td><input type="number" id="nilai_njop" name="nilai_njop[]"
                                                    class="form-control" placeholder="4257000000" /></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm btn-action"
                                                    onclick="addNjopRow()">+</button>
                                                <button type="button" class="btn btn-danger btn-sm btn-action"
                                                    onclick="removeNjopRow(this)">-</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="narasumber"><b>Narasumber</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Nama Narasumber</b></th>
                                        <th><b>Telepon</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" id="nama_narsum" name="nama_narsum"
                                                class="form-control" placeholder="Bapak Ahmad Sudani" /></td>
                                        <td><input type="number" id="telepon" name="telepon" class="form-control"
                                                placeholder="087654354243" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <div>
                                    <label for="jenis_dok_hak_tanah"><b>Jenis Dokumen Hak
                                            Tanah</b></label>
                                    <select name="jenis_dok_hak_tanah" id="jenis_dok_hak_tanah" class="form-select">
                                        <option value="">Pilih..</option>
                                        <option value="Hak Milik">Hak Milik</option>
                                        <option value="Hak Guna Bangunan">Hak Guna Bangunan</option>
                                        <option value="Hak Guna Usaha">Hak Guna Usaha</option>
                                        <option value="Hak Pakai">Hak Pakai</option>
                                        <option value="Hak Milik Satuan Rumah Susun">Hak Milik Satuan Rumah Susun
                                        </option>
                                        <option value="Girik">Girik</option>
                                        <option value="Akad Jual Beli">Akad Jual Beli</option>
                                        <option value="Perjanjian Pengikatan Jual Beli">Perjanjian Pengikatan Jual Beli
                                        </option>
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
                            <div class="bg-section p-3 rounded">
                                <label for="perutuntukan_kawasan"><b>Peruntukan Kawasan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Zona Lindung</b></th>
                                        <th><b>Zona Budi Daya</b></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="zona_lindung" id="zona_lindung"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Zona Hutan Lindung">Zona Hutan Lindung</option>
                                                <option value="Zona Perlindungan Terhadap Kawasan Dibawahnya">Zona
                                                    Perlindungan Terhadap Kawasan Dibawahnya</option>
                                                <option value="Zona Perlindungan Setempat">Zona Perlindungan Setempat
                                                </option>
                                                <option value="Zona Ruang Terbuka Hijau">Zona Ruang Terbuka Hijau
                                                </option>
                                                <option value="Zona Suaka Alam dan Cagar Budaya">Zona Suaka Alam dan
                                                    Cagar Budaya</option>
                                                <option value="Zona Rawan Bencana Alam">Zona Rawan Bencana Alam
                                                </option>
                                                <option value="Zona Lainnya">Zona Lainnya</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="zona_budidaya" id="zona_budidaya"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Zona Perumahan">Zona Perumahan</option>
                                                <option value="Zona Perdagangan dan Jasa">Zona Perdagangan dan Jasa
                                                </option>
                                                <option value="Zona Perkantoran">Zona Perkantoran</option>
                                                <option value="Zona Sarana Pelayanan Umum">Zona Sarana Pelayanan Umum
                                                </option>
                                                <option value="Zona Indiustri">Zona Indiustri</option>
                                                <option value="Zona Ruang Terbuka Non Hijau">Zona Ruang Terbuka Non
                                                    Hijau</option>
                                                <option value="Zona Peruntukan Lainnya">Zona Peruntukan Lainnya
                                                </option>
                                                <option value="Zona Peruntukan Khusus">Zona Peruntukan Khusus</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="jenis_data"><b>Jenis Data</b></label>
                                <select class="form-select" name="jenis_data" id="jenis_data"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Penawaran">Penawaran</option>
                                    <option value="Transaksi">Transaksi</option>
                                    <option value="Price on Offer">Price on Offer</option>
                                </select>
                            </div>
                            <div>
                                <label for="tgl_penawaran"><b>Tanggal Penawaran / Waktu
                                        Transaksi</b></label>
                                <input type="datetime-local" id="tgl_penawaran" name="tgl_penawaran"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="sumber_data"><b>Sumber Data</b></label>
                                <select class="form-select" name="sumber_data" id="sumber_data"
                                    aria-label="Default select example">
                                    <option value="" disabled selected>Pilih sumber data</option>
                                    <option value="Pemilik">Pemilik</option>
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="Agen">Agen</option>
                                </select>
                            </div>
                            <div>
                                <label for="luas_tanah"><b>Luas Tanah (m2)</b></label>
                                <input type="number" id="luas_tanah" name="luas_tanah" class="form-control"
                                    placeholder="44" />
                            </div>
                            <div>
                                <label for="luas_tanah_terpotong"><b>Luas Tanah Terpotong
                                        (m2)</b></label>
                                <input type="number" id="luas_tanah_terpotong" name="luas_tanah_terpotong"
                                    class="form-control" placeholder="44" />
                            </div>
                            <div>
                                <label for="luas_bangunan"><b>Luas Bangunan Terpotong
                                        (m2)</b></label>
                                <input type="number" id="luas_bangunan" name="luas_bangunan" class="form-control"
                                    placeholder="44" />
                            </div>
                            <div>
                                <label for="harga_penawaran"><b>Harga Penawaran/Transaksi
                                        (Rp)</b></label>
                                <input type="text" id="harga_penawaran" name="harga_penawaran" class="form-control"
                                    placeholder="4257000000" />
                            </div>
                            <div>
                                <label for="diskon"><b>Diskon (%)</b></label>
                                <input type="number" id="diskon" name="diskon" class="form-control"
                                    placeholder="44" />
                            </div>
                            <div>
                                <label for="harga_sewa_per_tahun"><b>Harga Sewa per Tahun
                                        (Rp/tahun)</b></label>
                                <input type="number" id="harga_sewa_per_tahun" name="harga_sewa_per_tahun"
                                    class="form-control" placeholder="4257000000" />
                            </div>
                            <div>
                                <label for="skrap"><b>Skrap / Nilai Sisa (%)</b></label>
                                <input type="number" id="skrap" name="skrap" class="form-control"
                                    placeholder="44" />
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="penyusutan"><b>Penyusutan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Kemunduran Fungsi (%)</b></th>
                                        <th><b>Penjelasan Kemunduran Fungsi</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="kemunduran_fungsi" name="kemunduran_fungsi"
                                                value="0" class="form-control" /></td>
                                        <td>
                                            <textarea class="form-control" name="penjelasan_kemunduran_fungsi" id="penjelasan_kemunduran_fungsi"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><b>Kemunduran Ekonomis (%)</b></th>
                                        <th><b>Penjelasan Kemunduran Ekonomis</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="kemunduran_ekonomis" name="kemunduran_ekonomis"
                                                value="0" class="form-control" /></td>
                                        <td>
                                            <textarea class="form-control" name="penjelasan_kemunduran_ekonomis" id="penjelasan_kemunduran_ekonomis"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><b>Maintenance (%)</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="maintenance" name="maintenance" value="0"
                                                class="form-control" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="penyesuaian_elemen_perbandingan"><b>Penyesuaian Elemen
                                        Perbandingan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Syarat Pembiayaan
                                                Batasan dilakukan pelunasan pembayaran (Kelunakan)
                                            </b>
                                        </th>
                                        <th><b>Kondisi Penjualan
                                                Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan Kondisi Pemaksa
                                            </b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="pep_pembiayaan" id="pep_pembiayaan"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Tunai">Tunai</option>
                                                <option value="Kredit">Kredit</option>
                                                <option value="Bertahap">Bertahap</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="pep_penjualan" id="pep_penjualan"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Jual Cepat">Jual Cepat</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pengeluaran yang dilakukan segera setelah pembelian
                                            Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke fungsi atau
                                            peruntukan awal atau seharusnya
                                        </th>
                                        <th>
                                            Kondisi Pasar
                                            Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga penawaran
                                            (Menggunakan Indikator Waktu Penawaran / Transaksi)
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" id="pep_pengeluaran" name="pep_pengeluaran"
                                                placeholder="Tidak Ada" class="form-control" /></td>
                                        <td><input type="text" id="pep_pasar" name="pep_pasar" placeholder="Normal"
                                                class="form-control" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="penggunaan"><b>Penggunaan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            <b>Koefisien Dasar Bangunan (KDB) (%)</b>
                                        </th>
                                        <th>
                                            <b>Koefisien Lantai Bangunan (KLB) (kali)</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="koefisien_dasar_bangunan"
                                                name="koefisien_dasar_bangunan" class="form-control" /></td>
                                        <td><input type="number" id="koefisien_lantai_bangunan"
                                                name="koefisien_lantai_bangunan" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Garis Sempadan Bangunan (GSB) (meter)</b>
                                        </th>
                                        <th>
                                            <b>Ketinggian (lantai)</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="garis_sempadan_bangunan"
                                                name="garis_sempadan_bangunan" class="form-control" /></td>
                                        <td><input type="number" id="ketinggian" name="ketinggian"
                                                class="form-control" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="row_jalan"><b>Row Jalan (m)</b></label>
                                <input type="number" id="row_jalan" name="row_jalan" class="form-control"
                                    placeholder="12" />
                            </div>
                            <div>
                                <label for="tipe_jalan"><b>Tipe Jalan</b></label>
                                <input type="text" id="tipe_jalan" name="tipe_jalan" class="form-control"
                                    placeholder="Aspal" />
                            </div>
                            <div>
                                <label for="kapasitas_jalan"><b>Kapasitas Jalan</b></label>
                                <input type="text" id="kapasitas_jalan" name="kapasitas_jalan" class="form-control"
                                    placeholder="> 1 Kendaraan Roda 4" />
                            </div>
                            <div>
                                <label for="pengguna_lahan_lingkungan_eksisting"><b>Penggunaan
                                        Lahan
                                        Lingkungan Eksisting</b></label>
                                <select class="form-select" name="pengguna_lahan_lingkungan_eksisting"
                                    id="pengguna_lahan_lingkungan_eksisting" aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Pemukiman/Perumahan">Pemukiman/Perumahan</option>
                                    <option value="Campuran">Campuran</option>
                                </select>
                            </div>
                            <div>
                                <label for="letak_posisi_obyek"><b>Letak / Posisi Obyek</b></label>
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
                                <label for="lokasi_aset"><b>Lokasi Aset</b></label>
                                <select class="form-select" name="lokasi_aset" id="lokasi_aset"
                                    aria-label="Default select example">
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

                        <div class="row g-3 mt-1">
                            <div>
                                <label for="bentuk_tanah"><b>Bentuk Tanah</b></label>
                                <select name="bentuk_tanah" id="bentuk_tanah" class="form-select">
                                    <option value="">Pilih...</option>
                                    <option value="Beraturan">Beraturan</option>
                                    <option value="Tidak Beraturan">Tidak Beraturan</option>
                                    <option value="Persegi Panjang">Persegi Panjang</option>
                                    <option value="Persegi Empat">Persegi Empat</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="lebar_muka_tanah"><b>Lebar Muka Tanah (m)</b></label>
                                <input type="number" id="lebar_muka_tanah" name="lebar_muka_tanah" class="form-control"
                                    placeholder="22" />
                            </div>
                            <div>
                                <label for="ketinggian_tanah_dr_muka_jln"><b>Ketinggian Tanah dari
                                        Muka Jalan (m)</b></label>
                                <input type="number" id="ketinggian_tanah_dr_muka_jln"
                                    name="ketinggian_tanah_dr_muka_jln" class="form-control" placeholder="0.1" />
                            </div>
                            <div>
                                <label for="topografi"><b>Topografi / Elevasi</b></label>
                                <select class="form-select" name="topografi" id="topografi"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Rata">Rata</option>
                                    <option value="Bergelombang">Bergelombang</option>
                                </select>
                            </div>
                            <div>
                                <label for="tingkat_hunian"><b>Tingkat Hunian (%)</b></label>
                                <input type="number" id="tingkat_hunian" name="tingkat_hunian" class="form-control"
                                    placeholder="70" />
                            </div>
                            <div>
                                <div>
                                    <label><b>Kondisi Lingkungan Khusus</b></label><br>
                                    <div>
                                        <input type="checkbox" id="bebas_banjir" name="kondisi_lingkungan_khusus[]"
                                            value="Bebas Banjir">
                                        <label for="bebas_banjir">Bebas Banjir</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="banjir_musiman" name="kondisi_lingkungan_khusus[]"
                                            value="Banjir Musiman">
                                        <label for="banjir_musiman">Banjir Musiman</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="rawan_banjir" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Banjir">
                                        <label for="rawan_banjir">Rawan Banjir</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="rawan_kebakaran" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Kebakaran">
                                        <label for="rawan_kebakaran">Rawan Kebakaran</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="rawan_bencana_alam" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Bencana Alam">
                                        <label for="rawan_bencana_alam">Rawan Bencana Alam</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="rawan_huru_hara" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Huru-hara">
                                        <label for="rawan_huru_hara">Rawan Huru-hara</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_kuburan" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Kuburan">
                                        <label for="dekat_kuburan">Dekat Kuburan</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_sekolahan" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Sekolahan/Pasar">
                                        <label for="dekat_sekolahan">Dekat Sekolahan/Pasar</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="lokasi_tusuk_sate" name="kondisi_lingkungan_khusus[]"
                                            value="Lokasi Tusuk Sate">
                                        <label for="lokasi_tusuk_sate">Lokasi Tusuk Sate</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_tempat_ibadah"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Tempat Ibadah">
                                        <label for="dekat_tempat_ibadah">Dekat Tempat Ibadah</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_bangunan_liar"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Kumpulan Bangunan Liar">
                                        <label for="dekat_bangunan_liar">Dekat Kumpulan Bangunan Liar</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_jurang" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Jurang/ Rawan Longsor">
                                        <label for="dekat_jurang">Dekat Jurang/ Rawan Longsor</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_pasar" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Pasar">
                                        <label for="dekat_pasar">Dekat Pasar</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_tegangan_tinggi"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Tegangan Tinggi">
                                        <label for="dekat_tegangan_tinggi">Dekat Tegangan Tinggi</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_terminal" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Terminal">
                                        <label for="dekat_terminal">Dekat Terminal</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_saluran_irigasi"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Saluran Irigasi">
                                        <label for="dekat_saluran_irigasi">Dekat Saluran Irigasi</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="lainnya" name="kondisi_lingkungan_khusus[]"
                                            value="Lainnya">
                                        <label for="lainnya">Lainnya</label>
                                    </div>
                                </div>
                            </div>
                            <div id="lainnyaInputContainer" style="display: none;">
                                <label for="kondisi_lingkungan_lainnya"><b>Kondisi Lingkungan
                                        Lainnya</b></label>
                                <input type="text" id="kondisi_lingkungan_lainnya" name="kondisi_lingkungan_lainnya"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="keterangan_tambahan_lainnya"><b>Keterangan Tambahan
                                        Lainnya</b></label>
                                <td>
                                    <textarea class="form-control" name="keterangan_tambahan_lainnya" id="keterangan_tambahan_lainnya"></textarea>
                                </td>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="karakteristik_ekonomi"><b>Karakteristik Ekonomi (Jika
                                        objek yang dinilai adalah Properti Komersial)</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            <b>Kualitas Pendapatan</b>
                                        </th>
                                        <th>
                                            <b>Biaya Operasional</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="kualitas_pendapatan"
                                                id="kualitas_pendapatan" aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Rendah">Rendah</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Tinggi">Tinggi</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="biaya_opreasional_ekonomi"
                                                id="biaya_opreasional_ekonomi" aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Rendah">Rendah</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Tinggi">Tinggi</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Ketentuan Sewa</b>
                                        </th>
                                        <th>
                                            <b>Manajemen</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="ketentuan_sewa" id="ketentuan_sewa"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Mudah">Mudah</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Ketat">Ketat</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="manajemen" id="manajemen"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Kecil">Kecil</option>
                                                <option value="Menengah">Menengah</option>
                                                <option value="Besar">Besar</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Bauran Penyewa</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="bauran_penyewa" id="bauran_penyewa"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Terbatas">Terbatas</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Beragam">Ketat</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="kmpn_dlm_penjualan"><b>Komponen Non-Realty dalam
                                        Penjualan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            <b>FFE</b>
                                        </th>
                                        <th>
                                            <b>Biaya Operasional</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" id="ffe" name="ffe" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="number" id="biaya_operasional" name="biaya_operasional"
                                                class="form-control" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="gambaran_object_thd_lingkungan"><b>Gambaran Objek
                                        terhadap
                                        Wilayah dan Lingkungan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            <b>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Kota. Nama Pusat Kota /
                                                Jarak</b>
                                        </th>
                                        <th>
                                            <b>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Ekonomi terdekat (Pasar
                                                Mall).
                                                Nama Pusat Ekonomi / Jarak</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="nm_pusat_kota" name="nm_pusat_kota"
                                                placeholder="Nama pusat kota / Jarak" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" id="nm_pusat_ekonomi" name="nm_pusat_ekonomi"
                                                placeholder="Nama pusat ekonomi / Jarak" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Jarak dengan CBD (Pusat Ekonomi) dari Jalan Utama terdekat. Nama Jalan /
                                                Jarak</b>
                                        </th>
                                        <th>
                                            <b>Kondisi Lingkungan Khusus yang mempengaruhi Nilai</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="nm_jalan" name="nm_jalan"
                                                placeholder="Nama jalan / Jarak" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" id="kondisi_lingkungan" name="kondisi_lingkungan"
                                                class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Faktor View (Pemandangan) untuk Properti yang faktor view dimungkinkan
                                                sangat berpengaruh pada nilai (contoh: apartemen, vila, dll)</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="pemandangan" name="pemandangan"
                                                class="form-control" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <div>
                                    <label for="keterangan_jarak_dr_bca"><b>Keterangan jarak dengan
                                            BCA terdekat (jika BCA)</b></label>
                                    <div>
                                        <small><i>Cantumkan jarak dan nama kantor cabang</i></small>
                                    </div>
                                </div>
                                <input type="text" id="keterangan_jarak_dr_bca" name="keterangan_jarak_dr_bca"
                                    placeholder="± 1,4 Km (Bank BCA KCU Purwodadi)" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="bentuk_bangunan"><b>Bentuk Bangunan</b></label>
                                <select class="form-select" name="bentuk_bangunan" id="bentuk_bangunan"
                                    aria-label="Default select example">
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
                            <!-- Jumlah Lantai -->
                            <div class="form-group mb-1">
                                <label for="jumlah_lantai"><b>Jumlah Lantai</b></label>
                                <input type="number" id="jumlah_lantai" name="jumlah_lantai" class="form-control"
                                    value="1" min="1">
                            </div>
                            <div>
                                <label for="basement"><b>Basement</b></label>
                                <select class="form-select" name="basement" id="basement"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Ada Basement">Ada Basement</option>
                                    <option value="Tidak Ada Basement">Tidak Ada Basement</option>
                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_bangunan"><b>Kontruksi Bangunan</b></label>
                                <select class="form-select" name="kontruksi_bangunan" id="kontruksi_bangunan"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Permanen">Permanen</option>
                                    <option value="Semi Permanen">Semi Permanen</option>
                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_lantai"><b>Kontruksi Lantai</b></label>
                                <select class="form-select" name="kontruksi_lantai" id="kontruksi_lantai"
                                    aria-label="Default select example">
                                    <option value="" selected>Pilih...</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Marmer">Marmer</option>
                                    <option value="Ubin">Ubin</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Teraso">Teraso</option>
                                    <option value="Granit">Granit</option>
                                    <option value="Semen">Semen</option>
                                    <option value="Rabat Beton">Rabat Beton</option>
                                    <option value="Flooring Kayu">Flooring Kayu</option>
                                    <option value="Lainnya">Semen</option>
                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_dinding"><b>Kontruksi Dinding</b></label>
                                <select class="form-select" name="kontruksi_dinding" id="kontruksi_dinding"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Bata">Bata</option>
                                    <option value="Batako">Batako</option>
                                    <option value="Kaca">Kaca</option>
                                    <option value="Beton Ringan">Beton Ringan</option>
                                    <option value="Beton">Beton</option>
                                    <option value="Lainnya">Lainnya</option>

                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_atap"><b>Kontruksi atap</b></label>
                                <select class="form-select" name="kontruksi_atap" id="kontruksi_atap"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Genteng Beton">Genteng Beton</option>
                                    <option value="Genteng Baja">Genteng Baja</option>
                                    <option value="Genteng Sirap">Genteng Sirap</option>
                                    <option value="Genteng Jawa">Genteng Jawa</option>
                                    <option value="Asbes">Asbes</option>
                                    <option value="Seng">Seng</option>
                                    <option value="Dak Beton">Dak Beton</option>
                                    <option value="Galvalum">Galvalum</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_pondasi"><b>Kontruksi Pondasi</b></label>
                                <select class="form-select" name="kontruksi_pondasi" id="kontruksi_pondasi"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Beton Bertulang">Beton Bertulang</option>
                                    <option value="Pasangan Batu Kali">Pasangan Batu Kali</option>
                                    <option value="Umpak">Umpak</option>
                                    <option value="Rolag Bata">Rolag Bata</option>
                                    <option value="Kayu">Kayu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="versi_btb"><b>Versi BTB</b></label>
                                <div>
                                    <small><i>Mengupdate versi BTB akan mengubah tipe material bangunan. Mohon periksa
                                            kembali bobot material pada kotak-kotak isian dibawah ini sebelum menyimpan
                                            form.</i></small>
                                </div>
                                <?php
                                $currentYear = date('Y');
                                ?>

                                <select class="form-select" name="versi_btb" id="versi_btb"
                                    aria-label="Default select example">
                                    <?php
                                    for ($i = 0; $i < 5; $i++) {
                                        $year = $currentYear - $i;
                                        echo "<option value='$year'>$year</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="tipe_spek"><b>Tipikal Bangunan Sesuai Spek BTB MAPPI </b> <span
                                        class="text-danger">*</span></label>
                                <select id="tipe_spek" name="tipe_spek" class="form-select" required>
                                    <option value="tolol" selected>- Select -</option>
                                    <option value="100">Rumah Tinggal Sederhana 1 Lantai</option>
                                    <option value="200">Rumah Tinggal Menengah 2 Lantai</option>
                                    <option value="300">Rumah Tinggal Mewah 2 Lantai</option>
                                    <option value="400">Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                    <option value="500">Bangunan Gudang 1 Lantai</option>
                                    <option value="600">Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5 Lantai)
                                    </option>
                                    <option value="700">Bangunan Gedung Bertingkat Sedang 8 Lantai + 1 Basement (5-8
                                        Lantai)
                                    </option>
                                    <option value="800">Bangunan Gedung Bertingkat Tinggi 16 Lantai + 2 Basement
                                        (&gt;8 Lantai)
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
                                    document.querySelectorAll(
                                        '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                                    ).forEach(
                                        form => {
                                            form.style.display = 'none';
                                        });

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
                                            // Tambahkan inisialisasi untuk form 500
                                            if (typeof initForm500 === 'function') {
                                                initForm500();
                                            }
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
                                            // Sembunyikan semua form jika tidak ada yang dipilih
                                            document.querySelectorAll(
                                                    '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                                                )
                                                .forEach(form => {
                                                    form.style.display = 'none';
                                                });
                                    }
                                });

                                // Tambahkan fungsi inisialisasi untuk form 500
                                function initForm500() {
                                    // Inisialisasi select grade gudang
                                    const gradeGudangSelect = document.getElementById('grade_gudang');
                                    if (gradeGudangSelect) {
                                        // Reset nilai
                                        gradeGudangSelect.value = '';

                                        // Tampilkan select
                                        gradeGudangSelect.closest('.form-group').style.display = 'block';

                                        // Trigger change event untuk memastikan handler terpanggil
                                        gradeGudangSelect.dispatchEvent(new Event('change'));
                                    }
                                }

                                // Tambahkan event listener saat dokumen dimuat
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Cek apakah form 500 perlu ditampilkan berdasarkan nilai yang tersimpan
                                    const tipeSpekSelect = document.getElementById('tipe_spek');
                                    if (tipeSpekSelect && tipeSpekSelect.value === '500') {
                                        document.getElementById('500').style.display = 'block';
                                        initForm500();
                                    }
                                });
                            </script>
                            <div id ="dynamic-content">
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

                            <div class="form-group mb-3">
                                <label for="penggunaan_bangunan"><b>Penggunaan Bangunan Saat Ini</b></label>
                                <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan"
                                    class="form-control" placeholder="Disewakan, Selama berapa tahun">
                            </div>
                            <div class="form-group mb-3">
                                <label><b>Perlengkapan Bangunan</b></label><br>
                                <div>
                                    <input type="checkbox" id="listrik" name="perlengkapan_bangunan[]"
                                        value="listrik">
                                    <label for="listrik">Listrik</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="telepon_rumah" name="perlengkapan_bangunan[]"
                                        value="telepon">
                                    <label for="telepon_rumah">Telepon</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="pdam" name="perlengkapan_bangunan[]" value="pdam">
                                    <label for="pdam">PDAM</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="gas" name="perlengkapan_bangunan[]" value="gas">
                                    <label for="gas">Gas</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="ac" name="perlengkapan_bangunan[]" value="ac">
                                    <label for="ac">AC</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="sumur" name="perlengkapan_bangunan[]" value="sumur">
                                    <label for="sumur">Sumur Gali/Pompa</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="progres_pembangunan"><b>Progres Pembangunan jika aset dalam proses (dalam
                                        persen)</b></label>
                                <input type="number" id="progres_pembangunan" name="progres_pembangunan"
                                    class="form-control" placeholder="Masukkan nilai dalam persen" min="0"
                                    max="100">
                            </div>
                            <div class="form-group mb-3">
                                <label for="kondisi_bangunan"><b>Kondisi Bangunan</b></label>
                                <select class="form-select" name="kondisi_bangunan" id="kondisi_bangunan"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Terawat">Terawat</option>
                                    <option value="Tidak Terawat">Tidak Terawat</option>

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="pemberi_tugas"><b>Pemberi Tugas</b></label><br>
                                <small><i>Formulir tambahan untuk melengkapi Laporan kepada Pemberi Tugas.</i></small>
                                <select class="form-select" name="pemberi_tugas" id="pemberi_tugas"
                                    aria-label="Default select example" onchange="toggleMandiriForm()">
                                    <option value="" selected>Pilih...</option>
                                    <option value="Bank Mandiri">Bank Mandiri</option>
                                </select>
                            </div>
                            <div id="formMandiriContainer" style="display: none;" class="p-3 rounded">
                                <label for="form_isi_mandiri"><b>Form Isian Bank
                                        Mandiri</b></label>
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
                                            <select name="jenis_aset" id="jenis_aset" class="form-select"
                                                onchange="toggleJenisAsetInput()">
                                                <option value="">Pilih...</option>
                                                <option value="Campuran">Campuran</option>
                                                <option value="Gedung Apartemen">Gedung Apartemen</option>
                                                <option value="Gedung Kantor">Gedung Kantor</option>
                                                <option value="Gudang">Gudang</option>
                                                <option value="Hotel">Hotel</option>
                                                <option value="Kios">Kios</option>
                                                <option value="Los Kerja/Bengkel/Workshop">Los Kerja/Bengkel/Workshop
                                                </option>
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
                                                <option value="Perdagangan dan Jasa Komersial">Perdagangan dan Jasa
                                                    Komersial</option>
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
                                            <input type="text" name="jenis_aset_lainnya" id="jenis_aset_lainnya"
                                                class="form-control">
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
                                            <input type="text" name="jabatan_narasumber" id="jabatan_narasumber"
                                                class="form-control">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="status_data_pembanding"><b>Status Data
                                        Pembanding</b></label>
                                <select class="form-select" name="status_data_pembanding" id="status_data_pembanding"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Lengkap">Lengkap</option>
                                    <option value="Tidak Lengkap">Tidak Lengkap</option>
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
        <!-- /Default Icons Wizard -->
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
        // Fungsi untuk tabel NJOP
        function addNjopRow() {
            const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const rowCount = table.rows.length;

            newRow.innerHTML = `
                <td class="row-number">${rowCount}</td>
                <td><input type="number" name="tahun[]" class="form-control" /></td>
                <td><input type="number" name="nilai_perolehan[]" class="form-control" /></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addNjopRow()">+</button>
                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeNjopRow(this)">-</button>
                </td>
            `;
            updateNjopRowNumbers();
        }

        function removeNjopRow(button) {
            const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1);
                updateNjopRowNumbers();
            }
        }

        function updateNjopRowNumbers() {
            const rows = document.querySelectorAll('#njopTable .row-number');
            rows.forEach((cell, index) => {
                cell.textContent = index + 1;
            });
        }

        // Fungsi untuk tabel Luas Pintu Jendela
        function addPintuJendelaRow() {
            const table = document.getElementById('luas_pintu_jendela').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const rowCount = table.rows.length;

            newRow.innerHTML = `
                <td class="row-number">${rowCount}</td>
                <td><input type="number" name="tahun_pintu[]" class="form-control" /></td>
                <td><input type="number" name="nilai_pintu[]" class="form-control" /></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addPintuJendelaRow()">+</button>
                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removePintuJendelaRow(this)">-</button>
                </td>
            `;
            updatePintuJendelaRowNumbers();
        }

        function removePintuJendelaRow(button) {
            const table = document.getElementById('luas_pintu_jendela').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1);
                updatePintuJendelaRowNumbers();
            }
        }

        function updatePintuJendelaRowNumbers() {
            const rows = document.querySelectorAll('#luas_pintu_jendela .row-number');
            rows.forEach((cell, index) => {
                cell.textContent = index + 1;
            });
        }

        // Fungsi untuk tabel Luas Dinding
        function addDindingRow() {
            const table = document.getElementById('luas_dinding').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const rowCount = table.rows.length;

            newRow.innerHTML = `
                <td class="row-number">${rowCount}</td>
                <td><input type="number" name="tahun_dinding[]" class="form-control" /></td>
                <td><input type="number" name="nilai_dinding[]" class="form-control" /></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addDindingRow()">+</button>
                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeDindingRow(this)">-</button>
                </td>
            `;
            updateDindingRowNumbers();
        }

        function removeDindingRow(button) {
            const table = document.getElementById('luas_dinding').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1);
                updateDindingRowNumbers();
            }
        }

        function updateDindingRowNumbers() {
            const rows = document.querySelectorAll('#luas_dinding .row-number');
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
        $(document).ready(function() {
            // Inisialisasi Select2
            $('#kondisi_lingkungan_khusus').select2();

            // Event listener untuk memantau perubahan pilihan
            $('#kondisi_lingkungan_khusus').on('change', function() {
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
            lines.push({
                x1: currentX,
                y1: currentY,
                x2: newX,
                y2: newY
            });
            points.push({
                x: newX,
                y: newY
            });
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    <!-- Tambahkan sebelum tag </form> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded');

            const mainForm = document.getElementById('mainForm');
            const tipeSpekSelect = document.getElementById('tipe_spek');

            if (mainForm) {
                mainForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Form submission intercepted');

                    const selectedType = tipeSpekSelect ? tipeSpekSelect.value : null;
                    console.log('Selected type at submission:', selectedType);

                    if (!selectedType) {
                        console.warn('No type selected');
                        return;
                    }

                    // Dapatkan semua container
                    const containers = document.querySelectorAll(
                        '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                    );

                    // Sembunyikan semua container kecuali yang aktif
                    containers.forEach(container => {
                        if (container.id !== selectedType) {
                            container.style.display = 'none';
                        }
                    });

                    const activeContainer = document.getElementById(selectedType);
                    console.log('Active container:', activeContainer);

                    if (!activeContainer) {
                        console.warn('Active container not found');
                        return;
                    }

                    // Kumpulkan semua elemen form dari container aktif
                    const formElements = activeContainer.querySelectorAll('input, select, textarea');
                    console.log(`Found ${formElements.length} elements in active container`);

                    // Proses setiap elemen
                    formElements.forEach(element => {
                        if (!element.name) return;

                        // Log state awal
                        console.log('Processing element:', {
                            name: element.name,
                            type: element.type,
                            value: element.value,
                            isArray: element.name.endsWith('[]')
                        });

                        // Hapus suffix dari nama elemen
                        const suffix = `_${selectedType}`;
                        if (element.name.endsWith(suffix)) {
                            const newName = element.name.replace(suffix, '');
                            console.log(`Renaming ${element.name} to ${newName}`);
                            element.name = newName;
                        } else if (element.name.endsWith(`${suffix}[]`)) {
                            const newName = element.name.replace(`${suffix}[]`, '[]');
                            console.log(`Renaming array element ${element.name} to ${newName}`);
                            element.name = newName;
                        }
                    });

                    // Nonaktifkan elemen di container yang tidak aktif
                    containers.forEach(container => {
                        if (container.id !== selectedType) {
                            const inactiveElements = container.querySelectorAll(
                                'input, select, textarea');
                            inactiveElements.forEach(element => {
                                element.disabled = true;
                            });
                        }
                    });

                    // Log final form data
                    const formData = new FormData(this);
                    console.log('Final form data:');
                    for (let [key, value] of formData.entries()) {
                        console.log(`${key}:`, value);
                    }

                    // Submit form
                    console.log('Submitting form...');
                    this.submit();
                });

                // Tambahkan event listener untuk perubahan tipe_spek
                tipeSpekSelect.addEventListener('change', function() {
                    const selectedType = this.value;
                    console.log('Tipe spek changed to:', selectedType);

                    // Update tampilan container
                    const containers = document.querySelectorAll(
                        '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                    );

                    containers.forEach(container => {
                        container.style.display = container.id === selectedType ? 'block' : 'none';
                    });

                    // Reset form jika diperlukan
                    // mainForm.reset();
                });
            }

            // Debug info
            console.log('Initial selected type:', tipeSpekSelect.value);
        });
    </script>

@endsection
