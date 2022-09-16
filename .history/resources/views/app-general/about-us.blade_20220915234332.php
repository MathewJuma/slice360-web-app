@php

    //set inital 0 values
    $opportunity_count = 0; $total_amount_funded = 0; $total_opportunities = 0;

    //first and last dates of the month
    $first_month_date = strtotime(date('01-m-Y 00:00:00')); // hard-coded '01' for first day
    $last_month_date  = strtotime(date('t-m-Y 23:59:59')); //last date of the current month

    //loop through each opportunity
    foreach ($all_opportunities as $opportunity) {

        //fetch created_at
        $created_at = strtotime(date('d-m-Y H:i:s', strtotime($opportunity->created_at)));

        //increament if the created_at is within limits
        if($created_at >= $first_month_date && $created_at <= $last_month_date){

            $opportunity_count++;

        }

        //work on the % funding
        if($opportunity->amount_needed == $opportunity->amount_raised){

            $total_amount_funded = $total_amount_funded + ($opportunity->amount_raised/1000);
            $total_opportunities ++;

        }

    }

    //dd(number_format($total_amount_funded,0,",",""));

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: how it works :: hero inner -->
    <x-app-general.hero-inner title='About Slice360' description='The largest social investment platform powered by shared vision' imageName='about-us.jpg'/>
    <!--component end :: how it works :: hero inner-->

    {{-- add vertical nav partial --}}
    @include('partials.app-general._side_nav');
    {{-- add vertical nav partial end --}}

    <!--section :: the stories of Slice360-->
    <section id="sec1" data-scrollax-parent="true">
        <div class="container">

            <div class="section-title">
                <h2>What is Slice360</h2>
                <div class="section-subtitle">who we are</div>
                <span class="section-separator"></span>
                <p>A social investment platform through which pivot investors pitch business/investment opportunities and aspiring investors can explore and identify investment opportunities that interest them</p>
            </div>
            <!--about-wrap :: founder's story -->
            <div class="about-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="list-single-main-media fl-wrap" style="box-shadow: 0 9px 26px rgba(58, 87, 135, 0.2);">
                            <img src="{{ asset('web_app/images/all/wheat-harvest-1.jpg') }}" class="respimg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ab_text" style="text-align: justify;ext-justify: inter-word;">
                            <div class="ab_text-title fl-wrap">
                                <h3>Founder's Story</h3>
                                <span class="section-separator fl-sec-sep"></span>
                            </div>
                            <p style="text-align: justify;">
                                Back then, I belonged to a group of eight friends who contributed $150 each on a monthly basis to our group savings, and our hope was to invest in a major project later on. We had been saving for some time, and by 2017 we had approximately $27,000 in savings.
                            </p>
                            <p style="text-align: justify;">
                                Occasionally, a group member would suggest a business or investment opportunity, but due to differing visions, mistrust and improper regulations, none was ever pursued. Instead, we would only go on road trips and have parties. Having always wanted to produce beans or wheat in large quantities, I conducted an extensive research and presented the odds, but still couldn't convince my friends.
                            </p>
                            <p style="text-align: justify;">
                                I decided to find small-scale wheat farmers who were already in business and see if we could join forces. There were not many close friends between them, but only business partners, and only a few knew each other. Having pitched to them the idea of economies of scale, we eventually cultivated 307 hectares of wheat farm in Narok, Kenya in 2019. There were 13 of us who shared in the vision with varying stakes, and it was a great success! Since then, I have believed in stakeholder partnerships fueled by shared vision.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- about-wrap end :: founder's story -->
            <span class="fw-separator" style="margin-bottom: 30px !important;"></span>

            <!--about-wrap :: story of Slice360-->
            <div class="about-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ab_text" style="text-align: justify;ext-justify: inter-word;">
                            <div class="ab_text-title fl-wrap">
                                <h3>The Story of Slice360</h3>
                                <span class="section-separator fl-sec-sep"></span>
                            </div>
                            <p style="text-align: justify;">
                                The concept of Slice360 was conceived in late 2021 and the company was founded in Nairobi, Kenya in mid 2022 by Mathew Juma, with a core mission to ensure that everyone could own some wealth. The World Bank estimates Kenya's GDP per capita to be $2,100, while the IMF estimates Kenya's overall GDP to be $269.29 billion, which makes Kenya the 7th richest nation in Africa as of 2021.
                            </p>
                            <p style="text-align: justify;">
                                According to World Population Review, Africa includes some of the fastest-growing economies in the world. The African economy is expected to reach a GDP of $29 trillion by 2050, powered by its agriculture, trade, and natural resources sectors. The region has an eager and expanding workforce, with 20 million new job seekers a year in sub-Saharan Africa alone.
                            </p>
                            <p style="text-align: justify;">
                                Against this backdrop, varying visions, mistrust, poor regulations, meager earnings, and obscurities in business processes continue to hinder the prospects for faster economic growth, wealth creation and sustainability. By providing a social investment platform, Slice360 aims to close this gap by allowing everyone to confidently invest in vetted business opportunities by slicing a portion of it.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="list-single-main-media fl-wrap" style="box-shadow: 0 9px 26px rgba(58, 87, 135, 0.2);">
                            <img src="{{ asset('web_app/images/all/wheat-harvest.jpg') }}" class="respimg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- about-wrap end ::  story of Slice360  -->

            <span class="fw-separator"></span>
            <div class=" single-facts bold-facts fl-wrap">
                <x-app-general.index_page.general-statistics :all_opportunities='$all_opportunities' :new_monthly_visitors='$new_monthly_visitors'  />
            </div>
        </div>
    </section>
    <!--section end :: the stories of Slice360-->

    <!--section  :: how it works-->
    <section class="gray-bg particles-wrapper">
        <div class="container">
            <div class="section-title">
                <h2>How Slice360 Works</h2>
                <div class="section-subtitle">Discover &amp; Connect </div>
                <span class="section-separator"></span>
                <p>This investment platform connects pivot investors with aspiring investors based on shared visions, and helps them slice investment opportunities in small proportions</p>
            </div>
            <div class="process-wrap_time-line fl-wrap">
                <!--process-item-->
                <div class="process-item_time-line">
                    <div class="pi_head color-bg">1</div>
                    <div class="pi-text fl-wrap">
                        <h4>Pivot Investor</h4>
                        <p>Pitches an investment opportunity, accompanied by explicit proof and an estimate of capital requirements.</p>
                    </div>
                </div>
                <!--process-item end-->
                <!--process-item-->
                <div class="process-item_time-line">
                    <div class="pi_head color-bg">2</div>
                    <div class="pi-text fl-wrap">
                        <h4>Slice360</h4>
                        <p>Verifies business/investment opportunities, publishes them to the general public, and maintains smart contracts.</p>
                    </div>
                </div>
                <!--process-item end-->
                <!--process-item-->
                <div class="process-item_time-line">
                    <div class="pi_head color-bg">3</div>
                    <div class="pi-text fl-wrap">
                        <h4>Aspiring Investors</h4>
                        <p>Identifies investment opportunities, assists with raising required capital, and gains profits from their investments.</p>
                    </div>
                </div>
                <!--process-item end-->
            </div>
            <a href="how-it-works.html" class="btn color2-bg general-btn">View More Details<i class="fal fa-angle-right"></i></a>
        </div>
        <div id="particles-js" class="particles-js"></div>
    </section>
    <!--section end :: how it works-->

    <!--section :: slice360 walk-through  -->
    <section class="parallax-section" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="{{ asset('web_app/images/bg/video-bg.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <!--container-->
        <div class="container">
            <div class="video_section-title fl-wrap">
                <h2>Slice360 Walk-through</h2>
                <h4>Get ready to start an exciting journey on Slice360. This video will guide you through the amazing world of pooled investments through shared visions. Learn how to, and start your journey into this new experience right away.</h4>
            </div>
            <a href="https://vimeo.com/70851162" class="promo-link big_prom  image-popup"><i class="fal fa-play"></i><span>Slice360 Video</span></a>
        </div>
    </section>
    <!--section end :: slice360 walk-through -->

    <!--section :: leadership-->
    <section id="sec2">
        <div class="container">
            <div class="section-title">
                <h2>Slice360 Leadership</h2>
                <div class="section-subtitle">the crew</div>
                <span class="section-separator"></span>
                <p>Slice360 is led by technocrats and result driven strategic thinkers, with the sole goal of using technology to grow wealth for every humanity.</p>
            </div>
            <div class="about-wrap team-box2 fl-wrap">
                <!-- team-item -->
                <div class="team-box">
                    <div class="team-photo">
                        <img src="{{ asset('web_app/images/team/1.jpg') }}" alt="" class="respimg">
                    </div>
                    <div class="team-info fl-wrap">
                        <h3><a href="#">Mathew Juma</a></h3>
                        <h4>Founder / CEO</h4>
                        <p>An excellent visionary and strategic thinker, capable of conceptualizing, designing and implementing sophisticated plans while integrating technologies into everyday life.</p>
                        <div class="team-social">
                            <ul class="no-list-style">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- team-item  end-->
                <!-- team-item -->
                <div class="team-box">
                    <div class="team-photo">
                        <img src="{{ asset('web_app/images/team/2.png') }}" alt="" class="respimg">
                    </div>
                    <div class="team-info fl-wrap">
                        <h3><a href="#">Braxton Muimi</a></h3>
                        <h4>Co-Founder / CTO</h4>
                        <p>Initiates excellent technological innovations to lead product development. Drives initiatives, policies, and procedures that enhance technical product offering to end users.</p>
                        <div class="team-social">
                            <ul class="no-list-style">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- team-item end  -->
                <!-- team-item -->
                <div class="team-box">
                    <div class="team-photo">
                        <img src="{{ asset('web_app/images/team/1.jpg') }}" alt="" class="respimg">
                    </div>
                    <div class="team-info fl-wrap">
                        <h3><a href="#">John Slater</a></h3>
                        <h4>Co-Founder / COO</h4>
                        <p>Establishes and implements policies that promote company's culture and vision. Manages business operations to maintain peak performance with an execution mindset.</p>
                        <div class="team-social">
                            <ul class="no-list-style">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- team-item end  -->
            </div>
        </div>
        <div class="waveWrapper waveAnimation">
            <div class="waveWrapperInner bgMiddle">
            <div class="wave-bg-anim waveMiddle" style="background-image: url('{{ asset('web_app/images/wave-top.png') }}')"></div>
            </div>
            <div class="waveWrapperInner bgBottom">
            <div class="wave-bg-anim waveBottom" style="background-image: url('{{ asset('web_app/images/wave-top.png') }}')"></div>
            </div>
        </div>
    </section>
    <!--section end :: leadership-->

    <!--section :: customer-support bg  -->
    <section class="parallax-section" data-scrollax-parent="true" id="sec3">
        <div class="bg par-elem "  data-bg="{{ asset('web_app/images/all/customer-support.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <!--container-->
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Why Choose Us</span></h2>
                <span class="section-separator"></span>
                <h4>Slice360 is a powerful and mobile friendly platform with excellent support and a powerful administration panel</h4>
            </div>
        </div>
    </section>
    <!--section end :: customer-support bg-->

    <!--section :: why choose us -->
    <section class="gray-bg absolute-wrap_section">
        <div class="container">
            <div class="absolute-wrap fl-wrap">
                <!-- features-box-container -->
                <div class="features-box-container fl-wrap">
                    <div class="row">
                        <!--features-box -->
                        <div class="col-md-4">
                            <div class="features-box">
                                <div class="time-line-icon">
                                    <i class="fal fa-headset"></i>
                                </div>
                                <h3>24 Hours Support</h3>
                                <p>Our excellent support staff are available 24 hours a day, seven days a week, to ensure that each user receives the best service possible on Slice360</p>
                            </div>
                        </div>
                        <!-- features-box end  -->
                        <!--features-box -->
                        <div class="col-md-4">
                            <div class="features-box">
                                <div class="time-line-icon">
                                    <i class="fal fa-users-cog"></i>
                                </div>
                                <h3>Admin Panel</h3>
                                <p>A powerful administration panel and dashboard allows Slice360 users to easily publish, opt-into, and take advantage of on-board investment opportunities</p>
                            </div>
                        </div>
                        <!-- features-box end  -->
                        <!--features-box -->
                        <div class="col-md-4">
                            <div class="features-box ">
                                <div class="time-line-icon">
                                    <i class="fal fa-mobile"></i>
                                </div>
                                <h3>Mobile Friendly</h3>
                                <p>To ensure that each user has the best experience while exploring investment opportunities, Slice360 is designed to be responsive and mobile-friendly</p>
                            </div>
                        </div>
                        <!-- features-box end  -->
                    </div>
                </div>
                <!-- features-box-container end  -->
            </div>
            <div class="section-separator"></div>
        </div>
    </section>
    <!--section end :: why choose us-->

    <!--section :: testimonials  -->
    @if ($testimonials->count() > 0)
        <x-app-general.index_page.testimonials :testimonials='$testimonials' />
    @endif
    <!--section end :: testimonials -->

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
