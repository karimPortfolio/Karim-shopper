<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
<link rel="stylesheet" href=" {{ asset('css/main.css') }} ">

<title>
    (@if(Auth::user()->unreadNotifications->count() > 0){{Auth::user()->unreadNotifications->count()}}@endif)
    Karim's Shopper | {{ Auth::user()->name }}
</title>

<x-app-layout>
    <div class="row w-100 m-0">

        <div class="px-2 px-md-3 col-2 col-sm-1 col-lg-3 vh-100 border-right dashboard_side_bar">
            <ul class="ps-lg-4">
                <li class="my-4 d-flex justify-content-center justify-content-lg-start">
                    <a href="/dashboard"
                        class="d-flex justify-content-center justify-content-lg-start align-items-center text-decoration-none pl-lg-4 ">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-columns-gap" viewBox="0 0 16 16">
                                <path
                                    d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                            </svg></span>
                        <span class="ml-3 d-none d-lg-inline-block">Dashbaord</span></a>
                </li>

                <li class="my-4 d-flex justify-content-center justify-content-lg-start">
                    @php
                        $user_id = Auth::user()->id;
                    @endphp
                    <a href="{{ route('dashboard.products')  }}"
                        class="d-flex justify-content-center justify-content-lg-start align-items-center text-decoration-none pl-lg-4 active">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path
                                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                            </svg></span>
                        <span class="ml-3 d-none d-lg-inline-block">Products</span></a>
                </li>
                <li class="my-4 d-flex justify-content-center justify-content-lg-start">
                    <a href="{{ route("dashboard.whishlist") }}"
                        class="d-flex justify-content-center justify-content-lg-start align-items-center text-decoration-none ps-lg-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>
                        <span class="ml-3 d-none d-lg-inline-block">Whishlist</span>
                    </a>
                </li>
                <li class="my-4 d-flex justify-content-center justify-content-lg-start">
                    <a href="{{ route("dashboard.orders") }}"
                        class="d-flex justify-content-center justify-content-lg-start align-items-center text-decoration-none pl-lg-4">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-cart-plus" viewBox="0 0 16 16">
                                <path
                                    d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg></span>
                        <span class="ml-3 d-none d-lg-inline-block">Orders</span></a>
                </li>
            </ul>
        </div>

        <div class="py-7 dashboard_part2 col-10 col-sm-11 px-0  col-lg-9">
            <div class="px-3 px-sm-5">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-2">
                    <div>
                        <h3 class="m-0 fw-bold d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-boxes me-2" viewBox="0 0 16 16">
                                <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                            </svg>
                            Products
                        </h3>
                        <p class="text-muted mb-0">
                            <i class="bi bi-info-circle me-1"></i>
                            Manage your product inventory
                        </p>
                    </div>

                    <div class="add_product">
                        <a href="{{ route('dashboard.manageProducts.addproduct') }}" 
                           class="btn btn-primary rounded-3 d-flex align-items-center py-2 px-3 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-plus-circle-fill me-2" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>
                            <span>Add new product</span>
                        </a>
                    </div>
                </div>

                {{-- <div class="bg-light p-3 rounded-3 border-start border-primary border-4 shadow-sm mb-4">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search me-2 text-primary" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        <span class="text-secondary">Search, filter and manage your product inventory</span>
                    </div>
                </div> --}}

                {{-- Flash messages --}}

                <div class="container w-100 flashMessages justify-content-center mt-3"
                    style="transition: all .5s ease-in-out">
                    @include('flashMessages.flash')
                </div>



                @php
                    $productsSeted = false;
                    if (!empty($userProducts[0])) {
                        $productsSeted = true;
                    }
                @endphp

                @if (!$productsSeted)
                    <div class="pt-5">
                        <h1 class="text-center mt-5" style="font-size: 27px">You have no products until now</h1>
                    </div>
                @endif

                @include("dashboard.dashboardProd.AllProducts")


            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>