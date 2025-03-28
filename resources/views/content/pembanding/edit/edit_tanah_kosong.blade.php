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
    <h4>Edit Data Pembanding – Tanah Kosong</h4>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="wizard-icons wizard-icons-example mt-2">
                <div class="content">
                    <form method="POST" action="{{ route('pembanding.tanah-kosong.update', $data->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div id="account-details" class="content">
                            <div class="row g-3">
                                <div>
                                    <label class="form-label" for="nama_tanah_kosong">Judul / Nama Tanah Kosong</label>
                                    <input type="text" id="nama_tanah_kosong" name="nama_tanah_kosong"
                                        class="form-control"
                                        value="{{ old('nama_tanah_kosong', $data->nama_tanah_kosong) }}" />
                                </div>
                                <div>
                                    <label class="form-label" for="nama_entitas">Nama Entitas</label>
                                    <input type="text" id="nama_entitas" name="nama_entitas" class="form-control"
                                        value="{{ old('nama_entitas', $data->nama_entitas) }}" />
                                </div>
                                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                    <label class="form-label" for="Lokasi Obyek">Lokasi Obyek</label>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Provinsi</th>
                                            <th>Kode Pos</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-select" name="provinsi" id="provinsi"
                                                    aria-label="Default select example">
                                                    <option value="" disabled>Pilih...</option>
                                                    <option value="A"
                                                        @if ($data->provinsi == 'A') selected @endif>A</option>
                                                    <option value="B"
                                                        @if ($data->provinsi == 'B') selected @endif>B</option>
                                                </select>
                                            </td>
                                            <td><input type="text" id="kode_pos" name="kode_pos" class="form-control"
                                                    value="{{ old('kode_pos', $data->kode_pos) }}" /></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Lengkap</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap">{{ old('alamat_lengkap', $data->alamat_lengkap) }}</textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div>
                                    <label class="form-label" for="keterangan_dasar_nilai">Keterangan Dasar Nilai pada Tabel
                                        Analisis</label>
                                    <input type="text" id="keterangan_dasar_nilai" name="keterangan_dasar_nilai"
                                        class="form-control"
                                        placeholder="indikasi nilai liquiditas/nilai investasi/nilai sewa pasar"
                                        value="{{ old('keterangan_dasar_nilai', $data->keterangan_dasar_nilai) }}" />
                                </div>
                                <div>
                                    <label class="form-label" for="alamat">Titik Point</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control"
                                        placeholder="jl sukasari kecamatan baleendah bandung"
                                        value="{{ old('alamat', $data->alamat) }}" />
                                    <div id="map" style="height: 400px; width: 100%;"></div>
                                    <input type="text" id="lat" name="lat" class="form-control"
                                        value="{{ old('lat', $data->lat) }}" hidden />
                                    <input type="text" id="long" name="long" class="form-control"
                                        value="{{ old('long', $data->long) }}" hidden />
                                </div>
                                <div>
                                    <label class="form-label" for="foto_tampak_depan">Upload Foto Tampak Depan</label>
                                    @if ($data->foto_tampak_depan)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $data->foto_tampak_depan) }}"
                                                class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" id="foto_tampak_depan" name="foto_tampak_depan"
                                        class="form-control" />
                                </div>
                                <div>
                                    <label class="form-label" for="foto_tampak_sisi_kiri">Upload Foto Tampak Sisi
                                        Kiri</label>
                                    @if ($data->foto_tampak_sisi_kiri)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $data->foto_tampak_sisi_kiri) }}"
                                                class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" id="foto_tampak_sisi_kiri" name="foto_tampak_sisi_kiri"
                                        class="form-control" />
                                </div>
                                <div>
                                    <label class="form-label" for="foto_tampak_sisi_kanan">Upload Foto Tampak Sisi
                                        Kanan</label>
                                    @if ($data->foto_tampak_sisi_kanan)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $data->foto_tampak_sisi_kanan) }}"
                                                class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    @endif
                                    <input type="file" id="foto_tampak_sisi_kanan" name="foto_tampak_sisi_kanan"
                                        class="form-control" />
                                </div>
                                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                    <label class="form-label" for="Foto Lainnya">Foto Lainnya</label>
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
                                            @if (isset($data->foto_lainnya) && is_array($data->foto_lainnya) && count($data->foto_lainnya) > 0)
                                                @foreach ($data->foto_lainnya as $index => $foto)
                                                    <tr>
                                                        <td class="row-number-foto">{{ $index + 1 }}</td>
                                                        <td>
                                                            <input type="text" name="judul_foto[{{ $index }}]"
                                                                class="form-control"
                                                                value="{{ $foto['judul_foto'] ?? '' }}" />
                                                        </td>
                                                        <td>
                                                            @if (isset($foto['file_path']))
                                                                <div class="mb-2">
                                                                    <img src="{{ asset('storage/' . $foto['file_path']) }}"
                                                                        class="img-thumbnail" style="max-height: 100px;">
                                                                </div>
                                                            @endif
                                                            <input type="file" name="foto[{{ $index }}]"
                                                                class="form-control" accept="image/*" />
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-success btn-sm btn-action"
                                                                onclick="addFotoRow()">+</button>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btn-action"
                                                                onclick="removeFotoRow(this)">-</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="row-number-foto">1</td>
                                                    <td><input type="text" name="judul_foto[0]"
                                                            class="form-control" /></td>
                                                    <td><input type="file" name="foto[0]" class="form-control"
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
                                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                    <label class="form-label" for="Nilai Perolehan">Nilai Perolehan / NJOP / PBB</label>
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
                                            @if (isset($data->tahun_nilai_njop) && is_array($data->tahun_nilai_njop) && count($data->tahun_nilai_njop) > 0)
                                                @foreach ($data->tahun_nilai_njop as $index => $njop)
                                                    <tr>
                                                        <td class="row-number">{{ $index + 1 }}</td>
                                                        <td><input type="number" name="njop[{{ $index }}][tahun]"
                                                                class="form-control"
                                                                value="{{ $njop['tahun'] ?? '' }}" /></td>
                                                        <td><input type="number"
                                                                name="njop[{{ $index }}][nilai_perolehan]"
                                                                class="form-control"
                                                                value="{{ $njop['nilai_perolehan'] ?? '' }}" /></td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-success btn-sm btn-action"
                                                                onclick="addRow()">+</button>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btn-action"
                                                                onclick="removeRow(this)">-</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="row-number">1</td>
                                                    <td><input type="number" name="njop[0][tahun]"
                                                            class="form-control" /></td>
                                                    <td><input type="number" name="njop[0][nilai_perolehan]"
                                                            class="form-control" /></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm btn-action"
                                                            onclick="addRow()">+</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-action"
                                                            onclick="removeRow(this)">-</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                    <label class="form-label" for="narasumber">Narasumber</label>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Nama Narasumber</th>
                                            <th>Telepon</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" id="nama_narsum" name="nama_narsum"
                                                    class="form-control" placeholder="Bapak Ahmad Sudani"
                                                    value="{{ old('nama_narsum', $data->nama_narsum) }}" /></td>
                                            <td><input type="number" id="telepon" name="telepon" class="form-control"
                                                    placeholder="087654354243"
                                                    value="{{ old('telepon', $data->telepon) }}" /></td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Personal Info -->
                                <div id="personal-info" class="content">
                                    <div class="row g-3">
                                        <hr>
                                        <div>
                                            <label class="form-label" for="jenis_dok_hak_tanah">Jenis Dokumen Hak
                                                Tanah</label>
                                            <select name="jenis_dok_hak_tanah" id="jenis_dok_hak_tanah"
                                                class="form-select">
                                                <option value="">Pilih..</option>
                                                <option value="Hak Milik"
                                                    @if ($data->jenis_dok_hak_tanah == 'Hak Milik') selected @endif>Hak Milik</option>
                                                <option value="Hak Guna Bangunan"
                                                    @if ($data->jenis_dok_hak_tanah == 'Hak Guna Bangunan') selected @endif>Hak Guna Bangunan
                                                </option>
                                                <option value="Hak Guna Usaha"
                                                    @if ($data->jenis_dok_hak_tanah == 'Hak Guna Usaha') selected @endif>Hak Guna Usaha
                                                </option>
                                                <option value="Hak Pakai"
                                                    @if ($data->jenis_dok_hak_tanah == 'Hak Pakai') selected @endif>Hak Pakai</option>
                                                <option value="Hak Milik Satuan Rumah Susun"
                                                    @if ($data->jenis_dok_hak_tanah == 'Hak Milik Satuan Rumah Susun') selected @endif>Hak Milik Satuan
                                                    Rumah Susun</option>
                                                <option value="Girik" @if ($data->jenis_dok_hak_tanah == 'Girik') selected @endif>
                                                    Girik</option>
                                                <option value="Akad Jual Beli"
                                                    @if ($data->jenis_dok_hak_tanah == 'Akad Jual Beli') selected @endif>Akad Jual Beli
                                                </option>
                                                <option value="Perjanjian Pengikatan Jual Beli"
                                                    @if ($data->jenis_dok_hak_tanah == 'Perjanjian Pengikatan Jual Beli') selected @endif>Perjanjian Pengikatan
                                                    Jual Beli</option>
                                                <option value="Surat Hijau"
                                                    @if ($data->jenis_dok_hak_tanah == 'Surat Hijau') selected @endif>Surat Hijau</option>
                                            </select>
                                        </div>
                                        <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                            <label class="form-label" for="Luas Tanah">Luas Tanah</label>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Luas Tanah (m²)</th>
                                                    <th>Lebar Muka (m)</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="number" id="luas_tanah" name="luas_tanah"
                                                            class="form-control"
                                                            value="{{ old('luas_tanah', $data->luas_tanah) }}" /></td>
                                                    <td><input type="number" id="lebar_muka" name="lebar_muka"
                                                            class="form-control"
                                                            value="{{ old('lebar_muka', $data->lebar_muka) }}" /></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div>
                                            <label class="form-label" for="bentuk_tanah">Bentuk Tanah</label>
                                            <select name="bentuk_tanah" id="bentuk_tanah" class="form-select">
                                                <option value="">Pilih..</option>
                                                <option value="Beraturan"
                                                    @if ($data->bentuk_tanah == 'Beraturan') selected @endif>Beraturan</option>
                                                <option value="Tidak Beraturan"
                                                    @if ($data->bentuk_tanah == 'Tidak Beraturan') selected @endif>Tidak Beraturan
                                                </option>
                                                <option value="Persegi Panjang"
                                                    @if ($data->bentuk_tanah == 'Persegi Panjang') selected @endif>Persegi Panjang
                                                </option>
                                                <option value="Persegi Empat"
                                                    @if ($data->bentuk_tanah == 'Persegi Empat') selected @endif>Persegi Empat
                                                </option>
                                                <option value="Lainnya"
                                                    @if ($data->bentuk_tanah == 'Lainnya') selected @endif>Lainnya</option>
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
                                            <label class="form-label" for="topografi">Topografi</label>
                                            <select name="topografi" id="topografi" class="form-select">
                                                <option value="">Pilih..</option>
                                                <option value="Datar" @if ($data->topografi == 'Datar') selected @endif>
                                                    Datar</option>
                                                <option value="Berkontur"
                                                    @if ($data->topografi == 'Berkontur') selected @endif>Berkontur</option>
                                                <option value="Miring" @if ($data->topografi == 'Miring') selected @endif>
                                                    Miring</option>
                                                <option value="Lainnya"
                                                    @if ($data->topografi == 'Lainnya') selected @endif>Lainnya</option>
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
                                            <label class="form-label" for="elevasi">Elevasi</label>
                                            <select name="elevasi" id="elevasi" class="form-select">
                                                <option value="">Pilih..</option>
                                                <option value="Sama dengan jalan"
                                                    @if ($data->elevasi == 'Sama dengan jalan') selected @endif>Sama dengan jalan
                                                </option>
                                                <option value="Lebih tinggi dari jalan"
                                                    @if ($data->elevasi == 'Lebih tinggi dari jalan') selected @endif>Lebih tinggi dari
                                                    jalan</option>
                                                <option value="Lebih rendah dari jalan"
                                                    @if ($data->elevasi == 'Lebih rendah dari jalan') selected @endif>Lebih rendah dari
                                                    jalan</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="form-label" for="letak_posisi_obyek">Letak / Posisi
                                                Obyek</label>
                                            <select name="letak_posisi_obyek" id="letak_posisi_obyek"
                                                class="form-select">
                                                <option value="">Pilih..</option>
                                                <option value="Kuldesak"
                                                    @if ($data->letak_posisi_obyek == 'Kuldesak') selected @endif>Kuldesak</option>
                                                <option value="Interior"
                                                    @if ($data->letak_posisi_obyek == 'Interior') selected @endif>Interior</option>
                                                <option value="Tusuk Sate"
                                                    @if ($data->letak_posisi_obyek == 'Tusuk Sate') selected @endif>Tusuk Sate</option>
                                                <option value="Sudut(Corner)"
                                                    @if ($data->letak_posisi_obyek == 'Sudut(Corner)') selected @endif>Sudut(Corner)
                                                </option>
                                                <option value="Key" @if ($data->letak_posisi_obyek == 'Key') selected @endif>
                                                    Key</option>
                                                <option value="Flag" @if ($data->letak_posisi_obyek == 'Flag') selected @endif>
                                                    Flag</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="form-label" for="letak_posisi_aset">Lokasi Aset</label>
                                            <select name="letak_posisi_aset" id="letak_posisi_aset" class="form-select">
                                                <option value="">Pilih..</option>
                                                <option value="Depan" @if ($data->letak_posisi_aset == 'Depan') selected @endif>
                                                    Depan</option>
                                                <option value="Tengah" @if ($data->letak_posisi_aset == 'Tengah') selected @endif>
                                                    Tengah</option>
                                                <option value="Belakang"
                                                    @if ($data->letak_posisi_aset == 'Belakang') selected @endif>Belakang</option>
                                            </select>
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
                                                <option value="">Pilih..</option>
                                                <option value="Perumahan/Pemukiman"
                                                    @if ($data->pengguna_lahan_lingkungan_eksisting == 'Perumahan/Pemukiman') selected @endif>Perumahan/Pemukiman
                                                </option>
                                                <option value="Campuran"
                                                    @if ($data->pengguna_lahan_lingkungan_eksisting == 'Campuran') selected @endif>Campuran</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div id="address" class="content">
                                    <div class="row g-3">
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
                                                    id="kondisi_longsor"
                                                    @if (isset($data->kondisi_lingkungan_khusus) &&
                                                            is_array($data->kondisi_lingkungan_khusus) &&
                                                            in_array('Rawan Longsor', $data->kondisi_lingkungan_khusus)) checked @endif>
                                                <label class="form-check-label" for="kondisi_longsor">Rawan
                                                    Longsor</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="kondisi_lingkungan_khusus[]" value="Rawan Kebakaran"
                                                    id="kondisi_kebakaran"
                                                    @if (isset($data->kondisi_lingkungan_khusus) &&
                                                            is_array($data->kondisi_lingkungan_khusus) &&
                                                            in_array('Rawan Kebakaran', $data->kondisi_lingkungan_khusus)) checked @endif>
                                                <label class="form-check-label" for="kondisi_kebakaran">Rawan
                                                    Kebakaran</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="kondisi_lingkungan_khusus[]" value="Lainnya"
                                                    id="kondisi_lainnya"
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
                                            <label class="form-label" for="keterangan_tambahan_lainnya">Keterangan
                                                Tambahan Lainnya</label>
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
                                                <option value="">Pilih..</option>
                                                <option value="Tanah" @if ($data->jenis_aset == 'Tanah') selected @endif>
                                                    Tanah</option>
                                                <option value="Bangunan"
                                                    @if ($data->jenis_aset == 'Bangunan') selected @endif>Bangunan</option>
                                                <option value="Tanah dan Bangunan"
                                                    @if ($data->jenis_aset == 'Tanah dan Bangunan') selected @endif>Tanah dan Bangunan
                                                </option>
                                                <option value="Campuran"
                                                    @if ($data->jenis_aset == 'Campuran') selected @endif>Campuran</option>
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
                                                <option value="">Pilih..</option>
                                                <option value="Perumahan"
                                                    @if ($data->peruntukan == 'Perumahan') selected @endif>Perumahan</option>
                                                <option value="Komersial"
                                                    @if ($data->peruntukan == 'Komersial') selected @endif>Komersial</option>
                                                <option value="Industri"
                                                    @if ($data->peruntukan == 'Industri') selected @endif>Industri</option>
                                                <option value="Lainnya"
                                                    @if ($data->peruntukan == 'Lainnya') selected @endif>Lainnya</option>
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
                                                <option value="">Pilih..</option>
                                                <option value="Aktif" @if ($data->status_data_pembanding == 'Aktif') selected @endif>
                                                    Aktif</option>
                                                <option value="Tidak Aktif"
                                                    @if ($data->status_data_pembanding == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
                                            </select>
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
                                                            value="{{ old('kdb', $data->penggunaan['kdb'] ?? '') }}" />
                                                    </td>
                                                    <td><input type="number" id="klb" name="klb"
                                                            class="form-control"
                                                            value="{{ old('klb', $data->penggunaan['klb'] ?? '') }}" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Garis Sempadan Bangunan (GSB) (meter)</th>
                                                    <th>Ketinggian (lantai)</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="number" id="gsb" name="gsb"
                                                            class="form-control"
                                                            value="{{ old('gsb', $data->penggunaan['gsb'] ?? '') }}" />
                                                    </td>
                                                    <td><input type="number" id="ketinggian" name="ketinggian"
                                                            class="form-control"
                                                            value="{{ old('ketinggian', $data->penggunaan['ketinggian'] ?? '') }}" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                            <label class="form-label" for="Penyesuaian Elemen Perbandingan">Penyesuaian
                                                Elemen Perbandingan</label>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Pembiayaan
                                                        Cara Pembayaran Transaksi</th>
                                                    <th>Penjualan
                                                        Kondisi Penjualan</th>
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
                                                        <select name="pep_penjualan" id="pep_penjualan"
                                                            class="form-select">
                                                            <option value="">Pilih...</option>
                                                            <option value="Normal"
                                                                @if (isset($data->penyesuaian_elemen_perbandingan['pep_penjualan']) &&
                                                                        $data->penyesuaian_elemen_perbandingan['pep_penjualan'] == 'Normal') selected @endif>Normal
                                                            </option>
                                                            <option value="Jual Cepat"
                                                                @if (isset($data->penyesuaian_elemen_perbandingan['pep_penjualan']) &&
                                                                        $data->penyesuaian_elemen_perbandingan['pep_penjualan'] == 'Jual Cepat') selected @endif>Jual
                                                                Cepat</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Pengeluaran yang dilakukan segera setelah pembelian
                                                        Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke
                                                        fungsi atau peruntukan awal atau seharusnya</th>
                                                    <th>Kondisi Pasar
                                                        Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga
                                                        penawaran (Menggunakan Indikator Waktu Penawaran / Transaksi)
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
                                        <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                            <label class="form-label" for="Penyesuaian Elemen Fisik">Penyesuaian Elemen
                                                Fisik</label>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Lokasi</th>
                                                    <th>Luas Tanah</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" id="pef_lokasi" name="pef_lokasi"
                                                            class="form-control"
                                                            value="{{ old('pef_lokasi', $data->penyesuaian_elemen_fisik['pef_lokasi'] ?? '') }}" />
                                                    </td>
                                                    <td><input type="text" id="pef_luas_tanah" name="pef_luas_tanah"
                                                            class="form-control"
                                                            value="{{ old('pef_luas_tanah', $data->penyesuaian_elemen_fisik['pef_luas_tanah'] ?? '') }}" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Bentuk Tanah</th>
                                                    <th>Lebar Muka</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" id="pef_bentuk_tanah"
                                                            name="pef_bentuk_tanah" class="form-control"
                                                            value="{{ old('pef_bentuk_tanah', $data->penyesuaian_elemen_fisik['pef_bentuk_tanah'] ?? '') }}" />
                                                    </td>
                                                    <td><input type="text" id="pef_lebar_muka" name="pef_lebar_muka"
                                                            class="form-control"
                                                            value="{{ old('pef_lebar_muka', $data->penyesuaian_elemen_fisik['pef_lebar_muka'] ?? '') }}" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Posisi Tanah</th>
                                                    <th>Elevasi</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" id="pef_posisi_tanah"
                                                            name="pef_posisi_tanah" class="form-control"
                                                            value="{{ old('pef_posisi_tanah', $data->penyesuaian_elemen_fisik['pef_posisi_tanah'] ?? '') }}" />
                                                    </td>
                                                    <td><input type="text" id="pef_elevasi" name="pef_elevasi"
                                                            class="form-control"
                                                            value="{{ old('pef_elevasi', $data->penyesuaian_elemen_fisik['pef_elevasi'] ?? '') }}" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Topografi</th>
                                                    <th>Lingkungan</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" id="pef_topografi" name="pef_topografi"
                                                            class="form-control"
                                                            value="{{ old('pef_topografi', $data->penyesuaian_elemen_fisik['pef_topografi'] ?? '') }}" />
                                                    </td>
                                                    <td><input type="text" id="pef_lingkungan" name="pef_lingkungan"
                                                            class="form-control"
                                                            value="{{ old('pef_lingkungan', $data->penyesuaian_elemen_fisik['pef_lingkungan'] ?? '') }}" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                            <label class="form-label" for="Penyesuaian Elemen Ekonomi">Penyesuaian Elemen
                                                Ekonomi</label>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Peruntukan</th>
                                                    <th>Zoning</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" id="pee_peruntukan" name="pee_peruntukan"
                                                            class="form-control"
                                                            value="{{ old('pee_peruntukan', $data->penyesuaian_elemen_ekonomi['pee_peruntukan'] ?? '') }}" />
                                                    </td>
                                                    <td><input type="text" id="pee_zoning" name="pee_zoning"
                                                            class="form-control"
                                                            value="{{ old('pee_zoning', $data->penyesuaian_elemen_ekonomi['pee_zoning'] ?? '') }}" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="background-color: rgb(244, 241, 241);" class="p-3 rounded">
                                            <label class="form-label" for="Penyesuaian Elemen Lainnya">Penyesuaian Elemen
                                                Lainnya</label>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>Legalitas</th>
                                                    <th>Karakteristik Lainnya</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" id="pel_legalitas" name="pel_legalitas"
                                                            class="form-control"
                                                            value="{{ old('pel_legalitas', $data->penyesuaian_elemen_lainnya['pel_legalitas'] ?? '') }}" />
                                                    </td>
                                                    <td><input type="text" id="pel_karakteristik_lainnya"
                                                            name="pel_karakteristik_lainnya" class="form-control"
                                                            value="{{ old('pel_karakteristik_lainnya', $data->penyesuaian_elemen_lainnya['pel_karakteristik_lainnya'] ?? '') }}" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div>
                                            <label class="form-label" for="harga_penawaran">Harga Penawaran (Rp)</label>
                                            <input type="number" id="harga_penawaran" name="harga_penawaran"
                                                class="form-control"
                                                value="{{ old('harga_penawaran', $data->harga_penawaran) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="harga_penawaran_per_meter">Harga Penawaran Per
                                                Meter (Rp/m²)</label>
                                            <input type="number" id="harga_penawaran_per_meter"
                                                name="harga_penawaran_per_meter" class="form-control"
                                                value="{{ old('harga_penawaran_per_meter', $data->harga_penawaran_per_meter) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="harga_transaksi">Harga Transaksi (Rp)</label>
                                            <input type="number" id="harga_transaksi" name="harga_transaksi"
                                                class="form-control"
                                                value="{{ old('harga_transaksi', $data->harga_transaksi) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="harga_transaksi_per_meter">Harga Transaksi Per
                                                Meter (Rp/m²)</label>
                                            <input type="number" id="harga_transaksi_per_meter"
                                                name="harga_transaksi_per_meter" class="form-control"
                                                value="{{ old('harga_transaksi_per_meter', $data->harga_transaksi_per_meter) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="waktu_penawaran">Waktu Penawaran</label>
                                            <input type="date" id="waktu_penawaran" name="waktu_penawaran"
                                                class="form-control"
                                                value="{{ old('waktu_penawaran', $data->waktu_penawaran) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="waktu_transaksi">Waktu Transaksi</label>
                                            <input type="date" id="waktu_transaksi" name="waktu_transaksi"
                                                class="form-control"
                                                value="{{ old('waktu_transaksi', $data->waktu_transaksi) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="sumber_data">Sumber Data</label>
                                            <input type="text" id="sumber_data" name="sumber_data"
                                                class="form-control"
                                                value="{{ old('sumber_data', $data->sumber_data) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="penyesuaian_waktu">Penyesuaian Waktu</label>
                                            <input type="text" id="penyesuaian_waktu" name="penyesuaian_waktu"
                                                class="form-control"
                                                value="{{ old('penyesuaian_waktu', $data->penyesuaian_waktu) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="indikasi_nilai">Indikasi Nilai</label>
                                            <input type="number" id="indikasi_nilai" name="indikasi_nilai"
                                                class="form-control"
                                                value="{{ old('indikasi_nilai', $data->indikasi_nilai) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="bobot">Bobot</label>
                                            <input type="number" id="bobot" name="bobot" class="form-control"
                                                value="{{ old('bobot', $data->bobot) }}" />
                                        </div>
                                        <div>
                                            <label class="form-label" for="nilai_tertimbang">Nilai Tertimbang</label>
                                            <input type="number" id="nilai_tertimbang" name="nilai_tertimbang"
                                                class="form-control"
                                                value="{{ old('nilai_tertimbang', $data->nilai_tertimbang) }}" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('pembanding-lihat-pembanding') }}"
                                        class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([{{ $data->lat ?? -6.2088 }}, {{ $data->long ?? 106.8456 }}], 13);

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

            var marker = L.marker([{{ $data->lat ?? -6.2088 }}, {{ $data->long ?? 106.8456 }}], {
                draggable: true
            }).addTo(map);

            marker.on('dragend', function(e) {
                document.getElementById('lat').value = marker.getLatLng().lat;
                document.getElementById('long').value = marker.getLatLng().lng;

                fetch(
                        `https://nominatim.openstreetmap.org/reverse?format=json&lat=${marker.getLatLng().lat}&lon=${marker.getLatLng().lng}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        var address = data.display_name;
                        document.getElementById('alamat').value = address;
                    });
            });

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

                marker.setLatLng([lat, lng]);
            });
        });

        // Fungsi untuk menambah baris foto lainnya
        function addFotoRow() {
            const table = document.getElementById('fotoLainnyaTable').getElementsByTagName('tbody')[0];
            const rowCount = table.rows.length;
            const newRow = table.insertRow();

            newRow.innerHTML = `
                <td class="row-number-foto">${rowCount + 1}</td>
                <td><input type="text" name="judul_foto[${rowCount}]" class="form-control" /></td>
                <td><input type="file" name="foto[${rowCount}]" class="form-control" accept="image/*" /></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addFotoRow()">+</button>
                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeFotoRow(this)">-</button>
                </td>
            `;
            updateFotoRowNumbers();
        }

        // Fungsi untuk menghapus baris foto lainnya
        function removeFotoRow(button) {
            const table = document.getElementById('fotoLainnyaTable').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1); // Menyesuaikan indeks untuk header
                updateFotoRowNumbers();
            }
        }

        // Memperbarui nomor urut di tabel Foto Lainnya
        function updateFotoRowNumbers() {
            const rows = document.querySelectorAll('#fotoLainnyaTable .row-number-foto');
            rows.forEach((cell, index) => {
                cell.textContent = index + 1;
            });
        }

        // Fungsi untuk menambah baris NJOP
        function addRow() {
            const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
            const rowCount = table.rows.length;
            const newRow = table.insertRow();

            newRow.innerHTML = `
                <td class="row-number">${rowCount + 1}</td>
                <td><input type="number" name="njop[${rowCount}][tahun]" class="form-control" /></td>
                <td><input type="number" name="njop[${rowCount}][nilai_perolehan]" class="form-control" /></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addRow()">+</button>
                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeRow(this)">-</button>
                </td>
            `;
            updateRowNumbers();
        }

        // Fungsi untuk menghapus baris NJOP
        function removeRow(button) {
            const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1); // Menyesuaikan indeks untuk header
                updateRowNumbers();
            }
        }

        // Memperbarui nomor urut di tabel NJOP
        function updateRowNumbers() {
            const rows = document.querySelectorAll('#njopTable .row-number');
            rows.forEach((cell, index) => {
                cell.textContent = index + 1;
            });
        }

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

        // Menghitung harga penawaran per meter saat input berubah
        document.getElementById('harga_penawaran').addEventListener('input', function() {
            const luasTanah = parseFloat(document.getElementById('luas_tanah').value) || 0;
            const hargaPenawaran = parseFloat(this.value) || 0;

            if (luasTanah > 0) {
                const hargaPerMeter = hargaPenawaran / luasTanah;
                document.getElementById('harga_penawaran_per_meter').value = Math.round(hargaPerMeter);
            }
        });

        document.getElementById('luas_tanah').addEventListener('input', function() {
            const luasTanah = parseFloat(this.value) || 0;
            const hargaPenawaran = parseFloat(document.getElementById('harga_penawaran').value) || 0;

            if (luasTanah > 0) {
                const hargaPerMeter = hargaPenawaran / luasTanah;
                document.getElementById('harga_penawaran_per_meter').value = Math.round(hargaPerMeter);
            }
        });

        // Menghitung harga transaksi per meter saat input berubah
        document.getElementById('harga_transaksi').addEventListener('input', function() {
            const luasTanah = parseFloat(document.getElementById('luas_tanah').value) || 0;
            const hargaTransaksi = parseFloat(this.value) || 0;

            if (luasTanah > 0) {
                const hargaPerMeter = hargaTransaksi / luasTanah;
                document.getElementById('harga_transaksi_per_meter').value = Math.round(hargaPerMeter);
            }
        });

        // Menghitung nilai tertimbang saat input berubah
        document.getElementById('indikasi_nilai').addEventListener('input', calculateNilaiTertimbang);
        document.getElementById('bobot').addEventListener('input', calculateNilaiTertimbang);

        function calculateNilaiTertimbang() {
            const indikasiNilai = parseFloat(document.getElementById('indikasi_nilai').value) || 0;
            const bobot = parseFloat(document.getElementById('bobot').value) || 0;

            const nilaiTertimbang = indikasiNilai * bobot;
            document.getElementById('nilai_tertimbang').value = Math.round(nilaiTertimbang);
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
