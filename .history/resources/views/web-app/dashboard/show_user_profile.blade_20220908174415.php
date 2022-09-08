@php

//current route
$current_route = Route::currentRouteName();

//session user_id
$user_id = session()->get('system_user_id') !== null ? session()->get('system_user_id') . '-' . Str::slug(session()->get('system_user_name')) : 0;

//this is the user profile details
$user_profile = $user_details->user_profile;
$second_email = $user_profile->second_email ?? '';
$second_phone = $user_profile->second_phone ?? '';
$third_phone = $user_profile->third_phone ?? '';
$first_address = $user_profile->first_address ?? '';
$second_address = $user_profile->second_address ?? '';
$city = $user_profile->city ?? '';
$country_id = $user_profile->country_id ?? '';
$brief_description = $user_profile->brief_description ?? 'User prile description has not yet been updated. Check later for updates';
$website = $user_profile->website_url ?? '';
$youtube = $user_profile->youtube_link ?? '';
$facebook = $user_profile->facebook ?? '';
$twitter = $user_profile->twitter ?? '';
$instagram = $user_profile->instagram ?? '';

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
                                <div class="bg" data-bg="{{ asset($user_details->banner_image) }}"></div>
                                <div class="user-profile-header_media_title">
                                    <h3>{{ $user_details->first_name . ' ' . $user_details->last_name }}</h3>

                                    @if ($country_id !== '')

                                        @foreach ($all_countries as $country)
                                            @if ($country->id == $country_id)
                                                <h4>{{ $city . ', ' . $country->name }}</h4>
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

                                {{-- only show the follow button if profile is not user's --}}
                                @if (auth()->id() != $user_details->id)
                                    <div class="follow-btn color2-bg">Follow <i class="fal fa-user-plus"></i></div>
                                @endif
                                {{-- only show the follow button if profile is not user's end --}}

                            </div>
                            <div class="user-profile-header_content fl-wrap">
                                <div class="user-profile-header-avatar">
                                    <img src="{{ asset($user_details->profile_image) }}" alt="">
                                </div>

                                {{-- show user profile description --}}
                                {!! $brief_description !!}
                                {{-- show user profile description end --}}

                                {{-- show button if there is website url --}}
                                @if ($website != '')
                                    <a href="{{ $website }}" target="_blank" class="btn float-btn color2-bg">
                                        Visit Website<i class="fal fa-chevron-right"></i>
                                    </a>
                                @endif
                                {{-- show button if there is website url end --}}
                            </div>
                        </div>
                        <!-- list-single-main-item end -->
                        <!-- list-main-wrap-header-->
                        <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow">
                            <!-- list-main-wrap-title-->
                            <div class="list-main-wrap-title">
                                <h2>Opportunities by :
                                    <span>{{ $user_details->first_name . ' ' . $user_details->last_name }}</span></h2>
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
                                        <li class="grid-opt_act">
                                            <span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View">
                                                <i class="fal fa-th"></i>
                                            </span>
                                        </li>
                                        <li class="grid-opt_act">
                                            <span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View">
                                                <i class="fal fa-list"></i>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- price-opt end-->
                            </div>
                            <!-- list-main-wrap-opt end-->
                        </div>
                        <!-- list-main-wrap-header end-->
                        <!-- listing-item-container -->
                        <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic" style="margin-top: -10px !important;">

                            @if (count($user_opportunities) == 0)
                                <div class="section-title" style="padding-top: 50px !important;">
                                    <h2 style="color: #325096 !important;">No investment opportunities found for this profile!</h2>
                                </div>
                            @else

                                {{-- loop through each opportunity --}}
                                @foreach ($user_opportunities as $opportunity)

                                    <!-- begin :: load listing from a component -->
                                    <x-web-app.opportunities.opportunity-card :opportunity='$opportunity' :all_countries='$all_countries' :all_categories='$all_categories'/>
                                    <!-- begin :: load listing from a component -->

                                @endforeach
                                {{-- loop through each opportunity end --}}
                            @endif

                        </div>
                        <!-- listing-item-container end -->

                        {{-- pagination section --}}
                        {{ $user_opportunities->links('pagination::slice360-custom') }}
                        {{-- pagination section end --}}
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
    <div class="chat-widget-button cwb tolt" data-microtip-position="left" data-tooltip="Chat With Owner"><i
            class="fal fa-comments-alt"></i></div>
    <div class="chat-widget_wrap not-vis-chat">
        <div class="chat-widget_header">
            <div style="margin-top: 18px !important;">
                <h3>Chat with <a href="author-single.html"> Alisa Noory</a></h3>
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
                <span class="massage-date">25 may 2018 <span>7.51 PM</span></span>
                <p>Vivamus lobortis vel nibh nec maximus. Donec dolor erat, rutrum ut feugiat sed, ornare vitae nunc.
                </p>
            </div>
            <!-- message end-->
            <!-- message-->
            <div class="chat-message chat-message_user fl-wrap">
                <div class="dashboard-message-avatar">
                    <img src="images/avatar/1.jpg" alt="">
                </div>
                <span class="chat-message-user-name">Alica</span>
                <span class="massage-date">25 may 2018 <span>7.51 PM</span></span>
                <p>Nulla eget erat consequat quam feugiat dapibus eget sed mauris.</p>
            </div>
            <!-- message end-->
            <!-- message-->
            <div class="chat-message chat-message_guest fl-wrap">
                <div class="dashboard-message-avatar">
                    <img src="images/avatar/1.jpg" alt="">
                </div>
                <span class="chat-message-user-name">Jessie</span>
                <span class="massage-date">25 may 2018 <span>7.51 PM</span></span>
                <p>Sed non neque faucibus, condimentum lectus at, accumsan enim. Fusce pretium egestas cursus..</p>
            </div>
            <!-- message end-->
        </div>
        <div class="chat-widget_input fl-wrap">
            <textarea placeholder="Type Message"></textarea>
            <button type="submit"><i class="fal fa-paper-plane"></i></button>
        </div>
    </div>
    {{-- user chat box end --}}

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
