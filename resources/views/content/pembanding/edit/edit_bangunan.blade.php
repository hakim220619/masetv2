@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Edit Data Pembanding - Bangunan')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/select2/select2.js'])
@endsection

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>

    <style>
        .bg-section {
            background-color: #f8f9fa;
        }

        #map {
            height: 400px;
            width: 100%;
        }

        .foto-container {
            margin-bottom: 20px;
        }

        .foto-preview {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            margin-top: 10px;
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

    <h4>Edit Data Pembanding – Tanah dan Bangunan</h4>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="content">
                <form method="POST" action="{{ route('pembanding.bangunan.update', $data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Account Details -->
                    <div id="account-details" class="content">
                        <div class="row g-3">
                            <div class="form-group mb-3">
                                <label for="nama_bangunan"><b>Nama Bangunan</b> <span class="text-danger">*</span></label>
                                <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                                    value="{{ old('nama_bangunan', $data->nama_bangunan) }}" required>
                            </div>
                            <div>
                                <label for="nama_kjpp"><b>Nama KJPP</b></label>
                                <input type="text" id="nama_kjpp" name="nama_kjpp" class="form-control"
                                    value="{{ old('nama_kjpp', $data->nama_kjpp) }}" />
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Lokasi Obyek"><b>Lokasi Obyek</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Provinsi</b></th>
                                        <th><b>Kode Pos</b></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="provinsi" id="provinsi"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="A" @if ($data->provinsi == 'A') selected @endif>A
                                                </option>
                                                <option value="B" @if ($data->provinsi == 'B') selected @endif>B
                                                </option>
                                            </select>
                                        </td>
                                        <td><input type="text" id="kode_pos" name="kode_pos" class="form-control"
                                                value="{{ old('kode_pos', $data->kode_pos) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><b>Alamat Lengkap</b></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap">{{ old('alamat_lengkap', $data->alamat_lengkap) }}</textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="jenis_properti"><b>Jenis Properti</b></label>
                                <input type="text" id="id_jenis_properti" name="jenis_properti" class="form-control"
                                    placeholder="Contoh : Rumah Tinggal, Ruko, dll"
                                    value="{{ old('jenis_properti', $data->jenis_properti) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label><b>Jenis Bangunan</b></label><br>
                                <input type="checkbox" id="id_jenis_bangunan" name="id_jenis_bangunan" value="Ruko/Rukan"
                                    @if ($data->id_jenis_bangunan == 'Ruko/Rukan') checked @endif>
                                <label for="id_jenis_bangunan">Ruko/Rukan</label>
                            </div>
                            <div id="keteranganField"
                                style="display: {{ $data->id_jenis_bangunan == 'Ruko/Rukan' ? 'block' : 'none' }}">
                                <label for="kpt_tabel_analisis_ruko"><b>Keterangan Peruntukan Tanah pada Tabel Analisis
                                        Ruko</b></label>
                                <input type="text" id="kpt_tabel_analisis_ruko" name="kpt_tabel_analisis_ruko"
                                    class="form-control" placeholder="Berperuntukan Ruko"
                                    value="{{ old('kpt_tabel_analisis_ruko', $data->kpt_tabel_analisis_ruko) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="kdn_tabel_analisis"><b>Keterangan Dasar Nilai pada Tabel Analisis</b></label>
                                <input type="text" id="kdn_tabel_analisis" name="kdn_tabel_analisis" class="form-control"
                                    placeholder="Indikasi Nilai Liquidasi / Nilai Investasi / Nilai Sewa Pasar"
                                    value="{{ old('kdn_tabel_analisis', $data->kdn_tabel_analisis) }}" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat"><b>Koordinat Obyek</b></label>
                                <label for="alamat"><b>Alamat</b></label>
                                <input type="text" id="alamat" name="alamat" class="form-control mb-2"
                                    placeholder="jl sukasari kecamatan baleendah bandung"
                                    value="{{ old('alamat', $data->alamat) }}" readonly />
                                <div id="map" style="height: 400px; width: 100%;"></div>
                                <input type="text" id="lat" name="lat" class="form-control"
                                    placeholder="-8.9897878" value="{{ old('lat', $data->lat) }}" hidden />
                                <input type="text" id="long" name="long" class="form-control"
                                    placeholder="89.8477748" value="{{ old('long', $data->long) }}" hidden />
                            </div>
                            <div>
                                <label for="foto_tampak_depan"><b>Upload Foto Tampak Depan</b></label>
                                @if ($data->foto_tampak_depan)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $data->foto_tampak_depan) }}" alt="Tampak Depan"
                                            class="img-thumbnail" style="max-height: 150px">
                                    </div>
                                @endif
                                <input type="file" id="foto_tampak_depan" name="foto_tampak_depan"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="foto_tampak_sisi_kiri"><b>Upload Foto Tampak Sisi Kiri</b></label>
                                @if ($data->foto_tampak_sisi_kiri)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $data->foto_tampak_sisi_kiri) }}"
                                            alt="Tampak Sisi Kiri" class="img-thumbnail" style="max-height: 150px">
                                    </div>
                                @endif
                                <input type="file" id="foto_tampak_sisi_kiri" name="foto_tampak_sisi_kiri"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="foto_tampak_sisi_kanan"><b>Upload Foto Tampak Sisi Kanan</b></label>
                                @if ($data->foto_tampak_sisi_kanan)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $data->foto_tampak_sisi_kanan) }}"
                                            alt="Tampak Sisi Kanan" class="img-thumbnail" style="max-height: 150px">
                                    </div>
                                @endif
                                <input type="file" id="foto_tampak_sisi_kanan" name="foto_tampak_sisi_kanan"
                                    class="form-control" />
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Foto Lainnya"><b>Foto Lainnya</b></label>
                                <table class="table table-bordered" id="fotoLainnyaTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul Foto</th>
                                            <th>Upload Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data->foto_lainnya) && count(json_decode($data->foto_lainnya)) > 0)
                                            @foreach (json_decode($data->foto_lainnya) as $index => $foto)
                                                <tr>
                                                    <td class="row-number-foto">{{ $index + 1 }}</td>
                                                    <td>
                                                        <input type="text" name="judul_foto[]" class="form-control"
                                                            value="{{ $foto->judul }}" />
                                                        <input type="hidden" name="existing_foto[]"
                                                            value="{{ $foto->path }}" />
                                                    </td>
                                                    <td>
                                                        <div class="mb-2">
                                                            <img src="{{ asset('storage/' . $foto->path) }}"
                                                                alt="{{ $foto->judul }}" class="img-thumbnail"
                                                                style="max-height: 100px">
                                                        </div>
                                                        <input type="file" name="foto_lainnya[]" class="form-control"
                                                            accept="image/*" />
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm btn-action"
                                                            onclick="addFotoRow()">+</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-action"
                                                            onclick="removeFotoRow(this)">-</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="row-number-foto">1</td>
                                                <td><input type="text" name="judul_foto[]" class="form-control" />
                                                </td>
                                                <td><input type="file" name="foto_lainnya[]" class="form-control"
                                                        accept="image/*" /></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm btn-action"
                                                        onclick="addFotoRow()">+</button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-action"
                                                        onclick="removeFotoRow(this)">-</button>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Nilai Perolehan"><b>Nilai Perolehan / NJOP / PBB</b></label>
                                <table class="table table-bordered" id="njopTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Nilai Perolehan / NJOP (Rp)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data->njop_data) && count(json_decode($data->njop_data)) > 0)
                                            @foreach (json_decode($data->njop_data) as $index => $njop)
                                                <tr>
                                                    <td class="row-number">{{ $index + 1 }}</td>
                                                    <td><input type="number" name="tahun_njop[]" class="form-control"
                                                            value="{{ $njop->tahun }}" /></td>
                                                    <td><input type="number" name="nilai_njop[]" class="form-control"
                                                            value="{{ $njop->nilai }}" /></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm btn-action"
                                                            onclick="addNjopRow()">+</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-action"
                                                            onclick="removeNjopRow(this)">-</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="row-number">1</td>
                                                <td><input type="number" name="tahun_njop[]" class="form-control"
                                                        placeholder="2024" /></td>
                                                <td><input type="number" name="nilai_njop[]" class="form-control"
                                                        placeholder="4257000000" /></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm btn-action"
                                                        onclick="addNjopRow()">+</button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-action"
                                                        onclick="removeNjopRow(this)">-</button>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="narasumber"><b>Narasumber</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Nama Narasumber</b></th>
                                        <th><b>Telepon</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" id="nama_narsum" name="nama_narsum"
                                                class="form-control" placeholder="Bapak Ahmad Sudani"
                                                value="{{ old('nama_narsum', $data->nama_narsum) }}" /></td>
                                        <td><input type="number" id="telepon" name="telepon" class="form-control"
                                                placeholder="087654354243"
                                                value="{{ old('telepon', $data->telepon) }}" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <div>
                                    <label for="jenis_dok_hak_tanah"><b>Jenis Dokumen Hak Tanah</b></label>
                                    <select name="jenis_dok_hak_tanah" id="jenis_dok_hak_tanah" class="form-select">
                                        <option value="">Pilih..</option>
                                        <option value="Hak Milik" @if ($data->jenis_dok_hak_tanah == 'Hak Milik') selected @endif>Hak
                                            Milik
                                        </option>
                                        <option value="Hak Guna Bangunan"
                                            @if ($data->jenis_dok_hak_tanah == 'Hak Guna Bangunan') selected @endif>Hak
                                            Guna Bangunan</option>
                                        <option value="Hak Guna Usaha" @if ($data->jenis_dok_hak_tanah == 'Hak Guna Usaha') selected @endif>
                                            Hak
                                            Guna Usaha</option>
                                        <option value="Hak Pakai" @if ($data->jenis_dok_hak_tanah == 'Hak Pakai') selected @endif>Hak
                                            Pakai
                                        </option>
                                        <option value="Hak Milik Satuan Rumah Susun"
                                            @if ($data->jenis_dok_hak_tanah == 'Hak Milik Satuan Rumah Susun') selected @endif>Hak Milik Satuan Rumah Susun
                                        </option>
                                        <option value="Girik" @if ($data->jenis_dok_hak_tanah == 'Girik') selected @endif>Girik
                                        </option>
                                        <option value="Akad Jual Beli" @if ($data->jenis_dok_hak_tanah == 'Akad Jual Beli') selected @endif>
                                            Akad
                                            Jual Beli</option>
                                        <option value="Perjanjian Pengikatan Jual Beli"
                                            @if ($data->jenis_dok_hak_tanah == 'Perjanjian Pengikatan Jual Beli') selected @endif>Perjanjian Pengikatan Jual
                                            Beli
                                        </option>
                                        <option value="Surat Hijau" @if ($data->jenis_dok_hak_tanah == 'Surat Hijau') selected @endif>
                                            Surat
                                            Hijau</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mt-4">
                        <div class="col-12">
                            <div class="bg-section p-3 rounded">
                                <label for="perutuntukan_kawasan"><b>Peruntukan Kawasan</b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Zona Lindung</b></label>
                                        <select class="form-select" name="zona_lindung" id="zona_lindung">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Zona Hutan Lindung"
                                                @if ($data->zona_lindung == 'Zona Hutan Lindung') selected @endif>Zona Hutan Lindung
                                            </option>
                                            <option value="Zona Perlindungan Terhadap Kawasan Dibawahnya"
                                                @if ($data->zona_lindung == 'Zona Perlindungan Terhadap Kawasan Dibawahnya') selected @endif>Zona Perlindungan
                                                Terhadap
                                                Kawasan Dibawahnya</option>
                                            <option value="Zona Perlindungan Setempat"
                                                @if ($data->zona_lindung == 'Zona Perlindungan Setempat') selected @endif>Zona Perlindungan
                                                Setempat
                                            </option>
                                            <option value="Zona Ruang Terbuka Hijau"
                                                @if ($data->zona_lindung == 'Zona Ruang Terbuka Hijau') selected @endif>Zona Ruang Terbuka Hijau
                                            </option>
                                            <option value="Zona Suaka Alam dan Cagar Budaya"
                                                @if ($data->zona_lindung == 'Zona Suaka Alam dan Cagar Budaya') selected @endif>Zona Suaka Alam dan
                                                Cagar
                                                Budaya</option>
                                            <option value="Zona Rawan Bencana Alam"
                                                @if ($data->zona_lindung == 'Zona Rawan Bencana Alam') selected @endif>Zona Rawan Bencana Alam
                                            </option>
                                            <option value="Zona Lainnya"
                                                @if ($data->zona_lindung == 'Zona Lainnya') selected @endif>
                                                Zona Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Zona Budi Daya</b></label>
                                        <select class="form-select" name="zona_budidaya" id="zona_budidaya">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Zona Perumahan"
                                                @if ($data->zona_budidaya == 'Zona Perumahan') selected @endif>
                                                Zona Perumahan</option>
                                            <option value="Zona Perdagangan dan Jasa"
                                                @if ($data->zona_budidaya == 'Zona Perdagangan dan Jasa') selected @endif>Zona Perdagangan dan
                                                Jasa
                                            </option>
                                            <option value="Zona Perkantoran"
                                                @if ($data->zona_budidaya == 'Zona Perkantoran') selected @endif>Zona Perkantoran
                                            </option>
                                            <option value="Zona Sarana Pelayanan Umum"
                                                @if ($data->zona_budidaya == 'Zona Sarana Pelayanan Umum') selected @endif>Zona Sarana Pelayanan
                                                Umum
                                            </option>
                                            <option value="Zona Indiustri"
                                                @if ($data->zona_budidaya == 'Zona Indiustri') selected @endif>
                                                Zona Indiustri</option>
                                            <option value="Zona Ruang Terbuka Non Hijau"
                                                @if ($data->zona_budidaya == 'Zona Ruang Terbuka Non Hijau') selected @endif>Zona Ruang Terbuka Non
                                                Hijau
                                            </option>
                                            <option value="Zona Peruntukan Lainnya"
                                                @if ($data->zona_budidaya == 'Zona Peruntukan Lainnya') selected @endif>Zona Peruntukan Lainnya
                                            </option>
                                            <option value="Zona Peruntukan Khusus"
                                                @if ($data->zona_budidaya == 'Zona Peruntukan Khusus') selected @endif>Zona Peruntukan Khusus
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="jenis_data"><b>Jenis Data</b></label>
                            <select class="form-select" name="jenis_data" id="jenis_data">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Penawaran" @if ($data->jenis_data == 'Penawaran') selected @endif>Penawaran
                                </option>
                                <option value="Transaksi" @if ($data->jenis_data == 'Transaksi') selected @endif>Transaksi
                                </option>
                                <option value="Price on Offer" @if ($data->jenis_data == 'Price on Offer') selected @endif>Price on
                                    Offer</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="tgl_penawaran"><b>Tanggal Penawaran / Waktu Transaksi</b></label>
                            <input type="datetime-local" id="tgl_penawaran" name="tgl_penawaran" class="form-control"
                                value="{{ old('tgl_penawaran', $data->tgl_penawaran) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="sumber_data"><b>Sumber Data</b></label>
                            <select class="form-select" name="sumber_data" id="sumber_data">
                                <option value="" disabled selected>Pilih sumber data</option>
                                <option value="Pemilik" @if ($data->sumber_data == 'Pemilik') selected @endif>Pemilik
                                </option>
                                <option value="Perorangan" @if ($data->sumber_data == 'Perorangan') selected @endif>Perorangan
                                </option>
                                <option value="Agen" @if ($data->sumber_data == 'Agen') selected @endif>Agen</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="luas_tanah"><b>Luas Tanah (m²)</b></label>
                            <input type="number" id="luas_tanah" name="luas_tanah" class="form-control"
                                value="{{ old('luas_tanah', $data->luas_tanah) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="luas_tanah_terpotong"><b>Luas Tanah Terpotong (m²)</b></label>
                            <input type="number" id="luas_tanah_terpotong" name="luas_tanah_terpotong"
                                class="form-control"
                                value="{{ old('luas_tanah_terpotong', $data->luas_tanah_terpotong) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="luas_bangunan"><b>Luas Bangunan Terpotong (m²)</b></label>
                            <input type="number" id="luas_bangunan" name="luas_bangunan" class="form-control"
                                value="{{ old('luas_bangunan', $data->luas_bangunan) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="harga_penawaran"><b>Harga Penawaran/Transaksi (Rp)</b></label>
                            <input type="number" id="harga_penawaran" name="harga_penawaran" class="form-control"
                                value="{{ old('harga_penawaran', $data->harga_penawaran) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="diskon"><b>Diskon (%)</b></label>
                            <input type="number" id="diskon" name="diskon" class="form-control"
                                value="{{ old('diskon', $data->diskon) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="harga_sewa_per_tahun"><b>Harga Sewa per Tahun (Rp/tahun)</b></label>
                            <input type="number" id="harga_sewa_per_tahun" name="harga_sewa_per_tahun"
                                class="form-control"
                                value="{{ old('harga_sewa_per_tahun', $data->harga_sewa_per_tahun) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="skrap"><b>Skrap / Nilai Sisa (%)</b></label>
                            <input type="number" id="skrap" name="skrap" class="form-control"
                                value="{{ old('skrap', $data->skrap) }}" />
                        </div>

                        <div class="col-12">
                            <div class="bg-section p-3 rounded">
                                <label for="penyusutan"><b>Penyusutan</b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Kemunduran Fungsi (%)</b></label>
                                        <input type="number" id="kemunduran_fungsi" name="kemunduran_fungsi"
                                            value="{{ old('kemunduran_fungsi', $data->kemunduran_fungsi ?? 0) }}"
                                            class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Penjelasan Kemunduran Fungsi</b></label>
                                        <textarea class="form-control" name="penjelasan_kemunduran_fungsi" id="penjelasan_kemunduran_fungsi">{{ old('penjelasan_kemunduran_fungsi', $data->penjelasan_kemunduran_fungsi) }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label><b>Kemunduran Ekonomis (%)</b></label>
                                        <input type="number" id="kemunduran_ekonomis" name="kemunduran_ekonomis"
                                            value="{{ old('kemunduran_ekonomis', $data->kemunduran_ekonomis ?? 0) }}"
                                            class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Penjelasan Kemunduran Ekonomis</b></label>
                                        <textarea class="form-control" name="penjelasan_kemunduran_ekonomis" id="penjelasan_kemunduran_ekonomis">{{ old('penjelasan_kemunduran_ekonomis', $data->penjelasan_kemunduran_ekonomis) }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label><b>Maintenance (%)</b></label>
                                        <input type="number" id="maintenance" name="maintenance"
                                            value="{{ old('maintenance', $data->maintenance ?? 0) }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="bg-section p-3 rounded">
                                <label for="penyesuaian_elemen_perbandingan"><b>Penyesuaian Elemen Perbandingan</b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Syarat Pembiayaan Batasan dilakukan pelunasan pembayaran
                                                (Kelunakan)</b></label>
                                        <select class="form-select" name="pep_pembiayaan" id="pep_pembiayaan">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Tunai" @if ($data->pep_pembiayaan == 'Tunai') selected @endif>
                                                Tunai
                                            </option>
                                            <option value="Kredit" @if ($data->pep_pembiayaan == 'Kredit') selected @endif>
                                                Kredit
                                            </option>
                                            <option value="Bertahap" @if ($data->pep_pembiayaan == 'Bertahap') selected @endif>
                                                Bertahap</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Kondisi Penjualan Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan
                                                Kondisi Pemaksa</b></label>
                                        <select class="form-select" name="pep_penjualan" id="pep_penjualan">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Normal" @if ($data->pep_penjualan == 'Normal') selected @endif>
                                                Normal
                                            </option>
                                            <option value="Jual Cepat" @if ($data->pep_penjualan == 'Jual Cepat') selected @endif>
                                                Jual
                                                Cepat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label><b>Pengeluaran yang dilakukan segera setelah pembelian Biaya yang harus
                                                segera
                                                dikeluarkan untuk mengembalikan objek ke fungsi atau peruntukan awal atau
                                                seharusnya</b></label>
                                        <input type="text" id="pep_pengeluaran" name="pep_pengeluaran"
                                            placeholder="Tidak Ada" class="form-control"
                                            value="{{ old('pep_pengeluaran', $data->pep_pengeluaran) }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Kondisi Pasar Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya
                                                harga
                                                penawaran (Menggunakan Indikator Waktu Penawaran / Transaksi)</b></label>
                                        <input type="text" id="pep_pasar" name="pep_pasar" placeholder="Normal"
                                            class="form-control" value="{{ old('pep_pasar', $data->pep_pasar) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="bg-section p-3 rounded">
                                <label for="penggunaan"><b>Penggunaan</b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Koefisien Dasar Bangunan (KDB) (%)</b></label>
                                        <input type="number" id="koefisien_dasar_bangunan"
                                            name="koefisien_dasar_bangunan" class="form-control"
                                            value="{{ old('koefisien_dasar_bangunan', $data->koefisien_dasar_bangunan) }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Koefisien Lantai Bangunan (KLB) (kali)</b></label>
                                        <input type="number" id="koefisien_lantai_bangunan"
                                            name="koefisien_lantai_bangunan" class="form-control"
                                            value="{{ old('koefisien_lantai_bangunan', $data->koefisien_lantai_bangunan) }}" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label><b>Garis Sempadan Bangunan (GSB) (meter)</b></label>
                                        <input type="number" id="garis_sempadan_bangunan" name="garis_sempadan_bangunan"
                                            class="form-control"
                                            value="{{ old('garis_sempadan_bangunan', $data->garis_sempadan_bangunan) }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Ketinggian (lantai)</b></label>
                                        <input type="number" id="ketinggian" name="ketinggian" class="form-control"
                                            value="{{ old('ketinggian', $data->ketinggian) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="row_jalan"><b>Row Jalan (m)</b></label>
                            <input type="number" id="row_jalan" name="row_jalan" class="form-control"
                                value="{{ old('row_jalan', $data->row_jalan) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="tipe_jalan"><b>Tipe Jalan</b></label>
                            <input type="text" id="tipe_jalan" name="tipe_jalan" class="form-control"
                                value="{{ old('tipe_jalan', $data->tipe_jalan) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="kapasitas_jalan"><b>Kapasitas Jalan</b></label>
                            <input type="text" id="kapasitas_jalan" name="kapasitas_jalan" class="form-control"
                                value="{{ old('kapasitas_jalan', $data->kapasitas_jalan) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="pengguna_lahan_lingkungan_eksisting"><b>Penggunaan Lahan Lingkungan
                                    Eksisting</b></label>
                            <select class="form-select" name="pengguna_lahan_lingkungan_eksisting"
                                id="pengguna_lahan_lingkungan_eksisting">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Pemukiman/Perumahan" @if ($data->pengguna_lahan_lingkungan_eksisting == 'Pemukiman/Perumahan') selected @endif>
                                    Pemukiman/Perumahan</option>
                                <option value="Campuran" @if ($data->pengguna_lahan_lingkungan_eksisting == 'Campuran') selected @endif>Campuran
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="letak_posisi_obyek"><b>Letak / Posisi Obyek</b></label>
                            <select name="letak_posisi_obyek" id="letak_posisi_obyek" class="form-select">
                                <option value="">Pilih...</option>
                                <option value="Kuldesak" @if ($data->letak_posisi_obyek == 'Kuldesak') selected @endif>Kuldesak
                                </option>
                                <option value="Interior" @if ($data->letak_posisi_obyek == 'Interior') selected @endif>Interior
                                </option>
                                <option value="Tusuk Sate" @if ($data->letak_posisi_obyek == 'Tusuk Sate') selected @endif>Tusuk Sate
                                </option>
                                <option value="Sudut(Corner)" @if ($data->letak_posisi_obyek == 'Sudut(Corner)') selected @endif>
                                    Sudut(Corner)
                                </option>
                                <option value="Key" @if ($data->letak_posisi_obyek == 'Key') selected @endif>Key</option>
                                <option value="Flag" @if ($data->letak_posisi_obyek == 'Flag') selected @endif>Flag</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="lokasi_aset"><b>Lokasi Aset</b></label>
                            <select class="form-select" name="lokasi_aset" id="lokasi_aset">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Depan" @if ($data->lokasi_aset == 'Depan') selected @endif>Depan</option>
                                <option value="Tengah" @if ($data->lokasi_aset == 'Tengah') selected @endif>Tengah</option>
                                <option value="Belakang" @if ($data->lokasi_aset == 'Belakang') selected @endif>Belakang
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Informasi Tanah dan Lingkungan -->
                    <div class="row g-3 mt-4">

                        <div class="col-md-6">
                            <label for="bentuk_tanah"><b>Bentuk Tanah</b></label>
                            <select name="bentuk_tanah" id="bentuk_tanah" class="form-select">
                                <option value="">Pilih...</option>
                                <option value="Beraturan" @if ($data->bentuk_tanah == 'Beraturan') selected @endif>Beraturan
                                </option>
                                <option value="Tidak Beraturan" @if ($data->bentuk_tanah == 'Tidak Beraturan') selected @endif>Tidak
                                    Beraturan</option>
                                <option value="Persegi Panjang" @if ($data->bentuk_tanah == 'Persegi Panjang') selected @endif>Persegi
                                    Panjang</option>
                                <option value="Persegi Empat" @if ($data->bentuk_tanah == 'Persegi Empat') selected @endif>Persegi
                                    Empat
                                </option>
                                <option value="Lainnya" @if ($data->bentuk_tanah == 'Lainnya') selected @endif>Lainnya
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="lebar_muka_tanah"><b>Lebar Muka Tanah (m)</b></label>
                            <input type="number" id="lebar_muka_tanah" name="lebar_muka_tanah" class="form-control"
                                value="{{ old('lebar_muka_tanah', $data->lebar_muka_tanah) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="ketinggian_tanah_dr_muka_jln"><b>Ketinggian Tanah dari Muka Jalan (m)</b></label>
                            <input type="number" id="ketinggian_tanah_dr_muka_jln" name="ketinggian_tanah_dr_muka_jln"
                                class="form-control"
                                value="{{ old('ketinggian_tanah_dr_muka_jln', $data->ketinggian_tanah_dr_muka_jln) }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="topografi"><b>Topografi / Elevasi</b></label>
                            <select class="form-select" name="topografi" id="topografi">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Rata" @if ($data->topografi == 'Rata') selected @endif>Rata</option>
                                <option value="Bergelombang" @if ($data->topografi == 'Bergelombang') selected @endif>
                                    Bergelombang
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="tingkat_hunian"><b>Tingkat Hunian (%)</b></label>
                            <input type="number" id="tingkat_hunian" name="tingkat_hunian" class="form-control"
                                value="{{ old('tingkat_hunian', $data->tingkat_hunian) }}" />
                        </div>

                        <div class="col-12 mt-3">
                            <label><b>Kondisi Lingkungan Khusus</b></label><br>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="bebas_banjir" name="kondisi_lingkungan_khusus[]"
                                            value="Bebas Banjir" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Bebas Banjir', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="bebas_banjir">Bebas Banjir</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="banjir_musiman" name="kondisi_lingkungan_khusus[]"
                                            value="Banjir Musiman" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Banjir Musiman', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="banjir_musiman">Banjir Musiman</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="rawan_banjir" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Banjir" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Rawan Banjir', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="rawan_banjir">Rawan Banjir</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="rawan_kebakaran" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Kebakaran" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Rawan Kebakaran', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="rawan_kebakaran">Rawan Kebakaran</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="rawan_bencana_alam" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Bencana Alam" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Rawan Bencana Alam', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="rawan_bencana_alam">Rawan Bencana
                                            Alam</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="rawan_huru_hara" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Huru-hara" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Rawan Huru-hara', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="rawan_huru_hara">Rawan Huru-hara</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_kuburan" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Kuburan" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Kuburan', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_kuburan">Dekat Kuburan</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_sekolahan" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Sekolahan/Pasar"
                                            @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Sekolahan/Pasar', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_sekolahan">Dekat
                                            Sekolahan/Pasar</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="lokasi_tusuk_sate" name="kondisi_lingkungan_khusus[]"
                                            value="Lokasi Tusuk Sate" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Lokasi Tusuk Sate', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="lokasi_tusuk_sate">Lokasi Tusuk Sate</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_tempat_ibadah"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Tempat Ibadah"
                                            @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Tempat Ibadah', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_tempat_ibadah">Dekat Tempat
                                            Ibadah</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_bangunan_liar"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Kumpulan Bangunan Liar"
                                            @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Kumpulan Bangunan Liar', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_bangunan_liar">Dekat Kumpulan Bangunan
                                            Liar</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_jurang" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Jurang/ Rawan Longsor"
                                            @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Jurang/ Rawan Longsor', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_jurang">Dekat Jurang/ Rawan
                                            Longsor</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_pasar" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Pasar" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Pasar', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_pasar">Dekat Pasar</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_tegangan_tinggi"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Tegangan Tinggi"
                                            @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Tegangan Tinggi', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_tegangan_tinggi">Dekat Tegangan
                                            Tinggi</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_terminal" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Terminal" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Terminal', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_terminal">Dekat Terminal</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="dekat_saluran_irigasi"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Saluran Irigasi"
                                            @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Dekat Saluran Irigasi', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="dekat_saluran_irigasi">Dekat Saluran
                                            Irigasi</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="lainnya" name="kondisi_lingkungan_khusus[]"
                                            value="Lainnya" @if (is_array(json_decode($data->kondisi_lingkungan_khusus)) &&
                                                    in_array('Lainnya', json_decode($data->kondisi_lingkungan_khusus))) checked @endif>
                                        <label class="form-check-label" for="lainnya">Lainnya</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="lainnyaInputContainer" class="col-12 mt-2"
                            @if (
                                !is_array(json_decode($data->kondisi_lingkungan_khusus)) ||
                                    !in_array('Lainnya', json_decode($data->kondisi_lingkungan_khusus))) style="display: none;" @endif>
                            <label for="kondisi_lingkungan_lainnya"><b>Kondisi Lingkungan Lainnya</b></label>
                            <input type="text" id="kondisi_lingkungan_lainnya" name="kondisi_lingkungan_lainnya"
                                class="form-control"
                                value="{{ old('kondisi_lingkungan_lainnya', $data->kondisi_lingkungan_lainnya) }}" />
                        </div>

                        <div class="col-12 mt-3">
                            <label for="keterangan_tambahan_lainnya"><b>Keterangan Tambahan Lainnya</b></label>
                            <textarea class="form-control" name="keterangan_tambahan_lainnya" id="keterangan_tambahan_lainnya" rows="3">{{ old('keterangan_tambahan_lainnya', $data->keterangan_tambahan_lainnya) }}</textarea>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="bg-section p-3 rounded">
                                <label for="karakteristik_ekonomi"><b>Karakteristik Ekonomi (Jika objek yang dinilai adalah
                                        Properti Komersial)</b></label>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label><b>Kualitas Pendapatan</b></label>
                                        <select class="form-select" name="kualitas_pendapatan" id="kualitas_pendapatan">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Rendah" @if ($data->kualitas_pendapatan == 'Rendah') selected @endif>
                                                Rendah
                                            </option>
                                            <option value="Sedang" @if ($data->kualitas_pendapatan == 'Sedang') selected @endif>
                                                Sedang
                                            </option>
                                            <option value="Tinggi" @if ($data->kualitas_pendapatan == 'Tinggi') selected @endif>
                                                Tinggi
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Biaya Operasional</b></label>
                                        <select class="form-select" name="biaya_opreasional_ekonomi"
                                            id="biaya_opreasional_ekonomi">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Rendah" @if ($data->biaya_opreasional_ekonomi == 'Rendah') selected @endif>
                                                Rendah
                                            </option>
                                            <option value="Normal" @if ($data->biaya_opreasional_ekonomi == 'Normal') selected @endif>
                                                Normal
                                            </option>
                                            <option value="Tinggi" @if ($data->biaya_opreasional_ekonomi == 'Tinggi') selected @endif>
                                                Tinggi
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label><b>Ketentuan Sewa</b></label>
                                        <select class="form-select" name="ketentuan_sewa" id="ketentuan_sewa">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Mudah" @if ($data->ketentuan_sewa == 'Mudah') selected @endif>
                                                Mudah
                                            </option>
                                            <option value="Normal" @if ($data->ketentuan_sewa == 'Normal') selected @endif>
                                                Normal
                                            </option>
                                            <option value="Ketat" @if ($data->ketentuan_sewa == 'Ketat') selected @endif>
                                                Ketat
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Manajemen</b></label>
                                        <select class="form-select" name="manajemen" id="manajemen">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Kecil" @if ($data->manajemen == 'Kecil') selected @endif>
                                                Kecil
                                            </option>
                                            <option value="Menengah" @if ($data->manajemen == 'Menengah') selected @endif>
                                                Menengah</option>
                                            <option value="Besar" @if ($data->manajemen == 'Besar') selected @endif>
                                                Besar
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label><b>Bauran Penyewa</b></label>
                                        <select class="form-select" name="bauran_penyewa" id="bauran_penyewa">
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="Terbatas" @if ($data->bauran_penyewa == 'Terbatas') selected @endif>
                                                Terbatas</option>
                                            <option value="Normal" @if ($data->bauran_penyewa == 'Normal') selected @endif>
                                                Normal
                                            </option>
                                            <option value="Beragam" @if ($data->bauran_penyewa == 'Beragam') selected @endif>
                                                Beragam
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="bg-section p-3 rounded">
                                <label for="kmpn_dlm_penjualan"><b>Komponen Non-Realty dalam Penjualan</b></label>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label><b>FFE</b></label>
                                        <input type="number" id="ffe" name="ffe" class="form-control"
                                            value="{{ old('ffe', $data->ffe) }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Biaya Operasional</b></label>
                                        <input type="number" id="biaya_operasional" name="biaya_operasional"
                                            class="form-control"
                                            value="{{ old('biaya_operasional', $data->biaya_operasional) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="bg-section p-3 rounded">
                                <label for="gambaran_object_thd_lingkungan"><b>Gambaran Objek terhadap Wilayah dan
                                        Lingkungan</b></label>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label><b>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Kota. Nama Pusat Kota /
                                                Jarak</b></label>
                                        <input type="text" id="nm_pusat_kota" name="nm_pusat_kota"
                                            placeholder="Nama pusat kota / Jarak" class="form-control"
                                            value="{{ old('nm_pusat_kota', $data->nm_pusat_kota) }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Ekonomi terdekat (Pasar Mall).
                                                Nama Pusat Ekonomi / Jarak</b></label>
                                        <input type="text" id="nm_pusat_ekonomi" name="nm_pusat_ekonomi"
                                            placeholder="Nama pusat ekonomi / Jarak" class="form-control"
                                            value="{{ old('nm_pusat_ekonomi', $data->nm_pusat_ekonomi) }}" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label><b>Jarak dengan CBD (Pusat Ekonomi) dari Jalan Utama terdekat. Nama Jalan /
                                                Jarak</b></label>
                                        <input type="text" id="nm_jalan" name="nm_jalan"
                                            placeholder="Nama jalan / Jarak" class="form-control"
                                            value="{{ old('nm_jalan', $data->nm_jalan) }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Kondisi Lingkungan Khusus yang mempengaruhi Nilai</b></label>
                                        <input type="text" id="kondisi_lingkungan" name="kondisi_lingkungan"
                                            class="form-control"
                                            value="{{ old('kondisi_lingkungan', $data->kondisi_lingkungan) }}" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label><b>Faktor View (Pemandangan) untuk Properti yang faktor view dimungkinkan
                                                sangat
                                                berpengaruh pada nilai (contoh: apartemen, vila, dll)</b></label>
                                        <input type="text" id="pemandangan" name="pemandangan" class="form-control"
                                            value="{{ old('pemandangan', $data->pemandangan) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="keterangan_jarak_dr_bca"><b>Keterangan jarak dengan BCA terdekat (jika
                                    BCA)</b></label>
                            <div>
                                <small><i>Cantumkan jarak dan nama kantor cabang</i></small>
                            </div>
                            <input type="text" id="keterangan_jarak_dr_bca" name="keterangan_jarak_dr_bca"
                                placeholder="± 1,4 Km (Bank BCA KCU Purwodadi)" class="form-control"
                                value="{{ old('keterangan_jarak_dr_bca', $data->keterangan_jarak_dr_bca) }}" />
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="bentuk_bangunan"><b>Bentuk Bangunan</b></label>
                            <select class="form-select" name="bentuk_bangunan" id="bentuk_bangunan">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Bertingkat" @if ($data->bentuk_bangunan == 'Bertingkat') selected @endif>Bertingkat
                                </option>
                                <option value="Tidak Bertingkat" @if ($data->bentuk_bangunan == 'Tidak Bertingkat') selected @endif>Tidak
                                    Bertingkat</option>
                            </select>
                        </div>
                    </div>

                    <!-- Informasi Konstruksi Bangunan -->
                    <div class="row g-3 mt-4">
                        <div class="col-12">
                            <h5>Informasi Konstruksi Bangunan</h5>
                            <hr>
                        </div>

                        <div class="col-md-6">
                            <label for="jumlah_lantai"><b>Jumlah Lantai</b></label>
                            <input type="number" id="jumlah_lantai" name="jumlah_lantai" class="form-control"
                                value="{{ old('jumlah_lantai', $data->jumlah_lantai ?? 1) }}" min="1">
                        </div>

                        <div class="col-md-6">
                            <label for="basement"><b>Basement</b></label>
                            <select class="form-select" name="basement" id="basement">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Ada Basement" @if ($data->basement == 'Ada Basement') selected @endif>Ada
                                    Basement
                                </option>
                                <option value="Tidak Ada Basement" @if ($data->basement == 'Tidak Ada Basement') selected @endif>
                                    Tidak
                                    Ada Basement</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="kontruksi_bangunan"><b>Kontruksi Bangunan</b></label>
                            <select class="form-select" name="kontruksi_bangunan" id="kontruksi_bangunan">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Permanen" @if ($data->kontruksi_bangunan == 'Permanen') selected @endif>Permanen
                                </option>
                                <option value="Semi Permanen" @if ($data->kontruksi_bangunan == 'Semi Permanen') selected @endif>Semi
                                    Permanen
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="kontruksi_lantai"><b>Kontruksi Lantai</b></label>
                            <select class="form-select" name="kontruksi_lantai" id="kontruksi_lantai">
                                <option value="" selected>Pilih...</option>
                                <option value="Keramik" @if ($data->kontruksi_lantai == 'Keramik') selected @endif>Keramik
                                </option>
                                <option value="Marmer" @if ($data->kontruksi_lantai == 'Marmer') selected @endif>Marmer</option>
                                <option value="Ubin" @if ($data->kontruksi_lantai == 'Ubin') selected @endif>Ubin</option>
                                <option value="Tanah" @if ($data->kontruksi_lantai == 'Tanah') selected @endif>Tanah</option>
                                <option value="Teraso" @if ($data->kontruksi_lantai == 'Teraso') selected @endif>Teraso</option>
                                <option value="Granit" @if ($data->kontruksi_lantai == 'Granit') selected @endif>Granit
                                </option>
                                <option value="Semen" @if ($data->kontruksi_lantai == 'Semen') selected @endif>Semen</option>
                                <option value="Rabat Beton" @if ($data->kontruksi_lantai == 'Rabat Beton') selected @endif>Rabat
                                    Beton
                                </option>
                                <option value="Flooring Kayu" @if ($data->kontruksi_lantai == 'Flooring Kayu') selected @endif>
                                    Flooring
                                    Kayu</option>
                                <option value="Lainnya" @if ($data->kontruksi_lantai == 'Lainnya') selected @endif>Lainnya
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="kontruksi_dinding"><b>Kontruksi Dinding</b></label>
                            <select class="form-select" name="kontruksi_dinding" id="kontruksi_dinding">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Bata" @if ($data->kontruksi_dinding == 'Bata') selected @endif>Bata</option>
                                <option value="Batako" @if ($data->kontruksi_dinding == 'Batako') selected @endif>Batako
                                </option>
                                <option value="Kaca" @if ($data->kontruksi_dinding == 'Kaca') selected @endif>Kaca</option>
                                <option value="Beton Ringan" @if ($data->kontruksi_dinding == 'Beton Ringan') selected @endif>Beton
                                    Ringan
                                </option>
                                <option value="Beton" @if ($data->kontruksi_dinding == 'Beton') selected @endif>Beton</option>
                                <option value="Lainnya" @if ($data->kontruksi_dinding == 'Lainnya') selected @endif>Lainnya
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="kontruksi_atap"><b>Kontruksi atap</b></label>
                            <select class="form-select" name="kontruksi_atap" id="kontruksi_atap">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Genteng Beton" @if ($data->kontruksi_atap == 'Genteng Beton') selected @endif>Genteng
                                    Beton</option>
                                <option value="Genteng Baja" @if ($data->kontruksi_atap == 'Genteng Baja') selected @endif>Genteng
                                    Baja
                                </option>
                                <option value="Genteng Sirap" @if ($data->kontruksi_atap == 'Genteng Sirap') selected @endif>Genteng
                                    Sirap</option>
                                <option value="Genteng Jawa" @if ($data->kontruksi_atap == 'Genteng Jawa') selected @endif>Genteng
                                    Jawa
                                </option>
                                <option value="Asbes" @if ($data->kontruksi_atap == 'Asbes') selected @endif>Asbes</option>
                                <option value="Seng" @if ($data->kontruksi_atap == 'Seng') selected @endif>Seng</option>
                                <option value="Dak Beton" @if ($data->kontruksi_atap == 'Dak Beton') selected @endif>Dak Beton
                                </option>
                                <option value="Galvalum" @if ($data->kontruksi_atap == 'Galvalum') selected @endif>Galvalum
                                </option>
                                <option value="Lainnya" @if ($data->kontruksi_atap == 'Lainnya') selected @endif>Lainnya
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="kontruksi_pondasi"><b>Kontruksi Pondasi</b></label>
                            <select class="form-select" name="kontruksi_pondasi" id="kontruksi_pondasi">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Beton Bertulang" @if ($data->kontruksi_pondasi == 'Beton Bertulang') selected @endif>Beton
                                    Bertulang</option>
                                <option value="Pasangan Batu Kali" @if ($data->kontruksi_pondasi == 'Pasangan Batu Kali') selected @endif>
                                    Pasangan Batu Kali</option>
                                <option value="Umpak" @if ($data->kontruksi_pondasi == 'Umpak') selected @endif>Umpak</option>
                                <option value="Rolag Bata" @if ($data->kontruksi_pondasi == 'Rolag Bata') selected @endif>Rolag Bata
                                </option>
                                <option value="Kayu" @if ($data->kontruksi_pondasi == 'Kayu') selected @endif>Kayu</option>
                                <option value="Lainnya" @if ($data->kontruksi_pondasi == 'Lainnya') selected @endif>Lainnya
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="versi_btb"><b>Versi BTB</b></label>
                            <div>
                                <small><i>Mengupdate versi BTB akan mengubah tipe material bangunan. Mohon periksa
                                        kembali bobot material pada kotak-kotak isian dibawah ini sebelum menyimpan
                                        form.</i></small>
                            </div>
                            <?php
                            $currentYear = date('Y');
                            ?>
                            <select class="form-select" name="versi_btb" id="versi_btb">
                                <?php
                                for ($i = 0; $i < 5; $i++) {
                                    $year = $currentYear - $i;
                                    $selected = $data->versi_btb == $year ? 'selected' : '';
                                    echo "<option value='$year' $selected>$year</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="tipe_spek"><b>Tipikal Bangunan Sesuai Spek BTB MAPPI </b> <span
                                    class="text-danger">*</span></label>
                            <select id="tipe_spek" name="tipe_spek" class="form-select" required>
                                <option value="">- Select -</option>
                                <option value="100" @if ($data->tipe_spek == '100') selected @endif>Rumah Tinggal
                                    Sederhana 1 Lantai</option>
                                <option value="200" @if ($data->tipe_spek == '200') selected @endif>Rumah Tinggal
                                    Menengah 2 Lantai</option>
                                <option value="300" @if ($data->tipe_spek == '300') selected @endif>Rumah Tinggal
                                    Mewah 2 Lantai</option>
                                <option value="400" @if ($data->tipe_spek == '400') selected @endif>Bangunan
                                    Perkebunan (Semi Permanen) 1 Lantai</option>
                                <option value="500" @if ($data->tipe_spek == '500') selected @endif>Bangunan
                                    Gudang 1
                                    Lantai</option>
                                <option value="600" @if ($data->tipe_spek == '600') selected @endif>Bangunan
                                    Gedung
                                    Bertingkat Rendah 3 Lantai (&lt;5 Lantai)</option>
                                <option value="700" @if ($data->tipe_spek == '700') selected @endif>Bangunan
                                    Gedung
                                    Bertingkat Sedang 8 Lantai + 1 Basement (5-8 Lantai)</option>
                                <option value="800" @if ($data->tipe_spek == '800') selected @endif>Bangunan
                                    Gedung
                                    Bertingkat Tinggi 16 Lantai + 2 Basement (&gt;8 Lantai)</option>
                                <option value="900" @if ($data->tipe_spek == '900') selected @endif>Bangunan Mall
                                    4
                                    Lantai + 1 Basement</option>
                                <option value="1000" @if ($data->tipe_spek == '1000') selected @endif>Bangunan Hotel
                                    8
                                    Lantai</option>
                                <option value="1100" @if ($data->tipe_spek == '1100') selected @endif>Bangunan
                                    Apartemen
                                    14 Lantai + 2 Semi Basement</option>
                            </select>
                        </div>

                        <script>
                            // Fungsi untuk menangani perubahan dropdown
                            document.addEventListener('DOMContentLoaded', function() {
                                const tipeSpekSelect = document.getElementById('tipe_spek');

                                tipeSpekSelect.addEventListener('change', function() {
                                    const selectedValue = this.value;

                                    // Sembunyikan semua form terlebih dahulu
                                    document.querySelectorAll(
                                        '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                                    ).forEach(form => {
                                        form.style.display = 'none';
                                    });

                                    // Tampilkan form yang sesuai dengan pilihan
                                    if (selectedValue) {
                                        const formToShow = document.getElementById(selectedValue);
                                        if (formToShow) {
                                            formToShow.style.display = 'block';
                                        }
                                    }
                                });

                                // Trigger change event untuk menampilkan form yang sesuai saat halaman dimuat
                                if (tipeSpekSelect.value) {
                                    tipeSpekSelect.dispatchEvent(new Event('change'));
                                }
                            });
                        </script>

                        <div id="dynamic-content">
                            @include('content.form.100')
                            @include('content.form.200')
                            @include('content.form.300')
                            @include('content.form.400')
                            @include('content.form.500')
                            @include('content.form.600')
                            @include('content.form.700')
                            @include('content.form.800')
                            @include('content.form.900')
                            @include('content.form.1000')
                            @include('content.form.1100')
                        </div>

                        <div class="col-12 mt-3">
                            <label for="penggunaan_bangunan"><b>Penggunaan Bangunan Saat Ini</b></label>
                            <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan"
                                class="form-control" value="{{ old('penggunaan_bangunan', $data->penggunaan_bangunan) }}"
                                placeholder="Disewakan, Selama berapa tahun">
                        </div>

                        <div class="col-12 mt-3">
                            <label><b>Perlengkapan Bangunan</b></label><br>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="listrik" name="perlengkapan_bangunan[]"
                                            value="listrik" @if (is_array(json_decode($data->perlengkapan_bangunan)) &&
                                                    in_array('listrik', json_decode($data->perlengkapan_bangunan))) checked @endif>
                                        <label class="form-check-label" for="listrik">Listrik</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="telepon_rumah" name="perlengkapan_bangunan[]"
                                            value="telepon" @if (is_array(json_decode($data->perlengkapan_bangunan)) &&
                                                    in_array('telepon', json_decode($data->perlengkapan_bangunan))) checked @endif>
                                        <label class="form-check-label" for="telepon_rumah">Telepon</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="pdam" name="perlengkapan_bangunan[]"
                                            value="pdam" @if (is_array(json_decode($data->perlengkapan_bangunan)) && in_array('pdam', json_decode($data->perlengkapan_bangunan))) checked @endif>
                                        <label class="form-check-label" for="pdam">PDAM</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="gas" name="perlengkapan_bangunan[]"
                                            value="gas" @if (is_array(json_decode($data->perlengkapan_bangunan)) && in_array('gas', json_decode($data->perlengkapan_bangunan))) checked @endif>
                                        <label class="form-check-label" for="gas">Gas</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="ac" name="perlengkapan_bangunan[]"
                                            value="ac" @if (is_array(json_decode($data->perlengkapan_bangunan)) && in_array('ac', json_decode($data->perlengkapan_bangunan))) checked @endif>
                                        <label class="form-check-label" for="ac">AC</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" id="sumur" name="perlengkapan_bangunan[]"
                                            value="sumur" @if (is_array(json_decode($data->perlengkapan_bangunan)) && in_array('sumur', json_decode($data->perlengkapan_bangunan))) checked @endif>
                                        <label class="form-check-label" for="sumur">Sumur Gali/Pompa</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="progres_pembangunan"><b>Progres Pembangunan jika aset dalam proses (dalam
                                    persen)</b></label>
                            <input type="number" id="progres_pembangunan" name="progres_pembangunan"
                                class="form-control" value="{{ old('progres_pembangunan', $data->progres_pembangunan) }}"
                                placeholder="Masukkan nilai dalam persen" min="0" max="100">
                        </div>

                        <div class="col-md-6">
                            <label for="kondisi_bangunan"><b>Kondisi Bangunan</b></label>
                            <select class="form-select" name="kondisi_bangunan" id="kondisi_bangunan">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Terawat" @if ($data->kondisi_bangunan == 'Terawat') selected @endif>Terawat
                                </option>
                                <option value="Tidak Terawat" @if ($data->kondisi_bangunan == 'Tidak Terawat') selected @endif>Tidak
                                    Terawat</option>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="pemberi_tugas"><b>Pemberi Tugas</b></label><br>
                            <small><i>Formulir tambahan untuk melengkapi Laporan kepada Pemberi Tugas.</i></small>
                            <select class="form-select" name="pemberi_tugas" id="pemberi_tugas"
                                onchange="toggleMandiriForm()">
                                <option value="" selected>Pilih...</option>
                                <option value="Bank Mandiri" @if ($data->pemberi_tugas == 'Bank Mandiri') selected @endif>Bank
                                    Mandiri
                                </option>
                            </select>
                        </div>

                        <div id="formMandiriContainer" style="display: none;" class="col-12 bg-section p-3 rounded mt-3">
                            <label for="form_isi_mandiri"><b>Form Isian Bank Mandiri</b></label>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Jenis Aset</th>
                                    <th>Peruntukan / Zoning</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="jenis_aset" id="jenis_aset" class="form-select"
                                            onchange="toggleJenisAsetInput()">
                                            <option value="">Pilih...</option>
                                            <option value="Campuran" @if ($data->jenis_aset == 'Campuran') selected @endif>
                                                Campuran</option>
                                            <option value="Gedung Apartemen"
                                                @if ($data->jenis_aset == 'Gedung Apartemen') selected @endif>Gedung Apartemen
                                            </option>
                                            <option value="Gedung Kantor"
                                                @if ($data->jenis_aset == 'Gedung Kantor') selected @endif>Gedung Kantor</option>
                                            <option value="Gudang" @if ($data->jenis_aset == 'Gudang') selected @endif>
                                                Gudang
                                            </option>
                                            <option value="Hotel" @if ($data->jenis_aset == 'Hotel') selected @endif>
                                                Hotel
                                            </option>
                                            <option value="Kios" @if ($data->jenis_aset == 'Kios') selected @endif>
                                                Kios
                                            </option>
                                            <option value="Los Kerja/Bengkel/Workshop"
                                                @if ($data->jenis_aset == 'Los Kerja/Bengkel/Workshop') selected @endif>Los
                                                Kerja/Bengkel/Workshop
                                            </option>
                                            <option value="Pabrik" @if ($data->jenis_aset == 'Pabrik') selected @endif>
                                                Pabrik
                                            </option>
                                            <option value="Penginapan"
                                                @if ($data->jenis_aset == 'Penginapan') selected @endif>
                                                Penginapan</option>
                                            <option value="Ruang Kantor"
                                                @if ($data->jenis_aset == 'Ruang Kantor') selected @endif>
                                                Ruang Kantor</option>
                                            <option value="Ruang Usaha"
                                                @if ($data->jenis_aset == 'Ruang Usaha') selected @endif>
                                                Ruang Usaha</option>
                                            <option value="Ruko/Rukan"
                                                @if ($data->jenis_aset == 'Ruko/Rukan') selected @endif>
                                                Ruko/Rukan</option>
                                            <option value="Rumah Tinggal"
                                                @if ($data->jenis_aset == 'Rumah Tinggal') selected @endif>Rumah Tinggal</option>
                                            <option value="Rumah Walet"
                                                @if ($data->jenis_aset == 'Rumah Walet') selected @endif>
                                                Rumah Walet</option>
                                            <option value="Tanah Kosong"
                                                @if ($data->jenis_aset == 'Tanah Kosong') selected @endif>
                                                Tanah Kosong</option>
                                            <option value="Tempat Ibadah"
                                                @if ($data->jenis_aset == 'Tempat Ibadah') selected @endif>Tempat Ibadah</option>
                                            <option value="Toko" @if ($data->jenis_aset == 'Toko') selected @endif>
                                                Toko
                                            </option>
                                            <option value="Unit Apartemen"
                                                @if ($data->jenis_aset == 'Unit Apartemen') selected @endif>Unit Apartemen
                                            </option>
                                            <option value="Kantor & Pabrik"
                                                @if ($data->jenis_aset == 'Kantor & Pabrik') selected @endif>Kantor & Pabrik
                                            </option>
                                            <option value="Lainnya" @if ($data->jenis_aset == 'Lainnya') selected @endif>
                                                Lainnya</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="peruntukan" id="peruntukan" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Belum Ditentukan"
                                                @if ($data->peruntukan == 'Belum Ditentukan') selected @endif>Belum Ditentukan
                                            </option>
                                            <option value="Campuran/Peralihan"
                                                @if ($data->peruntukan == 'Campuran/Peralihan') selected @endif>Campuran/Peralihan
                                            </option>
                                            <option value="Industri/Pergudangan"
                                                @if ($data->peruntukan == 'Industri/Pergudangan') selected @endif>Industri/Pergudangan
                                            </option>
                                            <option value="Perdagangan dan Jasa Komersial"
                                                @if ($data->peruntukan == 'Perdagangan dan Jasa Komersial') selected @endif>Perdagangan dan Jasa
                                                Komersial</option>
                                            <option value="Perumahan"
                                                @if ($data->peruntukan == 'Perumahan') selected @endif>
                                                Perumahan</option>
                                            <option value="Pertanian"
                                                @if ($data->peruntukan == 'Pertanian') selected @endif>
                                                Pertanian</option>
                                            <option value="Sarana Kesehatan"
                                                @if ($data->peruntukan == 'Sarana Kesehatan') selected @endif>Sarana Kesehatan
                                            </option>
                                            <option value="Sarana Pemerintah"
                                                @if ($data->peruntukan == 'Sarana Pemerintah') selected @endif>Sarana Pemerintah
                                            </option>
                                            <option value="Sarana Pendidikan"
                                                @if ($data->peruntukan == 'Sarana Pendidikan') selected @endif>Sarana Pendidikan
                                            </option>
                                            <option value="Fasilitas Umum"
                                                @if ($data->peruntukan == 'Fasilitas Umum') selected @endif>Fasilitas Umum
                                            </option>
                                            <option value="Pemukiman Perkotaan"
                                                @if ($data->peruntukan == 'Pemukiman Perkotaan') selected @endif>Pemukiman Perkotaan
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr id="jenis_aset_lainnya_row"
                                    style="display: {{ $data->jenis_aset == 'Lainnya' ? 'table-row' : 'none' }};">
                                    <th>Jenis Aset Campuran / Lainnya</th>
                                </tr>
                                <tr id="jenis_aset_lainnya_input_row"
                                    style="display: {{ $data->jenis_aset == 'Lainnya' ? 'table-row' : 'none' }};">
                                    <td>
                                        <input type="text" name="jenis_aset_lainnya" id="jenis_aset_lainnya"
                                            class="form-control"
                                            value="{{ old('jenis_aset_lainnya', $data->jenis_aset_lainnya) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Topografi</th>
                                    <th>Jabatan (Status) Narasumber</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="topografi_mandiri" id="topografi_mandiri" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Datar" @if ($data->topografi_mandiri == 'Datar') selected @endif>
                                                Datar
                                            </option>
                                            <option value="Miring" @if ($data->topografi_mandiri == 'Miring') selected @endif>
                                                Miring</option>
                                            <option value="Berbukit"
                                                @if ($data->topografi_mandiri == 'Berbukit') selected @endif>
                                                Berbukit</option>
                                            <option value="Terasering"
                                                @if ($data->topografi_mandiri == 'Terasering') selected @endif>
                                                Terasering</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="jabatan_narasumber" id="jabatan_narasumber"
                                            class="form-control"
                                            value="{{ old('jabatan_narasumber', $data->jabatan_narasumber) }}">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="status_data_pembanding"><b>Status Data Pembanding</b></label>
                            <select class="form-select" name="status_data_pembanding" id="status_data_pembanding">
                                <option value="" selected disabled>Pilih...</option>
                                <option value="Lengkap" @if ($data->status_data_pembanding == 'Lengkap') selected @endif>Lengkap
                                </option>
                                <option value="Tidak Lengkap" @if ($data->status_data_pembanding == 'Tidak Lengkap') selected @endif>Tidak
                                    Lengkap</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('pembanding-lihat-pembanding') }}" class="btn btn-secondary">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle Form Mandiri
            function toggleMandiriForm() {
                const pemberiTugas = document.getElementById('pemberi_tugas');
                const formMandiriContainer = document.getElementById('formMandiriContainer');

                if (pemberiTugas.value === 'Bank Mandiri') {
                    formMandiriContainer.style.display = 'block';
                } else {
                    formMandiriContainer.style.display = 'none';
                    sss
                }
            }

            // Toggle Jenis Aset Input
            function toggleJenisAsetInput() {
                const jenisAset = document.getElementById('jenis_aset');
                const jenisAsetLainnyaRow = document.getElementById('jenis_aset_lainnya_row');
                const jenisAsetLainnyaInputRow = document.getElementById('jenis_aset_lainnya_input_row');

                if (jenisAset.value === 'Lainnya' || jenisAset.value === 'Campuran') {
                    jenisAsetLainnyaRow.style.display = 'table-row';
                    jenisAsetLainnyaInputRow.style.display = 'table-row';
                } else {
                    jenisAsetLainnyaRow.style.display = 'none';
                    jenisAsetLainnyaInputRow.style.display = 'none';
                }
            }

            // Set global functions
            window.toggleMandiriForm = toggleMandiriForm;
            window.toggleJenisAsetInput = toggleJenisAsetInput;

            // Initialize form state
            toggleMandiriForm();
            if (document.getElementById('jenis_aset')) {
                toggleJenisAsetInput();
            }
        });
    </script>
@endsection
