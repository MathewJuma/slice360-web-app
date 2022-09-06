{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>


<!--  header section  -->
<section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
    <div class="container">
        <div class="dashboard-breadcrumbs breadcrumbs"><a href="#">Home</a><a href="#">Dashboard</a><span>Main page</span></div>
        <!--Tariff Plan menu-->
        <div   class="tfp-btn"><span>Tariff Plan : </span> <strong>Extended</strong></div>
        <div class="tfp-det">
            <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
            <a href="#" class="tfp-det-btn color2-bg">Details</a>
        </div>
        <!--Tariff Plan menu end-->
        <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
            <h1>Welcome  : <span>Alisa Noory</span></h1>
        </div>
    </div>
    <div class="clearfix"></div>

    {{-- dashboard header --}}
    <div class="dashboard-header fl-wrap">
        <div class="container">
            <div class="dashboard-header_conatiner fl-wrap">
                <div class="dashboard-header-avatar">
                    <img src="images/avatar/1.jpg" alt="">
                    <a href="dashboard-myprofile.html" class="color-bg edit-prof_btn"><i class="fal fa-edit"></i></a>
                </div>
                <div class="dashboard-header-stats-wrap">
                    <div class="dashboard-header-stats">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!--  dashboard-header-stats-item -->
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-map-marked"></i>
                                        Active Listings
                                        <span>21</span>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats-item end -->
                                <!--  dashboard-header-stats-item -->
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-chart-bar"></i>
                                        Listing Views
                                        <span>1054</span>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats-item end -->
                                <!--  dashboard-header-stats-item -->
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-comments-alt"></i>
                                        Total Reviews
                                        <span>79</span>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats-item end -->
                                <!--  dashboard-header-stats-item -->
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-heart"></i>
                                        Times Bookmarked
                                        <span>654</span>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats-item end -->
                            </div>
                        </div>
                    </div>
                    <!--  dashboard-header-stats  end -->
                    <div class="dhs-controls">
                        <div class="dhs dhs-prev"><i class="fal fa-angle-left"></i></div>
                        <div class="dhs dhs-next"><i class="fal fa-angle-right"></i></div>
                    </div>
                </div>
                <!--  dashboard-header-stats-wrap end -->
                <a class="add_new-dashboard">Add Listing <i class="fal fa-layer-plus"></i></a>
            </div>
        </div>
    </div>
    {{-- dashboard header end--}}

    {{-- dashboard bubbles --}}
    <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
    <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
    <div class="circle-wrap" style="left:120px;bottom:120px;" data-scrollax="properties: { translateY: '-200px' }">
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
    {{-- dashboard bubbles end --}}
</section>
<!--  header section  end-->

<!--  section  -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">
        <!--  dashboard-menu-->
        <div class="col-md-3">
            <div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
            <div class="clearfix"></div>
            <div class="fixed-bar fl-wrap" id="dash_menu">
                <div class="user-profile-menu-wrap fl-wrap block_box">
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        <h3>Main</h3>
                        <ul class="no-list-style">
                            <li><a href="dashboard.html"><i class="fal fa-chart-line"></i>Dashboard</a></li>
                            <li><a href="dashboard-feed.html"><i class="fal fa-rss"></i>Your Feed <span>7</span></a></li>
                            <li><a href="dashboard-myprofile.html"><i class="fal fa-user-edit"></i> Edit profile</a></li>
                            <li><a href="dashboard-messages.html"><i class="fal fa-envelope"></i> Messages <span>3</span></a></li>
                            <li><a href="dashboard-password.html"><i class="fal fa-key"></i>Change Password</a></li>
                            <li>
                                <a href="#" class="submenu-link"><i class="fal fa-plus"></i>Submenu</a>
                                <ul  class="no-list-style">
                                    <li><a href="#"><i class="fal fa-th-list"></i> Submenu 2 </a></li>
                                    <li><a href="#"> <i class="fal fa-calendar-check"></i> Submenu 2</a></li>
                                    <li><a href="#"><i class="fal fa-comments-alt"></i>Submenu 2</a></li>
                                    <li><a href="#"><i class="fal fa-file-plus"></i> Submenu 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        <h3>Listings</h3>
                        <ul  class="no-list-style">
                            <li><a href="dashboard-listing-table.html"><i class="fal fa-th-list"></i> My listigs  </a></li>
                            <li><a href="dashboard-bookings.html"> <i class="fal fa-calendar-check"></i> Bookings <span>2</span></a></li>
                            <li><a href="dashboard-review.html"><i class="fal fa-comments-alt"></i> Reviews </a></li>
                            <li><a href="dashboard-add-listing.html" class="user-profile-act"><i class="fal fa-file-plus"></i> Add New</a></li>
                            <li>
                                <a href="#" class="submenu-link"><i class="fal fa-plus"></i>Submenu</a>
                                <ul  class="no-list-style">
                                    <li><a href="#"><i class="fal fa-th-list"></i> Submenu 2 </a></li>
                                    <li><a href="#"> <i class="fal fa-calendar-check"></i> Submenu 2</a></li>
                                    <li><a href="#"><i class="fal fa-comments-alt"></i>Submenu 2</a></li>
                                    <li><a href="#"><i class="fal fa-file-plus"></i> Submenu 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                    <button class="logout_btn color2-bg">Log Out <i class="fas fa-sign-out"></i></button>
                </div>
            </div>
            <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="#dash_menu">Back to Menu<i class="fas fa-caret-up"></i></a>
            <div class="clearfix"></div>
        </div>
        <!-- dashboard-menu  end-->

        <!-- dashboard content-->
        <div class="col-md-9">

        </div>
        <!-- dashboard content end-->
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>


</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
