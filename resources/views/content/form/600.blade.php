<style>
    .area-lainnya-container {
        border: 1px solid #dee2e6;
        padding: 10px;
        border-radius: 5px;
    }

    .area-lainnya-container .form-group {
        margin-bottom: 0;
    }

    .area-lainnya-container label {
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

<div id="600" style="margin-top: 20px; display: none;">
    <!-- Jenis Bangunan -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis
            bangunan.</small>
        <select class="form-control" id="jenis_bangunan_600" name="jenis_bangunan_600">
            <option value="" selected>- Select -</option>
            <option value="rumah_tinggal_600">Bangunan Rumah Tinggal</option>
            <option value="rumah_susun_600">Bangunan Rumah Susun</option>
            <option value="pusat_perbelanjaan_600">Bangunan Pusat Perbelanjaan</option>
            <option value="kantor_600">Bangunan Kantor</option>
            <option value="gedung_pemerintah_600">Bangunan Gedung Pemerintah</option>
            <option value="hotel_motel_600">Bangunan Hotel/Motel</option>
            <option value="industri_gudang_600">Bangunan Industri dan Gudang</option>
            <option value="kawasan_perkebunan_600">Bangunan di Kawasan Perkebunan</option>
        </select>
    </div>

    <!-- Jenis Bangunan Detail -->
    <div style="margin-top: 20px;">
        <div id="detail_rumah_tinggal_600" class="bangunan-detail-600" style="display: none;">
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

        <div id="detail_rumah_susun_600" class="bangunan-detail-600" style="display: none;">
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

        <div id="detail_pusat_perbelanjaan_600" class="bangunan-detail-600" style="display: none;">
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

        <div id="detail_kantor_600" class="bangunan-detail-600" style="display: none;">
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

        <div id="detail_gedung_pemerintah_600" class="bangunan-detail-600" style="display: none;">
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

        <div id="detail_hotel_motel_600" class="bangunan-detail-600" style="display: none;">
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

        <div id="detail_industri_gudang_600" class="bangunan-detail-600" style="display: none;">
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

        <div id="detail_kawasan_perkebunan_600" class="bangunan-detail-600" style="display: none;">
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
        document.getElementById('jenis_bangunan_600').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.bangunan-detail-600').forEach(el => el.style.display = 'none');
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
        <label for="jenis_bangunan_indeks_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks Lantai)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai
            MAPPI.</small>
        <select class="form-control" id="jenis_bangunan_indeks_lantai_600" name="jenis_bangunan_indeks_lantai_600">
            <option value="" selected>- Select -</option>
            <option value="rumah_sederhana_600">Rumah Tinggal Sederhana</option>
            <option value="rumah_menengah_600">Rumah Tinggal Menengah</option>
            <option value="rumah_mewah_600">Rumah Tinggal Mewah</option>
            <option value="gedung_low_600">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)</option>
            <option value="gedung_mid_600">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)</option>
            <option value="gedung_high_600">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai)</option>
        </select>
    </div>

    <!-- Jumlah Lantai sections -->
    <div style="margin-top: 20px;">
        <div id="detail_rumah_sederhana_600" class="lantai-detail-600" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_sederhana_600">Jumlah Lantai Rumah Tinggal Sederhana</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Sederhana'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_menengah_600" class="lantai-detail-600" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_menengah_600">Jumlah Lantai Rumah Tinggal Menengah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Menengah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_mewah_600" class="lantai-detail-600" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_mewah_600">Jumlah Lantai Rumah Tinggal Mewah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Mewah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_low_600" class="lantai-detail-600" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_low_600">Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_low_600" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_mid_600" class="lantai-detail-600" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_mid_600">Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_mid_600" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_high_600" class="lantai-detail-600" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_high_600">Jumlah Lantai Bangunan Gedung Bertingkat High Rise (&gt;8
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_high_600" name="jumlah_lantai_rumah_tinggal[]">
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
        document.getElementById('jenis_bangunan_indeks_lantai_600').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.lantai-detail-600').forEach(el => el.style.display = 'none');

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
            onchange="toggleCheckboxes600(this, 'checkboxContainerDibangun600')">
            <script>
                const currentYear600 = new Date().getFullYear();
                const startYear600 = 1900;
                const endYear600 = currentYear600 + 7;
                let options600 = '';

                for (let year = startYear600; year <= endYear600; year++) {
                    const selected = year === currentYear600 ? 'selected' : '';
                    options600 += `<option value="${year}" ${selected}>${year}</option>`;
                }
                document.write(options600);
            </script>
        </select>
    </div>

    <div id="checkboxContainerDibangun600" style="display: none; margin-top: 20px;">
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
            onchange="toggleCheckboxes600(this, 'checkboxContainerRenovasi600')">
            <script>
                const startYearRenovasi600 = 1960;
                const endYearRenovasi600 = currentYear600 + 7;
                let optionsRenovasi600 = '';

                for (let year = startYearRenovasi600; year <= endYearRenovasi600; year++) {
                    const selected = year === currentYear600 ? 'selected' : '';
                    optionsRenovasi600 += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.write(optionsRenovasi600);
            </script>
        </select>
    </div>

    <div id="checkboxContainerRenovasi600" style="display: none; margin-top: 20px;">
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
                    <canvas id="drawingCanvas_600" width="800" height="600"></canvas>
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
                                <button type="button" class="nav-btn" onclick="setDirection_600('up')">
                                    <i class="fas fa-chevron-up"></i>
                                </button>
                                <div class="d-flex">
                                    <button type="button" class="nav-btn" onclick="setDirection_600('left')">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button type="button" class="nav-btn" onclick="setDirection_600('down')">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <button type="button" class="nav-btn" onclick="setDirection_600('right')">
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
                            <input type="number" id="distance_600" class="form-control" placeholder="Jarak (m)">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <i class="fas fa-drafting-compass"></i>
                            </span>
                            <input type="number" id="angle_600" class="form-control" placeholder="Sudut (°)">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons mb-4">
                        <button type="button" class="btn btn-primary w-100 mb-2" onclick="drawLine_600()">
                            <i class="fas fa-pen me-2"></i>Gambar Garis
                        </button>
                        <button type="button" class="btn btn-success w-100 mb-2" onclick="closePolygon_600()">
                            <i class="fas fa-vector-square me-2"></i>Tutup Area
                        </button>
                        <button type="button" class="btn btn-outline-danger w-100" onclick="clearCanvas_600()">
                            <i class="fas fa-undo me-2"></i>Hapus Garis Terakhir
                        </button>
                    </div>

                    <!-- Form Fields -->
                    <div class="form-fields">
                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-tag me-2"></i>Nomor/Nama Lantai
                            </label>
                            <input type="text" class="form-control" name="nama_lantai_600[]"
                                placeholder="Contoh: Teras, Basement, Lantai 1">
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-calculator me-2"></i>Faktor Pengali
                            </label>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="faktor_pengali_600[]"
                                    id="pengali_1_600" value="1" checked>
                                <label class="btn btn-outline-primary" for="pengali_1_600">1.0</label>
                                <input type="radio" class="btn-check" name="faktor_pengali_600[]"
                                    id="pengali_0.5_600" value="0.5">
                                <label class="btn btn-outline-primary" for="pengali_0.5_600">0.5</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-ruler-combined me-2"></i>Luas Bangunan (m²)
                            </label>
                            <input type="number" class="form-control" name="luas_bangunan_600[]" placeholder="0"
                                step="0.01" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Lantai Button -->
    <div class="mt-3">
        <button type="button" class="btn btn-primary" id="add-lantai-btn_600">
            <i class="fas fa-plus-circle me-2"></i>Tambah Lantai
        </button>
    </div>

    <div id="lantai-container-wrapper_600">
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
        <div class="area-lainnya-container-600" data-type="pintu-jendela">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_pintu_jendela[]" class="form-control"
                        placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="text" name="luas_bobot_pintu_jendela[]" class="form-control"
                        placeholder="Luas (m²)">
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pintu-jendela">Tambah
            Area</button>
    </div>
    <!-- Luas Dinding -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Dinding</b></label><br>
        <small class="form-text text-muted">Masukkan luas dinding kotor belum dikurangi luas pintu dan
            jendela.</small>
        <div class="area-lainnya-container-600" data-type="dinding">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_dinding[]" class="form-control" placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="text" name="luas_bobot_dinding[]" class="form-control" placeholder="Luas (m²)">
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="dinding">Tambah
            Area</button>
    </div>
    <!-- Luas Rangka Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Rangka Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas rangka atap datar.</small>
        <div class="area-lainnya-container-600" data-type="rangka-atap-datar">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_rangka_atap_datar[]" class="form-control"
                        placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="text" name="luas_bobot_rangka_atap_datar[]" class="form-control"
                        placeholder="Luas (m²)">
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="rangka-atap-datar">Tambah
            Area</button>
    </div>

    <!-- Luas Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas atap datar.</small>
        <div class="area-lainnya-container-600" data-type="atap-datar">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_atap_datar[]" class="form-control"
                        placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="text" name="luas_bobot_atap_datar[]" class="form-control"
                        placeholder="Luas (m²)">
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar">Tambah
            Area</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Pondasi Eksisting - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5 Lantai)</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tapak Beton dan Batu Kali"
                    id="pondasi_batu_kali-600" name="tipe_pondasi_existing[]"
                    onchange="toggleBobotInput(this, 'bobot_pondasi_batu_kali_600')">
                <label class="form-check-label" for="pondasi_batu_kali-600">Tapak Beton dan Batu Kali</label>
            </div>
        </div>
        <div id="bobot_pondasi_batu_kali_600" style="display: none; margin-top: 10px;">
            <label for="bobot_batu_kali">Bobot Pondasi Tapak Beton dan Batu Kali(dalam persen %)</label>
            <input type="text" class="form-control" id="bobot_batu_kali" name="bobot_batu_kali"
                placeholder="Masukkan bobot dalam persen">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
        <div id="pondasi-container-600" style="display: none;">
            <div class="area-lainnya-container-600" data-type="pondasi_600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_pondasi_existing[]" class="form-control">
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Pondasi Eksisting'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pondasi_600">Tambah
                Tipe Pondasi Existing</button>

        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-pondasi-btn-600">Tambah
            Tipe Pondasi Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Struktur Eksisting - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5 Lantai)</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Beton Bertulang"
                    id="struktur_beton_bertulang_600" name="tipe_struktur_existing[]"
                    onchange="toggleBobotInput(this, 'bobot_struktur_beton_bertulang_600')">
                <label class="form-check-label" for="struktur_beton_bertulang_600">Beton
                    Bertulang</label>
            </div>
        </div>
        <div id="bobot_struktur_beton_bertulang_600" style="display: none; margin-top: 10px;">
            <label for="bobot_beton_bertulang">Bobot Struktur Beton Bertulang (dalam persen %)</label>
            <input type="text" class="form-control" id="bobot_beton_bertulang" name="bobot_beton_bertulang"
                placeholder="Masukkan bobot dalam persen">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
        <div id="struktur-container-600" style="display: none;">
            <div class="area-lainnya-container-600" data-type="struktur_600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_struktur_existing[]" class="form-control">
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Struktur Eksisting'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_struktur_existing[]" class="form-control"
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="struktur_600">Tambah
                Tipe Struktur Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn-600">Tambah Tipe
            Struktur Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Eksisting - Rumah Tinggal Mewah 2 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Dak Beton (Jika Pakai Balok)"
                    id="atap_dak_beton_600" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_dak_beton_600">Dak Beton (Jika Pakai Balok)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Genteng)"
                    id="atap_kayu_genteng_600" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_kayu_genteng_600">Kayu (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)"
                    id="atap_kayu_asbes_600" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_kayu_asbes_600">Kayu (Atap Asbes, Seng dll, Tanpa
                    Reng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Genteng)"
                    id="atap_baja_genteng_600" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_baja_genteng_600">Baja Ringan (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Asbes, Seng dll)"
                    id="atap_baja_asbes_600" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_baja_asbes_600">Baja Ringan (Atap Asbes, Seng dll)</label>
            </div>
        </div>
    </div>

    <!-- Content sections for each option -->
    <div id="content-atap_dak_beton_600" class="content" style="display: none;">
        <label><b>Bobot Dak Beton (Jika Pakai Balok)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_kayu_genteng_600" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>

    <div id="content-atap_kayu_asbes_600" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>

    <div id="content-atap_baja_genteng_600" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>

    <div id="content-atap_baja_asbes_600" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Asbes, Seng dll)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Existing</b></label><br>
        <div id="rangka-atap-container-600" style="display: none;">
            <div class="area-lainnya-container-600" data-type="rangka-atap-600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_rangka_atap_existing[]" class="form-control">
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tipe Rangka Atap Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="rangka-atap-600">Tambah Tipe Rangka Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-600-btn">Tambah Tipe
            Rangka Atap Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Penutup Atap Eksisting - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5
                Lantai)</strong></label><br>
        <input type="checkbox" id="asbes-600" name="tipe_atap" value="Asbes" class="form-check-input">
        <label for="asbes-600" class="form-check-label">Asbes</label><br>

        <input type="checkbox" id="dak-beton-600" name="tipe_atap" value="Dak Beton" class="form-check-input">
        <label for="dak-beton-600" class="form-check-label">Dak Beton</label><br>

        <input type="checkbox" id="fibreglass-600" name="tipe_atap" value="Fibreglass" class="form-check-input">
        <label for="fibreglass-600" class="form-check-label">Fibreglass</label><br>

        <input type="checkbox" id="genteng-keramik-glazur-600" name="tipe_atap" value="Genteng Keramik Glazur"
            class="form-check-input">
        <label for="genteng-keramik-glazur-600" class="form-check-label">Genteng Keramik Glazur</label><br>

        <input type="checkbox" id="genteng-tanah-liat-600" name="tipe_atap" value="Genteng Tanah Liat"
            class="form-check-input">
        <label for="genteng-tanah-liat-600" class="form-check-label">Genteng Tanah Liat</label><br>

        <input type="checkbox" id="genteng-beton-600" name="tipe_atap" value="Genteng Beton"
            class="form-check-input">
        <label for="genteng-beton-600" class="form-check-label">Genteng Beton</label><br>

        <input type="checkbox" id="genteng-metal-600" name="tipe_atap" value="Genteng Metal"
            class="form-check-input">
        <label for="genteng-metal-600" class="form-check-label">Genteng Metal</label><br>

        <input type="checkbox" id="bitumen-600" name="tipe_atap" value="Bitumen (Ondulin/Onduvilla)"
            class="form-check-input">
        <label for="bitumen-600" class="form-check-label">Bitumen (Ondulin/Onduvilla)</label><br>

        <input type="checkbox" id="tegola-600" name="tipe_atap" value="Tegola" class="form-check-input">
        <label for="tegola-600" class="form-check-label">Tegola</label><br>

        <input type="checkbox" id="seng-gelombang-600" name="tipe_atap" value="Seng Gelombang"
            class="form-check-input">
        <label for="seng-gelombang-600" class="form-check-label">Seng Gelombang</label><br>

        <input type="checkbox" id="sirap-600" name="tipe_atap" value="Sirap" class="form-check-input">
        <label for="sirap-600" class="form-check-label">Sirap</label><br>

        <input type="checkbox" id="spandek-600" name="tipe_atap" value="Spandek" class="form-check-input">
        <label for="spandek-600" class="form-check-label">Spandek</label><br>

        <input type="checkbox" id="pvc-600" name="tipe_atap" value="PVC" class="form-check-input">
        <label for="pvc-600" class="form-check-label">PVC</label><br>
    </div>



    <!-- Content sections for each option -->
    <div id="content-asbes-600" class="content" style="display: none;">
        <label><b>Bobot Asbes</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-dak-beton-600" class="content" style="display: none;">
        <label><b>Bobot Dak Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-fibreglass-600" class="content" style="display: none;">
        <label><b>Bobot Fibreglass</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-genteng-keramik-glazur-600" class="content" style="display: none;">
        <label><b>Bobot Genteng Keramik Glazur</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-genteng-tanah-liat-600" class="content" style="display: none;">
        <label><b>Bobot Genteng Tanah Liat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-genteng-beton-600" class="content" style="display: none;">
        <label><b>Bobot Genteng Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-genteng-metal-600" class="content" style="display: none;">
        <label><b>Bobot Genteng Metal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-bitumen-600" class="content" style="display: none;">
        <label><b>Bobot Bitumen (Ondulin/Onduvilla)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-tegola-600" class="content" style="display: none;">
        <label><b>Bobot Tegola</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-seng-gelombang-600" class="content" style="display: none;">
        <label><b>Bobot Seng Gelombang</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-sirap-600" class="content" style="display: none;">
        <label><b>Bobot Sirap</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-spandek-600" class="content" style="display: none;">
        <label><b>Bobot Spandek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-pvc-600" class="content" style="display: none;">
        <label><b>Bobot PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
        <div id="penutup-atap-existing-600-container" style="display: none;">
            <div class="area-lainnya-container-600" data-type="penutup-atap-existing-600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_penutup_atap_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="penutup-atap-existing-600">Tambah Tipe Penutup Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-penutup-atap-existing-600-btn">Tambah
            Tipe
            Penutup Atap Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Plafon Eksisting - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5
                Lantai)</strong></label><br>

        <input type="checkbox" id="beton-ekspose-plafon-600" name="tipe_plafon_existing[]" value="Beton Ekspose"
            class="form-check-input">
        <label for="beton-ekspose-plafon-600" class="form-check-label">Beton Ekspose</label><br>

        <input type="checkbox" id="grc-plafon-600" name="tipe_plafon_existing[]" value="GRC"
            class="form-check-input">
        <label for="grc-plafon-600" class="form-check-label">GRC</label><br>

        <input type="checkbox" id="gypsum-plafon-600" name="tipe_plafon_existing[]" value="Gypsum"
            class="form-check-input">
        <label for="gypsum-plafon-600" class="form-check-label">Gypsum</label><br>

    </div>


    <!-- Content sections for each option -->
    <div id="content-beton-ekspose-plafon-600" class="content" style="display: none;">
        <label><b>Bobot Beton Ekspose</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-grc-plafon-600" class="content" style="display: none;">
        <label><b>Bobot GRC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-gypsum-plafon-600" class="content" style="display: none;">
        <label><b>Bobot Gypsum</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Plafon Existing</b></label><br>
        <div id="plafon-existing-600-container" style="display: none;">
            <div class="area-lainnya-container-600" data-type="plafon-existing-600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_plafon_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Plafon Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_plafon_existing[]" class="form-control"
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="plafon-existing-600">Tambah Plafon Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-plafon-existing-600-btn">Tambah Plafon
            Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Dinding Eksisting - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5
                Lantai)</strong></label><br>

        <input type="checkbox" id="batako-dinding-600" name="tipe_tipe_dinding_existing[]" value="Batako"
            class="form-check-input">
        <label for="batako-dinding-600" class="form-check-label">Batako</label><br>

        <input type="checkbox" id="bata-merah-dinding-600" name="tipe_tipe_dinding_existing[]" value="Bata Merah"
            class="form-check-input">
        <label for="bata-merah-dinding-600" class="form-check-label">Bata Merah</label><br>

        <input type="checkbox" id="bata-ringan-dinding-600" name="tipe_tipe_dinding_existing[]" value="Bata Ringan"
            class="form-check-input">
        <label for="bata-ringan-dinding-600" class="form-check-label">Bata Ringan</label><br>

        <input type="checkbox" id="partisi-gypsumboard-dinding-600" name="tipe_tipe_dinding_existing[]"
            value="Partisi Gypsumboard 2 Muka" class="form-check-input">
        <label for="partisi-gypsumboard-dinding-600" class="form-check-label">Partisi Gypsumboard 2 Muka</label><br>

    </div>
    <div id="content-batako-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Batako</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-bata-merah-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Bata Merah</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-bata-ringan-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Bata Ringan</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-partisi-gypsumboard-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Partisi Gypsumboard 2 Muka</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Dinding Existing</b></label><br>
        <div id="dinding-existing-600-container" style="display: none;">
            <div class="area-lainnya-container-600" data-type="dinding-existing-600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe_dinding_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Dinding Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="dinding-existing-600">Tambah Tipe Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-dinding-existing-600-btn">Tambah Tipe
            Dinding Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pelapis Dinding Eksisting - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5
                Lantai)</strong></label><br>

        <input type="checkbox" id="cat-dinding-600" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Cat (Diplester dan Diaci)" class="form-check-input">
        <label for="cat-dinding-600" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>

        <input type="checkbox" id="keramik-dinding-600" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Keramik" class="form-check-input">
        <label for="keramik-dinding-600" class="form-check-label">Dilapis Keramik</label><br>

        <input type="checkbox" id="granit-dinding-600" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Granit/ Homogenous Tile" class="form-check-input">
        <label for="granit-dinding-600" class="form-check-label">Dilapis Granit/ Homogenous Tile</label><br>

        <input type="checkbox" id="wallpaper-dinding-600" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Wallpaper" class="form-check-input">
        <label for="wallpaper-dinding-600" class="form-check-label">Dilapis Wallpaper</label><br>

        <input type="checkbox" id="aluminium-composite-panel-dinding-600"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Aluminium Composite Panel"
            class="form-check-input">
        <label for="aluminium-composite-panel-dinding-600" class="form-check-label">Dilapis Aluminium Composite
            Panel</label><br>
    </div>




    <!-- Content sections for each option -->
    <div id="content-cat-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-keramik-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-granit-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-wallpaper-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-aluminium-composite-panel-dinding-600" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Aluminium Composite Panel</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
        <div id="tipe-pelapis-dinding-existing-600-container" style="display: none;">
            <div class="area-lainnya-container-600" data-type="tipe-pelapis-dinding-existing-600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe_pelapis_dinding_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pelapis Dinding Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="text" name="bobot_tipe_pelapis_dinding_existing[]" class="form-control"
                            placeholder="Masukkan bobot" step="0.01">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="tipe-pelapis-dinding-existing-600">Tambah Tipe Pelapis Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pelapis-dinding-existing-600-btn">Tambah
            Tipe Pelapis Dinding Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pintu & Jendela Eksisting - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5
                Lantai)</strong></label><br>

        <input type="checkbox" id="pintu-kayu-panil-600" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Kayu Panil" class="form-check-input">
        <label for="pintu-kayu-panil-600" class="form-check-label">Pintu Kayu Panil</label><br>

        <input type="checkbox" id="pintu-kayu-dobel-600" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Kayu Dobel Triplek/HPL" class="form-check-input">
        <label for="pintu-kayu-dobel-600" class="form-check-label">Pintu Kayu Dobel Triplek/HPL</label><br>

        <input type="checkbox" id="pintu-kaca-aluminium-600" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Kaca Rk Aluminium" class="form-check-input">
        <label for="pintu-kaca-aluminium-600" class="form-check-label">Pintu Kaca Rk Aluminium</label><br>

        <input type="checkbox" id="jendela-kaca-kayu-600" name="tipe_tipe_pintu_jendela_existing[]"
            value="Jendela Kaca Rk Kayu" class="form-check-input">
        <label for="jendela-kaca-kayu-600" class="form-check-label">Jendela Kaca Rk Kayu</label><br>

        <input type="checkbox" id="jendela-kaca-aluminium-600" name="tipe_tipe_pintu_jendela_existing[]"
            value="Jendela Kaca Rk Aluminium" class="form-check-input">
        <label for="jendela-kaca-aluminium-600" class="form-check-label">Jendela Kaca Rk Aluminium</label><br>

        <input type="checkbox" id="folding-gate-600" name="tipe_tipe_pintu_jendela_existing[]"
            value="Folding Gate" class="form-check-input">
        <label for="folding-gate-600" class="form-check-label">Folding Gate</label><br>

        <input type="checkbox" id="pintu-km-upvc-600" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu KM UPVC/PVC" class="form-check-input">
        <label for="pintu-km-upvc-600" class="form-check-label">Pintu KM UPVC/PVC</label><br>

        <input type="checkbox" id="jendela-kaca-stopsol-8mm-curtain-wall-600"
            name="tipe_tipe_pintu_jendela_existing[]" value="Jendela Kaca Stopsol 8 mm Rangka Curtain Wall"
            class="form-check-input">
        <label for="jendela-kaca-stopsol-8mm-curtain-wall-600" class="form-check-label">Jendela Kaca Stopsol 8 mm
            Rangka Curtain Wall</label><br>

        <input type="checkbox" id="rolling-door-600" name="tipe_tipe_pintu_jendela_existing[]"
            value="Rolling Door" class="form-check-input">
        <label for="rolling-door-600" class="form-check-label">Rolling Door</label><br>
    </div>

    <div id="content-pintu-kayu-panil-600" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Panil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-kayu-dobel-600" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Dobel Triplek/HPL</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-kaca-aluminium-600" class="content" style="display: none;">
        <label><b>Bobot Pintu Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-jendela-kaca-kayu-600" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-jendela-kaca-aluminium-600" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-folding-gate-600" class="content" style="display: none;">
        <label><b>Bobot Folding Gate</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-km-upvc-600" class="content" style="display: none;">
        <label><b>Bobot Pintu KM UPVC/PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-jendela-kaca-stopsol-8mm-curtain-wall-600" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Stopsol 8 mm Rangka Curtain Wall</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-rolling-door-600" class="content" style="display: none;">
        <label><b>Bobot Rolling Door</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
        <div id="tipe-pintu-jendela-existing-600-container" style="display: none;">
            <div class="area-lainnya-container-600" data-type="tipe-pintu-jendela-existing-600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe_pintu_jendela_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pintu & Jendela Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="tipe-pintu-jendela-existing-600">Tambah Tipe Pintu & Jendela Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pintu-jendela-existing-600-btn">Tambah
            Tipe Pintu & Jendela Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Lantai Eksisting - Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5
                Lantai)</strong></label><br>
        <input type="checkbox" id="granit-homogenous-tile-600" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Granit/Homogenous Tile">
        <label for="granit-homogenous-tile-600" class="form-check-label">Granit/Homogenous Tile</label><br>

        <input type="checkbox" id="karpet-600" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Karpet">
        <label for="karpet-600" class="form-check-label">Karpet</label><br>

        <input type="checkbox" id="keramik-600" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Keramik">
        <label for="keramik-600" class="form-check-label">Keramik</label><br>

        <input type="checkbox" id="marmer-lokal-600" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Marmer Lokal">
        <label for="marmer-lokal-600" class="form-check-label">Marmer Lokal</label><br>

        <input type="checkbox" id="rabat-beton-600" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Rabat Beton (Semen Ekspose)">
        <label for="rabat-beton-600" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>

        <input type="checkbox" id="parkit-jati-600" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Parkit Jati">
        <label for="parkit-jati-600" class="form-check-label">Parkit Jati</label><br>

        <input type="checkbox" id="vynil-600" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Vynil">
        <label for="vynil-600" class="form-check-label">Vynil</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-granit-homogenous-tile-600" class="content" style="display: none;">
        <label><b>Bobot Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>

    <div id="content-karpet-600" class="content" style="display: none;">
        <label><b>Bobot Karpet</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>

    <div id="content-keramik-600" class="content" style="display: none;">
        <label><b>Bobot Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>

    <div id="content-marmer-lokal-600" class="content" style="display: none;">
        <label><b>Bobot Marmer Lokal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>

    <div id="content-rabat-beton-600" class="content" style="display: none;">
        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>

    <div id="content-parkit-jati-600" class="content" style="display: none;">
        <label><b>Bobot Parkit Jati</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>

    <div id="content-vynil-600" class="content" style="display: none;">
        <label><b>Bobot Vynil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Lantai Existing</b></label><br>
        <div id="tipe-lantai-existing-600-container" style="display: none;">
            <div class="area-lainnya-container-600" data-type="tipe-lantai-existing-600">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe_lantai_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Lantai Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="tipe-lantai-existing-600">Tambah Tipe Lantai Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-lantai-existing-600-btn">Tambah
            Tipe
            Lantai Existing</button>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk membuat item area baru
        function createAreaItem(type) {
            const areaItem = document.createElement('div');
            areaItem.classList.add('area-item', 'd-flex', 'align-items-center', 'mb-2');
            let nameNama, nameLuas, nameTipe, nameBobot;

            // Logika khusus untuk tipe pondasi
            if (type === 'pondasi_600') {
                nameTipe = 'tipe_pondasi_600[]';
                nameBobot = 'bobot_pondasi_600[]';

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
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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
            if (type === 'struktur_600') {
                nameTipe = 'tipe_struktur_600[]';
                nameBobot = 'bobot_struktur_600[]';

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
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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
            if (type === 'rangka-atap_menengah') {
                nameTipe = 'tipe_rangka_atap_menengah[]';
                nameBobot = 'bobot_rangka_atap_menengah[]';

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
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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

            if (type === 'rangka-atap-600') {
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
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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

            if (type === 'penutup-atap-existing-600') {
                nameTipe = 'tipe_penutup_atap_existing[]';
                nameBobot = 'bobot_penutup_atap_existing[]';

                areaItem.innerHTML = `
<div style="flex: 1; margin-right: 10px;">
<label>Tipe Material</label>
<select name="${nameTipe}" class="form-control" >
<option value="">- Select -</option>
@foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
    <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
@endforeach
</select>
</div>
<div style="flex: 1; margin-right: 10px;">
<label>Bobot (%)</label>
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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
            if (type === 'plafon-existing-600') {
                nameTipe = 'tipe_plafon_existing[]';
                nameBobot = 'bobot_plafon_existing[]';

                areaItem.innerHTML = `
<div style="flex: 1; margin-right: 10px;">
<label>Tipe Material</label>
<select name="${nameTipe}" class="form-control" >
<option value="">- Select -</option>
@foreach ($dataBangunan['Tambah Plafon Existing'] as $item)
    <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
@endforeach
</select>
</div>
<div style="flex: 1; margin-right: 10px;">
<label>Bobot (%)</label>
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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

            if (type === 'dinding-existing-600') {
                nameTipe = 'tipe_tipe_dinding_existing[]';
                nameBobot = 'bobot_tipe_dinding_existing[]';

                areaItem.innerHTML = `
<div style="flex: 1; margin-right: 10px;">
<label>Tipe Material</label>
<select name="${nameTipe}" class="form-control" >
<option value="">- Select -</option>
@foreach ($dataBangunan['Tambah Tipe Dinding Existing'] as $item)
    <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
@endforeach
</select>
</div>
<div style="flex: 1; margin-right: 10px;">
<label>Bobot (%)</label>
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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

            if (type === 'tipe-pelapis-dinding-existing-600') {
                nameTipe = 'tipe_tipe_pelapis_dinding_existing[]';
                nameBobot = 'bobot_tipe_pelapis_dinding_existing[]';

                areaItem.innerHTML = `
<div style="flex: 1; margin-right: 10px;">
<label>Tipe Material</label>
<select name="${nameTipe}" class="form-control" >
<option value="">- Select -</option>
@foreach ($dataBangunan['Tambah Tipe Pelapis Dinding Existing'] as $item)
    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
@endforeach
</select>
</div>
<div style="flex: 1; margin-right: 10px;">
<label>Bobot (%)</label>
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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

            if (type === 'tipe-pintu-jendela-existing-600') {
                nameTipe = 'tipe_tipe_pintu_jendela_existing[]';
                nameBobot = 'bobot_tipe_pintu_jendela_existing[]';

                areaItem.innerHTML = `
<div style="flex: 1; margin-right: 10px;">
<label>Tipe Material</label>
<select name="${nameTipe}" class="form-control" >
<option value="">- Select -</option>
@foreach ($dataBangunan['Tambah Tipe Pintu & Jendela Existing'] as $item)
    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
@endforeach
</select>
</div>
<div style="flex: 1; margin-right: 10px;">
<label>Bobot (%)</label>
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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

            if (type === 'tipe-lantai-existing-600') {
                nameTipe = 'tipe_tipe_lantai_existing[]';
                nameBobot = 'bobot_tipe_lantai_existing[]';

                areaItem.innerHTML = `
<div style="flex: 1; margin-right: 10px;">
<label>Tipe Material</label>
<select name="${nameTipe}" class="form-control" >
<option value="">- Select -</option>
 @foreach ($dataBangunan['Tambah Tipe Lantai Existing'] as $item)
    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
@endforeach
</select>
</div>
<div style="flex: 1; margin-right: 10px;">
<label>Bobot (%)</label>
<input type="text" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot"  >
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
<input type="text" name="${nameLuas}" class="form-control" placeholder="Luas (m²)"  >
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
        document.querySelectorAll('.add-area-link').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const type = this.getAttribute('data-type');
                const areaContainer = document.querySelector(
                    `.area-lainnya-container-600[data-type="${type}"]`);
                const newAreaItem = createAreaItem(type);
                areaContainer.appendChild(newAreaItem);
            });
        });


        // Event delegation untuk tombol add dan remove dalam masing-masing container
        document.querySelectorAll('.area-lainnya-container-600').forEach(function(container) {
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

    document.addEventListener('DOMContentLoaded', function() {
        const strukturContainer = document.getElementById('struktur-container-600');
        const showStrukturBtn = document.getElementById('show-struktur-btn-600');
        const addStrukturBtn = document.querySelector('.add-area-link[data-type="struktur_600"]');

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
        const pondasiContainer = document.getElementById('pondasi-container-600');
        const showPondasiBtn = document.getElementById('show-pondasi-btn-600');
        const addPondasiBtn = document.querySelector('.add-area-link[data-type="pondasi_600"]');

        // Awal hanya tombol show yang terlihat
        addPondasiBtn.style.display = 'none';

        showPondasiBtn.addEventListener('click', function() {
            pondasiContainer.style.display = 'block'; // Tampilkan container
            showPondasiBtn.remove(); // Hapus tombol show
            addPondasiBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addPondasiBtn.addEventListener('click', function() {
            // Logika untuk menambah area pondasi ditangani di kode area lainnya
            console.log('Area baru untuk pondasi ditambahkan');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('rangka-atap-container-600');
        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-600-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="rangka-atap-600"]');

        addRangkaAtapBtn.style.display = 'none';

        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            // Logika untuk menambah area struktur ditangani di kode area lainnya
            console.log('Area baru untuk struktur ditambahkan');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-600-container');
        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-600-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="penutup-atap-existing-600"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';


        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            // Logika untuk menambah area struktur ditangani di kode area lainnya
            console.log('Area baru untuk struktur ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('plafon-existing-600-container');
        const showRangkaAtapBtn = document.getElementById('show-plafon-existing-600-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="plafon-existing-600"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';


        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            // Logika untuk menambah area struktur ditangani di kode area lainnya
            console.log('Area baru untuk struktur ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('dinding-existing-600-container');
        const showRangkaAtapBtn = document.getElementById('show-dinding-existing-600-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="dinding-existing-600"]');

        // Awal hanya tombol show yang terlihat
        addRangkaAtapBtn.style.display = 'none';


        showRangkaAtapBtn.addEventListener('click', function() {
            rangkaAtapContainer.style.display = 'block'; // Tampilkan container
            showRangkaAtapBtn.remove(); // Hapus tombol show
            addRangkaAtapBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addRangkaAtapBtn.addEventListener('click', function() {
            // Logika untuk menambah area struktur ditangani di kode area lainnya
            console.log('Area baru untuk struktur ditambahkan');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-600-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-600-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pelapis-dinding-existing-600"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-600-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-600-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pintu-jendela-existing-600"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-600-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-600-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-lantai-existing-600"]');

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


    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const contentId = `content-${checkbox.id}`;
            console.log(contentId);

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


    function toggleCheckboxes600(selectElement, targetId) {
        const year = selectElement.value;
        const checkboxContainer = document.getElementById(targetId);

        // Show checkbox container if a year is selected, otherwise hide it
        if (year) {
            checkboxContainer.style.display = 'block';
        } else {
            checkboxContainer.style.display = 'none';
        }
    }

    function toggleBobotInput(checkbox, contentId) {
        const contentElement = document.getElementById(contentId);

        if (contentElement) {
            // Show or hide the content div based on checkbox status
            contentElement.style.display = checkbox.checked ? 'block' : 'none';

            // If checkbox is unchecked, clear the input value
            if (!checkbox.checked) {
                const inputElement = contentElement.querySelector('input[type="text"]');
                if (inputElement) {
                    inputElement.value = ''; // Clear input value when unchecked
                }
            }
        }
    }

    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const contentId = `${checkbox.id}`;
            console.log(contentId);
            toggleBobotInput(checkbox, contentId);
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

    #drawingCanvas_600 {
        width: 100%;
        height: 100%;
        background: #fff;
        cursor: grab;
    }

    #drawingCanvas_600:active {
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
        const mainCanvas = document.getElementById('drawingCanvas_600');
        if (mainCanvas) {
            // Set ukuran canvas sesuai dengan container
            resizeCanvas_600(mainCanvas);

            // Inisialisasi canvas utama di sini
            setupCanvas_600('drawingCanvas_600');

            // Tambahkan titik awal di tengah canvas untuk canvas utama
            const ctx = mainCanvas.getContext('2d');
            points = [{
                x: mainCanvas.width / 2,
                y: mainCanvas.height / 2
            }];

            // Gambar canvas utama awal
            redrawCanvas_600('drawingCanvas_600');
        }

        // Fungsi untuk menambahkan lantai baru
        const addLantaiBtn = document.getElementById('add-lantai-btn_600');
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
                                            <button type="button" class="nav-btn" onclick="setDirection_600('up', '${uniqueId}')">
                                                <i class="fas fa-chevron-up"></i>
                                            </button>
                                            <div class="d-flex">
                                                <button type="button" class="nav-btn" onclick="setDirection_600('left', '${uniqueId}')">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <button type="button" class="nav-btn" onclick="setDirection_600('down', '${uniqueId}')">
                                                    <i class="fas fa-chevron-down"></i>
                                                </button>
                                                <button type="button" class="nav-btn" onclick="setDirection_600('right', '${uniqueId}')">
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
                                    <button type="button" class="btn btn-primary w-100 mb-2" onclick="drawLine_600('${uniqueId}')">
                                        <i class="fas fa-pen me-2"></i>Gambar Garis
                                    </button>
                                    <button type="button" class="btn btn-success w-100 mb-2" onclick="closePolygon_600('${uniqueId}')">
                                        <i class="fas fa-vector-square me-2"></i>Tutup Area
                                    </button>
                                    <button type="button" class="btn btn-outline-danger w-100" onclick="clearCanvas_600('${uniqueId}')">
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
                                        <input type="hidden" name="faktor_pengali_600[]" value="1" class="pengali-value-${uniqueId}">
                                    </div>
        
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center">
                                            <i class="fas fa-ruler-combined me-2"></i>Luas Bangunan (m²)
                                        </label>
                                        <input type="number" class="form-control" name="luas_bangunan_600[]" id="luas_${uniqueId}" 
                                            placeholder="0" step="0.01" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Tambahkan container lantai baru ke wrapper
                const wrapper = document.getElementById('lantai-container-wrapper_600');
                if (wrapper) {
                    wrapper.appendChild(newFloorContainer);
                }

                // Inisialisasi canvas baru
                setTimeout(() => {
                    const newCanvas = document.getElementById(uniqueId);
                    if (newCanvas) {
                        // Set ukuran canvas sesuai container
                        resizeCanvas_600(newCanvas);

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

                        // Setup event listeners untuk canvas baru
                        setupCanvas_600(uniqueId);

                        // Gambar canvas awal
                        redrawCanvas_600(uniqueId);
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

    // Fungsi untuk menyesuaikan ukuran canvas
    function resizeCanvas_600(canvas) {
        const container = canvas.parentElement;
        if (container) {
            const containerWidth = container.clientWidth;
            canvas.width = containerWidth > 0 ? containerWidth : 800;
            canvas.height = Math.min(window.innerHeight * 0.6, 600);
        }
    }

    // Fungsi untuk menggambar titik - tanpa suffix 200
    function drawPoint_600(x, y, ctx) {
        ctx.beginPath();
        ctx.arc(x, y, 3, 0, 2 * Math.PI);
        ctx.fillStyle = 'red';
        ctx.fill();
    }

    // Fungsi untuk menggambar pengukuran - tanpa suffix 200
    function drawMeasurement_600(startX, startY, endX, endY, distance, ctx, zoom = 1) {
        const midX = (startX + endX) / 2;
        const midY = (startY + endY) / 2;

        const angle = Math.atan2(endY - startY, endX - startX);
        const perpAngle = angle + Math.PI / 2;
        const offset = 15 / zoom;

        const textX = midX + Math.cos(perpAngle) * offset;
        const textY = midY + Math.sin(perpAngle) * offset;

        ctx.save();
        // Gambar garis offset
        ctx.beginPath();
        ctx.moveTo(midX, midY);
        ctx.lineTo(textX, textY);
        ctx.strokeStyle = 'rgba(0, 0, 255, 0.5)';
        ctx.lineWidth = 1 / zoom;
        ctx.stroke();

        // Gambar kotak background untuk teks
        const padding = 5 / zoom;
        ctx.font = `bold ${12/zoom}px Arial`;
        const textWidth = ctx.measureText(`${distance} m`).width;

        ctx.fillStyle = 'rgba(255, 255, 255, 0.8)';
        ctx.fillRect(
            textX - textWidth / 2 - padding,
            textY - 12 / zoom - padding,
            textWidth + padding * 2,
            18 / zoom + padding * 2
        );

        // Gambar teks pengukuran
        ctx.fillStyle = 'blue';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(`${distance} m`, textX, textY);
        ctx.restore();
    }

    // Fungsi untuk mengkalkulasi area
    function calculateArea_600(canvasId = 'drawingCanvas_600') {
        let currentPoints;
        let currentScale;
        let currentZoom;

        if (canvasId === 'drawingCanvas_600') {
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
    function setupCanvas_600(canvasId) {
        const canvas = document.getElementById(canvasId);
        if (!canvas) {
            console.error('Canvas dengan ID ' + canvasId + ' tidak ditemukan');
            return;
        }

        // Tambahkan event listeners untuk canvas - mouse events
        canvas.addEventListener('mousedown', function(e) {
            e.preventDefault(); // Mencegah default action
            startPan_600(e, canvasId);
        });

        canvas.addEventListener('mousemove', function(e) {
            e.preventDefault(); // Mencegah default action
            pan_600(e, canvasId);
        });

        canvas.addEventListener('mouseup', function(e) {
            e.preventDefault(); // Mencegah default action
            endPan_600(canvasId);
        });

        canvas.addEventListener('mouseleave', function(e) {
            e.preventDefault(); // Mencegah default action
            endPan_600(canvasId);
        });

        // Event untuk zoom dengan wheel mouse
        canvas.addEventListener('wheel', function(e) {
            e.preventDefault(); // Mencegah scroll halaman

            // Dapatkan posisi mouse relatif terhadap canvas
            const rect = canvas.getBoundingClientRect();
            const mouseX = e.clientX - rect.left;
            const mouseY = e.clientY - rect.top;

            // Tentukan arah zoom (positif untuk zoom in, negatif untuk zoom out)
            const zoomDirection = e.deltaY < 0 ? 1 : -1;
            const zoomFactor = 1.1; // Faktor zoom

            // Terapkan zoom ke canvas yang tepat
            if (canvasId === 'drawingCanvas_600') {
                // Zoom in atau out berdasarkan arah
                if (zoomDirection > 0) {
                    zoomLevel *= zoomFactor; // Zoom in
                } else {
                    zoomLevel /= zoomFactor; // Zoom out
                }

                // Batasi zoom level
                zoomLevel = Math.min(Math.max(0.1, zoomLevel), 10);

                // Update zoom center
                zoomCenter = {
                    x: mouseX,
                    y: mouseY
                };
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

                // Update zoom center
                canvasData[canvasId].zoomCenter = {
                    x: mouseX,
                    y: mouseY
                };
            }

            // Redraw canvas
            redrawCanvas_600(canvasId);
        }, {
            passive: false
        });

        // Set style cursor awal untuk drag
        canvas.style.cursor = 'grab';

        // Redraw canvas awal
        redrawCanvas_600(canvasId);

        // Tambahkan event listener untuk resize window
        window.addEventListener('resize', function() {
            resizeCanvas_600(canvas);
            redrawCanvas_600(canvasId);
        });
    }

    // Fungsi untuk menggambar ulang canvas dengan perbaikan
    function redrawCanvas_600(canvasId = 'drawingCanvas_600') {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        const ctx = canvas.getContext('2d');

        // Clear canvas dengan ukuran yang benar
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Dapatkan data yang sesuai untuk canvas ini
        let currentPoints, currentScale, currentZoom, currentOffsetX, currentOffsetY, isAreaClosed;

        if (canvasId === 'drawingCanvas_600') {
            currentPoints = points;
            currentScale = scale;
            currentZoom = zoomLevel;
            currentOffsetX = offsetX;
            currentOffsetY = offsetY;
            isAreaClosed = points.length > 3 &&
                points[0].x === points[points.length - 1].x &&
                points[0].y === points[points.length - 1].y;
        } else {
            if (!canvasData[canvasId]) return;
            currentPoints = canvasData[canvasId].points;
            currentScale = canvasData[canvasId].scale;
            currentZoom = canvasData[canvasId].zoomLevel;
            currentOffsetX = canvasData[canvasId].offsetX;
            currentOffsetY = canvasData[canvasId].offsetY;
            isAreaClosed = canvasData[canvasId].isClosed;
        }

        // Tambahkan grid sebagai panduan
        drawGrid_600(ctx, canvas.width, canvas.height, currentZoom, currentOffsetX, currentOffsetY, currentScale);

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
            ctx.arc(currentPoints[i].x, currentPoints[i].y, 5 / currentZoom, 0, 2 * Math.PI);
            ctx.fillStyle = i === 0 ? 'blue' : 'red';
            ctx.fill();

            // Gambar garis jika ada titik sebelumnya
            if (i > 0) {
                ctx.beginPath();
                ctx.moveTo(currentPoints[i - 1].x, currentPoints[i - 1].y);
                ctx.lineTo(currentPoints[i].x, currentPoints[i].y);
                ctx.strokeStyle = 'black';
                ctx.lineWidth = 2 / currentZoom;
                ctx.stroke();

                // Hitung jarak untuk pengukuran
                const dx = currentPoints[i].x - currentPoints[i - 1].x;
                const dy = currentPoints[i].y - currentPoints[i - 1].y;
                const distance = Math.sqrt(dx * dx + dy * dy) / currentScale;

                // Tampilkan pengukuran dengan lebih jelas
                drawMeasurement_600(currentPoints[i - 1].x, currentPoints[i - 1].y,
                    currentPoints[i].x, currentPoints[i].y,
                    distance.toFixed(2), ctx, currentZoom);
            }
        }

        // Kembalikan transformasi
        ctx.restore();

        // Hitung dan tampilkan area jika area tertutup
        if (isAreaClosed) {
            const area = calculateArea_600(canvasId);

            // Tampilkan area di canvas
            ctx.save();
            ctx.font = 'bold 14px Arial';
            ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';
            ctx.textAlign = 'right';
            ctx.fillText(`Area: ${area} m²`, canvas.width - 20, 30);
            ctx.restore();

            // Update input field jika ada
            const luasInput = canvasId === 'drawingCanvas_600' ?
                document.querySelector('input[name="luas_bangunan_600[]"]') :
                document.getElementById(`luas_${canvasId}`);

            if (luasInput) {
                luasInput.value = area;
            }
        }
    }

    // Fungsi untuk menggambar grid yang lebih jelas
    function drawGrid_600(ctx, width, height, zoom, offsetX, offsetY, gridSize) {
        const effectiveGridSize = gridSize * zoom;

        // Hitung batas grid yang terlihat
        const startX = (-offsetX % effectiveGridSize + width) % effectiveGridSize;
        const startY = (-offsetY % effectiveGridSize + height) % effectiveGridSize;

        ctx.save();

        // Gambar garis grid minor (lebih tipis)
        ctx.strokeStyle = 'rgba(200, 200, 200, 0.3)';
        ctx.lineWidth = 0.5;

        // Garis vertikal minor
        for (let x = startX; x < width; x += effectiveGridSize / 5) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, height);
            ctx.stroke();
        }

        // Garis horizontal minor
        for (let y = startY; y < height; y += effectiveGridSize / 5) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(width, y);
            ctx.stroke();
        }

        // Gambar garis grid major (lebih tebal)
        ctx.strokeStyle = 'rgba(150, 150, 150, 0.5)';
        ctx.lineWidth = 1;

        // Garis vertikal major
        for (let x = startX; x < width; x += effectiveGridSize) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, height);
            ctx.stroke();
        }

        // Garis horizontal major
        for (let y = startY; y < height; y += effectiveGridSize) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(width, y);
            ctx.stroke();
        }

        ctx.restore();
    }

    // Fungsi untuk mengatur arah
    function setDirection_600(direction, canvasId = 'drawingCanvas_600') {
        const distanceInput = document.getElementById(canvasId === 'drawingCanvas_600' ? 'distance_600' :
            `distance_${canvasId}`);
        const angleInput = document.getElementById(canvasId === 'drawingCanvas_600' ? 'angle_600' :
            `angle_${canvasId}`);

        if (!distanceInput || !angleInput) {
            console.error('Input elemen tidak ditemukan');
            return;
        }

        // Set nilai default untuk angle berdasarkan arah
        switch (direction) {
            case 'up':
                angleInput.value = 270;
                break;
            case 'right':
                angleInput.value = 0;
                break;
            case 'down':
                angleInput.value = 90;
                break;
            case 'left':
                angleInput.value = 180;
                break;
        }

        // Focus ke input jarak
        distanceInput.focus();
    }

    // Fungsi untuk mulai pan - perbaikan
    function startPan_600(e, canvasId = 'drawingCanvas_600') {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        const rect = canvas.getBoundingClientRect();
        const mouseX = e.clientX - rect.left;
        const mouseY = e.clientY - rect.top;

        canvas.style.cursor = 'grabbing';

        if (canvasId === 'drawingCanvas_600') {
            isPanning = true;
            startPanX = mouseX - offsetX;
            startPanY = mouseY - offsetY;
        } else {
            if (!canvasData[canvasId]) return;
            canvasData[canvasId].isPanning = true;
            canvasData[canvasId].startPanX = mouseX - canvasData[canvasId].offsetX;
            canvasData[canvasId].startPanY = mouseY - canvasData[canvasId].offsetY;
        }
    }

    // Fungsi untuk melakukan pan - perbaikan
    function pan_600(e, canvasId = 'drawingCanvas_600') {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        const rect = canvas.getBoundingClientRect();
        const mouseX = e.clientX - rect.left;
        const mouseY = e.clientY - rect.top;

        let isPanningCurrent;

        if (canvasId === 'drawingCanvas_600') {
            isPanningCurrent = isPanning;
        } else {
            if (!canvasData[canvasId]) return;
            isPanningCurrent = canvasData[canvasId].isPanning;
        }

        if (!isPanningCurrent) return;

        if (canvasId === 'drawingCanvas_600') {
            offsetX = mouseX - startPanX;
            offsetY = mouseY - startPanY;
        } else {
            canvasData[canvasId].offsetX = mouseX - canvasData[canvasId].startPanX;
            canvasData[canvasId].offsetY = mouseY - canvasData[canvasId].startPanY;
        }

        redrawCanvas_600(canvasId);
    }

    // Fungsi untuk mengakhiri pan
    function endPan_600(canvasId = 'drawingCanvas_600') {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        canvas.style.cursor = 'grab';

        if (canvasId === 'drawingCanvas_600') {
            isPanning = false;
        } else {
            if (!canvasData[canvasId]) return;
            canvasData[canvasId].isPanning = false;
        }
    }

    // Fungsi untuk menggambar garis
    function drawLine_600(canvasId = 'drawingCanvas_600') {
        const distanceInput = document.getElementById(canvasId === 'drawingCanvas_600' ? 'distance_600' :
            `distance_${canvasId}`);
        const angleInput = document.getElementById(canvasId === 'drawingCanvas_600' ? 'angle_600' :
            `angle_${canvasId}`);

        if (!distanceInput || !angleInput) {
            console.error('Input elemen tidak ditemukan');
            return;
        }

        // Dapatkan nilai dari input
        const distance = parseFloat(distanceInput.value);
        const angle = parseFloat(angleInput.value);

        if (isNaN(distance) || isNaN(angle)) {
            alert('Mohon masukkan nilai jarak dan sudut yang valid');
            return;
        }

        // Dapatkan data untuk canvas yang sesuai
        let currentPoints, currentScale;

        if (canvasId === 'drawingCanvas_600') {
            currentPoints = points;
            currentScale = scale;
        } else {
            if (!canvasData[canvasId]) return;
            currentPoints = canvasData[canvasId].points;
            currentScale = canvasData[canvasId].scale;
        }

        // Jika tidak ada titik, kembalikan
        if (currentPoints.length === 0) return;

        // Dapatkan titik terakhir
        const lastPoint = currentPoints[currentPoints.length - 1];

        // Kalkulasi titik baru berdasarkan jarak dan sudut
        const angleRad = angle * Math.PI / 180;
        const newX = lastPoint.x + Math.cos(angleRad) * distance * currentScale;
        const newY = lastPoint.y + Math.sin(angleRad) * distance * currentScale;

        // Tambahkan titik baru
        if (canvasId === 'drawingCanvas_600') {
            points.push({
                x: newX,
                y: newY
            });
        } else {
            canvasData[canvasId].points.push({
                x: newX,
                y: newY
            });
        }

        // Bersihkan input
        distanceInput.value = '';
        angleInput.value = '';

        // Redraw canvas
        redrawCanvas_600(canvasId);
    }

    // Fungsi untuk menutup polygon
    function closePolygon_600(canvasId = 'drawingCanvas_600') {
        // Dapatkan data untuk canvas yang sesuai
        let currentPoints;

        if (canvasId === 'drawingCanvas_600') {
            currentPoints = points;
        } else {
            if (!canvasData[canvasId]) return;
            currentPoints = canvasData[canvasId].points;
        }

        // Jika tidak cukup titik untuk membuat polygon yang berarti
        if (currentPoints.length < 3) {
            alert('Diperlukan minimal 3 titik untuk membuat area tertutup');
            return;
        }

        // Tutup polygon dengan menambahkan titik pertama sebagai titik terakhir
        if (canvasId === 'drawingCanvas_600') {
            points.push({
                ...points[0]
            });
        } else {
            canvasData[canvasId].points.push({
                ...canvasData[canvasId].points[0]
            });
            canvasData[canvasId].isClosed = true;
        }

        // Redraw canvas
        redrawCanvas_600(canvasId);

        // Hitung dan tampilkan area
        const area = calculateArea_600(canvasId);

        // Update input field jika ada
        const luasInput = canvasId === 'drawingCanvas_600' ?
            document.querySelector('input[name="luas_bangunan_600[]"]') :
            document.getElementById(`luas_${canvasId}`);

        if (luasInput) {
            luasInput.value = area;
        }
    }

    // Fungsi untuk menghapus garis terakhir
    function clearCanvas_600(canvasId = 'drawingCanvas_600') {
        // Dapatkan data untuk canvas yang sesuai
        let currentPoints;

        if (canvasId === 'drawingCanvas_600') {
            // Jika hanya ada satu titik, jangan hapus
            if (points.length <= 1) return;

            // Hapus titik terakhir
            points.pop();
        } else {
            if (!canvasData[canvasId]) return;

            // Jika hanya ada satu titik, jangan hapus
            if (canvasData[canvasId].points.length <= 1) return;

            // Hapus titik terakhir
            canvasData[canvasId].points.pop();

            // Jika polygon tertutup dan menghapus titik terakhir, tandai sebagai tidak tertutup
            if (canvasData[canvasId].isClosed) {
                canvasData[canvasId].isClosed = false;
            }
        }

        // Redraw canvas
        redrawCanvas_600(canvasId);
    }

    // Tambahkan fungsi untuk mengumpulkan data canvas
    function getCanvasData_600() {
        // Data untuk canvas utama
        const mainCanvas = document.getElementById('drawingCanvas_600');
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
            tipe_spek: document.querySelector('input[name="tipe_spek"]')?.value || '200'
        };
    }

    // Tambahkan event listener untuk form submit
    document.addEventListener('DOMContentLoaded', function() {
        const formElements = document.querySelectorAll('form');
        if (formElements.length > 0) {
            formElements.forEach(form => {
                form.addEventListener('submit', function(e) {
                    // Dapatkan data canvas
                    const canvasDataToSave = getCanvasData_600();
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
        @if (isset($bangunan->canvas_data) && $bangunan->tipe_spek === '200')
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
                if (document.getElementById('drawingCanvas_600')) {
                    redrawCanvas_600('drawingCanvas_600');

                    // Update luas bangunan jika polygon tertutup
                    if (points.length > 3 &&
                        points[0].x === points[points.length - 1].x &&
                        points[0].y === points[points.length - 1].y) {
                        const area = calculateArea_600('drawingCanvas_600');
                        const luasBangunanInput = document.querySelector('input[name="luas_bangunan_600[]"]');
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
                        const addLantaiBtn = document.getElementById('add-lantai-btn_600');
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
                            redrawCanvas_600(canvasId);

                            // Update luas bangunan jika polygon tertutup
                            if (canvasData[canvasId].isClosed) {
                                const area = calculateArea_600(canvasId);
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
