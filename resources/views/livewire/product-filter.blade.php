

<div>
    <div class="w-100 col-12 d-flex justify-content-end pr-4">
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert" style="width: fit-content">
                {{ session('message') }}
                <button type="button" class="close ml-4" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="w-100 col-12 d-flex justify-content-end pr-5">
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert" style="width: fit-content">
                {{ session('error') }} <a href="/login" class="text-dark">login here</a>
                <button type="button" class="close ml-4" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="row w-100 px-3 px-sm-5 m-0 mt-4">
      <div class="col-lg-9 p-0 order-1">
        <div class="products_grid">

            @include("products.productsComp.ProductsIntro")

            {{-- Products grid --}}

            <div class="display_sys" id="products_grid">
                @include("products.productsComp.ProductsGridSys")
            </div>

            {{-- products column --}}

            <div class="close_display" id="products_list">
                @include("products.productsComp.ProductsList")
            </div>
        </div>
    </div>

     <div class="col-lg-3 close_filtering_products products_filtering">
             @include("products.productsComp.ProductsFilters")
    </div>
</div>
</div>





