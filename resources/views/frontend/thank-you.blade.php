@extends('frontend.layouts.app')
@section('title', 'Thank You')
@section('home-contents')
<div class="row my-5">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mx-auto">
        <div class="text-center fw-bold"><i style="font-size: 50px" class="bi text-success bi-check-circle-fill"></i></div>
        <p class="text-center fw-bold">Order placed successfully</p>
        <p class="text-center text-muted">We have confirm your order and we are getting it ready to be delivered to you soonest</p>
        <p class="text-center fw-bold mb-5">Thanks for your usual patronage</p>
        <p class="text-center">
            <a href="{{ route('orders.show', $id) }}" class="position-relative btn-primary text-uppercase">
                view your order
            </a>
        </p>
        <p class="text-center">
            <a href="{{ route('home') }}" class="position-relative btn-primary text-uppercase">
                continue shopping
            </a>
        </p>
    </div>
</div>
@endsection
