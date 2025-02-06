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

    <h4>Tambah Obyek Penilaian – Bangunan</h4>
    <!-- Default -->
    <style>
        .foto-lainnya-container {
            border: 1px solid #dee2e6;
            padding: 10px;
            border-radius: 5px;
        }

        .foto-lainnya-container .form-group {
            margin-bottom: 0;
        }

        .foto-lainnya-container label {
            font-weight: bold;
        }

        .foto-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 5px;
        }

        .foto-item input {
            margin-right: 5px;
        }

        .foto-controls button {
            background: none;
            border: none;
            color: #007bff;
            font-size: 18px;
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



    <div class="row">
        <!-- Default Icons Wizard -->
        <form action="{{ route('object-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12 mb-4">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama_bangunan"><b>Nama Bangunan</b> <span class="text-danger">*</span></label>
                    <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                        placeholder="Rumah Tinggal Pak Budi Sastro" required>
                </div>
                <!-- Upload Foto Tampak Depan -->
                <div class="form-group mb-3">
                    <label for="foto_depan" class="form-label"><b>Upload Foto Tampak Depan</b></label><br>
                    <input type="file" id="foto_depan" name="foto_depan">
                </div>

                <!-- Upload Foto Tampak Sisi Kiri -->
                <div class="form-group mb-3">
                    <label for="foto_sisi_kiri" class="form-label"><b>Upload Foto Tampak Sisi Kiri</b></label><br>
                    <input type="file" id="foto_sisi_kiri" name="foto_sisi_kiri">
                </div>

                <!-- Upload Foto Tampak Sisi Kanan -->
                <div class="form-group mb-3">
                    <label for="foto_sisi_kanan" class="form-label"><b>Upload Foto Tampak Sisi Kanan</b></label><br>
                    <input type="file" id="foto_sisi_kanan" name="foto_sisi_kanan">
                </div>

                <!-- Foto Lainnya -->
                <div class="form-group mb-3">
                    <label for="foto_lainnya"><b>Foto Lainnya</b></label>
                    <div class="foto-lainnya-container">
                        <div class="foto-item">
                            <div style="flex: 1;">
                                <label for="judul_foto_1">Judul Foto</label>
                                <input type="text" name="judul_foto[]" class="form-control" placeholder="Judul Foto">
                            </div>
                            &nbsp;&nbsp;
                            <div style="flex: 1;">
                                <label for="foto_1">Upload Foto</label>
                                <input type="file" name="foto_lainnya[]" class="form-control">
                            </div>
                            <div class="foto-controls">
                                <div class="row">
                                    <button type="button" class="tambah-foto">+</button>
                                    <button type="button" class="hapus-foto">-</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" id="tambah-foto-menengah" class="btn btn-primary btn-sm mt-2">Tambah Foto</a>
                </div>
                <script>
                    document.getElementById('tambah-foto-menengah').addEventListener('click', function(e) {
                        e.preventDefault();
                        const container = document.querySelector('.foto-lainnya-container');
                        const newItem = document.createElement('div');
                        newItem.classList.add('foto-item');
                        newItem.innerHTML = `
        <div style="flex: 1;">
            <label>Judul Foto</label>
            <input type="text" name="judul_foto[]" class="form-control" placeholder="Judul Foto">
        </div>
        &nbsp;&nbsp;
        <div style="flex: 1;">
            <label>Upload Foto</label>
            <input type="file" name="foto_lainnya[]" class="form-control">
        </div>
        <div class="foto-controls">
         <div class="row">
            <button type="button" class="tambah-foto">+</button>
            <button type="button" class="hapus-foto">-</button>
        </div>
        </div>
    `;
                        container.appendChild(newItem);
                    });
                </script>
                <div class="form-group mb-3">
                    <label for="bentuk_bangunan"><b>Bentuk Bangunan</b></label>
                    <select id="bentuk_bangunan" name="bentuk_bangunan" class="form-select">
                        @foreach ($dataBangunan['Bentuk Bangunan'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- Jumlah Lantai -->
                <div class="form-group mb-3">
                    <label for="jumlah_lantai"><b>Jumlah Lantai</b></label>
                    <input type="number" id="jumlah_lantai" name="jumlah_lantai" class="form-control" value="1"
                        min="1">
                </div>

                <!-- Tambahan Form dari Gambar -->
                <div class="form-group mb-3">
                    <label><b>Basement</b></label><br>
                    <input type="checkbox" id="basement" name="basement" value="1">
                    <label for="basement">Ada basement</label>
                </div>

                <div class="form-group mb-3">
                    <label for="konstruksi_bangunan"><b>Konstruksi Bangunan</b></label>
                    <select id="konstruksi_bangunan" name="konstruksi_bangunan" class="form-select">
                        <option value="" selected>- Select -</option>
                        @foreach ($dataBangunan['Konstruksi Bangunan'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="konstruksi_lantai"><b>Konstruksi Lantai</b></label>
                    <select id="konstruksi_lantai" name="konstruksi_lantai" class="form-select">
                        <option value="" selected>- Select -</option>

                        @foreach ($dataBangunan['Konstruksi Lantai'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="konstruksi_dinding"><b>Konstruksi Dinding</b></label>
                    <select id="konstruksi_dinding" name="konstruksi_dinding" class="form-select">
                        <option value="" selected>- Select -</option>

                        @foreach ($dataBangunan['Konstruksi Dinding'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="konstruksi_atap"><b>Konstruksi Atap</b></label>
                    <select id="konstruksi_atap" name="konstruksi_atap" class="form-select">
                        <option value="" selected>- Select -</option>

                        @foreach ($dataBangunan['Konstruksi Atap'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="konstruksi_pondasi"><b>Konstruksi Pondasi</b></label>
                    <select id="konstruksi_pondasi" name="konstruksi_pondasi" class="form-select">
                        <option value="" selected>- Select -</option>
                        @foreach ($dataBangunan['Konstruksi Pondasi'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="versi_btb"><b>Versi BTB</b></label>
                    <input type="text" id="versi_btb" name="versi_btb" class="form-control" value="2024" readonly>
                </div>


                <div class="form-group mb-3">
                    <label for="tipe_spek"><b>Tipikal Bangunan Sesuai Spek BTB MAPPI </b> <span
                            class="text-danger">*</span></label>
                    <select id="tipe_spek" name="tipe_spek" class="form-select" required>
                        <option value="tolol" selected>- Select -</option>
                        <option value="100">Rumah Tinggal Sederhana 1 Lantai</option>
                        <option value="200">Rumah Tinggal Menengah 2 Lantai</option>
                        <option value="300">Rumah Tinggal Mewah 2 Lantai</option>
                        <option value="400">Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                        <option value="500">Bangunan Gudang 1 Lantai</option>
                        <option value="600">Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5 Lantai)</option>
                        <option value="700">Bangunan Gedung Bertingkat Sedang 8 Lantai + 1 Basement (5-8 Lantai)
                        </option>
                        <option value="800">Bangunan Gedung Bertingkat Tinggi 16 Lantai + 2 Basement (&gt;8 Lantai)
                        </option>
                        <option value="900">Bangunan Mall 4 Lantai + 1 Basement</option>
                        <option value="1000">Bangunan Hotel 8 Lantai</option>
                        <option value="1100">Bangunan Apartemen 14 Lantai + 2 Semi Basement</option>
                        <!-- More options... -->
                    </select>
                </div>

                <!-- Tempat untuk memuat form dinamis -->





                <script>
                    // Fungsi untuk menangani perubahan dropdown
                    document.getElementById('tipe_spek').addEventListener('change', function() {
                        const selectedValue = this.value;

                        // Sembunyikan semua form terlebih dahulu
                        document.querySelectorAll(
                            '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                        ).forEach(
                            form => {
                                form.style.display = 'none';
                            });

                        switch (selectedValue) {
                            case '100':
                                document.getElementById('100').style.display = 'block';
                                break;
                            case '200':
                                document.getElementById('200').style.display = 'block';
                                break;
                            case '300':
                                document.getElementById('300').style.display = 'block';
                                break;
                            case '400':
                                document.getElementById('400').style.display = 'block';
                                break;
                            case '500':
                                document.getElementById('500').style.display = 'block';
                                // Tambahkan inisialisasi untuk form 500
                                if (typeof initForm500 === 'function') {
                                    initForm500();
                                }
                                break;
                            case '600':
                                document.getElementById('600').style.display = 'block';
                                break;
                            case '700':
                                document.getElementById('700').style.display = 'block';
                                break;
                            case '800':
                                document.getElementById('800').style.display = 'block';
                                break;
                            case '900':
                                document.getElementById('900').style.display = 'block';
                                break;
                            case '1000':
                                document.getElementById('1000').style.display = 'block';
                                break;
                            case '1100':
                                document.getElementById('1100').style.display = 'block';
                                break;
                            default:
                                // Sembunyikan semua form jika tidak ada yang dipilih
                                document.querySelectorAll(
                                        '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                                    )
                                    .forEach(form => {
                                        form.style.display = 'none';
                                    });
                        }
                    });

                    // Tambahkan fungsi inisialisasi untuk form 500
                    function initForm500() {
                        // Inisialisasi select grade gudang
                        const gradeGudangSelect = document.getElementById('grade_gudang');
                        if (gradeGudangSelect) {
                            // Reset nilai
                            gradeGudangSelect.value = '';

                            // Tampilkan select
                            gradeGudangSelect.closest('.form-group').style.display = 'block';

                            // Trigger change event untuk memastikan handler terpanggil
                            gradeGudangSelect.dispatchEvent(new Event('change'));
                        }
                    }

                    // Tambahkan event listener saat dokumen dimuat
                    document.addEventListener('DOMContentLoaded', function() {
                        // Cek apakah form 500 perlu ditampilkan berdasarkan nilai yang tersimpan
                        const tipeSpekSelect = document.getElementById('tipe_spek');
                        if (tipeSpekSelect && tipeSpekSelect.value === '500') {
                            document.getElementById('500').style.display = 'block';
                            initForm500();
                        }
                    });
                </script>
                <div id ="dynamic-content">
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


                <script>
                    function generateYearOptions(startYear, endYear, selectedYear, elementId) {
                        let options = '';
                        for (let year = startYear; year <= endYear; year++) {
                            const selected = year === selectedYear ? 'selected' : '';
                            options += `<option value="${year}" ${selected}>${year}</option>`;
                        }
                        document.getElementById(elementId).innerHTML = options;
                    }
                    generateYearOptions(1960, currentYear + 7, currentYear, 'tahun_renovasi');
                </script>
                <div class="form-group mb-3">
                    <label for="penggunaan_bangunan"><b>Penggunaan Bangunan Saat Ini</b></label>
                    <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan" class="form-control"
                        placeholder="Disewakan, Selama berapa tahun">
                </div>

                <div class="form-group mb-3">
                    <label><b>Perlengkapan Bangunan</b></label><br>
                    <div>
                        <input type="checkbox" id="listrik" name="perlengkapan_bangunan[]" value="listrik">
                        <label for="listrik">Listrik</label>
                    </div>
                    <div>
                        <input type="checkbox" id="telepon" name="perlengkapan_bangunan[]" value="telepon">
                        <label for="telepon">Telepon</label>
                    </div>
                    <div>
                        <input type="checkbox" id="pdam" name="perlengkapan_bangunan[]" value="pdam">
                        <label for="pdam">PDAM</label>
                    </div>
                    <div>
                        <input type="checkbox" id="gas" name="perlengkapan_bangunan[]" value="gas">
                        <label for="gas">Gas</label>
                    </div>
                    <div>
                        <input type="checkbox" id="ac" name="perlengkapan_bangunan[]" value="ac">
                        <label for="ac">AC</label>
                    </div>
                    <div>
                        <input type="checkbox" id="sumur" name="perlengkapan_bangunan[]" value="sumur">
                        <label for="sumur">Sumur Gali/Pompa</label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="penggunaan_bangunan"><b>Penggunaan Bangunan</b></label>
                    <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan" class="form-control"
                        placeholder="Rumah Tinggal">
                </div>
                <div class="form-group mb-3">
                    <label for="progres_pembangunan"><b>Progres Pembangunan jika aset dalam proses (dalam
                            persen)</b></label>
                    <input type="number" id="progres_pembangunan" name="progres_pembangunan" class="form-control"
                        placeholder="Masukkan nilai dalam persen" min="0" max="100">
                </div>

                <div class="form-group mb-3">
                    <label for="kondisi_bangunan"><b>Kondisi Bangunan</b></label>
                    <select id="kondisi_bangunan" name="kondisi_bangunan" class="form-select">
                        <option value="terawat">Terawat</option>
                        <option value="rusak_ringan">Rusak Ringan</option>
                        <option value="rusak_berat">Rusak Berat</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label><b>Status Data Obyek</b></label><br>
                    <div style="display: flex; gap: 10px;">
                        <div>
                            <input type="radio" id="draft" name="status_data" value="draft" checked>
                            <label for="draft">Draft</label>
                        </div>
                        <div>
                            <input type="radio" id="publish" name="status_data" value="publish">
                            <label for="publish">Publish</label>
                        </div>
                    </div>
                </div>



                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <!-- /Default Icons Wizard -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
