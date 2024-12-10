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
    <h4>Detail Retail</h4>
    <!-- Default -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Informasi Umum</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID Asset</th>
                                <td>{{ $detail_tanah_kosong->id_asset }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Bangunan</th>
                                <td>{{ $detail_tanah_kosong->nib }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Asset</th>
                                <td>{{ $detail_tanah_kosong->nia }}</td>
                            </tr>
                            <tr>
                                <th>Nama Bangunan</th>
                                <td>{{ $detail_tanah_kosong->nama_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $detail_tanah_kosong->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Foto Tampak Depan</th>
                                <td><img src="{{ asset('storage/images/bangunan/' . $detail_tanah_kosong->foto_tampak_depan) }}"
                                        alt="foto tampak depan" width="200"></td>
                            </tr>
                            <tr>
                                <th>Foto Tampak Sisi Kiri</th>
                                <td><img src="{{ asset('storage/images/bangunan/' . $detail_tanah_kosong->foto_tampak_sisi_kiri) }}"
                                        alt="foto tampak sisi kiri" width="200"></td>
                            </tr>
                            <tr>
                                <th>Foto Tampak Sisi Kanan</th>
                                <td><img src="{{ asset('storage/images/bangunan/' . $detail_tanah_kosong->foto_tampak_sisi_kanan) }}"
                                        alt="foto tampak sisi kanan" width="200"></td>
                            </tr>
                            <tr>
                                <th>Foto Lainnya</th>
                                <td><img src="{{ asset('storage/images/bangunan/' . $detail_tanah_kosong->foto_lainnya) }}"
                                        alt="foto tampak lainnya" width="200"></td>
                            </tr>
                            <tr>
                                <th>Jumlah Lantai</th>
                                <td>{{ $detail_tanah_kosong->jumlah_lantai }}</td>
                            </tr>
                            <tr>
                                <th>Kontruksi Bangunan</th>
                                <td>{{ $detail_tanah_kosong->kontruksi_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Kontruksi Lantai</th>
                                <td>{{ $detail_tanah_kosong->kontruksi_lantai }}</td>
                            </tr>
                            <tr>
                                <th>Kontruksi Dinding</th>
                                <td>{{ $detail_tanah_kosong->kontruksi_dinding }}</td>
                            </tr>
                            <tr>
                                <th>Kontruksi Atap</th>
                                <td>{{ $detail_tanah_kosong->kontruksi_atap }}</td>
                            </tr>
                            <tr>
                                <th>Kontruksi Pondasi</th>
                                <td>{{ $detail_tanah_kosong->kontruksi_pondasi }}</td>
                            </tr>
                            <tr>
                                <th>Versi BTB</th>
                                <td>{{ $detail_tanah_kosong->versi_btb }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Bangunan (Umur Ekonomis)</th>
                                <td>{{ $detail_tanah_kosong->jenis_bangunan_uk }}</td>
                            </tr>
                            <tr>
                                <th>Tipe Rumah Tinggal (Umur Ekonomis)</th>
                                <td>{{ $detail_tanah_kosong->tipe_rumah_tinggal }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Bangunan (Indeks lantai)</th>
                                <td>{{ $detail_tanah_kosong->jenis_bangunan_il }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Dibangun</th>
                                <td>{{ $detail_tanah_kosong->tahun_dibangun }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Renovasi</th>
                                <td>{{ $detail_tanah_kosong->tahun_renovasi }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Informasi Tahun Dibangun</th>
                                <td>{{ $detail_tanah_kosong->sumber_info_thn_dibangun }}</td>
                            </tr>
                            <!-- Tambahkan informasi lain yang relevan -->
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Informasi Tambahan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Kondisi Bangunan Secara Visual</th>
                                <td>{{ $detail_tanah_kosong->kondisi_bangunan_scr_visual }}</td>
                            </tr>
                            <tr>
                                <th>Catatan Khusus Bangunan</th>
                                <td>{{ $detail_tanah_kosong->catatan_khusus_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Luas Bangunan Fisik</th>
                                <td>
                                    <ul>
                                        <li>Nomor/Nama Lantai (Area) : {{ $detail_tanah_kosong->lbf_no_or_nama_lantai }}
                                        </li>
                                        <li>Faktor Pengali Luas : {{ $detail_tanah_kosong->lbf_faktor_pengali_luas }}</li>
                                        <li>Luas Lantai (m2) : {{ $detail_tanah_kosong->lbf_luas_lantai }}</li>
                                    </ul>

                                </td>
                            </tr>
                            <tr>
                                <th>Luas Bangunan Menurut IMB</th>
                                <td>{{ $detail_tanah_kosong->luas_bangunan_menurut_imb }}</td>
                            </tr>
                            <tr>
                                <th>Luas Pintu dan Jendela</th>
                                <td>
                                    <ul>
                                        <li>Nama Area : {{ $detail_tanah_kosong->lpj_nama_area }} </li>
                                        <li>Luas (m2) : {{ $detail_tanah_kosong->lpj_luas }}</li>
                                    </ul>

                                </td>
                            </tr>
                            <tr>
                                <th>Luas Dinding</th>
                                <td>
                                    <ul>
                                        <li>Nama Area : {{ $detail_tanah_kosong->ld_nama_area }} </li>
                                        <li>Luas (m2) : {{ $detail_tanah_kosong->ld_luas }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Luas Rangka Atap Datar</th>
                                <td>
                                    <ul>
                                        <li>Nama Area : {{ $detail_tanah_kosong->lrad_nama_area }} </li>
                                        <li>Luas (m2) : {{ $detail_tanah_kosong->lrad_luas }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Luas Atap Datar</th>
                                <td>
                                    <ul>
                                        <li>Nama Area : {{ $detail_tanah_kosong->lad_nama_area }} </li>
                                        <li>Luas (m2) : {{ $detail_tanah_kosong->lad_luas }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Pondasi Eksisting </th>
                                <td>
                                    <ul>
                                        <li>Batu Kali : {{ $detail_tanah_kosong->tpe_batu_kali }} </li>
                                        <li>Bobot Pondasi Batu Kali : {{ $detail_tanah_kosong->tpe_bobot_pondasi }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Pondasi Eksisting </th>
                                <td>
                                    <ul>
                                        <li>Batu Kali : {{ $detail_tanah_kosong->tpe_batu_kali }} </li>
                                        <li>Bobot Pondasi Batu Kali : {{ $detail_tanah_kosong->tpe_bobot_pondasi }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Pondasi Existing </th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_tanah_kosong->ttpe_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_tanah_kosong->ttpe_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Struktur Eksisting</th>
                                <td>
                                    <ul>
                                        <li>Beton Bertulang : {{ $detail_tanah_kosong->tse_beton_bertulang }} </li>
                                        <li>Bobot Struktur Beton Bertulang :
                                            {{ $detail_tanah_kosong->tse_bobot_struktur_beton_bertulng }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Struktur Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_tanah_kosong->ttse_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_tanah_kosong->ttse_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Rangka Atap Eksisting</th>
                                <td>{{ $detail_tanah_kosong->tipe_rangka_atap_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Rangka Atap Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_tanah_kosong->ttrae_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_tanah_kosong->ttrae_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Penutup Atap Eksisting </th>
                                <td>{{ $detail_tanah_kosong->tipe_penutup_atap_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Bobot Penutup Atap </th>
                                <td>{{ $detail_tanah_kosong->bobot_penutup_atap }}</td>
                            </tr>
                            <tr>
                                <th>Tipe Plafon Eksisting</th>
                                <td>{{ $detail_tanah_kosong->tipe_plafon_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Tambah Plafon Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_tanah_kosong->tampe_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_tanah_kosong->tampe_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Dinding Eksisting</th>
                                <td>
                                    <ul>
                                        <li>Tipe Dinding Eksisting : {{ $detail_tanah_kosong->tipe_dinding_eksisting }}
                                        </li>
                                        <li>Bobot Dinding : {{ $detail_tanah_kosong->tde_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Dinding Eksisting</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_tanah_kosong->ttde_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_tanah_kosong->ttde_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Pelapis Dinding Eksisting</th>
                                <td>{{ $detail_tanah_kosong->tipe_pelapis_dinding_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Bobot Pelapis Dinding Cat (Diplester dan Diaci)</th>
                                <td>{{ $detail_tanah_kosong->ttde_bobot_pdc }}</td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Pelapis Dinding Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_tanah_kosong->ttpde_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_tanah_kosong->ttpde_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Pintu & Jendela Eksisting</th>
                                <td>{{ $detail_tanah_kosong->tipe_pintu_n_jendela_eksisting }}</td>
                            </tr>

                            <!-- Tambahkan informasi lain yang relevan -->
                        </table>
                    </div>
                </div>

                <!-- Section lain untuk informasi lebih lanjut -->
                <div class="row">
                    <div class="col-md-12">
                        <h5>Detail Tambahan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tambah Tipe Pintu & Jendela Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_tanah_kosong->ttpdje_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_tanah_kosong->ttpdje_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Lantai Eksisting</th>
                                <td>{{ $detail_tanah_kosong->tipe_lantai_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Bobot Lantai</th>
                                <td>{{ $detail_tanah_kosong->tle_bobot_lantai }}</td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Lantai Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_tanah_kosong->ttle_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_tanah_kosong->ttle_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Penggunaan Bangunan Saat Ini</th>
                                <td>{{ $detail_tanah_kosong->penggunaan_bangunan_saat_ini }}</td>
                            </tr>
                            <tr>
                                <th>Perlengkapan Bangunan</th>
                                <td>{{ $detail_tanah_kosong->perlengkapan_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Penggunaan Bangunan</th>
                                <td>{{ $detail_tanah_kosong->penggunaan_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Progres Pembangunan jika aset dalam proses (dalam persen)</th>
                                <td>{{ $detail_tanah_kosong->progress_pembangunan }}</td>
                            </tr>
                            <tr>
                                <th>Status Data Obyek</th>
                                <td>{{ $detail_tanah_kosong->status_data_obyek }}</td>
                            </tr>
                            <!-- Tambahkan informasi lain yang relevan -->
                        </table>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <a href="/object/lihat_object" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

    @endsection
