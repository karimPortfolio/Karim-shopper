

<div class="row justify-content-center justify-content-md-between mt-4 mt-lg-0">
    @foreach ($products as $product)
        <div class="card col-md-5 col-lg-3 mx-3 my-4 p-0">
            <div class="whishlist_add w-100 d-flex justify-content-end pt-3 pr-3">
                <span class="d-flex justify-content-center align-items-center"><i class="fa-regular fa-heart empty_heart_icon active"></i><i class="fa-sharp fa-solid fa-heart full_heart_icon hidde"></i></span>
            </div>
            <div class="list_change1" >
               <img src="{{ asset("images/products/".$product->image) }}" alt="">
               <div class="card-body p-3">
                    <p class="m-0 mb-1 categ">{{ str_replace('&', ' & ',$product->category ) }}</p>
                    <h5>{{ $product->product_name }}</h5>
                    <div class="product_rating">
                      @if ($product->product_rating == 5)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                      @endif
                            {{-- <i class="fa-solid fa-star-half-stroke"></i> --}}
                      @if ($product->product_rating == 4.5)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>

                      @elseif ($product->product_rating == 4)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                      @elseif ($product->product_rating == 3.5)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <i class="fa-regular fa-star"></i>
                      @elseif ($product->product_rating == 3)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                      @elseif ($product->product_rating == 2.5)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                      @elseif ($product->product_rating == 2)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                      @elseif ($product->product_rating == 1.5)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                      @elseif ($product->product_rating == 1)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                      @endif
                  </div>
                    <div class="pricing d-flex  justify-content-between align-items-center mt-3">
                         <div class="d-flex">
                             @if (!empty($product->product_discount))
                                <p class="text-danger m-0 mr-2">-{{ $product->product_discount }}%</p>
                             @endif
                             <p class="m-0"><strong>${{ $product->price }}</strong></p>
                         </div>
                         <div>
                             <a href="/products/{{ $product->id }}/details" class="btn btn-success">Details</a>
                         </div>
                    </div>

               </div>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-4 w-100 d-flex justify-content-end">
   {{ $products->onEachSide(1)->links() }}
</div>


