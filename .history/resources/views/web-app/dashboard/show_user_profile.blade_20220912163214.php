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
$first_address = $user_profile->first_address ?? 'No address found';
$second_address = $user_profile->second_address ?? '';
$city = $user_profile->city ?? '';
$country_id = $user_profile->country_id ?? '';
$brief_description = $user_profile->brief_description ?? '';
$website = $user_profile->website_url ?? '';
$youtube = $user_profile->youtube_link ?? '';
$facebook = $user_profile->facebook ?? '';
$twitter = $user_profile->twitter ?? '';
$instagram = $user_profile->instagram ?? '';

//User following section
$following = $user_details->user_following; //this user_details is following these users
$following_user_id = []; //this array holds user_ids that this user is following.
//loop through and get user id
foreach ($following as $following_details) {

    //fetch only active followed_by
    if($following_details->status == 1){

        $following_user_id[] = $following_details->followed_id;

    }

}

$followed_by = $user_details->user_followed_by; //this user_details is being followed by these users
$followed_by_user_id = []; //this array holds user_ids that this user is being followed by.
//loop through and get user id
foreach ($followed_by as $followed_by_details) {

    //fetch only active followed_by
    if($followed_by_details->status == 1){

        $followed_by_user_id[] = $followed_by_details->followed_by_id;

    }

}

