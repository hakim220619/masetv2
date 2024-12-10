@extends('layouts/layoutMaster')

@section('title', 'Broadcast')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/typeahead-js/typeahead.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/typeahead-js/typeahead.js', 'resources/assets/vendor/libs/bloodhound/bloodhound.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/forms-selects.js', 'resources/assets/js/forms-typeahead.js'])
@endsection

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0"><b>{{ $title }}</b></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="kontak">Role Access</label>
                                        <select id="role_access" class="form-control w-100" name="role_access"
                                            onchange="changeuserByRoleAccess()">
                                            <option value="all" selected>-- Pilih --</option>
                                            <option value="all">All</option>
                                            @foreach (Helper::getRoleaccess() as $r)
                                                <option value="{{ $r->ra_id }}">
                                                    {{ $r->ra_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3" id="usersAll">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label class="form-label" for="message">Message</label>
                                <textarea class="col-md-12 mb-3" name="message" id="message" cols="34" rows="10" onkeyup="disabledButton()"></textarea>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="demo-inline-spacing">
                                <div class="hideButtonSend">
                                    <button type="button" class="btn btn-primary" id="sendBroadcast"
                                        onclick="broadcastSend()" disabled>
                                        </span><i class="fa-regular fa-paper-plane me-1"></i>
                                        Send</button>
                                    <button type="button" class="btn btn-danger" onclick="refreshAll()"><span
                                            class="fa-solid fa-arrows-rotate me-1"></span>Refresh</button>
                                </div>

                                <div class="showButtonSend" hidden><button class="btn btn-primary" type="button" disabled>
                                        <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                    &nbsp;<button type="button" class="btn btn-danger" onclick="refreshAll()"><span
                                            class="fa-solid fa-arrows-rotate me-1"></span>Refresh</button></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function changeuserByRoleAccess() {
            let role_access = $('#role_access').val();
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('role.getUserByRoleAccess') }}',
                async: true,
                data: {
                    role_access: role_access
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no = 1;
                    html += '<label class="form-label" for="kontak">Users</label>';
                    html +=
                        '<select id="users" name="kontak" class="selectpicker form-control w-100" data-actions-box="true" data-virtual-scroll="false" data-live-search="true" multiple data-style="btn-default">';
                    for (i = 0; i < data.data.length; i++) {
                        html += '<option value="' + data.data[i].kontak + '">' + data.data[i]
                            .name +
                            ' (' + data.data[i].kontak + ')</option>';
                    }
                    html += '</select>';
                    $("#usersAll").html(html);
                    $('select').selectpicker();
                }
            });
        }

        function disabledButton() {
            var selectpicker = $('.selectpicker').val();
            var message = $("#message").val();
            if (selectpicker.length !== 0 && message !== '') {
                $('#sendBroadcast').attr('disabled', false)
            } else {
                $('#sendBroadcast').attr('disabled', true)

            }
        }

        function refreshAll() {
            $('#selectpickerSelectDeselect').selectpicker('deselectAll');
            var message = $("#message").val('');
        }

        function broadcastSend() {
            $('#sendBroadcast').attr('hidden', true)
            $('.showButtonSend').attr('hidden', false)

            var selectpicker = $('.selectpicker').val();
            console.log($("#message").val());
            $.ajax({
                type: 'GET',
                url: '{{ route('broadcast.sendMessage') }}',
                async: true,
                data: {
                    kontak: selectpicker,
                    message: $("#message").val(),
                },
                dataType: 'json',
                beforeSend: function() {

                    $('#loading').removeAttr('hidden');
                    $('.hideButtonSend').attr('hidden', true)
                },
                success: function(data) {
                    // console.log(data);
                    if (data.success == true) {
                        $("#message").val('');
                        $('#sendBroadcast').removeAttr('disabled');
                        $('#selectpickerSelectDeselect').selectpicker('deselectAll');
                        $('#loading').attr('hidden', true)
                        $('.showButtonSend').attr('hidden', true)
                        $('.hideButtonSend').attr('hidden', false)
                    }
                }
            });
        }
    </script>
@endsection
