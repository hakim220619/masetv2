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

<div id="400" style="margin-top: 20px; display: none;">
    <!-- Jenis Bangunan -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis
            bangunan.</small>
        <select class="form-control" id="jenis_bangunan" name="jenis_bangunan" onchange="handleJenisBangunanChange()">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Umur Ekonomis)'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Jenis Bangunan Detail -->
    <div style="margin-top: 20px;">
        <div id="Bangunan Rumah Tinggal" class="form-group" style="display: none;">
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

        <div id="Bangunan Rumah Susun" class="form-group" style="display: none;">
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

        <div id="Bangunan Pusat Perbelanjaan" class="form-group" style="display: none;">
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

        <div id="Bangunan Kantor" class="form-group" style="display: none;">
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

        <div id="Bangunan Gedung Pemerintah" class="form-group" style="display: none;">
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

        <div id="Bangunan Hotel/ Motel" class="form-group" style="display: none;">
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

        <div id="Bangunan Industri dan Gudang" class="form-group" style="display: none;">
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

        <div id="Bangunan di Kawasan Perkebunan" class="form-group" style="display: none;">
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
        function handleJenisBangunanChange() {
            const jenisBangunan = document.getElementById("jenis_bangunan").value;

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
        <label for="jenis_bangunan_indek_lantai_400" style="font-weight: bold;">Jenis Bangunan (Indeks Lantai)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai MAPPI.</small>
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




    <!-- Tahun Dibangun -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
        <select class="form-control" id="tahun_dibangun" name="tahun_dibangun"
            onchange="toggleCheckboxes400(this, 'checkboxContainerDibangun400')">
            <script>
                const currentYear400 = new Date().getFullYear();
                const startYear400 = 1900;
                const endYear400 = currentYear400 + 7;
                let options400 = '';

                for (let year = startYear400; year <= endYear400; year++) {
                    const selected = year === currentYear400 ? 'selected' : '';
                    options400 += `<option value="${year}" ${selected}>${year}</option>`;
                }
                document.write(options400);
            </script>
        </select>
    </div>

    <div id="checkboxContainerDibangun400" style="display: none; margin-top: 20px;">
        <label><input type="checkbox" name="keterangan" value="keterangan_pendamping_lokasi"> Keterangan pendamping
            lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan" value="pengamatan_visual"> Pengamatan visual</label><br>
        <label><input type="checkbox" name="keterangan" value="keterangan_lingkungan"> Keterangan
            lingkungan</label><br>
    </div>

    <!-- Tahun Renovasi -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
        <select class="form-control" id="tahun_renovasi" name="tahun_renovasi"
            onchange="toggleCheckboxes400(this, 'checkboxContainerRenovasi400')">
            <script>
                const startYearRenovasi400 = 1960;
                const endYearRenovasi400 = currentYear400 + 7;
                let optionsRenovasi400 = '';

                for (let year = startYearRenovasi400; year <= endYearRenovasi400; year++) {
                    const selected = year === currentYear400 ? 'selected' : '';
                    optionsRenovasi400 += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.write(optionsRenovasi400);
            </script>
        </select>
    </div>

    <div id="checkboxContainerRenovasi400" style="display: none; margin-top: 20px;">
        <label><input type="checkbox" name="keterangan" value="keterangan_pendamping_lokasi"> Keterangan pendamping
            lokasi / pemilik</label><br>
        <label><input type="checkbox" name="keterangan" value="imb"> IMB</label><br>
        <label><input type="checkbox" name="keterangan" value="pengamatan_visual"> Pengamatan visual</label><br>
        <label><input type="checkbox" name="keterangan" value="keterangan_lingkungan"> Keterangan
            lingkungan</label><br>
    </div>

    <!-- Jenis & Bobot Renovasi -->
    <div class="form-group mb-3" style="margin-top: 20px">
        <label for="jenis_renovasi"><b>Jenis Renovasi</b></label>
        <input type="text" id="jenis_renovasi" name="jenis_renovasi" class="form-control">
    </div>
    <div class="form-group mb-3" style="margin-top: 20px">
        <label for="bobot_renovasi"><b>Bobot Renovasi (%)</b></label>
        <input type="number" id="bobot_renovasi" name="bobot_renovasi" class="form-control" min="0"
            max="100" step="0.01">
    </div>

    <!-- Luas Area sections -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Dinding</b></label><br>
        <small class="form-text text-muted">Masukkan luas dinding.</small>
        <div class="area-lainnya-container" data-type="dinding">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="luas_nama_dinding[]" class="form-control" placeholder="Nama Area">
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_bobot_dinding[]" class="form-control" placeholder="Luas (m²)"
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
    </div>

    <!-- Tipe Existing sections -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pondasi Eksisting</b></label>
        <div class="area-lainnya-container" data-type="pondasi-existing">
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
                    <input type="number" name="bobot_tipe_pondasi_existing[]" class="form-control"
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
    </div>

    <!-- ... remaining sections following same pattern ... -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk mengecek keberadaan elemen sebelum mengakses
        function initializeContainer(containerId, showBtnId, addBtnSelector) {
            const container = document.getElementById(containerId);
            const showBtn = document.getElementById(showBtnId);
            const addBtn = document.querySelector(addBtnSelector);

            // Hanya jalankan jika semua elemen ditemukan
            if (container && showBtn && addBtn) {
                // Sembunyikan tombol tambah di awal
                addBtn.style.display = 'none';

                showBtn.addEventListener('click', function() {
                    container.style.display = 'block';
                    showBtn.remove();
                    addBtn.style.display = 'inline-block';
                });

                addBtn.addEventListener('click', function() {
                    console.log(`Area baru untuk ${containerId} ditambahkan`);
                });
            }
        }

        // Inisialisasi untuk setiap container
        const containers = [{
                containerId: 'tipe-rangka-atap-400-container',
                showBtnId: 'show-tipe-rangka-atap-400-btn',
                addBtnSelector: '.add-area-link[data-type="tipe-rangka-atap-400"]'
            },
            {
                containerId: 'tipe-pintu-jendela-existing-400-container',
                showBtnId: 'show-tipe-pintu-jendela-existing-400-btn',
                addBtnSelector: '.add-area-link[data-type="tipe-pintu-jendela-existing-400"]'
            },
            {
                containerId: 'tipe-lantai-existing-400-container',
                showBtnId: 'show-tipe-lantai-existing-400-btn',
                addBtnSelector: '.add-area-link[data-type="tipe-lantai-existing-400"]'
            }
        ];

        // Inisialisasi semua container
        containers.forEach(config => {
            initializeContainer(config.containerId, config.showBtnId, config.addBtnSelector);
        });

        // Event listener untuk checkbox
        document.querySelectorAll('.form-check-input').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const contentId = `content-${checkbox.id}`;
                const contentElement = document.getElementById(contentId);

                if (contentElement) {
                    contentElement.style.display = checkbox.checked ? 'block' : 'none';

                    if (!checkbox.checked) {
                        const inputElement = contentElement.querySelector('input[type="text"]');
                        if (inputElement) {
                            inputElement.value = '';
                        }
                    }
                }
            });
        });
    });

    // Fungsi untuk toggle checkbox
    function toggleCheckboxes400(selectElement, targetId) {
        const checkboxContainer = document.getElementById(targetId);
        if (checkboxContainer) {
            checkboxContainer.style.display = selectElement.value ? 'block' : 'none';
        }
    }

    // Fungsi untuk toggle input bobot
    function toggleBobotInput(checkbox, contentId) {
        const contentElement = document.getElementById(contentId);

        if (contentElement) {
            contentElement.style.display = checkbox.checked ? 'block' : 'none';

            if (!checkbox.checked) {
                const inputElement = contentElement.querySelector('input[type="text"]');
                if (inputElement) {
                    inputElement.value = '';
                }
            }
        }
    }

    // Event listener untuk form-check-input
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.form-check-input').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const contentId = `content-${checkbox.id}`;
                toggleBobotInput(checkbox, contentId);
            });
        });
    });
</script>
