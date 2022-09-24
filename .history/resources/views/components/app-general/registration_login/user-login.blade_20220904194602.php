<div class="custom-form  user-login-form">
    <form action="javascript:void(0);"  method="post" name="user_login_form" class="main-login-form" id="user_login_form">
        @csrf

        <label>Email Address <span>*</span> </label>
        <input name="login_email" type="text" id="login_email">

        <label>Password <span>*</span> </label>
        <input name="login_password" type="password" id="login_password">

        <button type="submit" class="btn float-btn color2-bg" id="user_login_submit">
            Log In <i class="fas fa-caret-right"></i>
        </button>
        <div class="clearfix"></div>
        <div class="filter-tags">
            <input type="checkbox" name="check" id="remember_me">
            <label for="remember_me">Remember me</label>
        </div>
    </form>
    <div class="lost_password">
        <a href="#">Lost Your Password?</a>
    </div>
</div>
