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
</style>

<div id="800" style=" margin-top: 20px; display: none;">
    <div class="form-group" style="margin-top: 20px;">
        <label for="grade_gedung" style="font-weight: bold;">Pilih Grade Gedung</label>
        <select class="form-control" id="grade_gedung" name="grade_gedung">
            <option value="" selected>- Select -</option>
            <option value="Gedung Bertingkat Tinggi Biasa" selected>Gedung Bertingkat Tinggi Biasa</option>
            <option value="Gedung Bertingkat Tinggi Prestige Q" selected>Gedung Bertingkat Tinggi Prestige Q</option>
        </select>
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_800" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis
            bangunan.</small>
        <select class="form-control" id="jenis_bangunan_800" name="jenis_bangunan_800">
            <option value="" selected>- Select -</option>
            <option value="rumah_tinggal_800">Bangunan Rumah Tinggal</option>
            <option value="rumah_susun_800">Bangunan Rumah Susun</option>
            <option value="pusat_perbelanjaan_800">Bangunan Pusat Perbelanjaan</option>
            <option value="kantor_800">Bangunan Kantor</option>
            <option value="gedung_pemerintah_800">Bangunan Gedung Pemerintah</option>
            <option value="hotel_motel_800">Bangunan Hotel/Motel</option>
            <option value="industri_gudang_800">Bangunan Industri dan Gudang</option>
            <option value="kawasan_perkebunan_800">Bangunan di Kawasan Perkebunan</option>
        </select>
    </div>

    <!-- Jenis Bangunan Detail -->
    <div style="margin-top: 20px;">
        <div id="detail_rumah_tinggal_800" class="bangunan-detail-800" style="display: none;">
            <label for="jenis_bangunan_detail" style="font-weight: bold;">Tipe Rumah Tinggal (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rumah Tinggal (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_susun_800" class="bangunan-detail-800" style="display: none;">
            <label for="tipe_rusun" style="font-weight: bold;">Tipe Rusun (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rusun (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_pusat_perbelanjaan_800" class="bangunan-detail-800" style="display: none;">
            <label for="tipe_perbelanjaan" style="font-weight: bold;">Tipe Pusat Perbelanjaan (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Pusat Perbelanjaan (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_kantor_800" class="bangunan-detail-800" style="display: none;">
            <label for="tipe_kantor" style="font-weight: bold;">Tipe Bangunan Kantor (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Kantor (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_pemerintah_800" class="bangunan-detail-800" style="display: none;">
            <label for="tipe_gedung_pemerintah" style="font-weight: bold;">Tipe Gedung Pemerintah (Umur
                Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Gedung Pemerintah (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_hotel_motel_800" class="bangunan-detail-800" style="display: none;">
            <label for="tipe_hotel_motel" style="font-weight: bold;">Tipe Hotel / Motel (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Hotel / Motel (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_industri_gudang_800" class="bangunan-detail-800" style="display: none;">
            <label for="tipe_industri_gudang" style="font-weight: bold;">Tipe Bangunan Industri dan Gudang (Umur
                Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Industri dan Gudang (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_kawasan_perkebunan_800" class="bangunan-detail-800" style="display: none;">
            <label for="tipe_perkebunan" style="font-weight: bold;">Tipe Bangunan Perkebunan (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Perkebunan (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <script>
        document.getElementById('jenis_bangunan_800').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.bangunan-detail-800').forEach(el => el.style.display = 'none');
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

    <!-- Jenis Bangunan Indeks Lantai -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_indeks_lantai_800" style="font-weight: bold;">Jenis Bangunan (Indeks
            Lantai)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai
            MAPPI.</small>
        <select class="form-control" id="jenis_bangunan_indeks_lantai_800" name="jenis_bangunan_indeks_lantai_800">
            <option value="" selected>- Select -</option>
            <option value="rumah_sederhana_800">Rumah Tinggal Sederhana</option>
            <option value="rumah_menengah_800">Rumah Tinggal Menengah</option>
            <option value="rumah_mewah_800">Rumah Tinggal Mewah</option>
            <option value="gedung_low_800">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)</option>
            <option value="gedung_mid_800">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)</option>
            <option value="gedung_high_800">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai)</option>
        </select>
    </div>

    <!-- Jumlah Lantai sections -->
    <div style="margin-top: 20px;">
        <div id="detail_rumah_sederhana_800" class="lantai-detail-800" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_sederhana_800">Jumlah Lantai Rumah Tinggal Sederhana</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Sederhana'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_menengah_800" class="lantai-detail-800" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_menengah_800">Jumlah Lantai Rumah Tinggal Menengah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Menengah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_mewah_800" class="lantai-detail-800" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_mewah_800">Jumlah Lantai Rumah Tinggal Mewah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Mewah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_low_800" class="lantai-detail-800" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_low_800">Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_low_800" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_mid_800" class="lantai-detail-800" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_mid_800">Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_mid_800" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_high_800" class="lantai-detail-800" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_high_800">Jumlah Lantai Bangunan Gedung Bertingkat High Rise (&gt;8
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_high_800" name="jumlah_lantai_rumah_tinggal[]">
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
        document.getElementById('jenis_bangunan_indeks_lantai_800').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.lantai-detail-800').forEach(el => el.style.display = 'none');

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
        <label for="tahun_dibangun_800" style="font-weight: bold;">Tahun Dibangun</label>
        <select class="form-control" id="tahun_dibangun_800" name="tahun_dibangun_800"
            onchange="toggleCheckboxes800(this, 'checkboxContainerDibangun800')">
            <script>
                const currentYear800 = new Date().getFullYear();
                const startYear800 = 1900;
                const endYear800 = currentYear800 + 7;
                let options800 = '';

                for (let year = startYear800; year <= endYear800; year++) {
                    const selected = year === currentYear800 ? 'selected' : '';
                    options800 += `<option value="${year}" ${selected}>${year}</option>`;
                }
                document.write(options800);
            </script>
        </select>
    </div>

    <div id="checkboxContainerDibangun800" style="display: none; margin-top: 20px;">
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
            onchange="toggleCheckboxes800(this, 'checkboxContainerRenovasi800')">
            <script>
                const startYearRenovasi800 = 1960;
                const endYearRenovasi800 = currentYear + 7;
                let optionsRenovasi800 = '';

                for (let year = startYearRenovasi800; year <= endYearRenovasi800; year++) {
                    const selected = year === currentYear ? 'selected' : '';
                    optionsRenovasi800 += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.write(optionsRenovasi800);
            </script>
        </select>
    </div>

    <div id="checkboxContainerRenovasi800" style="display: none; margin-top: 20px;">
        <label style="font-weight: bold;">Sumber Informasi Tahun Renovasi</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="keterangan_pendamping_lokasi">
            Keterangan pendamping lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="pengamatan_visual"> Pengamatan
            visual</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="keterangan_lingkungan"> Keterangan
            lingkungan</label><br>
    </div>

    <div class="form-group mb-3 " style="margin-top: 20px">
        <label for="jenis_renovasi"><b>Jenis Renovasi</b></label>
        <small class="form-text text-muted">Masukkan jenis renovasi yang dilakukan</small>
        <input type="text" id="jenis_renovasi" name="jenis_renovasi" class="form-control">
    </div>
    <div class="form-group mb-3" style=" margin-top: 20px">
        <label for="bobot_renovasi"><b>Bobot Renovasi (%)</b></label>
        <input type="number" id="bobot_renovasi" name="bobot_renovasi" class="form-control" min="0"
            max="100" step="1">
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

    <!-- Canvas Section -->
    <div class="form-group mb-4" style="margin-top: 20px;">
        <label for="luas_bangunan_fisik" style="font-weight: bold;">Luas Bangunan Fisik</label>
        <div class="row g-4">
            <!-- Canvas Column -->
            <div class="col-md-8">
                <div class="canvas-container bg-white">
                    <canvas id="drawingCanvas_800" width="800" height="600"></canvas>
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
                                <button type="button" class="nav-btn" onclick="setDirection_800('up')">
                                    <i class="fas fa-chevron-up"></i>
                                </button>
                                <div class="d-flex">
                                    <button type="button" class="nav-btn" onclick="setDirection_800('left')">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button type="button" class="nav-btn" onclick="setDirection_800('down')">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <button type="button" class="nav-btn" onclick="setDirection_800('right')">
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
                            <input type="number" id="distance_800" class="form-control" placeholder="Jarak (m)">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <i class="fas fa-drafting-compass"></i>
                            </span>
                            <input type="number" id="angle_800" class="form-control" placeholder="Sudut (°)">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons mb-4">
                        <button type="button" class="btn btn-primary w-100 mb-2" onclick="drawLine_800()">
                            <i class="fas fa-pen me-2"></i>Gambar Garis
                        </button>
                        <button type="button" class="btn btn-success w-100 mb-2" onclick="closePolygon_800()">
                            <i class="fas fa-vector-square me-2"></i>Tutup Area
                        </button>
                        <button type="button" class="btn btn-outline-danger w-100" onclick="clearCanvas_800()">
                            <i class="fas fa-undo me-2"></i>Hapus Garis Terakhir
                        </button>
                    </div>

                    <!-- Form Fields -->
                    <div class="form-fields">
                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-tag me-2"></i>Nomor/Nama Lantai
                            </label>
                            <input type="text" class="form-control" name="nama_lantai_800[]"
                                placeholder="Contoh: Teras, Basement, Lantai 1">
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-calculator me-2"></i>Faktor Pengali
                            </label>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="faktor_pengali_800[]"
                                    id="pengali_1_800" value="1" checked>
                                <label class="btn btn-outline-primary" for="pengali_1_800">1.0</label>
                                <input type="radio" class="btn-check" name="faktor_pengali_800[]"
                                    id="pengali_0.5_800" value="0.5">
                                <label class="btn btn-outline-primary" for="pengali_0.5_800">0.5</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-ruler-combined me-2"></i>Luas Bangunan (m²)
                            </label>
                            <input type="number" class="form-control" name="luas_bangunan_800[]" placeholder="0"
                                step="0.01" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Lantai Button -->
    <div class="mt-3">
        <button type="button" class="btn btn-primary add-area-link" data-type="luas-bangunan-fisik">
            Tambah Lantai
        </button>
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
</div>

<script>
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const contentId = `content-${checkbox.id}`;
            const contentElement = document.getElementById(contentId);
            if (contentElement) {
                contentElement.style.display = checkbox.checked ? 'block' : 'none';
            }
        });
    });


    function toggleCheckboxes800(selectElement, targetId) {
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
        // Inisialisasi canvas dan context
        const canvas = document.getElementById('drawingCanvas_800');
        const ctx = canvas.getContext('2d');
        let points = [];
        let scale = 40; // 1 meter = 40 pixels
        let zoomLevel = 1;
        let isPanning = false;
        let startPanX = 0;
        let startPanY = 0;
        let offsetX = 0;
        let offsetY = 0;

        // Event listeners
        canvas.addEventListener('mousedown', startPan_800);
        canvas.addEventListener('mousemove', pan_800);
        canvas.addEventListener('mouseup', endPan_800);
        canvas.addEventListener('mouseleave', endPan_800);
        canvas.addEventListener('wheel', handleZoom_800);

        // Fungsi untuk menginisialisasi canvas
        window.initCanvas_800 = function() {
            ctx.strokeStyle = 'red';
            ctx.lineWidth = 2;
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            points = [];
            offsetX = 0;
            offsetY = 0;
            zoomLevel = 1;

            // Mulai dari tengah
            let startPoint = {
                x: canvas.width / 2,
                y: canvas.height / 2
            };
            points.push(startPoint);
            redrawCanvas_800();
        }

        // Fungsi untuk menggambar titik
        function drawPoint_800(x, y) {
            ctx.beginPath();
            ctx.arc(x, y, 3, 0, 2 * Math.PI);
            ctx.fillStyle = 'red';
            ctx.fill();
        }

        // Fungsi untuk menggambar pengukuran
        function drawMeasurement_800(startX, startY, endX, endY, distance) {
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

        // Fungsi untuk menggambar garis
        window.drawLine_800 = function() {
            let distance = parseFloat(document.getElementById('distance_800').value);
            let angle = parseFloat(document.getElementById('angle_800').value) || 0;

            if (!distance || isNaN(distance)) {
                alert('Masukkan jarak terlebih dahulu');
                return;
            }

            let lastPoint = points[points.length - 1];
            let angleRad = (angle - 90) * Math.PI / 180;

            let newPoint = {
                x: lastPoint.x + distance * scale * Math.cos(angleRad),
                y: lastPoint.y + distance * scale * Math.sin(angleRad)
            };

            points.push(newPoint);
            redrawCanvas_800();
        }

        // Fungsi untuk menutup polygon
        window.closePolygon_800 = function() {
            if (points.length < 3) {
                alert('Minimal 3 titik diperlukan untuk membuat area');
                return;
            }

            points.push(points[0]);
            redrawCanvas_800();

            // Hitung luas area
            let area = calculateArea_800();
            document.querySelector('input[name="luas_bangunan_800[]"]').value = area.toFixed(2);

            // Reset points untuk area baru
            points = [points[0]];
        }

        // Fungsi untuk menghitung luas area
        function calculateArea_800() {
            let area = 0;
            for (let i = 0; i < points.length - 1; i++) {
                area += (points[i].x * points[i + 1].y - points[i + 1].x * points[i].y);
            }
            return Math.abs(area / (2 * scale * scale));
        }

        // Fungsi untuk menggambar ulang canvas
        function redrawCanvas_800() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawGrid_800();

            ctx.save();
            ctx.translate(offsetX, offsetY);
            ctx.scale(zoomLevel, zoomLevel);

            // Gambar garis
            ctx.beginPath();
            ctx.moveTo(points[0].x, points[0].y);
            for (let i = 1; i < points.length; i++) {
                ctx.lineTo(points[i].x, points[i].y);
                drawPoint_800(points[i].x, points[i].y);

                // Gambar pengukuran
                if (i > 0) {
                    let distance = Math.sqrt(
                        Math.pow(points[i].x - points[i - 1].x, 2) +
                        Math.pow(points[i].y - points[i - 1].y, 2)
                    ) / scale;
                    drawMeasurement_800(points[i - 1].x, points[i - 1].y, points[i].x, points[i].y, distance
                        .toFixed(2));
                }
            }
            ctx.stroke();

            // Gambar titik awal
            drawPoint_800(points[0].x, points[0].y);

            ctx.restore();
        }

        // Fungsi untuk mengatur arah
        window.setDirection_800 = function(direction) {
            let angle = 0;
            switch (direction) {
                case 'right':
                    angle = 0;
                    break;
                case 'down':
                    angle = 90;
                    break;
                case 'left':
                    angle = 180;
                    break;
                case 'up':
                    angle = 270;
                    break;
            }
            document.getElementById('angle_800').value = angle;
        }

        // Fungsi untuk menghapus garis terakhir
        window.clearCanvas_800 = function() {
            if (points.length > 1) {
                points.pop();
                redrawCanvas_800();
            }
        }

        // Fungsi untuk pan
        function startPan_800(e) {
            isPanning = true;
            startPanX = e.clientX - offsetX;
            startPanY = e.clientY - offsetY;
        }

        function pan_800(e) {
            if (!isPanning) return;
            offsetX = e.clientX - startPanX;
            offsetY = e.clientY - startPanY;
            redrawCanvas_800();
        }

        function endPan_800() {
            isPanning = false;
        }

        // Fungsi untuk zoom
        function handleZoom_800(e) {
            e.preventDefault();
            const rect = canvas.getBoundingClientRect();
            const mouseX = e.clientX - rect.left - offsetX;
            const mouseY = e.clientY - rect.top - offsetY;

            const zoomFactor = e.deltaY > 0 ? 0.9 : 1.1;
            zoomLevel *= zoomFactor;

            zoomLevel = Math.min(Math.max(0.1, zoomLevel), 10);

            offsetX += mouseX * (1 - zoomFactor);
            offsetY += mouseY * (1 - zoomFactor);

            redrawCanvas_800();
        }

        // Fungsi untuk menggambar grid
        function drawGrid_800() {
            const gridSize = 40 * zoomLevel;
            const gridColor = '#ddd';

            ctx.save();
            ctx.strokeStyle = gridColor;
            ctx.lineWidth = 0.5;

            for (let x = offsetX % gridSize; x < canvas.width; x += gridSize) {
                ctx.beginPath();
                ctx.moveTo(x, 0);
                ctx.lineTo(x, canvas.height);
                ctx.stroke();
            }

            for (let y = offsetY % gridSize; y < canvas.height; y += gridSize) {
                ctx.beginPath();
                ctx.moveTo(0, y);
                ctx.lineTo(canvas.width, y);
                ctx.stroke();
            }

            ctx.restore();
        }

        // Inisialisasi canvas saat halaman dimuat
        initCanvas_800();
        drawGrid_800();
    });
</script>

<script>
    // Tambahkan fungsi untuk mengumpulkan data canvas
    function getCanvasData() {
        return {
            points: points.map(p => ({
                x: p.x,
                y: p.y
            })),
            measurements: [], // Jika Anda menyimpan pengukuran
            zoomLevel: zoomLevel,
            offset: {
                x: offsetX,
                y: offsetY
            },
            tipe_spek: '800' // tambahkan tipe_spek
        };
    }

    // Tambahkan event listener untuk form submit
    document.querySelector('form').addEventListener('submit', function(e) {
        // Dapatkan data canvas
        const canvasData = getCanvasData();

        // Tambahkan input hidden untuk menyimpan data canvas
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'canvas_data';
        input.value = JSON.stringify(canvasData);
        this.appendChild(input);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Jika ada data canvas yang tersimpan dan tipe_spek sesuai
        @if (isset($bangunan->canvas_data) && $bangunan->tipe_spek === '800')
            const savedData = @json($bangunan->canvas_data);

            // Restore points
            points = savedData.points.map(p => ({
                x: p.x,
                y: p.y
            }));

            // Restore zoom dan offset
            zoomLevel = savedData.zoomLevel || 1;
            offsetX = savedData.offset?.x || 0;
            offsetY = savedData.offset?.y || 0;

            // Redraw canvas
            redrawCanvas_800();
        @endif
    });
</script>
