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
                            <small class="text-muted">{{ $report->lokasi_cabang_bank }}</small>
                        </div>
                        <img src="{{ asset('storage/' . $report->foto_utama) }}" class="card-img-top" alt="Foto Utama"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-5">ID Laporan</dt>
                                <dd class="col-sm-7">#{{ $report->id }}</dd>

                                <dt class="col-sm-5">Tanggal Laporan</dt>
                                <dd class="col-sm-7">{{ $report->tgl_laporan_penilaian->format('d M Y') }}</dd>

                                <dt class="col-sm-5">Lokasi Obyek</dt>
                                <dd class="col-sm-7">{{ $report->alamat_lokasi_obyek }}</dd>

                                <dt class="col-sm-5">Status</dt>
                                <dd class="col-sm-7">
                                    <span class="badge bg-{{ $report->status_data == 'publish' ? 'success' : 'warning' }}">
                                        {{ strtoupper($report->status_data) }}
                                    </span>
                                </dd>
                            </dl>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="btn-group w-100">
                                <a href="{{ route('laporan.edit', $report->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger hapus-btn" data-id="{{ $report->id }}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                                <a href="{{ route('laporan.analisa', $report->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-table"></i> Analisa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $reports->links() }}
        </div>
    </div>
@endsection

@section('page-script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .badge {
            font-size: 0.9em;
        }

        dt {
            font-weight: 500;
            color: #6c757d;
        }

        dd {
            color: #343a40;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle delete button
            document.querySelectorAll('.hapus-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const reportId = this.dataset.id;

                    if (confirm('Apakah Anda yakin ingin menghapus laporan ini?')) {
                        fetch(`/laporan-penilaian/${reportId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json',
                                    'Content-Type': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Remove card element
                                    this.closest('.col').remove();
                                    // Show success message
                                    alert('Laporan berhasil dihapus');
                                } else {
                                    alert('Gagal menghapus: ' + data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan saat menghapus');
                            });
                    }
                });
            });
        });
    </script>
@endsection
