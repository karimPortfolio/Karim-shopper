


@if (!empty($similiar_products))
<div class="row w-100 m-0 px-3 px-sm-5">
    <div class="col-12 ml-lg-5 mb-4 p-0">
         <h5>Similiar products</h5>
    </div>
    @foreach ($similiar_products as $product)
        <div class="col-lg-3 ml-lg-5 mt-3 similiar_product_card rounded">
            <a href="/products/{{ $product->id }}/details" class="text-decoration-none text-dark">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <img src="{{ asset("images/products/$product->image") }}" alt="{{ $product->product_name." image" }}">
                    <div class="card_body pl-3 py-3 rounded mt-4 w-100">
                        <h5 class="text-light text-start"> {{ $product->product_name }} </h5>
                        <div class="d-flex justify-content-start align-items-center">
                              @if (!empty($product->product_discount && $product->product_discount !== 0))
                                   <p class="mr-3" style="font-size: 14px;color:#bfbfbf;"> -{{ $product->product_discount }}% OFF </p>
                              @endif
                              <p class="text-center text-white">${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endif


