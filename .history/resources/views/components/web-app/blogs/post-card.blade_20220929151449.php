{{-- bring in opportunit data into component using prop --}}
@props(['post'])

@php

    //current route
    $current_route = Route::currentRouteName();

@endphp

<!-- one article-item  -->
<article class="post-article">
    <div class="list-single-main-media fl-wrap">
        <img src="{{ asset($post->featured_image) }}" class="respimg" alt="">
    </div>
    <div class="list-single-main-item fl-wrap block_box">
        <h2 class="post-opt-title">
            <a href="{{ route('web-app.blog.blog-single', $post->slug) }}">{{ $post->title }}</a>
        </h2>
        <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
        <span class="fw-sblog-singlee, parator"></span>
        <div class="post-author">
            <a href="#">
                <img src="{{ asset($post->author->avatar) }}" alt="">
                    <span>By , {{ $post->author->name }}
                </span>
            </a>
        </div>
        <div class="post-opt">
            <ul class="no-list-style">
                <li><i class="fal fa-calendar"></i> <span>{{ $post->publish_date }}</span></li>
                <li><i class="fal fa-eye"></i> <span>264</span></li>
                <li>
                    <i class="fal fa-tags"></i>

                    @php

                        $tags_array = [];

                        foreach ($post->tags as $tag) {
                            $tags_array[] = '<a href="#">'. $tag->name .'</a>';
                        }

                        //dd(implode(", ", $tags_array));

                    @endphp

                    {{-- loop through all tags end --}}
                    {{ implode(", ", $tags_array) }}
                </li>
            </ul>
        </div>
        <a href="{{ route('web-app.blog.blog-single', $post->slug) }}" class="btn color2-bg  float-btn general-btn">
            Read more <i class="fal fa-angle-right"></i>
        </a>
    </div>
</article>
<!-- one article-item end -->

