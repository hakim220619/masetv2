@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Bangunan')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-user-view.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/form-wizard-icons.js', 'resources/assets/js/app-bangunan-list.js'])
@endsection


@section('content')

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4" onclick="nextToPage(1)">
            <div class="card" id="tdb">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Tanah dan Bangunan</span>
                            <div class="d-flex align-items-center my-2">
                                <span class="mb-0 me-2" style="font-size: 20px;">{{ $pembanding_bangunan }}</span>
                                {{-- <p class="text-success mb-0">(+29%)</p> --}}
                            </div>
                            <p class="mb-0">Total</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-home ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4" onclick="nextToPage(2)">
            <div class="card" id="tk">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Tanah Kosong</span>
                            <div class="d-flex align-items-center my-2">
                                <span class="mb-0 me-2" style="font-size: 20px;">{{ $pembanding_tanah_kosong }}</span>
                                {{-- <p class="text-success mb-0">(+42%)</p> --}}
                            </div>
                            <p class="mb-0">Total</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="ti ti-home-exclamation ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4" onclick="nextToPage(3)">
            <div class="card" id="re">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Office/Retai/Aset</span>
                            <div class="d-flex align-items-center my-2">
                                <span class="mb-0 me-2" style="font-size: 20px;">{{ $pembanding_retail }}</span>
                                {{-- <p class="text-success mb-0">(+18%)</p> --}}
                            </div>
                            <p class="mb-0">Total</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-home-check ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="showObjectView"></div>
    </div>
    <script>
        function nextToPage(param) {
            console.log(param);
            if (param == 1) {
                $.ajax({
                    type: 'GET',
                    url: '/pembanding/bangunanView',
                    success: function(data) {
                        $('#showObjectView').html(data);
                        $('#tdb').addClass('text-white bg-primary');
                        $('.tdb1').addClass('text-white');
                        $('#tk').removeClass('text-white bg-primary');
                        $('#re').removeClass('text-white bg-primary');
                        // $('.tk1').addClass('text-dark');
                    }
                });
            }


            if (param == 2) {
                // $('#tdb1').addClass('text-dark');
                $.ajax({
                    type: 'GET',
                    url: '/pembanding/tanahKosongView',
                    success: function(data) {
                        $('#showObjectView').html(data);

                        $('#tk').addClass('text-white bg-primary');
                        $('#tdb').removeClass('text-white bg-primary');
                        $('#re').removeClass('text-white bg-primary');
                        $('#tk1').addClass('text-white');


                    }
                });
            }
            if (param == 3) {
                $.ajax({
                    type: 'GET',
                    url: '/pembanding/retailView',
                    success: function(data) {
                        $('#showObjectView').html(data);
                        $('#re').addClass('text-white bg-primary');
                        $('#tdb').removeClass('text-white bg-primary');
                        $('#tk').removeClass('text-white bg-primary');

                    }
                });
            }

        }
    </script>
@endsection
