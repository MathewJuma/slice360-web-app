<div class="custom-form user-registration-form">
    <form action="javascript:void(0);" method="post" name="user_register_form" class="main-register-form" id="user_register_form">
        @csrf
        <label>First Name <span>*</span></label>
        <input type="text" name="first_name" id="first_name" >

        <label>Last Name <span>*</span></label>
        <input type="text" name="last_name" id="last_name" >

        <label>Username <span>*</span> </label>
        <input type="text" name="username" id="username">

        <label>Email Address <span>*</span></label>
        <input type="email" name="email" id="email">

        <label>Phone Number <span>*</span></label>
        <input type="text" name="phone" id="phone">

        <label>Password <span>*</span></label>
        <input type="password" name="password" id="password">

        <label>Confirm Password <span>*</span></label>
        <input type="password" name="password_confirmation" id="password_confirmation">

        <div class="filter-tags ft-list">
            <input type="checkbox" name="privacy" id="privacy">
            <label for="privacy">
                I agree to the <a href="#">Privacy Policy</a>
            </label>
        </div>
        <div class="clearfix"></div>
        <div class="filter-tags ft-list">
            <input type="checkbox" name="terms" id="terms">
            <label for="terms">
                I agree to the <a href="#">Terms and Conditions</a>
            </label>
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn float-btn color2-bg" id="user_register_submit">
            Register <i class="fas fa-caret-right"></i>
        </button>
    </form>
</div>
