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

<div id="300" style=" margin-top: 20px; display: none;">

    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_300" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br><span>Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis bangunan.</span>
        <select class="form-control" id="jenis_bangunan_300" name="jenis_bangunan" onchange="handleJenisBangunanChange()">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Umur Ekonomis)'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-top: 20px;">
        <!-- Dropdown tambahan, ditampilkan kondisional -->
        <div id="Bangunan Rumah Tinggal" class="form-group" style="display: none;">
            <label for="tipe_rumah_tinggal" style="font-weight: bold;">Tipe Rumah Tinggal (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rumah Tinggal (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="Bangunan Rumah Susun" class="form-group" style="display: none;">
            <label for="tipe_rusun" style="font-weight: bold;">Tipe Rusun (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rusun (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="Bangunan Pusat Perbelanjaan" class="form-group" style="display: none;">
            <label for="tipe_perbelanjaan" style="font-weight: bold;">Tipe Pusat Perbelanjaan (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Pusat Perbelanjaan (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="Bangunan Kantor" class="form-group" style="display: none;">
            <label for="tipe_kantor" style="font-weight: bold;">Tipe Bangunan Kantor (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Bangunan Kantor (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="Bangunan Gedung Pemerintah" class="form-group" style="display: none;">
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

        <div id="Bangunan Hotel/ Motel" class="form-group" style="display: none;">
            <label for="tipe_hotel_motel" style="font-weight: bold;">Tipe Hotel / Motel (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Hotel / Motel (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <div id="Bangunan Industri dan Gudang" class="form-group" style="display: none;">
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

        <div id="Bangunan di Kawasan Perkebunan" class="form-group" style="display: none;">
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
            const jenisBangunan = document.getElementById("jenis_bangunan_300").value;

            // Sembunyikan semua dropdown tambahan
            const dropdowns = document.querySelectorAll("[id^='Bangunan']");
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
        <label for="jenis_bangunan_indek_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks lantai)</label>
        <select class="form-control" id="jenis_bangunan_indek_lantai" name="jenis_bangunan_indek_lantai"
            onchange="handleJenisBangunanIndekLantaiChange()">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Indeks Lantai)'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>


    <div class="form-group" id="RumahTinggalSederhana" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_rumah_tinggal_sederhana">Jumlah Lantai Rumah Tinggal Sederhana</label>
        <select class="form-control" id="jumlah_lantai_rumah_tinggal_sederhana" name="jumlah_lantai_rumah_tinggal[]">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Sederhana'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group" id="RumahTinggalMenengah" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_rumah_tinggal_menengah">Jumlah Lantai Rumah Tinggal Menengah</label>
        <select class="form-control" id="jumlah_lantai_rumah_tinggal_menengah" name="jumlah_lantai_rumah_tinggal[]">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jumlah Lantai Rumah Tinggal Menengah'] as $item)
                <option value="{{ $item->label_value }}" data-id="{{ $item->label_id }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group" id="RumahTinggalMewah" style="display: none; margin-top: 20px;">
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
            const selectElement = document.getElementById("jenis_bangunan_indek_lantai");
            const selectedValue = selectElement.value;
            console.log(selectedValue);

            // Reset all dropdowns
            const dropdowns = document.querySelectorAll("[id^='RumahTinggal'], [id^='Gedung']");
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
        <select class="form-control" id="tahun_dibangun_800" name="tahun_dibangun"
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
        <label><input type="checkbox" name="keterangan_tahun_dibangaun[]" value="Keterangan pendamping lokasi">
            Keterangan pendamping
            lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan_tahun_dibangaun[]" value="IMB"> IMB</label><br>
        <label><input type="checkbox" name="keterangan_tahun_dibangaun[]" value="Pengamatan visual"> Pengamatan
            visual</label><br>
        <label><input type="checkbox" name="keterangan_tahun_dibangaun[]" value="Keterangan lingkungan"> Keterangan
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
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="Keterangan pendamping lokasi">
            Keterangan pendamping
            lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="IMB"> IMB</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="Pengamatan visual"> Pengamatan
            visual</label><br>
        <label><input type="checkbox" name="keterangan_tahun_direnovasi[]" value="Keterangan lingkungan"> Keterangan
            lingkungan</label><br>
    </div>


    <div class="form-group mb-3 " style="margin-top: 20px">
        <label for="jenis_renovasi"><b>Jenis Renovasi</b></label>
        <input type="text" id="jenis_renovasi" name="jenis_renovasi" class="form-control">
    </div>
    <div class="form-group mb-3" style=" margin-top: 20px">
        <label for="bobot_renovasi"><b>Bobot Renovasi (%)</b></label>
        <input type="text" id="bobot_renovasi" name="bobot_renovasi" class="form-control" min="0"
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
        <input type="text" class="form-control" id="luas_bangunan_terpotong" name="luas_bangunan_terpotong"
            placeholder="Enter Area">
    </div>

    <!-- Field Baru: Luas Bangunan menurut IMB (m²) -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="luas_bangunan_imb" style="font-weight: bold;">Luas Bangunan menurut IMB
            (m²)</label>
        <input type="text" class="form-control" id="luas_bangunan_imb" name="luas_bangunan_imb"
            placeholder="Enter Area">
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Pintu dan Jendela</b></label><br>
        <div class="area-lainnya-container-300" data-type="pintu-jendela">
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
        <div class="area-lainnya-container-300" data-type="dinding">
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
        <div class="area-lainnya-container-300" data-type="rangka-atap-datar">
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
        <div class="area-lainnya-container-300" data-type="atap-datar">
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
        <label><b>Tipe Pondasi Eksisting - Rumah Tinggal Mewah 2 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tapak Beton dan Batu Kali"
                    id="pondasi_batu_kali" name="tipe_pondasi_existing[]"
                    onchange="toggleBobotInput(this, 'content-pondasi_batu_kali-300')">
                <label class="form-check-label" for="pondasi_batu_kali">Tapak Beton dan Batu Kali</label>
            </div>
        </div>
        <div id="content-pondasi_batu_kali-300" style="display: none; margin-top: 10px;">
            <label for="bobot_batu_kali_300">Bobot Pondasi Tapak Beton dan Batu Kali(dalam persen %)</label>
            <input type="text" class="form-control" id="content-pondasi_batu_kali"
                name="bobot_tipe_pondasi_existing[]" placeholder="Masukkan bobot dalam persen">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
        <div id="pondasi-container-300" style="display: none;">
            <div class="area-lainnya-container-300" data-type="pondasi_300">
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pondasi_300">Tambah
                Tipe Pondasi Existing</button>

        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-pondasi-300-btn">Tambah
            Tipe Pondasi Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Struktur Eksisting - Rumah Tinggal Mewah 2 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Beton Bertulang"
                    id="struktur_beton_bertulang_300" name="tipe_struktur_existing"
                    onchange="toggleBobotInput(this, 'bobot_struktur_beton_bertulang_300')">
                <label class="form-check-label" for="struktur_beton_bertulang_300">Beton
                    Bertulang</label>
            </div>
        </div>
        <div id="bobot_struktur_beton_bertulang_300" style="display: none; margin-top: 10px;">
            <label for="bobot_beton_bertulang">Bobot Struktur Beton Bertulang (dalam persen %)</label>
            <input type="text" class="form-control" id="bobot_beton_bertulang" name="bobot_beton_bertulang"
                placeholder="Masukkan bobot dalam persen">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
        <div id="struktur-container-300" style="display: none;">
            <div class="area-lainnya-container-300" data-type="struktur_300">
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
            <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="struktur_300">Tambah
                Tipe Struktur Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn-300">Tambah Tipe
            Struktur Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Eksisting - Rumah Tinggal Mewah 2 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Dak Beton (Jika Pakai Balok)"
                    id="atap_dak_beton_300" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_dak_beton_300">Dak Beton (Jika Pakai Balok)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Genteng)"
                    id="atap_kayu_genteng_300" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_kayu_genteng_300">Kayu (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)"
                    id="atap_kayu_asbes_300" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_kayu_asbes_300">Kayu (Atap Asbes, Seng dll, Tanpa
                    Reng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Genteng)"
                    id="atap_baja_genteng_300" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_baja_genteng_300">Baja Ringan (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Asbes, Seng dll)"
                    id="atap_baja_asbes_300" name="tipe_rangka_atap_existing[]">
                <label class="form-check-label" for="atap_baja_asbes_300">Baja Ringan (Atap Asbes, Seng dll)</label>
            </div>
        </div>
    </div>

    <!-- Content sections for each option -->
    <div id="content-atap_dak_beton_300" class="content" style="display: none;">
        <label><b>Bobot Dak Beton (Jika Pakai Balok)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>
    <div id="content-atap_kayu_genteng_300" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>

    <div id="content-atap_kayu_asbes_300" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>

    <div id="content-atap_baja_genteng_300" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>

    <div id="content-atap_baja_asbes_300" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Asbes, Seng dll)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_rangka_atap_existing[]">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Existing</b></label><br>
        <div id="rangka-atap-container-300" style="display: none;">
            <div class="area-lainnya-container-300" data-type="rangka-atap-300">
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
                data-type="rangka-atap-300">Tambah Tipe Rangka Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-300-btn">Tambah Tipe
            Rangka Atap Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>
        <input type="checkbox" id="dak-beton-300" name="tipe_atap" value="Dak Beton" class="form-check-input">
        <label for="dak-beton-300" class="form-check-label">Dak Beton</label><br>

        <input type="checkbox" id="fibreglass-300" name="tipe_atap" value="Fibreglass" class="form-check-input">
        <label for="fibreglass-300" class="form-check-label">Fibreglass</label><br>

        <input type="checkbox" id="genteng-keramik-glazur-300" name="tipe_atap" value="Genteng Keramik Glazur"
            class="form-check-input">
        <label for="genteng-keramik-glazur-300" class="form-check-label">Genteng Keramik Glazur</label><br>

        <input type="checkbox" id="genteng-tanah-liat-300" name="tipe_atap" value="Genteng Tanah Liat"
            class="form-check-input">
        <label for="genteng-tanah-liat-300" class="form-check-label">Genteng Tanah Liat</label><br>

        <input type="checkbox" id="genteng-beton-300" name="tipe_atap" value="Genteng Beton"
            class="form-check-input">
        <label for="genteng-beton-300" class="form-check-label">Genteng Beton</label><br>

        <input type="checkbox" id="genteng-metal-300" name="tipe_atap" value="Genteng Metal"
            class="form-check-input">
        <label for="genteng-metal-300" class="form-check-label">Genteng Metal</label><br>

        <input type="checkbox" id="bitumen-300" name="tipe_atap" value="Bitumen (Ondulin/Onduvilla)"
            class="form-check-input">
        <label for="bitumen-300" class="form-check-label">Bitumen (Ondulin/Onduvilla)</label><br>

        <input type="checkbox" id="tegola-300" name="tipe_atap" value="Tegola" class="form-check-input">
        <label for="tegola-300" class="form-check-label">Tegola</label><br>

        <input type="checkbox" id="sirap-300" name="tipe_atap" value="Sirap" class="form-check-input">
        <label for="sirap-300" class="form-check-label">Sirap</label><br>

        <input type="checkbox" id="spandek-300" name="tipe_atap" value="Spandek" class="form-check-input">
        <label for="spandek-300" class="form-check-label">Spandek</label><br>

        <input type="checkbox" id="pvc-300" name="tipe_atap" value="PVC" class="form-check-input">
        <label for="pvc-300" class="form-check-label">PVC</label><br>
    </div>



    <!-- Content sections for each option -->
    <div id="content-dak-beton-300" class="content" style="display: none;">
        <label><b>Bobot Dak Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-fibreglass-300" class="content" style="display: none;">
        <label><b>Bobot Fibreglass</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-genteng-keramik-glazur-300" class="content" style="display: none;">
        <label><b>Bobot Genteng Keramik Glazur</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-genteng-tanah-liat-300" class="content" style="display: none;">
        <label><b>Bobot Genteng Tanah Liat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-genteng-beton-300" class="content" style="display: none;">
        <label><b>Bobot Genteng Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-genteng-metal-300" class="content" style="display: none;">
        <label><b>Bobot Genteng Metal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-bitumen-300" class="content" style="display: none;">
        <label><b>Bobot Bitumen (Ondulin/Onduvilla)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-tegola-300" class="content" style="display: none;">
        <label><b>Bobot Tegola</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-sirap-300" class="content" style="display: none;">
        <label><b>Bobot Sirap</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-spandek-300" class="content" style="display: none;">
        <label><b>Bobot Spandek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>
    <div id="content-pvc-300" class="content" style="display: none;">
        <label><b>Bobot PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
        <div id="penutup-atap-existing-300-container" style="display: none;">
            <div class="area-lainnya-container-300" data-type="penutup-atap-existing-300">
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
                data-type="penutup-atap-existing-300">Tambah Tipe Penutup Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-penutup-atap-existing-300-btn">Tambah
            Tipe
            Penutup Atap Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Plafon Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>
        <input type="checkbox" id="akustik-plafon-300" name="tipe_plafon_existing[]" value="Akustik"
            class="form-check-input">
        <label for="akustik-plafon-300" class="form-check-label">Akustik</label><br>

        <input type="checkbox" id="beton-ekspose-plafon-300" name="tipe_plafon_existing[]" value="Beton Ekspose"
            class="form-check-input">
        <label for="beton-ekspose-plafon-300" class="form-check-label">Beton Ekspose</label><br>

        <input type="checkbox" id="grc-plafon-300" name="tipe_plafon_existing[]" value="GRC"
            class="form-check-input">
        <label for="grc-plafon-300" class="form-check-label">GRC</label><br>

        <input type="checkbox" id="gypsum-plafon-300" name="tipe_plafon_existing[]" value="Gypsum"
            class="form-check-input">
        <label for="gypsum-plafon-300" class="form-check-label">Gypsum</label><br>

        <input type="checkbox" id="lambresering-plafon-300" name="tipe_plafon_existing[]" value="Lambresering"
            class="form-check-input">
        <label for="lambresering-plafon-300" class="form-check-label">Lambresering</label><br>

        <input type="checkbox" id="triplek-plafon-300" name="tipe_plafon_existing[]" value="Triplek"
            class="form-check-input">
        <label for="triplek-plafon-300" class="form-check-label">Triplek</label><br>

        <input type="checkbox" id="pvc-plafon-300" name="tipe_plafon_existing[]" value="PVC (Shunda Plafon dll)"
            class="form-check-input">
        <label for="pvc-plafon-300" class="form-check-label">PVC (Shunda Plafon dll)</label><br>
    </div>


    <!-- Content sections for each option -->
    <div id="content-akustik-plafon-300" class="content" style="display: none;">
        <label><b>Bobot Akustik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-beton-ekspose-plafon-300" class="content" style="display: none;">
        <label><b>Bobot Beton Ekspose</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-grc-plafon-300" class="content" style="display: none;">
        <label><b>Bobot GRC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-gypsum-plafon-300" class="content" style="display: none;">
        <label><b>Bobot Gypsum</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-lambresering-plafon-300" class="content" style="display: none;">
        <label><b>Bobot Lambresering</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-triplek-plafon-300" class="content" style="display: none;">
        <label><b>Bobot Triplek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>
    <div id="content-pvc-plafon-300" class="content" style="display: none;">
        <label><b>Bobot PVC (Shunda Plafon dll)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai" name="bobot_plafon_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Plafon Existing</b></label><br>
        <div id="plafon-existing-300-container" style="display: none;">
            <div class="area-lainnya-container-300" data-type="plafon-existing-300">
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
                data-type="plafon-existing-300">Tambah Plafon Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-plafon-existing-300-btn">Tambah Plafon
            Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Dinding Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>

        <input type="checkbox" id="bata-merah-dinding-300" name="tipe_tipe_dinding_existing[]" value="Bata Merah"
            class="form-check-input">
        <label for="bata-merah-dinding-300" class="form-check-label">Bata Merah</label><br>

        <input type="checkbox" id="bata-ringan-dinding-300" name="tipe_tipe_dinding_existing[]" value="Bata Ringan"
            class="form-check-input">
        <label for="bata-ringan-dinding-300" class="form-check-label">Bata Ringan</label><br>

        <input type="checkbox" id="partisi-gypsumboard-dinding-300" name="tipe_tipe_dinding_existing[]"
            value="Partisi Gypsumboard 2 Muka" class="form-check-input">
        <label for="partisi-gypsumboard-dinding-300" class="form-check-label">Partisi Gypsumboard 2 Muka</label><br>

        <input type="checkbox" id="rooster-bata-dinding-300" name="tipe_tipe_dinding_existing[]"
            value="Rooster Bata" class="form-check-input">
        <label for="rooster-bata-dinding-300" class="form-check-label">Rooster Bata</label><br>
    </div>
    <div id="content-bata-merah-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Bata Merah</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-bata-ringan-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Bata Ringan</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-partisi-gypsumboard-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Partisi Gypsumboard 2 Muka</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>
    <div id="content-rooster-bata-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Rooster Bata</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_dinding_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Dinding Existing</b></label><br>
        <div id="dinding-existing-300-container" style="display: none;">
            <div class="area-lainnya-container-300" data-type="dinding-existing-300">
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
                data-type="dinding-existing-300">Tambah Tipe Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-dinding-existing-300-btn">Tambah Tipe
            Dinding Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pelapis Dinding Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>

        <input type="checkbox" id="cat-dinding-300" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Cat (Diplester dan Diaci)" class="form-check-input">
        <label for="cat-dinding-300" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>

        <input type="checkbox" id="keramik-dinding-300" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Keramik" class="form-check-input">
        <label for="keramik-dinding-300" class="form-check-label">Dilapis Keramik</label><br>

        <input type="checkbox" id="marmer-lokal-dinding-300" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Marmer Lokal" class="form-check-input">
        <label for="marmer-lokal-dinding-300" class="form-check-label">Dilapis Marmer Lokal</label><br>

        <input type="checkbox" id="marmer-import-dinding-300" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Marmer Import" class="form-check-input">
        <label for="marmer-import-dinding-300" class="form-check-label">Dilapis Marmer Import</label><br>

        <input type="checkbox" id="granit-dinding-300" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Granit/ Homogenous Tile" class="form-check-input">
        <label for="granit-dinding-300" class="form-check-label">Dilapis Granit/ Homogenous Tile</label><br>

        <input type="checkbox" id="wallpaper-dinding-300" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Wallpaper" class="form-check-input">
        <label for="wallpaper-dinding-300" class="form-check-label">Dilapis Wallpaper</label><br>

        <input type="checkbox" id="mozaik-dinding-300" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Mozaik" class="form-check-input">
        <label for="mozaik-dinding-300" class="form-check-label">Dilapis Mozaik</label><br>

        <input type="checkbox" id="batu-alam-dinding-300" name="tipe_tipe_pelapis_dinding_existing[]"
            value="Dilapis Batu Alam" class="form-check-input">
        <label for="batu-alam-dinding-300" class="form-check-label">Dilapis Batu Alam</label><br>
    </div>




    <!-- Content sections for each option -->
    <div id="content-cat-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-keramik-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-marmer-lokal-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Marmer Lokal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-marmer-import-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Marmer Import</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-granit-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-wallpaper-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-mozaik-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div id="content-batu-alam-dinding-300" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pelapis_dinding_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
        <div id="tipe-pelapis-dinding-existing-300-container" style="display: none;">
            <div class="area-lainnya-container-300" data-type="tipe-pelapis-dinding-existing-300">
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
                data-type="tipe-pelapis-dinding-existing-300">Tambah Tipe Pelapis Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pelapis-dinding-existing-300-btn">Tambah
            Tipe Pelapis Dinding Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pintu & Jendela Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>

        <input type="checkbox" id="pintu-kayu-panil-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Kayu Panil" class="form-check-input">
        <label for="pintu-kayu-panil-300" class="form-check-label">Pintu Kayu Panil</label><br>

        <input type="checkbox" id="pintu-kayu-dobel-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Kayu Dobel Triplek/HPL" class="form-check-input">
        <label for="pintu-kayu-dobel-300" class="form-check-label">Pintu Kayu Dobel Triplek/HPL</label><br>

        <input type="checkbox" id="pintu-kaca-aluminium-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Kaca Rk Aluminium" class="form-check-input">
        <label for="pintu-kaca-aluminium-300" class="form-check-label">Pintu Kaca Rk Aluminium</label><br>

        <input type="checkbox" id="jendela-kaca-kayu-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Jendela Kaca Rk Kayu" class="form-check-input">
        <label for="jendela-kaca-kayu-300" class="form-check-label">Jendela Kaca Rk Kayu</label><br>

        <input type="checkbox" id="jendela-kaca-aluminium-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Jendela Kaca Rk Aluminium" class="form-check-input">
        <label for="jendela-kaca-aluminium-300" class="form-check-label">Jendela Kaca Rk Aluminium</label><br>

        <input type="checkbox" id="pintu-km-upvc-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu KM UPVC/PVC" class="form-check-input">
        <label for="pintu-km-upvc-300" class="form-check-label">Pintu KM UPVC/PVC</label><br>

        <input type="checkbox" id="pintu-kaca-tempered-floor-hinge-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Kaca Tempered Floor Hinge" class="form-check-input">
        <label for="pintu-kaca-tempered-floor-hinge-300" class="form-check-label">Pintu Kaca Tempered Floor
            Hinge</label><br>

        <input type="checkbox" id="pintu-garasi-kayu-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Garasi Kayu" class="form-check-input">
        <label for="pintu-garasi-kayu-300" class="form-check-label">Pintu Garasi Kayu</label><br>

        <input type="checkbox" id="pintu-garasi-besi-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Pintu Garasi Besi" class="form-check-input">
        <label for="pintu-garasi-besi-300" class="form-check-label">Pintu Garasi Besi</label><br>

        <input type="checkbox" id="jendela-kaca-stopsol-8mm-curtain-wall-300"
            name="tipe_tipe_pintu_jendela_existing[]" value="Jendela Kaca Stopsol 8 mm Rangka Curtain Wall"
            class="form-check-input">
        <label for="jendela-kaca-stopsol-8mm-curtain-wall-300" class="form-check-label">Jendela Kaca Stopsol 8 mm
            Rangka Curtain Wall</label><br>

        <input type="checkbox" id="jendela-kaca-tempered-frameless-300" name="tipe_tipe_pintu_jendela_existing[]"
            value="Jendela Kaca Tempered Frameless" class="form-check-input">
        <label for="jendela-kaca-tempered-frameless-300" class="form-check-label">Jendela Kaca Tempered
            Frameless</label><br>
    </div>

    <div id="content-pintu-kayu-panil-300" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Panil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-kayu-dobel-300" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Dobel Triplek/HPL</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-kaca-aluminium-300" class="content" style="display: none;">
        <label><b>Bobot Pintu Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-jendela-kaca-kayu-300" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-jendela-kaca-aluminium-300" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-km-upvc-300" class="content" style="display: none;">
        <label><b>Bobot Pintu KM UPVC/PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-kaca-tempered-floor-hinge-300" class="content" style="display: none;">
        <label><b>Bobot Pintu Kaca Tempered Floor Hinge</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-garasi-kayu-300" class="content" style="display: none;">
        <label><b>Bobot Pintu Garasi Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-pintu-garasi-besi-300" class="content" style="display: none;">
        <label><b>Bobot Pintu Garasi Besi</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-jendela-kaca-stopsol-8mm-curtain-wall-300" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Stopsol 8 mm Rangka Curtain Wall</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div id="content-jendela-kaca-tempered-frameless-300" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Tempered Frameless</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_pintu_jendela_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
        <div id="tipe-pintu-jendela-existing-300-container" style="display: none;">
            <div class="area-lainnya-container-300" data-type="tipe-pintu-jendela-existing-300">
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
                data-type="tipe-pintu-jendela-existing-300">Tambah Tipe Pintu & Jendela Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pintu-jendela-existing-300-btn">Tambah
            Tipe Pintu & Jendela Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Lantai Eksisting - Rumah Tinggal Mewah 2 Lantai</strong></label><br>
        <input type="checkbox" id="granit-homogenous-tile-300" class="form-check-input"
            name="tipe_tipe_lantai_existing[]" value="Granit/Homogenous Tile">
        <label for="granit-homogenous-tile" class="form-check-label">Granit/Homogenous Tile</label><br>

        <input type="checkbox" id="granit-impor-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Granit Impor">
        <label for="granit-impor" class="form-check-label">Granit Impor</label><br>

        <input type="checkbox" id="karpet-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Karpet">
        <label for="karpet" class="form-check-label">Karpet</label><br>

        <input type="checkbox" id="keramik-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Keramik">
        <label for="keramik" class="form-check-label">Keramik</label><br>

        <input type="checkbox" id="marmer-lokal-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Marmer Lokal">
        <label for="marmer-lokal" class="form-check-label">Marmer Lokal</label><br>

        <input type="checkbox" id="marmer-impor-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Marmer Impor">
        <label for="marmer-impor" class="form-check-label">Marmer Impor</label><br>

        <input type="checkbox" id="mozaik-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Mozaik">
        <label for="mozaik" class="form-check-label">Mozaik</label><br>

        <input type="checkbox" id="rabat-beton-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Rabat Beton (Semen Ekspose)">
        <label for="rabat-beton" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>

        <input type="checkbox" id="parkit-jati-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Parkit Jati">
        <label for="parkit-jati" class="form-check-label">Parkit Jati</label><br>

        <input type="checkbox" id="teraso-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Teraso">
        <label for="teraso" class="form-check-label">Teraso</label><br>

        <input type="checkbox" id="vynil-300" class="form-check-input" name="tipe_tipe_lantai_existing[]"
            value="Vynil">
        <label for="vynil" class="form-check-label">Vynil</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-granit-homogenous-tile-300" class="content" style="display: none;">
        <label><b>Bobot Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-granit-impor-300" class="content" style="display: none;">
        <label><b>Bobot Granit Impor</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-karpet-300" class="content" style="display: none;">
        <label><b>Bobot Karpet</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-keramik-300" class="content" style="display: none;">
        <label><b>Bobot Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-marmer-lokal-300" class="content" style="display: none;">
        <label><b>Bobot Marmer Lokal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-marmer-impor-300" class="content" style="display: none;">
        <label><b>Bobot Marmer Impor</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-mozaik-300" class="content" style="display: none;">
        <label><b>Bobot Mozaik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-rabat-beton-300" class="content" style="display: none;">
        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-parkit-jati-300" class="content" style="display: none;">
        <label><b>Bobot Parkit Jati</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-teraso-300" class="content" style="display: none;">
        <label><b>Bobot Teraso</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>
    <div id="content-vynil-300" class="content" style="display: none;">
        <label><b>Bobot Vynil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="text" class="form-control" placeholder="Masukkan nilai"
            name="bobot_tipe_lantai_existing[]">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Lantai Existing</b></label><br>
        <div id="tipe-lantai-existing-300-container" style="display: none;">
            <div class="area-lainnya-container-300" data-type="tipe-lantai-existing-300">
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
                data-type="tipe-lantai-existing-300">Tambah Tipe Lantai Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-tipe-lantai-existing-300-btn">Tambah
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
            if (type === 'pondasi_300') {
                nameTipe = 'tipe_pondasi_300[]';
                nameBobot = 'bobot_pondasi_300[]';

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
            if (type === 'struktur_300') {
                nameTipe = 'tipe_struktur_300[]';
                nameBobot = 'bobot_struktur_300[]';

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

            if (type === 'rangka-atap-300') {
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

            if (type === 'penutup-atap-existing-300') {
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
            if (type === 'plafon-existing-300') {
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

            if (type === 'dinding-existing-300') {
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

            if (type === 'tipe-pelapis-dinding-existing-300') {
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

            if (type === 'tipe-pintu-jendela-existing-300') {
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

            if (type === 'tipe-lantai-existing-300') {
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
                    `.area-lainnya-container-300[data-type="${type}"]`);
                const newAreaItem = createAreaItem(type);
                areaContainer.appendChild(newAreaItem);
            });
        });


        // Event delegation untuk tombol add dan remove dalam masing-masing container
        document.querySelectorAll('.area-lainnya-container-300').forEach(function(container) {
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
        const pondasiContainer = document.getElementById('pondasi-container-300');
        const showPondasiBtn = document.getElementById('show-pondasi-300-btn');
        const addPondasiBtn = document.querySelector('.add-area-link[data-type="pondasi_300"]');

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
        const strukturContainer = document.getElementById('struktur-container-300');
        const showStrukturBtn = document.getElementById('show-struktur-btn-300');
        const addStrukturBtn = document.querySelector('.add-area-link[data-type="struktur_300"]');

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
        const rangkaAtapContainer = document.getElementById('rangka-atap-container-300');
        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-300-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="rangka-atap-300"]');

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
        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-300-container');
        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-300-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="penutup-atap-existing-300"]');

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
        const rangkaAtapContainer = document.getElementById('plafon-existing-300-container');
        const showRangkaAtapBtn = document.getElementById('show-plafon-existing-300-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="plafon-existing-300"]');

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
        const rangkaAtapContainer = document.getElementById('dinding-existing-300-container');
        const showRangkaAtapBtn = document.getElementById('show-dinding-existing-300-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="dinding-existing-300"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-300-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-300-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pelapis-dinding-existing-300"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-300-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-300-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pintu-jendela-existing-300"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-300-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-300-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-lantai-existing-300"]');

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
            const contentId = `content-${checkbox.id}`;
            console.log(contentId);
            toggleBobotInput(checkbox, contentId);
        });
    });
</script>
