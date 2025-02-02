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

<div id="400" style=" margin-top: 20px; display: none;">

    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_400" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br><span>Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis bangunan.</span>
        <select class="form-control" id="jenis_bangunan_400" name="jenis_bangunan" onchange="handleJenisBangunanChange()">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Umur Ekonomis)'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>
    <div style="margin-top: 20px;">
        <!-- Dropdown tambahan, ditampilkan kondisional -->
        <div id="400 Bangunan Rumah Tinggal" class="form-group" style="display: none;">
            <label for="tipe_rumah_tinggal" style="font-weight: bold;">Tipe Rumah Tinggal (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rumah Tinggal (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="400 Bangunan Rumah Susun" class="form-group" style="display: none;">
            <label for="tipe_rusun" style="font-weight: bold;">Tipe Rusun (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rusun (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="400 Bangunan Pusat Perbelanjaan" class="form-group" style="display: none;">
            <label for="tipe_perbelanjaan" style="font-weight: bold;">Tipe Pusat Perbelanjaan (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Pusat Perbelanjaan (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="400 Bangunan Kantor" class="form-group" style="display: none;">
            <label for="tipe_kantor" style="font-weight: bold;">Tipe Bangunan Kantor (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Kantor (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="400 Bangunan Gedung Pemerintah" class="form-group" style="display: none;">
            <label for="tipe_gedung_pemerintah" style="font-weight: bold;">Tipe Gedung Pemerintah (Umur
                Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Gedung Pemerintah (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="400 Bangunan Hotel/ Motel" class="form-group" style="display: none;">
            <label for="tipe_hotel_motel" style="font-weight: bold;">Tipe Hotel / Motel (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Hotel / Motel (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="400 Bangunan Industri dan Gudang" class="form-group" style="display: none;">
            <label for="tipe_industri_gudang" style="font-weight: bold;">Tipe Bangunan Industri dan Gudang (Umur
                Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Industri dan Gudang (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="400 Bangunan di Kawasan Perkebunan" class="form-group" style="display: none;">
            <label for="tipe_perkebunan" style="font-weight: bold;">Tipe Bangunan Perkebunan (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Perkebunan (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <script>
        function handleJenisBangunanChange() {
            const jenisBangunan = document.getElementById("jenis_bangunan_400").value;

            // Sembunyikan semua dropdown tambahan
            const dropdowns = document.querySelectorAll("[id^='400 Bangunan']");
            dropdowns.forEach(dropdown => dropdown.style.display = "none");

            // Reset all additional dropdown values to null
            const selectElements = document.querySelectorAll("[id^='Bangunan'] select");
            selectElements.forEach(select => {
                select.value = "";
            });

            // Tampilkan dropdown sesuai pilihan
            if (jenisBangunan) {
                const selectedDropdown = document.getElementById(jenisBangunan);
                if (selectedDropdown) {
                    selectedDropdown.style.display = "block";
                }
            }
        }
    </script>

    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_indek_lantai_400" style="font-weight: bold;">Jenis Bangunan (Indeks lantai)</label>
        <select class="form-control" id="jenis_bangunan_indek_lantai_400" name="jenis_bangunan_indek_lantai"
            onchange="handleJenisBangunanIndekLantaiChange()">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Indeks Lantai)'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>


    <div class="form-group" id="RumahTinggal400Sederhana" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_rumah_tinggal_sederhana">Jumlah Lantai Rumah Tinggal Sederhana</label>
        <select class="form-control" id="jumlah_lantai_rumah_tinggal_sederhana" name="jumlah_lantai_rumah_tinggal[]">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Sederhana'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group" id="RumahTinggal400Menengah" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_rumah_tinggal_menengah">Jumlah Lantai Rumah Tinggal Menengah</label>
        <select class="form-control" id="jumlah_lantai_rumah_tinggal_menengah" name="jumlah_lantai_rumah_tinggal[]">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Menengah'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group" id="RumahTinggal400Mewah" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_rumah_tinggal_mewah">Jumlah Lantai Rumah Tinggal Mewah</label>
        <select class="form-control" id="jumlah_lantai_rumah_tinggal" name="jumlah_lantai_rumah_tinggal[]">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Mewah'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group" id="GedungLowRise" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_gedung_low_rise">Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5
            Lantai)</label>
        <select class="form-control" id="jumlah_lantai_gedung_low_rise" name="jumlah_lantai_rumah_tinggal[]">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group" id="GedungMidRise" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_gedung_mid_rise">Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9
            Lantai)</label>
        <select class="form-control" id="jumlah_lantai_gedung_mid_rise" name="jumlah_lantai_rumah_tinggal[]">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group" id="GedungHighRise" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_gedung_high_rise">Jumlah Lantai Bangunan Gedung Bertingkat High Rise (>8
            Lantai)</label>
        <select class="form-control" id="jumlah_lantai_gedung_high_rise" name="jumlah_lantai_rumah_tinggal[]">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jumlah Lantai Bangunan Gedung Bertingkat High Rise (>8 Lantai)'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>


    <script>
        function handleJenisBangunanIndekLantaiChange() {
            const selectElement = document.getElementById("jenis_bangunan_indek_lantai_400");
            const selectedValue = selectElement.value;
            console.log(selectedValue);

            // Reset all dropdowns
            const dropdowns = document.querySelectorAll("[id^='RumahTinggal400'], [id^='Gedung']");
            dropdowns.forEach(dropdown => {
                dropdown.style.display = "none";
                // Reset all select values inside the hidden divs
                const selects = dropdown.querySelectorAll("select");
                selects.forEach(select => select.value = ""); // Reset to null or empty
            });

            // Find the selected option and get its data-id
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const selectedDataId = selectedOption ? selectedOption.getAttribute("data-id") : null;

            // Show the corresponding div based on data-id
            if (selectedDataId) {
                const selectedDropdown = document.getElementById(selectedDataId);
                if (selectedDropdown) {
                    selectedDropdown.style.display = "block";
                }
            }
        }
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
        <label><input type="checkbox" name="keterangan" value="keterangan_pendamping_lokasi"> Keterangan pendamping
            lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan" value="pengamatan_visual"> Pengamatan visual</label><br>
        <label><input type="checkbox" name="keterangan" value="keterangan_lingkungan"> Keterangan
            lingkungan</label><br>
    </div>

    <div class="form-group mb-3 " style="margin-top: 20px">
        <label for="jenis_renovasi"><b>Jenis Renovasi</b></label>
        <input type="text" id="jenis_renovasi" name="jenis_renovasi" class="form-control">
    </div>
    <div class="form-group mb-3" style=" margin-top: 20px">
        <label for="bobot_renovasi"><b>Bobot Renovasi (%)</b></label>
        <input type="number" id="bobot_renovasi" name="bobot_renovasi" class="form-control" min="0"
            max="100" step="0.01">
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
            placeholder="Enter Area" min="0" step="0.01">
    </div>

    <!-- Field Baru: Luas Bangunan menurut IMB (m²) -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="luas_bangunan_imb" style="font-weight: bold;">Luas Bangunan menurut IMB
            (m²)</label>
        <input type="number" class="form-control" id="luas_bangunan_imb" name="luas_bangunan_imb"
            placeholder="Enter Area" min="0" step="0.01">
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Pintu dan Jendela</b></label><br>
        <div class="area-lainnya-container-400" data-type="pintu-jendela-400">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_pintu_jendela[]" class="form-control" placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_pintu_jendela[]" class="form-control" placeholder="Luas (m²)"
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
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pintu-jendela-400">Tambah
            Area</button>
    </div>
    <!-- Luas Dinding -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Dinding</b></label><br>
        <small class="form-text text-muted">Masukkan luas dinding kotor belum dikurangi luas pintu dan
            jendela.</small>
        <div class="area-lainnya-container-400" data-type="dinding-400">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_dinding-400[]" class="form-control" placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_dinding-400[]" class="form-control" placeholder="Luas (m²)"
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
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="dinding-400">Tambah
            Area</button>
    </div>
    <!-- Luas Rangka Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Rangka Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas rangka atap datar.</small>
        <div class="area-lainnya-container-400" data-type="atap-datar-400">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_atap_datar-400[]" class="form-control" placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_atap_datar-400[]" class="form-control" placeholder="Luas (m²)"
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
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar-400">Tambah
            Area</button>
    </div>

    <!-- Luas Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas atap datar.</small>
        <div class="area-lainnya-container-400" data-type="atap-datar-400-2">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_atap_datar-400_2[]" class="form-control"
                        placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_atap_datar-400_2[]" class="form-control"
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
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar-400-2">Tambah
            Area</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Pondasi Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Rollag Bata" id="pondasi_batu_kali_400"
                    onchange="toggleBobotInput(this, 'bobot_pondasi_rollag_bata-400')">
                <label class="form-check-label" for="pondasi_batu_kali">Rollag Bata</label>
            </div>
        </div>
        <div id="bobot_pondasi_rollag_bata-400" style="display: none; margin-top: 10px;">
            <label for="bobot_batu_kali_400">Bobot Pondasi Rollag Bata (dalam persen %)</label>
            <input type="number" class="form-control" id="bobot_batu_kali_400" name="bobot_batu_kali_400"
                placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
        <div id="pondasi-container-400" style="display: none;">
            <div class="area-lainnya-container-400" data-type="pondasi_400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_pondasi_400[]" class="form-control">
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Pondasi Eksisting'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_pondasi_400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pondasi_400">Tambah
                Tipe Pondasi Existing</button>

        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-pondasi-400-btn">Tambah
            Tipe Pondasi Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Struktur Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu" id="struktur_beton_bertulang_400"
                    onchange="toggleBobotInput(this, 'bobot_struktur_kayu_400')">
                <label class="form-check-label" for="struktur_beton_bertulang_400">Kayu</label>
            </div>
        </div>
        <div id="bobot_struktur_kayu_400" style="display: none; margin-top: 10px;">
            <label for="bobot_kayu">Bobot Struktur Kayu (dalam persen %)</label>
            <input type="number" class="form-control" id="bobot_kayu" name="bobot_kayu"
                placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
        <div id="struktur-container-400" style="display: none;">
            <div class="area-lainnya-container-400" data-type="struktur_400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_struktur_400[]" class="form-control">
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Struktur Eksisting'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_struktur_400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
                    </div>
                    <div class="area-controls">
                        <div class="row">
                            <button type="button" class="add-area-btn">+</button>
                            <button type="button" class="remove-area-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="struktur_400">Tambah
                Tipe Struktur Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn-400">Tambah Tipe
            Struktur Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</b></label>
        <div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)"
                    id="atap_kayu_asbes_400">
                <label class="form-check-label" for="atap_kayu_asbes_400">Kayu (Atap Asbes, Seng dll, Tanpa
                    Reng)</label>
            </div>
        </div>
    </div>

    <!-- Content sections for each option -->


    <div id="content-atap_kayu_asbes_400" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Existing</b></label><br>
        <div id="rangka-atap-container-400" style="display: none;">
            <div class="area-lainnya-container-400" data-type="rangka-atap-400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_rangka_atap_400[]" class="form-control">
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tipe Rangka Atap Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_rangka_atap_400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
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
                data-type="rangka-atap-400">Tambah Tipe Rangka Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-400-btn">Tambah Tipe
            Rangka Atap Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Penutup Atap Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</strong></label><br>

        <input type="checkbox" id="asbes-400" name="tipe_atap" value="Asbes" class="form-check-input">
        <label for="asbes-400" class="form-check-label">Asbes</label><br>

        <input type="checkbox" id="seng-gelombang-400" name="tipe_atap" value="Seng Gelombang"
            class="form-check-input">
        <label for="seng-gelombang-400" class="form-check-label">Seng Gelombang</label><br>
    </div>



    <!-- Content sections for each option -->
    <div id="content-asbes-400" class="content" style="display: none;">
        <label><b>Bobot Asbes</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-seng-gelombang-400" class="content" style="display: none;">
        <label><b>Bobot Seng Gelombang</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>






    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
        <div id="penutup-atap-existing-400-container" style="display: none;">
            <div class="area-lainnya-container-400" data-type="penutup-atap-existing-400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_penutup-atap-existing-400[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_penutup-atap-existing-400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
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
                data-type="penutup-atap-existing-400">Tambah Tipe Penutup Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-penutup-atap-existing-400-btn">Tambah
            Tipe
            Penutup Atap Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Plafon Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</strong></label><br>

        <input type="checkbox" id="triplek-plafon-400" name="tipe_atap" value="Triplek" class="form-check-input">
        <label for="triplek-plafon-400" class="form-check-label">Triplek</label><br>
    </div>


    <!-- Content sections for each option -->

    <div id="content-triplek-plafon-400" class="content" style="display: none;">
        <label><b>Bobot Triplek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Plafon Existing</b></label><br>
        <div id="plafon-existing-400-container" style="display: none;">
            <div class="area-lainnya-container-400" data-type="plafon-existing-400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_plafon-existing-400[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Plafon Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_plafon-existing-400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
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
                data-type="plafon-existing-400">Tambah Plafon Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-plafon-existing-400-btn">Tambah Plafon
            Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Dinding Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</strong></label><br>

        <input type="checkbox" id="papan-partisi-triplek-dicat-dinding-400" name="tipe_dinding"
            value="Papan dan Partisi Triplek Dicat" class="form-check-input">
        <label for="papan-partisi-triplek-dicat-dinding-400" class="form-check-label">Papan dan Partisi Triplek
            Dicat</label><br>
    </div>
    <div id="content-papan-partisi-triplek-dicat-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Papan dan Partisi Triplek Dicat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Dinding Existing</b></label><br>
        <div id="dinding-existing-400-container" style="display: none;">
            <div class="area-lainnya-container-400" data-type="dinding-existing-400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_dinding-existing-400[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Dinding Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_dinding-existing-400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
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
                data-type="dinding-existing-400">Tambah Tipe Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-dinding-existing-400-btn">Tambah Tipe
            Dinding Existing</button>
    </div>



    <!-- Content sections for each option -->
    <div id="content-cat-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-keramik-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-marmer-lokal-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Marmer Lokal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-marmer-import-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Marmer Import</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-granit-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-wallpaper-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-mozaik-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-batu-alam-dinding-400" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
        <div id="tipe-pelapis-dinding-existing-400-container" style="display: none;">
            <div class="area-lainnya-container-400" data-type="tipe-pelapis-dinding-existing-400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-pelapis-dinding-existing-400[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pelapis Dinding Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-pelapis-dinding-existing-400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
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
                data-type="tipe-pelapis-dinding-existing-400">Tambah Tipe Pelapis Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pelapis-dinding-existing-400-btn">Tambah
            Tipe Pelapis Dinding Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pintu & Jendela Eksisting - Bangunan Perkebunan (Semi Permanen) 1
                Lantai</strong></label><br>

        <input type="checkbox" id="pintu-kayu-dobel-400" name="tipe_pintu_jendela"
            value="Pintu Kayu Dobel Triplek/HPL" class="form-check-input">
        <label for="pintu-kayu-dobel-400" class="form-check-label">Pintu Kayu Dobel Triplek/HPL</label><br>


        <input type="checkbox" id="jendela-kaca-kayu-400" name="tipe_pintu_jendela" value="Jendela Kaca Rk Kayu"
            class="form-check-input">
        <label for="jendela-kaca-kayu-400" class="form-check-label">Jendela Kaca Rk Kayu</label><br>

    </div>


    <div id="content-pintu-kayu-dobel-400" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Dobel Triplek/HPL</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-jendela-kaca-kayu-400" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
        <div id="tipe-pintu-jendela-existing-400-container" style="display: none;">
            <div class="area-lainnya-container-400" data-type="tipe-pintu-jendela-existing-400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-pintu-jendela-existing-400[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pintu & Jendela Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-pintu-jendela-existing-400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
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
                data-type="tipe-pintu-jendela-existing-400">Tambah Tipe Pintu & Jendela Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pintu-jendela-existing-400-btn">Tambah
            Tipe Pintu & Jendela Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Lantai Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</strong></label><br>

        <input type="checkbox" id="keramik-400" class="form-check-input">
        <label for="keramik" class="form-check-label">Keramik</label><br>
        <input type="checkbox" id="rabat-beton-400" class="form-check-input">
        <label for="rabat-beton" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>
        <input type="checkbox" id="papan-kayu-400" class="form-check-input">
        <label for="vynil" class="form-check-label">Papan Kayu</label><br>
    </div>
    <!-- Content sections for each option -->

    <div id="content-keramik-400" class="content" style="display: none;">
        <label><b>Bobot Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-rabat-beton-400" class="content" style="display: none;">
        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-papan-kayu-400" class="content" style="display: none;">
        <label><b>Bobot Papan Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Lantai Existing</b></label><br>
        <div id="tipe-lantai-existing-400-container" style="display: none;">
            <div class="area-lainnya-container-400" data-type="tipe-lantai-existing-400">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-lantai-existing-400[]" class="form-control">
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Lantai Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-lantai-existing-400[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01">
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
                data-type="tipe-lantai-existing-400">Tambah Tipe Lantai Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-lantai-existing-400-btn">Tambah Tipe
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
            if (type === 'pondasi_400') {
                nameTipe = 'tipe_pondasi_400[]';
                nameBobot = 'bobot_pondasi_400[]';

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
            <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
            if (type === 'struktur_400') {
                nameTipe = 'tipe_struktur_400[]';
                nameBobot = 'bobot_struktur_400[]';

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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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

            if (type === 'rangka-atap-400') {
                nameTipe = 'tipe_rangka_atap_400[]';
                nameBobot = 'bobot_rangka_atap_400[]';

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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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

            if (type === 'penutup-atap-existing-400') {
                nameTipe = 'tipe_penutup-atap-existing-400[]';
                nameBobot = 'bobot_penutup-atap-existing-400[]';

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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
            if (type === 'plafon-existing-400') {
                nameTipe = 'tipe_plafon-existing-400[]';
                nameBobot = 'bobot_plafon-existing-400[]';

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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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

            if (type === 'dinding-existing-400') {
                nameTipe = 'tipe_dinding-existing-400[]';
                nameBobot = 'bobot_dinding-existing-400[]';

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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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

            if (type === 'tipe-pelapis-dinding-existing-400') {
                nameTipe = 'tipe_tipe-pelapis-dinding-existing-400[]';
                nameBobot = 'bobot_tipe-pelapis-dinding-existing-400[]';

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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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

            if (type === 'tipe-pintu-jendela-existing-400') {
                nameTipe = 'tipe_tipe-pintu-jendela-existing-400[]';
                nameBobot = 'bobot_tipe-pintu-jendela-existing-400[]';

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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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

            if (type === 'tipe-lantai-existing-400') {
                nameTipe = 'tipe_tipe-lantai-existing-400[]';
                nameBobot = 'bobot_tipe-lantai-existing-400[]';

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
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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

            if (type === 'pintu-jendela-400') {
                nameNama = 'nama_pintu_jendela[]';
                nameLuas = 'luas_pintu_jendela[]';
            } else if (type === 'dinding') {
                nameNama = 'nama_dinding-400[]';
                nameLuas = 'luas_dinding-400[]';
            } else if (type === 'atap-datar-400') {
                nameNama = 'nama_atap_datar-400[]';
                nameLuas = 'luas_atap_datar-400[]';
            } else if (type === 'atap-datar-400-2') {
                nameNama = 'nama_atap_datar-400_2[]';
                nameLuas = 'luas_atap_datar-400_2[]';
            }

            areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Nama Area</label>
            <input type="text" name="${nameNama}" class="form-control" placeholder="Nama Area" >
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Luas (m²)</label>
            <input type="number" name="${nameLuas}" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" >
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
                    `.area-lainnya-container-400[data-type="${type}"]`);
                const newAreaItem = createAreaItem(type);
                areaContainer.appendChild(newAreaItem);
            });
        });


        // Event delegation untuk tombol add dan remove dalam masing-masing container
        document.querySelectorAll('.area-lainnya-container-400').forEach(function(container) {
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
        const pondasiContainer = document.getElementById('pondasi-container-400');
        const showPondasiBtn = document.getElementById('show-pondasi-400-btn');
        const addPondasiBtn = document.querySelector('.add-area-link[data-type="pondasi_400"]');

        // Awal hanya tombol show yang terlihat
        addPondasiBtn.style.display = 'none';

        showPondasiBtn.addEventListener('click', function() {
            console.log('asd');

            pondasiContainer.style.display = 'block'; // Tampilkan container
            showPondasiBtn.remove();
            addPondasiBtn.style.display = 'inline-block'; // Tampilkan tombol "Tambah Area"
        });

        addPondasiBtn.addEventListener('click', function() {
            // Logika menambahkan area pondasi sudah ditangani di kode lain
            console.log('Area baru untuk pondasi ditambahkan');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const strukturContainer = document.getElementById('struktur-container-400');
        const showStrukturBtn = document.getElementById('show-struktur-btn-400');
        const addStrukturBtn = document.querySelector('.add-area-link[data-type="struktur_400"]');

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
        const rangkaAtapContainer = document.getElementById('rangka-atap-container-400');
        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-400-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="rangka-atap-400"]');

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
        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-400-container');
        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-400-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="penutup-atap-existing-400"]');

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
        const rangkaAtapContainer = document.getElementById('plafon-existing-400-container');
        const showRangkaAtapBtn = document.getElementById('show-plafon-existing-400-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="plafon-existing-400"]');

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
        const rangkaAtapContainer = document.getElementById('dinding-existing-400-container');
        const showRangkaAtapBtn = document.getElementById('show-dinding-existing-400-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="dinding-existing-400"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-400-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-400-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pelapis-dinding-existing-400"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-400-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-400-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pintu-jendela-existing-400"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-400-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-400-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-lantai-existing-400"]');

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
