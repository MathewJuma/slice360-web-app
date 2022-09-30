@props(['all_countries', 'all_categories', 'user_details'])

{{-- {{ dd($new_posts) }} --}}


{{-- this layout is used by the entire slice360 web app --}}
<!DOCTYPE HTML>
<html lang="en">

    <head>
        <!--=============== basic ===============-->
        <meta charset="UTF-8">
        <title>Slice360 - Our goal is to make everyone own some wealth</title>
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />

        {{-- inlcude tailwind CSS compiled via vite --}}
        {{-- @vite(['resources/css/app.css']) --}}

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
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/fontawesome.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/regular.css') }}">
        {{-- <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/solid.css') }}"> --}}
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/svg-with-js.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/v4-shims.css') }}">

        <!--=============== include datatables ===============-->
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/custom_table.css') }}">

        <!--=============== include favicons ===============-->
        <link rel="shortcut icon" href="{{ asset('web_app/images/favicon.ico') }}">
    </head>
    <body>

        {{-- begin :: loader on all pages --}}
        <div class="loader-wrap">
            <div class="loader-inner">
                <div class="loader-inner-cirle"></div>
            </div>
        </div>
        {{-- end :: loader on all pages --}}

        {{-- begin :: main section --}}
        <div id="main">

            {{-- begin :: header section --}}
            <header class="main-header">
                <!-- logo-->
                <a href="/home" class="logo-holder">
                    <img src="{{ asset('web_app/images/logo.png') }}" class="logo-image" alt="slice360">
                    <!--<h1 class="logo-text">slice360</h1>-->
                </a>
                <!-- logo end-->

                <!-- header-search_btn-->
                <div class="header-search_btn show-search-button">
                    <i class="fal fa-search"></i><span>Search</span>
                </div>
                <!-- header-search_btn end-->

                {{-- show only if the user is logged in --}}
                @if (Auth::check())

                    <!-- wish list and make pitch button -->
                    @include('partials.app-general._wishlist_make-pitch')
                    <!-- wish list and make pitch button end -->

                @endif
                {{-- show only if the user is logged in end --}}

                {{-- show only if the user is logged in --}}
                @if (Auth::check())

                    <!--profile-name /logout links -->
                    @include('partials.app-general._profile_logout', ['username'=>auth()->user()->username, 'user_details'=>$user_details])
                    <!-- profile-name /logout links end -->

                    <!-- manage opportunities -->
                    @include('partials.app-general._dashboard-link', ['user_details'=>$user_details])
                    <!-- manage opportunities end-->

                @else

                    <!-- sing-in links -->
                    @include('partials.app-general._sign-in')
                    <!-- sing-in links end -->

                @endif
                {{-- show only if the user is logged in end --}}

                <!-- this is the global lang-wrap-->
                {{-- @include('partials.app-general._global_lang') --}}
                <!-- this is the global lang-wrap end-->

                <!--  top-bar navigation -->
                {{-- @include('partials.app-general._top_bar-nav') --}}
                <!-- top-bar navigation  end -->

                <!-- header-search_container -->
                @include('partials.app-general._search_top', ['all_countries'=>$all_countries, 'all_categories'=>$all_categories])
                <!-- header-search_container  end -->

                <!-- wishlist-wrap-->
                @include('partials.app-general._wish_list')
                <!--wishlist-wrap end -->
            </header>
            {{-- end :: header section --}}

            {{-- begin :: main section wrapper --}}
            <div id="wrapper">

                <!-- slot component content-->
                <div class="content">
                    {{ $slot }}
                </div>
                <!--slot component content end-->

            </div>
            {{-- end :: main section wrapper --}}

            {{-- begin :: footer section --}}
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
                                    <div class="footer-logo">
                                        <a href="/home">
                                        <img src="{{ asset('web_app/images/logo.png') }}" alt=""></a>
                                        <!--<h1 class="logo-text-2">slice360</h1>-->
                                    </div>
                                    <div class="footer-contacts-widget fl-wrap">
                                        <p>Our goal is to make everyone own some wealth. Slice360 makes it simple for anyone to find investment opportunities based on vision. Explore your investment options, help raise capital and gain some wealth.</p>
                                        <ul  class="footer-contacts fl-wrap no-list-style">
                                            <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#" target="_blank">opportunities@slice360.io</a></li>
                                            <li> <span><i class="fal fa-map-marker"></i> Adress :</span><a href="#" target="_blank">73619-00200, Nairobi</a></li>
                                            <li><span><i class="fal fa-phone"></i> Phone :</span><a href="#">+254(0)100 90 99 59</a></li>
                                        </ul>
                                        <div class="footer-social">
                                            <span>Find  us on: </span>
                                            <ul class="no-list-style">
                                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://twitter.com/Slice360_Global" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- footer-widget end-->

                            <!-- latest news :: footer-widget-->
                            <div class="col-md-4">
                                <div class="footer-widget fl-wrap">
                                    <h3>Our Last News</h3>
                                    @if ($new_posts->count() > 0)

                                        <div class="footer-widget-posts fl-wrap">
                                            <ul class="no-list-style">

                                                @foreach ($new_posts as $post)
                                                    <li class="clearfix">
                                                        <a href="{{ route('web-app.blog.blog-single', $post->slug) }}"  class="widget-posts-img">
                                                            <img src="{{ asset($post->featured_image) }}" class="respimg" alt="">
                                                        </a>
                                                        <div class="widget-posts-descr">
                                                            <a href="{{ route('web-app.blog.blog-single', $post->slug) }}" title="">{{ $post->title }}</a>
                                                            <span class="widget-posts-date"><i class="fal fa-calendar"></i>
                                                                {{ \Carbon\Carbon::parse($post->publish_date)->format('d M Y') }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                            <a href="{{ route('web-app.blog.blog-listing') }}" class="footer-link">Read all <i class="fal fa-long-arrow-right"></i></a>
                                        </div>

                                    @else

                                        <div class="footer-widget-posts fl-wrap">
                                            <span style="color: #ffffff !important;">We don't have any news. Check back later!</span>
                                        </div>

                                    @endif
                                </div>
                            </div>
                            <!-- latest news :: footer-widget end-->

                            <!-- footer-widget  -->
                            <div class="col-md-4">
                                <div class="footer-widget fl-wrap ">
                                    <h3>Our  Twitter</h3>
                                    <div class="twitter-holder fl-wrap scrollbar-inner2" data-simplebar data-simplebar-auto-hide="false">
                                        <div id="footer-twiit"></div>
                                    </div>
                                    <a href="https://twitter.com/Slice360_Global" class="footer-link twitter-link" target="_blank">Follow us <i class="fal fa-long-arrow-right"></i></a>
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
                        <div class="copyright"> {{ date('Y') }} &#169;Slice360 .  All rights reserved.</div>
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
                                <li><a href="{{ route('web-app.blog.blog-listing') }}">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--sub-footer end -->
            </footer>
            {{-- end :: footer section --}}

        </div>
        {{-- end :: main section --}}

        {{-- add the flash-message component --}}
        <x-app-general.flash-message />
        {{-- add the flash-message component end --}}

        {{-- begin :: scroll caret --}}
        <a class="to-top"><i class="fas fa-caret-up"></i></a>
        {{-- end :: scroll caret --}}

        <!--register and login form -->
        <x-app-general.register-login />
        <!--register and login form end -->

        <!--=============== include scripts ===============-->
        {{-- @vite(['resources/js/app.js']) --}}

        <!--=============== include scripts ===============-->
        <script src="{{ asset('web_app/js/jquery.min.js') }}"></script>
        <script src="{{ asset('web_app/js/jquery_validator.js') }}"></script>
        <script src="{{ asset('web_app/js/plugins.js') }}"></script>
        <script src="{{ asset('web_app/js/scripts.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&libraries=places&callback=initAutocomplete"></script>
        <script src="{{ asset('web_app/js/map-single.js') }}"></script>
        <script src="{{ asset('web_app/js/timeline.min.js') }}"></script>
        <script src="{{ asset('web_app/js/tinymce.js') }}"></script>
        <script src="https://cdn.tiny.cloud/1/2erokf2sc29d23ul3dgeeprg7ik77jxo8n8jybqp4qkmfxmy/tinymce/6/plugins.min.js" referrerpolicy="origin"></script>
        <script src="{{ asset('web_app/js/alpine.js') }}"></script>
        <script src="{{ asset('web_app/js/custom.js') }}"></script>


        <!--=============== include bootstrap scripts ===============-->
        <script src="{{ asset('web_app/js/bootstrap.js') }}"></script>
        <script src="{{ asset('web_app/js/bootstra.bundle.js') }}"></script>

        <!--=============== include datatables and sweetalert scripts ===============-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        {{-- this section we stack page specific JS --}}
        @stack('custom_javascript')
    </body>
</html>
