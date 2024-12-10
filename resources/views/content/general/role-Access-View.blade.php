@extends('layouts/layoutMaster')

@section('title', 'roleAccess')

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
    @vite('resources/assets/js/app-role-access.js')
@endsection
@section('content')

    <div class="row g-4 mb-4">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-role-access table">
                    <thead class="border-top">
                        <tr>
                            <th>No</th>
                            <th>Role Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Offcanvas to add new user -->
            <div class="modal fade" id="openModalAddRoleAccess" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add Role Access</h3>
                                <p class="text-muted">Add Role Access will receive a privacy audit.</p>
                            </div>
                            <form class="row add-new-user pt-0" id="addNewRoleStForm">
                                <div class="mb-3 col-12 col-md-12">
                                    <label class="form-label" for="ra_name">Role Name</label>
                                    <input type="text" class="form-control" id="ra_name" name="ra_name"
                                        placeholder="Role**" aria-label="Role**" />
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="submitUsers"
                                        onclick="SaveRoleSa()">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit User Modal -->
            <div class="modal fade" id="openModalUpdateRoleAceess" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Edit Role Access</h3>
                                <p class="text-muted">Role Access will receive a privacy audit.</p>
                            </div>
                            <form class="row g-3">
                                <input type="hidden" name="id" id="idEdit">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="nama">Role Name</label>
                                    <input type="text" id="ra_nameEdit" name="nama" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="ra_statusEdit" name="status" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getStatus() as $r)
                                            @if ($r->status_name != 'SUSPENDED')
                                                <option value="{{ $r->status_name }}">
                                                    {{ $r->status_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="button" onclick="EditRoleSa()"
                                        class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit User Modal -->

        </div>
    </div>
    {{-- <script>
           
        </script> --}}
    <script>
        function OpenModalEditRoleAccess(id, ra_name, ra_status) {
            $('#openModalUpdateRoleAceess').modal('show');
            $('#idEdit').val(id);
            $('#ra_nameEdit').val(ra_name);
            $('#ra_statusEdit').val(ra_status);
        }
    </script>
    <script>
        function SaveRoleSa() {
            let ra_name = $('#ra_name').val();
            var fd = new FormData();
            fd.append('ra_name', ra_name);

            if (ra_name === '') {
                console.log('error');
            } else {
                $.ajax({
                    url: '/setting/addRoleAccessProses',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    type: 'POST',
                    success: function(data) {
                        // console.log(data);
                        if (data.success == true) {
                            $('#ra_name').val('');
                            $('#openModalAddRoleAccess').modal('hide');
                            Swal.fire({
                                width: 420,
                                padding: 7,
                                position: 'bottom-right',
                                toast: true,
                                icon: 'success',
                                title: 'Success',
                                text: `${data.message}`,
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                backgroundColor: '#28a745',
                                titleColor: '#fff',
                            });
                            $('.datatables-role-access').DataTable().ajax.reload();
                        }
                    }
                });
            }
        }

        function EditRoleSa() {
            let id = $('#idEdit').val();
            let rs_nama = $('#ra_nameEdit').val();
            let rs_status = $('#ra_statusEdit').val();
            var fd = new FormData();
            fd.append('ra_id', id);
            fd.append('ra_name', rs_nama);
            fd.append('ra_status', rs_status);
            if (rs_nama === '') {
                console.log('error');
            } else {
                $.ajax({
                    url: '/setting/updateRoleAceessProses',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    type: 'POST',
                    success: function(data) {
                        if (data.success == true) {
                            $('#openModalUpdateRoleAceess').modal('hide');
                            Swal.fire({
                                width: 420,
                                padding: 7,
                                position: 'bottom-right',
                                toast: true,
                                icon: 'success',
                                title: 'Success',
                                text: `${data.message}`,
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                backgroundColor: '#28a745',
                                titleColor: '#fff',
                            });
                            $('.datatables-role-access').DataTable().ajax.reload();
                        }
                    }
                });
            }
        }
    </script>

@endsection
