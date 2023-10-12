
@extends('Master_page')
@section('title' , 'Karim Shopper | Search')

@livewireStyles
@section('content')

<div class="">
    @livewire("search-products" , ["search" => $search])
</div>

@livewireScripts
@endsection
