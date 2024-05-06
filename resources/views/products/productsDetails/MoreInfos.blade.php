

@if (!empty($product))
<div class="mt-5 m-0 px-3 px-sm-5">
    <div class="seller_info ml-lg-5">
         <h5>Seller information</h5>
         <p>{{ $product[0]->name }}</p>
    </div>
    <div class="description ml-lg-5 mt-5">
        <h5>Description</h5>
        <p>{{ $product[0]->description }}</p>
    </div>
</div>
@endif

