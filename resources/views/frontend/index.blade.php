@extends('frontend.layouts.app')
@section('title', 'Home')
@section('home-contents')
 <!-- slideshow start -->
 @include('frontend.components.slider')
 <!-- slideshow end -->

 <!-- trusted badge start -->
@include('frontend.components.trusted-badge')
 <!-- trusted badge end -->

 <!-- banner start -->
 @include('frontend.components.banner')
 <!-- banner end -->

 <!-- collection start -->
 @livewire('products')
 <!-- collection end -->

 <!-- shop by category start -->

 <!-- shop by category end -->

 <!-- video start -->

 <!-- video end -->

 <!-- testimonial start -->

 <!-- testimonial end -->

 <!-- single banner start -->

 <!-- single banner end -->

 <!-- latest blog start -->

 <!-- latest blog end -->

 <!-- brand logo start -->

 <!-- brand logo end -->
@endsection
