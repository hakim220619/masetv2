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

<div id="500" style="margin-top: 20px; display: none;">
    <!-- Grade Gudang -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="grade_gudang" style="font-weight: bold;">Pilih Grade Gudang</label>
        <select class="form-control" id="grade_gudang" name="grade_gudang">
            <option value="">- Select -</option>
            <option value="Gudang Biasa">Gudang Biasa</option>
            <option value="Gudang Owner Factories">Gudang Owner Factories</option>
        </select>
    </div>

    <!-- Jenis Bangunan -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan" style="font-weight: bold;">Jenis (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis
            bangunan.</small>
        <select class="form-control" id="jenis_bangunan" name="jenis_bangunan" onchange="handleJenisBangunanChange()">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Umur Ekonomis)'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Jenis Bangunan Detail -->
    <div style="margin-top: 20px;">
        <!-- Bangunan Rumah Tinggal -->
        <div id="Bangunan Rumah Tinggal" class="form-group" style="display: none;">
            <label for="jenis_bangunan_detail" style="font-weight: bold;">Tipe Rumah Tinggal (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="">- Select -</option>
                @foreach ($dataBangunan['Tipe Rumah Tinggal (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <!-- Bangunan Rumah Susun -->
        <div id="Bangunan Rumah Susun" class="form-group" style="display: none;">
            <label for="jenis_bangunan_detail" style="font-weight: bold;">Tipe Rusun (Umur Ekonomis)</label>
            <br>
            <small class="form-text text-muted">Pilih tipe bangunan spesifik untuk menentukan umur ekonomis
                bangunan.</small>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="">- Select -</option>
                @foreach ($dataBangunan['Tipe Rusun (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <!-- ... other building types ... -->
    </div>

    <!-- Jenis Bangunan Indeks Lantai -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_indeks_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks Lantai)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai MAPPI.</small>
        <select class="form-control" id="jenis_bangunan_indeks_lantai" name="jenis_bangunan_indeks_lantai"
            onchange="handleJenisBangunanIndekLantaiChange()">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Indeks Lantai)'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Jumlah Lantai sections -->
    <div class="form-group" id="RumahTinggalSederhana" style="display: none; margin-top: 20px;">
        <label for="jumlah_lantai_rumah_tinggal">Jumlah Lantai Rumah Tinggal Sederhana</label>
        <select class="form-control" id="jumlah_lantai_rumah_tinggal" name="jumlah_lantai_rumah_tinggal[]">
            <option value="">- Select -</option>
            <option value="1.00_0">1</option>
            <option value="1.09_1">2</option>
            <option value="1.12_2">3</option>
            <option value="1.135_3">4</option>
        </select>
    </div>

    <!-- ... other floor count sections ... -->

    <!-- Tahun sections -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
        <select class="form-control" id="tahun_dibangun" name="tahun_dibangun">
            <script>
                const currentYear = new Date().getFullYear();
                const startYear = 1900;
                const endYear = currentYear + 7;

                let options = '';
                for (let year = startYear; year <= endYear; year++) {
                    options += `<option value="${year}">${year}</option>`;
                }
                document.write(options);
            </script>
        </select>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Jenis Bangunan change
        function handleJenisBangunanChange() {
            const jenisBangunan = document.getElementById("jenis_bangunan").value;
            const detailDivs = document.querySelectorAll("[id^='Bangunan']");

            detailDivs.forEach(div => {
                div.style.display = 'none';
            });

            if (jenisBangunan) {
                const selectedDiv = document.getElementById(jenisBangunan);
                if (selectedDiv) {
                    selectedDiv.style.display = 'block';
                }
            }
        }

        // Handle Jenis Bangunan Indeks Lantai change
        function handleJenisBangunanIndekLantaiChange() {
            const selectedValue = document.getElementById("jenis_bangunan_indeks_lantai").value;
            const lantaiDivs = document.querySelectorAll("[id$='Tinggal'], [id^='Gedung']");

            lantaiDivs.forEach(div => {
                div.style.display = 'none';
            });

            if (selectedValue) {
                const targetDiv = document.getElementById(selectedValue);
                if (targetDiv) {
                    targetDiv.style.display = 'block';
                }
            }
        }

        // Initialize event listeners
        const jenisBangunanSelect = document.getElementById("jenis_bangunan");
        const indeksLantaiSelect = document.getElementById("jenis_bangunan_indeks_lantai");

        if (jenisBangunanSelect) {
            jenisBangunanSelect.addEventListener('change', handleJenisBangunanChange);
        }

        if (indeksLantaiSelect) {
            indeksLantaiSelect.addEventListener('change', handleJenisBangunanIndekLantaiChange);
        }
    });
</script>
