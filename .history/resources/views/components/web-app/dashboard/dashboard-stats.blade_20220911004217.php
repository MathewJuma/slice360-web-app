@props(['user_details'])

@php

    //opportunity_details
    $opportunity_details = $user_details->user_opportunities;

    //total views
    $total_views = 0;

    //loop through each opportunity_details
    foreach ($opportunity_details as $opportunity) {

        $total_views = $total_views + $opportunity->views;
    }

@endphp

<div class="dashboard-header-stats">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!--  dashboard-header-stats-item -->
            <div class="swiper-slide">
                <div class="dashboard-header-stats-item">
                    <i class="fal fa-map-marked"></i>
                    Total Opportunities
                    <span>{{ $opportunity_details->count() }}</span>
                </div>
            </div>
            <!--  dashboard-header-stats-item end -->
            <!--  dashboard-header-stats-item -->
            <div class="swiper-slide">
                <div class="dashboard-header-stats-item">
                    <i class="fal fa-chart-bar"></i>
                    Opportunity Views
                    <span>1054</span>
                </div>
            </div>
            <!--  dashboard-header-stats-item end -->
            <!--  dashboard-header-stats-item -->
            <div class="swiper-slide">
                <div class="dashboard-header-stats-item">
                    <i class="fal fa-comments-alt"></i>
                    Total Reviews
                    <span>79</span>
                </div>
            </div>
            <!--  dashboard-header-stats-item end -->
            <!--  dashboard-header-stats-item -->
            <div class="swiper-slide">
                <div class="dashboard-header-stats-item">
                    <i class="fal fa-heart"></i>
                    Times Bookmarked
                    <span>654</span>
                </div>
            </div>
            <!--  dashboard-header-stats-item end -->
        </div>
    </div>
</div>
<div class="dhs-controls">
    <div class="dhs dhs-prev"><i class="fal fa-angle-left"></i></div>
    <div class="dhs dhs-next"><i class="fal fa-angle-right"></i></div>
</div>
