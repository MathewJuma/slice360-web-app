@props(['user_details'])

@php

    //opportunity_details and reviews
    $opportunity_details = $user_details->user_opportunities;
    $opportunity_reviews = $user_details->user_opportunity_reviews;
    $user_followers = $user_details->user_followed_by;
    $user_following = $user_details->user_following;


    //total views
    $total_views = 0;

    //loop through each opportunity_details
    foreach ($opportunity_details as $opportunity) {

        $total_views = $total_views + $opportunity->viewed;

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
                    Total Views
                    <span>{{ $total_views }}</span>
                </div>
            </div>
            <!--  dashboard-header-stats-item end -->
            <!--  dashboard-header-stats-item -->
            <div class="swiper-slide">
                <div class="dashboard-header-stats-item">
                    <i class="fal fa-comments-alt"></i>
                    Total Reviews
                    <span>{{ $opportunity_reviews->count() }}</span>
                </div>
            </div>
            <!--  dashboard-header-stats-item end -->
            <!--  dashboard-header-stats-item -->
            <div class="swiper-slide">
                <div class="dashboard-header-stats-item">
                    <i class="fal fa-heart"></i>
                    Times Followed
                    <span>{{ $user_followers->count() }}</span>
                </div>
            </div>
            <!--  dashboard-header-stats-item end -->
            <!--  dashboard-header-stats-item -->
            <div class="swiper-slide">
                <div class="dashboard-header-stats-item">
                    <i class="fal fa-bookmark"></i>
                    Times Following
                    <span>{{ $user_following->count() }}</span>
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
