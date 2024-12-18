@php
$configData = Helper::appClasses();
$totalObyekPenilaian = 8401; // Contoh Data
$totalClient = 670; // Contoh Data
$dataPembanding = 28978; // Contoh Data
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<!-- <h4>Home Page</h4>
@if (Helper::getProfileById()->rs_name == 'Super Admin')
<p>{{ Helper::getProfileById()->rs_name }}</p>
@else
<p>{{ Helper::getProfileById()->rs_name }}/{{ Helper::getProfileById()->ra_name }}/{{ Helper::getProfileById()->role_name }}</p>
@endif -->

<div class="row">
    <!-- TOTAL OBJEK PENILAIAN -->
    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="icon mb-2" style="font-size: 24px; color: #000;">
                    <i class="fa fa-trophy"></i>
                </div>
                <h2 style="color: red;">{{ $totalObyekPenilaian }}</h2>
                <p>TOTAL OBJEK PENILAIAN</p>
            </div>
        </div>
    </div>

    <!-- TOTAL CLIENT -->
    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="icon mb-2" style="font-size: 24px; color: #000;">
                    <i class="fa fa-user"></i>
                </div>
                <h2 style="color: red;">{{ $totalClient }}</h2>
                <p>TOTAL CLIENT</p>
            </div>
        </div>
    </div>

    <!-- DATA PEMBANDING -->
    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="icon mb-2" style="font-size: 24px; color: #000;">
                    <i class="fa fa-users"></i>
                </div>
                <h2 style="color: red;">{{ $dataPembanding }}</h2>
                <p>DATA PEMBANDING</p>
            </div>
        </div>
    </div>

    <!-- Form Pencarian -->
    <div class="col-md-12 mt-4">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <!-- Cari Laporan -->
                        <div class="col-md-6 mb-3">
                            <label for="cariLaporan" class="form-label"><strong>Cari Laporan</strong></label>
                            <input type="text" class="form-control" id="cariLaporan" name="cari_laporan" placeholder="Cari...">
                        </div>
                        <!-- Cari Pemberi Tugas -->
                        <div class="col-md-6 mb-3">
                            <label for="cariPemberiTugas" class="form-label"><strong>Cari Pemberi Tugas</strong></label>
                            <input type="text" class="form-control" id="cariPemberiTugas" name="cari_pemberi_tugas" placeholder="Cari...">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Jenis Properti -->
                        <div class="col-md-6 mb-3">
                            <label for="jenisProperti" class="form-label"><strong>Jenis Properti</strong></label>
                            <select class="form-select" id="jenisProperti" name="jenis_properti">
                                <option value="Tanah dan Bangunan">Tanah dan Bangunan</option>
                                <option value="Bangunan Saja">Bangunan Saja</option>
                                <option value="Tanah Saja">Tanah Saja</option>
                            </select>
                        </div>
                        <!-- Tanggal Penilaian -->
                        <div class="col-md-6 mb-3">
                            <label for="tanggalPenilaian" class="form-label"><strong>Tanggal Penilaian</strong></label>
                            <input type="date" class="form-control" id="tanggalPenilaian" name="tanggal_penilaian">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Provinsi -->
                        <div class="col-md-6 mb-3">
                            <label for="provinsi" class="form-label"><strong>Provinsi</strong></label>
                            <select class="form-select" id="provinsi" name="provinsi">
                                <option value="Jambi">Jambi</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Bali">Bali</option>
                            </select>
                        </div>
                        <!-- Kabupaten -->
                        <div class="col-md-6 mb-3">
                            <label for="kabupaten" class="form-label"><strong>Kabupaten</strong></label>
                            <select class="form-select" id="kabupaten" name="kabupaten">
                                <option value="Kab. Merangin">Kab. Merangin</option>
                                <option value="Kab. Batanghari">Kab. Batanghari</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Kode Pos -->
                        <div class="col-md-6 mb-3">
                            <label for="kodePos" class="form-label"><strong>Kode Pos</strong></label>
                            <input type="text" class="form-control" id="kodePos" name="kode_pos" placeholder="Kode Pos">
                        </div>
                    </div>
                    <!-- Tombol Cari -->
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <h4>Progres Laporan Penilaian</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead style="background-color: #162447; ">
                    <tr>
                        <th style="width: 40%; color: #FFFFFF;">Judul Laporan</th>
                        <th style="width: 15%; color: #FFFFFF;">Admin</th>
                        <th style="width: 15%; color: #FFFFFF;">Penilai</th>
                        <th style="width: 15%; color: #FFFFFF;">Reviewer</th>
                        <th style="width: 15%; color: #FFFFFF;">Penilai Publik</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Contoh Baris Data 1 -->
                    <tr>
                        <td style="vertical-align: middle;">
                            PT Bank Central Asia Tbk KCU Rungkut - CV Wujud Unggul - Pergudangan Grand Tambak Sawah B-05, Kelurahan Tambaksawah, Kecamatan Waru, Kabupaten Sidoarjo, Provinsi Jawa Timur, Indonesia
                        </td>
                        <td style="text-align: center; vertical-align: middle;">✔<br>18-Dec-24 11:18</td>
                        <td style="text-align: center; vertical-align: middle;">✖</td>
                        <td style="text-align: center; vertical-align: middle;">✖</td>
                        <td style="text-align: center; vertical-align: middle;">✖</td>
                    </tr>
                    <!-- Contoh Baris Data 2 -->
                    <tr>
                        <td style="vertical-align: middle;">
                            PT Bank Central Asia Tbk KCU Magelang - Setyo Hermawan - Jl. Daendels, Desa Lembupurwo, Kecamatan Mirit, Kabupaten Kebumen, Provinsi Jawa Tengah, Indonesia
                        </td>
                        <td style="text-align: center; vertical-align: middle;">✔<br>18-Dec-24 08:55</td>
                        <td style="text-align: center; vertical-align: middle;">✔<br>18-Dec-24 14:39</td>
                        <td style="text-align: center; vertical-align: middle;">✖</td>
                        <td style="text-align: center; vertical-align: middle;">✖</td>
                    </tr>
                    <!-- Contoh Baris Data 3 -->

                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection