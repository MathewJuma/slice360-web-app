@php

    //set inital values

    $all_blog_tags = [];
    foreach ($blog_tags as $tags) {

        $all_blog_tags[$tags->slug] = $tags->name;

    }

    $actual_blog_tags = [];
    foreach ($blog_posts as $post) {
        //find tages
        foreach($post->tags as $tags){
            $actual_blog_tags[$tags->slug] = $tags->name;
        }
    }

    //find where the two arrays intersect
    $blog_search_tags = array_intersect(array_unique($all_blog_tags), array_unique($actual_blog_tags));

    //paginate blogs posts
    //$blog_posts->paginate(1);

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: slice360 blog :: hero inner -->
    <x-app-general.hero-inner title='Slice360 Blog' description='Lastest news about opportunities form emerging markets and around the globe' imageName='about-us.jpg'/>
    <!--component end :: slice360 blog :: hero inner-->

    <section class="gray-bg no-top-padding-sec" id="sec1">
                        <div class="container">
                            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                                <a href="#">Home</a><a href="#">Pages</a> <span>Blog</span>
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
                                                <h2 class="post-opt-title"><a href="blog-single.html">Here???s What People Are Saying About Us.</a></h2>
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
                                        <!-- article> -->
                                        <article class="post-article">
                                            <div class="list-single-main-media fl-wrap">
                                                <img src="images/all/1.jpg" class="respimg" alt="">
                                            </div>
                                            <div class="list-single-main-item fl-wrap block_box">
                                                <h2 class="post-opt-title"><a href="blog-single.html">How to choose the right store.</a></h2>
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
                                                <a href="blog-single.html" class="btn  color2-bg float-btn">Read more<i class="fal fa-angle-right"></i></a>
                                            </div>
                                        </article>
                                        <!-- article end -->
                                        <!-- article> -->
                                        <article class="post-article">
                                            <div class="list-single-main-media fl-wrap">
                                                <img src="images/all/1.jpg" class="respimg" alt="">
                                            </div>
                                            <div class="list-single-main-item fl-wrap block_box">
                                                <h2 class="post-opt-title"><a href="blog-single.html">Best Hotel to Your Family .</a></h2>
                                                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                                                <span class="fw-separator"></span>
                                                <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                                <div class="post-opt">
                                                    <ul class="no-list-style">
                                                        <li><i class="fal fa-calendar"></i> <span>15 April 2019</span></li>
                                                        <li><i class="fal fa-eye"></i> <span>164</span></li>
                                                        <li><i class="fal fa-tags"></i> <a href="#">Shop</a> , <a href="#">Hotels</a> </li>
                                                    </ul>
                                                </div>
                                                <a href="blog-single.html" class="btn  color2-bg  float-btn">Read more<i class="fal fa-angle-right"></i></a>
                                            </div>
                                        </article>
                                        <!-- article end -->
                                        <!-- article> -->
                                        <article class="post-article">
                                            <div class="list-single-main-media fl-wrap">
                                                <img src="images/all/1.jpg" class="respimg" alt="">
                                            </div>
                                            <div class="list-single-main-item fl-wrap block_box">
                                                <h2 class="post-opt-title"><a href="blog-single.html">Best Restaurants in London.</a></h2>
                                                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                                                <span class="fw-separator"></span>
                                                <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                                <div class="post-opt">
                                                    <ul class="no-list-style">
                                                        <li><i class="fal fa-calendar"></i> <span>27 December 2017</span></li>
                                                        <li><i class="fal fa-eye"></i> <span>264</span></li>
                                                        <li><i class="fal fa-tags"></i> <a href="#">Cafe</a> , <a href="#">Travel</a> </li>
                                                    </ul>
                                                </div>
                                                <a href="blog-single.html" class="btn  color2-bg float-btn">Read more<i class="fal fa-angle-right"></i></a>
                                            </div>
                                        </article>
                                        <!-- article end -->
                                        <div class="pagination">
                                            <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>
                                            <a href="#">1</a>
                                            <a href="#" class="current-page">2</a>
                                            <a href="#">3</a>
                                            <a href="#">...</a>
                                            <a href="#">7</a>
                                            <a href="#" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- blog conten end-->
                                    <!-- blog sidebar -->
                                    <div class="col-md-4">
                                        <div class="box-widget-wrap fl-wrap fixed-bar">
                                            <!--box-widget-item -->
                                            <div class="box-widget-item fl-wrap block_box">
                                                <div class="box-widget-item-header">
                                                    <h3>Search In Blog</h3>
                                                </div>
                                                <div class="box-widget fl-wrap">
                                                    <div class="box-widget-content">
                                                        <div class="search-widget">
                                                            <form action="#" class="fl-wrap">
                                                                <input name="se" id="se" type="text" class="search" placeholder="Search.." value="" />
                                                                <button class="search-submit color2-bg" id="submit_btn"><i class="fal fa-search"></i> </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--box-widget-item end -->
                                            <!--box-widget-item -->
                                            <div class="box-widget-item fl-wrap block_box">
                                                <div class="box-widget-item-header">
                                                    <h3>Popular Posts</h3>
                                                </div>
                                                <div class="box-widget  fl-wrap">
                                                    <div class="box-widget-content">
                                                        <!--widget-posts-->
                                                        <div class="widget-posts  fl-wrap">
                                                            <ul class="no-list-style">
                                                                <li>
                                                                    <div class="widget-posts-img"><a href="blog-single.html"><img src="images/gallery/thumbnail/1.png" alt=""></a></div>
                                                                    <div class="widget-posts-descr">
                                                                        <h4><a href="listing-single.html">Nullam dictum felis</a></h4>
                                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fal fa-calendar"></i> 27 Mar 2019</a></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="widget-posts-img"><a href="blog-single.html"><img src="images/gallery/thumbnail/1.png" alt=""></a></div>
                                                                    <div class="widget-posts-descr">
                                                                        <h4><a href="listing-single.html">Scrambled it to mak</a></h4>
                                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fal fa-calendar"></i> 12 May 2018</a></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="widget-posts-img"><a href="blog-single.html"><img src="images/gallery/thumbnail/1.png" alt=""></a> </div>
                                                                    <div class="widget-posts-descr">
                                                                        <h4><a href="listing-single.html">Fermentum nis type</a></h4>
                                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fal fa-calendar"></i>22 Feb  2018</a></div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="widget-posts-img"><a href="blog-single.html"><img src="images/gallery/thumbnail/1.png" alt=""></a> </div>
                                                                    <div class="widget-posts-descr">
                                                                        <h4><a href="listing-single.html">Rutrum elementum</a></h4>
                                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fal fa-calendar"></i> 7 Mar 2017</a></div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- widget-posts end-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--box-widget-item end -->
                                            <!--box-widget-item -->
                                            <div class="box-widget-item fl-wrap">
                                                <div class="banner-wdget fl-wrap">
                                                    <div class="overlay"></div>
                                                    <div class="bg"  data-bg="images/bg/1.jpg"></div>
                                                    <div class="banner-wdget-content fl-wrap">
                                                        <h4>Whant to be notified about new post and news ? Subscribe For a Newsletter.</h4>
                                                        <a href="#subscribe" class="custom-scroll-link color-bg" > Sign up</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--box-widget-item end -->
                                            <!--box-widget-item -->
                                            <div class="box-widget-item fl-wrap block_box">
                                                <div class="box-widget-item-header">
                                                    <h3>Tags</h3>
                                                </div>
                                                <div class="box-widget fl-wrap">
                                                    <div class="box-widget-content">
                                                        <div class="list-single-tags tags-stylwrap">
                                                            <a href="#">Hotel</a>
                                                            <a href="#">Hostel</a>
                                                            <a href="#">Room</a>
                                                            <a href="#">Spa</a>
                                                            <a href="#">Restourant</a>
                                                            <a href="#">Parking</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--box-widget-item end -->
                                            <!--box-widget-item -->
                                            <div class="box-widget-item fl-wrap block_box">
                                                <div class="box-widget-item-header">
                                                    <h3>Categories</h3>
                                                </div>
                                                <div class="box-widget fl-wrap">
                                                    <div class="box-widget-content">
                                                        <ul class="cat-item no-list-style">
                                                            <li><a href="#">Standard</a> <span>3</span></li>
                                                            <li><a href="#">Video</a> <span>6 </span></li>
                                                            <li><a href="#">Gallery</a> <span>12 </span></li>
                                                            <li><a href="#">Quotes</a> <span>4</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--box-widget-item end -->
                                        </div>
                                    </div>
                                    <!-- blog sidebar end -->
                                </div>
                            </div>
                        </div>
                    </section>
</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
