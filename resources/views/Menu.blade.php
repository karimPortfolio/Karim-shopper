<div class="news_bar py-2">
    <div class="row w-100 m-0 justify-content-between px-5">
        <div class="col-md-6 d-flex justify-content-center justify-content-md-start align-items-center pl-md-5">
            <i class="fas fa-shipping-fast text-white"></i>
            <p class="mb-0 ml-2 text-white">Shipping in 3 days</p>
        </div>
         <div class="col-md-6 d-none d-md-flex justify-content-end align-items-center pr-5">
            <i class="fas fa-headphones  text-white"></i>
            <p class="mb-0 ml-2 text-white">Online support 24/7</p>
         </div>
    </div>
</div>
<nav id="navbar" class="d-none d-lg-flex navbar navbar-expand-lg navbar-light px-5 ">
     <div class="d-flex justify-content-start align-items-center w-100 mx-5">
        <a class="navbar-brand" href="/" style="font-size: 26px;"><img src=" {{ asset('images/ecommerceLogo.png') }} " style="width: 100px;height:50px;" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="w-100 navCollapse" >
          <ul class="navbar-nav d-flex justify-content-center align-items-center w-100">
            <li class="nav-item">
              <a class="nav-link" style="transition:all .5s ease-in-out;" href="/">Home</a>
            </li>
            <li class="nav-item ml-4">
                 <!--<a class="nav-link ml-4" style="transition:all .5s ease-in-out;" href="/produits/Fruits&Vegetables">Shop</a> -->
                 @include('homeComp.navbarComp.CategoriesDropdown')
            </li>
            <li class="nav-item ml-4">
                <a class="nav-link text-black" style="transition:all .5s ease-in-out;" href="">Shop</a>
            </li>
            <li class="ml-auto search_icon mr-4">

                  @include("homeComp.navbarComp.search")
            </li>
            <li class="mx-4 nav-cart-icon d-flex justify-content-center align-items-center pt-2">
                  <a href="/cart" style="text-decoration: none !important" >
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                      @if ($numProducts[0]->num_products > 0)
                         @if ($numProducts[0]->num_products >= 100 )
                             <span class="badge badge-pill badge-danger">+99</span>
                         @else
                             <span class="badge badge-pill badge-danger">{{ $numProducts[0]->num_products }}</span>
                         @endif
                      @endif
                  </a>
            </li>

            @include("homeComp.navbarComp.accountBtn")

          </ul>
      </div>
     </div>
     <div class="search search_close">
        <div class="close_search_bar d-flex justify-content-end pt-4 pr-4 mb-4">
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
        <div class="pt-3">
            <p class="text-center d-flex justify-content-center align-items-center">
                To close search bar press:
                <span class="shortcuts-letters d-flex justify-content-center align-items-center ml-3">
                    <span>esc</span>
                </span>
            </p>
        </div>

    </div>
</nav>



