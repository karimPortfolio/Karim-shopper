@if (Route::has('login'))
@auth
    <li class="d-flex justify-content-center align-items-center ml-4">
        <a style="color:grey;text-decoration:none; " href="{{ url('/dashboard') }}" class=" homeUserProfile ">
            @if (Auth::user()->profile_photo_url)
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url}}" alt="{{ Auth::user()->name }}" />
            @else
                @php
                    $name = Auth::user()->name;
                    $delimiter = ' ';
                    $name = explode($delimiter, $name);
                    $firstLetter = str_split($name[0]);
                    $secondLetter = str_split($name[1]);
                @endphp
                <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ $firstLetter[0] . '+' . $secondLetter[0] }}&color=014797&background=e0eaff" alt="{{ Auth::user()->name }}" />
            @endif
        </a>
    </li>
@else
    {{-- <li class="d-flex justify-content-center align-items-center ml-4"><a style="color:grey;text-decoration:none;" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li> --}}
    @if (Route::has('register'))
        {{-- <li class="d-flex justify-content-center align-items-center ml-4 "><a style="color:grey;text-decoration:none;" href="{{ route('register') }}" class="ml-4 text-sm btn btn-success signup-btn text-white d-flex justify-content-center align-items-center">Sign up</a></li> --}}
        <li class="d-flex justify-content-center align-items-center ml-4 "><a href="{{ route('register') }}" class=" signup-btn d-flex justify-content-center align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-perso mr-1" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
            </svg>
<<<<<<< HEAD
            Sign up</a></li>
=======
            Account</a></li>
>>>>>>> a988dfa482cd2369484291ac377cabea04843250
    @endif
@endauth
{{-- </div> --}}
@endif
