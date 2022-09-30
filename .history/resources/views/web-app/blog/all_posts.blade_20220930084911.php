@php

    //set inital values

    $all_blog_tags = [];
    foreach ($blog_tags as $tags) {

        $all_blog_tags[$tags->slug] = $tags->name;

    }

    print_r($all_blog_tags); exit();

    //tags in blogs
    $overall_tags = array_unique($all_blog_tags);

    $actual_tags = [];
    foreach ($blog_posts as $post) {
        //find tages
        foreach($post->tags as $tags){
            $actual_tags[$tags->slug] = $tags->name;
        }
    }
    //tags in blogs
    $tags_in_blogs = array_unique($actual_tags);


    //paginate blogs posts
    $blog_posts->paginate(12);

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: slice360 blog :: hero inner -->
    <x-app-general.hero-inner title='Slice360 Blog' description='Lastest news about opportunities form emerging markets and around the globe' imageName='about-us.jpg'/>
    <!--component end :: slice360 blog :: hero inner-->

    <section class="gray-bg no-top-padding-sec" id="sec1">
        <div class="container">
            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                <a href="{{ route('app-general.home-page') }}">Home</a>
                <span class="current-breadcrumbs">Blog</span>
                <div  class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div>
            </div>
            <div class="share-holder hid-share sing-page-share top_sing-page-share">
                <div class="share-container  isShare"></div>
            </div>
            <div class="post-container fl-wrap">
                <div class="row">
                    <!-- blog content-->
                    <div class="col-md-8">

                        {{-- loop through each blog and process the content --}}
                        @foreach ($blog_posts as $post)

                            <!-- begin :: load post from a component -->
                            <x-web-app.blogs.post-card :post='$post'/>
                            <!-- begin :: load post from a component -->

                        @endforeach
                        {{-- loop through each blog and process the content end--}}

                    </div>
                    <!-- blog content end-->

                    <!-- blog sidebar -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap fl-wrap fixed-bar">

                            <!-- blog-search_container -->
                            @include('partials.web-app.blog._search_blog')
                            <!-- blog-search_container  end -->

                            <!-- blog-tags_container -->
                            @include('partials.web-app.blog._blog_tags', ['blog_tags'=>$blog_tags])
                            <!-- blog-tags_container  end -->

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
