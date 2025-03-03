@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Laporan Pembanding')

@section('content')
    <div class="container-fluid">
        @if ($sumber == 'Tanah Kosong')
            <!-- Tanah Kosong Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Pembanding: {{ $nama_pembanding }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr class="bg-dark text-white">
                                    <th colspan="2">DESKRIPSI</th>
                                    <th colspan="2">ANALISA TANAH</th>
                                </tr>
                                <tr>
                                    <td>Alamat Properti</td>
                                    <td>{{ $alamat }}</td>
                                    <td>Koordinat Latitude</td>
                                    <td>{{ $lat }}</td>
                                </tr>
                                <tr>
                                    <td>Koordinat Longitude</td>
                                    <td>{{ $long }}</td>
                                    <td>Nama</td>
                                    <td>{{ $nama_narsum }}</td>
                                </tr>
                                <tr>
                                    <td>Indikasi Harga Penawaran</td>
                                    <td>Rp {{ number_format($harga_penawaran, 0, ',', '.') }}</td>
                                    <td>Diskon</td>
                                    <td>{{ $diskon }}%</td>
                                </tr>
                                <tr>
                                    <td>Kemungkinan Transaksi</td>
                                    <td>Rp {{ number_format($estimasi_transaksi, 0, ',', '.') }}</td>
                                    <td>Indikasi Nilai Pasar Tanah/m2</td>
                                    <td>Rp {{ number_format($indikasi_nilai_tanah, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Pembanding Bangunan Section -->
            <div class="card">
                <div class="card-header">
                    <h4>Data Pembanding: {{ $nama_pembanding }}</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $foto_tampak_depan) }}" class="img-fluid rounded"
                                alt="Foto Bangunan">
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="4" class="bg-dark text-white">INFORMASI PROPERTI</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jenis Properti</td>
                                        <td width="30%">{{ $jenis_aset }}</td>
                                        <td width="20%">Luas Tanah</td>
                                        <td width="30%">{{ number_format($luas_tanah, 0, ',', '.') }} m2</td>
                                    </tr>
                                    <tr>
                                        <td>Luas Bangunan</td>
                                        <td>{{ number_format($luas_bangunan_total, 0, ',', '.') }} m2</td>
                                        <td>Peruntukan</td>
                                        <td>{{ $peruntukan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Row Jalan</td>
                                        <td>{{ $row_jalan }}</td>
                                        <td>Bentuk Tanah</td>
                                        <td>{{ $bentuk_tanah }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="4" class="bg-dark text-white">ANALISA NILAI</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">Harga Penawaran</td>
                                        <td width="30%">Rp {{ number_format($harga_penawaran, 0, ',', '.') }}</td>
                                        <td width="20%">Diskon</td>
                                        <td width="30%">{{ $diskon }}%</td>
                                    </tr>
                                    <tr>
                                        <td>Indikasi Nilai Pasar</td>
                                        <td>Rp {{ number_format($estimasi_transaksi, 0, ',', '.') }}</td>
                                        <td>Nilai per m2</td>
                                        <td>Rp {{ number_format($indikasi_nilai_tanah, 0, ',', '.') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .table td,
        .table th {
            padding: 0.5rem;
        }
    </style>
@endpush
