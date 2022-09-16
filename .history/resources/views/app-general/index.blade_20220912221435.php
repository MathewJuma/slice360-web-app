{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: grow your wealth :: hero -->
    <x-app-general.hero-main title='Grow your wealth' description='Discover investment opportunities across the globe that align with your vision' :all_countries='$all_countries' :all_categories='$all_categories' />
    <!--component end :: grow your wealth :: hero-->

    <!--section :: testimonials  -->
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
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $testimonial->platform_rating }}"></div>
                                        <p>"{{ $testimonial->testimonial_message }}"</p>
                                        <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                        <div class="testimonilas-avatar fl-wrap">
                                            <h3>Ariel Krosti</h3>
                                            <h4>Matatu Owner</h4>
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
    <!--section end :: testimonials -->

    <!-- partners section  -->
    <section class="gray-bg">
        <div class="container">
            <div class="clients-carousel-wrap fl-wrap">
                <div class="cc-btn   cc-prev"><i class="fal fa-angle-left"></i></div>
                <div class="cc-btn cc-next"><i class="fal fa-angle-right"></i></div>
                <div class="clients-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!--client-item-->
                            <div class="swiper-slide">
                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                            </div>
                            <!--client-item end-->
                            <!--client-item-->
                            <div class="swiper-slide">
                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                            </div>
                            <!--client-item end-->
                            <!--client-item-->
                            <div class="swiper-slide">
                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                            </div>
                            <!--client-item end-->
                            <!--client-item-->
                            <div class="swiper-slide">
                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                            </div>
                            <!--client-item end-->
                            <!--client-item-->
                            <div class="swiper-slide">
                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                            </div>
                            <!--client-item end-->
                            <!--client-item-->
                            <div class="swiper-slide">
                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                            </div>
                            <!--client-item end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--partners section end-->
</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
