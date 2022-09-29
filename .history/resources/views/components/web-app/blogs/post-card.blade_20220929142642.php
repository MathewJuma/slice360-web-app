{{-- bring in opportunit data into component using prop --}}
@props(['post'])

@php

    //current route
    $current_route = Route::currentRouteName();

@endphp

<!-- one article-item  -->
<article class="post-article">
    <div class="list-single-main-media fl-wrap">
        <img src="{{ asset('web_app/images/all/shell_petrol.jpg') }}" class="respimg" alt="">
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
        <a href="blog-single.html" class="btn color2-bg  float-btn general-btn">Read more<i class="fal fa-angle-right"></i></a>
    </div>
</article>
<!-- one article-item end -->

