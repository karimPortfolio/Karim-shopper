@if (Route::has('login'))
    @auth
        <li class="nav-item dropdown user-profile-container">
            <a class="nav-link dropdown-toggle user-profile-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar-container">
                    @if (Auth::user()->profile_photo_url)
                        <img class="avatar-image" src="{{ Auth::user()->profile_photo_url}}" alt="{{ Auth::user()->name }}" />
                    @else
                        @php
                            $name = Auth::user()->name;
                            $nameParts = explode(' ', $name);
                            $initials = isset($nameParts[1]) 
                                ? substr($nameParts[0], 0, 1) . substr($nameParts[1], 0, 1) 
                                : substr($nameParts[0], 0, 1);
                        @endphp
                        <img class="avatar-image" src="https://ui-avatars.com/api/?name={{ $initials }}&color=ffffff&background=7C3AED" alt="{{ Auth::user()->name }}" />
                    @endif
                    <div class="avatar-status-indicator"></div>
                </div>
                <span class="user-name d-none d-md-inline ml-2">{{ Str::limit(Auth::user()->name, 12) }}</span>
            </a>
            <div class="dropdown-menu user-dropdown shadow-lg" aria-labelledby="userDropdown">
                <div class="dropdown-header pb-3">
                    <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                    <small class="d-block text-muted">{{ Auth::user()->email }}</small>
                </div>
                <button class="dropdown-item d-flex align-items-center py-2 border-0 transition-effect" onclick="window.location.href='{{ url('/dashboard') }}'">
                    <i class="fas fa-gauge-high mr-3 text-purple-600"></i> 
                    <span>Dashboard</span>
                </button>
                <button class="dropdown-item d-flex align-items-center py-2 border-0 transition-effect" onclick="window.location.href='{{ route('profile.show') }}'">
                    <i class="fas fa-user-circle mr-3 text-purple-600"></i> 
                    <span>Profile</span>
                </button>
                <div class="dropdown-divider my-2"></div>
                <form method="POST" action="{{ route('logout') }}" class="w-100">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center py-2 border-0 text-danger transition-effect">
                        <i class="fas fa-sign-out-alt mr-3"></i> 
                        <span>Sign out</span>
                    </button>
                </form>
            </div>
        </li>
    @else
        <li class="nav-item auth-buttons d-flex gap-2">
            @if (Route::has('register'))
                <button class="btn rounded-pill px-4 py-2 border-0 d-flex align-items-center sign-up-btn" onclick="window.location.href='{{ route('register') }}'">
                    <span class="btn-icon d-inline-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 24 24" class="me-1">
                            <path d="M12 6c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0 8c3.866 0 7 1.343 7 3v1h-14v-1c0-1.657 3.134-3 7-3zm7-8h3v2h-3v3h-2v-3h-3v-2h3v-3h2v3z" fill-rule="evenodd" clip-rule="evenodd"/>
                        </svg>
                    </span>
                    <span>Sign up</span>
                </button>
            @endif
        </li>
    @endauth
@endif
