@props(['opportunity', 'all_countries', 'all_categories'])

@php

    //current route
    $current_route = Route::currentRouteName();

    //country_details
    $country_details = $opportunity->opportunity_country;

    //category_details
    $category_details = $opportunity->opportunity_category;

    $funding_status = $opportunity->funding_status;
    //$funding_status_icon
    $funding_status_icon = (($funding_status == "opening soon") ? "fal fa-lock-open" : (($funding_status == "fund raising") ? "fal fa-check-circle" : (($funding_status == "closing soon") ? "fal fa-clock" : (($funding_status == "funding closed") ? "fal fa-lock" : ""))));
    $funding_status_color = (($funding_status == "opening soon") ? "geodir_status_date orange-bg" : (($funding_status == "fund raising") ? "geodir_status_date green-bg" : (($funding_status == "closing soon") ? "geodir_status_date purp-bg" : (($funding_status == "funding closed") ? "geodir_status_date gsd_close" : ""))));

    //banner_images and opportunity_images
    $banner_images = $opportunity->opportunity_banner_images;
    $other_images = $opportunity->opportunity_other_images;

    //opportunity reviews
    $opportunity_reviews = $opportunity->opportunity_reviews;
    $total_reviews = $opportunity_reviews->count();
    $avg_total_score = 0.0;

    if($total_reviews > 0){

        //total score sections
        $total_score = 0;

        //loop through each review and get section average scores
        foreach ($opportunity_reviews as $review) {

            $total_score = $total_score + $review->total_score;
        }

        //final average scores
        $avg_total_score = number_format((float)($total_score/$total_reviews), 1, '.', '');

    }

    $per_total_score = number_format((($avg_total_score/5)*100), 0);

    //check if this opportunity has a user
    if(isset($opportunity->opportunity_user)){

        $opportunity_user = $opportunity->opportunity_user;
        $opportunity_user_path = asset(route('web-app.dashboard.show-user-profile', $opportunity_user->id . '-' . Str::slug($opportunity_user->first_name.'-'.$opportunity_user->last_name)));

        //check is this profile has a user profile image
        if(isset($opportunity->opportunity_user->user_profile->user_profile_image)){

            $profile_image = asset('storage/'.$opportunity->opportunity_user->user_profile->user_profile_image->image_path);

        }else{

            $profile_image = asset('web_app/images/avatar/1_1.jpg');

        }

    }else{
        $opportunity_user = "";
        $opportunity_user_path = asset(route('web-app.dashboard.show-user-profile', '#'));
    }

    //final_image_path
    $final_image_path = '';

    //process if opportunity images are empty
    if($other_images->isEmpty()){

        //images_path
        $images_path = 'web_app/images/all/';

        //image array
        $image_array = ['item-restaurant.jpg', 'item-gym.jpg', 'item-layers.jpg', 'agriculture.jpg', 'education.jpg', 'energy.jpg'];

    } else {

        //images_path
        $images_path = 'storage/';

        //image_array
        $image_array = [];

        //image array
        foreach ($other_images as $opportunity_image) {

            $image_array[] =  $opportunity_image->image_path;

        }

    }

    //final_image_path
    $final_image_path = $images_path . Arr::random($image_array);

    //dd(asset($final_image_path))

@endphp

<!--  swiper-slide  -->
<div class="swiper-slide">
    <div class="listing-slider-item fl-wrap">
        <!-- listing-item  -->
        <div class="listing-item listing_carditem">
            <article class="geodir-category-listing fl-wrap">
                <div class="geodir-category-img">
                    <div class="geodir-js-favorite_btn"><i
                        class="fal fa-heart"></i><span>Save</span>
                    </div>
                    <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}"
                        class="geodir-category-img-wrap fl-wrap">
                        <img src="{{ asset($final_image_path ) }}"  alt="" style="height: 300px !important;">
                    </a>
                    <div class="{{ $funding_status_color }}">
                        <i class="{{ $funding_status_icon }}"></i> {{ $opportunity->funding_status }}
                    </div>
                    <div class="geodir-category-opt">
                        <div class="geodir-category-opt_title">
                            <h4>
                                <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}">{{ $opportunity->title }}</a>
                                {{-- logic to show if opportunity is verified or not --}}
                                @if ($opportunity->is_verified === "Yes")
                                    <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="Slice360 Verified">
                                        <i class="fal fa-check"></i>
                                    </span>
                                @else
                                    <span class="danger-badge tolt" data-microtip-position="bottom" data-tooltip="Not Verified">
                                        <i class="fal fa-exclamation"></i>
                                    </span>
                                @endif
                                {{-- logic to show if opportunity is verified or not end --}}
                            </h4>
                            <div class="geodir-category-location">
                                <a href="/opportunities?interest=&category_id=All+Categories&country_id={{ $country_details->id }}" >
                                    <i class="fas fa-map-marker-alt"></i> {{ $opportunity->city . ', ' .$country_details->name }}
                                </a>
                            </div>
                        </div>
                        <div class="listing-rating-count-wrap">
                            <div class="review-score">{{ number_format($avg_total_score, 1) }}</div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $avg_total_score }}">
                            </div>
                            <br>
                            <div class="reviews-count">{{ $total_reviews }} review{{ $total_reviews > 1 ? 's' : '' }}</div>
                        </div>
                        <div class="listing_carditem_footer fl-wrap">
                            <a class="listing-item-category-wrap" href="/opportunities?interest=&category_id={{ $category_details->id }}&country_id=All+Locations">
                                <div class="listing-item-category red-bg">
                                    <i class="fal fa-university"></i>
                                </div>
                                <span>{{ $category_details->name }}</span>
                            </a>
                            <div class="price-level geodir-category_price">
                                <span class="price-level-item" data-pricerating="2"></span>
                                <span class="price-name-tooltip">Expensive</span>
                            </div>

                            {{-- show only if route is not equel ot user profile --}}
                            @if ($current_route != 'web-app.dashboard.show-user-profile')
                                <div class="post-author">
                                    <a href="{{ $opportunity_user_path }}">
                                        @if ($opportunity_user != '')
                                            <img src="{{ $profile_image }}" alt="">
                                        @endif
                                        <span>By , {{ $opportunity->opportunity_user->first_name.' '.$opportunity->opportunity_user->last_name }}</span>
                                    </a>
                                </div>
                            @endif
                            {{-- show only if route is not equel ot user profile end--}}
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <!-- listing-item end -->
    </div>
</div>
<!--  swiper-slide end  -->
