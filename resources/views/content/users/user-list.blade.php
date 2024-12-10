@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

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
    @vite('resources/assets/js/app-user-list.js')
@endsection
@section('content')

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Users</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $total_users->total }}</h3>
                                {{-- <p class="text-success mb-0">(+29%)</p> --}}
                            </div>
                            <p class="mb-0">Total Users</p>
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
                            <span>Status Active</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $status_active->total }}</h3>
                                {{-- <p class="text-success mb-0">(+42%)</p> --}}
                            </div>
                            <p class="mb-0">Total Users</p>
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
                            <span>Status Inactive</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $status_inactive->total }}</h3>
                                {{-- <p class="text-success mb-0">(+18%)</p> --}}
                            </div>
                            <p class="mb-0">Total Users</p>
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
        {{-- <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Status Suspended</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $status_suspended->total }}</h3>
                                <p class="text-danger mb-0">(-14%)</p>
                            </div>
                            <p class="mb-0">Total Users</p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-user-check ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Active Login</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ $active->total }}</h3>
                                {{-- <p class="text-danger mb-0">(-14%)</p> --}}
                            </div>
                            <p class="mb-0">Total Users</p>
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
        <input type="hidden" name="id_role_rs" id="id_role_rs" value="{{ $role_structure }}">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-3 user_role"></div>
                    <div class="col-md-3 user_plan"></div>
                    <div class="col-md-3 user_status"></div>
                    <div class="col-md-2 user_active"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-danger me-sm-3 me-1 data-submit"
                            id="resetAll">Reset</button></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table">
                    <thead class="border-top">
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role Structure</th>
                            <th>Role Access</th>
                            <th>Role Users</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Offcanvas to add new user -->
            <div class="modal fade" id="openModalAddUsers" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                onclick="refreshAll()"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add User</h3>
                                <p class="text-muted">Add user will receive a privacy audit.</p>
                            </div>
                            <form class="row add-new-user pt-0" id="addNewUserForm">
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="nik">Nik</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        onchange="chekNikAktif(this.value)" placeholder="330206**" name="userFullname"
                                        aria-label="330206**" />
                                    <span class="invalid-feedback" id="notifNik"></span>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="John Doe" name="userFullname" aria-label="John Doe" />
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="email" class="form-control"
                                        onchange="chekEmailAktif(this.value)" placeholder="john.doe@example.com"
                                        aria-label="john.doe@example.com" name="email" />
                                    <span class="invalid-feedback" id="notifEmail"></span>
                                </div>
                                <div class="mb-3 col-12 col-md-6 form-password-toggle">
                                    <label class="form-label" for="newPassword">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" id="password" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="kontak">Kontak</label>
                                    <input type="text" id="kontak" name="kontak" class="form-control phone-mask"
                                        maxlength="15" onchange="chekKontakAktif(this.value)"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                        placeholder="62 8579" aria-label="john.doe@example.com" />
                                    <span class="invalid-feedback" id="notifKontak"></span>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="status" name="status" class="select2 form-select"
                                        aria-label="Default select example">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach (Helper::getStatus() as $r)
                                            <option value="{{ $r->status_name }}">
                                                {{ $r->status_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role_structure">Role Structure</label>
                                    <select id="role_structure" name="role_structure" class="select3 form-select"
                                        aria-label="Default select example" onchange="changeRole()">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach (Helper::getRoleStructure() as $r)
                                            <option value="{{ $r->rs_id }}">
                                                {{ $r->rs_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role_access">Role Access</label>
                                    <select id="role_access" name="role_access" class="select4 form-select"
                                        onchange="changeRole()" aria-label="Default select example">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach (Helper::getRoleaccess() as $r)
                                            <option value="{{ $r->ra_id }}">
                                                {{ $r->ra_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role">Role</label>
                                    <select id="role" name="role" class="select5 form-select"
                                        aria-label="Default select example">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach (Helper::getRole() as $r)
                                            <option value="{{ $r->role_id }}">
                                                {{ $r->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="Jl hr**"
                                        name="image" aria-label="Jl hr**" />
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Jl hr**"
                                        name="alamat" aria-label="Jl hr**" />
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
                                        id="submitUsers" onclick="SaveUsers()" disabled>Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close" onclick="refreshAll()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit User Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Edit User</h3>
                                <p class="text-muted">Updating user details will receive a privacy audit.</p>
                            </div>
                            <form class="row g-3">
                                <input type="hidden" name="id" id="idEdit">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Nik</label>
                                    <input type="text" id="nikEdit" name="nik" class="form-control"
                                        placeholder="330206****" />
                                    <span class="invalid-feedback" id="notifNik"></span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" id="nameEdit" name="name" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="emailEdit" name="email" class="form-control"
                                        placeholder="example@domain.com" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="kontak">Kontak</label>
                                    <input type="text" id="kontakEdit" name="kontak" class="form-control"
                                        maxlength="15" placeholder="Doe" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="statusEdit" name="status" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getStatus() as $r)
                                            <option value="{{ $r->status_name }}">
                                                {{ $r->status_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="role_structure">Role Structure</label>
                                    <select id="role_structureEdit" name="role_structure" class="form-select"
                                        onchange="changeRoleEdit()" aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getRoleStructure() as $r)
                                            <option value="{{ $r->rs_id }}">
                                                {{ $r->rs_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="role_access">Role Access</label>
                                    <select id="role_accessEdit" name="role_access" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getRoleaccess() as $r)
                                            <option value="{{ $r->ra_id }}">
                                                {{ $r->ra_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="role">Role</label>
                                    <select id="roleEdit" name="role" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach (Helper::getRole() as $r)
                                            <option value="{{ $r->role_id }}">
                                                {{ $r->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" id="imageEdit" name="image" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" id="alamatEdit" name="alamat" class="form-control"
                                        placeholder="Doe" />
                                </div>
                                <div class="col-12 text-center">
                                    <button type="button" onclick="EditUsers()"
                                        class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="uploadUsers" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Uploads Users</h3>
                                <p class="text-muted">Please download the excel template <a
                                        href="{{ asset('') }}storage/template/excel/template users.xlsx"
                                        target="_blank">Download</a>
                                </p>
                            </div>
                            <form class="row g-3">
                                <input type="hidden" name="id" id="idEdit">
                                <div class="col-12 col-md-12">
                                    <input type="file" id="usersUploadss" name="usersUploadss" class="form-control"
                                        placeholder="330206****" />
                                    <span class="invalid-feedback" id="usersUploadss"></span>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="button" onclick="uploadsUsers()"
                                        class="btn btn-primary me-sm-3 me-1">Upload</button>
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
        @include('content.general.detail-users')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
            integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $('#resetAll').click(function() {
                    $('[type="search"]').val('').trigger('keyup');
                    $('#UserRole').val('').trigger('change');
                    $('#UserPlan').val('').trigger('change');
                    $('#FilterTransaction').val('').trigger('change');
                    $('#FilterActive').val('').trigger('change');
                });
            })

            function openModalUpload() {
                $('#uploadUsers').modal('show');
            }

            function changeRole() {
                let role_structure = $('#role_structure').val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('role.roleList') }}',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        var no = 1;
                        for (i = 0; i < data.data.length; i++) {
                            if (role_structure != 2 && role_structure != 3) {
                                html += '<option value="' + data.data[i].role_id + '">' + data.data[i].role_name +
                                    '</option>';
                            } else {

                                if (data.data[i].role_name == 'Reviewer') {
                                    html += '<option value="' + data.data[i].role_id + '">' + data.data[i]
                                        .role_name +
                                        '</option>';
                                }
                            }
                        }

                        $('#role').html(html);
                    }
                });
            }

            function changeRoleEdit() {
                let role_structureEdit = $('#role_structureEdit').val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('role.roleList') }}',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        var no = 1;
                        for (i = 0; i < data.data.length; i++) {
                            if (role_structureEdit != 1 && role_structureEdit != 4) {
                                if (data.data[i].role_name == 'Reviewer') {
                                    html += '<option value="' + data.data[i].role_id + '">' + data.data[i]
                                        .role_name +
                                        '</option>';
                                }
                            } else {
                                html += '<option value="' + data.data[i].role_id + '">' + data.data[i].role_name +
                                    '</option>';
                            }
                        }
                        $('#roleEdit').html(html);
                    }
                });
            }

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

            function OpenModalEditUsers(uid, nik, name, email, kontak, role_structure, role_access, role, status, alamat) {
                $('#editUser').modal('show');
                $('#idEdit').val(uid);
                $('#nikEdit').val(nik);
                $('#nameEdit').val(name);
                $('#emailEdit').val(email);
                $('#kontakEdit').val(kontak);
                $('#statusEdit').val(status);
                $('#role_structureEdit').val(role_structure);
                $('#role_accessEdit').val(role_access);
                $('#roleEdit').val(role);
                $('#alamatEdit').val(alamat);
            }
        </script>
        <script>
            function SaveUsers() {
                $('#submitUsers').attr('disabled', true);
                let nik = $('#nik').val();
                let name = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let kontak = $('#kontak').val();
                let status = $('#status').val();
                let role_structure = $('#role_structure').val();
                let role_access = $('#role_access').val();
                let role = $('#role').val();
                let alamat = $('#alamat').val();
                var fd = new FormData();

                // var file_data = object.get(0).files[i];
                var other_data = $('form').serialize();
                fd.append('nik', nik);
                fd.append('name', name);
                fd.append('email', email);
                fd.append('password', password);
                fd.append('kontak', kontak);
                fd.append('status', status);
                fd.append('role_structure', role_structure);
                fd.append('role_access', role_access);
                fd.append('role', role);
                fd.append('alamat', alamat);
                fd.append('image', $('input[type=file]')[0].files[0]);

                if (nik === '' || name === '' || email === '' || password === '' || kontak === '' || status === '' ||
                    role_structure === '' || role_access === '' || role === '' || alamat === '') {
                    $('#submitUsers').attr('disabled', false);
                } else {
                    $.ajax({
                        url: '/users/addProses',
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
                                $('#openModalAddUsers').modal('hide');
                                refreshAll();
                                Swal.fire({
                                    width: 400,
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
                                $('.datatables-users').DataTable().ajax.reload();
                            }
                        }
                    });
                }
            }

            function EditUsers() {
                let uid = $('#idEdit').val();
                let nik = $('#nikEdit').val();
                let name = $('#nameEdit').val();
                let email = $('#emailEdit').val();
                let kontak = $('#kontakEdit').val();
                let status = $('#statusEdit').val();
                let role_structure = $('#role_structureEdit').val();
                let role_access = $('#role_accessEdit').val();
                let role = $('#roleEdit').val();
                let alamat = $('#alamatEdit').val();
                var fd = new FormData();

                // var file_data = object.get(0).files[i];
                var other_data = $('form').serialize();
                fd.append('uid', uid);
                fd.append('nik', nik);
                fd.append('name', name);
                fd.append('email', email);
                fd.append('kontak', kontak);
                fd.append('status', status);
                fd.append('role_structure', role_structure);
                fd.append('role_access', role_access);
                fd.append('role', role);
                fd.append('alamat', alamat);
                fd.append('image', $('#imageEdit')[0].files[0]);
                // console.log(fd);
                if (nik === '' || name === '' || email === '' || kontak === '' || status === '' ||
                    role_structure === '' || role_access === '' || role === '' || alamat === '') {
                    console.log('error');
                } else {
                    $.ajax({
                        url: '/users/updateProses',
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
                                $('#editUser').modal('hide');
                                Swal.fire({
                                    width: 400,
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
                                $('.datatables-users').DataTable().ajax.reload();
                            }
                        }
                    });
                }
            }

            function uploadsUsers() {
                $('#submitUsers').attr('disabled', true);
                var file = $('#usersUploadss')[0].files[0];
                var fd = new FormData();
                fd.append('excel', $('#usersUploadss')[0].files[0]);
                // console.log(file);
                $.ajax({
                    url: '/users/uploadsUsers',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    type: 'POST',
                    success: function(data) {
                        console.log(data);
                        if (data.success == true) {
                            $('#uploadUsers').modal('hide');
                            refreshAll();
                            Swal.fire({
                                width: 400,
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
                            $('.datatables-users').DataTable().ajax.reload();
                        }
                    }
                });
            }

            function refreshAll() {
                $('#nik').val('');
                $('#name').val('');
                $('#email').val('');
                $('#kontak').val('');
                $('#password').val('');
                $('#status').val('').trigger('change');
                $('#role_structure').val('').trigger('change');
                $('#role_access').val('').trigger('change');
                $('#role').val('').trigger('change');
                $('#image').val('');
                $('#alamat').val('');
                $('#submitUsers').attr('disabled', true);
                $('#notifKontak').html('');
                $('#notifEmail').html('');
                $('#notifNik').html('');
            }

            function chekEmailAktif(email) {
                // console.log(email);
                $.ajax({
                    url: '/checkEmail',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email: email
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function(data) {
                        // console.log(data);
                        if (data.success == true) {
                            $('#notifEmail').html('<strong>email is already to use </strong>')
                            $('#submitUsers').attr('disabled', true)
                        } else {
                            $('#notifEmail').html('')
                            if ($('#nik').val() !== '') {
                                $('#submitUsers').attr('disabled', false)
                            }

                        }
                    }
                });

            }

            function chekNikAktif(nik) {
                // console.log(nik);
                $.ajax({
                    url: '/checkNik',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        nik: nik
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function(data) {
                        // console.log(data);
                        if (data.success == true) {
                            $('#notifNik').html('<strong>Nik is already to use </strong>')
                            $('#submitUsers').attr('disabled', true)
                        } else {
                            $('#notifNik').html('')
                            if ($('#email').val() !== '') {
                                $('#submitUsers').attr('disabled', false)
                            }

                        }
                    }
                });

            }

            function chekKontakAktif(kontak) {
                // console.log(kontak);
                $.ajax({
                    url: '/checkKontak',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        kontak: kontak
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function(data) {
                        // console.log(data);
                        if (data.success == true) {
                            $('#notifKontak').html('<strong>Kontak is already to use </strong>')
                            $('#submitUsers').attr('disabled', true)
                        } else {
                            $('#notifKontak').html('')
                            if ($('#email').val() !== '' && $('#nik').val() !== '') {
                                $('#submitUsers').attr('disabled', false)
                            }

                        }
                    }
                });

            }
        </script>

    @endsection
