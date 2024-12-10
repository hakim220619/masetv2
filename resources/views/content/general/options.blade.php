@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

<!-- Vendor Styles -->
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

<!-- Page Scripts -->
@section('content')
    <div class="card">
        <!-- Form Section -->
        <div class="card-header">
            <h5 class="card-title">Form Add Header</h5>
            <form method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="header" class="form-label">Header</label>
                            <input type="text" class="form-control" id="headerHdr" name="header"
                                placeholder="Masukkan Header" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-control" id="stateHdr" name="state">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="saveHeaderData()">Submit</button>
            </form>
        </div>
    </div>

    <!-- Add Header Modal -->
    <div class="modal fade" id="addHeaderModalOpt" tabindex="-1" role="dialog" aria-labelledby="addHeaderModalOptLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHeaderModalOptLabel">Add Header</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addHeaderForm">
                        @csrf
                        <div class="form-group">
                            <label for="modalOption" class="form-label">Option</label>
                            <input type="text" class="form-control" id="modalOption" name="option"
                                placeholder="Masukkan Option" required>
                        </div>
                        <div class="form-group">
                            <label for="modalState" class="form-label">State</label>
                            <select class="form-control" id="modalState" name="state">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                        <input type="text" id="modalId" name="id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitModalForm()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Row grouping -->
    <div class="card mt-4">
        <h5 class="card-header">Master Data</h5>
        <div class="card-datatable table-responsive">
            <table id="masterTable" class="dt-row-grouping table">
                <thead>
                    <tr>
                        <th>Label Header</th>
                        <th>Label Options</th>
                        <th>Type</th>
                        <th>State</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataOptions as $a)
                        @if ($a->type == 'Header')
                            <tr class="group-header" style="background: #e1e1e1;">
                                <th>{{ $a->label_header }}</th>
                                <th></th>
                                <th></th>
                                <th>
                                    @if ($a->state === 'ON')
                                        <span class="badge bg-info">ON</span>
                                    @else
                                        <span class="badge bg-warning">OFF</span>
                                    @endif
                                </th>
                                <th></th>
                                <th>
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editHeaderModal{{ $a->label_header }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button class="btn btn-sm  btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addHeaderModalOpt{{ $a->label_header }}">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteHeaderModal{{ $a->label_header }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </th>
                            </tr>

                            <!-- Edit Header Modal -->
                            <div class="modal fade" id="editHeaderModal{{ $a->label_header }}" tabindex="-1" role="dialog"
                                aria-labelledby="editHeaderModalLabel{{ $a->label_header }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editHeaderModalLabel{{ $a->label_header }}">Edit
                                                Header</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editHeaderForm{{ $a->label_header }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="editHeaderInput{{ $a->label_header }}"
                                                        class="form-label">Header</label>
                                                    <input type="text" class="form-control"
                                                        id="editHeaderInput{{ $a->label_header }}" name="header"
                                                        value="{{ $a->label_header }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editStateSelect{{ $a->label_header }}"
                                                        class="form-label">State</label>
                                                    <select class="form-control"
                                                        id="editStateSelect{{ $a->label_header }}" name="state">
                                                        <option value="ON"
                                                            @if ($a->state == 'ON') selected @endif>ON</option>
                                                        <option value="OFF"
                                                            @if ($a->state == 'OFF') selected @endif>OFF</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="id" value="{{ $a->id }}">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="submitEditHeaderForm('{{ $a->label_header }}')">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Header Modal -->
                            <div class="modal fade" id="deleteHeaderModal{{ $a->label_header }}" tabindex="-1"
                                role="dialog" aria-labelledby="deleteHeaderModalLabel{{ $a->label_header }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteHeaderModalLabel{{ $a->label_header }}">
                                                Confirm Delete Header</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete the header "{{ $a->label_header }}" and all its
                                            associated options?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-danger"
                                                onclick="deleteHeader('{{ $a->label_header }}')">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="addHeaderModalOpt{{ $a->label_header }}" tabindex="-1"
                                role="dialog" aria-labelledby="addHeaderModalOptLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addHeaderModalOptLabel">Add Header</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/options/saveOptions" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="modalOption" class="form-label">Option</label>
                                                    <input type="text" class="form-control" id="modalOptionOpt"
                                                        name="option" placeholder="Masukkan Option" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="modalState" class="form-label">State</label>
                                                    <select class="form-control" id="modalStateOpt" name="state">
                                                        <option value="ON">ON</option>
                                                        <option value="OFF">OFF</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" id="modalIdOpt" value="{{ $a->label_header }}"
                                                    name="id">
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-label-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <tr>
                                <td></td>
                                <td>{{ $a->label_option }}</td>
                                <td>{{ $a->type }}</td>
                                <th>
                                    @if ($a->state === 'ON')
                                        <span class="badge bg-info">ON</span>
                                    @else
                                        <span class="badge bg-warning">OFF</span>
                                    @endif
                                </th>
                                <td>{{ $a->created_at }}</td>
                                <td>
                                    <a href="javascript:;" class="btn btn-sm btn-icon item-edit" data-bs-toggle="modal"
                                        data-bs-target="#editOptionModal{{ $a->id }}">
                                        <i class="text-primary ti ti-pencil"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-sm btn-icon item-delete" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $a->id }}">
                                        <i class="text-danger ti ti-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Edit Option Modal -->
                            <div class="modal fade" id="editOptionModal{{ $a->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="editOptionModalLabel{{ $a->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editOptionModalLabel{{ $a->id }}">Edit
                                                Option</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editOptionForm{{ $a->id }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="editOptionInput{{ $a->id }}"
                                                        class="form-label">Option</label>
                                                    <input type="text" class="form-control"
                                                        id="editOptionInput{{ $a->id }}" name="option"
                                                        value="{{ $a->label_option }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editStateSelect{{ $a->id }}"
                                                        class="form-label">State</label>
                                                    <select class="form-control" id="editStateSelect{{ $a->id }}"
                                                        name="state">
                                                        <option value="ON"
                                                            @if ($a->state == 'ON') selected @endif>ON</option>
                                                        <option value="OFF"
                                                            @if ($a->state == 'OFF') selected @endif>OFF</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="id" value="{{ $a->id }}">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="submitEditOptionForm('{{ $a->id }}')">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $a->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalLabel{{ $a->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $a->id }}">Confirm
                                                Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this item?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-danger"
                                                onclick="deleteItem({{ $a->id }})">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function saveHeaderData() {
            const header = $('#headerHdr').val();
            const state = $('#stateHdr').val();
            console.log(header);
            console.log(state);

            fetch('/options/saveHeaderOptions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        header: header,
                        state: state
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success == true) {
                        location.reload() // Reload the table data after successful save
                    } else {
                        alert('Failed to save data. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error saving data:', error);
                    alert('Failed to save data. Please try again later.');
                });
        }

        function submitEditHeaderForm(labelHeader) {
            const formId = `#editHeaderForm${labelHeader}`;
            const formData = new FormData(document.querySelector(formId));

            fetch(`/options/editHeader/${labelHeader}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success == true) {
                        location.reload(); // Reload the table data after successful save
                    } else {
                        alert('Failed to save changes. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error saving changes:', error);
                    alert('Failed to save changes. Please try again later.');
                });
        }


        function deleteHeader(labelHeader) {
            fetch(`/options/deleteHeader/${labelHeader}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success == true) {
                        location.reload(); // Reload the table data after successful deletion
                    } else {
                        alert('Failed to delete the header. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error deleting header:', error);
                    alert('Failed to delete the header. Please try again later.');
                });
        }

        function deleteItem(id) {
            fetch(`/options/delete/${id}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success == true) {
                        location.reload(); // Reload the table data after successful deletion
                    } else {
                        alert('Failed to delete the item. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error deleting item:', error);
                    alert('Failed to delete the item. Please try again later.');
                });
        }

        function submitEditOptionForm(id) {
            const formId = `#editOptionForm${id}`;
            const formData = new FormData(document.querySelector(formId));

            fetch(`/options/editOptions/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success == true) {
                        location.reload(); // Reload the table data after successful save
                    } else {
                        alert('Failed to save changes. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error saving changes:', error);
                    alert('Failed to save changes. Please try again later.');
                });
        }
    </script>
    <!--/ Row grouping -->
@endsection
