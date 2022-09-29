@php

    //set inital values

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: slice360 blog :: hero inner -->
    <x-app-general.hero-inner title='Slice360 Blog' description='Lastest news about opportunities form emerging markets and around the globe' imageName='about-us.jpg'/>
    <!--component end :: slice360 blog :: hero inner-->

    <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
        <a href="#">Home</a><a href="#">Pages</a> <span>Blog</span>
        <div  class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div>
    </div>
    <div class="share-holder hid-share sing-page-share top_sing-page-share">
        <div class="share-container  isShare"></div>
    </div>


</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
