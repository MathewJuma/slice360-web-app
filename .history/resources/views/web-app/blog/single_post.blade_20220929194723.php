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
            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs title">
                <a href="{{ route('app-general.home-page') }}">Home</a>
                <a href="{{ route('web-app.blog.blog-listing') }}">Blog</a>
                <span>Blog Article</span>
                <div  class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div>
            </div>
            <div class="share-holder hid-share sing-page-share top_sing-page-share">
                <div class="share-container  isShare"></div>
            </div>
            <div class="post-container fl-wrap">
                <div class="row">
                </div>
            </div>
        </div>
    </section>

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
