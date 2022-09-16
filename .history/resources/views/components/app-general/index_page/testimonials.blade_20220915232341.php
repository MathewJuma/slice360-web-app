<section>
    <div class="container">
        <div class="section-title">
            <h2> Testimonials</h2>
            <div class="section-subtitle">Clients Reviews</div>
            <span class="section-separator"></span>
            <p>Feedback from pivot and aspiring investors who have trusted the processes of Slice360</p>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="testimonilas-carousel-wrap fl-wrap">
        <div class="listing-carousel-button listing-carousel-button-next"><i class="fas fa-caret-right"></i></div>
        <div class="listing-carousel-button listing-carousel-button-prev"><i class="fas fa-caret-left"></i></div>
        <div class="testimonilas-carousel">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    @foreach ($testimonials as $testimonial)
                        <!--testimonial-item-->
                        <div class="swiper-slide">
                            <div class="testi-item fl-wrap">
                                <div class="testi-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                <div class="testimonilas-text fl-wrap">
                                    <div class="listing-rating card-popup-rainingvis"
                                        data-starrating2="{{ $testimonial->platform_rating }}"></div>
                                    <p>"{{ $testimonial->testimonial_message }}"</p>
                                    <div href="#" class="testi-link" target="_blank">
                                        {{ $testimonial->your_location }}</div>
                                    <div class="testimonilas-avatar fl-wrap">
                                        <h3>{{ $testimonial->testimonial_user->first_name . ' ' . $testimonial->testimonial_user->last_name }}
                                        </h3>
                                        <h4>{{ $testimonial->business_role }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--testimonial-item end-->
                    @endforeach

                </div>
            </div>
        </div>
        <div class="tc-pagination"></div>
    </div>
    <div class="waveWrapper waveAnimation">
        <div class="waveWrapperInner bgMiddle">
            <div class="wave-bg-anim waveMiddle" style="background-image: url('images/wave-top.png')"></div>
        </div>
        <div class="waveWrapperInner bgBottom">
            <div class="wave-bg-anim waveBottom" style="background-image: url('images/wave-top.png')"></div>
        </div>
    </div>
</section>
