@foreach ($blog_comments as $comment)

    <!-- reviews-comments-item -->
    <div class="reviews-comments-item only-comments" style="padding-left: 0px !important;">
        <div class="reviews-comments-item-text fl-wrap">
            <div class="reviews-comments-header fl-wrap">
                <h4><a href="#">{{ $comment->author }}</a></h4>
            </div>
            <p>{{ $comment->comment }}</p>
            <div class="reviews-comments-item-footer fl-wrap">
                <div class="reviews-comments-item-date"><span><i class="fal fa-calendar-check"></i>12 April 2018</span></div>
                <a href="#" class="reply-item">Reply</a>
            </div>
        </div>
    </div>
    <!--reviews-comments-item end-->

@endforeach
