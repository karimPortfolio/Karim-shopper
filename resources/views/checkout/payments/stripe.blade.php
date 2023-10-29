@extends('Master_page')
@section('title', 'Payment | Karim Shopper')
@section('content')
    <div class="container payments">
        <div class='row'>
            <div class="col-12 py-4">
                <h1 class="text-success">Payments</h1>
            </div>
            <div class='col-md-12 col-lg-7 order-1 order-lg-0 mt-4 mt-lg-0'>
                <div class="card">

                    <div class="card-body">
                        @if (Session::has('error'))
                            <font color="red">{{ Session::get('error') }}</font>
                        @endif
                        <form class="form-horizontal" method="post" id="payment-form" action="{{ url("payments/check") }}">
                            @method("POST")
                            @csrf
                            <div class="mb-3">
                                <label class='control-label m-0'>Card Number</label>
                                <br>
                                <small class="text-secondary">Enter the 16-digit card number on the card</small>
                                <div class="mt-2 d-flex justify-content-start align-items-center">
                                    <img src="{{ asset("images/creditCards/visa.jpeg") }}" alt=" " class="creditCardVisa">
                                    <img src="{{ asset("images/creditCards/masterCard.png") }}" alt=" " class="creditCardMasterC">
                                    <input autocomplete='off' class='form-control card-number' size='20' placeholder="0000 0000 0000 0000" type='text'
                                    name="card_no">
                                </div>
                            </div>

                            <div class="mt-3">
                                <label class='control-label m-0'>CVV</label>
                                <br>
                                <small class="text-secondary">Enter the 3 or 4 digit number on the card</small>
                                <input autocomplete='off' class='form-control card-cvc mt-2' placeholder='000' size='4'
                                    type='text' name="cvvNumber">
                            </div>
                            <div class="mt-3">
                                <label class='control-label m-0'>Expiration</label>
                                <br>
                                <small class="text-secondary">Enter the expiration date of the card</small>
                                <div class="row w-100 m-0 p-0 mt-3 justify-content-between align-items-center">
                                    <input class='form-control card-expiry-month col-5' placeholder='MM' size='4' type='text'
                                    name="ccExpiryMonth">
                                    <span class="col-1 d-flex justify-content-center align-items-center" style="font-weight: 600;font-size:26px;">
                                        /
                                    </span>
                                    <input class='form-control card-expiry-year col-5' placeholder='YYYY' size='4'
                                        type='text' name="ccExpiryYear">
                                    </div>
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='hidden' name="amount" value="{{ $totalProductAmount + 3 }}">
                            </div>

                            <div class="my-4">
                                <button class='form-control btn btn-success submit-button' type='submit'>Pay ${{ $totalProductAmount + 3 }}.00</button>
                            </div>

                            {{-- <div class="error_handler justify-content-center align-items-center">
                                <div class="alert alert-danger" role="alert">
                                      <span>Please fill All the inputs fields</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class='alert-danger alert' style="display:none;">
                                    Please correct the errors and try again.
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>

            {{--  second part  --}}

            <div class="col-lg-5">
                <div class="card secondPartCard">

                    <article class="card-body">
                        <dl class="dlist-align">
                            <table class="w-100">
                                @foreach ($cartsProducts as $product)
                                    <tr>
                                        <td class=""> {{ $product[0]->product_name }}(x{{ $product[0]->quantity }})
                                        </td>
                                        <td class="text-right "> ${{ $product[0]->price }}.00 </td>
                                    </tr>
                                @endforeach
                                <tr class="">
                                    <td>Services fee</td>
                                    <td class="text-right ">$3.00</td>
                                </tr>
                                <tfoot>
                                    <tr style="height: 70px;vertical-align:bottom;">
                                        <th style="font-size: 25px">Total to pay:</th>
                                        <th class="text-right" style="font-size: 25px">${{ $totalProductAmount + 3 }}.00
                                        </th>
                                    </tr>
                                </tfoot>

                            </table>
                            {{-- <dt class="mb-2">Total cost: </dt>
                                <span class="" style="font-size: 20px"> <strong>${{ $this->totalProductAmount + 3 }}</strong> </span> --}}
                        </dl>
                    </article>
                </div>
            </div>

        </div>
    </div>
@endsection

{{-- <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href=" {{asset('css/main.css')}} ">
        <title>Payments | Karim Shopper</title>
    </head>
    <body>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="{{ asset("js/main.js") }}"></script>
    </body>
</html> --}}
