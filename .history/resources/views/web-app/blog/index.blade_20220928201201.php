@php

    //set inital values

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: slice360 blog :: hero inner -->
    <x-app-general.hero-inner title='Slice360 Blog' description='Lastest news about opportunities form emerging markets and around the globe' imageName='about-us.jpg'/>
    <!--component end :: slice360 blog :: hero inner-->

    <section class="gray-bg no-top-padding-sec" id="sec1">
        <div class="container">
            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                <a href="{{ route('app-general.home-page') }}">Home</a><span>Blog</span>
                <div  class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div>
            </div>
            <div class="share-holder hid-share sing-page-share top_sing-page-share">
                <div class="share-container  isShare"></div>
            </div>
            <div class="post-container fl-wrap">
                <div class="row">
                    <!-- blog content-->
                    <div class="col-md-8">
                        <!-- article> -->
                        <article class="post-article">
                            <div class="list-single-main-media fl-wrap">
                                <div class="single-slider-wrap">
                                    <div class="single-slider fl-wrap">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper lightgallery">
                                                <div class="swiper-slide hov_zoom"><img src="images/all/1.jpg" alt=""><a href="images/all/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                <div class="swiper-slide hov_zoom"><img src="images/all/1.jpg" alt=""><a href="images/all/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                <div class="swiper-slide hov_zoom"><img src="images/all/1.jpg" alt=""><a href="images/all/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listing-carousel_pagination">
                                        <div class="listing-carousel_pagination-wrap">
                                            <div class="ss-slider-pagination"></div>
                                        </div>
                                    </div>
                                    <div class="ss-slider-cont ss-slider-cont-prev color2-bg"><i class="fal fa-long-arrow-left"></i></div>
                                    <div class="ss-slider-cont ss-slider-cont-next color2-bg"><i class="fal fa-long-arrow-right"></i></div>
                                </div>
                            </div>
                            <div class="list-single-main-item fl-wrap block_box">
                                <h2 class="post-opt-title"><a href="blog-single.html">Here’s What People Are Saying About Us.</a></h2>
                                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                                <span class="fw-separator"></span>
                                <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                <div class="post-opt">
                                    <ul class="no-list-style">
                                        <li><i class="fal fa-calendar"></i> <span>25 April 2018</span></li>
                                        <li><i class="fal fa-eye"></i> <span>264</span></li>
                                        <li><i class="fal fa-tags"></i> <a href="#">Photography</a> , <a href="#">Design</a> </li>
                                    </ul>
                                </div>
                                <a href="blog-single.html" class="btn color2-bg  float-btn">Read more<i class="fal fa-angle-right"></i></a>
                            </div>
                        </article>
                        <!-- article end -->
                    </div>
                    <!-- blog content end-->
                </div>
            </div>
        </div>
    </section>



</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
