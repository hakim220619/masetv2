@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Bangunan')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-user-view.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/form-wizard-icons.js', 'resources/assets/js/app-bangunan-list.js'])
@endsection


@section('content')

    <div class="row g-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h3>Cari Data Pembanding</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form>
                        <div class="row mb-3">
                            <div class="mb-2">
                                <label for="jenis_properti">Jenis Properti</label>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="tanah_bangunan" name="tanah_bangunan">
                                    <label class="form-check-label" for="tanah_bangunan">Tanah Bangunan</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="tanah_kosong" name="tanah_kosong">
                                    <label class="form-check-label" for="tanah_kosong">Tanah Kosong</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="office_retail" name="office_retail">
                                    <label class="form-check-label" for="office_retail">Office/Retail/Unit Apartemen</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="ruko" name="ruko">
                                    <label class="form-check-label" for="ruko">Ruko</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="mb-2">
                                <label for="hak_kepemilikan">Hak Kepemilikan</label>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="shm" name="shm">
                                    <label class="form-check-label" for="shm">SHM</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="hgu" name="hgu">
                                    <label class="form-check-label" for="hgu">HGB</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="hak_pakai" name="hak_pakai">
                                    <label class="form-check-label" for="hak_pakai">Hak Pakai</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="hmsrs" name="hmsrs">
                                    <label class="form-check-label" for="hmsrs">HMSRS</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="girik" name="girik">
                                    <label class="form-check-label" for="girik">Girik</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="ajb" name="ajb">
                                    <label class="form-check-label" for="ajb">AJB</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="ppjb" name="ppjb">
                                    <label class="form-check-label" for="ppjb">PPJB</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="surat_hijau" name="surat_hijau">
                                    <label class="form-check-label" for="surat_hijau">Surat Hijau</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="mb-2">
                                <label for="jenis_data">Jenis Data</label>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="penawaran" name="penawaran">
                                    <label class="form-check-label" for="penawaran">Penawaran</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="transaksi" name="transaksi">
                                    <label class="form-check-label" for="transaksi">Transaksi</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="price_on_offer" name="price_on_offer">
                                    <label class="form-check-label" for="price_on_offer">Price on Offer</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="mb-2">
                                <label for="tahun">Tahun</label>
                            </div>
                            <div class="d-flex flex-wrap">
                                <?php
                                $startYear = 2018; // Tahun awal
                                $currentYear = date('Y'); // Tahun saat ini
                        
                                for ($year = $currentYear; $year >= $startYear; $year--) {
                                    echo '
                                    <div class="form-check me-3">
                                        <input type="checkbox" class="form-check-input" id="t_' . $year . '" name="t_' . $year . '">
                                        <label class="form-check-label" for="t_' . $year . '">' . $year . '</label>
                                    </div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="mb-2">
                                <label for="status_data">Status Data</label>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" id="lengkap" name="lengkap">
                                    <label class="form-check-label" for="lengkap">Lengkap</label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" id="tidak_lengkap" name="tidak_lengkap">
                                    <label class="form-check-label" for="tidak_lengkap">Tidak Lengkap</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="mb-2">
                                <label for="status_data">Status Data</label>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <label for="row_jalan">Row Jalan (m)</label>
                                    <input type="text" class="form-control" name="row_jalan" id="row_jalan">
                                </div>
                                <div class="me-3">
                                    <label for="radius">Radius</label>
                                    <select class="form-select" aria-label="radius" name="radius" id="radius">
                                        <option selected>Pilih...</option>
                                        <?php
                                        for ($i = 1; $i <= 20; $i++) {
                                            echo '<option value="' . $i . '">' . $i . ' KM</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>      
                </div>
                <div class="mb-3">
                    <form action="">
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" placeholder="Sleman, Daerah Istimewa Yogyakarta, Indonesia">
                        </div>    
                        <div id="peta"></div>    
                    </form>                  
                </div>       
            </div>
        </div>                   
    </div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
@endsection

