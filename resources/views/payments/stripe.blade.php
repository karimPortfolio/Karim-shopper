{{-- @extends("Master_page")
@section("title" , "Payment | Karim Shopper")
@section('content')

@endsection --}}

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href=" {{asset('css/main.css')}} ">
        <title>Payments | Karim Shopper</title>
    </head>
    <body>

        <div class="container">
            <div class='row'>
                <h1>Laravel 9 How To Integrate Stripe Payment Gateway</h1>
                <div class='col-md-12'>
                    <div class="card">
                        <div class="card-header">
                        Laravel 9 How To Integrate Stripe Payment Gateway
                        </div>
                        <div class="card-body">
                        @if (Session::has('error'))
                            <font color="red">{{ Session::get('error') }}</font>
                        @endif
                        <form class="form-horizontal" method="post" id="payment-form" role="form" action="{!!route('addmoney.stripe')!!}" >
                            @csrf
                            <div class="mb-3">
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_no">
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class='control-label'>CVV</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvvNumber">
                                </div>
                                <div class="col-auto">
                                    <label class='control-label'>Expiration</label>
                                    <input class='form-control card-expiry-month' placeholder='MM' size='4' type='text' name="ccExpiryMonth">
                                </div>
                                <div class="col-auto">
                                    <label class='control-label'>Year</label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="ccExpiryYear">
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='hidden' name="amount" value="300">
                                </div>
                            </div>

                            <div class="mb-3" style="padding-top:20px;">
                                <h5 class='total' >Total:<span class='amount'>$10</span></h5>
                            </div>

                            <div class="mb-3">
                                <button class='form-control btn btn-success submit-button' type='submit' >Pay</button>
                            </div>

                            <div class="mb-3">
                                <div class='alert-danger alert' style="display:none;">
                                        Please correct the errors and try again.
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="{{ asset("js/main.js") }}"></script>
    </body>
</html>



