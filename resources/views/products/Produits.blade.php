
@extends('Master_page')
@section('title','Karim Shopper | Shop')

@livewireStyles
@section('content')


<div class="w-100">
    <nav aria-label="breadcrumb" class="pl-md-3">
      <ol class="breadcrumb bg-transparent pl-3 pl-sm-5">
        <li class="breadcrumb-item"><a href="/" class="text-success text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="/cart">Shop</li>
        <li class="breadcrumb-item active" aria-current="/cart">{{ $category }}</li>
      </ol>
    </nav>
</div>
<div>
        @livewire('product-filter', ['cat'=>$category])
</div>

@livewireScripts
@endsection

