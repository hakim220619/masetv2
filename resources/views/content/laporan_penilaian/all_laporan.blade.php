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
                            <h5 class="mb-0">{{ $report->judul_laporan .'-'. $report->nama_entitas .'-'. $report->alamat }}</h5>
                            <div class="btn-group mt-2 d-flex justify-content-center">
                                <form action="{{ route('laporan-penilaian.destroy', $report->id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>

                                  <a href="{{ route('laporan-penilaian.edit', $report->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                  </a>
                                  <a href="{{ route('laporan-penilaian.show', $report->id) }}" class="btn btn-info btn-sm" title="Analisa">
                                    <i class="bi bi-table"></i>
                                  </a>
                                </form>
                            </div>
                        </div>
                        <img src="{{ asset('storage/' . $report->foto_utama) }}" class="card-img-top" alt="Foto Utama"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                          <img src="{{ isset($report->foto_utama) ? asset('storage/' . $report->foto_utama) : asset('assets/img/default.png') }}"
                          class="card-img-top mb-3" alt="Foto Obyek">
                            <dl class="row">
                                <dt class="col-sm-5">ID Laporan</dt>
                                <dd class="col-sm-7">#{{ $report->id }}</dd>

                                <dt class="col-sm-5">Jenis Properti</dt>
                                <dd class="col-sm-7">{{ $report->kategori_laporan_penilaian ?? '-' }}</dd>

                                <dt class="col-sm-5">No. Kontrak</dt>
                                <dd class="col-sm-7">{{ $report->no_dokumen_kontrak ?? '-'  }}</dd>

                                <dt class="col-sm-5">Pemberi Tugas</dt>
                                <dd class="col-sm-7">{{ $report->nama_instansi_pemberi_tugas ?? '-' }}</dd>

                                <dt class="col-sm-5">Contact Person</dt>
                                <dd class="col-sm-7">{{ $report->cp_penugasan_pemberi_tugas ?? '-' }}</dd>

                                <dt class="col-sm-5">Status</dt>
                                <dd class="col-sm-7">
                                    @if ($report->telepon_pemberi_tugas)
                                        <a href="tel:{{ $report->telepon_pemberi_tugas }}">{{ $report->telepon_pemberi_tugas }}</a>
                                    @else
                                        -
                                    @endif
                                </dd>

                                <dt class="col-sm-5">Lokasi Obyek</dt>
                                <dd class="col-sm-7">{{ $report->alamat ?? '-' }}</dd>
                            </dl>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="btn-group w-100">
                                <a href="{{ route('laporan-penilaian.edit', $report->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger hapus-btn" data-id="{{ $report->id }}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                                <a href="{{ route('laporan-penilaian.show', $report->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-table"></i> Analisa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $reports->links('pagination::bootstrap-5') }}

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
                        fetch(`/laporan_penilaian/${reportId}`, {
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
