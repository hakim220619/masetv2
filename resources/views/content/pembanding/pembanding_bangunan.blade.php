@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Bangunan')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.js', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/select2/select2.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/form-wizard-icons.js'])
@endsection

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />

    <style>
        .form-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        #canvasContainer {
            flex: 2;
            border: 1px solid #ccc;
            position: relative;
        }

        canvas {
            width: 100%;
            height: 500px;
        }

        .controls {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .controls button {
            margin: 5px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .controls button:hover {
            background-color: #0056b3;
        }

        .input-section {
            flex: 1;
            max-width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-section label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .input-section input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
    <style>
        .foto-lainnya-container {
            border: 1px solid #dee2e6;
            padding: 10px;
            border-radius: 5px;
        }

        .foto-lainnya-container .form-group {
            margin-bottom: 0;
        }

        .foto-lainnya-container label {
            font-weight: bold;
        }

        .foto-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 5px;
        }

        .foto-item input {
            margin-right: 5px;
        }

        .foto-controls button {
            background: none;
            border: none;
            color: #007bff;
            font-size: 18px;
        }

        .bg-section {
            background-color: none;
        }
    </style>

    @php
        // Ambil semua header unik dari tabel master_data
        $headers = DB::table('master_data')->select('label_header')->distinct()->pluck('label_header'); // Menghasilkan collection berisi semua header unik

        $dataBangunan = [];
        foreach ($headers as $header) {
            $dataBangunan[$header] = DB::table('master_data')
                ->where('label_header', $header)
                ->where('label_option', '!=', null)
                ->where('state', 'ON')
                ->get();
        }
    @endphp

    <h4>Data Pembanding – Tanah dan Bangunan</h4>
    <!-- Default -->
    <div class="row">
        <!-- Default Icons Wizard -->
        <div class="col-12 mb-4">
            <div class="content">
                <form method="POST" action="{{ route('store_pembanding_bangunan') }}" enctype="multipart/form-data">
                    <!-- Account Details -->
                    @csrf
                    <div id="account-details" class="content">
                        <div class="row g-3">
                            <div class="form-group mb-3">
                                <label for="nama_bangunan"><b>Nama Bangunan</b> <span class="text-danger">*</span></label>
                                <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                                    placeholder="Rumah Tinggal Pak Budi Sastro" required>
                            </div>
                            <div>
                                <label for="nama_kjpp"><b>Nama KJPP</b></label>
                                <input type="text" id="nama_kjpp" name="nama_kjpp" class="form-control"
                                    placeholder="Rumah Bapak Budi" />
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Lokasi Obyek"><b>Lokasi Obyek</b></label>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Lokasi Obyek</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label">Provinsi</label>
                                                <select id="provinsi" name="provinsi" class="form-select">
                                                    <option value="" selected>- Pilih Provinsi -</option>
                                                    <option value="1100_0.832">Nanggroe Aceh Darussalam</option>
                                                    <option value="1200_0.876">Sumatera Utara</option>
                                                    <option value="1300_0.822">Sumatera Barat</option>
                                                    <option value="1400_0.817">Riau</option>
                                                    <option value="1500_0.763">Jambi</option>
                                                    <option value="1600_0.851">Sumatera Selatan</option>
                                                    <option value="1700_0.805">Bengkulu</option>
                                                    <option value="1800_0.777">Lampung</option>
                                                    <option value="1900_0.877">Kepulauan Bangka Belitung</option>
                                                    <option value="2100_1.059">Kepulauan Riau</option>
                                                    <option value="3100_1.000">DKI Jakarta</option>
                                                    <option value="3200_0.835">Jawa Barat</option>
                                                    <option value="3300_0.803">Jawa Tengah</option>
                                                    <option value="3400_0.798">DI Yogyakarta</option>
                                                    <option value="3500_0.841">Jawa Timur</option>
                                                    <option value="3600_0.844">Banten</option>
                                                    <option value="5100_0.963">Bali</option>
                                                    <option value="5200_0.790">Nusa Tenggara Barat</option>
                                                    <option value="5300_0.828">Nusa Tenggara Timur</option>
                                                    <option value="6100_0.941">Kalimantan Barat</option>
                                                    <option value="6200_0.841">Kalimantan Tengah</option>
                                                    <option value="6300_0.877">Kalimantan Selatan</option>
                                                    <option value="6400_0.942">Kalimantan Timur</option>
                                                    <option value="6500_1.020">Kalimantan Utara</option>
                                                    <option value="7100_0.967">Sulawesi Utara</option>
                                                    <option value="7200_0.760">Sulawesi Tengah</option>
                                                    <option value="7300_0.824">Sulawesi Selatan</option>
                                                    <option value="7400_0.861">Sulawesi Tenggara</option>
                                                    <option value="7500_0.800">Gorontalo</option>
                                                    <option value="7600_0.764">Sulawesi Barat</option>
                                                    <option value="8100_1.044">Maluku</option>
                                                    <option value="8200_1.043">Maluku Utara</option>
                                                    <option value="9100_1.208">Papua Barat</option>
                                                    <option value="9400_1.983">Papua</option>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Kabupaten/Kota</label>
                                                <div id="kabupaten-container">
                                                    <!-- Pilihan kabupaten akan dimuat secara dinamis -->
                                                    <select id="kabupaten_default" name="kabupaten" class="form-select">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                    </select>

                                                    <!-- Kabupaten Aceh -->
                                                    <select id="kabupaten_1100" name="kabupaten" class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1101_0.913">Kab. Simeulue</option>
                                                        <option value="1102_0.802">Kab. Aceh Singkil</option>
                                                        <option value="1103_0.837">Kab. Aceh Selatan</option>
                                                        <option value="1104_0.840">Kab. Aceh Tenggara</option>
                                                        <option value="1105_0.854">Kab. Aceh Timur</option>
                                                        <option value="1106_0.885">Kab. Aceh Tengah</option>
                                                        <option value="1107_0.836">Kab. Aceh Barat</option>
                                                        <option value="1108_0.829">Kab. Aceh Besar</option>
                                                        <option value="1109_0.812">Kab. Pidie</option>
                                                        <option value="1110_0.867">Kab. Bireuen</option>
                                                        <option value="1111_0.872">Kab. Aceh Utara</option>
                                                        <option value="1112_0.815">Kab. Aceh Barat Daya</option>
                                                        <option value="1113_0.790">Kab. Gayo Lues</option>
                                                        <option value="1114_0.734">Kab. Aceh Tamiang</option>
                                                        <option value="1115_0.835">Kab. Nagan Raya</option>
                                                        <option value="1116_0.827">Kab. Aceh Jaya</option>
                                                        <option value="1117_0.855">Kab. Bener Meriah</option>
                                                        <option value="1118_0.756">Kab. Pidie Jaya</option>
                                                        <option value="1171_0.824">Kota Banda Aceh</option>
                                                        <option value="1172_0.895">Kota Sabang</option>
                                                        <option value="1173_0.819">Kota Langsa</option>
                                                        <option value="1174_0.841">Kota Lhokseumawe</option>
                                                        <option value="1175_0.814">Kota Subulussalam</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Utara -->
                                                    <select id="kabupaten_1200" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1201_0.960">Kab. Nias</option>
                                                        <option value="1202_0.879">Kab. Mandailing Natal</option>
                                                        <option value="1203_0.919">Kab. Tapanuli Selatan</option>
                                                        <option value="1204_0.862">Kab. Tapanuli Tengah</option>
                                                        <option value="1205_0.891">Kab. Tapanuli Utara</option>
                                                        <option value="1206_0.862">Kab. Toba Samosir</option>
                                                        <option value="1207_0.828">Kab. Labuhan Batu</option>
                                                        <option value="1208_0.889">Kab. Asahan</option>
                                                        <option value="1209_0.915">Kab. Simalungun</option>
                                                        <option value="1210_0.910">Kab. Dairi</option>
                                                        <option value="1211_0.896">Kab. Karo</option>
                                                        <option value="1212_0.862">Kab. Deli Serdang</option>
                                                        <option value="1213_0.739">Kab. Langkat</option>
                                                        <option value="1214_0.922">Kab. Nias Selatan</option>
                                                        <option value="1215_0.848">Kab. Humbang Hasundutan</option>
                                                        <option value="1216_0.847">Kab. Pakpak Bharat</option>
                                                        <option value="1217_0.924">Kab. Samosir</option>
                                                        <option value="1218_0.860">Kab. Serdang Bedagai</option>
                                                        <option value="1219_0.884">Kab. Batu Bara</option>
                                                        <option value="1220_0.881">Kab. Padang Lawas Utara</option>
                                                        <option value="1221_0.923">Kab. Padang Lawas</option>
                                                        <option value="1223_0.827">Kab. Labuhan Batu Utara</option>
                                                        <option value="1222_0.831">Kab. Labuhan Batu Selatan</option>
                                                        <option value="1224_0.904">Kab. Nias Utara</option>
                                                        <option value="1225_0.909">Kab. Nias Barat</option>
                                                        <option value="1271_0.867">Kota Sibolga</option>
                                                        <option value="1272_0.865">Kota Tanjungbalai</option>
                                                        <option value="1273_0.925">Kota Pematang Siantar</option>
                                                        <option value="1274_0.884">Kota Tebing Tinggi</option>
                                                        <option value="1275_0.896">Kota Medan</option>
                                                        <option value="1276_0.783">Kota Binjai</option>
                                                        <option value="1277_0.877">Kota Padangsidempuan</option>
                                                        <option value="1278_0.860">Kota Gunung Sitoli</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Barat -->
                                                    <select id="kabupaten_1300" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1301_1.192">Kab. Kepulauan Mentawai</option>
                                                        <option value="1302_0.787">Kab. Pesisir Selatan</option>
                                                        <option value="1303_0.823">Kab. Solok</option>
                                                        <option value="1304_0.795">Kab. Sijunjung (swl)</option>
                                                        <option value="1305_0.782">Kab. Tanah Datar</option>
                                                        <option value="1306_0.808">Kab. Padang Pariaman</option>
                                                        <option value="1307_0.821">Kab. Agam</option>
                                                        <option value="1308_0.844">Kab. Lima Puluh Kota</option>
                                                        <option value="1309_0.744">Kab. Pasaman</option>
                                                        <option value="1310_0.814">Kab. Solok Selatan</option>
                                                        <option value="1311_0.804">Kab. Dharmas Raya</option>
                                                        <option value="1312_0.817">Kab. Pasaman Barat</option>
                                                        <option value="1371_0.800">Kota Padang</option>
                                                        <option value="1372_0.787">Kota Solok</option>
                                                        <option value="1373_0.823">Kota Sawah Lunto</option>
                                                        <option value="1374_0.793">Kota Padang Panjang</option>
                                                        <option value="1375_0.824">Kota Bukittinggi</option>
                                                        <option value="1376_0.798">Kota Payakumbuh</option>
                                                        <option value="1377_0.842">Kota Pariaman</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_1400" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1401_0.750">Kab. Kuantan Singingi</option>
                                                        <option value="1402_0.795">Kab. Indragiri Hulu</option>
                                                        <option value="1403_0.847">Kab. Indragiri Hilir</option>
                                                        <option value="1404_0.821">Kab. Pelalawan</option>
                                                        <option value="1405_0.853">Kab. Siak</option>
                                                        <option value="1406_0.766">Kab. Kampar</option>
                                                        <option value="1407_0.744">Kab. Rokan Hulu</option>
                                                        <option value="1408_0.844">Kab. Bengkalis</option>
                                                        <option value="1409_0.861">Kab. Rokan Hilir</option>
                                                        <option value="1410_0.931">Kab. Kepulauan Meranti</option>
                                                        <option value="1471_0.750">Kota Pekanbaru</option>
                                                        <option value="1473_0.869">Kota Dumai</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_1500" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1501_0.663">Kab. Kerinci</option>
                                                        <option value="1502_0.736">Kab. Merangin</option>
                                                        <option value="1503_0.751">Kab. Sarolangun</option>
                                                        <option value="1504_0.752">Kab. Batang Hari</option>
                                                        <option value="1505_0.735">Kab. Muaro Jambi</option>
                                                        <option value="1506_0.815">Kab. Tanjung Jabung Timur</option>
                                                        <option value="1507_0.808">Kab. Tanjung Jabung Barat</option>
                                                        <option value="1508_0.774">Kab. Tebo</option>
                                                        <option value="1509_0.714">Kab. Bungo</option>
                                                        <option value="1571_0.749">Kota Jambi</option>
                                                        <option value="1572_0.760">Kota Sungai Penuh</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_1600" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1601_0.812">Kab. Ogan Komering Ulu</option>
                                                        <option value="1602_0.800">Kab. Ogan Komering Ilir</option>
                                                        <option value="1603_0.818">Kab. Muara Enim</option>
                                                        <option value="1604_0.815">Kab. Lahat</option>
                                                        <option value="1605_0.883">Kab. Musi Rawas</option>
                                                        <option value="1606_0.848">Kab. Musi Banyuasin</option>
                                                        <option value="1607_0.903">Kab. Banyu Asin</option>
                                                        <option value="1608_0.822">Kab. Oku Selatan</option>
                                                        <option value="1609_0.833">Kab. Oku Timur</option>
                                                        <option value="1610_0.905">Kab. Ogan Ilir</option>
                                                        <option value="1611_0.870">Kab. Empat Lawang</option>
                                                        <option value="1612_0.815">Kab. Penukal Abab Lematang Ilir</option>
                                                        <option value="1613_0.894">Kab. Musi Rawas Utara</option>
                                                        <option value="1671_0.848">Kota Palembang</option>
                                                        <option value="1672_0.844">Kota Prabumulih</option>
                                                        <option value="1673_0.865">Kota Pagar Alam</option>
                                                        <option value="1674_0.901">Kota Lubuklinggau</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_1700" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1701_0.773">Kab. Bengkulu Selatan</option>
                                                        <option value="1702_0.811">Kab. Rejang Lebong</option>
                                                        <option value="1703_0.794">Kab. Bengkulu Utara</option>
                                                        <option value="1704_0.781">Kab. Kaur</option>
                                                        <option value="1705_0.799">Kab. Seluma</option>
                                                        <option value="1706_0.887">Kab. Mukomuko</option>
                                                        <option value="1707_0.819">Kab. Lebong</option>
                                                        <option value="1708_0.778">Kab. Kepahiang</option>
                                                        <option value="1709_0.789">Kab. Bengkulu Tengah</option>
                                                        <option value="1771_0.822">Kota Bengkulu</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_1800" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1801_0.888">Kab. Lampung Barat</option>
                                                        <option value="1802_0.841">Kab. Tanggamus</option>
                                                        <option value="1803_0.721">Kab. Lampung Selatan</option>
                                                        <option value="1804_0.694">Kab. Lampung Timur</option>
                                                        <option value="1805_0.733">Kab. Lampung Tengah</option>
                                                        <option value="1806_0.746">Kab. Lampung Utara</option>
                                                        <option value="1807_0.814">Kab. Way Kanan</option>
                                                        <option value="1808_0.801">Kab. Tulang Bawang</option>
                                                        <option value="1809_0.755">Kab. Pesawaran</option>
                                                        <option value="1810_0.732">Kab. Pringsewu</option>
                                                        <option value="1811_0.858">Kab. Mesuji</option>
                                                        <option value="1812_0.801">Kab. Tulang Bawang Barat</option>
                                                        <option value="1813_0.897">Kab. Pesisir Barat</option>
                                                        <option value="1871_0.695">Kota Bandar Lampung</option>
                                                        <option value="1872_0.724">Kota Metro</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_1900" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="1901_0.851">Kab. Bangka</option>
                                                        <option value="1902_0.846">Kab. Belitung</option>
                                                        <option value="1903_0.906">Kab. Bangka Barat</option>
                                                        <option value="1904_0.921">Kab. Bangka Tengah</option>
                                                        <option value="1905_0.887">Kab. Bangka Selatan</option>
                                                        <option value="1906_0.841">Kab. Belitung Timur</option>
                                                        <option value="1971_0.893">Kota Pangkal Pinang</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_2100" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="" selected="selected" data-i="0">-
                                                            Select -</option>
                                                        <option value="2101_1.034">Kab. Karimun</option>
                                                        <option value="2102_1.003">Kab. Bintan</option>
                                                        <option value="2103_1.189">Kab. Natuna</option>
                                                        <option value="2104_0.889">Kab. Lingga</option>
                                                        <option value="2105_1.344">Kab. Kepulauan Anambas</option>
                                                        <option value="2171_1.005">Kota Batam</option>
                                                        <option value="2172_1.006">Kota Tanjung Pinang</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_3100" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="3101_1.096">Kab Kepulauan Seribu</option>
                                                        <option value="3102_1.000">Kota Jakarta Selatan</option>
                                                        <option value="3103_1.000">Kota Jakarta Timur</option>
                                                        <option value="3104_1.000">Kota Jakarta Pusat</option>
                                                        <option value="3105_1.000">Kota Jakarta Barat</option>
                                                        <option value="3106_1.000">Kota Jakarta Utara</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_3200" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="3201_0.938">Kab. Bogor</option>
                                                        <option value="3202_0.816">Kab. Sukabumi</option>
                                                        <option value="3203_0.783">Kab. Cianjur</option>
                                                        <option value="3204_0.854">Kab. Bandung</option>
                                                        <option value="3205_0.803">Kab. Garut</option>
                                                        <option value="3206_0.858">Kab. Tasikmalaya</option>
                                                        <option value="3207_0.778">Kab. Ciamis</option>
                                                        <option value="3208_0.844">Kab. Kuningan</option>
                                                        <option value="3209_0.870">Kab. Cirebon</option>
                                                        <option value="3210_0.837">Kab. Majalengka</option>
                                                        <option value="3211_0.803">Kab. Sumedang</option>
                                                        <option value="3212_0.889">Kab. Indramayu</option>
                                                        <option value="3213_0.821">Kab. Subang</option>
                                                        <option value="3214_0.894">Kab. Purwakarta</option>
                                                        <option value="3215_0.835">Kab. Karawang</option>
                                                        <option value="3216_0.851">Kab. Bekasi</option>
                                                        <option value="3217_0.781">Kab. Bandung Barat</option>
                                                        <option value="3218_0.772">Kab. Pangandaran</option>
                                                        <option value="3271_0.823">Kota Bogor</option>
                                                        <option value="3272_0.787">Kota Sukabumi</option>
                                                        <option value="3273_0.889">Kota Bandung</option>
                                                        <option value="3274_0.783">Kota Cirebon</option>
                                                        <option value="3275_0.885">Kota Bekasi</option>
                                                        <option value="3276_0.939">Kota Depok</option>
                                                        <option value="3277_0.862">Kota Cimahi</option>
                                                        <option value="3278_0.823">Kota Tasikmalaya</option>
                                                        <option value="3279_0.759">Kota Banjar</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_3300" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="3301_0.769">Kab. Cilacap</option>
                                                        <option value="3302_0.746">Kab. Banyumas</option>
                                                        <option value="3303_0.748">Kab. Purbalingga</option>
                                                        <option value="3304_0.779">Kab. Banjarnegara</option>
                                                        <option value="3305_0.731">Kab. Kebumen</option>
                                                        <option value="3306_0.771">Kab. Purworejo</option>
                                                        <option value="3307_0.783">Kab. Wonosobo</option>
                                                        <option value="3308_0.778">Kab. Magelang</option>
                                                        <option value="3309_0.806">Kab. Boyolali</option>
                                                        <option value="3310_0.802">Kab. Klaten</option>
                                                        <option value="3311_0.798">Kab. Sukoharjo</option>
                                                        <option value="3312_0.801">Kab. Wonogiri</option>
                                                        <option value="3313_0.813">Kab. Karanganyar</option>
                                                        <option value="3314_0.779">Kab. Sragen</option>
                                                        <option value="3315_0.842">Kab. Grobogan</option>
                                                        <option value="3316_0.837">Kab. Blora</option>
                                                        <option value="3317_0.842">Kab. Rembang</option>
                                                        <option value="3318_0.831">Kab. Pati</option>
                                                        <option value="3319_0.809">Kab. Kudus</option>
                                                        <option value="3320_0.864">Kab. Jepara</option>
                                                        <option value="3321_0.832">Kab. Demak</option>
                                                        <option value="3322_0.878">Kab. Semarang</option>
                                                        <option value="3323_0.797">Kab. Temanggung</option>
                                                        <option value="3324_0.808">Kab. Kendal</option>
                                                        <option value="3325_0.794">Kab. Batang</option>
                                                        <option value="3326_0.797">Kab. Pekalongan</option>
                                                        <option value="3327_0.872">Kab. Pemalang</option>
                                                        <option value="3328_0.766">Kab. Tegal</option>
                                                        <option value="3329_0.814">Kab. Brebes</option>
                                                        <option value="3371_0.804">Kota Magelang</option>
                                                        <option value="3372_0.853">Kota Surakarta</option>
                                                        <option value="3373_0.779">Kota Salatiga</option>
                                                        <option value="3374_0.797">Kota Semarang</option>
                                                        <option value="3375_0.809">Kota Pekalongan</option>
                                                        <option value="3376_0.789">Kota Tegal</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_3400" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="3401_0.787">Kab. Kulon Progo</option>
                                                        <option value="3402_0.815">Kab. Bantul</option>
                                                        <option value="3403_0.818">Kab. Gunung Kidul</option>
                                                        <option value="3404_0.773">Kab. Sleman</option>
                                                        <option value="3471_0.800">Kota Yogyakarta</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_3500" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="3501_0.850">Kab. Pacitan</option>
                                                        <option value="3502_0.861">Kab. Ponorogo</option>
                                                        <option value="3503_0.828">Kab. Trenggalek</option>
                                                        <option value="3504_0.843">Kab. Tulungagung</option>
                                                        <option value="3505_0.835">Kab. Blitar</option>
                                                        <option value="3506_0.804">Kab. Kediri</option>
                                                        <option value="3507_0.839">Kab. Malang</option>
                                                        <option value="3508_0.882">Kab. Lumajang</option>
                                                        <option value="3509_0.853">Kab. Jember</option>
                                                        <option value="3510_0.822">Kab. Banyuwangi</option>
                                                        <option value="3511_0.779">Kab. Bondowoso</option>
                                                        <option value="3512_0.787">Kab. Situbondo</option>
                                                        <option value="3513_0.846">Kab. Probolinggo</option>
                                                        <option value="3514_0.835">Kab. Pasuruan</option>
                                                        <option value="3515_0.893">Kab. Sidoarjo</option>
                                                        <option value="3516_0.819">Kab. Mojokerto</option>
                                                        <option value="3517_0.802">Kab. Jombang</option>
                                                        <option value="3518_0.800">Kab. Nganjuk</option>
                                                        <option value="3519_0.864">Kab. Madiun</option>
                                                        <option value="3520_0.873">Kab. Magetan</option>
                                                        <option value="3521_0.894">Kab. Ngawi</option>
                                                        <option value="3522_0.840">Kab. Bojonegoro</option>
                                                        <option value="3523_0.822">Kab. Tuban</option>
                                                        <option value="3524_0.893">Kab. Lamongan</option>
                                                        <option value="3525_0.863">Kab. Gresik</option>
                                                        <option value="3526_0.839">Kab. Bangkalan</option>
                                                        <option value="3527_0.890">Kab. Sampang</option>
                                                        <option value="3528_0.885">Kab. Pamekasan</option>
                                                        <option value="3529_0.871">Kab. Sumenep</option>
                                                        <option value="3571_0.804">Kota Kediri</option>
                                                        <option value="3572_0.851">Kota Blitar</option>
                                                        <option value="3573_0.832">Kota Malang</option>
                                                        <option value="3574_0.783">Kota Probolinggo</option>
                                                        <option value="3575_0.804">Kota Pasuruan</option>
                                                        <option value="3576_0.822">Kota Mojokerto</option>
                                                        <option value="3577_0.873">Kota Madiun</option>
                                                        <option value="3578_0.863">Kota Surabaya</option>
                                                        <option value="3579_0.841">Kota Batu</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_3600" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="3601_0.763">Kab. Pandeglang</option>
                                                        <option value="3602_0.729">Kab. Lebak</option>
                                                        <option value="3603_0.918">Kab. Tangerang</option>
                                                        <option value="3604_0.845">Kab. Serang</option>
                                                        <option value="3671_0.889">Kota Tangerang</option>
                                                        <option value="3672_0.868">Kota Cilegon</option>
                                                        <option value="3673_0.854">Kota Serang</option>
                                                        <option value="3674_0.909">Kota Tangerang Selatan</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_5100" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="5101_0.974">Kab. Jembrana</option>
                                                        <option value="5102_1.004">Kab. Tabanan</option>
                                                        <option value="5103_0.988">Kab. Badung</option>
                                                        <option value="5104_0.970">Kab. Gianyar</option>
                                                        <option value="5105_0.875">Kab. Klungkung</option>
                                                        <option value="5106_0.963">Kab. Bangli</option>
                                                        <option value="5107_0.920">Kab. Karangasem</option>
                                                        <option value="5108_1.022">Kab. Buleleng</option>
                                                        <option value="5171_0.961">Kota Denpasar</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_5200" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="5201_0.804">Kab. Lombok Barat</option>
                                                        <option value="5202_0.787">Kab. Lombok Tengah</option>
                                                        <option value="5203_0.761">Kab. Lombok Timur</option>
                                                        <option value="5204_0.778">Kab. Sumbawa</option>
                                                        <option value="5205_0.812">Kab. Dompu</option>
                                                        <option value="5206_0.770">Kab. Bima</option>
                                                        <option value="5207_0.842">Kab. Sumbawa Barat</option>
                                                        <option value="5208_0.733">Kab. Lombok Utara</option>
                                                        <option value="5271_0.820">Kota Mataram</option>
                                                        <option value="5272_0.803">Kota Bima</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_5300" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="5301_0.895">Kab. Sumba Barat</option>
                                                        <option value="5302_0.822">Kab. Sumba Timur</option>
                                                        <option value="5303_0.761">Kab. Kupang</option>
                                                        <option value="5304_0.789">Kab. Timor Tengah Selatan</option>
                                                        <option value="5305_0.719">Kab. Timor Tengah Utara</option>
                                                        <option value="5306_0.754">Kab. Belu</option>
                                                        <option value="5307_0.896">Kab. Alor</option>
                                                        <option value="5308_0.815">Kab. Lembata</option>
                                                        <option value="5309_0.922">Kab. Flores Timur</option>
                                                        <option value="5310_0.772">Kab. Sikka</option>
                                                        <option value="5311_0.824">Kab. Ende</option>
                                                        <option value="5312_0.841">Kab. Ngada</option>
                                                        <option value="5313_0.818">Kab. Manggarai</option>
                                                        <option value="5314_0.887">Kab. Rote Ndao</option>
                                                        <option value="5315_0.790">Kab. Manggarai Barat</option>
                                                        <option value="5317_0.869">Kab. Sumba Barat Daya</option>
                                                        <option value="5316_0.858">Kab. Sumba Tengah</option>
                                                        <option value="5318_0.861">Kab. Nagekeo</option>
                                                        <option value="5319_0.829">Kab. Manggarai Timur</option>
                                                        <option value="5320_0.969">Kab. Sabu Raijua</option>
                                                        <option value="5321_0.782">Kab. Malaka</option>
                                                        <option value="5371_0.782">Kota Kupang</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_6100" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="6101_1.018">Kab. Sambas</option>
                                                        <option value="6102_0.945">Kab. Bengkayang</option>
                                                        <option value="6103_0.954">Kab. Landak</option>
                                                        <option value="6104_0.965">Kab. Pontianak</option>
                                                        <option value="6105_0.960">Kab. Sanggau</option>
                                                        <option value="6106_0.955">Kab. Ketapang</option>
                                                        <option value="6107_0.890">Kab. Sintang</option>
                                                        <option value="6108_1.055">Kab. Kapuas Hulu</option>
                                                        <option value="6109_0.909">Kab. Sekadau</option>
                                                        <option value="6110_0.948">Kab. Melawi</option>
                                                        <option value="6111_0.919">Kab. Kayong Utara</option>
                                                        <option value="6112_0.936">Kab. Kubu Raya</option>
                                                        <option value="6171_0.836">Kota Pontianak</option>
                                                        <option value="6172_0.907">Kota Singkawang</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_6200" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="6201_0.771">Kab. Kota Waringin Barat</option>
                                                        <option value="6202_0.814">Kab. Kota Waringin Timur</option>
                                                        <option value="6203_0.753">Kab. Kapuas</option>
                                                        <option value="6204_0.846">Kab. Barito Selatan</option>
                                                        <option value="6205_0.848">Kab. Barito Utara</option>
                                                        <option value="6206_0.888">Kab. Sukamara</option>
                                                        <option value="6207_0.834">Kab. Lamandau</option>
                                                        <option value="6208_0.825">Kab. Seruyan</option>
                                                        <option value="6209_0.813">Kab. Katingan</option>
                                                        <option value="6210_0.834">Kab. Pulang Pisau</option>
                                                        <option value="6211_0.859">Kab. Gunung Mas</option>
                                                        <option value="6212_0.810">Kab. Barito Timur</option>
                                                        <option value="6213_0.989">Kab. Murung Raya</option>
                                                        <option value="6271_0.821">Kota Palangkaraya</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_6300" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="6301_0.820">Kab. Tanah Laut</option>
                                                        <option value="6302_0.877">Kab. Kota Baru</option>
                                                        <option value="6303_0.851">Kab. Banjar</option>
                                                        <option value="6304_0.878">Kab. Barito Kuala</option>
                                                        <option value="6305_0.842">Kab. Tapin</option>
                                                        <option value="6306_0.876">Kab. Hulu Sungai Selatan</option>
                                                        <option value="6307_0.868">Kab. Hulu Sungai Tengah</option>
                                                        <option value="6308_0.934">Kab. Hulu Sungai Utara</option>
                                                        <option value="6309_0.880">Kab. Tabalong</option>
                                                        <option value="6310_0.839">Kab. Tanah Bumbu</option>
                                                        <option value="6311_0.915">Kab. Balangan</option>
                                                        <option value="6371_0.918">Kota Banjarmasin</option>
                                                        <option value="6372_0.911">Kota Banjarbaru</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_6400" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="6401_0.855">Kab. Paser</option>
                                                        <option value="6402_0.992">Kab. Kutai Barat</option>
                                                        <option value="6403_0.870">Kab. Kutai Kartanegara</option>
                                                        <option value="6404_0.997">Kab. Kutai Timur</option>
                                                        <option value="6405_0.899">Kab. Berau</option>
                                                        <option value="6409_0.891">Kab. Penajam Paser Utara</option>
                                                        <option value="6411_1.244">Kab. Mahakam Ulu</option>
                                                        <option value="6471_0.872">Kota Balikpapan</option>
                                                        <option value="6472_0.924">Kota Samarinda</option>
                                                        <option value="6474_0.932">Kota Bontang</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten6500" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="6501_0.963">Kab. Malinau</option>
                                                        <option value="6502_0.927">Kab. Bulungan</option>
                                                        <option value="6504_1.236">Kab. Nunukan</option>
                                                        <option value="6503_0.986">Kab. Tana Tidung</option>
                                                        <option value="6571_0.893">Kota Tarakan</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_7100" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="7101_0.886">Kab. Bolaang Mongondow</option>
                                                        <option value="7102_0.929">Kab. Minahasa</option>
                                                        <option value="7103_1.052">Kab. Kepulauan Sangihe</option>
                                                        <option value="7104_1.106">Kab. Kepulauan Talaud</option>
                                                        <option value="7105_0.957">Kab. Minahasa Selatan</option>
                                                        <option value="7106_0.967">Kab. Minahasa Utara</option>
                                                        <option value="7107_0.929">Kab. Bolaang Mongondow Utara</option>
                                                        <option value="7108_1.037">Kab. Kep. Siau Tagulandang Biaro
                                                            (sitaro)</option>
                                                        <option value="7109_0.946">Kab. Minahasa Tenggara</option>
                                                        <option value="7110_0.829">Kab. Bolaang Mongondow Selatan</option>
                                                        <option value="7111_0.976">Kab. Bolaang Mongondow Timur</option>
                                                        <option value="7171_0.930">Kota Manado</option>
                                                        <option value="7172_1.012">Kota Bitung</option>
                                                        <option value="7173_0.980">Kota Tomohon</option>
                                                        <option value="7174_0.996">Kota Kotamobagu</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_7200" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="7201_0.855">Kab. Banggai Kepulauan</option>
                                                        <option value="7202_0.762">Kab. Banggai</option>
                                                        <option value="7203_0.787">Kab. Morowali</option>
                                                        <option value="7204_0.726">Kab. Poso</option>
                                                        <option value="7205_0.660">Kab. Donggala</option>
                                                        <option value="7206_0.786">Kab. Toli-toli</option>
                                                        <option value="7207_0.793">Kab. Buol</option>
                                                        <option value="7208_0.721">Kab. Parigi Moutong</option>
                                                        <option value="7209_0.788">Kab. Tojo Una-una</option>
                                                        <option value="7210_0.702">Kab. Sigi</option>
                                                        <option value="7211_0.828">Kab. Banggai Laut</option>
                                                        <option value="7212_0.800">Kab. Morowali Utara</option>
                                                        <option value="7271_0.702">Kota Palu</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_7300" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="7301_0.823">Kab. Kepulauan Selayar</option>
                                                        <option value="7302_0.796">Kab. Bulukumba</option>
                                                        <option value="7303_0.776">Kab. Bantaeng</option>
                                                        <option value="7304_0.825">Kab. Jeneponto</option>
                                                        <option value="7305_0.770">Kab. Takalar</option>
                                                        <option value="7306_0.723">Kab. Gowa</option>
                                                        <option value="7307_0.809">Kab. Sinjai</option>
                                                        <option value="7308_0.808">Kab. Maros</option>
                                                        <option value="7309_0.820">Kab. Pangkajene &amp; Kepulauan</option>
                                                        <option value="7310_0.767">Kab. Barru</option>
                                                        <option value="7311_0.845">Kab. Bone</option>
                                                        <option value="7312_0.840">Kab. Soppeng</option>
                                                        <option value="7313_0.835">Kab. Wajo</option>
                                                        <option value="7314_0.848">Kab. Sidenreng Rappang</option>
                                                        <option value="7315_0.843">Kab. Pinrang</option>
                                                        <option value="7316_0.853">Kab. Enrekang</option>
                                                        <option value="7317_0.864">Kab. Luwu</option>
                                                        <option value="7318_0.897">Kab. Tana Toraja</option>
                                                        <option value="7326_0.830">Kab. Toraja Utara</option>
                                                        <option value="7322_0.886">Kab. Luwu Utara</option>
                                                        <option value="7325_0.879">Kab. Luwu Timur</option>
                                                        <option value="7371_0.814">Kota Makassar</option>
                                                        <option value="7372_0.823">Kota Parepare</option>
                                                        <option value="7373_0.836">Kota Palopo</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_7400" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="7401_0.839">Kab. Buton</option>
                                                        <option value="7402_0.879">Kab. Muna</option>
                                                        <option value="7403_0.835">Kab. Konawe</option>
                                                        <option value="7404_0.788">Kab. Kolaka</option>
                                                        <option value="7405_0.786">Kab. Konawe Selatan</option>
                                                        <option value="7406_0.833">Kab. Bombana</option>
                                                        <option value="7407_0.945">Kab. Wakatobi</option>
                                                        <option value="7408_0.875">Kab. Kolaka Utara</option>
                                                        <option value="7409_0.986">Kab. Buton Utara</option>
                                                        <option value="7410_0.767">Kab. Konawe Utara</option>
                                                        <option value="7412_0.790">Kab. Konawe Kepulauan</option>
                                                        <option value="7411_0.916">Kab. Kolaka Timur</option>
                                                        <option value="7413_0.912">Kab. Muna Barat</option>
                                                        <option value="7414_0.917">Kab. Buton Tengah</option>
                                                        <option value="7415_0.890">Kab. Buton Selatan</option>
                                                        <option value="7471_0.799">Kota Kendari</option>
                                                        <option value="7472_0.910">Kota Bau-bau</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_7500" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="7501_0.762">Kab. Boalemo</option>
                                                        <option value="7502_0.807">Kab. Gorontalo</option>
                                                        <option value="7503_0.825">Kab. Pohuwato</option>
                                                        <option value="7504_0.761">Kab. Bone Bolango</option>
                                                        <option value="7505_0.847">Kab. Gorontalo Utara</option>
                                                        <option value="7571_0.802">Kota Gorontalo</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_7600" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="7601_0.696">Kab. Majene</option>
                                                        <option value="7602_0.716">Kab. Polewali Mandar</option>
                                                        <option value="7603_0.822">Kab. Mamasa</option>
                                                        <option value="7604_0.741">Kab. Mamuju</option>
                                                        <option value="7605_0.719">Kab. Mamuju Utara</option>
                                                        <option value="7606_0.743">Kab. Mamuju Tengah</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_8100" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="8101_1.022">Kab. Maluku Tenggara Barat</option>
                                                        <option value="8102_1.127">Kab. Maluku Tenggara</option>
                                                        <option value="8103_0.924">Kab. Maluku Tengah</option>
                                                        <option value="8104_1.040">Kab. Buru</option>
                                                        <option value="8105_1.068">Kab. Kepulauan Aru</option>
                                                        <option value="8106_0.927">Kab. Seram Bagian Barat</option>
                                                        <option value="8107_0.976">Kab. Seram Bagian Timur</option>
                                                        <option value="8109_1.254">Kab. Buru Selatan</option>
                                                        <option value="8108_1.156">Kab. Maluku Barat Daya</option>
                                                        <option value="8171_0.905">Kota Ambon</option>
                                                        <option value="8172_1.147">Kota Tual</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_8200" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="8201_1.065">Kab. Halmahera Barat</option>
                                                        <option value="8202_1.104">Kab. Halmahera Tengah</option>
                                                        <option value="8203_1.074">Kab. Kepulauan Sula</option>
                                                        <option value="8204_0.943">Kab. Halmahera Selatan</option>
                                                        <option value="8205_1.072">Kab. Halmahera Utara</option>
                                                        <option value="8206_1.022">Kab. Halmahera Timur</option>
                                                        <option value="8207_0.948">Kab. Pulau Morotai</option>
                                                        <option value="8208_1.037">Kab. Pulau Taliabu</option>
                                                        <option value="8271_1.117">Kota Ternate</option>
                                                        <option value="8272_1.064">Kota Tidore Kepulauan</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_9100" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="9101_1.169">Kab. Fak-fak</option>
                                                        <option value="9102_1.153">Kab. Kaimana</option>
                                                        <option value="9103_1.139">Kab. Teluk Wondama</option>
                                                        <option value="9104_1.274">Kab. Teluk Bintuni</option>
                                                        <option value="9105_1.132">Kab. Manokwari</option>
                                                        <option value="9106_1.085">Kab. Sorong Selatan</option>
                                                        <option value="9107_1.024">Kab. Sorong</option>
                                                        <option value="9108_1.233">Kab. Raja Ampat</option>
                                                        <option value="9110_1.398">Kab. Maybrat</option>
                                                        <option value="9109_1.187">Kab. Tambrauw</option>
                                                        <option value="9111_1.235">Kab. Manokwari Selatan</option>
                                                        <option value="9112_1.838">Kab. Pegunungan Arfak</option>
                                                        <option value="9171_1.023">Kota Sorong</option>
                                                    </select>

                                                    <!-- Kabupaten Sumatera Riau -->
                                                    <select id="kabupaten_9400" name="kabupaten"
                                                        class="form-select d-none">
                                                        <option value="" selected>- Pilih Kabupaten/Kota -</option>
                                                        <option value="9401_1.452">Kab. Merauke</option>
                                                        <option value="9402_2.505">Kab. Jayawijaya</option>
                                                        <option value="9403_1.187">Kab. Jayapura</option>
                                                        <option value="9404_1.273">Kab. Nabire</option>
                                                        <option value="9408_1.251">Kab. Kep. Yapen (yapen Waropen)</option>
                                                        <option value="9409_1.227">Kab. Biak Numfor</option>
                                                        <option value="9410_1.944">Kab. Paniai</option>
                                                        <option value="9411_3.769">Kab. Puncak Jaya</option>
                                                        <option value="9412_1.277">Kab. Mimika</option>
                                                        <option value="9413_1.478">Kab. Boven Digoel</option>
                                                        <option value="9414_1.557">Kab. Mappi</option>
                                                        <option value="9415_1.996">Kab. Asmat</option>
                                                        <option value="9416_2.094">Kab. Yahukimo</option>
                                                        <option value="9417_3.377">Kab. Pegunungan Bintang</option>
                                                        <option value="9418_3.030">Kab. Tolikara</option>
                                                        <option value="9419_1.630">Kab. Sarmi</option>
                                                        <option value="9420_1.388">Kab. Keerom</option>
                                                        <option value="9426_1.406">Kab. Waropen</option>
                                                        <option value="9427_1.301">Kab. Supiori</option>
                                                        <option value="9428_1.663">Kab. Mamberamo Raya</option>
                                                        <option value="9429_2.746">Kab. Nduga</option>
                                                        <option value="9430_2.872">Kab. Lanny Jaya</option>
                                                        <option value="9431_3.483">Kab. Mamberamo Tengah</option>
                                                        <option value="9432_2.967">Kab. Yalimo</option>
                                                        <option value="9433_4.054">Kab. Puncak</option>
                                                        <option value="9434_1.807">Kab. Dogiyai</option>
                                                        <option value="9435_3.559">Kab. Intan Jaya</option>
                                                        <option value="9436_1.978">Kab. Deiyai</option>
                                                        <option value="9471_1.269">Kota Jayapura</option>
                                                    </select>

                                                    <!-- Kabupaten untuk provinsi lainnya... -->
                                                    <!-- (Silakan tambahkan semua kabupaten untuk provinsi lainnya dengan pola yang sama) -->
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Kecamatan</label>
                                                <input type="text" id="kecamatan" name="kecamatan"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label">Kelurahan</label>
                                                <input type="text" id="kelurahan" name="kelurahan"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Jalan/No/RT/RW</label>
                                                <input type="text" id="jalan" name="jalan"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Kode Pos</label>
                                                <input type="text" id="kode_pos" name="kode_pos"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="jenis_properti"><b>Jenis Properti</b></label>
                                <input type="text" id="id_jenis_properti" name="jenis_properti" class="form-control"
                                    placeholder="Contoh : Rumah Tinggal, Ruko, dll" />
                            </div>
                            <div class="form-group mb-3">
                                <label><b>Jenis Bangunan</b></label><br>
                                <input type="checkbox" id="id_jenis_bangunan" name="id_jenis_bangunan"
                                    value="Ruko/Rukan">
                                <label for="id_jenis_bangunan">Ruko/Rukan</label>
                            </div>
                            <div id="keteranganField">
                                <label for="kpt_tabel_analisis_ruko"><b>Keterangan Peruntukan Tanah
                                        pada
                                        Tabel Analisis Ruko</b></label>
                                <input type="text" id="kpt_tabel_analisis_ruko" name="kpt_tabel_analisis_ruko"
                                    class="form-control" placeholder="Berperuntukan Ruko" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="kdn_tabel_analisis"><b>Keterangan Dasar Nilai pada Tabel
                                        Analisis</b></label>
                                <input type="text" id="kdn_tabel_analisis" name="kdn_tabel_analisis"
                                    class="form-control"
                                    placeholder="Indikasi Nilai Liquidasi / Nilai Investasi / Nilai Sewa Pasar" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat"><b>Koordinat Obyek</b></label>
                                <label for="alamat"><b>Alamat</b></label>
                                <input type="text" id="alamat" name="alamat" class="form-control mb-2"
                                    placeholder="jl sukasari kecamatan baleendah bandung" readonly />
                                <div id="map" style="height: 400px; width: 100%;"></div>
                                <input type="text" id="lat" name="lat" class="form-control"
                                    placeholder="-8.9897878" hidden />
                                <input type="text" id="long" name="long" class="form-control"
                                    placeholder="89.8477748" hidden />
                            </div>
                            <div>
                                <label for="foto_tampak_depan"><b>Upload Foto Tampak
                                        Depan</b></label>
                                <input type="file" id="foto_tampak_depan" name="foto_tampak_depan"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="foto_tampak_sisi_kiri"><b>Upload Foto Tampak Sisi
                                        Kiri</b></label>
                                <input type="file" id="foto_tampak_sisi_kiri" name="foto_tampak_sisi_kiri"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="foto_tampak_sisi_kanan"><b>Upload Foto Tampak Sisi
                                        Kanan</b></label>
                                <input type="file" id="foto_tampak_sisi_kanan" name="foto_tampak_sisi_kanan"
                                    class="form-control" />
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Foto Lainnya"><b>Foto Lainnya</b></label>
                                <table class="table table-bordered" id="fotoLainnyaTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul Foto</th>
                                            <th>Upload Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="row-number-foto">1</td>
                                            <td><input type="text" name="judul_foto[]" class="form-control" />
                                            </td>
                                            <td><input type="file" id="foto_lainnya" name="foto_lainnya[]"
                                                    class="form-control" accept="image/*" /></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm btn-action"
                                                    onclick="addFotoRow()">+</button>
                                                <button type="button" class="btn btn-danger btn-sm btn-action"
                                                    onclick="removeFotoRow(this)">-</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="Nilai Perolehan"><b>Nilai Perolehan / NJOP /
                                        PBB</b></label>
                                <table class="table table-bordered" id="njopTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Nilai Perolehan / NJOP (Rp)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="row-number">1</td>
                                            <td><input type="number" id="tahun_njop" name="tahun_njop[]"
                                                    class="form-control" placeholder="2024" /></td>
                                            <td><input type="number" id="nilai_njop" name="nilai_njop[]"
                                                    class="form-control" placeholder="4257000000" /></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm btn-action"
                                                    onclick="addNjopRow()">+</button>
                                                <button type="button" class="btn btn-danger btn-sm btn-action"
                                                    onclick="removeNjopRow(this)">-</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="narasumber"><b>Narasumber</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Nama Narasumber</b></th>
                                        <th><b>Telepon</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" id="nama_narsum" name="nama_narsum"
                                                class="form-control" placeholder="Bapak Ahmad Sudani" /></td>
                                        <td><input type="number" id="telepon" name="telepon" class="form-control"
                                                placeholder="087654354243" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <div>
                                    <label for="jenis_dok_hak_tanah"><b>Jenis Dokumen Hak
                                            Tanah</b></label>
                                    <select name="jenis_dok_hak_tanah" id="jenis_dok_hak_tanah" class="form-select">
                                        <option value="">Pilih..</option>
                                        <option value="Hak Milik">Hak Milik</option>
                                        <option value="Hak Guna Bangunan">Hak Guna Bangunan</option>
                                        <option value="Hak Guna Usaha">Hak Guna Usaha</option>
                                        <option value="Hak Pakai">Hak Pakai</option>
                                        <option value="Hak Milik Satuan Rumah Susun">Hak Milik Satuan Rumah Susun
                                        </option>
                                        <option value="Girik">Girik</option>
                                        <option value="Akad Jual Beli">Akad Jual Beli</option>
                                        <option value="Perjanjian Pengikatan Jual Beli">Perjanjian Pengikatan Jual Beli
                                        </option>
                                        <option value="Surat Hijau">Surat Hijau</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Personal Info -->
                    <div id="personal-info" class="content">
                        <div class="row g-3">
                            <hr>
                            <div class="bg-section p-3 rounded">
                                <label for="perutuntukan_kawasan"><b>Peruntukan Kawasan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Zona Lindung</b></th>
                                        <th><b>Zona Budi Daya</b></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="zona_lindung" id="zona_lindung"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Zona Hutan Lindung">Zona Hutan Lindung</option>
                                                <option value="Zona Perlindungan Terhadap Kawasan Dibawahnya">Zona
                                                    Perlindungan Terhadap Kawasan Dibawahnya</option>
                                                <option value="Zona Perlindungan Setempat">Zona Perlindungan Setempat
                                                </option>
                                                <option value="Zona Ruang Terbuka Hijau">Zona Ruang Terbuka Hijau
                                                </option>
                                                <option value="Zona Suaka Alam dan Cagar Budaya">Zona Suaka Alam dan
                                                    Cagar Budaya</option>
                                                <option value="Zona Rawan Bencana Alam">Zona Rawan Bencana Alam
                                                </option>
                                                <option value="Zona Lainnya">Zona Lainnya</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="zona_budidaya" id="zona_budidaya"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Zona Perumahan">Zona Perumahan</option>
                                                <option value="Zona Perdagangan dan Jasa">Zona Perdagangan dan Jasa
                                                </option>
                                                <option value="Zona Perkantoran">Zona Perkantoran</option>
                                                <option value="Zona Sarana Pelayanan Umum">Zona Sarana Pelayanan Umum
                                                </option>
                                                <option value="Zona Indiustri">Zona Indiustri</option>
                                                <option value="Zona Ruang Terbuka Non Hijau">Zona Ruang Terbuka Non
                                                    Hijau</option>
                                                <option value="Zona Peruntukan Lainnya">Zona Peruntukan Lainnya
                                                </option>
                                                <option value="Zona Peruntukan Khusus">Zona Peruntukan Khusus</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="jenis_data"><b>Jenis Data</b></label>
                                <select class="form-select" name="jenis_data" id="jenis_data"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Penawaran">Penawaran</option>
                                    <option value="Transaksi">Transaksi</option>
                                    <option value="Price on Offer">Price on Offer</option>
                                </select>
                            </div>
                            <div>
                                <label for="tgl_penawaran"><b>Tanggal Penawaran / Waktu
                                        Transaksi</b></label>
                                <input type="datetime-local" id="tgl_penawaran" name="tgl_penawaran"
                                    class="form-control" />
                            </div>
                            <div>
                                <label for="sumber_data"><b>Sumber Data</b></label>
                                <select class="form-select" name="sumber_data" id="sumber_data"
                                    aria-label="Default select example">
                                    <option value="" disabled selected>Pilih sumber data</option>
                                    <option value="Pemilik">Pemilik</option>
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="Agen">Agen</option>
                                </select>
                            </div>
                            <div>
                                <label for="luas_tanah"><b>Luas Tanah (m2)</b></label>
                                <input type="number" id="luas_tanah" name="luas_tanah" class="form-control"
                                    placeholder="44" />
                            </div>
                            <div>
                                <label for="luas_tanah_terpotong"><b>Luas Tanah Terpotong
                                        (m2)</b></label>
                                <input type="number" id="luas_tanah_terpotong" name="luas_tanah_terpotong"
                                    class="form-control" placeholder="44" />
                            </div>
                            <div>
                                <label for="luas_bangunan"><b>Luas Bangunan Terpotong
                                        (m2)</b></label>
                                <input type="number" id="luas_bangunan" name="luas_bangunan" class="form-control"
                                    placeholder="44" />
                            </div>
                            <div>
                                <label for="harga_penawaran"><b>Harga Penawaran/Transaksi
                                        (Rp)</b></label>
                                <input type="text" id="harga_penawaran" name="harga_penawaran" class="form-control"
                                    placeholder="4257000000" />
                            </div>
                            <div>
                                <label for="diskon"><b>Diskon (%)</b></label>
                                <input type="number" id="diskon" name="diskon" class="form-control"
                                    placeholder="44" />
                            </div>
                            <div>
                                <label for="harga_sewa_per_tahun"><b>Harga Sewa per Tahun
                                        (Rp/tahun)</b></label>
                                <input type="number" id="harga_sewa_per_tahun" name="harga_sewa_per_tahun"
                                    class="form-control" placeholder="4257000000" />
                            </div>
                            <div>
                                <label for="skrap"><b>Skrap / Nilai Sisa (%)</b></label>
                                <input type="number" id="skrap" name="skrap" class="form-control"
                                    placeholder="44" />
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="penyusutan"><b>Penyusutan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Kemunduran Fungsi (%)</b></th>
                                        <th><b>Penjelasan Kemunduran Fungsi</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="kemunduran_fungsi" name="kemunduran_fungsi"
                                                value="0" class="form-control" /></td>
                                        <td>
                                            <textarea class="form-control" name="penjelasan_kemunduran_fungsi" id="penjelasan_kemunduran_fungsi"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><b>Kemunduran Ekonomis (%)</b></th>
                                        <th><b>Penjelasan Kemunduran Ekonomis</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="kemunduran_ekonomis" name="kemunduran_ekonomis"
                                                value="0" class="form-control" /></td>
                                        <td>
                                            <textarea class="form-control" name="penjelasan_kemunduran_ekonomis" id="penjelasan_kemunduran_ekonomis"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><b>Maintenance (%)</b></th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="maintenance" name="maintenance" value="0"
                                                class="form-control" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="penyesuaian_elemen_perbandingan"><b>Penyesuaian Elemen
                                        Perbandingan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th><b>Syarat Pembiayaan
                                                Batasan dilakukan pelunasan pembayaran (Kelunakan)
                                            </b>
                                        </th>
                                        <th><b>Kondisi Penjualan
                                                Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan Kondisi Pemaksa
                                            </b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="pep_pembiayaan" id="pep_pembiayaan"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Tunai">Tunai</option>
                                                <option value="Kredit">Kredit</option>
                                                <option value="Bertahap">Bertahap</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="pep_penjualan" id="pep_penjualan"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Jual Cepat">Jual Cepat</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pengeluaran yang dilakukan segera setelah pembelian
                                            Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke fungsi atau
                                            peruntukan awal atau seharusnya
                                        </th>
                                        <th>
                                            Kondisi Pasar
                                            Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga penawaran
                                            (Menggunakan Indikator Waktu Penawaran / Transaksi)
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" id="pep_pengeluaran" name="pep_pengeluaran"
                                                placeholder="Tidak Ada" class="form-control" /></td>
                                        <td><input type="text" id="pep_pasar" name="pep_pasar"
                                                placeholder="Normal" class="form-control" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="penggunaan"><b>Penggunaan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            <b>Koefisien Dasar Bangunan (KDB) (%)</b>
                                        </th>
                                        <th>
                                            <b>Koefisien Lantai Bangunan (KLB) (kali)</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="koefisien_dasar_bangunan"
                                                name="koefisien_dasar_bangunan" class="form-control" /></td>
                                        <td><input type="number" id="koefisien_lantai_bangunan"
                                                name="koefisien_lantai_bangunan" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Garis Sempadan Bangunan (GSB) (meter)</b>
                                        </th>
                                        <th>
                                            <b>Ketinggian (lantai)</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" id="garis_sempadan_bangunan"
                                                name="garis_sempadan_bangunan" class="form-control" /></td>
                                        <td><input type="number" id="ketinggian" name="ketinggian"
                                                class="form-control" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="row_jalan"><b>Row Jalan (m)</b></label>
                                <input type="number" id="row_jalan" name="row_jalan" class="form-control"
                                    placeholder="12" />
                            </div>
                            <div>
                                <label for="tipe_jalan"><b>Tipe Jalan</b></label>
                                <input type="text" id="tipe_jalan" name="tipe_jalan" class="form-control"
                                    placeholder="Aspal" />
                            </div>
                            <div>
                                <label for="kapasitas_jalan"><b>Kapasitas Jalan</b></label>
                                <input type="text" id="kapasitas_jalan" name="kapasitas_jalan"
                                    class="form-control" placeholder="> 1 Kendaraan Roda 4" />
                            </div>
                            <div>
                                <label for="pengguna_lahan_lingkungan_eksisting"><b>Penggunaan
                                        Lahan
                                        Lingkungan Eksisting</b></label>
                                <select class="form-select" name="pengguna_lahan_lingkungan_eksisting"
                                    id="pengguna_lahan_lingkungan_eksisting" aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Pemukiman/Perumahan">Pemukiman/Perumahan</option>
                                    <option value="Campuran">Campuran</option>
                                </select>
                            </div>
                            <div>
                                <label for="letak_posisi_obyek"><b>Letak / Posisi Obyek</b></label>
                                <select name="letak_posisi_obyek" id="letak_posisi_obyek" class="form-select">
                                    <option value="">Pilih...</option>
                                    <option value="Kuldesak">Kuldesak</option>
                                    <option value="Interior">Interior</option>
                                    <option value="Tusuk Sate">Tusuk Sate</option>
                                    <option value="Sudut(Corner)">Sudut(Corner)</option>
                                    <option value="Key">Key</option>
                                    <option value="Flag">Flag</option>
                                </select>
                            </div>
                            <div>
                                <label for="lokasi_aset"><b>Lokasi Aset</b></label>
                                <select class="form-select" name="lokasi_aset" id="lokasi_aset"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Depan">Depan</option>
                                    <option value="Tengah">Tengah</option>
                                    <option value="Belakang">Belakang</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Address -->
                    <div id="address" class="content">

                        <div class="row g-3 mt-1">
                            <div>
                                <label for="bentuk_tanah"><b>Bentuk Tanah</b></label>
                                <select name="bentuk_tanah" id="bentuk_tanah" class="form-select">
                                    <option value="">Pilih...</option>
                                    <option value="Beraturan">Beraturan</option>
                                    <option value="Tidak Beraturan">Tidak Beraturan</option>
                                    <option value="Persegi Panjang">Persegi Panjang</option>
                                    <option value="Persegi Empat">Persegi Empat</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="lebar_muka_tanah"><b>Lebar Muka Tanah (m)</b></label>
                                <input type="number" id="lebar_muka_tanah" name="lebar_muka_tanah"
                                    class="form-control" placeholder="22" />
                            </div>
                            <div>
                                <label for="ketinggian_tanah_dr_muka_jln"><b>Ketinggian Tanah dari
                                        Muka Jalan (m)</b></label>
                                <input type="number" id="ketinggian_tanah_dr_muka_jln"
                                    name="ketinggian_tanah_dr_muka_jln" class="form-control" placeholder="0.1" />
                            </div>
                            <div>
                                <label for="topografi"><b>Topografi / Elevasi</b></label>
                                <select class="form-select" name="topografi" id="topografi"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Rata">Rata</option>
                                    <option value="Bergelombang">Bergelombang</option>
                                </select>
                            </div>
                            <div>
                                <label for="tingkat_hunian"><b>Tingkat Hunian (%)</b></label>
                                <input type="number" id="tingkat_hunian" name="tingkat_hunian" class="form-control"
                                    placeholder="70" />
                            </div>
                            <div>
                                <div>
                                    <label><b>Kondisi Lingkungan Khusus</b></label><br>
                                    <div>
                                        <input type="checkbox" id="bebas_banjir" name="kondisi_lingkungan_khusus[]"
                                            value="Bebas Banjir">
                                        <label for="bebas_banjir">Bebas Banjir</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="banjir_musiman" name="kondisi_lingkungan_khusus[]"
                                            value="Banjir Musiman">
                                        <label for="banjir_musiman">Banjir Musiman</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="rawan_banjir" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Banjir">
                                        <label for="rawan_banjir">Rawan Banjir</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="rawan_kebakaran" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Kebakaran">
                                        <label for="rawan_kebakaran">Rawan Kebakaran</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="rawan_bencana_alam"
                                            name="kondisi_lingkungan_khusus[]" value="Rawan Bencana Alam">
                                        <label for="rawan_bencana_alam">Rawan Bencana Alam</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="rawan_huru_hara" name="kondisi_lingkungan_khusus[]"
                                            value="Rawan Huru-hara">
                                        <label for="rawan_huru_hara">Rawan Huru-hara</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_kuburan" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Kuburan">
                                        <label for="dekat_kuburan">Dekat Kuburan</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_sekolahan" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Sekolahan/Pasar">
                                        <label for="dekat_sekolahan">Dekat Sekolahan/Pasar</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="lokasi_tusuk_sate"
                                            name="kondisi_lingkungan_khusus[]" value="Lokasi Tusuk Sate">
                                        <label for="lokasi_tusuk_sate">Lokasi Tusuk Sate</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_tempat_ibadah"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Tempat Ibadah">
                                        <label for="dekat_tempat_ibadah">Dekat Tempat Ibadah</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_bangunan_liar"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Kumpulan Bangunan Liar">
                                        <label for="dekat_bangunan_liar">Dekat Kumpulan Bangunan Liar</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_jurang" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Jurang/ Rawan Longsor">
                                        <label for="dekat_jurang">Dekat Jurang/ Rawan Longsor</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_pasar" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Pasar">
                                        <label for="dekat_pasar">Dekat Pasar</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_tegangan_tinggi"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Tegangan Tinggi">
                                        <label for="dekat_tegangan_tinggi">Dekat Tegangan Tinggi</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_terminal" name="kondisi_lingkungan_khusus[]"
                                            value="Dekat Terminal">
                                        <label for="dekat_terminal">Dekat Terminal</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dekat_saluran_irigasi"
                                            name="kondisi_lingkungan_khusus[]" value="Dekat Saluran Irigasi">
                                        <label for="dekat_saluran_irigasi">Dekat Saluran Irigasi</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="lainnya" name="kondisi_lingkungan_khusus[]"
                                            value="Lainnya">
                                        <label for="lainnya">Lainnya</label>
                                    </div>
                                </div>
                            </div>
                            <div id="lainnyaInputContainer" style="display: none;">
                                <label for="kondisi_lingkungan_lainnya"><b>Kondisi Lingkungan
                                        Lainnya</b></label>
                                <input type="text" id="kondisi_lingkungan_lainnya"
                                    name="kondisi_lingkungan_lainnya" class="form-control" />
                            </div>
                            <div>
                                <label for="keterangan_tambahan_lainnya"><b>Keterangan Tambahan
                                        Lainnya</b></label>
                                <td>
                                    <textarea class="form-control" name="keterangan_tambahan_lainnya" id="keterangan_tambahan_lainnya"></textarea>
                                </td>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="karakteristik_ekonomi"><b>Karakteristik Ekonomi (Jika
                                        objek yang dinilai adalah Properti Komersial)</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            <b>Kualitas Pendapatan</b>
                                        </th>
                                        <th>
                                            <b>Biaya Operasional</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="kualitas_pendapatan"
                                                id="kualitas_pendapatan" aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Rendah">Rendah</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Tinggi">Tinggi</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="biaya_opreasional_ekonomi"
                                                id="biaya_opreasional_ekonomi" aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Rendah">Rendah</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Tinggi">Tinggi</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Ketentuan Sewa</b>
                                        </th>
                                        <th>
                                            <b>Manajemen</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="ketentuan_sewa" id="ketentuan_sewa"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Mudah">Mudah</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Ketat">Ketat</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="manajemen" id="manajemen"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Kecil">Kecil</option>
                                                <option value="Menengah">Menengah</option>
                                                <option value="Besar">Besar</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Bauran Penyewa</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="bauran_penyewa" id="bauran_penyewa"
                                                aria-label="Default select example">
                                                <option value="" selected disabled>Pilih...</option>
                                                <option value="Terbatas">Terbatas</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Beragam">Ketat</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="kmpn_dlm_penjualan"><b>Komponen Non-Realty dalam
                                        Penjualan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            <b>FFE</b>
                                        </th>
                                        <th>
                                            <b>Biaya Operasional</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" id="ffe" name="ffe"
                                                class="form-control" />
                                        </td>
                                        <td>
                                            <input type="number" id="biaya_operasional" name="biaya_operasional"
                                                class="form-control" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-section p-3 rounded">
                                <label for="gambaran_object_thd_lingkungan"><b>Gambaran Objek
                                        terhadap
                                        Wilayah dan Lingkungan</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            <b>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Kota. Nama Pusat Kota /
                                                Jarak</b>
                                        </th>
                                        <th>
                                            <b>Jarak dengan CBD (Pusat Ekonomi) dari Pusat Ekonomi terdekat (Pasar
                                                Mall).
                                                Nama Pusat Ekonomi / Jarak</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="nm_pusat_kota" name="nm_pusat_kota"
                                                placeholder="Nama pusat kota / Jarak" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" id="nm_pusat_ekonomi" name="nm_pusat_ekonomi"
                                                placeholder="Nama pusat ekonomi / Jarak" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Jarak dengan CBD (Pusat Ekonomi) dari Jalan Utama terdekat. Nama Jalan /
                                                Jarak</b>
                                        </th>
                                        <th>
                                            <b>Kondisi Lingkungan Khusus yang mempengaruhi Nilai</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="nm_jalan" name="nm_jalan"
                                                placeholder="Nama jalan / Jarak" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" id="kondisi_lingkungan" name="kondisi_lingkungan"
                                                class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Faktor View (Pemandangan) untuk Properti yang faktor view dimungkinkan
                                                sangat berpengaruh pada nilai (contoh: apartemen, vila, dll)</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="pemandangan" name="pemandangan"
                                                class="form-control" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <div>
                                    <label for="keterangan_jarak_dr_bca"><b>Keterangan jarak dengan
                                            BCA terdekat (jika BCA)</b></label>
                                    <div>
                                        <small><i>Cantumkan jarak dan nama kantor cabang</i></small>
                                    </div>
                                </div>
                                <input type="text" id="keterangan_jarak_dr_bca" name="keterangan_jarak_dr_bca"
                                    placeholder="± 1,4 Km (Bank BCA KCU Purwodadi)" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="bentuk_bangunan"><b>Bentuk Bangunan</b></label>
                                <select class="form-select" name="bentuk_bangunan" id="bentuk_bangunan"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Bertingkat">Bertingkat</option>
                                    <option value="Tidak Bertingkat">Tidak Bertingkat</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <!-- Social Links -->
                    <div id="social-links" class="content">
                        <div class="row g-3">
                            <!-- Jumlah Lantai -->
                            <div class="form-group mb-1">
                                <label for="jumlah_lantai"><b>Jumlah Lantai</b></label>
                                <input type="number" id="jumlah_lantai" name="jumlah_lantai" class="form-control"
                                    value="1" min="1">
                            </div>
                            <div>
                                <label for="basement"><b>Basement</b></label>
                                <select class="form-select" name="basement" id="basement"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Ada Basement">Ada Basement</option>
                                    <option value="Tidak Ada Basement">Tidak Ada Basement</option>
                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_bangunan"><b>Kontruksi Bangunan</b></label>
                                <select class="form-select" name="kontruksi_bangunan" id="kontruksi_bangunan"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Permanen">Permanen</option>
                                    <option value="Semi Permanen">Semi Permanen</option>
                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_lantai"><b>Kontruksi Lantai</b></label>
                                <select class="form-select" name="kontruksi_lantai" id="kontruksi_lantai"
                                    aria-label="Default select example">
                                    <option value="" selected>Pilih...</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Marmer">Marmer</option>
                                    <option value="Ubin">Ubin</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Teraso">Teraso</option>
                                    <option value="Granit">Granit</option>
                                    <option value="Semen">Semen</option>
                                    <option value="Rabat Beton">Rabat Beton</option>
                                    <option value="Flooring Kayu">Flooring Kayu</option>
                                    <option value="Lainnya">Semen</option>
                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_dinding"><b>Kontruksi Dinding</b></label>
                                <select class="form-select" name="kontruksi_dinding" id="kontruksi_dinding"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Bata">Bata</option>
                                    <option value="Batako">Batako</option>
                                    <option value="Kaca">Kaca</option>
                                    <option value="Beton Ringan">Beton Ringan</option>
                                    <option value="Beton">Beton</option>
                                    <option value="Lainnya">Lainnya</option>

                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_atap"><b>Kontruksi atap</b></label>
                                <select class="form-select" name="kontruksi_atap" id="kontruksi_atap"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Genteng Beton">Genteng Beton</option>
                                    <option value="Genteng Baja">Genteng Baja</option>
                                    <option value="Genteng Sirap">Genteng Sirap</option>
                                    <option value="Genteng Jawa">Genteng Jawa</option>
                                    <option value="Asbes">Asbes</option>
                                    <option value="Seng">Seng</option>
                                    <option value="Dak Beton">Dak Beton</option>
                                    <option value="Galvalum">Galvalum</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kontruksi_pondasi"><b>Kontruksi Pondasi</b></label>
                                <select class="form-select" name="kontruksi_pondasi" id="kontruksi_pondasi"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Beton Bertulang">Beton Bertulang</option>
                                    <option value="Pasangan Batu Kali">Pasangan Batu Kali</option>
                                    <option value="Umpak">Umpak</option>
                                    <option value="Rolag Bata">Rolag Bata</option>
                                    <option value="Kayu">Kayu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="versi_btb"><b>Versi BTB</b></label>
                                <div>
                                    <small><i>Mengupdate versi BTB akan mengubah tipe material bangunan. Mohon periksa
                                            kembali bobot material pada kotak-kotak isian dibawah ini sebelum menyimpan
                                            form.</i></small>
                                </div>
                                <?php
                                $currentYear = date('Y');
                                ?>

                                <select class="form-select" name="versi_btb" id="versi_btb"
                                    aria-label="Default select example">
                                    <?php
                                    for ($i = 0; $i < 5; $i++) {
                                        $year = $currentYear - $i;
                                        echo "<option value='$year'>$year</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="tipe_spek"><b>Tipikal Bangunan Sesuai Spek BTB MAPPI </b> <span
                                        class="text-danger">*</span></label>
                                <select id="tipe_spek" name="tipe_spek" class="form-select" required>
                                    <option value="tolol" selected>- Select -</option>
                                    <option value="100">Rumah Tinggal Sederhana 1 Lantai</option>
                                    <option value="200">Rumah Tinggal Menengah 2 Lantai</option>
                                    <option value="300">Rumah Tinggal Mewah 2 Lantai</option>
                                    <option value="400">Bangunan Perkebunan (Semi Permanen) 1 Lantai</option>
                                    <option value="500">Bangunan Gudang 1 Lantai</option>
                                    <option value="600">Bangunan Gedung Bertingkat Rendah 3 Lantai (&lt;5 Lantai)
                                    </option>
                                    <option value="700">Bangunan Gedung Bertingkat Sedang 8 Lantai + 1 Basement (5-8
                                        Lantai)
                                    </option>
                                    <option value="800">Bangunan Gedung Bertingkat Tinggi 16 Lantai + 2 Basement
                                        (&gt;8 Lantai)
                                    </option>
                                    <option value="900">Bangunan Mall 4 Lantai + 1 Basement</option>
                                    <option value="1000">Bangunan Hotel 8 Lantai</option>
                                    <option value="1100">Bangunan Apartemen 14 Lantai + 2 Semi Basement</option>
                                    <!-- More options... -->
                                </select>
                            </div>

                            <script>
                                // Fungsi untuk menangani perubahan dropdown
                                document.getElementById('tipe_spek').addEventListener('change', function() {
                                    const selectedValue = this.value;

                                    // Sembunyikan semua form terlebih dahulu
                                    document.querySelectorAll(
                                        '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                                    ).forEach(
                                        form => {
                                            form.style.display = 'none';
                                        });

                                    switch (selectedValue) {
                                        case '100':
                                            document.getElementById('100').style.display = 'block';
                                            break;
                                        case '200':
                                            document.getElementById('200').style.display = 'block';
                                            break;
                                        case '300':
                                            document.getElementById('300').style.display = 'block';
                                            break;
                                        case '400':
                                            document.getElementById('400').style.display = 'block';
                                            break;
                                        case '500':
                                            document.getElementById('500').style.display = 'block';
                                            // Tambahkan inisialisasi untuk form 500
                                            if (typeof initForm500 === 'function') {
                                                initForm500();
                                            }
                                            break;
                                        case '600':
                                            document.getElementById('600').style.display = 'block';
                                            break;
                                        case '700':
                                            document.getElementById('700').style.display = 'block';
                                            break;
                                        case '800':
                                            document.getElementById('800').style.display = 'block';
                                            break;
                                        case '900':
                                            document.getElementById('900').style.display = 'block';
                                            break;
                                        case '1000':
                                            document.getElementById('1000').style.display = 'block';
                                            break;
                                        case '1100':
                                            document.getElementById('1100').style.display = 'block';
                                            break;
                                        default:
                                            // Sembunyikan semua form jika tidak ada yang dipilih
                                            document.querySelectorAll(
                                                    '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                                                )
                                                .forEach(form => {
                                                    form.style.display = 'none';
                                                });
                                    }
                                });

                                // Tambahkan fungsi inisialisasi untuk form 500
                                function initForm500() {
                                    // Inisialisasi select grade gudang
                                    const gradeGudangSelect = document.getElementById('grade_gudang');
                                    if (gradeGudangSelect) {
                                        // Reset nilai
                                        gradeGudangSelect.value = '';

                                        // Tampilkan select
                                        gradeGudangSelect.closest('.form-group').style.display = 'block';

                                        // Trigger change event untuk memastikan handler terpanggil
                                        gradeGudangSelect.dispatchEvent(new Event('change'));
                                    }
                                }

                                // Tambahkan event listener saat dokumen dimuat
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Cek apakah form 500 perlu ditampilkan berdasarkan nilai yang tersimpan
                                    const tipeSpekSelect = document.getElementById('tipe_spek');
                                    if (tipeSpekSelect && tipeSpekSelect.value === '500') {
                                        document.getElementById('500').style.display = 'block';
                                        initForm500();
                                    }
                                });
                            </script>
                            <div id ="dynamic-content">
                                @include('content.form.100')
                                @include('content.form.200')
                                @include('content.form.300')
                                @include('content.form.400')
                                @include('content.form.500')
                                @include('content.form.600')
                                @include('content.form.700')
                                @include('content.form.800')
                                @include('content.form.900')
                                @include('content.form.1000')
                                @include('content.form.1100')
                            </div>

                            <div class="form-group mb-3">
                                <label for="penggunaan_bangunan"><b>Penggunaan Bangunan Saat Ini</b></label>
                                <input type="text" id="penggunaan_bangunan" name="penggunaan_bangunan"
                                    class="form-control" placeholder="Disewakan, Selama berapa tahun">
                            </div>
                            <div class="form-group mb-3">
                                <label><b>Perlengkapan Bangunan</b></label><br>
                                <div>
                                    <input type="checkbox" id="listrik" name="perlengkapan_bangunan[]"
                                        value="listrik">
                                    <label for="listrik">Listrik</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="telepon_rumah" name="perlengkapan_bangunan[]"
                                        value="telepon">
                                    <label for="telepon_rumah">Telepon</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="pdam" name="perlengkapan_bangunan[]"
                                        value="pdam">
                                    <label for="pdam">PDAM</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="gas" name="perlengkapan_bangunan[]"
                                        value="gas">
                                    <label for="gas">Gas</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="ac" name="perlengkapan_bangunan[]"
                                        value="ac">
                                    <label for="ac">AC</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="sumur" name="perlengkapan_bangunan[]"
                                        value="sumur">
                                    <label for="sumur">Sumur Gali/Pompa</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="progres_pembangunan"><b>Progres Pembangunan jika aset dalam proses (dalam
                                        persen)</b></label>
                                <input type="number" id="progres_pembangunan" name="progres_pembangunan"
                                    class="form-control" placeholder="Masukkan nilai dalam persen" min="0"
                                    max="100">
                            </div>
                            <div class="form-group mb-3">
                                <label for="kondisi_bangunan"><b>Kondisi Bangunan</b></label>
                                <select class="form-select" name="kondisi_bangunan" id="kondisi_bangunan"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Terawat">Terawat</option>
                                    <option value="Tidak Terawat">Tidak Terawat</option>

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="pemberi_tugas"><b>Pemberi Tugas</b></label><br>
                                <small><i>Formulir tambahan untuk melengkapi Laporan kepada Pemberi Tugas.</i></small>
                                <select class="form-select" name="pemberi_tugas" id="pemberi_tugas"
                                    aria-label="Default select example" onchange="toggleMandiriForm()">
                                    <option value="" selected>Pilih...</option>
                                    <option value="Bank Mandiri">Bank Mandiri</option>
                                </select>
                            </div>
                            <div id="formMandiriContainer" style="display: none;" class="p-3 rounded">
                                <label for="form_isi_mandiri"><b>Form Isian Bank
                                        Mandiri</b></label>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>
                                            Jenis Aset
                                        </th>
                                        <th>
                                            Peruntukan / Zoning
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="jenis_aset" id="jenis_aset" class="form-select"
                                                onchange="toggleJenisAsetInput()">
                                                <option value="">Pilih...</option>
                                                <option value="Campuran">Campuran</option>
                                                <option value="Gedung Apartemen">Gedung Apartemen</option>
                                                <option value="Gedung Kantor">Gedung Kantor</option>
                                                <option value="Gudang">Gudang</option>
                                                <option value="Hotel">Hotel</option>
                                                <option value="Kios">Kios</option>
                                                <option value="Los Kerja/Bengkel/Workshop">Los Kerja/Bengkel/Workshop
                                                </option>
                                                <option value="Pabrik">Pabrik</option>
                                                <option value="Penginapan">Penginapan</option>
                                                <option value="Ruang Kantor">Ruang Kantor</option>
                                                <option value="Ruang Usaha">Ruang Usaha</option>
                                                <option value="Ruko/Rukan">Ruko/Rukan</option>
                                                <option value="Rumah Tinggal">Rumah Tinggal</option>
                                                <option value="Rumah Walet">Rumah Walet</option>
                                                <option value="Tanah Kosong">Tanah Kosong</option>
                                                <option value="Tempat Ibadah">Tempat Ibadah</option>
                                                <option value="Toko">Toko</option>
                                                <option value="Unit Apartemen">Unit Apartemen</option>
                                                <option value="Kantor & Pabrik">Kantor & Pabrik</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="peruntukan" id="peruntukan" class="form-select">
                                                <option value="">Pilih...</option>
                                                <option value="Belum Ditentukan">Belum Ditentukan</option>
                                                <option value="Campuran/Peralihan">Campuran/Peralihan</option>
                                                <option value="Industri/Pergudangan">Industri/Pergudangan</option>
                                                <option value="Perdagangan dan Jasa Komersial">Perdagangan dan Jasa
                                                    Komersial</option>
                                                <option value="Perumahan">Perumahan</option>
                                                <option value="Pertanian">Pertanian</option>
                                                <option value="Sarana Kesehatan">Sarana Kesehatan</option>
                                                <option value="Sarana Pemerintah">Sarana Pemerintah</option>
                                                <option value="Sarana Pendidikan">Sarana Pendidikan</option>
                                                <option value="Fasilitas Umum">Fasilitas Umum</option>
                                                <option value="Pemukiman Perkotaan">Pemukiman Perkotaan</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr id="jenis_aset_lainnya_row" style="display: none;">
                                        <th>
                                            Jenis Aset Campuran / Lainnya
                                        </th>
                                    </tr>
                                    <tr id="jenis_aset_lainnya_input_row" style="display: none;">
                                        <td>
                                            <input type="text" name="jenis_aset_lainnya" id="jenis_aset_lainnya"
                                                class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Topografi
                                        </th>
                                        <th>
                                            Jabatan (Status) Narasumber
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="topografi" id="topografi" class="form-select">
                                                <option value="">Pilih...</option>
                                                <option value="Datar">Datar</option>
                                                <option value="Miring">Miring</option>
                                                <option value="Berbukit">Berbukit</option>
                                                <option value="Terasering">Terasering</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="jabatan_narasumber" id="jabatan_narasumber"
                                                class="form-control">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="status_data_pembanding"><b>Status Data
                                        Pembanding</b></label>
                                <select class="form-select" name="status_data_pembanding" id="status_data_pembanding"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Lengkap">Lengkap</option>
                                    <option value="Tidak Lengkap">Tidak Lengkap</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success btn-submit mt-2" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Default Icons Wizard -->
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([1.966576931124596, 100.049384575934738], 13)

            var accessToken =
                'pk.eyJ1IjoicmVkb2syNSIsImEiOiJjbG1zdzZ1Y2MwZHA2MmxxYzdvYm12cTlwIn0.2GTgMV076x87YJQJzM34jg';

            var satelliteLayer = L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + accessToken, {
                    attribution: '&copy; <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 30,
                    id: 'mapbox/streets-v11', // Ganti dengan jenis peta satelit yang diinginkan
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);

            var geocoder = L.Control.geocoder({
                defaultMarkGeocode: false
            }).on('markgeocode', function(e) {
                map.setView(e.geocode.center, 13);
            }).addTo(map);

            var marker
            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                document.getElementById('lat').value = lat;
                document.getElementById('long').value = lng;

                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        var address = data.display_name;
                        document.getElementById('alamat').value = address;
                    });

                if (marker) {
                    map.removeLayer(marker);
                }

                marker = L.marker([lat, lng]).addTo(map);
            });

            map.invalidateSize();
        });
    </script>
    <script>
        // Fungsi untuk tabel NJOP
        function addNjopRow() {
            const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const rowCount = table.rows.length;

            newRow.innerHTML = `
                <td class="row-number">${rowCount}</td>
                <td><input type="number" name="tahun[]" class="form-control" /></td>
                <td><input type="number" name="nilai_perolehan[]" class="form-control" /></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addNjopRow()">+</button>
                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeNjopRow(this)">-</button>
                </td>
            `;
            updateNjopRowNumbers();
        }

        function removeNjopRow(button) {
            const table = document.getElementById('njopTable').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1);
                updateNjopRowNumbers();
            }
        }

        function updateNjopRowNumbers() {
            const rows = document.querySelectorAll('#njopTable .row-number');
            rows.forEach((cell, index) => {
                cell.textContent = index + 1;
            });
        }

        // Fungsi untuk tabel Luas Pintu Jendela
        function addPintuJendelaRow() {
            const table = document.getElementById('luas_pintu_jendela').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const rowCount = table.rows.length;

            newRow.innerHTML = `
                <td class="row-number">${rowCount}</td>
                <td><input type="number" name="tahun_pintu[]" class="form-control" /></td>
                <td><input type="number" name="nilai_pintu[]" class="form-control" /></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addPintuJendelaRow()">+</button>
                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removePintuJendelaRow(this)">-</button>
                </td>
            `;
            updatePintuJendelaRowNumbers();
        }

        function removePintuJendelaRow(button) {
            const table = document.getElementById('luas_pintu_jendela').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1);
                updatePintuJendelaRowNumbers();
            }
        }

        function updatePintuJendelaRowNumbers() {
            const rows = document.querySelectorAll('#luas_pintu_jendela .row-number');
            rows.forEach((cell, index) => {
                cell.textContent = index + 1;
            });
        }

        // Fungsi untuk tabel Luas Dinding
        function addDindingRow() {
            const table = document.getElementById('luas_dinding').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const rowCount = table.rows.length;

            newRow.innerHTML = `
                <td class="row-number">${rowCount}</td>
                <td><input type="number" name="tahun_dinding[]" class="form-control" /></td>
                <td><input type="number" name="nilai_dinding[]" class="form-control" /></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm btn-action" onclick="addDindingRow()">+</button>
                    <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeDindingRow(this)">-</button>
                </td>
            `;
            updateDindingRowNumbers();
        }

        function removeDindingRow(button) {
            const table = document.getElementById('luas_dinding').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1);
                updateDindingRowNumbers();
            }
        }

        function updateDindingRowNumbers() {
            const rows = document.querySelectorAll('#luas_dinding .row-number');
            rows.forEach((cell, index) => {
                cell.textContent = index + 1;
            });
        }
    </script>

    <script>
        // Menambahkan baris baru ke tabel Foto Lainnya
        function addFotoRow() {
            const table = document.getElementById('fotoLainnyaTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const rowCount = table.rows.length;

            newRow.innerHTML = `
          <td class="row-number-foto">${rowCount}</td>
          <td><input type="text" name="judul_foto[]" class="form-control" /></td>
          <td><input type="file" id="foto_lainnya" name="foto_lainnya[]" class="form-control" accept="image/*" /></td>
          <td>
              <button type="button" class="btn btn-success btn-sm btn-action" onclick="addFotoRow()">+</button>
              <button type="button" class="btn btn-danger btn-sm btn-action" onclick="removeFotoRow(this)">-</button>
          </td>
      `;
            updateFotoRowNumbers();
        }

        // Menghapus baris dari tabel Foto Lainnya
        function removeFotoRow(button) {
            const table = document.getElementById('fotoLainnyaTable').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                const row = button.parentNode.parentNode;
                table.deleteRow(row.rowIndex - 1); // Menyesuaikan indeks untuk header
                updateFotoRowNumbers();
            }
        }

        // Memperbarui nomor urut di tabel Foto Lainnya
        function updateFotoRowNumbers() {
            const rows = document.querySelectorAll('#fotoLainnyaTable .row-number-foto');
            rows.forEach((cell, index) => {
                cell.textContent = index + 1;
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('#kondisi_lingkungan_khusus').select2();

            // Event listener untuk memantau perubahan pilihan
            $('#kondisi_lingkungan_khusus').on('change', function() {
                const selectedValues = $(this).val(); // Mendapatkan nilai yang dipilih sebagai array
                if (selectedValues && selectedValues.includes('Lainnya')) {
                    $('#lainnyaInputContainer').show(); // Tampilkan input "Keterangan Tambahan Lainnya"
                } else {
                    $('#lainnyaInputContainer').hide(); // Sembunyikan input
                }
            });
        });
    </script>
    <script>
        function toggleJenisAsetInput() {
            const jenisAsetSelect = document.getElementById('jenis_aset');
            const jenisAsetLainnyaRow = document.getElementById('jenis_aset_lainnya_row');
            const jenisAsetLainnyaInputRow = document.getElementById('jenis_aset_lainnya_input_row');

            if (jenisAsetSelect.value === 'Lainnya') {
                jenisAsetLainnyaRow.style.display = 'table-row';
                jenisAsetLainnyaInputRow.style.display = 'table-row';
            } else {
                jenisAsetLainnyaRow.style.display = 'none';
                jenisAsetLainnyaInputRow.style.display = 'none';
            }
        }
    </script>
    <script>
        // Fungsi untuk menampilkan atau menyembunyikan Form Isian Bank Mandiri
        function toggleMandiriForm() {
            const pemberiTugasSelect = document.getElementById('pemberi_tugas');
            const formMandiriContainer = document.getElementById('formMandiriContainer');

            if (pemberiTugasSelect.value === "Bank Mandiri") {
                formMandiriContainer.style.display = 'block'; // Tampilkan Form Isian Bank Mandiri
            } else {
                formMandiriContainer.style.display = 'none'; // Sembunyikan Form Isian Bank Mandiri
            }
        }
    </script>

    <script>
        const canvas = document.getElementById('drawingCanvas');
        const ctx = canvas.getContext('2d');

        let currentX = canvas.width / 2;
        let currentY = canvas.height / 2;
        const scale = 20; // 1 meter = 20px
        const points = []; // Store points for polygon
        const lines = []; // Store lines for undo functionality

        // Fungsi untuk menggambar titik awal
        function drawPoint(x, y) {
            ctx.beginPath();
            ctx.arc(x, y, 3, 0, 2 * Math.PI);
            ctx.fillStyle = 'red';
            ctx.fill();
        }

        // Gambar titik awal
        drawPoint(currentX, currentY);

        // Fungsi untuk menggambar garis
        function drawLine(x1, y1, x2, y2, length) {
            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.strokeStyle = 'blue';
            ctx.lineWidth = 2;
            ctx.stroke();

            // Menambahkan panjang garis di atasnya
            const midX = (x1 + x2) / 2;
            const midY = (y1 + y2) / 2;
            ctx.fillStyle = 'black';
            ctx.font = '12px Arial';
            ctx.fillText(`${length.toFixed(2)} m`, midX, midY - 5);
        }

        // Fungsi untuk menghitung luas poligon
        function calculatePolygonArea(points) {
            let area = 0;
            const n = points.length;
            for (let i = 0; i < n; i++) {
                const x1 = points[i].x;
                const y1 = points[i].y;
                const x2 = points[(i + 1) % n].x;
                const y2 = points[(i + 1) % n].y;
                area += (x1 * y2 - x2 * y1);
            }
            return Math.abs(area / 2) / (scale * scale); // Convert from px² to m²
        }

        // Fungsi untuk memindahkan garis ke arah tertentu
        function move(direction) {
            const length = parseFloat(document.getElementById('line_length').value) || 0;
            const angle = parseFloat(document.getElementById('angle').value) || 0;
            const radians = (angle * Math.PI) / 180; // Konversi derajat ke radian
            const pixelLength = length * scale; // Konversi meter ke pixel

            let newX = currentX;
            let newY = currentY;

            if (direction === 'up') {
                newX += pixelLength * Math.sin(radians);
                newY -= pixelLength * Math.cos(radians);
            } else if (direction === 'down') {
                newX -= pixelLength * Math.sin(radians);
                newY += pixelLength * Math.cos(radians);
            } else if (direction === 'left') {
                newX -= pixelLength * Math.cos(radians);
                newY -= pixelLength * Math.sin(radians);
            } else if (direction === 'right') {
                newX += pixelLength * Math.cos(radians);
                newY += pixelLength * Math.sin(radians);
            }

            drawLine(currentX, currentY, newX, newY, length);
            lines.push({
                x1: currentX,
                y1: currentY,
                x2: newX,
                y2: newY
            });
            points.push({
                x: newX,
                y: newY
            });
            currentX = newX;
            currentY = newY;

            // Gambar titik di posisi baru
            drawPoint(currentX, currentY);

            // Hitung luas jika poligon memiliki lebih dari 2 titik
            if (points.length > 2) {
                const area = calculatePolygonArea(points);
                document.getElementById('polygon_area').value = area.toFixed(2);
            }
        }

        // Fungsi untuk menghapus garis terakhir
        document.getElementById('clearLastLineButton').addEventListener('click', () => {
            if (lines.length > 0) {
                lines.pop();
                points.pop();
                if (points.length > 0) {
                    currentX = points[points.length - 1].x;
                    currentY = points[points.length - 1].y;
                } else {
                    currentX = canvas.width / 2;
                    currentY = canvas.height / 2;
                }
                redrawCanvas();
            }
        });

        // Fungsi untuk menggambar ulang canvas
        function redrawCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawPoint(canvas.width / 2, canvas.height / 2);

            for (const line of lines) {
                drawLine(line.x1, line.y1, line.x2, line.y2, Math.hypot(line.x2 - line.x1, line.y2 - line.y1) / scale);
            }

            // Hitung luas jika poligon memiliki lebih dari 2 titik
            if (points.length > 2) {
                const area = calculatePolygonArea(points);
                document.getElementById('polygon_area').value = area.toFixed(2);
            } else {
                document.getElementById('polygon_area').value = '';
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    <!-- Tambahkan sebelum tag </form> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded');

            const mainForm = document.getElementById('mainForm');
            const tipeSpekSelect = document.getElementById('tipe_spek');

            if (mainForm) {
                mainForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Form submission intercepted');

                    const selectedType = tipeSpekSelect ? tipeSpekSelect.value : null;
                    console.log('Selected type at submission:', selectedType);

                    if (!selectedType) {
                        console.warn('No type selected');
                        return;
                    }

                    // Dapatkan semua container
                    const containers = document.querySelectorAll(
                        '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                    );

                    // Sembunyikan semua container kecuali yang aktif
                    containers.forEach(container => {
                        if (container.id !== selectedType) {
                            container.style.display = 'none';
                        }
                    });

                    const activeContainer = document.getElementById(selectedType);
                    console.log('Active container:', activeContainer);

                    if (!activeContainer) {
                        console.warn('Active container not found');
                        return;
                    }

                    // Kumpulkan semua elemen form dari container aktif
                    const formElements = activeContainer.querySelectorAll('input, select, textarea');
                    console.log(`Found ${formElements.length} elements in active container`);

                    // Proses setiap elemen
                    formElements.forEach(element => {
                        if (!element.name) return;

                        // Log state awal
                        console.log('Processing element:', {
                            name: element.name,
                            type: element.type,
                            value: element.value,
                            isArray: element.name.endsWith('[]')
                        });

                        // Hapus suffix dari nama elemen
                        const suffix = `_${selectedType}`;
                        if (element.name.endsWith(suffix)) {
                            const newName = element.name.replace(suffix, '');
                            console.log(`Renaming ${element.name} to ${newName}`);
                            element.name = newName;
                        } else if (element.name.endsWith(`${suffix}[]`)) {
                            const newName = element.name.replace(`${suffix}[]`, '[]');
                            console.log(`Renaming array element ${element.name} to ${newName}`);
                            element.name = newName;
                        }
                    });

                    // Nonaktifkan elemen di container yang tidak aktif
                    containers.forEach(container => {
                        if (container.id !== selectedType) {
                            const inactiveElements = container.querySelectorAll(
                                'input, select, textarea');
                            inactiveElements.forEach(element => {
                                element.disabled = true;
                            });
                        }
                    });

                    // Log final form data
                    const formData = new FormData(this);
                    console.log('Final form data:');
                    for (let [key, value] of formData.entries()) {
                        console.log(`${key}:`, value);
                    }

                    // Submit form
                    console.log('Submitting form...');
                    this.submit();
                });

                // Tambahkan event listener untuk perubahan tipe_spek
                tipeSpekSelect.addEventListener('change', function() {
                    const selectedType = this.value;
                    console.log('Tipe spek changed to:', selectedType);

                    // Update tampilan container
                    const containers = document.querySelectorAll(
                        '[id^="100"], [id^="200"], [id^="300"], [id^="400"], [id^="500"], [id^="600"], [id^="700"], [id^="800"], [id^="900"], [id^="1000"], [id^="1100"]'
                    );

                    containers.forEach(container => {
                        container.style.display = container.id === selectedType ? 'block' : 'none';
                    });

                    // Reset form jika diperlukan
                    // mainForm.reset();
                });
            }

            // Debug info
            console.log('Initial selected type:', tipeSpekSelect.value);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinsiSelect = document.getElementById('provinsi');
            const kabupatenContainer = document.getElementById('kabupaten-container');

            // Sembunyikan semua pilihan kabupaten
            function hideAllKabupaten() {
                const kabupatenSelects = kabupatenContainer.querySelectorAll('select');
                kabupatenSelects.forEach(select => {
                    select.classList.add('d-none');
                    select.disabled = true;
                });
            }

            // Tampilkan kabupaten sesuai provinsi yang dipilih
            provinsiSelect.addEventListener('change', function() {
                hideAllKabupaten();

                const selectedProvinsi = this.value;
                if (selectedProvinsi) {
                    const provinsiCode = selectedProvinsi.split('_')[0];
                    const kabupatenSelect = document.getElementById(`kabupaten_${provinsiCode}`);

                    if (kabupatenSelect) {
                        kabupatenSelect.classList.remove('d-none');
                        kabupatenSelect.disabled = false;
                    } else {
                        // Jika select untuk provinsi ini belum dibuat, tampilkan default
                        document.getElementById('kabupaten_default').classList.remove('d-none');
                        document.getElementById('kabupaten_default').disabled = false;
                    }
                } else {
                    // Jika tidak ada provinsi yang dipilih, tampilkan default
                    document.getElementById('kabupaten_default').classList.remove('d-none');
                    document.getElementById('kabupaten_default').disabled = false;
                }
            });

            // Inisialisasi keadaan awal
            hideAllKabupaten();
            document.getElementById('kabupaten_default').classList.remove('d-none');
            document.getElementById('kabupaten_default').disabled = false;
        });
    </script>
@endsection
