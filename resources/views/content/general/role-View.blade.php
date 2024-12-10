@extends('layouts/layoutMaster')

@section('title', 'role')

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
    @vite('resources/assets/js/app-role.js')
@endsection
@section('content')

    <div class="row g-4 mb-4">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-role table">
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
            <div class="modal fade" id="openModalAddRole" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add Role</h3>
                                <p class="text-muted">Add Role will receive a privacy audit.</p>
                            </div>
                            <form class="row add-new-user pt-0" id="addNewRoleStForm">
                                <div class="mb-3 col-12 col-md-12">
                                    <label class="form-label" for="role_name">Role Name</label>
                                    <input type="text" class="form-control" id="role_name" name="role_name"
                                        placeholder="Role**" aria-label="Role**" />
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="submitUsers"
                                        onclick="SaveRole()">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit User Modal -->
            <div class="modal fade" id="openModalUpdateRole" tabindex="-1" aria-hidden="true">
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
                                    <input type="text" id="role_nameEdit" name="nama" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="role_statusEdit" name="status" class="form-select"
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
                                    <button type="button" onclick="EditRole()"
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
        function OpenModalEditRole(id, role_name, role_status) {
            $('#openModalUpdateRole').modal('show');
            $('#idEdit').val(id);
            $('#role_nameEdit').val(role_name);
            $('#role_statusEdit').val(role_status);
        }
    </script>
    <script>
        function SaveRole() {
            let role_name = $('#role_name').val();
            var fd = new FormData();
            fd.append('role_name', role_name);

            if (role_name === '') {
                console.log('error');
            } else {
                $.ajax({
                    url: '/setting/addRoleProses',
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
                            $('#role_name').val('');
                            $('#openModalAddRole').modal('hide');
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
                            $('.datatables-role').DataTable().ajax.reload();
                        }
                    }
                });
            }
        }

        function EditRole() {
            let id = $('#idEdit').val();
            let role_name = $('#role_nameEdit').val();
            let role_status = $('#role_statusEdit').val();
            var fd = new FormData();
            fd.append('role_id', id);
            fd.append('role_name', role_name);
            fd.append('role_status', role_status);
            if (role_name === '') {
                console.log('error');
            } else {
                $.ajax({
                    url: '/setting/updateRoleProses',
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
                            $('#openModalUpdateRole').modal('hide');
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
                            $('.datatables-role').DataTable().ajax.reload();
                        }
                    }
                });
            }
        }
    </script>

@endsection
