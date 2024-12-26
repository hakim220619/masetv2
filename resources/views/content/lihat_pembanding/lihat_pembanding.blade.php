@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Pembanding')

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
    <div class="row g-4 mb-3">
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
                        <div id="map" style="height: 400px; width: 100%;"></div>   
                    </form>                  
                </div>   
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th scope="col">Nomor ID</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">Jenis Properti</th>
                              <th scope="col">Narasumber</th>
                              <th scope="col">Telepon</th>
                              <th scope="col">Tgl Transaksi/Penawaran</th>
                              <th scope="col">Peruntukan</th>
                              <th scope="col">Bentuk</th>
                              <th scope="col">Luas Tanah (m2)</th>
                              <th scope="col">Luas Bangunan (m2)</th>
                              <th scope="col">Harga Penawaran (Rp)</th>
                              <th scope="col">Estimasi Transaksi (Rp)</th>
                              <th scope="col">Nilai Pasar Bangunan (Rp)</th>
                              <th scope="col">Indikasi Nilai Tanah (Rp/m2)</th>
                              <th scope="col">Foto</th>
                              <th scope="col">Link</th>
                              <th scope="col">Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                          </tbody>
                    </table>    
                </div>
            </div>            
        </div>   
        <div class="card">
            <div class="card-header">
                <h4>Filter Data Pembanding</h4>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cari_data">Cari Data</label>
                            <input type="text" class="form-control" name="cari_data" id="cari_data">
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_properti">Jenis Properti</label>
                            <select name="jenis_properti" id="jenis_properti" class="form-select">
                                <option value="" selected>Pilih..</option>
                                <option value="ruko">Ruko</option>
                                <option value="tanah kosong">Tanah Kosong</option>
                                <option value="tanah dan bangunan">Tanah dan Bangunan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="narasumber">Narasumber</label>
                            <input type="text" class="form-control" name="narasumber" id="narasumber">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tgl_penawaran">Tanggal Penawaran</label>
                            <input type="date" class="form-control" name="tgl_penawaran" id="tgl_penawaran">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div>
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
                        <div class="col-md-6 mb-3">
                            <label for="jenis_data">Jenis Data</label>
                            <select name="jenis_data" id="jenis_data" class="form-select">
                                <option value="" selected>Pilih..</option>
                                <option value="Penawaran">penawaran</option>
                                <option value="Transaksi">Transaksi</option>
                                <option value="Price on offer">Price on offer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">                        
                        <div class="col-md-6 mb-3">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-select">
                                <option value="" selected>Pilih..</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="number" class="form-control" name="kode_pos" id="kode_pos">
                        </div>
                    </div>
                    <button class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
        <div class="container mt-5">
            <h2 class="mb-4">Semua Data Pembanding</h2>
    
            <!-- Tahun Filter -->
            <div class="mb-4">
                <button class="btn btn-outline-secondary">Semua tahun</button>
                <button class="btn btn-outline-secondary">2024</button>
                <button class="btn btn-outline-secondary">2023</button>
                <button class="btn btn-outline-secondary">2022</button>
                <button class="btn btn-outline-secondary">2021</button>
                <button class="btn btn-outline-secondary">2020</button>
                <button class="btn btn-outline-secondary">2019</button>
                <button class="btn btn-outline-secondary">2018</button>
            </div>
    
            <!-- Cards Section -->
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header text-white">
                            <h5 class="mb-0">Avanza 1.3 g mt 2013</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/150" alt="Gambar Properti" class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Nomor ID:</strong> 238829</li>
                                        <li class="list-group-item"><strong>Jenis Properti:</strong> Kendaraan</li>
                                        <li class="list-group-item"><strong>Tipe:</strong> Mobil Penumpang</li>
                                        <li class="list-group-item"><strong>Tanggal:</strong> 20 December 2024</li>
                                        <li class="list-group-item"><strong>Narasumber:</strong> OLX Autos</li>
                                        <li class="list-group-item"><strong>Telepon:</strong> 082123167085</li>
                                        <li class="list-group-item"><strong>Alamat:</strong> Jl. Jendral Ahmad Yani No.51, Cemp. Putih Timur, Kota Jakarta Pusat</li>
                                        <li class="list-group-item"><strong>KJPP:</strong> KJPP Desmar, Susanto, Salman dan Rekan</li>
                                        <li class="list-group-item"><strong>Status Data:</strong> Lengkap</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Card 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header text-white">
                            <h5 class="mb-0">Avanza 1.3 g mt 2013</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/150" alt="Gambar Properti" class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Nomor ID:</strong> 238829</li>
                                        <li class="list-group-item"><strong>Jenis Properti:</strong> Kendaraan</li>
                                        <li class="list-group-item"><strong>Tipe:</strong> Mobil Penumpang</li>
                                        <li class="list-group-item"><strong>Tanggal:</strong> 20 December 2024</li>
                                        <li class="list-group-item"><strong>Narasumber:</strong> OLX Autos</li>
                                        <li class="list-group-item"><strong>Telepon:</strong> 082123167085</li>
                                        <li class="list-group-item"><strong>Alamat:</strong> Jl. Jendral Ahmad Yani No.51, Cemp. Putih Timur, Kota Jakarta Pusat</li>
                                        <li class="list-group-item"><strong>KJPP:</strong> KJPP Desmar, Susanto, Salman dan Rekan</li>
                                        <li class="list-group-item"><strong>Status Data:</strong> Lengkap</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                     
    </div>


<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
  
    
  
    map.invalidateSize();
  });
  </script>    
@endsection

