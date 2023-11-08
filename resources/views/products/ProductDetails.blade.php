
@extends('master_page')

@livewireStyles

@section('content')

@if(Session::has('failed'))
    @php
        $message = Session::get('failed');
    @endphp
    <div class="d-flex justify-content-end pt-4 pr-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong><a href="/login" class="text-dark ml-1"></a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <script>
        setTimeout(() => {
            window.location = "/login";
        },2000);
    </script>

@elseif (session("success"))
    <div class="d-flex justify-content-end pr-5 addToCartAlert" >
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

@endif



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
<div class="product_comments">
    @livewire("comments", ['product' => $product])
</div>
<div class="similiar_products mt-5">
    @include("products.productsDetails.SimiliarProducts")
</div>

<script type="module" src="{{ asset("js/main.js") }}"></script>
@endsection

@livewireScripts
