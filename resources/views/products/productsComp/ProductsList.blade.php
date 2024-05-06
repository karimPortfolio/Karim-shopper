



<div class="row justify-content-between pr-4 ">
    @foreach ($products as $product)
        <div class="card col-12 mx-3 my-4 p-0">
            <div wire:click.debounce.500ms="addToWhishlist({{ $product->id }})" class="whishlist_add w-100 d-flex justify-content-end pt-3 pr-3">
                @php
                     $inWhishlist = false;
                     if (Auth::user())
                     {
                        $user_id = Auth::user()->id;
                        foreach ($whishlistProducts as $whishlistProduct )
                        {
                            if ($product->id === $whishlistProduct->product_id && $user_id === $whishlistProduct->user_id )
                            {
                                $inWhishlist = true;
                            }
                        }
                     }

                @endphp
                 @if ($inWhishlist)
                     <span class="d-flex justify-content-center align-items-center"><i class="fa-regular fa-heart empty_heart_icon hidde"></i><i class="fa-sharp fa-solid fa-heart full_heart_icon active"></i></span>
                 @else
                     <span class="d-flex justify-content-center align-items-center"><i class="fa-regular fa-heart empty_heart_icon active"></i><i class="fa-sharp fa-solid fa-heart full_heart_icon hidde"></i></span>
                 @endif
             </div>
            {{-- <div class="whishlist_add w-100 d-flex justify-content-end pt-3 pr-3">
                <span class="d-flex justify-content-center align-items-center"><i class="fa-regular fa-heart empty_heart_icon active"></i><i class="fa-sharp fa-solid fa-heart full_heart_icon hidde"></i></span>
            </div> --}}
            <div class="row align-items-center">
                <img src="{{ asset("images/products/".$product->image) }}" alt="" class="col-4">
                <div class="col-6 card-body p-3 pb-5">
                     <p class="m-0 mb-1 categ">{{ str_replace('&', ' & ',$category ) }}</p>
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
                     <div class="pricing mt-3">
                          <div class="d-flex">
                              @if (!empty($product->product_discount))
                                 <p class="text-danger m-0 mr-2">-{{ $product->product_discount }}%</p>
                              @endif
                              <p class="m-0"><strong>${{ $product->price }}</strong></p>
                          </div>
                          <div class="mt-3">
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




