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

<div id="900" style=" margin-top: 20px; display: none;">
    <div class="form-group" style="margin-top: 20px;">
        <label for="grade_gedung" style="font-weight: bold;">Pilih Grade Mall</label>
        <select class="form-control" id="grade_gedung" name="grade_gedung">
            <option value="" selected>- Select -</option>
            <option value="grade_b" selected="selected" data-i="0">Mall Grade B</option>
            <option value="grade_a">Mall Grade A</option>
        </select>
    </div>

    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_900" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis
            bangunan.</small>
        <select class="form-control" id="jenis_bangunan_900" name="jenis_bangunan_900">
            <option value="" selected>- Select -</option>
            <option value="rumah_tinggal_900">Bangunan Rumah Tinggal</option>
            <option value="rumah_susun_900">Bangunan Rumah Susun</option>
            <option value="pusat_perbelanjaan_900">Bangunan Pusat Perbelanjaan</option>
            <option value="kantor_900">Bangunan Kantor</option>
            <option value="gedung_pemerintah_900">Bangunan Gedung Pemerintah</option>
            <option value="hotel_motel_900">Bangunan Hotel/Motel</option>
            <option value="industri_gudang_900">Bangunan Industri dan Gudang</option>
            <option value="kawasan_perkebunan_900">Bangunan di Kawasan Perkebunan</option>
        </select>
    </div>

    <!-- Jenis Bangunan Detail -->
    <div style="margin-top: 20px;">
        <div id="detail_rumah_tinggal_900" class="bangunan-detail-900" style="display: none;">
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

        <div id="detail_rumah_susun_900" class="bangunan-detail-900" style="display: none;">
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

        <div id="detail_pusat_perbelanjaan_900" class="bangunan-detail-900" style="display: none;">
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

        <div id="detail_kantor_900" class="bangunan-detail-900" style="display: none;">
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

        <div id="detail_gedung_pemerintah_900" class="bangunan-detail-900" style="display: none;">
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

        <div id="detail_hotel_motel_900" class="bangunan-detail-900" style="display: none;">
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

        <div id="detail_industri_gudang_900" class="bangunan-detail-900" style="display: none;">
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

        <div id="detail_kawasan_perkebunan_900" class="bangunan-detail-900" style="display: none;">
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
        document.getElementById('jenis_bangunan_900').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.bangunan-detail-900').forEach(el => el.style.display = 'none');
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
        <label for="jenis_bangunan_indeks_lantai_900" style="font-weight: bold;">Jenis Bangunan (Indeks
            Lantai)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai
            MAPPI.</small>
        <select class="form-control" id="jenis_bangunan_indeks_lantai_900" name="jenis_bangunan_indeks_lantai_900">
            <option value="" selected>- Select -</option>
            <option value="rumah_sederhana_900">Rumah Tinggal Sederhana</option>
            <option value="rumah_menengah_900">Rumah Tinggal Menengah</option>
            <option value="rumah_mewah_900">Rumah Tinggal Mewah</option>
            <option value="gedung_low_900">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)</option>
            <option value="gedung_mid_900">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)</option>
            <option value="gedung_high_900">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai)</option>
        </select>
    </div>

    <!-- Jumlah Lantai sections -->
    <div style="margin-top: 20px;">
        <div id="detail_rumah_sederhana_900" class="lantai-detail-900" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_sederhana_900">Jumlah Lantai Rumah Tinggal Sederhana</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Sederhana'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_menengah_900" class="lantai-detail-900" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_menengah_900">Jumlah Lantai Rumah Tinggal Menengah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Menengah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_rumah_mewah_900" class="lantai-detail-900" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_rumah_mewah_900">Jumlah Lantai Rumah Tinggal Mewah</label>
            <select class="form-control" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Mewah'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_low_900" class="lantai-detail-900" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_low_900">Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_low_900" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_mid_900" class="lantai-detail-900" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_mid_900">Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_mid_900" name="jumlah_lantai_rumah_tinggal[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)'] as $item)
                    <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">
                        {{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="detail_gedung_high_900" class="lantai-detail-900" style="display: none; margin-top: 20px;">
            <label for="jumlah_lantai_gedung_high_900">Jumlah Lantai Bangunan Gedung Bertingkat High Rise (&gt;8
                Lantai)</label>
            <select class="form-control" id="jumlah_lantai_gedung_high_900" name="jumlah_lantai_rumah_tinggal[]">
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
        document.getElementById('jenis_bangunan_indeks_lantai_900').addEventListener('change', function() {
            // Sembunyikan semua detail
            document.querySelectorAll('.lantai-detail-900').forEach(el => el.style.display = 'none');

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
        <label for="tahun_dibangun_900" style="font-weight: bold;">Tahun Dibangun</label>
        <select class="form-control" id="tahun_dibangun_900" name="tahun_dibangun_900"
            onchange="toggleCheckboxes900(this, 'checkboxContainerDibangun900')">
            <script>
                const currentYear900 = new Date().getFullYear();
                const startYear900 = 1900;
                const endYear900 = currentYear900 + 7;
                let options900 = '';

                for (let year = startYear900; year <= endYear900; year++) {
                    const selected = year === currentYear900 ? 'selected' : '';
                    options900 += `<option value="${year}" ${selected}>${year}</option>`;
                }
                document.write(options900);
            </script>
        </select>
    </div>

    <div id="checkboxContainerDibangun900" style="display: none; margin-top: 20px;">
        <label><input type="checkbox" name="keterangan" value="keterangan_pendamping_lokasi"> Keterangan pendamping
            lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan" value="pengamatan_visual"> Pengamatan visual</label><br>
        <label><input type="checkbox" name="keterangan" value="keterangan_lingkungan"> Keterangan
            lingkungan</label><br>
    </div>

    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
        <select class="form-control" id="tahun_renovasi" name="tahun_renovasi"
            onchange="toggleCheckboxes900(this, 'checkboxContainerRenovasi900')">
            <script>
                const startYearRenovasi900 = 1960;
                const endYearRenovasi900 = currentYear + 7;
                let optionsRenovasi900 = '';

                for (let year = startYearRenovasi900; year <= endYearRenovasi900; year++) {
                    const selected = year === currentYear ? 'selected' : '';
                    optionsRenovasi900 += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.write(optionsRenovasi900);
            </script>
        </select>
    </div>

    <div id="checkboxContainerRenovasi900" style="display: none; margin-top: 20px;">
        <label><input type="checkbox" name="keterangan" value="keterangan_pendamping_lokasi"> Keterangan pendamping
            lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan" value="pengamatan_visual"> Pengamatan visual</label><br>
        <label><input type="checkbox" name="keterangan" value="keterangan_lingkungan"> Keterangan
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


    function toggleCheckboxes900(selectElement, targetId) {
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
