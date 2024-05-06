

<div class="products_intro">
    <div class="products_category w-100 ">
        <div class="py-4 px-4">
             <h1 class="ml-2 my-2"> Search Results: "{{ $search }}" </h1>
        </div>
    </div>

    <div class="products_filterage mt-4 d-flex justify-content-between align-items-center">
         <div class="first_part d-flex justify-content-center align-items-center">
             <p class="m-0 mr-4"><strong>{{ $numProdFound }}</strong> <span class="text-secondary">Products found</span></p>
             <button class="btn btn-outline-dark small_screens_filter d-block d-lg-none"><i class="fa-solid fa-filter mr-2"></i></i>Filters</button>
         </div>
         <div class="second_part d-flex justify-content-end align-items-center">
             <div class="filtrage_select ml-4">
                 <select wire:model="sortBy"  name="sortBy" class="form-control products_filter_select" id="">
                     <option value="featured">Sort by: Featured</option>
                     <option value="low">Price: Low to High</option>
                     <option value="high">Price: High to Low</option>
                     <option value="date">Release date</option>
                 </select>
             </div>
         </div>
    </div>
</div>



