

<div class="row justify-content-center">
      <div class="col-12 ">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb pl-5">
                <li class="breadcrumb-item"><a href="/" class="text-success text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="/" class="text-success text-decoration-none">Product Detail</a></li>
                <li class="breadcrumb-item active" aria-current="/cart">Cart</li>
              </ol>
            </nav>

      </div>

      @if (session("message"))
           <div class="col-12 mb-4 d-flex justify-content-end pr-5 addToCartAlert" >
             <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                 {{ session("message") }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
         </div>
      @endif

      <div class="col-lg-7 px-3 px-md-5 px-lg-0 cart_products_table">
         <table class="table table-hover " >
            <thead>
              <tr>
                <th scope="col" colspan="2">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Price</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cart_products as $product )
                    <tr class="py-auto">

                      <th scope="row">
                            <img src="{{ asset("images/products/$product->image") }}" alt="">
                      </th>
                      <td class="">
                               <p class="my-auto">{{ $product->product_name }}</p>
                      </td>
                      <td class="">
                           <div class="d-flex justify-content-center align-items-center">

                               <button wire:loading.attr = "disabled" wire:click="decreaseQty({{ $product->cart_id}}) class="m-0 lessQuantityBtn">-</button>
                               {{-- <button class="m-0 lessQuantityBtn">-</button> --}}
                               <input type="text" class="m-0 productQuantity" value="{{ $product->quantity }}">
                               {{-- <button class="m-0 moreQuantityBtn">+</button> --}}
                               <button wire:loading.attr = "disabled" wire:click="increaseQty({{ $product->cart_id }})" class="m-0 moreQuantityBtn">+</button>
                           </div>
                      </td>
                      <td>
                                 <span class="badge badge-danger py-1">not payed</span>
                      </td>
                      <td class="">
                          <div class="cart_product_pricing">
                              <input type="hidden" class="current_price" value="{{ $product->price }}">
                              <p class="m-0"><strong>${{ $product->price }}.00</strong></p>
                              <p class="m-0 product_price"></p>
                              @if (!empty($product->product_discount))
                                  <p class="m-2 product_discount">-{{ $product->product_discount }}%</p>
                              @endif
                          </div>
                      </td>
                      <td class="table_delete_row">
                             <form action="{{ route("cart.destroy" , $product->cart_id) }}" method="post">
                                 @method("DELETE")
                                 @csrf
                                 <button type="submit" class="btn btn-success text-white d-flex justify-content-center align-items-center" style="width: fit-content"><i class="far fa-trash-alt"></i></button>
                             </form>
                      </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
      </div>

      <div class="col-lg-4 mx-md-5 px-4 px-sm-5 mx-lg-0 px-lg-0 mt-5 mt-lg-0 pl-lg-5">
            <div class="sumarry_card p-3 border rounded">
                  <h5>Summary</h5>
                  <table class="w-100 mt-4">
                        <tr>
                             <td>Items Subtotal</td>
                             @if (!empty($product->price))
                                  <td class="text-right">${{ $product->price * $totalPrice[0]->total_quantity }}.00</td>
                             @else
                                  <td class="text-right">$0.00</td>
                             @endif
                        </tr>
                        <tr>
                            <td>Service Fee</td>
                            <td class="text-right">$3.00</td>
                        </tr>
                        <tr style="height: 50px;vertical-align:bottom;">
                            <td><strong>Total</strong></td>
                             @if (!empty($product->price))
                                 <td class="text-right"><strong> ${{ $product->price * $totalPrice[0]->total_quantity + 3 }}.00</strong></td>
                             @else
                                  <td class="text-right">$0.00</td>
                             @endif

                        </tr>
                  </table>

                  <div class="mt-4 go_to_pay_btn">
                      @if (!empty($product->price))
                            <a href="/checkout" class="w-100 py-3 btn btn-success d-flex justify-content-between"><span ><strong>Go to pay</strong></span> <span><strong>${{ $product->price * $totalPrice[0]->total_quantity + 3 }}.00</strong></span> </a>
                      @else
                            <button class="w-100 py-3 btn btn-success d-flex justify-content-between disabled"><span ><strong>Go to pay</strong></span> <span><strong>$0.00</strong></span> </button>
                      @endif

                  </div>
            </div>
      </div>

</div>

