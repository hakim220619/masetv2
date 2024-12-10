@php
    $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Register Basic - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/pages-auth.js'])
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y ">
            <div class="authentication-inner py-4 ">
                <!-- Register Card -->
                <div class="row">
                    <div class="card mb-12">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center mb-4 mt-2">
                                <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                    <img src="{{ asset('') }}storage/images/logo/{{ Helper::aplikasi()->logo }}"
                                        alt="" width="72" height="52">
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h4 class="app-brand justify-content-center mb-4 mt-2">Adventure starts here 🚀</h4>
                            <p class="app-brand justify-content-center mb-4 mt-2">Make your app management easy and fun!</p>

                            <form id="formAuthentication" class="mb-3 row" action="{{ url('/auth/register') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="nik" class="form-label">Nik</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        onchange="chekNikAktif(this.value)" placeholder="Enter your Nik" autofocus
                                        value="{{ old('nik') }}">
                                    <span class="invalid-feedback" id="notifNik"></span>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Enter your name" autofocus>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        onchange="chekEmailAktif(this.value)" placeholder="Enter your email">
                                    <span class="invalid-feedback" id="notifEmail"></span>
                                </div>
                                <div class="mb-3 col-12 col-md-6 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            value="{{ old('password') }}"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="role_structure">Entitas</label>
                                    <select id="role_structure" name="role_structure" class="select3 form-select"
                                        aria-label="Default select example" onchange="changeRole()">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach ($role_structure as $r)
                                            <option value="{{ $r->rs_id }}">
                                                {{ $r->rs_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="Jl hr**"
                                        name="image" aria-label="Jl hr**" />
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="kontak">Kontak</label>
                                    <input type="text" id="kontak" name="kontak" class="form-control phone-mask"
                                        maxlength="15"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                        placeholder="+62 8579" aria-label="john.doe@example.com" value="{{ old('kontak') }}"
                                        onchange="chekKontakAktif(this.value)" />

                                    <span class="invalid-feedback" id="notifKontak"></span>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Jl hr**"
                                        value="{{ old('alamat') }}" name="alamat" aria-label="Jl hr**" />
                                </div>

                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms-conditions"
                                            name="terms">
                                        <label class="form-check-label" for="terms-conditions">
                                            I agree to
                                            <a href="javascript:void(0);">privacy policy & terms</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="demo-inline-spacing">
                                    <div class="hideButtonSend">
                                        <button type="submit" class="btn btn-primary" id="signup" disabled>
                                            </span><i class="fa-regular fa-paper-plane me-1"></i>
                                            Sign up</button>
                                        <button type="button" class="btn btn-danger" onclick="refreshAll()"><span
                                                class="fa-solid fa-arrows-rotate me-1"></span>Refresh</button>
                                    </div>

                                    <div class="showButtonSend" hidden><button class="btn btn-primary" type="button"
                                            disabled>
                                            <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                        &nbsp;<button type="button" class="btn btn-danger" onclick="refreshAll()"><span
                                                class="fa-solid fa-arrows-rotate me-1"></span>Refresh</button></div>



                                </div>
                                {{-- <button class="btn btn-primary d-grid w-100" type="submit" disabled>
                                    Sign up
                                </button> --}}
                            </form>

                            <p class="text-center">
                                <span>Already have an account?</span>
                                <a href="{{ url('/') }}">
                                    <span>Sign in instead</span>
                                </a>
                            </p>

                            {{-- <div class="divider my-4">
                                <div class="divider-text">or</div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                                    <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                                </a>

                                <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                                    <i class="tf-icons fa-brands fa-google fs-5"></i>
                                </a>

                                <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                                    <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Register Card -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function refreshAll() {
            $('#nik').val('');
            $('#name').val('');
            $('#email').val('');
            $('#kontak').val('');
            $('#password').val('');
            $('#role_structure').val('');
            $('#image').val('');
            $('#alamat').val('');
            $('#signup').attr('disabled', true)
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
                        $('#signup').attr('disabled', true)
                    } else {
                        $('#notifEmail').html('')
                        if ($('#nik').val() !== '') {
                            $('#signup').attr('disabled', false)
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
                        $('#signup').attr('disabled', true)
                    } else {
                        $('#notifNik').html('')
                        if ($('#email').val() !== '') {
                            $('#signup').attr('disabled', false)
                        }

                    }
                }
            });

        }

        function chekKontakAktif(kontak) {
            // console.log(nik);
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
                        $('#signup').attr('disabled', true)
                    } else {
                        $('#notifKontak').html('')
                        if ($('#email').val() !== '' && $('#nik').val() !== '') {
                            $('#signup').attr('disabled', false)
                        }

                    }
                }
            });

        }
    </script>
@endsection
