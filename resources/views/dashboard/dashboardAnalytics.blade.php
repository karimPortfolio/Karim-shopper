<div class="dashboard_analytics pt-5">
    <div class="row justify-content-start gap-20">
        <div class="col-md-5 col-lg-3 analytics_cards">
            <h5 class="mt-3">Total products</h5>
            <div>
                <p class="mb-0 mt-2"> {{ $totalProducts }} </p>
            </div>
            @php
                $user_id = Auth::user()->id;
            @endphp
            <a href="{{ route('dashboard.products') }}">View</a>
        </div>
        <div class="col-md-5 col-lg-3 analytics_cards mt-4 mt-md-0">
            <h5 class="mt-3">Total sales</h5>
            <div>
                <p class="mb-0 mt-2"> {{ $purchaces }} </p>
            </div>
            <a href="/">View</a>
        </div>
        <div class="col-md-5 col-lg-3 analytics_cards mt-4 mt-lg-0">
            <h5 class="mt-3">Total earnings</h5>
            <div>
                @if (count($earnings) > 0)
                    <p class="mb-0 mt-2"> ${{ $earnings[0]->earnings }} </p>
                @else
                    <p class="mb-0 mt-2">$0</p>
                @endif
            </div>
            <a href="/">View</a>
        </div>

        <div class="col-md-5 mr-1 col-lg-3 analytics_cards mt-4">
            <h5 class="mt-3">Total purchaces</span></h5>
            <div>
                <p class="mb-0 mt-2"> {{ $purchacesBuyer }} </p>
            </div>
            <a href="/">View</a>
        </div>

        <div class="col-md-5 mr-1 col-lg-3 analytics_cards mt-4">
            <h5 class="mt-3">Total orders</span></h5>
            <div>
                <p class="mb-0 mt-2"> {{ $orders }} </p>
            </div>
            <a href="dashboard/orders">View</a>
        </div>

    </div>
</div>
