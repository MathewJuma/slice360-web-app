{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>


<!--  section  -->
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
</section>
<!--  section  end-->
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
            <div class="dashboard-title   fl-wrap">
                <h3>Add Listing</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <label>Listing Title <i class="fal fa-briefcase"></i></label>
                    <input type="text" placeholder="Name of your business" value=""/>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Type / Category</label>
                            <div class="listsearch-input-item">
                                <select data-placeholder="Apartments" class="chosen-select no-search-select" >
                                    <option>All Categories</option>
                                    <option>Shops</option>
                                    <option>Hotels</option>
                                    <option>Restaurants</option>
                                    <option>Fitness</option>
                                    <option>Events</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Keywords <i class="fal fa-key"></i></label>
                            <input type="text" placeholder="Maximum 15 , should be separated by commas" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Location / Contacts</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Longitude (Drag marker on the map)<i class="fal fa-long-arrow-alt-right"></i>  </label>
                            <input type="text" placeholder="Map Longitude"  id="long" value=""/>
                        </div>
                        <div class="col-md-6">
                            <label>Latitude (Drag marker on the map) <i class="fal fa-long-arrow-alt-down"></i> </label>
                            <input type="text" placeholder="Map Latitude"  id="lat" value=""/>
                        </div>
                    </div>
                    <div class="map-container">
                        <div id="singleMap" class="drag-map" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
                    </div>
                    <label>City / Location</label>
                    <div class="listsearch-input-item">
                        <select data-placeholder="City" class="chosen-select no-search-select" >
                            <option>All Cities</option>
                            <option>New York</option>
                            <option>London</option>
                            <option>Paris</option>
                            <option>Kiev</option>
                            <option>Moscow</option>
                            <option>Dubai</option>
                            <option>Rome</option>
                            <option>Beijing</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Address<i class="fal fa-map-marker"></i></label>
                            <input type="text" placeholder="Address of your business" value=""/>
                        </div>
                        <div class="col-sm-6">
                            <label>Email Address<i class="far fa-envelope"></i>  </label>
                            <input type="text" placeholder="JessieManrty@domain.com" value=""/>
                        </div>
                        <div class="col-sm-6">
                            <label>Phone<i class="far fa-phone"></i>  </label>
                            <input type="text" placeholder="+7(123)987654" value=""/>
                        </div>
                        <div class="col-sm-6">
                            <label> Website <i class="far fa-globe"></i>  </label>
                            <input type="text" placeholder="themeforest.net" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Header Media</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <!--col -->
                        <div class="col-md-4">
                            <div class="add-list-media-header" style="margin-bottom:20px">
                                <label class="radio inline">
                                <input type="radio" name="gender"  checked>
                                <span>Background image</span>
                                </label>
                            </div>
                            <div class="add-list-media-wrap">
                                <div class="add-list-media-wrap">
                                    <div class="listsearch-input-item fl-wrap">
                                        <div class="fuzone">
                                            <form>
                                                <div class="fu-text">
                                                    <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                    <div class="photoUpload-files fl-wrap"></div>
                                                </div>
                                                <input type="file" class="upload" multiple>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--col end-->
                        <!--col -->
                        <div class="col-md-4">
                            <div class="add-list-media-header" style="margin-bottom:20px">
                                <label class="radio inline">
                                <input type="radio" name="gender">
                                <span>Carousel</span>
                                </label>
                            </div>
                            <div class="add-list-media-wrap">
                                <div class="listsearch-input-item fl-wrap">
                                    <div class="fuzone">
                                        <form>
                                            <div class="fu-text">
                                                <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                <div class="photoUpload-files fl-wrap"></div>
                                            </div>
                                            <input type="file" class="upload" multiple>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--col end-->
                        <!--col -->
                        <div class="col-md-4">
                            <div class="add-list-media-header" style="margin-bottom:20px">
                                <label class="radio inline">
                                <input type="radio" name="gender">
                                <span>Video</span>
                                </label>
                            </div>
                            <div class="add-list-media-wrap">
                                <label>Youtube  <i class="fab fa-youtube"></i></label>
                                <input type="text" placeholder="https://www.youtube.com/" value=""/>
                                <label>Vimeo <i class="fab fa-vimeo-v"></i></label>
                                <input type="text" placeholder="https://vimeo.com/" value=""/>
                            </div>
                        </div>
                        <!--col end-->
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Details</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <label>Text</label>
                    <textarea cols="40" rows="3" placeholder="Datails"></textarea>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Details Item - Menu</h3>
                <div class="onoffswitch">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch11" checked>
                    <label class="onoffswitch-label" for="myonoffswitch11">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap  block_box">
                <div class="custom-form add_room-item-wrap">
                    <div class="add_room-container fl-wrap">
                        <!--add_room-item end  -->
                        <div class="add_room-item fl-wrap">
                            <span class="remove-rp tolt" data-microtip-position="left"  data-tooltip="Remove"><i class="fal fa-times-circle"></i></span>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Item Title <i class="fal fa-briefcase"></i></label>
                                    <input type="text" placeholder="Title" value=""/>
                                </div>
                                <div class="col-md-4">
                                    <label>Item Category<i class="fal fa-filter"></i></label>
                                    <input type="text" placeholder="Category" value=""/>
                                </div>
                                <div class="col-md-4">
                                    <label>Item Price<i class="fal fa-dollar-sign"></i></label>
                                    <input type="text" placeholder="Price" value=""/>
                                </div>
                                <div class="col-md-8">
                                    <label>Item Details</label>
                                    <textarea cols="40" rows="3" placeholder="Datails"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Item Image</label>
                                    <div class="add-list-media-wrap">
                                        <div class="listsearch-input-item fl-wrap">
                                            <div class="fuzone">
                                                <form>
                                                    <div class="fu-text">
                                                        <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                        <div class="photoUpload-files fl-wrap"></div>
                                                    </div>
                                                    <input type="file" class="upload">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--add_room-item end  -->
                    </div>
                    <a href="#" class="add-room-item">Add New <i class="fal fa-plus"></i> </a>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Details Item - Rooms</h3>
                <div class="onoffswitch">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch21">
                    <label class="onoffswitch-label" for="myonoffswitch11">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap  block_box">
                <div class="custom-form add_room-item-wrap">
                    <div class="add_room-container fl-wrap">
                        <!--add_room-item end  -->
                        <div class="add_room-item fl-wrap">
                            <span class="remove-rp tolt" data-microtip-position="left"  data-tooltip="Remove"><i class="fal fa-times-circle"></i></span>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Item Title <i class="fal fa-briefcase"></i></label>
                                    <input type="text" placeholder="Title" value=""/>
                                </div>
                                <div class="col-md-4">
                                    <label>Item Subtitle<i class="fal fa-filter"></i></label>
                                    <input type="text" placeholder="Subtitle" value=""/>
                                </div>
                                <div class="col-md-4">
                                    <label>Item Price<i class="fal fa-dollar-sign"></i></label>
                                    <input type="text" placeholder="Price" value=""/>
                                </div>
                                <div class="col-md-8">
                                    <label>Item Details</label>
                                    <textarea cols="40" rows="3" placeholder="Datails"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Item Image</label>
                                    <div class="add-list-media-wrap">
                                        <div class="listsearch-input-item fl-wrap">
                                            <div class="fuzone">
                                                <form>
                                                    <div class="fu-text">
                                                        <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                        <div class="photoUpload-files fl-wrap"></div>
                                                    </div>
                                                    <input type="file" class="upload">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--add_room-item end  -->
                    </div>
                    <a href="#" class="add-room-item">Add New <i class="fal fa-plus"></i> </a>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Facilities</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <!-- Checkboxes -->
                    <ul class="fl-wrap filter-tags no-list-style ds-tg">
                        <li>
                            <input id="check-aaa5" type="checkbox" name="check" checked>
                            <label for="check-aaa5">Free WiFi</label>
                        </li>
                        <li>
                            <input id="check-bb5" type="checkbox" name="check" checked>
                            <label for="check-bb5">Parking</label>
                        </li>
                        <li>
                            <input id="check-dd5" type="checkbox" name="check">
                            <label for="check-dd5">Fitness Center</label>
                        </li>
                        <li>
                            <input id="check-cc5" type="checkbox" name="check">
                            <label for="check-cc5">Non-smoking Rooms</label>
                        </li>
                        <li>
                            <input id="check-ff5" type="checkbox" name="check" checked>
                            <label for="check-ff5">Airport Shuttle</label>
                        </li>
                        <li>
                            <input id="check-c4" type="checkbox" name="check">
                            <label for="check-c4">Air Conditioning</label>
                        </li>
                    </ul>
                    <!-- Checkboxes end -->
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Content Widgets</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- act-widget-->
                            <div class="act-widget fl-wrap">
                                <div class="act-widget-header">
                                    <h4>1. Promo video</h4>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch5" checked>
                                        <label class="onoffswitch-label" for="myonoffswitch5">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="add-list-media-wrap">
                                    <label>Video url :  <i class="fab fa-youtube"></i></label>
                                    <input type="text" placeholder="https://www.youtube.com/" value=""/>
                                </div>
                            </div>
                            <!-- act-widget end-->
                        </div>
                        <div class="col-md-4">
                            <!-- act-widget-->
                            <div class="act-widget fl-wrap">
                                <div class="act-widget-header">
                                    <h4>2. Gallery Thumbnails</h4>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch6" checked>
                                        <label class="onoffswitch-label" for="myonoffswitch6">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="add-list-media-wrap">
                                    <div class="listsearch-input-item fl-wrap">
                                        <div class="fuzone">
                                            <form>
                                                <div class="fu-text">
                                                    <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                    <div class="photoUpload-files fl-wrap"></div>
                                                </div>
                                                <input type="file" class="upload" multiple>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- act-widget end-->
                        </div>
                        <div class="col-md-4">
                            <!-- act-widget-->
                            <div class="act-widget fl-wrap">
                                <div class="act-widget-header">
                                    <h4>3. Slider</h4>
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch7">
                                        <label class="onoffswitch-label" for="myonoffswitch7">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="add-list-media-wrap">
                                    <div class="listsearch-input-item fl-wrap">
                                        <div class="fuzone">
                                            <form>
                                                <div class="fu-text">
                                                    <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                    <div class="photoUpload-files fl-wrap"></div>
                                                </div>
                                                <input type="file" class="upload" multiple>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- act-widget end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Working Hours</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Monday <i class="fal fa-clock"></i></label>
                            <input type="text" placeholder="9 AM - 5 PM" value=""/>
                        </div>
                        <div class="col-sm-4">
                            <label>Tuesday <i class="fal fa-clock"></i></label>
                            <input type="text" placeholder="9 AM - 5 PM" value=""/>
                        </div>
                        <div class="col-sm-4">
                            <label>Wednesday <i class="fal fa-clock"></i></label>
                            <input type="text" placeholder="9 AM - 5 PM" value=""/>
                        </div>
                        <div class="col-sm-4">
                            <label>Thursday <i class="fal fa-clock"></i></label>
                            <input type="text" placeholder="9 AM - 5 PM" value=""/>
                        </div>
                        <div class="col-sm-4">
                            <label>Friday <i class="fal fa-clock"></i></label>
                            <input type="text" placeholder="9 AM - 5 PM" value=""/>
                        </div>
                        <div class="col-sm-4">
                            <label>Saturday <i class="fal fa-clock"></i></label>
                            <input type="text" placeholder="9 AM - 3 PM" value=""/>
                        </div>
                        <div class="col-sm-4">
                            <label>Sunday <i class="fal fa-clock"></i></label>
                            <input type="text" placeholder="Closed" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Sidebar Widgets</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <!-- act-widget-->
                    <div class="act-widget fl-wrap">
                        <div class="act-widget-header">
                            <h4>1. Booking Form</h4>
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                                <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- act-widget end-->
                    <!-- act-widget-->
                    <div class="act-widget fl-wrap">
                        <div class="act-widget-header">
                            <h4>2. Price Range </h4>
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch2">
                                <label class="onoffswitch-label" for="myonoffswitch2">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- act-widget end-->
                    <!-- act-widget-->
                    <div class="act-widget fl-wrap">
                        <div class="act-widget-header">
                            <h4>3. instagram</h4>
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch3" checked>
                                <label class="onoffswitch-label" for="myonoffswitch3">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                        <label>Api key<i class="fab fa-mixcloud"></i></label>
                        <input type="text" placeholder="Api key" value=""/>
                    </div>
                    <!-- act-widget end-->
                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title  dt-inbox fl-wrap">
                <h3>Your  Socials</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <label>Facebook <i class="fab fa-facebook"></i></label>
                    <input type="text" placeholder="https://www.facebook.com/" value=""/>
                    <label>Twitter<i class="fab fa-twitter"></i>  </label>
                    <input type="text" placeholder="https://twitter.com/" value=""/>
                    <label>Vkontakte<i class="fab fa-vk"></i>  </label>
                    <input type="text" placeholder="https://vk.com" value=""/>
                    <label> Instagram <i class="fab fa-instagram"></i>  </label>
                    <input type="text" placeholder="https://www.instagram.com/" value=""/>
                    <button class="btn    color2-bg  float-btn">Send Listing<i class="fal fa-paper-plane"></i></button>
                </div>
            </div>
            <!-- profile-edit-container end-->
        </div>
        <!-- dashboard content end-->
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>


</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
