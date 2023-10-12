
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css">



<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-5">
            <li class="breadcrumb-item ml-md-5"><a href="/" class="text-success text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="/cart" class="text-success text-decoration-none">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="/cart">Checkout</li>
          </ol>
        </nav>
    </div>
</div>
<section class="section-pagetop py-4 px-md-5">
    <div class="clearfix checkout_title px-3 px-sm-5">
        <h1 class="title-page">Checkout</h1>
    </div>
</section>
{{-- <section>

     @if ($successmsg !== NULL)
           <div class="col-12 mb-4 d-flex justify-content-end pr-5 addToCartAlert" >
                     <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center align-items-center py-2" role="alert">
                       <span>{{ $successmsg }}</span>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                      </div>
           </div>
     @endif
     @if ($errormsg !== NULL)
     <div class="col-12 mb-4 d-flex justify-content-end pr-5 addToCartAlert" >
        <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center align-items-center py-2" role="alert">
          <span>{{ $errorsmsg }}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
         </div>
      </div>
     @endif
</section> --}}
<section class="section-content checkout_section bg padding-y px-md-5">
    <div class="px-3 px-sm-5">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
            </div>
        </div>

        @if($this->totalProductAmount != 0)
            <form action="{{ route("addmoney.paymentstripe") }}" method="POST">
                @csrf
                <div class="row billingDetails">
                  <div class="col-md-8">
                    <div class="card">
                        <header class="card-header">
                            <h4 class="card-title mt-2">Billing Details</h4>
                        </header>
                        <article class="card-body">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Full name</label>
                                    <input type="text" class="form-control" name="fullname" wire:model.defer="fullname" id="fullname">
                                    @error("firstname")
                                         <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" wire:model.defer="email" id="email">
                                    @error("email")
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control mb-2"  name="address" wire:model.defer="address" id="address">
                                @error("address")
                                         <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control mb-2" name="city" wire:model.defer="city" id="city">
                                    @error("city")
                                         <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <input type="text" class="form-control mb-2" name="country" wire:model.defer="country" id="country">
                                    @error("country")
                                         <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>Post Code</label>
                                    <input type="text" class="form-control mb-2" name="postcode" wire:model.defer="postcode" id="postcode">
                                    @error("postcode")
                                         <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control mb-2" name="phone" wire:model.defer="phone" id="phone">
                                    @error("phone")
                                         <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Order Notes</label>
                                <textarea class="form-control mb-2" name="notes" wire:model.defer="notes" rows="6" id="notes"></textarea>
                                @error("notes")
                                         <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <header class="card-header">
                                    <h4 class="card-title mt-2">Your Order</h4>
                                </header>
                                <article class="card-body">
                                    <dl class="dlist-align">
                                        <table class="w-100">
                                            @foreach ($cartProducts as $product)
                                                   <tr>
                                                        <th class=""> {{ $product[0]->product_name }}(x{{ $product[0]->quantity }}) </th>
                                                        <td class="text-right text-secondary"> ${{ $product[0]->price }} </td>
                                                   </tr>

                                            @endforeach
                                            <tr class="">
                                                <th >Services fee</th>
                                                <td class="text-right text-secondary">$3</td>
                                           </tr>
                                           <tfoot>
                                            <tr style="height: 50px;vertical-align:bottom;">
                                                <th>Total cost:</th>
                                                <th class="text-right">${{ $this->totalProductAmount + 3 }}</th>
                                            </tr>
                                           </tfoot>

                                        </table>

                                    </dl>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            {{-- <a href="/payments" class="btn btn-success">Go to payments</a> --}}
                            {{-- <button wire:click.debounce.2000ms ="orderManage()" wire:loading.attr ="disabled" class="subscribe btn btn-dark btn-lg btn-block">
                                <span wire:loading.remove wire:target="orderManage()"><i class="fas fa-truck mr-2"></i> Place Order</span>
                                <span wire:loading wire:target="orderManage()">
                                    <div class="spinner-border text-light" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </span>
                            </button> --}}
                            <button type="submit" class="subscribe btn btn-dark btn-lg btn-block">
                                <span >Place Order <i class="fas fa-truck ml-2"></i></span>
                            </button>

                            <div wire:ignore class="mt-4 pt-4">
                                    <!-- Set up a container element for the button -->
                                    <div id="paypal-button-container"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </form>
        @else
             <div class="py-4 mt-5 card shadow">
                  <h1 class="text-center">No items in cart to checkout</h1>
                  <div class="d-flex justify-content-center align-items-center pt-3">
                       <a href="/" class="btn btn-success">Shop now</a>
                  </div>
             </div>
        @endif



    </div>
</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@push('scripts')
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AefNSd86kR7SN3hwyuNfveZa2ik-13mnZ_ph3CnfWk_YCDFVM9USuU0z7cOY33y01MyNtQzsVW_ZzoFq&currency=USD"></script>


  <script>
        paypal.Buttons({

            onClick()  {
                 // Show a validation error if the checkbox is not checked
                 if (!document.getElementById('fullname').value
                    || !document.getElementById('email').value
                    || !document.getElementById('address').value
                    || !document.getElementById('city').value
                    || !document.getElementById('country').value
                    || !document.getElementById('postcode').value
                    || !document.getElementById('phone').value
                    || !document.getElementById('notes').value
                 )
                 {
                      Livewire.emit("validationForAll");
                      return false;
                 } else {
                     @this.set('fullname',document.getElementById('fullname').value)
                     @this.set('email',document.getElementById('email').value)
                     @this.set('address',document.getElementById('address').value)
                     @this.set('city',document.getElementById('city').value)
                     @this.set('country',document.getElementById('country').value)
                     @this.set('postcode',document.getElementById('postcode').value)
                     @this.set('phone',document.getElementById('phone').value)
                     @this.set('notes',document.getElementById('notes').value)

                 }
                //  {
                //      document.querySelector('#error').classList.remove('hidden');
                //  }
            },

          // Order is created on the server and the order id is returned
          createOrder() {
            return fetch("/my-server/create-paypal-order", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              // use the "body" param to optionally pass additional order information
              // like product skus and quantities
              body: JSON.stringify({
                purchase_units:[{
                    amount:{
                        value:"{{ $this->totalProductAmount }}"
                    }
                }]
                // cart: [
                //   {
                //     sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                //     quantity: "YOUR_PRODUCT_QUANTITY",
                //   },
                // ],
              }),
            })
            .then((response) => response.json())
            .then((order) => order.id);
          },
          // Finalize the transaction on the server after payer approval
          onApprove(data) {
            return fetch("/my-server/capture-paypal-order", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                orderID: data.orderID
              })
            })
            .then((response) => response.json())
            .then((orderData) => {
              // Successful capture! For dev/demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              const transaction = orderData.purchase_units[0].payments.captures[0];
              alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
              // When ready to go live, remove the alert and show a success message within this page. For example:
              // const element = document.getElementById('paypal-button-container');
              // element.innerHTML = '<h3>Thank you for your payment!</h3>';
              // Or go to another URL:  window.location.href = 'thank_you.html';
            });
          }
        }).render('#paypal-button-container');
      </script>
@endpush

