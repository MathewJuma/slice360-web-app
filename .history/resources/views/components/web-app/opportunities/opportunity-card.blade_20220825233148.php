{{-- bring in opportunit data into component using prop --}}
@props(['opportunity', 'all_countries', 'all_categories'])

@php

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
    $opportunity_images = $opportunity->opportunity_images;

    //dd($opportunity);

    //final_image_path
    $final_image_path = '';

    //process if opportunity images are empty
    if($opportunity_images->isEmpty()){

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
        foreach ($opportunity_images as $opportunity_image) {

            $image_array[] =  $opportunity_image->image_path;

        }

    }

    //final_image_path
    $final_image_path = $images_path . Arr::random($image_array);


@endphp

<!-- one listing-item  -->
<div class="listing-item" style="margin-top: 10px !important; margin-bottom: 10px !important;">
    <article class="geodir-category-listing fl-wrap">
        <div class="geodir-category-img">
            <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
            <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}" class="geodir-category-img-wrap fl-wrap">
                <img src="{{ $final_image_path }}" style="height: 230px !important;" alt="">
            </a>
            <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                <span class="avatar-tooltip">Added By <strong>{{ $opportunity->owner }}</strong></span>
            </div>
            <div class="{{ $funding_status_color }}">
                <i class="{{ $funding_status_icon }}"></i>{{ $opportunity->funding_status }}
            </div>
            <div class="geodir-category-opt">
                <div class="listing-rating-count-wrap">
                    <div class="review-score">{{ number_format($opportunity->ratings, 1) }}</div>
                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $opportunity->ratings }}"></div>
                    <br>
                    <div class="reviews-count">{{ $opportunity->reviews }} reviews</div>
                </div>
            </div>
        </div>
        <div class="geodir-category-content fl-wrap title-sin_item" style="margin-top: 10px !important;">
            <div class="geodir-category-content-title fl-wrap">
                <div class="geodir-category-content-title-item">
                    <h3 class="title-sin_map">
                        <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}">{{ $opportunity->title }}</a>
                        <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                            <i class="fal fa-check"></i>
                        </span>
                    </h3>
                    <div class="geodir-category-location fl-wrap">
                        <a href="#" ><i class="fas fa-map-marker-alt"></i> {{ $opportunity->city . ', ' .$country_details->name }}</a>
                    </div>
                </div>
            </div>
            <div class="geodir-category-text fl-wrap">
                <div style="height: 55px; max-heigh: 55px !important; margin-bottom: 10px !important;">
                    <p class="small-text">{{ substr($opportunity->brief_description, 0 , 115) }}

                        @if (strlen($opportunity->brief_description) > 115)
                            <span class="finance-details-out-of" style="letter-spacing: 2px; font-weight:700; font-size: 18px;">
                                <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}#sec2" style="color: #4DB7FE !important;">....</a>
                            </span>
                        @endif

                    </p>
                </div>
                <div class="facilities-list fl-wrap">
                    <div class="facilities-list-title">Funding Details: </div>
                    <ul class="no-list-style">
                        <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required"> ${{ number_format($opportunity['amount_needed'],0,',') }}
                        </span>
                        <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>

                        {{--custom php code --}}
                        @php
                            //calculate percentage money raised
                            $percentage_raised = number_format((float)($opportunity->amount_raised / $opportunity->amount_needed * 100), 2) . '%';

                            //validate if there are target investors
                            $target_investors =  ($opportunity->target_investors > 0 && $opportunity->target_investors !== ''  && $opportunity->target_investors !== NULL && $opportunity->funding_status != 'funding closed') ? '/'.$opportunity->target_investors : '';
                        @endphp
                        {{--custom php code end --}}

                        <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                            {{ $percentage_raised }}
                        </span>
                        <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                            {{ empty($opportunity->number_of_investors) || $opportunity->number_of_investors == null ? 0 : $opportunity->number_of_investors }} <strong class="finance-details-out-of">{{ $target_investors }}</strong>
                        </span>
                    </ul>
                </div>
            </div>
            <div class="geodir-category-footer fl-wrap" style="min-height: 65px;">
                <a class="listing-item-category-wrap" style="padding-top: 3px !important;">
                    <div class="listing-item-category yellow-bg"><i class="fal fa-cocktail"></i></div>
                    <span>{{ $category_details->name }}</span>
                </a>
                <div class="geodir-opt-list" style="margin-top: -2px !important;">
                    <ul class="no-list-style">
                        <li>
                            <a href="#" class="show_gcc" style="margin-top: 5px !important;">
                                <i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="#1" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866" style="margin-top: 5px !important;">
                                <i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span>
                            </a>
                        </li>
                        <li>
                            <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': 'images/all/1.jpg'},{'src': 'images/all/1.jpg'}, {'src': 'images/all/1.jpg'}]" style="margin-top: 5px !important;">
                                <i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="price-level geodir-category_price" style="padding-top: 3px !important;">
                    <span class="price-level-item" data-pricerating="2"></span>
                    <span class="price-name-tooltip">Moderate</span>
                </div>
                <div class="geodir-category_contacts">
                    <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                    <ul class="no-list-style">
                        <li>
                            <span>
                                <i class="fal fa-phone"></i> Call :
                            </span>
                            <a href="#">{{ $opportunity->owner_mobile }}</a>
                        </li>
                        <li>
                            <span>
                                <i class="fal fa-envelope"></i> Write :
                            </span>
                            <a href="#">{{ $opportunity->owner_email }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </article>
</div>
<!-- one listing-item end -->

