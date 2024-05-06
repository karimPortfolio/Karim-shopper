<div class="row px-3 px-sm-0 mt-3 dashboard_products justify-content-center justify-content-md-around">
    @foreach ($userProducts as $product)
           <div class="card col-md-5 col-lg-5 mt-4 p-0 ">
               <div class="editing_panel d-flex justify-content-end align-items-center pt-3 pe-3">
                  <div class="edit">
                        <a href="{{ route('dashboard.manageProducts.editproduct' , $product->id) }}" class="d-flex justify-content-center align-items-center">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                             <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                           </svg>
                        </a>
                  </div>
                  <div class="delete">
                      {{-- ======= Delete Button ====== --}}
                      <form action="{{route('dashboard.manageProducts.delete',$product->id)}}" method="post" class="deleteProductForm mb-0" >
                        @method('DELETE')
                        @csrf
                         <button type="submit" class="ml-3 btn btn-danger d-flex justify-content-center align-items-center" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                               <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                           </svg>
                         </button>
                     </form>
                  </div>
               </div>
               @if (!empty($product->image))
                    <img class="w-100 bg-white" style="height:300px;object-fit:contain;" src="{{asset('images/products/'.$product->image)}}" alt="">
               @else
                    <img class="w-100 bg-white" style="height:300px;object-fit:cover;" src="{{asset('images/products/imgplaceholder.png')}}" alt="">
               @endif
               <div class="d-flex justify-content-end align-items-end w-100 h-100">
                    <div class="card-body ">
                        <h5 class="text-white"> {{$product->product_name}} </h5>
                        {{-- <p class="mt-3 text-white"> {{$product->description}} </p> --}}
                        <p class="mt-2 text-white"> ${{$product->price}}</p>
                        <a href="{{ route("products.details",$product->id) }}" class="btn btn-success d-flex justify-content-center align-items-center text-white">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                             <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                             <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                           </svg>
                           <span class="ms-2">View product</span>
                        </a>
                    </div>
               </div>
          </div>
    @endforeach
</div>

<div class="mt-4 w-100 d-flex justify-content-end paginate_links">
    {{ $userProducts->onEachSide(1)->links() }}
</div>
