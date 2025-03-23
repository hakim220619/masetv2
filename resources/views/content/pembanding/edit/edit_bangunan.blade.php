@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Edit Data Bangunan')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.js', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/select2/select2.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/form-wizard-icons.js'])
@endsection

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />
    <h4>Edit Data Pembanding Bangunan</h4>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="bs-stepper-content">
                <form method="POST" action="{{ route('pembanding.bangunan.update', $data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <!-- Informasi Utama -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="nama_bangunan">Nama Bangunan</label>
                                <input type="text" class="form-control" name="nama_bangunan"
                                    value="{{ old('nama_bangunan', $data->nama_bangunan) }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat"
                                    value="{{ old('alamat', $data->alamat) }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="luas_bangunan">Luas Bangunan (m²)</label>
                                <input type="number" class="form-control" name="luas_bangunan"
                                    value="{{ old('luas_bangunan', $data->luas_bangunan) }}">
                            </div>
                        </div>

                        <!-- Koordinat dan Peta -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Koordinat</label>
                                <div id="map" style="height: 300px;"></div>
                                <input type="hidden" id="lat" name="lat" value="{{ old('lat', $data->lat) }}">
                                <input type="hidden" id="long" name="long" value="{{ old('long', $data->long) }}">
                            </div>
                        </div>

                        <!-- Tahun dan Nilai NJOP -->
                        <div class="col-12">
                            <h5>Tahun & Nilai NJOP</h5>
                            <table class="table table-bordered" id="njopTable">
                                <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Nilai NJOP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->tahun_nilai_njop ?? [] as $njop)
                                        <tr>
                                            <td>
                                                <input type="number" name="tahun_njop[]" class="form-control"
                                                    value="{{ $njop['tahun_njop'] }}" required>
                                            </td>
                                            <td>
                                                <input type="number" name="nilai_njop[]" class="form-control"
                                                    value="{{ $njop['nilai_njop'] }}" required>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="removeRow(this)">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary btn-sm" onclick="addNjopRow()">Tambah
                                Baris</button>
                        </div>

                        <!-- Kondisi Lingkungan Khusus -->
                        <div class="col-12">
                            <h5>Kondisi Lingkungan Khusus</h5>
                            <table class="table table-bordered" id="kondisiTable">
                                <thead>
                                    <tr>
                                        <th>Kondisi</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->kondisi_lingkungan_khusus ?? [] as $kondisi)
                                        <tr>
                                            <td>
                                                <input type="text" name="kondisi_lingkungan_khusus[]"
                                                    class="form-control" value="{{ $kondisi['kondisi_lingkungan_khusus'] }}"
                                                    required>
                                            </td>
                                            <td>
                                                <input type="text" name="keterangan_lingkungan_khusus[]"
                                                    class="form-control"
                                                    value="{{ $kondisi['keterangan_lingkungan_khusus'] }}">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="removeRow(this)">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary btn-sm" onclick="addKondisiRow()">Tambah
                                Baris</button>
                        </div>

                        <!-- Upload Foto -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Foto Tampak Depan</label>
                                @if ($data->foto_tampak_depan)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $data->foto_tampak_depan) }}"
                                            alt="Foto Tampak Depan" class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" name="foto_tampak_depan">
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('pembanding-lihat-pembanding') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inisialisasi Peta
        var map = L.map('map').setView([{{ $data->lat }}, {{ $data->long }}], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        var marker = L.marker([{{ $data->lat }}, {{ $data->long }}], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function(e) {
            document.getElementById('lat').value = marker.getLatLng().lat;
            document.getElementById('long').value = marker.getLatLng().lng;
        });

        // Fungsi untuk menambah baris NJOP
        function addNjopRow() {
            const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            newRow.innerHTML = `
            <td>
                <input type="number" name="tahun_njop[]" class="form-control" required>
            </td>
            <td>
                <input type="number" name="nilai_perolehan[]" class="form-control" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Hapus</button>
            </td>
        `;
        }

        // Fungsi untuk menambah baris Kondisi
        function addKondisiRow() {
            const table = document.getElementById('kondisiTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            newRow.innerHTML = `
            <td>
                <input type="text" name="kondisi[]" class="form-control" required>
            </td>
            <td>
                <input type="text" name="keterangan[]" class="form-control">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Hapus</button>
            </td>
        `;
        }

        // Fungsi untuk menghapus baris
        function removeRow(button) {
            const row = button.closest('tr');
            row.remove();
        }
    </script>

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
    @endif

@endsection
