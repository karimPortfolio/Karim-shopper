
@extends('Master_page')
@section('title' , "Karim's Shopper | Search")

@livewireStyles
@section('content')

<div class="">
    @livewire("search-products" , ["search" => $search])
</div>

@livewireScripts
@endsection
