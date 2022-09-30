@php

    //set inital values
    $title = $post->title;

    //set inital values

    $all_blog_tags = [];
    foreach ($blog_tags as $tags) {

        $all_blog_tags[$tags->slug] = $tags->name;

    }

    $actual_blog_tags = []; //find tages
    foreach($post->tags as $tags){

        $actual_blog_tags[$tags->slug] = $tags->name;

    }

    //find where the two arrays intersect
    $blog_search_tags = array_intersect(array_unique($all_blog_tags), array_unique($actual_blog_tags));

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: slice360 blog :: hero inner -->
    <x-app-general.hero-inner title='Blog Article' :description='$title' imageName='about-us.jpg'/>
    <!--component end :: slice360 blog :: hero inner-->

    <section class="gray-bg no-top-padding-sec" id="sec1">
        <div class="container">
            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                <a href="{{ route('app-general.home-page') }}">Home</a>
                <a href="{{ route('web-app.blog.blog-listing') }}">Blog</a>
                <span class="current-breadcrumbs">Blog Article</span>
                <div  class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div>
            </div>
            <div class="share-holder hid-share sing-page-share top_sing-page-share">
                <div class="share-container  isShare"></div>
            </div>
            <div class="post-container fl-wrap">
                <div class="row">
                    <div class="post-container fl-wrap">
                        <div class="row">
                            <!-- begin :: blog content-->
                            <div class="col-md-8">
                                <!-- begin :: load single post from a component -->
                                <x-web-app.blogs.single-post-card :post='$post'/>
                                <!-- begin :: load single post from a component -->

                                <!-- begin :: view blog comments -->
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Post Comments -  <span> {{ $post->comments->count() }} </span></h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                            @if ($post->comments->count() > 0)

                                                <!-- reviews-comments-item -->
                                                <div class="reviews-comments-item only-comments" style="padding-left: 0px !important;">
                                                    <div class="reviews-comments-item-text fl-wrap">
                                                        <div class="reviews-comments-header fl-wrap">
                                                            <h4><a href="#">Liza Rose</a></h4>
                                                        </div>
                                                        <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                        <div class="reviews-comments-item-footer fl-wrap">
                                                            <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>12 April 2018</span></div>
                                                            <a href="#" class="reply-item">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--reviews-comments-item end-->

                                            @else

                                                <div class="row">
                                                        <div class="col-md-12 mt-3 mb-4">
                                                            <p style="text-align:center !important; font-size: 14px; color: #325096 !important;">
                                                                <i class="fa fa-exclamation-circle" style="font-size: 24px !important;"></i>&nbsp;&nbsp;
                                                                This post doesn't have any comments yet!
                                                            </p>
                                                        </div>
                                                </div>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- end :: view blog comments -->

                                <!--begin :: add blog comment-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec6">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Add Comment</h3>
                                    </div>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <!-- Review Comment -->
                                        <form id="add-comment" class="add-comment  custom-form" name="rangeCalc" >
                                            <fieldset>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label><i class="fal fa-user"></i></label>
                                                            <input type="text" placeholder="Your Name *" value=""/>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label><i class="fal fa-envelope"></i>  </label>
                                                            <input type="text" placeholder="Email Address*" value=""/>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" placeholder="Your comment:"></textarea>
                                                    <div class="clearfix"></div>
                                                    <button class="btn  color2-bg  float-btn" style="margin-top:30px;">Submit Comment <i class="fal fa-paper-plane"></i></button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <!-- Add Review Box / End -->
                                </div>
                                <!--end :: add blog comment-->
                            </div>
                            <!-- end :: blog content-->

                            <div class="col-md-4">
                                <div class="box-widget-wrap fl-wrap fixed-bar">

                                    <!-- blog-search_container -->
                                    @include('partials.web-app.blog._search_blog')
                                    <!-- blog-search_container  end -->

                                    <!-- blog-tags_container -->
                                    @include('partials.web-app.blog._blog_tags', ['blog_tags'=>$blog_search_tags])
                                    <!-- blog-tags_container  end -->

                                    <!-- blog-tags_container -->
                                    @include('partials.web-app.opportunities._popular_categories', ['popular_categories'=>$popular_categories])
                                    <!-- blog-tags_container  end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
