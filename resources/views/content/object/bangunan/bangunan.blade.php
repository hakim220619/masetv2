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
    <h4>Object - Tanah dan Bangunan</h4>
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
                                    <use xlink:href="{{ asset('assets/svg/icons/form-wizard-account.svg#wizardAccount') }}">
                                    </use>
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
                                    <use
                                        xlink:href="{{ asset('assets/svg/icons/form-wizard-personal.svg#wizardPersonal') }}">
                                    </use>
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
                                    <use xlink:href="{{ asset('assets/svg/icons/form-wizard-address.svg#wizardAddress') }}">
                                    </use>
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
                                    <use
                                        xlink:href="{{ asset('assets/svg/icons/form-wizard-social-link.svg#wizardSocialLink') }}">
                                    </use>
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
                                    <use xlink:href="{{ asset('assets/svg/icons/form-wizard-submit.svg#wizardSubmit') }}">
                                    </use>
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Review & Submit</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form method="POST" action="{{ route('add_bangunan') }}" enctype="multipart/form-data">
                        <!-- Account Details -->
                        @csrf
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Step 1</h6>
                                <small>Enter Step 1.</small>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="nia">Nomor Induk Asset</label>
                                    <input type="text" id="nia" name="nia" class="form-control"
                                        placeholder="A-2022-001" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="nib">Nomor Induk Bangunan</label>
                                    <input type="text" id="nib" name="nib" class="form-control"
                                        placeholder="B-2022-001" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="nama_bangunan">Nama Bangunan</label>
                                    <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                                        placeholder="Bangunan Rumah Tinggal –  PT LPP Agro Nusantara i – Jalan Cendrawasih" />
                                </div>
                                <div>
                                    <label class="form-label" for="alamat">Titik Point</label>
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control"
                                        placeholder="jl sukasari kecamatan baleendah bandung" />
                                    <input type="text" id="lat" name="lat" class="form-control"
                                        placeholder="-8.9897878" hidden />
                                    <input type="text" id="long" name="long" class="form-control"
                                        placeholder="89.8477748" hidden />
                                    <div id="map" style="height: 400px; width: 100%;"></div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="foto_tampak_depan">Upload Foto Tampak Depan</label>
                                    <input type="file" id="foto_tampak_depan" name="foto_tampak_depan"
                                        class="form-control" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="foto_tampak_sisi_kiri">Upload Foto Tampak Sisi
                                        Kiri</label>
                                    <input type="file" id="foto_tampak_sisi_kiri" name="foto_tampak_sisi_kiri"
                                        class="form-control" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="foto_tampak_sisi_kanan">Upload Foto Tampak Sisi
                                        Kanan</label>
                                    <input type="file" id="foto_tampak_sisi_kanan" name="foto_tampak_sisi_kanan"
                                        class="form-control" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="foto_lainnya">Foto Lainnya (tabel)</label>
                                    <input type="file" id="foto_lainnya" name="foto_lainnya" class="form-control" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="jumlah_lantai">Jumlah Lantai</label>
                                    <input type="text" id="jumlah_lantai" name="jumlah_lantai" class="form-control"
                                        placeholder="2 lantai" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="kontruksi_bangunan">Konstruksi Bangunan</label>
                                    <input type="text" id="kontruksi_bangunan" name="kontruksi_bangunan"
                                        class="form-control" placeholder="Permanen" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="kontruksi_lantai">Konstruksi Lantai</label>
                                    <input type="text" id="kontruksi_lantai" name="kontruksi_lantai"
                                        class="form-control" placeholder="Rabat Beton" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="kontruksi_dinding">Konstruksi Dinding</label>
                                    <input type="text" id="kontruksi_dinding" name="kontruksi_dinding"
                                        class="form-control" placeholder="Bata" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="kontruksi_atap">Kontruksi Atap</label>
                                    <input type="text" id="kontruksi_atap" name="kontruksi_atap" class="form-control"
                                        placeholder="Galvium" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="kontruksi_pondasi">Kontruksi Pondasi</label>
                                    <input type="text" id="kontruksi_pondasi" name="kontruksi_pondasi"
                                        class="form-control" placeholder="Beton Bertulang" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="versi_btb">Versi BTB</label>
                                    <input type="number" id="versi_btb" name="versi_btb" class="form-control"
                                        placeholder="2023" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tbssb_mappi">Tipikal Bangunan Sesuai Spek BTB
                                        MAPPI</label>
                                    <input type="text" id="tbssb_mappi" name="tbssb_mappi" class="form-control"
                                        placeholder="Rumah Tinggal Sederhana" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="jenis_bangunan_uk">Jenis Bangunan (Umur
                                        Ekonomis)</label>
                                    <input type="text" id="jenis_bangunan_uk" name="jenis_bangunan_uk"
                                        class="form-control" placeholder="Bangunan Rumah Tinggal" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tipe_rumah_tinggal">Tipe Rumah Tinggal (Umur
                                        Ekonomis)</label>
                                    <input type="text" id="tipe_rumah_tinggal" name="tipe_rumah_tinggal"
                                        class="form-control" placeholder="Bangunan Kelas Menengah" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="jenis_bangunan_il">Jenis Bangunan (Indeks
                                        lantai)</label>
                                    <input type="text" id="jenis_bangunan_il" name="jenis_bangunan_il"
                                        class="form-control" placeholder="Rumah Tinggal Sederhana" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tahun_dibangun">Tahun Dibangun</label>
                                    <input type="number" id="tahun_dibangun" name="tahun_dibangun" class="form-control"
                                        placeholder="2022" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tahun_renovasi">Tahun Renovasi</label>
                                    <input type="number" id="tahun_renovasi" name="tahun_renovasi" class="form-control"
                                        placeholder="2023" />
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="sumber_info_thn_dibangun">Sumber Informasi Tahun
                                            Dibangun</label>
                                    </div>
                                    <select class="form-select" name="sumber_info_thn_dibangun"
                                        id="sumber_info_thn_dibangun" aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="Keterangan pendamping lokasi / pemilik">Keterangan pendamping lokasi
                                            / pemilik</option>
                                        <option value="IMB">IMB</option>
                                        <option value="Pengamatan visual">Pengamatan visual</option>
                                        <option value="Keterangan lingkungan">Keterangan lingkungan</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="kondisi_bangunan_scr_visual">Kondisi Bangunan Secara
                                        Visual</label>
                                    <input type="text" id="kondisi_bangunan_scr_visual"
                                        name="kondisi_bangunan_scr_visual" class="form-control" placeholder="Baik" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="catatan_khusus_bangunan">Catatan Khusus
                                        Bangunan</label>
                                    <input type="text" id="catatan_khusus_bangunan" name="catatan_khusus_bangunan"
                                        class="form-control" placeholder="Plafon rusak" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Luas Bangunan Fisik</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lbf_no_or_nama_lantai">Nomor/Nama Lantai (Area)</label>
                                    <input type="text" id="lbf_no_or_nama_lantai" name="lbf_no_or_nama_lantai"
                                        class="form-control" placeholder="Bangunan Rumah Tinggal 1" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lbf_faktor_pengali_luas">Faktor Pengali Luas</label>
                                    <input type="number" id="lbf_faktor_pengali_luas" name="lbf_faktor_pengali_luas"
                                        class="form-control" placeholder="1" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lbf_luas_lantai">Luas Lantai (m2)</label>
                                    <input type="number" id="lbf_luas_lantai" name="lbf_luas_lantai"
                                        class="form-control" placeholder="323" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="luas_bangunan_menurut_imb">Luas Bangunan Menurut
                                        IMB</label>
                                    <input type="number" id="luas_bangunan_menurut_imb" name="luas_bangunan_menurut_imb"
                                        class="form-control" placeholder="333" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Luas Pintu dan Jendela</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lpj_nama_area">Nama Area</label>
                                    <input type="text" id="lpj_nama_area" name="lpj_nama_area" class="form-control"
                                        placeholder="Pintu Kayu" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lpj_luas">Luas (m2)</label>
                                    <input type="number" id="lpj_luas" name="lpj_luas" class="form-control"
                                        placeholder="44" />
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <button class="btn btn-label-secondary btn-prev" disabled type="button"> <i
                                            class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next" type="button"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
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
                                <div>
                                    <h5>Luas Dinding</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ld_nama_area">Nama Area</label>
                                    <input type="text" id="ld_nama_area" name="ld_nama_area" class="form-control"
                                        placeholder="Luas Dinding Pasang Bata" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ld_luas">Luas (m2)</label>
                                    <input type="number" id="ld_luas" name="ld_luas" class="form-control"
                                        placeholder="44" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Luas Rangka Atap Datar</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lrad_nama_area">Nama Area</label>
                                    <input type="text" id="lrad_nama_area" name="lrad_nama_area" class="form-control"
                                        placeholder="Luas Rangka Atap Datar" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lrad_luas">Luas (m2)</label>
                                    <input type="number" id="lrad_luas" name="lrad_luas" class="form-control"
                                        placeholder="44" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Luas Atap Datar</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lad_nama_area">Nama Area</label>
                                    <input type="text" id="lad_nama_area" name="lad_nama_area" class="form-control"
                                        placeholder="Luas Atap Datar" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="lad_luas">Luas (m2)</label>
                                    <input type="number" id="lad_luas" name="lad_luas" class="form-control"
                                        placeholder="44" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Tipe Pondasi Eksisting</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tpe_batu_kali">Batu Kali</label>
                                    <input type="text" id="tpe_batu_kali" name="tpe_batu_kali" class="form-control"
                                        placeholder="Tipe Pondasi Eksisting - Rumah Tinggal Menengah 2 Lantai" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tpe_bobot_pondasi">Bobot Pondasi Batu Kali (%)</label>
                                    <input type="number" id="tpe_bobot_pondasi" name="tpe_bobot_pondasi"
                                        class="form-control" placeholder="44" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Tambah Tipe Pondasi Eksisting</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttpe_tipe_material">Tipe Material</label>
                                    <input type="text" id="ttpe_tipe_material" name="ttpe_tipe_material"
                                        class="form-control" placeholder="Batu Kali" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttpe_bobot">Bobot(%)</label>
                                    <input type="number" id="ttpe_bobot" name="ttpe_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Tipe Struktur Eksisting</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tse_beton_bertulang">Beton Bertulang</label>
                                    <input type="text" id="tse_beton_bertulang" name="tse_beton_bertulang"
                                        class="form-control" placeholder="Bobot Struktur Beton Bertulang" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tse_bobot_struktur_beton_bertulng">Bobot Struktur Beton
                                        Bertulang(%)</label>
                                    <input type="number" id="tse_bobot_struktur_beton_bertulng"
                                        name="tse_bobot_struktur_beton_bertulng" class="form-control" placeholder="73" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Tambah Tipe Struktur Eksisting</h5>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttse_tipe_material">Tipe Material</label>
                                    <input type="text" id="ttse_tipe_material" name="ttse_tipe_material"
                                        class="form-control" placeholder="Baja Profil" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttse_bobot">Bobot(%)</label>
                                    <input type="number" id="ttse_bobot" name="ttse_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="tipe_rangka_atap_eksisting">Tipe Rangka Atap
                                            Eksisting</label>
                                    </div>
                                    <select class="select2 form-select" name="tipe_rangka_atap_eksisting"
                                        id="tipe_rangka_atap_eksisting" multiple>
                                        <option value="Dak Beton (Jika Pakai Balok)">Dak Beton (Jika Pakai Balok)</option>
                                        <option value="Kayu (Atap Genteng)">Kayu (Atap Genteng)</option>
                                        <option value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)">Kayu (Atap Asbes, Seng dll,
                                            Tanpa Reng)</option>
                                        <option value="Baja Ringan (Atap Genteng)">Baja Ringan (Atap Genteng)</option>
                                        <option value="Baja Ringan (Atap Asbes, Seng dll)">Baja Ringan (Atap Asbes, Seng
                                            dll)</option>
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
                                    <select class="form-select" name="ttrae_tipe_material" id="ttrae_tipe_material"
                                        aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttrae_bobot">Bobot(%)</label>
                                    <input type="number" id="ttrae_bobot" name="ttrae_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="tipe_penutup_atap_eksisting">Tipe Penutup Atap
                                            Eksisting</label>
                                    </div>
                                    <select class="form-select" name="tipe_penutup_atap_eksisting"
                                        id="tipe_penutup_atap_eksisting">
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
                                <div class="col-12 d-flex justify-content-between">
                                    <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                            class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next" type="button"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
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
                                    <label class="form-label" for="bobot_penutup_atap">Bobot Penutup Atap(%)</label>
                                    <input type="number" class="form-control" id="bobot_penutup_atap"
                                        name="bobot_penutup_atap" placeholder="73">
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="tipe_plafon_eksisting">Tipe Plafon
                                            Eksisting</label>
                                    </div>
                                    <select class="form-select" name="tipe_plafon_eksisting" id="tipe_plafon_eksisting"
                                        aria-label="Default select example">
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
                                    <select class="form-select" name="tampe_tipe_material" id="tampe_tipe_material"
                                        aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="tampe_bobot">Bobot(%)</label>
                                    <input type="number" id="tampe_bobot" name="tampe_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="tipe_dinding_eksisting">Tipe Dinding
                                            Existing</label>
                                    </div>
                                    <select class="form-select" name="tipe_dinding_eksisting" id="tipe_dinding_eksisting"
                                        aria-label="Default select example">
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
                                    <input type="number" id="tde_bobot" name="tde_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Tambah Tipe Dinding Existing</h5>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="ttde_tipe_material">Tipe Material</label>
                                    </div>
                                    <select class="form-select" name="ttde_tipe_material" id="ttde_tipe_material"
                                        aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttde_bobot">Bobot(%)</label>
                                    <input type="number" id="ttde_bobot" name="ttde_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="tipe_pelapis_dinding_eksisting">Tipe Pelapis
                                            Dinding Eksisting</label>
                                    </div>
                                    <select class="form-select" name="tipe_pelapis_dinding_eksisting"
                                        id="tipe_pelapis_dinding_eksisting" aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="Dilapis Cat (Diplester dan Diaci)">Dilapis Cat (Diplester dan Diaci)
                                        </option>
                                        <option value="Dilapis Keramik">Dilapis Keramik</option>
                                        <option value="Dilapis Wallpaper">Dilapis Wallpaper</option>
                                        <option value="Dilapis Mozaik">Dilapis Mozaik</option>
                                        <option value="Dilapis Batu Alam">Dilapis Batu Alam</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttde_bobot_pdc">Bobot Pelapis Dinding Cat (Diplester
                                        dan Diaci)</label>
                                    <input type="number" id="ttde_bobot_pdc" name="ttde_bobot_pdc" class="form-control"
                                        placeholder="73" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Tambah Tipe Pelapis Dinding Existing</h5>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="ttpde_tipe_material">Tipe Material</label>
                                    </div>
                                    <select class="form-select" name="ttpde_tipe_material" id="ttpde_tipe_material"
                                        aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttpde_bobot">Bobot(%)</label>
                                    <input type="number" id="ttpde_bobot" name="ttpde_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Tipe Pintu & Jendela Eksisting</h5>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="tipe_pintu_n_jendela_eksisting">Tipe Pintu &
                                            Jendela Eksisting</label>
                                    </div>
                                    <select class="form-select" name="tipe_pintu_n_jendela_eksisting"
                                        id="tipe_pintu_n_jendela_eksisting" aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="Pintu Kayu Panil">Pintu Kayu Panil</option>
                                        <option value="Pintu Kayu Dobel Triplek/ HPL">Pintu Kayu Dobel Triplek/ HPL
                                        </option>
                                        <option value="Pintu Kaca Rk Aluminium">Pintu Kaca Rk Aluminium</option>
                                        <option value="Jendela Kaca Rk Kayu">Jendela Kaca Rk Kayu</option>
                                        <option value="Jendela Kaca Rk Aluminium">Jendela Kaca Rk Aluminium</option>
                                        <option value="Pintu KM UPVC/PVC">Pintu KM UPVC/PVC</option>
                                    </select>
                                </div>

                                <div class="col-12 d-flex justify-content-between">
                                    <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                            class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next" type="button"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
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
                                <hr>
                                <div>
                                    <h5>Tambah Tipe Pintu & Jendela Existing</h5>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="ttpdje_tipe_material">Tipe Material</label>
                                    </div>
                                    <select class="form-select" name="ttpdje_tipe_material" id="ttpdje_tipe_material"
                                        aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttpdje_bobot">Bobot(%)</label>
                                    <input type="number" id="ttpdje_bobot" name="ttpdje_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="tipe_lantai_eksisting">Tipe Lantai
                                            Eksisting</label>
                                    </div>
                                    <select class="form-select" name="tipe_lantai_eksisting" id="tipe_lantai_eksisting"
                                        aria-label="Default select example">
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
                                    <input type="number" id="tle_bobot_lantai" name="tle_bobot_lantai"
                                        class="form-control" placeholder="73" />
                                </div>
                                <hr>
                                <div>
                                    <h5>Tambah Tipe Lantai Existing</h5>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="ttle_tipe_material">Tipe Material</label>
                                    </div>
                                    <select class="form-select" name="ttle_tipe_material" id="ttle_tipe_material"
                                        aria-label="Default select example">
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ttle_bobot">Bobot(%)</label>
                                    <input type="number" id="ttle_bobot" name="ttle_bobot" class="form-control"
                                        placeholder="73" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="penggunaan_bangunan_saat_ini">Penggunaan Bangunan Saat
                                        Ini</label>
                                    <input type="text" id="penggunaan_bangunan_saat_ini"
                                        name="penggunaan_bangunan_saat_ini" class="form-control"
                                        placeholder="Disewakan" />
                                </div>
                                <div>
                                    <h5>Perlengkapan Bangunan</h5>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label class="form-label" for="perlengkapan_bangunan">Perlengkapan
                                            Bangunan</label>
                                    </div>
                                    <select class="form-select" name="perlengkapan_bangunan" id="perlengkapan_bangunan"
                                        aria-label="Default select example">
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
                                    <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan"
                                        class="form-control" placeholder="Rumah Tinggal" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="progress_pembangunan">Progres Pembangunan jika aset
                                        dalam proses (dalam persen)</label>
                                    <input type="number" id="progress_pembangunan" name="progress_pembangunan"
                                        class="form-control" placeholder="73" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="status_data_obyek">Status Data Obyek</label>
                                    <select name="status_data_obyek" id="status_data_obyek" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="draft">Draft</option>
                                        <option value="publish">Publish</option>
                                    </select>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                            class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" onclick="getSelectedValues()" class="btn btn-primary btn-next"
                                        id="btn-review"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Review -->
                        <div id="review-submit" class="content">

                            <p class="fw-medium mb-2">Step 1</p>
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-weight: 800">Nomor Induk Asset</td>
                                    <td>:</td>
                                    <td><span id="review-nia"></span></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: 800">Nomor Induk Bangunan</td>
                                    <td>:</td>
                                    <td><span id="review-nib"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800">Nama Bangunan</td>
                                    <td>:</td>
                                    <td><span id="review-nama-bangunan"></span></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: 800">Foto Tampak Depan</td>
                                    <td>:</td>
                                    <td><img id="review-foto_tampak_depan" src="" height="150" width="150"
                                            alt="Foto Tampak Depan" style="max-width: 100%; height: auto;" /></td>
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
                                    <td><img id="review-foto_tampak_sisi_kiri" src="" height="150"
                                            width="150" alt="Foto Sisi Kiri" style="max-width: 100%; height: auto;" />
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: 800">Foto Tampak Sisi Kanan</td>
                                    <td>:</td>
                                    <td><img id="review-foto_tampak_sisi_kanan" src="" height="150"
                                            width="150" alt="Foto Sisi Kanan"
                                            style="max-width: 100%; height: auto;" /></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800">Foto Lainnya</td>
                                    <td>:</td>
                                    <td><img id="review-foto_lainnya" src="" height="150" width="150"
                                            alt="Foto Lainnya" style="max-width: 100%; height: auto;" /></td>
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
                                    <td style="font-weight: 800">Kontruksi Atap</td>
                                    <td>:</td>
                                    <td><span id="review-kontruksi_atap"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800">Kontruksi Pondasi</td>
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
                                    <td><span id="review-tbssb_mappi"></span></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: 800">Jenis Bangunan (Umur Ekonomis)</td>
                                    <td>:</td>
                                    <td><span id="review-jenis_bangunan_uk"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800">Tipe Rumah Tinggal (Umur Ekonomis)</td>
                                    <td>:</td>
                                    <td><span id="review-tipe_rumah_tinggal"></span></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: 800">Jenis Bangunan (Indeks lantai)</td>
                                    <td>:</td>
                                    <td><span id="review-jenis_bangunan_il"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800">Tahun Dibangun</td>
                                    <td>:</td>
                                    <td><span id="review-tahun_dibangun"></span></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: 800">Tahun Renovasi</td>
                                    <td>:</td>
                                    <td><span id="review-tahun_renovasi"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800">Sumber Informasi Tahun Dibangun</td>
                                    <td>:</td>
                                    <td><span id="review-sumber_info_thn_dibangun"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 800">Kondisi Bangunan Secara Visual</td>
                                    <td>:</td>
                                    <td><span id="review-kondisi_bangunan_scr_visual"></span></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: 800">Catatan Khusus Bangunan</td>
                                    <td>:</td>
                                    <td><span id="review-catatan_khusus_bangunan"></span></td>
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
                            </table>
                            <hr>
                            <p class="fw-medium mb-2">Step 2</p>
                            <table class="table table-borderless">
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
                                <tr>
                                    <td style="font-weight: 800">Tipe Penutup Atap Eksisting</td>
                                    <td>:</td>
                                    <td><span id="review-tipe_penutup_atap_eksisting"></span></td>
                                </tr>
                            </table>
                            <hr>
                            <p class="fw-medium mb-2">Step 3</p>
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-weight: 800">Bobot Penutup Atap(%)</td>
                                    <td>:</td>
                                    <td><span id="review-bobot_penutup_atap"></span></td>
                                    <td></td>
                                    <td></td>
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
                            </table>
                            <hr>
                            <p class="fw-medium mb-2">Step 4</p>
                            <table class="table table-borderless">
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
                                    <td colspan="8" class="fs-5 fw-bold">Tipe Lantai Eksisting</td>
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
                                    <td style="font-weight: 800">Penggunaan Bangunan Saat Ini</td>
                                    <td>:</td>
                                    <td><span id="review-penggunaan_bangunan_saat_ini"></span></td>
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
                                    <td style="font-weight: 800">Progres Pembangunan jika aset dalam proses (dalam persen)
                                    </td>
                                    <td>:</td>
                                    <td><span id="review-progress_pembangunan"></span></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: 800">Status Data Obyek</td>
                                    <td>:</td>
                                    <td><span id="review-status_data_obyek"></span></td>
                                </tr>
                            </table>
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                        class="ti ti-arrow-left me-sm-1"></i>
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
            document.getElementById('review-nia').innerHTML = document.getElementById('nia').value
            document.getElementById('review-nib').innerHTML = document.getElementById('nib').value
            document.getElementById('review-nama-bangunan').innerHTML = document.getElementById('nama_bangunan')
                .value
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
            document.getElementById('review-jumlah_lantai').innerHTML = document.getElementById('jumlah_lantai')
                .value
            document.getElementById('review-kontruksi_bangunan').innerHTML = document.getElementById(
                'kontruksi_bangunan').value
            document.getElementById('review-kontruksi_lantai').innerHTML = document.getElementById(
                'kontruksi_lantai').value
            document.getElementById('review-kontruksi_dinding').innerHTML = document.getElementById(
                'kontruksi_dinding').value
            document.getElementById('review-kontruksi_atap').innerHTML = document.getElementById('kontruksi_atap')
                .value
            document.getElementById('review-kontruksi_pondasi').innerHTML = document.getElementById(
                'kontruksi_pondasi').value
            document.getElementById('review-versi_btb').innerHTML = document.getElementById('versi_btb').value
            document.getElementById('review-tbssb_mappi').innerHTML = document.getElementById('tbssb_mappi').value
            document.getElementById('review-jenis_bangunan_uk').innerHTML = document.getElementById(
                'jenis_bangunan_uk').value
            document.getElementById('review-tipe_rumah_tinggal').innerHTML = document.getElementById(
                'tipe_rumah_tinggal').value
            document.getElementById('review-jenis_bangunan_il').innerHTML = document.getElementById(
                'jenis_bangunan_il').value
            document.getElementById('review-tahun_dibangun').innerHTML = document.getElementById('tahun_dibangun')
                .value
            document.getElementById('review-tahun_renovasi').innerHTML = document.getElementById('tahun_renovasi')
                .value
            document.getElementById('review-sumber_info_thn_dibangun').innerHTML = document.getElementById(
                'sumber_info_thn_dibangun').value
            document.getElementById('review-kondisi_bangunan_scr_visual').innerHTML = document.getElementById(
                'kondisi_bangunan_scr_visual').value
            document.getElementById('review-catatan_khusus_bangunan').innerHTML = document.getElementById(
                'catatan_khusus_bangunan').value
            document.getElementById('review-lbf_no_or_nama_lantai').innerHTML = document.getElementById(
                'lbf_no_or_nama_lantai').value
            document.getElementById('review-lbf_faktor_pengali_luas').innerHTML = document.getElementById(
                'lbf_faktor_pengali_luas').value
            document.getElementById('review-lbf_luas_lantai').innerHTML = document.getElementById('lbf_luas_lantai')
                .value
            document.getElementById('review-luas_bangunan_menurut_imb').innerHTML = document.getElementById(
                'luas_bangunan_menurut_imb').value
            document.getElementById('review-lpj_nama_area').innerHTML = document.getElementById('lpj_nama_area')
                .value
            document.getElementById('review-lpj_luas').innerHTML = document.getElementById('lpj_luas').value
            // Step 2
            document.getElementById('review-ld_nama_area').innerHTML = document.getElementById('ld_nama_area').value
            document.getElementById('review-ld_luas').innerHTML = document.getElementById('ld_luas').value
            document.getElementById('review-lrad_nama_area').innerHTML = document.getElementById('lrad_nama_area')
                .value
            document.getElementById('review-lrad_luas').innerHTML = document.getElementById('lrad_luas').value
            document.getElementById('review-lad_nama_area').innerHTML = document.getElementById('lad_nama_area')
                .value
            document.getElementById('review-lad_luas').innerHTML = document.getElementById('lad_luas').value
            document.getElementById('review-tpe_batu_kali').innerHTML = document.getElementById('tpe_batu_kali')
                .value
            document.getElementById('review-tpe_bobot_pondasi').innerHTML = document.getElementById(
                'tpe_bobot_pondasi').value
            document.getElementById('review-ttpe_tipe_material').innerHTML = document.getElementById(
                'ttpe_tipe_material').value
            document.getElementById('review-ttpe_bobot').innerHTML = document.getElementById('ttpe_bobot').value
            document.getElementById('review-tse_beton_bertulang').innerHTML = document.getElementById(
                'tse_beton_bertulang').value
            document.getElementById('review-tse_bobot_struktur_beton_bertulng').innerHTML = document.getElementById(
                'tse_bobot_struktur_beton_bertulng').value
            document.getElementById('review-ttse_tipe_material').innerHTML = document.getElementById(
                'ttse_tipe_material').value
            document.getElementById('review-ttse_bobot').innerHTML = document.getElementById('ttse_bobot').value
            // document.getElementById('review-tipe_rangka_atap_eksisting').innerHTML = document.getElementById('tipe_rangka_atap_eksisting').value

            document.getElementById('review-ttrae_tipe_material').innerHTML = document.getElementById(
                'ttrae_tipe_material').value
            document.getElementById('review-ttrae_bobot').innerHTML = document.getElementById('ttrae_bobot').value
            document.getElementById('review-tipe_penutup_atap_eksisting').innerHTML = document.getElementById(
                'tipe_penutup_atap_eksisting').value
            // Step 3
            document.getElementById('review-bobot_penutup_atap').innerHTML = document.getElementById(
                'bobot_penutup_atap').value
            document.getElementById('review-tipe_plafon_eksisting').innerHTML = document.getElementById(
                'tipe_plafon_eksisting').value
            document.getElementById('review-tampe_tipe_material').innerHTML = document.getElementById(
                'tampe_tipe_material').value
            document.getElementById('review-tampe_bobot').innerHTML = document.getElementById('tampe_bobot').value
            document.getElementById('review-tipe_dinding_eksisting').innerHTML = document.getElementById(
                'tipe_dinding_eksisting').value
            document.getElementById('review-tde_bobot').innerHTML = document.getElementById('tde_bobot').value
            document.getElementById('review-ttde_tipe_material').innerHTML = document.getElementById(
                'ttde_tipe_material').value
            document.getElementById('review-ttde_bobot').innerHTML = document.getElementById('ttde_bobot').value
            document.getElementById('review-tipe_pelapis_dinding_eksisting').innerHTML = document.getElementById(
                'tipe_pelapis_dinding_eksisting').value
            document.getElementById('review-ttde_bobot_pdc').innerHTML = document.getElementById('ttde_bobot_pdc')
                .value
            document.getElementById('review-ttpde_tipe_material').innerHTML = document.getElementById(
                'ttpde_tipe_material').value
            document.getElementById('review-ttpde_bobot').innerHTML = document.getElementById('ttpde_bobot').value
            document.getElementById('review-tipe_pintu_n_jendela_eksisting').innerHTML = document.getElementById(
                'tipe_pintu_n_jendela_eksisting').value
            // Step 4
            document.getElementById('review-ttpdje_tipe_material').innerHTML = document.getElementById(
                'ttpdje_tipe_material').value
            document.getElementById('review-ttpdje_bobot').innerHTML = document.getElementById('ttpdje_bobot').value
            document.getElementById('review-tipe_lantai_eksisting').innerHTML = document.getElementById(
                'tipe_lantai_eksisting').value
            document.getElementById('review-tle_bobot_lantai').innerHTML = document.getElementById(
                'tle_bobot_lantai').value
            document.getElementById('review-ttle_tipe_material').innerHTML = document.getElementById(
                'ttle_tipe_material').value
            document.getElementById('review-ttle_bobot').innerHTML = document.getElementById('ttle_bobot').value
            document.getElementById('review-penggunaan_bangunan_saat_ini').innerHTML = document.getElementById(
                'penggunaan_bangunan_saat_ini').value
            document.getElementById('review-perlengkapan_bangunan').innerHTML = document.getElementById(
                'perlengkapan_bangunan').value
            document.getElementById('review-penggunaan_bangunan').innerHTML = document.getElementById(
                'penggunaan_bangunan').value
            document.getElementById('review-progress_pembangunan').innerHTML = document.getElementById(
                'progress_pembangunan').value
            document.getElementById('review-status_data_obyek').innerHTML = document.getElementById(
                'status_data_obyek').value

        });
    </script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([1.966576931124596, 100.049384575934738], 9)

            var accessToken =
                'pk.eyJ1IjoicmVkb2syNSIsImEiOiJjbG1zdzZ1Y2MwZHA2MmxxYzdvYm12cTlwIn0.2GTgMV076x87YJQJzM34jg';

            var satelliteLayer = L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + accessToken, {
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
        function getSelectedValues() {
            const selectedOptions = document.getElementById('tipe_rangka_atap_eksisting').selectedOptions;
            let values = Array.from(selectedOptions).map(option => option.value);
            document.getElementById('review-tipe_rangka_atap_eksisting').innerHTML = values.join(', ');
        }

        document.getElementById('btn-review').addEventListener('click', getSelectedValues);
    </script>

@endsection
