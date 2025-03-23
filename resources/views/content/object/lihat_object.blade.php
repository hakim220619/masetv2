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

            <!-- Pagination Container -->
            <div class="row mt-4">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center" id="pagination">
                            <!-- Pagination will be dynamically generated here -->
                        </ul>
                    </nav>
                </div>
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

            let currentPage = 1;

            // Function to load objects using Ajax
            function loadObjects(page = 1) {
                $('#objectList').html(
                    '<div class="col-12 text-center"><div class="spinner-border text-primary" role="status"></div></div>'
                );

                var searchKeyword = $('#searchInput').val();
                var objectType = $('#objectType').val();

                $.ajax({
                    url: '/object/list-objects',
                    method: 'GET',
                    data: {
                        search: searchKeyword,
                        type: objectType,
                        page: page
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
                                                    <a href="/object/edit/${object.id}" class="text-primary me-2">
                                                        <i class="fa fa-edit" title="Edit" style="font-size: 13px;"></i>
                                                    </a>
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
                            html = '<div class="col-12"><p>Tidak ada obyek yang ditemukan.</p></div>';
                        }

                        $('#objectList').html(html);

                        // Perbaikan render pagination dengan data yang benar
                        renderPagination(response.current_page, response.last_page);
                        currentPage = response.current_page;
                    },
                    error: function() {
                        $('#objectList').html(
                            '<div class="col-12"><p>Terjadi kesalahan saat memuat data.</p></div>');
                    }
                });
            }

            // Function to render pagination
            function renderPagination(currentPage, lastPage) {
                let pagination = '';
                const maxVisiblePages = 5; // Batasi jumlah halaman yang ditampilkan

                // Previous button
                pagination += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${currentPage - 1}">&laquo;</a>
                </li>`;

                // Page numbers
                let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(lastPage, startPage + maxVisiblePages - 1);

                // Adjust if we're at the end
                if (endPage - startPage < maxVisiblePages - 1) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }

                for (let i = startPage; i <= endPage; i++) {
                    pagination += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>`;
                }

                // Next button
                pagination += `<li class="page-item ${currentPage === lastPage ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${currentPage + 1}">&raquo;</a>
                </li>`;

                $('#pagination').html(pagination);
            }

            // Initial load
            loadObjects();

            // Handle search button click
            $('#searchButton').click(function() {
                loadObjects(1); // Reset to first page when searching
            });

            // Trigger search when the input or dropdown value changes
            $('#searchInput, #objectType').on('change', function() {
                loadObjects(1); // Reset to first page when filter changes
            });

            // Handle pagination click
            $(document).on('click', '.page-link', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                if (page) {
                    loadObjects(page);
                }
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
                            url: '/object/delete/' + objectId,
                            method: 'DELETE',
                            success: function(response) {
                                // Reload objects after deletion
                                Swal.fire(
                                    'Terhapus!',
                                    'Obyek telah dihapus.',
                                    'success'
                                );
                                loadObjects(currentPage);
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

            $(document).ajaxComplete(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        });
    </script>


@endsection
