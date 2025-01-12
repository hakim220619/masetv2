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

<div id="1000" style=" margin-top: 20px; display: none;">
    <div class="form-group" style="margin-top: 20px;">
        <label for="grade_gedung" style="font-weight: bold;">Pilih Grade Hotel</label>
        <select class="form-control" id="grade_gedung" name="grade_gedung">
            <option value="" selected>- Select -</option>
            <option value="bintang_4">Hotel Bintang 4-5</option>
            <option value="bintang_5">Hotel Bintang Luxury (5)</option>
        </select>
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_900" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br><span>Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis bangunan.</span>
        <select class="form-control" id="jenis_bangunan_900" name="jenis_bangunan_900"
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
            const jenisBangunan = document.getElementById("jenis_bangunan_900").value;

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

    <div class="form-group" style="margin-top: 20px;">
        <label for="penggunaan_bangunan_saat_ini" style="font-weight: bold;"> Penggunaan Bangunan Saat Ini</label>
        <input type="text" class="form-control" id="penggunaan_bangunan_saat_ini"
            name="penggunaan_bangunan_saat_ini" placeholder="Disewakan, Selama berapa tahun?" min="0"
            step="0.01">
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