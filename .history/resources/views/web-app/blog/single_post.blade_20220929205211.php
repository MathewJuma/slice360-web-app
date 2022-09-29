@php

    //set inital values
    $title = $post->title;

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
                            <!-- blog content-->
                            <div class="col-md-12">
                                <!-- begin :: load single post from a component -->
                                <x-web-app.blogs.single-post-card :post='$post'/>
                                <!-- begin :: load single post from a component -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <h3>Post Comments -  <span> 2 </span></h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap">
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item only-comments">
                                                <div class="review-comments-avatar">
                                                    <img src="images/avatar/1.jpg" alt="">
                                                </div>
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
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item only-comments">
                                                <div class="review-comments-avatar">
                                                    <img src="images/avatar/1.jpg" alt="">
                                                </div>
                                                <div class="reviews-comments-item-text fl-wrap">
                                                    <div class="reviews-comments-header fl-wrap">
                                                        <h4><a href="#">Adam Koncy</a></h4>
                                                    </div>
                                                    <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                    <div class="reviews-comments-item-footer fl-wrap">
                                                        <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>03 December 2017</span></div>
                                                        <a href="#" class="reply-item">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->
                                        </div>
                                    </div>
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
