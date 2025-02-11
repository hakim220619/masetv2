@extends('layouts/layoutMaster')

@section('title', 'Semua Obyek Penilaian')
<!-- Add this in your layout file (e.g., layoutMaster.blade.php) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-10 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-4">Semua Obyek Penilaian</h4>

                        <!-- Search Input -->
                        <div class="mb-3">
                            <label for="searchInput" class="form-label">Cari Obyek Penilaian:</label>
                            <input type="text" class="form-control" id="searchInput" placeholder="Masukkan kata kunci">
                        </div>

                        <!-- Search Button -->
                        <div class="text-center mb-4">
                            <button type="button" class="btn btn-primary" id="searchButton">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Margin Between Sections -->
        <div class="my-5"></div>

        <!-- Object List Container -->
        <div class="container">
            <div class="row" id="objectList">
                <!-- Dynamically populated content will appear here -->
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Function to load objects using Ajax
            function loadObjects() {
                var searchKeyword = $('#searchInput').val();
                var objectType = $('#objectType').val();
                console.log('asd');

                $.ajax({
                    url: '/object/list-objects',
                    method: 'GET',
                    data: {
                        search: searchKeyword,
                        type: objectType
                    },
                    success: function(response) {
                        var html = '';
                        if (response.data.length > 0) {
                            response.data.forEach(function(object) {
                                html += `
                                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-header d-flex justify-content-between" style="border-bottom: 1px solid #ccc; padding-bottom: 10px; font-size: 13px; font-weight: bold;">
                                                ${object.nama_bangunan}
                                                <span>
                                                    <i class="fa fa-edit" title="Edit" style="font-size: 13px;"></i>
                                                    <i class="fa fa-times" title="Delete" style="font-size: 13px;" data-object-id="${object.id}"></i>
                                                </span>
                                            </div>
                                            <br>
                                            <div class="card-body d-flex align-items-start" style="font-size: 12px;">
                                                <div class="me-3">
                                                    <img src="{{ asset('storage/uploads/bangunan/') }}/${object.foto_depan}" class="img-thumbnail" alt="${object.nama_bangunan}" style="width: 100px; height: 100px;">
                                                </div>
                                                <div>
                                                    <p class="mb-3"><strong>Jenis Obyek:</strong> <span class="fw-bold">${object.jenis_bangunan}</span></p>
                                                    <p class="mb-3"><strong>Tipe Bangunan:</strong> ${object.jenis_bangunan}</p>
                                                    <p class="mb-3"><strong>Tanggal:</strong> ${object.created_at}</p>
                                                    <p class="mb-3"><strong>Status Data:</strong> ${object.status_data}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                        } else {
                            html = '<p>Tidak ada obyek yang ditemukan.</p>';
                        }

                        $('#objectList').html(html); // Update the HTML of the object list container
                    },
                    error: function() {
                        $('#objectList').html('<p>Terjadi kesalahan saat memuat data.</p>');
                    }
                });
            }

            // Initial load
            loadObjects();

            // Handle search button click
            $('#searchButton').click(function() {
                loadObjects();
            });

            // Trigger search when the input or dropdown value changes
            $('#searchInput, #objectType').on('change', function() {
                loadObjects();
            });

            // Handle delete button click
            $(document).on('click', '.fa-times', function() {
                var objectId = $(this).data('object-id'); // Get the object ID from the data attribute

                // SweetAlert Confirmation
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data yang dihapus tidak bisa dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed with deletion
                        $.ajax({
                            url: '/object/delete/' +
                                objectId, // Assuming the delete URL follows this structure
                            method: 'DELETE',
                            success: function(response) {
                                // Reload objects after deletion
                                Swal.fire(
                                    'Terhapus!',
                                    'Obyek telah dihapus.',
                                    'success'
                                );
                                loadObjects();
                            },
                            error: function() {
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    } else {
                        Swal.fire(
                            'Dibatalkan',
                            'Obyek tidak jadi dihapus.',
                            'info'
                        );
                    }
                });
            });
        });
    </script>


@endsection
