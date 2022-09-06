<!-- user profile section -->
<div class="show-reg-form">
    <i class="fal fa-user"></i>{{ ucfirst($username) }}
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
