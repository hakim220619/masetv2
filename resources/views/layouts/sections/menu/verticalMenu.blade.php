@php
    $configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    @if (!isset($navbarFull))
        <div class="app-brand demo">
            <a href="#" class="app-brand-link">
                <span class="app-brand-logo demo">
                    @include('_partials.macros', ['height' => 70, 'rounded'])
                </span>
                <span class="app-brand-text demo menu-text fw-bold">{{ Helper::aplikasi()->pemilik }}</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>
    @endif


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @foreach ($menuData[0]->menu as $menu)
            {{-- adding active and open class if child is active --}}

            {{-- menu headers --}}
            @if (isset($menu->menuHeader))
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ __($menu->menuHeader) }}</span>
                </li>
            @else
                {{-- active menu method --}}
                @php
                    $activeClass = null;
                    $currentRouteName = Route::currentRouteName();

                    if ($currentRouteName === $menu->slug) {
                        $activeClass = 'active';
                    } elseif (isset($menu->submenu)) {
                        if (gettype($menu->slug) === 'array') {
                            foreach ($menu->slug as $slug) {
                                if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                    $activeClass = 'active open';
                                }
                            }
                        } else {
                            if (
                                str_contains($currentRouteName, $menu->slug) and
                                strpos($currentRouteName, $menu->slug) === 0
                            ) {
                                $activeClass = 'active open';
                            }
                        }
                    }
                @endphp
                {{-- main menu --}}

                @if ($menu->role == Helper::getProfileById()->ra_name)
                    @isset($menu->role_name)
                        @if ($menu->role_name == Helper::getProfileById()->role_name)
                            <li class="menu-item {{ $activeClass }}">
                                <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}"
                                    class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}"
                                    @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                                    @isset($menu->icon)
                                        <i class="{{ $menu->icon }}"></i>
                                    @endisset
                                    <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
                                    @isset($menu->badge)
                                        <div class="badge bg-{{ $menu->badge[0] }} rounded-pill ms-auto">{{ $menu->badge[1] }}
                                        </div>
                                    @endisset
                                </a>

                                {{-- submenu --}}
                                @isset($menu->submenu)
                                    @include('layouts.sections.menu.submenu', ['menu' => $menu->submenu])
                                @endisset
                            </li>
                        @endif
                    @endisset

                    @if (isset($menu->role_name) == false)
                        <li class="menu-item {{ $activeClass }}">
                            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}"
                                class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}"
                                @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                                @isset($menu->icon)
                                    <i class="{{ $menu->icon }}"></i>
                                @endisset
                                <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
                                @isset($menu->badge)
                                    <div class="badge bg-{{ $menu->badge[0] }} rounded-pill ms-auto">{{ $menu->badge[1] }}
                                    </div>
                                @endisset
                            </a>

                            {{-- submenu --}}
                            @isset($menu->submenu)
                                @include('layouts.sections.menu.submenu', ['menu' => $menu->submenu])
                            @endisset
                        </li>
                    @endif
                @endif
            @endif
        @endforeach
    </ul>

</aside>
