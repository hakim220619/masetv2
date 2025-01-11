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

<h4>Tambah Obyek Penilaian – Bangunan</h4>
<!-- Default -->
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

<div class="row">
    <!-- Default Icons Wizard -->
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="col-12 mb-4">
            @csrf
            <div class="form-group mb-3">
                <label for="nama_bangunan"><b>Nama Bangunan</b> <span class="text-danger">*</span></label>
                <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control" placeholder="Rumah Tinggal Pak Budi Sastro" required>
            </div>
            <!-- Upload Foto Tampak Depan -->
            <div class="form-group mb-3">
                <label for="foto_depan" class="form-label"><b>Upload Foto Tampak Depan</b></label><br>
                <input type="file" id="foto_depan" name="foto_depan">
            </div>

            <!-- Upload Foto Tampak Sisi Kiri -->
            <div class="form-group mb-3">
                <label for="foto_sisi_kiri" class="form-label"><b>Upload Foto Tampak Sisi Kiri</b></label><br>
                <input type="file" id="foto_sisi_kiri" name="foto_sisi_kiri">
            </div>

            <!-- Upload Foto Tampak Sisi Kanan -->
            <div class="form-group mb-3">
                <label for="foto_sisi_kanan" class="form-label"><b>Upload Foto Tampak Sisi Kanan</b></label><br>
                <input type="file" id="foto_sisi_kanan" name="foto_sisi_kanan">
            </div>

            <!-- Foto Lainnya -->
            <div class="form-group mb-3">
                <label for="foto_lainnya"><b>Foto Lainnya</b></label>
                <div class="foto-lainnya-container">
                    <div class="foto-item">
                        <div style="flex: 1;">
                            <label for="judul_foto_1">Judul Foto</label>
                            <input type="text" name="judul_foto[]" class="form-control" placeholder="Judul Foto">
                        </div>
                        &nbsp;&nbsp;
                        <div style="flex: 1;">
                            <label for="foto_1">Upload Foto</label>
                            <input type="file" name="foto_lainnya[]" class="form-control">
                        </div>
                        <div class="foto-controls">
                            <div class="row">
                                <button type="button" class="tambah-foto">+</button>
                                <button type="button" class="hapus-foto">-</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" id="tambah-foto" class="btn btn-primary btn-sm mt-2">Tambah Foto</a>
            </div>

            <div class="form-group mb-3">
                <label for="bentuk_bangunan"><b>Bentuk Bangunan</b></label>
                <select id="bentuk_bangunan" name="bentuk_bangunan" class="form-select">
                    <option value="" selected>- Select -</option>
                    <option value="persegi">Persegi</option>
                    <option value="persegi_panjang">Persegi Panjang</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            <!-- Jumlah Lantai -->
            <div class="form-group mb-3">
                <label for="jumlah_lantai"><b>Jumlah Lantai</b></label>
                <input type="number" id="jumlah_lantai" name="jumlah_lantai" class="form-control" value="1" min="1">
            </div>

            <!-- Tambahan Form dari Gambar -->
            <div class="form-group mb-3">
                <label><b>Basement</b></label><br>
                <input type="checkbox" id="basement" name="basement" value="1">
                <label for="basement">Ada basement</label>
            </div>

            <div class="form-group mb-3">
                <label for="konstruksi_bangunan"><b>Konstruksi Bangunan</b></label>
                <select id="konstruksi_bangunan" name="konstruksi_bangunan" class="form-select">
                    <option value="" selected>- Select -</option>
                    <option value="beton">Beton</option>
                    <option value="baja">Baja</option>
                    <option value="kayu">Kayu</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="konstruksi_lantai"><b>Konstruksi Lantai</b></label>
                <select id="konstruksi_lantai" name="konstruksi_lantai" class="form-select">
                    <option value="" selected>- Select -</option>
                    <option value="keramik">Keramik</option>
                    <option value="marmer">Marmer</option>
                    <option value="beton_polish">Beton Polish</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="konstruksi_dinding"><b>Konstruksi Dinding</b></label>
                <select id="konstruksi_dinding" name="konstruksi_dinding" class="form-select">
                    <option value="" selected>- Select -</option>
                    <option value="bata">Bata</option>
                    <option value="beton_pracetak">Beton Pracetak</option>
                    <option value="kayu">Kayu</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="konstruksi_atap"><b>Konstruksi Atap</b></label>
                <select id="konstruksi_atap" name="konstruksi_atap" class="form-select">
                    <option value="" selected>- Select -</option>
                    <option value="genteng">Genteng</option>
                    <option value="spandek">Spandek</option>
                    <option value="asbes">Asbes</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="konstruksi_pondasi"><b>Konstruksi Pondasi</b></label>
                <select id="konstruksi_pondasi" name="konstruksi_pondasi" class="form-select">
                    <option value="" selected>- Select -</option>
                    <option value="batu_kali">Batu Kali</option>
                    <option value="beton">Beton</option>
                    <option value="tiang_pancang">Tiang Pancang</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="versi_btb"><b>Versi BTB</b></label>
                <input type="text" id="versi_btb" name="versi_btb" class="form-control" value="2024" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="tipe_spek"><b>Tipikal Bangunan Sesuai Spek BTB MAPPI</b> <span class="text-danger">*</span></label>
                <select id="tipe_spek" name="tipe_spek" class="form-select" required>
                    <option value="" selected>- Select -</option>
                    <option value="rumah_sederhana">Rumah Tinggal Sederhana 1 Lantai</option>
                    <option value="rumah_menengah">Rumah Tinggal Menengah 2 Lantai</option>
                    <option value="rumah_mewah">Rumah Tinggal Mewah 2 Lantai</option>
                    <option value="bangunan_perkebunan">Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                    <option value="500">Bangunan Gudang 1 Lantai</option>
                    <option value="600">Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5 Lantai)</option>
                    <option value="700">Bangunan Gedung Bertingkat Sedang 8 Lantai + 1 Basement (5-8 Lantai)</option>
                    <option value="800">Bangunan Gedung Bertingkat Tinggi 16 Lantai + 2 Basement (&gt;8 Lantai)</option>
                    <option value="900">Bangunan Mall 4 Lantai + 1 Basement</option>
                    <option value="1000">Bangunan Hotel 8 Lantai</option>
                    <option value="1100">Bangunan Apartemen 14 Lantai + 2 Semi Basement</option>
                    <!-- More options... -->
                </select>
            </div>

            <!-- Tempat untuk memuat form dinamis -->





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
                        case 'rumah_sederhana':
                            document.getElementById('form-rumah-sederhana').style.display = 'block';
                            break;
                        case 'rumah_menengah':
                            document.getElementById('form-rumah-menengah').style.display = 'block';
                            break;
                        case 'rumah_mewah':
                            document.getElementById('form-rumah-mewah').style.display = 'block';
                            break;
                        case 'bangunan_perkebunan':
                            document.getElementById('form-bangunan-perkebunan').style.display = 'block';
                            break;
                        default:
                            // Tidak ada yang dipilih, semua tetap disembunyikan
                            break;
                    }
                });
            </script>
            

            <div id="dynamic-content">
                {{-- begin rumah mewah lantai 2 --}}

                <style>
                    .area-lainnya-container-rumah-mewah {
                        border: 1px solid #dee2e6;
                        padding: 10px;
                        border-radius: 5px;
                    }

                    .area-lainnya-container-rumah-mewah .form-group {
                        margin-bottom: 0;
                    }

                    .area-lainnya-container-rumah-mewah label {
                        font-weight: bold;
                    }

                    .area-item {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        margin-bottom: 10px;
                        padding: 5px;
                    }

                    .area-item input {
                        margin-right: 5px;
                    }

                    .area-controls button {
                        background: none;
                        border: none;
                        color: #007bff;
                        font-size: 18px;
                    }
                </style>


                <div id="form-rumah-mewah" style=" margin-top: 20px; display: none;">
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
                        <br>
                        <small class="form-text text-muted" style="margin-top: 5px;">Pilih jenis bangunan yang sesuai untuk menentukan umur ekonomis bangunan.</small>
                        <select class="form-control" id="jenis_bangunan" name="jenis_bangunan">
                            <option value="">- Select -</option>
                            <option value="Bangunan Rumah Tinggal">Bangunan Rumah Tinggal</option>
                            <option value="Bangunan Rumah Susun">Bangunan Rumah Susun</option>
                            <option value="Pusat Perbelanjaan">Pusat Perbelanjaan</option>
                            <option value="Bangunan Kantor">Bangunan Kantor</option>
                            <option value="Bangunan Gedung Pemerintah">Bangunan Gedung Pemerintah</option>
                            <option value="Bangunan Hotel/ Motel">Bangunan Hotel/ Motel</option>
                            <option value="Bangunan Industri dan Gudang">Bangunan Industri dan Gudang</option>
                            <option value="Bangunan di Kawasan Perkebunan">Bangunan di Kawasan Perkebunan</option>
                        </select>

                    </div>

                    <div class="form-group" style="margin-top: 20px;">
                        <label for="jenis_bangunan_indeks_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks Lantai)</label>
                        <br>
                        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai MAPPI.</small>
                        <select class="form-control" id="jenis_bangunan_indeks_lantai" name="jenis_bangunan_indeks_lantai">
                            <option value="">- Select -</option>
                            <option value="Rumah Tinggal Sederhana">Rumah Tinggal Sederhana (Simple Dwelling)</option>
                            <option value="Rumah Tinggal Menengah">Rumah Tinggal Menengah (Medium Dwelling)</option>
                            <option value="Rumah Tinggal Mewah">Rumah Tinggal Mewah (Luxury Dwelling)</option>
                            <option value="Bangunan Gedung Bertingkat Low Rise">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai) (Low-Rise Building &lt;5 Floors)</option>
                            <option value="Bangunan Gedung Bertingkat Mid Rise">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai) (Mid-Rise Building &lt;9 Floors)</option>
                            <option value="Bangunan Gedung Bertingkat High Rise">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai) (High-Rise Building &gt;8 Floors)</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
                        <input type="number" class="form-control" id="tahun_dibangun" name="tahun_dibangun" placeholder="Enter Year" min="1900" max="2024">
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
                        <input type="number" class="form-control" id="tahun_renovasi" name="tahun_renovasi" placeholder="Enter Year" min="1900" max="2024">
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="kondisi_visual" style="font-weight: bold;">Kondisi Bangunan Secara Visual</label>
                        <select class="form-control" id="kondisi_visual" name="kondisi_visual">
                            <option value="">- Select -</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Kurang Baik">Kurang Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Baik">Baik</option>
                            <option value="Baik Sekali">Baik Sekali</option>
                            <option value="Baru">Baru</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="catatan_khusus" style="font-weight: bold;">Catatan Khusus Bangunan</label>
                        <textarea class="form-control" id="catatan_khusus" name="catatan_khusus" rows="4" placeholder="Tambahkan catatan khusus di sini..."></textarea>
                    </div>
                    <!-- Field Baru: Luas Bangunan Terpotong (m²) -->
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="luas_bangunan_terpotong" style="font-weight: bold;">Luas Bangunan Terpotong (m²)</label><br>
                        <small class="form-text text-muted">Terpotong atau alasannya lainnya.</small>
                        <input type="number" class="form-control" id="luas_bangunan_terpotong" name="luas_bangunan_terpotong" placeholder="Enter Area" min="0" step="0.01">
                    </div>

                    <!-- Field Baru: Luas Bangunan menurut IMB (m²) -->
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="luas_bangunan_imb" style="font-weight: bold;">Luas Bangunan menurut IMB (m²)</label>
                        <input type="number" class="form-control" id="luas_bangunan_imb" name="luas_bangunan_imb" placeholder="Enter Area" min="0" step="0.01">
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Pintu dan Jendela</b></label><br>
                        <small class="form-text text-muted">Luas pintu dan jendela yang ada.</small>
                        <div class="area-lainnya-container-rumah-mewah" data-type="pintu-jendela">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_pintu_jendela[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_pintu_jendela[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="pintu-jendela">Tambah Area</button>
                    </div>

                    <!-- Luas Dinding -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Dinding</b></label><br>
                        <small class="form-text text-muted">Masukkan luas dinding kotor belum dikurangi luas pintu dan jendela.</small>
                        <div class="area-lainnya-container-rumah-mewah" data-type="dinding">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_dinding[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_dinding[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="dinding">Tambah Area</button>
                    </div>
                    <!-- Luas Rangka Atap Datar -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Rangka Atap Datar</b></label><br>
                        <small class="form-text text-muted">Masukkan luas rangka atap datar.</small>
                        <div class="area-lainnya-container-rumah-mewah" data-type="atap-datar">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_atap_datar[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_atap_datar[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="atap-datar">Tambah Area</button>
                    </div>

                    <!-- Luas Atap Datar -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Atap Datar</b></label><br>
                        <small class="form-text text-muted">Masukkan luas atap datar.</small>
                        <div class="area-lainnya-container-rumah-mewah" data-type="atap-datar-2">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_atap_datar_2[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_atap_datar_2[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="atap-datar-2">Tambah Area</button>
                    </div>
                    <!-- Tipe Pondasi Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Pondasi Eksisting - Rumah Tinggal Mewah 2 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Batu Kali" id="pondasi_batu_kali" onchange="toggleBobotInput(this, 'bobot_pondasi_batu_kali')">
                                <label class="form-check-label" for="pondasi_batu_kali">Batu Kali</label>
                            </div>
                        </div>
                        <div id="bobot_pondasi_batu_kali" style="display: none; margin-top: 10px;">
                            <label for="bobot_batu_kali">Bobot Pondasi Batu Kali (dalam persen %)</label>
                            <input type="number" class="form-control" id="bobot_batu_kali" name="bobot_batu_kali" placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
                        </div>
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
                        <div id="pondasi-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-mewah" data-type="pondasi">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_pondasi[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="Batu Kali - Rumah Tinggal Sederhana 1 Lantai">Batu Kali - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai">Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
                                        </select>
                                    </div>

                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_pondasi[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="pondasi">Tambah Tipe Pondasi Existing</button>

                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-pondasi-btn">Tambah Tipe Pondasi Existing</button>


                    </div>
                    <!-- Tipe Struktur Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Struktur Eksisting - Rumah Tinggal Mewah 2 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Beton Bertulang" id="struktur_beton_bertulang" onchange="toggleBobotInput(this, 'bobot_struktur_beton_bertulang')">
                                <label class="form-check-label" for="struktur_beton_bertulang">Beton Bertulang</label>
                            </div>
                        </div>
                        <div id="bobot_struktur_beton_bertulang" style="display: none; margin-top: 10px;">
                            <label for="bobot_beton_bertulang">Bobot Struktur Beton Bertulang (dalam persen %)</label>
                            <input type="number" class="form-control" id="bobot_beton_bertulang" name="bobot_beton_bertulang" placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
                        </div>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
                        <div id="struktur-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-mewah" data-type="struktur">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_struktur[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Mewah 2 Lantai">Beton Bertulang - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Menengah 2 Lantai">Beton Bertulang - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Sederhana 1 Lantai">Beton Bertulang - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="Baja Profil - Bangunan Gudang 1 Lantai">Baja Profil - Bangunan Gudang 1 Lantai</option>
                                            <option value="Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_struktur[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="struktur">Tambah Tipe Struktur Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn">Tambah Tipe Struktur Existing</button>
                    </div>

                    <!-- Tipe Rangka Atap Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Rangka Atap Eksisting - Rumah Tinggal Mewah 2 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Dak Beton (Jika Pakai Balok)" id="atap_dak_beton">
                                <label class="form-check-label" for="atap_dak_beton">Dak Beton (Jika Pakai Balok)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Kayu (Atap Genteng)" id="atap_kayu_genteng">
                                <label class="form-check-label" for="atap_kayu_genteng">Kayu (Atap Genteng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)" id="atap_kayu_asbes">
                                <label class="form-check-label" for="atap_kayu_asbes">Kayu (Atap Asbes, Seng dll, Tanpa Reng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Genteng)" id="atap_baja_genteng">
                                <label class="form-check-label" for="atap_baja_genteng">Baja Ringan (Atap Genteng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Asbes, Seng dll)" id="atap_baja_asbes">
                                <label class="form-check-label" for="atap_baja_asbes">Baja Ringan (Atap Asbes, Seng dll)</label>
                            </div>
                        </div>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-atap_dak_beton" class="content" style="display: none;">
                        <label><b>Bobot Dak Beton (Jika Pakai Balok)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_kayu_genteng" class="content" style="display: none;">
                        <label><b>Bobot Kayu (Atap Genteng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_kayu_asbes" class="content" style="display: none;">
                        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_baja_genteng" class="content" style="display: none;">
                        <label><b>Bobot Baja Ringan (Atap Genteng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_baja_asbes" class="content" style="display: none;">
                        <label><b>Bobot Baja Ringan (Atap Asbes, Seng dll)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Rangka Atap Existing</b></label><br>
                        <div id="rangka-atap-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-mewah" data-type="rangka-atap">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_rangka_atap[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="118520_0.5028">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="291406_0.5028">Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="163018_0.5028">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="207572_0.5028">Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="170598_0.5028">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="101031_0.5569">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="207825_0.5569">Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="118737_0.5569">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="155172_0.5569">Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="127639_0.5569">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="124221_1">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="252610_1">Kayu (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="147623_1">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="214587_1">Baja Ringan (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="173204_1">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="78577_1">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="339006_1">Profil Baja - Bangunan Gudang 1 Lantai</option>
                                            <option value="112308_0.335">Dak Beton (Jika Pakai Balok) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3002_0.335">Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3003_0.335">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3004_0.335">Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3005_0.335">Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_rangka_atap[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="rangka-atap">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="asbes" name="tipe_atap" value="Asbes" class="form-check-input">
                        <label for="asbes" class="form-check-label">Asbes</label><br>

                        <input type="checkbox" id="dak-beton" name="tipe_atap" value="Dak Beton" class="form-check-input">
                        <label for="dak-beton" class="form-check-label">Dak Beton</label><br>

                        <input type="checkbox" id="fibreglass" name="tipe_atap" value="Fibreglass" class="form-check-input">
                        <label for="fibreglass" class="form-check-label">Fibreglass</label><br>

                        <input type="checkbox" id="genteng-tanah-liat" name="tipe_atap" value="Genteng Tanah Liat" class="form-check-input">
                        <label for="genteng-tanah-liat" class="form-check-label">Genteng Tanah Liat</label><br>

                        <input type="checkbox" id="genteng-beton" name="tipe_atap" value="Genteng Beton" class="form-check-input">
                        <label for="genteng-beton" class="form-check-label">Genteng Beton</label><br>

                        <input type="checkbox" id="genteng-metal" name="tipe_atap" value="Genteng Metal" class="form-check-input">
                        <label for="genteng-metal" class="form-check-label">Genteng Metal</label><br>

                        <input type="checkbox" id="seng-gelombang" name="tipe_atap" value="Seng Gelombang" class="form-check-input">
                        <label for="seng-gelombang" class="form-check-label">Seng Gelombang</label><br>

                        <input type="checkbox" id="spandek" name="tipe_atap" value="Spandek" class="form-check-input">
                        <label for="spandek" class="form-check-label">Spandek</label><br>

                        <input type="checkbox" id="pvc" name="tipe_atap" value="PVC" class="form-check-input">
                        <label for="pvc" class="form-check-label">PVC</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-asbes" class="content" style="display: none;">
                        <label><b>Bobot Asbes</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-dak-beton" class="content" style="display: none;">
                        <label><b>Bobot Dak Beton</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-fibreglass" class="content" style="display: none;">
                        <label><b>Bobot Fibreglass</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-tanah-liat" class="content" style="display: none;">
                        <label><b>Bobot Genteng Tanah Liat</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-beton" class="content" style="display: none;">
                        <label><b>Bobot Genteng Beton</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-metal" class="content" style="display: none;">
                        <label><b>Bobot Genteng Metal</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-seng-gelombang" class="content" style="display: none;">
                        <label><b>Bobot Seng Gelombang</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-spandek" class="content" style="display: none;">
                        <label><b>Bobot Spandek</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pvc" class="content" style="display: none;">
                        <label><b>Bobot PVC</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
                        <div id="penutup-atap-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-mewah" data-type="penutup-atap-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_penutup-atap-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="307588_0.5028">Dak Beton - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="235683_0.5028">Fibreglass - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="239427_0.5028">Genteng Keramik Glazur - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="165717_0.5028">Genteng Tanah Liat - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="216861_0.5028">Genteng Beton - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="219751_0.5028">Genteng Metal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="207566_0.5028">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="403405_0.5028">Tegola - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="276586_0.5028">Sirap - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="148318_0.5028">Spandek - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="262711_0.5028">PVC - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="72551_0.5569">Asbes - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="235656_0.5569">Dak Beton - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="142642_0.5569">Fibreglass - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="160060_0.5569">Genteng Keramik Glazur - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="106213_0.5569">Genteng Tanah Liat - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="151664_0.5569">Genteng Beton - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="146988_0.5569">Genteng Metal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="129846_0.5569">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="332904_0.5569">Tegola - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="78978_0.5569">Seng Gelombang - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="243334_0.5569">Sirap - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="75361_0.5569">Spandek - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="172827_0.5569">PVC - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="117667_1">Asbes - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="304700_1">Dak Beton - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="234491_1">Fibreglass - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="156035_1">Genteng Tanah Liat - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="200470_1">Genteng Beton - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="202741_1">Genteng Metal - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="130168_1">Seng Gelombang - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="124692_1">Spandek - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="205773_1">PVC - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="118887_1">Asbes - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="124275_1">Seng Gelombang - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="91072_1">Asbes - Bangunan Gudang 1 Lantai</option>
                                            <option value="100790_1">Seng Gelombang - Bangunan Gudang 1 Lantai</option>
                                            <option value="95320_1">Spandek - Bangunan Gudang 1 Lantai</option>
                                            <option value="0.4001_0.335">Asbes - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="191376_0.335">Dak Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4003_0.335">Fibreglass - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4004_0.335">Genteng Keramik Glazur - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4005_0.335">Genteng Tanah Liat - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4006_0.335">Genteng Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="4007_0.335">Genteng Metal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4008_0.335">Bitumen (Ondulin/ Onduvilla) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.401_0.335">Tegola - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4011_0.335">Seng Gelombang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4012_0.335">Sirap - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4013_0.335">Spandek - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4014_0.335">PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_penutup-atap-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="penutup-atap-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-penutup-atap-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Dinding Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="batako" class="form-check-input">
                        <label for="batako" class="form-check-label">Batako</label><br>
                        <input type="checkbox" id="bata-merah" class="form-check-input">
                        <label for="bata-merah" class="form-check-label">Bata Merah</label><br>
                        <input type="checkbox" id="bata-ringan" class="form-check-input">
                        <label for="bata-ringan" class="form-check-label">Bata Ringan</label><br>
                        <input type="checkbox" id="gypsumboard" class="form-check-input">
                        <label for="gypsumboard" class="form-check-label">Partisi Gypsumboard 2 Muka</label><br>
                        <input type="checkbox" id="rooster-bata" class="form-check-input">
                        <label for="rooster-bata" class="form-check-label">Rooster Bata</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-batako" class="content" style="display: none;">
                        <label><b>Bobot Dinding Batako</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-bata-merah" class="content" style="display: none;">
                        <label><b>Bobot Dinding Bata Merah</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-bata-ringan" class="content" style="display: none;">
                        <label><b>Bobot Dinding Bata Ringan</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-gypsumboard" class="content" style="display: none;">
                        <label><b>Bobot Dinding Partisi Gypsumboard 2 Muka</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-rooster-bata" class="content" style="display: none;">
                        <label><b>Bobot Dinding Rooster Bata</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Dinding Existing</b></label><br>
                        <div id="tipe-dinding-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-mewah" data-type="tipe-dinding-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-dinding-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="273324_1.875">Bata Merah - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="274359_1.875">Bata Ringan - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="318811_1.875">Partisi Gypsumboard 2 Muka - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="725693_1.875">Rooster Bata - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="194325_2.143">Batako - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="244702_2.143">Bata Merah - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="252700_2.143">Bata Ringan - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="289328_2.143">Partisi Gypsumboard 2 Muka - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="703318_2.143">Rooster Bata - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="153906_2.169">Batako - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="190474_2.169">Bata Merah - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="207182_2.169">Bata Ringan - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="260248_2.169">Partisi Gypsumboard 2 Muka - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="605463_2.169">Rooster Bata - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="336877_1.481">Papan dan Partisi Triplek Dicat - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="113213_1.249">Batako - Bangunan Gudang 1 Lantai</option>
                                            <option value="142562_1.249">Bata Merah - Bangunan Gudang 1 Lantai</option>
                                            <option value="147222_1.249">Bata Ringan - Bangunan Gudang 1 Lantai</option>
                                            <option value="226702_1.249">Dinding Spandek Rangka Baja - Bangunan Gudang 1 Lantai</option>
                                            <option value="142987_1.577">Batako - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="180055_1.577">Bata Merah - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="185940_1.577">Bata Ringan - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="212891_1.577">Partisi Gypsumboard 2 Muka - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-dinding-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="tipe-dinding-existing">Tambah Tipe Dinding Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-dinding-existing-btn">Tambah Tipe Dinding Existing</button>
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Pelapis Dinding Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="cat" class="form-check-input">
                        <label for="cat" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>
                        <input type="checkbox" id="keramik" class="form-check-input">
                        <label for="keramik" class="form-check-label">Dilapis Keramik</label><br>
                        <input type="checkbox" id="wallpaper" class="form-check-input">
                        <label for="wallpaper" class="form-check-label">Dilapis Wallpaper</label><br>
                        <input type="checkbox" id="mozaik" class="form-check-input">
                        <label for="mozaik" class="form-check-label">Dilapis Mozaik</label><br>
                        <input type="checkbox" id="batu-alam" class="form-check-input">
                        <label for="batu-alam" class="form-check-label">Dilapis Batu Alam</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-cat" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-keramik" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-wallpaper" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-mozaik" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-batu-alam" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
                        <div id="tipe-pelapis-dinding-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-mewah" data-type="tipe-pelapis-dinding-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-pelapis-dinding-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="575506_1.875">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1591557_1.875">Dilapis Keramik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2636423_1.875">Dilapis Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="4425515_1.875">Dilapis Marmer Import - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2283657_1.875">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="957120_1.875">Dilapis Wallpaper - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2480497_1.875">Dilapis Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1154122_1.875">Dilapis Batu Alam - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="474683_2.143">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1235903_2.143">Dilapis Keramik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="2300582_2.143">Dilapis Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="3777227_2.143">Dilapis Marmer Import - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1873120_2.143">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="881996_2.143">Dilapis Wallpaper - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="2312115_2.143">Dilapis Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1070661_2.143">Dilapis Batu Alam - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="332768_2.169">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="782252_2.169">Dilapis Keramik - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="642040_2.169">Dilapis Wallpaper - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="1828812_2.169">Dilapis Mozaik - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="856559_2.169">Dilapis Batu Alam - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="194807_1.249">Dilapis Cat (Diplester dan Diaci) - Bangunan Gudang 1 Lantai</option>
                                            <option value="345190_1.577">Dilapis Cat (Diplester dan Diaci) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="909393_1.577">Dilapis Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="1378265_1.577">Dilapis Granit/ Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="1701283_1.577">Dilapis Wallpaper - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="2425106_1.577">Dilapis Aluminium Composite Panel - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-pelapis-dinding-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="tipe-pelapis-dinding-existing">Tambah Tipe Pelapis Dinding Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-pelapis-dinding-existing-btn">Tambah Tipe Pelapis Dinding Existing</button>
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Pintu & Jendela Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="pintu-kayu-panil" class="form-check-input">
                        <label for="pintu-kayu-panil" class="form-check-label">Pintu Kayu Panil</label><br>
                        <input type="checkbox" id="pintu-kayu-dobel" class="form-check-input">
                        <label for="pintu-kayu-dobel" class="form-check-label">Pintu Kayu Dobel Triplek/ HPL</label><br>
                        <input type="checkbox" id="pintu-kaca-aluminium" class="form-check-input">
                        <label for="pintu-kaca-aluminium" class="form-check-label">Pintu Kaca Rk Aluminium</label><br>
                        <input type="checkbox" id="jendela-kaca-kayu" class="form-check-input">
                        <label for="jendela-kaca-kayu" class="form-check-label">Jendela Kaca Rk Kayu</label><br>
                        <input type="checkbox" id="jendela-kaca-aluminium" class="form-check-input">
                        <label for="jendela-kaca-aluminium" class="form-check-label">Jendela Kaca Rk Aluminium</label><br>
                        <input type="checkbox" id="pintu-kaca-tempered-floor-hinge" class="form-check-input">
                        <label for="pintu-kaca-tempered-floor-hinge" class="form-check-label">Pintu Kaca Tempered Floor Hinge</label><br>
                        <input type="checkbox" id="pintu-km-upvc" class="form-check-input">
                        <label for="pintu-km-upvc" class="form-check-label">Pintu KM UPVC/PVC</label><br>
                        <input type="checkbox" id="pintu-garasi-kayu" class="form-check-input">
                        <label for="pintu-garasi-kayu" class="form-check-label">Pintu Garasi Kayu</label><br>
                        <input type="checkbox" id="pintu-garasi-besi" class="form-check-input">
                        <label for="pintu-garasi-besi" class="form-check-label">Pintu Garasi Besi</label><br>
                        <input type="checkbox" id="jendela-kaca-stopsol" class="form-check-input">
                        <label for="jendela-kaca-stopsol" class="form-check-label">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall</label><br>
                        <input type="checkbox" id="jendela-kaca-tempered-frameless" class="form-check-input">
                        <label for="jendela-kaca-tempered-frameless" class="form-check-label">Jendela Kaca Tempered Frameless</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-pintu-kayu-panil" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kayu Panil</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-kayu-dobel" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kayu Dobel Triplek/ HPL</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-kaca-aluminium" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kaca Rk Aluminium</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-jendela-kaca-kayu" class="content" style="display: none;">
                        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-jendela-kaca-aluminium" class="content" style="display: none;">
                        <label><b>Bobot Jendela Kaca Rk Aluminium</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-km-upvc" class="content" style="display: none;">
                        <label><b>Bobot Pintu KM UPVC/PVC</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-garasi-kayu" class="content" style="display: none;">
                        <label><b>Bobot Pintu Garasi Kayu</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-garasi-besi" class="content" style="display: none;">
                        <label><b>Bobot Pintu Garasi Besi</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-jendela-kaca-stopsol" class="content" style="display: none;">
                        <label><b>Bobot Jendela Kaca Stopsol 8 mm Rangka Curtain Wall</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
                        <div id="tipe-pintu-jendela-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-mewah" data-type="tipe-pintu-jendela-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-pintu-jendela-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="633004_0.145">Pintu Kayu Panil - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="430675_0.145">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="304254_0.145">Pintu Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="503211_0.145">Jendela Kaca Rk Kayu - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="274348_0.145">Jendela Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="370564_0.145">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="141199_0.145">Pintu KM UPVC/PVC - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="507018_0.145">Pintu Garasi Kayu - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="372489_0.145">Pintu Garasi Besi - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="209200_0.145">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="174637_0.145">Jendela Kaca Tempered Frameless - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="319349_0.218">Pintu Kayu Panil - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="257430_0.218">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="308462_0.218">Pintu Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="313184_0.218">Jendela Kaca Rk Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="312153_0.218">Jendela Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="235813_0.218">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="130356_0.218">Pintu KM UPVC/PVC - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="251196_0.218">Pintu Garasi Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="290195_0.218">Pintu Garasi Besi - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="152079_0.218">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="130977_0.218">Jendela Kaca Tempered Frameless - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="305534_0.327">Pintu Kayu Panil - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="236730_0.327">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="311178_0.327">Pintu Kaca Rk Aluminium - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="265053_0.327">Jendela Kaca Rk Kayu - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="316582_0.327">Jendela Kaca Rk Aluminium - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="65494_0.327">Pintu KM UPVC/PVC - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="71764_0.276">Jendela Kaca Rk Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="74470_0.057">Pintu Besi - Bangunan Gudang 1 Lantai</option>
                                            <option value="191060_0.126">Pintu Kayu Panil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="149554_0.126">Pintu Kayu Dobel Triplek/ HPL - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="179201_0.126">Pintu Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="189366_0.126">Jendela Kaca Rk Kayu - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="191731_0.126">Jendela Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="50598_0.126">Folding Gate - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="75730_0.126">Pintu KM UPVC/PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="135493_0.126">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="42010_0.126">Rolling Door - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>

                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-pintu-jendela-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="tipe-pintu-jendela-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-pintu-jendela-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Lantai Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="granit-homogenous-tile" class="form-check-input">
                        <label for="granit-homogenous-tile" class="form-check-label">Granit/Homogenous Tile</label><br>
                        <input type="checkbox" id="karpet" class="form-check-input">
                        <label for="karpet" class="form-check-label">Karpet</label><br>
                        <input type="checkbox" id="keramik" class="form-check-input">
                        <label for="keramik" class="form-check-label">Keramik</label><br>
                        <input type="checkbox" id="rabat-beton" class="form-check-input">
                        <label for="rabat-beton" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>
                        <input type="checkbox" id="teraso" class="form-check-input">
                        <label for="teraso" class="form-check-label">Teraso</label><br>
                        <input type="checkbox" id="vynil" class="form-check-input">
                        <label for="vynil" class="form-check-label">Vynil</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-granit-homogenous-tile" class="content" style="display: none;">
                        <label><b>Bobot Granit/Homogenous Tile</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-karpet" class="content" style="display: none;">
                        <label><b>Bobot Karpet</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-keramik" class="content" style="display: none;">
                        <label><b>Bobot Keramik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-rabat-beton" class="content" style="display: none;">
                        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-teraso" class="content" style="display: none;">
                        <label><b>Bobot Teraso</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-vynil" class="content" style="display: none;">
                        <label><b>Bobot Vynil</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Lantai Existing</b></label><br>
                        <div id="tipe-lantai-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-mewah" data-type="tipe-lantai-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-lantai-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="549105_0">Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1380230_0">Granit Impor - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="447398_0">Karpet - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="414111_0">Keramik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="700836_0">Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1190000_0">Marmer Impor - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="657355_0">Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="60227_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="536000_0">Parkit Jati - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="564958_0">Teraso - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="455080_0">Vynil - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="434503_0">Granit/Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="267057_0">Karpet - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="276046_0">Keramik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="536632_0">Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="896002_0">Marmer Impor - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="542161_0">Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="53245_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="423011_0">Parkit Jati - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="481344_0">Teraso - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="351650_0">Vynil - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="115239_0">Papan Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="260164_0">Granit/Homogenous Tile - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="173280_0">Karpet - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="176287_0">Keramik - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="66156_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="21388_0">Teraso - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="229269_0">Vynil - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="102937_0">Papan Kayu - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="150353_0">Keramik - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="43454_0">Rabat Beton (Semen Ekspose) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="79155_0">Papan Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="209294_0">Plat Lantai Beton T = 8 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="244126_0">Plat Lantai Beton T = 10 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="278957_0">Plat Lantai Beton T = 12 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="346178_0">Plat Lantai Beton T = 15 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="401420_0">Plat Lantai Beton T = 18 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="411260_0">Granit/Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="247679_0">Karpet - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="256461_0">Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="511030_0">Marmer Lokal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="59522_0">Rabat Beton (Semen Ekspose) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="400032_0">Parkit Jati - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="330320_0">Vynil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-lantai-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-mewah" data-type="tipe-lantai-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-lantai-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>


                </div>

                <script>
                    document.querySelectorAll('.form-check-input').forEach(checkbox => {
                        checkbox.addEventListener('change', () => {
                            const contentId = `content-${checkbox.id}`;
                            const contentElement = document.getElementById(contentId);
                            if (contentElement) {
                                contentElement.style.display = checkbox.checked ? 'block' : 'none';
                            }
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        // Fungsi untuk membuat item area baru
                        function createAreaItem(type) {
                            const areaItem = document.createElement('div');
                            areaItem.classList.add('area-item', 'd-flex', 'align-items-center', 'mb-2');
                            let nameNama, nameLuas, nameTipe, nameBobot;

                            // Logika khusus untuk tipe pondasi
                            if (type === 'pondasi') {
                                nameTipe = 'tipe_pondasi[]';
                                nameBobot = 'bobot_pondasi[]';

                                areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Tipe Material</label>
            <select name="${nameTipe}" class="form-control" required>
                <option value="">- Select -</option>
                <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai</option>
                <option value="Batu Kali - Rumah Tinggal Sederhana 1 Lantai">Batu Kali - Rumah Tinggal Sederhana 1 Lantai</option>
                <option value="Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai">Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
            </select>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Bobot (%)</label>
            <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
        </div>
        <div class="area-controls">
            <div class="row">
                <button type="button" class="add-area-btn">+</button>
                <button type="button" class="remove-area-btn">-</button>
            </div>
        </div>
    `;
                                return areaItem;
                            }
                            if (type === 'struktur') {
                                nameTipe = 'tipe_struktur[]';
                                nameBobot = 'bobot_struktur[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="Beton Bertulang - Rumah Tinggal Mewah 2 Lantai">Beton Bertulang - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Beton Bertulang - Rumah Tinggal Menengah 2 Lantai">Beton Bertulang - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Beton Bertulang - Rumah Tinggal Sederhana 1 Lantai">Beton Bertulang - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="Baja Profil - Bangunan Gudang 1 Lantai">Baja Profil - Bangunan Gudang 1 Lantai</option>
            <option value="Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }

                            if (type === 'rangka-atap') {
                                nameTipe = 'tipe_rangka_atap[]';
                                nameBobot = 'bobot_rangka_atap[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Sederhana 1 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Sederhana 1 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="Profil Baja - Bangunan Gudang 1 Lantai">Profil Baja - Bangunan Gudang 1 Lantai</option>
            <option value="Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'penutup-atap-existing') {
                                nameTipe = 'tipe_penutup-atap-existing[]';
                                nameBobot = 'bobot_penutup-atap-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="307588_0.5028">Dak Beton - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="235683_0.5028">Fibreglass - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="239427_0.5028">Genteng Keramik Glazur - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="165717_0.5028">Genteng Tanah Liat - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="216861_0.5028">Genteng Beton - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="219751_0.5028">Genteng Metal - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="207566_0.5028">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="403405_0.5028">Tegola - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="276586_0.5028">Sirap - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="148318_0.5028">Spandek - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="262711_0.5028">PVC - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="72551_0.5569">Asbes - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="235656_0.5569">Dak Beton - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="142642_0.5569">Fibreglass - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="160060_0.5569">Genteng Keramik Glazur - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="106213_0.5569">Genteng Tanah Liat - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="151664_0.5569">Genteng Beton - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="146988_0.5569">Genteng Metal - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="129846_0.5569">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="332904_0.5569">Tegola - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="78978_0.5569">Seng Gelombang - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="243334_0.5569">Sirap - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="75361_0.5569">Spandek - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="172827_0.5569">PVC - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="117667_1">Asbes - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="304700_1">Dak Beton - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="234491_1">Fibreglass - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="156035_1">Genteng Tanah Liat - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="200470_1">Genteng Beton - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="202741_1">Genteng Metal - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="130168_1">Seng Gelombang - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="124692_1">Spandek - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="205773_1">PVC - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="118887_1">Asbes - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                            <option value="124275_1">Seng Gelombang - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                            <option value="91072_1">Asbes - Bangunan Gudang 1 Lantai</option>
                            <option value="100790_1">Seng Gelombang - Bangunan Gudang 1 Lantai</option>
                            <option value="95320_1">Spandek - Bangunan Gudang 1 Lantai</option>
                            <option value="0.4001_0.335">Asbes - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="191376_0.335">Dak Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4003_0.335">Fibreglass - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4004_0.335">Genteng Keramik Glazur - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4005_0.335">Genteng Tanah Liat - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4006_0.335">Genteng Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="4007_0.335">Genteng Metal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4008_0.335">Bitumen (Ondulin/ Onduvilla) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.401_0.335">Tegola - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4011_0.335">Seng Gelombang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4012_0.335">Sirap - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4013_0.335">Spandek - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4014_0.335">PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }

                            if (type === 'tipe-dinding-existing') {
                                nameTipe = 'tipe_tipe-dinding-existing[]';
                                nameBobot = 'bobot_tipe-dinding-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="273324_1.875">Bata Merah - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="274359_1.875">Bata Ringan - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="318811_1.875">Partisi Gypsumboard 2 Muka - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="725693_1.875">Rooster Bata - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="194325_2.143">Batako - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="244702_2.143">Bata Merah - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="252700_2.143">Bata Ringan - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="289328_2.143">Partisi Gypsumboard 2 Muka - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="703318_2.143">Rooster Bata - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="153906_2.169">Batako - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="190474_2.169">Bata Merah - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="207182_2.169">Bata Ringan - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="260248_2.169">Partisi Gypsumboard 2 Muka - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="605463_2.169">Rooster Bata - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="336877_1.481">Papan dan Partisi Triplek Dicat - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="113213_1.249">Batako - Bangunan Gudang 1 Lantai</option>
            <option value="142562_1.249">Bata Merah - Bangunan Gudang 1 Lantai</option>
            <option value="147222_1.249">Bata Ringan - Bangunan Gudang 1 Lantai</option>
            <option value="226702_1.249">Dinding Spandek Rangka Baja - Bangunan Gudang 1 Lantai</option>
            <option value="142987_1.577">Batako - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="180055_1.577">Bata Merah - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="185940_1.577">Bata Ringan - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="212891_1.577">Partisi Gypsumboard 2 Muka - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-pelapis-dinding-existing') {
                                nameTipe = 'tipe_tipe-pelapis-dinding-existing[]';
                                nameBobot = 'bobot_tipe-pelapis-dinding-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="575506_1.875">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1591557_1.875">Dilapis Keramik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2636423_1.875">Dilapis Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="4425515_1.875">Dilapis Marmer Import - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2283657_1.875">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="957120_1.875">Dilapis Wallpaper - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2480497_1.875">Dilapis Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1154122_1.875">Dilapis Batu Alam - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="474683_2.143">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1235903_2.143">Dilapis Keramik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="2300582_2.143">Dilapis Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="3777227_2.143">Dilapis Marmer Import - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1873120_2.143">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="881996_2.143">Dilapis Wallpaper - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="2312115_2.143">Dilapis Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1070661_2.143">Dilapis Batu Alam - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="332768_2.169">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="782252_2.169">Dilapis Keramik - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="642040_2.169">Dilapis Wallpaper - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="1828812_2.169">Dilapis Mozaik - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="856559_2.169">Dilapis Batu Alam - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="194807_1.249">Dilapis Cat (Diplester dan Diaci) - Bangunan Gudang 1 Lantai</option>
            <option value="345190_1.577">Dilapis Cat (Diplester dan Diaci) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="909393_1.577">Dilapis Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="1378265_1.577">Dilapis Granit/ Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="1701283_1.577">Dilapis Wallpaper - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="2425106_1.577">Dilapis Aluminium Composite Panel - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-lantai-existing') {
                                nameTipe = 'tipe_tipe-lantai-existing[]';
                                nameBobot = 'bobot_tipe-lantai-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="549105_0">Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1380230_0">Granit Impor - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="447398_0">Karpet - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="414111_0">Keramik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="700836_0">Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1190000_0">Marmer Impor - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="657355_0">Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="60227_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="536000_0">Parkit Jati - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="564958_0">Teraso - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="455080_0">Vynil - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="434503_0">Granit/Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="267057_0">Karpet - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="276046_0">Keramik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="536632_0">Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="896002_0">Marmer Impor - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="542161_0">Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="53245_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="423011_0">Parkit Jati - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="481344_0">Teraso - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="351650_0">Vynil - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="115239_0">Papan Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="260164_0">Granit/Homogenous Tile - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="173280_0">Karpet - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="176287_0">Keramik - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="66156_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="21388_0">Teraso - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="229269_0">Vynil - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="102937_0">Papan Kayu - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="150353_0">Keramik - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="43454_0">Rabat Beton (Semen Ekspose) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="79155_0">Papan Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="209294_0">Plat Lantai Beton T = 8 cm - Bangunan Gudang 1 Lantai</option>
            <option value="244126_0">Plat Lantai Beton T = 10 cm - Bangunan Gudang 1 Lantai</option>
            <option value="278957_0">Plat Lantai Beton T = 12 cm - Bangunan Gudang 1 Lantai</option>
            <option value="346178_0">Plat Lantai Beton T = 15 cm - Bangunan Gudang 1 Lantai</option>
            <option value="401420_0">Plat Lantai Beton T = 18 cm - Bangunan Gudang 1 Lantai</option>
            <option value="411260_0">Granit/Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="247679_0">Karpet - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="256461_0">Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="511030_0">Marmer Lokal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="59522_0">Rabat Beton (Semen Ekspose) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="400032_0">Parkit Jati - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="330320_0">Vynil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-pintu-jendela-existing') {
                                nameTipe = 'tipe_tipe-pintu-jendela-existing[]';
                                nameBobot = 'bobot_tipe-pintu-jendela-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="633004_0.145">Pintu Kayu Panil - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="430675_0.145">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="304254_0.145">Pintu Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="503211_0.145">Jendela Kaca Rk Kayu - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="274348_0.145">Jendela Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="370564_0.145">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="141199_0.145">Pintu KM UPVC/PVC - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="507018_0.145">Pintu Garasi Kayu - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="372489_0.145">Pintu Garasi Besi - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="209200_0.145">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="174637_0.145">Jendela Kaca Tempered Frameless - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="319349_0.218">Pintu Kayu Panil - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="257430_0.218">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="308462_0.218">Pintu Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="313184_0.218">Jendela Kaca Rk Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="312153_0.218">Jendela Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="235813_0.218">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="130356_0.218">Pintu KM UPVC/PVC - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="251196_0.218">Pintu Garasi Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="290195_0.218">Pintu Garasi Besi - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="152079_0.218">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="130977_0.218">Jendela Kaca Tempered Frameless - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="305534_0.327">Pintu Kayu Panil - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="236730_0.327">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="311178_0.327">Pintu Kaca Rk Aluminium - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="265053_0.327">Jendela Kaca Rk Kayu - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="316582_0.327">Jendela Kaca Rk Aluminium - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="65494_0.327">Pintu KM UPVC/PVC - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="71764_0.276">Jendela Kaca Rk Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="74470_0.057">Pintu Besi - Bangunan Gudang 1 Lantai</option>
            <option value="191060_0.126">Pintu Kayu Panil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="149554_0.126">Pintu Kayu Dobel Triplek/ HPL - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="179201_0.126">Pintu Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="189366_0.126">Jendela Kaca Rk Kayu - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="191731_0.126">Jendela Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="50598_0.126">Folding Gate - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="75730_0.126">Pintu KM UPVC/PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="135493_0.126">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="42010_0.126">Rolling Door - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }





                            // Logika umum untuk tipe lainnya
                            if (type === 'pintu-jendela') {
                                nameNama = 'nama_pintu_jendela[]';
                                nameLuas = 'luas_pintu_jendela[]';
                            } else if (type === 'dinding') {
                                nameNama = 'nama_dinding[]';
                                nameLuas = 'luas_dinding[]';
                            } else if (type === 'atap-datar') {
                                nameNama = 'nama_atap_datar[]';
                                nameLuas = 'luas_atap_datar[]';
                            } else if (type === 'atap-datar-2') {
                                nameNama = 'nama_atap_datar_2[]';
                                nameLuas = 'luas_atap_datar_2[]';
                            }

                            areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Nama Area</label>
            <input type="text" name="${nameNama}" class="form-control" placeholder="Nama Area" required>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Luas (m²)</label>
            <input type="number" name="${nameLuas}" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
        </div>
        <div class="area-controls">
            <div class="row">
                <button type="button" class="add-area-btn">+</button>
                <button type="button" class="remove-area-btn">-</button>
            </div>
        </div>
    `;
                            return areaItem;
                        }


                        // Menangani klik pada tombol "Tambah Area"
                        document.querySelectorAll('.add-area-link-rumah-mewah').forEach(function(button) {
                            button.addEventListener('click', function(e) {
                                e.preventDefault();
                                const type = this.getAttribute('data-type');
                                const areaContainer = document.querySelector(`.area-lainnya-container-rumah-mewah[data-type="${type}"]`);
                                const newAreaItem = createAreaItem(type);
                                areaContainer.appendChild(newAreaItem);
                            });
                        });

                        // Event delegation untuk tombol add dan remove dalam masing-masing container
                        document.querySelectorAll('.area-lainnya-container-rumah-mewah').forEach(function(container) {
                            container.addEventListener('click', function(e) {
                                if (e.target.classList.contains('add-area-btn')) {
                                    e.preventDefault();
                                    const type = container.getAttribute('data-type');
                                    const newAreaItem = createAreaItem(type);
                                    container.appendChild(newAreaItem);
                                }

                                if (e.target.classList.contains('remove-area-btn')) {
                                    e.preventDefault();
                                    const areaItem = e.target.closest('.area-item');
                                    if (areaItem) {
                                        // Pastikan setidaknya ada satu area-item
                                        if (container.children.length > 1) {
                                            container.removeChild(areaItem);
                                        } else {
                                            container.removeChild(areaItem);
                                        }
                                    }
                                }
                            });
                        });


                    });

                    function toggleBobotInput(checkbox, targetId) {
                        const bobotInput = document.getElementById(targetId);
                        if (checkbox.checked) {
                            bobotInput.style.display = 'block';
                        } else {
                            bobotInput.style.display = 'none';
                        }
                    }
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const pondasiContainer = document.getElementById('pondasi-container');
                        const showPondasiBtn = document.getElementById('show-pondasi-btn');
                        const addPondasiBtn = document.querySelector('.add-area-link-rumah-mewah[data-type="pondasi"]');

                        // Awal hanya tombol show yang terlihat
                        addPondasiBtn.style.display = 'none';

                        showPondasiBtn.addEventListener('click', function() {
                            console.log('asd');

                            pondasiContainer.style.display = 'block'; // Tampilkan container
                            showPondasiBtn.remove();
                            addPondasiBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addPondasiBtn.addEventListener('click', function() {
                            // Logika menambahkan area pondasi sudah ditangani di kode lain
                            console.log('Area baru untuk pondasi ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const strukturContainer = document.getElementById('struktur-container');
                        const showStrukturBtn = document.getElementById('show-struktur-btn');
                        const addStrukturBtn = document.querySelector('.add-area-link-rumah-mewah[data-type="struktur"]');

                        // Awal hanya tombol show yang terlihat
                        addStrukturBtn.style.display = 'none';

                        showStrukturBtn.addEventListener('click', function() {
                            strukturContainer.style.display = 'block'; // Tampilkan container
                            showStrukturBtn.remove(); // Hapus tombol show
                            addStrukturBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addStrukturBtn.addEventListener('click', function() {
                            // Logika untuk menambah area struktur ditangani di kode area lainnya
                            console.log('Area baru untuk struktur ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('rangka-atap-container');
                        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-mewah[data-type="rangka-atap"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-mewah[data-type="penutup-atap-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-dinding-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-dinding-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-mewah[data-type="tipe-dinding-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-mewah[data-type="tipe-pelapis-dinding-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-mewah[data-type="tipe-lantai-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-mewah[data-type="tipe-pintu-jendela-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                </script>

                {{-- end Rumah mewah lantai 2 --}}

                <!-- Rumah Sederhana -->
                <style>
                    .area-lainnya-container-rumah-sederhana {
                        border: 1px solid #dee2e6;
                        padding: 10px;
                        border-radius: 5px;
                    }

                    .area-lainnya-container-rumah-sederhana .form-group {
                        margin-bottom: 0;
                    }

                    .area-lainnya-container-rumah-sederhana label {
                        font-weight: bold;
                    }

                    .area-item {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        margin-bottom: 10px;
                        padding: 5px;
                    }

                    .area-item input {
                        margin-right: 5px;
                    }

                    .area-controls button {
                        background: none;
                        border: none;
                        color: #007bff;
                        font-size: 18px;
                    }
                </style>


                <div id="form-rumah-sederhana" style=" margin-top: 20px; display: none;">
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
                        <br>
                        <small class="form-text text-muted" style="margin-top: 5px;">Pilih jenis bangunan yang sesuai untuk menentukan umur ekonomis bangunan.</small>
                        <select class="form-control" id="jenis_bangunan" name="jenis_bangunan">
                            <option value="">- Select -</option>
                            <option value="Bangunan Rumah Tinggal">Bangunan Rumah Tinggal</option>
                            <option value="Bangunan Rumah Susun">Bangunan Rumah Susun</option>
                            <option value="Pusat Perbelanjaan">Pusat Perbelanjaan</option>
                            <option value="Bangunan Kantor">Bangunan Kantor</option>
                            <option value="Bangunan Gedung Pemerintah">Bangunan Gedung Pemerintah</option>
                            <option value="Bangunan Hotel/ Motel">Bangunan Hotel/ Motel</option>
                            <option value="Bangunan Industri dan Gudang">Bangunan Industri dan Gudang</option>
                            <option value="Bangunan di Kawasan Perkebunan">Bangunan di Kawasan Perkebunan</option>
                        </select>

                    </div>

                    <div class="form-group" style="margin-top: 20px;">
                        <label for="jenis_bangunan_indeks_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks Lantai)</label>
                        <br>
                        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai MAPPI.</small>
                        <select class="form-control" id="jenis_bangunan_indeks_lantai" name="jenis_bangunan_indeks_lantai">
                            <option value="">- Select -</option>
                            <option value="Rumah Tinggal Sederhana">Rumah Tinggal Sederhana (Simple Dwelling)</option>
                            <option value="Rumah Tinggal Menengah">Rumah Tinggal Menengah (Medium Dwelling)</option>
                            <option value="Rumah Tinggal Mewah">Rumah Tinggal Mewah (Luxury Dwelling)</option>
                            <option value="Bangunan Gedung Bertingkat Low Rise">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai) (Low-Rise Building &lt;5 Floors)</option>
                            <option value="Bangunan Gedung Bertingkat Mid Rise">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai) (Mid-Rise Building &lt;9 Floors)</option>
                            <option value="Bangunan Gedung Bertingkat High Rise">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai) (High-Rise Building &gt;8 Floors)</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
                        <input type="number" class="form-control" id="tahun_dibangun" name="tahun_dibangun" placeholder="Enter Year" min="1900" max="2024">
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
                        <input type="number" class="form-control" id="tahun_renovasi" name="tahun_renovasi" placeholder="Enter Year" min="1900" max="2024">
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="kondisi_visual" style="font-weight: bold;">Kondisi Bangunan Secara Visual</label>
                        <select class="form-control" id="kondisi_visual" name="kondisi_visual">
                            <option value="">- Select -</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Kurang Baik">Kurang Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Baik">Baik</option>
                            <option value="Baik Sekali">Baik Sekali</option>
                            <option value="Baru">Baru</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="catatan_khusus" style="font-weight: bold;">Catatan Khusus Bangunan</label>
                        <textarea class="form-control" id="catatan_khusus" name="catatan_khusus" rows="4" placeholder="Tambahkan catatan khusus di sini..."></textarea>
                    </div>
                    <!-- Field Baru: Luas Bangunan Terpotong (m²) -->
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="luas_bangunan_terpotong" style="font-weight: bold;">Luas Bangunan Terpotong (m²)</label><br>
                        <small class="form-text text-muted">Terpotong atau alasannya lainnya.</small>
                        <input type="number" class="form-control" id="luas_bangunan_terpotong" name="luas_bangunan_terpotong" placeholder="Enter Area" min="0" step="0.01">
                    </div>

                    <!-- Field Baru: Luas Bangunan menurut IMB (m²) -->
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="luas_bangunan_imb" style="font-weight: bold;">Luas Bangunan menurut IMB (m²)</label>
                        <input type="number" class="form-control" id="luas_bangunan_imb" name="luas_bangunan_imb" placeholder="Enter Area" min="0" step="0.01">
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Pintu dan Jendela</b></label><br>
                        <small class="form-text text-muted">Masukkan luas pintu dan jendela yang ada.</small>
                        <div class="area-lainnya-container-rumah-sederhana" data-type="pintu-jendela">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_pintu_jendela[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_pintu_jendela[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="pintu-jendela">Tambah Area</button>
                    </div>

                    <!-- Luas Dinding -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Dinding</b></label><br>
                        <small class="form-text text-muted">Masukkan luas dinding kotor belum dikurangi luas pintu dan jendela.</small>
                        <div class="area-lainnya-container-rumah-sederhana" data-type="dinding">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_dinding[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_dinding[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="dinding">Tambah Area</button>
                    </div>
                    <!-- Luas Rangka Atap Datar -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Rangka Atap Datar</b></label><br>
                        <small class="form-text text-muted">Masukkan luas rangka atap datar.</small>
                        <div class="area-lainnya-container-rumah-sederhana" data-type="atap-datar">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_atap_datar[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_atap_datar[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="atap-datar">Tambah Area</button>
                    </div>

                    <!-- Luas Atap Datar -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Atap Datar</b></label><br>
                        <small class="form-text text-muted">Masukkan luas atap datar.</small>
                        <div class="area-lainnya-container-rumah-sederhana" data-type="atap-datar-2">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_atap_datar_2[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_atap_datar_2[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="atap-datar-2">Tambah Area</button>
                    </div>
                    <!-- Tipe Pondasi Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Pondasi Eksisting - Rumah Tinggal Sederhana 1 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Batu Kali" id="pondasi_batu_kali" onchange="toggleBobotInput(this, 'bobot_pondasi_batu_kali')">
                                <label class="form-check-label" for="pondasi_batu_kali">Batu Kali</label>
                            </div>
                        </div>
                        <div id="bobot_pondasi_batu_kali" style="display: none; margin-top: 10px;">
                            <label for="bobot_batu_kali">Bobot Pondasi Batu Kali (dalam persen %)</label>
                            <input type="number" class="form-control" id="bobot_batu_kali" name="bobot_batu_kali" placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
                        </div>
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
                        <div id="pondasi-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-sederhana" data-type="pondasi">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_pondasi[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="Batu Kali - Rumah Tinggal Sederhana 1 Lantai">Batu Kali - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai">Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
                                        </select>
                                    </div>

                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_pondasi[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="pondasi">Tambah Tipe Pondasi Existing</button>

                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-pondasi-btn">Tambah Tipe Pondasi Existing</button>


                    </div>
                    <!-- Tipe Struktur Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Struktur Eksisting - Rumah Tinggal Sederhana 1 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Beton Bertulang" id="struktur_beton_bertulang" onchange="toggleBobotInput(this, 'bobot_struktur_beton_bertulang')">
                                <label class="form-check-label" for="struktur_beton_bertulang">Beton Bertulang</label>
                            </div>
                        </div>
                        <div id="bobot_struktur_beton_bertulang" style="display: none; margin-top: 10px;">
                            <label for="bobot_beton_bertulang">Bobot Struktur Beton Bertulang (dalam persen %)</label>
                            <input type="number" class="form-control" id="bobot_beton_bertulang" name="bobot_beton_bertulang" placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
                        </div>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
                        <div id="struktur-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-sederhana" data-type="struktur">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_struktur[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Mewah 2 Lantai">Beton Bertulang - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Menengah 2 Lantai">Beton Bertulang - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Sederhana 1 Lantai">Beton Bertulang - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="Baja Profil - Bangunan Gudang 1 Lantai">Baja Profil - Bangunan Gudang 1 Lantai</option>
                                            <option value="Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_struktur[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="struktur">Tambah Tipe Struktur Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn">Tambah Tipe Struktur Existing</button>
                    </div>

                    <!-- Tipe Rangka Atap Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Rangka Atap Eksisting - Rumah Tinggal Sederhana 1 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Dak Beton (Jika Pakai Balok)" id="atap_dak_beton">
                                <label class="form-check-label" for="atap_dak_beton">Dak Beton (Jika Pakai Balok)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Kayu (Atap Genteng)" id="atap_kayu_genteng">
                                <label class="form-check-label" for="atap_kayu_genteng">Kayu (Atap Genteng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)" id="atap_kayu_asbes">
                                <label class="form-check-label" for="atap_kayu_asbes">Kayu (Atap Asbes, Seng dll, Tanpa Reng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Genteng)" id="atap_baja_genteng">
                                <label class="form-check-label" for="atap_baja_genteng">Baja Ringan (Atap Genteng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Asbes, Seng dll)" id="atap_baja_asbes">
                                <label class="form-check-label" for="atap_baja_asbes">Baja Ringan (Atap Asbes, Seng dll)</label>
                            </div>
                        </div>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-atap_dak_beton" class="content" style="display: none;">
                        <label><b>Bobot Dak Beton (Jika Pakai Balok)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_kayu_genteng" class="content" style="display: none;">
                        <label><b>Bobot Kayu (Atap Genteng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_kayu_asbes" class="content" style="display: none;">
                        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_baja_genteng" class="content" style="display: none;">
                        <label><b>Bobot Baja Ringan (Atap Genteng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_baja_asbes" class="content" style="display: none;">
                        <label><b>Bobot Baja Ringan (Atap Asbes, Seng dll)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Rangka Atap Existing</b></label><br>
                        <div id="rangka-atap-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-sederhana" data-type="rangka-atap">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_rangka_atap[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="118520_0.5028">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="291406_0.5028">Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="163018_0.5028">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="207572_0.5028">Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="170598_0.5028">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="101031_0.5569">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="207825_0.5569">Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="118737_0.5569">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="155172_0.5569">Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="127639_0.5569">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="124221_1">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="252610_1">Kayu (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="147623_1">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="214587_1">Baja Ringan (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="173204_1">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="78577_1">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="339006_1">Profil Baja - Bangunan Gudang 1 Lantai</option>
                                            <option value="112308_0.335">Dak Beton (Jika Pakai Balok) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3002_0.335">Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3003_0.335">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3004_0.335">Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3005_0.335">Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_rangka_atap[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="rangka-atap">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Sederhana 1 Lantai</strong></label><br>
                        <input type="checkbox" id="asbes" name="tipe_atap" value="Asbes" class="form-check-input">
                        <label for="asbes" class="form-check-label">Asbes</label><br>

                        <input type="checkbox" id="dak-beton" name="tipe_atap" value="Dak Beton" class="form-check-input">
                        <label for="dak-beton" class="form-check-label">Dak Beton</label><br>

                        <input type="checkbox" id="fibreglass" name="tipe_atap" value="Fibreglass" class="form-check-input">
                        <label for="fibreglass" class="form-check-label">Fibreglass</label><br>

                        <input type="checkbox" id="genteng-tanah-liat" name="tipe_atap" value="Genteng Tanah Liat" class="form-check-input">
                        <label for="genteng-tanah-liat" class="form-check-label">Genteng Tanah Liat</label><br>

                        <input type="checkbox" id="genteng-beton" name="tipe_atap" value="Genteng Beton" class="form-check-input">
                        <label for="genteng-beton" class="form-check-label">Genteng Beton</label><br>

                        <input type="checkbox" id="genteng-metal" name="tipe_atap" value="Genteng Metal" class="form-check-input">
                        <label for="genteng-metal" class="form-check-label">Genteng Metal</label><br>

                        <input type="checkbox" id="seng-gelombang" name="tipe_atap" value="Seng Gelombang" class="form-check-input">
                        <label for="seng-gelombang" class="form-check-label">Seng Gelombang</label><br>

                        <input type="checkbox" id="spandek" name="tipe_atap" value="Spandek" class="form-check-input">
                        <label for="spandek" class="form-check-label">Spandek</label><br>

                        <input type="checkbox" id="pvc" name="tipe_atap" value="PVC" class="form-check-input">
                        <label for="pvc" class="form-check-label">PVC</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-asbes" class="content" style="display: none;">
                        <label><b>Bobot Asbes</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-dak-beton" class="content" style="display: none;">
                        <label><b>Bobot Dak Beton</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-fibreglass" class="content" style="display: none;">
                        <label><b>Bobot Fibreglass</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-tanah-liat" class="content" style="display: none;">
                        <label><b>Bobot Genteng Tanah Liat</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-beton" class="content" style="display: none;">
                        <label><b>Bobot Genteng Beton</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-metal" class="content" style="display: none;">
                        <label><b>Bobot Genteng Metal</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-seng-gelombang" class="content" style="display: none;">
                        <label><b>Bobot Seng Gelombang</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-spandek" class="content" style="display: none;">
                        <label><b>Bobot Spandek</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pvc" class="content" style="display: none;">
                        <label><b>Bobot PVC</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
                        <div id="penutup-atap-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-sederhana" data-type="penutup-atap-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_penutup-atap-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="307588_0.5028">Dak Beton - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="235683_0.5028">Fibreglass - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="239427_0.5028">Genteng Keramik Glazur - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="165717_0.5028">Genteng Tanah Liat - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="216861_0.5028">Genteng Beton - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="219751_0.5028">Genteng Metal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="207566_0.5028">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="403405_0.5028">Tegola - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="276586_0.5028">Sirap - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="148318_0.5028">Spandek - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="262711_0.5028">PVC - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="72551_0.5569">Asbes - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="235656_0.5569">Dak Beton - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="142642_0.5569">Fibreglass - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="160060_0.5569">Genteng Keramik Glazur - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="106213_0.5569">Genteng Tanah Liat - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="151664_0.5569">Genteng Beton - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="146988_0.5569">Genteng Metal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="129846_0.5569">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="332904_0.5569">Tegola - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="78978_0.5569">Seng Gelombang - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="243334_0.5569">Sirap - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="75361_0.5569">Spandek - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="172827_0.5569">PVC - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="117667_1">Asbes - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="304700_1">Dak Beton - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="234491_1">Fibreglass - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="156035_1">Genteng Tanah Liat - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="200470_1">Genteng Beton - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="202741_1">Genteng Metal - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="130168_1">Seng Gelombang - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="124692_1">Spandek - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="205773_1">PVC - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="118887_1">Asbes - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="124275_1">Seng Gelombang - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="91072_1">Asbes - Bangunan Gudang 1 Lantai</option>
                                            <option value="100790_1">Seng Gelombang - Bangunan Gudang 1 Lantai</option>
                                            <option value="95320_1">Spandek - Bangunan Gudang 1 Lantai</option>
                                            <option value="0.4001_0.335">Asbes - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="191376_0.335">Dak Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4003_0.335">Fibreglass - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4004_0.335">Genteng Keramik Glazur - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4005_0.335">Genteng Tanah Liat - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4006_0.335">Genteng Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="4007_0.335">Genteng Metal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4008_0.335">Bitumen (Ondulin/ Onduvilla) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.401_0.335">Tegola - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4011_0.335">Seng Gelombang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4012_0.335">Sirap - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4013_0.335">Spandek - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4014_0.335">PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_penutup-atap-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="penutup-atap-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-penutup-atap-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Sederhana 1 Lantai</strong></label><br>
                        <input type="checkbox" id="batako" class="form-check-input">
                        <label for="batako" class="form-check-label">Batako</label><br>
                        <input type="checkbox" id="bata-merah" class="form-check-input">
                        <label for="bata-merah" class="form-check-label">Bata Merah</label><br>
                        <input type="checkbox" id="bata-ringan" class="form-check-input">
                        <label for="bata-ringan" class="form-check-label">Bata Ringan</label><br>
                        <input type="checkbox" id="gypsumboard" class="form-check-input">
                        <label for="gypsumboard" class="form-check-label">Partisi Gypsumboard 2 Muka</label><br>
                        <input type="checkbox" id="rooster-bata" class="form-check-input">
                        <label for="rooster-bata" class="form-check-label">Rooster Bata</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-batako" class="content" style="display: none;">
                        <label><b>Bobot Dinding Batako</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-bata-merah" class="content" style="display: none;">
                        <label><b>Bobot Dinding Bata Merah</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-bata-ringan" class="content" style="display: none;">
                        <label><b>Bobot Dinding Bata Ringan</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-gypsumboard" class="content" style="display: none;">
                        <label><b>Bobot Dinding Partisi Gypsumboard 2 Muka</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-rooster-bata" class="content" style="display: none;">
                        <label><b>Bobot Dinding Rooster Bata</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Dinding Existing</b></label><br>
                        <div id="tipe-dinding-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-sederhana" data-type="tipe-dinding-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-dinding-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="273324_1.875">Bata Merah - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="274359_1.875">Bata Ringan - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="318811_1.875">Partisi Gypsumboard 2 Muka - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="725693_1.875">Rooster Bata - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="194325_2.143">Batako - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="244702_2.143">Bata Merah - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="252700_2.143">Bata Ringan - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="289328_2.143">Partisi Gypsumboard 2 Muka - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="703318_2.143">Rooster Bata - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="153906_2.169">Batako - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="190474_2.169">Bata Merah - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="207182_2.169">Bata Ringan - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="260248_2.169">Partisi Gypsumboard 2 Muka - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="605463_2.169">Rooster Bata - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="336877_1.481">Papan dan Partisi Triplek Dicat - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="113213_1.249">Batako - Bangunan Gudang 1 Lantai</option>
                                            <option value="142562_1.249">Bata Merah - Bangunan Gudang 1 Lantai</option>
                                            <option value="147222_1.249">Bata Ringan - Bangunan Gudang 1 Lantai</option>
                                            <option value="226702_1.249">Dinding Spandek Rangka Baja - Bangunan Gudang 1 Lantai</option>
                                            <option value="142987_1.577">Batako - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="180055_1.577">Bata Merah - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="185940_1.577">Bata Ringan - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="212891_1.577">Partisi Gypsumboard 2 Muka - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-dinding-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="tipe-dinding-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-dinding-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Pelapis Dinding Eksisting - Rumah Tinggal Sederhana 1 Lantai</strong></label><br>
                        <input type="checkbox" id="cat" class="form-check-input">
                        <label for="cat" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>
                        <input type="checkbox" id="keramik" class="form-check-input">
                        <label for="keramik" class="form-check-label">Dilapis Keramik</label><br>
                        <input type="checkbox" id="wallpaper" class="form-check-input">
                        <label for="wallpaper" class="form-check-label">Dilapis Wallpaper</label><br>
                        <input type="checkbox" id="mozaik" class="form-check-input">
                        <label for="mozaik" class="form-check-label">Dilapis Mozaik</label><br>
                        <input type="checkbox" id="batu-alam" class="form-check-input">
                        <label for="batu-alam" class="form-check-label">Dilapis Batu Alam</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-cat" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-keramik" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-wallpaper" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-mozaik" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-batu-alam" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
                        <div id="tipe-pelapis-dinding-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-sederhana" data-type="tipe-pelapis-dinding-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-pelapis-dinding-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="575506_1.875">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1591557_1.875">Dilapis Keramik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2636423_1.875">Dilapis Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="4425515_1.875">Dilapis Marmer Import - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2283657_1.875">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="957120_1.875">Dilapis Wallpaper - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2480497_1.875">Dilapis Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1154122_1.875">Dilapis Batu Alam - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="474683_2.143">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1235903_2.143">Dilapis Keramik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="2300582_2.143">Dilapis Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="3777227_2.143">Dilapis Marmer Import - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1873120_2.143">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="881996_2.143">Dilapis Wallpaper - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="2312115_2.143">Dilapis Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1070661_2.143">Dilapis Batu Alam - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="332768_2.169">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="782252_2.169">Dilapis Keramik - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="642040_2.169">Dilapis Wallpaper - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="1828812_2.169">Dilapis Mozaik - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="856559_2.169">Dilapis Batu Alam - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="194807_1.249">Dilapis Cat (Diplester dan Diaci) - Bangunan Gudang 1 Lantai</option>
                                            <option value="345190_1.577">Dilapis Cat (Diplester dan Diaci) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="909393_1.577">Dilapis Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="1378265_1.577">Dilapis Granit/ Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="1701283_1.577">Dilapis Wallpaper - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="2425106_1.577">Dilapis Aluminium Composite Panel - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-pelapis-dinding-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="tipe-pelapis-dinding-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-pelapis-dinding-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Pintu & Jendela Eksisting - Rumah Tinggal Sederhana 1 Lantai</strong></label><br>
                        <input type="checkbox" id="pintu-kayu-panil" class="form-check-input">
                        <label for="pintu-kayu-panil" class="form-check-label">Pintu Kayu Panil</label><br>
                        <input type="checkbox" id="pintu-kayu-dobel" class="form-check-input">
                        <label for="pintu-kayu-dobel" class="form-check-label">Pintu Kayu Dobel Triplek/ HPL</label><br>
                        <input type="checkbox" id="pintu-kaca-aluminium" class="form-check-input">
                        <label for="pintu-kaca-aluminium" class="form-check-label">Pintu Kaca Rk Aluminium</label><br>
                        <input type="checkbox" id="jendela-kaca-kayu" class="form-check-input">
                        <label for="jendela-kaca-kayu" class="form-check-label">Jendela Kaca Rk Kayu</label><br>
                        <input type="checkbox" id="jendela-kaca-aluminium" class="form-check-input">
                        <label for="jendela-kaca-aluminium" class="form-check-label">Jendela Kaca Rk Aluminium</label><br>
                        <input type="checkbox" id="pintu-km-upvc" class="form-check-input">
                        <label for="pintu-km-upvc" class="form-check-label">Pintu KM UPVC/PVC</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-pintu-kayu-panil" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kayu Panil</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-kayu-dobel" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kayu Dobel Triplek/ HPL</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-kaca-aluminium" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kaca Rk Aluminium</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-jendela-kaca-kayu" class="content" style="display: none;">
                        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-jendela-kaca-aluminium" class="content" style="display: none;">
                        <label><b>Bobot Jendela Kaca Rk Aluminium</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-km-upvc" class="content" style="display: none;">
                        <label><b>Bobot Pintu KM UPVC/PVC</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
                        <div id="tipe-pintu-jendela-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-sederhana" data-type="tipe-pintu-jendela-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-pintu-jendela-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="633004_0.145">Pintu Kayu Panil - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="430675_0.145">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="304254_0.145">Pintu Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="503211_0.145">Jendela Kaca Rk Kayu - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="274348_0.145">Jendela Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="370564_0.145">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="141199_0.145">Pintu KM UPVC/PVC - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="507018_0.145">Pintu Garasi Kayu - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="372489_0.145">Pintu Garasi Besi - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="209200_0.145">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="174637_0.145">Jendela Kaca Tempered Frameless - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="319349_0.218">Pintu Kayu Panil - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="257430_0.218">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="308462_0.218">Pintu Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="313184_0.218">Jendela Kaca Rk Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="312153_0.218">Jendela Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="235813_0.218">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="130356_0.218">Pintu KM UPVC/PVC - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="251196_0.218">Pintu Garasi Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="290195_0.218">Pintu Garasi Besi - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="152079_0.218">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="130977_0.218">Jendela Kaca Tempered Frameless - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="305534_0.327">Pintu Kayu Panil - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="236730_0.327">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="311178_0.327">Pintu Kaca Rk Aluminium - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="265053_0.327">Jendela Kaca Rk Kayu - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="316582_0.327">Jendela Kaca Rk Aluminium - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="65494_0.327">Pintu KM UPVC/PVC - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="71764_0.276">Jendela Kaca Rk Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="74470_0.057">Pintu Besi - Bangunan Gudang 1 Lantai</option>
                                            <option value="191060_0.126">Pintu Kayu Panil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="149554_0.126">Pintu Kayu Dobel Triplek/ HPL - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="179201_0.126">Pintu Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="189366_0.126">Jendela Kaca Rk Kayu - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="191731_0.126">Jendela Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="50598_0.126">Folding Gate - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="75730_0.126">Pintu KM UPVC/PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="135493_0.126">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="42010_0.126">Rolling Door - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>

                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-pintu-jendela-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="tipe-pintu-jendela-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-pintu-jendela-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Lantai Eksisting - Rumah Tinggal Sederhana 1 Lantai</strong></label><br>
                        <input type="checkbox" id="granit-homogenous-tile" class="form-check-input">
                        <label for="granit-homogenous-tile" class="form-check-label">Granit/Homogenous Tile</label><br>
                        <input type="checkbox" id="karpet" class="form-check-input">
                        <label for="karpet" class="form-check-label">Karpet</label><br>
                        <input type="checkbox" id="keramik" class="form-check-input">
                        <label for="keramik" class="form-check-label">Keramik</label><br>
                        <input type="checkbox" id="rabat-beton" class="form-check-input">
                        <label for="rabat-beton" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>
                        <input type="checkbox" id="teraso" class="form-check-input">
                        <label for="teraso" class="form-check-label">Teraso</label><br>
                        <input type="checkbox" id="vynil" class="form-check-input">
                        <label for="vynil" class="form-check-label">Vynil</label><br>
                        <input type="checkbox" id="papan-kayu" class="form-check-input">
                        <label for="papan-kayu" class="form-check-label">Papan Kayu</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-granit-homogenous-tile" class="content" style="display: none;">
                        <label><b>Bobot Granit/Homogenous Tile</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-karpet" class="content" style="display: none;">
                        <label><b>Bobot Karpet</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-keramik" class="content" style="display: none;">
                        <label><b>Bobot Keramik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-rabat-beton" class="content" style="display: none;">
                        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-teraso" class="content" style="display: none;">
                        <label><b>Bobot Teraso</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-vynil" class="content" style="display: none;">
                        <label><b>Bobot Vynil</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-papan-kayu" class="content" style="display: none;">
                        <label><b>Bobot Papan Kayu</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Lantai Existing</b></label><br>
                        <div id="tipe-lantai-existing-container" style="display: none;">
                            <div class="area-lainnya-container-rumah-sederhana" data-type="tipe-lantai-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-lantai-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="549105_0">Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1380230_0">Granit Impor - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="447398_0">Karpet - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="414111_0">Keramik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="700836_0">Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1190000_0">Marmer Impor - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="657355_0">Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="60227_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="536000_0">Parkit Jati - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="564958_0">Teraso - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="455080_0">Vynil - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="434503_0">Granit/Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="267057_0">Karpet - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="276046_0">Keramik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="536632_0">Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="896002_0">Marmer Impor - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="542161_0">Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="53245_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="423011_0">Parkit Jati - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="481344_0">Teraso - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="351650_0">Vynil - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="115239_0">Papan Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="260164_0">Granit/Homogenous Tile - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="173280_0">Karpet - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="176287_0">Keramik - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="66156_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="21388_0">Teraso - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="229269_0">Vynil - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="102937_0">Papan Kayu - Rumah Tinggal Sederhana 1 Lantai</option>
                                            <option value="150353_0">Keramik - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="43454_0">Rabat Beton (Semen Ekspose) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="79155_0">Papan Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="209294_0">Plat Lantai Beton T = 8 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="244126_0">Plat Lantai Beton T = 10 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="278957_0">Plat Lantai Beton T = 12 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="346178_0">Plat Lantai Beton T = 15 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="401420_0">Plat Lantai Beton T = 18 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="411260_0">Granit/Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="247679_0">Karpet - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="256461_0">Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="511030_0">Marmer Lokal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="59522_0">Rabat Beton (Semen Ekspose) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="400032_0">Parkit Jati - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="330320_0">Vynil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-lantai-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana" data-type="tipe-lantai-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-lantai-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>


                </div>

                <script>
                    document.querySelectorAll('.form-check-input').forEach(checkbox => {
                        checkbox.addEventListener('change', () => {
                            const contentId = `content-${checkbox.id}`;
                            const contentElement = document.getElementById(contentId);
                            if (contentElement) {
                                contentElement.style.display = checkbox.checked ? 'block' : 'none';
                            }
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        // Fungsi untuk membuat item area baru
                        function createAreaItem(type) {
                            const areaItem = document.createElement('div');
                            areaItem.classList.add('area-item', 'd-flex', 'align-items-center', 'mb-2');
                            let nameNama, nameLuas, nameTipe, nameBobot;

                            // Logika khusus untuk tipe pondasi
                            if (type === 'pondasi') {
                                nameTipe = 'tipe_pondasi[]';
                                nameBobot = 'bobot_pondasi[]';

                                areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Tipe Material</label>
            <select name="${nameTipe}" class="form-control" required>
                <option value="">- Select -</option>
                <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai</option>
                <option value="Batu Kali - Rumah Tinggal Sederhana 1 Lantai">Batu Kali - Rumah Tinggal Sederhana 1 Lantai</option>
                <option value="Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai">Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
            </select>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Bobot (%)</label>
            <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
        </div>
        <div class="area-controls">
            <div class="row">
                <button type="button" class="add-area-btn">+</button>
                <button type="button" class="remove-area-btn">-</button>
            </div>
        </div>
    `;
                                return areaItem;
                            }
                            if (type === 'struktur') {
                                nameTipe = 'tipe_struktur[]';
                                nameBobot = 'bobot_struktur[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="Beton Bertulang - Rumah Tinggal Mewah 2 Lantai">Beton Bertulang - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Beton Bertulang - Rumah Tinggal Menengah 2 Lantai">Beton Bertulang - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Beton Bertulang - Rumah Tinggal Sederhana 1 Lantai">Beton Bertulang - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="Baja Profil - Bangunan Gudang 1 Lantai">Baja Profil - Bangunan Gudang 1 Lantai</option>
            <option value="Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }

                            if (type === 'rangka-atap') {
                                nameTipe = 'tipe_rangka_atap[]';
                                nameBobot = 'bobot_rangka_atap[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Sederhana 1 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Sederhana 1 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="Profil Baja - Bangunan Gudang 1 Lantai">Profil Baja - Bangunan Gudang 1 Lantai</option>
            <option value="Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'penutup-atap-existing') {
                                nameTipe = 'tipe_penutup-atap-existing[]';
                                nameBobot = 'bobot_penutup-atap-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="307588_0.5028">Dak Beton - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="235683_0.5028">Fibreglass - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="239427_0.5028">Genteng Keramik Glazur - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="165717_0.5028">Genteng Tanah Liat - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="216861_0.5028">Genteng Beton - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="219751_0.5028">Genteng Metal - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="207566_0.5028">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="403405_0.5028">Tegola - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="276586_0.5028">Sirap - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="148318_0.5028">Spandek - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="262711_0.5028">PVC - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="72551_0.5569">Asbes - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="235656_0.5569">Dak Beton - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="142642_0.5569">Fibreglass - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="160060_0.5569">Genteng Keramik Glazur - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="106213_0.5569">Genteng Tanah Liat - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="151664_0.5569">Genteng Beton - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="146988_0.5569">Genteng Metal - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="129846_0.5569">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="332904_0.5569">Tegola - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="78978_0.5569">Seng Gelombang - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="243334_0.5569">Sirap - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="75361_0.5569">Spandek - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="172827_0.5569">PVC - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="117667_1">Asbes - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="304700_1">Dak Beton - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="234491_1">Fibreglass - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="156035_1">Genteng Tanah Liat - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="200470_1">Genteng Beton - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="202741_1">Genteng Metal - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="130168_1">Seng Gelombang - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="124692_1">Spandek - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="205773_1">PVC - Rumah Tinggal Sederhana 1 Lantai</option>
                            <option value="118887_1">Asbes - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                            <option value="124275_1">Seng Gelombang - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                            <option value="91072_1">Asbes - Bangunan Gudang 1 Lantai</option>
                            <option value="100790_1">Seng Gelombang - Bangunan Gudang 1 Lantai</option>
                            <option value="95320_1">Spandek - Bangunan Gudang 1 Lantai</option>
                            <option value="0.4001_0.335">Asbes - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="191376_0.335">Dak Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4003_0.335">Fibreglass - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4004_0.335">Genteng Keramik Glazur - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4005_0.335">Genteng Tanah Liat - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4006_0.335">Genteng Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="4007_0.335">Genteng Metal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4008_0.335">Bitumen (Ondulin/ Onduvilla) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.401_0.335">Tegola - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4011_0.335">Seng Gelombang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4012_0.335">Sirap - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4013_0.335">Spandek - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4014_0.335">PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }

                            if (type === 'tipe-dinding-existing') {
                                nameTipe = 'tipe_tipe-dinding-existing[]';
                                nameBobot = 'bobot_tipe-dinding-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="273324_1.875">Bata Merah - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="274359_1.875">Bata Ringan - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="318811_1.875">Partisi Gypsumboard 2 Muka - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="725693_1.875">Rooster Bata - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="194325_2.143">Batako - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="244702_2.143">Bata Merah - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="252700_2.143">Bata Ringan - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="289328_2.143">Partisi Gypsumboard 2 Muka - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="703318_2.143">Rooster Bata - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="153906_2.169">Batako - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="190474_2.169">Bata Merah - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="207182_2.169">Bata Ringan - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="260248_2.169">Partisi Gypsumboard 2 Muka - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="605463_2.169">Rooster Bata - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="336877_1.481">Papan dan Partisi Triplek Dicat - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="113213_1.249">Batako - Bangunan Gudang 1 Lantai</option>
            <option value="142562_1.249">Bata Merah - Bangunan Gudang 1 Lantai</option>
            <option value="147222_1.249">Bata Ringan - Bangunan Gudang 1 Lantai</option>
            <option value="226702_1.249">Dinding Spandek Rangka Baja - Bangunan Gudang 1 Lantai</option>
            <option value="142987_1.577">Batako - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="180055_1.577">Bata Merah - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="185940_1.577">Bata Ringan - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="212891_1.577">Partisi Gypsumboard 2 Muka - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-pelapis-dinding-existing') {
                                nameTipe = 'tipe_tipe-pelapis-dinding-existing[]';
                                nameBobot = 'bobot_tipe-pelapis-dinding-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="575506_1.875">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1591557_1.875">Dilapis Keramik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2636423_1.875">Dilapis Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="4425515_1.875">Dilapis Marmer Import - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2283657_1.875">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="957120_1.875">Dilapis Wallpaper - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2480497_1.875">Dilapis Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1154122_1.875">Dilapis Batu Alam - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="474683_2.143">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1235903_2.143">Dilapis Keramik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="2300582_2.143">Dilapis Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="3777227_2.143">Dilapis Marmer Import - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1873120_2.143">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="881996_2.143">Dilapis Wallpaper - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="2312115_2.143">Dilapis Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1070661_2.143">Dilapis Batu Alam - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="332768_2.169">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="782252_2.169">Dilapis Keramik - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="642040_2.169">Dilapis Wallpaper - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="1828812_2.169">Dilapis Mozaik - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="856559_2.169">Dilapis Batu Alam - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="194807_1.249">Dilapis Cat (Diplester dan Diaci) - Bangunan Gudang 1 Lantai</option>
            <option value="345190_1.577">Dilapis Cat (Diplester dan Diaci) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="909393_1.577">Dilapis Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="1378265_1.577">Dilapis Granit/ Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="1701283_1.577">Dilapis Wallpaper - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="2425106_1.577">Dilapis Aluminium Composite Panel - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-lantai-existing') {
                                nameTipe = 'tipe_tipe-lantai-existing[]';
                                nameBobot = 'bobot_tipe-lantai-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="549105_0">Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1380230_0">Granit Impor - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="447398_0">Karpet - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="414111_0">Keramik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="700836_0">Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1190000_0">Marmer Impor - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="657355_0">Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="60227_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="536000_0">Parkit Jati - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="564958_0">Teraso - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="455080_0">Vynil - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="434503_0">Granit/Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="267057_0">Karpet - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="276046_0">Keramik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="536632_0">Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="896002_0">Marmer Impor - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="542161_0">Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="53245_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="423011_0">Parkit Jati - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="481344_0">Teraso - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="351650_0">Vynil - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="115239_0">Papan Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="260164_0">Granit/Homogenous Tile - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="173280_0">Karpet - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="176287_0">Keramik - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="66156_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="21388_0">Teraso - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="229269_0">Vynil - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="102937_0">Papan Kayu - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="150353_0">Keramik - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="43454_0">Rabat Beton (Semen Ekspose) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="79155_0">Papan Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="209294_0">Plat Lantai Beton T = 8 cm - Bangunan Gudang 1 Lantai</option>
            <option value="244126_0">Plat Lantai Beton T = 10 cm - Bangunan Gudang 1 Lantai</option>
            <option value="278957_0">Plat Lantai Beton T = 12 cm - Bangunan Gudang 1 Lantai</option>
            <option value="346178_0">Plat Lantai Beton T = 15 cm - Bangunan Gudang 1 Lantai</option>
            <option value="401420_0">Plat Lantai Beton T = 18 cm - Bangunan Gudang 1 Lantai</option>
            <option value="411260_0">Granit/Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="247679_0">Karpet - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="256461_0">Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="511030_0">Marmer Lokal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="59522_0">Rabat Beton (Semen Ekspose) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="400032_0">Parkit Jati - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="330320_0">Vynil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-pintu-jendela-existing') {
                                nameTipe = 'tipe_tipe-pintu-jendela-existing[]';
                                nameBobot = 'bobot_tipe-pintu-jendela-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="633004_0.145">Pintu Kayu Panil - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="430675_0.145">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="304254_0.145">Pintu Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="503211_0.145">Jendela Kaca Rk Kayu - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="274348_0.145">Jendela Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="370564_0.145">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="141199_0.145">Pintu KM UPVC/PVC - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="507018_0.145">Pintu Garasi Kayu - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="372489_0.145">Pintu Garasi Besi - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="209200_0.145">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="174637_0.145">Jendela Kaca Tempered Frameless - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="319349_0.218">Pintu Kayu Panil - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="257430_0.218">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="308462_0.218">Pintu Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="313184_0.218">Jendela Kaca Rk Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="312153_0.218">Jendela Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="235813_0.218">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="130356_0.218">Pintu KM UPVC/PVC - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="251196_0.218">Pintu Garasi Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="290195_0.218">Pintu Garasi Besi - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="152079_0.218">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="130977_0.218">Jendela Kaca Tempered Frameless - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="305534_0.327">Pintu Kayu Panil - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="236730_0.327">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="311178_0.327">Pintu Kaca Rk Aluminium - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="265053_0.327">Jendela Kaca Rk Kayu - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="316582_0.327">Jendela Kaca Rk Aluminium - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="65494_0.327">Pintu KM UPVC/PVC - Rumah Tinggal Sederhana 1 Lantai</option>
            <option value="71764_0.276">Jendela Kaca Rk Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="74470_0.057">Pintu Besi - Bangunan Gudang 1 Lantai</option>
            <option value="191060_0.126">Pintu Kayu Panil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="149554_0.126">Pintu Kayu Dobel Triplek/ HPL - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="179201_0.126">Pintu Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="189366_0.126">Jendela Kaca Rk Kayu - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="191731_0.126">Jendela Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="50598_0.126">Folding Gate - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="75730_0.126">Pintu KM UPVC/PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="135493_0.126">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="42010_0.126">Rolling Door - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }





                            // Logika umum untuk tipe lainnya
                            if (type === 'pintu-jendela') {
                                nameNama = 'nama_pintu_jendela[]';
                                nameLuas = 'luas_pintu_jendela[]';
                            } else if (type === 'dinding') {
                                nameNama = 'nama_dinding[]';
                                nameLuas = 'luas_dinding[]';
                            } else if (type === 'atap-datar') {
                                nameNama = 'nama_atap_datar[]';
                                nameLuas = 'luas_atap_datar[]';
                            } else if (type === 'atap-datar-2') {
                                nameNama = 'nama_atap_datar_2[]';
                                nameLuas = 'luas_atap_datar_2[]';
                            }

                            areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Nama Area</label>
            <input type="text" name="${nameNama}" class="form-control" placeholder="Nama Area" required>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Luas (m²)</label>
            <input type="number" name="${nameLuas}" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
        </div>
        <div class="area-controls">
            <div class="row">
                <button type="button" class="add-area-btn">+</button>
                <button type="button" class="remove-area-btn">-</button>
            </div>
        </div>
    `;
                            return areaItem;
                        }


                        // Menangani klik pada tombol "Tambah Area"
                        document.querySelectorAll('.add-area-link-rumah-sederhana').forEach(function(button) {
                            button.addEventListener('click', function(e) {
                                e.preventDefault();
                                const type = this.getAttribute('data-type');
                                const areaContainer = document.querySelector(`.area-lainnya-container-rumah-sederhana[data-type="${type}"]`);
                                const newAreaItem = createAreaItem(type);
                                areaContainer.appendChild(newAreaItem);
                            });
                        });

                        // Event delegation untuk tombol add dan remove dalam masing-masing container
                        document.querySelectorAll('.area-lainnya-container-rumah-sederhana').forEach(function(container) {
                            container.addEventListener('click', function(e) {
                                if (e.target.classList.contains('add-area-btn')) {
                                    e.preventDefault();
                                    const type = container.getAttribute('data-type');
                                    const newAreaItem = createAreaItem(type);
                                    container.appendChild(newAreaItem);
                                }

                                if (e.target.classList.contains('remove-area-btn')) {
                                    e.preventDefault();
                                    const areaItem = e.target.closest('.area-item');
                                    if (areaItem) {
                                        // Pastikan setidaknya ada satu area-item
                                        if (container.children.length > 1) {
                                            container.removeChild(areaItem);
                                        } else {
                                            container.removeChild(areaItem);
                                        }
                                    }
                                }
                            });
                        });


                    });

                    function toggleBobotInput(checkbox, targetId) {
                        const bobotInput = document.getElementById(targetId);
                        if (checkbox.checked) {
                            bobotInput.style.display = 'block';
                        } else {
                            bobotInput.style.display = 'none';
                        }
                    }
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const pondasiContainer = document.getElementById('pondasi-container');
                        const showPondasiBtn = document.getElementById('show-pondasi-btn');
                        const addPondasiBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="pondasi"]');

                        // Awal hanya tombol show yang terlihat
                        addPondasiBtn.style.display = 'none';

                        showPondasiBtn.addEventListener('click', function() {
                            console.log('asd');

                            pondasiContainer.style.display = 'block'; // Tampilkan container
                            showPondasiBtn.remove();
                            addPondasiBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addPondasiBtn.addEventListener('click', function() {
                            // Logika menambahkan area pondasi sudah ditangani di kode lain
                            console.log('Area baru untuk pondasi ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const strukturContainer = document.getElementById('struktur-container');
                        const showStrukturBtn = document.getElementById('show-struktur-btn');
                        const addStrukturBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="struktur"]');

                        // Awal hanya tombol show yang terlihat
                        addStrukturBtn.style.display = 'none';

                        showStrukturBtn.addEventListener('click', function() {
                            strukturContainer.style.display = 'block'; // Tampilkan container
                            showStrukturBtn.remove(); // Hapus tombol show
                            addStrukturBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addStrukturBtn.addEventListener('click', function() {
                            // Logika untuk menambah area struktur ditangani di kode area lainnya
                            console.log('Area baru untuk struktur ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('rangka-atap-container');
                        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="rangka-atap"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="penutup-atap-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-dinding-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-dinding-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="tipe-dinding-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="tipe-pelapis-dinding-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="tipe-lantai-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="tipe-pintu-jendela-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                </script>

                <!-- Rumah Sederhana -->


                <!-- Rumah menengah -->

                <style>
                    .area-lainnya-container {
                        border: 1px solid #dee2e6;
                        padding: 10px;
                        border-radius: 5px;
                    }

                    .area-lainnya-container .form-group {
                        margin-bottom: 0;
                    }

                    .area-lainnya-container label {
                        font-weight: bold;
                    }

                    .area-item {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        margin-bottom: 10px;
                        padding: 5px;
                    }

                    .area-item input {
                        margin-right: 5px;
                    }

                    .area-controls button {
                        background: none;
                        border: none;
                        color: #007bff;
                        font-size: 18px;
                    }
                </style>


                <div id="form-rumah-menengah" style=" margin-top: 20px; display: none;">
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
                        <br>
                        <small class="form-text text-muted" style="margin-top: 5px;">Pilih jenis bangunan yang sesuai untuk menentukan umur ekonomis bangunan.</small>
                        <select class="form-control" id="jenis_bangunan" name="jenis_bangunan">
                            <option value="">- Select -</option>
                            <option value="Bangunan Rumah Tinggal">Bangunan Rumah Tinggal</option>
                            <option value="Bangunan Rumah Susun">Bangunan Rumah Susun</option>
                            <option value="Pusat Perbelanjaan">Pusat Perbelanjaan</option>
                            <option value="Bangunan Kantor">Bangunan Kantor</option>
                            <option value="Bangunan Gedung Pemerintah">Bangunan Gedung Pemerintah</option>
                            <option value="Bangunan Hotel/ Motel">Bangunan Hotel/ Motel</option>
                            <option value="Bangunan Industri dan Gudang">Bangunan Industri dan Gudang</option>
                            <option value="Bangunan di Kawasan Perkebunan">Bangunan di Kawasan Perkebunan</option>
                        </select>

                    </div>

                    <div class="form-group" style="margin-top: 20px;">
                        <label for="jenis_bangunan_indeks_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks Lantai)</label>
                        <br>
                        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai MAPPI.</small>
                        <select class="form-control" id="jenis_bangunan_indeks_lantai" name="jenis_bangunan_indeks_lantai">
                            <option value="">- Select -</option>
                            <option value="Rumah Tinggal Sederhana">Rumah Tinggal Sederhana (Simple Dwelling)</option>
                            <option value="Rumah Tinggal Menengah">Rumah Tinggal Menengah (Medium Dwelling)</option>
                            <option value="Rumah Tinggal Mewah">Rumah Tinggal Mewah (Luxury Dwelling)</option>
                            <option value="Bangunan Gedung Bertingkat Low Rise">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai) (Low-Rise Building &lt;5 Floors)</option>
                            <option value="Bangunan Gedung Bertingkat Mid Rise">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai) (Mid-Rise Building &lt;9 Floors)</option>
                            <option value="Bangunan Gedung Bertingkat High Rise">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai) (High-Rise Building &gt;8 Floors)</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
                        <input type="number" class="form-control" id="tahun_dibangun" name="tahun_dibangun" placeholder="Enter Year" min="1900" max="2024">
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
                        <input type="number" class="form-control" id="tahun_renovasi" name="tahun_renovasi" placeholder="Enter Year" min="1900" max="2024">
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="kondisi_visual" style="font-weight: bold;">Kondisi Bangunan Secara Visual</label>
                        <select class="form-control" id="kondisi_visual" name="kondisi_visual">
                            <option value="">- Select -</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Kurang Baik">Kurang Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Baik">Baik</option>
                            <option value="Baik Sekali">Baik Sekali</option>
                            <option value="Baru">Baru</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="catatan_khusus" style="font-weight: bold;">Catatan Khusus Bangunan</label>
                        <textarea class="form-control" id="catatan_khusus" name="catatan_khusus" rows="4" placeholder="Tambahkan catatan khusus di sini..."></textarea>
                    </div>
                    <!-- Field Baru: Luas Bangunan Terpotong (m²) -->
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="luas_bangunan_terpotong" style="font-weight: bold;">Luas Bangunan Terpotong (m²)</label><br>
                        <small class="form-text text-muted">Terpotong atau alasannya lainnya.</small>
                        <input type="number" class="form-control" id="luas_bangunan_terpotong" name="luas_bangunan_terpotong" placeholder="Enter Area" min="0" step="0.01">
                    </div>

                    <!-- Field Baru: Luas Bangunan menurut IMB (m²) -->
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="luas_bangunan_imb" style="font-weight: bold;">Luas Bangunan menurut IMB (m²)</label>
                        <input type="number" class="form-control" id="luas_bangunan_imb" name="luas_bangunan_imb" placeholder="Enter Area" min="0" step="0.01">
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Pintu dan Jendela</b></label><br>
                        <small class="form-text text-muted">Masukkan luas pintu dan jendela yang ada.</small>
                        <div class="area-lainnya-container" data-type="pintu-jendela">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_pintu_jendela[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_pintu_jendela[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pintu-jendela">Tambah Area</button>
                    </div>

                    <!-- Luas Dinding -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Dinding</b></label><br>
                        <small class="form-text text-muted">Masukkan luas dinding kotor belum dikurangi luas pintu dan jendela.</small>
                        <div class="area-lainnya-container" data-type="dinding">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_dinding[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_dinding[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="dinding">Tambah Area</button>
                    </div>
                    <!-- Luas Rangka Atap Datar -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Rangka Atap Datar</b></label><br>
                        <small class="form-text text-muted">Masukkan luas rangka atap datar.</small>
                        <div class="area-lainnya-container" data-type="atap-datar">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_atap_datar[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_atap_datar[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar">Tambah Area</button>
                    </div>

                    <!-- Luas Atap Datar -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Luas Atap Datar</b></label><br>
                        <small class="form-text text-muted">Masukkan luas atap datar.</small>
                        <div class="area-lainnya-container" data-type="atap-datar-2">
                            <div class="area-item d-flex align-items-center mb-2">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Nama Area</label>
                                    <input type="text" name="nama_atap_datar_2[]" class="form-control" placeholder="Nama Area" required>
                                </div>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Luas (m²)</label>
                                    <input type="number" name="luas_atap_datar_2[]" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
                                </div>
                                <div class="area-controls">
                                    <div class="row">
                                        <button type="button" class="add-area-btn">+</button>
                                        <button type="button" class="remove-area-btn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar-2">Tambah Area</button>
                    </div>
                    <!-- Tipe Pondasi Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Pondasi Eksisting - Rumah Tinggal Menengah 2 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Batu Kali" id="pondasi_batu_kali" onchange="toggleBobotInput(this, 'bobot_pondasi_batu_kali')">
                                <label class="form-check-label" for="pondasi_batu_kali">Batu Kali</label>
                            </div>
                        </div>
                        <div id="bobot_pondasi_batu_kali" style="display: none; margin-top: 10px;">
                            <label for="bobot_batu_kali">Bobot Pondasi Batu Kali (dalam persen %)</label>
                            <input type="number" class="form-control" id="bobot_batu_kali" name="bobot_batu_kali" placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
                        </div>
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
                        <div id="pondasi-container" style="display: none;">
                            <div class="area-lainnya-container" data-type="pondasi">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_pondasi[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="Batu Kali - Rumah Tinggal Menengah 2 Lantai">Batu Kali - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai">Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai</option>
                                            <option value="Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
                                        </select>
                                    </div>

                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_pondasi[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pondasi">Tambah Tipe Pondasi Existing</button>

                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-pondasi-btn">Tambah Tipe Pondasi Existing</button>


                    </div>
                    <!-- Tipe Struktur Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Struktur Eksisting - Rumah Tinggal Menengah 2 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Beton Bertulang" id="struktur_beton_bertulang" onchange="toggleBobotInput(this, 'bobot_struktur_beton_bertulang')">
                                <label class="form-check-label" for="struktur_beton_bertulang">Beton Bertulang</label>
                            </div>
                        </div>
                        <div id="bobot_struktur_beton_bertulang" style="display: none; margin-top: 10px;">
                            <label for="bobot_beton_bertulang">Bobot Struktur Beton Bertulang (dalam persen %)</label>
                            <input type="number" class="form-control" id="bobot_beton_bertulang" name="bobot_beton_bertulang" placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
                        </div>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
                        <div id="struktur-container" style="display: none;">
                            <div class="area-lainnya-container" data-type="struktur">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_struktur[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Mewah 2 Lantai">Beton Bertulang - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Menengah 2 Lantai">Beton Bertulang - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="Beton Bertulang - Rumah Tinggal Menengah 2 Lantai">Beton Bertulang - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="Baja Profil - Bangunan Gudang 1 Lantai">Baja Profil - Bangunan Gudang 1 Lantai</option>
                                            <option value="Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_struktur[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="struktur">Tambah Tipe Struktur Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn">Tambah Tipe Struktur Existing</button>
                    </div>

                    <!-- Tipe Rangka Atap Existing -->
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Rangka Atap Eksisting - Rumah Tinggal Menengah 2 Lantai</b></label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Dak Beton (Jika Pakai Balok)" id="atap_dak_beton">
                                <label class="form-check-label" for="atap_dak_beton">Dak Beton (Jika Pakai Balok)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Kayu (Atap Genteng)" id="atap_kayu_genteng">
                                <label class="form-check-label" for="atap_kayu_genteng">Kayu (Atap Genteng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)" id="atap_kayu_asbes">
                                <label class="form-check-label" for="atap_kayu_asbes">Kayu (Atap Asbes, Seng dll, Tanpa Reng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Genteng)" id="atap_baja_genteng">
                                <label class="form-check-label" for="atap_baja_genteng">Baja Ringan (Atap Genteng)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Asbes, Seng dll)" id="atap_baja_asbes">
                                <label class="form-check-label" for="atap_baja_asbes">Baja Ringan (Atap Asbes, Seng dll)</label>
                            </div>
                        </div>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-atap_dak_beton" class="content" style="display: none;">
                        <label><b>Bobot Dak Beton (Jika Pakai Balok)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_kayu_genteng" class="content" style="display: none;">
                        <label><b>Bobot Kayu (Atap Genteng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_kayu_asbes" class="content" style="display: none;">
                        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_baja_genteng" class="content" style="display: none;">
                        <label><b>Bobot Baja Ringan (Atap Genteng)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-atap_baja_asbes" class="content" style="display: none;">
                        <label><b>Bobot Baja Ringan (Atap Asbes, Seng dll)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tipe Rangka Atap Existing</b></label><br>
                        <div id="rangka-atap-container" style="display: none;">
                            <div class="area-lainnya-container" data-type="rangka-atap">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_rangka_atap[]" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="118520_0.5028">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="291406_0.5028">Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="163018_0.5028">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="207572_0.5028">Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="170598_0.5028">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="101031_0.5569">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="207825_0.5569">Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="118737_0.5569">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="155172_0.5569">Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="127639_0.5569">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="124221_1">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="252610_1">Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="147623_1">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="214587_1">Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="173204_1">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="78577_1">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="339006_1">Profil Baja - Bangunan Gudang 1 Lantai</option>
                                            <option value="112308_0.335">Dak Beton (Jika Pakai Balok) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3002_0.335">Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3003_0.335">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3004_0.335">Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.3005_0.335">Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_rangka_atap[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="rangka-atap">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="asbes" name="tipe_atap" value="Asbes" class="form-check-input">
                        <label for="asbes" class="form-check-label">Asbes</label><br>

                        <input type="checkbox" id="dak-beton" name="tipe_atap" value="Dak Beton" class="form-check-input">
                        <label for="dak-beton" class="form-check-label">Dak Beton</label><br>

                        <input type="checkbox" id="fibreglass" name="tipe_atap" value="Fibreglass" class="form-check-input">
                        <label for="fibreglass" class="form-check-label">Fibreglass</label><br>

                        <input type="checkbox" id="genteng-tanah-liat" name="tipe_atap" value="Genteng Tanah Liat" class="form-check-input">
                        <label for="genteng-tanah-liat" class="form-check-label">Genteng Tanah Liat</label><br>

                        <input type="checkbox" id="genteng-beton" name="tipe_atap" value="Genteng Beton" class="form-check-input">
                        <label for="genteng-beton" class="form-check-label">Genteng Beton</label><br>

                        <input type="checkbox" id="genteng-metal" name="tipe_atap" value="Genteng Metal" class="form-check-input">
                        <label for="genteng-metal" class="form-check-label">Genteng Metal</label><br>

                        <input type="checkbox" id="seng-gelombang" name="tipe_atap" value="Seng Gelombang" class="form-check-input">
                        <label for="seng-gelombang" class="form-check-label">Seng Gelombang</label><br>

                        <input type="checkbox" id="spandek" name="tipe_atap" value="Spandek" class="form-check-input">
                        <label for="spandek" class="form-check-label">Spandek</label><br>

                        <input type="checkbox" id="pvc" name="tipe_atap" value="PVC" class="form-check-input">
                        <label for="pvc" class="form-check-label">PVC</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-asbes" class="content" style="display: none;">
                        <label><b>Bobot Asbes</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-dak-beton" class="content" style="display: none;">
                        <label><b>Bobot Dak Beton</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-fibreglass" class="content" style="display: none;">
                        <label><b>Bobot Fibreglass</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-tanah-liat" class="content" style="display: none;">
                        <label><b>Bobot Genteng Tanah Liat</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-beton" class="content" style="display: none;">
                        <label><b>Bobot Genteng Beton</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-genteng-metal" class="content" style="display: none;">
                        <label><b>Bobot Genteng Metal</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-seng-gelombang" class="content" style="display: none;">
                        <label><b>Bobot Seng Gelombang</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-spandek" class="content" style="display: none;">
                        <label><b>Bobot Spandek</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pvc" class="content" style="display: none;">
                        <label><b>Bobot PVC</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
                        <div id="penutup-atap-existing-container" style="display: none;">
                            <div class="area-lainnya-container" data-type="penutup-atap-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_penutup-atap-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="307588_0.5028">Dak Beton - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="235683_0.5028">Fibreglass - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="239427_0.5028">Genteng Keramik Glazur - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="165717_0.5028">Genteng Tanah Liat - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="216861_0.5028">Genteng Beton - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="219751_0.5028">Genteng Metal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="207566_0.5028">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="403405_0.5028">Tegola - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="276586_0.5028">Sirap - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="148318_0.5028">Spandek - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="262711_0.5028">PVC - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="72551_0.5569">Asbes - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="235656_0.5569">Dak Beton - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="142642_0.5569">Fibreglass - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="160060_0.5569">Genteng Keramik Glazur - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="106213_0.5569">Genteng Tanah Liat - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="151664_0.5569">Genteng Beton - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="146988_0.5569">Genteng Metal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="129846_0.5569">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="332904_0.5569">Tegola - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="78978_0.5569">Seng Gelombang - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="243334_0.5569">Sirap - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="75361_0.5569">Spandek - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="172827_0.5569">PVC - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="117667_1">Asbes - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="304700_1">Dak Beton - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="234491_1">Fibreglass - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="156035_1">Genteng Tanah Liat - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="200470_1">Genteng Beton - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="202741_1">Genteng Metal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="130168_1">Seng Gelombang - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="124692_1">Spandek - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="205773_1">PVC - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="118887_1">Asbes - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="124275_1">Seng Gelombang - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="91072_1">Asbes - Bangunan Gudang 1 Lantai</option>
                                            <option value="100790_1">Seng Gelombang - Bangunan Gudang 1 Lantai</option>
                                            <option value="95320_1">Spandek - Bangunan Gudang 1 Lantai</option>
                                            <option value="0.4001_0.335">Asbes - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="191376_0.335">Dak Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4003_0.335">Fibreglass - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4004_0.335">Genteng Keramik Glazur - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4005_0.335">Genteng Tanah Liat - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4006_0.335">Genteng Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="4007_0.335">Genteng Metal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4008_0.335">Bitumen (Ondulin/ Onduvilla) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.401_0.335">Tegola - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4011_0.335">Seng Gelombang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4012_0.335">Sirap - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4013_0.335">Spandek - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="0.4014_0.335">PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_penutup-atap-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="penutup-atap-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-penutup-atap-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>
                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="batako" class="form-check-input">
                        <label for="batako" class="form-check-label">Batako</label><br>
                        <input type="checkbox" id="bata-merah" class="form-check-input">
                        <label for="bata-merah" class="form-check-label">Bata Merah</label><br>
                        <input type="checkbox" id="bata-ringan" class="form-check-input">
                        <label for="bata-ringan" class="form-check-label">Bata Ringan</label><br>
                        <input type="checkbox" id="gypsumboard" class="form-check-input">
                        <label for="gypsumboard" class="form-check-label">Partisi Gypsumboard 2 Muka</label><br>
                        <input type="checkbox" id="rooster-bata" class="form-check-input">
                        <label for="rooster-bata" class="form-check-label">Rooster Bata</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-batako" class="content" style="display: none;">
                        <label><b>Bobot Dinding Batako</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-bata-merah" class="content" style="display: none;">
                        <label><b>Bobot Dinding Bata Merah</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-bata-ringan" class="content" style="display: none;">
                        <label><b>Bobot Dinding Bata Ringan</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-gypsumboard" class="content" style="display: none;">
                        <label><b>Bobot Dinding Partisi Gypsumboard 2 Muka</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-rooster-bata" class="content" style="display: none;">
                        <label><b>Bobot Dinding Rooster Bata</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Dinding Existing</b></label><br>
                        <div id="tipe-dinding-existing-container" style="display: none;">
                            <div class="area-lainnya-container" data-type="tipe-dinding-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-dinding-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="273324_1.875">Bata Merah - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="274359_1.875">Bata Ringan - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="318811_1.875">Partisi Gypsumboard 2 Muka - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="725693_1.875">Rooster Bata - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="194325_2.143">Batako - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="244702_2.143">Bata Merah - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="252700_2.143">Bata Ringan - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="289328_2.143">Partisi Gypsumboard 2 Muka - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="703318_2.143">Rooster Bata - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="153906_2.169">Batako - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="190474_2.169">Bata Merah - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="207182_2.169">Bata Ringan - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="260248_2.169">Partisi Gypsumboard 2 Muka - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="605463_2.169">Rooster Bata - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="336877_1.481">Papan dan Partisi Triplek Dicat - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="113213_1.249">Batako - Bangunan Gudang 1 Lantai</option>
                                            <option value="142562_1.249">Bata Merah - Bangunan Gudang 1 Lantai</option>
                                            <option value="147222_1.249">Bata Ringan - Bangunan Gudang 1 Lantai</option>
                                            <option value="226702_1.249">Dinding Spandek Rangka Baja - Bangunan Gudang 1 Lantai</option>
                                            <option value="142987_1.577">Batako - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="180055_1.577">Bata Merah - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="185940_1.577">Bata Ringan - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="212891_1.577">Partisi Gypsumboard 2 Muka - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-dinding-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="tipe-dinding-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-dinding-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Pelapis Dinding Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="cat" class="form-check-input">
                        <label for="cat" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>
                        <input type="checkbox" id="keramik" class="form-check-input">
                        <label for="keramik" class="form-check-label">Dilapis Keramik</label><br>
                        <input type="checkbox" id="wallpaper" class="form-check-input">
                        <label for="wallpaper" class="form-check-label">Dilapis Wallpaper</label><br>
                        <input type="checkbox" id="mozaik" class="form-check-input">
                        <label for="mozaik" class="form-check-label">Dilapis Mozaik</label><br>
                        <input type="checkbox" id="batu-alam" class="form-check-input">
                        <label for="batu-alam" class="form-check-label">Dilapis Batu Alam</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-cat" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-keramik" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-wallpaper" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-mozaik" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-batu-alam" class="content" style="display: none;">
                        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
                        <div id="tipe-pelapis-dinding-existing-container" style="display: none;">
                            <div class="area-lainnya-container" data-type="tipe-pelapis-dinding-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-pelapis-dinding-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="575506_1.875">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1591557_1.875">Dilapis Keramik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2636423_1.875">Dilapis Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="4425515_1.875">Dilapis Marmer Import - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2283657_1.875">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="957120_1.875">Dilapis Wallpaper - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="2480497_1.875">Dilapis Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1154122_1.875">Dilapis Batu Alam - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="474683_2.143">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1235903_2.143">Dilapis Keramik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="2300582_2.143">Dilapis Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="3777227_2.143">Dilapis Marmer Import - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1873120_2.143">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="881996_2.143">Dilapis Wallpaper - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="2312115_2.143">Dilapis Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1070661_2.143">Dilapis Batu Alam - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="332768_2.169">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="782252_2.169">Dilapis Keramik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="642040_2.169">Dilapis Wallpaper - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="1828812_2.169">Dilapis Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="856559_2.169">Dilapis Batu Alam - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="194807_1.249">Dilapis Cat (Diplester dan Diaci) - Bangunan Gudang 1 Lantai</option>
                                            <option value="345190_1.577">Dilapis Cat (Diplester dan Diaci) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="909393_1.577">Dilapis Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="1378265_1.577">Dilapis Granit/ Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="1701283_1.577">Dilapis Wallpaper - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="2425106_1.577">Dilapis Aluminium Composite Panel - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-pelapis-dinding-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="tipe-pelapis-dinding-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-pelapis-dinding-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Pintu & Jendela Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="pintu-kayu-panil" class="form-check-input">
                        <label for="pintu-kayu-panil" class="form-check-label">Pintu Kayu Panil</label><br>
                        <input type="checkbox" id="pintu-kayu-dobel" class="form-check-input">
                        <label for="pintu-kayu-dobel" class="form-check-label">Pintu Kayu Dobel Triplek/ HPL</label><br>
                        <input type="checkbox" id="pintu-kaca-aluminium" class="form-check-input">
                        <label for="pintu-kaca-aluminium" class="form-check-label">Pintu Kaca Rk Aluminium</label><br>
                        <input type="checkbox" id="jendela-kaca-kayu" class="form-check-input">
                        <label for="jendela-kaca-kayu" class="form-check-label">Jendela Kaca Rk Kayu</label><br>
                        <input type="checkbox" id="jendela-kaca-aluminium" class="form-check-input">
                        <label for="jendela-kaca-aluminium" class="form-check-label">Jendela Kaca Rk Aluminium</label><br>
                        <input type="checkbox" id="pintu-km-upvc" class="form-check-input">
                        <label for="pintu-km-upvc" class="form-check-label">Pintu KM UPVC/PVC</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-pintu-kayu-panil" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kayu Panil</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-kayu-dobel" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kayu Dobel Triplek/ HPL</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-kaca-aluminium" class="content" style="display: none;">
                        <label><b>Bobot Pintu Kaca Rk Aluminium</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-jendela-kaca-kayu" class="content" style="display: none;">
                        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-jendela-kaca-aluminium" class="content" style="display: none;">
                        <label><b>Bobot Jendela Kaca Rk Aluminium</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-pintu-km-upvc" class="content" style="display: none;">
                        <label><b>Bobot Pintu KM UPVC/PVC</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
                        <div id="tipe-pintu-jendela-existing-container" style="display: none;">
                            <div class="area-lainnya-container" data-type="tipe-pintu-jendela-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-pintu-jendela-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="633004_0.145">Pintu Kayu Panil - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="430675_0.145">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="304254_0.145">Pintu Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="503211_0.145">Jendela Kaca Rk Kayu - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="274348_0.145">Jendela Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="370564_0.145">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="141199_0.145">Pintu KM UPVC/PVC - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="507018_0.145">Pintu Garasi Kayu - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="372489_0.145">Pintu Garasi Besi - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="209200_0.145">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="174637_0.145">Jendela Kaca Tempered Frameless - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="319349_0.218">Pintu Kayu Panil - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="257430_0.218">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="308462_0.218">Pintu Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="313184_0.218">Jendela Kaca Rk Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="312153_0.218">Jendela Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="235813_0.218">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="130356_0.218">Pintu KM UPVC/PVC - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="251196_0.218">Pintu Garasi Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="290195_0.218">Pintu Garasi Besi - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="152079_0.218">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="130977_0.218">Jendela Kaca Tempered Frameless - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="305534_0.327">Pintu Kayu Panil - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="236730_0.327">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="311178_0.327">Pintu Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="265053_0.327">Jendela Kaca Rk Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="316582_0.327">Jendela Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="65494_0.327">Pintu KM UPVC/PVC - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="71764_0.276">Jendela Kaca Rk Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="74470_0.057">Pintu Besi - Bangunan Gudang 1 Lantai</option>
                                            <option value="191060_0.126">Pintu Kayu Panil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="149554_0.126">Pintu Kayu Dobel Triplek/ HPL - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="179201_0.126">Pintu Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="189366_0.126">Jendela Kaca Rk Kayu - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="191731_0.126">Jendela Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="50598_0.126">Folding Gate - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="75730_0.126">Pintu KM UPVC/PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="135493_0.126">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="42010_0.126">Rolling Door - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>

                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-pintu-jendela-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="tipe-pintu-jendela-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-pintu-jendela-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>

                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><strong>Tipe Lantai Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
                        <input type="checkbox" id="granit-homogenous-tile" class="form-check-input">
                        <label for="granit-homogenous-tile" class="form-check-label">Granit/Homogenous Tile</label><br>
                        <input type="checkbox" id="karpet" class="form-check-input">
                        <label for="karpet" class="form-check-label">Karpet</label><br>
                        <input type="checkbox" id="keramik" class="form-check-input">
                        <label for="keramik" class="form-check-label">Keramik</label><br>
                        <input type="checkbox" id="rabat-beton" class="form-check-input">
                        <label for="rabat-beton" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>
                        <input type="checkbox" id="teraso" class="form-check-input">
                        <label for="teraso" class="form-check-label">Teraso</label><br>
                        <input type="checkbox" id="vynil" class="form-check-input">
                        <label for="vynil" class="form-check-label">Vynil</label><br>
                        <input type="checkbox" id="papan-kayu" class="form-check-input">
                        <label for="papan-kayu" class="form-check-label">Papan Kayu</label><br>
                    </div>

                    <!-- Content sections for each option -->
                    <div id="content-granit-homogenous-tile" class="content" style="display: none;">
                        <label><b>Bobot Granit/Homogenous Tile</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-karpet" class="content" style="display: none;">
                        <label><b>Bobot Karpet</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-keramik" class="content" style="display: none;">
                        <label><b>Bobot Keramik</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-rabat-beton" class="content" style="display: none;">
                        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-teraso" class="content" style="display: none;">
                        <label><b>Bobot Teraso</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-vynil" class="content" style="display: none;">
                        <label><b>Bobot Vynil</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>
                    <div id="content-papan-kayu" class="content" style="display: none;">
                        <label><b>Bobot Papan Kayu</b></label><br>
                        <span>Dalam satuan persen (%)</span>
                        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
                    </div>


                    <div class="form-group mb-3" style="margin-top: 20px;">
                        <label><b>Tambah Tipe Lantai Existing</b></label><br>
                        <div id="tipe-lantai-existing-container" style="display: none;">
                            <div class="area-lainnya-container" data-type="tipe-lantai-existing">
                                <div class="area-item d-flex align-items-center mb-2">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="tipe_tipe-lantai-existing[]" class="form-control" required>
                                            <option value="" selected="selected" data-i="0">- Select -</option>
                                            <option value="549105_0">Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1380230_0">Granit Impor - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="447398_0">Karpet - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="414111_0">Keramik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="700836_0">Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="1190000_0">Marmer Impor - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="657355_0">Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="60227_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="536000_0">Parkit Jati - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="564958_0">Teraso - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="455080_0">Vynil - Rumah Tinggal Mewah 2 Lantai</option>
                                            <option value="434503_0">Granit/Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="267057_0">Karpet - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="276046_0">Keramik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="536632_0">Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="896002_0">Marmer Impor - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="542161_0">Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="53245_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="423011_0">Parkit Jati - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="481344_0">Teraso - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="351650_0">Vynil - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="115239_0">Papan Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="260164_0">Granit/Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="173280_0">Karpet - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="176287_0">Keramik - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="66156_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="21388_0">Teraso - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="229269_0">Vynil - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="102937_0">Papan Kayu - Rumah Tinggal Menengah 2 Lantai</option>
                                            <option value="150353_0">Keramik - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="43454_0">Rabat Beton (Semen Ekspose) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="79155_0">Papan Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                            <option value="209294_0">Plat Lantai Beton T = 8 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="244126_0">Plat Lantai Beton T = 10 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="278957_0">Plat Lantai Beton T = 12 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="346178_0">Plat Lantai Beton T = 15 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="401420_0">Plat Lantai Beton T = 18 cm - Bangunan Gudang 1 Lantai</option>
                                            <option value="411260_0">Granit/Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="247679_0">Karpet - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="256461_0">Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="511030_0">Marmer Lokal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="59522_0">Rabat Beton (Semen Ekspose) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="400032_0">Parkit Jati - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                            <option value="330320_0">Vynil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="number" name="bobot_tipe-lantai-existing[]" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="tipe-lantai-existing">Tambah Tipe Rangka Atap Existing</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-lantai-existing-btn">Tambah Tipe Rangka Atap Existing</button>
                    </div>


                </div>

                <script>
                    document.querySelectorAll('.form-check-input').forEach(checkbox => {
                        checkbox.addEventListener('change', () => {
                            const contentId = `content-${checkbox.id}`;
                            const contentElement = document.getElementById(contentId);
                            if (contentElement) {
                                contentElement.style.display = checkbox.checked ? 'block' : 'none';
                            }
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        // Fungsi untuk membuat item area baru
                        function createAreaItem(type) {
                            const areaItem = document.createElement('div');
                            areaItem.classList.add('area-item', 'd-flex', 'align-items-center', 'mb-2');
                            let nameNama, nameLuas, nameTipe, nameBobot;

                            // Logika khusus untuk tipe pondasi
                            if (type === 'pondasi') {
                                nameTipe = 'tipe_pondasi[]';
                                nameBobot = 'bobot_pondasi[]';

                                areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Tipe Material</label>
            <select name="${nameTipe}" class="form-control" required>
                <option value="">- Select -</option>
                <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Mewah 2 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai">Tapak Beton dan Batu Kali - Rumah Tinggal Menengah 2 Lantai</option>
                <option value="Batu Kali - Rumah Tinggal Menengah 2 Lantai">Batu Kali - Rumah Tinggal Menengah 2 Lantai</option>
                <option value="Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Rollag Bata - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai">Tapak Beton dan Batu Kali - Bangunan Gudang 1 Lantai</option>
                <option value="Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Tapak Beton dan Batu Kali - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)</option>
            </select>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Bobot (%)</label>
            <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
        </div>
        <div class="area-controls">
            <div class="row">
                <button type="button" class="add-area-btn">+</button>
                <button type="button" class="remove-area-btn">-</button>
            </div>
        </div>
    `;
                                return areaItem;
                            }
                            if (type === 'struktur') {
                                nameTipe = 'tipe_struktur[]';
                                nameBobot = 'bobot_struktur[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="Beton Bertulang - Rumah Tinggal Mewah 2 Lantai">Beton Bertulang - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Beton Bertulang - Rumah Tinggal Menengah 2 Lantai">Beton Bertulang - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Beton Bertulang - Rumah Tinggal Menengah 2 Lantai">Beton Bertulang - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="Baja Profil - Bangunan Gudang 1 Lantai">Baja Profil - Bangunan Gudang 1 Lantai</option>
            <option value="Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Beton Bertulang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }

                            if (type === 'rangka-atap') {
                                nameTipe = 'tipe_rangka_atap[]';
                                nameBobot = 'bobot_rangka_atap[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai">Dak Beton (Jika Pakai Balok) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai">Kayu (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai">Baja Ringan (Atap Genteng) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai">Baja Ringan (Atap Asbes, Seng dll) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="Profil Baja - Bangunan Gudang 1 Lantai">Profil Baja - Bangunan Gudang 1 Lantai</option>
            <option value="Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Kayu (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Kayu (Atap Asbes, Seng dll, Tanpa Reng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Baja Ringan (Atap Genteng) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (< 5 Lantai)">Baja Ringan (Atap Asbes, Seng dll) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'penutup-atap-existing') {
                                nameTipe = 'tipe_penutup-atap-existing[]';
                                nameBobot = 'bobot_penutup-atap-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="307588_0.5028">Dak Beton - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="235683_0.5028">Fibreglass - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="239427_0.5028">Genteng Keramik Glazur - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="165717_0.5028">Genteng Tanah Liat - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="216861_0.5028">Genteng Beton - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="219751_0.5028">Genteng Metal - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="207566_0.5028">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="403405_0.5028">Tegola - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="276586_0.5028">Sirap - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="148318_0.5028">Spandek - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="262711_0.5028">PVC - Rumah Tinggal Mewah 2 Lantai</option>
                            <option value="72551_0.5569">Asbes - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="235656_0.5569">Dak Beton - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="142642_0.5569">Fibreglass - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="160060_0.5569">Genteng Keramik Glazur - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="106213_0.5569">Genteng Tanah Liat - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="151664_0.5569">Genteng Beton - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="146988_0.5569">Genteng Metal - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="129846_0.5569">Bitumen (Ondulin/ Onduvilla) - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="332904_0.5569">Tegola - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="78978_0.5569">Seng Gelombang - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="243334_0.5569">Sirap - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="75361_0.5569">Spandek - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="172827_0.5569">PVC - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="117667_1">Asbes - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="304700_1">Dak Beton - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="234491_1">Fibreglass - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="156035_1">Genteng Tanah Liat - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="200470_1">Genteng Beton - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="202741_1">Genteng Metal - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="130168_1">Seng Gelombang - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="124692_1">Spandek - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="205773_1">PVC - Rumah Tinggal Menengah 2 Lantai</option>
                            <option value="118887_1">Asbes - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                            <option value="124275_1">Seng Gelombang - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                            <option value="91072_1">Asbes - Bangunan Gudang 1 Lantai</option>
                            <option value="100790_1">Seng Gelombang - Bangunan Gudang 1 Lantai</option>
                            <option value="95320_1">Spandek - Bangunan Gudang 1 Lantai</option>
                            <option value="0.4001_0.335">Asbes - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="191376_0.335">Dak Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4003_0.335">Fibreglass - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4004_0.335">Genteng Keramik Glazur - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4005_0.335">Genteng Tanah Liat - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4006_0.335">Genteng Beton - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="4007_0.335">Genteng Metal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4008_0.335">Bitumen (Ondulin/ Onduvilla) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.401_0.335">Tegola - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4011_0.335">Seng Gelombang - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4012_0.335">Sirap - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4013_0.335">Spandek - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
                            <option value="0.4014_0.335">PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }

                            if (type === 'tipe-dinding-existing') {
                                nameTipe = 'tipe_tipe-dinding-existing[]';
                                nameBobot = 'bobot_tipe-dinding-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="273324_1.875">Bata Merah - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="274359_1.875">Bata Ringan - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="318811_1.875">Partisi Gypsumboard 2 Muka - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="725693_1.875">Rooster Bata - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="194325_2.143">Batako - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="244702_2.143">Bata Merah - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="252700_2.143">Bata Ringan - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="289328_2.143">Partisi Gypsumboard 2 Muka - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="703318_2.143">Rooster Bata - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="153906_2.169">Batako - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="190474_2.169">Bata Merah - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="207182_2.169">Bata Ringan - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="260248_2.169">Partisi Gypsumboard 2 Muka - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="605463_2.169">Rooster Bata - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="336877_1.481">Papan dan Partisi Triplek Dicat - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="113213_1.249">Batako - Bangunan Gudang 1 Lantai</option>
            <option value="142562_1.249">Bata Merah - Bangunan Gudang 1 Lantai</option>
            <option value="147222_1.249">Bata Ringan - Bangunan Gudang 1 Lantai</option>
            <option value="226702_1.249">Dinding Spandek Rangka Baja - Bangunan Gudang 1 Lantai</option>
            <option value="142987_1.577">Batako - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="180055_1.577">Bata Merah - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="185940_1.577">Bata Ringan - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="212891_1.577">Partisi Gypsumboard 2 Muka - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-pelapis-dinding-existing') {
                                nameTipe = 'tipe_tipe-pelapis-dinding-existing[]';
                                nameBobot = 'bobot_tipe-pelapis-dinding-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="575506_1.875">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1591557_1.875">Dilapis Keramik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2636423_1.875">Dilapis Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="4425515_1.875">Dilapis Marmer Import - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2283657_1.875">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="957120_1.875">Dilapis Wallpaper - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="2480497_1.875">Dilapis Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1154122_1.875">Dilapis Batu Alam - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="474683_2.143">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1235903_2.143">Dilapis Keramik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="2300582_2.143">Dilapis Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="3777227_2.143">Dilapis Marmer Import - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1873120_2.143">Dilapis Granit/ Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="881996_2.143">Dilapis Wallpaper - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="2312115_2.143">Dilapis Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1070661_2.143">Dilapis Batu Alam - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="332768_2.169">Dilapis Cat (Diplester dan Diaci) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="782252_2.169">Dilapis Keramik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="642040_2.169">Dilapis Wallpaper - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="1828812_2.169">Dilapis Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="856559_2.169">Dilapis Batu Alam - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="194807_1.249">Dilapis Cat (Diplester dan Diaci) - Bangunan Gudang 1 Lantai</option>
            <option value="345190_1.577">Dilapis Cat (Diplester dan Diaci) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="909393_1.577">Dilapis Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="1378265_1.577">Dilapis Granit/ Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="1701283_1.577">Dilapis Wallpaper - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="2425106_1.577">Dilapis Aluminium Composite Panel - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-lantai-existing') {
                                nameTipe = 'tipe_tipe-lantai-existing[]';
                                nameBobot = 'bobot_tipe-lantai-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="549105_0">Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1380230_0">Granit Impor - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="447398_0">Karpet - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="414111_0">Keramik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="700836_0">Marmer Lokal - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="1190000_0">Marmer Impor - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="657355_0">Mozaik - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="60227_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="536000_0">Parkit Jati - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="564958_0">Teraso - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="455080_0">Vynil - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="434503_0">Granit/Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="267057_0">Karpet - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="276046_0">Keramik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="536632_0">Marmer Lokal - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="896002_0">Marmer Impor - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="542161_0">Mozaik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="53245_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="423011_0">Parkit Jati - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="481344_0">Teraso - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="351650_0">Vynil - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="115239_0">Papan Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="260164_0">Granit/Homogenous Tile - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="173280_0">Karpet - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="176287_0">Keramik - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="66156_0">Rabat Beton (Semen Ekspose) - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="21388_0">Teraso - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="229269_0">Vynil - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="102937_0">Papan Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="150353_0">Keramik - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="43454_0">Rabat Beton (Semen Ekspose) - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="79155_0">Papan Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="209294_0">Plat Lantai Beton T = 8 cm - Bangunan Gudang 1 Lantai</option>
            <option value="244126_0">Plat Lantai Beton T = 10 cm - Bangunan Gudang 1 Lantai</option>
            <option value="278957_0">Plat Lantai Beton T = 12 cm - Bangunan Gudang 1 Lantai</option>
            <option value="346178_0">Plat Lantai Beton T = 15 cm - Bangunan Gudang 1 Lantai</option>
            <option value="401420_0">Plat Lantai Beton T = 18 cm - Bangunan Gudang 1 Lantai</option>
            <option value="411260_0">Granit/Homogenous Tile - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="247679_0">Karpet - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="256461_0">Keramik - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="511030_0">Marmer Lokal - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="59522_0">Rabat Beton (Semen Ekspose) - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="400032_0">Parkit Jati - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="330320_0">Vynil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }
                            if (type === 'tipe-pintu-jendela-existing') {
                                nameTipe = 'tipe_tipe-pintu-jendela-existing[]';
                                nameBobot = 'bobot_tipe-pintu-jendela-existing[]';

                                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            <option value="633004_0.145">Pintu Kayu Panil - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="430675_0.145">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="304254_0.145">Pintu Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="503211_0.145">Jendela Kaca Rk Kayu - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="274348_0.145">Jendela Kaca Rk Aluminium - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="370564_0.145">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="141199_0.145">Pintu KM UPVC/PVC - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="507018_0.145">Pintu Garasi Kayu - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="372489_0.145">Pintu Garasi Besi - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="209200_0.145">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="174637_0.145">Jendela Kaca Tempered Frameless - Rumah Tinggal Mewah 2 Lantai</option>
            <option value="319349_0.218">Pintu Kayu Panil - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="257430_0.218">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="308462_0.218">Pintu Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="313184_0.218">Jendela Kaca Rk Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="312153_0.218">Jendela Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="235813_0.218">Pintu Kaca Tempered Floor Hinge - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="130356_0.218">Pintu KM UPVC/PVC - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="251196_0.218">Pintu Garasi Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="290195_0.218">Pintu Garasi Besi - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="152079_0.218">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="130977_0.218">Jendela Kaca Tempered Frameless - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="305534_0.327">Pintu Kayu Panil - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="236730_0.327">Pintu Kayu Dobel Triplek/ HPL - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="311178_0.327">Pintu Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="265053_0.327">Jendela Kaca Rk Kayu - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="316582_0.327">Jendela Kaca Rk Aluminium - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="65494_0.327">Pintu KM UPVC/PVC - Rumah Tinggal Menengah 2 Lantai</option>
            <option value="71764_0.276">Jendela Kaca Rk Kayu - Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
            <option value="74470_0.057">Pintu Besi - Bangunan Gudang 1 Lantai</option>
            <option value="191060_0.126">Pintu Kayu Panil - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="149554_0.126">Pintu Kayu Dobel Triplek/ HPL - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="179201_0.126">Pintu Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="189366_0.126">Jendela Kaca Rk Kayu - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="191731_0.126">Jendela Kaca Rk Aluminium - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="50598_0.126">Folding Gate - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="75730_0.126">Pintu KM UPVC/PVC - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="135493_0.126">Jendela Kaca Stopsol 8 mm Rangka Curtain Wall - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
            <option value="42010_0.126">Rolling Door - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt; 5 Lantai)</option>
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                                return areaItem;
                            }

                            // Logika umum untuk tipe lainnya
                            if (type === 'pintu-jendela') {
                                nameNama = 'nama_pintu_jendela[]';
                                nameLuas = 'luas_pintu_jendela[]';
                            } else if (type === 'dinding') {
                                nameNama = 'nama_dinding[]';
                                nameLuas = 'luas_dinding[]';
                            } else if (type === 'atap-datar') {
                                nameNama = 'nama_atap_datar[]';
                                nameLuas = 'luas_atap_datar[]';
                            } else if (type === 'atap-datar-2') {
                                nameNama = 'nama_atap_datar_2[]';
                                nameLuas = 'luas_atap_datar_2[]';
                            }

                            areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Nama Area</label>
            <input type="text" name="${nameNama}" class="form-control" placeholder="Nama Area" required>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Luas (m²)</label>
            <input type="number" name="${nameLuas}" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
        </div>
        <div class="area-controls">
            <div class="row">
                <button type="button" class="add-area-btn">+</button>
                <button type="button" class="remove-area-btn">-</button>
            </div>
        </div>
    `;
                            return areaItem;
                        }


                        // Menangani klik pada tombol "Tambah Area"
                        document.querySelectorAll('.add-area-link').forEach(function(button) {
                            button.addEventListener('click', function(e) {
                                e.preventDefault();
                                const type = this.getAttribute('data-type');
                                const areaContainer = document.querySelector(`.area-lainnya-container[data-type="${type}"]`);
                                const newAreaItem = createAreaItem(type);
                                areaContainer.appendChild(newAreaItem);
                            });
                        });

                        // Event delegation untuk tombol add dan remove dalam masing-masing container
                        document.querySelectorAll('.area-lainnya-container').forEach(function(container) {
                            container.addEventListener('click', function(e) {
                                if (e.target.classList.contains('add-area-btn')) {
                                    e.preventDefault();
                                    const type = container.getAttribute('data-type');
                                    const newAreaItem = createAreaItem(type);
                                    container.appendChild(newAreaItem);
                                }

                                if (e.target.classList.contains('remove-area-btn')) {
                                    e.preventDefault();
                                    const areaItem = e.target.closest('.area-item');
                                    if (areaItem) {
                                        // Pastikan setidaknya ada satu area-item
                                        if (container.children.length > 1) {
                                            container.removeChild(areaItem);
                                        } else {
                                            container.removeChild(areaItem);
                                        }
                                    }
                                }
                            });
                        });


                    });

                    function toggleBobotInput(checkbox, targetId) {
                        const bobotInput = document.getElementById(targetId);
                        if (checkbox.checked) {
                            bobotInput.style.display = 'block';
                        } else {
                            bobotInput.style.display = 'none';
                        }
                    }
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const pondasiContainer = document.getElementById('pondasi-container');
                        const showPondasiBtn = document.getElementById('show-pondasi-btn');
                        const addPondasiBtn = document.querySelector('.add-area-link[data-type="pondasi"]');

                        // Awal hanya tombol show yang terlihat
                        addPondasiBtn.style.display = 'none';

                        showPondasiBtn.addEventListener('click', function() {
                            console.log('asd');

                            pondasiContainer.style.display = 'block'; // Tampilkan container
                            showPondasiBtn.remove();
                            addPondasiBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addPondasiBtn.addEventListener('click', function() {
                            // Logika menambahkan area pondasi sudah ditangani di kode lain
                            console.log('Area baru untuk pondasi ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const strukturContainer = document.getElementById('struktur-container');
                        const showStrukturBtn = document.getElementById('show-struktur-btn');
                        const addStrukturBtn = document.querySelector('.add-area-link[data-type="struktur"]');

                        // Awal hanya tombol show yang terlihat
                        addStrukturBtn.style.display = 'none';

                        showStrukturBtn.addEventListener('click', function() {
                            strukturContainer.style.display = 'block'; // Tampilkan container
                            showStrukturBtn.remove(); // Hapus tombol show
                            addStrukturBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addStrukturBtn.addEventListener('click', function() {
                            // Logika untuk menambah area struktur ditangani di kode area lainnya
                            console.log('Area baru untuk struktur ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('rangka-atap-container');
                        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link[data-type="rangka-atap"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link[data-type="penutup-atap-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-dinding-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-dinding-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link[data-type="tipe-dinding-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link[data-type="tipe-pelapis-dinding-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link[data-type="tipe-lantai-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-container');
                        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-btn');
                        const addRangkaAtapBtn = document.querySelector('.add-area-link[data-type="tipe-pintu-jendela-existing"]');

                        // Awal hanya tombol show yang terlihat
                        addRangkaAtapBtn.style.display = 'none';

                        showRangkaAtapBtn.addEventListener('click', function() {
                            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
                            showRangkaAtapBtn.remove(); // Hapus tombol show
                            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
                        });

                        addRangkaAtapBtn.addEventListener('click', function() {
                            console.log('Area baru untuk rangka atap ditambahkan');
                        });
                    });
                </script>
                <!-- Rumah menengah -->
            </div>




            <div class="form-group mb-3">
                <label for="penggunaan_bangunan"><b>Penggunaan Bangunan Saat Ini</b></label>
                <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan" class="form-control" placeholder="Disewakan, Selama berapa tahun">
            </div>

            <div class="form-group mb-3">
                <label><b>Perlengkapan Bangunan</b></label><br>
                <div>
                    <input type="checkbox" id="listrik" name="perlengkapan_bangunan[]" value="listrik">
                    <label for="listrik">Listrik</label>
                </div>
                <div>
                    <input type="checkbox" id="telepon" name="perlengkapan_bangunan[]" value="telepon">
                    <label for="telepon">Telepon</label>
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
                <label for="penggunaan_bangunan"><b>Penggunaan Bangunan</b></label>
                <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan" class="form-control" placeholder="Rumah Tinggal">
            </div>
            <div class="form-group mb-3">
                <label for="progres_pembangunan"><b>Progres Pembangunan jika aset dalam proses (dalam persen)</b></label>
                <input type="number" id="progres_pembangunan" name="progres_pembangunan" class="form-control" placeholder="Masukkan nilai dalam persen" min="0" max="100">
            </div>

            <div class="form-group mb-3">
                <label for="kondisi_bangunan"><b>Kondisi Bangunan</b></label>
                <select id="kondisi_bangunan" name="kondisi_bangunan" class="form-select">
                    <option value="terawat">Terawat</option>
                    <option value="rusak_ringan">Rusak Ringan</option>
                    <option value="rusak_berat">Rusak Berat</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label><b>Status Data Obyek</b></label><br>
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



            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <!-- Script Dinamis untuk Menambah Foto -->
    <script>
        // document.getElementById('tipe_spek').addEventListener('change', function() {
        //     const selectedValue = this.value;
        //     const dynamicContent = document.getElementById('dynamic-content');

        //     // Clear existing content
        //     dynamicContent.innerHTML = '';

        //     if (selectedValue) {
        //         // Fetch content dynamically from the server
        //         fetch(`/load-form/${selectedValue}`)
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error('Form not found');
        //                 }
        //                 return response.text();
        //             })
        //             .then(html => {
        //                 dynamicContent.innerHTML = html;

        //                 // Handle <script> elements
        //                 const scripts = dynamicContent.querySelectorAll('script');

        //                 scripts.forEach(script => {
        //                     const newScript = document.createElement('script');
        //                     if (script.src) {
        //                         // If script has src, load it as an external script
        //                         newScript.src = script.src;
        //                     } else {
        //                         // Inline script content
        //                         newScript.textContent = script.textContent;
        //                     }
        //                     document.body.appendChild(newScript);
        //                     document.body.removeChild(newScript); // Cleanup
        //                 });

        //                 // Handle <style> elements (optional, as styles are usually applied automatically)
        //                 const styles = dynamicContent.querySelectorAll('style');
        //                 styles.forEach(style => {
        //                     const newStyle = document.createElement('style');
        //                     newStyle.textContent = style.textContent;
        //                     document.head.appendChild(newStyle);
        //                 });
        //             })
        //             .catch(error => {
        //                 dynamicContent.innerHTML = `<p class="text-danger">${error.message}</p>`;
        //             });
        //     }
        // });

        document.getElementById('tambah-foto').addEventListener('click', function(e) {
            e.preventDefault();
            const container = document.querySelector('.foto-lainnya-container');
            const newItem = document.createElement('div');
            newItem.classList.add('foto-item');
            newItem.innerHTML = `
            <div style="flex: 1;">
                <label>Judul Foto</label>
                <input type="text" name="judul_foto[]" class="form-control" placeholder="Judul Foto">
            </div>
            &nbsp;&nbsp;
            <div style="flex: 1;">
                <label>Upload Foto</label>
                <input type="file" name="foto_lainnya[]" class="form-control">
            </div>
            <div class="foto-controls">
             <div class="row">
                <button type="button" class="tambah-foto">+</button>
                <button type="button" class="hapus-foto">-</button>
            </div>
            </div>
        `;
            container.appendChild(newItem);
        });

        // Menggunakan event delegation untuk tombol tambah dan hapus
        document.querySelector('.foto-lainnya-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('tambah-foto')) {
                const container = document.querySelector('.foto-lainnya-container');
                const newItem = document.createElement('div');
                newItem.classList.add('foto-item');
                newItem.innerHTML = `
                <div style="flex: 1;">
                    <label>Judul Foto</label>
                    <input type="text" name="judul_foto[]" class="form-control" placeholder="Judul Foto">
                </div>
                &nbsp;&nbsp;
                <div style="flex: 1;">
                    <label>Upload Foto</label>
                    <input type="file" name="foto_lainnya[]" class="form-control">
                </div>
                <div class="foto-controls">
                 <div class="row">
                    <button type="button" class="tambah-foto">+</button>
                    <button type="button" class="hapus-foto">-</button>
                </div>
                </div>
            `;
                container.appendChild(newItem);
            }

            if (e.target.classList.contains('hapus-foto')) {
                e.target.closest('.foto-item').remove();
            }
        });
    </script>




</div>
<!-- /Default Icons Wizard -->
</div>

@endsection