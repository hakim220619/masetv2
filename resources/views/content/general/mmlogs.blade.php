@extends('layouts/layoutMaster')

@section('title', 'MmLogs')

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
    @vite('resources/assets/js/app-users-logs-activity.js')
@endsection
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>All</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_mmlogs->total }}</h3>
                                {{-- <p class="text-success mb-0">(+29%)</p> --}}
                            </div>
                            <p class="mb-0">Total MmLogs</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-user ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Super Admin</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_raSuperAdmin->total }}</h3>
                                {{-- <p class="text-success mb-0">(+42%)</p> --}}
                            </div>
                            <p class="mb-0">Total MmLogs</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="ti ti-user-exclamation ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Admin</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_raAdmin->total }}</h3>
                                {{-- <p class="text-success mb-0">(+18%)</p> --}}
                            </div>
                            <p class="mb-0">Total MmLogs</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-user-plus ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Users</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_rausers->total }}</h3>
                                {{-- <p class="text-danger mb-0">(-14%)</p> --}}
                            </div>
                            <p class="mb-0">Total MmLogs</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-user-check ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-3 mmName"></div>
                    <div class="col-md-3 mmRole"></div>
                    <div class="col-md-3 mmRoleAccess"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-danger me-sm-3 me-1 data-submit"
                            id="resetAllMmLogs">Reset</button></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table datatable-users-activity border-top">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>name</th>
                            <th>Role structure</th>
                            <th>Role Access</th>
                            <th>Role</th>
                            <th>Activity</th>
                            <th>Action</th>
                            <th>Ip</th>
                            <th>Crated</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Offcanvas to add new user -->
            <!--/ Edit User Modal -->
        </div>
        @include('content.general.detail-users')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function OpenModalDetailUsers(uid, image, nik, name, email, kontak, rs_name, ra_name, role_name, status, alamat) {
            $('#DetailUSers').modal('show');
            $('#nikDetail').text(nik);
            $('#nameDetail').text(name);
            $('#emailDetail').text(email);
            $('#kontakDetail').text(kontak);
            $('#rs_nameDetail').text(rs_name);
            $('#ra_nameDetail').text(ra_name);
            $('#role_nameDetail').text(role_name);
            var html = '<span class="fw-medium me-1">Status:</span>';
            if (status == 'ACTIVE') {
                $('#statusDetail').html('' + html + '<span class="badge bg-label-success">' + status + '</span>');
            }
            if (status == 'INACTIVE') {
                $('#statusDetail').html('' + html + '<span class="badge bg-label-warning">' + status + '</span>');
            }
            if (status == 'SUSPENDED') {
                $('#statusDetail').html('' + html + '<span class="badge bg-label-danger">' + status + '</span>');
            }

            $('#imageDetail').html(
                '<img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('') }}storage/images/users/' + image +
                '" height="100" width="100" alt="User avatar" />'
            );
            $('#alamatDetail').text(alamat);

        }
        $(document).ready(function() {
            $('#resetAllMmLogs').click(function() {
                $('[type="search"]').val('').trigger('keyup');
                $('#mmName').val('').trigger('change');
                $('#mmRole').val('').trigger('change');
                $('#mmRoleAccess').val('').trigger('change');
            });
        })
    </script>
@endsection
