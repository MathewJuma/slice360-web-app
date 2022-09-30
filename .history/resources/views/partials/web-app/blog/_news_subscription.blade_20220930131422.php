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
