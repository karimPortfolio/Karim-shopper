@if (!empty($product))
    @section('title','Karim Shopper | '.$product[0]->product_name)
@else
    @section('title','Karim Shopper')
@endif

{{-- add the profuct to object so i can added it to cart on user click --}}

@if (!empty($product))
    @if (session("message"))
    <div class="d-flex justify-content-end pr-5 addToCartAlert" >
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong> {{ $product[0]->product_name }} </strong> has been add to cart
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif

    <div class="row m-0 w-100 mt-5 px-3 px-sm-5">
      <div class="col-lg-4 product_image ml-lg-5 p-1">
           <img src="{{ asset("images/products/".$product[0]->image) }}" alt="{{ $product[0]->product_name." image" }}">
      </div>
      <div class="col-lg-7 px-0 pl-lg-5 product_details py-4 py-lg-0">
          <h5 class="">Product Details</h5>
          <h2> {{ $product[0]->product_name }} </h2>
          <div class="product_rating">
            @if ($product[0]->product_rating == 5)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
      @endif
            {{-- <i class="fa-solid fa-star-half-stroke"></i> --}}
      @if ($product[0]->product_rating == 4.5)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>

      @elseif ($product[0]->product_rating == 4)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
      @elseif ($product[0]->product_rating == 3.5)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <i class="fa-regular fa-star"></i>
      @elseif ($product[0]->product_rating == 3)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
      @elseif ($product[0]->product_rating == 2.5)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
      @elseif ($product[0]->product_rating == 2)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
      @elseif ($product[0]->product_rating == 1.5)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
      @elseif ($product[0]->product_rating == 1)
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
      @endif
          </div>
          <div class="product-price mt-4">
              @if (!empty($product[0]->product_discount))
                   <p class="text-danger mb-2">-{{ $product[0]->product_discount }}% OFF</p>
              @endif
               <div class="d-none product_pricing"> {{ $product[0]->price }} </div>
              <h5 class="text-success">Price: <span class="text-dark">US $<span class="prod_price">{{ $product[0]->price }}</span>.00</span></h5>
          </div>
          <form action="{{ route("cart.add") }}" method="POST">
            @csrf
          <div class="d-flex justify-content-start align-items-center quantity py-3">
                <h5 class="text-success m-0">Quantity:</h5>
                <div class="ml-3 d-flex justify-content-start align-items-center ">
                    <button type="button" class="mr-2 lessQuantity"><span style="font-size:27px;">-</span></button> <input type="text" value="1" name="quantity" class="input_quantite"> <button type="button" class="ml-2 addQuantity"><span style="font-size: 27px">+</span></button>
                </div>
          </div>
          <div class="operations mt-4 d-flex justify-content-start align-items-center">
               <a href="" class="btn btn-outline-success px-5 py-2"> Buy $<span class="buying_btn">{{ $product[0]->price }}</span></a>
               @if (!empty(Auth::user()->name))
                   {{-- <a href="/cart/{{ $product[0]->id }}" class="btn btn-success ml-3 px-4 py-2"> <i class="fas fa-cart-plus"></i> Add to cart</a> --}}
                   <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endif
                <input type="hidden" name="sessionId" value="{{ session()->getId() }}">
                <input type="hidden" name="productId" value="{{ $product[0]->id }}">
                {{-- <input type="hidden" name="quantity" class="quantity input_quantite" value="1"> --}}
                    <button type="submit" id="addToCart" class="btn btn-success ml-3 px-4 py-2"><i class="fas fa-cart-plus"></i> Add to cart</button>

          </div>
          </form>
          <div class="delivery_info mt-5">
              <p class="text-success">Shipping: <span class="ml-2 text-dark">US $0.00 Standard Shipping</span></p>
              <p class="text-success">Delivery: <span class="ml-2 text-dark">Estimated between <strong>Tue, May 23</strong> and <strong>Wed, May 31</strong> </span></p>
              <div class="payments d-flex text-success">
                   Payments:
                   <div class="ml-3">
                       <img src="{{ asset("images/creditCards/visa.jpeg") }}" alt="">
                       <img src="{{ asset("images/creditCards/mastercard.png") }}" alt="" class="ml-2">
                   </div>
              </div>

          </div>
      </div>
    </div>
@else
     <script>
         window.location = "/"
     </script>
@endif
