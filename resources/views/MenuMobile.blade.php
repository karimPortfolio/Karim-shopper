
<nav id="navbar_mob" class="d-flex justify-content-center align-items-center d-lg-none py-2 px-2 px-sm-5">

        <div class="mob_nav_hamburger">
               <div class="hamburger_menu d-flex justify-content-center align-items-center flex-column">
                    <span></span>
                    <span></span>
                    <span></span>
               </div>
        </div>

        <div class="logo mx-auto">
             <a href="/"><img src=" {{ asset('images/ecommerceLogo.png') }} " style="width: 100px;height:50px;" alt=""></a>
        </div>

        <div id="nav_collapse" class="all-app-navs-close d-flex justify-content-start align-items-start">
            <div class="logo_close_icon d-flex justify-content-center align-items-center px-4 w-100">
                 <div class="logo mr-auto">
                      <a href="/"><img src="{{ asset("images/ecommerceLogo.png") }}" alt="Karim Shopper Logo"></a>
                 </div>
                 <div class="close_icon d-flex justify-content-center align-items-center">
                       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                         <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                 </div>
            </div>
            <hr class="nav_hr">
            <ul class="navbar-nav d-flex justify-content-start align-items-start w-100">
                @if (Route::has('login'))
                @auth
                    <li class="d-flex dashboard_link justify-content-start align-items-center pb-4 ml-4">
                        <a style="color:grey;text-decoration:none;" href="{{ url('/dashboard') }}" class="" >
                            <button class="homeUserProfile p-0">
                                <img class="rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </a>
                        <a href="/dashboard" class="ml-3 text-decoration-none text-dark">
                            <p class="mb-1"> {{ Auth::user()->name }} </p>
                            <p class="mb-0 text-secondary" style="font-size:15px"> {{ Auth::user()->email }} </p>
                        </a>
                    </li>
                @else
                    <div class="nav_auth d-flex justify-content-center align-items-center mb-4">
                         <li class="d-flex justify-content-center align-items-center ml-4"><a style="color:grey;text-decoration:none;" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline ">Log in</a></li>
                         @if (Route::has('register'))
                             <li class="d-flex justify-content-center align-items-center ml-5"><a style="color:grey;text-decoration:none;" href="{{ route('register') }}" class="ml-lg-4 text-sm btn btn-success signup-btn text-white d-flex justify-content-center align-items-center">Sign up</a></li>
                         @endif
                    </div>
                @endauth
            {{-- </div> --}}
             @endif
                <li class="nav-item ml-4">
                  <a class="nav-link" style="transition:all .5s ease-in-out;" href="/">Home</a>
                </li>
                <li class="nav-item mt-4 ml-4">
                     <!--<a class="nav-link ml-4" style="transition:all .5s ease-in-out;" href="/produits/Fruits&Vegetables">Shop</a> -->
                     <div class="dropdown">
                        <a class="text-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                          Categories
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item text-dark" href="products/Smartphones&Tablets">Smartphones</a>
                            <a class="dropdown-item" href="products/Smartphones&Tablets">Tablets</a>
                            <a class="dropdown-item" href="products/Laptops&Consoles">Laptops</a>
                            <a class="dropdown-item" href="products/Laptops&Consoles">Consoles</a>
                            <a class="dropdown-item" href="products/Headphones&Accessories">Headphones</a>
                            <a class="dropdown-item" href="products/Headphones&Accessories">Accessories</a>
                        </div>
                      </div>
                </li>
                <li class="nav-item mt-4 ml-4">
                    <a class="nav-link" style="transition:all .5s ease-in-out;" href="">Shop</a>
                </li>
                <li class="mx-4 nav-item nav-cart-icon d-flex justify-content-start align-items-start  mt-4 ml-4">
                    <span>Your cart:</span>
                    <a href="/cart" class="ml-4 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        @if ($numProducts[0]->num_products > 0)
                         <span class="badge badge-pill badge-danger">{{ $numProducts[0]->num_products }}</span>
                         @if ($numProducts[0]->num_products >= 100 )
                             <span class="badge badge-pill badge-danger">+99</span>
                         @endif
                       @endif
                    </a>
                </li>

               <div class="mob_nav_socials mt-5 d-flex justify-content-center align-items-center ml-4">
                     <p class="m-0">Follow us</p>
                     <ul style="position: relative;top:0;" class="d-flex justify-content-center align-items-center pt-2">
                          <li>
                              <a href="https://www.instagram.com/ballaa.karim/" target="_blank">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                  </svg>
                              </a>
                          </li>
                          <li class="ml-3" >
                              <a href="https://www.instagram.com/ballaa.karim/" target="_blank">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                  </svg>
                              </a>
                          </li>
                          <li class="ml-3" >
                              <a href="https://www.instagram.com/ballaa.karim/" target="_blank">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                                  </svg>
                              </a>
                          </li>
                     </ul>
               </div>

              </ul>
        </div>

        <div class="search2 search_close2">
            <div class="close_search_bar2 d-flex justify-content-end pt-4 pr-4 mb-4">
                <i class="fa-sharp fa-solid fa-xmark"></i>
            </div>
            <h1 class="text-center">Search for something</h1>
            <form action="{{ route("search") }}" method="post">
                 @csrf
                 <div class="d-flex justify-content-center mt-4">
                      <input type="search" name="search" class="form-control" placeholder="Example:MacBook Air M2">
                      <button  class="ml-4 btn btn-success"><i class="fa-sharp fa-solid fa-magnifying-glass mr-2"></i>Search</button>
                 </div>
            </form>

        </div>

        <div class="nav_icons search_icon2 d-flex justify-content-center align-items-center">
            <div class="ml-auto  mr-4 pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </div>
        </div>



</nav>
<script type="module" src="{{ asset("js/main.js") }}"></script>

