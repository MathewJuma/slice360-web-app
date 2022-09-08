@php

    //current route
    $current_route = Route::currentRouteName();

    //session user_id
    $user_id =  session()->get('system_user_id') !== NULL ? session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name')) : 0;

    //this is the user profile details
    $user_profile = $user_details->user_profile;
    $second_email = $user_profile->second_email ?? "";
    $second_phone = $user_profile->second_phone ?? "";
    $third_phone = $user_profile->third_phone ?? "";
    $first_address = $user_profile->first_address ?? "";
    $second_address = $user_profile->second_address ?? "";
    $city = $user_profile->city ?? "";
    $country_id = $user_profile->country_id ?? "";
    $brief_description = $user_profile->brief_description ?? "";
    $website = $user_profile->website_url ?? "";
    $youtube = $user_profile->youtube_link ?? "";
    $facebook = $user_profile->facebook ?? "";
    $twitter = $user_profile->twitter ?? "";
    $instagram = $user_profile->instagram ?? "";
    $profile_image = $user_profile_images->user_profile_image ?? NULL;
    $profile_banner = $user_profile_images->user_profile_banner ?? NULL;

    dd($profile_image); exit();
@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    {{-- this section loads the user profile --}}
    <section class="no-top-padding-sec" id="sec1" style="background-color: #f6f6f6 !important;">
        <div class="container">
            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                <a href="{{ route('app-general.home-page') }}">Home</a>
                <a href="{{ route('web-app.dashboard.main-dashboard', $user_id) }}">Dashboard</a>
                <span>User Profile</span>
            </div>
            <div class="fl-wrap">
                <div class="row">
                    <div class="col-md-8">
                        <!-- list-single-main-item -->
                        <div class="user-profile-header fl-wrap">
                            <div class="user-profile-header_media fl-wrap">
                                <div class="bg" data-bg="images/bg/1.jpg"></div>
                                <div class="user-profile-header_media_title">
                                    <h3>{{ $user_details->first_name . ' ' . $user_details->last_name }}</h3>

                                @if ($country_id !== "")

                                    @foreach ($all_countries as $country)
                                        @if ($country->id == $country_id)
                                            <h4>{{ $city.', '.$country->name }}</h4>
                                        @endif
                                    @endforeach

                                @else

                                    <h4>No country details</h4>

                                @endif




                                </div>
                                <div class="user-profile-header_stats">
                                    <ul class="no-list-style">
                                        <li><span>4</span>Places</li>
                                        <li><span>20</span>Followers</li>
                                        <li><span>4</span>Following</li>
                                    </ul>
                                </div>
                                <div class="follow-btn color2-bg">Follow <i class="fal fa-user-plus"></i></div>
                            </div>
                            <div class="user-profile-header_content fl-wrap">
                                <div class="user-profile-header-avatar">
                                    <img src="images/avatar/1.jpg" alt="">
                                </div>
                                <p>Praesent eros turpis, commodo vel justo at, pulvinar mollis eros. Mauris aliquet eu
                                    quam id ornare. Morbi ac quam enim. Cras vitae nulla condimentum, semper dolor non,
                                    faucibus dolor. Vivamus adipiscing eros quis orci fringilla, sed pretium lectus
                                    viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Donec nec velit non odio aliquam suscipit. Sed non neque
                                    faucibus, condimentum lectus at, accumsan enim. </p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien
                                    vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur
                                    convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In
                                    fermentum facilisis massa, a consequat purus viverra.</p>
                                <a href="#" class="btn  float-btn color2-bg">Visit Website<i
                                        class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <!-- list-single-main-item end -->
                        <!-- list-main-wrap-header-->
                        <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow">
                            <!-- list-main-wrap-title-->
                            <div class="list-main-wrap-title">
                                <h2>Listings by : <span>Alisa Noory </span></h2>
                            </div>
                            <!-- list-main-wrap-title end-->
                            <!-- list-main-wrap-opt-->
                            <div class="list-main-wrap-opt">
                                <!-- price-opt-->
                                <div class="price-opt">
                                    <span class="price-opt-title">Sort by:</span>
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="Popularity" class="chosen-select no-search-select">
                                            <option>Popularity</option>
                                            <option>Average rating</option>
                                            <option>Price: low to high</option>
                                            <option>Price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- price-opt end-->
                                <!-- price-opt-->
                                <div class="grid-opt">
                                    <ul class="no-list-style">
                                        <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt"
                                                data-microtip-position="bottom" data-tooltip="Grid View"><i
                                                    class="fal fa-th"></i></span></li>
                                        <li class="grid-opt_act"><span class="one-col-grid tolt"
                                                data-microtip-position="bottom" data-tooltip="List View"><i
                                                    class="fal fa-list"></i></span></li>
                                    </ul>
                                </div>
                                <!-- price-opt end-->
                            </div>
                            <!-- list-main-wrap-opt end-->
                        </div>
                        <!-- list-main-wrap-header end-->
                        <!-- listing-item-container -->
                        <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                            <!-- listing-item  -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <div class="geodir-js-favorite_btn"><i
                                                class="fal fa-heart"></i><span>Save</span></div>
                                        <a href="listing-single.html" class="geodir-category-img-wrap fl-wrap">
                                            <img src="images/all/1.jpg" alt="">
                                        </a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/1.jpg" alt=""></a>
                                            <span class="avatar-tooltip">Added By <strong>Alisa Noory</strong></span>
                                        </div>
                                        <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open
                                            Now</div>
                                        <div class="geodir-category-opt">
                                            <div class="listing-rating-count-wrap">
                                                <div class="review-score">4.8</div>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                </div>
                                                <br>
                                                <div class="reviews-count">12 reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap title-sin_item">
                                        <div class="geodir-category-content-title fl-wrap">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a href="listing-single.html">Luxary
                                                        Resaturant</a><span class="verified-badge"><i
                                                            class="fal fa-check"></i></span></h3>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                            class="fas fa-map-marker-alt"></i> 27th Brooklyn New York,
                                                        USA</a></div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">Sed interdum metus at nisi tempor laoreet. Integer
                                                gravida orci a justo sodales.</p>
                                            <div class="facilities-list fl-wrap">
                                                <div class="facilities-list-title">Facilities : </div>
                                                <ul class="no-list-style">
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Free WiFi"><i class="fal fa-wifi"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Parking"><i class="fal fa-parking"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Non-smoking Rooms"><i
                                                            class="fal fa-smoking-ban"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Pets Friendly"><i class="fal fa-dog-leashed"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap">
                                                <div class="listing-item-category red-bg"><i
                                                        class="fal fa-cheeseburger"></i></div>
                                                <span>Restaurants</span>
                                            </a>
                                            <div class="geodir-opt-list">
                                                <ul class="no-list-style">
                                                    <li><a href="#" class="show_gcc"><i
                                                                class="fal fa-envelope"></i><span
                                                                class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                    <li><a href="#1" class="single-map-item"
                                                            data-newlatitude="40.72956781"
                                                            data-newlongitude="-73.99726866"><i
                                                                class="fal fa-map-marker-alt"></i><span
                                                                class="geodir-opt-tooltip">On the map
                                                                <strong>1</strong></span> </a></li>
                                                    <li>
                                                        <div class="dynamic-gal gdop-list-link"
                                                            data-dynamicPath="[{'src': 'images/all/1.jpg'},{'src': 'images/all/1.jpg'}, {'src': 'images/all/1.jpg'}]">
                                                            <i class="fal fa-search-plus"></i><span
                                                                class="geodir-opt-tooltip">Gallery</span></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price-level geodir-category_price">
                                                <span class="price-level-item" data-pricerating="3"></span>
                                                <span class="price-name-tooltip">Pricey</span>
                                            </div>
                                            <div class="geodir-category_contacts">
                                                <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-phone"></i> Call : </span><a
                                                            href="#">+38099231212</a></li>
                                                    <li><span><i class="fal fa-envelope"></i> Write : </span><a
                                                            href="#">yourmail@domain.com</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end -->
                            <!-- listing-item  -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <div class="geodir-js-favorite_btn"><i
                                                class="fal fa-heart"></i><span>Save</span></div>
                                        <a href="listing-single.html" class="geodir-category-img-wrap fl-wrap">
                                            <img src="images/all/1.jpg" alt="">
                                        </a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/1.jpg" alt=""></a>
                                            <span class="avatar-tooltip">Added By <strong>Mark Rose</strong></span>
                                        </div>
                                        <div class="geodir_status_date color-bg"><i class="fal fa-clock"></i>27 may
                                            2019</div>
                                        <div class="geodir-category-opt">
                                            <div class="listing-rating-count-wrap">
                                                <div class="review-score">4.2</div>
                                                <div class="listing-rating card-popup-rainingvis"
                                                    data-starrating2="4"></div>
                                                <br>
                                                <div class="reviews-count">6 reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap title-sin_item">
                                        <div class="geodir-category-content-title fl-wrap ">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a href="listing-single.html">Rocko Band in
                                                        Marquee Club</a></h3>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                            class="fas fa-map-marker-alt"></i> 75 Prince St, NY,
                                                        USA</a></div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">Sed interdum metus at nisi tempor laoreet. Integer
                                                gravida orci a justo sodales.</p>
                                            <div class="facilities-list fl-wrap">
                                                <div class="facilities-list-title">Facilities : </div>
                                                <ul class="no-list-style">
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Free WiFi"><i class="fal fa-wifi"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Parking"><i class="fal fa-parking"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Non-smoking Rooms"><i
                                                            class="fal fa-smoking-ban"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Pets Friendly"><i
                                                            class="fal fa-dog-leashed"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap">
                                                <div class="listing-item-category purp-bg"><i
                                                        class="fal fa-cocktail"></i></div>
                                                <span>Events</span>
                                            </a>
                                            <div class="geodir-opt-list">
                                                <ul class="no-list-style">
                                                    <li><a href="#" class="show_gcc"><i
                                                                class="fal fa-envelope"></i><span
                                                                class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                    <li><a href="#" class="single-map-item"
                                                            data-newlatitude="40.88496706"
                                                            data-newlongitude="-73.88191222"><i
                                                                class="fal fa-map-marker-alt"></i><span
                                                                class="geodir-opt-tooltip">On the map
                                                                <strong>2</strong></span></a></li>
                                                    <li>
                                                        <div class="dynamic-gal gdop-list-link"
                                                            data-dynamicPath="[{'src': 'images/all/1.jpg'},{'src': 'images/all/1.jpg'}, {'src': 'images/all/1.jpg'}]">
                                                            <i class="fal fa-search-plus"></i><span
                                                                class="geodir-opt-tooltip">Gallery</span></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price-level geodir-category_price">
                                                <span class="price-level-item" data-pricerating="4"></span>
                                                <span class="price-name-tooltip">Ultra High</span>
                                            </div>
                                            <div class="geodir-category_contacts">
                                                <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-phone"></i> Call : </span><a
                                                            href="#">+38099231212</a></li>
                                                    <li><span><i class="fal fa-envelope"></i> Write : </span><a
                                                            href="#">yourmail@domain.com</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end -->
                            <!-- listing-item  -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <div class="geodir-js-favorite_btn"><i
                                                class="fal fa-heart"></i><span>Save</span></div>
                                        <a href="listing-single.html" class="geodir-category-img-wrap fl-wrap">
                                            <img src="images/all/1.jpg" alt="">
                                        </a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/1.jpg" alt=""></a>
                                            <span class="avatar-tooltip">Added By <strong>Lisa Smith</strong></span>
                                        </div>
                                        <div class="geodir_status_date gsd_close"><i class="fal fa-lock"></i>Close Now
                                        </div>
                                        <div class="geodir-category-opt">
                                            <div class="listing-rating-count-wrap">
                                                <div class="review-score">3.8</div>
                                                <div class="listing-rating card-popup-rainingvis"
                                                    data-starrating2="3"></div>
                                                <br>
                                                <div class="reviews-count">4 reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap title-sin_item">
                                        <div class="geodir-category-content-title fl-wrap">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a href="listing-single.html">Premium
                                                        Fitness Gym</a><span class="verified-badge"><i
                                                            class="fal fa-check"></i></span></h3>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                            class="fas fa-map-marker-alt"></i> W 85th St, New York,
                                                        USA</a></div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">Sed interdum metus at nisi tempor laoreet. Integer
                                                gravida orci a justo sodales.</p>
                                            <div class="facilities-list fl-wrap">
                                                <div class="facilities-list-title">Facilities : </div>
                                                <ul class="no-list-style">
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Free WiFi"><i class="fal fa-wifi"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Parking"><i class="fal fa-parking"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Non-smoking Rooms"><i
                                                            class="fal fa-smoking-ban"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Pets Friendly"><i
                                                            class="fal fa-dog-leashed"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap">
                                                <div class="listing-item-category blue-bg"><i
                                                        class="fal fa-dumbbell"></i></div>
                                                <span>Fitness / Gym</span>
                                            </a>
                                            <div class="geodir-opt-list">
                                                <ul class="no-list-style">
                                                    <li><a href="#" class="show_gcc"><i
                                                                class="fal fa-envelope"></i><span
                                                                class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                    <li><a href="#" class="single-map-item"
                                                            data-newlatitude="40.94982541"
                                                            data-newlongitude="-73.84357452"><i
                                                                class="fal fa-map-marker-alt"></i><span
                                                                class="geodir-opt-tooltip">On the map
                                                                <strong>3</strong></span> </a></li>
                                                    <li>
                                                        <div class="dynamic-gal gdop-list-link"
                                                            data-dynamicPath="[{'src': 'images/all/1.jpg'},{'src': 'images/all/1.jpg'}, {'src': 'images/all/1.jpg'}]">
                                                            <i class="fal fa-search-plus"></i><span
                                                                class="geodir-opt-tooltip">Gallery</span></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price-level geodir-category_price">
                                                <span class="price-level-item" data-pricerating="2"></span>
                                                <span class="price-name-tooltip">Moderate</span>
                                            </div>
                                            <div class="geodir-category_contacts">
                                                <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-phone"></i> Call : </span><a
                                                            href="#">+38099231212</a></li>
                                                    <li><span><i class="fal fa-envelope"></i> Write : </span><a
                                                            href="#">yourmail@domain.com</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end -->
                            <!-- listing-item  -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <div class="geodir-js-favorite_btn"><i
                                                class="fal fa-heart"></i><span>Save</span></div>
                                        <a href="listing-single.html" class="geodir-category-img-wrap fl-wrap">
                                            <img src="images/all/1.jpg" alt="">
                                        </a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/1.jpg" alt=""></a>
                                            <span class="avatar-tooltip">Added By <strong>Kliff Antony</strong></span>
                                        </div>
                                        <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open
                                            Now</div>
                                        <div class="geodir-category-opt">
                                            <div class="listing-rating-count-wrap">
                                                <div class="review-score">5.0</div>
                                                <div class="listing-rating card-popup-rainingvis"
                                                    data-starrating2="5"></div>
                                                <br>
                                                <div class="reviews-count">4 reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap title-sin_item">
                                        <div class="geodir-category-content-title fl-wrap">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a href="listing-single.html">MontePlaza
                                                        Hotel</a><span class="verified-badge"><i
                                                            class="fal fa-check"></i></span></h3>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                            class="fas fa-map-marker-alt"></i> 70 Bright St New York,
                                                        USA</a></div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">Sed interdum metus at nisi tempor laoreet. Integer
                                                gravida orci a justo sodales.</p>
                                            <div class="facilities-list fl-wrap">
                                                <div class="facilities-list-title">Facilities : </div>
                                                <ul class="no-list-style">
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Free WiFi"><i class="fal fa-wifi"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Parking"><i class="fal fa-parking"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Non-smoking Rooms"><i
                                                            class="fal fa-smoking-ban"></i></li>
                                                    <li class="tolt" data-microtip-position="top"
                                                        data-tooltip="Pets Friendly"><i
                                                            class="fal fa-dog-leashed"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap">
                                                <div class="listing-item-category  yellow-bg"><i
                                                        class="fal fa-bed"></i></div>
                                                <span>Hotels</span>
                                            </a>
                                            <div class="geodir-opt-list">
                                                <ul class="no-list-style">
                                                    <li><a href="#" class="show_gcc"><i
                                                                class="fal fa-envelope"></i><span
                                                                class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                    <li><a href="#" class="single-map-item"
                                                            data-newlatitude="40.72228267"
                                                            data-newlongitude="-73.99246214"><i
                                                                class="fal fa-map-marker-alt"></i><span
                                                                class="geodir-opt-tooltip">On the map
                                                                <strong>4</strong></span></a></li>
                                                    <li>
                                                        <div class="dynamic-gal gdop-list-link"
                                                            data-dynamicPath="[{'src': 'images/all/1.jpg'},{'src': 'images/all/1.jpg'}, {'src': 'images/all/1.jpg'}]">
                                                            <i class="fal fa-search-plus"></i><span
                                                                class="geodir-opt-tooltip">Gallery</span></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price-level geodir-category_price">
                                                <span class="price-level-item" data-pricerating="4"></span>
                                                <span class="price-name-tooltip">Ultra High</span>
                                            </div>
                                            <div class="geodir-category_contacts">
                                                <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-phone"></i> Call : </span><a
                                                            href="#">+38099231212</a></li>
                                                    <li><span><i class="fal fa-envelope"></i> Write : </span><a
                                                            href="#">yourmail@domain.com</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end -->
                        </div>
                        <!-- listing-item-container end -->
                    </div>
                    <div class="col-md-4">
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>About Athor </h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-author fl-wrap">
                                    <div class="box-widget-author-title">
                                        <div class="box-widget-author-title-img">
                                            <img src="images/avatar/1.jpg" alt="">
                                        </div>
                                        <div class="box-widget-author-title_content">
                                            <a href="user-single.html">Alisa Noory</a>
                                            <span>4 Places Hosted</span>
                                        </div>
                                        <div class="box-widget-author-title_opt">
                                            <a href="#" class="tolt color-bg cwb" data-microtip-position="top"
                                                data-tooltip="Chat With Owner"><i class="fas fa-comments-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>User Contacts </h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-content bwc-nopad">
                                    <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                        <ul class="no-list-style">
                                            <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a
                                                    href="#">USA 27TH Brooklyn NY</a></li>
                                            <li><span><i class="fal fa-phone"></i> Phone :</span> <a
                                                    href="#">+7(123)987654</a></li>
                                            <li><span><i class="fal fa-envelope"></i> Mail :</span> <a
                                                    href="#">AlisaNoory@domain.com</a></li>
                                            <li><span><i class="fal fa-browser"></i> Website :</span> <a
                                                    href="#">themeforest.net</a></li>
                                        </ul>
                                    </div>
                                    <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                        <ul class="no-list-style">
                                            <li><a href="#" target="_blank"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                            <li><a href="#" target="_blank"><i
                                                        class="fab fa-instagram"></i></a></li>
                                        </ul>
                                        <div class="bottom-bcw-box_link"><a href="#"
                                                class="show-single-contactform tolt" data-microtip-position="top"
                                                data-tooltip="Write Message"><i class="fal fa-envelope"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>Get in Touch </h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-content">
                                    <form class="add-comment custom-form">
                                        <fieldset>
                                            <label><i class="fal fa-user"></i></label>
                                            <input type="text" placeholder="Your Name *" value="" />
                                            <div class="clearfix"></div>
                                            <label><i class="fal fa-envelope"></i> </label>
                                            <input type="text" placeholder="Email Address*" value="" />
                                            <textarea cols="40" rows="3" placeholder="Additional Information:"></textarea>
                                        </fieldset>
                                        <button class="btn float-btn color2-bg">Send Message<i
                                                class="fal fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- this section loads the user profile end --}}

    {{-- user chat box --}}
    <div class="chat-widget-button cwb tolt" data-microtip-position="left" data-tooltip="Chat With Owner"><i class="fal fa-comments-alt"></i></div>
    <div class="chat-widget_wrap not-vis-chat">
        <div class="chat-widget_header">
            <div style="margin-top: 18px !important;">
                <h3>Chat with  <a href="author-single.html"> Alisa Noory</a></h3>
            </div>
            <div class="status st_online"><span></span>Online</div>
        </div>
        <div class="chat-body" data-simplebar>
            <!-- message-->
            <div class="chat-message chat-message_guest fl-wrap">
                <div class="dashboard-message-avatar">
                    <img src="images/avatar/1.jpg" alt="">
                </div>
                <span class="chat-message-user-name">Jessie</span>
                <span class="massage-date">25 may 2018  <span>7.51 PM</span></span>
                <p>Vivamus lobortis vel nibh nec maximus. Donec dolor erat, rutrum ut feugiat sed, ornare vitae nunc. </p>
            </div>
            <!-- message end-->
            <!-- message-->
            <div class="chat-message chat-message_user fl-wrap">
                <div class="dashboard-message-avatar">
                    <img src="images/avatar/1.jpg" alt="">
                </div>
                <span class="chat-message-user-name">Alica</span>
                <span class="massage-date">25 may 2018  <span>7.51 PM</span></span>
                <p>Nulla eget erat consequat quam feugiat dapibus eget sed mauris.</p>
            </div>
            <!-- message end-->
            <!-- message-->
            <div class="chat-message chat-message_guest fl-wrap">
                <div class="dashboard-message-avatar">
                    <img src="images/avatar/1.jpg" alt="">
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
    {{-- user chat box end --}}

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
