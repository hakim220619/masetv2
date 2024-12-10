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
                                <th>Nomor Induk Pembanding</th>
                                <td>{{ $detail_pembanding_bangunan->nip }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Bangunan</th>
                                <td>{{ $detail_pembanding_bangunan->nib }}</td>
                            </tr>
                            <tr>
                                <th>Nama Tanah dan Bangunan</th>
                                <td>{{ $detail_pembanding_bangunan->nama_tanah_n_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $detail_pembanding_bangunan->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Foto Tampak Depan</th>
                                <td><img src="{{ asset('storage/images/pembanding_bangunan/' . $detail_pembanding_bangunan->foto_tampak_depan) }}"
                                        alt="foto tampak depan" width="200"></td>
                            </tr>
                            <tr>
                                <th>Foto Tampak Sisi Kiri</th>
                                <td><img src="{{ asset('storage/images/pembanding_bangunan/' . $detail_pembanding_bangunan->foto_tampak_sisi_kiri) }}"
                                        alt="foto tampak sisi kiri" width="200"></td>
                            </tr>
                            <tr>
                                <th>Foto Tampak Sisi Kanan</th>
                                <td><img src="{{ asset('storage/images/pembanding_bangunan/' . $detail_pembanding_bangunan->foto_tampak_sisi_kanan) }}"
                                        alt="foto tampak sisi kanan" width="200"></td>
                            </tr>
                            <tr>
                                <th>Foto Lainnya</th>
                                <td><img src="{{ asset('storage/images/pembanding_bangunan/' . $detail_pembanding_bangunan->foto_lainnya) }}"
                                        alt="foto tampak lainnya" width="200"></td>
                            </tr>
                            <tr>
                                <th>Nama Narasumber</th>
                                <td>{{ $detail_pembanding_bangunan->nama_narsum }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $detail_pembanding_bangunan->telepon }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Dokumen Hak Tanah</th>
                                <td>{{ $detail_pembanding_bangunan->jenis_dok_hak_tanah }}</td>
                            </tr>
                            <tr>
                                <th>Peruntukan Kawasan</th>
                                <td>{{ $detail_pembanding_bangunan->perutuntukan_kawasan }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Data</th>
                                <td>{{ $detail_pembanding_bangunan->jenis_data }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Penawaran</th>
                                <td>{{ $detail_pembanding_bangunan->tgl_penawaran }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Data</th>
                                <td>{{ $detail_pembanding_bangunan->sumber_data }}</td>
                            </tr>
                            <tr>
                                <th>Luas Tanah</th>
                                <td>{{ $detail_pembanding_bangunan->luas_tanah }}</td>
                            </tr>
                            <tr>
                                <th>Harga Penawaran</th>
                                <td>{{ $detail_pembanding_bangunan->harga_penawaran }}</td>
                            </tr>
                            <tr>
                                <th>Diskon</th>
                                <td>{{ $detail_pembanding_bangunan->diskon }}</td>
                            </tr>
                            <tr>
                                <th>Harga Sewa per Tahun (Rp/tahun)</th>
                                <td>{{ $detail_pembanding_bangunan->harga_sewa_per_tahun }}</td>
                            </tr>
                            <tr>
                                <th>Penyesuaian Elemen Perbandingan</th>
                                <td>
                                    <ul>
                                        <li>Syarat Pembiayaan Batasan dilakukan pelunasan pembayaran (Kelunakan) :
                                            {{ $detail_pembanding_bangunan->pep_pembiayaan }} </li>
                                        <li>Kondisi Penjualan Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan
                                            Kondisi Pemaksa : {{ $detail_pembanding_bangunan->pep_penjualan }}</li>
                                        <li>Pengeluaran yang dilakukan segera setelah pembelian Biaya yang harus segera
                                            dikeluarkan untuk mengembalikan objek ke fungsi atau peruntukan awal atau
                                            seharusnya : {{ $detail_pembanding_bangunan->pep_pengeluaran }}</li>
                                        <li>Kondisi Pasar Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga
                                            penawaran (Menggunakan Indikator Waktu Penawaran / Transaksi) :
                                            {{ $detail_pembanding_bangunan->pep_pasar }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Row Jalan (m)</th>
                                <td>{{ $detail_pembanding_bangunan->row_jalan }}</td>
                            </tr>
                            <tr>
                                <th>Tipe Jalan</th>
                                <td>{{ $detail_pembanding_bangunan->tipe_jalan }}</td>
                            </tr>
                            <tr>
                                <th>Kapasitas Jalan</th>
                                <td>{{ $detail_pembanding_bangunan->kapasitas_jalan }}</td>
                            </tr>
                            <tr>
                                <th>Penggunaan Lahan Lingkungan Eksisting</th>
                                <td>{{ $detail_pembanding_bangunan->pengguna_lahan_lingkungan_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Letak / Posisi Obyek</th>
                                <td>{{ $detail_pembanding_bangunan->letak_posisi_obyek }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi Aset</th>
                                <td>{{ $detail_pembanding_bangunan->letak_posisi_aset }}</td>
                            </tr>
                            <tr>
                                <th> Bentuk Tanah</th>
                                <td>{{ $detail_pembanding_bangunan->bentuk_tanah }}</td>
                            </tr>
                            <tr>
                                <th>Lebar Muka Tanah (m)</th>
                                <td>{{ $detail_pembanding_bangunan->lebar_muka_tanah }}</td>
                            </tr>
                            <tr>
                                <th>Ketinggian Tanah dari Muka Jalan (m)</th>
                                <td>{{ $detail_pembanding_bangunan->ketinggian_tanah_dr_muka_jln }}</td>
                            </tr>
                            <tr>
                                <th>Topografi / Elevasi</th>
                                <td>{{ $detail_pembanding_bangunan->topografi }}</td>
                            </tr>
                            <!-- Tambahkan informasi lain yang relevan -->
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Informasi Tambahan</h5>
                        <table class="table table-bordered">

                            <tr>
                                <th>Tingkat Hunian (%)</th>
                                <td>{{ $detail_pembanding_bangunan->tingkat_hunian }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi Lingkungan Khusus</th>
                                <td>{{ $detail_pembanding_bangunan->kondisi_lingkungan_khusus }}</td>
                            </tr>
                            <tr>
                                <th>Gambaran Objek terhadap Wilayah dan Lingkungan</th>
                                <td>{{ $detail_pembanding_bangunan->gambaran_objek }}</td>
                            </tr>
                            <tr>
                                <th>Bentuk Bangunan</th>
                                <td>{{ $detail_pembanding_bangunan->bentuk_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Lantai</th>
                                <td>{{ $detail_pembanding_bangunan->jumlah_lantai }}</td>
                            </tr>
                            <tr>
                                <th>Konstruksi Bangunan</th>
                                <td>{{ $detail_pembanding_bangunan->kontruksi_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Konstruksi Lantai</th>
                                <td>{{ $detail_pembanding_bangunan->kontruksi_lantai }}</td>
                            </tr>
                            <tr>
                                <th>Konstruksi Dinding</th>
                                <td>{{ $detail_pembanding_bangunan->kontruksi_dinding }}</td>
                            </tr>
                            <tr>
                                <th>Konstruksi Atap</th>
                                <td>{{ $detail_pembanding_bangunan->kontruksi_atap }}</td>
                            </tr>
                            <tr>
                                <th>Konstruksi Pondasi</th>
                                <td>{{ $detail_pembanding_bangunan->kontruksi_pondasi }}</td>
                            </tr>
                            <tr>
                                <th>Versi BTB</th>
                                <td>{{ $detail_pembanding_bangunan->versi_btb }}</td>
                            </tr>
                            <tr>
                                <th>Tipikal Bangunan Sesuai Spek BTB MAPPI</th>
                                <td>{{ $detail_pembanding_bangunan->tipikal_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Dibangun</th>
                                <td>{{ $detail_pembanding_bangunan->tahun_dibangun }}</td>
                            </tr>
                            <tr>
                                <th>Sumber Informasi Tahun Dibangun</th>
                                <td>{{ $detail_pembanding_bangunan->sumber_info_thn_dibangun }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Renovasi</th>
                                <td>{{ $detail_pembanding_bangunan->tahun_renovasi }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi Bangunan Secara Visual</th>
                                <td>{{ $detail_pembanding_bangunan->kondisi_bangunan_scr_visual }}</td>
                            </tr>
                            <tr>
                                <th>Luas Bangunan Fisik</th>
                                <td>
                                    <ul>
                                        <li>Nomor/Nama Lantai (Area) :
                                            {{ $detail_pembanding_bangunan->lbf_no_or_nama_lantai }} </li>
                                        <li>Faktor Pengali Luas :
                                            {{ $detail_pembanding_bangunan->lbf_faktor_pengali_luas }}</li>
                                        <li>Luas Lantai (m2) : {{ $detail_pembanding_bangunan->lbf_luas_lantai }}</li>
                                    </ul>

                                </td>
                            </tr>
                            <tr>
                                <th>Luas Bangunan Menurut IMB</th>
                                <td>{{ $detail_pembanding_bangunan->luas_bangunan_menurut_imb }}</td>
                            </tr>
                            <tr>
                                <th>Luas Bangunan Menurut IMB</th>
                                <td>{{ $detail_pembanding_bangunan->lpj_nama_area }}</td>
                            </tr>
                            <tr>
                                <th>Luas Pintu dan Jendela</th>
                                <td>
                                    <ul>
                                        <li>Nama Area : {{ $detail_pembanding_bangunan->lpj_nama_area }} </li>
                                        <li>Luas (m2) : {{ $detail_pembanding_bangunan->lpj_luas }}</li>
                                    </ul>

                                </td>
                            </tr>
                            <tr>
                                <th>Luas Dinding</th>
                                <td>
                                    <ul>
                                        <li>Nama Area : {{ $detail_pembanding_bangunan->ld_nama_area }} </li>
                                        <li>Luas (m2) : {{ $detail_pembanding_bangunan->ld_luas }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Luas Rangka Atap Datar</th>
                                <td>
                                    <ul>
                                        <li>Nama Area : {{ $detail_pembanding_bangunan->lrad_nama_area }} </li>
                                        <li>Luas (m2) : {{ $detail_pembanding_bangunan->lrad_luas }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Luas Atap Datar</th>
                                <td>
                                    <ul>
                                        <li>Nama Area : {{ $detail_pembanding_bangunan->lad_nama_area }} </li>
                                        <li>Luas (m2) : {{ $detail_pembanding_bangunan->lad_luas }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Pondasi Eksisting </th>
                                <td>
                                    <ul>
                                        <li>Batu Kali : {{ $detail_pembanding_bangunan->tpe_batu_kali }} </li>
                                        <li>Bobot Pondasi Batu Kali : {{ $detail_pembanding_bangunan->tpe_bobot_pondasi }}
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Pondasi Eksisting </th>
                                <td>
                                    <ul>
                                        <li>Batu Kali : {{ $detail_pembanding_bangunan->ttpe_tipe_material }} </li>
                                        <li>Bobot Pondasi Batu Kali : {{ $detail_pembanding_bangunan->ttpe_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Struktur Eksisting</th>
                                <td>
                                    <ul>
                                        <li>Beton Bertulang : {{ $detail_pembanding_bangunan->tse_beton_bertulang }} </li>
                                        <li>Bobot Struktur Beton Bertulang :
                                            {{ $detail_pembanding_bangunan->tse_bobot_struktur_beton_bertulng }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Struktur Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_pembanding_bangunan->ttse_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_pembanding_bangunan->ttse_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Rangka Atap Eksisting</th>
                                <td>{{ $detail_pembanding_bangunan->tipe_rangka_atap_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Rangka Atap Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_pembanding_bangunan->ttrae_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_pembanding_bangunan->ttrae_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Penutup Atap Eksisting </th>
                                <td>{{ $detail_pembanding_bangunan->tipe_penutup_atap_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Bobot Penutup Atap </th>
                                <td>{{ $detail_pembanding_bangunan->bobot_penutup_atap }}</td>
                            </tr>
                            <tr>
                                <th>Tipe Plafon Eksisting</th>
                                <td>{{ $detail_pembanding_bangunan->tipe_plafon_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Tambah Plafon Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_pembanding_bangunan->tampe_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_pembanding_bangunan->tampe_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Dinding Eksisting</th>
                                <td>
                                    <ul>
                                        <li>Tipe Dinding Eksisting :
                                            {{ $detail_pembanding_bangunan->tipe_dinding_eksisting }} </li>
                                        <li>Bobot Dinding : {{ $detail_pembanding_bangunan->tde_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Dinding Eksisting</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_pembanding_bangunan->ttde_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_pembanding_bangunan->ttde_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Pelapis Dinding Eksisting</th>
                                <td>{{ $detail_pembanding_bangunan->tipe_pelapis_dinding_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Bobot Pelapis Dinding Cat (Diplester dan Diaci)</th>
                                <td>{{ $detail_pembanding_bangunan->ttde_bobot_pdc }}</td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Pelapis Dinding Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_pembanding_bangunan->ttpde_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_pembanding_bangunan->ttpde_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Pintu & Jendela Eksisting</th>
                                <td>{{ $detail_pembanding_bangunan->tipe_pintu_n_jendela_eksisting }}</td>
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
                                        <li>Tipe Material : {{ $detail_pembanding_bangunan->ttpdje_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_pembanding_bangunan->ttpdje_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Lantai Eksisting</th>
                                <td>{{ $detail_pembanding_bangunan->tipe_lantai_eksisting }}</td>
                            </tr>
                            <tr>
                                <th>Bobot Lantai</th>
                                <td>{{ $detail_pembanding_bangunan->tle_bobot_lantai }}</td>
                            </tr>
                            <tr>
                                <th>Tambah Tipe Lantai Existing</th>
                                <td>
                                    <ul>
                                        <li>Tipe Material : {{ $detail_pembanding_bangunan->ttle_tipe_material }} </li>
                                        <li>Bobot (%) : {{ $detail_pembanding_bangunan->ttle_bobot }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Penggunaan Bangunan Saat Ini</th>
                                <td>{{ $detail_pembanding_bangunan->penggunaan_bangunan_saat_ini }}</td>
                            </tr>
                            <tr>
                                <th>Perlengkapan Bangunan</th>
                                <td>{{ $detail_pembanding_bangunan->perlengkapan_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Penggunaan Bangunan</th>
                                <td>{{ $detail_pembanding_bangunan->penggunaan_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi Bangunan</th>
                                <td>{{ $detail_pembanding_bangunan->kondisi_bangunan }}</td>
                            </tr>
                            <tr>
                                <th>Status Data Pembanding</th>
                                <td>{{ $detail_pembanding_bangunan->status_data_pembanding }}</td>
                            </tr>
                            <!-- Tambahkan informasi lain yang relevan -->
                        </table>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <a href="/pembanding/lihat_pembanding" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

    @endsection
