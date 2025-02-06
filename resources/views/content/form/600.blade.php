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
        <br><span>Pilih jenis bangunan yg sesuai untuk menentukan umur ekonomis bangunan.</span>
        <select class="form-control" id="jenis_bangunan" name="jenis_bangunan" onchange="handleJenisBangunanChange()">
            <option value="" selected>- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Umur Ekonomis)'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Jenis Bangunan Detail -->
    <div style="margin-top: 20px;">
        <div id="BangunanRumahTinggal" class="form-group" style="display: none;">
            <label for="jenis_bangunan_detail" style="font-weight: bold;">Tipe Rumah Tinggal (Umur Ekonomis)</label>
            <br><span>Pilih tipe bangunan spesifik untuk menentukan umur ekonomis bangunan.</span>
            <select class="form-control" name="jenis_bangunan_detail[]">
                <option value="" selected>- Select -</option>
                @foreach ($dataBangunan['Tipe Rumah Tinggal (Umur Ekonomis)'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tambahkan jenis bangunan lainnya sesuai kebutuhan -->
    </div>

    <!-- Tahun Dibangun -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
        <select class="form-control" id="tahun_dibangun" name="tahun_dibangun">
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

    <!-- Tahun Renovasi -->
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
        <select class="form-control" id="tahun_renovasi" name="tahun_renovasi">
            <option value="">- Select -</option>
            <script>
                for (let year = 1900; year <= currentYear + 7; year++) {
                    document.write(`<option value="${year}">${year}</option>`);
                }
            </script>
        </select>
    </div>

    <!-- Jenis & Bobot Renovasi -->
    <div class="form-group mb-3" style="margin-top: 20px">
        <label for="jenis_renovasi"><b>Jenis Renovasi</b></label>
        <input type="text" id="jenis_renovasi" name="jenis_renovasi" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="bobot_renovasi"><b>Bobot Renovasi (%)</b></label>
        <input type="number" id="bobot_renovasi" name="bobot_renovasi" class="form-control" min="0"
            max="100" step="0.01">
    </div>

    <!-- Luas Bangunan -->
    <div class="form-group mb-3">
        <label for="luas_bangunan_terpotong"><b>Luas Bangunan Terpotong (m²)</b></label>
        <input type="number" id="luas_bangunan_terpotong" name="luas_bangunan_terpotong" class="form-control"
            min="0" step="0.01">
    </div>
    <div class="form-group mb-3">
        <label for="luas_bangunan_imb"><b>Luas Bangunan IMB (m²)</b></label>
        <input type="number" id="luas_bangunan_imb" name="luas_bangunan_imb" class="form-control" min="0"
            step="0.01">
    </div>

    <!-- Konstruksi Bangunan -->
    <div class="form-group mb-3">
        <label for="konstruksi_bangunan"><b>Konstruksi Bangunan</b></label>
        <select class="form-control" id="konstruksi_bangunan" name="konstruksi_bangunan">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Konstruksi Bangunan'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Konstruksi Lantai -->
    <div class="form-group mb-3">
        <label for="konstruksi_lantai"><b>Konstruksi Lantai</b></label>
        <select class="form-control" id="konstruksi_lantai" name="konstruksi_lantai">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Konstruksi Lantai'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Konstruksi Dinding -->
    <div class="form-group mb-3">
        <label for="konstruksi_dinding"><b>Konstruksi Dinding</b></label>
        <select class="form-control" id="konstruksi_dinding" name="konstruksi_dinding">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Konstruksi Dinding'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Konstruksi Atap -->
    <div class="form-group mb-3">
        <label for="konstruksi_atap"><b>Konstruksi Atap</b></label>
        <select class="form-control" id="konstruksi_atap" name="konstruksi_atap">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Konstruksi Atap'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Konstruksi Pondasi -->
    <div class="form-group mb-3">
        <label for="konstruksi_pondasi"><b>Konstruksi Pondasi</b></label>
        <select class="form-control" id="konstruksi_pondasi" name="konstruksi_pondasi">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Konstruksi Pondasi'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
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

        // Initialize event listeners
        const jenisBangunanSelect = document.getElementById("jenis_bangunan");
        if (jenisBangunanSelect) {
            jenisBangunanSelect.addEventListener('change', handleJenisBangunanChange);
        }

        // Form validation
        function validateForm() {
            const requiredFields = [
                'jenis_bangunan',
                'tahun_dibangun',
                'konstruksi_bangunan',
                'konstruksi_lantai',
                'konstruksi_dinding',
                'konstruksi_atap',
                'konstruksi_pondasi'
            ];

            let isValid = true;
            requiredFields.forEach(field => {
                const element = document.getElementById(field);
                if (!element.value) {
                    element.classList.add('is-invalid');
                    isValid = false;
                } else {
                    element.classList.remove('is-invalid');
                }
            });

            return isValid;
        }

        // Add form validation before submit
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                    alert('Mohon lengkapi semua field yang wajib diisi');
                }
            });
        }
    });
</script>
