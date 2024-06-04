@extends('frontend.layouts.app')
@section('home-contents')
 <!-- breadcrumb start -->
 <div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="/">Shop</a></li>
            <li>
                <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path
                            d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                            fill="#000" />
                    </g>
                </svg>
            </li>
            <li>Cart</li>
            <li>
                <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path
                            d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                            fill="#000" />
                    </g>
                </svg>
            </li>
            <li>Checkout</li>
        </ul>
    </div>
</div>
<!-- breadcrumb end -->
<div class="checkout-page mt-100">
    <div class="container">
        <div class="checkout-page-wrapper">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                    <div class="section-header mb-3">
                        <h2 class="section-heading">Check out</h2>
                    </div>

                    <div class="shipping-address-area">
                        <h2 class="shipping-address-heading pb-1">Shipping address</h2>
                        <div class="shipping-address-form-wrapper">
                            <form action="{{ route('checkout.store') }}" method="post" class="shipping-address-form common-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <fieldset>
                                            <input type="hidden" name="total" value="{{ $total }}">
                                            <label for="fullname" class="label">Full name</label>
                                            <input type="text" readonly value="{{ $user->name }}"
                                            name="fullname"
                                            class="form-control @error('fullname') is-invalid @enderror" />
                                            @error('fullname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <fieldset>
                                            <label for="email" class="label">Email address</label>
                                            <input type="email"
                                            readonly
                                            name="email"
                                            class="form-control @error('email') is-invalid
                                            @enderror" value="{{ $user->email }}" />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <fieldset>
                                            <label for="phone" class="label">Phone number</label>
                                            <input type="text"
                                            name="phone"
                                            class="form-control @error('phone') is-invalid @enderror" />
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-12">
                                        <fieldset>
                                            <label for="state_id" class="label">State</label>
                                            <select id="state" name="state_id" class="form-select @error('state_id') is-invalid @enderror">
                                                <option value="">Select</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('state_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <fieldset>
                                            <label for="lga_id" class="label">Local government area</label>
                                            <select id="lga" name="lga_id" class="form-select @error('lga_id') is-invalid @enderror">
                                              <option value="">Select</option>
                                            </select>
                                            @error('lga_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <fieldset>
                                            <label for="address" class="label">Shipping Address</label>
                                            <textarea name="address" class="form-control
                                            @error('address') is-invalid @enderror" rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="shipping-address-area billing-area">
                        <h2 class="shipping-address-heading pb-1">Payment Method</h2>
                        <div class="form-checkbox d-flex align-items-center mt-4">
                            <input class="form-check-input mt-0" type="checkbox" checked>
                            <label class="form-check-label ms-2">
                               Cash
                            </label>
                        </div>
                    </div>
                    <div class="shipping-address-area billing-area">
                        <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                            <a href="{{ route('cart') }}" class="checkout-page-btn minicart-btn btn-secondary">BACK TO CART</a>
                            <button type="submit" class="checkout-page-btn submit-btn minicart-btn btn-primary">CHECKOUT</button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                    <div class="cart-total-area checkout-summary-area">
                        <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h4>

                        @foreach ($carts as $cart)
                        <div class="minicart-item d-flex">
                            <div class="mini-img-wrapper">
                                <img class="mini-img" src="{{ asset($cart->product->image) }}" alt="img">
                            </div>
                            <div class="product-info">
                                <h2 class="product-title"><a href="#">{{ $cart->product->name }}</a></h2>
                                <p class="product-vendor">N{{ $cart->product->price }} x {{ $cart->qty }}</p>
                            </div>
                        </div>
                        @endforeach

                        <div class="cart-total-box mt-4 bg-transparent p-0">
                            <div class="subtotal-item subtotal-box">
                                <h4 class="subtotal-title">Subtotals:</h4>
                                <p class="subtotal-value"><span>&#8358;</span>{{ $total }}</p>
                            </div>
                            <div class="subtotal-item shipping-box">
                                <h4 class="subtotal-title">Shipping:</h4>
                                <p class="subtotal-value"><span>&#8358;</span>0.00</p>
                            </div>
                            <div class="subtotal-item discount-box">
                                <h4 class="subtotal-title">Discount:</h4>
                                <p class="subtotal-value"><span>&#8358;</span>0.00</p>
                            </div>
                            <hr />
                            <div class="subtotal-item discount-box">
                                <h4 class="subtotal-title">Total:</h4>
                                <p class="subtotal-value"><span>&#8358;</span>{{ $total }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('frontend-scripts')
<script>
  $(function(){
    $('#state').change(function(){
       $.ajax({
        url: `/state/local_governments/${$(this).val()}`,
        type: "GET",
        beforeSend: function(){
            $('#lga').empty()
            $('#lga').append('<option value="">Loading...</option>')
            $('#lga').attr('disabled', true)
        },
        success: function(response){
            $('#lga').attr('disabled', false)
            $('#lga').empty();
            $('#lga').append('<option value="">Select</option>');
            $.each(response, function (key, value) {
                $('#lga').append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        }
       })
    })
  })
</script>
<script>
   $(document).ready(function(){
       $('.submit-btn').click(function(){
       $(this).html( `<div class="spinner-border spinner-border-sm" role="status"></div><span class="ms-2">Placing Order...</span>`)
       })
    })
</script>
@endsection
