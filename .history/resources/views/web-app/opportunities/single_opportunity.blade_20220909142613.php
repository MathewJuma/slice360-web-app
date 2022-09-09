{{-- load the main web-app layout --}}
{{-- {{ dd($opportunity_details) }} --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    @php

        //funding_status, $funding_status_icon and funding_status_color
        $funding_status = $opportunity_details->funding_status;
        $funding_status_icon = (($funding_status == "opening soon") ? "fal fa-lock-open" : (($funding_status == "fund raising") ? "fal fa-check-circle" : (($funding_status == "closing soon") ? "fal fa-clock" : (($funding_status == "funding closed") ? "fal fa-lock" : ""))));
        $funding_status_color = (($funding_status == "opening soon") ? "geodir_status_date orange-bg" : (($funding_status == "fund raising") ? "geodir_status_date green-bg" : (($funding_status == "closing soon") ? "geodir_status_date purp-bg" : (($funding_status == "funding closed") ? "geodir_status_date gsd_close" : ""))));

        //banner_images and other_images arrays
        $banner_images_array = $opportunity_details->banner_images;
        $other_images_array = $opportunity_details->other_images;

        //check is this profile has a user profile image
        if(isset($opportunity_details->opportunity_user->user_profile->user_profile_image)){

            $profile_image = asset('storage/'.$opportunity_details->opportunity_user->user_profile->user_profile_image->image_path);

        }else{

            $profile_image = asset('web_app/images/avatar/1_1.jpg');

        }

    @endphp

    <!-- opportunity header image scroll -->
    <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="opportunity_hero">
        <div class="bg-parallax-wrap">
            <!--ms-container-->
            <div class="slideshow-container" data-scrollax="properties: { translateY: '300px' }" >
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        {{-- loop through images --}}
                        @foreach ($banner_images_array as $banner_image)
                            <!--ms_item-->
                            <div class="swiper-slide">
                                <div class="ms-item_fs fl-wrap full-height">
                                    <div class="bg" data-bg="{{ asset($banner_image) }}"></div>
                                    <div class="overlay"></div>
                                </div>
                            </div>
                            <!--ms_item end-->
                        @endforeach
                        {{-- loop through images end --}}
                    </div>
                </div>
            </div>
            <!--ms-container end-->
            <div class="overlay"></div>
        </div>
        <div class="slide-progress-wrap">
            <div class="slide-progress"></div>
        </div>
        <div class="container">
            <div class="list-single-header-item  fl-wrap">
                <div class="row">
                    <div class="col-md-9">
                        <h1>
                            {{ $opportunity_details->title }}
                            <span class="verified-badge">
                                <i class="fal fa-check"></i>
                            </span>
                        </h1>
                        <div class="geodir-category-location fl-wrap">
                            <a href="#">
                                <i class="fas fa-map-marker-alt"></i> <b>{{ $opportunity_details->city . ', ' .$opportunity_details->country_name }}
                            </a>
                            <a href="#"> <i class="fal fa-phone"></i>{{ $opportunity_details->owner_mobile }}</a>
                            <a href="#"><i class="fal fa-envelope"></i>{{ $opportunity_details->owner_email }}</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec6">
                            <div class="listing-rating-count-wrap single-list-count">
                                <div class="review-score">{{ number_format($opportunity_details->ratings, 1) }}</div>
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $opportunity_details->ratings }}"></div>
                                <br>
                                <div class="reviews-count">{{ $opportunity_details->reviews }} reviews</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="list-single-header_bottom fl-wrap">
                <a class="listing-item-category-wrap" href="#">
                    <div class="listing-item-category yellow-bg"><i class="fal fa-cocktail"></i></div>
                    <span>{{ $opportunity_details->category_name }}</span>
                </a>
                <div class="list-single-author">
                    <a href="{{ route('web-app.dashboard.show-user-profile', $opportunity_details->owner_id.'-'.Str::slug($opportunity_details->owner_name)) }}">
                        <span class="author_avatar">
                            <img alt='' src='{{ $profile_image }}'>
                        </span>
                        By: {{ $opportunity_details->owner_name }}
                    </a>
                </div>
                <div class="{{ $funding_status_color }}">
                    <i class="{{ $funding_status_icon }}"></i>{{ $opportunity_details->funding_status }}
                </div>
                <div class="list-single-stats">
                    <ul class="no-list-style">
                        <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed - {{ $opportunity_details->viewed }} </span></li>
                        <li><span class="bookmark-counter"><i class="fas fa-bookmark"></i> Followers - {{ $opportunity_details->bookmarked }} </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- opportunity header image scroll end -->

    <!-- opportunity scroll-nav-wrapper-->
    <div class="scroll-nav-wrapper fl-wrap">
        <div class="container">
            <nav class="scroll-nav scroll-init">
                <ul class="no-list-style">
                    <li><a class="act-scrlink" href="#opportunity_hero"><i class="fal fa-images"></i> Top</a></li>
                    <li><a href="#opportunity_details"><i class="fal fa-info"></i>Details</a></li>
                    <li><a href="#opportunity_gallery"><i class="fal fa-image"></i>Gallery</a></li>
                    <li><a href="#opportunity_timeline"><i class="fal fa-analytics"></i>Timelines</a></li>
                    <li><a href="#opportunity_reviews"><i class="fal fa-comments-alt"></i>Reviews</a></li>
                </ul>
            </nav>
            <div class="scroll-nav-wrapper-opt">
                <div class="row" style="border: 1px solid red; width: 110% !important;">

                    {{-- only show edit button if user_id is equal auth()->id() --}}
                    @if ($opportunity_details->user_id == auth()->id())
                        <div class="col-md-3">
                            <a href="{{ route('web-app.opportunities.edit-opportunity', $opportunity_details->id.'-'.Str::slug($opportunity_details->title)) }}" class="scroll-nav-wrapper-opt-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    @endif
                    {{-- only show edit button if user_id is equal auth()->id() end--}}

                    {{-- follow button --}}
                    <div class="col-md-3">
                        Follow
                    </div>
                    {{-- follow button end--}}

                    {{-- share button --}}
                    <div class="col-md-3">
                        Share
                    </div>
                    {{-- share button end --}}

                    {{-- Ellipses button --}}
                    <div class="col-md-3">
                        .......
                    </div>
                    {{-- Ellipses button --}}
                </div>
            </div>
        </div>
    </div>
    <!-- opportunity scroll-nav-wrapper end-->

    <!-- opportunity content wrapper-->
    <section class="gray-bg no-top-padding">
        <div class="container">

            <!--opportunity breadcrumb -->
            <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                <a href="/index">Opportunites</a>
                <a href="/opportunites">Listings</a>
                <a href="/opportunities/{{ $opportunity_details->category_id }}">{{ $opportunity_details->category_name}}</a>
                <span>{{ $opportunity_details->title }}</span>
            </div>
            <!--opportunity breadcrumb end -->
            <div class="clearfix"></div>

            <!--opportunity content area -->
            <div class="row">
                <!-- left list-single-main-wrapper column -->
                <div class="col-md-8" style="margin-bottom: -40px !important;">
                    <!-- list-single-main-wrapper -->
                    <div class="list-single-main-wrapper fl-wrap">

                        <!-- decription header :: list-single-header -->
                        <div class="list-single-header list-single-header-inside block_box fl-wrap" id="opportunity_details">
                            <div class="list-single-header-item  fl-wrap">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h1>
                                            {{ $opportunity_details->title }}
                                            <span class="verified-badge">
                                                <i class="fal fa-check"></i>
                                            </span>
                                        </h1>
                                        <div class="geodir-category-location fl-wrap">
                                            <a href="#">
                                                <i class="fas fa-map-marker-alt"></i>{{ $opportunity_details->city . ', ' .$opportunity_details->country_name  }}
                                            </a>
                                            <a href="#"> <i class="fal fa-phone"></i>{{ $opportunity_details->owner_mobile }}</a>
                                            <a href="#"><i class="fal fa-envelope"></i>{{ $opportunity_details->owner_email }} </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fl-wrap list-single-header-column  block_box">
                                            <div class="listing-rating-count-wrap single-list-count">
                                                <div class="review-score">{{ number_format($opportunity_details->ratings, 1) }}</div>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $opportunity_details->ratings }}"></div>
                                                <br>
                                                <div class="reviews-count">{{ $opportunity_details->reviews }} reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-single-header_bottom fl-wrap">
                                <a class="listing-item-category-wrap" href="#">
                                    <div class="listing-item-category yellow-bg"><i class="fal fa-cocktail"></i></div>
                                    <span>{{ $opportunity_details->category }}</span>
                                </a>
                                <div class="list-single-author">
                                    <a href="{{ route('web-app.dashboard.show-user-profile', $opportunity_details->owner_id.'-'.Str::slug($opportunity_details->owner_name)) }}">
                                        <span class="author_avatar">
                                            <img alt='' src='{{ $profile_image}}'>
                                        </span>
                                        By  {{ $opportunity_details->owner_name }}
                                    </a>
                                </div>
                                <div class="{{ $funding_status_color }}">
                                    <i class="{{ $funding_status_icon }}"></i>{{ $opportunity_details->funding_status }}
                                </div>
                                <div class="list-single-stats">
                                    <ul class="no-list-style">
                                        <li style="margin-bottom: 5px; margin-top: 5px;">
                                            <span class="viewed-counter">
                                                <i class="fas fa-eye"></i> Viewed -  {{ $opportunity_details->viewed }}
                                            </span>
                                        </li>
                                        <li style="margin-bottom: 5px; margin-top: 5px;">
                                            <span class="bookmark-counter"><i class="fas fa-bookmark"></i> Followers -  {{ $opportunity_details->bookmarked }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- decription header :: list-single-header end -->

                        <!-- statistics :: list-single-facts -->
                        <div class="list-single-facts fl-wrap">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- inline-facts -->
                                    <div class="inline-facts-wrap gradient-bg" style="min-height: 134px !important;">
                                        <div class="inline-facts">
                                            <i class="fal fa-usd-circle"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ $opportunity_details->amount_needed }}"></div>
                                                </div>
                                            </div>
                                            <h6>Capital Required in $</h6>
                                        </div>
                                        <div class="stat-wave">
                                            <svg viewbox="0 0 100 25">
                                                <path fill="#fff" d="M0 30 V12 Q30 17 55 2 T100 11 V30z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                                <div class="col-md-4">
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap gradient-bg" style="min-height: 134px !important;">
                                        <div class="inline-facts">
                                            <i class="fal fa-percent"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    {{--custom php code --}}
                                                    @php
                                                        //calculate percentage money raised
                                                        $percentage_raised = number_format((float)($opportunity_details->amount_raised / $opportunity_details->amount_needed * 100), 2);

                                                        //validate if there are target investors
                                                        $target_investors =  ($opportunity_details->target_investors > 0 && $opportunity_details->target_investors !== ''  && $opportunity_details->target_investors !== NULL) ? '/'.$opportunity_details->target_investors : '';
                                                    @endphp
                                                    {{--custom php code end --}}
                                                    <div class="num" data-content="" data-num="{{ $percentage_raised }}"></div>
                                                </div>
                                            </div>
                                            <h6>Current Percentage Funding</h6>
                                        </div>
                                        <div class="stat-wave">
                                            <svg viewbox="0 0 100 25">
                                                <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                                <div class="col-md-4">
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap gradient-bg" style="min-height: 134px !important;">
                                        <div class="inline-facts">
                                            <i class="fal fa-hand-holding-usd"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ $opportunity_details->number_of_investors }}">{{ $opportunity_details->number_of_investors }}</div>
                                                </div>
                                            </div>
                                            <h6>Total Investors Participating</h6>
                                        </div>
                                        <div class="stat-wave">
                                            <svg viewbox="0 0 100 25">
                                                <path fill="#fff" d="M0 30 V12 Q30 12 55 5 T100 11 V30z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                            </div>
                        </div>
                        <!-- statistics :: list-single-facts end -->

                        <!-- decription :: list-single-main-item -->
                        <x-web-app.opportunities.opportunity-details-card title="Description">
                            <div class="list-single-main-item_content fl-wrap" style=" min-height: 300px !important; max-height: 400px !important;">
                                <div class="description-holder scrollbar-inner2 text-left" data-simplebar="init" data-simplebar-auto-hide="true" style="border: 0px solid red;">
                                    {!! $opportunity_details->detailed_description !!}
                                </div>

                                {{-- show button if there is website url --}}
                                @if ($opportunity_details->webiste_url != '' && $opportunity_details->webiste_url != NULL && !empty($opportunity_details->webiste_url))
                                    <a href="{{ $opportunity_details->webiste_url }}" target="_blank" class="btn color2-bg float-btn" style="margin-top: 30px !important;">Visit Website<i class="fal fa-chevron-right"></i></a>
                                @endif
                                {{-- show button if there is website url end--}}
                            </div>
                        </x-web-app.opportunities.opportunity-details-card>
                        <!-- decription :: list-single-main-item end -->

                        <!-- gallery :: list-single-main-item-->
                        <x-web-app.opportunities.opportunity-details-card title="Gallery / Photos" id="opportunity_gallery">
                            <div class="list-single-main-item_content fl-wrap">
                                <div class="single-carousel-wrap fl-wrap lightgallery">
                                    <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                    <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                    <div class="single-carousel fl-wrap full-height">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                {{-- loop through images --}}
                                                @foreach ($other_images_array as $opportunity_images)
                                                    <!-- swiper-slide-->
                                                    <div class="swiper-slide">
                                                        <div class="box-item">
                                                            <img  src="{{ asset($opportunity_images) }}"   alt="">
                                                            <a href="{{ asset($opportunity_images) }}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->
                                                @endforeach
                                                {{-- loop through images end --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-web-app.opportunities.opportunity-details-card>
                        <!-- gallery :: list-single-main-item end -->

                        <!-- timeline :: list-single-main-item-->
                        <x-web-app.opportunities.opportunity-details-card title="Timelines" id="opportunity_timeline">
                            <div class="list-single-main-item_content fl-wrap">
                                <!-- timeline-container -->
                                <div class="timeline" style="margin-right: 15px !important;">
                                    <div class="timeline__wrap">
                                        <div class="timeline__items" style="width: 1680px; height: 432px; transform: translate3d(0px, 0px, 0px);">
                                            <div class="timeline__item timeline__item--top fadeIn" style="width: 210px; height: 216px;">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        1. Pitch
                                                        <span class="verified-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Executed">
                                                            <i class="fal fa-check"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Pivot investor making a pitch about the business opportunity on Slice360 and availing all required documents for verification process to start.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--bottom fadeIn" style="width: 210px; height: 216px; transform: translateY(216px);">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        2. Verification
                                                        <span class="verified-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Executed">
                                                            <i class="fal fa-check"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Slice360 conducts due diligence on the investment/business idea pitched, verifies and publishes it on the website for public participation.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--top fadeIn" style="width: 210px; height: 216px;">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        3. Fund Raise
                                                        <span class="progress-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="In Progress">
                                                            <i class="fal fa-history"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Investors opt-into and on-board the investment/business opportunity published, and start contributing funds to raise the required capital.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--bottom fadeIn" style="width: 210px; height: 216px; transform: translateY(216px);">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        4. Company Formation
                                                        <span class="danger-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Not yet">
                                                            <i class="fal fa-times"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Slice360 registers a smart company, issuing smart contracts to each of the participating investors based on proportions of their contributions.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--top fadeIn" style="width: 210px; height: 216px;">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        5. Project Plan
                                                        <span class="danger-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Not yet">
                                                            <i class="fal fa-times"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Participating investors work together on project plan and project strategies. Slice360 might provide services of an expert in the business industry.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--bottom fadeIn" style="width: 210px; height: 216px; transform: translateY(216px);">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        6. Implementation
                                                        <span class="danger-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Not yet">
                                                            <i class="fal fa-times"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Participating investors starts the investment/business implementation phase. Slice360 might provide services of an expert in the business industry.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--top fadeIn" style="width: 210px; height: 216px;">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        7. Project Review
                                                        <span class="danger-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Not yet">
                                                            <i class="fal fa-times"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Participating investors review investment/business implementation. Slice360 might provide services of an expert in the business industry.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--bottom" style="width: 210px; height: 216px; transform: translateY(216px);">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        8. Business Launch
                                                        <span class="danger-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Not yet">
                                                            <i class="fal fa-times"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Participating investors launch the investment/business opportunity that has been implemented. Slice360 may help with regulations.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--top" style="width: 210px; height: 216px;">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        9. Monitoring
                                                        <span class="danger-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Not yet">
                                                            <i class="fal fa-times"></i>
                                                        </span>
                                                    </h2>
                                                    <p>Participating investors continually monitor the running on their investments. Slice360 may help with monitoring and operations services.</p>
                                                </div></div></div>
                                            </div>
                                            <div class="timeline__item timeline__item--bottom" style="width: 210px; height: 216px;">
                                                <div class="timeline__item__inner"><div class="timeline__content__wrap"><div class="timeline__content">
                                                    <h2>
                                                        10. Closure
                                                        <span class="danger-badge tolt timeline-badge" data-microtip-position="bottom" data-tooltip="Not yet">
                                                            <i class="fal fa-times"></i>
                                                        </span>
                                                    </h2>
                                                    <p>If the investment opportunity has a closure clause, then Slice360 will help with the closing services, ensuring each investor is satisfied.</p>
                                                </div></div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="timeline-nav-button timeline-nav-button--prev" style="top: 216px;" disabled="">Previous</button>
                                    <button class="timeline-nav-button timeline-nav-button--next" style="top: 216px;">Next</button>
                                    <span class="timeline-divider" style="top: 216px;"></span>
                                </div>
                                <!-- timeline-container end -->
                            </div>
                        </x-web-app.opportunities.opportunity-details-card>
                        <!-- timeline :: list-single-main-item end -->

                        <!-- reviews :: list-single-main-item -->
                        <x-web-app.opportunities.opportunity-details-card title="Item Reviews" id="opportunity_reviews" :reviewCount="$opportunity_details->reviews">
                            <!--reviews-score-wrap-->
                            <div class="reviews-score-wrap fl-wrap">
                                <div class="review-score-total">
                                    <span class="review-score-total-item">
                                    4.8
                                    </span>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                </div>
                                <div class="review-score-detail">
                                    <!-- review-score-detail-list-->
                                    <div class="review-score-detail-list">
                                        <!-- rate item-->
                                        <div class="rate-item">
                                            <div class="rate-item-title"><span>Description</span></div>
                                            <div class="rate-item-bg" data-percent="100%">
                                                <div class="rate-item-line gradient-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">5.0</div>
                                        </div>
                                        <!-- rate item end-->
                                        <!-- rate item-->
                                        <div class="rate-item">
                                            <div class="rate-item-title"><span>Capital</span></div>
                                            <div class="rate-item-bg" data-percent="100%">
                                                <div class="rate-item-line gradient-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">5.0</div>
                                        </div>
                                        <!-- rate item end-->
                                        <!-- rate item-->
                                        <div class="rate-item">
                                            <div class="rate-item-title"><span>Category</span></div>
                                            <div class="rate-item-bg" data-percent="80%">
                                                <div class="rate-item-line gradient-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">4.0</div>
                                        </div>
                                        <!-- rate item end-->
                                        <!-- rate item-->
                                        <div class="rate-item">
                                            <div class="rate-item-title"><span>Timelines</span></div>
                                            <div class="rate-item-bg" data-percent="90%">
                                                <div class="rate-item-line gradient-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">4.5</div>
                                        </div>
                                        <!-- rate item end-->
                                    </div>
                                    <!-- review-score-detail-list end-->
                                </div>
                            </div>
                            <!-- reviews-score-wrap end -->

                            <!--reviews-section-wrap-->
                            <div class="list-single-main-item_content fl-wrap">
                                <div class="reviews-comments-wrap">
                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt="">
                                        </div>
                                        <div class="reviews-comments-item-text fl-wrap">
                                            <div class="reviews-comments-header fl-wrap">
                                                <h4><a href="#">Liza Rose</a></h4>
                                                <div class="review-score-user">
                                                    <span class="review-score-user_item">4.2</span>
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                </div>
                                            </div>
                                            <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                            <div class="reviews-comments-item-footer fl-wrap">
                                                <div class="reviews-comments-item-date"><span><i class="fal fa-calendar-check"></i>12 April 2018</span></div>
                                                <a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>2</span> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->
                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt="">
                                        </div>
                                        <div class="reviews-comments-item-text fl-wrap">
                                            <div class="reviews-comments-header fl-wrap">
                                                <h4><a href="#">Adam Koncy</a></h4>
                                                <div class="review-score-user">
                                                    <span class="review-score-user_item">5.0</span>
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                </div>
                                            </div>
                                            <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                            <div class="reviews-comments-item-footer fl-wrap">
                                                <div class="reviews-comments-item-date"><span><i class="fal fa-calendar-check"></i>03 December 2017</span></div>
                                                <a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>4</span> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->
                                </div>
                            </div>
                            <!--reviews-section-wrap end-->
                        </x-web-app.opportunities.opportunity-details-card>
                        <!-- reviews :: list-single-main-item end-->

                        {{-- show only if user is logged in --}}
                        @if (Auth::check())
                            <!-- add reviews :: list-single-main-item -->
                            <x-web-app.opportunities.opportunity-details-card title="Add Review" id="opportunity_reviews_write">
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <!-- Review Comment -->
                                    <form id="add-comment" class="add-comment  custom-form" name="rangeCalc" >
                                        <fieldset>
                                            <div class="review-score-form fl-wrap">
                                                <div class="review-range-container">
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Description</div>
                                                        <div class="range-slider-wrap ">
                                                            <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="0">
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Capital</div>
                                                        <div class="range-slider-wrap ">
                                                            <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1"  value="0">
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Category</div>
                                                        <div class="range-slider-wrap ">
                                                            <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="0" >
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Timelines</div>
                                                        <div class="range-slider-wrap">
                                                            <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="0">
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->
                                                </div>
                                                <div class="review-total">
                                                    <span>
                                                        <input type="text" name="rg_total" data-form="AVG({rgcl})" value="0">
                                                    </span>
                                                    <strong>Your Score</strong>
                                                </div>
                                            </div>
                                            <div class="list-single-main-item_content fl-wrap">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-user"></i></label>
                                                        <input type="text" placeholder="Your Name *" value=""/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-envelope"></i>  </label>
                                                        <input type="text" placeholder="Email Address*" value=""/>
                                                    </div>
                                                </div>
                                                <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                                <div class="clearfix"></div>
                                                <button class="btn  color2-bg float-btn">Submit Review <i class="fal fa-paper-plane"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- Add Review Box / End -->
                            </x-web-app.opportunities.opportunity-details-card>
                            <!-- add reviews :: list-single-main-item end -->
                        @endif
                        {{-- show only if user is logged in end--}}

                    </div>
                    <!-- list-single-main-wrapper end-->
                </div>
                <!-- left list-single-main-wrapper column end-->

                <!-- right list-single-wrapper column -->
                <div class="col-md-4" style="margin-bottom: -40px !important;">
                    <!-- list-single-main-wrapper -->
                    <div class="list-single-main-wrapper fl-wrap">

                        <!--opt in :: box-widget-item -->
                        <x-web-app.opportunities.opportunity-details-card title="Opportunity Tags" id="opportunity_tags">
                            <div class="box-widget  fl-wrap" style="min-height: 140px !important;">
                                <div class="box-widget-content" style="margin-top: -10px !important;">
                                    <div class="list-single-tags tags-stylwrap">

                                        @php
                                            //explode tags into an array
                                            $opportunity_tags = explode(", ", strtolower($opportunity_details->tags));
                                            //search for category name in tags
                                            $category_checker  = array_search(strtolower($opportunity_details->category_name), $opportunity_tags);

                                            if ($category_checker !== false) {
                                                // Remove category name from array
                                                unset($opportunity_tags[$category_checker]);
                                            }

                                        @endphp

                                        {{-- add opportunity tags --}}
                                        @foreach ( $opportunity_tags as $tag)
                                            <a href="/opportunities?tag={{ $tag }}">{{ ucfirst($tag) }}</a>
                                        @endforeach
                                        {{-- add opportunity tags end--}}

                                        {{-- make coutry to be part of tags --}}
                                        <a href="/opportunities?tag={{ $opportunity_details->category_id }}">{{ $opportunity_details->category_name }}</a>
                                        {{-- make coutry to be part of tags end --}}

                                        {{-- make coutry to be part of tags --}}
                                        <a href="/opportunities?tag={{ $opportunity_details->country_id }}">{{ $opportunity_details->country_name }}</a>
                                        {{-- make coutry to be part of tags end --}}
                                    </div>
                                </div>
                            </div>
                        </x-web-app.opportunities.opportunity-details-card>
                        <!--opt in :: box-widget-item end -->

                        {{-- show only if user is logged in --}}
                        @if (Auth::check())
                            <!--opt in :: box-widget-item -->
                            <x-web-app.opportunities.opportunity-details-card title="Opt Onto Opportunity" id="opportunity_opt_in">
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <form   class="add-comment custom-form">
                                            <fieldset>
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" placeholder="Your Name *" value=""/>
                                                <div class="clearfix"></div>
                                                <label><i class="fal fa-envelope"></i>  </label>
                                                <input type="text" placeholder="Email Address*" value=""/>
                                                <label><i class="fal fa-phone"></i></label>
                                                <input type="text" placeholder="Mobile Number *" value=""/>
                                                <div class="clearfix"></div>
                                                <div class="listsearch-input-item clact">
                                                    <select data-placeholder="Ticket Type" class="chosen-select no-search-select" >
                                                        <option value="">Select Country</option>
                                                        <option>Kenya</option>
                                                        <option>Uganda</option>
                                                        <option>Tanzania</option>
                                                        <option>Rwanda</option>
                                                        <option>Burundi</option>
                                                        <option>Ethiopia</option>
                                                        <option>South Sudan</option>
                                                        <option>Democratic Republic of Congo</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="listsearch-input-item clact">
                                                    <select data-placeholder="Ticket Type" class="chosen-select no-search-select" >
                                                        <option value="">Ticket Type</option>
                                                        <option value="Spectator">Spectator</option>
                                                        <option value="Investor">Investor</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                                <textarea cols="40" rows="3" placeholder="Additional Information:"></textarea>
                                            </fieldset>
                                            <button class="btn color2-bg url_btn float-btn" onclick="window.location.href='booking.html'">Join Now <i class="fal fa-bookmark"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </x-web-app.opportunities.opportunity-details-card>
                            <!--opt in :: box-widget-item end -->
                        @endif
                        {{-- show only if user is logged in end --}}

                        <!--box-widget-item -->
                        <x-web-app.opportunities.opportunity-details-card title="Slice360 Agent : " >
                            <div class="box-widget">
                                <div class="box-widget-author fl-wrap">
                                    <div class="box-widget-author-title">
                                        <div class="box-widget-author-title-img">
                                            <img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt="">
                                        </div>
                                        <div class="box-widget-author-title_content">
                                            <a href="user-single.html">Mathew Juma</a>
                                            <span style="text-transform: lowercase;">mathew.juma@slice360.io</span>
                                        </div>
                                        <div class="box-widget-author-title_opt">
                                            <a href="user-single.html" class="tolt green-bg" data-microtip-position="top" data-tooltip="View Profile"><i class="fas fa-user"></i></a>
                                            <a href="#" class="tolt color-bg cwb" data-microtip-position="top" data-tooltip="Chat With Agent"><i class="fas fa-comments-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-web-app.opportunities.opportunity-details-card>
                        <!--box-widget-item end -->

                        <!--box-widget-item -->
                        <x-web-app.opportunities.opportunity-details-card title="Similar listings : " >
                            <div class="box-widget  fl-wrap">
                                <div class="box-widget-content">
                                    <!--widget-posts-->
                                    <div class="widget-posts fl-wrap" style="margin-top: -27px !important;">
                                        <ul class="no-list-style">
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="{{ isset($other_images_array[0]) ? asset($other_images_array[0]) : asset('web_app/images/slice360_blue.png') }}" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="#listing-single.html">Iconic Cafe</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 Journal Square Plaza, NJ, USA</a></div>
                                                    <div class="widget-posts-descr-link"><a href="#listing.html" >Restaurants </a>   <a href="listing.html">Cafe</a></div>
                                                    <div class="widget-posts-descr-score">4.1</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="{{ isset($other_images_array[1]) ? asset($other_images_array[1]) : asset('web_app/images/slice360_blue.png') }}" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="#listing-single.html">MontePlaza Hotel</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA </a></div>
                                                    <div class="widget-posts-descr-link"><a href="#listing.html" >Hotels </a>  </div>
                                                    <div class="widget-posts-descr-score">5.0</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="{{ isset($other_images_array[2]) ? asset($other_images_array[2]) : asset('web_app/images/slice360_blue.png') }}" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="#listing-single.html">Rocko Band in Marquee Club</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                                    <div class="widget-posts-descr-link"><a href="#listing.html" >Events</a> </div>
                                                    <div class="widget-posts-descr-score">4.2</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="{{ isset($other_images_array[3]) ? asset($other_images_array[3]) : asset('web_app/images/slice360_blue.png') }}" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="#listing-single.html">Premium Fitness Gym</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> W 85th St, New York, USA</a></div>
                                                    <div class="widget-posts-descr-link"><a href="#listing.html" >Fitness</a> <a href="#listing.html" >Gym</a> </div>
                                                    <div class="widget-posts-descr-score">5.0</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- widget-posts end-->
                                </div>
                            </div>
                        </x-web-app.opportunities.opportunity-details-card>
                        <!--box-widget-item end -->

                    </div>
                    <!-- list-single-main-wrapper end -->
                </div>
                <!-- right list-single-wrapper column end-->
            </div>
            <!--opportunity content area end-->
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>
    <!-- opportunity content wrapper end-->

    <!--chat-widget activator-->
    <div class="chat-widget-button cwb tolt" data-microtip-position="left" data-tooltip="Chat With Pivot Investor">
        <i class="fal fa-comments-alt"></i>
    </div>
    <!--chat-widget activator end-->

    <!--chat-widget -->
    <div class="chat-widget_wrap not-vis-chat">
        <div class="chat-widget_header pt-3">
            <h3>Chat with  <a href="author-single.html"> Mathew Juma</a></h3>
            <div class="status st_online"><span></span>Online</div>
        </div>
        <div class="chat-body" data-simplebar>
            <!-- message-->
            <div class="chat-message chat-message_guest fl-wrap">
                <div class="dashboard-message-avatar">
                    <img src="{{ asset('web_app/images/avatar/1_1.jpg') }}" alt="">
                </div>
                <span class="chat-message-user-name">Jessie</span>
                <span class="massage-date">25 may 2018  <span>7.51 PM</span></span>
                <p>Vivamus lobortis vel nibh nec maximus. Donec dolor erat, rutrum ut feugiat sed, ornare vitae nunc. </p>
            </div>
            <!-- message end-->
            <!-- message-->
            <div class="chat-message chat-message_user fl-wrap">
                <div class="dashboard-message-avatar">
                    <img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt="">
                </div>
                <span class="chat-message-user-name">Mathew</span>
                <span class="massage-date">25 may 2018  <span>7.51 PM</span></span>
                <p>Nulla eget erat consequat quam feugiat dapibus eget sed mauris.</p>
            </div>
            <!-- message end-->
            <!-- message-->
            <div class="chat-message chat-message_guest fl-wrap">
                <div class="dashboard-message-avatar">
                    <img src="{{ asset('web_app/images/avatar/1_1.jpg') }}" alt="">
                </div>
                <span class="chat-message-user-name">Jessie</span>
                <span class="massage-date">25 may 2018  <span>7.51 PM</span></span>
                <p>Sed non neque faucibus, condimentum lectus at, accumsan enim. Fusce pretium egestas cursus..</p>
            </div>
            <!-- message end-->
        </div>
        <div class="chat-widget_input fl-wrap">
            <textarea  placeholder="Type Message"></textarea>
            <button type="submit"><i class="fal fa-paper-plane"></i></button>
        </div>
    </div>
    <!--chat-widget end -->

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
