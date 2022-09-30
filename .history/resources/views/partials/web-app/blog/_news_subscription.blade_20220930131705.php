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
                        author: "Your name is required",
                        email: "Your email is required",
                        comments: "Your post comment is required"
                    },

                    //3.3 validation error highlight
                    highlight: function(element) {
                        $(element).addClass('error_colors');
                    },

                    //3.4 submission incase validation is passed
                    submitHandler: function() {

                        //1. create a new instance of the form with all form data having passed validation
                        form_data = new FormData(post_comment_form[0]);

                        //2. get all login form values
                        var _token = $("input[name='_token']").val();
                        var post_id = $('#post_id').val();
                        var author = $('#author').val();
                        var email = $('#email').val();
                        var comments = $('#comments').val();

                        //form data
                        var form_data = {
                            "_token" : _token,
                            "post_id": post_id,
                            "author": author,
                            "email" : email,
                            "comments" : comments,
                        }

                        //alert(JSON.stringify(form_data)); die();

                        //start process ajax code
                        $.ajax({
                            type: "POST",
                            url: "{{ route('web-app.blog.review-post') }}",
                            data: form_data,
                            cache: false,
                            //dataType: "JSON",
                            //processData: false,
                            //contentType: false,
                            success: function(response) {
                                //check if response has error
                                if($.isEmptyObject(response.exists)){

                                    if(response.success){

                                        //clear all the data
                                        $('#post_comment_form').each(function() {
                                            this.reset();
                                        });

                                        $('.jquery_nofications').fadeIn();
                                        $('.jquery_nofications').html(
                                            '<div class="add-list color-bg" id="jquery_nofications_wrapper">Thankyou for reviewing this post</div>'
                                        );

                                        setInterval('location.reload()',
                                        1500); //reload the whole page

                                        setTimeout(function() {
                                            $('.jquery_nofications').fadeOut();
                                        }, 5000);

                                    }

                                }else if($.isEmptyObject(response.sucess)){

                                    if(response.exists){

                                        //clear all the data
                                        $('#post_comment_form').each(function() {
                                            this.reset();
                                        });

                                        $('.jquery_nofications').fadeIn();
                                        $('.jquery_nofications').html(
                                            '<div class="add-list color-bg" id="jquery_nofications_wrapper" style="color: #dc3545 !important; !important;">You have already reviewed this post. Thankyou.</div>'
                                        );

                                        setInterval('location.reload()',
                                        1500); //reload the whole page

                                        setTimeout(function() {
                                            $('.jquery_nofications').fadeOut();
                                        }, 5000);

                                    }

                                }else{

                                    $('.jquery_nofications').fadeIn();
                                    $('.jquery_nofications').html(
                                        '<div class="add-list color-bg" id="jquery_nofications_wrapper" style="color: #dc3545 !important; !important;">An error occurred. Try again later!</div>'
                                        );
                                    setTimeout(function() {
                                        $('.jquery_nofications').fadeOut();
                                    }, 5000);

                                }
                            },
                            error: function(response){


                            }
                        });

                    }

                });

            })

        });
    </script>

@endpush
{{-- this is the custom javascript --}}
