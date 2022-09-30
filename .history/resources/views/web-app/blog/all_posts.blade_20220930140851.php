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

                        @if ($blog_posts->count() > 0)

                            {{-- pagination section --}}
                            {{ $blog_posts->links('pagination::slice360-custom') }}

                        @endif

                    </div>
                    <!-- blog content end-->

                    <!-- blog sidebar -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap fl-wrap fixed-bar fixbar-action" style="z-index: 12; position: fixed; top: 20px;">

                            <!-- blog-search_container -->
                            @include('partials.web-app.blog._search_blog')
                            <!-- blog-search_container  end -->

                            <!-- blog-tags_container -->
                            @include('partials.web-app.blog._blog_tags', ['blog_tags'=>$blog_search_tags])
                            <!-- blog-tags_container  end -->

                            <!-- blog-tags_container -->
                            @include('partials.web-app.opportunities._popular_categories', ['popular_categories'=>$popular_categories])
                            <!-- blog-tags_container  end -->

                            <!-- blog-new-subscription_container -->
                            @include('partials.web-app.blog._news_subscription')
                            <!-- blog-new-subscription_container  end -->

                        </div>
                    </div>
                    <!-- blog sidebar end -->
                </div>
            </div>
        </div>
    </section>



</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
