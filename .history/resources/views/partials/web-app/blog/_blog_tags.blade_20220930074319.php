{{-- {{ dd($blog_tags) }} --}}

<!--box-widget-item -->
<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>Tags</h3>
    </div>
    <div class="box-widget fl-wrap">
        <div class="box-widget-content">
            <div class="list-single-tags tags-stylwrap">
                <a href="#">Hotel</a>
                @foreach ($blog_tag as $tags)

                @endforeach
            </div>
        </div>
    </div>
</div>
<!--box-widget-item end -->
