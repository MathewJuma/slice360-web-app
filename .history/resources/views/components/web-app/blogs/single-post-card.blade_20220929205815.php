{{-- bring in opportunit data into component using prop --}}
@props(['post'])

@php

    //current route
    $current_route = Route::currentRouteName();

@endphp

<!-- article> -->
<article class="post-article single-post-article">
    <div class="list-single-main-media fl-wrap">
        <img src="{{ asset($post->featured_image) }}" class="respimg" alt="" style="height:75%">
    </div>
    <div class="list-single-main-item fl-wrap block_box">
        <h2 class="post-opt-title">
            <a href="{{ route('web-app.blog.blog-single', $post->slug) }}">{{ $post->title }}</a>
        </h2>
        <div class="post-author">
            <a href="#">
                <img src="{{ asset($post->author->avatar) }}" alt="">
                    <span>By , {{ $post->author->name }}
                </span>
            </a>
        </div>
        <div class="post-opt">
            <ul class="no-list-style" style="color: #878c9f !important; font-weight: 700 !important;">
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

                    @endphp
                    {{-- loop through all tags end --}}
                    {!! implode(", ", $tags_array) !!}
                </li>
            </ul>
        </div>
        <span class="fw-separator"></span>
        <div class="clearfix"></div>
        <div class="blog-body">{!! $post->body !!}</div>
        <span class="fw-separator"></span>
        <div class="list-single-tags tags-stylwrap">
            <span class="tags-title"><i class="fas fa-tag"></i> Tags : </span>

            {{-- loop through each tag name --}}
            @foreach ($post->tags as $tag)
                <a href="#">{{ $tag->name }}</a>
            @endforeach
            {{-- loop through each tag name end --}}

        </div>
    </div>
</article>
<!-- article end -->
