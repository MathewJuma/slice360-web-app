{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details=[]>

    <!--component :: grow your wealth :: hero -->
    <x-app-general.hero-main title='Explore Opportunities' description='Discover investment opportunities across the globe that align with your vision' :all_countries='$all_countries' :all_categories='$all_categories' />
    <!--component end :: grow your wealth :: hero-->

    <!-- section below hero -->
    <section class="gray-bg small-padding no-top-padding-sec mt-10" id="sec1">
        <!-- inner container -->
        <div class="container">
            <!-- list-main-wrap-header-->
            <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow no-bg-header fixed-listing-header" style="margin-bottom: 10px !important;">
                <!-- list-main-wrap-title-->
                <div class="list-main-wrap-title">
                    <h2 style="color: #325096 !important;">
                        Listing of all opportunities
                    </h2>
                </div>
                <!-- list-main-wrap-title end-->
                <!-- list-main-wrap-opt-->
                <div class="list-main-wrap-opt">
                    <!-- price-opt-->
                    <div class="price-opt">
                        <span class="price-opt-title">Sort by:</span>
                        <div class="listsearch-input-item">
                            <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                                <option>Popularity</option>
                                <option>Average rating</option>
                                <option>Capital: low to high</option>
                                <option>Capital: high to low</option>
                            </select>
                        </div>
                    </div>
                    <!-- price-opt end-->
                    <!-- price-opt-->
                    <div class="grid-opt">
                        <ul class="no-list-style">
                            <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="fal fa-th"></i></span></li>
                            <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="fal fa-list"></i></span></li>
                        </ul>
                    </div>
                    <!-- price-opt end-->
                </div>
                <!-- list-main-wrap-opt end-->
            </div>
            <!-- list-main-wrap-header end-->

            <!-- actual listing content -->
            <div class="fl-wrap">
                <!-- listing-item-container -->
                <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic three-columns-grid" style="border:0px solid red; margin-top: -25px !important; margin-bottom: -10px !important;">

                    @if (count($all_opportunities) == 0)
                        <div class="section-title" style="padding-top: 50px !important;">
                            <h2 style="color: #325096 !important;">No investment opportunities found!</h2>
                        </div>
                    @else

                        {{-- loop through each opportunity --}}
                        @foreach ($all_opportunities as $opportunity)

                            <!-- begin :: load listing from a component -->
                            <x-web-app.opportunities.opportunity-card :opportunity='$opportunity' :all_countries='$all_countries' :all_categories='$all_categories'/>
                            <!-- begin :: load listing from a component -->

                        @endforeach
                        {{-- loop through each opportunity end --}}
                    @endif
                </div>
                <!-- listing-item-container end-->

                {{-- pagination section --}}
                {{ $all_opportunities->links('pagination::slice360-custom') }}
                {{-- pagination section end --}}
            </div>
            <!-- actual listing content end -->

        </div>
        <!-- inner  container end-->
    </section>
    <!-- section below hero end -->
    <div class="limit-box fl-wrap"></div>

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
