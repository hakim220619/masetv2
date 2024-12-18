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
    <div class="col-12 mb-4">
        <form action="" method="POST" enctype="multipart/form-data">
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
                <a href="#" id="tambah-foto" class="btn btn-link">Tambah Foto</a>
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
                    <option value="perkebunan_semi">Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                    <option value="gudang_1lantai">Bangunan Gudang 1 Lantai</option>
                    <option value="gedung_rendah">Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5 Lantai)</option>
                    <option value="gedung_sedang">Bangunan Gedung Bertingkat Sedang 8 Lantai + 1 Basement (5-8 Lantai)</option>
                    <option value="gedung_tinggi">Bangunan Gedung Bertingkat Tinggi 16 Lantai + 2 Basement (&gt;8 Lantai)</option>
                    <option value="mall">Bangunan Mall 4 Lantai + 1 Basement</option>
                    <option value="hotel">Bangunan Hotel 8 Lantai</option>
                    <option value="apartemen">Bangunan Apartemen 14 Lantai + 2 Semi Basement</option>
                </select>
            </div>
            <div id="form-tambahan-container">
                @include('content.form.form_rumah_sederhana')
            </div>
            @include('content.form.LuasBangunanFisik')
            <div class="form-group mb-3">
                <label for="penggunaan_bangunan"><b>Penggunaan Bangunan Saat Ini</b></label>
                <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan" class="form-control" placeholder="Disewakan, Selama berapa tahun">
            </div>

            <!-- Perlengkapan Bangunan -->
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
            <!-- Progres Pembangunan -->
            <div class="form-group mb-3">
                <label for="progres_pembangunan"><b>Progres Pembangunan jika aset dalam proses (dalam persen)</b></label>
                <input type="number" id="progres_pembangunan" name="progres_pembangunan" class="form-control" placeholder="Masukkan nilai dalam persen" min="0" max="100">
            </div>

            <!-- Kondisi Bangunan -->
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
        <!-- Skrip untuk menangani perubahan pada dropdown -->
        <script>
            document.getElementById('tipe_spek').addEventListener('change', function() {
                const selectedValue = this.value;
                const formRumahSederhana = document.getElementById('form-rumah-sederhana');

                if (selectedValue === 'rumah_sederhana') {
                    formRumahSederhana.style.display = 'block';
                    // Tambahkan logika lain jika diperlukan
                } else {
                    formRumahSederhana.style.display = 'none';
                    // Reset nilai input jika diperlukan
                    const inputs = formRumahSederhana.querySelectorAll('input');
                    inputs.forEach(input => input.value = '');
                }
            });
        </script>

    </div>
    <!-- /Default Icons Wizard -->
</div>

@endsection