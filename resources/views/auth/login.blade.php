<link rel="stylesheet" href=" {{ asset('css/main.css') }} ">
<title>Login | Karim Shopper</title>

<x-guest-layout>
    <div class="register_card w-100 d-flex  justify-content-center align-items-center" >
        <div name="logo mb-4">
            <a class="navbar-brand" href="/" style="font-size: 26px;"><img src=" {{ asset('images/ecommerceLogo.png') }} " style="width: 150px;height:70px;" alt=""></a>
        </div>
        <div class=" mt-7 px-4 py-4 cards">
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="registrationForm" class="mt-2">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-2 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-start mt-4">

                    <x-jet-button class="">
                        {{ __('Login') }}
                    </x-jet-button>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm ml-4 text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                </div>
            </form>
            <p class="text-center dont_have_acc_para mt-7">D'ont have an account ? <a href="/register" >Sign in</a></p>
        </div>
    </div>
</x-guest-layout>


