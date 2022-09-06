<div class="header-search_container header-search vis-search">
    <div class="container small-container">
        <div class="header-search-input-wrap fl-wrap">
            <form  action="/opportunities" >
                <!-- header-search-input -->
                <div class="header-search-input">
                    <label><i class="fal fa-keyboard"></i></label>
                    <input type="text" placeholder="What is your interest?" name="interest"/>
                </div>
                <!-- header-search-input end -->
                <!-- header-search-input -->
                <div class="header-search-input header-search_selectinpt ">
                    <select data-placeholder="Which Location?" name="category_id" class="chosen-select on-radius fal fa-map-marker-check" >
                        <option value="All Categories" selected>All Categories</option>
                        {{-- loop through categories for DB --}}
                        @foreach ($all_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        {{-- loop through categories for DB end --}}
                    </select>
                </div>
                <!-- header-search-input end -->
                <!-- header-search-input -->
                <div class="header-search-input location autocomplete-container">
                    <select data-placeholder="Which Location?" name="country_id" class="chosen-select on-radius fal fa-map-marker-check" >
                        <option value="All Locations">All Locations</option>
                        {{-- loop through countries for DB --}}
                        @foreach ($all_countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                        {{-- loop through countries for DB end --}}
                    </select>
                </div>
                <!-- header-search-input end -->
                <button class="header-search-button green-bg" type="submit"><i class="fal fa-search"></i> Search </button>
            </form>
        </div>
        <div class="header-search_close color-bg"><i class="fal fa-long-arrow-up"></i></div>
    </div>
</div>
