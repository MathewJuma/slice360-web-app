@php

    //current route
    $current_route = Route::currentRouteName();

    //session user_id
    $user_id = session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name'));

    //routes array
    $dashbaord_routes = [
        "web-app.dashboard.edit-user-profile",
        "web-app.opportunities.create-opportunity",
    ]

@endphp

{{-- only show if user is logged in --}}
@if (Auth::check())

    <div class="lang-wrap">
        <div class="show-lang" style="width: 120px !important; margin-top: 3px !important;  margin-right: 5px !important; border: 0px solid white !important;">
            <span>

                @if (Auth::user()->is_admin === 1)

                    <a href="{{ route('admin-app.dashboard.', $user_id) }}" class="dashboard_link {{ ($current_route == "admin-app.dashboard." || in_array($current_route, $dashbaord_routes)) ? 'dashboard-act-link' : '' }}" >
                        <i class="fal fa-cog"></i><strong> Dashboard &nbsp;&nbsp;</strong>
                    </a>

                @else

                    <a href="{{ route('web-app.dashboard.main-dashboard', $user_id) }}" class="dashboard_link {{ ($current_route == "web-app.dashboard.main-dashboard" || in_array($current_route, $dashbaord_routes)) ? 'dashboard-act-link' : '' }}" >
                        <i class="fal fa-cog"></i><strong> Dashboard &nbsp;&nbsp;</strong>
                    </a>

                @endif

            </span>
        </div>
    </div>

@endif
{{-- only show if user is logged in --}}
