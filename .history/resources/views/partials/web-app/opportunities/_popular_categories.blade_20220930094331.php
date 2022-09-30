{{-- {{ dd($popular_categories) }} --}}

<!--box-widget-item -->
<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>Popular Opportunity Categories</h3>
    </div>
    <div class="box-widget fl-wrap">
        <div class="box-widget-content">
            <ul class="cat-item no-list-style">
                @foreach ($popular_categories as $category)
                    <li>
                        <a href="/opportunities?interest=&category_id={{ $category->id }}&country_id=All+Locations#all_opportunities_wrapper">
                            {{ $category->name }}
                        </a>
                        <span>{{ $category->category_opportunities_count }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!--box-widget-item end -->
