@php
    $current_route = Route::currentRouteName();
@endphp

<div class="lang-wrap">
    <div class="show-lang" style="width: 120px !important; margin-top: 3px !important;  margin-right: 5px !important; border: 0px solid white !important;">
        <span>
            <a href="{{ route('web-app.dashboard.main-dashboard') }}" style="color: #ffffff !important;" class="{{  $current_route == "web-app.dashboard.main-dashboard" ? 'act-link' : '' }}" >
                <i class="fal fa-cog"></i><strong> Dashboard &nbsp;&nbsp;</strong>
            </a>
        </span>
    </div>
</div>
