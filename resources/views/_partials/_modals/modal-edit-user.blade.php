<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Edit User Information</h3>
                    <p class="text-muted">Updating user details will receive a privacy audit.</p>
                </div>
                <form class="row g-3" action="/users/editProses" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $profile->id }}">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Nik</label>
                        <input type="text" id="nik" name="nik" class="form-control"
                            value="{{ $profile->nik }}" placeholder="330206****" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $profile->name }}"
                            class="form-control" placeholder="Doe" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control"
                            value="{{ $profile->email }}" placeholder="example@domain.com" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="kontak">Kontak</label>
                        <input type="text" id="kontak" name="kontak" value="{{ $profile->kontak }}"
                            class="form-control" placeholder="Doe" />
                    </div>
                    {{-- <div class="col-12 col-md-6">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class="select2 form-select" disabled
                            aria-label="Default select example">
                            <option value="" disabled>-- Pilih --</option>
                            @foreach (Helper::getStatus() as $r)
                                <option value="{{ $r->status_name }}"
                                    {{ $r->status_name == $profile->status ? 'selected' : '' }}>
                                    {{ $r->status_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="role_structure">Role Structure</label>
                        <select id="role_structure" name="role_structure" class="select2 form-select" disabled
                            onchange="changeRoleEdit()" aria-label="Default select example">
                            <option value="" disabled>-- Pilih --</option>
                            @foreach (Helper::getRoleStructure() as $r)
                                <option value="{{ $r->rs_id }}"
                                    {{ $r->rs_name == $profile->role_structure ? 'selected' : '' }}>
                                    {{ $r->rs_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="role_access">Role Access</label>
                        <select id="role_access" name="role_access" class="select2 form-select" disabled
                            aria-label="Default select example">
                            <option value="" disabled>-- Pilih --</option>
                            @foreach (Helper::getRoleaccess() as $r)
                                <option value="{{ $r->ra_id }}"
                                    {{ $r->ra_name == $profile->role_access ? 'selected' : '' }}>
                                    {{ $r->ra_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="role">Role</label>
                        <select id="role" name="role" class="select2 form-select" disabled
                            aria-label="Default select example">
                            <option value="" disabled>-- Pilih --</option>
                            @foreach (Helper::getRole() as $r)
                                <option value="{{ $r->role_id }}"
                                    {{ $r->role_name == $profile->role ? 'selected' : '' }}>
                                    {{ $r->role_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="image">Image</label>
                        <input type="file" id="image" name="image" value="{{ $profile->alamat }}"
                            class="form-control" placeholder="Doe" />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ $profile->alamat }}"
                            class="form-control" placeholder="Doe" />
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function changeRoleEdit() {
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
                    if (role_structure != 1 && role_structure == [2, 3]) {
                        if (data.data[i].role_nama == 'Reviewer') {
                            html += '<option value="' + data.data[i].role_id + '">' + data.data[i]
                                .role_nama +
                                '</option>';
                        }
                    } else {
                        html += '<option value="' + data.data[i].role_id + '">' + data.data[i].role_nama +
                            '</option>';
                    }
                }
                $('#role').html(html);
            }
        });
    }
</script>
<!--/ Edit User Modal -->
