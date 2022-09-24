@props(['user_details'])

@php
    $current_route_name = Route::currentRouteName();
    $user_id = session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name'));

    //current_opportunity_id
    $current_opportunity_id = explode("/", URL::current())[4];

    //sub menu toggler
    $sub_menu_items = ['web-app.opportunities.edit-opportunity'];


    //dd();

@endphp

<div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
    <div class="clearfix"></div>
<div class="fixed-bar fl-wrap" id="dash_menu">
    <div class="user-profile-menu-wrap fl-wrap block_box">

        {{-- menu-main-section --}}
        <x-web-app.dashboard.vertical-menu-sections.menu-main-section :user_details='$user_details'/>
        {{-- menu-main-section end--}}

        <!-- user-profile-menu-->
        <div class="user-profile-menu">
            <h3>Opportunities</h3>
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
        <!-- user-profile-menu end-->

        {{-- logout button --}}
        <x-web-app.dashboard.vertical-menu-sections.logout-button />
        {{-- logout button end --}}
    </div>
</div>
{{-- back-to-menu button --}}
<x-web-app.dashboard.vertical-menu-sections.back-to-menu />
{{-- back-to-menu button end --}}
