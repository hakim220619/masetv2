@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Bangunan')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.scss',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
  'resources/assets/vendor/libs/select2/select2.scss'
])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/bs-stepper/bs-stepper.js',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
  'resources/assets/vendor/libs/select2/select2.js'
])
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
                            <td>{{ $detail_pembanding_retail->nip }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Induk Bangunan</th>
                            <td>{{ $detail_pembanding_retail->nib }}</td>
                        </tr>
                        <tr>
                            <th>Nama Tanah dan Bangunan</th>
                            <td>{{ $detail_pembanding_retail->nama_retail }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $detail_pembanding_retail->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Foto Tampak Depan</th>
                            <td><img src="{{ asset('storage/images/pembanding_bangunan/'.$detail_pembanding_retail->foto_tampak_depan)  }}" alt="foto tampak depan" width="200"></td>
                        </tr>
                        <tr>
                            <th>Foto Tampak Sisi Kiri</th>
                            <td><img src="{{ asset('storage/images/pembanding_bangunan/'.$detail_pembanding_retail->foto_tampak_sisi_kiri)  }}" alt="foto tampak sisi kiri" width="200"></td>
                        </tr>
                        <tr>
                            <th>Foto Tampak Sisi Kanan</th>
                            <td><img src="{{ asset('storage/images/pembanding_bangunan/'.$detail_pembanding_retail->foto_tampak_sisi_kanan)  }}" alt="foto tampak sisi kanan" width="200"></td>
                        </tr>
                        <tr>
                            <th>Foto Lainnya</th>
                            <td><img src="{{ asset('storage/images/pembanding_bangunan/'.$detail_pembanding_retail->foto_lainnya)  }}" alt="foto tampak lainnya" width="200"></td>
                        </tr>
                        <tr>
                            <th>Nama Narasumber</th>
                            <td>{{ $detail_pembanding_retail->nama_narsum }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $detail_pembanding_retail->telepon }}</td>
                        </tr>
                        
                        <!-- Tambahkan informasi lain yang relevan -->
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Informasi Tambahan</h5>
                    <table class="table table-bordered">
                        
                        <tr>
                            <th>Jenis Properti *</th>
                            <td>{{ $detail_pembanding_retail->jenis_properti }}</td>
                        </tr>
                        <tr>
                            <th>Kondisi Properti</th>
                            <td>{{ $detail_pembanding_retail->kondisi_properti }}</td>
                        </tr>
                        <tr>
                            <th>Spesifikasi Properti</th>
                            <td>{{ $detail_pembanding_retail->spesifikasi_properti }}</td>
                        </tr>
                        <tr>
                            <th>Tipe Apartemen (jika bangunan apartemen)</th>
                            <td>{{ $detail_pembanding_retail->tipe_apartemen }}</td>
                        </tr>
                        <tr>
                            <th>Posisi Lantai</th>
                            <td>{{ $detail_pembanding_retail->posisi_lantai }}</td>
                        </tr>

                        <tr>
                            <th>Biaya Properti</th>
                            <td>
                                <ul>
                                    <li>Service Charge (Rp) : {{ $detail_pembanding_retail->service_charge }}</li>
                                    <li>Parkir (Rp) : {{ $detail_pembanding_retail->parkir }}</li>
                                    <li>Utilitas (Rp) : {{ $detail_pembanding_retail->utilitas }}</li>
                                    <li>Overtime (Rp){{ $detail_pembanding_retail->overtime }}</li>
                                </ul>
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Grade Bangunan</th>
                            <td>{{ $detail_pembanding_retail->grade_bangunan }}</td>
                        </tr>
                        <tr>
                            <th>Fasilitas Bangunan</th>
                            <td>{{ $detail_pembanding_retail->fasilitas_bangunan }}</td>
                        </tr>
                        <tr>
                            <th>Row Koridor (meter)</th>
                            <td>{{ $detail_pembanding_retail->row_koridor }}</td>
                        </tr>
                        <tr>
                            <th>Tipe Akses Koridor</th>
                            <td>{{ $detail_pembanding_retail->tipe_akses_koridor }}</td>
                        </tr>
                        <tr>
                            <th>Luas Gross Bangunan Total (m2)</th>
                            <td>{{ $detail_pembanding_retail->luas_bangunan_total }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Lantai</th>
                            <td>{{ $detail_pembanding_retail->jumlah_lantai }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Dokumen Hak Tanah</th>
                            <td>{{ $detail_pembanding_retail->jenis_dok_hak_tanah }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Berakhir Dokumen </th>
                            <td>{{ $detail_pembanding_retail->tgl_berakhir_dokumen }}</td>
                        </tr>
                        <tr>
                            <th>Peruntukan Bangunan</th>
                            <td>{{ $detail_pembanding_retail->peruntukan_bangunan }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Data</th>
                            <td>{{ $detail_pembanding_retail->jenis_data }}</td>
                        </tr>                    
                        <tr>
                            <th>Tanggal Penawaran / Waktu Transaksi</th>
                            <td>{{ $detail_pembanding_retail->tgl_penawaran }}</td>
                        </tr>                    
                        <tr>
                            <th>Sumber Data</th>
                            <td>{{ $detail_pembanding_retail->sumber_data }}</td>
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
                            <th>Luas Semigross (m2)</th>
                            <td>{{ $detail_pembanding_retail->luas_semigross}}</td>
                        </tr>
                        <tr>
                            <th>Luas Nett (m2)</th>
                            <td>{{ $detail_pembanding_retail->luas_net}}</td>
                        </tr>
                        <tr>
                            <th>Harga Penawaran/Transaksi (Rp)</th>
                            <td>{{ $detail_pembanding_retail->harga_penawaran}}</td>
                        </tr>
                        <tr>
                            <th>Diskon (%)</th>
                            <td>{{ $detail_pembanding_retail->diskon}}</td>
                        </tr>
                        <tr>
                            <th>Harga Sewa per Tahun (Rp/tahun)</th>
                            <td>{{ $detail_pembanding_retail->harga_sewa_pertahun}}</td>
                        </tr>
                        <tr>
                            <th>Penyesuaian Elemen Perbandingan</th>
                            <td>
                                <ul>
                                    <li>Syarat Pembiayaan Batasan dilakukan pelunasan pembayaran (Kelunakan) : {{ $detail_pembanding_retail->pep_pembiayaan }} </li>
                                    <li>Kondisi Penjualan Bebas Ikatan, Waktu Pemasaran yang Wajar atau Ketiadaan Kondisi Pemaksa : {{ $detail_pembanding_retail->pep_penjualan }}</li>
                                    <li>Pengeluaran yang dilakukan segera setelah pembelian Biaya yang harus segera dikeluarkan untuk mengembalikan objek ke fungsi atau peruntukan awal atau seharusnya : {{ $detail_pembanding_retail->pep_pengeluaran }}</li>
                                    <li>Kondisi Pasar Kondisi Ekonomi Saat Terjadi Transaksi atau terbentuknya harga penawaran (Menggunakan Indikator Waktu Penawaran / Transaksi) : {{ $detail_pembanding_retail->pep_pasar }}</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Row Jalan (m)</th>
                            <td>{{ $detail_pembanding_retail->row_jalan}}</td>
                        </tr>
                        <tr>
                            <th>Tipe Jalan</th>
                            <td>{{ $detail_pembanding_retail->tipe_jalan}}</td>
                        </tr>
                        <tr>
                            <th>Kapasitas Jalan</th>
                            <td>{{ $detail_pembanding_retail->kapasitas_jalan}}</td>
                        </tr>
                        <tr>
                            <th>Penggunaan Lahan Lingkungan Eksisting</th>
                            <td>{{ $detail_pembanding_retail->pengguna_lahan_lingkungan_eksisting}}</td>
                        </tr>
                        <tr>
                            <th>Letak / Posisi Obyek</th>
                            <td>{{ $detail_pembanding_retail->letak_posisi_obyek }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi Aset</th>
                            <td>{{ $detail_pembanding_retail->letak_posisi_aset }}</td>
                        </tr>
                        <tr>
                            <th> Bentuk Tanah</th>
                            <td>{{ $detail_pembanding_retail->bentuk_tanah }}</td>
                        </tr> 
                        <tr>
                            <th>Lebar Muka Tanah (m)</th>
                            <td>{{ $detail_pembanding_retail->lebar_muka_tanah}}</td>
                        </tr> 
                        <tr>
                            <th>Ketinggian Tanah dari Muka Jalan (m)</th>
                            <td>{{ $detail_pembanding_retail->ketinggian_tanah_dr_muka_jln}}</td>
                        </tr>
                        <tr>
                            <th>Topografi / Elevasi</th>
                            <td>{{ $detail_pembanding_retail->topografi}}</td>
                        </tr>
                        <tr>
                            <th>Tingkat Hunian (%)</th>
                            <td>{{ $detail_pembanding_retail->tingkat_hunian}}</td>
                        </tr>
                        <tr>
                            <th>Kondisi Lingkungan Khusus</th>
                            <td>{{ $detail_pembanding_retail->kondisi_lingkungan_khusus}}</td>
                        </tr>
                        <tr>
                            <th>Gambaran Objek terhadap Wilayah dan Lingkungan</th>
                            <td>{{ $detail_pembanding_retail->gambaran_objek}}</td>
                        </tr>   
                        <tr>
                            <th>Status Data Pembanding</th>
                            <td>{{ $detail_pembanding_retail->status_data_pembanding }}</td>
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
