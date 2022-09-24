@props(['user_details'])

<div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
    <div class="clearfix"></div>
<div class="fixed-bar fl-wrap" id="dash_menu">
    <div class="user-profile-menu-wrap fl-wrap block_box">

        {{-- menu-main-section --}}
        <x-web-app.dashboard.vertical-menu-sections.menu-main-section :user_details='$user_details'/>
        {{-- menu-main-section end--}}

        <!-- user-opportunity-menu-section -->
        <x-web-app.dashboard.vertical-menu-sections.user-opportunity-section :user_details='$user_details'/>
        <!-- user_opportunity-menu-section end-->

        {{-- logout button --}}
        <x-web-app.dashboard.vertical-menu-sections.logout-button />
        {{-- logout button end --}}
    </div>
</div>
{{-- back-to-menu button --}}
<x-web-app.dashboard.vertical-menu-sections.back-to-menu />
{{-- back-to-menu button end --}}
