{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: grow your wealth :: hero -->
    <x-app-general.hero-main title='Grow your wealth' description='Discover investment opportunities across the globe that align with your vision' :all_countries='$all_countries' :all_categories='$all_categories' />
    <!--component end :: grow your wealth :: hero-->

    <!--section :: latest opportunities -->
    <section class="slw-sec" id="sec1">
        <div class="section-title">
            <h2>The Latest Opportunities</h2>
            <div class="section-subtitle">Newest Opportunities</div>
            <span class="section-separator"></span>
            <p>Explore lastest opportunities. Find your dream investment opportunity, and slice a portion of it.</p>
        </div>
        <div class="listing-slider-wrap fl-wrap">
            <div class="listing-slider fl-wrap">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        {{-- loop through each opportunity --}}
                        @foreach ($all_opportunities->take(15) as $opportunity )
                            <x-app-general.index_page.latest-opportunities :opportunity='$opportunity' :all_countries='$all_countries' :all_categories='$all_categories' />
                        @endforeach
                        {{-- loop through each opportunity end--}}

                    </div>
                </div>
                <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
                <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
            </div>
            <div class="tc-pagination_wrap">
                <div class="tc-pagination2"></div>
            </div>
        </div>
    </section>
    <!--section end :: latest opportunities -->

    <div class="sec-circle fl-wrap"></div>

    <!--section :: popular categories -->
    <section  class="gray-bg hidden-section particles-wrapper">
        <div class="container">
            <div class="section-title">
                <h2>Explore Popular Categories</h2>
                <div class="section-subtitle">Catalog of Opportunities</div>
                <span class="section-separator"></span>
                <p>Explore categories of popular investment opportunities from around the world</p>
            </div>
            <div class="listing-item-grid_container fl-wrap">
                <div class="row">
                    {{-- loop through each category --}}
                    @foreach ($popular_categories as $category)

                        <!--  listing-item-grid  -->
                        <div class="col-sm-4">
                            <div class="listing-item-grid">
                                <div class="bg"  data-bg="{{ asset('web_app/images/all/agriculture.jpg') }}"></div>
                                <div class="d-gr-sec"></div>
                                <div class="listing-counter color2-bg" style="font-weight: 700 !important;">
                                    <span>{{ $category->category_opportunities_count }}</span>Opportunities
                                </div>
                                <div class="listing-item-grid_title">
                                    <h3><a href="/opportunities?interest=&category_id={{ $category->id }}&country_id=All+Locations">{{ $category->name }}</a></h3>
                                    <p>{!! $category->category_note !!}</p>
                                </div>
                            </div>
                        </div>
                        <!--  listing-item-grid end  -->

                    @endforeach
                    {{-- loop through each category end --}}
                </div>
                <div class="row" style="margin-bottom: 0px !important;">
                    <div class="col-md-12">
                        {{-- pagination section --}}
                        {{ $popular_categories->links('pagination::slice360-custom') }}
                        {{-- pagination section end --}}
                    </div>
                </div>
                <div class="row" style="margin-top: 40px !important; margin-bottom: -120px !important;">
                    <div class="col-md-12">
                        <a href="{{ route('web-app.opportunities.list-opportunities') }}" class="btn dec_btn color2-bg general-btn">View All Categories<i class="fal fa-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end :: popular categories end-->

    <!--section :: sites statistics -->
    <section class="parallax-section small-par" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="{{ asset('web_app/images/bg/statistics.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay  op7"></div>
        <div class="container">
            <div class=" single-facts single-facts_2 fl-wrap">
                <x-app-general.index_page.general-statistics :all_opportunities='$all_opportunities' :new_monthly_visitors='$new_monthly_visitors'  />
            </div>
        </div>
    </section>
    <!--section end :: sites statistics -->

    <!--section :: visitors favourites  -->
    <section>
        <div class="container big-container">
            <div class="section-title">
                <h2><span>Visitors Favourite Opportunities</span></h2>
                <div class="section-subtitle">Favourite Investment Opportunities</div>
                <span class="section-separator"></span>
                <p>Most people are interested in these investment opportunites. Don't be left behind.</p>
            </div>
            @if (count($popular_opportunities) === 0)
                <!-- actual listing content -->
                <div class="fl-wrap">
                    <!-- listing-item-container -->
                    <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic three-columns-grid" style="border:0px solid red; margin-top: -25px !important; margin-bottom: -10px !important;">
                        <div class="section-title" style="padding-top: 50px !important;">
                            <h2 style="color: #4db7fe !important; fon-size: 30px !important;">No investment opportunities found!</h2>
                        </div>
                    </div>
                    <!-- listing-item-container end-->
                </div>
                <!-- actual listing content end-->
            @else
                <!-- actual listing content -->
                <div class="grid-item-holder gallery-items fl-wrap" style="margin-bottom: 0px !important; margin-top: -15px !important;">

                    @php
                        //opportunity_with_views
                        $opportunity_with_views = 0;

                    @endphp

                    {{-- loop through each opportunity --}}
                    @foreach ($popular_opportunities as $opportunity)

                        {{-- process only for opportunities with views --}}
                        @if ($opportunity->views_count > 0)

                            {{-- increament $opportunity_with_views --}}
                            @php
                                $opportunity_with_views ++;
                            @endphp

                            <!-- begin :: load listing from a component -->
                            <x-web-app.opportunities.index-opportunity-card :opportunity='$opportunity' :all_countries='$all_countries' :all_categories='$all_categories' />
                            <!-- begin :: load listing from a component -->
                        @endif
                        {{-- process only for opportunities with views end--}}

                    @endforeach
                    {{-- loop through each opportunity end --}}

                </div>
                <!-- actual listing content end -->

                {{-- show pagination only if opportunity with views > 0 --}}
                @if ($opportunity_with_views > 0)

                    <div class="row" style="margin-bottom: -60px !important;">
                        <div class="col-md-12">
                            {{-- pagination section --}}
                            {{ $popular_opportunities->links('pagination::slice360-custom') }}
                            {{-- pagination section end --}}
                        </div>
                    </div>

                @endif
                {{-- show pagination only if opportunity with views > 0 end--}}

            @endif
        <!-- listing-item-container end-->

        </div>
    </section>
    <!--section :: visitors favourites end -->

    <!--section :: slice360 walk-through  -->
    <x-app-general.index_page.walk-through />
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
            <a href="{{ route('app-general.how-it-works') }}" class="btn color2-bg general-btn">View More Details<i class="fal fa-angle-right"></i></a>
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
    @if ($testimonials->count() > 0)
        <x-app-general.index_page.testimonials :testimonials='$testimonials' />
    @endif
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
