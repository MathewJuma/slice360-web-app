{{-- {{ dd($blog_tags) }} --}}

<!--box-widget-item -->
<div class="box-widget-item fl-wrap block_box custom-scroll-link ">
    <div class="box-widget-item-header">
        <h3>Related Tags</h3>
    </div>
    <div class="box-widget fl-wrap">
        <div class="box-widget-content">
            <div class="list-single-tags tags-stylwrap">

                @foreach ($blog_tags as $key => $value)
                    <a href="/blog?search_tag={{ $key }}">{{ $value }}</a>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!--box-widget-item end -->
