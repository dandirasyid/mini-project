<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
</head>

<body>
    <div class="d-flex">
        <div class="text-white position-fixed h-100" style="width: 250px; background-color: black; overflow-y: auto;">
            <nav class="nav flex-column">
                <div class="mb-4 mt-4 mx-1">
                    <a href="{{ route('profile') }}" class="d-flex text-white" style="text-decoration: none;">
                        <div class="d-flex align-items-center">
                            @if(auth()->check() && auth()->user()->image)
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="user_profile" class="rounded-circle" width="50px">
                            @else
                                <img src="{{ asset('images/logo-medsos.png') }}" alt="user_profile" class="rounded-circle" width="50px">
                            @endif
                        </div>
                        <div style="margin-left: 1rem;">
                            @if (Auth::user())
                            <p class="mb-0 fw-bold">{{ Auth::user()->username }}</p>
                            <p class="mb-0">{{ Auth::user()->name }}</p>
                            @else
                            <p class="mb-0 fw-bold">Silahkan Login Dahulu</p>
                            <p class="mb-0">Ayo Login</p>
                            @endif
                        </div>
                    </a>
                </div>
                <div class="border-bottom border-secondary"></div>
                @if (Auth::check())
                <a id="beranda" class="nav-link text-white d-flex align-items-center mt-3" href="{{ route('home') }}" onclick="setActive('beranda')">
                    <i class="bi bi-house-door-fill" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Beranda</span>
                </a>
                <a id="explore" class="nav-link text-white d-flex align-items-center mt-2" href="{{ route('search') }}" onclick="setActive('explore')">
                    <i class="bi bi-search" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Explore</span>
                </a>
                <a id="notifikasi" class="nav-link text-white d-flex align-items-center mt-2" href="{{ route('notifikasi.all') }}" onclick="setActive('notifikasi')">
                    <i class="bi bi-bell-fill" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Notifikasi</span>
                </a>
                <a id="posting" class="nav-link text-white d-flex align-items-center mt-2" href="{{ route('posting') }}" onclick="setActive('posting')">
                    <i class="bi bi-plus-lg" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Posting</span>
                </a>
                <a id="bookmarks" class="nav-link text-white d-flex align-items-center mt-2" href="{{ route('bookmark') }}" onclick="setActive('bookmarks')">
                    <i class="bi bi-bookmark-fill" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Bookmarks</span>
                </a>
                <a id="logout" class="nav-link text-white d-flex align-items-center mt-2" href="{{ route('logout') }}" onclick="setActive('logout')">
                    <i class="bi bi-arrow-left" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Logout</span>
                </a>
                @else
                <a id="beranda" class="nav-link text-white d-flex align-items-center mt-3" href="{{ route('home') }}" onclick="setActive('beranda')">
                    <i class="bi bi-house-door-fill" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Beranda</span>
                </a>
                <a id="explore" class="nav-link text-white d-flex align-items-center mt-2" href="{{ route('search') }}" onclick="setActive('explore')">
                    <i class="bi bi-search" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Explore</span>
                </a>
                <a id="logout" class="nav-link text-white d-flex align-items-center mt-2" href="{{ route('logout') }}" onclick="setActive('logout')">
                    <i class="bi bi-arrow-left" style="font-size: 1.2rem; margin-right: 1rem; color: #3F9AA8;"></i><span>Logout</span>
                </a>
                @endif
            </nav>
            <p class="text-secondary position-absolute bottom-0 left-0 mb-3 mx-2 text-center" style="font-size: 10px;">Term Of Service Privacy Policy Cookie Policy Accessibility Ads Info More &#169; 2024 Sosmed</p>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
</body>

</html>