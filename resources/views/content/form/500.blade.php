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

<div id="500" style=" margin-top: 20px; display: none;">
    <div class="form-group" style="margin-top: 20px;">
        <label for="grade_gudang" style="font-weight: bold;">Pilih Grade Gudang</label>
        <select class="form-control" id="grade_gudang" name="grade_gudang">
            <option value="" selected>- Select -</option>
            <option value="Gudang Biasa" selected>Gudang Biasa</option>
            <option value="Gudang Owner Factories" selected>Gudang Owner Factories</option>
        </select>
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_500" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br><span>Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis bangunan.</span>
        <select class="form-control" id="jenis_bangunan_500" name="jenis_bangunan_500"
            onchange="handleJenisBangunanChange()">
            <option value="" selected>- Select -</option>
            <option value="BangunanRumahTinggal">Bangunan Rumah Tinggal</option>
            <option value="BangunanRumahSusun">Bangunan Rumah Susun</option>
            <option value="PusatPerbelanjaan">Pusat Perbelanjaan</option>
            <option value="BangunanKantor">Bangunan Kantor</option>
            <option value="BangunanGedungPemerintah">Bangunan Gedung Pemerintah</option>
            <option value="BangunanHotelMotel">Bangunan Hotel/ Motel</option>
            <option value="BangunanIndustriGudang">Bangunan Industri dan Gudang</option>
            <option value="BangunanKawasanPerkebunan">Bangunan di Kawasan Perkebunan</option>
        </select>
    </div>
    <div style="margin-top: 20px;">


        <!-- Dropdown tambahan, ditampilkan kondisional -->
        <div id="BangunanRumahTinggal" class="form-group" style="display: none;">
            <label for="tipe_rumah_tinggal" style="font-weight: bold;">Tipe Rumah Tinggal (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control">
                <option value="" selected>- Select -</option>
                <option value="10_0">Bangunan kelas Sangat Sederhana</option>
                <option value="20_1">Bangunan kelas Sederhana</option>
                <option value="30_2">Bangunan kelas Menengah</option>
                <option value="40_3">Bangunan kelas Menengah-Mewah</option>
                <option value="50_4">Bangunan kelas Mewah</option>
            </select>
        </div>

        <div id="BangunanRumahSusun" class="form-group" style="display: none;">
            <label for="tipe_rusun" style="font-weight: bold;">Tipe Rusun (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control">
                <option value="" selected>- Select -</option>
                <option value="40_0">Rusun sampai dengan 4 lantai</option>
                <option value="50_1">Rusun >= 5 lantai</option>
            </select>
        </div>

        <div id="PusatPerbelanjaan" class="form-group" style="display: none;">
            <label for="tipe_perbelanjaan" style="font-weight: bold;">Tipe Pusat Perbelanjaan (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control">
                <option value="" selected>- Select -</option>
                <option value="20_0">Toko / Kios Individu</option>
                <option value="30_1">Ruko / Rukan</option>
                <option value="30_2">Pasar Tradisional</option>
                <option value="40_3">Pusat Perbelanjaan / Mall</option>
            </select>
        </div>

        <div id="BangunanKantor" class="form-group" style="display: none;">
            <label for="tipe_kantor" style="font-weight: bold;">Tipe Bangunan Kantor (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control">
                <option value="" selected>- Select -</option>
                <option value="40_0">Bangunan Kantor <= 4 lantai</option>
                <option value="50_1">Bangunan Kantor >= 5 lantai</option>
            </select>
        </div>

        <div id="BangunanGedungPemerintah" class="form-group" style="display: none;">
            <label for="tipe_gedung_pemerintah" style="font-weight: bold;">Tipe Gedung Pemerintah (Umur
                Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>

            <select class="form-control">
                <option value="" selected>- Select -</option>
                <option value="50_0">Bangunan Kantor Pemerintah, Sekolah, Pertemuan, Rumah Sakit</option>
                <option value="60_1">Bangunan Peribadatan & Pusat Kebudayaan</option>
            </select>
        </div>

        <div id="BangunanHotelMotel" class="form-group" style="display: none;">
            <label for="tipe_hotel_motel" style="font-weight: bold;">Tipe Hotel / Motel (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>

            <select class="form-control">
                <option value="" selected>- Select -</option>
                <option value="30_0">Bangunan Villa tidak bertingkat</option>
                <option value="40_1">Bangunan Villa / Hotel / Motel bertingkat <= 4 lantai</option>
                <option value="50_2">Bangunan Hotel / Motel bertingkat >= 5 lantai</option>
            </select>
        </div>

        <div id="BangunanIndustriGudang" class="form-group" style="display: none;">
            <label for="tipe_industri_gudang" style="font-weight: bold;">Tipe Bangunan Industri dan Gudang (Umur
                Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>

            <select class="form-control">
                <option value="" selected>- Select -</option>
                <option value="30_0">Bangunan Gedung / Industri kelas Konstruksi Ringan</option>
                <option value="50_1">Bangunan Gudang / Industri kelas Konstruksi Menengah & Berat</option>
            </select>
        </div>

        <div id="BangunanKawasanPerkebunan" class="form-group" style="display: none;">
            <label for="tipe_perkebunan" style="font-weight: bold;">Tipe Bangunan Perkebunan (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>

            <select class="form-control">
                <option value="" selected>- Select -</option>
                <option value="15_0">Bangunan dari bahan konstruksi kayu kelas Awet 4 & 5</option>
                <option value="30_1">Bangunan dari bahan konstruksi kayu kelas Awet 3</option>
                <option value="50_2">Bangunan dari bahan konstruksi kayu kelas Awet 1 & 2</option>
                <option value="50_3">Bangunan dari bahan konstruksi Beton Bertulang / Baja / Tembok Baru Bata diaci
                </option>
            </select>
        </div>
    </div>
    <script>
        function handleJenisBangunanChange() {
            const jenisBangunan = document.getElementById("jenis_bangunan_500").value;

            // Sembunyikan semua dropdown tambahan
            const dropdowns = document.querySelectorAll("[id^='Bangunan']");
            dropdowns.forEach(dropdown => dropdown.style.display = "none");

            // Tampilkan dropdown sesuai pilihan
            if (jenisBangunan) {
                const selectedDropdown = document.getElementById(jenisBangunan);
                if (selectedDropdown) selectedDropdown.style.display = "block";
            }
        }
    </script>

    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_indek_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks lantai)</label>
        <select class="form-control" id="jenis_bangunan_indek_lantai" name="jenis_bangunan_indek_lantai"
            onchange="handleJenisBangunanIndekLantaiChange()">
            <option value="" selected>- Select -</option>
            <option value="RumahTinggalSederhana">Rumah Tinggal Sederhana</option>
            <option value="RumahTinggalMenengah">Rumah Tinggal Menengah</option>
            <option value="RumahTinggalMewah">Rumah Tinggal Mewah</option>
            <option value="GedungLowRise">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)</option>
            <option value="GedungMidRise">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)</option>
            <option value="GedungHighRise">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai)</option>
        </select>
    </div>

    <div class="form-group" id="RumahTinggalSederhana" style="display: none; margin-top: 20px;">
        <label for="acf-field_5d9eada30263f">Jumlah Lantai Rumah Tinggal Sederhana</label>
        <select class="form-control" id="acf-field_5d9eada30263f" name="acf[field_5d9eada30263f]">
            <option value="" selected>- Select -</option>
            <option value="1.00_0">1</option>
            <option value="1.09_1">2</option>
            <option value="1.12_2">3</option>
            <option value="1.135_3">4</option>
        </select>
    </div>

    <div class="form-group" id="RumahTinggalMenengah" style="display: none; margin-top: 20px;">
        <label for="acf-field_5d9eada302967">Jumlah Lantai Rumah Tinggal Menengah</label>
        <select class="form-control" id="acf-field_5d9eada302967" name="acf[field_5d9eada302967]">
            <option value="" selected>- Select -</option>
            <option value="0.9174_0">1</option>
            <option value="1.00_1">2</option>
            <option value="1.0275_2">3</option>
            <option value="1.0413_3">4</option>
        </select>
    </div>

    <div class="form-group" id="RumahTinggalMewah" style="display: none; margin-top: 20px;">
        <label for="acf-field_5d9eada302d65">Jumlah Lantai Rumah Tinggal Mewah</label>
        <select class="form-control" id="acf-field_5d9eada302d65" name="acf[field_5d9eada302d65]">
            <option value="" selected>- Select -</option>
            <option value="0.9174_0">1</option>
            <option value="1.00_1">2</option>
            <option value="1.0275_2">3</option>
            <option value="1.0413_3">4</option>
        </select>
    </div>

    <div class="form-group" id="GedungLowRise" style="display: none; margin-top: 20px;">
        <label for="acf-field_5d9eada303138">Jumlah Lantai Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai)</label>
        <select class="form-control" id="acf-field_5d9eada303138" name="acf[field_5d9eada303138]">
            <option value="" selected>- Select -</option>
            <option value="0.8929_0">1</option>
            <option value="0.9732_1">2</option>
            <option value="1.00_2">3</option>
            <option value="1.0134_3">4</option>
        </select>
    </div>

    <div class="form-group" id="GedungMidRise" style="display: none; margin-top: 20px;">
        <label for="acf-field_5d9eada303543">Jumlah Lantai Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai)</label>
        <select class="form-control" id="acf-field_5d9eada303543" name="acf[field_5d9eada303543]">
            <option value="" selected>- Select -</option>
            <option value="0.9186_0">5</option>
            <option value="0.9462_1">6</option>
            <option value="0.9771_2">7</option>
            <option value="1.00_3">8</option>
        </select>
    </div>

    <div class="form-group" id="GedungHighRise" style="display: none; margin-top: 20px;">
        <label for="acf-field_5d9eada303940">Jumlah Lantai Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai)</label>
        <select class="form-control" id="acf-field_5d9eada303940" name="acf[field_5d9eada303940]">
            <option value="" selected>- Select -</option>
            <option value="0.8636_0">9</option>
            <option value="0.8834_1">10</option>
            <option value="0.9024_2">11</option>
            <option value="0.9223_31">12</option>
            <option value="0.9413_3">13</option>
            <option value="0.9611_4">14</option>
            <option value="0.9801_5">15</option>
            <option value="1.00_6">16</option>
            <option value="1.0190_7">17</option>
            <option value="1.0389_8">18</option>
            <option value="1.0579_9">19</option>
            <option value="1.0777_10">20</option>
            <option value="1.0967_11">21</option>
            <option value="1.1166_12">22</option>
            <option value="1.1364_13">23</option>
            <option value="1.1554_14">24</option>
            <option value="1.1753_15">25</option>
        </select>
    </div>

    <script>
        function handleJenisBangunanIndekLantaiChange() {
            const jenisBangunan = document.getElementById("jenis_bangunan_indek_lantai").value;

            // Sembunyikan semua dropdown tambahan
            const dropdowns = document.querySelectorAll("[id^='RumahTinggal'], [id^='Gedung']");
            dropdowns.forEach(dropdown => dropdown.style.display = "none");

            // Tampilkan dropdown sesuai pilihan
            if (jenisBangunan) {
                const selectedDropdown = document.getElementById(jenisBangunan);
                if (selectedDropdown) selectedDropdown.style.display = "block";
            }
        }
    </script>




    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_dibangun_500" style="font-weight: bold;">Tahun Dibangun</label>
        <select class="form-control" id="tahun_dibangun_500" name="tahun_dibangun_500"
            onchange="toggleCheckboxes500(this, 'checkboxContainerDibangun500')">
            <script>
                const currentYear500 = new Date().getFullYear();
                const startYear500 = 1900;
                const endYear500 = currentYear500 + 7;
                let options500 = '';

                for (let year = startYear500; year <= endYear500; year++) {
                    const selected = year === currentYear500 ? 'selected' : '';
                    options500 += `<option value="${year}" ${selected}>${year}</option>`;
                }
                document.write(options500);
            </script>
        </select>
    </div>

    <div id="checkboxContainerDibangun500" style="display: none; margin-top: 20px;">
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
            onchange="toggleCheckboxes500(this, 'checkboxContainerRenovasi500')">
            <script>
                const startYearRenovasi500 = 1960;
                const endYearRenovasi500 = currentYear + 7;
                let optionsRenovasi500 = '';

                for (let year = startYearRenovasi500; year <= endYearRenovasi500; year++) {
                    const selected = year === currentYear ? 'selected' : '';
                    optionsRenovasi500 += `<option value="${year}" ${selected}>${year}</option>`;
                }

                document.write(optionsRenovasi500);
            </script>
        </select>
    </div>

    <div id="checkboxContainerRenovasi500" style="display: none; margin-top: 20px;">
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
        <div class="area-lainnya-container-500" data-type="pintu-jendela-500">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_pintu_jendela[]" class="form-control" placeholder="Nama Area"
                        >
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_pintu_jendela[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01" >
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="pintu-jendela-500">Tambah
            Area</button>
    </div>
    <!-- Luas Dinding -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Dinding</b></label><br>
        <small class="form-text text-muted">Masukkan luas dinding kotor belum dikurangi luas pintu dan
            jendela.</small>
        <div class="area-lainnya-container-500" data-type="dinding-500">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_dinding-500[]" class="form-control" placeholder="Nama Area"
                        >
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_dinding-500[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01" >
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="dinding-500">Tambah
            Area</button>
    </div>
    <!-- Luas Rangka Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Rangka Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas rangka atap datar.</small>
        <div class="area-lainnya-container-500" data-type="atap-datar-500">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_atap_datar-500[]" class="form-control" placeholder="Nama Area"
                        >
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_atap_datar-500[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01" >
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar-500">Tambah
            Area</button>
    </div>

    <!-- Luas Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas atap datar.</small>
        <div class="area-lainnya-container-500" data-type="atap-datar-500-2">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_atap_datar-500_2[]" class="form-control" placeholder="Nama Area"
                        >
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_atap_datar-500_2[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01" >
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar-500-2">Tambah
            Area</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Pondasi Eksisting - Bangunan Gudang</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tapak Beton & Batu Kali" id="pondasi_tapak_beton_batu_kali_500"
                    onchange="toggleBobotInput(this, 'bobot_pondasi_tapak_beton_batu_kali-500')">
                <label class="form-check-label" for="pondasi_tapak_beton_batu_kali_500">Tapak Beton & Batu Kali</label>
            </div>
        </div>
        <div id="bobot_pondasi_tapak_beton_batu_kali-500" style="display: none; margin-top: 10px;">
            <label for="bobot_tapak_beton_batu_kali_500">Bobot Pondasi Tapak Beton & Batu Kali (dalam persen %)</label>
            <input type="number" class="form-control" id="bobot_tapak_beton_batu_kali_500" name="bobot_tapak_beton_batu_kali_500"
                placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
        </div>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
        <div id="pondasi-container-500" style="display: none;">
            <div class="area-lainnya-container-500" data-type="pondasi_500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_pondasi_500[]" class="form-control" >
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Pondasi Eksisting'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_pondasi_500[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
                data-type="pondasi_500">Tambah Tipe Pondasi Existing</button>

        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-pondasi-500-btn">Tambah
            Tipe Pondasi Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Struktur Eksisting - Bangunan Gudang 1 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Profil"
                    id="struktur_baja_profil_500"
                    onchange="toggleBobotInput(this, 'bobot_struktur_baja_profil_500')">
                <label class="form-check-label" for="struktur_baja_profil_500">Baja Profil</label>
            </div>
        </div>
        <div id="bobot_struktur_baja_profil_500" style="display: none; margin-top: 10px;">
            <label for="bobot_baja_profil">Bobot Struktur Baja Profil (dalam persen %)</label>
            <input type="number" class="form-control" id="bobot_baja_profil" name="bobot_baja_profil"
                placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
        </div>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
        <div id="struktur-container-500" style="display: none;">
            <div class="area-lainnya-container-500" data-type="struktur_500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_struktur_500[]" class="form-control" >
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Struktur Eksisting'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_struktur_500[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
                data-type="struktur_500">Tambah Tipe Struktur Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-struktur-btn-500">Tambah Tipe
            Struktur Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Eksisting - Bangunan Gudang 1 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Profil Baja"
                    id="rangka_atap_profil_baja_500">
                <label class="form-check-label" for="rangka_atap_profil_baja_500">Profil Baja</label>
            </div>
        </div>
    </div>


    <!-- Content sections for each option -->


    <div id="content-atap_kayu_asbes_500" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Existing</b></label><br>
        <div id="rangka-atap-container-500" style="display: none;">
            <div class="area-lainnya-container-500" data-type="rangka-atap-500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_rangka_atap_500[]" class="form-control" >
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tipe Rangka Atap Existing'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_rangka_atap_500[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
                data-type="rangka-atap-500">Tambah Tipe Rangka Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-500-btn">Tambah Tipe
            Rangka Atap Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Penutup Atap Eksisting - Bangunan Gudang</strong></label><br>

        <input type="checkbox" id="asbes-500" name="tipe_atap" value="Asbes" class="form-check-input">
        <label for="asbes-500" class="form-check-label">Asbes</label><br>

        <input type="checkbox" id="seng-gelombang-500" name="tipe_atap" value="Seng Gelombang" class="form-check-input">
        <label for="seng-gelombang-500" class="form-check-label">Seng Gelombang</label><br>

        <input type="checkbox" id="spandek-500" name="tipe_atap" value="Spandek" class="form-check-input">
        <label for="spandek-500" class="form-check-label">Spandek</label><br>
    </div>




    <!-- Content sections for each option -->
    <div id="content-asbes-500" class="content" style="display: none;">
        <label><b>Bobot Asbes</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-seng-gelombang-500" class="content" style="display: none;">
        <label><b>Bobot Seng Gelombang</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-spandek-500" class="content" style="display: none;">
        <label><b>Bobot Spandek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>







    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
        <div id="penutup-atap-existing-500-container" style="display: none;">
            <div class="area-lainnya-container-500" data-type="penutup-atap-existing-500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_penutup-atap-existing-500[]" class="form-control" >
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_penutup-atap-existing-500[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
                data-type="penutup-atap-existing-500">Tambah Tipe Penutup Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-penutup-atap-existing-500-btn">Tambah Tipe
            Penutup Atap Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Plafon Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</strong></label><br>

        <input type="checkbox" id="triplek-plafon-500" name="tipe_atap" value="Triplek" class="form-check-input">
        <label for="triplek-plafon-500" class="form-check-label">Triplek</label><br>
    </div>


    <!-- Content sections for each option -->

    <div id="content-triplek-plafon-500" class="content" style="display: none;">
        <label><b>Bobot Triplek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Plafon Existing</b></label><br>
        <div id="plafon-existing-500-container" style="display: none;">
            <div class="area-lainnya-container-500" data-type="plafon-existing-500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_plafon-existing-500[]" class="form-control" >
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Plafon Existing'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_plafon-existing-500[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
                data-type="plafon-existing-500">Tambah Plafon Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-plafon-existing-500-btn">Tambah Plafon Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Dinding Eksisting - Bangunan Gudang 1 Lantai</strong></label><br>

        <input type="checkbox" id="batako-500" name="tipe_dinding" value="Batako" class="form-check-input">
        <label for="batako-500" class="form-check-label">Batako</label><br>

        <input type="checkbox" id="bata-merah-500" name="tipe_dinding" value="Bata Merah" class="form-check-input">
        <label for="bata-merah-500" class="form-check-label">Bata Merah</label><br>

        <input type="checkbox" id="bata-ringan-500" name="tipe_dinding" value="Bata Ringan" class="form-check-input">
        <label for="bata-ringan-500" class="form-check-label">Bata Ringan</label><br>

        <input type="checkbox" id="dinding-spandek-rangka-baja-500" name="tipe_dinding" value="Dinding Spandek Rangka Baja" class="form-check-input">
        <label for="dinding-spandek-rangka-baja-500" class="form-check-label">Dinding Spandek Rangka Baja</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-batako-500" class="content" style="display: none;">
        <label><b>Bobot Batako</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-bata-merah-500" class="content" style="display: none;">
        <label><b>Bobot Bata Merah</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-bata-ringan-500" class="content" style="display: none;">
        <label><b>Bobot Bata Ringan</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-dinding-spandek-rangka-baja-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Spandek Rangka Baja</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Dinding Existing</b></label><br>
        <div id="dinding-existing-500-container" style="display: none;">
            <div class="area-lainnya-container-500" data-type="dinding-existing-500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_dinding-existing-500[]" class="form-control" >
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Dinding Existing'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_dinding-existing-500[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
                data-type="dinding-existing-500">Tambah Tipe Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-dinding-existing-500-btn">Tambah Tipe Dinding Existing</button>
    </div>



    <!-- Content sections for each option -->
    <div id="content-cat-dinding-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-keramik-dinding-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-marmer-lokal-dinding-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Marmer Lokal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-marmer-import-dinding-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Marmer Import</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-granit-dinding-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-wallpaper-dinding-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-mozaik-dinding-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-batu-alam-dinding-500" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pelapis Dinding Eksisting - Bangunan Gudang 1 Lantai</strong></label><br>

        <input type="checkbox" id="dilapis-cat-500" name="tipe_pelapis_dinding" value="Dilapis Cat (Diplester dan Diaci)" class="form-check-input">
        <label for="dilapis-cat-500" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>
    </div>
    <div id="content-dilapis-cat-500" class="content" style="display: none;">
        <label><b>Bobot Dilapis Cat (Diplester dan Diaci)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
        <div id="tipe-pelapis-dinding-existing-500-container" style="display: none;">
            <div class="area-lainnya-container-500" data-type="tipe-pelapis-dinding-existing-500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-pelapis-dinding-existing-500[]" class="form-control" >
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pelapis Dinding Existing'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-pelapis-dinding-existing-500[]"
                            class="form-control" placeholder="Masukkan bobot" min="0" max="100"
                            step="0.01" >
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
                data-type="tipe-pelapis-dinding-existing-500">Tambah Tipe Pelapis Dinding Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pelapis-dinding-existing-500-btn">Tambah
            Tipe Pelapis Dinding Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Pintu & Jendela Eksisting - Bangunan Gudang 1 Lantai</strong></label><br>

        <input type="checkbox" id="pintu-besi-500" name="tipe_pintu_jendela" value="Pintu Besi" class="form-check-input">
        <label for="pintu-besi-500" class="form-check-label">Pintu Besi</label><br>
    </div>

    <div id="content-pintu-besi-500" class="content" style="display: none;">
        <label><b>Bobot Pintu Besi</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>



    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
        <div id="tipe-pintu-jendela-existing-500-container" style="display: none;">
            <div class="area-lainnya-container-500" data-type="tipe-pintu-jendela-existing-500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-pintu-jendela-existing-500[]" class="form-control" >
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pintu & Jendela Existing'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-pintu-jendela-existing-500[]"
                            class="form-control" placeholder="Masukkan bobot" min="0" max="100"
                            step="0.01" >
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
                data-type="tipe-pintu-jendela-existing-500">Tambah Tipe Pintu & Jendela Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-pintu-jendela-existing-500-btn">Tambah
            Tipe Pintu & Jendela Existing</button>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Lantai Eksisting - Bangunan Perkebunan (Semi Permanen) 1 Lantai</strong></label><br>

        <input type="checkbox" id="plat-lantai-beton-8cm-500" class="form-check-input">
        <label for="plat-lantai-beton-8cm-500" class="form-check-label">Plat Lantai Beton T = 8 cm</label><br>

        <input type="checkbox" id="plat-lantai-beton-10cm-500" class="form-check-input">
        <label for="plat-lantai-beton-10cm-500" class="form-check-label">Plat Lantai Beton T = 10 cm</label><br>

        <input type="checkbox" id="plat-lantai-beton-12cm-500" class="form-check-input">
        <label for="plat-lantai-beton-12cm-500" class="form-check-label">Plat Lantai Beton T = 12 cm</label><br>

        <input type="checkbox" id="plat-lantai-beton-15cm-500" class="form-check-input">
        <label for="plat-lantai-beton-15cm-500" class="form-check-label">Plat Lantai Beton T = 15 cm</label><br>

        <input type="checkbox" id="plat-lantai-beton-20cm-500" class="form-check-input">
        <label for="plat-lantai-beton-20cm-500" class="form-check-label">Plat Lantai Beton T = 20 cm</label><br>

        <input type="checkbox" id="plat-lantai-beton-30cm-500" class="form-check-input">
        <label for="plat-lantai-beton-30cm-500" class="form-check-label">Plat Lantai Beton T = 30 cm</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-plat-lantai-beton-8cm-500" class="content" style="display: none;">
        <label><b>Bobot Plat Lantai Beton T = 8 cm</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-plat-lantai-beton-10cm-500" class="content" style="display: none;">
        <label><b>Bobot Plat Lantai Beton T = 10 cm</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-plat-lantai-beton-12cm-500" class="content" style="display: none;">
        <label><b>Bobot Plat Lantai Beton T = 12 cm</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-plat-lantai-beton-15cm-500" class="content" style="display: none;">
        <label><b>Bobot Plat Lantai Beton T = 15 cm</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-plat-lantai-beton-20cm-500" class="content" style="display: none;">
        <label><b>Bobot Plat Lantai Beton T = 20 cm</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-plat-lantai-beton-30cm-500" class="content" style="display: none;">
        <label><b>Bobot Plat Lantai Beton T = 30 cm</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Lantai Existing</b></label><br>
        <div id="tipe-lantai-existing-500-container" style="display: none;">
            <div class="area-lainnya-container-500" data-type="tipe-lantai-existing-500">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-lantai-existing-500[]" class="form-control" >
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Lantai Existing'] as $item)
                            <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-lantai-existing-500[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" >
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
                data-type="tipe-lantai-existing-500">Tambah Tipe Lantai Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2"
            id="show-tipe-lantai-existing-500-btn">Tambah Tipe
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
            if (type === 'pondasi_500') {
                nameTipe = 'tipe_pondasi_500[]';
                nameBobot = 'bobot_pondasi_500[]';

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
            if (type === 'struktur_500') {
                nameTipe = 'tipe_struktur_500[]';
                nameBobot = 'bobot_struktur_500[]';

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

            if (type === 'rangka-atap-500') {
                nameTipe = 'tipe_rangka_atap_500[]';
                nameBobot = 'bobot_rangka_atap_500[]';

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

            if (type === 'penutup-atap-existing-500') {
                nameTipe = 'tipe_penutup-atap-existing-500[]';
                nameBobot = 'bobot_penutup-atap-existing-500[]';

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
            if (type === 'plafon-existing-500') {
                nameTipe = 'tipe_plafon-existing-500[]';
                nameBobot = 'bobot_plafon-existing-500[]';

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

            if (type === 'dinding-existing-500') {
                nameTipe = 'tipe_dinding-existing-500[]';
                nameBobot = 'bobot_dinding-existing-500[]';

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

            if (type === 'tipe-pelapis-dinding-existing-500') {
                nameTipe = 'tipe_tipe-pelapis-dinding-existing-500[]';
                nameBobot = 'bobot_tipe-pelapis-dinding-existing-500[]';

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

            if (type === 'tipe-pintu-jendela-existing-500') {
                nameTipe = 'tipe_tipe-pintu-jendela-existing-500[]';
                nameBobot = 'bobot_tipe-pintu-jendela-existing-500[]';

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

            if (type === 'tipe-lantai-existing-500') {
                nameTipe = 'tipe_tipe-lantai-existing-500[]';
                nameBobot = 'bobot_tipe-lantai-existing-500[]';

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

            if (type === 'pintu-jendela-500') {
                nameNama = 'nama_pintu_jendela[]';
                nameLuas = 'luas_pintu_jendela[]';
            } else if (type === 'dinding') {
                nameNama = 'nama_dinding-500[]';
                nameLuas = 'luas_dinding-500[]';
            } else if (type === 'atap-datar-500') {
                nameNama = 'nama_atap_datar-500[]';
                nameLuas = 'luas_atap_datar-500[]';
            } else if (type === 'atap-datar-500-2') {
                nameNama = 'nama_atap_datar-500_2[]';
                nameLuas = 'luas_atap_datar-500_2[]';
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
                    `.area-lainnya-container-500[data-type="${type}"]`);
                const newAreaItem = createAreaItem(type);
                areaContainer.appendChild(newAreaItem);
            });
        });


        // Event delegation untuk tombol add dan remove dalam masing-masing container
        document.querySelectorAll('.area-lainnya-container-500').forEach(function(container) {
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
        const pondasiContainer = document.getElementById('pondasi-container-500');
        const showPondasiBtn = document.getElementById('show-pondasi-500-btn');
        const addPondasiBtn = document.querySelector('.add-area-link[data-type="pondasi_500"]');

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
        const strukturContainer = document.getElementById('struktur-container-500');
        const showStrukturBtn = document.getElementById('show-struktur-btn-500');
        const addStrukturBtn = document.querySelector('.add-area-link[data-type="struktur_500"]');

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
        const rangkaAtapContainer = document.getElementById('rangka-atap-container-500');
        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-500-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="rangka-atap-500"]');

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
        const rangkaAtapContainer = document.getElementById('penutup-atap-existing-500-container');
        const showRangkaAtapBtn = document.getElementById('show-penutup-atap-existing-500-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="penutup-atap-existing-500"]');

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
        const rangkaAtapContainer = document.getElementById('plafon-existing-500-container');
        const showRangkaAtapBtn = document.getElementById('show-plafon-existing-500-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="plafon-existing-500"]');

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
        const rangkaAtapContainer = document.getElementById('dinding-existing-500-container');
        const showRangkaAtapBtn = document.getElementById('show-dinding-existing-500-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="dinding-existing-500"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pelapis-dinding-existing-500-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pelapis-dinding-existing-500-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pelapis-dinding-existing-500"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-pintu-jendela-existing-500-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-pintu-jendela-existing-500-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-pintu-jendela-existing-500"]');

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
        const rangkaAtapContainer = document.getElementById('tipe-lantai-existing-500-container');
        const showRangkaAtapBtn = document.getElementById('show-tipe-lantai-existing-500-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="tipe-lantai-existing-500"]');

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


    function toggleCheckboxes500(selectElement, targetId) {
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