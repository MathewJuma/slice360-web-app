{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: grow your wealth :: hero -->
    <x-app-general.hero-main title='Grow your wealth' description='Discover investment opportunities across the globe that align with your vision' :all_countries='$all_countries' :all_categories='$all_categories' />
    <!--component end :: grow your wealth :: hero-->

    <!--section :: visitors favourites  -->
    <section>
        <div class="container big-container">
            <div class="section-title">
                <h2><span>Visitors Favourite Opportunities</span></h2>
                <div class="section-subtitle">Favourite Investment Opportunities</div>
                <span class="section-separator"></span>
                <p>Most people are interested in these investment opportunites. Don't be left behind.</p>
            </div>
            <div class="grid-item-holder gallery-items fl-wrap">
                <!--  gallery-item-->
                <div class="gallery-item ">
                    <!-- listing-item  -->
                    <div class="listing-item">
                        <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img">
                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                <img src="images/all/item-restaurant.jpg" alt="">
                                </a>
                                <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>
                                    <span class="avatar-tooltip">Added By  <strong>Alisa Noory</strong></span>
                                </div>
                                <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                <div class="geodir-category-opt">
                                    <div class="listing-rating-count-wrap">
                                        <div class="review-score">4.8</div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                        <br>
                                        <div class="reviews-count">12 reviews</div>
                                    </div>
                                </div>
                            </div>
                            <div class="geodir-category-content fl-wrap title-sin_item">
                                <div class="geodir-category-content-title fl-wrap">
                                    <div class="geodir-category-content-title-item">
                                        <h3 class="title-sin_map">
                                            <a href="listing-luxury-restaurant.html">Luxury Restaurant</a>
                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                <i class="fal fa-check"></i>
                                            </span>
                                        </h3>
                                        <div class="geodir-category-location fl-wrap">
                                            <a href="#" ><i class="fas fa-map-marker-alt"></i> Kigali, Rwanda</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="geodir-category-text fl-wrap">
                                    <p class="small-text">A highend restaurant setup in Kigali Rwanda, within the CBD.</p>
                                    <div class="facilities-list fl-wrap">
                                        <div class="facilities-list-title">Funding Details: </div>
                                        <ul class="no-list-style">
                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required"> $25,000
                                            </span>
                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                46%
                                            </span>
                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                6
                                            </span>
                                        </ul>
                                    </div>
                                </div>
                                <div class="geodir-category-footer fl-wrap">
                                    <a class="listing-item-category-wrap">
                                        <div class="listing-item-category yellow-bg"><i class="fal fa-cocktail"></i></div>
                                        <span>Hospitality</span>
                                    </a>
                                    <div class="geodir-opt-list">
                                        <ul class="no-list-style">
                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                            <li><a href="#1" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                                            <li>
                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': 'images/all/1.jpg'},{'src': 'images/all/1.jpg'}, {'src': 'images/all/1.jpg'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="price-level geodir-category_price">
                                        <span class="price-level-item" data-pricerating="2"></span>
                                        <span class="price-name-tooltip">Moderate</span>
                                    </div>
                                    <div class="geodir-category_contacts">
                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                        <ul class="no-list-style">
                                            <li>
                                                <span>
                                                    <i class="fal fa-phone"></i> Call :
                                                </span>
                                                <a href="#">+38099231212</a>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fal fa-envelope"></i> Write :
                                                </span>
                                                <a href="#">yourmail@domain.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- listing-item end -->
                </div>
                <!-- gallery-item  end-->
            </div>
        </div>
    </section>
    <!--section :: visitors favourites end -->

    <!--section :: slice360 walk-through  -->
    <section class="parallax-section" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="{{ asset('web_app/images/bg/video-bg.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <!--container-->
        <div class="container">
            <div class="video_section-title fl-wrap">
                <h2>Slice360 Walk-through</h2>
                <h4>Get ready to start an exciting journey on Slice360. This video will guide you through the amazing world of pooled investments through shared visions. Learn how to, and start your journey into this new experience right away.</h4>
            </div>
            <a href="https://vimeo.com/70851162" class="promo-link big_prom  image-popup"><i class="fal fa-play"></i><span>Slice360 Video</span></a>
        </div>
    </section>
    <!--section end  :: slice360 walk-through -->

    <!--section :: how it works -->
    <section data-scrollax-parent="true">
        <div class="container">
            <div class="section-title">
                <h2>How Slice360 Works</h2>
                <div class="section-subtitle">Discover &amp; Connect </div>
                <span class="section-separator"></span>
                <p>This investment platform connects pivot investors with aspiring investors based on shared visions, and helps them slice investment opportunities in small proportions</p>
            </div>
            <div class="process-wrap fl-wrap">
                <ul class="no-list-style">
                    <li>
                        <div class="process-item">
                            <span class="process-count">01 </span>
                            <div class="time-line-icon"><i class="fal fa-map-marker-alt"></i></div>
                            <h4> Pivot Investor</h4>
                            <p>Pitches an investment opportunity, accompanied by explicit proof and an estimate of capital requirements.</p>
                        </div>
                        <span class="pr-dec"></span>
                    </li>
                    <li>
                        <div class="process-item">
                            <span class="process-count">02</span>
                            <div class="time-line-icon"><i class="fal fa-handshake"></i></div>
                            <h4> Slice360</h4>
                            <p>Verifies business/investment opportunities, publishes them to the general public, and maintains smart contracts.</p>
                        </div>
                        <span class="pr-dec"></span>
                    </li>
                    <li>
                        <div class="process-item">
                            <span class="process-count">03</span>
                            <div class="time-line-icon"><i class="fal fa-layer-plus"></i></div>
                            <h4> Aspiring Investor</h4>
                            <p>Identifies investment opportunities, assists with raising required capital, and gains profits from their investments.</p>
                        </div>
                    </li>
                </ul>
                <div class="process-end"><i class="fal fa-check"></i></div>
            </div>
        </div>

        <div style="margin-top: 50px !important; margin-bottom: -50px !important;">
            <a href="{{ route('app-general.how-it-works') }}" class="btn color2-bg">View More Details<i class="fal fa-angle-right"></i></a>
        </div>
    </section>
    <!--section end :: how it works -->

    <!--section :: mobile app section -->
    <section class="gradient-bg hidden-section" data-scrollax-parent="true">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="colomn-text  pad-top-column-text fl-wrap">
                        <div class="colomn-text-title">
                            <h3>Mobile App Available</h3>
                            <p>Slice360 is avialable both on Apple Store and Google Playstore. Download into your mobile device and start your visionary investment journey.</p>
                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-apple"></i>  Apple Store </a>
                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-android"></i>  Google Play </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="collage-image">
                        <img src="{{ asset('web_app/images/api.png') }}" class="main-collage-image" alt="">
                        <div class="images-collage-title color2-bg icdec"> <img src="{{ asset('web_app/images/logo.png') }}"   alt=""></div>
                        <div class="images-collage_icon green-bg" style="right:-20px; top:120px;"><i class="fal fa-thumbs-up"></i></div>
                        <div class="collage-image-min cim_1"><img src="{{ asset('web_app/images/api/1.jpg') }}" alt=""></div>
                        <div class="collage-image-min cim_2"><img src="{{ asset('web_app/images/api/1.jpg') }}" alt=""></div>
                        <div class="collage-image-btn green-bg">Find Opportunity</div>
                        <div class="collage-image-input">Search <i class="fa fa-search"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
        <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
        <div class="circle-wrap" style="left:270px;top:120px;" data-scrollax="properties: { translateY: '-200px' }">
            <div class="circle_bg-bal circle_bg-bal_small"></div>
        </div>
        <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
            <div class="circle_bg-bal circle_bg-bal_big"></div>
        </div>
        <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
            <div class="circle_bg-bal circle_bg-bal_big"></div>
        </div>
        <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
            <div class="circle_bg-bal circle_bg-bal_middle"></div>
        </div>
        <div class="circle-wrap" style="right:40%;top:-10px;"  >
            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
        </div>
        <div class="circle-wrap" style="right:55%;top:90px;"  >
            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
        </div>
    </section>
    <!--section end :: mobile app section -->

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
                                        <div href="#" class="testi-link" target="_blank">{{ $testimonial->your_location }}</div>
                                        <div class="testimonilas-avatar fl-wrap">
                                            <h3>{{ $testimonial->testimonial_user->first_name . ' ' . $testimonial->testimonial_user->last_name }}</h3>
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
