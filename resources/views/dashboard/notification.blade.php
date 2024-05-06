
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
<link rel="stylesheet" href=" {{ asset('css/main.css') }} ">
<title>
    @if(Auth::user()->unreadNotifications->count() > 0) ({{Auth::user()->unreadNotifications->count()}})@endif
    Karim's Shopper | {{ Auth::user()->name }}
</title>

<x-app-layout>

    <div class="row w-100 m-0 py-5 notification_details">

        <div class="col-12 pt-3 pb-5">
            <h1 class="text-center"> {{ $notification->data['subject'] }} </h1>
        </div>

        <div class="product_img col-lg-5 pt-4">
            @if (!empty($product->image))
                <img class="w-100 bg-white" style="height:300px;object-fit:contain;" src="{{asset('images/products/'.$product->image)}}" alt="">
            @else
                <img class="w-100 bg-white" style="height:300px;object-fit:cover;" src="{{asset('images/products/imgplaceholder.png')}}" alt="">
            @endif
        </div>
        <div class="product_img col-lg-7 pt-4 sm:px-20 md:px-32 lg:pl-0">
            <div class="notification_info">
                <h3>Notification details:</h3>
                <p class="mt-3"> {{ $notification->data['content'] }} </p>
            </div>
            <div class="product_info mt-4">
                <h3>Product details</h3>
                <p class="mt-3">Category: {{ $product->category }}</p>
                <p class="mt-1">Product: {{ $product->product_name }} </p>
                <p class="mt-1">Price: {{ $product->price }}$ </p>
                <p class="mt-1">Quantity: {{ $notification->data['quantity'] }} </p>
            </div>
            <div class="buyer_info mt-4">
                <h3>Buyer details</h3>
                <p class="mt-3"> {{ $buyer->name }} </p>
                <p class="mt-1"> Joined since {{ \Carbon\Carbon::parse($buyer->created_at)->format('d M Y') }} </p>
            </div>
            <div class="payments_info mt-4">
                <h3>Payments details</h3>
                <p class="mt-3">Purchase date: {{ \Carbon\Carbon::parse($notification->created_at)->format('d M Y H:i') }}</p>
                <p class="mt-1">Payments method: Stripe payments</p>
                <p class="mt-1">Credit card: {{ $notification->data['paymentsMethod'] }} </p>
            </div>
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
<script type="module" src="{{ asset('js/main.js') }}"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>



