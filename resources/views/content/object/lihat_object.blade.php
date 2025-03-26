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

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p id="pagination-info" class="text-muted"></p>
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
                console.log('Loading page:', page); // Log untuk debugging
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
                                                    <i class="fa fa-times text-danger delete-object" title="Delete" style="font-size: 13px; cursor: pointer;" data-object-id="${object.id}"></i>
                                                </span>
                                            </div>
                                            <div class="card-body d-flex align-items-start" style="font-size: 12px;">
                                                <div class="me-3">
                                                    <img src="${object.foto_depan ? '/storage/uploads/bangunan/' + object.foto_depan : '/images/default.jpg'}" class="img-thumbnail" alt="${object.nama_bangunan}" style="width: 100px; height: 100px; object-fit: cover;">
                                                </div>
                                                <div>
                                                    <p class="mb-2"><strong>Jenis Obyek:</strong> <span class="fw-bold">${object.jenis_bangunan}</span></p>
                                                    <p class="mb-2"><strong>Alamat:</strong> ${object.alamat}</p>
                                                    <p class="mb-2"><strong>Tanggal:</strong> ${object.created_at}</p>
                                                    <p class="mb-2"><strong>Status Data:</strong> <span class="badge ${object.status_data === 'Aktif' ? 'bg-success' : 'bg-warning'}">${object.status_data}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                        } else {
                            html =
                                '<div class="col-12 text-center"><p>Tidak ada obyek yang ditemukan.</p></div>';
                        }

                        $('#objectList').html(html);

                        // Render pagination dengan data yang benar
                        renderPagination(response.current_page, response.last_page, response.total);
                        currentPage = response.current_page;

                        // Tambahkan informasi tentang total halaman dan item
                        $('#pagination-info').html(
                            `Menampilkan halaman ${response.current_page} dari ${response.last_page} (Total: ${response.total} item)`
                        );
                    },
                    error: function(xhr) {
                        console.error('Error loading objects:', xhr);
                        $('#objectList').html(
                            '<div class="col-12 text-center"><p>Terjadi kesalahan saat memuat data. Silakan coba lagi.</p></div>'
                        );
                    }
                });
            }

            // Function to render pagination
            function renderPagination(currentPage, lastPage, total) {
                let pagination = '';
                const maxVisiblePages = 5; // Batasi jumlah halaman yang ditampilkan

                // Previous button
                pagination += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${currentPage - 1}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>`;

                // Page numbers
                let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(lastPage, startPage + maxVisiblePages - 1);

                // Adjust if we're at the end
                if (endPage - startPage < maxVisiblePages - 1) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }

                // First page
                if (startPage > 1) {
                    pagination += `<li class="page-item">
                        <a class="page-link" href="#" data-page="1">1</a>
                    </li>`;

                    if (startPage > 2) {
                        pagination += `<li class="page-item disabled">
                            <a class="page-link" href="#">...</a>
                        </li>`;
                    }
                }

                // Page numbers
                for (let i = startPage; i <= endPage; i++) {
                    pagination += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>`;
                }

                // Last page link if needed
                if (endPage < lastPage) {
                    if (endPage < lastPage - 1) {
                        pagination += `<li class="page-item disabled">
                            <a class="page-link" href="#">...</a>
                        </li>`;
                    }
                    pagination += `<li class="page-item">
                        <a class="page-link" href="#" data-page="${lastPage}">${lastPage}</a>
                    </li>`;
                }

                // Next button
                pagination += `<li class="page-item ${currentPage === lastPage ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${currentPage + 1}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>`;

                $('#pagination').html(pagination);
            }

            // Initial load
            loadObjects();

            // Handle search button click
            $('#searchButton').click(function() {
                loadObjects(1); // Reset to first page when searching
            });

            // Trigger search when the Enter key is pressed in search input
            $('#searchInput').keypress(function(e) {
                if (e.which === 13) { // Enter key
                    loadObjects(1);
                    return false; // Prevent form submission
                }
            });

            // Handle pagination click
            $(document).on('click', '.page-link', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                if (page && !$(this).parent().hasClass('disabled')) {
                    console.log('Navigasi ke halaman:', page); // Log untuk debugging
                    loadObjects(page);
                }
            });

            // Handle delete button click
            $(document).on('click', '.delete-object', function() {
                var objectId = $(this).data('object-id');

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
                                Swal.fire(
                                    'Terhapus!',
                                    'Obyek telah dihapus.',
                                    'success'
                                );
                                // Reload current page, unless we're on the first page and there's only one item
                                if (currentPage > 1 && $('#objectList .card').length ===
                                    1) {
                                    loadObjects(currentPage - 1);
                                } else {
                                    loadObjects(currentPage);
                                }
                            },
                            error: function(xhr) {
                                console.error('Error deleting object:', xhr);
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>


@endsection
