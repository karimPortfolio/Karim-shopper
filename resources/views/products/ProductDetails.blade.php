
@extends('master_page')

@section('content')

@if (!empty($product))
<div class="product_large_img">
    <div class="vh-100 shadow_effect d-flex justify-content-center align-items-center flex-column">
        <div class="close_effect d-flex justify-content-end w-100 pt-4 pr-4">
            <i class="fas fa-times"></i>
        </div>
        <img src="{{ asset("images/products/".$product[0]->image) }}" alt="{{ $product[0]->product_name." image" }}" class="mt-5">
    </div>
</div>
@endif

<div class="product_info">
    @include("products.productsDetails.ProductInfo")
</div>
<div class="more_infos">
    @include("products.productsDetails.MoreInfos")
</div>
<div class="similiar_products mt-5">
    @include("products.productsDetails.SimiliarProducts")
</div>

<script type="module" src="{{ asset("js/main.js") }}"></script>
@endsection

