@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Edit Data Tanah Kosong')

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
    <h4>Edit Data Pembanding Tanah Kosong</h4>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="bs-stepper-content">
                <form method="POST" action="{{ route('pembanding.tanah-kosong.update', $data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <!-- Informasi Utama -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="nama_tanah_kosong">Nama Tanah Kosong</label>
                                <input type="text" class="form-control" name="nama_tanah_kosong"
                                    value="{{ old('nama_tanah_kosong', $data->nama_tanah_kosong) }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat"
                                    value="{{ old('alamat', $data->alamat) }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="luas_tanah">Luas Tanah (m²)</label>
                                <input type="number" class="form-control" name="luas_tanah"
                                    value="{{ old('luas_tanah', $data->luas_tanah) }}">
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

                        <!-- Upload Foto -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Foto Tampak Depan</label>
                                    @if ($data->foto_tampak_depan)
                                        <img src="{{ asset('storage/' . $data->foto_tampak_depan) }}"
                                            class="img-thumbnail mb-2" style="max-height: 150px;">
                                    @endif
                                    <input type="file" name="foto_tampak_depan" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Foto Tampak Kiri</label>
                                    @if ($data->foto_tampak_sisi_kiri)
                                        <img src="{{ asset('storage/' . $data->foto_tampak_sisi_kiri) }}"
                                            class="img-thumbnail mb-2" style="max-height: 150px;">
                                    @endif
                                    <input type="file" name="foto_tampak_sisi_kiri" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Foto Tampak Kanan</label>
                                    @if ($data->foto_tampak_sisi_kanan)
                                        <img src="{{ asset('storage/' . $data->foto_tampak_sisi_kanan) }}"
                                            class="img-thumbnail mb-2" style="max-height: 150px;">
                                    @endif
                                    <input type="file" name="foto_tampak_sisi_kanan" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- NJOP -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Nilai NJOP</h5>
                                    <button type="button" class="btn btn-sm btn-primary"
                                        onclick="addNjopRow()">Tambah</button>
                                </div>
                                <div class="card-body">
                                    <table class="table" id="njopTable">
                                        <thead>
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Nilai (Rp)</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->tahun_nilai_njop ?? [] as $index => $njop)
                                                <tr>
                                                    <td>
                                                        <input type="number" name="njop[{{ $index }}][tahun]"
                                                            class="form-control" value="{{ $njop['tahun'] }}" required>
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                            name="njop[{{ $index }}][nilai_perolehan]"
                                                            class="form-control" value="{{ $njop['nilai_perolehan'] }}"
                                                            required>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="removeRow(this)">Hapus</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
            const index = table.rows.length;

            newRow.innerHTML = `
            <td>
                <input type="number" name="njop[${index}][tahun]" class="form-control" required>
            </td>
            <td>
                <input type="number" name="njop[${index}][nilai_perolehan]" class="form-control" required>
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
