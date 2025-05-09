@php
$containerNav = $configData['contentLayout'] === 'compact' ? 'container-xxl' : 'container-fluid';
$navbarDetached = $navbarDetached ?? '';

@endphp

<!-- Navbar -->
@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
<nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme"
    id="layout-navbar">
    @endif
    @if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="{{ $containerNav }}">
            @endif

            <!--  Brand demo (display only for navbar-full and hide on below xl) -->
            @if (isset($navbarFull))
            <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
                <a href="{{ url('/') }}" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        @include('_partials.macros', ['height' => 20])
                    </span>
                    <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
                </a>
            </div>
            @endif

            <!-- ! Not required for layout-without-menu -->
            @if (!isset($navbarHideToggle))
            <div
                class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="ti ti-menu-2 ti-sm"></i>
                </a>
            </div>
            @endif

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                @if ($configData['hasCustomizer'] == true)
                <!-- Style Switcher -->
                <div class="navbar-nav align-items-center">
                    <div class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <i class='ti ti-md'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                    <span class="align-middle"><i class='ti ti-sun me-2'></i>Light</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                    <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                    <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Style Switcher -->
                @endif

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Notification -->
                    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">
                            <i class="ti ti-bell ti-md"></i>
                            <span
                                class="badge bg-danger rounded-pill badge-notifications">{{ Helper::getCountNotifi()->total }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end py-0">
                            <li class="dropdown-menu-header border-bottom">
                                <div class="dropdown-header d-flex align-items-center py-3">
                                    <h5 class="text-body mb-0 me-auto">Notification</h5>
                                    <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                            class="ti ti-mail-opened fs-4"></i></a>
                                </div>
                            </li>

                            <li class="dropdown-notifications-list scrollable-container">
                                @forelse (Helper::notifications() as $a)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item">

                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <img src="{{ asset('') }}storage/images/users/{{ $a->image }}" alt
                                                        class="h-auto rounded-circle">
                                                </div>
                                            </div>
                                            <a href="/broadcast/aplikasiRead/{{ $a->uid }}" style="color: #534444;">
                                                <div class="flex-grow-1">

                                                    <h6 class="mb-1"><b>{{ $a->title }}</b></h6>
                                                    <p class="mb-0 " style="color: #8d8e90;">
                                                        @if (substr($a->keterangan, 0, 60) < 60)
                                                            {{ $a->keterangan }}
                                                            @else
                                                            {{ substr($a->keterangan, 0, 60) }}...
                                                            @endif
                                                            </p>

                                                            <small class="text-muted">{{ Helper::hitungJam($a->created_at) }}</small>
                                                </div>
                                            </a>
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                @if ($a->status == 'Delivered')
                                                <a href="/broadcast/aplikasiRead/{{ $a->uid }}"
                                                    class="dropdown-notifications-read"><span
                                                        class="badge badge-dot"></span></a>
                                                @else
                                                <a href="/broadcast/aplikasiRead/{{ $a->uid }}"
                                                    class="dropdown-notifications-read"></a>
                                                @endif
                                                {{-- <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a> --}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                @empty
                                <p>Data Kosong</p>
                                @endforelse
                            </li>

                            <li class="dropdown-menu-footer border-top">
                                <a href="javascript:void(0);"
                                    class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                                    View all notifications
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!--/ Notification -->
                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar-online">
                                <img width="30px" height="10px"
                                    src="{{ asset('') }}storage/images/logo/userss.jpg" alt
                                    class="h-auto rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item"
                                    href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0);' }}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class=" avatar-online">
                                                <img width="30px" height="30px"
                                                    src="{{ asset('') }}storage/images/users/{{ request()->user()->image }}"
                                                    alt class="h-auto rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-medium d-block">
                                                @if (Auth::check())
                                                {{ Auth::user()->nama }}
                                                @endif
                                            </span>
                                            <small class="text-muted">{{ Helper::getProfileById()->ra_name }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/profile">
                                    <i class="ti ti-user-check me-2 ti-sm"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                            </li>
                            {{-- @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures()) --}}
                            {{-- <li>
                    <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                            <i class='ti ti-key me-2 ti-sm'></i>
                            <span class="align-middle">API Tokens</span>
                            </a>
                    </li> --}}
                    {{-- @endif --}}
                    {{-- <li>
                    <a class="dropdown-item" href="javascript:void(0);">
                        <span class="d-flex align-items-center align-middle">
                            <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                            <span class="flex-grow-1 align-middle">Billing</span>
                            <span
                                class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                        </span>
                    </a>
                </li> --}}
                    {{-- @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures()) --}}
                    {{-- <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <h6 class="dropdown-header">Manage Team</h6>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li> --}}
                    {{-- <li> --}}
                    {{-- <a class="dropdown-item"
                        href="{{ Auth::user() ? route('teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">
                    <i class='ti ti-settings me-2'></i>
                    <span class="align-middle">Team Settings</span>
                    </a> --}}
                    {{-- </li> --}}
                    {{-- @can('create', Laravel\Jetstream\Jetstream::newTeamModel()) --}}
                    {{-- <li> --}}
                    {{-- <a class="dropdown-item" href="{{ route('teams.create') }}">
                    <i class='ti ti-user me-2'></i>
                    <span class="align-middle">Create New Team</span>
                    </a> --}}
                    {{-- </li> --}}
                    {{-- @endcan --}}
                    {{-- @if (Auth::user()->allTeams()->count() > 1) --}}
                    {{-- <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <h6 class="dropdown-header">Switch Teams</h6>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li> --}}
                    {{-- @endif --}}
                    @if (Auth::user())
                    {{-- @foreach (Auth::user()->allTeams() as $team) --}}
                    {{-- Below commented code read by artisan command while installing jetstream. !! Do not remove if you want to use jetstream. --}}

                    {{-- <x-switchable-team :team="$team" /> --}}
                    {{-- @endforeach --}}
                    @endif
                    {{-- @endif --}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    @if (Auth::check())
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='ti ti-logout me-2'></i>
                            <span class="align-middle">Logout</span>
                        </a>
                    </li>
                    <form method="GET" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                    @else
                    <li>
                        <a class="dropdown-item" href="{{ Route::has('login') ? route('login') : url('/') }}">
                            <i class='ti ti-login me-2'></i>
                            <span class="align-middle">Login</span>
                        </a>
                    </li>
                    @endif
                </ul>
                </li>
                <!--/ User -->
                </ul>
            </div>

            @if (!isset($navbarDetached))
        </div>
        @endif

    </nav>
    <!-- / Navbar -->