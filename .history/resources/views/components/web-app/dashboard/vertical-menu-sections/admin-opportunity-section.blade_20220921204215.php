@props(['user_details'])

@php

    $current_route_name = Route::currentRouteName();
    $user_id = session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name'));

    //current_opportunity_id
    $current_opportunity_id = explode("/", URL::current())[4];

    //sub menu toggler
    $sub_menu_items = ['web-app.opportunities.edit-opportunity'];

@endphp

{{-- admin-opportunity-section --}}
<div class="user-profile-menu">
    <h3 class="menu-headings">Opportunities</h3>
    <ul  class="no-list-style">
        <li><a href="{{ route('web-app.opportunities.admin-fetch-opportunities') }}" id="admin-fetch-opportunities" class="{{ $current_route_name == 'web-app.opportunities.admin-fetch-opportunities' ? 'user-profile-act' : '' }}"><i class="fal fa-th-list"></i> All Opportunities </a></li>
        <li>
            <a href="#" class="submenu-link"><i class="fal fa-plus"></i>More Settings</a>
            <ul  class="no-list-style sub-menu-padding">
                <li><a href="#"><i class="fal fa-edit"></i> Edit Opportunities</a></li>
                <li><a href="#"> <i class="fal fa-calendar-check"></i> Create Timelines</a></li>
                <li><a href="#"><i class="fal fa-image"></i>Opportunity Banners</a></li>
                <li><a href="#"><i class="fal fa-image"></i>Opportunity Images</a></li>
            </ul>
        </li>
        <li><a href="dashboard-bookings.html"> <i class="fal fa-file-plus"></i> New Opportunities <span>2</span></a></li>
        <li><a href="dashboard-bookings.html"> <i class="fal fa-calendar-check"></i> Publish Opportunities <span>2</span></a></li>
        <li><a href="dashboard-bookings.html"> <i class="fal fa-lock"></i> Review Opportunities <span>2</span></a></li>
    </ul>
</div>
{{-- admin-opportunity-section end --}}
