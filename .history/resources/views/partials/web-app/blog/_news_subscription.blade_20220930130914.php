{{-- {{ dd($blog_tags) }} --}}

<!--box-widget-item -->
<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>Subscribe</h3>
    </div>
    <div class="box-widget fl-wrap">
        <div class="box-widget-content">
            <div class="list-single-tags tags-stylwrap">

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
                <form action="javascript:void(0);" method="post" id="post_comment_form" class="add-comment  custom-form" name="post_comment_form" >
                    @csrf
                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                    <fieldset>
                        <div class="list-single-main-item_content fl-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <label><i class="fal fa-user"></i></label>
                                    <input type="text" id="full_name" name="full_name" placeholder="Your Name *" value=""/>
                                </div>
                                <div class="col-md-12">
                                    <label><i class="fal fa-envelope"></i>  </label>
                                    <input type="text" id="email_address" name="email_address" placeholder="Email Address*" value=""/>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <button class="btn  color2-bg  float-btn general-btn" type="submit" id="post_comment_submit" style="margin-top:30px;">
                                Submit Comment <i class="fal fa-paper-plane"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
</div>
<!--box-widget-item end -->
