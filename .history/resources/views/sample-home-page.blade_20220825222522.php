<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Slice360 - Our goal is to make everyone own some wealth</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>

        <!--=============== include bootstrap css ===============-->
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/bootstrap.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/bootstrap-grid.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/bootstrap-utilities.css') }}">

        <!--=============== include css ===============-->
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/reset.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/plugins.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/dashboard-style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/color.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/timeline.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/custom.css') }}">

        <!--=============== include fonts ===============-->
        {{-- <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/all.css') }}"> --}}
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/brands.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/font_awesome.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/regular.css') }}">
        {{-- <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/solid.css') }}"> --}}
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/svg-with-js.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/v4-shims.css') }}">

        <!--=============== include favicons ===============-->
        <link rel="shortcut icon" href="{{ asset('web_app/images/favicon.ico') }} )" >

    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <div class="loader-inner-cirle"></div>
            </div>
        </div>
        <!--loader end-->

        <!-- main start  -->
        <div id="main">
            <!-- header -->
            <header class="main-header">
                <!-- logo-->
                <a href="index.html" class="logo-holder">
                    <img src="{{ asset('web_app/images/logo.png') }}" class="logo-image" alt="slice360">
                    <!--<h1 class="logo-text">slice360</h1>-->
                </a>
                <!-- logo end-->
                <!-- header-search_btn-->
                <div class="header-search_btn show-search-button"><i class="fal fa-search"></i><span>Search</span></div>
                <!-- header-search_btn end-->
                <!-- header opt -->
                <a href="dashboard-add-listing.html" class="add-list color-bg">
                    Make a Pitch <span><i class="fal fa-layer-plus"></i></span>
                </a>
                <div class="cart-btn   show-header-modal" data-microtip-position="bottom" role="tooltip" aria-label="Your Wishlist"><i class="fal fa-heart"></i><span class="cart-counter green-bg"></span> </div>
                <div class="show-reg-form modal-open avatar-img" data-srcav="{{ asset('web_app/images/avatar/3.jpg') }}"><i class="fal fa-user"></i>Sign In</div>
                <!-- header opt end-->
                <!-- lang-wrap-->
                <div class="lang-wrap">
                    <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>En</strong></span><i class="fa fa-caret-down arrlan"></i></div>
                    <ul class="lang-tooltip lang-action no-list-style">
                        <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                        <li><a href="#" data-lantext="Fr">Français</a></li>
                        <li><a href="#" data-lantext="Es">Español</a></li>
                        <li><a href="#" data-lantext="De">Deutsch</a></li>
                    </ul>
                </div>
                <!-- lang-wrap end-->
                <!-- nav-button-wrap-->
                <div class="nav-button-wrap color-bg">
                    <div class="nav-button">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <!-- nav-button-wrap end-->
                <!--  navigation -->
                <div class="nav-holder main-menu">
                    <nav>
                        <ul class="no-list-style">
                            <li>
                                <a href="index.html" class="act-link">Home</a>
                            </li>
                            <li>
                                <a href="opportunities.html">Opportunities</a>
                            </li>
                            <li>
                                <a href="how-it-works.html">How it Works</a>
                            </li>
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- navigation  end -->
                <!-- header-search_container -->
                <div class="header-search_container header-search vis-search">
                    <div class="container small-container">
                        <div class="header-search-input-wrap fl-wrap">
                            <!-- header-search-input -->
                            <div class="header-search-input">
                                <label><i class="fal fa-keyboard"></i></label>
                                <input type="text" placeholder="What is your interest?"   value=""/>
                            </div>
                            <!-- header-search-input end -->
                            <!-- header-search-input -->
                            <div class="header-search-input location autocomplete-container">
                                <select data-placeholder="Category" class="chosen-select no-radius" >
                                    <option>All Locations</option>
                                    <option>Kenya</option>
                                    <option>Uganda</option>
                                    <option>Tanzania</option>
                                    <option>Rwanda</option>
                                    <option>Burundi</option>
                                    <option>Ethiopia</option>
                                    <option>South Sudan</option>
                                    <option>Democratic Republic of Congo</option>
                                </select>
                            </div>
                            <!-- header-search-input end -->
                            <!-- header-search-input -->
                            <div class="header-search-input header-search_selectinpt ">
                                <select data-placeholder="Category" class="chosen-select no-radius" >
                                    <option>All Categories</option>
                                    <option>Agriculture</option>
                                    <option>Real Estate</option>
                                    <option>Energy</option>
                                    <option>Transport</option>
                                    <option>Events</option>
                                    <option>Entertainment</option>
                                    <option>Education</option>
                                    <option>Sports</option>
                                </select>
                            </div>
                            <!-- header-search-input end -->
                            <button class="header-search-button green-bg" onclick="window.location.href='opportunities.html'"><i class="far fa-search"></i> Search </button>
                        </div>
                        <div class="header-search_close color-bg"><i class="fal fa-long-arrow-up"></i></div>
                    </div>
                </div>
                <!-- header-search_container  end -->
                <!-- wishlist-wrap-->
                <div class="header-modal novis_wishlist">
                    <!-- header-modal-container-->
                    <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                        <!--widget-posts-->
                        <div class="widget-posts  fl-wrap">
                            <ul class="no-list-style">
                                <li>
                                    <div class="widget-posts-img"><a href="listing-single.html"><img src="{{ asset('web_app/images/gallery/thumbnail/1.png') }}" alt=""></a>
                                    </div>
                                    <div class="widget-posts-descr">
                                        <h4><a href="listing-single.html">Iconic Cafe</a></h4>
                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 Journal Square Plaza, NJ, USA</a></div>
                                        <div class="widget-posts-descr-link"><a href="opportunities.html" >Restaurants </a>   <a href="opportunities.html">Cafe</a></div>
                                        <div class="widget-posts-descr-score">4.1</div>
                                        <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="widget-posts-img"><a href="listing-single.html"><img src="{{ asset('web_app/images/gallery/thumbnail/1.png') }}" alt=""></a>
                                    </div>
                                    <div class="widget-posts-descr">
                                        <h4><a href="listing-single.html">MontePlaza Hotel</a></h4>
                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA </a></div>
                                        <div class="widget-posts-descr-link"><a href="opportunities.html" >Hotels </a>  </div>
                                        <div class="widget-posts-descr-score">5.0</div>
                                        <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="widget-posts-img"><a href="listing-single.html"><img src="{{ asset('web_app/images/gallery/thumbnail/1.png') }}" alt=""></a>
                                    </div>
                                    <div class="widget-posts-descr">
                                        <h4><a href="listing-single.html">Rocko Band in Marquee Club</a></h4>
                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                        <div class="widget-posts-descr-link"><a href="opportunities.html" >Events</a> </div>
                                        <div class="widget-posts-descr-score">4.2</div>
                                        <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="widget-posts-img"><a href="listing-single.html"><img src="{{ asset('web_app/images/gallery/thumbnail/1.png') }}" alt=""></a>
                                    </div>
                                    <div class="widget-posts-descr">
                                        <h4><a href="listing-single.html">Premium Fitness Gym</a></h4>
                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> W 85th St, New York, USA</a></div>
                                        <div class="widget-posts-descr-link"><a href="opportunities.html" >Fitness</a> <a href="opportunities.html" >Gym</a> </div>
                                        <div class="widget-posts-descr-score">5.0</div>
                                        <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- widget-posts end-->
                    </div>
                    <!-- header-modal-container end-->
                    <div class="header-modal-top fl-wrap">
                        <h4>Your Wishlist : <span><strong></strong> Locations</span></h4>
                        <div class="close-header-modal"><i class="far fa-times"></i></div>
                    </div>
                </div>
                <!--wishlist-wrap end -->
            </header>
            <!-- header end-->
            <!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">

                    <!--section :: grow your wealth  -->
                    <section class="hero-section" data-scrollax-parent="true">
                        <div class="bg-tabs-wrap">
                            <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
                                <!--ms-container-->
                                <div class="slideshow-container" data-scrollax="properties: { translateY: '300px' }" >
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!--ms_item-->
                                            <div class="swiper-slide">
                                                <div class="ms-item_fs fl-wrap full-height">
                                                    <div class="bg" data-bg="{{ asset('web_app/images/bg/agriculture.jpg') }}"></div>
                                                    <div class="overlay op7"></div>
                                                </div>
                                            </div>
                                            <!--ms_item end-->
                                            <!--ms_item-->
                                            <div class="swiper-slide ">
                                                <div class="ms-item_fs fl-wrap full-height">
                                                    <div class="bg" data-bg="{{ asset('web_app/images/bg/real_estate.jpg') }}"></div>
                                                    <div class="overlay op7"></div>
                                                </div>
                                            </div>
                                            <!--ms_item end-->
                                            <!--ms_item-->
                                            <div class="swiper-slide">
                                                <div class="ms-item_fs fl-wrap full-height">
                                                    <div class="bg" data-bg="{{ asset('web_app/images/bg/energy.jpg') }}"></div>
                                                    <div class="overlay op7"></div>
                                                </div>
                                            </div>
                                            <!--ms_item end-->
                                        </div>
                                    </div>
                                </div>
                                <!--ms-container end-->
                            </div>
                        </div>
                        <div class="container small-container">
                            <div class="intro-item fl-wrap">
                                <span class="section-separator"></span>
                                <div class="bubbles">
                                    <h1>Grow your wealth</h1>
                                </div>
                                <h3>Discover investment opportunities across the globe that align with your vision</h3>
                            </div>
                            <!-- main-search-input-tabs-->
                            <div class="main-search-input-tabs  tabs-act fl-wrap">
                                <ul class="tabs-menu  no-list-style" style="margin-bottom: 75px !important;"></ul>
                                <!--tabs -->
                                <div class="tabs-container fl-wrap ">
                                    <!--tab -->
                                    <div class="tab">
                                        <div id="tab-inpt1" class="tab-content first-tab">
                                            <div class="main-search-input-wrap fl-wrap">
                                                <div class="main-search-input fl-wrap">
                                                    <div class="main-search-input-item">
                                                        <label><i class="fal fa-keyboard"></i></label>
                                                        <input type="text" placeholder="What is your interest?" value=""/>
                                                    </div>
                                                    <div class="main-search-input-item location autocomplete-container">
                                                        <select data-placeholder="Which Location?" class="chosen-select on-radius fal fa-map-marker-check" >
                                                            <option>All Locations</option>
                                                            <option>Kenya</option>
                                                            <option>Uganda</option>
                                                            <option>Tanzania</option>
                                                            <option>Rwanda</option>
                                                            <option>Burundi</option>
                                                            <option>Ethiopia</option>
                                                            <option>South Sudan</option>
                                                            <option>Democratic Republic of Congo</option>
                                                        </select>
                                                    </div>
                                                    <div class="main-search-input-item">
                                                        <select data-placeholder="Which Categories?"  class="chosen-select" >
                                                            <option>All Categories</option>
                                                            <option>Agriculture</option>
                                                            <option>Real Estate</option>
                                                            <option>Energy</option>
                                                            <option>Transport</option>
                                                            <option>Events</option>
                                                            <option>Entertainment</option>
                                                            <option>Education</option>
                                                            <option>Sports</option>
                                                        </select>
                                                    </div>
                                                    <button class="main-search-button color2-bg" onclick="window.location.href='opportunities.html'">Search <i class="fal fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--tab end-->
                                </div>
                                <!--tabs end-->
                            </div>
                            <!-- main-search-input-tabs end-->
                            <div class="hero-categories fl-wrap" style="min-height: 75px !important;"></div>
                        </div>
                        <div class="header-sec-link">
                            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
                        </div>
                    </section>
                    <!--section end :: grow your wealth-->

                    <!--section :: latest opportunities -->
                    <section class="slw-sec" id="sec1">
                        <div class="section-title">
                            <h2>The Latest Opportunities</h2>
                            <div class="section-subtitle">Newest Opportunities</div>
                            <span class="section-separator"></span>
                            <p>Explore lastest opportunities. Find your dream investment opportunity, and slice a portion of it.</p>
                        </div>
                        <div class="listing-slider-wrap fl-wrap">
                            <div class="listing-slider fl-wrap">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <!--  swiper-slide  -->
                                        <div class="swiper-slide">
                                            <div class="listing-slider-item fl-wrap">
                                                <!-- listing-item  -->
                                                <div class="listing-item listing_carditem">
                                                    <article class="geodir-category-listing fl-wrap">
                                                        <div class="geodir-category-img">
                                                            <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                            <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                            <img src="{{ asset('web_app/images/all/land_for_sale.jpg') }}" alt="">
                                                            </a>
                                                            <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                                            <div class="geodir-category-opt">
                                                                <div class="geodir-category-opt_title">
                                                                    <h4>
                                                                        <a href="listing-luxury-restaurant.html">Land for Purchase</a>
                                                                        <span class="verified-badge"><i class="fal fa-check"></i></span>
                                                                    </h4>
                                                                    <div class="geodir-category-location"><a href="#"><i class="fas fa-map-marker-alt"></i>Nairobi, Kenya</a></div>
                                                                </div>
                                                                <div class="listing-rating-count-wrap">
                                                                    <div class="review-score">4.1</div>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                                    <br>
                                                                    <div class="reviews-count">26 reviews</div>
                                                                </div>
                                                                <div class="listing_carditem_footer fl-wrap">
                                                                    <a class="listing-item-category-wrap" href="#">
                                                                        <div class="listing-item-category red-bg"><i class="fal fa-university"></i></div>
                                                                        <span>Real Estate</span>
                                                                    </a>
                                                                    <div class="price-level geodir-category_price">
                                                                        <span class="price-level-item" data-pricerating="2"></span>
                                                                        <span class="price-name-tooltip">Expensive</span>
                                                                    </div>
                                                                    <div class="post-author"><a href="#"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""><span>By , Mathew Juma</span></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <!-- listing-item end -->
                                            </div>
                                        </div>
                                        <!--  swiper-slide end  -->
                                        <!--  swiper-slide  -->
                                        <div class="swiper-slide">
                                            <div class="listing-slider-item fl-wrap">
                                                <!-- listing-item  -->
                                                <div class="listing-item listing_carditem">
                                                    <article class="geodir-category-listing fl-wrap">
                                                        <div class="geodir-category-img">
                                                            <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                            <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                            <img src="{{ asset('web_app/images/all/gym_fitness.jpg') }}" alt="">
                                                            </a>
                                                            <div class="geodir_status_date gsd_close"><i class="fal fa-lock"></i>Opening Soon</div>
                                                            <div class="geodir-category-opt">
                                                                <div class="geodir-category-opt_title">
                                                                    <h4>
                                                                        <a href="listing-luxury-restaurant.html">Public Gym</a>
                                                                    </h4>
                                                                    <div class="geodir-category-location"><a href="#"><i class="fas fa-map-marker-alt"></i>  Kampala, Uganda</a></div>
                                                                </div>
                                                                <div class="listing-rating-count-wrap">
                                                                    <div class="review-score">5.0</div>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                                    <br>
                                                                    <div class="reviews-count">7 reviews</div>
                                                                </div>
                                                                <div class="listing_carditem_footer fl-wrap">
                                                                    <a class="listing-item-category-wrap" href="#">
                                                                        <div class="listing-item-category blue-bg"><i class="fal fa-cog"></i></div>
                                                                        <span>Fitness / Gym</span>
                                                                    </a>
                                                                    <div class="price-level geodir-category_price">
                                                                        <span class="price-level-item" data-pricerating="3"></span>
                                                                        <span class="price-name-tooltip">Moderate</span>
                                                                    </div>
                                                                    <div class="post-author"><a href="#"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""><span>By , Mark Rose</span></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <!-- listing-item end -->
                                            </div>
                                        </div>
                                        <!--  swiper-slide end  -->
                                        <!--  swiper-slide  -->
                                        <div class="swiper-slide">
                                            <div class="listing-slider-item fl-wrap">
                                                <!-- listing-item  -->
                                                <div class="listing-item listing_carditem">
                                                    <article class="geodir-category-listing fl-wrap">
                                                        <div class="geodir-category-img">
                                                            <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                            <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                            <img src="{{ asset('web_app/images/all/hotel.jpg') }}" alt="">
                                                            </a>
                                                            <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                                            <div class="geodir-category-opt">
                                                                <div class="geodir-category-opt_title">
                                                                    <h4>
                                                                        <a href="listing-luxury-restaurant.html">Hotel Setup</a>
                                                                        <span class="verified-badge"><i class="fal fa-check"></i></span>
                                                                    </h4>
                                                                    <div class="geodir-category-location"><a href="#"><i class="fas fa-map-marker-alt"></i> Kigali, Rwanda</a></div>
                                                                </div>
                                                                <div class="listing-rating-count-wrap">
                                                                    <div class="review-score">4.2</div>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                                    <br>
                                                                    <div class="reviews-count">3 reviews</div>
                                                                </div>
                                                                <div class="listing_carditem_footer fl-wrap">
                                                                    <a class="listing-item-category-wrap" href="#">
                                                                        <div class="listing-item-category yellow-bg"><i class="fal fa-bed"></i></div>
                                                                        <span>Hospitality</span>
                                                                    </a>
                                                                    <div class="price-level geodir-category_price">
                                                                        <span class="price-level-item" data-pricerating="4"></span>
                                                                        <span class="price-name-tooltip">Capital Intensive</span>
                                                                    </div>
                                                                    <div class="post-author"><a href="#"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""><span>By , Nasty Wood</span></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <!-- listing-item end -->
                                            </div>
                                        </div>
                                        <!--  swiper-slide end  -->
                                        <!--  swiper-slide  -->
                                        <div class="swiper-slide">
                                            <div class="listing-slider-item fl-wrap">
                                                <!-- listing-item  -->
                                                <div class="listing-item listing_carditem">
                                                    <article class="geodir-category-listing fl-wrap">
                                                        <div class="geodir-category-img">
                                                            <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                            <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                            <img src="{{ asset('web_app/images/all/shell_petrol.jpg') }}" alt="">
                                                            </a>
                                                            <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Closing Soon</div>
                                                            <div class="geodir-category-opt">
                                                                <div class="geodir-category-opt_title">
                                                                    <h4>
                                                                        <a href="listing-luxury-restaurant.html">Petrol Station</a>
                                                                        <span class="verified-badge"><i class="fal fa-check"></i></span>
                                                                    </h4>
                                                                    <div class="geodir-category-location"><a href="#"><i class="fas fa-map-marker-alt"></i> Arusha, Tanzania</a></div>
                                                                </div>
                                                                <div class="listing-rating-count-wrap">
                                                                    <div class="review-score">5.0</div>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                                    <br>
                                                                    <div class="reviews-count">2 reviews</div>
                                                                </div>
                                                                <div class="listing_carditem_footer fl-wrap">
                                                                    <a class="listing-item-category-wrap" href="#">
                                                                        <div class="listing-item-category green-bg"><i class="fal fa-fire"></i></div>
                                                                        <span>Energy</span>
                                                                    </a>
                                                                    <div class="price-level geodir-category_price">
                                                                        <span class="price-level-item" data-pricerating="4"></span>
                                                                        <span class="price-name-tooltip">Ultra Expensive</span>
                                                                    </div>
                                                                    <div class="post-author"><a href="#"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""><span>By , Kliff Antony</span></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <!-- listing-item end -->
                                            </div>
                                        </div>
                                        <!--  swiper-slide end  -->
                                    </div>
                                </div>
                                <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
                                <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
                            </div>
                            <div class="tc-pagination_wrap">
                                <div class="tc-pagination2"></div>
                            </div>
                        </div>
                    </section>
                    <!--section end :: latest opportunities -->

                    <div class="sec-circle fl-wrap"></div>

                    <!--section :: popular opportunities -->
                    <section  class="gray-bg hidden-section particles-wrapper">
                        <div class="container">
                            <div class="section-title">
                                <h2>Explore Popular Opportunities</h2>
                                <div class="section-subtitle">Catalog of Opportunities</div>
                                <span class="section-separator"></span>
                                <p>Explore categories of popular investment opportunities from around the world</p>
                            </div>
                            <div class="listing-item-grid_container fl-wrap">
                                <div class="row">
                                    <!--  listing-item-grid  -->
                                    <div class="col-sm-4">
                                        <div class="listing-item-grid">
                                            <div class="bg"  data-bg="{{ asset('web_app/images/all/agriculture.jpg') }}"></div>
                                            <div class="d-gr-sec"></div>
                                            <div class="listing-counter color2-bg"><span>16 </span> Agriculture</div>
                                            <div class="listing-item-grid_title">
                                                <h3><a href="opportunities.html">Agriculture</a></h3>
                                                <p>Do you want to become a farmer? Find great investment opportunities in agriculture from around the globe.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  listing-item-grid end  -->
                                    <!--  listing-item-grid  -->
                                    <div class="col-sm-4">
                                        <div class="listing-item-grid">
                                            <div class="bg"  data-bg="{{ asset('web_app/images/all/real_estate.jpg') }}"></div>
                                            <div class="d-gr-sec"></div>
                                            <div class="listing-counter color2-bg"><span>22 </span> Real Estate</div>
                                            <div class="listing-item-grid_title">
                                                <h3><a href="opportunities.html">Real Estate</a></h3>
                                                <p>Is your investment vision in real estate? Find other like minded investors and slice your portion.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  listing-item-grid end  -->
                                    <!--  listing-item-grid  -->
                                    <div class="col-sm-4">
                                        <div class="listing-item-grid">
                                            <div class="bg"  data-bg="{{ asset('web_app/images/all/energy.jpg') }}"></div>
                                            <div class="d-gr-sec"></div>
                                            <div class="listing-counter color2-bg"><span>9 </span> Energy</div>
                                            <div class="listing-item-grid_title">
                                                <h3><a href="opportunities.html">Energy</a></h3>
                                                <p>Do you have interest in energy? You are not alone! Explore and invest in your dream.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  listing-item-grid end  -->
                                    <!--  listing-item-grid  -->
                                    <div class="col-sm-4">
                                        <div class="listing-item-grid">
                                            <div class="bg"  data-bg="{{ asset('web_app/images/all/education.jpg') }}"></div>
                                            <div class="d-gr-sec"></div>
                                            <div class="listing-counter color2-bg"><span>12 </span> Education</div>
                                            <div class="listing-item-grid_title">
                                                <h3><a href="opportunities.html">Education</a></h3>
                                                <p>Everyone needs quality education in today's world. Explore opportunities for investment in education sector</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  listing-item-grid end  -->
                                    <!--  listing-item-grid  -->
                                    <div class="col-sm-8">
                                        <div class="listing-item-grid">
                                            <div class="bg"  data-bg="{{ asset('web_app/images/all/transport.jpg') }}"></div>
                                            <div class="d-gr-sec"></div>
                                            <div class="listing-counter color2-bg"><span>33 </span> Transport</div>
                                            <div class="listing-item-grid_title">
                                                <h3><a href="opportunities.html">Transport</a></h3>
                                                <p>Transport and logistics is a huge business world over. People and goods are constantly moving, whether by land, air or water. Find your peers and make your dream investment become a reality.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  listing-item-grid end  -->
                                </div>
                            </div>
                            <a href="opportunities.html" class="btn dec_btn   color2-bg">View All Categories<i class="fal fa-arrow-alt-right"></i></a>
                        </div>
                    </section>
                    <!-- section end :: popular opportunities -->

                    <!--section :: sites statistics -->
                    <section class="parallax-section small-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="{{ asset('web_app/images/bg/statistics.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay  op7"></div>
                        <div class="container">
                            <div class=" single-facts single-facts_2 fl-wrap">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="1347">1347</div>
                                            </div>
                                        </div>
                                        <h6>New Opportunities This Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="121687">121687</div>
                                            </div>
                                        </div>
                                        <h6>Visitors This Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="765">765</div>
                                            </div>
                                        </div>
                                        <h6>Funded Investments Opportunities</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="732">732</div>
                                            </div>
                                        </div>
                                        <h6>Investments Opportunities in $ ,000M</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>
                        </div>
                    </section>
                    <!--section end :: sites statistics -->

                    <!--section :: visitors favourites  -->
                    <section>
                        <div class="container big-container">
                            <div class="section-title">
                                <h2><span>Visitors Favourite Opportunities</span></h2>
                                <div class="section-subtitle">Favourite Investment Opportunities</div>
                                <span class="section-separator"></span>
                                <p>Most people are interested in these investment opportunites. Don't be left behind.</p>
                            </div>
                            <div class="grid-item-holder gallery-items fl-wrap">
                                <!--  gallery-item-->
                                <div class="gallery-item ">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset('web_app/images/all/item-restaurant.jpg') }}" alt="">
                                                </a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Alisa Noory</strong></span>
                                                </div>
                                                <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating-count-wrap">
                                                        <div class="review-score">4.8</div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <br>
                                                        <div class="reviews-count">12 reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map">
                                                            <a href="listing-luxury-restaurant.html">Luxury Restaurant</a>
                                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                                <i class="fal fa-check"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="geodir-category-location fl-wrap">
                                                            <a href="#" ><i class="fas fa-map-marker-alt"></i> Kigali, Rwanda</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">A highend restaurant setup in Kigali Rwanda, within the CBD.</p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Funding Details: </div>
                                                        <ul class="no-list-style">
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required"> $25,000
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                                46%
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                                6
                                                            </span>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <a class="listing-item-category-wrap">
                                                        <div class="listing-item-category yellow-bg"><i class="fal fa-cocktail"></i></div>
                                                        <span>Hospitality</span>
                                                    </a>
                                                    <div class="geodir-opt-list">
                                                        <ul class="no-list-style">
                                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                            <li><a href="#1" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                                                            <li>
                                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('web_app/images/all/1.jpg') }}'},{'src': '{{ asset('web_app/images/all/1.jpg') }}'}, {'src': '{{ asset('web_app/images/all/1.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-level geodir-category_price">
                                                        <span class="price-level-item" data-pricerating="2"></span>
                                                        <span class="price-name-tooltip">Moderate</span>
                                                    </div>
                                                    <div class="geodir-category_contacts">
                                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                        <ul class="no-list-style">
                                                            <li>
                                                                <span>
                                                                    <i class="fal fa-phone"></i> Call :
                                                                </span>
                                                                <a href="#">+38099231212</a>
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fal fa-envelope"></i> Write :
                                                                </span>
                                                                <a href="#">yourmail@domain.com</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!-- gallery-item  end-->
                                <!--  gallery-item-->
                                <div class="gallery-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset('web_app/images/all/item-wheat.jpg') }}" alt="">
                                                </a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Alvin Makau</strong></span>
                                                </div>
                                                <div class="geodir_status_date color-bg"><i class="fal fa-clock"></i>30 April 2022</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating-count-wrap">
                                                        <div class="review-score">4.2</div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                        <br>
                                                        <div class="reviews-count">6 reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map">
                                                            <a href="listing-luxury-restaurant.html">Wheat Farming</a>
                                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                                    <i class="fal fa-check"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="geodir-category-location fl-wrap">
                                                            <a href="#" ><i class="fas fa-map-marker-alt"></i> Narok, Kenya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">2500ha of land available for wheat farming from May to December 2022.</p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Funding Details: </div>
                                                        <ul class="no-list-style">
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required">    $75,600
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                                57%
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                                11
                                                            </span>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <a class="listing-item-category-wrap">
                                                        <div class="listing-item-category green-bg"><i class="fa fa-pagelines"></i></div>
                                                        <span>Agriculture</span>
                                                    </a>
                                                    <div class="geodir-opt-list">
                                                        <ul class="no-list-style">
                                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                            <li><a href="#1" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                                                            <li>
                                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('web_app/images/all/1.jpg') }}'},{'src': '{{ asset('web_app/images/all/1.jpg') }}'}, {'src': '{{ asset('web_app/images/all/1.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-level geodir-category_price">
                                                        <span class="price-level-item" data-pricerating="2"></span>
                                                        <span class="price-name-tooltip">Pricey</span>
                                                    </div>
                                                    <div class="geodir-category_contacts">
                                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                        <ul class="no-list-style">
                                                            <li>
                                                                <span>
                                                                    <i class="fal fa-phone"></i> Call :
                                                                </span>
                                                                <a href="#">+38099231212</a>
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fal fa-envelope"></i> Write :
                                                                </span>
                                                                <a href="#">yourmail@domain.com</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!-- gallery-item  end-->
                                <!--  gallery-item-->
                                <div class="gallery-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset('web_app/images/all/item-gas-station.jpg') }}" alt="">
                                                </a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Andrew Bimpi</strong></span>
                                                </div>
                                                <div class="geodir_status_date color-bg"><i class="fal fa-clock"></i>31 May 2022</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating-count-wrap">
                                                        <div class="review-score">4.8</div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <br>
                                                        <div class="reviews-count">10 reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map">
                                                            <a href="listing-luxury-restaurant.html">Gas Station</a>
                                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                                    <i class="fal fa-check"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="geodir-category-location fl-wrap">
                                                            <a href="#" ><i class="fas fa-map-marker-alt"></i> Busia, Uganda</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">Setup of Total franchised gas station in Busia town on the Ugandan side of the border.</p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Funding Details: </div>
                                                        <ul class="no-list-style">
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required">    $110,600
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                                65%
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                                9
                                                            </span>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <a class="listing-item-category-wrap">
                                                        <div class="listing-item-category red-bg"><i class="fa fa-gas-pump"></i></div>
                                                        <span>Energy</span>
                                                    </a>
                                                    <div class="geodir-opt-list">
                                                        <ul class="no-list-style">
                                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                            <li><a href="#1" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                                                            <li>
                                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('web_app/images/all/1.jpg') }}'},{'src': '{{ asset('web_app/images/all/1.jpg') }}'}, {'src': '{{ asset('web_app/images/all/1.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-level geodir-category_price">
                                                        <span class="price-level-item" data-pricerating="2"></span>
                                                        <span class="price-name-tooltip">Pricey</span>
                                                    </div>
                                                    <div class="geodir-category_contacts">
                                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                        <ul class="no-list-style">
                                                            <li>
                                                                <span>
                                                                    <i class="fal fa-phone"></i> Call :
                                                                </span>
                                                                <a href="#">+38099231212</a>
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fal fa-envelope"></i> Write :
                                                                </span>
                                                                <a href="#">yourmail@domain.com</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!-- gallery-item  end-->
                                <!-- gallery-item  -->
                                <div class="gallery-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset('web_app/images/all/item-bus-transport.jpg') }}" alt="">
                                                </a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Alex Mwangi</strong></span>
                                                </div>
                                                <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating-count-wrap">
                                                        <div class="review-score">3.8</div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                        <br>
                                                        <div class="reviews-count">18 reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map">
                                                            <a href="listing-luxury-restaurant.html">Matatu for Transport</a>
                                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                                <i class="fal fa-check"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> Nairobi, Kenya</a></div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">Purchase of new matatu fleet to operate under a new sacco. Need 15 buses at the minimum</p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Funding Details: </div>
                                                        <ul class="no-list-style">
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required"> $350,500
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                                65%
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                                48
                                                            </span>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <a class="listing-item-category-wrap">
                                                        <div class="listing-item-category blue-bg"><i class="fal fa-bus-alt"></i></div>
                                                        <span>Transport</span>
                                                    </a>
                                                    <div class="geodir-opt-list">
                                                        <ul class="no-list-style">
                                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                            <li><a href="#" class="single-map-item" data-newlatitude="40.94982541" data-newlongitude="-73.84357452"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>3</strong></span> </a></li>
                                                            <li>
                                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('web_app/images/all/1.jpg') }}'},{'src': '{{ asset('web_app/images/all/1.jpg') }}'}, {'src': '{{ asset('web_app/images/all/1.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-level geodir-category_price">
                                                        <span class="price-level-item" data-pricerating="4"></span>
                                                        <span class="price-name-tooltip">Pricey</span>
                                                    </div>
                                                    <div class="geodir-category_contacts">
                                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                        <ul class="no-list-style">
                                                            <li><span><i class="fal fa-phone"></i> Call : </span><a href="#">+38099231212</a></li>
                                                            <li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!-- gallery-item  end-->
                                <!-- gallery-item  -->
                                <div class="gallery-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset('web_app/images/all/item-race-track.jpg') }}" alt="">
                                                </a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Brown Antony</strong></span>
                                                </div>
                                                <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating-count-wrap">
                                                        <div class="review-score">5.0</div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <br>
                                                        <div class="reviews-count">44 reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map">
                                                            <a href="listing-luxury-restaurant.html">Race Track</a>
                                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                                <i class="fal fa-check"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> Dar es Salaam, Tanzania</a></div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">Development of a paid for, race track for budding race drivers and speed enthusiasts.</p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Funding Details: </div>
                                                        <ul class="no-list-style">
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required"> $500,000
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                                85%
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                                77/<b class="finance-details-out-of">100</b>
                                                            </span>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <a class="listing-item-category-wrap">
                                                        <div class="listing-item-category  gradient-dark"><i class="fal fa-road"></i></div>
                                                        <span>Sports</span>
                                                    </a>
                                                    <div class="geodir-opt-list">
                                                        <ul class="no-list-style">
                                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                            <li><a href="#" class="single-map-item" data-newlatitude="40.72228267" data-newlongitude="-73.99246214"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>4</strong></span></a></li>
                                                            <li>
                                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('web_app/images/all/1.jpg') }}'},{'src': '{{ asset('web_app/images/all/1.jpg') }}'}, {'src': '{{ asset('web_app/images/all/1.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-level geodir-category_price">
                                                        <span class="price-level-item" data-pricerating="3"></span>
                                                        <span class="price-name-tooltip">High</span>
                                                    </div>
                                                    <div class="geodir-category_contacts">
                                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                        <ul class="no-list-style">
                                                            <li><span><i class="fal fa-phone"></i> Call : </span><a href="#">+38099231212</a></li>
                                                            <li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!-- gallery-item  end-->
                                <!-- gallery-item  -->
                                <div class="gallery-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset('web_app/images/all/item-gym.jpg') }}" alt="">
                                                </a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                                                </div>
                                                <div class="geodir_status_date gsd_close"><i class="fal fa-lock"></i>Closed Now</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating-count-wrap">
                                                        <div class="review-score">3.8</div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="3"></div>
                                                        <br>
                                                        <div class="reviews-count">4 reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map">
                                                            <a href="listing-luxury-restaurant.html">Premium Fitness Gym</a>
                                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                                <i class="fal fa-check"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> Kampala,  Uganda</a></div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">Premium fitness gym for middle/upper class population in Muyenga District</p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Funding Details: </div>
                                                        <ul class="no-list-style">
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required"> $45,500
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                                100%
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                                7
                                                            </span>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <a class="listing-item-category-wrap">
                                                        <div class="listing-item-category blue-bg"><i class="fal fa-dumbbell"></i></div>
                                                        <span>Fitness / Gym</span>
                                                    </a>
                                                    <div class="geodir-opt-list">
                                                        <ul class="no-list-style">
                                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                            <li><a href="#" class="single-map-item" data-newlatitude="40.94982541" data-newlongitude="-73.84357452"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>3</strong></span> </a></li>
                                                            <li>
                                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('web_app/images/all/1.jpg') }}'},{'src': '{{ asset('web_app/images/all/1.jpg') }}'}, {'src': '{{ asset('web_app/images/all/1.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-level geodir-category_price">
                                                        <span class="price-level-item" data-pricerating="2"></span>
                                                        <span class="price-name-tooltip">Moderate</span>
                                                    </div>
                                                    <div class="geodir-category_contacts">
                                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                        <ul class="no-list-style">
                                                            <li><span><i class="fal fa-phone"></i> Call : </span><a href="#">+38099231212</a></li>
                                                            <li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!-- gallery-item  end-->
                                <!-- gallery-item  -->
                                <div class="gallery-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset('web_app/images/all/item-apartment.jpg') }}" alt="">
                                                </a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Kliff Antony</strong></span>
                                                </div>
                                                <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating-count-wrap">
                                                        <div class="review-score">5.0</div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <br>
                                                        <div class="reviews-count">4 reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map">
                                                            <a href="listing-luxury-restaurant.html">High Rise Apartment</a>
                                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                                <i class="fal fa-check"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> Kilimani, Nairobi</a></div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">Purchase of land and development of highend apartment in middle class Kilimani, Nairobi </p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Funding Details: </div>
                                                        <ul class="no-list-style">
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required"> $40,500,000
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                                65%
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                                165
                                                            </span>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <a class="listing-item-category-wrap">
                                                        <div class="listing-item-category  gradient-dark"><i class="fal fa-university"></i></div>
                                                        <span>Real Estate</span>
                                                    </a>
                                                    <div class="geodir-opt-list">
                                                        <ul class="no-list-style">
                                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                            <li><a href="#" class="single-map-item" data-newlatitude="40.72228267" data-newlongitude="-73.99246214"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>4</strong></span></a></li>
                                                            <li>
                                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('web_app/images/all/1.jpg') }}'},{'src': '{{ asset('web_app/images/all/1.jpg') }}'}, {'src': '{{ asset('web_app/images/all/1.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-level geodir-category_price">
                                                        <span class="price-level-item" data-pricerating="4"></span>
                                                        <span class="price-name-tooltip">Ultra High</span>
                                                    </div>
                                                    <div class="geodir-category_contacts">
                                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                        <ul class="no-list-style">
                                                            <li><span><i class="fal fa-phone"></i> Call : </span><a href="#">+38099231212</a></li>
                                                            <li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!-- gallery-item  end-->
                                <!--  gallery-item-->
                                <div class="gallery-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="listing-luxury-restaurant.html" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset('web_app/images/all/item-layers.jpg') }}" alt="">
                                                </a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Guyo Wako</strong></span>
                                                </div>
                                                <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating-count-wrap">
                                                        <div class="review-score">3</div>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="3"></div>
                                                        <br>
                                                        <div class="reviews-count">16 reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map">
                                                            <a href="listing-luxury-restaurant.html">Poultry Farming</a>
                                                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="verified">
                                                                <i class="fal fa-check"></i>
                                                            </span>
                                                        </h3>
                                                        <div class="geodir-category-location fl-wrap">
                                                            <a href="#" ><i class="fas fa-map-marker-alt"></i> Marsabit, Kenya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">Large scale poultry farming within Marsabit town. Hoping to stock upto 4000 layers per session.</p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Funding Details: </div>
                                                        <ul class="no-list-style">
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Capital Required"> $50,000
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="Percentage Funding">
                                                                20%
                                                            </span>
                                                            <span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                            <span class="tolt finance-details" data-microtip-position="top" data-tooltip="No. of investors">
                                                                3
                                                            </span>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <a class="listing-item-category-wrap">
                                                        <div class="listing-item-category yellow-bg"><i class="fa fa-crow"></i></div>
                                                        <span>Farming</span>
                                                    </a>
                                                    <div class="geodir-opt-list">
                                                        <ul class="no-list-style">
                                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                                            <li><a href="#1" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                                                            <li>
                                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('web_app/images/all/1.jpg') }}'},{'src': '{{ asset('web_app/images/all/1.jpg') }}'}, {'src': '{{ asset('web_app/images/all/1.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-level geodir-category_price">
                                                        <span class="price-level-item" data-pricerating="2"></span>
                                                        <span class="price-name-tooltip">Moderate</span>
                                                    </div>
                                                    <div class="geodir-category_contacts">
                                                        <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                        <ul class="no-list-style">
                                                            <li>
                                                                <span>
                                                                    <i class="fal fa-phone"></i> Call :
                                                                </span>
                                                                <a href="#">+38099231212</a>
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fal fa-envelope"></i> Write :
                                                                </span>
                                                                <a href="#">yourmail@domain.com</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!-- gallery-item  end-->
                            </div>
                            <a href="opportunities.html" class="btn  dec_btn  color2-bg">View All Opportunities<i class="fal fa-arrow-alt-right"></i></a>
                        </div>
                    </section>
                    <!--section end :: visitors favourites -->

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
                    <!--section end  :: slice360 walk-through -->

                    <!--section :: how it works -->
                    <section data-scrollax-parent="true">
                        <div class="container">
                            <div class="section-title">
                                <h2>How Slice360 Works</h2>
                                <div class="section-subtitle">Discover &amp; Connect </div>
                                <span class="section-separator"></span>
                                <p>This investment platform connects pivot investors with aspiring investors based on shared visions, and helps them slice investment opportunities in small proportions</p>
                            </div>
                            <div class="process-wrap fl-wrap">
                                <ul class="no-list-style">
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">01 </span>
                                            <div class="time-line-icon"><i class="fal fa-map-marker-alt"></i></div>
                                            <h4> Pivot Investor</h4>
                                            <p>Pitches an investment opportunity, accompanied by explicit proof and an estimate of capital requirements.</p>
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">02</span>
                                            <div class="time-line-icon"><i class="fal fa-handshake"></i></div>
                                            <h4> Slice360</h4>
                                            <p>Verifies business/investment opportunities, publishes them to the general public, and maintains smart contracts.</p>
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">03</span>
                                            <div class="time-line-icon"><i class="fal fa-layer-plus"></i></div>
                                            <h4> Aspiring Investor</h4>
                                            <p>Identifies investment opportunities, assists with raising required capital, and gains profits from their investments.</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="process-end"><i class="fal fa-check"></i></div>
                            </div>
                        </div>

                        <div style="margin-top: 50px !important; margin-bottom: -50px !important;">
                            <a href="how-it-works.html" class="btn color2-bg">View More Details<i class="fal fa-angle-right"></i></a>
                        </div>
                    </section>
                    <!--section end :: how it works -->

                    <!--section :: mobile app section -->
                    <section class="gradient-bg hidden-section" data-scrollax-parent="true">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="colomn-text  pad-top-column-text fl-wrap">
                                        <div class="colomn-text-title">
                                            <h3>Mobile App Available</h3>
                                            <p>Slice360 is avialable both on Apple Store and Google Playstore. Download into your mobile device and start your visionary investment journey.</p>
                                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-apple"></i>  Apple Store </a>
                                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-android"></i>  Google Play </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="collage-image">
                                        <img src="{{ asset('web_app/images/api.png') }}" class="main-collage-image" alt="">
                                        <div class="images-collage-title color2-bg icdec"> <img src="{{ asset('web_app/images/logo.png') }}"   alt=""></div>
                                        <div class="images-collage_icon green-bg" style="right:-20px; top:120px;"><i class="fal fa-thumbs-up"></i></div>
                                        <div class="collage-image-min cim_1"><img src="{{ asset('web_app/images/api/1.jpg') }}" alt=""></div>
                                        <div class="collage-image-min cim_2"><img src="{{ asset('web_app/images/api/1.jpg') }}" alt=""></div>
                                        <div class="collage-image-btn green-bg">Find Opportunity</div>
                                        <div class="collage-image-input">Search <i class="fa fa-search"></i></div>
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
                    <!--section end :: mobile app section -->

                    <!--section :: testimonials  -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <h2> Testimonials</h2>
                                <div class="section-subtitle">Clients Reviews</div>
                                <span class="section-separator"></span>
                                <p>Feedback from pivot and aspiring investors who have trusted the processes of Slice360</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="testimonilas-carousel-wrap fl-wrap">
                            <div class="listing-carousel-button listing-carousel-button-next"><i class="fas fa-caret-right"></i></div>
                            <div class="listing-carousel-button listing-carousel-button-prev"><i class="fas fa-caret-left"></i></div>
                            <div class="testimonilas-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <!--testi-item-->
                                        <div class="swiper-slide">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <p>"Rasing UGX 30,000,000 in 3 weeks was like magic. I am now a proud owner of a matatu that is helping with travel logistics. Thanks to everyone who belived in my pitch and are co-owners."</p>
                                                    <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                                    <div class="testimonilas-avatar fl-wrap">
                                                        <h3>Ariel Krosti</h3>
                                                        <h4>Matatu Owner</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <p>"I just didn't know how many people shared my vision until I pitched it on Slice360. Today, we are 10 co-owners of a petrol station. My dream is now a reality courtesy of Slice360."</p>
                                                    <a href="#" class="testi-link" target="_blank">Via Twitter</a>
                                                    <div class="testimonilas-avatar fl-wrap">
                                                        <h3>Frank Dellov</h3>
                                                        <h4>Gas Station Owner</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <p>"I am Kenyan. Through Slice360, I was able to buy a portion of land in Rwanda without ever physically visiting. We are holding to re-sell at profits. All I needed was to share in the vision of a Rwandese who wanted to buy prime land. "</p>
                                                    <a href="#" class="testi-link" target="_blank">Via Facebook</a>
                                                    <div class="testimonilas-avatar fl-wrap">
                                                        <h3>Centa Simpson</h3>
                                                        <h4>Land Owner</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('web_app/images/avatar/1.jpg') }}" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <p>"I would have never dreamt of co-owning 1000ha of wheat plantation. Through Slice360, I met like minded investors, spread the risk and we are now smiling to the bank."</p>
                                                    <a href="#" class="testi-link" target="_blank">Via Instagram</a>
                                                    <div class="testimonilas-avatar fl-wrap">
                                                        <h3>Linda Svensky</h3>
                                                        <h4>Wheat Farmer</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                    </div>
                                </div>
                            </div>
                            <div class="tc-pagination"></div>
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
                    <!--section end :: testimonials -->

                    <!--section  -->
                    <section class="gray-bg">
                        <div class="container">
                            <div class="clients-carousel-wrap fl-wrap">
                                <div class="cc-btn   cc-prev"><i class="fal fa-angle-left"></i></div>
                                <div class="cc-btn cc-next"><i class="fal fa-angle-right"></i></div>
                                <div class="clients-carousel">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                            <!--client-item-->
                                            <div class="swiper-slide">
                                                <a href="#" class="client-item"><img src="{{ asset('web_app/images/clients/1.png') }}" alt=""></a>
                                            </div>
                                            <!--client-item end-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--section end-->

                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->
            <!--footer -->
            <footer class="main-footer fl-wrap">
                <!-- footer-header-->
                <div class="footer-header fl-wrap grad ient-dark">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div  class="subscribe-header">
                                    <h3>Subscribe For a <span>Newsletter</span></h3>
                                    <p>Want to be notified about new opportunities?  Just sign up.</p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="subscribe-widget">
                                    <div class="subcribe-form">
                                        <form id="subscribe">
                                            <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="Enter Your Email" spellcheck="false" type="text">
                                            <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fal fa-envelope"></i></button>
                                            <label for="subscribe-email" class="subscribe-message"></label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer-header end-->
                <!--footer-inner-->
                <div class="footer-inner   fl-wrap">
                    <div class="container">
                        <div class="row">
                            <!-- footer-widget-->
                            <div class="col-md-4">
                                <div class="footer-widget fl-wrap">
                                    <div class="footer-logo"><a href="index.html">
                                        <img src="{{ asset('web_app/images/logo.png') }}" alt=""></a>
                                        <!--<h1 class="logo-text-2">slice360</h1>-->
                                    </div>
                                    <div class="footer-contacts-widget fl-wrap">
                                        <p>Our goal is to make everyone own some wealth. Slice360 makes it simple for anyone to find investment opportunities based on vision. Explore your investment options, help raise capital and gain some wealth.</p>
                                        <ul  class="footer-contacts fl-wrap no-list-style">
                                            <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#" target="_blank">investment@slice360.io</a></li>
                                            <li> <span><i class="fal fa-map-marker"></i> Adress :</span><a href="#" target="_blank">73619-00200, Nairobi</a></li>
                                            <li><span><i class="fal fa-phone"></i> Phone :</span><a href="#">+254(0)100 90 99 59</a></li>
                                        </ul>
                                        <div class="footer-social">
                                            <span>Find  us on: </span>
                                            <ul class="no-list-style">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- footer-widget end-->
                            <!-- footer-widget-->
                            <div class="col-md-4">
                                <div class="footer-widget fl-wrap">
                                    <h3>Our Last News</h3>
                                    <div class="footer-widget-posts fl-wrap">
                                        <ul class="no-list-style">
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="{{ asset('web_app/images/all/1.jpg') }}" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Vivamus dapibus rutrum</a>
                                                    <span class="widget-posts-date"><i class="fal fa-calendar"></i> 21 Mar 09.05 </span>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="{{ asset('web_app/images/all/1.jpg') }}" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title=""> In hac habitasse platea</a>
                                                    <span class="widget-posts-date"><i class="fal fa-calendar"></i> 7 Mar 18.21 </span>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#"  class="widget-posts-img"><img src="{{ asset('web_app/images/all/1.jpg') }}" class="respimg" alt=""></a>
                                                <div class="widget-posts-descr">
                                                    <a href="#" title="">Tortor tempor in porta</a>
                                                    <span class="widget-posts-date"><i class="fal fa-calendar"></i> 7 Mar 16.42 </span>
                                                </div>
                                            </li>
                                        </ul>
                                        <a href="blog.html" class="footer-link">Read all <i class="fal fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- footer-widget end-->
                            <!-- footer-widget  -->
                            <div class="col-md-4">
                                <div class="footer-widget fl-wrap ">
                                    <h3>Our  Twitter</h3>
                                    <div class="twitter-holder fl-wrap scrollbar-inner2" data-simplebar data-simplebar-auto-hide="false">
                                        <div id="footer-twiit"></div>
                                    </div>
                                    <a href="#" class="footer-link twitter-link" target="_blank">Follow us <i class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <!-- footer-widget end-->
                        </div>
                    </div>
                    <!-- footer bg-->
                    <div class="footer-bg" data-ran="4"></div>
                    <div class="footer-wave">
                        <svg viewbox="0 0 100 25">
                            <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
                        </svg>
                    </div>
                    <!-- footer bg  end-->
                </div>
                <!--footer-inner end -->
                <!--sub-footer-->
                <div class="sub-footer  fl-wrap">
                    <div class="container">
                        <div class="copyright"> 2022 &#169;Slice360 .  All rights reserved.</div>
                        <div class="lang-wrap">
                            <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>En</strong></span><i class="fa fa-caret-down arrlan"></i></div>
                            <ul class="lang-tooltip lang-action no-list-style">
                                <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                                <li><a href="#" data-lantext="Fr">Français</a></li>
                                <li><a href="#" data-lantext="Es">Español</a></li>
                                <li><a href="#" data-lantext="De">Deutsch</a></li>
                            </ul>
                        </div>
                        <div class="subfooter-nav">
                            <ul class="no-list-style">
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--sub-footer end -->
            </footer>
            <!--footer end -->
            <!--map-modal -->
            <div class="map-modal-wrap">
                <div class="map-modal-wrap-overlay"></div>
                <div class="map-modal-item">
                    <div class="map-modal-container fl-wrap">
                        <div class="map-modal fl-wrap">
                            <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                        </div>
                        <h3><span>Location for : </span><a href="#">Listing Title</a></h3>
                        <div class="map-modal-close"><i class="fal fa-times"></i></div>
                    </div>
                </div>
            </div>
            <!--map-modal end -->
            <!--register form -->
            <div class="main-register-wrap modal">
                <div class="reg-overlay"></div>
                <div class="main-register-holder tabs-act">
                    <div class="main-register fl-wrap  modal_main">
                        <div class="main-register_title">Welcome to <span><strong>Slice</strong>360<strong>.</strong></span></div>
                        <div class="close-reg"><i class="fal fa-times"></i></div>
                        <ul class="tabs-menu fl-wrap no-list-style">
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
                                        <div class="custom-form">
                                            <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                                <label >Full Name <span>*</span> </label>
                                                <input name="name" type="text"   onClick="this.select()" value="">
                                                <label>Email Address <span>*</span></label>
                                                <input name="email" type="text"  onClick="this.select()" value="">
                                                <label >Password <span>*</span></label>
                                                <input name="password" type="password"   onClick="this.select()" value="" >
                                                <div class="filter-tags ft-list">
                                                    <input id="check-a2" type="checkbox" name="check">
                                                    <label for="check-a2">I agree to the <a href="#">Privacy Policy</a></label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="filter-tags ft-list">
                                                    <input id="check-a" type="checkbox" name="check">
                                                    <label for="check-a">I agree to the <a href="#">Terms and Conditions</a></label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <button type="submit"     class="btn float-btn color2-bg"> Register  <i class="fas fa-caret-right"></i></button>
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
            <!--register form end -->
            <a class="to-top"><i class="fas fa-caret-up"></i></a>
        </div>
        <!-- Main end -->

        <!--=============== include scripts ===============-->
        <script src="{{ asset('web_app/js/jquery.min.js') }}"></script>
        <script src="{{ asset('web_app/js/plugins.js') }}"></script>
        <script src="{{ asset('web_app/js/scripts.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&libraries=places&callback=initAutocomplete"></script>
        <script src="{{ asset('web_app/js/map-single.js') }}"></script>
        <script src="{{ asset('web_app/js/timeline.min.js') }}"></script>
        <script src="{{ asset('web_app/js/tinymce.js') }}"></script>
        <script src="{{ asset('web_app/js/alpine.js') }}"></script>
        <script src="https://cdn.tiny.cloud/1/2erokf2sc29d23ul3dgeeprg7ik77jxo8n8jybqp4qkmfxmy/tinymce/6/plugins.min.js" referrerpolicy="origin"></script>

        <!--=============== include bootstrap scripts ===============-->
        <script src="{{ asset('web_app/js/bootstrap.js') }}"></script>
        <script src="{{ asset('web_app/js/bootstra.bundle.js') }}"></script>
    </body>
</html>
