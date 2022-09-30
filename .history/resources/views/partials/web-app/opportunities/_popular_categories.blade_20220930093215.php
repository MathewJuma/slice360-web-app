{{ dd($popular_categories) }}

<!--box-widget-item -->
<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>Popular Categories</h3>
    </div>
    <div class="box-widget fl-wrap">
        <div class="box-widget-content">
            <ul class="cat-item no-list-style">
                @foreach ($popular_categories as $category)

                @endforeach
                <li><a href="#">{{ $category->name }}</a> <span>{{ $category->category_opportunities_count }}</span></li>
            </ul>
        </div>
    </div>
</div>
<!--box-widget-item end -->
