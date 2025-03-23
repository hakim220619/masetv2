@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Edit Data Pembanding Retail')

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
    <h4>Edit Data Pembanding – Office/ Retail/ Apartemen</h4>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="bs-stepper-content">
                <form method="POST" action="{{ route('pembanding.retail.update', $data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="account-details" class="content">
                        <div class="row g-3">
                            <div>
                                <label class="form-label" for="nama_retail">Nama Office/ Retail/ Apartemen</label>
                                <input type="text" id="nama_retail" name="nama_retail" class="form-control"
                                    value="{{ old('nama_retail', $data->nama_retail) }}" required />
                            </div>
                            <div>
                                <label class="form-label" for="nama_entitas">Nama Entitas</label>
                                <input type="text" id="nama_entitas" name="nama_entitas" class="form-control"
                                    value="{{ old('nama_entitas', $data->nama_entitas) }}" />
                            </div>
                            <div>
                                <select class="form-select" name="jenis_properti" id="jenis_properti" required>
                                    <option value="" disabled>Pilih...</option>
                                    <option value="Office" @if ($data->jenis_properti == 'Office') selected @endif>Office</option>
                                    <option value="Retail" @if ($data->jenis_properti == 'Retail') selected @endif>Retail</option>
                                    <option value="Apartemen" @if ($data->jenis_properti == 'Apartemen') selected @endif>Apartemen
                                    </option>
                                </select>
                            </div>

                            <!-- Bagian Lokasi Obyek -->
                            <div class="p-3 rounded bg-light">
                                <label class="form-label">Lokasi Obyek</label>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="provinsi">Provinsi</label>
                                        <select class="form-select" name="provinsi" id="provinsi">
                                            <option value="A" @if ($data->provinsi == 'A') selected @endif>A
                                            </option>
                                            <option value="B" @if ($data->provinsi == 'B') selected @endif>B
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="kode_pos">Kode Pos</label>
                                        <input type="text" id="kode_pos" name="kode_pos" class="form-control"
                                            value="{{ old('kode_pos', $data->kode_pos) }}" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="alamat_lengkap">Alamat Lengkap</label>
                                        <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap">{{ old('alamat_lengkap', $data->alamat_lengkap) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Koordinat Obyek -->
                            <div>
                                <label class="form-label">Koordinat Obyek</label>
                                <div id="map" style="height: 400px; width: 100%;"></div>
                                <input type="text" id="lat" name="lat" class="form-control"
                                    value="{{ old('lat', $data->lat) }}" hidden />
                                <input type="text" id="long" name="long" class="form-control"
                                    value="{{ old('long', $data->long) }}" hidden />
                            </div>

                            <!-- Upload Foto -->
                            <div class="row g-3">
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

                            <!-- Foto Lainnya -->
                            <div class="p-3 rounded bg-light">
                                <label class="form-label">Foto Lainnya</label>
                                <table class="table table-bordered" id="fotoLainnyaTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul Foto</th>
                                            <th>File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->foto_lainnya ?? [] as $index => $foto)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <input type="text" name="judul_foto[]" class="form-control"
                                                        value="{{ $foto['judul_foto'] ?? '' }}">
                                                </td>
                                                <td>
                                                    @if (isset($foto['file_path']))
                                                        <a href="{{ asset('storage/' . $foto['file_path']) }}"
                                                            target="_blank">Lihat File</a>
                                                    @endif
                                                    <input type="file" name="foto_lainnya[]" class="form-control">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        onclick="addFotoRow()">+</button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="removeFotoRow(this)">-</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Nilai Perolehan -->
                            <div class="p-3 rounded bg-light">
                                <label class="form-label">Nilai Perolehan / NJOP / PBB</label>
                                <table class="table table-bordered" id="njopTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Nilai (Rp)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->nilai_perolehan_njop ?? [] as $index => $nilai)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <input type="number" name="tahun_njop[]" class="form-control"
                                                        value="{{ $nilai['tahun_njop'] ?? '' }}">
                                                </td>
                                                <td>
                                                    <input type="number" name="nilai_njop[]" class="form-control"
                                                        value="{{ $nilai['nilai_njop'] ?? '' }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        onclick="addRow()">+</button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="removeRow(this)">-</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
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

        // Fungsi untuk menambah baris foto
        function addFotoRow() {
            const table = document.getElementById('fotoLainnyaTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            newRow.innerHTML = `
            <td>${table.rows.length + 1}</td>
            <td><input type="text" name="judul_foto[]" class="form-control"></td>
            <td><input type="file" name="foto_lainnya[]" class="form-control"></td>
            <td>
                <button type="button" class="btn btn-success btn-sm" onclick="addFotoRow()">+</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeFotoRow(this)">-</button>
            </td>
        `;
        }

        // Fungsi untuk menghapus baris foto
        function removeFotoRow(button) {
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
