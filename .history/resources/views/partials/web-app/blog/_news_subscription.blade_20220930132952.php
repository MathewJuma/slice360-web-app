{{-- {{ dd($blog_tags) }} --}}

<!--box-widget-item -->
<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>News/Posts Subscription</h3>
    </div>
    <div class="box-widget fl-wrap" style="padding-top: 20px !important;">
        <style type="text/css">
            .error {
                color: #dc3545 !important;
                font-size: 13px !important;
                margin-top: -10px !important;
                margin-bottom: 10px !important;
            }

            #comments-error {
                margin-top: 10px !important;
            }
        </style>
        <!-- Review Comment -->
        <form action="javascript:void(0);" method="post" id="news_subscription_form" class="add-comment  custom-form" name="news_subscription_form" >
            @csrf
            <fieldset>
                <div class="list-single-main-item_content fl-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <label><i class="fal fa-user"></i></label>
                            <input type="text" id="full_name" name="full_name" placeholder="Full Name *" value=""/>
                        </div>
                        <div class="col-md-12">
                            <label><i class="fal fa-envelope"></i>  </label>
                            <input type="text" id="email_address" name="email_address" placeholder="Email Address*" value=""/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <button class="btn  color2-bg  float-btn general-btn" type="submit" id="news_subscription_submit" style="margin-top:30px;">
                        Subscribe <i class="fal fa-paper-plane"></i>
                    </button>
                </div>
            </fieldset>
        </form>

    </div>
</div>
<!--box-widget-item end -->

{{-- this is the custom javascript --}}
@push('custom_javascript')

    <script type="text/javascript">
        $(document).ready(function() {

            //process when the "opportunity_unfollow_submit" button is clicked
            $('#news_subscription_form').click(function() {

                //1. this is the opportunity follow login form
                var news_subscription_form = $('#news_subscription_submit').parents('form');

                //3. validate the "post_comment_form" form using jquery validator
                $(news_subscription_form).validate({

                    //3.1 validation rules
                    rules: {
                        full_name: "required",
                        email_address: "required",
                    },

                    //3.2 validation response messages
                    messages: {
                        full_name: "Your full name is required",
                        email: "Your email is required",
                    },

                    //3.3 validation error highlight
                    highlight: function(element) {
                        $(element).addClass('error_colors');
                    },

                    //3.4 submission incase validation is passed
                    submitHandler: function() {

                        //1. create a new instance of the form with all form data having passed validation
                        form_data = new FormData(news_subscription_form[0]);

                        //2. get all login form values
                        var _token = $("input[name='_token']").val();
                        var email_address = $('#email_address').val();
                        var email_address = $('#email_address').val();

                        //form data
                        var form_data = {
                            "_token" : _token,
                            "full_name": full_name,
                            "email_address" : email_address,
                        }

                        alert(JSON.stringify(form_data)); die();


                    }

                });

            })

        });
    </script>

@endpush
{{-- this is the custom javascript --}}
