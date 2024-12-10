@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/modal-edit-user.js', 'resources/assets/js/modal-enable-otp.js', 'resources/assets/js/app-user-view.js', 'resources/assets/js/app-user-view-security.js'])
@endsection

@section('content')
    {{-- <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">User / View /</span> Security
    </h4> --}}
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-3 pt-1 mt-4"
                                src="{{ asset('') }}storage/images/users/{{ $profile->image }}" height="100"
                                width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{ $profile->name }}</h4>
                                <span class="badge bg-label-secondary mt-1">{{ $profile->rs_name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-checkbox ti-sm'></i></span>
                            <div>
                                <p class="mb-0 fw-medium">1.23k</p>
                                <small>Tasks Done</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-briefcase ti-sm'></i></span>
                            <div>
                                <p class="mb-0 fw-medium">568</p>
                                <small>Projects Done</small>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 small text-uppercase text-muted">Details</p>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <span class="fw-medium me-1">Nik:</span>
                                <span>{{ $profile->nik }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Email:</span>
                                <span>{{ $profile->email }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Status:</span>
                                @if ($profile->status == 'ACTIVE')
                                    <span class="badge bg-label-success">{{ $profile->status }}</span>
                                @elseif ($profile->status == 'INACTIVE')
                                    <span class="badge bg-label-warning">{{ $profile->status }}</span>
                                @else
                                    <span class="badge bg-label-danger">{{ $profile->status }}</span>
                                @endif
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Role Structure:</span>
                                <span>{{ $profile->rs_name }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Role Access:</span>
                                <span>{{ $profile->ra_name }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Role:</span>
                                <span>{{ $profile->role_name }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Kontak:</span>
                                <span>{{ $profile->kontak }}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Alamat:</span>
                                <span>{{ $profile->alamat }}</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser"
                                data-bs-toggle="modal">Edit</a>
                            <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
            {{-- <!-- Plan Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <span class="badge bg-label-primary">Standard</span>
                        <div class="d-flex justify-content-center">
                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary fw-normal">$</sup>
                            <h1 class="mb-0 text-primary">99</h1>
                            <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/month</sub>
                        </div>
                    </div>
                    <ul class="ps-3 g-2 my-3">
                        <li class="mb-2">10 Users</li>
                        <li class="mb-2">Up to 10 GB storage</li>
                        <li>Basic Support</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center mb-1 fw-medium text-heading">
                        <span>Days</span>
                        <span>65% Completed</span>
                    </div>
                    <div class="progress mb-1" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span>4 days remaining</span>
                    <div class="d-grid w-100 mt-4">
                        <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade
                            Plan</button>
                    </div>
                </div>
            </div>
            <!-- /Plan Card --> --}}
        </div>
        <!--/ User Sidebar -->


        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item"><a class="nav-link" href="{{ url('profile') }}"><i
                            class="ti ti-user-check me-1 ti-xs"></i>Account</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                            class="ti ti-lock me-1 ti-xs"></i>Security</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ url('app/user/view/billing') }}"><i
                            class="ti ti-currency-dollar me-1 ti-xs"></i>Billing & Plans</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('app/user/view/notifications') }}"><i
                            class="ti ti-bell me-1 ti-xs"></i>Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('app/user/view/connections') }}"><i
                            class="ti ti-link me-1 ti-xs"></i>Connections</a></li> --}}
            </ul>
            <!--/ User Pills -->

            <!-- Change Password -->
            <div class="card mb-4">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
                    <form id="formChangePassword" class="row g-3" action="/profile/changePassword" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $profile->id }}">
                        <div class="alert alert-warning" role="alert">
                            <h5 class="alert-heading mb-2">Ensure that these requirements are met</h5>
                            <span>Minimum 4 characters long, uppercase & symbol</span>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                <label class="form-label" for="newPassword">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="newPassword" name="newPassword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>

                            <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/ Change Password -->

            {{-- <!-- Two-steps verification -->
            <div class="card mb-4">
                <h5 class="card-header pb-2">Two-steps verification</h5>
                <div class="card-body">
                    <span>Keep your account secure with authentication step.</span>
                    <h6 class="mt-3 mb-2">SMS</h6>
                    <div class="d-flex justify-content-between border-bottom mb-3 pb-2">
                        <span>+1(968) 945-8832</span>
                        <div class="action-icons">
                            <a href="javascript:;" class="text-body me-1" data-bs-target="#enableOTP"
                                data-bs-toggle="modal"><i class="ti ti-edit ti-sm"></i></a>
                            <a href="javascript:;" class="text-body"><i class="ti ti-trash ti-sm"></i></a>
                        </div>
                    </div>
                    <p class="mb-0">Two-factor authentication adds an additional layer of security to your account by
                        requiring more than just a password to log in.
                        <a href="javascript:void(0);" class="text-body">Learn more.</a>
                    </p>
                </div>
            </div> --}}
            <!--/ Two-steps verification -->

            {{-- <!-- Recent Devices -->
            <div class="card mb-4">
                <h5 class="card-header">Recent Devices</h5>
                <div class="table-responsive">
                    <table class="table border-top">
                        <thead>
                            <tr>
                                <th class="text-truncate">Browser</th>
                                <th class="text-truncate">Device</th>
                                <th class="text-truncate">Location</th>
                                <th class="text-truncate">Recent Activities</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate"><i class='ti ti-brand-windows text-info ti-xs me-2'></i> <span
                                        class="fw-medium">Chrome on Windows</span></td>
                                <td class="text-truncate">HP Spectre 360</td>
                                <td class="text-truncate">Switzerland</td>
                                <td class="text-truncate">10, July 2021 20:07</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class='ti ti-device-mobile text-danger ti-xs me-2'></i> <span
                                        class="fw-medium">Chrome on iPhone</span></td>
                                <td class="text-truncate">iPhone 12x</td>
                                <td class="text-truncate">Australia</td>
                                <td class="text-truncate">13, July 2021 10:10</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class='ti ti-brand-android text-success ti-xs me-2'></i>
                                    <span class="fw-medium">Chrome on Android</span>
                                </td>
                                <td class="text-truncate">Oneplus 9 Pro</td>
                                <td class="text-truncate">Dubai</td>
                                <td class="text-truncate">14, July 2021 15:15</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class='ti ti-brand-apple ti-xs me-2'></i> <span
                                        class="fw-medium">Chrome on MacOS</span></td>
                                <td class="text-truncate">Apple iMac</td>
                                <td class="text-truncate">India</td>
                                <td class="text-truncate">16, July 2021 16:17</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class='ti ti-brand-windows text-info ti-xs me-2'></i> <span
                                        class="fw-medium">Chrome on Windows</span></td>
                                <td class="text-truncate">HP Spectre 360</td>
                                <td class="text-truncate">Switzerland</td>
                                <td class="text-truncate">20, July 2021 21:01</td>
                            </tr>
                            <tr>
                                <td class="text-truncate border-bottom-0"><i
                                        class='ti ti-brand-android text-success ti-xs me-2'></i> <span
                                        class="fw-medium">Chrome on Android</span></td>
                                <td class="text-truncate border-bottom-0">Oneplus 9 Pro</td>
                                <td class="text-truncate border-bottom-0">Dubai</td>
                                <td class="text-truncate border-bottom-0">21, July 2021 12:22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Recent Devices --> --}}
        </div>
        <!--/ User Content -->
    </div>

    <!-- Modals -->
    @include('_partials/_modals/modal-edit-user')
    @include('_partials/_modals/modal-enable-otp')
    @include('_partials/_modals/modal-upgrade-plan')
    <!-- /Modals -->

@endsection
