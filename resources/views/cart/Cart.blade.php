
@extends("Master_page")
@section("title" , "Karim Shopper | Cart")

@livewireStyles

@section("content")
      <div class="all_cart_products">
           {{-- @include("cart.cartComp.cartProducts") --}}
           @livewire("cart-manage" , ["cart_products" => $cart_products,"numProducts" => $numProducts, "totalPrice" => $totalPrice])
      </div>

@livewireScripts
@endsection
