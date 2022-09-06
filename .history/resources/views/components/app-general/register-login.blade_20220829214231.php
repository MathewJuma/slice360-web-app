<div class="main-register-wrap modal registration-modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_main">
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
                            <form method="post"  name="registerform">
                                <label>Username or Email Address <span>*</span> </label>
                                <input name="email" type="text"   onClick="this.select()" value="">
                                <label >Password <span>*</span> </label>
                                <input name="password" type="password"   onClick="this.select()" value="" >
                                <button type="submit"  class="btn float-btn color2-bg"> Log In <i class="fas fa-caret-right"></i></button>
                                <div class="clearfix"></div>
                                <div class="filter-tags">
                                    <input id="check-a3" type="checkbox" name="check">
                                    <label for="check-a3">Remember me</label>
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
                                <form method="post" action="/register-users" name="registerform" class="main-register-form" id="register-user-form">
                                    @csrf
                                    <label >Full Name <span>*</span> </label>
                                    <input id="full_name" name="full_name" type="text" onClick="this.select()" value="{{ old('full_name') }}">
                                    <label >Username <span>*</span> </label>
                                    <input id="username" name="username" type="text" onClick="this.select()" value="{{ old('username') }}">
                                    <label>Email Address <span>*</span></label>
                                    <input id="email" name="email" type="email"  onClick="this.select()" value="{{ old('email') }}" >
                                    <label >Password <span>*</span></label>
                                    <input id="password" name="password" type="password"   onClick="this.select()" value="{{ old('password') }}">
                                    <label >Confirm Password <span>*</span></label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" onClick="this.select()" value="{{ old('password_confirmation') }}">
                                    <div class="filter-tags ft-list">
                                        <input id="check-a2" type="checkbox" name="privacy">
                                        <label for="check-a2">I agree to the <a href="#">Privacy Policy</a></label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags ft-list">
                                        <input id="check-a" type="checkbox" name="terms">
                                        <label for="check-a">I agree to the <a href="#">Terms and Conditions</a></label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="submit" class="btn float-btn color2-bg" id="register_user"> Register  <i class="fas fa-caret-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                </div>
                <!--tabs end -->
                <div class="log-separator fl-wrap"><span>or</span></div>
                <div class="soc-log fl-wrap">
                    <p>For faster login or register use your social account.</p>
                    <a href="#" class="facebook-log"> Facebook</a>
                </div>
                <div class="wave-bg">
                    <div class='wave -one'></div>
                    <div class='wave -two'></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom_javascript')
    <script type="text/javascript">

        $(document).ready(function(){

            //process when the "registerUser" button is clicked
            $('#register_user').click(function(){

                //pull all form values
                var full_name = $('#full_name').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();
                var privacy = $('#privacy').val();
                var terms = $('#terms').val();

                //get all the values from the from
                var form = $(this).parents('form'); //alert(form); die();

                //validate the form
                $(form).validate({

                    rules: {
                        full_name : "required",
                        username : {
                            required: true,
                            minlength: 5
                        },
                        email : {
                            required: true,
                            email: true
                        },
                        password : {
                            required: true,
                            minlength: 6
                        },
                        password_confirmation : {
                            required: true,
                            minlength: 6,
                            equalTo: "#password"
                        },
                        privacy: "required",
                        terms: "required"
                    },
                    messages: {
                        full_name : "Please fill-in your full name",
                        username : {
                            required: "Please enter a valid username",
                            minlength: "Username must be atleast 5 characters"
                        },
                        email : {
                            required: "Please enter a valid email address",
                            email: "Your email address must be a valid email format "
                        },
                        password : {
                            required: "Please enter a valid password",
                            minlength: "Password must be atleast 6 characters"
                        },
                        password_confirmation : {
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
                        //create a new form data object with all the valid data
                        var formData = new FormData(form[0]);

                        //start process ajax code
                        $.ajax({
                            type: "POST",
                            url: "register-users",
                            data: formData,
                            dataType: "JSON",
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                //console.log(response); die();
                                if(response.exists){
                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html('<div class="add-list color-bg" id="jquery_nofications_wrapper">This user email already exists</div>');
                                    setTimeout(function(){
                                        $('.jquery_nofications').fadeOut();
                                    }, 3000);

                                    //retain all values
                                    $('name="full_name"').val(full_name);
                                    $('name="username"').val(username);
                                    $('name="email"').val(email);
                                    $('name="password"').val(password);
                                    $('name="password_confirmation"').val(password_confirmation);
                                    $('name="privacy"').val(privacy);
                                    $('name="terms"').val(terms);

                                }else if(response.success){
                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html('<div class="add-list color-bg" id="jquery_nofications_wrapper">User account successfully registered</div>');
                                    setTimeout(function(){
                                        $('.registration-modal').fadeOut();
                                    }, 800);
                                    setTimeout(function(){
                                        $('.jquery_nofications').fadeOut();
                                    }, 6000);


                                    //clear all the data
                                    $('name="full_name"').val('');
                                    $('name="username"').val('');
                                    $('name="email"').val('');
                                    $('name="password"').val('');
                                    $('name="password_confirmation"').val('');
                                    $('name="privacy"').val('');
                                    $('name="terms"').val('');

                                }else{
                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html('<div class="add-list color-bg" id="jquery_nofications_wrapper">An error occurred. Please try again later.</div>');
                                    setTimeout(function(){
                                        $('.jquery_nofications').fadeOut();
                                    }, 3000);
                                }
                            }
                        });
                    }


                });

            });

        });

    </script>
@endpush
