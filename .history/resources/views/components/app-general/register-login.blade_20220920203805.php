<div class="main-register-wrap modal user_login_register_modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap modal_main">
            <div class="main-register_title">Welcome to <span><strong>Slice</strong>360<strong>.</strong></span></div>
            <div class="close-reg"><i class="fal fa-times"></i></div>
            <ul class="tabs-menu fl-wrap no-list-style" style="padding-left: 2rem !important;">
                <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
            </ul>
            <!--tabs -->
            <div class="tabs-container">
                <div class="tab">
                    <!--tab 1 :: user login form-->
                    <div id="tab-1" class="tab-content first-tab">
                        <x-app-general.registration_login.user-login />
                    </div>
                    <!--tab 1 :: user login form end -->

                    <!--tab 2 :: user registration form-->
                    <div id="tab-2" class="tab-content">
                        <x-app-general.registration_login.user-registration />
                    </div>
                    <!--tab 2 :: user registration form end-->
            </div>
        </div>
    </div>
</div>

