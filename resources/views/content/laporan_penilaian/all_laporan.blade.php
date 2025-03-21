@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Semua Laporan Penilaian')

@section('content')
    <div class="container">
        <h1 class="entry-title mb-4">Semua Laporan Penilaian</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($reports as $report)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0">{{ $report->judul_laporan }}</h5>
                            <div class="btn-group mt-2">
                                <button class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <a href="" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="" class="btn btn-info btn-sm" title="Analisa">
                                    <i class="bi bi-table"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $report->foto_utama) }}" class="card-img-top mb-3"
                                alt="Foto Obyek">
                            <dl class="row">
                                <dt class="col-sm-5">Nomor ID</dt>
                                <dd class="col-sm-7">{{ $report->id }}</dd>

                                <dt class="col-sm-5">Jenis Properti</dt>
                                <dd class="col-sm-7">{{ $report->jenis_properti }}</dd>

                                <dt class="col-sm-5">No. Kontrak</dt>
                                <dd class="col-sm-7">{{ $report->no_kontrak }}</dd>

                                <dt class="col-sm-5">Pemberi Tugas</dt>
                                <dd class="col-sm-7">{{ $report->pemberi_tugas }}</dd>

                                <dt class="col-sm-5">Contact Person</dt>
                                <dd class="col-sm-7">{{ $report->contact_person }}</dd>

                                <dt class="col-sm-5">Telepon</dt>
                                <dd class="col-sm-7">
                                    @if ($report->telepon)
                                        <a href="tel:{{ $report->telepon }}">{{ $report->telepon }}</a>
                                    @else
                                        -
                                    @endif
                                </dd>

                                <dt class="col-sm-5">Lokasi Obyek</dt>
                                <dd class="col-sm-7">{{ $report->lokasi }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
@endsection

@section('page-script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        dt {
            font-weight: 500;
            color: #6c757d;
        }

        dd {
            color: #343a40;
        }
    </style>
@endsection
