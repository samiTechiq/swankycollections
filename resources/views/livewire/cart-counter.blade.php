<div>
<a class="header-action-item header-cart ms-4" href="#drawer-cart"
    data-bs-toggle="offcanvas">
    <svg class="icon icon-cart" width="24" height="26" viewBox="0 0 24 26" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
            fill="black" />
    </svg>
    <span class="badge rounded-pill bg-warning">{{ $cartCount }}</span>
</a>

<div class="offcanvas offcanvas-end" tabindex="-1" id="drawer-cart">
    <div class="offcanvas-header border-btm-black">
        <h5 class="cart-drawer-heading text_16">Your Cart ({{ $cartCount }})</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="cart-content-area d-flex justify-content-between flex-column">
            <div class="minicart-loop custom-scrollbar">
                <!-- minicart item -->
                @forelse ($carts as $cart)
                <div class="minicart-item d-flex">
                    <div class="mini-img-wrapper">
                        <img class="mini-img" src="{{ asset($cart->product->image) }}" alt="img">
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="#">{{ $cart->product->name }}</a></h2>
                        <p class="product-vendor">{{ $cart->size->name }} / {{ $cart->color->name }}</p>
                        <div class="misc d-flex align-items-end justify-content-between">
                            <div class="quantity d-flex align-items-center justify-content-between">
                                <input class="qty-input" type="number" value="{{ $cart->qty }}" min="0">
                            </div>
                            <div class="product-remove-area d-flex flex-column align-items-end">
                                <div class="product-price"><span>&#8358;</span>{{ $cart->qty * $cart->product->price }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="cart-empty-area text-center py-5">
                    <div class="cart-empty-icon pb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                            >
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                    </div>
                    <p class="cart-empty">You have no items in your cart</p>
                </div>
                @endforelse
            </div>
            <div class="minicart-footer">
                <div class="minicart-calc-area">
                    <div class="minicart-calc d-flex align-items-center justify-content-between">
                        <span class="cart-subtotal mb-0">Subtotal</span>
                        <span class="cart-subprice"><span>&#8358;</span>{{ $subtotal }}</span>
                    </div>
                </div>
                <div class="minicart-btn-area d-flex align-items-center justify-content-between">
                    <a href="{{ route('cart') }}" class="minicart-btn btn-secondary">View Cart</a>
                    <a href="{{ route('checkout') }}" class="minicart-btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
