@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Semua Laporan Penilaian')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="container">
  <h3 class="entry-title mb-4">{{ $report->judul_laporan . '-' . $report->nama_entitas . '-' . $report->alamat }}</h3>

  <div class="row">
    <div class="card p-3 border-2">
      <div class="card-body">
        <table class="table table-borderless mb-0">
          <tbody>
            <tr>
              <td><strong>Pemberi Tugas:</strong></td>
              <td><strong>{{ $report->nama_instansi_pemberi_tugas }}</strong></td>
            </tr>
            <tr>
              <td><strong>Tgl. Inspeksi:</strong></td>
              <td>{{ $report->tanggal_inspeksi->format('d F Y') }}</td>
            </tr>
            <tr>
              <td><strong>Tgl. Penilaian:</strong></td>
              <td>{{ $report->tanggal_penilaian->format('d F Y') }}</td>
            </tr>
            <tr>
              <td><strong>Tujuan Penilaian:</strong></td>
              <td>{{ $report->tujuan_penilaian }}</td>
            </tr>
            <tr>
              <td><strong>Tujuan Spesifik:</strong></td>
              <td>{{ $report->tujuan_spesifik }}</td>
            </tr>
            <tr>
              <td><strong>Dasar Nilai:</strong></td>
              <td>{{ $report->dasar_nilai_spesifik }}</td>
            </tr>
            <tr>
              <td><strong>Tahun Penilaian:</strong></td>
              <td>{{ $report->tanggal_inspeksi->format('Y') }}</td>
            </tr>
            <tr>
              <td><strong>Prov/Kab/Kota:</strong></td>
              <td>{{ $report->kabupaten_lokasi_obyek }} {{ $ikk->nama_kabupaten_kota }}</td>
            </tr>
            <tr>
              <td><strong>IKK:</strong></td>
              <td>{{ $ikk->ikk_mappi }}%</td>
            </tr>
            <tr>
              <td><strong>Lokasi Obyek:</strong></td>
              <td>{{ $report->alamat }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="mt-5">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" id="wb-tab" data-bs-toggle="tab" href="#wb">WB</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="nilai-tanah-tab" data-bs-toggle="tab" href="#nilai-tanah">Nilai Tanah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="analisis-tab" data-bs-toggle="tab" href="#analisis">Analisis</a>
        </li>
      </ul>

      <!-- Tabs Content -->
      <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="wb">
          <h4>Obyek Penilaian : Rumah Tinggal (Anthony Indramawan)</h4>
          <div class="container-fluid mt-4 table-responsive">
            <div class="row">
              <!-- Bagian Kiri: Gambar dan Data Bangunan -->
              <div class="col-md-4">
                <img
                  src="https://sip-zefapaskahalexa.radata.co.id/wp-content/uploads/2025/03/52-886751583-67e109147e40b.jpg"
                  class="img-fluid rounded shadow" alt="Foto Properti">

                <h4 class="mt-3">Data Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Tipikal Bangunan (Spec Standart BTB) :</strong></td>
                    <td>Rumah Tinggal Menengah 2 Lantai</td>
                  </tr>
                  <tr>
                    <td><strong>Provinsi / Kabupaten :</strong></td>
                    <td>Di Yogyakarta / Kab. Bantul</td>
                  </tr>
                  <tr>
                    <td><strong>Jumlah Lantai:</strong></td>
                    <td>2 Lantai</td>
                  </tr>
                  <tr>
                    <td><strong>Umur Ekonomis:</strong></td>
                    <td>30 Tahun</td>
                  </tr>
                  <tr>
                    <td><strong>Index Lantai (ILM):</strong></td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td><strong>Index Kemahalan (IKK):</strong></td>
                    <td>0.891</td>
                  </tr>
                  <tr>
                    <td><strong>Tahun Dibangun:</strong></td>
                    <td>2024</td>
                  </tr>
                  <tr>
                    <td><strong>Tahun Renovasi:</strong></td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td><strong>Bobot Renovasi:</strong></td>
                    <td>0%</td>
                  </tr>
                  <tr>
                    <td><strong>Kondisi Visual Pengamatan:</strong></td>
                    <td>Baru</td>
                  </tr>
                  <tr>
                    <td><strong>Catatan Khusus Bangunan :</strong></td>
                    <td>Lantai 1 = ±19 m², Lantai 2 = ±5 m²</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Lantai 1 :</strong></td>
                    <td>102.68 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Lantai 2:</strong></td>
                    <td>102.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Terpotong:</strong></td>
                    <td>24 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total:</strong></td>
                    <td>181.46 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Pembulatan:</strong></td>
                    <td>181 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Pintu & Jendela</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Pintu kayu panil :</strong></td>
                    <td>17.97 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Pintu kaca rangka almunium</strong></td>
                    <td>7.36 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Jendela kaca rangka kayu</strong></td>
                    <td>4.77 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Jendela kaca rangka almunium</strong></td>
                    <td>10.14 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total</strong></td>
                    <td>40.24 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Dinding</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Dinding :</strong></td>
                    <td>317.12 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total (dikurangi luas pintu & jendela) :</strong></td>
                    <td>276.88 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Rangka Atap (Datar)</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Rangka Atap Datar :</strong></td>
                    <td>97.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total :</strong></td>
                    <td>98 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Atap (Datar)</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Atap Datar :</strong></td>
                    <td>97.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total :</strong></td>
                    <td>98 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Rasio Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Rasio Luas Rangka Atap (Datar) dibagi Lantai :</strong></td>
                    <td>54.14% -> BUT Standar DKI : 55.8%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Luas Atap (Datar) dibagi Lantai :</strong></td>
                    <td>54.14% -> BUT Standar DKI : 55.8%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Volume Dinding dibagi Lantai :</strong></td>
                    <td>152.97% -> BUT Standar DKI : 219%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Volume Pintu/Jendela dibagi Lantai :</strong></td>
                    <td>22.23% -> BUT Standar DKI : 25.2%</td>
                  </tr>
                </table>

              </div>

              <!-- Bagian Kanan: Navigasi Tabs -->
              <div class="col-md-8">

                <div class="tab-content mt-3">
                  <!-- Tab: Spesifikasi Standar BTB -->
                  <div id="standar">
                    <h4 class="text-center">BRB SPESIFIKASI STANDAR BTB</h4>
                    <div>
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th class="table-warning text-center fw-bold" colspan="6">BRB SPESIFIKASI STANDAR BTB
                              MAPPI TAHUN
                              2024 SESUAI
                              LOKASI</th>
                            <th class="table-primary text-center fw-bold" colspan="6">BRB SPESIFIKASI OBJEK YANG
                              DINILAI</th>
                          </tr>
                          <tr>
                            <!-- Setengah pertama tabel (kuning) -->
                            <th class="table-warning text-center fw-bold">Elemen Bangunan</th>
                            <th class="table-warning text-center fw-bold">Spesifikasi Umum Bangunan Standard</th>
                            <th class="table-warning text-center fw-bold">Spesifikasi Material Model</th>
                            <th class="table-warning text-center fw-bold">Biaya Unit Terpasang</th>
                            <th class="table-warning text-center fw-bold">Volume (%)</th>
                            <th class="table-warning text-center fw-bold">BBR x Volume</th>

                            <!-- Setengah kedua tabel (biru) -->
                            <th class="table-primary text-center fw-bold">Elemen Bangunan</th>
                            <th class="table-primary text-center fw-bold">Spesifikasi Material Objek yang Dinilai</th>
                            <th class="table-primary text-center fw-bold">Biaya Unit Terpasang</th>
                            <th class="table-primary text-center fw-bold">Volume (%)</th>
                            <th class="table-primary text-center fw-bold">Adjustment Lain</th>
                            <th class="table-primary text-center fw-bold">Hasil Perhitungan Biaya Langsung</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="12" class="bold bg-light-gray"> <strong>A. BIAYA LANGSUNG (HARD
                                COST)</strong></td>
                          </tr>
                          <!-- PONDASI -->
                          <tr>
                            <!-- Biaya unit standart -->
                            <td class="pek fw-bold">Pondasi</td>
                            <td class="spek">Menggunakan pondasi dangkal dengan pondasi tapak dan sloof dengan mutu
                              beton tinggi (setara K-300) dan sebagian kecil menggunakan pondasi batu kali</td>
                            <td class="spek">Tapak Beton dan Batu Kali</td>
                            <td class="angka">1.000.000.000</td>
                            <td class="persen">100.0%</td>
                            <td class="angka">1.000.000.000</td>

                            <!-- Biaya unit terpasang -->
                            <td class="pek fw-bold">Pondasi</td>
                            <td class="spek">Tiang Pancang / Bor Pile</td>
                            <td class="angka">1.000.000.000</td>
                            <td class="persen">100.0%</td>
                            <td class="angka vermid"><input type="number" value="100"></td>
                            <td class="angka vermid">1.000.000.000</td>
                          </tr><!-- AKHIR PEK. PONDASI, STRUKTUR, PLAFON, LANTAI, UTILITAS -->
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Struktur</td>
                            <td>Menggunakan mutu beton sedang (setara K-225), yang terdiri dari kolom, balok, ring balok
                            </td>
                            <td>Beton Bertulang</td>
                            <td>1.418.170</td>
                            <td>100%</td>
                            <td>1.418.170</td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Struktur</td>
                            <td>Beton Bertulang</td>
                            <td>1.418.170</td>
                            <td>100%</td>
                            <td><input type="number" value="1000"></td>
                            <td>1.418.170</td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Rangka Atap</td>
                            <td>Menggunakan kuda-kuda dan rangka atap baja ringan.</td>
                            <td>Baja Ringan (Atap Genteng)</td>
                            <td>224.163</td>
                            <td>6.7%</td>
                            <td>151.306</td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Rangka Atap</td>
                            <td>Baja Ringan (Atap Genteng)</td>
                            <td>224.163</td>
                            <td>100,0%</td>
                            <td><input type="number" value="1000"></td>
                            <td>217.509</td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Penutup Atap</td>
                            <td>Genteng beton, dilengkapi dengan canopy teras dan listplank</td>
                            <td>
                              <ul>
                                <li>Dak Beton</li>
                                <li>Genteng Beton</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>270.282</li>
                                <li>195.610</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>32,4%</li>
                                <li>67,6%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>87.505</li>
                                <li>132.281</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Penutup Atap</td>
                            <td>Genteng Beton</td>
                            <td>
                              195.610
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                            </td>
                            <td>
                              189.804
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Plafon</td>
                            <td>Plafon gypsum setara Knauf, list cornice 5 cm dengan rangka hollow galvanis, di cat
                              setara Catylac; sebagian kecil menggunakan plafon GRC 6 mm untuk area basah</td>
                            <td>
                              <ul>
                                <li>Beton Ekspose</li>
                                <li>GRC</li>
                                <li>Gypsum</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>117.523</li>
                                <li>220.052</li>
                                <li>179.621</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>11,3%</li>
                                <li>4,1%</li>
                                <li>84,6%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>9.014</li>
                                <li>220.052</li>
                                <li>179.621</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Plafon</td>
                            <td>Gypsum</td>
                            <td>
                              179.621
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                            </td>
                            <td>
                              179.621
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Dinding</td>
                            <td>Pasangan dinding bata merah, diplester, diaci dan dilapisi cat (setara Catylac); untuk
                              kamar mandi dilapis keramik dinding 20x30 setara Imperium; ketinggian dinding dalam 3,2 m
                            </td>
                            <td>
                              <ul>
                                <li>Bata Merah</li>
                                <li>Dilapis Cat (Diplester dan Diaci)</li>
                                <li>Dilapis Keramik</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>295.384</li>
                                <li>679.902</li>
                                <li>1.562.620</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>100,0%</li>
                                <li>66,5%</li>
                                <li>6,2%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>295.384</li>
                                <li>679.902</li>
                                <li>1.562.620</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">
                              <ul>
                                <li>Dinding</li>
                                <li>Pelapis Dinding</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>Bata Ringan</li>
                                <li>Dilapis Cat (Diplester dan Diaci)</li>
                                <li>Dilapis Granit/ Homogenous Tile</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>354.115</li>
                                <li>679.902</li>
                                <li>2.680.933</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>100,0%</li>
                                <li>80,0%</li>
                                <li>11,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>247.351</li>
                                <li>379.931</li>
                                <li>205.991</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Pintu dan Jendela</td>
                            <td>
                              Kusen pintu, daun pintu dan rangka jendela kayu kelas II setara Kamper, dengan jendela
                              kaca polos tebal 5 mm, pintu kamar mandi PVC Grade A
                            </td>
                            <td>
                              <ul>
                                <li>Pintu Kayu Panil</li>
                                <li>Jendela Kaca Rk Kayu</li>
                                <li>Pintu KM UPVC/PVC</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>446.849</li>
                                <li>155.220</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>42,4%</li>
                                <li>38,4%</li>
                                <li>19,2%</li>
                              </ul>
                            </td>
                            <td>
                              <li>9.014</li>
                              <li>220.052</li>
                              <li>179.621</li>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Pintu dan Jendela</td>
                            <td>
                              <ul>
                                <li>Pintu Kayu Panil</li>
                                <li>Pintu Kaca Rk Aluminium</li>
                                <li>Jendela Kaca Rk Kayu</li>
                                <li>Jendela Kaca Rk Aluminium</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>434.789</li>
                                <li>446.849</li>
                                <li>434.789</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>45,0%</li>
                                <li>18,0%</li>
                                <li>12,0%</li>
                                <li>25,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>171.145</li>
                                <li>69.045</li>
                                <li>47.307</li>
                                <li>95.895</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Lantai</td>
                            <td>
                              Penutup lantai menggunakan keramik 40x40 setara Imperium dan granit 60x60 setara granito;
                              lantai kamar mandi menggunakan keramik lantai anti slip ukuran 30x30 setara Imperium
                            </td>
                            <td>
                              <ul>
                                <li>Granit/Homogenous Tile</li>
                                <li>Keramik</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>446.849</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>42,4%</li>
                                <li>38,4%</li>
                              </ul>
                            </td>
                            <td>
                              <li>9.014</li>
                              <li>220.052</li>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Lantai</td>
                            <td>
                              <ul>
                                <li>Granit/Homogenous Tile</li>
                                <li>Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>508.341</li>
                                <li>677.017</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>7,0%</li>
                                <li>93,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>35.584</li>
                                <li>629.626</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Utilitas</td>
                            <td>
                              Mencakup instalasi listrik, air kotor dan air bersih ; peralatan sanitair closet duduk ex
                              american standart, pipa air bersih dan kotor setara wavin AW, Bak fiber, dan Septictank
                              pas bata+plat beton include resapan; peralatan listrik setara broco, eterna dan philips
                            </td>
                            <td>
                              Utilitas
                            </td>
                            <td>
                              232.115
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              232.115
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Utilitas</td>
                            <td>
                              Mencakup instalasi listrik, air kotor dan air bersih ; peralatan sanitair closet duduk ex
                              american standart, pipa air bersih dan kotor setara wavin AW, Bak fiber, dan Septictank
                              pas bata+plat beton include resapan; peralatan listrik setara broco, eterna dan philips
                            </td>
                            <td>
                              232.115
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <br><br><button type="submit" name="update-adjustmen" value="245620"
                                class="btn btn-primary" ">Update<br>Adjustmen</button>
                                                                </td>
                                                                <td>
                                                                  232.115
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td colspan=" 5" class="fw-bold">Total Biaya Langsung
                            </td>
                            <td class="fw-bold">4.586.974</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung</td>
                            <td class="fw-bold">4.883.990</td>
                          </tr>
                          <tr>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK</td>
                            <td class="fw-bold">4.086.994</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK </td>
                            <td class="fw-bold">4.351.635</td>
                          </tr>
                          <tr>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK & Indeks Lantai (A)</td>
                            <td class="fw-bold">4.086.994</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK & Indeks Lantai (A)</td>
                            <td class="fw-bold">4.351.635</td>
                          </tr>
                          <tr>
                            <td colspan="3" class="fw-bold">B. BIAYA TAK LANGSUNG</td>
                            <td colspan="2" class="fw-bold">MODEL ACUAN</td>
                            <td class="fw-bold">OBJEK DINILAI</td>
                            <td colspan="3" class="fw-bold">C. TOTAL BIAYA LANGSUNG DAN BIAYA TAK LANGSUNG</td>
                            <td colspan="2" class="fw-bold">MODEL ACUAN</td>
                            <td class="fw-bold">OBJEK DINILAI</td>
                          </tr>
                          <tr>
                            <td>Profesional Fee</td>
                            <td colspan="2">
                              Alokasi biaya untuk konsultan perencana dan konsultan pengawas. Asumsi besaran biaya berkisar 3% dari total biaya konstruksi
                            </td>
                            <td colspan="2">122.610</td>
                            <td>130.549 </td>
                            <td colspan="3" class="fw-bold">TOTAL BRB (A+B) (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">4.679.608</td>
                            <td class="fw-bold">4.982.623</td>
                          </tr>
                          <tr>
                            <td>Biaya Perijinan</td>
                            <td colspan="2">
                              Alokasi biaya untuk perijinan bangunan. Asumsi besaran biaya berkisar 1,5% dari total biaya konstruksi.
                            </td>
                            <td colspan="2">61.305</td>
                            <td>65.275</td>
                            <td colspan="3" class="fw-bold">PPn</td>
                            <td colspan="2" class="fw-bold">514.757</td>
                            <td class="fw-bold">548.089</td>
                          </tr>
                          <tr>
                            <td>Keuntungan Kontraktor</td>
                            <td colspan="2">
                              Anggaran biaya tambahan untuk alokasi keuntungan pengembang, besaran biaya berkisar 10% dari total biaya konstruksi.
                            </td>
                            <td colspan="2">408.699</td>
                            <td>435.164</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">5.190.000</td>
                            <td class="fw-bold">5.530.000</td>
                          </tr>
                          <tr>
                            <td>Total Biaya Tak Langsung</td>
                            <td colspan="2">
                              -
                            </td>
                            <td colspan="2">592.614</td>
                            <td>630.988</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp)</td>
                            <td colspan="2" class="fw-bold">939.390.000</td>
                            <td class="fw-bold">1.000.930.000</td>
                          </tr>
                          <tr>
                            <td>Interest During Constructions</td>
                            <td colspan="2">
                              6.14%
                            </td>
                            <td colspan="2">57.678.546 </td>
                            <td>61.457.102</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp) + IDC</td>
                            <td colspan="2" class="fw-bold">997.068.546 </td>
                            <td class="fw-bold">1.062.387.102</td>
                          </tr>
                          <tr>
                            <td></td>
                            <td colspan="2">

                            </td>
                            <td colspan="2"></td>
                            <td></td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp) + IDC (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">5.510.000 </td>
                            <td class="fw-bold">5.869.500</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
          <h4>Data Pembanding : Rumah Tinggal – Perumahan Green Garden, Sumberan, Desa Ngestiharjo, Kec. Kasihan, Kabupaten Bantul, Provinsi Daerah Istimewa Yogyakarta</h4>
          <div class="container-fluid mt-4 table-responsive">
            <div class="row">
              <!-- Bagian Kiri: Gambar dan Data Bangunan -->
              <div class="col-md-4">
                <img
                  src="https://sip-zefapaskahalexa.radata.co.id/wp-content/uploads/2025/03/52-886751583-67e109147e40b.jpg"
                  class="img-fluid rounded shadow" alt="Foto Properti">

                <h4 class="mt-3">Data Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Tipikal Bangunan (Spec Standart BTB) :</strong></td>
                    <td>Rumah Tinggal Menengah 2 Lantai</td>
                  </tr>
                  <tr>
                    <td><strong>Provinsi / Kabupaten :</strong></td>
                    <td>Di Yogyakarta / Kab. Bantul</td>
                  </tr>
                  <tr>
                    <td><strong>Jumlah Lantai:</strong></td>
                    <td>2 Lantai</td>
                  </tr>
                  <tr>
                    <td><strong>Umur Ekonomis:</strong></td>
                    <td>30 Tahun</td>
                  </tr>
                  <tr>
                    <td><strong>Index Lantai (ILM):</strong></td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td><strong>Index Kemahalan (IKK):</strong></td>
                    <td>0.891</td>
                  </tr>
                  <tr>
                    <td><strong>Tahun Dibangun:</strong></td>
                    <td>2024</td>
                  </tr>
                  <tr>
                    <td><strong>Tahun Renovasi:</strong></td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td><strong>Bobot Renovasi:</strong></td>
                    <td>0%</td>
                  </tr>
                  <tr>
                    <td><strong>Kondisi Visual Pengamatan:</strong></td>
                    <td>Baru</td>
                  </tr>
                  <tr>
                    <td><strong>Catatan Khusus Bangunan :</strong></td>
                    <td>Lantai 1 = ±19 m², Lantai 2 = ±5 m²</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Lantai 1 :</strong></td>
                    <td>102.68 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Lantai 2:</strong></td>
                    <td>102.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Terpotong:</strong></td>
                    <td>24 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total:</strong></td>
                    <td>181.46 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Pembulatan:</strong></td>
                    <td>181 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Pintu & Jendela</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Pintu kayu panil :</strong></td>
                    <td>17.97 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Pintu kaca rangka almunium</strong></td>
                    <td>7.36 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Jendela kaca rangka kayu</strong></td>
                    <td>4.77 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Jendela kaca rangka almunium</strong></td>
                    <td>10.14 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total</strong></td>
                    <td>40.24 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Dinding</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Dinding :</strong></td>
                    <td>317.12 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total (dikurangi luas pintu & jendela) :</strong></td>
                    <td>276.88 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Rangka Atap (Datar)</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Rangka Atap Datar :</strong></td>
                    <td>97.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total :</strong></td>
                    <td>98 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Atap (Datar)</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Atap Datar :</strong></td>
                    <td>97.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total :</strong></td>
                    <td>98 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Rasio Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Rasio Luas Rangka Atap (Datar) dibagi Lantai :</strong></td>
                    <td>54.14% -> BUT Standar DKI : 55.8%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Luas Atap (Datar) dibagi Lantai :</strong></td>
                    <td>54.14% -> BUT Standar DKI : 55.8%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Volume Dinding dibagi Lantai :</strong></td>
                    <td>152.97% -> BUT Standar DKI : 219%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Volume Pintu/Jendela dibagi Lantai :</strong></td>
                    <td>22.23% -> BUT Standar DKI : 25.2%</td>
                  </tr>
                </table>

              </div>

              <!-- Bagian Kanan: Navigasi Tabs -->
              <div class="col-md-8">

                <div class="tab-content mt-3">
                  <!-- Tab: Spesifikasi Standar BTB -->
                  <div id="standar">
                    <h4 class="text-center">BRB SPESIFIKASI STANDAR BTB</h4>
                    <div>
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th class="table-warning text-center fw-bold" colspan="6">BRB SPESIFIKASI STANDAR BTB
                              MAPPI TAHUN
                              2024 SESUAI
                              LOKASI</th>
                            <th class="table-primary text-center fw-bold" colspan="6">BRB SPESIFIKASI OBJEK YANG
                              DINILAI</th>
                          </tr>
                          <tr>
                            <!-- Setengah pertama tabel (kuning) -->
                            <th class="table-warning text-center fw-bold">Elemen Bangunan</th>
                            <th class="table-warning text-center fw-bold">Spesifikasi Umum Bangunan Standard</th>
                            <th class="table-warning text-center fw-bold">Spesifikasi Material Model</th>
                            <th class="table-warning text-center fw-bold">Biaya Unit Terpasang</th>
                            <th class="table-warning text-center fw-bold">Volume (%)</th>
                            <th class="table-warning text-center fw-bold">BBR x Volume</th>

                            <!-- Setengah kedua tabel (biru) -->
                            <th class="table-primary text-center fw-bold">Elemen Bangunan</th>
                            <th class="table-primary text-center fw-bold">Spesifikasi Material Objek yang Dinilai</th>
                            <th class="table-primary text-center fw-bold">Biaya Unit Terpasang</th>
                            <th class="table-primary text-center fw-bold">Volume (%)</th>
                            <th class="table-primary text-center fw-bold">Adjustment Lain</th>
                            <th class="table-primary text-center fw-bold">Hasil Perhitungan Biaya Langsung</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="12" class="bold bg-light-gray"> <strong>A. BIAYA LANGSUNG (HARD
                                COST)</strong></td>
                          </tr>
                          <!-- PONDASI -->
                          <tr>
                            <!-- Biaya unit standart -->
                            <td class="pek fw-bold">Pondasi</td>
                            <td class="spek">Menggunakan pondasi dangkal dengan pondasi tapak dan sloof dengan mutu
                              beton tinggi (setara K-300) dan sebagian kecil menggunakan pondasi batu kali</td>
                            <td class="spek">Tapak Beton dan Batu Kali</td>
                            <td class="angka">1.000.000.000</td>
                            <td class="persen">100.0%</td>
                            <td class="angka">1.000.000.000</td>

                            <!-- Biaya unit terpasang -->
                            <td class="pek fw-bold">Pondasi</td>
                            <td class="spek">Tiang Pancang / Bor Pile</td>
                            <td class="angka">1.000.000.000</td>
                            <td class="persen">100.0%</td>
                            <td class="angka vermid"><input type="number" value="100"></td>
                            <td class="angka vermid">1.000.000.000</td>
                          </tr><!-- AKHIR PEK. PONDASI, STRUKTUR, PLAFON, LANTAI, UTILITAS -->
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Struktur</td>
                            <td>Menggunakan mutu beton sedang (setara K-225), yang terdiri dari kolom, balok, ring balok
                            </td>
                            <td>Beton Bertulang</td>
                            <td>1.418.170</td>
                            <td>100%</td>
                            <td>1.418.170</td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Struktur</td>
                            <td>Beton Bertulang</td>
                            <td>1.418.170</td>
                            <td>100%</td>
                            <td><input type="number" value="1000"></td>
                            <td>1.418.170</td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Rangka Atap</td>
                            <td>Menggunakan kuda-kuda dan rangka atap baja ringan.</td>
                            <td>Baja Ringan (Atap Genteng)</td>
                            <td>224.163</td>
                            <td>6.7%</td>
                            <td>151.306</td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Rangka Atap</td>
                            <td>Baja Ringan (Atap Genteng)</td>
                            <td>224.163</td>
                            <td>100,0%</td>
                            <td><input type="number" value="1000"></td>
                            <td>217.509</td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Penutup Atap</td>
                            <td>Genteng beton, dilengkapi dengan canopy teras dan listplank</td>
                            <td>
                              <ul>
                                <li>Dak Beton</li>
                                <li>Genteng Beton</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>270.282</li>
                                <li>195.610</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>32,4%</li>
                                <li>67,6%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>87.505</li>
                                <li>132.281</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Penutup Atap</td>
                            <td>Genteng Beton</td>
                            <td>
                              195.610
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                            </td>
                            <td>
                              189.804
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Plafon</td>
                            <td>Plafon gypsum setara Knauf, list cornice 5 cm dengan rangka hollow galvanis, di cat
                              setara Catylac; sebagian kecil menggunakan plafon GRC 6 mm untuk area basah</td>
                            <td>
                              <ul>
                                <li>Beton Ekspose</li>
                                <li>GRC</li>
                                <li>Gypsum</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>117.523</li>
                                <li>220.052</li>
                                <li>179.621</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>11,3%</li>
                                <li>4,1%</li>
                                <li>84,6%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>9.014</li>
                                <li>220.052</li>
                                <li>179.621</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Plafon</td>
                            <td>Gypsum</td>
                            <td>
                              179.621
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                            </td>
                            <td>
                              179.621
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Dinding</td>
                            <td>Pasangan dinding bata merah, diplester, diaci dan dilapisi cat (setara Catylac); untuk
                              kamar mandi dilapis keramik dinding 20x30 setara Imperium; ketinggian dinding dalam 3,2 m
                            </td>
                            <td>
                              <ul>
                                <li>Bata Merah</li>
                                <li>Dilapis Cat (Diplester dan Diaci)</li>
                                <li>Dilapis Keramik</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>295.384</li>
                                <li>679.902</li>
                                <li>1.562.620</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>100,0%</li>
                                <li>66,5%</li>
                                <li>6,2%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>295.384</li>
                                <li>679.902</li>
                                <li>1.562.620</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">
                              <ul>
                                <li>Dinding</li>
                                <li>Pelapis Dinding</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>Bata Ringan</li>
                                <li>Dilapis Cat (Diplester dan Diaci)</li>
                                <li>Dilapis Granit/ Homogenous Tile</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>354.115</li>
                                <li>679.902</li>
                                <li>2.680.933</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>100,0%</li>
                                <li>80,0%</li>
                                <li>11,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>247.351</li>
                                <li>379.931</li>
                                <li>205.991</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Pintu dan Jendela</td>
                            <td>
                              Kusen pintu, daun pintu dan rangka jendela kayu kelas II setara Kamper, dengan jendela
                              kaca polos tebal 5 mm, pintu kamar mandi PVC Grade A
                            </td>
                            <td>
                              <ul>
                                <li>Pintu Kayu Panil</li>
                                <li>Jendela Kaca Rk Kayu</li>
                                <li>Pintu KM UPVC/PVC</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>446.849</li>
                                <li>155.220</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>42,4%</li>
                                <li>38,4%</li>
                                <li>19,2%</li>
                              </ul>
                            </td>
                            <td>
                              <li>9.014</li>
                              <li>220.052</li>
                              <li>179.621</li>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Pintu dan Jendela</td>
                            <td>
                              <ul>
                                <li>Pintu Kayu Panil</li>
                                <li>Pintu Kaca Rk Aluminium</li>
                                <li>Jendela Kaca Rk Kayu</li>
                                <li>Jendela Kaca Rk Aluminium</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>434.789</li>
                                <li>446.849</li>
                                <li>434.789</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>45,0%</li>
                                <li>18,0%</li>
                                <li>12,0%</li>
                                <li>25,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>171.145</li>
                                <li>69.045</li>
                                <li>47.307</li>
                                <li>95.895</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Lantai</td>
                            <td>
                              Penutup lantai menggunakan keramik 40x40 setara Imperium dan granit 60x60 setara granito;
                              lantai kamar mandi menggunakan keramik lantai anti slip ukuran 30x30 setara Imperium
                            </td>
                            <td>
                              <ul>
                                <li>Granit/Homogenous Tile</li>
                                <li>Keramik</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>446.849</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>42,4%</li>
                                <li>38,4%</li>
                              </ul>
                            </td>
                            <td>
                              <li>9.014</li>
                              <li>220.052</li>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Lantai</td>
                            <td>
                              <ul>
                                <li>Granit/Homogenous Tile</li>
                                <li>Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>508.341</li>
                                <li>677.017</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>7,0%</li>
                                <li>93,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>35.584</li>
                                <li>629.626</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Utilitas</td>
                            <td>
                              Mencakup instalasi listrik, air kotor dan air bersih ; peralatan sanitair closet duduk ex
                              american standart, pipa air bersih dan kotor setara wavin AW, Bak fiber, dan Septictank
                              pas bata+plat beton include resapan; peralatan listrik setara broco, eterna dan philips
                            </td>
                            <td>
                              Utilitas
                            </td>
                            <td>
                              232.115
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              232.115
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Utilitas</td>
                            <td>
                              Mencakup instalasi listrik, air kotor dan air bersih ; peralatan sanitair closet duduk ex
                              american standart, pipa air bersih dan kotor setara wavin AW, Bak fiber, dan Septictank
                              pas bata+plat beton include resapan; peralatan listrik setara broco, eterna dan philips
                            </td>
                            <td>
                              232.115
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <br><br><button type="submit" name="update-adjustmen" value="245620"
                                class="btn btn-primary" ">Update<br>Adjustmen</button>
                              </td>
                              <td>
                                232.115
                              </td>
                            </tr>
                            <tr>
                              <td colspan=" 5" class="fw-bold">Total Biaya Langsung
                            </td>
                            <td class="fw-bold">4.586.974</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung</td>
                            <td class="fw-bold">4.883.990</td>
                          </tr>
                          <tr>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK</td>
                            <td class="fw-bold">4.086.994</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK </td>
                            <td class="fw-bold">4.351.635</td>
                          </tr>
                          <tr>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK & Indeks Lantai (A)
                            </td>
                            <td class="fw-bold">4.086.994</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK & Indeks Lantai (A)
                            </td>
                            <td class="fw-bold">4.351.635</td>
                          </tr>
                          <tr>
                            <td colspan="3" class="fw-bold">B. BIAYA TAK LANGSUNG</td>
                            <td colspan="2" class="fw-bold">MODEL ACUAN</td>
                            <td class="fw-bold">OBJEK DINILAI</td>
                            <td colspan="3" class="fw-bold">C. TOTAL BIAYA LANGSUNG DAN BIAYA TAK LANGSUNG</td>
                            <td colspan="2" class="fw-bold">MODEL ACUAN</td>
                            <td class="fw-bold">OBJEK DINILAI</td>
                          </tr>
                          <tr>
                            <td>Profesional Fee</td>
                            <td colspan="2">
                              Alokasi biaya untuk konsultan perencana dan konsultan pengawas. Asumsi besaran biaya
                              berkisar 3% dari total biaya konstruksi
                            </td>
                            <td colspan="2">122.610</td>
                            <td>130.549 </td>
                            <td colspan="3" class="fw-bold">TOTAL BRB (A+B) (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">4.679.608</td>
                            <td class="fw-bold">4.982.623</td>
                          </tr>
                          <tr>
                            <td>Biaya Perijinan</td>
                            <td colspan="2">
                              Alokasi biaya untuk perijinan bangunan. Asumsi besaran biaya berkisar 1,5% dari total
                              biaya konstruksi.
                            </td>
                            <td colspan="2">61.305</td>
                            <td>65.275</td>
                            <td colspan="3" class="fw-bold">PPn</td>
                            <td colspan="2" class="fw-bold">514.757</td>
                            <td class="fw-bold">548.089</td>
                          </tr>
                          <tr>
                            <td>Keuntungan Kontraktor</td>
                            <td colspan="2">
                              Anggaran biaya tambahan untuk alokasi keuntungan pengembang, besaran biaya berkisar 10%
                              dari total biaya konstruksi.
                            </td>
                            <td colspan="2">408.699</td>
                            <td>435.164</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">5.190.000</td>
                            <td class="fw-bold">5.530.000</td>
                          </tr>
                          <tr>
                            <td>Total Biaya Tak Langsung</td>
                            <td colspan="2">
                              -
                            </td>
                            <td colspan="2">592.614</td>
                            <td>630.988</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp)</td>
                            <td colspan="2" class="fw-bold">939.390.000</td>
                            <td class="fw-bold">1.000.930.000</td>
                          </tr>
                          <tr>
                            <td>Interest During Constructions</td>
                            <td colspan="2">
                              6.14%
                            </td>
                            <td colspan="2">57.678.546 </td>
                            <td>61.457.102</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp) + IDC</td>
                            <td colspan="2" class="fw-bold">997.068.546 </td>
                            <td class="fw-bold">1.062.387.102</td>
                          </tr>
                          <tr>
                            <td></td>
                            <td colspan="2">

                            </td>
                            <td colspan="2"></td>
                            <td></td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp) + IDC (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">5.510.000 </td>
                            <td class="fw-bold">5.869.500</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <h4>Data Pembanding : Rumah Tinggal – Perumahan Taman Griya Indah VI, Sumberan, Desa Ngestiharjo, Kec. Kasihan, Kabupaten Bantul, Provinsi Daerah Istimewa Yogyakarta</h4>
          <div class="container-fluid mt-4 table-responsive">
            <div class="row">
              <!-- Bagian Kiri: Gambar dan Data Bangunan -->
              <div class="col-md-4">
                <img
                  src="https://sip-zefapaskahalexa.radata.co.id/wp-content/uploads/2025/03/52-886751583-67e109147e40b.jpg"
                  class="img-fluid rounded shadow" alt="Foto Properti">

                <h4 class="mt-3">Data Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Tipikal Bangunan (Spec Standart BTB) :</strong></td>
                    <td>Rumah Tinggal Menengah 2 Lantai</td>
                  </tr>
                  <tr>
                    <td><strong>Provinsi / Kabupaten :</strong></td>
                    <td>Di Yogyakarta / Kab. Bantul</td>
                  </tr>
                  <tr>
                    <td><strong>Jumlah Lantai:</strong></td>
                    <td>2 Lantai</td>
                  </tr>
                  <tr>
                    <td><strong>Umur Ekonomis:</strong></td>
                    <td>30 Tahun</td>
                  </tr>
                  <tr>
                    <td><strong>Index Lantai (ILM):</strong></td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td><strong>Index Kemahalan (IKK):</strong></td>
                    <td>0.891</td>
                  </tr>
                  <tr>
                    <td><strong>Tahun Dibangun:</strong></td>
                    <td>2024</td>
                  </tr>
                  <tr>
                    <td><strong>Tahun Renovasi:</strong></td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td><strong>Bobot Renovasi:</strong></td>
                    <td>0%</td>
                  </tr>
                  <tr>
                    <td><strong>Kondisi Visual Pengamatan:</strong></td>
                    <td>Baru</td>
                  </tr>
                  <tr>
                    <td><strong>Catatan Khusus Bangunan :</strong></td>
                    <td>Lantai 1 = ±19 m², Lantai 2 = ±5 m²</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Lantai 1 :</strong></td>
                    <td>102.68 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Lantai 2:</strong></td>
                    <td>102.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Terpotong:</strong></td>
                    <td>24 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total:</strong></td>
                    <td>181.46 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Pembulatan:</strong></td>
                    <td>181 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Pintu & Jendela</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Pintu kayu panil :</strong></td>
                    <td>17.97 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Pintu kaca rangka almunium</strong></td>
                    <td>7.36 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Jendela kaca rangka kayu</strong></td>
                    <td>4.77 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Jendela kaca rangka almunium</strong></td>
                    <td>10.14 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total</strong></td>
                    <td>40.24 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Dinding</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Dinding :</strong></td>
                    <td>317.12 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total (dikurangi luas pintu & jendela) :</strong></td>
                    <td>276.88 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Rangka Atap (Datar)</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Rangka Atap Datar :</strong></td>
                    <td>97.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total :</strong></td>
                    <td>98 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Luas Atap (Datar)</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Luas Atap Datar :</strong></td>
                    <td>97.78 m2</td>
                  </tr>
                  <tr>
                    <td><strong>Total :</strong></td>
                    <td>98 m2</td>
                  </tr>
                </table>

                <h4 class="mt-3">Rasio Bangunan</h4>
                <table class="table table-bordered">
                  <tr>
                    <td><strong>Rasio Luas Rangka Atap (Datar) dibagi Lantai :</strong></td>
                    <td>54.14% -> BUT Standar DKI : 55.8%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Luas Atap (Datar) dibagi Lantai :</strong></td>
                    <td>54.14% -> BUT Standar DKI : 55.8%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Volume Dinding dibagi Lantai :</strong></td>
                    <td>152.97% -> BUT Standar DKI : 219%</td>
                  </tr>
                  <tr>
                    <td><strong>Rasio Volume Pintu/Jendela dibagi Lantai :</strong></td>
                    <td>22.23% -> BUT Standar DKI : 25.2%</td>
                  </tr>
                </table>

              </div>

              <!-- Bagian Kanan: Navigasi Tabs -->
              <div class="col-md-8">

                <div class="tab-content mt-3">
                  <!-- Tab: Spesifikasi Standar BTB -->
                  <div id="standar">
                    <h4 class="text-center">BRB SPESIFIKASI STANDAR BTB</h4>
                    <div>
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th class="table-warning text-center fw-bold" colspan="6">BRB SPESIFIKASI STANDAR BTB
                              MAPPI TAHUN
                              2024 SESUAI
                              LOKASI</th>
                            <th class="table-primary text-center fw-bold" colspan="6">BRB SPESIFIKASI OBJEK YANG
                              DINILAI</th>
                          </tr>
                          <tr>
                            <!-- Setengah pertama tabel (kuning) -->
                            <th class="table-warning text-center fw-bold">Elemen Bangunan</th>
                            <th class="table-warning text-center fw-bold">Spesifikasi Umum Bangunan Standard</th>
                            <th class="table-warning text-center fw-bold">Spesifikasi Material Model</th>
                            <th class="table-warning text-center fw-bold">Biaya Unit Terpasang</th>
                            <th class="table-warning text-center fw-bold">Volume (%)</th>
                            <th class="table-warning text-center fw-bold">BBR x Volume</th>

                            <!-- Setengah kedua tabel (biru) -->
                            <th class="table-primary text-center fw-bold">Elemen Bangunan</th>
                            <th class="table-primary text-center fw-bold">Spesifikasi Material Objek yang Dinilai</th>
                            <th class="table-primary text-center fw-bold">Biaya Unit Terpasang</th>
                            <th class="table-primary text-center fw-bold">Volume (%)</th>
                            <th class="table-primary text-center fw-bold">Adjustment Lain</th>
                            <th class="table-primary text-center fw-bold">Hasil Perhitungan Biaya Langsung</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="12" class="bold bg-light-gray"> <strong>A. BIAYA LANGSUNG (HARD
                                COST)</strong></td>
                          </tr>
                          <!-- PONDASI -->
                          <tr>
                            <!-- Biaya unit standart -->
                            <td class="pek fw-bold">Pondasi</td>
                            <td class="spek">Menggunakan pondasi dangkal dengan pondasi tapak dan sloof dengan mutu
                              beton tinggi (setara K-300) dan sebagian kecil menggunakan pondasi batu kali</td>
                            <td class="spek">Tapak Beton dan Batu Kali</td>
                            <td class="angka">1.000.000.000</td>
                            <td class="persen">100.0%</td>
                            <td class="angka">1.000.000.000</td>

                            <!-- Biaya unit terpasang -->
                            <td class="pek fw-bold">Pondasi</td>
                            <td class="spek">Tiang Pancang / Bor Pile</td>
                            <td class="angka">1.000.000.000</td>
                            <td class="persen">100.0%</td>
                            <td class="angka vermid"><input type="number" value="100"></td>
                            <td class="angka vermid">1.000.000.000</td>
                          </tr><!-- AKHIR PEK. PONDASI, STRUKTUR, PLAFON, LANTAI, UTILITAS -->
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Struktur</td>
                            <td>Menggunakan mutu beton sedang (setara K-225), yang terdiri dari kolom, balok, ring balok
                            </td>
                            <td>Beton Bertulang</td>
                            <td>1.418.170</td>
                            <td>100%</td>
                            <td>1.418.170</td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Struktur</td>
                            <td>Beton Bertulang</td>
                            <td>1.418.170</td>
                            <td>100%</td>
                            <td><input type="number" value="1000"></td>
                            <td>1.418.170</td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Rangka Atap</td>
                            <td>Menggunakan kuda-kuda dan rangka atap baja ringan.</td>
                            <td>Baja Ringan (Atap Genteng)</td>
                            <td>224.163</td>
                            <td>6.7%</td>
                            <td>151.306</td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Rangka Atap</td>
                            <td>Baja Ringan (Atap Genteng)</td>
                            <td>224.163</td>
                            <td>100,0%</td>
                            <td><input type="number" value="1000"></td>
                            <td>217.509</td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Penutup Atap</td>
                            <td>Genteng beton, dilengkapi dengan canopy teras dan listplank</td>
                            <td>
                              <ul>
                                <li>Dak Beton</li>
                                <li>Genteng Beton</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>270.282</li>
                                <li>195.610</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>32,4%</li>
                                <li>67,6%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>87.505</li>
                                <li>132.281</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Penutup Atap</td>
                            <td>Genteng Beton</td>
                            <td>
                              195.610
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                            </td>
                            <td>
                              189.804
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Plafon</td>
                            <td>Plafon gypsum setara Knauf, list cornice 5 cm dengan rangka hollow galvanis, di cat
                              setara Catylac; sebagian kecil menggunakan plafon GRC 6 mm untuk area basah</td>
                            <td>
                              <ul>
                                <li>Beton Ekspose</li>
                                <li>GRC</li>
                                <li>Gypsum</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>117.523</li>
                                <li>220.052</li>
                                <li>179.621</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>11,3%</li>
                                <li>4,1%</li>
                                <li>84,6%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>9.014</li>
                                <li>220.052</li>
                                <li>179.621</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Plafon</td>
                            <td>Gypsum</td>
                            <td>
                              179.621
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                            </td>
                            <td>
                              179.621
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Dinding</td>
                            <td>Pasangan dinding bata merah, diplester, diaci dan dilapisi cat (setara Catylac); untuk
                              kamar mandi dilapis keramik dinding 20x30 setara Imperium; ketinggian dinding dalam 3,2 m
                            </td>
                            <td>
                              <ul>
                                <li>Bata Merah</li>
                                <li>Dilapis Cat (Diplester dan Diaci)</li>
                                <li>Dilapis Keramik</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>295.384</li>
                                <li>679.902</li>
                                <li>1.562.620</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>100,0%</li>
                                <li>66,5%</li>
                                <li>6,2%</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>295.384</li>
                                <li>679.902</li>
                                <li>1.562.620</li>
                              </ul>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">
                              <ul>
                                <li>Dinding</li>
                                <li>Pelapis Dinding</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>Bata Ringan</li>
                                <li>Dilapis Cat (Diplester dan Diaci)</li>
                                <li>Dilapis Granit/ Homogenous Tile</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>354.115</li>
                                <li>679.902</li>
                                <li>2.680.933</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>100,0%</li>
                                <li>80,0%</li>
                                <li>11,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>247.351</li>
                                <li>379.931</li>
                                <li>205.991</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Pintu dan Jendela</td>
                            <td>
                              Kusen pintu, daun pintu dan rangka jendela kayu kelas II setara Kamper, dengan jendela
                              kaca polos tebal 5 mm, pintu kamar mandi PVC Grade A
                            </td>
                            <td>
                              <ul>
                                <li>Pintu Kayu Panil</li>
                                <li>Jendela Kaca Rk Kayu</li>
                                <li>Pintu KM UPVC/PVC</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>446.849</li>
                                <li>155.220</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>42,4%</li>
                                <li>38,4%</li>
                                <li>19,2%</li>
                              </ul>
                            </td>
                            <td>
                              <li>9.014</li>
                              <li>220.052</li>
                              <li>179.621</li>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Pintu dan Jendela</td>
                            <td>
                              <ul>
                                <li>Pintu Kayu Panil</li>
                                <li>Pintu Kaca Rk Aluminium</li>
                                <li>Jendela Kaca Rk Kayu</li>
                                <li>Jendela Kaca Rk Aluminium</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>434.789</li>
                                <li>446.849</li>
                                <li>434.789</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>45,0%</li>
                                <li>18,0%</li>
                                <li>12,0%</li>
                                <li>25,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>171.145</li>
                                <li>69.045</li>
                                <li>47.307</li>
                                <li>95.895</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Lantai</td>
                            <td>
                              Penutup lantai menggunakan keramik 40x40 setara Imperium dan granit 60x60 setara granito;
                              lantai kamar mandi menggunakan keramik lantai anti slip ukuran 30x30 setara Imperium
                            </td>
                            <td>
                              <ul>
                                <li>Granit/Homogenous Tile</li>
                                <li>Keramik</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>431.096</li>
                                <li>446.849</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>42,4%</li>
                                <li>38,4%</li>
                              </ul>
                            </td>
                            <td>
                              <li>9.014</li>
                              <li>220.052</li>
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Lantai</td>
                            <td>
                              <ul>
                                <li>Granit/Homogenous Tile</li>
                                <li>Granit/Homogenous Tile - Rumah Tinggal Mewah 2 Lantai</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>508.341</li>
                                <li>677.017</li>
                              </ul>
                            </td>
                            <td>
                              <ul>
                                <li>7,0%</li>
                                <li>93,0%</li>
                              </ul>
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <input type="number" value="1000">
                            </td>
                            <td>
                              <ul>
                                <li>35.584</li>
                                <li>629.626</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            {{-- BRB SPESIFIKASI STANDAR BTB MAPPI TAHUN 2024 SESUAI --}}
                            <td class="fw-bold">Utilitas</td>
                            <td>
                              Mencakup instalasi listrik, air kotor dan air bersih ; peralatan sanitair closet duduk ex
                              american standart, pipa air bersih dan kotor setara wavin AW, Bak fiber, dan Septictank
                              pas bata+plat beton include resapan; peralatan listrik setara broco, eterna dan philips
                            </td>
                            <td>
                              Utilitas
                            </td>
                            <td>
                              232.115
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              232.115
                            </td>
                            {{-- BRB SPESIFIKASI OBJEK YANG DINILAI --}}
                            <td class="fw-bold">Utilitas</td>
                            <td>
                              Mencakup instalasi listrik, air kotor dan air bersih ; peralatan sanitair closet duduk ex
                              american standart, pipa air bersih dan kotor setara wavin AW, Bak fiber, dan Septictank
                              pas bata+plat beton include resapan; peralatan listrik setara broco, eterna dan philips
                            </td>
                            <td>
                              232.115
                            </td>
                            <td>
                              100,0%
                            </td>
                            <td>
                              <input type="number" value="1000">
                              <br><br><button type="submit" name="update-adjustmen" value="245620"
                                class="btn btn-primary" ">Update<br>Adjustmen</button>
                                                                </td>
                                                                <td>
                                                                  232.115
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td colspan=" 5" class="fw-bold">Total Biaya Langsung
                            </td>
                            <td class="fw-bold">4.586.974</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung</td>
                            <td class="fw-bold">4.883.990</td>
                          </tr>
                          <tr>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK</td>
                            <td class="fw-bold">4.086.994</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK </td>
                            <td class="fw-bold">4.351.635</td>
                          </tr>
                          <tr>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK & Indeks Lantai (A)</td>
                            <td class="fw-bold">4.086.994</td>
                            <td colspan="5" class="fw-bold">Total Biaya Langsung Adjusment IKK & Indeks Lantai (A)</td>
                            <td class="fw-bold">4.351.635</td>
                          </tr>
                          <tr>
                            <td colspan="3" class="fw-bold">B. BIAYA TAK LANGSUNG</td>
                            <td colspan="2" class="fw-bold">MODEL ACUAN</td>
                            <td class="fw-bold">OBJEK DINILAI</td>
                            <td colspan="3" class="fw-bold">C. TOTAL BIAYA LANGSUNG DAN BIAYA TAK LANGSUNG</td>
                            <td colspan="2" class="fw-bold">MODEL ACUAN</td>
                            <td class="fw-bold">OBJEK DINILAI</td>
                          </tr>
                          <tr>
                            <td>Profesional Fee</td>
                            <td colspan="2">
                              Alokasi biaya untuk konsultan perencana dan konsultan pengawas. Asumsi besaran biaya berkisar 3% dari total biaya konstruksi
                            </td>
                            <td colspan="2">122.610</td>
                            <td>130.549 </td>
                            <td colspan="3" class="fw-bold">TOTAL BRB (A+B) (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">4.679.608</td>
                            <td class="fw-bold">4.982.623</td>
                          </tr>
                          <tr>
                            <td>Biaya Perijinan</td>
                            <td colspan="2">
                              Alokasi biaya untuk perijinan bangunan. Asumsi besaran biaya berkisar 1,5% dari total biaya konstruksi.
                            </td>
                            <td colspan="2">61.305</td>
                            <td>65.275</td>
                            <td colspan="3" class="fw-bold">PPn</td>
                            <td colspan="2" class="fw-bold">514.757</td>
                            <td class="fw-bold">548.089</td>
                          </tr>
                          <tr>
                            <td>Keuntungan Kontraktor</td>
                            <td colspan="2">
                              Anggaran biaya tambahan untuk alokasi keuntungan pengembang, besaran biaya berkisar 10% dari total biaya konstruksi.
                            </td>
                            <td colspan="2">408.699</td>
                            <td>435.164</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">5.190.000</td>
                            <td class="fw-bold">5.530.000</td>
                          </tr>
                          <tr>
                            <td>Total Biaya Tak Langsung</td>
                            <td colspan="2">
                              -
                            </td>
                            <td colspan="2">592.614</td>
                            <td>630.988</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp)</td>
                            <td colspan="2" class="fw-bold">939.390.000</td>
                            <td class="fw-bold">1.000.930.000</td>
                          </tr>
                          <tr>
                            <td>Interest During Constructions</td>
                            <td colspan="2">
                              6.14%
                            </td>
                            <td colspan="2">57.678.546 </td>
                            <td>61.457.102</td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp) + IDC</td>
                            <td colspan="2" class="fw-bold">997.068.546 </td>
                            <td class="fw-bold">1.062.387.102</td>
                          </tr>
                          <tr>
                            <td></td>
                            <td colspan="2">

                            </td>
                            <td colspan="2"></td>
                            <td></td>
                            <td colspan="3" class="fw-bold">TOTAL BRB Include PPn (Rp) + IDC (Rp/m2)</td>
                            <td colspan="2" class="fw-bold">5.510.000 </td>
                            <td class="fw-bold">5.869.500</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container mt-4">
            <h4>Data Rumah/Bangunan Terpilih</h4>
            <form>
              <div class="mb-3">
                <label class="form-label">Nomor ID Data Bangunan/Retail</label>
                <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
                  <option value="AL">ID Unique 1</option>
                  <option value="AL">ID Unique 2</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Nomor ID Data 1</label>
                <input type="number" class="form-control" value="245615">
              </div>
              <div class="mb-3">
                <label class="form-label">Nomor ID Data 2</label>
                <input type="number" class="form-control" value="245617">
              </div>
              <div class="mb-3">
                <label class="form-label">Nomor ID Data 3</label>
                <input type="number" class="form-control" value="80456">
              </div>

              <h4 class="mt-4">Data Tanah Kosong Terpilih</h4>

              <div class="mb-3">
                <label class="form-label">Nomor ID Data 1</label>
                <input type="number" class="form-control" value="245621">
              </div>
              <div class="mb-3">
                <label class="form-label">Nomor ID Data 2</label>
                <input type="number" class="form-control" value="32568">
              </div>
              <div class="mb-3">
                <label class="form-label">Nomor ID Data 3</label>
                <input type="number" class="form-control" value="80456">
              </div>
            </form>
            <button type="button" class="btn btn-primary mt-3">Simpan Data Terpilih</button>
          </div>
          <div id="map" style="height: 500px; width: 100%;" class="mt-5"></div>
        </div>


        {{-- NILAI TANAH --}}
        <div class="tab-pane fade" id="nilai-tanah">
          <h4>Nilai Tanah</h4>
          <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped text-center" style="width: 180%;font-size: 12px">
              <thead style="background-color: #162447;">
                <tr class="align-middle" >
                  <th width="12%" style="color: white;font-size: 12px" >DESKRIPSI</th>
                  <th width="19%" colspan="4" style="color: white;font-size: 12px">OBYEK PENILAIAN</th>
                  <th width="23%" colspan="4" style="color: white;font-size: 12px">DATA PEMBANDING 1<br>Nomor ID : 245708<br>Rumah Tinggal – Dsn. Jetis, Desa Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Prov. Daerah Istimewa Yogyakarta 55584, Indonesia</th>
                  <th width="23%" colspan="4" style="color: white;font-size: 12px">DATA PEMBANDING 2<br>Nomor ID : 245738<br>Rumah Tinggal – Dsn. Krajan, Desa Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55584, Indonesia</th>
                  <th width="23%" colspan="4" style="color: white;font-size: 12px">DATA PEMBANDING 3<br>Nomor ID : 245711<br>Tanah Kosong – Dsn. Jetis, Desa Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55584, Indonesia</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-start"><strong>Alamat Properti</strong></td>
                  <td colspan="4">Kampung Gebang, Dukuh Jetis RT.03 RW.44 (SHM NIB. 13.04.000001022.0), Wedomartani, Ngemplak, Kab. Sleman, Di Yogyakarta</td>
                  <td colspan="4">Dsn. Jetis, Desa Wedomartani, Kec. Ngemplak, Kab. Sleman, Prop. Daerah Istimewa Yogyakarta 55584, Indonesia</td>
                  <td colspan="4">Dsn. Krajan, Desa Wedomartani, Kec. Ngemplak, Kab. Sleman, Daerah Istimewa Yogyakarta 55584, Indonesia</td>
                  <td colspan="4">Dsn. Jetis, Desa Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Yogyakarta 55584, Indonesia</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Jarak dari Objek Penilaian</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">164 meter</td>
                  <td colspan="4">442 meter</td>
                  <td colspan="4">502 meter</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Koordinat Latitude</strong></td>
                  <td colspan="4">-7.74704838754155</td>
                  <td colspan="4">-7.7470483875415</td>
                  <td colspan="4">-7.7484655830141</td>
                  <td colspan="4">-7.7508334334178</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Koordinat Longitude</strong></td>
                  <td colspan="4">110.41352888460638</td>
                  <td colspan="4">110.41352888460638</td>
                  <td colspan="4">110.41394148223</td>
                  <td colspan="4">110.41601276057932</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Nama</strong></td>
                  <td colspan="4">Bpk. Suwandi</td>
                  <td colspan="4">Bpk. Suwandi</td>
                  <td colspan="4">Ibu Coming Partini</td>
                  <td colspan="4">Bok. Totok</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Telepon</strong></td>
                  <td colspan="4">08522451000</td>
                  <td colspan="4">08522451000</td>
                  <td colspan="4">08222054348</td>
                  <td colspan="4">08985350173</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Jenis Data (Transaksi/Penawaran)</strong></td>
                  <td colspan="4">Penawaran</td>
                  <td colspan="4">Penawaran</td>
                  <td colspan="4">Penawaran</td>
                  <td colspan="4">Penawaran</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Waktu Transaksi/Penawaran</strong></td>
                  <td colspan="4">25 March 2025</td>
                  <td colspan="4">25 March 2025</td>
                  <td colspan="4">25 March 2025</td>
                  <td colspan="4">25 March 2025</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Jenis Properti</strong></td>
                  <td colspan="4">Rumah tinggal</td>
                  <td colspan="4">Rumah tinggal</td>
                  <td colspan="4">Rumah tinggal</td>
                  <td colspan="4">Tanah Kosong</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Foto</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Luas Tanah</strong></td>
                  <td colspan="4">132 m²</td>
                  <td colspan="4">132 m²</td>
                  <td colspan="4">310 m²</td>
                  <td colspan="4">1150 m²</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Luas Bangunan</strong></td>
                  <td colspan="4">210 m²</td>
                  <td colspan="4">210 m²</td>
                  <td colspan="4">110 m²</td>
                  <td colspan="4">0 m²</td>
                </tr>
                <tr class="table-light">
                  <td class="text-start"><strong>UNIT PERBANDINGAN</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4"><a href="#">Edit</a></td>
                  <td colspan="4"><a href="#">Edit</a></td>
                  <td colspan="4"><a href="#">Edit</a></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Unit</strong></td>
                  <td colspan="4">m2</td>
                  <td colspan="4">m2</td>
                  <td colspan="4">m2</td>
                  <td colspan="4">m2</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Mata Uang</strong></td>
                  <td colspan="4">Rp</td>
                  <td colspan="4">Rp</td>
                  <td colspan="4">Rp</td>
                  <td colspan="4">Rp</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Indikasi Harga Penawaran</strong></td>
                  <td colspan="4">Rp 2.201.000.000</td>
                  <td colspan="4">Rp 599.000.000</td>
                  <td colspan="4">Rp 3.450.000.000</td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Diskon</strong></td>
                  <td colspan="4">22%</td>
                  <td colspan="4">10%</td>
                  <td colspan="4">5%</td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Kemungkinan Transaksi</strong></td>
                  <td colspan="4">Rp 1.716.780.000</td>
                  <td colspan="4">Rp 539.100.000</td>
                  <td colspan="4">Rp 3.277.500.000</td>
                  <td colspan="4"></td>
                </tr>
                <tr class="table-light">
                  <td class="text-start"><strong>Residual Process (if needed)</strong></td>
                  <td colspan="4">Metode Ekstraksi</td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Indikasi Biaya Pengganti Baru/m2 coba</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">3.683.058</td>
                  <td colspan="4">4.256.214</td>
                  <td colspan="4">-</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Indikasi Biaya Pengganti Baru Bangunan</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">773.442.180</td>
                  <td colspan="4">468.183.540</td>
                  <td colspan="4">-</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Tahun Bangunan / Indikasi Umur Ekonomis</strong></td>
                  <td colspan="4"></td>
                  <td colspan="2">2014</td>
                  <td colspan="2">30 thn</td>
                  <td colspan="2">2000</td>
                  <td colspan="2">30 thn</td>
                  <td colspan="2">-</td>
                  <td colspan="2">-</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Tahun Renovasi / Bobot Renov</strong></td>
                  <td colspan="4"></td>
                  <td colspan="2">N/A</td>
                  <td colspan="2">0%</td>
                  <td colspan="2">2010</td>
                  <td colspan="2">35%</td>
                  <td colspan="2">N/A</td>
                  <td colspan="2">0%</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Depresiasi</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Fisik</strong></td>
                  <td colspan="4"></td>
                  <td colspan="2">Kondisi Fisik Bangunan:</td>
                  <td >63.33%</td>
                  <td >36.67%</td>
                  <td colspan="2">Kondisi Fisik Bangunan:</td>
                  <td >71.67%%</td>
                  <td >36.67%</td>
                  <td colspan="2">Kondisi Fisik Bangunan:</td>
                  <td >100%</td>
                  <td >0%</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Kondisi Terlihat (Maintenance)</strong></td>
                  <td colspan="4"></td>
                  <td colspan="3">Baik</td>
                  <td >0%</td>
                  <td colspan="3">Baik</td>
                  <td >0%</td>
                  <td colspan="3">-</td>
                  <td >0%</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Kemunduran Fungsi</strong></td>
                  <td colspan="4"></td>
                  <td colspan="3">-</td>
                  <td >0%</td>
                  <td colspan="3">-</td>
                  <td >0%</td>
                  <td colspan="3">-</td>
                  <td >0%</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Kemunduran Ekonomis</strong></td>
                  <td colspan="4"></td>
                  <td colspan="3">-</td>
                  <td >0%</td>
                  <td colspan="3">-</td>
                  <td >0%</td>
                  <td colspan="3">-</td>
                  <td >0%</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Total Depresiasi</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">36.67%</td>
                  <td colspan="4">71.67%</td>
                  <td colspan="4">0%</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Indikasi Nilai Pasar Bangunan/m2</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">2.332.481</td>
                  <td colspan="4">1.205.785</td>
                  <td colspan="4">-</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Indikasi Nilai Pasar Bangunan</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">489.821.010</td>
                  <td colspan="4">132.636.350</td>
                  <td colspan="4">-</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Indikasi Nilai Pasar Tanah</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">1.226.958.990</td>
                  <td colspan="4">406.463.650</td>
                  <td colspan="4">3.277.500.000</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Indikasi Nilai Pasar Tanah / m2</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">3.957.932</td>
                  <td colspan="4">4.064.637</td>
                  <td colspan="4">2.850.000</td>
                </tr>
                <tr class="table-light fw-bold" >
                  <td class="text-start">ELEMEN PERBANDINGAN</td>
                  <td colspan="2">Deskripsi</td>
                  <td colspan="2"></td>
                  <td colspan="2">Deskripsi</td>
                  <td>%</td>
                  <td>[+/-] Penyesuaian</td>
                  <td colspan="2">Deskripsi</td>
                  <td>%</td>
                  <td>[+/-] Penyesuaian</td>
                  <td colspan="2">Deskripsi</td>
                  <td>%</td>
                  <td>[+/-] Penyesuaian</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>(1) Hak atas properti yang dialihkan</strong></td>
                  <td colspan="2"></td>
                  <td colspan="2">HGB, HGB</td>
                  <td colspan="2">HGB</td>
                  <td><input type="text" size="2" value="10" disabled style="cursor: not-allowed">%</td>
                  <td>0</td>
                  <td colspan="2">HGB</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">SHM</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="4"><i></i></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                </tr>
                <tr>
                <tr>
                  <td class="text-start"><strong>(2) Syarat Pembiayaan</strong></td>
                  <td colspan="2"></td>
                  <td colspan="2">Tunai</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="4"><i></i></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>(3) Kondisi Penjualan</strong></td>
                  <td colspan="2"></td>
                  <td colspan="2">Tunai</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="4"><i></i></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>(4) Pengeluaran yang dilakukan segera setelah pembelian</strong></td>
                  <td colspan="2"></td>
                  <td colspan="2">Tunai</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="4"><i></i></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>(5) Kondisi Pasar</strong></td>
                  <td colspan="2"></td>
                  <td colspan="2">Tunai</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Tunai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="4"></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                  <td colspan="4"><strong>3.957.932</strong></td>
                </tr>

                <tr class="table-light fw-bold">
                  <td class="text-start"><strong>Karakteristik Ekonomi (Jika Objek yang dinilai adalah Properti Komersial)</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Kualitas Pendapatan</strong></td>
                  <td colspan="2">Kemampuan menghasilkan pendapatan (Aglomerasi yang ditimbulkan dari tempat atau kawasan terhadap pendapatan)</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Biaya Operasional</strong></td>
                  <td colspan="2">Kemampuan menghasilkan pendapatan (Aglomerasi yang ditimbulkan dari tempat atau kawasan terhadap pendapatan)</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Ketentuan Sewa</strong></td>
                  <td colspan="2">Kemampuan menghasilkan pendapatan (Aglomerasi yang ditimbulkan dari tempat atau kawasan terhadap pendapatan)</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Manajemen</strong></td>
                  <td colspan="2">Kemampuan menghasilkan pendapatan (Aglomerasi yang ditimbulkan dari tempat atau kawasan terhadap pendapatan)</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Bauran Penyewa</strong></td>
                  <td colspan="2">Kemampuan menghasilkan pendapatan (Aglomerasi yang ditimbulkan dari tempat atau kawasan terhadap pendapatan)</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="2">Sub Total Lokasi Karakteristik Ekonomi (Jika Objek yang dinilai adalah Properti Komersial)</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                </tr>
                <tr class="table-light fw-bold">
                  <td class="text-start">Penggunaan</td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Zoning</strong></td>
                  <td colspan="2">Rencana Tata Ruang Wilayah</td>
                  <td colspan="2">Pemukiman</td>
                  <td colspan="2">Zona Perumahan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Zona Perumahan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Zona Perumahan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Ketentuan Umum Bangunan</strong></td>
                  <td colspan="2">KDB, KLB, Ketinggian dan ketentuan umum lainnya</td>
                  <td colspan="2">KDB -%, KLB - kali, GSB - meter, Ketinggian - lantai</td>
                  <td colspan="2">KDB -%, KLB - kali, GSB - meter, Ketinggian - lantai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">KDB -%, KLB - kali, GSB - meter, Ketinggian - lantai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">KDB -%, KLB - kali, GSB - meter, Ketinggian - lantai</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Penggunaan Existing</strong></td>
                  <td colspan="2">Kondisi Existing Penggunaan Objek (Terkembangkan atau Tanah Kosong)</td>
                  <td colspan="2">Pakai Sendiri
                    Pakai Sendiri</td>
                  <td colspan="2">Pakai Sendiri Rumah Tinggal</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Pakai Sendiri Rumah Tinggal</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Pakai Sendiri Rumah Tinggal</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="2">Sub Total Lokasi Penggunaan</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                </tr>
                <tr class="table-light fw-bold">
                  <td class="text-start">Komponen non-reality dalam penjualan</td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>FFE</strong></td>
                  <td colspan="2">Dilengkapi dengan Fixture, Furniture, Fixture (Furnished)</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Mesin</strong></td>
                  <td colspan="2">Dilengkapi dengan tambahan mesin utilitas bangunan</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="2">Sub Total Lokasi Komponen non-realty dalam penjualan</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                </tr>
                <tr class="table-light fw-bold">
                  <td class="text-start">Lokasi</td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td rowspan="2" class="text-start"><strong>Jarak terhadap CBD (Central Business District) atau Pusat Ekonomi</strong></td>
                  <td colspan="2">Dari Pusat Kota</td>
                  <td colspan="2">10,7 km dari Alun Alun Utara Yogyakarta</td>
                  <td colspan="2">10,7 km dari Alun Alun Utara Yogyakarta</td>
                  <td rowspan="2"><input type="text" size="2">%</td>
                  <td rowspan="2">0</td>
                  <td colspan="2">11 km dari Alun Alun Utara Yogyakarta</td>
                  <td rowspan="2"><input type="text" size="2">%</td>
                  <td rowspan="2">0</td>
                  <td colspan="2">12,4 km dari Alun Alun Utara Yogyakarta</td>
                  <td rowspan="2"><input type="text" size="2">%</td>
                  <td rowspan="2">0</td>
                </tr>
                <tr>
                  <td colspan="2">Dari Pusat Ekonomi terdekat (Pasar/ Mall)</td>
                  <td colspan="2">Pasar Condong Catur/ 1,7 KM</td>
                  <td colspan="2">Pasar Condong Catur/ 1,7 KM</td>
                  <td colspan="2">Pasar Condong Catur/ 2 KM</td>
                  <td colspan="2">Pasar Condong Catur/ 3,3 KM</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Kelas Jalan/Lebar Jalan</strong></td>
                  <td colspan="2">Jalan lingkungan (row 4 m)</td>
                  <td colspan="2">4 meter / Conblock</td>
                  <td colspan="2">4 meter / Aspal</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">2.5 meter / Conblock</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">3 meter / Cor Beton</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>View</strong></td>
                  <td colspan="2">Jalan lingkungan (row 4 m)</td>
                  <td colspan="2">4 meter / Conblock</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Aksesibilitas</strong></td>
                  <td colspan="2">Kemudahan Pencapaian</td>
                  <td colspan="2">Jl Candi Gebang/ 135 m</td>
                  <td colspan="2">Jl Candi Gebang/ 350 m</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Jl Candi Gebang/ 30 m
                  </td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Jl Stadion/ 750 m</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Kondisi Lingkungan</strong></td>
                  <td colspan="2">Gambaran atas kondisi spesifik	</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">
                  </td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2"></td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="2">Sub Total Lokasi Lokasi</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                </tr>
                <tr class="table-light fw-bold">
                  <td class="text-start">Karakteristik Fisik</td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Bentuk</strong></td>
                  <td colspan="2">Bentuk Tanah</td>
                  <td colspan="2">Persegipanjang</td>
                  <td colspan="2">Menyerupai trapesium</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Beraturan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Beraturan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Elevasi</strong></td>
                  <td colspan="2">Ketinggian permukaan tanah terhadap jalan</td>
                  <td colspan="2">0.1 meter</td>
                  <td colspan="2">0.1 meter</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">0.1 meter</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">-0.1 meter</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Topografi</strong></td>
                  <td colspan="2">Bentuk Tanah</td>
                  <td colspan="2">Persegipanjang</td>
                  <td colspan="2">Menyerupai trapesium</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Beraturan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Beraturan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Lebar Muka</strong></td>
                  <td colspan="2">Bentuk Tanah</td>
                  <td colspan="2">Persegipanjang</td>
                  <td colspan="2">Menyerupai trapesium</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Beraturan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Beraturan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Posisi</strong></td>
                  <td colspan="2">Bentuk Tanah</td>
                  <td colspan="2">Persegipanjang</td>
                  <td colspan="2">Menyerupai trapesium</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Beraturan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                  <td colspan="2">Beraturan</td>
                  <td><input type="text" size="2">%</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td><i>Adjusted Price</i></td>
                  <td colspan="2">Sub Total Lokasi Karakteristik Fisik</td>
                  <td colspan="2"></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                  <td colspan="2"></td>
                  <td><strong>0%</strong></td>
                  <td><strong>3.957.932</strong></td>
                </tr>

                <tr class="table-light fw-bold">
                  <td class="text-start">KESIMPULAN</td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Net Adjustment (max 15%)</strong></td>
                  <td colspan="4"></td>
                  <td colspan="2"></td>
                  <td>3%</td>
                  <td>105.193</td>
                  <td colspan="2"></td>
                  <td>46%</td>
                  <td>1.321.180</td>
                  <td colspan="2"></td>
                  <td style="color: red">46%</td>
                  <td>1.321.180</td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Harga Setelah Penyesuaian</strong></td>
                  <td colspan="4"></td>
                  <td colspan="4">4.169.830</td>
                  <td colspan="4">4.171.244</td>
                  <td colspan="4">4.171.180</td>
                </tr>
                <tr class="table-light fw-bold">
                  <td class="text-start">REKONSILIASI</td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Gross Adjustment (max 25%)</strong></td>
                  <td colspan="4"><strong>37%</strong></td>
                  <td colspan="2"></td>
                  <td><strong>6.5%</strong></td>
                  <td></td>
                  <td colspan="2"></td>
                  <td><strong>9.3%</strong></td>
                  <td></td>
                  <td colspan="2"></td>
                  <td><strong>21.2%</strong></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Bobot Absolut</strong></td>
                  <td colspan="4">37%</td>
                  <td colspan="2"></td>
                  <td>6.5%</td>
                  <td></td>
                  <td colspan="2"></td>
                  <td>9.3%</td>
                  <td></td>
                  <td colspan="2"></td>
                  <td>21.2%</td>
                  <td></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Inverse</strong></td>
                  <td colspan="4">37%</td>
                  <td colspan="2"></td>
                  <td>6.5%</td>
                  <td></td>
                  <td colspan="2"></td>
                  <td>9.3%</td>
                  <td></td>
                  <td colspan="2"></td>
                  <td>21.2%</td>
                  <td></td>
                </tr>
                <tr>
                  <td class="text-start"><strong>Bobot Inverse</strong></td>
                  <td colspan="4">37%</td>
                  <td colspan="2"></td>
                  <td>100%</td>
                  <td>1.919.225	</td>
                  <td colspan="2"></td>
                  <td>41.2%</td>
                  <td>1.745.857</td>
                  <td colspan="2"></td>
                  <td>21.2%</td>
                  <td>996.287</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="mt-5">
            <table class="table table-sm table-bordered align-top text-start" style="width: 70%; font-size:13px;">
              <tr>
                <td rowspan="3" class="p-2 w-60"><strong>Notes</strong><br>Jika besaran penyesuaian lebih besar dibandingkan batas maksimal, maka harus terdapat dasar yang kuat mengapa besaran penyesuaian diberikan</td>
                <td class="p-2 w-15">Intercept</td>
                <td class="p-2 text-end">3.474.943,155</td>
              </tr>
              <tr>
                <td class="p-2 w-15">Slope</td>
                <td class="p-2 text-end">-1.015,356</td>
              </tr>
              <tr>
                <td class="p-2 w-15">R-squared</td>
                <td class="p-2 text-end">0.993</td>
              </tr>
            </table>
          </div>
          <div class="mt-5">
            <table class="table table-bordered table-striped text-start" style="width:45%; font-size:13px;">
              <tr class="table-light fw-bold">
                <td colspan="2">Kisaran Nilai</td>
              </tr>
              <tr>
                <td>Max</td>
                <td class="text-end">4.171.244</td>
              </tr>
              <tr>
                <td>Min</td>
                <td class="text-end">4.169.830</td>
              </tr>
              <tr class="fw-bold">
                <td>Deviasi (max 10%)</td>
                <td class="text-end">0%</td>
              </tr>
            </table>
          </div>
          <div class="mt-5">
            <table class="table table-bordered table-striped text-start fw-bold" style="width:55%; font-size:13px">
              <tr>
                <td>Nilai Pasar per m2</td>
                <td>4.170.589</td>
              </tr>
              <tr>
                <td>Nilai Pasar per m2 (Dibulatkan)</td>
                <td>4.171.000</td>
              </tr>
              <tr>
                <td>Nilai Pasar</td>
                <td>550.517.717</td>
              </tr>
              <tr>
                <td>Dibulatkan</td>
                <td>550.572.000</td>
              </tr>
            </table>
          </div>
        </div>
        {{-- Analisis --}}
        <div class="tab-pane fade" id="analisis">
          <h4>Analisis</h4>
          <table class="table table-sm table-borderless mb-0" style="width: 35%;font-size:13px">
            <tbody>
              <tr>
                <td style="width:68%">Skrap Bangunan :</td>
                <td>
                  <div  class="d-flex align-start">
                    <input type="number" class="form-control form-control-sm" style="width:75%">%
                  </div>
                </td>
              </tr>
              <tr>
                <td style="width:68%">Skrap Sarana Pelengkap :</td>
                <td>
                  <div  class="d-flex align-start">
                    <input type="number" class="form-control form-control-sm" style="width:75%">%
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="mt-4">
            <table class="table table-sm table-borderless mb-0" style="width: 35%;font-size:13px">
              <tbody>
                <tr>
                  <td colspan="2"><strong>Indikasi Likuidasi</strong></td>
                </tr>
                <tr>
                  <td style="width:68%">Tanah :</td>
                  <td>
                    <div  class="d-flex align-start">
                      <input type="number" class="form-control form-control-sm" style="width:75%">%
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="width:68%">Bangunan :</td>
                  <td>
                    <div  class="d-flex align-start">
                      <input type="number" class="form-control form-control-sm" style="width:75%">%
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="width:68%">Sarana Pelengkap :</td>
                  <td>
                    <div  class="d-flex align-start">
                      <input type="number" class="form-control form-control-sm" style="width:75%">%
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="width:68%">Mesin dan Peralatan :</td>
                  <td>
                    <div  class="d-flex align-start">
                      <input type="number" class="form-control form-control-sm" style="width:75%">%
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="mt-4">
            <div class="table-responsive">
              <table class="table table-sm table-bordered table-striped text-center" style="width: 200%;font-size: 12px">
                <thead class="fw-bold" style="background-color: #162447;">
                  <tr style="background-color: #162447;">
                    <td rowspan="2" style="color: white;">No.</td>
                    <td rowspan="2" style="color: white">Deskripsi</td>
                    <td colspan="3" style="color: white">Tahun Bangunan</td>
                    <td colspan="4" style="color: white">Umur</td>
                    <td rowspan="2" style="color: white">SU Eko</td>
                    <td rowspan="2" style="color: white">Qty</td>
                    <td rowspan="2" style="color: white">Satuan</td>
                    <td rowspan="2" style="color: white">RCN<br>Rp/Satuan</td>
                    <td rowspan="2" style="color: white">Indikasi Nilai<br>Rp/Satuan</td>
                    <td colspan="5" style="color: white">Penyusutan</td>
                    <td colspan="2" rowspan="2" style="color: white">Kondisi Fisik</td>
                    <td rowspan="2" style="color: white">RCN Total<br>Rp</td>
                    <td rowspan="2" style="color: white">Nilai Pasar<br>Rp</td>
                    <td rowspan="2" style="color: white">Indikasi Nilai Likuidasi<br>Rp</td>
                  </tr>
                  <tr>
                    <td style="color: white">Aktual</td>
                    <td style="color: white">Indikasi</td>
                    <td style="color: white">Adjust</td>
                    <td style="color: white">Ekonom</td>
                    <td style="color: white">Aktual</td>
                    <td style="color: white">Adjust</td>
                    <td style="color: white">Efektif</td>
                    <td style="color: white">Fisik</td>
                    <td style="color: white">Fungsi</td>
                    <td style="color: white">Ekonom</td>
                    <td style="color: white">Maint</td>
                    <td style="color: white">Total</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold text-end">
                    <td colspan="21">JUMLAH TANAH</td>
                    <td>1.026.780.000</td>
                    <td>1.026.780.000</td>
                    <td>718.746.000</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold text-end">
                    <td colspan="21">JUMLAH BANGUNAN</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold text-end">
                    <td colspan="21">JUMLAH SARANA PELENGKAP LAINNYA</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr class="fw-bold text-end">
                    <td colspan="21">JUMLAH</td>
                    <td>1.026.780.000</td>
                    <td>1.026.780.000</td>
                    <td>718.746.000</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="mt-5">
            <form action="">
              @csrf
              <div class="row g-3">
                <div class="form-group">
                  <label><b>Status Input Data dari Reviewer</b></label><br>
                  <div style="display: flex; gap: 10px;">
                      <div>
                          <input type="radio" id="draft" name="status_data" value="draft" checked>
                          <label for="draft">Draft</label>
                      </div>
                      <div>
                          <input type="radio" id="publish" name="status_data" value="publish">
                          <label for="publish">Publish</label>
                      </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary btn-submit" type="submit">Update Data</button>
            </form>
          </div>
        </div>
        <div class="mt-5">
          <div id="map-tanah" style="height: 500px; width: 100%;"></div>
        </div>
      </div>
    </div>
    <!-- Tabs Navigation -->


  </div>
