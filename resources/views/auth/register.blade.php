<link rel="stylesheet" href=" {{ asset('css/main.css') }} ">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Sign up | Karim's Shopper</title>
@section('title' , ' Register | Karim Shopper')
<x-guest-layout>
    <div class="bg-white w-100 md:grid md:grid-cols-2 lg:grid-cols-3 signup_page_container">
         <div class="signup_images_slider hidden md:block">
              @include("auth.registerComp.imgSlider")
         </div>
         <div class="signup_form_container md:col-span-1 lg:col-span-2">
            <x-jet-authentication-card >
                <x-slot name="logo">
                    <a class="navbar-brand" href="/" style="font-size: 26px;"><img src=" {{ asset('images/ecommerceLogo.png') }} " style="width: 150px;height:70px;" alt=""></a>
                </x-slot>

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" id="registrationForm">
                    @csrf

                    <div class="flex justify-center items-center gap-3 w-full">
                        <div class="bg-transparent w-50">
                            <label for="name">First name</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="firstName" :value="old('name')" required autofocus autocomplete="name" placeholder="Your first name">
                        </div>
                        <div class="w-50">
                            <label for="name">Last name</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="lastName" :value="old('name')" required autofocus autocomplete="name" placeholder="Your last name">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="email">Email</label>
                        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Your Email">
                    </div>

                    <div class="mt-4">
                        <label for="password">Password</label>
                        <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Your password">
                    </div>

                    <div class="mt-4">
                        <label for="password_confirmation">Password confirmation</label>
                        <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                    </div>
                    <div class="d-none">
                        <input id="password_confirmation" class="block mt-1 w-full" type="password" value="User" name="role" required autocomplete="new-password" >
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-6 mb-3">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2" style="color: black;">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-start mt-6">
                        <button class="register_btn">Register</button>
                        <a class="underline ml-4 text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </x-jet-authentication-card>
         </div>
    </div>
</x-guest-layout>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
