@foreach ($blog_comments as $comment)

    <!-- reviews-comments-item -->
    <div class="reviews-comments-item only-comments" style="padding-left: 0px !important;">
        <div class="reviews-comments-item-text fl-wrap">
            <div class="reviews-comments-header fl-wrap">
                <h4><a href="#">{{ $comment->author }}</a></h4>
            </div>
            <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
            <div class="reviews-comments-item-footer fl-wrap">
                <div class="reviews-comments-item-date"><span><i class="fal fa-calendar-check"></i>12 April 2018</span></div>
                <a href="#" class="reply-item">Reply</a>
            </div>
        </div>
    </div>
    <!--reviews-comments-item end-->

@endforeach
