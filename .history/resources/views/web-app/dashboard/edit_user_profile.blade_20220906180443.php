{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    <div class="dashboard-title   fl-wrap">
        <h3>Edit Profile</h3>

        @php
            //this is the user profile details
            $user_profile = $user_details->user_profile;
        @endphp

        {{-- edit profile form --}}
        <form action="{{ route('web-app.dashboard.update-user-profile', $user_details->id) }}" enctype="multipart/form-data" method="post">
            @csrf;
            @method('PATCH')

            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>First Name <i class="fal fa-user"></i></label>
                            <input type="text" placeholder="First name"  name="" value="{{ old('first_name') ?? $user_details->first_name }}" />
                        </div>
                        <div class="col-sm-4">
                            <label>Middle Name <i class="fal fa-user"></i></label>
                            <input type="text" placeholder="Middle name"  name="" value="{{ old('middle_name') ?? $user_details->middle_name }}" />
                        </div>
                        <div class="col-sm-4">
                            <label>Last Name <i class="fal fa-user"></i></label>
                            <input type="text" placeholder="Last name"  name="" value="{{ old('last_name') ?? $user_details->last_name }}" />
                        </div>
                        <div class="col-sm-6">
                            <label>Email Address<i class="far fa-envelope"></i> </label>
                            <input type="text" placeholder="JessieManrty@domain.com"  name="" value="{{ old('email') ?? $user_details->email }}" />
                        </div>
                        <div class="col-sm-6">
                            <label>Second Email Address<i class="far fa-envelope"></i> </label>
                            <input type="text" placeholder="JessieManrty@domain.com"  name="" value="{{ old('email') ?? $user_details->email }}" />
                        </div>
                        <div class="col-sm-6">
                            <label>Phone<i class="far fa-phone"></i> </label>
                            <input type="text" placeholder="+7(123)987654"  name="" value="{{ old('phone') ?? $user_details->phone }}" />
                        </div>
                        <div class="col-sm-6">
                            <label> Adress <i class="fas fa-map-marker"></i> </label>
                            <input type="text" placeholder="USA 27TH Brooklyn NY"  name="" value="{{ old('') ?? $user_details->xx }}" />
                        </div>
                        <div class="col-sm-6">
                            <label> Website <i class="far fa-globe"></i> </label>
                            <input type="text" placeholder="themeforest.net"  name="" value="{{ old('') ?? $user_details->xx }}" />
                        </div>
                    </div>
                    <label> Notes</label>
                    <textarea cols="40" rows="3" placeholder="About Me" style="margin-bottom:20px;"></textarea>
                    <div class="clearfix"></div>
                    <label>Change Avatar</label>
                    <div class="clearfix"></div>
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
            <!-- profile-edit-container end-->
            <div class="dashboard-title dt-inbox fl-wrap">
                <h3>Your Socials</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <label>Facebook <i class="fab fa-facebook"></i></label>
                    <input type="text" placeholder="https://www.facebook.com/"  name="" value="{{ old('') ?? $user_details->xx }}" />
                    <label>Twitter<i class="fab fa-twitter"></i> </label>
                    <input type="text" placeholder="https://twitter.com/"  name="" value="{{ old('') ?? $user_details->xx }}" />
                    <label>Vkontakte<i class="fab fa-vk"></i> </label>
                    <input type="text" placeholder="https://vk.com"  name="" value="{{ old('') ?? $user_details->xx }}" />
                    <label> Instagram <i class="fab fa-instagram"></i> </label>
                    <input type="text" placeholder="https://www.instagram.com/"  name="" value="{{ old('') ?? $user_details->xx }}" />
                    <button class="btn    color2-bg  float-btn">Save Changes<i class="fal fa-save"></i></button>
                </div>
            </div>
            <!-- profile-edit-container end-->

        </form>
        {{-- edit profile form end --}}

    </div>


</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
