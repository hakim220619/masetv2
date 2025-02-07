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


<div id="200" style=" margin-top: 20px; display: none;">
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted" style="margin-top: 5px;">Pilih jenis bangunan yang
            sesuai untuk menentukan umur ekonomis bangunan.</small>
        <select class="form-control" id="jenis_bangunan_200" name="jenis_bangunan_200">
            <option value="" selected>- Select -</option>
            <option value="rumah_tinggal_200">Bangunan Rumah Tinggal</option>
            <option value="rumah_susun_200">Bangunan Rumah Susun</option>
            <option value="pusat_perbelanjaan_200">Bangunan Pusat Perbelanjaan</option>
            <option value="kantor_200">Bangunan Kantor</option>
            <option value="gedung_pemerintah_200">Bangunan Gedung Pemerintah</option>
            <option value="hotel_motel_200">Bangunan Hotel/Motel</option>
            <option value="industri_gudang_200">Bangunan Industri dan Gudang</option>
            <option value="kawasan_perkebunan_200">Bangunan di Kawasan Perkebunan</option>
        </select>
    </div>

    <div style="margin-top: 20px;">
        <div id="detail_rumah_tinggal_200" class="bangunan-detail-200" style="display: none;">
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

        <div id="detail_rumah_susun_200" class="bangunan-detail-200" style="display: none;">
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

        <div id="detail_pusat_perbelanjaan_200" class="bangunan-detail-200" style="display: none;">
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

        <div id="detail_kantor_200" class="bangunan-detail-200" style="display: none;">
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

        <div id="detail_gedung_pemerintah_200" class="bangunan-detail-200" style="display: none;">
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

        <div id="detail_kawasan_perkebunan_200" class="bangunan-detail-200" style="display: none;">
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
        document.getElementById('jenis_bangunan_200').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.bangunan-detail-200').forEach(el => el.style.display = 'none');
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
        <select class="form-control" id="jenis_bangunan_indeks_lantai_200" name="jenis_bangunan_indeks_lantai">
            <option value="" selected>- Select -</option>
            <option value="rumah_sederhana_200">Rumah Tinggal Sederhana</option>
            <option value="rumah_menengah_200">Rumah Tinggal Menengah</option>
            <option value="rumah_mewah_200">Rumah Tinggal Mewah</option>
            <option value="gedung_low_200">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)</option>
            <option value="gedung_mid_200">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)</option>
            <option value="gedung_high_200">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai)</option>
        </select>
    </div>

    <!-- Detail forms untuk setiap jenis bangunan (indeks lantai) -->
    <div style="margin-top: 20px;">
        <div id="detail_rumah_sederhana_200" class="lantai-detail-200" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_sederhana">Jumlah Lantai Rumah Tinggal Sederhana</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Sederhana'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_menengah_200" class="lantai-detail-200" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_menengah">Jumlah Lantai Rumah Tinggal Menengah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Menengah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_mewah_200" class="lantai-detail-200" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_mewah">Jumlah Lantai Rumah Tinggal Mewah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Mewah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_low_200" class="lantai-detail-200" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_low">Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (5 Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_low_rise_200" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_mid_200" class="lantai-detail-200" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_mid">Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (9 Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_mid_rise_200" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_high_200" class="lantai-detail-200" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_high">Jumlah Lantai Bangunan Gedung Bertingkat High Rise (8
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_high_rise_200"
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
        document.getElementById('jenis_bangunan_indeks_lantai_200').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.lantai-detail-200').forEach(el => el.style.display = 'none');

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
        <select class="form-control" id="tahun_dibangun_200" name="tahun_dibangun"
            onchange="toggleCheckboxesMenengah(this, 'checkboxContainerDibangunMenengah')">
            <script>
                const currentYear200 = new Date().getFullYear();
                const startYear200 = 1900;
                const endYear200 = currentYear200 + 7;
                let options200 = '';

                for (let year = startYear200; year <= endYear200; year++) {
                    const selected = year === currentYear200 ? 'selected' : '';
                    options200 += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.getElementById('tahun_dibangun_200').innerHTML = options200;
            </script>
        </select>
    </div>
    <div id="checkboxContainerDibangunMenengah" style="display: none; margin-top: 20px;">
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
        <select class="form-control" id="tahun_renovasi_200" name="tahun_renovasi"
            onchange="toggleCheckboxesMenengah(this, 'checkboxContainerRenovasiMenengah')">
            <script>
                const currentYearMenengah = new Date().getFullYear();
                const startYearRenovasiMenengah = 1960;
                const endYearRenovasiMenengah = currentYearMenengah + 7;
                let optionsRenovasiMenengah = '';

                for (let year = startYearRenovasiMenengah; year <= endYearRenovasiMenengah; year++) {
                    const selected = year === currentYearMenengah ? 'selected' : '';
                    optionsRenovasiMenengah += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.getElementById('tahun_renovasi_200').innerHTML = optionsRenovasiMenengah;
            </script>
        </select>
    </div>

    <div id="checkboxContainerRenovasiMenengah" style="display: none; margin-top: 20px;">
        <label style="font-weight: bold;">Sumber Informasi Tahun Renovasi</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="keterangan_pendamping_lokasi">
            Keterangan pendamping lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="pengamatan_visual"> Pengamatan
            visual</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="keterangan_lingkungan"> Keterangan
            lingkungan</label><br>
    </div>
    <script>
        function toggleCheckboxesMenengah(selectElement, targetId) {
            const year = selectElement.value;
            const checkboxContainer = document.getElementById(targetId);

            // Show checkbox container if a year is selected, otherwise hide it
            if (year) {
                checkboxContainer.style.display = 'block';
            } else {
                checkboxContainer.style.display = 'none';
            }
        }
    </script>
    <div class="form-group mb-3" style="margin-top: 20px">
        <label for="jenis_renovasi"><b>Jenis Renovasi</b></label>
        <small class="form-text text-muted">Masukkan jenis renovasi yang dilakukan</small>
        <input type="text" id="jenis_renovasi" name="jenis_renovasi" class="form-control"
            placeholder="Contoh: Renovasi Atap" value="{{ old('jenis_renovasi') }}">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px">
        <label for="bobot_renovasi"><b>Bobot Renovasi (%)</b></label>
        <small class="form-text text-muted">Masukkan persentase bobot renovasi (0-100)</small>
        <input type="number" id="bobot_renovasi" name="bobot_renovasi" class="form-control" min="0"
            max="100" step="1" placeholder="Contoh: 25" value="{{ old('bobot_renovasi') }}">
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="kondisi_visual" style="font-weight: bold;">Kondisi Bangunan Secara Visual</label>
        <select class="form-control" id="kondisi_visual" name="kondisi_visual">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Kondisi Bangunan Secara Visual'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="catatan_khusus" style="font-weight: bold;">Catatan Khusus Bangunan</label>
        <textarea class="form-control" id="catatan_khusus" name="catatan_khusus" rows="4"
            placeholder="Tambahkan catatan khusus di sini..."></textarea>
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
        <div class="area-lainnya-container-menengah" data-type="pintu-jendela">
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
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pintu-jendela">Tambah
            Area</button>
    </div>

    <!-- Luas Dinding -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Dinding</b></label><br>
        <small class="form-text text-muted">Masukkan luas dinding kotor belum dikurangi luas pintu dan
            jendela.</small>
        <div class="area-lainnya-container-menengah" data-type="dinding">
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
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="dinding">Tambah
            Area</button>
    </div>
    <!-- Luas Rangka Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Rangka Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas rangka atap datar.</small>
        <div class="area-lainnya-container-menengah" data-type="rangka-atap-datar">
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
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="rangka-atap-datar">Tambah
            Area</button>
    </div>

    <!-- Luas Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas atap datar.</small>
        <div class="area-lainnya-container-menengah" data-type="atap-datar">
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
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar">Tambah
            Area</button>
    </div>
    <!-- Tipe Pondasi Existing -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Pondasi Eksisting - Rumah Tinggal Menengah 2 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Batu Kali" id="pondasi_batu_kali_200"
                    name="tipe_pondasi_existing[]" onchange="toggleBobotInput(this, 'bobot_pondasi_batu_kali_200')">
                <label class="form-check-label" for="pondasi_batu_kali_200">Tapak Beton dan Batu Kali</label>
            </div>
        </div>
        <div id="bobot_pondasi_batu_kali_200" style="display: none; margin-top: 10px;">
            <label for="bobot_batu_kali">Bobot Pondasi Batu Kali (dalam persen %)</label>
            <input type="text" class="form-control" id="bobot_batu_kali" name="bobot_tipe_pondasi_existing[]"
                placeholder="Masukkan bobot dalam persen">
        </div>
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
        <div id="pondasi-container-menengah" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="pondasi_menengah">
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="pondasi_menengah">Tambah Tipe Pondasi Existing</button>

        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-pondasi-menengah-btn">Tambah
            Tipe Pondasi Existing</button>


    </div>
    <!-- Tipe Struktur Existing -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Struktur Eksisting - Rumah Tinggal Menengah 2 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Beton Bertulang"
                    name="tipe_struktur_existing[]" id="struktur_beton_bertulang_200"
                    onchange="toggleBobotInput(this, 'bobot_struktur_beton_bertulang_200')">
                <label class="form-check-label" for="struktur_beton_bertulang_200">Beton Bertulang</label>
            </div>
        </div>
        <div id="bobot_struktur_beton_bertulang_200" style="display: none; margin-top: 10px;">
            <label for="bobot_beton_bertulang">Bobot Struktur Beton Bertulang (dalam persen %)</label>
            <input type="text" class="form-control" id="bobot_beton_bertulang"
                name="bobot_tipe_struktur_existing[]" placeholder="Masukkan bobot dalam persen" min="0"
                max="100" step="0.01">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
        <div id="struktur-container-menengah" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="struktur_menengah">
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="struktur_menengah">Tambah Tipe Struktur Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn-menengah-asd">Tambah Tipe
            Struktur Existing</button>
    </div>

    <!-- Tipe Rangka Atap Existing -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Eksisting - Rumah Tinggal Menengah 2 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Dak Beton (Jika Pakai Balok)"
                    name="tipe_rangka_atap_existing[]" id="atap_dak_beton_menengah">
                <label class="form-check-label" for="atap_dak_beton_menengah">Dak Beton (Jika Pakai Balok)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Genteng)"
                    name="tipe_rangka_atap_existing[]" id="atap_kayu_genteng_menengah">
                <label class="form-check-label" for="atap_kayu_genteng_menengah">Kayu (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)"
                    name="tipe_rangka_atap_existing[]" id="atap_kayu_asbes_menengah">
                <label class="form-check-label" for="atap_kayu_asbes_menengah">Kayu (Atap Asbes, Seng dll, Tanpa
                    Reng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Genteng)"
                    name="tipe_rangka_atap_existing[]" id="atap_baja_genteng_menengah">
                <label class="form-check-label" for="atap_baja_genteng_menengah">Baja Ringan (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Asbes, Seng dll)"
                    name="tipe_rangka_atap_existing[]" id="atap_baja_asbes_menengah">
                <label class="form-check-label" for="atap_baja_asbes_menengah">Baja Ringan (Atap Asbes, Seng
                    dll)</label>
            </div>
        </div>
    </div>

    <!-- Content sections for each option -->
    <div id="content-atap_dak_beton_menengah" class="content" style="display: none;">
        <label><b>Bobot Dak Beton (Jika Pakai Balok)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_kayu_genteng_menengah" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_kayu_asbes_menengah" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_baja_genteng_menengah" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_baja_asbes_menengah" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Asbes, Seng dll)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Existing</b></label><br>
        <div id="rangka-atap-container-menengah" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="rangka-atap-existing-menengah">
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
                data-type="rangka-atap-existing-menengah">Tambah Tipe Rangka Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-existing-menengah-btn">Tambah
            Tipe
            Rangka Atap Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
        <input type="checkbox" id="asbes-200" name="tipe_penutup_atap_existing[]" value="Asbes"
            class="form-check-input">
        <label for="asbes-200" class="form-check-label">Asbes</label><br>

        <input type="checkbox" id="dak-beton-200" name="tipe_penutup_atap_existing[]" value="Dak Beton"
            class="form-check-input">
        <label for="dak-beton-200" class="form-check-label">Dak Beton</label><br>

        <input type="checkbox" id="fibreglass-200" name="tipe_penutup_atap_existing[]" value="Fibreglass"
            class="form-check-input">
        <label for="fibreglass-200" class="form-check-label">Fibreglass</label><br>

        <input type="checkbox" id="genteng-keramik-200" name="tipe_penutup_atap_existing[]" value="Genteng Keramik"
            class="form-check-input">
        <label for="genteng-keramik-200" class="form-check-label">Genteng Keramik Glazur</label><br>

        <input type="checkbox" id="genteng-tanah-liat-200" name="tipe_penutup_atap_existing[]"
            value="Genteng Tanah Liat" class="form-check-input">
        <label for="genteng-tanah-liat-200" class="form-check-label">Genteng Tanah Liat</label><br>

        <input type="checkbox" id="genteng-beton-200" name="tipe_penutup_atap_existing[]" value="Genteng Beton"
            class="form-check-input">
        <label for="genteng-beton-200" class="form-check-label">Genteng Beton</label><br>

        <input type="checkbox" id="genteng-metal-200" name="tipe_penutup_atap_existing[]" value="Genteng Metal"
            class="form-check-input">
        <label for="genteng-metal-200" class="form-check-label">Genteng Metal</label><br>

        <input type="checkbox" id="bitumen-200" name="tipe_penutup_atap_existing[]"
            value="Bitumen (Ondulin/ Onduvilla)" class="form-check-input">
        <label for="bitumen-200" class="form-check-label">Bitumen (Ondulin/ Onduvilla) </label><br>

        <input type="checkbox" id="tegola-200" name="tipe_penutup_atap_existing[]" value="Tegola"
            class="form-check-input">
        <label for="tegola-200" class="form-check-label">Tegola</label><br>

        <input type="checkbox" id="seng-gelombang-200" name="tipe_penutup_atap_existing[]" value="Seng Gelombang"
            class="form-check-input">
        <label for="seng-gelombang-200" class="form-check-label">Seng Gelombang</label><br>

        <input type="checkbox" id="sirap-200" name="tipe_penutup_atap_existing[]" value="Sirap"
            class="form-check-input">
        <label for="sirap-200" class="form-check-label">Sirap</label><br>

        <input type="checkbox" id="spandek-200" name="tipe_penutup_atap_existing[]" value="Spandek"
            class="form-check-input">
        <label for="spandek-200" class="form-check-label">Spandek</label><br>

        <input type="checkbox" id="pvc-200" name="tipe_penutup_atap_existing[]" value="PVC"
            class="form-check-input">
        <label for="pvc-200" class="form-check-label">PVC</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-asbes-200" class="content" style="display: none;">
        <label><b>Bobot Asbes</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-dak-beton-200" class="content" style="display: none;">
        <label><b>Bobot Dak Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-fibreglass-200" class="content" style="display: none;">
        <label><b>Bobot Fibreglass</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-genteng-keramik-200" class="content" style="display: none;">
        <label><b>Bobot Genteng Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-genteng-tanah-liat-200" class="content" style="display: none;">
        <label><b>Bobot Genteng Tanah Liat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-genteng-beton-200" class="content" style="display: none;">
        <label><b>Bobot Genteng Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-genteng-metal-200" class="content" style="display: none;">
        <label><b>Bobot Genteng Metal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>

    <div id="content-bitumen-200" class="content" style="display: none;">
        <label><b>Bobot Bitumen (Ondulin/ Onduvilla)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>

    <div id="content-tegola-200" class="content" style="display: none;">
        <label><b>Bobot Tegola</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>

    <div id="content-seng-gelombang-200" class="content" style="display: none;">
        <label><b>Bobot Seng Gelombang</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>

    <div id="content-sirap-200" class="content" style="display: none;">
        <label><b>Bobot Sirap</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>

    <div id="content-spandek-200" class="content" style="display: none;">
        <label><b>Bobot Spandek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-pvc-200" class="content" style="display: none;">
        <label><b>Bobot PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
        <div id="penutup-atap-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="penutup-atap-existing-menengah">
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
                data-type="penutup-atap-existing-menengah">Tambah Tipe Penutup Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-penutup-atap-existing-menengah-btn">Tambah Tipe
            Penutup Atap Existing</button>
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Plafon Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
        <input type="checkbox" id="akustik-plafon-200" name="tipe_penutup_atap_existing[]" value="Akustik"
            class="form-check-input">
        <label for="akustik-plafon-200" class="form-check-label">Akustik</label><br>

        <input type="checkbox" id="asbes-plafon-200" name="tipe_penutup_atap_existing[]" value="Asbes"
            class="form-check-input">
        <label for="asbes-plafon-200" class="form-check-label">Asbes</label><br>

        <input type="checkbox" id="beton-ekspose-plafon-200" name="tipe_penutup_atap_existing[]"
            value="Beton Ekspose" class="form-check-input">
        <label for="beton-ekspose-plafon-200" class="form-check-label">Beton Ekspose</label><br>

        <input type="checkbox" id="grc-plafon-200" name="tipe_penutup_atap_existing[]" value="GRC"
            class="form-check-input">
        <label for="grc-plafon-200" class="form-check-label">GRC</label><br>

        <input type="checkbox" id="gypsum-plafon-200" name="tipe_penutup_atap_existing[]" value="Gypsum"
            class="form-check-input">
        <label for="gypsum-plafon-200" class="form-check-label">Gypsum</label><br>

        <input type="checkbox" id="lambresering-plafon-200" name="tipe_penutup_atap_existing[]" value="Lambresering"
            class="form-check-input">
        <label for="lambresering-plafon-200" class="form-check-label">Lambresering</label><br>

        <input type="checkbox" id="triplek-plafon-200" name="tipe_penutup_atap_existing[]" value="Triplek"
            class="form-check-input">
        <label for="triplek-plafon-200" class="form-check-label">Triplek</label><br>

        <input type="checkbox" id="pvc-plafon-200" name="tipe_penutup_atap_existing[]" value="PVC"
            class="form-check-input">
        <label for="pvc-plafon-200" class="form-check-label">PVC (Shunda Plafon dll) </label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-akustik-plafon-200" class="content" style="display: none;">
        <label><b>Bobot Akustik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-asbes-plafon-200" class="content" style="display: none;">
        <label><b>Bobot Asbes</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-beton-ekspose-plafon-200" class="content" style="display: none;">
        <label><b>Bobot Beton Ekspose</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-grc-plafon-200" class="content" style="display: none;">
        <label><b>Bobot GRC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-gypsum-plafon-200" class="content" style="display: none;">
        <label><b>Bobot Gypsum</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-lambresering-plafon-200" class="content" style="display: none;">
        <label><b>Bobot Lambresering</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_penutup_atap_existing[]">
    </div>
    <div id="content-triplek-plafon-200" class="content" style="display: none;">
        <label><b>Bobot Triplek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-pvc-plafon-200" class="content" style="display: none;">
        <label><b>Bobot PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Plafon Existing</b></label><br>
        <div id="plafon-existing-200-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="plafon-existing-200">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_plafon_existing[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
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
                data-type="plafon-existing-200">Tambah Tipe Plafon Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-plafon-existing-200-btn">Tambah Tipe
            Plafon Existing</button>
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Dinding Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
        <input type="checkbox" id="batako-menengah" class="form-check-input" name="tipe_tipe_dinding_existing[]"
            value="Batako">
        <label for="batako-menengah" class="form-check-label">Batako</label><br>
        <input type="checkbox" id="bata-merah-menengah" class="form-check-input" name="tipe_tipe_dinding_existing[]"
            value="Bata Merah">
        <label for="bata-merah-menengah" class="form-check-label">Bata Merah</label><br>
        <input type="checkbox" id="bata-ringan-menengah" class="form-check-input"
            name="tipe_tipe_dinding_existing[]" value="Bata Ringan">
        <label for="bata-ringan-menengah" class="form-check-label">Bata Ringan</label><br>
        <input type="checkbox" id="gypsumboard-menengah" class="form-check-input"
            name="tipe_tipe_dinding_existing[]" value="Partisi Gypsumboard 2 Muka">
        <label for="gypsumboard-menengah" class="form-check-label">Partisi Gypsumboard 2 Muka</label><br>
        <input type="checkbox" id="rooster-bata-menengah" class="form-check-input"
            name="tipe_tipe_dinding_existing[]" value="Rooster Bata">
        <label for="rooster-bata-menengah" class="form-check-label">Rooster Bata</label><br>
    </div>
    <!-- Content sections for each option -->
    <div id="content-batako-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Batako</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-bata-merah-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Bata Merah</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-bata-ringan-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Bata Ringan</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-gypsumboard-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Partisi Gypsumboard 2 Muka</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-rooster-bata-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Rooster Bata</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Dinding Existing</b></label><br>
        <div id="tipe-dinding-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="tipe-dinding-existing-menengah">
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link"
                data-type="tipe-dinding-existing-menengah">Tambah Tipe Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-dinding-existing-menengah-btn">Tambah Tipe
            Dinding Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pelapis Dinding Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
        <input type="checkbox" id="cat-menengah" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Cat (Diplester dan Diaci)">
        <label for="cat-menengah" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>
        <input type="checkbox" id="keramik-menengah" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Keramik">
        <label for="keramik-menengah" class="form-check-label">Dilapis Keramik</label><br>
        <input type="checkbox" id="marmer-lokal-menengah" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Marmer Lokal">
        <label for="marmer-lokal-menengah" class="form-check-label">Dilapis Marmer Lokal</label><br>
        <input type="checkbox" id="marmer-import-menengah" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Marmer Import">
        <label for="marmer-import-menengah" class="form-check-label">Dilapis Marmer Import</label><br>
        <input type="checkbox" id="granit-menengah" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Granit/ Homogenous Tile">
        <label for="granit-menengah" class="form-check-label">Dilapis Granit/ Homogenous Tile</label><br>
        <input type="checkbox" id="wallpaper-menengah" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Wallpaper">
        <label for="wallpaper-menengah" class="form-check-label">Dilapis Wallpaper</label><br>
        <input type="checkbox" id="mozaik-menengah" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Mozaik">
        <label for="mozaik-menengah" class="form-check-label">Dilapis Mozaik</label><br>
        <input type="checkbox" id="batu-alam-menengah" class="form-check-input"
            name="tipe_tipe_pelapis_dinding_existing[]" value="Dilapis Batu Alam">
        <label for="batu-alam-menengah" class="form-check-label">Dilapis Batu Alam</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-cat-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-keramik-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-marmer-lokal-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Marmer Lokal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-marmer-import-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Marmer Import</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-granit-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Granit/ Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-wallpaper-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-mozaik-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>
    <div id="content-batu-alam-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
        <div id="tipe-pelapis-dinding-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="tipe-pelapis-dinding-existing-menengah">
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
                        <input type="text" name="bobot_tipe_pelapis_dinding_existing[]"
                            name="bobot_tipe_pelapis_dinding_existing[]" class="form-control"
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
                data-type="tipe-pelapis-dinding-existing-menengah">Tambah Tipe Pelapis Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pelapis-dinding-existing-menengah-btn">Tambah
            Tipe Pelapis Dinding Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pintu & Jendela Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
        <input type="checkbox" id="pintu-kayu-panil-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Kayu Panil">
        <label for="pintu-kayu-panil-menengah" class="form-check-label">Pintu Kayu Panil</label><br>
        <input type="checkbox" id="pintu-kayu-dobel-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Kayu Dobel Triplek/ HPL">
        <label for="pintu-kayu-dobel-menengah" class="form-check-label">Pintu Kayu Dobel Triplek/ HPL</label><br>
        <input type="checkbox" id="pintu-kaca-aluminium-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Kaca Rk Aluminium">
        <label for="pintu-kaca-aluminium-menengah" class="form-check-label">Pintu Kaca Rk Aluminium</label><br>
        <input type="checkbox" id="jendela-kaca-kayu-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Jendela Kaca Rk Kayu">
        <label for="jendela-kaca-kayu-menengah" class="form-check-label">Jendela Kaca Rk Kayu</label><br>
        <input type="checkbox" id="jendela-kaca-aluminium-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Jendela Kaca Rk Aluminium">
        <label for="jendela-kaca-aluminium-menengah" class="form-check-label">Jendela Kaca Rk Aluminium</label><br>
        <input type="checkbox" id="pintu-tempered-floor-hinge-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Kaca Tempered Floor Hinge">
        <label for="pintu-tempered-floor-hinge-menengah" class="form-check-label">Pintu Kaca Tempered Floor
            Hinge</label><br>
        <input type="checkbox" id="pintu-km-upvc-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu KM UPVC/PVC">
        <label for="pintu-km-upvc-menengah" class="form-check-label">Pintu KM UPVC/PVC</label><br>
        <input type="checkbox" id="pintu-garasi-kayu-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Garasi Kayu">
        <label for="pintu-garasi-kayu-menengah" class="form-check-label">Pintu Garasi Kayu</label><br>
        <input type="checkbox" id="pintu-garasi-besi-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Pintu Garasi Besi">
        <label for="pintu-garasi-besi-menengah" class="form-check-label">Pintu Garasi Besi</label><br>
        <input type="checkbox" id="jendela-kaca-stopsol-8-mm-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Jendela Kaca Stopsol 8 mm Rangka Curtain Wall">
        <label for="jendela-kaca-stopsol-8-mm-menengah" class="form-check-label">Jendela Kaca Stopsol 8 mm Rangka
            Curtain
            Wall</label><br>
        <input type="checkbox" id="jendela-kaca-tempered-frameless-menengah" class="form-check-input"
            name="tipe_tipe_pintu_jendela_existing[]" value="Jendela Kaca Tempered Frameless">
        <label for="jendela-kaca-tempered-frameless-menengah" class="form-check-label">Jendela Kaca Tempered
            Frameless
        </label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-pintu-kayu-panil-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Panil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-kayu-dobel-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Dobel Triplek/ HPL</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-kaca-aluminium-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-jendela-kaca-kayu-menengah" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-jendela-kaca-aluminium-menengah" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-tempered-floor-hinge-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Kaca Tempered Floor Hinge</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-km-upvc-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu KM UPVC/PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-garasi-kayu-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Garasi Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-pintu-garasi-besi-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Garasi Besi</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-jendela-kaca-stopsol-8-mm-menengah" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Stopsol 8 mm Rangka Curtain Wall</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>
    <div id="content-jendela-kaca-tempered-frameless-menengah" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Tempered Frameless</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
        <div id="tipe-pintu-jendela-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="tipe-pintu-jendela-existing-menengah">
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
                data-type="tipe-pintu-jendela-existing-menengah">Tambah Tipe Pintu & Jendela Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pintu-jendela-existing-menengah-btn">Tambah
            Tipe Pintu & Jendela Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Lantai Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
        <input type="checkbox" id="granit-homogenous-tile-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Granit/Homogenous Tile">
        <label for="granit-homogenous-tile-lantai-200" class="form-check-label">Granit/Homogenous Tile</label><br>
        <input type="checkbox" id="karpet-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Karpet">
        <label for="karpet-lantai-200" class="form-check-label">Karpet</label><br>
        <input type="checkbox" id="keramik-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Keramik">
        <label for="keramik-lantai-200" class="form-check-label">Keramik</label><br>
        <input type="checkbox" id="marmer-lokal-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Marmer Lokal">
        <label for="marmer-lokal-lantai-200" class="form-check-label">Marmer Lokal</label><br>
        <input type="checkbox" id="marmer-import-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Marmer Import">
        <label for="marmer-import-lantai-200" class="form-check-label">Marmer Import</label><br>
        <input type="checkbox" id="mozaik-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Mozaik">
        <label for="mozaik-lantai-200" class="form-check-label">Mozaik</label><br>
        <input type="checkbox" id="rabat-beton-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Rabat Beton (Semen Ekspose)">
        <label for="rabat-beton-lantai-200" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>
        <input type="checkbox" id="parkit-jati-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Parkit Jati">
        <label for="parkit-jati-lantai-200" class="form-check-label">Parkit Jati</label><br>
        <input type="checkbox" id="teraso-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Teraso">
        <label for="teraso-lantai-200" class="form-check-label">Teraso</label><br>
        <input type="checkbox" id="vynil-lantai-200" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Vynil">
        <label for="vynil-lantai-200" class="form-check-label">Vynil</label><br>
        <input type="checkbox" id="papan-kayu-lantai-200" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Papan Kayu">
        <label for="papan-kayu-lantai-200" class="form-check-label">Papan Kayu</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-granit-homogenous-tile-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-karpet-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Karpet</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-keramik-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-marmer-lokal-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Marmer Lokal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-marmer-import-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Marmer Import</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-mozaik-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Mozaik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-rabat-beton-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-parkit-jati-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Parkit Jati</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-teraso-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Teraso</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-vynil-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Vynil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-papan-kayu-lantai-200" class="content" style="display: none;">
        <label><b>Bobot Papan Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Lantai Existing</b></label><br>
        <div id="tipe-lantai-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="tipe-lantai-existing-menengah">
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
                data-type="tipe-lantai-existing-menengah">Tambah Tipe Lantai Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-lantai-existing-menengah-btn">Tambah Tipe
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
            if (type === 'pondasi_menengah') {
                nameTipe = 'tipe_pondasi_existing[]';
                nameBobot = 'bobot_tipe_pondasi_existing[]';

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
            if (type === 'struktur_menengah') {
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

            if (type === 'rangka-atap-existing-menengah') {
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
            if (type === 'penutup-atap-existing-menengah') {
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

            if (type === 'plafon-existing-200') {
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

            if (type === 'tipe-dinding-existing-menengah') {
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
            if (type === 'tipe-pelapis-dinding-existing-menengah') {
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
            if (type === 'tipe-lantai-existing-menengah') {
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
            if (type === 'tipe-pintu-jendela-existing-menengah') {
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
            <input type="text" name="${nameLuas}" class="form-control" placeholder="Luas (m²)" >
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
                    `.area-lainnya-container-menengah[data-type="${type}"]`);
                const newAreaItem = createAreaItem(type);
                areaContainer.appendChild(newAreaItem);
            });
        });


        // Event delegation untuk tombol add dan remove dalam masing-masing container
        document.querySelectorAll('.area-lainnya-container-menengah').forEach(function(container) {
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
        const pondasiContainer = document.getElementById('pondasi-container-menengah');
        const showPondasiBtn = document.getElementById('show-pondasi-menengah-btn');
        const addPondasiBtn = document.querySelector('.add-area-link[data-type="pondasi_menengah"]');

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
        const strukturContainer = document.getElementById('struktur-container-menengah');
        const showStrukturBtn = document.getElementById('show-struktur-btn-menengah-asd');
        const addStrukturBtn = document.querySelector('.add-area-link[data-type="struktur_menengah"]');

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
        const rangkaAtapContainer = document.getElementById('rangka-atap-container-menengah');
        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-existing-menengah-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="rangka-atap-existing-menengah"]');

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
        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-menengah-container');
        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-menengah-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="penutup-atap-existing-menengah"]');

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
        const rangkaAtapContainer = document.getElementById('plafon-existing-200-container');
        const showRangkaAtapBtn = document.getElementById('show-plafon-existing-200-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="plafon-existing-200"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-dinding-existing-menengah-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-dinding-existing-menengah-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-dinding-existing-menengah"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-menengah-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-menengah-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pelapis-dinding-existing-menengah"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-menengah-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-menengah-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-lantai-existing-menengah"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-menengah-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-menengah-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pintu-jendela-existing-menengah"]');

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
<!-- Rumah menengah -->
</div>



<!-- Script Dinamis untuk Menambah Foto -->
<script>
    // document.getElementById('tipe_spek').addEventListener('change', function() {
    //     const selectedValue = this.value;
    //     const dynamicContent = document.getElementById('dynamic-content');

    //     // Clear existing content
    //     dynamicContent.innerHTML = '';

    //     if (selectedValue) {
    //         // Fetch content dynamically from the server
    //         fetch(`/load-form/${selectedValue}`)
    //             .then(response => {
    //                 if (!response.ok) {
    //                     throw new Error('Form not found');
    //                 }
    //                 return response.text();
    //             })
    //             .then(html => {
    //                 dynamicContent.innerHTML = html;

    //                 // Handle <script> elements
    //                 const scripts = dynamicContent.querySelectorAll('script');

    //                 scripts.forEach(script => {
    //                     const newScript = document.createElement('script');
    //                     if (script.src) {
    //                         // If script has src, load it as an external script
    //                         newScript.src = script.src;
    //                     } else {
    //                         // Inline script content
    //                         newScript.textContent = script.textContent;
    //                     }
    //                     document.body.appendChild(newScript);
    //                     document.body.removeChild(newScript); // Cleanup
    //                 });

    //                 // Handle <style> elements (optional, as styles are usually applied automatically)
    //                 const styles = dynamicContent.querySelectorAll('style');
    //                 styles.forEach(style => {
    //                     const newStyle = document.createElement('style');
    //                     newStyle.textContent = style.textContent;
    //                     document.head.appendChild(newStyle);
    //                 });
    //             })
    //             .catch(error => {
    //                 dynamicContent.innerHTML = `<p class="text-danger">${error.message}</p>`;
    //             });
    //     }
    // });

    // Menggunakan event delegation untuk tombol tambah dan hapus
    // document.querySelector('.foto-lainnya-container').addEventListener('click', function(e) {
    //     if (e.target.classList.contains('tambah-foto')) {
    //         const container = document.querySelector('.foto-lainnya-container');
    //         const newItem = document.createElement('div');
    //         newItem.classList.add('foto-item');
    //         newItem.innerHTML = `
    //             <div style="flex: 1;">
    //                 <label>Judul Foto</label>
    //                 <input type="text" name="judul_foto[]" class="form-control" placeholder="Judul Foto">
    //             </div>
    //             &nbsp;&nbsp;
    //             <div style="flex: 1;">
    //                 <label>Upload Foto</label>
    //                 <input type="file" name="foto_lainnya[]" class="form-control">
    //             </div>
    //             <div class="foto-controls">
    //              <div class="row">
    //                 <button type="button" class="tambah-foto">+</button>
    //                 <button type="button" class="hapus-foto">-</button>
    //             </div>
    //             </div>
    //         `;
    //         container.appendChild(newItem);
    //     }

    //     if (e.target.classList.contains('hapus-foto')) {
    //         e.target.closest('.foto-item').remove();
    //     }
    // });
</script>
