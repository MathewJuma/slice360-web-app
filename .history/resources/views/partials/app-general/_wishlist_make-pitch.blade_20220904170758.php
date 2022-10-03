{{-- show if the current route is not  web-app.opportunities.create-opportunity --}}
@if (Route::currentRouteName() !== "web-app.opportunities.create-opportunity")
    <a href="/opportunities/create" class="add-list color-bg">
        <span style="color: #ffffff !important;">Make a Pitch</span> <span><i class="fal fa-layer-plus"></i></span>
    </a>
@endif
{{-- show if the current route is not  web-app.opportunities.create-opportunity end--}}

<!-- wish-list -->
<div class="cart-btn show-header-modal" data-microtip-position="bottom" role="tooltip" aria-label="Your Wishlist">
    <i class="fal fa-heart"></i>
    <span class="cart-counter green-bg"></span>
</div>
<!-- wish-list end -->
