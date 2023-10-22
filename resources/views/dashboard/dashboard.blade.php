<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
<link rel="stylesheet" href=" {{ asset('css/main.css') }} ">
<title>Karim's Shopper | {{ Auth::user()->name }}</title>

<x-app-layout>

    <div class="row w-100 m-0">

        @include("dashboard.dashboardSideBar")

        <div class="col-10 col-sm-11 col-lg-9 dashboard_part2 py-7 px-4 px-sm-5">
            <h1 class="text-start">Welcome back, <span>{{ Auth::user()->name }}</span></h1>
            <p class="mt-3 dashboard_intro">Your analytics dashboard</p>

            @include('dashboard.dashboardAnalytics')

        </div>

    </div>

</x-app-layout>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>
<script src=" {{ asset('js/scripts/__dashboard.js') }} "></script>
<script type="module" src="{{ asset('js/main.js') }}"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
