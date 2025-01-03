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
                    <h5 class="modal-title" id="addHeaderModalOptLabel">Add Options</h5>
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
                            <label for="modalOptionValue" class="form-label">Option Value</label>
                            <input type="text" class="form-control" id="modalOptionValue" name="value"
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
                        <th style="width: 200px;">Label Header</th>
                        <th>Label Options</th>
                        <th>Label Value</th>
                        <th>Type</th>
                        <th>State</th>
                        <th>Created</th>
                        <th style="width: 200px;">Action</th>
                    </tr>
                </thead>


                <tbody>
                    @php
                        $groupedOptions = collect($dataOptions)->sortByDesc('created_at')->groupBy('label_header');
                    @endphp
                    @foreach ($groupedOptions as $header => $options)
                        @php
                            $idSafeHeader = str_replace([' ', '(', ')'], '_', $header ?? 'default_id');

                        @endphp

                        <!-- Header Row -->
                        <tr class="group-header" style="background: #e1e1e1;">
                            <th>{{ $header }}</th>

                            <th colspan="2"></th>
                            <td>Header</td>
                            <td>
                                @if ($options->first()->state === 'ON')
                                    <span class="badge bg-info">ON</span>
                                @else
                                    <span class="badge bg-warning">OFF</span>
                                @endif
                            </td>
                            <td>{{ $options->first()->created_at }}</td>

                            <th>
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#editHeaderModal{{ $idSafeHeader }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addHeaderModalOpt{{ $idSafeHeader }}">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteHeaderModal{{ str_replace(' ', '_', $header) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </th>
                        </tr>
                        <!-- Edit Header Modal -->
                        <div class="modal fade" id="editHeaderModal{{ $idSafeHeader }}" tabindex="-1" role="dialog"
                            aria-labelledby="editHeaderModalLabel{{ $idSafeHeader }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editHeaderModalLabel{{ $idSafeHeader }}">
                                            Edit
                                            Header</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editHeaderForm{{ $idSafeHeader }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="editHeaderInput{{ $header }}"
                                                    class="form-label">Header</label>
                                                <input type="text" class="form-control"
                                                    id="editHeaderInput{{ $header }}" name="header"
                                                    value="{{ $header }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editStateSelect{{ $header }}"
                                                    class="form-label">State</label>
                                                <select class="form-control" id="editStateSelect{{ $header }}"
                                                    name="state">
                                                    <option value="ON"
                                                        @if ($options->first()->state == 'ON') selected @endif>ON</option>
                                                    <option value="OFF"
                                                        @if ($options->first()->state == 'OFF') selected @endif>OFF</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $options->first()->id }}">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="submitEditHeaderForm('{{ $idSafeHeader }}')">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Header Modal -->
                        <div class="modal fade" id="deleteHeaderModal{{ $header }}" tabindex="-1" role="dialog"
                            aria-labelledby="deleteHeaderModalLabel{{ $header }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteHeaderModalLabel{{ $header }}">
                                            Confirm Delete Header</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the header "{{ $header }}" and all its
                                        associated options?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="deleteHeader('{{ $header }}')">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="addHeaderModalOpt{{ $idSafeHeader }}" tabindex="-1" role="dialog"
                            aria-labelledby="addHeaderModalOptLabel" aria-hidden="true">


                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addHeaderModalOptLabel">Add Options</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/options/saveOptions" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="modalOption" class="form-label">Option Label</label>
                                                <input type="text" class="form-control" id="modalOptionOpt"
                                                    name="option" placeholder="Masukkan Option" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="modalOptionValue" class="form-label">Option Value</label>
                                                <input type="text" class="form-control" id="modalOptionValue"
                                                    name="value" placeholder="Masukkan Option" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="modalState" class="form-label">State</label>
                                                <select class="form-control" id="modalStateOpt" name="state">
                                                    <option value="ON">ON</option>
                                                    <option value="OFF">OFF</option>
                                                </select>
                                            </div>
                                            <input type="hidden" id="modalIdOpt" value="{{ $header }}"
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

                        <!-- Option Rows -->
                        @foreach ($options as $option)
                            @if ($option->type == 'Options')
                                <tr>
                                    <td></td>
                                    <td>{{ $option->label_option }}</td>
                                    <td>{{ $option->label_value }}</td>
                                    <td>{{ $option->type }}</td>
                                    <td>
                                        @if ($option->state === 'ON')
                                            <span class="badge bg-info">ON</span>
                                        @else
                                            <span class="badge bg-warning">OFF</span>
                                        @endif
                                    </td>
                                    <td>{{ $option->created_at }}</td>
                                    <td>
                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"
                                            data-bs-toggle="modal" data-bs-target="#editOptionModal{{ $option->id }}">
                                            <i class="text-primary ti ti-pencil"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-sm btn-icon item-delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $option->id }}">
                                            <i class="text-danger ti ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editOptionModal{{ $option->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editOptionModalLabel{{ $option->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editOptionModalLabel{{ $option->id }}">Edit
                                                    Option</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editOptionForm{{ $option->id }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="editOptionInput{{ $option->id }}"
                                                            class="form-label">Option</label>
                                                        <input type="text" class="form-control"
                                                            id="editOptionInput{{ $option->id }}" name="option"
                                                            value="{{ $option->label_option }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editOptionInput{{ $option->id }}"
                                                            class="form-label">Value</label>
                                                        <input type="text" class="form-control"
                                                            id="editOptionInput{{ $option->id }}" name="value"
                                                            value="{{ $option->label_value }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editStateSelect{{ $option->id }}"
                                                            class="form-label">State</label>
                                                        <select class="form-control"
                                                            id="editStateSelect{{ $option->id }}" name="state">
                                                            <option value="ON"
                                                                @if ($option->state == 'ON') selected @endif>ON
                                                            </option>
                                                            <option value="OFF"
                                                                @if ($option->state == 'OFF') selected @endif>OFF
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $option->id }}">
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="submitEditOptionForm('{{ $option->id }}')">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="deleteModal{{ $option->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteModalLabel{{ $option->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $option->id }}">Confirm
                                                    Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this option?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="deleteItem('{{ $option->id }}')">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
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
