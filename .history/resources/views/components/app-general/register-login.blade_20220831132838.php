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
                    <!--tab -->
                    <div id="tab-1" class="tab-content first-tab">
                        <div class="custom-form">
                            <form action="javascript:void(0);" method="post" name="user_login_form" id="user_login_form">
                                <label>Username or Email Address <span>*</span> </label>
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
                    </div>
                    <!--tab end -->
                    <!--tab -->
                    <div class="tab">
                        <div id="tab-2" class="tab-content">
                            <div class="custom-form user-registration-form">
                                <form action="javascript:void(0);" method="post" name="user_register_form" class="main-register-form" id="user_register_form">
                                    @csrf
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="full_name" id="full_name" >
                                    <span class="text-danger error-text email_err">Test</span>
                                    <label>Username <span>*</span> </label>
                                    <input type="text" name="username" id="username">
                                    <label>Email Address <span>*</span></label>
                                    <input type="email" name="email" id="email">
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
                        </div>
                    </div>
                    <!--tab end -->
                </div>
                <!--tabs end -->
            </div>
        </div>
    </div>
</div>

@push('custom_javascript')
    <script type="text/javascript">
        $(document).ready(function() {

            //process when the "user_register_submit" button is clicked
            $('#user_register_submit').click(function() {

                //We pull all the data from form fields
                var full_name = $('#full_name').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();
                var privacy = $('#privacy').val();
                var terms = $('#terms').val();

                //this is the user registration form
                var user_register_form = $('#user_register_form');

                //validate the "user_register_form" form using jquery validator
                $(user_register_form).validate({

                    rules: {
                        full_name: "required",
                        username: {
                            required: true,
                            minlength: 5
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 6
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 6,
                            equalTo: "#password"
                        },
                        privacy: "required",
                        terms: "required"
                    },
                    messages: {
                        full_name: "Please fill-in your full name",
                        username: {
                            required: "Please enter a valid username",
                            minlength: "Username must be atleast 5 characters"
                        },
                        email: {
                            required: "Please enter a valid email address",
                            email: "Your email address must be a valid email format "
                        },
                        password: {
                            required: "Please enter a valid password",
                            minlength: "Password must be atleast 6 characters"
                        },
                        password_confirmation: {
                            required: "Please enter a valid confirmation password",
                            minlength: "Confirmation password must be atleast 6 characters",
                            equalTo: "Confirmation password MUST be the same as password"
                        },
                        privacy: "Please accept our privacy policy",
                        terms: "Please agree to our terms of service"
                    },
                    highlight: function(element) {
                        $(element).addClass('error_colors');
                    },
                    submitHandler: function() {

                        //here we serialize all the data from the form
                        var form_data = user_register_form.serialize(); //console.log(JSON.stringify(form_data));

                        //start process ajax code
                        $.ajax({
                            type: "POST",
                            url: "{{ route('register-user') }}",
                            data: form_data,
                            dataType: "JSON",
                            processData: false,
                            contentType: false,
                            success: function(response) {

                            }
                        }


                    }

                });

                //here we serialize all the data from the form
                //var form_data = register_form.serialize(); //console.log(form_data);

            });

        });
    </script>
@endpush
