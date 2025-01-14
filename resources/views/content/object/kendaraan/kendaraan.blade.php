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

<div class="row">
    <!-- Default Icons Wizard -->
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="col-12 mb-4">
            @csrf
            <div class="form-group mb-3">
                <label for="nama_bangunan"><b>Nama Bangunan</b> <span class="text-danger">*</span></label>
                <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                    placeholder="Rumah Tinggal Pak Budi Sastro" required>
            </div>
            <!-- Upload Foto Tampak Depan -->
            <div class="form-group mb-3">
                <label for="foto_depan" class="form-label"><b>Foto Tampak Depan</b></label><br>
                <input type="file" id="foto_depan" name="foto_depan">
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



            <!-- New Fields -->
            <div class="form-group mb-3">
                <label for="nomor_stnk"><b>Nomor STNK</b></label>
                <input type="text" id="nomor_stnk" name="nomor_stnk" class="form-control" placeholder="Nomor STNK" required>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_jatuh_tempo_pajak"><b>Tanggal Jatuh Tempo Pajak 5 tahun</b> <span class="text-danger">*</span></label>
                <input type="date" id="tanggal_jatuh_tempo_pajak" name="tanggal_jatuh_tempo_pajak" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="nomor_bpkb"><b>Nomor BPKB</b></label>
                <input type="text" id="nomor_bpkb" name="nomor_bpkb" class="form-control" placeholder="Nomor BPKB" required>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_dikeluarkan_bpkb"><b>Tanggal Dikeluarkan BPKB</b></label>
                <input type="date" id="tanggal_dikeluarkan_bpkb" name="tanggal_dikeluarkan_bpkb" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="bpkb_atas_nama"><b>BPKB Atas Nama</b></label>
                <input type="text" id="bpkb_atas_nama" name="bpkb_atas_nama" class="form-control" placeholder="Nama di BPKB" required>
            </div>

            <div class="form-group mb-3">
                <label for="alamat_di_bpkb"><b>Alamat di BPKB</b></label>
                <textarea id="alamat_di_bpkb" name="alamat_di_bpkb" class="form-control" placeholder="Alamat di BPKB" required></textarea>
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

    <!-- /Default Icons Wizard -->
</div>

@endsection