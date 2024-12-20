@extends('layouts/layoutMaster')

@section('title', 'Semua Obyek Penilaian')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-10 col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">Semua Obyek Penilaian</h4>
                    <div class="mb-3">
                        <label for="searchInput" class="form-label">Cari Obyek Penilaian:</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Masukkan kata kunci">
                    </div>
                    <div class="mb-3">
                        <label for="objectType" class="form-label">Jenis Obyek:</label>
                        <select class="form-select" id="objectType">
                            <option selected>Semua Jenis Obyek</option>
                            <!-- Tambahkan opsi lain di sini -->
                        </select>
                    </div>
                    <div class="text-center mb-4">
                        <button type="button" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menambahkan margin antara dua div -->
    <div class="my-5"></div> <!-- Margin vertikal -->
    <div class="container">
        <div class="row">
            @foreach($objects as $object)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header d-flex justify-content-between" style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                        <strong>{{ $object->name }}</strong>
                        <span>
                            <!-- Ikon Edit dan Hapus -->
                            <i class="fa fa-edit"></i> <!-- Edit -->
                            <i class="fa fa-times"></i> <!-- Close -->
                        </span>
                    </div>
                    <br>
                    <div class="card-body d-flex align-items-start">
                        <!-- Gambar di sebelah kiri -->
                        <div class="me-3">
                            <img src="{{ $object->image }}" class="img-thumbnail" alt="{{ $object->name }}" style="width: 150px; height: auto;">
                        </div>
                        <!-- Data di sebelah kanan -->
                        <div>
                            <p class="mb-3"><strong>Jenis obyek:</strong> <span class="fw-bold">{{ $object->type }}</span></p>
                            <p class="mb-3"><strong>Tipe bangunan:</strong> {{ $object->building_type }}</p>
                            <p class="mb-3"><strong>Tanggal:</strong> {{ $object->date }}</p>
                            <p class="mb-3"><strong>Status data:</strong> {{ $object->status }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection