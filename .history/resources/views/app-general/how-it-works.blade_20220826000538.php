{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    <!--component :: how it works :: hero inner -->
    <x-app-general.hero-inner title='How it works' description='Learn how to use Slice360 to realize your investment vision' imageName='how-it-works.jpg'/>
    <!--component end :: how it works :: hero inner-->

    <!--section :: how it works -->
    <section data-scrollax-parent="true">
        <div class="container">
            <div class="section-title">
                <h2>How Slice360 Works</h2>
                <div class="section-subtitle">Discover &amp; Connect </div>
                <span class="section-separator"></span>
                <p>This investment platform connects pivot investors with aspiring investors based on shared visions, and helps them slice investment opportunities in small proportions</p>
            </div>
        </div>
    </section>
    <!--section end :: how it works -->

    <!--section :: videos -->
    <section class="gradient-bg hidden-section" data-scrollax-parent="true">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="colomn-text  pad-top-column-text fl-wrap">
                        <div class="colomn-text-title">
                            <h3>Video Tutorials</h3>
                            <p>Watch Vimeo or Youtube video channels to quickly learn how Slice360 works. These will make the process alot easier and more realistic.</p>
                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-vimeo-v"></i>Vimeo</a>
                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-youtube"></i> Youtube</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-single-main-media fl-wrap">
                        <img src="{{ asset('web_app/images/bg/learning-3.jpg') }}" class="respimg" alt="">
                        <a href="https://vimeo.com/70851162" class="promo-link   image-popup"><i class="fal fa-video"></i><span>How Slice360 Works</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
        <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
        <div class="circle-wrap" style="left:270px;top:120px;" data-scrollax="properties: { translateY: '-200px' }">
            <div class="circle_bg-bal circle_bg-bal_small"></div>
        </div>
        <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
            <div class="circle_bg-bal circle_bg-bal_big"></div>
        </div>
        <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
            <div class="circle_bg-bal circle_bg-bal_big"></div>
        </div>
        <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
            <div class="circle_bg-bal circle_bg-bal_middle"></div>
        </div>
        <div class="circle-wrap" style="right:40%;top:-10px;"  >
            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
        </div>
        <div class="circle-wrap" style="right:55%;top:90px;"  >
            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
        </div>
    </section>
    <!--section :: videos end-->

    <!--section :: FAQs -->
    <section class="gray-bg" id="sec3">
        <div class="container">
            <div class="section-title">
                <h2> FAQ</h2>
                <div class="section-subtitle">Popular Questions</div>
                <span class="section-separator"></span>
                <p>This section answers popular questions on how Slice360 works. The information below is general, and may vary based on the investment opportunity or the target location.</p>
            </div>
            <div class="post-container fl-wrap">
                <div class="row">
                    <!-- blog content-->
                    <div class="col-md-3">
                        <div class="faq-nav help-bar scroll-init">
                            <ul class="no-list-style">
                                <li>
                                    <a href="#fq1">
                                    <i class="fal fa-space-shuttle"></i>
                                    <span>Getting Started</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#fq2">
                                    <i class="fal fa-map-marker-alt"></i>
                                    <span>Pivot Investor</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#fq3">
                                    <i class="fal fa-layer-plus"></i>
                                    <span>Aspiring Investor</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#fq4">
                                    <i class="fal fa-user-headset"></i>
                                    <span>Other Questions</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- blog conten end-->
                    <!-- blog sidebar -->
                    <div class="col-md-9">
                        <!-- faq-section :: getting started -->
                        <div class="faq-title faq-title_first fl-wrap">Getting Started</div>
                        <div class="faq-section fl-wrap" id="fq1">
                            <!-- accordion-->
                            <div class="accordion">
                                <a class="toggle act-accordion" href="#">What is Slice360<span></span></a>
                                <div class="accordion-inner visible">
                                    <p><b>Slice360</b> provides a social investment platform for vision bearers, also known as pivot investors, to pitch business or investment opportunities to the general public, while vision aspirers, more commonly known as aspiring investors, are allowed to explore and identify investment opportunities that are of interest to them. Together, they can raise capital and realize their shared investment vision.</p>
                                </div>
                                <a class="toggle" href="#">Who is a pivot investor<span></span></a>
                                <div class="accordion-inner">
                                    <p>A <b>pivot investor</b> is also known as the vision bearer. On Slice360, verified pivot investors are permitted to pitch verifiable business or investment opportunities. The pivot investor must also make available a proportion of required capital.</p>
                                </div>
                                <a class="toggle" href="#"> Who is an aspiring investor<span></span></a>
                                <div class="accordion-inner">
                                    <p>An <b>aspiring investor</b> is also known as vision aspirer. Aspiring investors represent the general public that is interested in business or investment opportunities published on Slice360. As soon as an aspiring investor locates a potential investment opportunity, they will <b>opt-in</b> to learn more and then <b>on-board</b> the opportunity in order to invest.</p>
                                </div>
                                <a class="toggle" href="#"> Who is a main investor<span></span></a>
                                <div class="accordion-inner">
                                    <p>On Slice360, a pivot investor or an aspiring investor who contributes the majority of capital into the investment opportunity is referred to as a <b>main investor</b>. Any contributing investor is eligible to be a main investor, and it is not mandatory for the pivot investor to be a main investor.</p>
                                </div>
                                <a class="toggle" href="#"> Who is a lucky investor<span></span></a>
                                <div class="accordion-inner">
                                    <p>A <b>lucky investor</b> is one who makes a capital contribution which is less than the minimum threshold for an investment opportunity that is pitched on Slice360. An investment opportunity must have a minimum threshold on capital contribution before a lucky investor is attracted.</p>
                                    <p>
                                        <b>Example below illustrates a lucky investor:</b>
                                        <blockquote style="border-left: 2px solid #4DB7FE;">
                                            <div style=" margin-left: 3px !important; color:#878c9f !important; font-size:12px !important; ">
                                                <ul type="square">
                                                    <li style="margin-bottom: 5px;">
                                                        Suppose $100 of capital is required with a minimum threshold of $20 per investor, then the investment opportunity requires 5 investors with equal stakes.
                                                    </li>
                                                    <li style="margin-bottom: 5px;">
                                                        In the case where the first three investors each contribute $20 and the fourth investor contributes $30, then the fifth investor must contribute $10 for the investment opportunity to raise $100.
                                                    </li>
                                                    <li>
                                                        The fifth investor will be considered <b>a lucky investor</b> since the amount invested is below the minimum threshold set of the business opportunity.
                                                    </li>
                                                </ul>
                                            </div>
                                        </blockquote>
                                    </p>
                                </div>
                                <a class="toggle" href="#"> What is a pitch<span></span></a>
                                <div class="accordion-inner">
                                    <p>A <b>pitch</b> refers to an opportunity for business or investment, published on Slice360 by a pivot investor. Before any investment pitch is published, it must be verified by Slice360 agents, and the pivot investor must demonstrate that he is able to provide a portion of the required capital.</p>
                                </div>
                            </div>
                            <!-- accordion end -->
                        </div>
                        <!-- faq-section :: getting started end -->


                        <!-- faq-section :: pivot investor -->
                        <div class="faq-title fl-wrap">Pivot Investor</div>
                        <div class="faq-section fl-wrap" id="fq2">
                            <!-- accordion-->
                            <div class="accordion">
                                <a class="toggle" href="#">How to become a pivot investor<span></span></a>
                                <div class="accordion-inner">
                                    <p>To become a pivot investor on Slice360, you simply need to create a user account by filling out an online form, and provide all necessary documentation. Once an account has been successfully created, an activation link will be sent to the associated email account.</p>
                                </div>
                                <a class="toggle" href="#">How to make a pitch <span></span></a>
                                <div class="accordion-inner">
                                    <p>Slice360 allows only registered users to make business or investment pitches. To make a pitch, a pivot investor must log into Slice360 and fill out a pitching form. All pitches must be verified before they can be published. Once the pitch is locked, the pitch maker will not be able to independently modify it.</p>
                                    <p>
                                        <b>Here are some tips for great pitches:</b>
                                        <blockquote style="border-left: 2px solid #4DB7FE;">
                                            <div style=" margin-left: 3px !important; color:#878c9f !important; font-size:12px !important; ">
                                                <ul type="square">
                                                    <li style="margin-bottom: 5px;">
                                                        A great pitch should tell a simple, engaging story about a shared reality.
                                                    </li>
                                                    <li style="margin-bottom: 5px;">
                                                        A great pitch should clearly define the business opportunity.
                                                    </li>
                                                    <li style="margin-bottom: 5px;">
                                                        When you provide supporting documentation, you enable your business opportunity to gain trust.
                                                    </li>
                                                    <li style="margin-bottom: 5px;">
                                                        A beautiful picture can make a businesss pitch more compelling.
                                                    </li>
                                                    <li style="margin-bottom: 5px;">
                                                        Having a long-term vision for the business illustrates your belief in the opportunity.
                                                    </li>
                                                    <li>
                                                        Make sure to clearly state the end goal of the business opportunity.
                                                    </li>
                                                </ul>
                                            </div>
                                        </blockquote>
                                    </p>
                                </div>
                            </div>
                            <!-- accordion end -->
                        </div>
                        <!-- faq-section :: pivot investor end -->

                        <!-- faq-section :: aspiring investor -->
                        <div class="faq-title fl-wrap">Aspiring Investor</div>
                        <div class="faq-section fl-wrap" id="fq3">
                            <!-- accordion-->
                            <div class="accordion">
                                <a class="toggle" href="#">How to become an aspiring investor<span></span></a>
                                <div class="accordion-inner">
                                    <p>To become an aspiring investor on Slice360, you simply need to create a user account by filling out an online form, and provide all necessary information. Once an account has been successfully created, an activation link will be sent to the associated email account. In addition to exploring business opportunities, aspiring investors can also opt into business opportunities, then later on-board them.</p>
                                </div>
                                <a class="toggle" href="#">How to opt into an opportunity<span></span></a>
                                <div class="accordion-inner">
                                    <p>Slice360 users must first register as aspiring investors in order to participate in any business or investment opportunity. Pivot investors are eligible to opt into and participate in any other investment opportunities by default. By opting into a given business opportunity, Slice360 users can closely connect and interact with pivot investors and other aspiring investors.</p>
                                </div>
                                <a class="toggle" href="#"> How to on-board an opportunity<span></span></a>
                                <div class="accordion-inner">
                                    <p>Slice360 users are required to opt into business or investment opportunities before they can onboard them. When an aspiring investor opts into an opportunity, they learn more about it, while when they on-board, they commit financial resources to the opportunity. Making a financial commitment to a business opportunity is similar to slicing a portion of the opportunity presented. Slice360 secures all financial commitments.</p>
                                </div>
                            </div>
                            <!-- accordion end -->
                        </div>
                        <!-- faq-section :: aspiring investor end -->

                        <!-- faq-section :: other questions -->
                        <div class="faq-title fl-wrap">Other Questions</div>
                        <div class="faq-section fl-wrap" id="fq4">
                            <!-- accordion-->
                            <div class="accordion">
                                <a class="toggle" href="#">How to form a smart company<span></span></a>
                                <div class="accordion-inner">
                                    <p>Slice360 classifies each business or investment opportunity as a smart company. Smart companies can only be formed once the capital required has been raised in full. Smart contracts are issued to all investors participating in a business opportunity reflecting their percentage investment or contribution. Smart contracts are legally binding agreements between investors and the smart companies.</p>
                                </div>
                                <a class="toggle" href="#">How to slice a business opportunity<span></span></a>
                                <div class="accordion-inner">
                                    <p>The first step to slicing a business or investment opportunity on Slice360 is to register either as a pivot investor or as an aspiring investor. Following that, you will have to explore all the available investment opportunities and choose those that interest you. It will be necessary for you to make financial commitments to one or more business opportunities in order to slice their portions.</p>
                                </div>
                                <a class="toggle" href="#">How 100% money back policy works<span></span></a>
                                <div class="accordion-inner">
                                    <p>In Slice360, investors are protected with a 100% money-back policy guarantee should a business or investment opportunity fail to raise 100% of the required capital, after the fund-raising window has closed. If the fund-raising is 100% successful, the money-back guarantee becomes void.</p>
                                </div>
                                <a class="toggle" href="#">Who are Slice360 experts/partners?<span></span></a>
                                <div class="accordion-inner">
                                    <p>Slice360 works with experts, also known as partners, in each category of published businesses or investment opportunities. They ensure that pivot investors are moderated in their pitches, and that aspiring investors are properly guided into each business opportunity they are presented with. Each Slice360 expert doubles as an agent who helps in the verification of each and every opportunity presented.</p>
                                </div>
                                <a class="toggle" href="#">What are expert notes in Slice360?<span></span></a>
                                <div class="accordion-inner">
                                    <p>Slice360 expert notes are documents that are made on every business or investment opportunity after a verification process has taken place by a Slice360 expert or partner. Aspiring investors can view the investment opportunity or business from an expert's perspective through expert notes, which often includes a SWOT analysis. SWOT analysis is a strategic planning and strategic management technique used to identify strengths, weaknesses, opportunities, and threats of a business or investment opportunity.</p>
                                </div>
                                <a class="toggle" href="#">On Slice360, is it possible to donate?<span></span></a>
                                <div class="accordion-inner">
                                    <p>Slice360 allows donors to make donations to a business or investment opportunity even if they do not wish to be directly involved. The pivot investor will receive half of your donation, while the remainder will be distributed equally among other aspiring investors. Whenever only a pivot investor exists, then your donation will be channeled entirely to the pivot investor. To donate to a business opportunity, you simply need to explore opportunities that interest you and donate to them. There is no registration required to be a donor.</p>
                                </div>
                                <a class="toggle" href="#">Does Slice360 charge fundraisers?<span></span></a>
                                <div class="accordion-inner">
                                    <p>Slice360 charges a transaction fee, which is a percentage of total funds raised, only if a fundraiser is 100% successful. In the unlikely event that the fundraiser does not succeed, Slice360 won't charge you anything.</p>
                                </div>
                            </div>
                            <!-- accordion end -->
                        </div>
                        <!-- faq-section :: other questions end -->

                        <div class="faq-links fl-wrap">
                            <h3 class="faq-links-title">Still Need Help?</h3>
                            <span class="section-separator"></span>
                            <!-- post nav -->
                            <div class="post-nav-wrap fl-wrap">
                                <a class="post-nav post-nav-prev" href="#"><span class="post-nav-img"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></span><span class="post-nav-text"><strong>Call us</strong> <br>(+254) 0100 90 99 59</span></a>
                                <a class="post-nav post-nav-next" href="#"><span class="post-nav-img"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></span><span class="post-nav-text"><strong>Write to us</strong><br>help@slice360.io</span></a>
                            </div>
                            <!-- post nav end -->
                        </div>
                    </div>
                    <!-- blog sidebar end -->
                </div>
            </div>
        </div>
    </section>
    <!--section :: FAQs end -->

    <div class="limit-box fl-wrap"></div>

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
