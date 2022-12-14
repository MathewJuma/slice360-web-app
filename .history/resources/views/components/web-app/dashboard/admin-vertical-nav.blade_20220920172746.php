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
                        <li><a href="#"><i class="fal fa-comments-alt"></i>Edit Profile Banner</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- user-profile-menu end-->
        <!-- user-profile-menu-->
        <div class="user-profile-menu">
            <h3>Listings</h3>
            <ul  class="no-list-style">
                <li><a href="{{ route('web-app.opportunities.my-opportunities') }}" class="{{ $current_route_name == 'web-app.opportunities.my-opportunities' ? 'user-profile-act' : '' }}"><i class="fal fa-th-list"></i> My Opportunities  </a></li>
                <li><a href="dashboard-bookings.html"> <i class="fal fa-calendar-check"></i> Bookings <span>2</span></a></li>
                <li><a href="dashboard-review.html"><i class="fal fa-comments-alt"></i> Reviews </a></li>
                <li><a href="{{ route('web-app.opportunities.create-opportunity') }}" class="{{ $current_route_name == 'web-app.opportunities.create-opportunity' ? 'user-profile-act' : '' }}"><i class="fal fa-file-plus"></i> Add New</a></li>
                <li>
                    <a href="#" class="submenu-link"><i class="fal fa-plus"></i>Submenu</a>
                    <ul  class="no-list-style">
                        <li><a href="#"><i class="fal fa-th-list"></i> Submenu 2 </a></li>
                        <li><a href="#"> <i class="fal fa-calendar-check"></i> Submenu 2</a></li>
                        <li><a href="#"><i class="fal fa-comments-alt"></i>Submenu 2</a></li>
                        <li><a href="#"><i class="fal fa-file-plus"></i> Submenu 2</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- user-profile-menu end-->
        <button class="logout_btn color2-bg">Log Out <i class="fas fa-sign-out"></i></button>
    </div>
</div>
<a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="#dash_menu" style="color: #ffffff !important;">Back to Menu<i class="fas fa-caret-up"></i></a>
<div class="clearfix"></div>
