@props(['title', 'description', 'all_countries', 'all_categories'])

<section class="hero-section" data-scrollax-parent="true">
    <div class="bg-tabs-wrap">
        <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
            <!--ms-container-->
            <div class="slideshow-container" data-scrollax="properties: { translateY: '300px' }" >
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--ms_item-->
                        <div class="swiper-slide">
                            <div class="ms-item_fs fl-wrap full-height">
                                <div class="bg" data-bg="{{ asset('web_app/images/bg/agriculture.jpg') }}"></div>
                                <div class="overlay op7"></div>
                            </div>
                        </div>
                        <!--ms_item end-->
                        <!--ms_item-->
                        <div class="swiper-slide ">
                            <div class="ms-item_fs fl-wrap full-height">
                                <div class="bg" data-bg="{{ asset('web_app/images/bg/real_estate.jpg') }}"></div>
                                <div class="overlay op7"></div>
                            </div>
                        </div>
                        <!--ms_item end-->
                        <!--ms_item-->
                        <div class="swiper-slide">
                            <div class="ms-item_fs fl-wrap full-height">
                                <div class="bg" data-bg="{{ asset('web_app/images/bg/energy.jpg') }}"></div>
                                <div class="overlay op7"></div>
                            </div>
                        </div>
                        <!--ms_item end-->
                    </div>
                </div>
            </div>
            <!--ms-container end-->
        </div>
        <div class="slide-progress-wrap">
            <div class="slide-progress"></div>
        </div>
    </div>
    <div class="container small-container">

        {{-- hero title-text component --}}
        <x-app-general.hero-title :title='$title' :description='$description'/>
        {{-- hero title-text component end --}}

        <!-- main-search-input-tabs-->
        @include('partials.app-general._search_main', ['countries'=>$all_countries, 'categories'=>$all_categories])
        <!-- main-search-input-tabs end-->

        <div class="hero-categories fl-wrap" style="min-height: 75px !important;"></div>
    </div>
    <div class="header-sec-link">
        <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
    </div>
</section>
