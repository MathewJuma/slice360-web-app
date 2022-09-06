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

@push('custom_javascript')
    <script type="text/javascript">
        $(document).ready(function() {

            //process when the "user_login_submit" button is clicked
            $('#user_login_submit').click(function(e) {

                alert('login!!');
            });

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
                                if (response.exists) { //case error exists

                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html(
                                        '<div class="add-list color-bg" id="jquery_nofications_wrapper">This user email already exists</div>'
                                        );
                                    setTimeout(function() {
                                        $('.jquery_nofications').fadeOut();
                                    }, 5000);

                                    //retain all form values values
                                    $('name="full_name"').val(full_name);
                                    $('name="username"').val(username);
                                    $('name="email"').val(email);
                                    $('name="password"').val(password);
                                    $('name="password_confirmation"').val(password_confirmation);
                                    $('name="privacy"').val(privacy);
                                    $('name="terms"').val(terms);

                                } else if (response.success) { //case submission success

                                    //clear all the data
                                    $('#user_register_form').each(function() {
                                        this.reset();
                                    });

                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html(
                                        '<div class="add-list color-bg" id="jquery_nofications_wrapper">User account successfully registereds</div>'
                                        );

                                    setTimeout(function() {
                                        $('.user_login_register_modal').fadeOut();
                                    }, 800);

                                    setInterval('location.reload()',
                                    3000); //reload the whole page

                                    setTimeout(function() {
                                        $('.jquery_nofications').fadeOut();
                                    }, 5000);

                                } else { //case unknown error

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

        });
    </script>
@endpush
