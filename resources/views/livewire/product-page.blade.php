<section>
    <div class="product-page mt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div wire:ignore>
                        <div class="product-gallery product-gallery-vertical d-flex">
                            <div class="product-img-large">
                                <div class="img-large-slider common-slider" data-slick='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "dots": false,
                                    "arrows": false,
                                    "asNavFor": ".img-thumb-slider"
                                }'>
                                    @forelse ($productList as $list)
                                    <div class="img-large-wrapper">
                                        <a href="{{ asset($list->image) }}" data-fancybox="gallery">
                                            <img src="{{ asset($list->image) }}" alt="img">
                                        </a>
                                    </div>
                                    @empty
                                    <div class="img-large-wrapper">
                                        <a href="{{ asset($product->image) }}" data-fancybox="gallery">
                                            <img src="{{ asset($product->image) }}" alt="img">
                                        </a>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="product-img-thumb">
                                <div class="img-thumb-slider common-slider" data-vertical-slider="true" data-slick='{
                                    "slidesToShow": 5,
                                    "slidesToScroll": 1,
                                    "dots": false,
                                    "arrows": true,
                                    "infinite": false,
                                    "speed": 300,
                                    "cssEase": "ease",
                                    "focusOnSelect": true,
                                    "swipeToSlide": true,
                                    "asNavFor": ".img-large-slider"
                                }'>
                                @foreach ($productList as $list)
                                <div>
                                    <div class="img-thumb-wrapper">
                                        <img src="{{ asset($list->image) }}" alt="img">
                                    </div>
                                </div>
                                @endforeach
                                </div>
                                <div class="activate-arrows show-arrows-always arrows-white d-none d-lg-flex justify-content-between mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-details ps-lg-4">
                        <div class="mb-3">
                            @if ($product->qty == 0)
                            <span class="product-availability bg-danger">Out of Stock</span>
                            @else
                            <span class="product-availability">In Stock</span>
                            @endif
                        </div>
                        <h2 class="product-title mb-3">{{ $product->name }}</h2>

                        <div class="product-price-wrapper mb-5">
                            <span class="product-price regular-price"><span>&#8358;</span>{{ $product->price }}</span>
                        </div>


                        <div class="product-variant-wrapper mt-5">
                            <!---color--->
                            <div class="product-variant product-variant-color">
                                <strong class="label mb-1 d-block">Color:</strong>
                                <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">
                                  <select wire:model="color" class="form-select @error('color') is-invalid @enderror">
                                    <option value="">select</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('color')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </ul>
                            </div>
                            <!---size--->
                            <div class="product-variant product-variant-other">
                                <strong class="label mb-1 d-block">Size:</strong>

                                <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">
                                    <select wire:model="size" class="form-select @error('size') is-invalid @enderror">
                                        <option value="">select</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                    </select>
                                    @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </ul>
                            </div>
                            <!---qty--->
                            <div class="product-variant product-variant-other">
                                <strong class="label mb-1 d-block">Quantity:</strong>

                                <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">

                                <select class="form-select @error('qty') is-invalid @enderror" wire:model="qty">
                                    <option value="">select</option>
                                   @for ($i = 1; $i <= $product->qty; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                   @endfor
                                </select>
                                    @error('qty')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </ul>
                            </div>
                        </div>

                        @if ($product->qty == 0)
                        <form class="product-form" action="#">
                            <div class="product-form-buttons  mt-4">
                                <button type="button" disabled class="position-relative btn-atc btn-add-to-cart loader">
                                    OUT OF STOCK
                                </button>
                            </div>
                        </form>
                        @else
                        <form class="product-form" action="#">
                            <div class="product-form-buttons  mt-4">
                                <button type="button" wire:click="cartAdd" class="position-relative btn-atc btn-add-to-cart loader">
                                    <span wire:loading.remove >ADD TO CART</span>
                                    <span wire:loading>ADDING TO CART...</span>
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product tab start -->
    <div class="product-tab-section mt-100" data-aos="fade-up" data-aos-duration="700">
        <div class="container">
            <div class="tab-list product-tab-list">
                <nav class="nav product-tab-nav">
                    <a class="product-tab-link tab-link active" href="#pdescription" data-bs-toggle="tab">Description</a>
                </nav>
            </div>
            <div class="tab-content product-tab-content">
                <div id="pdescription" class="tab-pane fade show active">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-12">
                            <div class="desc-content">
                                <p class="text_16 mb-4">{{ $product->descriptions }}</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="desc-img">
                                <img src="{{ asset($product->image) }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab end -->
    <!-- you may also like start -->
    <div class="featured-collection-section mt-100 home-section overflow-hidden">
       <div wire:ignore>
        <div class="container">
            <div class="section-header">
                <h2 class="section-heading">You may also like</h2>
            </div>

            <div class="product-container position-relative">
                <div class="common-slider" data-slick='{
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "dots": false,
                "arrows": true,
                "responsive": [
                {
                    "breakpoint": 1281,
                    "settings": {
                    "slidesToShow": 3
                    }
                },
                {
                    "breakpoint": 768,
                    "settings": {
                    "slidesToShow": 2
                    }
                }
                ]
            }'>

            @foreach ($products as $product)
            <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                <div class="product-card">
                    <div class="product-card-img">
                        <a class="hover-switch" href="{{ route('product.detail', $product->id) }}">
                            <img class="secondary-img" src="{{ asset($product->image) }}"
                                alt="product-img">
                            <img class="primary-img" src="{{ asset($product->image) }}"
                                alt="product-img">
                        </a>
                        <a href="wishlist.html" class="wishlist-btn card-wishlist">
                            <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                    fill="black" />
                            </svg>
                        </a>
                    </div>
                    <div class="product-card-details text-center">
                        <h3 class="product-card-title">
                            <a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="product-card-price">
                            <span class="card-price-regular"><span>&#8358;</span>{{ $product->price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                </div>
                <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
            </div>
        </div>
       </div>
    </div>
    <!-- you may also lik end -->
</section>

