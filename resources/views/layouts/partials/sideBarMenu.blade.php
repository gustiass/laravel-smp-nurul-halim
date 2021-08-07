<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="nav-link {{ request()->routeIs('home') == 'home' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('informasi.index') }}"
                class="nav-link {{ request()->segment(1) == 'informasi' ? 'active' : '' }}">
                <i class="nav-icon fas fa-info"></i>
                <p>
                    Informasi
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('guru.index') }}"
                class="nav-link {{ request()->segment(1) == 'guru' ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Guru
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('kegiatan.index') }}"
                class="nav-link {{ request()->routeIs('kegiatan') == 'kegiatan' ? 'active' : '' }}">
                <i class="nav-icon fas fa-random"></i>
                <p>
                    Kegiatan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('galeri.index') }}"
                class="nav-link {{ request()->segment(1) == 'galeri' ? 'active' : '' }}">
                <i class="nav-icon fas fa-images"></i>
                <p>
                    Galeri
                </p>
            </a>
        </li>

        @role('admin')
        <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link {{ request()->routeIs('setting.index') == 'setting.index' ? 'active' : '' }}">
                <i class="fas fa-cog nav-icon   "></i>
                <p>
                    Settings
                </p>
            </a>
        </li>
        @endrole

        <li class="nav-item">
            <a href="{{ route('profile.show', Auth::user()->id) }}" class="nav-link {{ request()->routeIs('profile.show') == 'profile.show' ? 'active' : '' }}">
                <i class="fas fa-user-ninja nav-icon   "></i>
                <p>
                    Profile
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt text-cyan   "></i>
                <p>
                    Logout
                </p>
                {{-- {{ __('Logout') }} --}}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
