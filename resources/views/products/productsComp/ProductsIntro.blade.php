



<div class="products_intro">
    <div class="products_category w-100 ">
        <div class="py-4 px-4">
             @php
                 $cat = $category;
                 $catWithSpace = str_replace('&', ' & ', $cat);
             @endphp
             <h1 class="ml-2 my-2"> {{ $catWithSpace }} </h1>
        </div>
    </div>

    <div class="products_filterage mt-4 d-flex justify-content-between align-items-center">
         <div class="first_part d-flex justify-content-center align-items-center">
             <p class="m-0 mr-4"><strong>{{ $numProdFound }}</strong> <span class="text-secondary">Products found</span></p>
             <button class="btn btn-outline-dark small_screens_filter d-block d-lg-none"><i class="fa-solid fa-filter mr-2"></i></i>Filters</button>
         </div>
         <div class="second_part d-flex justify-content-end align-items-center">
             <div class="list_icon d-flex justify-content-center align-items-center">
                <i class="fas fa-list-ul text-success"></i>
             </div>
             <div class="grid_icon ml-3 d-flex justify-content-center align-items-center text-success">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                  </svg>
             </div>
             <div class="filtrage_select ml-4">
                 <input type="text"  value="{{ $category }}" class="d-none categ">
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


