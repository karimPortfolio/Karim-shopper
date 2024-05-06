

<div class="my-5 pt-5 px-3 px-sm-4 px-md-5 mx-md-5">
     <h1 class="ml-sm-4 shop_title">Best Seller Products</h1>
     <h5 class="ml-sm-4">Quality products</h5>
     <div class="row pt-5 justify-content-center" style="box-sizing: border-box">
           @foreach ($products as $product)
                <div class="col-lg-3 home_products_card p-0 mx-3 my-4 m-sm-5 m-lg-4" style="box-sizing: border-box">
                     <div class="home_products_card_head w-100">
                        @if (!empty($product->image))
                             <img src="{{asset('images/products/'.$product->image)}}" alt="{{ $product->name }} image">
                        @else
                             <img style="object-fit: cover" src="{{asset('images/products/imgplaceholder.png')}}" alt="placeholdder image">
                        @endif
                     </div>
                     <div class="home_products_card_body mt-auto p-3 py-4">
                           <h5>{{ $product->product_name }}</h5>
                           @php
                               $checkDiscount = false;
                           @endphp
                           @empty (!$product->product_discount)
                                @php
                                    $checkDiscount = true;
                                @endphp
                           @endempty
                           @if ($checkDiscount)
                                 <p class="m-0 my-3"><span>-{{ $product->product_discount }}%</span> ${{ $product->price }}</p>
                           @else
                                 <p class="m-0 my-3">${{ $product->price }}</p>
                           @endif
                           <a href="/products/{{ $product->id }}/details" class="">Product details
                               <span class="ml-1">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                       <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                     </svg>
                               </span>
                           </a>
                     </div>
                </div>
           @endforeach
     </div>
</div>
