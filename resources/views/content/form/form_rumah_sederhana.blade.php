<div id="form-rumah-sederhana" style="display: none; margin-top: 20px;">
    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan" style="font-weight: bold;">Jenis Bangunan (Umur Ekonomis)</label>
        <br>
        <small class="form-text text-muted" style="margin-top: 5px;">Pilih jenis bangunan yang sesuai untuk menentukan umur ekonomis bangunan.</small>
        <select class="form-control" id="jenis_bangunan" name="jenis_bangunan">
            <option value="">- Select -</option>
            <option value="Bangunan Rumah Tinggal">Bangunan Rumah Tinggal</option>
            <option value="Bangunan Rumah Susun">Bangunan Rumah Susun</option>
            <option value="Pusat Perbelanjaan">Pusat Perbelanjaan</option>
            <option value="Bangunan Kantor">Bangunan Kantor</option>
            <option value="Bangunan Gedung Pemerintah">Bangunan Gedung Pemerintah</option>
            <option value="Bangunan Hotel/ Motel">Bangunan Hotel/ Motel</option>
            <option value="Bangunan Industri dan Gudang">Bangunan Industri dan Gudang</option>
            <option value="Bangunan di Kawasan Perkebunan">Bangunan di Kawasan Perkebunan</option>
        </select>

    </div>

    <div class="form-group" style="margin-top: 20px;">
        <label for="jenis_bangunan_indeks_lantai" style="font-weight: bold;">Jenis Bangunan (Indeks Lantai)</label>
        <br>
        <small class="form-text text-muted">Pilih jenis bangunan yg sesuai untuk menentukan indeks lantai MAPPI.</small>
        <select class="form-control" id="jenis_bangunan_indeks_lantai" name="jenis_bangunan_indeks_lantai">
            <option value="">- Select -</option>
            <option value="Rumah Tinggal Sederhana">Rumah Tinggal Sederhana (Simple Dwelling)</option>
            <option value="Rumah Tinggal Menengah">Rumah Tinggal Menengah (Medium Dwelling)</option>
            <option value="Rumah Tinggal Mewah">Rumah Tinggal Mewah (Luxury Dwelling)</option>
            <option value="Bangunan Gedung Bertingkat Low Rise">Bangunan Gedung Bertingkat Low Rise (&lt;5 Lantai) (Low-Rise Building &lt;5 Floors)</option>
            <option value="Bangunan Gedung Bertingkat Mid Rise">Bangunan Gedung Bertingkat Mid Rise (&lt;9 Lantai) (Mid-Rise Building &lt;9 Floors)</option>
            <option value="Bangunan Gedung Bertingkat High Rise">Bangunan Gedung Bertingkat High Rise (&gt;8 Lantai) (High-Rise Building &gt;8 Floors)</option>
        </select>
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_dibangun" style="font-weight: bold;">Tahun Dibangun</label>
        <input type="number" class="form-control" id="tahun_dibangun" name="tahun_dibangun" placeholder="Enter Year" min="1900" max="2024">
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="tahun_renovasi" style="font-weight: bold;">Tahun Renovasi</label>
        <input type="number" class="form-control" id="tahun_renovasi" name="tahun_renovasi" placeholder="Enter Year" min="1900" max="2024">
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="kondisi_visual" style="font-weight: bold;">Kondisi Bangunan Secara Visual</label>
        <select class="form-control" id="kondisi_visual" name="kondisi_visual">
            <option value="">- Select -</option>
            <option value="Rusak">Rusak</option>
            <option value="Kurang Baik">Kurang Baik</option>
            <option value="Cukup">Cukup</option>
            <option value="Baik">Baik</option>
            <option value="Baik Sekali">Baik Sekali</option>
            <option value="Baru">Baru</option>
        </select>
    </div>
    <div class="form-group" style="margin-top: 20px;">
        <label for="catatan_khusus" style="font-weight: bold;">Catatan Khusus Bangunan</label>
        <textarea class="form-control" id="catatan_khusus" name="catatan_khusus" rows="4" placeholder="Tambahkan catatan khusus di sini..."></textarea>
    </div>
    @include('content.form.LuasBangunanFisik')
</div>