</div>
<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the map
        var map = L.map('map-tanah').setView([-7.7470, 110.4135], 13); // Adjusted zoom level

        // Mapbox Streets tile layer with access token
        var accessToken = 'pk.eyJ1IjoicmVkb2syNSIsImEiOiJjbG1zdzZ1Y2MwZHA2MmxxYzdvYm12cTlwIn0.2GTgMV076x87YJQJzM34jg';
        L.tileLayer(`https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=${accessToken}`, {
            attribution: '© <a href="https://www.mapbox.com/about/maps/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            tileSize: 512,
            maxZoom: 18,
            zoomOffset: -1
        }).addTo(map);

        // Marker Locations based on the data in the table
        var locations = [
            { lat: -7.7470483875415, lng: 110.41352888460638, label: "LOKASI ASET (Data Pembanding 1)" },
            { lat: -7.7484655830141, lng: 110.41394148223, label: "LOKASI DATA PEMBANDING 2" },
            { lat: -7.7508334334178, lng: 110.41601276057932, label: "LOKASI DATA PEMBANDING 3" }
        ];

        // Add Markers and Popups
        locations.forEach(function(location, index) {
            var markerColor = index === 0 ? 'red' : 'blue'; // First marker in red, others in blue
            var icon = L.divIcon({
                className: 'custom-marker',
                html: `<div style="background-color:${markerColor};width:20px;height:20px;border-radius:50%;border:2px solid white;"></div>`,
                iconSize: [20, 20],
                iconAnchor: [10, 10]
            });

            L.marker([location.lat, location.lng], {icon: icon}).addTo(map)
                .bindPopup(`<div class="custom-label">${location.label}</div>`)
                .openPopup(); // Show labels by default
        });

        // Ensure map resizes correctly
        setTimeout(function() {
            map.invalidateSize();
        }, 400);
    });
</script>

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>

@endsection
