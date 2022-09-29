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
        <div class="text-justify" style="text-align: justify !important; color: #878c9f !important;">{!! $post->excerpt !!}</div>
        <span class="fw-sblog-singlee, parator"></span>
        <div class="post-author">
            <a href="#">
                <img src="{{ asset($post->author->avatar) }}" alt="">
                    <span>By , {{ $post->author->name }}
                </span>
            </a>
        </div>
        <div class="post-opt">
            <ul class="no-list-style" style="color: #4db7fe !important; font-weight: 700 !important;">
                <li>
                        <i class="fal fa-calendar"></i>
                        <span>{{ \Carbon\Carbon::parse($post->publish_date)->format('d M Y') }}</span>
                </li>
                <li>
                    <i class="fal fa-eye"></i>
                    <span>264</span>
                </li>
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
                    {!! implode(", ", $tags_array) !!}
                </li>
            </ul>
        </div>
        <a href="{{ route('web-app.blog.blog-single', $post->slug) }}" class="btn color2-bg  float-btn general-btn">
            Read more <i class="fal fa-angle-right"></i>
        </a>
    </div>
</article>
<!-- one article-item end -->

