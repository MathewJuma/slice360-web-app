@props(['title', 'description', 'imageName'])

<!--section :: grow your wealth  -->
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
                                <div class="bg" data-bg="{{ asset('web_app/images/bg/' .$imageName) }}"></div>
                                <div class="overlay op7"></div>
                            </div>
                        </div>
                        <!--ms_item end-->
                    </div>
                </div>
            </div>
            <!--ms-container end-->
        </div>
    </div>
    <div class="container small-container">

        {{-- hero title-text component --}}
        <x-web-app-components.hero-title :title='$title' :description='$description' />
        {{-- hero title-text component end --}}

        <div class="hero-categories fl-wrap" style="min-height: 75px !important;"></div>
    </div>
    <div class="header-sec-link">
        <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
    </div>
</section>
<!--section end :: grow your wealth-->
