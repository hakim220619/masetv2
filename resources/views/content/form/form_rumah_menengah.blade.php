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


<div id="form-rumah-menengah" style=" margin-top: 20px; display: none;">
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted" style="margin-top: 5px;">Pilih jenis bangunan yang
            sesuai untuk menentukan umur ekonomis bangunan.</small>
        <select class="form-control" id="jenis_bangunan" name="jenis_bangunan">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Umur Ekonomis)'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>

    </div>

    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_indeks_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks
            Lantai)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks
            lantai MAPPI.</small>
        <select class="form-control" id="jenis_bangunan_indeks_lantai" name="jenis_bangunan_indeks_lantai">
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Jenis Bangunan (Indeks Lantai)'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
        <input type="number" class="form-control" id="tahun_dibangun" name="tahun_dibangun" placeholder="Enter Year"
            min="1900" max="2024">
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
        <input type="number" class="form-control" id="tahun_renovasi" name="tahun_renovasi" placeholder="Enter Year"
            min="1900" max="2024">
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
        <small class="form-text text-muted">Masukkan luas pintu dan jendela yang ada.</small>
        <div class="area-lainnya-container-menengah" data-type="pintu-jendela">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_pintu_jendela[]" class="form-control" placeholder="Nama Area"
                        required>
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_pintu_jendela[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01" required>
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
                    <input type="text" name="nama_dinding[]" class="form-control" placeholder="Nama Area"
                        required>
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_dinding[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01" required>
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
        <div class="area-lainnya-container-menengah" data-type="atap-datar">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_atap_datar[]" class="form-control" placeholder="Nama Area"
                        required>
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_atap_datar[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01" required>
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

    <!-- Luas Atap Datar -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Luas Atap Datar</b></label><br>
        <small class="form-text text-muted">Masukkan luas atap datar.</small>
        <div class="area-lainnya-container-menengah" data-type="atap-datar-2">
            <div class="area-item d-flex align-items-center mb-2">
                <div style="flex: 1; margin-right: 10px;">
                    <label>Nama Area</label>
                    <input type="text" name="nama_atap_datar_2[]" class="form-control" placeholder="Nama Area"
                        required>
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label>Luas (m²)</label>
                    <input type="number" name="luas_atap_datar_2[]" class="form-control" placeholder="Luas (m²)"
                        min="0" step="0.01" required>
                </div>
                <div class="area-controls">
                    <div class="row">
                        <button type="button" class="add-area-btn">+</button>
                        <button type="button" class="remove-area-btn">-</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2 add-area-link" data-type="atap-datar-2">Tambah
            Area</button>
    </div>
    <!-- Tipe Pondasi Existing -->
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Pondasi Eksisting - Rumah Tinggal Menengah 2 Lantai</b></label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Batu Kali" id="pondasi_batu_kali"
                    onchange="toggleBobotInput(this, 'bobot_pondasi_batu_kali_menengah')">
                <label class="form-check-label" for="pondasi_batu_kali">Batu Kali</label>
            </div>
        </div>
        <div id="bobot_pondasi_batu_kali_menengah" style="display: none; margin-top: 10px;">
            <label for="bobot_batu_kali">Bobot Pondasi Batu Kali (dalam persen %)</label>
            <input type="number" class="form-control" id="bobot_batu_kali" name="bobot_batu_kali"
                placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
        </div>
    </div>
    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pondasi Eksisting</b></label><br>
        <div id="pondasi-container-menengah" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="pondasi_menengah">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_pondasi_menengah[]" class="form-control" required>
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Pondasi Eksisting'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_pondasi_menengah[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                    id="struktur_beton_bertulang_menengah"
                    onchange="toggleBobotInput(this, 'bobot_struktur_beton_bertulang_menengah')">
                <label class="form-check-label" for="struktur_beton_bertulang_menengah">Beton
                    Bertulang</label>
            </div>
        </div>
        <div id="bobot_struktur_beton_bertulang_menengah" style="display: none; margin-top: 10px;">
            <label for="bobot_beton_bertulang">Bobot Struktur Beton Bertulang (dalam persen %)</label>
            <input type="number" class="form-control" id="bobot_beton_bertulang" name="bobot_beton_bertulang"
                placeholder="Masukkan bobot dalam persen" min="0" max="100" step="0.01">
        </div>
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Struktur Eksisting</b></label><br>
        <div id="struktur-container-menengah" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="struktur_menengah">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_struktur_menengah[]" class="form-control" required>
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tambah Tipe Struktur Eksisting'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_struktur_menengah[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                    id="atap_dak_beton_menengah">
                <label class="form-check-label" for="atap_dak_beton_menengah">Dak Beton (Jika Pakai Balok)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Genteng)"
                    id="atap_kayu_genteng_menengah">
                <label class="form-check-label" for="atap_kayu_genteng_menengah">Kayu (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Kayu (Atap Asbes, Seng dll, Tanpa Reng)"
                    id="atap_kayu_asbes_menengah">
                <label class="form-check-label" for="atap_kayu_asbes_menengah">Kayu (Atap Asbes, Seng dll, Tanpa
                    Reng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Genteng)"
                    id="atap_baja_genteng_menengah">
                <label class="form-check-label" for="atap_baja_genteng_menengah">Baja Ringan (Atap Genteng)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Baja Ringan (Atap Asbes, Seng dll)"
                    id="atap_baja_asbes_menengah">
                <label class="form-check-label" for="atap_baja_asbes_menengah">Baja Ringan (Atap Asbes, Seng
                    dll)</label>
            </div>
        </div>
    </div>

    <!-- Content sections for each option -->
    <div id="content-atap_dak_beton_menengah" class="content" style="display: none;">
        <label><b>Bobot Dak Beton (Jika Pakai Balok)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-atap_kayu_genteng_menengah" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-atap_kayu_asbes_menengah" class="content" style="display: none;">
        <label><b>Bobot Kayu (Atap Asbes, Seng dll, Tanpa Reng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-atap_baja_genteng_menengah" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Genteng)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div id="content-atap_baja_asbes_menengah" class="content" style="display: none;">
        <label><b>Bobot Baja Ringan (Atap Asbes, Seng dll)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tipe Rangka Atap Existing</b></label><br>
        <div id="rangka-atap-container-menengah" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="rangka-atap-menengah">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_rangka_atap_menengah[]" class="form-control" required>
                            <option value="">- Select -</option>
                            @foreach ($dataBangunan['Tipe Rangka Atap Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_rangka_atap_menengah[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                data-type="rangka-atap-menengah">Tambah Tipe Rangka Atap Existing</button>
        </div>
        <button type="button" class="btn btn-primary btn-sm mt-2" id="show-rangka-atap-menengah-btn">Tambah Tipe
            Rangka Atap Existing</button>
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><strong>Tipe Penutup Atap Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
        <input type="checkbox" id="asbes-menengah" name="tipe_atap" value="Asbes" class="form-check-input">
        <label for="asbes-menengah" class="form-check-label">Asbes</label><br>

        <input type="checkbox" id="dak-beton-menengah" name="tipe_atap" value="Dak Beton" class="form-check-input">
        <label for="dak-beton-menengah" class="form-check-label">Dak Beton</label><br>

        <input type="checkbox" id="fibreglass-menengah" name="tipe_atap" value="Fibreglass"
            class="form-check-input">
        <label for="fibreglass-menengah" class="form-check-label">Fibreglass</label><br>

        <input type="checkbox" id="genteng-tanah-liat-menengah" name="tipe_atap" value="Genteng Tanah Liat"
            class="form-check-input">
        <label for="genteng-tanah-liat-menengah" class="form-check-label">Genteng Tanah Liat</label><br>

        <input type="checkbox" id="genteng-beton-menengah" name="tipe_atap" value="Genteng Beton"
            class="form-check-input">
        <label for="genteng-beton-menengah" class="form-check-label">Genteng Beton</label><br>

        <input type="checkbox" id="genteng-metal-menengah" name="tipe_atap" value="Genteng Metal"
            class="form-check-input">
        <label for="genteng-metal-menengah" class="form-check-label">Genteng Metal</label><br>

        <input type="checkbox" id="seng-gelombang-menengah" name="tipe_atap" value="Seng Gelombang"
            class="form-check-input">
        <label for="seng-gelombang-menengah" class="form-check-label">Seng Gelombang</label><br>

        <input type="checkbox" id="spandek-menengah" name="tipe_atap" value="Spandek" class="form-check-input">
        <label for="spandek-menengah" class="form-check-label">Spandek</label><br>

        <input type="checkbox" id="pvc-menengah" name="tipe_atap" value="PVC" class="form-check-input">
        <label for="pvc-menengah" class="form-check-label">PVC</label><br>
    </div>


    <!-- Content sections for each option -->
    <div id="content-asbes-menengah" class="content" style="display: none;">
        <label><b>Bobot Asbes</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-dak-beton-menengah" class="content" style="display: none;">
        <label><b>Bobot Dak Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-fibreglass-menengah" class="content" style="display: none;">
        <label><b>Bobot Fibreglass</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-genteng-tanah-liat-menengah" class="content" style="display: none;">
        <label><b>Bobot Genteng Tanah Liat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-genteng-beton-menengah" class="content" style="display: none;">
        <label><b>Bobot Genteng Beton</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-genteng-metal-menengah" class="content" style="display: none;">
        <label><b>Bobot Genteng Metal</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-seng-gelombang-menengah" class="content" style="display: none;">
        <label><b>Bobot Seng Gelombang</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-spandek-menengah" class="content" style="display: none;">
        <label><b>Bobot Spandek</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-pvc-menengah" class="content" style="display: none;">
        <label><b>Bobot PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Penutup Atap Existing</b></label><br>
        <div id="penutup-atap-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="penutup-atap-existing-menengah">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_penutup-atap-existing-menengah[]" class="form-control" required>
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_penutup-atap-existing-menengah[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
        <label><strong>Tipe Dinding Eksisting - Rumah Tinggal Menengah 2 Lantai</strong></label><br>
        <input type="checkbox" id="batako-menengah" class="form-check-input">
        <label for="batako" class="form-check-label">Batako</label><br>
        <input type="checkbox" id="bata-merah-menengah" class="form-check-input">
        <label for="bata-merah" class="form-check-label">Bata Merah</label><br>
        <input type="checkbox" id="bata-ringan-menengah" class="form-check-input">
        <label for="bata-ringan" class="form-check-label">Bata Ringan</label><br>
        <input type="checkbox" id="gypsumboard-menengah" class="form-check-input">
        <label for="gypsumboard" class="form-check-label">Partisi Gypsumboard 2 Muka</label><br>
        <input type="checkbox" id="rooster-bata-menengah" class="form-check-input">
        <label for="rooster-bata" class="form-check-label">Rooster Bata</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-batako-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Batako</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-bata-merah-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Bata Merah</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-bata-ringan-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Bata Ringan</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-gypsumboard-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Partisi Gypsumboard 2 Muka</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-rooster-bata-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Rooster Bata</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Dinding Existing</b></label><br>
        <div id="tipe-dinding-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="tipe-dinding-existing-menengah">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-dinding-existing-menengah[]" class="form-control" required>
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
                        <input type="number" name="bobot_tipe-dinding-existing-menengah[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
        <label><strong>Tipe Pelapis Dinding Eksisting - Rumah Tinggal Menengah 2
                Lantai</strong></label><br>
        <input type="checkbox" id="cat-menengah" class="form-check-input">
        <label for="cat" class="form-check-label">Dilapis Cat (Diplester dan Diaci)</label><br>
        <input type="checkbox" id="keramik-menengah" class="form-check-input">
        <label for="keramik" class="form-check-label">Dilapis Keramik</label><br>
        <input type="checkbox" id="wallpaper-menengah" class="form-check-input">
        <label for="wallpaper" class="form-check-label">Dilapis Wallpaper</label><br>
        <input type="checkbox" id="mozaik-menengah" class="form-check-input">
        <label for="mozaik" class="form-check-label">Dilapis Mozaik</label><br>
        <input type="checkbox" id="batu-alam-menengah" class="form-check-input">
        <label for="batu-alam" class="form-check-label">Dilapis Batu Alam</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-cat-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Cat</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-keramik-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-wallpaper-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Wallpaper</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-mozaik-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Mozaik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-batu-alam-menengah" class="content" style="display: none;">
        <label><b>Bobot Dinding Dilapis Batu Alam</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pelapis Dinding Existing</b></label><br>
        <div id="tipe-pelapis-dinding-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="tipe-pelapis-dinding-existing-menengah">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-pelapis-dinding-existing-menengah[]" class="form-control" required>
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pelapis Dinding Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-pelapis-dinding-existing-menengah[]"
                            class="form-control" placeholder="Masukkan bobot" min="0" max="100"
                            step="0.01" required>
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
        <label><strong>Tipe Pintu & Jendela Eksisting - Rumah Tinggal Menengah 2
                Lantai</strong></label><br>
        <input type="checkbox" id="pintu-kayu-panil-menengah" class="form-check-input">
        <label for="pintu-kayu-panil" class="form-check-label">Pintu Kayu Panil</label><br>
        <input type="checkbox" id="pintu-kayu-dobel-menengah" class="form-check-input">
        <label for="pintu-kayu-dobel" class="form-check-label">Pintu Kayu Dobel Triplek/
            HPL</label><br>
        <input type="checkbox" id="pintu-kaca-aluminium-menengah" class="form-check-input">
        <label for="pintu-kaca-aluminium" class="form-check-label">Pintu Kaca Rk
            Aluminium</label><br>
        <input type="checkbox" id="jendela-kaca-kayu-menengah" class="form-check-input">
        <label for="jendela-kaca-kayu" class="form-check-label">Jendela Kaca Rk Kayu</label><br>
        <input type="checkbox" id="jendela-kaca-aluminium-menengah" class="form-check-input">
        <label for="jendela-kaca-aluminium" class="form-check-label">Jendela Kaca Rk
            Aluminium</label><br>
        <input type="checkbox" id="pintu-km-upvc-menengah" class="form-check-input">
        <label for="pintu-km-upvc" class="form-check-label">Pintu KM UPVC/PVC</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-pintu-kayu-panil-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Panil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-pintu-kayu-dobel-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Kayu Dobel Triplek/ HPL</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-pintu-kaca-aluminium-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-jendela-kaca-kayu-menengah" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-jendela-kaca-aluminium-menengah" class="content" style="display: none;">
        <label><b>Bobot Jendela Kaca Rk Aluminium</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-pintu-km-upvc-menengah" class="content" style="display: none;">
        <label><b>Bobot Pintu KM UPVC/PVC</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>

    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Pintu & Jendela Existing</b></label><br>
        <div id="tipe-pintu-jendela-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="tipe-pintu-jendela-existing-menengah">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-pintu-jendela-existing-menengah[]" class="form-control" required>
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Pintu & Jendela Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-pintu-jendela-existing-menengah[]"
                            class="form-control" placeholder="Masukkan bobot" min="0" max="100"
                            step="0.01" required>
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
        <input type="checkbox" id="granit-homogenous-tile-menengah" class="form-check-input">
        <label for="granit-homogenous-tile" class="form-check-label">Granit/Homogenous
            Tile</label><br>
        <input type="checkbox" id="karpet-menengah" class="form-check-input">
        <label for="karpet" class="form-check-label">Karpet</label><br>
        <input type="checkbox" id="keramik-menengah" class="form-check-input">
        <label for="keramik" class="form-check-label">Keramik</label><br>
        <input type="checkbox" id="rabat-beton-menengah" class="form-check-input">
        <label for="rabat-beton" class="form-check-label">Rabat Beton (Semen Ekspose)</label><br>
        <input type="checkbox" id="teraso-menengah" class="form-check-input">
        <label for="teraso" class="form-check-label">Teraso</label><br>
        <input type="checkbox" id="vynil-menengah" class="form-check-input">
        <label for="vynil" class="form-check-label">Vynil</label><br>
        <input type="checkbox" id="papan-kayu-menengah" class="form-check-input">
        <label for="papan-kayu" class="form-check-label">Papan Kayu</label><br>
    </div>

    <!-- Content sections for each option -->
    <div id="content-granit-homogenous-tile-menengah" class="content" style="display: none;">
        <label><b>Bobot Granit/Homogenous Tile</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-karpet-menengah" class="content" style="display: none;">
        <label><b>Bobot Karpet</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-keramik-menengah" class="content" style="display: none;">
        <label><b>Bobot Keramik</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-rabat-beton-menengah" class="content" style="display: none;">
        <label><b>Bobot Rabat Beton (Semen Ekspose)</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-teraso-menengah" class="content" style="display: none;">
        <label><b>Bobot Teraso</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-vynil-menengah" class="content" style="display: none;">
        <label><b>Bobot Vynil</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>
    <div id="content-papan-kayu-menengah" class="content" style="display: none;">
        <label><b>Bobot Papan Kayu</b></label><br>
        <span>Dalam satuan persen (%)</span>
        <input type="number" class="form-control" placeholder="Masukkan nilai" min="0" max="100">
    </div>


    <div class="form-group mb-3" style="margin-top: 20px;">
        <label><b>Tambah Tipe Lantai Existing</b></label><br>
        <div id="tipe-lantai-existing-menengah-container" style="display: none;">
            <div class="area-lainnya-container-menengah" data-type="tipe-lantai-existing-menengah">
                <div class="area-item d-flex align-items-center mb-2">
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Tipe Material</label>
                        <select name="tipe_tipe-lantai-existing-menengah[]" class="form-control" required>
                            <option value="" selected="selected" data-i="0">- Select -
                            </option>
                            @foreach ($dataBangunan['Tambah Tipe Lantai Existing'] as $item)
                                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <label>Bobot (%)</label>
                        <input type="number" name="bobot_tipe-lantai-existing-menengah[]" class="form-control"
                            placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                nameTipe = 'tipe_pondasi_menengah[]';
                nameBobot = 'bobot_pondasi_menengah[]';

                areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Tipe Material</label>
            <select name="${nameTipe}" class="form-control" required>
                <option value="">- Select -</option>
               @foreach ($dataBangunan['Tambah Tipe Struktur Eksisting'] as $item)
                    <option value="{{ $item->label_value }}">{{ $item->label_option }}
                    </option>
                @endforeach
            </select>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Bobot (%)</label>
            <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                nameTipe = 'tipe_struktur_menengah[]';
                nameBobot = 'bobot_struktur_menengah[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
                   @foreach ($dataBangunan['Tambah Tipe Struktur Eksisting'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Tipe Rangka Atap Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                nameTipe = 'tipe_penutup-atap-existing-menengah[]';
                nameBobot = 'bobot_penutup-atap-existing-menengah[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Tambah Tipe Penutup Atap Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }} </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                nameTipe = 'tipe_tipe-dinding-existing-menengah[]';
                nameBobot = 'bobot_tipe-dinding-existing-menengah[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Tambah Tipe Dinding Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}
                </option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                nameTipe = 'tipe_tipe-pelapis-dinding-existing-menengah[]';
                nameBobot = 'bobot_tipe-pelapis-dinding-existing-menengah[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
           @foreach ($dataBangunan['Tambah Tipe Pelapis Dinding Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                nameTipe = 'tipe_tipe-lantai-existing-menengah[]';
                nameBobot = 'bobot_tipe-lantai-existing-menengah[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
             @foreach ($dataBangunan['Tambah Tipe Lantai Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                nameTipe = 'tipe_tipe-pintu-jendela-existing-menengah[]';
                nameBobot = 'bobot_tipe-pintu-jendela-existing-menengah[]';

                areaItem.innerHTML = `
    <div style="flex: 1; margin-right: 10px;">
        <label>Tipe Material</label>
        <select name="${nameTipe}" class="form-control" required>
            <option value="">- Select -</option>
            @foreach ($dataBangunan['Tambah Tipe Pintu & Jendela Existing'] as $item)
                <option value="{{ $item->label_value }}">{{ $item->label_option }}</option>
            @endforeach
        </select>
    </div>
    <div style="flex: 1; margin-right: 10px;">
        <label>Bobot (%)</label>
        <input type="number" name="${nameBobot}" class="form-control" placeholder="Masukkan bobot" min="0" max="100" step="0.01" required>
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
                nameNama = 'nama_pintu_jendela[]';
                nameLuas = 'luas_pintu_jendela[]';
            } else if (type === 'dinding') {
                nameNama = 'nama_dinding[]';
                nameLuas = 'luas_dinding[]';
            } else if (type === 'atap-datar') {
                nameNama = 'nama_atap_datar[]';
                nameLuas = 'luas_atap_datar[]';
            } else if (type === 'atap-datar-2') {
                nameNama = 'nama_atap_datar_2[]';
                nameLuas = 'luas_atap_datar_2[]';
            }

            areaItem.innerHTML = `
        <div style="flex: 1; margin-right: 10px;">
            <label>Nama Area</label>
            <input type="text" name="${nameNama}" class="form-control" placeholder="Nama Area" required>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label>Luas (m²)</label>
            <input type="number" name="${nameLuas}" class="form-control" placeholder="Luas (m²)" min="0" step="0.01" required>
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
        const showRangkaAtapBtn = document.getElementById('show-rangka-atap-menengah-btn');
        const addRangkaAtapBtn = document.querySelector(
            '.add-area-link[data-type="rangka-atap-menengah"]');

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
        console.log(showRangkaAtapBtn);

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

    document.getElementById('tambah-foto').addEventListener('click', function(e) {
        e.preventDefault();
        const container = document.querySelector('.foto-lainnya-container');
        const newItem = document.createElement('div');
        newItem.classList.add('foto-item');
        newItem.innerHTML = `
            <div style="flex: 1;">
                <label>Judul Foto</label>
                <input type="text" name="judul_foto[]" class="form-control" placeholder="Judul Foto">
            </div>
            &nbsp;&nbsp;
            <div style="flex: 1;">
                <label>Upload Foto</label>
                <input type="file" name="foto_lainnya[]" class="form-control">
            </div>
            <div class="foto-controls">
             <div class="row">
                <button type="button" class="tambah-foto">+</button>
                <button type="button" class="hapus-foto">-</button>
            </div>
            </div>
        `;
        container.appendChild(newItem);
    });

    // Menggunakan event delegation untuk tombol tambah dan hapus
    document.querySelector('.foto-lainnya-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('tambah-foto')) {
            const container = document.querySelector('.foto-lainnya-container');
            const newItem = document.createElement('div');
            newItem.classList.add('foto-item');
            newItem.innerHTML = `
                <div style="flex: 1;">
                    <label>Judul Foto</label>
                    <input type="text" name="judul_foto[]" class="form-control" placeholder="Judul Foto">
                </div>
                &nbsp;&nbsp;
                <div style="flex: 1;">
                    <label>Upload Foto</label>
                    <input type="file" name="foto_lainnya[]" class="form-control">
                </div>
                <div class="foto-controls">
                 <div class="row">
                    <button type="button" class="tambah-foto">+</button>
                    <button type="button" class="hapus-foto">-</button>
                </div>
                </div>
            `;
            container.appendChild(newItem);
        }

        if (e.target.classList.contains('hapus-foto')) {
            e.target.closest('.foto-item').remove();
        }
    });
</script>
