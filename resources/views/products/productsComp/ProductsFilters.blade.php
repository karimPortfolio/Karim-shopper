

<div class=" products_filter">
     <div class="close_filter_sidebar w-100 d-flex justify-content-end pr-4 pt-3 d-lg-none">
         <span><i class="fa-sharp fa-solid fa-xmark"></i></span>
     </div>
     <div class="categories">
           <h5>Categories</h5>

           <ul class="p-0 mt-4">
               <li><a href="/products/Smartphones&Tablets">Smartphones & Tablets</a></li>
               <li class="mt-3"><a href="/products/Laptops&Consoles">Laptops & Consoles</a></li>
               <li class="mt-3"><a href="Headphones&Accessories">Headphones & Accessories</a></li>
           </ul>
     </div>
     <div class="brands mt-5">
           <h5>Brands</h5>
           <ul class="p-0 mt-4">
                @foreach ($brands as $brand)
                    @if ($brand->brand !== null)
                        <li class="mt-2"><input type="checkbox" name="brand" wire:model="brandFilter" value="{{ $brand->brand }}" class="products_filter_select"><span class="ml-2">{{ ucfirst($brand->brand) }}</span></li>
                    @endif
                @endforeach
           </ul>
     </div>
     <div class="rating mt-5">
         <h5>Rating</h5>
         <ul class="p-0 mt-4">
            <li class="mt-2"><input type="checkbox" name="rating" class="brand_inputs products_filter_select" wire:model="ratingFilter" value="5"><span class="ml-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></li>
            <li class="mt-2"><input type="checkbox" name="rating" class="brand_inputs products_filter_select" wire:model="ratingFilter" value="4"><span class="ml-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></span></li>
            <li class="mt-2"><input type="checkbox" name="rating" class="brand_inputs products_filter_select" wire:model="ratingFilter" value="3"><span class="ml-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span></li>
            <li class="mt-2"><input type="checkbox" name="rating" class="brand_inputs products_filter_select" wire:model="ratingFilter" value="2"><span class="ml-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span></li>
            <li class="mt-2"><input type="checkbox" name="rating" class="brand_inputs products_filter_select" wire:model="ratingFilter" value="1"><span class="ml-2"><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span></li>
         </ul>
     </div>

</div>
