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
                    <div class="geodir_status_date gsd_open">
                        <i class="fal fa-lock-open"></i>Open Now</div>
                    <div class="geodir-category-opt">
                        <div class="geodir-category-opt_title">
                            <h4>
                                <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}">{{ $opportunity->title }}</a>
                                <span class="verified-badge"><i class="fal fa-check"></i></span>
                            </h4>
                            <div class="geodir-category-location"><a href="#"><i
                                        class="fas fa-map-marker-alt"></i>Nairobi, Kenya</a></div>
                        </div>
                        <div class="listing-rating-count-wrap">
                            <div class="review-score">4.1</div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                            </div>
                            <br>
                            <div class="reviews-count">26 reviews</div>
                        </div>
                        <div class="listing_carditem_footer fl-wrap">
                            <a class="listing-item-category-wrap" href="#">
                                <div class="listing-item-category red-bg"><i
                                        class="fal fa-university"></i></div>
                                <span>Real Estate</span>
                            </a>
                            <div class="price-level geodir-category_price">
                                <span class="price-level-item" data-pricerating="2"></span>
                                <span class="price-name-tooltip">Expensive</span>
                            </div>
                            <div class="post-author"><a href="#"><img
                                        src="images/avatar/1.jpg" alt=""><span>By , Mathew
                                        Juma</span></a></div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <!-- listing-item end -->
    </div>
</div>
<!--  swiper-slide end  -->
