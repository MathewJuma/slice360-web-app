<!-- user profile section -->
<div class="show-reg-form">
    <i class="fal fa-user"></i>Athias
</div>
<!-- user profile section end -->

<!-- log-out section -->
<div class="show-reg-form logout_link">
    <form class="inline" action="/logout-user" method="post">
        @csrf
        <button type="submit">
            <i class="fa-solid fa-door-closed"></i> Logout
        </button>
    </form>
</div>
<!-- logout section end -->
