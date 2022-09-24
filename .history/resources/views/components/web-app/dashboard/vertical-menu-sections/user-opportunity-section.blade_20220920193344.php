@props(['user_details'])

@php

    $current_route_name = Route::currentRouteName();
    $user_id = session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name'));

    //current_opportunity_id
    $current_opportunity_id = explode("/", URL::current())[4];

    //sub menu toggler
    $sub_menu_items = ['web-app.opportunities.edit-opportunity'];

@endphp

{{-- user-opportunity-section --}}
<div class="user-profile-menu">
    <h3 class="menu-headings">Opportunities</h3>
    <ul  class="no-list-style">
        <li><a href="{{ route('web-app.opportunities.my-opportunities') }}" class="{{ $current_route_name == 'web-app.opportunities.my-opportunities' ? 'user-profile-act' : '' }}"><i class="fal fa-th-list"></i> My Opportunities  </a></li>
        <li><a href="{{ route('web-app.opportunities.create-opportunity') }}" class="{{ $current_route_name == 'web-app.opportunities.create-opportunity' ? 'user-profile-act' : '' }}"><i class="fal fa-file-plus"></i> New Opportunity</a></li>
        <li>
            <a href="#" class="submenu-link"><i class="fal fa-plus"></i>More Settings</a>
            <ul class="no-list-style sub-menu-padding" style="{{ in_array($current_route_name, $sub_menu_items) ? 'display: block !important;' : 'display: none !important;' }}" >
                <li><a href="{{ route('web-app.opportunities.my-opportunities') }}" class="{{ $current_route_name == 'web-app.opportunities.edit-opportunity' ? 'user-profile-act' : '' }}"><i class="fal fa-edit"></i> Edit Opportunities</a></li>
                <li><a href="#"><i class="fal fa-image"></i>Opportunity Banners</a></li>
                <li><a href="#"><i class="fal fa-image"></i>Opportunity Images</a></li>
            </ul>
        </li>

    </ul>
</div>
{{-- user-opportunity-section end --}}
