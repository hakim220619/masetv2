<style>
    .area-lainnya-container-rumah-sederhana {
        border: 1px solid #dee2e6;
        padding: 10px;
        border-radius: 5px;
    }

    .area-lainnya-container-rumah-sederhana .form-group {
        margin-bottom: 0;
    }

    .area-lainnya-container-rumah-sederhana label {
        font-weight: bold;
    }

    .area-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        padding: 5px;
    }

    .area-item input {
        margin-right: 5px;
    }

    .area-controls button {
        background: none;
        border: none;
        color: #007bff;
        font-size: 18px;
    }

    .canvas-container {
        background: white;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .canvas-container:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .drawing-controls {
        background: white;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .drawing-controls:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn {
        transition: all 0.3s ease;
    }

    .form-control {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>

<div id="100" style=" margin-top: 20px; display: none;">
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted" style="margin-top: 5px;">Pilih jenis bangunan yang sesuai
            untuk menentukan umur ekonomis bangunan.</small>
        <select class="form-control" id="jenis_bangunan_100" name="jenis_bangunan_100">
            <option value="" selected>- Select -</option>
            <option value="rumah_tinggal_100">Bangunan Rumah Tinggal</option>
            <option value="rumah_susun_100">Bangunan Rumah Susun</option>
            <option value="pusat_perbelanjaan_100">Bangunan Pusat Perbelanjaan</option>
            <option value="kantor_100">Bangunan Kantor</option>
            <option value="gedung_pemerintah_100">Bangunan Gedung Pemerintah</option>
            <option value="hotel_motel_100">Bangunan Hotel/Motel</option>
            <option value="industri_gudang_100">Bangunan Industri dan Gudang</option>
            <option value="kawasan_perkebunan_100">Bangunan di Kawasan Perkebunan</option>
        </select>
    </div>

    <div style="margin-top: 20px;">
        <div id="detail_rumah_tinggal_100" class="bangunan-detail-100" style="display: none;">
            <label for="jenis_bangunan_detail" style="font-weight: bold;">Tipe Rumah Tinggal (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted" style="margin-top: 5px;">Pilih tipe bangunan spesifik untuk menentukan
                umur ekonomis bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rumah Tinggal (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_susun_100" class="bangunan-detail-100" style="display: none;">
            <label for="tipe_rusun" style="font-weight: bold;">Tipe Rusun (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted" style="margin-top: 5px;">Pilih tipe bangunan spesifik untuk menentukan
                umur ekonomis bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rusun (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_pusat_perbelanjaan_100" class="bangunan-detail-100" style="display: none;">
            <label for="tipe_perbelanjaan" style="font-weight: bold;">Tipe Pusat Perbelanjaan (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted" style="margin-top: 5px;">Pilih tipe bangunan spesifik untuk menentukan
                umur ekonomis bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Pusat Perbelanjaan (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_kantor_100" class="bangunan-detail-100" style="display: none;">
            <label for="tipe_kantor" style="font-weight: bold;">Tipe Bangunan Kantor (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted" style="margin-top: 5px;">Pilih tipe bangunan spesifik untuk menentukan
                umur ekonomis bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Kantor (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_pemerintah_100" class="bangunan-detail-100" style="display: none;">
            <label for="tipe_gedung_pemerintah" style="font-weight: bold;">Tipe Gedung Pemerintah (Umur
                Ekonomis)</label>
            <br>
            <small class="form-text text-muted" style="margin-top: 5px;">Pilih tipe bangunan spesifik untuk menentukan
                umur ekonomis bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Gedung Pemerintah (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_hotel_motel_200" class="bangunan-detail-200" style="display: none;">
            <label for="tipe_hotel_motel" style="font-weight: bold;">Tipe Hotel / Motel (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted" style="margin-top: 5px;">Pilih tipe bangunan spesifik untuk menentukan
                umur ekonomis bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Hotel / Motel (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_industri_gudang_200" class="bangunan-detail-200" style="display: none;">
            <label for="tipe_industri_gudang" style="font-weight: bold;">Tipe Bangunan Industri dan Gudang (Umur
                Ekonomis)</label>
            <br>
            <small class="form-text text-muted" style="margin-top: 5px;">Pilih tipe bangunan spesifik untuk menentukan
                umur ekonomis bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Industri dan Gudang (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_kawasan_perkebunan_100" class="bangunan-detail-100" style="display: none;">
            <label for="tipe_perkebunan" style="font-weight: bold;">Tipe Bangunan Perkebunan (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted" style="margin-top: 5px;">Pilih tipe bangunan spesifik untuk menentukan
                umur ekonomis bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Perkebunan (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <script>
        document.getElementById('jenis_bangunan_100').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.bangunan-detail-100').forEach(el => el.style.display = 'none');
            // Tampilkan detail yang sesuai
            const selectedValue = this.value;
            if (selectedValue) {
                const detailElement = document.getElementById('detail_' + selectedValue);
                if (detailElement) {
                    detailElement.style.display = 'block';
                }
            }
        });
    </script>

    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_indeks_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks Lantai)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks
            lantai MAPPI.</small>
        <select class="form-control" id="jenis_bangunan_indeks_lantai_100" name="jenis_bangunan_indeks_lantai">
            <option value="" selected>- Select -</option>
            <option value="rumah_sederhana_100">Rumah Tinggal Sederhana</option>
            <option value="rumah_menengah_100">Rumah Tinggal Menengah</option>
            <option value="rumah_mewah_100">Rumah Tinggal Mewah</option>
            <option value="gedung_low_100">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)</option>
            <option value="gedung_mid_100">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)</option>
            <option value="gedung_high_100">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai)</option>
        </select>
    </div>

    <!-- Detail forms untuk setiap jenis bangunan (indeks lantai) -->
    <div style="margin-top: 20px;">
        <div id="detail_rumah_sederhana_100" class="lantai-detail-100" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_sederhana">Jumlah Lantai Rumah Tinggal Sederhana</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Sederhana'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_menengah_100" class="lantai-detail-100" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_menengah">Jumlah Lantai Rumah Tinggal Menengah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Menengah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_mewah_100" class="lantai-detail-100" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_mewah">Jumlah Lantai Rumah Tinggal Mewah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Mewah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_low_100" class="lantai-detail-100" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_low">Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (5 Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_low_rise_100" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_mid_100" class="lantai-detail-100" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_mid">Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (9 Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_mid_rise_100" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_high_100" class="lantai-detail-100" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_high">Jumlah Lantai Bangunan Gedung Bertingkat High Rise (8
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_high_rise_100"
                name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat High Rise (>8 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <script>
        document.getElementById('jenis_bangunan_indeks_lantai_100').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.lantai-detail-100').forEach(el => el.style.display = 'none');

            // Tampilkan detail yang sesuai
            const selectedValue = this.value;
            if (selectedValue) {
                const detailElement = document.getElementById('detail_' + selectedValue);
                if (detailElement) {
                    detailElement.style.display = 'block';
                }
            }
        });
    </script>

    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
        <select class="form-control" id="tahun_dibangun" name="tahun_dibangun"
            onchange="toggleCheckboxes(this, 'checkboxContainerDibangun')">
            <script>
                const currentYear = new Date().getFullYear();
                const startYear = 1900;
                const endYear = currentYear + 7;
                let options = '';

                for (let year = startYear; year <= endYear; year++) {
                    const selected = year === currentYear ? 'selected' : '';
                    options += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.getElementById('tahun_dibangun').innerHTML = options;
            </script>
        </select>
    </div>
    <div id="checkboxContainerDibangun" style="display: none; margin-top: 20px;">
        <label style="font-weight: bold;">Sumber Informasi Tahun Dibangun</label><br>
        <label><input type="checkbox" name="keterangan_tahun_dibangun[]" value="keterangan_pendamping_lokasi">
            Keterangan pendamping lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan_tahun_dibangun[]" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan_tahun_dibangun[]" value="pengamatan_visual"> Pengamatan
            visual</label><br>
        <label><input type="checkbox" name="keterangan_tahun_dibangun[]" value="keterangan_lingkungan"> Keterangan
            lingkungan</label><br>
    </div>

    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
        <select class="form-control" id="tahun_renovasi" name="tahun_renovasi"
            onchange="toggleCheckboxes(this, 'checkboxContainerRenovasi')">
            <script>
                const currentYearklkk = new Date().getFullYear(); // Pastikan currentYearklkk didefinisikan
                const startYearRenovasi = 1960;
                const endYearRenovasi = currentYearklkk + 7;
                let optionsRenovasi = '';

                for (let year = startYearRenovasi; year <= endYearRenovasi; year++) {
                    const selected = year === currentYearklkk ? 'selected' : '';
                    optionsRenovasi += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.getElementById('tahun_renovasi').innerHTML = optionsRenovasi;
            </script>
        </select>
    </div>

    <div id="checkboxContainerRenovasi" style="display: none; margin-top: 20px;">
        <label style="font-weight: bold;">Sumber Informasi Tahun Renovasi</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="keterangan_pendamping_lokasi">
            Keterangan pendamping lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="pengamatan_visual"> Pengamatan
            visual</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="keterangan_lingkungan"> Keterangan
            lingkungan</label><br>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px">
        <label for="jenis_renovasi_100"><b>Jenis Renovasi</b></label>
        <small class="form-text text-muted">Masukkan jenis renovasi yang dilakukan</small>
        <input type="text" id="jenis_renovasi_100" name="jenis_renovasi_100" class="form-control"
            placeholder="Contoh: Renovasi Atap">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px">
        <label for="bobot_renovasi_100"><b>Bobot Renovasi (%)</b></label>
        <small class="form-text text-muted">Masukkan persentase bobot renovasi (0-100)</small>
        <input type="number" id="bobot_renovasi_100" name="bobot_renovasi_100" class="form-control" min="0"
            max="100" step="1" placeholder="Contoh: 25">
    </div>


    <div class="form-group" style="margin-top: 20px;">
        <label for="kondisi_visual" style="font-weight: bold;">Kondisi Bangunan Secara Visual</label>
        <select class="form-control" id="kondisi_visual" name="kondisi_visual">
            <option value="" selected>- Select -</option>

            @foreach ($dataBangunan['Kondisi Bangunan Secara Visual'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label for="catatan_khusus" style="font-weight: bold;">Catatan Khusus Bangunan</label>
        <textarea class="form-control" id="catatan_khusus" name="catatan_khusus" rows="4"
            placeholder="Tambahkan catatan khusus di sini..."></textarea>
    </div>

    <!-- Tambahkan Luas Bangunan Fisik -->
    <div class="form-group mb-4">
        <label for="luas_bangunan_fisik" style="font-weight: bold;">Luas Bangunan Fisik</label>
        <div class="row g-4" data-type="luas-bangunan-fisik">
            <!-- Canvas Column -->
            <div class="col-md-8">
                <div class="canvas-container bg-white">
                    <canvas id="drawingCanvas" width="800" height="600"></canvas>
                    <div class="canvas-helper">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Scroll untuk zoom, klik dan tahan untuk menggeser canvas
                        </small>
                    </div>
                </div>
            </div>

            <!-- Tools Column -->
            <div class="col-md-4">
                <div class="tools-container">
                    <!-- Navigation Controls -->
                    <div class="nav-controls mb-3">
                        <div class="d-flex justify-content-center">
                            <div class="nav-button-group">
                                <button type="button" class="nav-btn" onclick="setDirection('up')">
                                    <i class="fas fa-chevron-up"></i>
                                </button>
                                <div class="d-flex">
                                    <button type="button" class="nav-btn" onclick="setDirection('left')">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button type="button" class="nav-btn" onclick="setDirection('down')">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <button type="button" class="nav-btn" onclick="setDirection('right')">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Measurement Inputs -->
                    <div class="measurement-inputs">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-arrows-alt-h"></i>
                            </span>
                            <input type="number" id="distance" class="form-control" placeholder="Jarak (m)">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <i class="fas fa-drafting-compass"></i>
                            </span>
                            <input type="number" id="angle" class="form-control" placeholder="Sudut (°)">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons mb-4">
                        <button type="button" class="btn btn-primary w-100 mb-2" onclick="drawLine()">
                            <i class="fas fa-pen me-2"></i>Gambar Garis
                        </button>
                        <button type="button" class="btn btn-success w-100 mb-2" onclick="closePolygon()">
                            <i class="fas fa-vector-square me-2"></i>Tutup Area
                        </button>
                        <button type="button" class="btn btn-outline-danger w-100" onclick="clearCanvas()">
                            <i class="fas fa-undo me-2"></i>Hapus Garis Terakhir
                        </button>
                    </div>

                    <!-- Form Fields -->
                    <div class="form-fields">
                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-tag me-2"></i>Nomor/Nama Lantai
                            </label>
                            <input type="text" class="form-control" name="nama_lantai[]"
                                placeholder="Contoh: Teras, Basement, Lantai 1">
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-calculator me-2"></i>Faktor Pengali
                            </label>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="faktor_pengali[]" id="pengali_1"
                                    value="1" checked>
                                <label class="btn btn-outline-primary" for="pengali_1">1.0</label>
                                <input type="radio" class="btn-check" name="faktor_pengali[]" id="pengali_0.5"
                                    value="0.5">
                                <label class="btn btn-outline-primary" for="pengali_0.5">0.5</label>
                            </div>
                        </div>

                        <!-- Tambahkan field Luas Bangunan -->
                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-ruler-combined me-2"></i>Luas Bangunan (m²)
                            </label>
                            <input type="number" class="form-control" name="luas_bangunan[]" placeholder="0"
                                step="0.01" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Lantai Button -->
    <div class="mt-3">
        <button type="button" class="btn btn-primary" id="add-lantai-btn">
            <i class="fas fa-plus-circle me-2"></i>Tambah Lantai
        </button>
    </div>

    <div id="lantai-container-wrapper">
        <!-- Container untuk lantai tambahan akan dimasukkan di sini -->
    </div>

    <!-- Field Baru: Luas Bangunan Terpotong (m²) -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="luas_bangunan_terpotong" style="font-weight: bold;">Luas Bangunan Terpotong
            (m²)</label><br>
        <small class="form-text text-muted">Terpotong atau alasannya lainnya.</small>
        <input type="number" class="form-control" id="luas_bangunan_terpotong" name="luas_bangunan_terpotong"
            placeholder="Enter Area" min="0" step="1">
    </div>

    <!-- Field Baru: Luas Bangunan menurut IMB (m²) -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="luas_bangunan_imb" style="font-weight: bold;">Luas Bangunan menurut IMB
            (m²)</label>
        <input type="number" class="form-control" id="luas_bangunan_imb" name="luas_bangunan_imb"
            placeholder="Enter Area" min="0" step="1">
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Pintu dan Jendela</b></label><br>
        <small class="form-text text-muted">Masukkan luas pintu dan jendela yang ada.</small>
        <div class="area-lainnya-container-rumah-sederhana" data-type="pintu-jendela">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_pintu_jendela[]" class="form-control"
                        placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="text" name="luas_bobot_pintu_jendela[]" class="form-control"
                        placeholder="Luas (m²)" min="0" step="0.01">
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
            data-type="pintu-jendela">Tambah Area</button>
    </div>

    <!-- Luas Dinding -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Dinding</b></label><br>
        <small class="form-text text-muted">Masukkan luas dinding kotor belum dikurangi luas pintu dan
            jendela.</small>
        <div class="area-lainnya-container-rumah-sederhana" data-type="dinding">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_dinding[]" class="form-control" placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="text" name="luas_bobot_dinding[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01">
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
            data-type="dinding">Tambah Area</button>
    </div>
    <!-- Luas Rangka Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Rangka Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas rangka atap datar.</small>
        <div class="area-lainnya-container-rumah-sederhana" data-type="rangka-atap-datar">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_rangka_atap_datar[]" class="form-control"
                        placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="text" name="luas_bobot_rangka_atap_datar[]" class="form-control"
                        placeholder="Luas (m²)" min="0" step="0.01">
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
            data-type="rangka-atap-datar">Tambah Area</button>
    </div>

    <!-- Luas Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas atap datar.</small>
        <div class="area-lainnya-container-rumah-sederhana" data-type="atap-datar">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_atap_datar[]" class="form-control"
                        placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="text" name="luas_bobot_atap_datar[]" class="form-control"
                        placeholder="Luas (m²)" min="0" step="0.01">
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
            data-type="atap-datar">Tambah Area</button>
    </div>
    <!-- Tipe Pondasi Existing -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Pondasi Eksisting - Rumah Tinggal Sederhana 1 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Batu Kali" id="pondasi_batu_kali"
                    name="tipe_pondasi_existing[]" onchange="toggleBobotInput(this, 'bobot_pondasi_batu_kali')">
                <label class="form-check-label" for="pondasi_batu_kali">Batu Kali</label>
            </div>
        </div>
        <div id="bobot_pondasi_batu_kali" style="display: none; margin-top: 10px;">
            <label for="bobot_batu_kali">Bobot Pondasi Batu Kali (dalam persen %)</label>
            <input type="text" class="form-control" id="bobot_batu_kali" name="bobot_tipe_pondasi_existing[]"
                placeholder="Masukkan bobot dalam persen">
        </div>
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
        <div id="pondasi-container">
            <div class="area-lainnya-container-rumah-sederhana" data-type="pondasi">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_pondasi_existing[]" class="form-control">
                            <option value="" selected>- Select -</option>

                            @foreach ($dataBangunan['Tambah Tipe Pondasi Eksisting'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_tipe_pondasi_existing[]" class="form-control"
                            placeholder="Masukkan bobot">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
                data-type="pondasi">Tambah Tipe Pondasi Existing</button>

        </div>



    </div>
    <!-- Tipe Struktur Existing -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Struktur Eksisting - Rumah Tinggal Sederhana 1 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Beton Bertulang"
                    name="tipe_struktur_existing[]" id="struktur_beton_bertulang"
                    onchange="toggleBobotInput(this, 'bobot_struktur_beton_bertulang')">
                <label class="form-check-label" for="struktur_beton_bertulang">Beton Bertulang</label>
            </div>
        </div>
        <div id="bobot_struktur_beton_bertulang" style="display: none; margin-top: 10px;">
            <label for="bobot_beton_bertulang">Bobot Struktur Beton Bertulang (dalam persen %)</label>
            <input type="text" class="form-control" id="bobot_beton_bertulang"
                name="bobot_tipe_struktur_existing[]" placeholder="Masukkan bobot dalam persen" min="0"
                max="100" step="0.01">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
        <div id="struktur-container" style="display: none;">
            <div class="area-lainnya-container-rumah-sederhana" data-type="struktur">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_struktur_existing[]" class="form-control">
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Struktur Eksisting'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_tipe_struktur_existing[]" class="form-control"
                            placeholder="Masukkan bobot">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
                data-type="struktur">Tambah Tipe Struktur Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn">Tambah Tipe
            Struktur Existing</button>
    </div>

    <!-- Tipe Rangka Atap Existing -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Eksisting - Rumah Tinggal Sederhana 1 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Dak Beton (Jika Pakai Balok)"
                    id="atap_dak_beton" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_dak_beton">Dak Beton (Jika Pakai Balok)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Genteng)" id="atap_kayu_genteng"
                    name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_kayu_genteng">Kayu (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)"
                    id="atap_kayu_asbes" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_kayu_asbes">Kayu (Atap Asbes, Seng dll, Tanpa Reng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Genteng)"
                    id="atap_baja_genteng" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_baja_genteng">Baja Ringan (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Asbes, Seng dll)"
                    id="atap_baja_asbes" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_baja_asbes">Baja Ringan (Atap Asbes, Seng dll)</label>
            </div>
        </div>
    </div>

    <!-- Content sections for each option -->
    <div id="content-atap_dak_beton" class="content" style="display: none;">
        <label><b>Bobot Dak Beton (Jika Pakai Balok)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_kayu_genteng" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_kayu_asbes" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_baja_genteng" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_baja_asbes" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Asbes, Seng dll)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>



    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Existing</b></label><br>
        <div id="rangka-atap-container" style="display: none;">
            <div class="area-lainnya-container-rumah-sederhana" data-type="rangka-atap">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_rangka_atap_existing[]" class="form-control">
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tipe Rangka Atap Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_rangka_atap_existing[]" class="form-control"
                            placeholder="Masukkan bobot">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
                data-type="rangka-atap">Tambah Tipe Rangka Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-btn">Tambah
            Tipe Rangka Atap Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Sederhana 1
                Lantai</strong></label><br>
        <input type="checkbox" id="asbes" name="tipe_penutup_atap_existing[]" value="Asbes"
            class="form-check-input">
        <label for="asbes" class="form-check-label">Asbes</label><br>

        <input type="checkbox" id="dak-beton" name="tipe_penutup_atap_existing[]" value="Dak Beton"
            class="form-check-input">
        <label for="dak-beton" class="form-check-label">Dak Beton</label><br>

        <input type="checkbox" id="fibreglass" name="tipe_penutup_atap_existing[]" value="Fibreglass"
            class="form-check-input">
        <label for="fibreglass" class="form-check-label">Fibreglass</label><br>

        <input type="checkbox" id="genteng-tanah-liat" name="tipe_penutup_atap_existing[]"
            value="Genteng Tanah Liat" class="form-check-input">
        <label for="genteng-tanah-liat" class="form-check-label">Genteng Tanah Liat</label><br>

        <input type="checkbox" id="genteng-beton" name="tipe_penutup_atap_existing[]" value="Genteng Beton"
            class="form-check-input">
        <label for="genteng-beton" class="form-check-label">Genteng Beton</label><br>

        <input type="checkbox" id="genteng-metal" name="tipe_penutup_atap_existing[]" value="Genteng Metal"
            class="form-check-input">
        <label for="genteng-metal" class="form-check-label">Genteng Metal</label><br>

        <input type="checkbox" id="seng-gelombang" name="tipe_penutup_atap_existing[]" value="Seng Gelombang"
            class="form-check-input">
        <label for="seng-gelombang" class="form-check-label">Seng Gelombang</label><br>

        <input type="checkbox" id="spandek" name="tipe_penutup_atap_existing[]" value="Spandek"
            class="form-check-input">
        <label for="spandek" class="form-check-label">Spandek</label><br>

        <input type="checkbox" id="pvc" name="tipe_penutup_atap_existing[]" value="PVC"
            class="form-check-input">
        <label for="pvc" class="form-check-label">PVC</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-asbes" class="content" style="display: none;">
        <label><b>Bobot Asbes</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-dak-beton" class="content" style="display: none;">
        <label><b>Bobot Dak Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-fibreglass" class="content" style="display: none;">
        <label><b>Bobot Fibreglass</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-genteng-tanah-liat" class="content" style="display: none;">
        <label><b>Bobot Genteng Tanah Liat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-genteng-beton" class="content" style="display: none;">
        <label><b>Bobot Genteng Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-genteng-metal" class="content" style="display: none;">
        <label><b>Bobot Genteng Metal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-seng-gelombang" class="content" style="display: none;">
        <label><b>Bobot Seng Gelombang</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-spandek" class="content" style="display: none;">
        <label><b>Bobot Spandek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-pvc" class="content" style="display: none;">
        <label><b>Bobot PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
        <div id="penutup-atap-existing-container" style="display: none;">
            <div class="area-lainnya-container-rumah-sederhana" data-type="penutup-atap-existing">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_penutup_atap_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_penutup_atap_existing[]" class="form-control"
                            placeholder="Masukkan bobot">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
                data-type="penutup-atap-existing">Tambah Tipe Penutup Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-penutup-atap-existing-btn">Tambah Tipe
            Penutup Atap Existing</button>
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Dinding Existing</strong></label><br>
        <input type="checkbox" id="batako" class="form-check-input" name="tipe_tipe_dinding_existing[]">
        <label for="batako" class="form-check-label">Batako</label><br>
        <input type="checkbox" id="bata-merah" class="form-check-input" name="tipe_tipe_dinding_existing[]">
        <label for="bata-merah" class="form-check-label">Bata Merah</label><br>
        <input type="checkbox" id="bata-ringan" class="form-check-input" name="tipe_tipe_dinding_existing[]">
        <label for="bata-ringan" class="form-check-label">Bata Ringan</label><br>
        <input type="checkbox" id="gypsumboard" class="form-check-input" name="tipe_tipe_dinding_existing[]">
        <label for="gypsumboard" class="form-check-label">Partisi Gypsumboard 2 Muka</label><br>
        <input type="checkbox" id="rooster-bata" class="form-check-input" name="tipe_tipe_dinding_existing[]">
        <label for="rooster-bata" class="form-check-label">Rooster Bata</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-batako" class="content" style="display: none;">
        <label><b>Bobot Dinding Batako</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-bata-merah" class="content" style="display: none;">
        <label><b>Bobot Dinding Bata Merah</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-bata-ringan" class="content" style="display: none;">
        <label><b>Bobot Dinding Bata Ringan</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-gypsumboard" class="content" style="display: none;">
        <label><b>Bobot Dinding Partisi Gypsumboard 2 Muka</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-rooster-bata" class="content" style="display: none;">
        <label><b>Bobot Dinding Rooster Bata</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>



    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Dinding Existing</b></label><br>
        <div id="tipe-dinding-existing-container" style="display: none;">
            <div class="area-lainnya-container-rumah-sederhana" data-type="tipe-dinding-existing">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe_dinding_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Dinding Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_tipe_dinding_existing[]" class="form-control"
                            placeholder="Masukkan bobot">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
                data-type="tipe-dinding-existing">Tambah Tipe Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-dinding-existing-btn">Tambah Tipe
            Dinding Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pelapis Dinding Eksisting - Rumah Tinggal Sederhana 1 Lantai</strong></label><br>
        <input type="checkbox" id="dilapis-cat" class="form-check-input" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Cat (Diplester dan Diaci)">
        <label for="dilapis-cat" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>

        <input type="checkbox" id="dilapis-keramik" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Keramik">
        <label for="dilapis-keramik" class="form-check-label">Dilapis Keramik</label><br>

        <input type="checkbox" id="dilapis-wallpaper" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Wallpaper">
        <label for="dilapis-wallpaper" class="form-check-label">Dilapis Wallpaper</label><br>

        <input type="checkbox" id="dilapis-mozaik" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Mozaik">
        <label for="dilapis-mozaik" class="form-check-label">Dilapis Mozaik</label><br>

        <input type="checkbox" id="dilapis-batu-alam" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Batu Alam">
        <label for="dilapis-batu-alam" class="form-check-label">Dilapis Batu Alam</label><br>
    </div>


    <!-- Content sections for each option -->
    <div id="content-dilapis-cat" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-dilapis-keramik" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-dilapis-wallpaper" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-dilapis-mozaik" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-dilapis-batu-alam" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
        <div id="tipe-pelapis-dinding-existing-container" style="display: none;">
            <div class="area-lainnya-container-rumah-sederhana" data-type="tipe-pelapis-dinding-existing">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe_pelapis_dinding_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pelapis Dinding Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_tipe_pelapis_dinding_existing[]" class="form-control"
                            placeholder="Masukkan bobot">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
                data-type="tipe-pelapis-dinding-existing">Tambah Tipe Pelapis Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pelapis-dinding-existing-btn">Tambah
            Tipe Pelapis Dinding Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pintu & Jendela Eksisting - Rumah Tinggal Sederhana 1 Lantai</strong></label><br>

        <input type="checkbox" id="pintu-kayu-panil" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Kayu Panil">
        <label for="pintu-kayu-panil" class="form-check-label">Pintu Kayu Panil</label><br>

        <input type="checkbox" id="pintu-kayu-dobel" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Kayu Dobel Triplek/ HPL">
        <label for="pintu-kayu-dobel" class="form-check-label">Pintu Kayu Dobel Triplek/ HPL</label><br>

        <input type="checkbox" id="pintu-kaca-aluminium" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Kaca Rk Aluminium">
        <label for="pintu-kaca-aluminium" class="form-check-label">Pintu Kaca Rk Aluminium</label><br>

        <input type="checkbox" id="jendela-kaca-kayu" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Jendela Kaca Rk Kayu">
        <label for="jendela-kaca-kayu" class="form-check-label">Jendela Kaca Rk Kayu</label><br>

        <input type="checkbox" id="jendela-kaca-aluminium" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Jendela Kaca Rk Aluminium">
        <label for="jendela-kaca-aluminium" class="form-check-label">Jendela Kaca Rk Aluminium</label><br>

        <input type="checkbox" id="pintu-km-upvc" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu KM UPVC/PVC">
        <label for="pintu-km-upvc" class="form-check-label">Pintu KM UPVC/PVC</label><br>
    </div>


    <!-- Content sections for each option -->
    <div id="content-pintu-kayu-panil" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Panil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-kayu-dobel" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Dobel Triplek/ HPL</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-kaca-aluminium" class="content" style="display: none;">
        <label><b>Bobot Pintu Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-jendela-kaca-kayu" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-jendela-kaca-aluminium" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-km-upvc" class="content" style="display: none;">
        <label><b>Bobot Pintu KM UPVC/PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
        <div id="tipe-pintu-jendela-existing-container" style="display: none;">
            <div class="area-lainnya-container-rumah-sederhana" data-type="tipe-pintu-jendela-existing">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe_pintu_jendela_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pintu & Jendela Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_tipe_pintu_jendela_existing[]" class="form-control"
                            placeholder="Masukkan bobot">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
                data-type="tipe-pintu-jendela-existing">Tambah Tipe Pintu & Jendela Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pintu-jendela-existing-btn">Tambah
            Tipe Pintu & Jendela Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Lantai Eksisting - Rumah Tinggal Sederhana 1 Lantai</strong></label><br>

        <input type="checkbox" id="granit-homogenous-tile-100" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Granit/Homogenous Tile">
        <label for="granit-homogenous-tile-100" class="form-check-label">Granit/Homogenous Tile</label><br>

        <input type="checkbox" id="karpet-100" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Karpet">
        <label for="karpet-100" class="form-check-label">Karpet</label><br>

        <input type="checkbox" id="keramik-lantai-100" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Keramik">
        <label for="keramik-lantai-100" class="form-check-label">Keramik</label><br>

        <input type="checkbox" id="rabat-beton-100" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Rabat Beton (Semen Ekspose)">
        <label for="rabat-beton-100" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>

        <input type="checkbox" id="teraso-100" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Teraso">
        <label for="teraso-100" class="form-check-label">Teraso</label><br>

        <input type="checkbox" id="vynil-100" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Vynil">
        <label for="vynil-100" class="form-check-label">Vynil</label><br>

        <input type="checkbox" id="papan-kayu-100" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Papan Kayu">
        <label for="papan-kayu-100" class="form-check-label">Papan Kayu</label><br>
    </div>


    <!-- Content sections for each option -->
    <div id="content-granit-homogenous-tile-100" class="content" style="display: none;">
        <label><b>Bobot Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-karpet-100" class="content" style="display: none;">
        <label><b>Bobot Karpet</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-keramik-lantai-100" class="content" style="display: none;">
        <label><b>Bobot Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-rabat-beton-100" class="content" style="display: none;">
        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-teraso-100" class="content" style="display: none;">
        <label><b>Bobot Teraso</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-vynil-100" class="content" style="display: none;">
        <label><b>Bobot Vynil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-papan-kayu-100" class="content" style="display: none;">
        <label><b>Bobot Papan Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Lantai Existing</b></label><br>
        <div id="tipe-lantai-existing-container" style="display: none;">
            <div class="area-lainnya-container-rumah-sederhana" data-type="tipe-lantai-existing">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe_lantai_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Lantai Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_tipe_lantai_existing[]" class="form-control"
                            placeholder="Masukkan bobot">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link-rumah-sederhana"
                data-type="tipe-lantai-existing">Tambah Tipe Lantai Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-lantai-existing-btn">Tambah Tipe
            Lantai Existing</button>
    </div>


</div>

<script>
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const contentId = `content-${checkbox.id}`;
            const contentElement = document.getElementById(contentId);
            if (contentElement) {
                contentElement.style.display = checkbox.checked ? 'block' : 'none';

                // Jika checkbox tidak dicentang, set nilai input bobot ke null
                if (!checkbox.checked) {
                    const inputElement = contentElement.querySelector('input[type="text"]');
                    if (inputElement) {
                        inputElement.value = '';
                    }
                }
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk membuat item area baru
        function createAreaItem(type) {
            const areaItem = document.createElement('div');
            areaItem.classList.add('area-item', 'd-flex', 'align-items-center', 'mb-2');
            let nameNama, nameLuas, nameTipe, nameBobot;

            // Logika khusus untuk tipe pondasi
            if (type === 'pondasi') {
                nameTipe = 'tipe_pondasi_existing[]';
                nameBobot = 'bobot_pondasi_existing[]';

                areaItem.innerHTML = `
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tipe Material</label>
                                        <select name="${nameTipe}" class="form-control" >
                                            <option value="" selected>- Select -</option>

                                            @foreach ($dataBangunan['Tambah Tipe Pondasi Eksisting'] as $item)
                                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Bobot (%)</label>
                                        <input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" >
                                    </div>
                                    <div class="area-controls">
                                        <div class="row">
                                            <button type="button" class="add-area-btn">+</button>
                                            <button type="button" class="remove-area-btn">-</button>
                                        </div>
                                    </div>
                                `;
                return areaItem;
            }
            if (type === 'struktur') {
                nameTipe = 'tipe_struktur_existing[]';
                nameBobot = 'bobot_tipe_struktur_existing[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" >
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Tambah Tipe Struktur Eksisting'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" >
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                return areaItem;
            }

            if (type === 'rangka-atap') {
                nameTipe = 'tipe_rangka_atap_existing[]';
                nameBobot = 'bobot_rangka_atap_existing[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" >
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Tipe Rangka Atap Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" >
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                return areaItem;
            }
            if (type === 'penutup-atap-existing') {
                nameTipe = 'tipe_penutup_atap_existing[]';
                nameBobot = 'bobot_penutup_atap_existing[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" >
            <option value="">- Select -</option>
             @foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" >
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                return areaItem;
            }

            if (type === 'tipe-dinding-existing') {
                nameTipe = 'tipe_tipe_dinding_existing[]';
                nameBobot = 'bobot_tipe_dinding_existing[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" >
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Tambah Tipe Dinding Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" >
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                return areaItem;
            }
            if (type === 'tipe-pelapis-dinding-existing') {
                nameTipe = 'tipe_tipe_pelapis_dinding_existing[]';
                nameBobot = 'bobot_tipe_pelapis_dinding_existing[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" >
            <option value="">- Select -</option>
           @foreach ($dataBangunan['Tambah Tipe Pelapis Dinding Existing'] as $item)
            <option value="{{ $item->label_value }}">{{ $item->label_option }}
            </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" >
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                return areaItem;
            }
            if (type === 'tipe-lantai-existing') {
                nameTipe = 'tipe_tipe_lantai_existing[]';
                nameBobot = 'bobot_tipe_lantai_existing[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" >
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Tambah Tipe Lantai Existing'] as $item)
            <option value="{{ $item->label_value }}">{{ $item->label_option }}
            </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" >
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                return areaItem;
            }
            if (type === 'tipe-pintu-jendela-existing') {
                nameTipe = 'tipe_tipe_pintu_jendela_existing[]';
                nameBobot = 'bobot_tipe_pintu_jendela_existing[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" >
            <option value="">- Select -</option>
             @foreach ($dataBangunan['Tambah Tipe Pintu & Jendela Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" >
    </div>
    <div class="area-controls">
        <div class="row">
            <button type="button" class="add-area-btn">+</button>
            <button type="button" class="remove-area-btn">-</button>
        </div>
    </div>
    `;
                return areaItem;
            }





            // Logika umum untuk tipe lainnya
            if (type === 'pintu-jendela') {
                nameNama = 'luas_nama_pintu_jendela[]';
                nameLuas = 'luas_bobot_pintu_jendela[]';
            } else if (type === 'dinding') {
                nameNama = 'luas_nama_dinding[]';
                nameLuas = 'luas_bobot_dinding[]';
            } else if (type === 'rangka-atap-datar') {
                nameNama = 'luas_nama_rangka_atap_datar[]';
                nameLuas = 'luas_bobot_rangka_atap_datar[]';
            } else if (type === 'atap-datar') {
                nameNama = 'luas_nama_atap_datar[]';
                nameLuas = 'luas_bobot_atap_datar[]';
            }

            areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Nama Area</label>
            <input type="text" name="${nameNama}" class="form-control" placeholder="Nama Area" >
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Luas (m²)</label>
            <input type="text" name="${nameLuas}" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" >
        </div>
        <div class="area-controls">
            <div class="row">
                <button type="button" class="add-area-btn">+</button>
                <button type="button" class="remove-area-btn">-</button>
            </div>
        </div>
    `;
            return areaItem;
        }


        // Menangani klik pada tombol "Tambah Area"
        document.querySelectorAll('.add-area-link-rumah-sederhana').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const type = this.getAttribute('data-type');
                const areaContainer = document.querySelector(
                    `.area-lainnya-container-rumah-sederhana[data-type="${type}"]`);
                const newAreaItem = createAreaItem(type);
                areaContainer.appendChild(newAreaItem);
            });
        });

        // Event delegation untuk tombol add dan remove dalam masing-masing container
        document.querySelectorAll('.area-lainnya-container-rumah-sederhana').forEach(function(container) {
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('add-area-btn')) {
                    e.preventDefault();
                    const type = container.getAttribute('data-type');
                    const newAreaItem = createAreaItem(type);
                    container.appendChild(newAreaItem);
                }

                if (e.target.classList.contains('remove-area-btn')) {
                    e.preventDefault();
                    const areaItem = e.target.closest('.area-item');
                    if (areaItem) {
                        // Pastikan setidaknya ada satu area-item
                        if (container.children.length > 1) {
                            container.removeChild(areaItem);
                        } else {
                            container.removeChild(areaItem);
                        }
                    }
                }
            });
        });


    });

    function toggleCheckboxes(selectElement, targetId) {
        const year = selectElement.value;
        const checkboxContainer = document.getElementById(targetId);

        // Show checkbox container if a year is selected, otherwise hide it
        if (year) {
            checkboxContainer.style.display = 'block';
        } else {
            checkboxContainer.style.display = 'none';
        }
    }

    function toggleBobotInput(checkbox, targetId) {
        const bobotInput = document.getElementById(targetId);
        if (checkbox.checked) {
            bobotInput.style.display = 'block';
        } else {
            bobotInput.style.display = 'none';
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pondasiContainer = document.getElementById('pondasi-container');
        const showPondasiBtn = document.getElementById('show-pondasi-btn');
        const addPondasiBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="pondasi"]');

        // Awal hanya tombol show yang terlihat
        addPondasiBtn.style.display = 'none';

        showPondasiBtn.addEventListener('click', function() {
            pondasiContainer.style.display = 'block'; // Tampilkan container
            showPondasiBtn.remove(); // Hapus tombol show
            addPondasiBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addPondasiBtn.addEventListener('click', function() {
            // Logika menambahkan area pondasi sudah ditangani di kode lain
            console.log('Area baru untuk pondasi ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const strukturContainer = document.getElementById('struktur-container');
        const showStrukturBtn = document.getElementById('show-struktur-btn');
        const addStrukturBtn = document.querySelector('.add-area-link-rumah-sederhana[data-type="struktur"]');

        // Awal hanya tombol show yang terlihat
        addStrukturBtn.style.display = 'none';

        showStrukturBtn.addEventListener('click', function() {
            strukturContainer.style.display = 'block'; // Tampilkan container
            showStrukturBtn.remove(); // Hapus tombol show
            addStrukturBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addStrukturBtn.addEventListener('click', function() {
            // Logika untuk menambah area struktur ditangani di kode area lainnya
            console.log('Area baru untuk struktur ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('rangka-atap-container');
        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link-rumah-sederhana[data-type="rangka-atap"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';

        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            console.log('Area baru untuk rangka atap ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-container');
        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link-rumah-sederhana[data-type="penutup-atap-existing"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';

        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            console.log('Area baru untuk rangka atap ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('tipe-dinding-existing-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-dinding-existing-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link-rumah-sederhana[data-type="tipe-dinding-existing"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';

        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            console.log('Area baru untuk rangka atap ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link-rumah-sederhana[data-type="tipe-pelapis-dinding-existing"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';

        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            console.log('Area baru untuk rangka atap ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link-rumah-sederhana[data-type="tipe-lantai-existing"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';

        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            console.log('Area baru untuk rangka atap ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link-rumah-sederhana[data-type="tipe-pintu-jendela-existing"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';

        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            console.log('Area baru untuk rangka atap ditambahkan');
        });
    });
</script>

<style>
    .canvas-container {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        background: #fff;
        height: 100%;
    }

    #drawingCanvas {
        width: 100%;
        height: 100%;
        background: #fff;
        cursor: grab;
    }

    #drawingCanvas:active {
        cursor: grabbing;
    }

    .tools-container {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
    }

    .nav-controls .btn {
        width: 40px;
        height: 40px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #dee2e6;
    }

    .input-group-text {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    .btn {
        padding: 8px 16px;
        border-radius: 4px;
    }

    .btn-check:checked+.btn-outline-primary {
        background-color: #0d6efd;
        color: #fff;
    }

    .form-control {
        border: 1px solid #dee2e6;
        padding: 8px 12px;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }

    .canvas-helper {
        margin-top: 10px;
        text-align: center;
        color: #6c757d;
    }

    .nav-controls {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
    }

    .nav-controls .btn {
        width: 40px;
        height: 40px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #dee2e6;
        background: white;
        transition: all 0.2s;
    }

    .nav-controls .btn:hover {
        background: #e9ecef;
        border-color: #adb5bd;
    }

    .nav-controls .btn:active {
        background: #dee2e6;
        transform: translateY(1px);
    }

    .nav-controls .btn i {
        font-size: 16px;
        color: #495057;
    }
</style>

<style>
    .nav-button-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
    }

    .nav-btn {
        width: 40px;
        height: 40px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        margin: 2px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .nav-btn:hover {
        background: #f8f9fa;
        border-color: #adb5bd;
    }

    .nav-btn:active {
        background: #e9ecef;
        transform: translateY(1px);
    }

    .input-group-text {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        padding: 0.375rem 0.75rem;
    }

    .form-control {
        border: 1px solid #dee2e6;
        padding: 0.375rem 0.75rem;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>
<script>
    // Menyimpan data untuk semua canvas
    var points = []; // titik untuk canvas utama
    var scale = 40; // 1 meter = 40 pixels
    var zoomCenter = {
        x: 400,
        y: 300
    };
    var zoomLevel = 1; // level zoom untuk canvas utama
    var offsetX = 0; // offset X untuk canvas utama
    var offsetY = 0; // offset Y untuk canvas utama
    var isPanning = false; // flag untuk drag pada canvas utama
    var startPanX = 0;
    var startPanY = 0;
    var canvasData = {}; // Object untuk menyimpan data canvas tambahan
    var isDragging = false;
    var lastX = 0;
    var lastY = 0;

    document.addEventListener('DOMContentLoaded', function() {
        // Verifikasi jika canvas utama ada
        const mainCanvas = document.getElementById('drawingCanvas');
        if (mainCanvas) {
            // Inisialisasi canvas utama di sini
            setupCanvas('drawingCanvas');

            // Tambahkan titik awal di tengah canvas untuk canvas utama
            const ctx = mainCanvas.getContext('2d');
            points = [{
                x: mainCanvas.width / 2,
                y: mainCanvas.height / 2
            }];

            // Gambar canvas utama awal
            redrawCanvas('drawingCanvas');
        }

        // Fungsi untuk menambahkan lantai baru
        const addLantaiBtn = document.getElementById('add-lantai-btn');
        if (addLantaiBtn) {
            addLantaiBtn.addEventListener('click', function() {
                // Buat ID unik untuk canvas dan elemen baru
                const uniqueId = 'canvas_' + Date.now();

                // Buat container baru untuk lantai
                const newFloorContainer = document.createElement('div');
                newFloorContainer.classList.add('form-group', 'mb-4', 'lantai-container');
                newFloorContainer.setAttribute('data-type', 'luas-bangunan-fisik');

                // Tambahkan HTML untuk lantai baru
                newFloorContainer.innerHTML = `
                    <hr class="my-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Lantai Baru</h5>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-lantai">
                            <i class="fas fa-trash"></i> Hapus Lantai
                        </button>
                    </div>
                    <div class="row g-4">
                        <!-- Canvas Column -->
                        <div class="col-md-8">
                            <div class="canvas-container bg-white">
                                <canvas id="${uniqueId}" width="800" height="600"></canvas>
                                <div class="canvas-helper">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Scroll untuk zoom, klik dan tahan untuk menggeser canvas
                                    </small>
                                </div>
                            </div>
                        </div>
        
                        <!-- Tools Column -->
                        <div class="col-md-4">
                            <div class="tools-container">
                                <!-- Navigation Controls -->
                                <div class="nav-controls mb-3">
                                    <div class="d-flex justify-content-center">
                                        <div class="nav-button-group">
                                            <button type="button" class="nav-btn" onclick="setDirection('up', '${uniqueId}')">
                                                <i class="fas fa-chevron-up"></i>
                                            </button>
                                            <div class="d-flex">
                                                <button type="button" class="nav-btn" onclick="setDirection('left', '${uniqueId}')">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <button type="button" class="nav-btn" onclick="setDirection('down', '${uniqueId}')">
                                                    <i class="fas fa-chevron-down"></i>
                                                </button>
                                                <button type="button" class="nav-btn" onclick="setDirection('right', '${uniqueId}')">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Measurement Inputs -->
                                <div class="measurement-inputs">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fas fa-arrows-alt-h"></i>
                                        </span>
                                        <input type="number" id="distance_${uniqueId}" class="form-control" placeholder="Jarak (m)">
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <i class="fas fa-drafting-compass"></i>
                                        </span>
                                        <input type="number" id="angle_${uniqueId}" class="form-control" placeholder="Sudut (°)">
                                    </div>
                                </div>
        
                                <!-- Action Buttons -->
                                <div class="action-buttons mb-4">
                                    <button type="button" class="btn btn-primary w-100 mb-2" onclick="drawLine('${uniqueId}')">
                                        <i class="fas fa-pen me-2"></i>Gambar Garis
                                    </button>
                                    <button type="button" class="btn btn-success w-100 mb-2" onclick="closePolygon('${uniqueId}')">
                                        <i class="fas fa-vector-square me-2"></i>Tutup Area
                                    </button>
                                    <button type="button" class="btn btn-outline-danger w-100" onclick="clearCanvas('${uniqueId}')">
                                        <i class="fas fa-undo me-2"></i>Hapus Garis Terakhir
                                    </button>
                                </div>
        
                                <!-- Form Fields -->
                                <div class="form-fields">
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center">
                                            <i class="fas fa-tag me-2"></i>Nomor/Nama Lantai
                                        </label>
                                        <input type="text" class="form-control" name="nama_lantai[]"
                                            placeholder="Contoh: Teras, Basement, Lantai 1">
                                    </div>
        
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center">
                                            <i class="fas fa-calculator me-2"></i>Faktor Pengali
                                        </label>
                                        <div class="btn-group w-100" role="group">
                                            <input type="radio" class="btn-check" name="faktor_pengali_${uniqueId}" id="pengali_1_${uniqueId}"
                                                value="1" checked>
                                            <label class="btn btn-outline-primary" for="pengali_1_${uniqueId}">1.0</label>
                                            <input type="radio" class="btn-check" name="faktor_pengali_${uniqueId}" id="pengali_0.5_${uniqueId}"
                                                value="0.5">
                                            <label class="btn btn-outline-primary" for="pengali_0.5_${uniqueId}">0.5</label>
                                        </div>
                                        <input type="hidden" name="faktor_pengali[]" value="1" class="pengali-value-${uniqueId}">
                                    </div>
        
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center">
                                            <i class="fas fa-ruler-combined me-2"></i>Luas Bangunan (m²)
                                        </label>
                                        <input type="number" class="form-control" name="luas_bangunan[]" id="luas_${uniqueId}" 
                                            placeholder="0" step="0.01" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Tambahkan container lantai baru ke wrapper
                const wrapper = document.getElementById('lantai-container-wrapper');
                if (wrapper) {
                    wrapper.appendChild(newFloorContainer);
                }

                // Inisialisasi canvas baru
                setTimeout(() => {
                    const newCanvas = document.getElementById(uniqueId);
                    if (newCanvas) {
                        // Inisialisasi data untuk canvas baru
                        canvasData[uniqueId] = {
                            points: [{
                                x: newCanvas.width / 2,
                                y: newCanvas.height / 2
                            }],
                            zoomLevel: 1,
                            offsetX: 0,
                            offsetY: 0,
                            isPanning: false,
                            startPanX: 0,
                            startPanY: 0,
                            scale: 40,
                            zoomCenter: {
                                x: newCanvas.width / 2,
                                y: newCanvas.height / 2
                            },
                            isDragging: false,
                            lastX: 0,
                            lastY: 0,
                            isClosed: false
                        };

                        // Setup pengali radio button
                        const pengali1 = document.getElementById(`pengali_1_${uniqueId}`);
                        const pengali05 = document.getElementById(`pengali_0.5_${uniqueId}`);
                        const pengaliValue = document.querySelector(
                            `.pengali-value-${uniqueId}`);

                        if (pengali1 && pengali05 && pengaliValue) {
                            pengali1.addEventListener('change', function() {
                                pengaliValue.value = "1";
                            });

                            pengali05.addEventListener('change', function() {
                                pengaliValue.value = "0.5";
                            });
                        }

                        // Setup event listeners untuk canvas baru
                        setupCanvas(uniqueId);

                        // Gambar canvas awal
                        redrawCanvas(uniqueId);
                    }
                }, 100);

                // Tambahkan event listener untuk tombol hapus lantai
                const removeBtn = newFloorContainer.querySelector('.remove-lantai');
                if (removeBtn) {
                    removeBtn.addEventListener('click', function() {
                        // Hapus data canvas
                        if (canvasData[uniqueId]) {
                            delete canvasData[uniqueId];
                        }
                        // Hapus elemen DOM
                        newFloorContainer.remove();
                    });
                }
            });
        }
    });

    // Fungsi untuk menggambar titik
    function drawPoint(x, y, ctx) {
        ctx.beginPath();
        ctx.arc(x, y, 3, 0, 2 * Math.PI);
        ctx.fillStyle = 'red';
        ctx.fill();
    }

    // Fungsi untuk menggambar pengukuran
    function drawMeasurement(startX, startY, endX, endY, distance, ctx) {
        let midX = (startX + endX) / 2;
        let midY = (startY + endY) / 2;

        ctx.save();
        ctx.font = '12px Arial';
        ctx.fillStyle = 'blue';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';

        let angle = Math.atan2(endY - startY, endX - startX);
        let offset = 15;

        midX += Math.sin(angle) * offset;
        midY -= Math.cos(angle) * offset;

        ctx.translate(midX, midY);
        ctx.rotate(angle);
        ctx.fillText(distance + ' m', 0, 0);
        ctx.restore();
    }

    // Fungsi untuk mengkalkulasi area
    function calculateArea(canvasId = 'drawingCanvas') {
        let currentPoints;
        let currentScale;
        let currentZoom;

        if (canvasId === 'drawingCanvas') {
            currentPoints = points;
            currentScale = scale;
            currentZoom = zoomLevel;
        } else {
            if (!canvasData[canvasId]) return 0;
            currentPoints = canvasData[canvasId].points;
            currentScale = canvasData[canvasId].scale;
            currentZoom = canvasData[canvasId].zoomLevel;
        }

        if (currentPoints.length < 3) return 0;

        let area = 0;
        for (let i = 0; i < currentPoints.length; i++) {
            let j = (i + 1) % currentPoints.length;
            area += currentPoints[i].x * currentPoints[j].y;
            area -= currentPoints[j].x * currentPoints[i].y;
        }
        area = Math.abs(area) / (2 * currentScale * currentScale * currentZoom * currentZoom);
        return area.toFixed(2);
    }

    // Fungsi untuk setup canvas dan event listeners
    function setupCanvas(canvasId) {
        const canvas = document.getElementById(canvasId);
        if (!canvas) {
            console.error('Canvas dengan ID ' + canvasId + ' tidak ditemukan');
            return;
        }

        // Tambahkan event listeners untuk canvas
        canvas.addEventListener('mousedown', function(e) {
            startPan(e, canvasId);
        });
        canvas.addEventListener('mousemove', function(e) {
            pan(e, canvasId);
        });
        canvas.addEventListener('mouseup', function() {
            endPan(canvasId);
        });
        canvas.addEventListener('mouseleave', function() {
            endPan(canvasId);
        });

        // Event untuk zoom dengan wheel mouse (versi sederhana)
        canvas.addEventListener('wheel', function(e) {
            e.preventDefault(); // Mencegah scroll halaman

            // Dapatkan posisi mouse relatif terhadap canvas
            const rect = canvas.getBoundingClientRect();
            const mouseX = e.clientX - rect.left;
            const mouseY = e.clientY - rect.top;

            // Tentukan arah zoom (positif untuk zoom in, negatif untuk zoom out)
            const zoomDirection = e.deltaY < 0 ? 1 : -1;
            const zoomFactor = 1.1; // Faktor zoom sederhana

            // Terapkan zoom ke canvas yang tepat
            if (canvasId === 'drawingCanvas') {
                // Zoom in atau out berdasarkan arah
                if (zoomDirection > 0) {
                    zoomLevel *= zoomFactor; // Zoom in
                } else {
                    zoomLevel /= zoomFactor; // Zoom out
                }

                // Batasi zoom level
                zoomLevel = Math.min(Math.max(0.1, zoomLevel), 10);
            } else {
                if (!canvasData[canvasId]) return;

                // Zoom in atau out berdasarkan arah
                if (zoomDirection > 0) {
                    canvasData[canvasId].zoomLevel *= zoomFactor; // Zoom in
                } else {
                    canvasData[canvasId].zoomLevel /= zoomFactor; // Zoom out
                }

                // Batasi zoom level
                canvasData[canvasId].zoomLevel = Math.min(Math.max(0.1, canvasData[canvasId].zoomLevel), 10);
            }

            // Redraw canvas
            redrawCanvas(canvasId);
        }, {
            passive: false
        });

        // Set style cursor awal untuk drag
        canvas.style.cursor = 'grab';

        // Redraw canvas awal
        redrawCanvas(canvasId);
    }

    // Fungsi untuk menggambar ulang canvas
    function redrawCanvas(canvasId = 'drawingCanvas') {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Dapatkan data yang sesuai untuk canvas ini
        let currentPoints, currentScale, currentZoom, currentOffsetX, currentOffsetY;

        if (canvasId === 'drawingCanvas') {
            currentPoints = points;
            currentScale = scale;
            currentZoom = zoomLevel;
            currentOffsetX = offsetX;
            currentOffsetY = offsetY;
        } else {
            if (!canvasData[canvasId]) return;
            currentPoints = canvasData[canvasId].points;
            currentScale = canvasData[canvasId].scale;
            currentZoom = canvasData[canvasId].zoomLevel;
            currentOffsetX = canvasData[canvasId].offsetX;
            currentOffsetY = canvasData[canvasId].offsetY;
        }

        // Tampilkan info zoom untuk debugging
        ctx.save();
        ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
        ctx.font = '10px Arial';
        ctx.fillText(`Zoom: ${currentZoom.toFixed(2)}x`, 10, 15);
        ctx.restore();

        // Simpan transformasi
        ctx.save();

        // Terapkan transformasi untuk zoom dan pan
        ctx.translate(currentOffsetX, currentOffsetY);
        ctx.scale(currentZoom, currentZoom);

        // Jika tidak ada titik, kembalikan
        if (currentPoints.length === 0) {
            ctx.restore();
            return;
        }

        // Gambar titik dan garis
        for (let i = 0; i < currentPoints.length; i++) {
            // Gambar titik
            ctx.beginPath();
            ctx.arc(currentPoints[i].x, currentPoints[i].y, 3 / currentZoom, 0, 2 * Math.PI);
            ctx.fillStyle = i === 0 ? 'blue' : 'red';
            ctx.fill();

            // Gambar garis jika ada titik sebelumnya
            if (i > 0) {
                ctx.beginPath();
                ctx.moveTo(currentPoints[i - 1].x, currentPoints[i - 1].y);
                ctx.lineTo(currentPoints[i].x, currentPoints[i].y);
                ctx.strokeStyle = 'black';
                ctx.lineWidth = 1 / currentZoom;
                ctx.stroke();

                // Hitung jarak untuk pengukuran
                const dx = currentPoints[i].x - currentPoints[i - 1].x;
                const dy = currentPoints[i].y - currentPoints[i - 1].y;
                const distance = Math.sqrt(dx * dx + dy * dy) / currentScale;

                // Tampilkan pengukuran
                const midX = (currentPoints[i - 1].x + currentPoints[i].x) / 2;
                const midY = (currentPoints[i - 1].y + currentPoints[i].y) / 2;

                ctx.save();
                ctx.font = `${12/currentZoom}px Arial`;
                ctx.fillStyle = 'blue';
                ctx.textAlign = 'center';
                ctx.fillText(`${distance.toFixed(2)} m`, midX, midY - 5 / currentZoom);
                ctx.restore();
            }
        }

        // Kembalikan transformasi
        ctx.restore();
    }

    // Fungsi untuk menggambar grid
    function drawGrid(ctx, width, height, zoom, offsetX, offsetY, gridScale) {
        const gridSize = gridScale;
        ctx.strokeStyle = '#eee';
        ctx.lineWidth = 0.5;

        // Calculate grid boundaries
        const startX = -offsetX % gridSize;
        const startY = -offsetY % gridSize;

        // Gambar garis vertikal
        for (let x = startX; x < width; x += gridSize) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, height);
            ctx.stroke();
        }

        // Gambar garis horizontal
        for (let y = startY; y < height; y += gridSize) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(width, y);
            ctx.stroke();
        }
    }

    // Fungsi untuk mengatur arah
    function setDirection(direction, canvasId = 'drawingCanvas') {
        const distanceInput = document.getElementById(canvasId === 'drawingCanvas' ? 'distance' :
            `distance_${canvasId}`);
        const angleInput = document.getElementById(canvasId === 'drawingCanvas' ? 'angle' :
            `angle_${canvasId}`);

        if (!distanceInput || !angleInput) {
            console.error('Input tidak ditemukan untuk canvas:', canvasId);
            return;
        }

        let angle = 0;

        switch (direction) {
            case 'up':
                angle = 270;
                break;
            case 'right':
                angle = 0;
                break;
            case 'down':
                angle = 90;
                break;
            case 'left':
                angle = 180;
                break;
        }

        angleInput.value = angle;
    }

    // Fungsi untuk menggambar garis
    function drawLine(canvasId = 'drawingCanvas') {
        // Dapatkan input distance dan angle
        const distanceInput = document.getElementById(canvasId === 'drawingCanvas' ? 'distance' :
            `distance_${canvasId}`);
        const angleInput = document.getElementById(canvasId === 'drawingCanvas' ? 'angle' :
            `angle_${canvasId}`);

        if (!distanceInput || !angleInput) {
            console.error('Input tidak ditemukan untuk canvas:', canvasId);
            return;
        }

        const distance = parseFloat(distanceInput.value);
        const angle = parseFloat(angleInput.value || 0);

        if (isNaN(distance) || distance <= 0) {
            alert('Masukkan jarak yang valid');
            return;
        }

        // Dapatkan data yang sesuai untuk canvas ini
        let currentPoints, currentScale;
        const canvas = document.getElementById(canvasId);

        if (canvasId === 'drawingCanvas') {
            currentPoints = points;
            currentScale = scale;
        } else {
            if (!canvasData[canvasId]) return;
            currentPoints = canvasData[canvasId].points;
            currentScale = canvasData[canvasId].scale;
        }

        // Convert angle to radians
        const radians = (angle * Math.PI) / 180;

        // Calculate new point
        let newX, newY;

        if (currentPoints.length === 0) {
            // First point at center
            newX = canvas.width / 2;
            newY = canvas.height / 2;
        } else {
            // Calculate from last point
            const lastPoint = currentPoints[currentPoints.length - 1];
            newX = lastPoint.x + distance * currentScale * Math.cos(radians);
            newY = lastPoint.y + distance * currentScale * Math.sin(radians);
        }

        // Add new point
        if (canvasId === 'drawingCanvas') {
            points.push({
                x: newX,
                y: newY
            });
        } else {
            canvasData[canvasId].points.push({
                x: newX,
                y: newY
            });
            // Reset isClosed flag ketika menambah titik baru
            canvasData[canvasId].isClosed = false;
        }

        // Redraw canvas
        redrawCanvas(canvasId);
    }

    // Fungsi untuk menutup polygon
    function closePolygon(canvasId = 'drawingCanvas') {
        let currentPoints;

        if (canvasId === 'drawingCanvas') {
            currentPoints = points;
        } else {
            if (!canvasData[canvasId]) return;
            currentPoints = canvasData[canvasId].points;
        }

        if (currentPoints.length < 3) {
            alert('Minimal diperlukan 3 titik untuk membuat area tertutup');
            return;
        }

        // Tambahkan titik terakhir ke titik awal untuk menutup polygon
        currentPoints.push({
            ...currentPoints[0]
        });

        // Set flag isClosed
        if (canvasId !== 'drawingCanvas') {
            canvasData[canvasId].isClosed = true;
        }

        // Redraw canvas
        redrawCanvas(canvasId);

        // Hitung dan tampilkan luas
        const area = calculateArea(canvasId);

        // Dapatkan input luas bangunan
        const luasBangunanInput = canvasId === 'drawingCanvas' ?
            document.querySelector('input[name="luas_bangunan[]"]') :
            document.getElementById(`luas_${canvasId}`);

        if (luasBangunanInput) {
            luasBangunanInput.value = area;
        }
    }

    // Fungsi untuk menghapus garis terakhir
    function clearCanvas(canvasId = 'drawingCanvas') {
        // Dapatkan data yang sesuai untuk canvas ini
        if (canvasId === 'drawingCanvas') {
            if (points.length > 1) {
                points.pop();
            }

            // Reset luas bangunan
            const luasBangunanInput = document.querySelector('input[name="luas_bangunan[]"]');
            if (luasBangunanInput) {
                luasBangunanInput.value = '';
            }
        } else {
            if (!canvasData[canvasId]) return;

            if (canvasData[canvasId].points.length > 1) {
                canvasData[canvasId].points.pop();
            }

            // Reset isClosed flag
            canvasData[canvasId].isClosed = false;

            // Reset luas bangunan
            const luasBangunanInput = document.getElementById(`luas_${canvasId}`);
            if (luasBangunanInput) {
                luasBangunanInput.value = '';
            }
        }

        // Redraw canvas
        redrawCanvas(canvasId);
    }

    // Fungsi untuk mulai pan
    function startPan(e, canvasId = 'drawingCanvas') {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        canvas.style.cursor = 'grabbing';

        if (canvasId === 'drawingCanvas') {
            isPanning = true;
            startPanX = e.clientX - offsetX;
            startPanY = e.clientY - offsetY;
        } else {
            if (!canvasData[canvasId]) return;
            canvasData[canvasId].isPanning = true;
            canvasData[canvasId].startPanX = e.clientX - canvasData[canvasId].offsetX;
            canvasData[canvasId].startPanY = e.clientY - canvasData[canvasId].offsetY;
        }
    }

    // Fungsi untuk melakukan pan
    function pan(e, canvasId = 'drawingCanvas') {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        let isPanningCurrent;

        if (canvasId === 'drawingCanvas') {
            isPanningCurrent = isPanning;
        } else {
            if (!canvasData[canvasId]) return;
            isPanningCurrent = canvasData[canvasId].isPanning;
        }

        if (!isPanningCurrent) return;

        if (canvasId === 'drawingCanvas') {
            offsetX = e.clientX - startPanX;
            offsetY = e.clientY - startPanY;
        } else {
            canvasData[canvasId].offsetX = e.clientX - canvasData[canvasId].startPanX;
            canvasData[canvasId].offsetY = e.clientY - canvasData[canvasId].startPanY;
        }

        redrawCanvas(canvasId);
    }

    // Fungsi untuk mengakhiri pan
    function endPan(canvasId = 'drawingCanvas') {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        canvas.style.cursor = 'grab';

        if (canvasId === 'drawingCanvas') {
            isPanning = false;
        } else {
            if (!canvasData[canvasId]) return;
            canvasData[canvasId].isPanning = false;
        }
    }

    // Fungsi untuk zoom
    function handleZoom(e, canvasId = 'drawingCanvas') {
        e.preventDefault();

        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        const rect = canvas.getBoundingClientRect();
        const mouseX = e.clientX - rect.left;
        const mouseY = e.clientY - rect.top;

        let currentZoom, currentZoomCenter, currentPoints;

        if (canvasId === 'drawingCanvas') {
            currentZoom = zoomLevel;
            currentZoomCenter = zoomCenter;
            currentPoints = points;
        } else {
            if (!canvasData[canvasId]) return;
            currentZoom = canvasData[canvasId].zoomLevel;
            currentZoomCenter = canvasData[canvasId].zoomCenter;
            currentPoints = canvasData[canvasId].points;
        }

        // Update zoom center ke posisi mouse
        currentZoomCenter = {
            x: mouseX,
            y: mouseY
        };

        // Zoom in atau out berdasarkan arah scroll
        const oldZoom = currentZoom;
        if (e.deltaY < 0) {
            currentZoom *= 1.1; // Zoom in
        } else {
            currentZoom *= 0.9; // Zoom out
        }

        // Batasi zoom level
        currentZoom = Math.min(Math.max(0.1, currentZoom), 10);

        // Update data zoom
        if (canvasId === 'drawingCanvas') {
            zoomLevel = currentZoom;
            zoomCenter = currentZoomCenter;
        } else {
            canvasData[canvasId].zoomLevel = currentZoom;
            canvasData[canvasId].zoomCenter = currentZoomCenter;
        }

        // Redraw canvas
        redrawCanvas(canvasId);
    }

    // Tambahkan fungsi untuk mengumpulkan data canvas
    function getCanvasData() {
        // Data untuk canvas utama
        const mainCanvas = document.getElementById('drawingCanvas');
        let mainData = {};

        if (mainCanvas) {
            mainData = {
                points: points.map(p => ({
                    x: p.x,
                    y: p.y
                })),
                zoomLevel: zoomLevel,
                offset: {
                    x: offsetX,
                    y: offsetY
                }
            };
        }

        // Data untuk canvas tambahan
        const additionalData = {};
        for (const canvasId in canvasData) {
            if (document.getElementById(canvasId)) {
                additionalData[canvasId] = {
                    points: canvasData[canvasId].points.map(p => ({
                        x: p.x,
                        y: p.y
                    })),
                    zoomLevel: canvasData[canvasId].zoomLevel,
                    offset: {
                        x: canvasData[canvasId].offsetX,
                        y: canvasData[canvasId].offsetY
                    },
                    isClosed: canvasData[canvasId].isClosed || false
                };
            }
        }

        return {
            main: mainData,
            additional: additionalData,
            tipe_spek: document.querySelector('input[name="tipe_spek"]')?.value || '100'
        };
    }

    // Tambahkan event listener untuk form submit
    document.addEventListener('DOMContentLoaded', function() {
        const formElements = document.querySelectorAll('form');
        if (formElements.length > 0) {
            formElements.forEach(form => {
                form.addEventListener('submit', function(e) {
                    // Dapatkan data canvas
                    const canvasDataToSave = getCanvasData();
                    console.log('Data canvas yang akan disimpan:', canvasDataToSave);

                    // Hapus input hidden lama jika ada
                    const existingInput = this.querySelector('input[name="canvas_data"]');
                    if (existingInput) {
                        existingInput.remove();
                    }

                    // Tambahkan input hidden untuk menyimpan data canvas
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'canvas_data';
                    input.value = JSON.stringify(canvasDataToSave);
                    this.appendChild(input);
                });
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Jika ada data canvas yang tersimpan dan tipe_spek sesuai
        @if (isset($bangunan->canvas_data) && $bangunan->tipe_spek === '100')
            const savedData = @json($bangunan->canvas_data);

            // Restore data untuk canvas utama
            if (savedData.main) {
                points = savedData.main.points.map(p => ({
                    x: p.x,
                    y: p.y
                }));

                zoomLevel = savedData.main.zoomLevel || 1;
                offsetX = savedData.main.offset?.x || 0;
                offsetY = savedData.main.offset?.y || 0;

                // Redraw canvas utama
                if (document.getElementById('drawingCanvas')) {
                    redrawCanvas('drawingCanvas');

                    // Update luas bangunan jika polygon tertutup
                    if (points.length > 3 &&
                        points[0].x === points[points.length - 1].x &&
                        points[0].y === points[points.length - 1].y) {
                        const area = calculateArea('drawingCanvas');
                        const luasBangunanInput = document.querySelector('input[name="luas_bangunan[]"]');
                        if (luasBangunanInput) {
                            luasBangunanInput.value = area;
                        }
                    }
                }
            }

            // Restore data untuk canvas tambahan
            if (savedData.additional) {
                for (const canvasId in savedData.additional) {
                    // Jika canvas belum ada, buat baru
                    if (!document.getElementById(canvasId)) {
                        const addLantaiBtn = document.getElementById('add-lantai-btn');
                        if (addLantaiBtn) {
                            addLantaiBtn.click();
                        }
                    }

                    // Restore data
                    setTimeout(() => {
                        if (canvasData[canvasId]) {
                            canvasData[canvasId].points = savedData.additional[canvasId].points.map(p =>
                                ({
                                    x: p.x,
                                    y: p.y
                                }));

                            canvasData[canvasId].zoomLevel = savedData.additional[canvasId].zoomLevel ||
                                1;
                            canvasData[canvasId].offsetX = savedData.additional[canvasId].offset?.x ||
                                0;
                            canvasData[canvasId].offsetY = savedData.additional[canvasId].offset?.y ||
                                0;
                            canvasData[canvasId].isClosed = savedData.additional[canvasId].isClosed ||
                                false;

                            // Redraw canvas
                            redrawCanvas(canvasId);

                            // Update luas bangunan jika polygon tertutup
                            if (canvasData[canvasId].isClosed) {
                                const area = calculateArea(canvasId);
                                const luasBangunanInput = document.getElementById(`luas_${canvasId}`);
                                if (luasBangunanInput) {
                                    luasBangunanInput.value = area;
                                }
                            }
                        }
                    }, 500);
                }
            }
        @endif
    });
</script>
