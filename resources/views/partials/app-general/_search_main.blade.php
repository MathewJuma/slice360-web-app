<div class="main-search-input-tabs  tabs-act fl-wrap">
    <ul class="tabs-menu  no-list-style" style="margin-bottom: 75px !important;"></ul>
    <!--tabs -->
    <div class="tabs-container fl-wrap ">
        <!--tab -->
        <div class="tab">
            <div id="tab-inpt1" class="tab-content first-tab">
                <div class="main-search-input-wrap fl-wrap">
                    <div class="main-search-input fl-wrap">
                        <form action="/opportunities" >
                            <div class="main-search-input-item">
                                <label><i class="fal fa-keyboard"></i></label>
                                <input type="text" placeholder="What is your interest?" name="interest"/>
                            </div>
                            <div class="main-search-input-item">
                                <select data-placeholder="Which Categories?" name="category_id"  class="chosen-select" >
                                    <option value="All Categories" selected>All Categories</option>
                                    {{-- loop through categories for DB --}}
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    {{-- loop through categories for DB end --}}
                                </select>
                            </div>
                            <div class="main-search-input-item location autocomplete-container">
                                <select data-placeholder="Which Location?" name="country_id" class="chosen-select on-radius fal fa-map-marker-check" >
                                    <option value="All Locations">All Locations</option>
                                    {{-- loop through countries for DB --}}
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                    {{-- loop through countries for DB end --}}
                                </select>
                            </div>
                            <button class="main-search-button color2-bg" type="submit">Search <i class="fal fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--tab end-->
    </div>
    <!--tabs end-->
</div>
