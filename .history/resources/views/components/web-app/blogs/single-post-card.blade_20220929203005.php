{{-- bring in opportunit data into component using prop --}}
@props(['post'])

@php

    //current route
    $current_route = Route::currentRouteName();

@endphp

<!-- article> -->
<article class="post-article single-post-article">
    <div class="list-single-main-media fl-wrap">
        <img src="{{ asset($post->featured_image) }}" class="respimg" alt="">
    </div>
    <div class="list-single-main-item fl-wrap block_box">
        <h2 class="post-opt-title">
            <a href="{{ route('web-app.blog.blog-single', $post->slug) }}">{{ $post->title }}</a>
        </h2>
        <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>
        <div class="post-opt">
            <ul class="no-list-style">
                <li><i class="fal fa-calendar"></i> <span>25 April 2018</span></li>
                <li><i class="fal fa-eye"></i> <span>264</span></li>
                <li><i class="fal fa-tags"></i> <a href="#">Photography</a> , <a href="#">Design</a> </li>
            </ul>
        </div>
        <span class="fw-separator"></span>
        <div class="clearfix"></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio neque. Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>
        <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et</p>
        <blockquote>
            <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.</p>
        </blockquote>
        <p>Ut nec hinc dolor possim. An eros argumentum vel, elit diceret duo eu, quo et aliquid ornatus delicatissimi. Cu nam tale ferri utroque, eu habemus albucius mel, cu vidit possit ornatus eum. Eu ius postulant salutatus definitionem, an e trud erroribus explicari. Graeci viderer qui ut, at habeo facer solet usu. Pri choro pertinax indoctum ne, ad partiendo persecuti forensibus est.</p>
        <span class="fw-separator"></span>
        <div class="list-single-tags tags-stylwrap">
            <span class="tags-title"><i class="fas fa-tag"></i> Tags : </span>
            <a href="#">Hotel</a>
            <a href="#">Hostel</a>
            <a href="#">Room</a>
            <a href="#">Spa</a>
            <a href="#">Restourant</a>
            <a href="#">Parking</a>
        </div>
    </div>
</article>
<!-- article end -->
