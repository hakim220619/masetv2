@extends('layouts/layoutMaster')

@section('title', 'Edit Bangunan')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss'])
@endsection

@section('content')
    <h4>Edit Obyek Penilaian – Bangunan</h4>

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
        $headers = DB::table('master_data')->select('label_header')->distinct()->pluck('label_header');
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
        <form method="POST" action="{{ route('object.update', $bangunan->id) }}" id="mainForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-12 mb-4">
                <div class="form-group mb-3">
                    <label for="nama_bangunan"><b>Nama Bangunan</b> <span class="text-danger">*</span></label>
                    <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                        value="{{ $bangunan->nama_bangunan }}" required>
                </div>

                <!-- Foto Tampak Depan -->
                <div class="form-group mb-3">
                    <label for="foto_depan" class="form-label"><b>Foto Tampak Depan</b></label>
                    @if ($bangunan->foto_depan)
                        <div class="mb-2">
                            <img src="{{ asset('storage/uploads/bangunan/' . $bangunan->foto_depan) }}"
                                class="img-thumbnail" style="max-width: 200px">
                        </div>
                    @endif
                    <input type="file" id="foto_depan" name="foto_depan" class="form-control">
                </div>

                <!-- Foto Tampak Sisi Kiri -->
                <div class="form-group mb-3">
                    <label for="foto_sisi_kiri" class="form-label"><b>Foto Tampak Sisi Kiri</b></label>
                    @if ($bangunan->foto_sisi_kiri)
                        <div class="mb-2">
                            <img src="{{ asset('storage/uploads/bangunan/' . $bangunan->foto_sisi_kiri) }}"
                                class="img-thumbnail" style="max-width: 200px">
                        </div>
                    @endif
                    <input type="file" id="foto_sisi_kiri" name="foto_sisi_kiri" class="form-control">
                </div>

                <!-- Foto Tampak Sisi Kanan -->
                <div class="form-group mb-3">
                    <label for="foto_sisi_kanan" class="form-label"><b>Foto Tampak Sisi Kanan</b></label>
                    @if ($bangunan->foto_sisi_kanan)
                        <div class="mb-2">
                            <img src="{{ asset('storage/uploads/bangunan/' . $bangunan->foto_sisi_kanan) }}"
                                class="img-thumbnail" style="max-width: 200px">
                        </div>
                    @endif
                    <input type="file" id="foto_sisi_kanan" name="foto_sisi_kanan" class="form-control">
                </div>

                <!-- Foto Lainnya -->
                <div class="form-group mb-3">
                    <label for="foto_lainnya"><b>Foto Lainnya</b></label>
                    <div class="foto-lainnya-container">
                        @php
                            // Pastikan data JSON di-decode dengan benar
                            try {
                                $fotoLainnya = is_string($bangunan->foto_lainnya)
                                    ? json_decode($bangunan->foto_lainnya, true)
                                    : $bangunan->foto_lainnya;

                                // Jika masih string setelah decode pertama (double encoded)
                                if (is_string($fotoLainnya)) {
                                    $fotoLainnya = json_decode($fotoLainnya, true);
                                }

                                // Pastikan hasilnya array
                                $fotoLainnya = is_array($fotoLainnya) ? $fotoLainnya : [];
                            } catch (\Exception $e) {
                                $fotoLainnya = [];
                            }
                        @endphp

                        @if (!empty($fotoLainnya))
                            @foreach ($fotoLainnya as $index => $foto)
                                <div class="foto-item">
                                    <div style="flex: 1;">
                                        <label>Judul Foto</label>
                                        <input type="text" name="judul_foto[]" class="form-control"
                                            value="{{ $foto['judul'] ?? '' }}" placeholder="Judul Foto">
                                    </div>
                                    &nbsp;&nbsp;
                                    <div style="flex: 1;">
                                        <label>Upload Foto</label>
                                        @if (isset($foto['foto']))
                                            <div class="mb-2">
                                                <img src="{{ asset($foto['foto']) }}" class="img-thumbnail"
                                                    style="max-width: 100px">
                                            </div>
                                        @endif
                                        <input type="file" name="foto_lainnya[]" class="form-control">
                                    </div>
                                    <div class="foto-controls">
                                        <div class="row">
                                            <button type="button" class="tambah-foto">+</button>
                                            <button type="button" class="hapus-foto">-</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="foto-item">
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
                            </div>
                        @endif
                    </div>
                    <a href="#" id="tambah-foto-menengah" class="btn btn-primary btn-sm mt-2">Tambah Foto</a>
                </div>

                <!-- Bentuk Bangunan -->
                <div class="form-group mb-3">
                    <label for="bentuk_bangunan"><b>Bentuk Bangunan</b></label>
                    <select id="bentuk_bangunan" name="bentuk_bangunan" class="form-select">
                        @foreach ($dataBangunan['Bentuk Bangunan'] as $item)
                            <option value="{{ $item->label_value }}"
                                {{ $bangunan->bentuk_bangunan == $item->label_value ? 'selected' : '' }}>
                                {{ $item->label_option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Jumlah Lantai -->
                <div class="form-group mb-3">
                    <label for="jumlah_lantai"><b>Jumlah Lantai</b></label>
                    <input type="number" id="jumlah_lantai" name="jumlah_lantai" class="form-control"
                        value="{{ $bangunan->jumlah_lantai }}" min="1">
                </div>

                <!-- Basement -->
                <div class="form-group mb-3">
                    <label><b>Basement</b></label><br>
                    <input type="checkbox" id="basement" name="basement" value="1"
                        {{ $bangunan->basement ? 'checked' : '' }}>
                    <label for="basement">Ada basement</label>
                </div>

                <!-- Konstruksi Bangunan -->
                <div class="form-group mb-3">
                    <label for="konstruksi_bangunan"><b>Konstruksi Bangunan</b></label>
                    <select id="konstruksi_bangunan" name="konstruksi_bangunan" class="form-select">
                        <option value="">- Select -</option>
                        @foreach ($dataBangunan['Konstruksi Bangunan'] as $item)
                            <option value="{{ $item->label_value }}"
                                {{ $bangunan->konstruksi_bangunan == $item->label_value ? 'selected' : '' }}>
                                {{ $item->label_option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Konstruksi Lantai -->
                <div class="form-group mb-3">
                    <label for="konstruksi_lantai"><b>Konstruksi Lantai</b></label>
                    <select id="konstruksi_lantai" name="konstruksi_lantai" class="form-select">
                        <option value="">- Select -</option>
                        @foreach ($dataBangunan['Konstruksi Lantai'] as $item)
                            <option value="{{ $item->label_value }}"
                                {{ $bangunan->konstruksi_lantai == $item->label_value ? 'selected' : '' }}>
                                {{ $item->label_option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Konstruksi Dinding -->
                <div class="form-group mb-3">
                    <label for="konstruksi_dinding"><b>Konstruksi Dinding</b></label>
                    <select id="konstruksi_dinding" name="konstruksi_dinding" class="form-select">
                        <option value="">- Select -</option>
                        @foreach ($dataBangunan['Konstruksi Dinding'] as $item)
                            <option value="{{ $item->label_value }}"
                                {{ $bangunan->konstruksi_dinding == $item->label_value ? 'selected' : '' }}>
                                {{ $item->label_option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Konstruksi Atap -->
                <div class="form-group mb-3">
                    <label for="konstruksi_atap"><b>Konstruksi Atap</b></label>
                    <select id="konstruksi_atap" name="konstruksi_atap" class="form-select">
                        <option value="">- Select -</option>
                        @foreach ($dataBangunan['Konstruksi Atap'] as $item)
                            <option value="{{ $item->label_value }}"
                                {{ $bangunan->konstruksi_atap == $item->label_value ? 'selected' : '' }}>
                                {{ $item->label_option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Konstruksi Pondasi -->
                <div class="form-group mb-3">
                    <label for="konstruksi_pondasi"><b>Konstruksi Pondasi</b></label>
                    <select id="konstruksi_pondasi" name="konstruksi_pondasi" class="form-select">
                        <option value="">- Select -</option>
                        @foreach ($dataBangunan['Konstruksi Pondasi'] as $item)
                            <option value="{{ $item->label_value }}"
                                {{ $bangunan->konstruksi_pondasi == $item->label_value ? 'selected' : '' }}>
                                {{ $item->label_option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Versi BTB -->
                <div class="form-group mb-3">
                    <label for="versi_btb"><b>Versi BTB</b></label>
                    <div>
                        <small><i>Mengupdate versi BTB akan mengubah tipe material bangunan.
                                Mohon periksa kembali bobot material pada kotak-kotak isian dibawah ini
                                sebelum menyimpan form.</i></small>
                    </div>
                    <select class="form-select" name="versi_btb" id="versi_btb">
                        @php
                            $currentYear = date('Y');
                            for ($i = 0; $i < 5; $i++) {
                                $year = $currentYear - $i;
                                $selected = $bangunan->versi_btb == $year ? 'selected' : '';
                                echo "<option value='$year' $selected>$year</option>";
                            }
                        @endphp
                    </select>
                </div>

                <!-- Tipe Spek -->
                <div class="form-group mb-3">
                    <label for="tipe_spek"><b>Tipe Spek</b></label>
                    <select id="tipe_spek" name="tipe_spek" class="form-select">
                        <option value="100" {{ $bangunan->tipe_spek == '100' ? 'selected' : '' }}>100</option>
                        <option value="200" {{ $bangunan->tipe_spek == '200' ? 'selected' : '' }}>200</option>
                        <option value="300" {{ $bangunan->tipe_spek == '300' ? 'selected' : '' }}>300</option>
                        <option value="400" {{ $bangunan->tipe_spek == '400' ? 'selected' : '' }}>400</option>
                        <option value="500" {{ $bangunan->tipe_spek == '500' ? 'selected' : '' }}>500</option>
                        <option value="600" {{ $bangunan->tipe_spek == '600' ? 'selected' : '' }}>600</option>
                        <option value="700" {{ $bangunan->tipe_spek == '700' ? 'selected' : '' }}>700</option>
                        <option value="800" {{ $bangunan->tipe_spek == '800' ? 'selected' : '' }}>800</option>
                        <option value="900" {{ $bangunan->tipe_spek == '900' ? 'selected' : '' }}>900</option>
                        <option value="1000" {{ $bangunan->tipe_spek == '1000' ? 'selected' : '' }}>1000</option>
                        <option value="1100" {{ $bangunan->tipe_spek == '1100' ? 'selected' : '' }}>1100</option>
                    </select>
                </div>

                <!-- Dynamic Content -->
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

                <!-- Penggunaan Bangunan -->
                <div class="form-group mb-3">
                    <label for="penggunaan_bangunan"><b>Penggunaan Bangunan Saat Ini</b></label>
                    <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan" class="form-control"
                        value="{{ $bangunan->penggunaan_bangunan }}" placeholder="Disewakan, Selama berapa tahun">
                </div>

                <!-- Perlengkapan Bangunan -->
                <div class="form-group mb-3">
                    <label><b>Perlengkapan Bangunan</b></label><br>
                    @php
                        $perlengkapan = is_string($bangunan->perlengkapan_bangunan)
                            ? json_decode($bangunan->perlengkapan_bangunan, true)
                            : $bangunan->perlengkapan_bangunan;
                        $perlengkapan = $perlengkapan ?? [];
                    @endphp
                    <div>
                        <input type="checkbox" id="listrik" name="perlengkapan_bangunan[]" value="listrik"
                            {{ in_array('listrik', $perlengkapan) ? 'checked' : '' }}>
                        <label for="listrik">Listrik</label>
                    </div>
                    <div>
                        <input type="checkbox" id="telepon" name="perlengkapan_bangunan[]" value="telepon"
                            {{ in_array('telepon', $perlengkapan) ? 'checked' : '' }}>
                        <label for="telepon">Telepon</label>
                    </div>
                    <div>
                        <input type="checkbox" id="pdam" name="perlengkapan_bangunan[]" value="pdam"
                            {{ in_array('pdam', $perlengkapan) ? 'checked' : '' }}>
                        <label for="pdam">PDAM</label>
                    </div>
                    <div>
                        <input type="checkbox" id="gas" name="perlengkapan_bangunan[]" value="gas"
                            {{ in_array('gas', $perlengkapan) ? 'checked' : '' }}>
                        <label for="gas">Gas</label>
                    </div>
                    <div>
                        <input type="checkbox" id="ac" name="perlengkapan_bangunan[]" value="ac"
                            {{ in_array('ac', $perlengkapan) ? 'checked' : '' }}>
                        <label for="ac">AC</label>
                    </div>
                    <div>
                        <input type="checkbox" id="sumur" name="perlengkapan_bangunan[]" value="sumur"
                            {{ in_array('sumur', $perlengkapan) ? 'checked' : '' }}>
                        <label for="sumur">Sumur Gali/Pompa</label>
                    </div>
                </div>

                <!-- Progres Pembangunan -->
                <div class="form-group mb-3">
                    <label for="progres_pembangunan">
                        <b>Progres Pembangunan jika aset dalam proses (dalam persen)</b>
                    </label>
                    <input type="number" id="progres_pembangunan" name="progres_pembangunan" class="form-control"
                        value="{{ $bangunan->progres_pembangunan }}" placeholder="Masukkan nilai dalam persen"
                        min="0" max="100">
                </div>

                <!-- Kondisi Bangunan -->
                <div class="form-group mb-3">
                    <label for="kondisi_bangunan"><b>Kondisi Bangunan</b></label>
                    <select id="kondisi_bangunan" name="kondisi_bangunan" class="form-select">
                        <option value="terawat" {{ $bangunan->kondisi_bangunan == 'terawat' ? 'selected' : '' }}>
                            Terawat
                        </option>
                        <option value="rusak_ringan"
                            {{ $bangunan->kondisi_bangunan == 'rusak_ringan' ? 'selected' : '' }}>
                            Rusak Ringan
                        </option>
                        <option value="rusak_berat" {{ $bangunan->kondisi_bangunan == 'rusak_berat' ? 'selected' : '' }}>
                            Rusak Berat
                        </option>
                    </select>
                </div>

                <!-- Status Data -->
                <div class="form-group mb-3">
                    <label><b>Status Data Obyek</b></label><br>
                    <div style="display: flex; gap: 10px;">
                        <div>
                            <input type="radio" id="draft" name="status_data" value="draft"
                                {{ $bangunan->status_data == 'draft' ? 'checked' : '' }}>
                            <label for="draft">Draft</label>
                        </div>
                        <div>
                            <input type="radio" id="publish" name="status_data" value="publish"
                                {{ $bangunan->status_data == 'publish' ? 'checked' : '' }}>
                            <label for="publish">Publish</label>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <!-- For other JSON fields -->
    @php
        function decodeJsonField($value)
        {
            if (is_string($value)) {
                return json_decode($value, true) ?? [];
            }
            return $value ?? [];
        }
    @endphp

    <!-- Use the helper function for other JSON fields -->
    @php
        $luasNamaPintuJendela = decodeJsonField($bangunan->luas_nama_pintu_jendela);
        $luasBobotPintuJendela = decodeJsonField($bangunan->luas_bobot_pintu_jendela);
        // ... decode other JSON fields similarly
    @endphp
@endsection

@section('page-script')
    @vite(['resources/assets/js/form-wizard-icons.js'])

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

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipeSpekSelect = document.getElementById('tipe_spek');
            const containers = document.querySelectorAll(
                '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
            );

            // Inisialisasi tampilan awal
            const initialType = '{{ $bangunan->tipe_spek }}';

            // Debug log
            console.log('Initial Type:', initialType);
            console.log('Form Data:', @json($bangunan));

            // Tampilkan container yang sesuai
            containers.forEach(container => {
                container.style.display = container.id === initialType ? 'block' : 'none';

                if (container.id === initialType) {
                    // Cari semua input dalam container aktif
                    const inputs = container.querySelectorAll('input, select, textarea');
                    inputs.forEach(input => {
                        // Dapatkan nama field dengan suffix
                        const fieldName = input.name + '_' + initialType;

                        // Debug log
                        console.log('Looking for field:', fieldName);
                        console.log('Value in data:', @json($bangunan)[fieldName]);

                        // Set nilai jika ada dalam data
                        if (@json($bangunan)[fieldName] !== undefined) {
                            if (input.type === 'checkbox') {
                                input.checked = @json($bangunan)[fieldName];
                            } else if (input.type === 'radio') {
                                if (input.value === @json($bangunan)[fieldName]) {
                                    input.checked = true;
                                }
                            } else {
                                input.value = @json($bangunan)[fieldName];
                            }
                        }
                    });
                }
            });

            // Event listener untuk perubahan tipe_spek
            tipeSpekSelect.addEventListener('change', function() {
                const selectedType = this.value;
                containers.forEach(container => {
                    container.style.display = container.id === selectedType ? 'block' : 'none';
                });
            });
        });
    </script>
@endsection
