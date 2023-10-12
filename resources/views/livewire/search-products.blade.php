

<div class="row w-100 px-3 px-sm-5 m-0 mt-4">
    <div class="col-lg-9 p-0 order-1">
        <div class="products_grid">

            @include("search.searchComp.SearchIntro")

            {{--Searched Products grid --}}

            <div class="display_sys" id="products_grid">
                   @include("search.searchComp.SearchProducts")
            </div>

        </div>
    </div>

     <div class="col-lg-3 close_filtering_products products_filtering">
          @include("search.searchComp.SearchFilters")
    </div>
</div>

