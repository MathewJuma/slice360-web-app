@props(['all_countries', 'all_categories', 'user_details'])

@php
    //current route
    $current_route_name = Route::currentRouteName();

    //current page
    $current_page_name = explode('.', $current_route_name)[2];

    //session user_id
    $user_id =  session()->get('system_user_id') !== NULL ? session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name')) : 0;

    //user full name
    $full_name = $user_details->first_name . ' ' . $user_details->last_name;

    //check is this profile has a user profile image
    if(isset($user_details->user_profile->user_profile_image)){

        $profile_image = asset('storage/'.$user_details->user_profile->user_profile_image->image_path);

    }else{

        $profile_image = asset('web_app/images/avatar/1_1.jpg');

    }

@endphp

<!--  header section  -->
<section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
    <div class="container">
        <div class="dashboard-breadcrumbs breadcrumbs">
            <a href="{{ route('app-general.home-page') }}">Home</a>
            <a href="{{ route('web-app.dashboard.main-dashboard', $user_id) }}">Dashboard</a>
            <span>Main page</span>
        </div>

        {{-- only if the user is logged-in --}}
        @auth
            <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                <h1>Welcome  :
                    <span><a href="{{ route('web-app.dashboard.show-user-profile', $user_id) }}" style="color: #ffffff;">{{ $full_name}}</a></span>
                </h1>
            </div>
        @endauth
        {{-- only if the user is logged-in  end--}}

    </div>
    <div class="clearfix"></div>

    {{-- dashboard header --}}
    <div class="dashboard-header fl-wrap">
        <div class="container">
            <div class="dashboard-header_conatiner fl-wrap">
                <div class="dashboard-header-avatar">
                    <img src="{{ $profile_image }}" alt="">

                    {{-- only show if the current route is nor edit --}}
                    @if ($current_route_name !== 'web-app.dashboard.edit-user-profile')
                        <a href="{{ route('web-app.dashboard.edit-user-profile', $user_id) }}" class="color-bg edit-prof_btn">
                            <i class="fal fa-edit"></i>
                        </a>
                    @endif
                    {{-- only show if the current route is nor edit end--}}

                </div>
                <div class="dashboard-header-stats-wrap">
                    <!-- component :: dashboard-header-stats -->
                    <x-web-app.dashboard.dashboard-stats :user_details='$user_details'/>
                    <!--  component :: dashboard-header-stats  end -->
                </div>
                <!--  dashboard-header-stats-wrap end -->

                @if($current_route_name !== "web-app.opportunities.create-opportunity")
                    <a class="add_new-dashboard">Add Listing <i class="fal fa-layer-plus"></i></a>
                @endif

            </div>
        </div>
    </div>
    {{-- dashboard header end--}}

    {{-- dashboard bubbles --}}
    <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
    <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
    <div class="circle-wrap" style="left:120px;bottom:120px;" data-scrollax="properties: { translateY: '-200px' }">
        <div class="circle_bg-bal circle_bg-bal_small"></div>
    </div>
    <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
        <div class="circle_bg-bal circle_bg-bal_big"></div>
    </div>
    <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
        <div class="circle_bg-bal circle_bg-bal_big"></div>
    </div>
    <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
        <div class="circle_bg-bal circle_bg-bal_middle"></div>
    </div>
    <div class="circle-wrap" style="right:40%;top:-10px;"  >
        <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
    </div>
    <div class="circle-wrap" style="right:55%;top:90px;"  >
        <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
    </div>
    {{-- dashboard bubbles end --}}
</section>
<!--  header section  end-->
