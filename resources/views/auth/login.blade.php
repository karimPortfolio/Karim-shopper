<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<title>Login | Karim Shopper</title>

<style>
    body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    height: 100vh;
    margin: 0;
    overflow-x: hidden;
    overflow-y: hidden;
}
</style>

<x-guest-layout>
    <div class="login-container">
        <!-- Decorative shapes -->
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div clbass="shape shape-3"></div>

        <!-- Image Carousel -->
        <div class="carousel-container">
            <div class="carousel">
                <div class="carousel-slide active"
                    style="background-image: url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=85')">
                </div>
                <div class="carousel-slide"
                    style="background-image: url('https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=85')">
                </div>
                <div class="carousel-slide"
                    style="background-image: url('https://images.unsplash.com/photo-1573855619003-97b4799dcd8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=85')">
                </div>
                <div class="carousel-slide"
                    style="background-image: url('https://images.unsplash.com/photo-1607083206968-13611e3d76db?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=85')">
                </div>
                <div class="carousel-overlay"></div>
                <div class="carousel-content">
                    <h2>Shop with confidence</h2>
                    <p>Discover amazing products at competitive prices. Sign in to access your personalized shopping
                        experience.</p>
                </div>
                <div class="carousel-nav">
                    <div class="carousel-dot active"></div>
                    <div class="carousel-dot"></div>
                    <div class="carousel-dot"></div>
                    <div class="carousel-dot"></div>
                </div>
            </div>
        </div>

        <div class="login-form">
            <div class="card">
                <div class="logo-container">
                    <a href="/">
                        <img src="{{ asset('images/ecommerceLogo.png') }}" alt="Karim Shopper"
                            style="max-height: 60px; margin: 0 auto;">
                    </a>
                    <h1 style="margin-top: 1rem; font-size: 1.5rem; font-weight: 600; color: #334155;">Welcome Back</h1>
                    <p style="color: #64748b; font-size: 0.95rem;">Enter your credentials to access your account</p>
                </div>

                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="registrationForm">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <div class="input-with-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#64748b" class="input-icon" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                            <input id="email" class="form-input-enhanced" type="email" name="email" value="{{ old('email') }}"
                                required autofocus placeholder="your@email.com" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <div class="input-with-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#64748b" class="input-icon" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                            <input id="password" class="form-input-enhanced" type="password" name="password" required
                                autocomplete="current-password" placeholder="••••••••" />
                            <span id="eye_icons" class="password-toggle-enhanced">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-eye eye_show" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-eye-slash eye_hide" viewBox="0 0 16 16" style="display: none;">
                                    <path
                                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                    <path
                                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                    <path
                                        d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="remember-forgot">
                        <label for="remember_me" class="remember-me">
                            <x-jet-checkbox id="remember_me" name="remember" class="checkbox" />
                            <span class="text-sm">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="login-button">
                        {{ __('Sign In') }}
                    </button>
                </form>

                <div class="signup-link">
                    Don't have an account? <a href="/register">Sign up</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<script type="module" src="{{ asset('js/scripts/__auth.js') }}"></script>
