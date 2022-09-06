@php
    $current_route = Route::currentRouteName();
@endphp

<div class="nav-holder main-menu">
    <nav>
        <ul class="no-list-style">
            <li>
                <a href="/home" class="{{  $current_route == "app-general.home-page" ? 'act-link' : '' }}" >Home</a>
            </li>
            <li>
                <a href="/opportunities" class="{{ ($current_route == "web-app.opportunities.list-opportunities" || $current_route == "web-app.opportunities.show-opportunities"  || $current_route == "web-app.opportunities.create-opportunity") ? 'act-link' : '' }}">Opportunities</a>
            </li>
            <li>
                <a href="/how-it-works" class="{{  $current_route == "app-general.how-it-works" ? 'act-link' : '' }}">How it Works</a>
            </li>
            <li>
                <a href="/about-us" class="{{  $current_route == "app-general.about-us" ? 'act-link' : '' }}">About Us</a>
            </li>
        </ul>
    </nav>
</div>
