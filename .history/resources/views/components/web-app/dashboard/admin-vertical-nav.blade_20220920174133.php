@props(['all_countries', 'all_categories', 'other_controller_data'])

@php
    $current_route_name = Route::currentRouteName();
    $user_id = session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name'));
@endphp

<div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
    <div class="clearfix"></div>
<div class="fixed-bar fl-wrap" id="dash_menu">
    <div class="user-profile-menu-wrap fl-wrap block_box">
        <!-- user-profile-menu-->
        <div class="user-profile-menu">
            <h3>Main</h3>
            <ul class="no-list-style">
                <li><a href="{{ route('web-app.dashboard.main-dashboard', $user_id) }}" class="{{ $current_route_name == 'web-app.dashboard.main-dashboard' ? 'user-profile-act' : '' }}"><i class="fal fa-chart-line"></i>Dashboard</a></li>
                <li><a href="{{ route('web-app.dashboard.show-user-profile', $user_id) }}" class="{{ $current_route_name == 'web-app.dashboard.show-user-profile' ? 'user-profile-act' : '' }}"><i class="fal fa-user"></i>My Profile</a></li>
                <li><a href="{{ route('web-app.dashboard.edit-user-profile', $user_id) }}" class="{{ $current_route_name == 'web-app.dashboard.edit-user-profile' ? 'user-profile-act' : '' }}"> <i class="fal fa-user-edit"></i> Edit profile</a></li>
                <li><a href="dashboard-messages.html"><i class="fal fa-envelope"></i> Messages <span>3</span></a></li>
                <li>
                    <a href="#" class="submenu-link"><i class="fal fa-plus"></i>More Settings</a>
                    <ul  class="no-list-style sub-menu-padding">
                        <li><a href="#"><i class="fal fa-key"></i> Change Password </a></li>
                        <li><a href="#"> <i class="fal fa-user"></i> Edit Profile Image</a></li>
                        <li><a href="#"><i class="fal fa-image"></i>Edit Profile Banner</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- user-profile-menu end-->
        <!-- user-profile-menu-->
        <div class="user-profile-menu">
            <h3>Opportunities</h3>
            <ul  class="no-list-style">
                <li><a href="{{ route('web-app.opportunities.my-opportunities') }}" class="{{ $current_route_name == 'web-app.opportunities.my-opportunities' ? 'user-profile-act' : '' }}"><i class="fal fa-th-list"></i> All Opportunities </a></li>
                <li>
                    <a href="#" class="submenu-link"><i class="fal fa-plus"></i>More Settings</a>
                    <ul  class="no-list-style sub-menu-padding">
                        <li><a href="#"><i class="fal fa-edit"></i> Edit Opportunity</a></li>
                        <li><a href="#"> <i class="fal fa-calendar-check"></i> Create Timeline</a></li>
                        <li><a href="#"><i class="fal fa-image"></i>Opportunity Banner</a></li>
                        <li><a href="#"><i class="fal fa-image"></i>Opportunity Images</a></li>
                    </ul>
                </li>
                <li><a href="dashboard-bookings.html"> <i class="fal fa-calendar-check"></i> New Opportunities <span>2</span></a></li>
                <li><a href="dashboard-bookings.html"> <i class="fal fa-calendar-check"></i> Publish Opportunities <span>2</span></a></li>
                <li><a href="dashboard-bookings.html"> <i class="fal fa-lock"></i> Review Opportunities <span>2</span></a></li>
            </ul>
        </div>
        <!-- user-profile-menu end-->

        {{-- logout buttom --}}
        <form class="inline" action="/logout-user" method="post">
            @csrf
            <button type="submit" class="logout_btn color2-bg general-btn">Log Out <i class="fas fa-sign-out"></i></button>
        </form>
        {{-- logout buttom end--}}
    </div>
</div>
<a class="back-tofilters color2-bg custom-scroll-link fl-wrap general-btn" href="#dash_menu" style="color: #ffffff;">Back to Menu<i class="fas fa-caret-up"></i></a>
<div class="clearfix"></div>
