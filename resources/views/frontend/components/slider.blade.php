    <!-- slideshow start -->
    <div class="slideshow-section position-relative">
        <div class="slideshow-active activate-slider" data-slick='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "dots": true,
            "arrows": true,
            "responsive": [
                {
                "breakpoint": 768,
                "settings": {
                    "arrows": false
                }
                }
            ]
        }'>
            @forelse ($sliders as $index => $slider)
            <div class="slide-item slide-item-bag position-relative">
                <img class="slide-img d-none d-md-block" src="{{ asset($slider->image) }}" alt="slide-{{ $index++ }}">
                <img class="slide-img d-md-none" src="{{ asset($slider->mini_image) }}" alt="slide-{{ $index++ }}">
                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center justify-content-end">
                        <div class="content-box slide-content slide-content-1 py-4">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                {{ $slider->title }}
                            </h2>
                            <p class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                {{ $slider->sub_title }}
                            </p>
                            <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                href="{{ route('shop') }}"
                                data-animation="animate__animated animate__fadeInUp">SHOP
                                NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse

        </div>
        <div class="activate-arrows"></div>
        <div class="activate-dots dot-tools"></div>
</div>
