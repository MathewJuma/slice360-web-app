@php
    $current_route = Route::currentRouteName();
@endphp

<div class="nav-holder main-menu">
    <nav>
        <ul class="no-list-style">
            <li>
                <a href="/home" class="{{  $current_route == "general_pages.index" ? 'act-link' : '' }}" >Home</a>
            </li>
            <li>
                <a href="/opportunities" class="{{ ($current_route == "opportunities.all-opportunities" || $current_route == "opportunities.single-opportunities") ? 'act-link' : '' }}">Opportunities</a>
            </li>
            <li>
                <a href="/how-it-works" class="{{  $current_route == "general_pages.how-it-works" ? 'act-link' : '' }}">How it Works</a>
            </li>
            <li>
                <a href="/about-us" class="{{  $current_route == "general_pages.about-us" ? 'act-link' : '' }}">About Us</a>
            </li>
        </ul>
    </nav>
</div>
