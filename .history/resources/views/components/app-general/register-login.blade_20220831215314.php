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
                                <form action="/register-users" method="post" name="user_register_form" class="main-register-form" id="user_register_form">
                                    @csrf
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="full_name" id="full_name" >

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

                //1. this is the user registration form
                var user_register_form = $('#user_register_submit').parents('form');

                //2. these are all the form parameters
                var _token = $("input[name='_token']").val();
                var full_name = $('#full_name').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();
                var privacy = $('#privacy').val();
                var terms = $('#terms').val();

                //3. validate the "user_register_form" form using jquery validator
                $(user_register_form).validate({

                    //3.1 validation rules
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

                    //3.2 validationn response messages
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

                    //3.3 validation error highlight
                    highlight: function(element) {
                        $(element).addClass('error_colors');
                    },

                    //3.4 submission incase validation is passed
                    submitHandler: function() {

                        //create a new instance of the form with all form data having passed validation
                        form_data = new FormData(user_register_form[0]);

                        //start process ajax code
                        $.ajax({
                            type: "POST",
                            url: "register-user",
                            data: form_data,
                            dataType: "JSON",
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                //console.log(response); die();
                                if (response.exists) {
                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html(
                                        '<div class="add-list color-bg" id="jquery_nofications_wrapper">This user email already exists</div>'
                                        );
                                    setTimeout(function() {
                                        $('.jquery_nofications').fadeOut();
                                    }, 5000);

                                    //retain all values
                                    $('name="full_name"').val(full_name);
                                    $('name="username"').val(username);
                                    $('name="email"').val(email);
                                    $('name="password"').val(password);
                                    $('name="password_confirmation"').val(password_confirmation);
                                    $('name="privacy"').val(privacy);
                                    $('name="terms"').val(terms);

                                } else if (response.success) {

                                    //clear all the data
                                    $('#user_register_form').each(function() {
                                        this.reset();
                                    });

                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html(
                                        '<div class="add-list color-bg" id="jquery_nofications_wrapper">User account successfully registered</div>'
                                        );
                                    setTimeout(function() {
                                        $('.user_login_register_modal').fadeOut();
                                    }, 800);

                                    setInterval('location.reload()',
                                    3000); //reload the whole page

                                    setTimeout(function() {
                                        $('.jquery_nofications').fadeOut();
                                    }, 5000);

                                } else {
                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html(
                                        '<div class="add-list color-bg" id="jquery_nofications_wrapper">An error occurred. Please try again later.</div>'
                                        );
                                    setTimeout(function() {
                                        $('.jquery_nofications').fadeOut();
                                    }, 5000);
                                }
                            }
                        });

                    }

                });

                //here we serialize all the data from the form
                //var form_data = register_form.serialize(); //console.log(form_data);

            });

            function printErrorMsg (msg) {

                $.each( msg, function( key, value ) {

                    console.log(key);

                    $('#'+key+'_error').text(value);

                });

            }

        });
    </script>
@endpush
