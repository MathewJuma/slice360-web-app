@php
    $current_route = Route::currentRouteName();
    $user_id = session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name'));
@endphp

<!-- user profile section -->
<div class="show-reg-form">
    <a href="{{ route('web-app.dashboard.show-user-profile', $user_id) }}" class="dashboard_link {{ ($current_route == "web-app.dashboard.show-user-profile" && ) ? 'dashboard-act-link' : '' }}"">
        <i class="fal fa-user"></i>{{ ucfirst($username) }}
    </a>
</div>
<!-- user profile section end -->

<!-- log-out section -->
<div class="show-reg-form logout_link">
    <form class="inline" action="/logout-user" method="post">
        @csrf
        <button type="submit">
            <span><i class="fal fa-lock"></i> Logout</span>
        </button>
    </form>
</div>
