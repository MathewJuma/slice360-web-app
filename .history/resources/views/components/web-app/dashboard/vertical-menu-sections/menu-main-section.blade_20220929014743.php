@props(['user_details'])

@php
    $current_route_name = Route::currentRouteName();
    $user_id = session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name'));
    $base_url = URL::to('/');
@endphp

<!-- user-profile-menu-->
<div class="user-profile-menu">
    <h3 class="menu-headings">Main</h3>
    <ul class="no-list-style">
        <li><a href="{{ route('web-app.dashboard.main-dashboard', $user_id) }}" class="{{ $current_route_name == 'web-app.dashboard.main-dashboard' ? 'user-profile-act' : '' }}"><i class="fal fa-chart-line"></i>Dashboard</a></li>
        <li><a href="{{ $base_url . '/slice360-blog' }}" class=""><i class="fal fa-comments-o "></i>Blog</a></li>
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
