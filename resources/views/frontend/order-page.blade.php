@extends('frontend.layouts.app')
@section('title', 'Order Detail')
@section('home-contents')
<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb">
     <div class="container">
         <ul class="list-unstyled d-flex align-items-center m-0">
             <li><a href="{{ route('orders') }}">Order</a></li>
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
             <li>Details</li>
         </ul>
     </div>
 </div>
 <!-- breadcrumb end -->
     <div class="cart-page mt-100">
         <div class="container">
             <div class="cart-page-wrapper">
                 <div class="row">
                     <div class="col-lg-7 col-md-12 col-12">
                         <table class="cart-table w-100">
                             <thead>
                               <tr>
                                 <th class="cart-caption heading_18">Product</th>
                                 <th class="cart-caption heading_18"></th>
                                 <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                 <th class="cart-caption text-end heading_18">Price</th>
                               </tr>
                             </thead>

                             <tbody>
                                 @forelse ($order->item as $cart)
                                 <tr class="cart-item">
                                     <td class="cart-item-media">
                                       <div class="mini-img-wrapper">
                                           <img class="mini-img" src="{{ asset($cart->product->image) }}" alt="img">
                                       </div>
                                     </td>
                                     <td class="cart-item-details">
                                       <h2 class="product-title"><a href="#">{{ $cart->product->name }}</a></h2>
                                       <p class="product-vendor">{{ $cart->size->name }} / {{ $cart->color->name }}</p>
                                     </td>
                                     <td class="cart-item-quantity">
                                       <div>
                                         <div class="quantity d-flex align-items-center justify-content-between">
                                           <input class="qty-input" type="number" name="qty" value="{{ $cart->qty }}" min="0">
                                       </div>
                                       </div>
                                     </td>
                                     <td class="cart-item-price text-end">
                                       <div class="product-price"><span>&#8358;</span>{{ $cart->qty * $cart->product->price }}</div>
                                     </td>
                                   </tr>
                                 @empty
                                   <tr>
                                     <td colspan="4" style="text-align: center">No items in your shopping cart yet</td>
                                   </tr>
                                 @endforelse
                             </tbody>
                           </table>
                     </div>
                     <div class="col-lg-5 col-md-12 col-12">
                        <div class="cart-total-area">
                            <h3 class="cart-total-title d-none d-lg-block mb-0">Shipping Info</h4>
                            <div class="cart-total-box mt-4">
                                <div class="subtotal-item subtotal-box">
                                    <h4 class="subtotal-title">Phone:</h4>
                                    <p class="subtotal-value">{{ $order->phone }}</p>
                                </div>
                                <div class="subtotal-item shipping-box">
                                    <h4 class="subtotal-title">State:</h4>
                                    <p class="subtotal-value">{{ $order->state->name }}</p>
                                </div>
                                <div class="subtotal-item discount-box">
                                    <h4 class="subtotal-title">LGA:</h4>
                                    <p class="subtotal-value">{{ $order->lga->name }}</p>
                                </div>
                                <hr />
                                <h4 class="subtotal-title">Address:</h4>
                                <div class="subtotal-item discount-box">
                                    <p class="subtotal-value">{{ $order->address }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection