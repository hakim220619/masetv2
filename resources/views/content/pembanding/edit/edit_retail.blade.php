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
                            <!-- Personal Info -->
                            <div id="personal-info" class="content">
                                <div class="row g-3">
                                    <div>
                                        <div>
                                            <label class="form-label" for="jenis_properti">Jenis Properti</label>
                                        </div>
                                        <select class="form-select" name="jenis_properti" id="jenis_properti"
                                            aria-label="Default select example">
                                            <option value="" disabled>Pilih...</option>
                                            <option value="Office" @if ($data->jenis_properti == 'Office') selected @endif>Office
                                            </option>
                                            <option value="Retail" @if ($data->jenis_properti == 'Retail') selected @endif>
                                                Retail</option>
                                            <option value="Apartemen" @if ($data->jenis_properti == 'Apartemen') selected @endif>
                                                Apartemen</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div>
                                            <label class="form-label" for="kondisi_properti">Kondisi Properti</label>
                                        </div>
                                        <select class="form-select" name="kondisi_properti" id="kondisi_properti"
                                            aria-label="Default select example">
                                            <option value="" disabled>Pilih...</option>
                                            <option value="Available" @if ($data->kondisi_properti == 'Available') selected @endif>
                                                Available</option>
                                            <option value="On Progress" @if ($data->kondisi_properti == 'On Progress') selected @endif>
                                                On Progress</option>
                                        </select>
                                    </div>
                                    <div id="estimasi_wrapper"
                                        @if ($data->kondisi_properti != 'On Progress') style="display: none;" @endif>
                                        <label class="form-label" for="estimasi_properti">Estimasi Selesai
                                            Properti</label>
                                        <input type="text" id="estimasi_properti" name="estimasi_properti"
                                            class="form-control"
                                            value="{{ old('estimasi_properti', $data->estimasi_properti) }}" />
                                    </div>
                                    <div>
                                        <div>
                                            <label class="form-label" for="spesifikasi_properti">Spesifikasi
                                                Properti</label>
                                        </div>
                                        <select class="form-select" name="spesifikasi_properti" id="spesifikasi_properti"
                                            aria-label="Default select example">
                                            <option value="" disabled>Pilih...</option>
                                            <option value="Bare" @if ($data->spesifikasi_properti == 'Bare') selected @endif>Bare
                                            </option>
                                            <option value="Semi Furnished"
                                                @if ($data->spesifikasi_properti == 'Semi Furnished') selected @endif>Semi Furnished</option>
                                            <option value="Fully Furnished"
                                                @if ($data->spesifikasi_properti == 'Fully Furnished') selected @endif>Fully Furnished</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div>
                                            <label class="form-label" for="tipe_apartemen">Tipe Apartemen (jika bangunan
                                                apartemen)</label>
                                        </div>
                                        <select class="form-select" name="tipe_apartemen" id="tipe_apartemen"
                                            aria-label="Default select example">
                                            <option value="" disabled>Pilih...</option>
                                            <option value="1 BR" @if ($data->tipe_apartemen == '1 BR') selected @endif>1 BR
                                            </option>
                                            <option value="2 BR" @if ($data->tipe_apartemen == '2 BR') selected @endif>2 BR
                                            </option>
                                            <option value="3 BR" @if ($data->tipe_apartemen == '3 BR') selected @endif>3 BR
                                            </option>
                                            <option value="Penthouse" @if ($data->tipe_apartemen == 'Penthouse') selected @endif>
                                                Penthouse</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="posisi_lantai">Posisi Lantai</label>
                                        <input type="number" id="posisi_lantai" name="posisi_lantai"
                                            class="form-control"
                                            value="{{ old('posisi_lantai', $data->posisi_lantai) }}" />
                                    </div>
                                    <div class="p-3 rounded bg-light">
                                        <label class="form-label" for="biaya properti">Biaya Properti</label>
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Service Charge (Rp)</th>
                                                <th>Parkir (Rp)</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" id="service_charge" name="service_charge"
                                                        class="form-control"
                                                        value="{{ old('service_charge', $data->service_charge) }}" /></td>
                                                <td><input type="number" id="parkir" name="parkir"
                                                        class="form-control"
                                                        value="{{ old('parkir', $data->parkir) }}" /></td>
                                            </tr>
                                            <tr>
                                                <th>Utilitas (Rp)</th>
                                                <th>Overtime (Rp)</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" id="utilitas" name="utilitas"
                                                        class="form-control"
                                                        value="{{ old('utilitas', $data->utilitas) }}" /></td>
                                                <td><input type="number" id="overtime" name="overtime"
                                                        class="form-control"
                                                        value="{{ old('overtime', $data->overtime) }}" /></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div>
                                        <div>
                                            <label class="form-label" for="grade_bangunan">Grade Bangunan</label>
                                        </div>
                                        <select class="form-select" name="grade_bangunan" id="grade_bangunan"
                                            aria-label="Default select example">
                                            <option value="" disabled>Pilih...</option>
                                            <option value="A" @if ($data->grade_bangunan == 'A') selected @endif>A
                                            </option>
                                            <option value="B" @if ($data->grade_bangunan == 'B') selected @endif>B
                                            </option>
                                            <option value="C" @if ($data->grade_bangunan == 'C') selected @endif>C
                                            </option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="fasilitas_bangunan">Fasilitas Bangunan</label>
                                        <input type="text" id="fasilitas_bangunan" name="fasilitas_bangunan"
                                            class="form-control"
                                            value="{{ old('fasilitas_bangunan', $data->fasilitas_bangunan) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="row_koridor">Row Koridor (meter)</label>
                                        <input type="number" id="row_koridor" name="row_koridor" class="form-control"
                                            value="{{ old('row_koridor', $data->row_koridor) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="tipe_akses_koridor">Tipe Akses Koridor</label>
                                        <input type="text" id="tipe_akses_koridor" name="tipe_akses_koridor"
                                            class="form-control"
                                            value="{{ old('tipe_akses_koridor', $data->tipe_akses_koridor) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="luas_bangunan_total">Luas Gross Bangunan Total
                                            (m2)</label>
                                        <input type="number" id="luas_bangunan_total" name="luas_bangunan_total"
                                            class="form-control"
                                            value="{{ old('luas_bangunan_total', $data->luas_bangunan_total) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="jumlah_lantai">Jumlah Lantai</label>
                                        <input type="number" id="jumlah_lantai" name="jumlah_lantai"
                                            class="form-control"
                                            value="{{ old('jumlah_lantai', $data->jumlah_lantai) }}" />
                                    </div>
                                    <div class="p-3 rounded bg-light">
                                        <label class="form-label" for="narasumber">Narasumber</label>
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Nama Narasumber</th>
                                                <th>Telepon</th>
                                            </tr>
                                            <tr>
                                                <td><input type="text" id="nama_narsum" name="nama_narsum"
                                                        class="form-control"
                                                        value="{{ old('nama_narsum', $data->narasumber['nama_narsum'] ?? '') }}" />
                                                </td>
                                                <td><input type="number" id="telepon" name="telepon"
                                                        class="form-control"
                                                        value="{{ old('telepon', $data->narasumber['telepon'] ?? '') }}" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div>
                                        <label class="form-label" for="jenis_dok_hak_tanah">Jenis Dokumen Hak
                                            Tanah</label>
                                        <select name="jenis_dok_hak_tanah" id="jenis_dok_hak_tanah" class="form-select">
                                            <option value="">Pilih..</option>
                                            <option value="Hak Milik" @if ($data->jenis_dok_hak_tanah == 'Hak Milik') selected @endif>
                                                Hak Milik</option>
                                            <option value="Hak Guna Bangunan"
                                                @if ($data->jenis_dok_hak_tanah == 'Hak Guna Bangunan') selected @endif>Hak Guna Bangunan
                                            </option>
                                            <option value="Hak Guna Usaha"
                                                @if ($data->jenis_dok_hak_tanah == 'Hak Guna Usaha') selected @endif>Hak Guna Usaha</option>
                                            <option value="Hak Pakai" @if ($data->jenis_dok_hak_tanah == 'Hak Pakai') selected @endif>
                                                Hak Pakai</option>
                                            <option value="Hak Milik Satuan Rumah Susun"
                                                @if ($data->jenis_dok_hak_tanah == 'Hak Milik Satuan Rumah Susun') selected @endif>Hak Milik Satuan Rumah
                                                Susun</option>
                                            <option value="Girik" @if ($data->jenis_dok_hak_tanah == 'Girik') selected @endif>
                                                Girik</option>
                                            <option value="Akad Jual Beli"
                                                @if ($data->jenis_dok_hak_tanah == 'Akad Jual Beli') selected @endif>Akad Jual Beli</option>
                                            <option value="Perjanjian Pengikatan Jual Beli"
                                                @if ($data->jenis_dok_hak_tanah == 'Perjanjian Pengikatan Jual Beli') selected @endif>Perjanjian Pengikatan
                                                Jual Beli</option>
                                            <option value="Surat Hijau"
                                                @if ($data->jenis_dok_hak_tanah == 'Surat Hijau') selected @endif>Surat Hijau</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="tgl_berakhir_dokumen">Tanggal Berakhir
                                            Dokumen</label>
                                        <input type="date" id="tgl_berakhir_dokumen" name="tgl_berakhir_dokumen"
                                            class="form-control"
                                            value="{{ old('tgl_berakhir_dokumen', $data->tgl_berakhir_dokumen) }}" />
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div id="address" class="content">
                                <div class="row g-3">
                                    <div>
                                        <label class="form-label" for="peruntukan_bangunan">Peruntukan Bangunan</label>
                                        <select name="peruntukan_bangunan" id="peruntukan_bangunan" class="form-select">
                                            <option value="">Pilih..</option>
                                            <option value="Office" @if ($data->peruntukan_bangunan == 'Office') selected @endif>
                                                Office</option>
                                            <option value="Retail" @if ($data->peruntukan_bangunan == 'Retail') selected @endif>
                                                Retail</option>
                                            <option value="Apartemen" @if ($data->peruntukan_bangunan == 'Apartemen') selected @endif>
                                                Apartemen</option>
                                            <option value="Mixed Use" @if ($data->peruntukan_bangunan == 'Mixed Use') selected @endif>
                                                Mixed Use</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="jenis_data">Jenis Data</label>
                                        <select name="jenis_data" id="jenis_data" class="form-select">
                                            <option value="">Pilih..</option>
                                            <option value="Penawaran" @if ($data->jenis_data == 'Penawaran') selected @endif>
                                                Penawaran</option>
                                            <option value="Transaksi" @if ($data->jenis_data == 'Transaksi') selected @endif>
                                                Transaksi</option>
                                            <option value="Price On Offer"
                                                @if ($data->jenis_data == 'Price On Offer') selected @endif>Price On Offer</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="tgl_penawaran">Tanggal Penawaran / Waktu
                                            Transaksi</label>
                                        <input type="date" id="tgl_penawaran" name="tgl_penawaran"
                                            class="form-control"
                                            value="{{ old('tgl_penawaran', $data->tgl_penawaran) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="sumber_data">Sumber Data</label>
                                        <select name="sumber_data" id="sumber_data" class="form-select">
                                            <option value="">Pilih..</option>
                                            <option value="Pemilik" @if ($data->sumber_data == 'Pemilik') selected @endif>
                                                Pemilik</option>
                                            <option value="Perorangan" @if ($data->sumber_data == 'Perorangan') selected @endif>
                                                Perorangan</option>
                                            <option value="Agen" @if ($data->sumber_data == 'Agen') selected @endif>Agen
                                            </option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="luas_semigross">Luas Semigross (m2)</label>
                                        <input type="number" id="luas_semigross" name="luas_semigross"
                                            class="form-control"
                                            value="{{ old('luas_semigross', $data->luas_semigross) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="luas_net">Luas Nett (m2)</label>
                                        <input type="number" id="luas_net" name="luas_net" class="form-control"
                                            value="{{ old('luas_net', $data->luas_net) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="harga_penawaran">Harga Penawaran/Transaksi
                                            (Rp)</label>
                                        <input type="number" id="harga_penawaran" name="harga_penawaran"
                                            class="form-control"
                                            value="{{ old('harga_penawaran', $data->harga_penawaran) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="diskon">Diskon (%)</label>
                                        <input type="number" id="diskon" name="diskon" class="form-control"
                                            value="{{ old('diskon', $data->diskon) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="harga_sewa_pertahun">Harga Sewa per Tahun
                                            (Rp/tahun)</label>
                                        <input type="number" id="harga_sewa_pertahun" name="harga_sewa_pertahun"
                                            class="form-control"
                                            value="{{ old('harga_sewa_pertahun', $data->harga_sewa_pertahun) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="skrap">Skrap / Nilai Sisa (%)</label>
                                        <input type="number" id="skrap" name="skrap" class="form-control"
                                            value="{{ old('skrap', $data->skrap) }}" />
                                    </div>
                                    <div class="p-3 rounded bg-light">
                                        <label class="form-label" for="penyusutan">Penyusutan</label>
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Kemunduran Fungsi (%)</th>
                                                <th>Penjelasan Kemunduran Fungsi</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" id="kemunduran_fungsi" name="kemunduran_fungsi"
                                                        class="form-control"
                                                        value="{{ old('kemunduran_fungsi', $data->penyusutan['kemunduran_fungsi'] ?? '') }}" />
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="penjelasan_kemunduran_fungsi" id="penjelasan_kemunduran_fungsi" cols="30"
                                                        rows="10">{{ old('penjelasan_kemunduran_fungsi', $data->penyusutan['penjelasan_kemunduran_fungsi'] ?? '') }}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Kemunduran Ekonomis (%)</th>
                                                <th>Penjelasan Kemunduran Ekonomis</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" id="kemunduran_ekonomis"
                                                        name="kemunduran_ekonomis" class="form-control"
                                                        value="{{ old('kemunduran_ekonomis', $data->penyusutan['kemunduran_ekonomis'] ?? '') }}" />
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="penjelasan_kemunduran_ekonomis" id="penjelasan_kemunduran_ekonomis"
                                                        cols="30" rows="10">{{ old('penjelasan_kemunduran_ekonomis', $data->penyusutan['penjelasan_kemunduran_ekonomis'] ?? '') }}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Maintenance (%)</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" id="maintenance" name="maintenance"
                                                        class="form-control"
                                                        value="{{ old('maintenance', $data->penyusutan['maintenance'] ?? '') }}" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="p-3 rounded bg-light">
                                        <label class="form-label" for="penyesuaian_elemen_perbandingan">Penyesuaian Elemen
                                            Perbandingan</label>
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Syarat Pembiayaan Batasan dilakukan pelunasan pembayaran (Kelunakan)
                                                </th>
                                                <th>Kondisi Penjualan Bebas Ikatan, Waktu Pemasaran yang Wajar atau
                                                    Ketiadaan Kondisi Pemaksa</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="pep_pembiayaan" id="pep_pembiayaan"
                                                        class="form-select">
                                                        <option value="">Pilih...</option>
                                                        <option value="Tunai"
                                                            @if (isset($data->penyesuaian_elemen_perbandingan['pep_pembiayaan']) &&
                                                                    $data->penyesuaian_elemen_perbandingan['pep_pembiayaan'] == 'Tunai') selected @endif>Tunai
                                                        </option>
                                                        <option value="Kredit"
                                                            @if (isset($data->penyesuaian_elemen_perbandingan['pep_pembiayaan']) &&
                                                                    $data->penyesuaian_elemen_perbandingan['pep_pembiayaan'] == 'Kredit') selected @endif>Kredit
                                                        </option>
                                                        <option value="Bertahap"
                                                            @if (isset($data->penyesuaian_elemen_perbandingan['pep_pembiayaan']) &&
                                                                    $data->penyesuaian_elemen_perbandingan['pep_pembiayaan'] == 'Bertahap') selected @endif>Bertahap
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="pep_penjualan" id="pep_penjualan" class="form-select">
                                                        <option value="">Pilih...</option>
                                                        <option value="Normal"
                                                            @if (isset($data->penyesuaian_elemen_perbandingan['pep_penjualan']) &&
                                                                    $data->penyesuaian_elemen_perbandingan['pep_penjualan'] == 'Normal') selected @endif>Normal
                                                        </option>
                                                        <option value="Jual Cepat"
                                                            @if (isset($data->penyesuaian_elemen_perbandingan['pep_penjualan']) &&
                                                                    $data->penyesuaian_elemen_perbandingan['pep_penjualan'] == 'Jual Cepat') selected @endif>Jual Cepat
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Pengeluaran yang dilakukan segera setelah pembelian
                                                    Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke fungsi
                                                    atau peruntukan awal atau seharusnya</th>
                                                <th>Kondisi Pasar
                                                    Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga penawaran
                                                    (Menggunakan Indikator Waktu Penawaran / Transaksi)
                                                </th>
                                            </tr>
                                            <tr>
                                                <td><input type="text" id="pep_pengeluaran" name="pep_pengeluaran"
                                                        class="form-control"
                                                        value="{{ old('pep_pengeluaran', $data->penyesuaian_elemen_perbandingan['pep_pengeluaran'] ?? '') }}" />
                                                </td>
                                                <td><input type="text" id="pep_pasar" name="pep_pasar"
                                                        class="form-control"
                                                        value="{{ old('pep_pasar', $data->penyesuaian_elemen_perbandingan['pep_pasar'] ?? '') }}" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div id="social-links" class="content">
                                <div class="row g-3">
                                    <div class="p-3 rounded bg-light">
                                        <label class="form-label" for="penggunaan">Penggunaan</label>
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Koefisien Dasar Bangunan (KDB) (%)</th>
                                                <th>Koefisien Lantai Bangunan (KLB) (kali)</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" id="kdb" name="kdb"
                                                        class="form-control"
                                                        value="{{ old('kdb', $data->penggunaan['kdb'] ?? '') }}" /></td>
                                                <td><input type="number" id="klb" name="klb"
                                                        class="form-control"
                                                        value="{{ old('klb', $data->penggunaan['klb'] ?? '') }}" /></td>
                                            </tr>
                                            <tr>
                                                <th>Garis Sempadan Bangunan (GSB) (meter)</th>
                                                <th>Ketinggian (lantai)</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" id="gsb" name="gsb"
                                                        class="form-control"
                                                        value="{{ old('gsb', $data->penggunaan['gsb'] ?? '') }}" /></td>
                                                <td><input type="number" id="ketinggian" name="ketinggian"
                                                        class="form-control"
                                                        value="{{ old('ketinggian', $data->penggunaan['ketinggian'] ?? '') }}" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div>
                                        <label class="form-label" for="row_jalan">Row Jalan (m)</label>
                                        <input type="number" id="row_jalan" name="row_jalan" class="form-control"
                                            value="{{ old('row_jalan', $data->row_jalan) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="tipe_jalan">Tipe Jalan</label>
                                        <input type="text" id="tipe_jalan" name="tipe_jalan" class="form-control"
                                            value="{{ old('tipe_jalan', $data->tipe_jalan) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="kapasitas_jalan">Kapasitas Jalan</label>
                                        <input type="text" id="kapasitas_jalan" name="kapasitas_jalan"
                                            class="form-control"
                                            value="{{ old('kapasitas_jalan', $data->kapasitas_jalan) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="pengguna_lahan_lingkungan_eksisting">Penggunaan
                                            Lahan Lingkungan Eksisting</label>
                                        <select name="pengguna_lahan_lingkungan_eksisting"
                                            id="pengguna_lahan_lingkungan_eksisting" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Perumahan/Pemukiman"
                                                @if ($data->pengguna_lahan_lingkungan_eksisting == 'Perumahan/Pemukiman') selected @endif>Perumahan/Pemukiman
                                            </option>
                                            <option value="Campuran" @if ($data->pengguna_lahan_lingkungan_eksisting == 'Campuran') selected @endif>
                                                Campuran</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="letak_posisi_obyek">Letak / Posisi Obyek</label>
                                        <select name="letak_posisi_obyek" id="letak_posisi_obyek" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Kuldesak" @if ($data->letak_posisi_obyek == 'Kuldesak') selected @endif>
                                                Kuldesak</option>
                                            <option value="Interior" @if ($data->letak_posisi_obyek == 'Interior') selected @endif>
                                                Interior</option>
                                            <option value="Tusuk Sate" @if ($data->letak_posisi_obyek == 'Tusuk Sate') selected @endif>
                                                Tusuk Sate</option>
                                            <option value="Sudut(Corner)"
                                                @if ($data->letak_posisi_obyek == 'Sudut(Corner)') selected @endif>Sudut(Corner)</option>
                                            <option value="Key" @if ($data->letak_posisi_obyek == 'Key') selected @endif>Key
                                            </option>
                                            <option value="Flag" @if ($data->letak_posisi_obyek == 'Flag') selected @endif>Flag
                                            </option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="letak_posisi_aset">Lokasi Aset</label>
                                        <select name="letak_posisi_aset" id="letak_posisi_aset" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Depan" @if ($data->letak_posisi_aset == 'Depan') selected @endif>
                                                Depan</option>
                                            <option value="Tengah" @if ($data->letak_posisi_aset == 'Tengah') selected @endif>
                                                Tengah</option>
                                            <option value="Belakang" @if ($data->letak_posisi_aset == 'Belakang') selected @endif>
                                                Belakang</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="bentuk_tanah">Bentuk Tanah</label>
                                        <select name="bentuk_tanah" id="bentuk_tanah" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Beraturan" @if ($data->bentuk_tanah == 'Beraturan') selected @endif>
                                                Beraturan</option>
                                            <option value="Tidak Beraturan"
                                                @if ($data->bentuk_tanah == 'Tidak Beraturan') selected @endif>Tidak Beraturan</option>
                                            <option value="Persegi Panjang"
                                                @if ($data->bentuk_tanah == 'Persegi Panjang') selected @endif>Persegi Panjang</option>
                                            <option value="Persegi Empat"
                                                @if ($data->bentuk_tanah == 'Persegi Empat') selected @endif>Persegi Empat</option>
                                            <option value="Lainnya" @if ($data->bentuk_tanah == 'Lainnya') selected @endif>
                                                Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="bentuk_tanah_lainnya_group"
                                        @if ($data->bentuk_tanah != 'Lainnya') style="display: none;" @endif>
                                        <label for="bentuk_tanah_lainnya">Bentuk Tanah Lainnya</label>
                                        <input type="text" class="form-control" id="bentuk_tanah_lainnya"
                                            name="bentuk_tanah_lainnya"
                                            value="{{ old('bentuk_tanah_lainnya', $data->bentuk_tanah_lainnya) }}">
                                    </div>
                                    <div>
                                        <label class="form-label" for="lebar_muka_tanah">Lebar Muka Tanah (m)</label>
                                        <input type="number" id="lebar_muka_tanah" name="lebar_muka_tanah"
                                            class="form-control"
                                            value="{{ old('lebar_muka_tanah', $data->lebar_muka_tanah) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="ketinggian_tanah_dr_muka_jln">Ketinggian Tanah dari
                                            Muka Jalan (m)</label>
                                        <input type="number" id="ketinggian_tanah_dr_muka_jln"
                                            name="ketinggian_tanah_dr_muka_jln" class="form-control"
                                            value="{{ old('ketinggian_tanah_dr_muka_jln', $data->ketinggian_tanah_dr_muka_jln) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="topografi">Topografi</label>
                                        <select name="topografi" id="topografi" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Datar" @if ($data->topografi == 'Datar') selected @endif>
                                                Datar</option>
                                            <option value="Berkontur" @if ($data->topografi == 'Berkontur') selected @endif>
                                                Berkontur</option>
                                            <option value="Miring" @if ($data->topografi == 'Miring') selected @endif>
                                                Miring</option>
                                            <option value="Lainnya" @if ($data->topografi == 'Lainnya') selected @endif>
                                                Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="topografi_isian_group"
                                        @if ($data->topografi != 'Lainnya') style="display: none;" @endif>
                                        <label for="topografi_isian">Topografi Lainnya</label>
                                        <input type="text" class="form-control" id="topografi_isian"
                                            name="topografi_isian"
                                            value="{{ old('topografi_isian', $data->topografi_isian) }}">
                                    </div>
                                    <div>
                                        <label class="form-label" for="tingkat_hunian">Tingkat Hunian (%)</label>
                                        <input type="number" id="tingkat_hunian" name="tingkat_hunian"
                                            class="form-control"
                                            value="{{ old('tingkat_hunian', $data->tingkat_hunian) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="kondisi_lingkungan_khusus">Kondisi Lingkungan
                                            Khusus</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="kondisi_lingkungan_khusus[]" value="Rawan Banjir"
                                                id="kondisi_banjir" @if (isset($data->kondisi_lingkungan_khusus) &&
                                                        is_array($data->kondisi_lingkungan_khusus) &&
                                                        in_array('Rawan Banjir', $data->kondisi_lingkungan_khusus)) checked @endif>
                                            <label class="form-check-label" for="kondisi_banjir">Rawan Banjir</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="kondisi_lingkungan_khusus[]" value="Rawan Longsor"
                                                id="kondisi_longsor" @if (isset($data->kondisi_lingkungan_khusus) &&
                                                        is_array($data->kondisi_lingkungan_khusus) &&
                                                        in_array('Rawan Longsor', $data->kondisi_lingkungan_khusus)) checked @endif>
                                            <label class="form-check-label" for="kondisi_longsor">Rawan Longsor</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="kondisi_lingkungan_khusus[]" value="Rawan Kebakaran"
                                                id="kondisi_kebakaran" @if (isset($data->kondisi_lingkungan_khusus) &&
                                                        is_array($data->kondisi_lingkungan_khusus) &&
                                                        in_array('Rawan Kebakaran', $data->kondisi_lingkungan_khusus)) checked @endif>
                                            <label class="form-check-label" for="kondisi_kebakaran">Rawan
                                                Kebakaran</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="kondisi_lingkungan_khusus[]" value="Lainnya" id="kondisi_lainnya"
                                                @if (isset($data->kondisi_lingkungan_khusus) &&
                                                        is_array($data->kondisi_lingkungan_khusus) &&
                                                        in_array('Lainnya', $data->kondisi_lingkungan_khusus)) checked @endif>
                                            <label class="form-check-label" for="kondisi_lainnya">Lainnya</label>
                                        </div>
                                    </div>
                                    <div class="form-group" id="kondisi_lingkungan_lainnya_group"
                                        @if (
                                            !isset($data->kondisi_lingkungan_khusus) ||
                                                !is_array($data->kondisi_lingkungan_khusus) ||
                                                !in_array('Lainnya', $data->kondisi_lingkungan_khusus)) style="display: none;" @endif>
                                        <label for="kondisi_lingkungan_lainnya">Kondisi Lingkungan Lainnya</label>
                                        <input type="text" class="form-control" id="kondisi_lingkungan_lainnya"
                                            name="kondisi_lingkungan_lainnya"
                                            value="{{ old('kondisi_lingkungan_lainnya', $data->kondisi_lingkungan_lainnya) }}">
                                    </div>
                                    <div>
                                        <label class="form-label" for="keterangan_tambahan_lainnya">Keterangan Tambahan
                                            Lainnya</label>
                                        <textarea class="form-control" id="keterangan_tambahan_lainnya" name="keterangan_tambahan_lainnya">{{ old('keterangan_tambahan_lainnya', $data->keterangan_tambahan_lainnya) }}</textarea>
                                    </div>
                                    <div>
                                        <label class="form-label" for="keterangan_jarak">Keterangan Jarak</label>
                                        <input type="text" id="keterangan_jarak" name="keterangan_jarak"
                                            class="form-control"
                                            value="{{ old('keterangan_jarak', $data->keterangan_jarak) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="pemberi_tugas">Pemberi Tugas</label>
                                        <input type="text" id="pemberi_tugas" name="pemberi_tugas"
                                            class="form-control"
                                            value="{{ old('pemberi_tugas', $data->pemberi_tugas) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="jenis_aset">Jenis Aset</label>
                                        <select name="jenis_aset" id="jenis_aset" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Tanah" @if ($data->jenis_aset == 'Tanah') selected @endif>
                                                Tanah</option>
                                            <option value="Bangunan" @if ($data->jenis_aset == 'Bangunan') selected @endif>
                                                Bangunan</option>
                                            <option value="Tanah dan Bangunan"
                                                @if ($data->jenis_aset == 'Tanah dan Bangunan') selected @endif>Tanah dan Bangunan
                                            </option>
                                            <option value="Campuran" @if ($data->jenis_aset == 'Campuran') selected @endif>
                                                Campuran</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="jenis_aset_campuran_group"
                                        @if ($data->jenis_aset != 'Campuran') style="display: none;" @endif>
                                        <label for="jenis_aset_campuran">Jenis Aset Campuran</label>
                                        <input type="text" class="form-control" id="jenis_aset_campuran"
                                            name="jenis_aset_campuran"
                                            value="{{ old('jenis_aset_campuran', $data->jenis_aset_campuran) }}">
                                    </div>
                                    <div>
                                        <label class="form-label" for="peruntukan">Peruntukan</label>
                                        <select name="peruntukan" id="peruntukan" class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Perumahan" @if ($data->peruntukan == 'Perumahan') selected @endif>
                                                Perumahan</option>
                                            <option value="Komersial" @if ($data->peruntukan == 'Komersial') selected @endif>
                                                Komersial</option>
                                            <option value="Industri" @if ($data->peruntukan == 'Industri') selected @endif>
                                                Industri</option>
                                            <option value="Lainnya" @if ($data->peruntukan == 'Lainnya') selected @endif>
                                                Lainnya</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label" for="jabatan_narasumber">Jabatan Narasumber</label>
                                        <input type="text" id="jabatan_narasumber" name="jabatan_narasumber"
                                            class="form-control"
                                            value="{{ old('jabatan_narasumber', $data->jabatan_narasumber) }}" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="status_data_pembanding">Status Data
                                            Pembanding</label>
                                        <select name="status_data_pembanding" id="status_data_pembanding"
                                            class="form-select">
                                            <option value="">Pilih...</option>
                                            <option value="Aktif" @if ($data->status_data_pembanding == 'Aktif') selected @endif>
                                                Aktif</option>
                                            <option value="Tidak Aktif"
                                                @if ($data->status_data_pembanding == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-flex justify-content-between mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('pembanding-lihat-pembanding') }}" class="btn btn-secondary">Batal</a>
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

        // Menampilkan/menyembunyikan field estimasi properti berdasarkan kondisi properti
        document.getElementById('kondisi_properti').addEventListener('change', function() {
            const estimasiWrapper = document.getElementById('estimasi_wrapper');
            if (this.value === 'On Progress') {
                estimasiWrapper.style.display = 'block';
            } else {
                estimasiWrapper.style.display = 'none';
            }
        });

        // Menampilkan/menyembunyikan field bentuk tanah lainnya
        document.getElementById('bentuk_tanah').addEventListener('change', function() {
            const bentukTanahLainnyaGroup = document.getElementById('bentuk_tanah_lainnya_group');
            if (this.value === 'Lainnya') {
                bentukTanahLainnyaGroup.style.display = 'block';
            } else {
                bentukTanahLainnyaGroup.style.display = 'none';
            }
        });

        // Menampilkan/menyembunyikan field topografi lainnya
        document.getElementById('topografi').addEventListener('change', function() {
            const topografiIsianGroup = document.getElementById('topografi_isian_group');
            if (this.value === 'Lainnya') {
                topografiIsianGroup.style.display = 'block';
            } else {
                topografiIsianGroup.style.display = 'none';
            }
        });

        // Menampilkan/menyembunyikan field jenis aset campuran
        document.getElementById('jenis_aset').addEventListener('change', function() {
            const jenisAsetCampuranGroup = document.getElementById('jenis_aset_campuran_group');
            if (this.value === 'Campuran') {
                jenisAsetCampuranGroup.style.display = 'block';
            } else {
                jenisAsetCampuranGroup.style.display = 'none';
            }
        });

        // Menampilkan/menyembunyikan field kondisi lingkungan lainnya
        document.querySelectorAll('input[name="kondisi_lingkungan_khusus[]"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const kondisiLingkunganLainnyaGroup = document.getElementById(
                    'kondisi_lingkungan_lainnya_group');
                if (document.getElementById('kondisi_lainnya').checked) {
                    kondisiLingkunganLainnyaGroup.style.display = 'block';
                } else {
                    kondisiLingkunganLainnyaGroup.style.display = 'none';
                }
            });
        });
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
