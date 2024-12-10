@php
    $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')
@section('title', 'User View - Pages')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss'])
@endsection

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-user-view.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite('resources/assets/js/app-bangunan-list.js')
@endsection
@section('content')

    <div class="card">
        <div class="card-header border-bottom">
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-bangunan-view table">
                <thead class="border-top">
                    <tr>
                        <th>No</th>
                        <th>Asset</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.datatables-bangunan-view').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("pembanding.bangunanLoadData") }}',
                    type: 'GET',
                    dataSrc: 'data'
                },
                columns: [
                    { data: 'no', name: 'no' },
                    { 
                        data: null, 
                        name: 'asset',
                        render: function(data, type, row) {
                            return row.nip + ' - ' + row.nama_tanah_n_bangunan + '-' + row.alamat;
                        }
                    },
                    {
                        data: null,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<a href="/pembanding/detail_pembanding_bangunan/' + row.id + '" class="btn btn-sm btn-primary">Detail</a>';
                        }
                    }
                ]
            });
        });
    </script>
    
@endsection