//dd($followed_by_user_id);

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

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
                                        <li><span>{{ $user_opportunities->total() }}</span>Opportunities</li>
                                        <li><span>{{ count($followed_by_user_id) }}</span>Followers</li>
                                        <li><span>{{ count($following_user_id) }}</span>Following</li>
                                    </ul>
                                </div>

                                {{-- only show the follow button if user is logged in and profile is not current user's --}}
                                @if (Auth::check() && auth()->id() != $user_details->id)

                                    @if (in_array(auth()->id(), $followed_by_user_id))

                                        <form action="javascript:void(0);" method="post" id="user_unfollow_form">
                                            @csrf
                                            <input type="hidden" name="followed_by_id" id="followed_by_id" value="{{ auth()->id() }}">
                                            <input type="hidden" name="following_id" id="following_id" value="{{ $user_details->id }}">
                                            <input type="hidden" name="status" id="status" value="0">
                                            <button type="submit" id="user_unfollow_submit">
                                                <div class="follow-btn color2-bg">Unfollow <i class="fal fa-user-minus"></i></div>
                                            </button>
                                        </form>

                                    @else

                                        <form action="javascript:void(0);" method="post" id="user_follow_form">
                                            @csrf
                                            <input type="hidden" name="followed_by_id" id="followed_by_id" value="{{ auth()->id() }}">
                                            <input type="hidden" name="following_id" id="following_id" value="{{ $user_details->id }}">
                                            <input type="hidden" name="status" id="status" value="1">
                                            <button type="submit" id="user_follow_submit">
                                                <div class="follow-btn color2-bg">Follow <i class="fal fa-user-plus"></i></div>
                                            </button>
                                        </form>

                                    @endif

                                @endif
                                {{-- only show the follow button if user is logged in and profile is not current user's end --}}

                            </div>
                            <div class="user-profile-header_content fl-wrap">
                                <div class="user-profile-header-avatar">
                                    <img src="{{ asset($user_details->profile_image) }}" alt="">

                                    {{-- only show if this profile belongs to current user --}}
                                    @if (auth()->id()=== $user_details->id)
                                        <a href="{{ route('web-app.dashboard.edit-user-profile', $user_details->id . '-' . Str::slug($user_details->first_name. '-'.$user_details->last_name)) }}" class="color-bg edit-prof_btn">
                                            <i class="fal fa-edit"></i>
                                        </a>
                                    @endif
                                    {{-- only show if this profile belongs to current user  end--}}

                                </div>

                                {{-- show user profile description --}}
                                @if ($brief_description == '')

                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-4">

                                            @if (Auth::check() && auth()->id() === $user_details->id)
                                                <p style="text-align:center !important; font-size: 14px !important; color: #4db7fe !important;">
                                                    <i class="fa fa-exclamation-circle" style="font-size: 24px !important;"></i>&nbsp;&nbsp;
                                                    Your profile is not updated. Updating your profile makes it easy for potential investors to relate with you.
                                                </p>
                                            @else
                                                <p style="text-align:center !important; font-size: 14px; color: #325096 !important;">
                                                    <i class="fa fa-exclamation-circle" style="font-size: 24px !important;"></i>&nbsp;&nbsp;
                                                    User profile description has not yet been updated. Check later for profile updates.
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                @else

                                    {!! $brief_description !!}

                                @endif
                                {{-- {!! $brief_description !!} --}}




                                {{-- show user profile description end --}}
                                {{-- show user profile description end --}}

                                {{-- show button if there is website url --}}
                                @if ($website !== '')
                                    <a href="{{ $website }}" target="_blank" class="btn float-btn color2-bg">
                                        Visit Website<i class="fal fa-chevron-right"></i>
                                    </a>
                                @endif
                                {{-- show button if there is website url end --}}
                            </div>
                        </div>
                        <!-- list-single-main-item end -->


                        {{-- show only if opportunity count is greater than 0 --}}
                        @if (count($user_opportunities) > 0)

                        <!-- list-main-wrap-header-->
                        <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow">
                            <!-- list-main-wrap-title-->
                            <div class="list-main-wrap-title">
                                <h2>
                                    @if (auth()->id() != $user_details->id)
                                        Opportunities by :
                                        <span>{{ $user_details->first_name . ' ' . $user_details->last_name }}</span>
                                    @else
                                        My Opportunities
                                    @endif

                                </h2>
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
                                            <span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom"
                                                data-tooltip="Grid View">
                                                <i class="fal fa-th"></i>
                                            </span>
                                        </li>
                                        <li class="grid-opt_act">
                                            <span class="one-col-grid tolt" data-microtip-position="bottom"
                                                data-tooltip="List View">
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

                        @endif
                        {{-- show only if opportunity count is greater than 0 end --}}


                        <!-- listing-item-container -->
                        <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic"
                            style="margin-top: -20px !important;">

                            @if (count($user_opportunities) == 0)
                                <div class="box-widget-item fl-wrap block_box" style="margin-top: 10px !important;">
                                    <div class="box-widget-item-header"  style="padding-top: 25px !important;">
                                        <h3>Opportunity Details</h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="box-widget-author fl-wrap" >
                                            <h4 style="color: #325096 !important; padding-top: 15px !important; padding-bottom: 15px !important;">
                                                No investment opportunities found for this user profile!
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @else
                                {{-- loop through each opportunity --}}
                                @foreach ($user_opportunities as $opportunity)
                                    <!-- begin :: load listing from a component -->
                                    <x-web-app.opportunities.opportunity-card :opportunity='$opportunity' :all_countries='$all_countries'
                                        :all_categories='$all_categories' />
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
                                <h3>About Pivot Investor </h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-author fl-wrap">
                                    <div class="box-widget-author-title" style="padding-right: 100px !important;">
                                        <div class="box-widget-author-title-img">
                                            <img src="{{ asset($user_details->profile_image) }}" alt="">
                                        </div>
                                        <div class="box-widget-author-title_content">
                                            <a
                                                href="user-single.html">{{ $user_details->first_name . ' ' . $user_details->last_name }}
                                            </a>
                                            <span style="color: #4db7fe !important;">
                                                {{ $user_opportunities->total() }} Investment Opportunities
                                            </span>
                                        </div>

                                        {{-- only show if user is logged in --}}
                                        @if(Auth::check())
                                            <div class="box-widget-author-title_opt">
                                                <a href="#" class="tolt color-bg cwb" data-microtip-position="top" data-tooltip="Chat With {{ $user_details->first_name }}">
                                                <i class="fas fa-comments-alt"></i>
                                                </a>
                                            </div>
                                        @endif
                                        {{-- only show if user is logged in end--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->

                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>Investor Contacts</h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-content bwc-nopad">

                                    @if (!Auth::check())
                                        <div class="row">
                                            <div class="col-md-12 mt-3 mb-5">
                                                <p style="text-align:center !important; font-size: 14px !important; color: #4db7fe !important;">
                                                    <i class="fa fa-exclamation-circle" style="font-size: 24px !important;"></i>&nbsp;&nbsp;You must be logged in to see investor contacts
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                            <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                            <ul class="no-list-style">
                                                <li>
                                                    <span>
                                                        <i class="fal fa-map-marker"></i> Adress :
                                                    </span>
                                                    <a href="#">{{ $first_address . ', ' . $city }}</a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="fal fa-phone"></i> Phone :
                                                    </span>
                                                    <a
                                                        href="#">{{ $user_details->phone }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="fal fa-envelope"></i> Mail :
                                                    </span>
                                                    <a
                                                        href="#">{{ $user_details->email }}
                                                    </a>
                                                </li>

                                                {{-- if website is not blank --}}
                                                @if ($website != '')
                                                    <li>
                                                        <span>
                                                            <i class="fal fa-browser"></i> Website :
                                                        </span>
                                                        <a
                                                            href="{{ $website }}">{{ $website }}
                                                        </a>
                                                    </li>
                                                @endif
                                                {{-- if website is not blank end --}}

                                            </ul>
                                        </div>
                                        <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                            <ul class="no-list-style">
                                                {{-- if facebook is not blank --}}
                                                @if ($facebook != '')
                                                    <li>
                                                        <a href="{{ $facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                @endif
                                                {{-- if facebook is not blank --}}

                                                {{-- if twitter is not blank --}}
                                                @if ($twitter != '')
                                                    <li>
                                                        <a href="{{ $twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                @endif
                                                {{-- if twitter is not blank end--}}

                                                {{-- if instagram is not blank --}}
                                                @if ($instagram != '')
                                                    <li>
                                                        <a href="{{ $instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                                    </li>
                                                @endif
                                                {{-- if instagram is not blank end--}}

                                            </ul>

                                        </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->

                        {{-- box-widget-item - only show if this profile belongs to current user --}}
                        @if ( Auth::check() && auth()->id() !== $user_details->id)
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
                        @endif
                        {{-- box-widget-item - only show if this profile belongs to current user end --}}

                        {{-- box-widget-item - only show if this profile belongs to current user --}}
                        @if ( Auth::check() && auth()->id() === $user_details->id)
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Give Testimonial</h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <form class="add-comment custom-form">
                                            <fieldset>
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" placeholder="Business Role *" value="" />
                                                <div class="clearfix"></div>
                                                <label><i class="fal fa-envelope"></i> </label>
                                                <input type="text" placeholder="Opportunity Location*" value="" />
                                                <textarea cols="40" rows="3" placeholder="Additional Information:"></textarea>
                                            </fieldset>
                                            <button class="btn float-btn color2-bg">Post Testimonial<i
                                                    class="fal fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- box-widget-item - only show if this profile belongs to current user end --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- this section loads the user profile end --}}

    {{-- only show if user is logged in --}}
    @if(Auth::check())
        {{-- user chat box --}}
        <div class="chat-widget-button cwb tolt" data-microtip-position="left" data-tooltip="Chat With  {{ $user_details->first_name }}">
            <i class="fal fa-comments-alt"></i>
        </div>
        <div class="chat-widget_wrap not-vis-chat">
            <div class="chat-widget_header">
                <div style="margin-top: 18px !important;">
                    <h3>Chat with <a href="author-single.html">  {{ $user_details->first_name }}</a></h3>
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
    @endif
    {{-- only show if user is logged in end--}}

    {{-- this is the custom javascript --}}
    @push('custom_javascript')

        <script type="text/javascript">
            $(document).ready(function() {

                //process when the "user_follow_submit" button is clicked
                $('#user_follow_submit').click(function() {

                    //1. this is the user follow login form
                    var user_follow_form = $('#user_follow_submit').parents('form');

                    //2. get all login form values
                    var _token = $("input[name='_token']").val();
                    var followed_by_id = $('#followed_by_id').val();
                    var following_id = $('#following_id').val();
                    var status = $('#status').val();

                    //create a new instance of the form with all form data having passed validation
                    var form_data = new FormData(user_follow_form[0]);

                    //start process ajax code
                    $.ajax({
                        type: "POST",
                        url: "{{ route('app-general.users.follow-user') }}",
                        data: form_data,
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        success: function(response) {

                            //check if response has error
                            if($.isEmptyObject(response.exists)){

                                if(response.success){

                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html(
                                        '<div class="add-list color-bg" id="jquery_nofications_wrapper">You are now following this user</div>'
                                        );

                                    setInterval('location.reload()',
                                    1500); //reload the whole page

                                    setTimeout(function() {
                                        $('.jquery_nofications').fadeOut();
                                    }, 5000);

                                }

                            }else{

                                $('.jquery_nofications').fadeIn();
                                $('.jquery_nofications').html(
                                    '<div class="add-list color-bg" id="jquery_nofications_wrapper" style="color: #dc3545 !important; !important;">An error occurred. Try again later!</div>'
                                    );
                                setTimeout(function() {
                                    $('.jquery_nofications').fadeOut();
                                }, 5000);

                            }

                        }
                    });


                });

                //process when the "user_unfollow_submit" button is clicked
                $('#user_unfollow_submit').click(function() {

                    //1. this is the user follow login form
                    var user_unfollow_form = $('#user_unfollow_submit').parents('form');

                    //2. get all login form values
                    var _token = $("input[name='_token']").val();
                    var followed_by_id = $('#followed_by_id').val();
                    var following_id = $('#following_id').val();
                    var status = $('#status').val();

                    //create a new instance of the form with all form data having passed validation
                    var form_data = new FormData(user_unfollow_form[0]);

                    //start process ajax code
                    $.ajax({
                        type: "POST",
                        url: "{{ route('app-general.users.unfollow-user') }}",
                        data: form_data,
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        success: function(response) {

                            //check if response has error
                            if($.isEmptyObject(response.not_exists)){

                                if(response.success){

                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html(
                                        '<div class="add-list color-bg" id="jquery_nofications_wrapper">You are now not following this user</div>'
                                    );

                                    setInterval('location.reload()',
                                    1500); //reload the whole page

                                    setTimeout(function() {
                                        $('.jquery_nofications').fadeOut();
                                    }, 5000);

                                }

                            }else{

                                $('.jquery_nofications').fadeIn();
                                $('.jquery_nofications').html(
                                    '<div class="add-list color-bg" id="jquery_nofications_wrapper" style="color: #dc3545 !important; !important;">An error occurred. Try again later!</div>'
                                    );
                                setTimeout(function() {
                                    $('.jquery_nofications').fadeOut();
                                }, 5000);

                            }

                        }
                    });


                });

            });
        </script>

    @endpush
    {{-- this is the custom javascript end--}}

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
