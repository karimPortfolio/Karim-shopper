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
                        class="d-flex justify-content-center justify-content-lg-start align-items-center text-decoration-none pl-lg-4 ">
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
                        class="d-flex justify-content-center justify-content-lg-start align-items-center text-decoration-none ps-lg-4 active">
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

        <div class=" dashboard_part2 col-10 col-sm-11  col-lg-9">
            <div class="px-3 px-sm-5">

                <div class="container w-100 flashMessages justify-content-center mt-4"
                    style="transition: all .5s ease-in-out">
                    @include('flashMessages.flash')
                </div>

                <div>
                    <h3 class="m-0 fw-bold d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                            class="bi bi-box2-heart" viewBox="0 0 16 16">
                            <path d="M8 7.982C9.664 6.309 13.825 9.236 8 13 2.175 9.236 6.336 6.31 8 7.982" />
                            <path
                                d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zm0 1H7.5v3h-6zM8.5 4V1h3.75l2.25 3zM15 5v10H1V5z" />
                        </svg>
                        Whishlist
                    </h3>
                    <p class="text-muted mb-0">
                        Manage your whishlist products
                    </p>
                </div>


                @php
                    $productsSeted = false;
                    if (!empty($whishlistProducts[0])) {
                        $productsSeted = true;
                    }
                @endphp

                @if (!$productsSeted)
                    <h1 class="text-center" style="font-size: 27px">Your whishlist is empty</h1>
                @endif

                @include("dashboard.dashboardProd.WhishlistProducts")


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