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
                            <input type="text" placeholder="Middle name -- optional"  name="" value="{{ old('middle_name') ?? $user_details->middle_name }}" />
                        </div>
                        <div class="col-sm-4">
                            <label>Last Name <i class="fal fa-user"></i></label>
                            <input type="text" placeholder="Last name"  name="" value="{{ old('last_name') ?? $user_details->last_name }}" />
                        </div>
                        <div class="col-sm-6">
                            <label>Email Address<i class="fa fa-envelope"></i> </label>
                            <input type="text" placeholder="Enter email address"  name="" value="{{ old('email') ?? $user_details->email }}" />
                        </div>
                        <div class="col-sm-6">
                            <label>Second Email Address<i class="fa fa-envelope"></i> </label>
                            <input type="text" placeholder="Second email address -- optional"  name="" value="{{ old('second_email') ?? $user_profile->second_email }}" />
                        </div>
                        <div class="col-sm-6">
                            <label>Phone<i class="fa fa-phone"></i> </label>
                            <input type="text" placeholder="+7(123)987654"  name="" value="{{ old('phone') ?? $user_details->phone }}" />
                        </div>
                        <div class="col-sm-6">
                            <label>Second Phone<i class="fa fa-phone"></i> </label>
                            <input type="text" placeholder="Enter second phone -- optional"  name="" value="{{ old('second_phone') ?? $user_profile->second_phone }}" />
                        </div>
                        <div class="col-sm-6">
                            <label> Address <i class="fas fa-map-marker"></i> </label>
                            <input type="text" placeholder="Enter first address"  name="" value="{{ old('') ?? $user_profile->first_address  }}" />
                        </div>
                        <div class="col-sm-6">
                            <label> Second Address <i class="fas fa-map-marker"></i> </label>
                            <input type="text" placeholder="Second address -- optional"  name="" value="{{ old('') ?? $user_profile->second_address  }}" />
                        </div>
                        <div class="col-sm-6">
                            <label> City <i class="fa fa-globe"></i> </label>
                            <input type="text" placeholder="Name of city"  name="" value="{{ old('') ?? $user_profile->city }}" />
                        </div>
                        <div class="col-md-6">
                            <label>Country</label>
                            <div class="listsearch-input-item">
                                <select data-placeholder="Country" class="chosen-select no-search-select" name="country_id">
                                    <option value="" >Select Country</option>
                                    {{-- loop through countries for DB --}}
                                    @foreach ($all_countries as $country)
                                        <option value="{{ $country->id }}" {{ $country->id == $user_profile->country_id ? "selected" : "" }} >{{ $country->name }}</option>
                                    @endforeach
                                    {{-- loop through countries for DB end --}}
                                </select>
                            </div>
                            @error('country_id')
                                <p class="form_errors text-danger" style="padding-top: 10px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <label>Breif Description <i class="fal fa-list"></i></label>
                    <textarea cols="40" rows="2" name='brief_description' id="brief_description" placeholder="Brief opportunity description"  name="" />{{ old('brief_description') ?? $user_profile->brief_description }}</textarea>
                    @error('brief_description')
                        <p class="form_errors text-danger" style="padding-top: 10px !important;">{{ $message }}</p>
                    @enderror
                    <div class="clearfix"></div>

                    {{-- show only if banner and profile images are NULL --}}
                    @if ($user_profile_images->user_profile_banner === NULL && $user_profile_images->user_profile_image === NULL)
                        <div class="row" style="margin-top: 30px !important;">
                            <!--col -->
                            <div class="col-md-6">
                                <div class="add-list-media-header" style="margin-bottom:10px !important;">
                                    <label>
                                        <span>Banner image</span>
                                    </label>
                                </div>
                                <div class="add-list-media-wrap">
                                    <div class="listsearch-input-item fl-wrap">
                                        <div class="fuzone">
                                            <div class="fu-text">
                                                <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                <div class="photoUpload-files fl-wrap"></div>
                                            </div>
                                            <input type="file" class="upload" name="banner_image" multiple value="{{ old('banner_image') }}">
                                        </div>
                                    </div>
                                    @error('banner_images')
                                        <p class="form_errors text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!--col end-->

                            <!--col :: Carousel-->
                            <div class="col-md-6">
                                <div class="add-list-media-header" style="margin-bottom:10px !important;">
                                    <label>
                                        <span>Profile image</span>
                                    </label>
                                </div>
                                <div class="add-list-media-wrap">
                                    <div class="listsearch-input-item fl-wrap">
                                        <div class="fuzone">
                                            <div class="fu-text">
                                                <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                                <div class="photoUpload-files fl-wrap"></div>
                                            </div>
                                            <input type="file" class="upload" name="profile_image" multiple>
                                        </div>
                                    </div>
                                    @error('opportunity_images')
                                        <p class="form_errors text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!--col :: Carousel end-->
                        </div>

                    @endif
                    {{-- show only if banner and profile images are NULL end --}}

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

        {{-- push custom javascript into a components --}}
        @push('custom_javascript')

            <script type='text/javascript'>
                tinymce.init({
                    selector: '#brief_description',
                    menubar: true,
                    plugins: "link image",
                    toolbar: 'undo redo | styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code'
                });
            </script>

        @endpush
        {{-- push custom javascript into a components end--}}

    </div>


</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
