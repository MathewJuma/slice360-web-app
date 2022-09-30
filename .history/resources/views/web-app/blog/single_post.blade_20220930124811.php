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
                                    @if ($post->comments->count() > 0)

                                        <div class="list-single-main-item_content" style="min-height: 400px !important; max-height: 800px !important;">
                                            <div class="description-holder scrollbar-inner2 text-left"  data-simplebar="init" data-simplebar-auto-hide="true" style="border: 0px solid red; width: 100% !important; min-height: 400px !important;">
                                                <div class="reviews-comments-wrap" style="width: 100% !important; margin-top: -5px !important;">
                                                    <!--begin :: post comments-->
                                                    @include('partials.web-app.blog._blog_comments', ['blog_comments'=>$post->comments])
                                                    <!--end :: post comments-->
                                                </div>
                                            </div>
                                        </div>

                                    @else

                                        <div class="list-single-main-item_content fl-wrap">
                                            <div class="reviews-comments-wrap" style="width: 100% !important;">
                                                <div class="row">
                                                    <div class="col-md-12 mt-3 mb-4">
                                                        <p style="text-align:center !important; font-size: 14px; color: #325096 !important;">
                                                            <i class="fa fa-exclamation-circle" style="font-size: 24px !important;"></i>&nbsp;&nbsp;
                                                            This post doesn't have any comments yet!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                </div>
                                <!-- end :: view blog comments -->

                                <!--begin :: add blog comment-->
                                <div class="list-single-main-item fl-wrap block_box" id="sec6">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Add Comment</h3>
                                    </div>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <style type="text/css">
                                            .error {
                                                color: #dc3545 !important;
                                                font-size: 13px !important;
                                                margin-top: -10px !important;
                                                margin-bottom: 10px !important;
                                            }

                                            #comments-error {
                                                margin-top: 10px !important;
                                            }
                                        </style>
                                        <!-- Review Comment -->
                                        <form action="javascript:void(0);" method="post" id="post_comment_form" class="add-comment  custom-form" name="post_comment_form" >
                                            @csrf
                                            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                                            <fieldset>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label><i class="fal fa-user"></i></label>
                                                            <input type="text" id="author" name="author" placeholder="Your Name *" value=""/>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label><i class="fal fa-envelope"></i>  </label>
                                                            <input type="text" id="email" name="email" placeholder="Email Address*" value=""/>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" id="comments" name="comments" placeholder="Your comment:"></textarea>
                                                    <div class="clearfix"></div>
                                                    <button class="btn  color2-bg  float-btn general-btn" type="submit" id="post_comment_submit" style="margin-top:30px;">
                                                        Submit Comment <i class="fal fa-paper-plane"></i>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                        <!-- Review Comment end -->
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

    {{-- this is the custom javascript --}}
    @push('custom_javascript')

        <script type="text/javascript">
            $(document).ready(function() {

                //process when the "opportunity_unfollow_submit" button is clicked
                $('#post_comment_form').click(function() {

                    //1. this is the opportunity follow login form
                    var post_comment_form = $('#post_comment_submit').parents('form');

                    //3. validate the "post_comment_form" form using jquery validator
                    $(post_comment_form).validate({

                        //3.1 validation rules
                        rules: {
                            author: "required",
                            email: "required",
                            comments: "required"
                        },

                        //3.2 validation response messages
                        messages: {
                            author: "Your name is required",
                            email: "Your email is required",
                            comments: "Your post comment is required"
                        },

                        //3.3 validation error highlight
                        highlight: function(element) {
                            $(element).addClass('error_colors');
                        },

                        //3.4 submission incase validation is passed
                        submitHandler: function() {

                            //1. create a new instance of the form with all form data having passed validation
                            form_data = new FormData(post_comment_form[0]);

                            //2. get all login form values
                            var _token = $("input[name='_token']").val();
                            var post_id = $('#post_id').val();
                            var author = $('#author').val();
                            var email = $('#email').val();
                            var comments = $('#comments').val();

                            //form data
                            var form_data = {
                                "_token" : _token,
                                "post_id": post_id,
                                "author": author,
                                "email" : email,
                                "comments" : comments,
                            }

                            //alert(JSON.stringify(form_data)); die();

                            //start process ajax code
                            $.ajax({
                                type: "POST",
                                url: "{{ route('web-app.blog.review-post') }}",
                                data: form_data,
                                cache: false,
                                //dataType: "JSON",
                                //processData: false,
                                //contentType: false,
                                success: function(response) {
                                    //check if response has error
                                    if($.isEmptyObject(response.exists)){

                                        if(response.success){

                                            //clear all the data
                                            $('#post_comment_form').each(function() {
                                                this.reset();
                                            });

                                            $('.jquery_nofications').fadeIn();
                                            $('.jquery_nofications').html(
                                                '<div class="add-list color-bg" id="jquery_nofications_wrapper">Thankyou for reviewing this post</div>'
                                            );

                                            setInterval('location.reload()',
                                            1500); //reload the whole page

                                            setTimeout(function() {
                                                $('.jquery_nofications').fadeOut();
                                            }, 5000);

                                        }

                                    }else if($.isEmptyObject(response.sucess)){

                                        if(response.exists){

                                            //clear all the data
                                            $('#post_comment_form').each(function() {
                                                this.reset();
                                            });

                                            $('.jquery_nofications').fadeIn();
                                            $('.jquery_nofications').html(
                                                '<div class="add-list color-bg" id="jquery_nofications_wrapper" style="color: #dc3545 !important; !important;">You have already reviewed this post. Thanksyou.</div>'
                                            );

                                            setInterval('location.reload()',
                                            1500); //reload the whole page

                                            setTimeout(function() {
                                                $('.jquery_nofications').fadeOut();
                                            }, 5000);

                                        }

                                    }else{

                                        $('.jquery_nofications').fadeIn();
                                        $('.jquery_nofications').html(
                                            '<div class="add-list color-bg" id="jquery_nofications_wrapper" style="color: #dc3545 !important; !important;">An error occurred. Try again later!</div>'
                                            );
                                        setTimeout(function() {
                                            $('.jquery_nofications').fadeOut();
                                        }, 5000);

                                    }
                                },
                                error: function(response){


                                }
                            });

                        }

                    });

                })

            });
        </script>

    @endpush

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
