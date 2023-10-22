@extends('Master_page')
@section('title',"Karim's Shopper")
@section('content')

<div class="hero_section w-100 d-flex justify-content-center align-items-center flex-column d-lg-block">
     @include("homeComp.LandingPage")
</div>

<div class="hero_section_explore mt-5">
    @include('homeComp.HeroSectionProducts')
</div>

<div class="services my-5 py-5">
    @include("homeComp.Services")
</div>

<div class="news_p1 my-5 py-5 px-5 w-100">
    @include("homeComp.NewsP1")
</div>

<div class="home_shop my-5">
    @include("homeComp.Shop")
</div>

<div class="news_p2 my-5 py-5 px-5 w-100">
    @include("homeComp.NewsP2")
</div>

<div class="news_letter mb-5 px-md-5 mx-2 mx-sm-5">
    @include("homeComp.NewsLetter")
</div>

@endsection
