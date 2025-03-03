@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Pembanding')

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">

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
                                    <input type="checkbox" class="form-check-input" id="tanah_bangunan"
                                        name="tanah_bangunan">
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
                                    <input type="checkbox" class="form-check-input" id="price_on_offer"
                                        name="price_on_offer">
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
                                                                                                                                                                        <input type="checkbox" class="form-check-input" id="t_' .
                                        $year .
                                        '" name="t_' .
                                        $year .
                                        '">
                                                                                                                                                                        <label class="form-check-label" for="t_' .
                                        $year .
                                        '">' .
                                        $year .
                                        '</label>
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
                                    <input class="form-check-input" type="radio" name="lengkap"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Lengkap
                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="lengkap" id="flexRadioDefault2"
                                        checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        tidak Lengkap
                                    </label>
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
                                        <option value="1">1 KM</option>
                                        <option value="2">2 KM</option>
                                        <option value="3">3 KM</option>
                                        <option value="4">4 KM</option>
                                        <option value="5" selected>5 KM</option>
                                        <option value="6">6 KM</option>
                                        <option value="7">7 KM</option>
                                        <option value="8">8 KM</option>
                                        <option value="9">9 KM</option>
                                        <option value="10">10 KM</option>
                                        <option value="11">11 KM</option>
                                        <option value="12">12 KM</option>
                                        <option value="13">13 KM</option>
                                        <option value="14">14 KM</option>
                                        <option value="15">15 KM</option>
                                        <option value="16">16 KM</option>
                                        <option value="17">17 KM</option>
                                        <option value="18">18 KM</option>
                                        <option value="19">19 KM</option>
                                        <option value="20">20 KM</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
                <div class="mb-3">
                    <form action="">
                        {{-- <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" placeholder="Sleman, Daerah Istimewa Yogyakarta, Indonesia">
                        </div>     --}}
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
                                <th scope="col">Letak</th>
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
                        <tbody id="data-tabel">
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
                                    <input type="radio" class="form-check-input" id="tidak_lengkap"
                                        name="tidak_lengkap">
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
        <div class="card mt-5">
            <div class="card-header">
                <h2 class="mb-4">Semua Data Pembanding</h2>
                <form action="">
                    <div class="form-group mb-3">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-select">
                            <option value="">Pilih</option>
                            <?php
                            $tahunMulai = 2018;
                            $tahunSekarang = date('Y');
                            for ($i = $tahunSekarang; $i >= $tahunMulai; $i--) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-sm">Tampilkan</button>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="data-pembanding">
                            <thead>
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nomor ID</th>
                                    <th scope="col">Jenis Properti</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Narasumber</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nama Entitas</th>
                                    <th scope="col">Sumber Data</th>
                                    <th scope="col">Status Data</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $d)
                                    <tr>
                                        <td><img src="{{ $d->foto_tampak_depan }}" alt="Foto" class="img-thumbnail"></td>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->jenis_aset }}</td>
                                        <td>{{ $d->created_at }}</td>
                                        <td>{{ $d->nama_narsum }}</td>
                                        <td>{{ $d->telepon }}</td>
                                        <td>{{ $d->alamat }}</td>
                                        <td>{{ $d->nama_entitas }}</td>
                                        <td>{{ $d->status_data_pembanding }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-spreadsheet"></i></button>
                                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-success btn-sm"><i class="bi bi-download"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                        </td>
                                    </tr>                                    
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <script>
        var map; // Deklarasi global untuk Leaflet Map
        var markers = []; // Menyimpan marker aktif
        var radiusCircle; // Menyimpan lingkaran radius
        var radius = 5; // Radius default dalam km
        var centerMarker; // Menyimpan marker merah di tengah radius


        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Leaflet Map
            map = L.map('map').setView([1.966576931124596, 100.049384575934738], 13);

            var accessToken =
                'pk.eyJ1IjoicmVkb2syNSIsImEiOiJjbG1zdzZ1Y2MwZHA2MmxxYzdvYm12cTlwIn0.2GTgMV076x87YJQJzM34jg';
            var satelliteLayer = L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + accessToken, {
                    attribution: '&copy; <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 30,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);

            var geocoder = L.Control.geocoder({
                defaultMarkGeocode: false
            }).on('markgeocode', function(e) {
                map.setView(e.geocode.center, 13);
            }).addTo(map);

            // Fungsi untuk menggambar radius pada map
            function drawRadius(lat, lng, radius) {
                if (radiusCircle) {
                    map.removeLayer(radiusCircle); // Hapus radius sebelumnya
                }

                radiusCircle = L.circle([lat, lng], {
                    color: 'blue',
                    fillColor: '#8bbaff',
                    fillOpacity: 0.3,
                    radius: radius * 1000 // Convert kilometer ke meter
                }).addTo(map);

                // Tambahkan atau perbarui marker merah di tengah radius
                if (centerMarker) {
                    centerMarker.setLatLng([lat, lng]); // Pindahkan marker ke lokasi baru
                    centerMarker.on('click', function() {
                        centerMarker.bindPopup("Lokasi saat ini").openPopup();
                    });
                } else {
                    centerMarker = L.marker([lat, lng], {
                        icon: L.icon({
                            iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-red.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41]
                        })
                    }).addTo(map);
                    centerMarker.on('click', function() {
                        centerMarker.bindPopup("Lokasi saat ini").openPopup();
                    });
                }
            }

            // Fungsi untuk memperbarui peta berdasarkan radius
            function updateMap(lat, lng, radius) {
                // Hapus marker lama
                markers.forEach(function(marker) {
                    map.removeLayer(marker);
                });
                markers = [];

                // Kosongkan tabel sebelum diisi data baru
                var tableBody = document.getElementById('data-tabel');
                tableBody.innerHTML = '';

                // Ambil data dari controller
                $.ajax({
                    url: '/get-coordinates',
                    type: 'GET',
                    data: {
                        radius: radius,
                        lat: lat,
                        lng: lng
                    },
                    success: function(data) {
                        data.forEach(function(location) {
                            var iconUrl;

                            // Tentukan warna marker berdasarkan asal data
                            if (location.sumber === 'pembanding_retail') {
                                iconUrl =
                                    'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-green.png'; // Hijau
                            } else if (location.sumber === 'tanah_kosong') {
                                iconUrl =
                                    'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-blue.png'; // Biru
                            } else {
                                iconUrl =
                                    'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-red.png'; // Default merah
                            }

                            // Buat marker dengan warna yang sesuai
                            var marker = L.marker([location.lat, location.long], {
                                icon: L.icon({
                                    iconUrl: iconUrl,
                                    iconSize: [25, 41],
                                    iconAnchor: [12, 41]
                                })
                            }).addTo(map);

                            marker.bindPopup(
                                `<b>${location.nama_pembanding}</b><br>${location.alamat}`);
                            markers.push(marker);

                            // Tambahkan data ke tabel
                            var row = `
                                <tr>
                                    <td>${location.id}</td>
                                    <td>${location.alamat ?? '-'}</td>
                                    <td>${location.jenis_aset ?? '-'}</td>
                                    <td>${location.nama_narsum ?? '-'}</td>
                                    <td>${location.telepon ?? '-'}</td>
                                    <td>${location.created_at ?? '-'}</td>
                                    <td>${location.peruntukan ?? '-'}</td>
                                    <td>${location.bentuk_tanah ?? '-'}</td>
                                    <td>${location.letak_posisi_obyek ?? '-'}</td>
                                    <td>${location.luas_tanah ?? '-'}</td>
                                    <td>${location.luas_bangunan_total ?? '-'}</td>
                                    <td>${location.harga_penawaran ?? '-'}</td>
                                    <td>${location.harga_penawaran-(location.harga_penawaran * (location.diskon/100)) ?? '-'}</td>
                                    <td>${location.nilai_pasar_bangunan ?? '-'}</td>
                                    <td>${location.indikasi_nilai_tanah ?? '-'}</td>
                                    <td>foto</td>
                                    <td><a href="www.google.com" target="_blank">Link</a></td>
                                    <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                                </tr>
                            `;
                            tableBody.insertAdjacentHTML('beforeend', row);
                        });
                    }
                });
            }

            // Geolokasi awal pengguna
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;

                        drawRadius(lat, lng, radius);
                        map.setView([lat, lng], 12);
                        updateMap(lat, lng, radius); // Update peta berdasarkan lokasi awal pengguna
                    },
                    function(error) {
                        console.error("Geolokasi gagal: " + error.message);
                    }
                );
            } else {
                alert("Browser Anda tidak mendukung geolokasi.");
            }



            // Event klik pada map untuk memindahkan marker dan menggambar radius
            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;


                drawRadius(lat, lng, radius);
                updateMap(lat, lng, radius);
            });

            // Event saat radius diubah dari dropdown
            document.getElementById('radius').addEventListener('change', function() {
                radius = parseInt(this.value);

                // Jika radius diubah, perbarui radius dan map secara otomatis
                if (radiusCircle) {
                    var center = radiusCircle.getLatLng();
                    drawRadius(center.lat, center.lng, radius); // Update radius lingkaran
                    updateMap(center.lat, center.lng, radius); // Update marker pada map
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#data-pembanding').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('lihat.pembanding.data') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'foto',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'jenis_aset'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'nama_narsum'
                    },
                    {
                        data: 'telepon'
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        data: 'nama_entitas'
                    },
                    {
                        data: 'sumber_data'
                    },
                    {
                        data: 'status_data_pembanding'
                    },
                    {
                        data: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>

@endsection
