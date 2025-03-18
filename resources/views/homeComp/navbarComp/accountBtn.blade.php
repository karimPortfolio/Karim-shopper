@if (Route::has('login'))
    @auth
        <li class="nav-item dropdown user-profile-container">
            <a class="nav-link dropdown-toggle user-profile-link d-flex align-items-center" href="#" id="userDropdown"
                role="button" style="gap:6px !important;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar-container">
                    @if (Auth::user()->profile_photo_url)
                        <img class="avatar-image rounded-circle border-2 border-purple-200" width="40" height="40"
                            src="{{ Auth::user()->profile_photo_url}}" alt="{{ Auth::user()->name }}" />
                    @else
                        @php
                            $name = Auth::user()->name;
                            $nameParts = explode(' ', $name);
                            $initials = isset($nameParts[1])
                                ? substr($nameParts[0], 0, 1) . substr($nameParts[1], 0, 1)
                                : substr($nameParts[0], 0, 1);
                        @endphp
                        <img class="avatar-image rounded-circle border-2 border-purple-200" width="40" height="40"
                            src="https://ui-avatars.com/api/?name={{ $initials }}&color=ffffff&background=7C3AED"
                            alt="{{ Auth::user()->name }}" />
                    @endif
                </div>
                <span class="user-name d-none d-md-inline fw-medium">{{ Str::limit(Auth::user()->name, 12) }}</span>
            </a>
            <div class="dropdown-menu user-dropdown shadow-lg border-0 rounded-3 p-0" style="min-width: 280px;"
                aria-labelledby="userDropdown">
                <div class="dropdown-header p-2 border-bottom">
                    <div class="d-flex align-items-center gap-2" style="gap:6px !important;">
                        <div class="avatar-container">
                            @if (Auth::user()->profile_photo_url)
                                <img class="rounded-circle" width="40" height="40" src="{{ Auth::user()->profile_photo_url}}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                <img class="rounded-circle" width="40" height="40"
                                    src="https://ui-avatars.com/api/?name={{ $initials }}&color=ffffff&background=7C3AED"
                                    alt="{{ Auth::user()->name }}" />
                            @endif
                        </div>
                        <div>
                            <h6 class="mb-0 fw-semibold">{{ Auth::user()->name }}</h6>
                            <p class="text-muted small mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-2">
                    <button class="dropdown-item d-flex align-items-center px-3 py-2.5 transition-all duration-200 hover:bg-purple-50 mb-1"
                        onclick="window.location.href='{{ url('/dashboard') }}'">
                        <i class="fas fa-gauge-high text-purple-600 text-lg"></i>
                        <span class="font-medium ml-3">Dashboard</span>
                    </button>
                    <button class="dropdown-item d-flex align-items-center px-3 py-2.5 transition-all duration-200 hover:bg-purple-50 mb-1"
                        onclick="window.location.href='{{ route('profile.show') }}'">
                        <i class="fa-solid fa-user-gear text-purple-600 text-lg"></i>
                        <span class="font-medium ml-3">Profile</span>
                    </button>
                    <div class="dropdown-divider my-2 opacity-25"></div>
                    <form method="POST" action="{{ route('logout') }}" class="w-100 px-1">
                        @csrf
                        <button type="submit"
                            class="dropdown-item d-flex align-items-center px-3 py-2.5 duration-200 text-danger w-full">
                            <i class="fas fa-sign-out-alt text-lg"></i>
                            <span class="font-medium ml-3">Sign out</span>
                        </button>
                    </form>
                </div>
            </div>
        </li>
    @else
        <li class="nav-item auth-buttons d-flex gap-2">
            @if (Route::has('register'))
                <button class="btn rounded-pill px-4 py-2 border-0 d-flex align-items-center sign-up-btn"
                    onclick="window.location.href='{{ route('register') }}'">
                    <span class="btn-icon d-inline-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 24 24"
                            class="me-1">
                            <path
                                d="M12 6c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0 8c3.866 0 7 1.343 7 3v1h-14v-1c0-1.657 3.134-3 7-3zm7-8h3v2h-3v3h-2v-3h-3v-2h3v-3h2v3z"
                                fill-rule="evenodd" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span>Sign up</span>
                </button>
            @endif
        </li>
    @endauth
@endif