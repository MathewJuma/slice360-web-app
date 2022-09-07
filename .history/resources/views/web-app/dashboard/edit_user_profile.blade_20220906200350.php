{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    <div class="dashboard-title   fl-wrap">
        <h3>Edit Profile</h3>

        @php
            //this is the user profile details
            $user_profile = $user_details->user_profile;

        @endphp

        {{-- custom css for form errors --}}
        <style type="text/css">
            #profile_image-error,  #banner_image-error {
                padding-left: 10px !important;
                margin-top: -15px !important;
            }
        </style>
        {{-- custom css for form errors end --}}

        {{-- edit profile form --}}
        <form action="{{ route('web-app.dashboard.update-user-profile', $user_details->id) }}" enctype="multipart/form-data" method="post" id="user_profile_form">
            @csrf;
            @method('PATCH')

            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>First Name <i class="fal fa-user"></i></label>
                            <input type="text" placeholder="First name"  name="first_name" value="{{ old('first_name') ?? $user_details->first_name }}" />
                            @error('first_name')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Middle Name <i class="fal fa-user"></i></label>
                            <input type="text" placeholder="Middle name -- optional"  name="middle_name" value="{{ old('middle_name') ?? $user_details->middle_name }}" />
                            @error('middle_name')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Last Name <i class="fal fa-user"></i></label>
                            <input type="text" placeholder="Last name"  name="last_name" value="{{ old('last_name') ?? $user_details->last_name }}" />
                            @error('last_name')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Email Address<i class="fa fa-envelope"></i> </label>
                            <input type="text" placeholder="Enter email address"  name="email" value="{{ old('email') ?? $user_details->email }}" />
                            @error('email')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Second Email Address<i class="fa fa-envelope"></i> </label>
                            <input type="text" placeholder="Second email address -- optional"  name="second_email" value="{{ old('second_email') ?? $user_profile->second_email }}" />
                            @error('second_email')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Phone<i class="fa fa-phone"></i> </label>
                            <input type="text" placeholder="+7(123)987654" name="phone" value="{{ old('phone') ?? $user_details->phone }}" />
                            @error('phone')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Second Phone<i class="fa fa-phone"></i> </label>
                            <input type="text" placeholder="Second phone -- optional"  name="second_phone" value="{{ old('second_phone') ?? $user_profile->second_phone }}" />
                            @error('second_phone')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label> Address <i class="fas fa-map-marker"></i> </label>
                            <input type="text" placeholder="Enter first address"  name="first_address" value="{{ old('first_address') ?? $user_profile->first_address  }}" />
                            @error('first_address')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label> Second Address <i class="fas fa-map-marker"></i> </label>
                            <input type="text" placeholder="Second address -- optional"  name="second_address" value="{{ old('second_address') ?? $user_profile->second_address  }}" />
                            @error('second_address')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label> City <i class="fa fa-globe"></i> </label>
                            <input type="text" placeholder="Name of city"  name="city" value="{{ old('city') ?? $user_profile->city }}" />
                            @error('city')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
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
                                <p class="form_errors text-danger" style="font-size: 11px !important;" style="padding-top: 10px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <label>Breif Description <i class="fal fa-list"></i></label>
                    <textarea cols="40" rows="2" name='brief_description' id="brief_description" placeholder="Brief opportunity description"  name="" />{{ old('brief_description') ?? $user_profile->brief_description }}</textarea>
                    @error('brief_description')
                        <p class="form_errors text-danger" style="font-size: 11px !important;" style="padding-top: 10px !important;">{{ $message }}</p>
                    @enderror
                    <div class="clearfix"></div>

                    {{-- show only if banner and profile images are NULL --}}
                    @if ($user_profile_images->user_profile_banner === NULL && $user_profile_images->user_profile_image === NULL)
                        <div class="row" style="margin-top: 30px !important;">

                            <!--col :: profile image-->
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
                                            <input type="file" class="upload"  id="profile_image" name="profile_image"  value="{{ old('profile_image') }}">
                                        </div>
                                    </div>
                                    @error('profile_image')
                                        <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!--col :: profile image end-->

                            <!--col :: banner image-->
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
                                            <input type="file" class="upload" id="banner_image" name="banner_image" value="{{ old('banner_image') }}">
                                        </div>
                                    </div>
                                    @error('banner_image')
                                        <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!--col :: banner image end-->
                        </div>

                    @endif
                    {{-- show only if banner and profile images are NULL end --}}

                </div>
            </div>
            <!-- profile-edit-container end-->
            <div class="dashboard-title dt-inbox fl-wrap">
                <h3>Socials Network</h3>
            </div>
            <!-- profile-edit-container-->
            <div class="profile-edit-container fl-wrap block_box">
                <div class="custom-form">
                    <div class="row">
                    <div class="col-md-12">
                        <label>Website <i class="fa fa-globe"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="https://www.domain.com/ -- optional" name="webiste" value="{{ old('website') ?? $user_profile->website }}"/>
                            @error('webiste')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="custom-form">
                    <div class="row">
                    <div class="col-md-12">
                        <label>Facebook <i class="fa fa-facebook"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="https://www.facebook.com/ -- optional" name="facebook" value="{{ old('facebook') ?? $user_profile->facebook }}"/>
                            @error('facebook')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Twitter<i class="fa fa-twitter"></i>  </label>
                        <div class="general-input-item">
                            <input type="text" placeholder="https://twitter.com/ -- optional" name="twitter" value="{{ old('twitter') ?? $user_profile->twitter }}"/>
                            @error('twitter')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Instagram <i class="fa fa-instagram"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="https://www.instagram.com/ -- optional" name="instagram" value="{{ old('instagram') ?? $user_profile->instagram }}"/>
                            @error('instagram')
                                <p class="form_errors text-danger" style="font-size: 11px !important;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                    <button class="btn color2-bg float-btn" id="edit_user_profile_submit">Save Changes<i class="fal fa-save"></i></button>
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

                //run jquery
                $(document).ready(function() {

                    //only process if fields exists
                    if( $('#profile_image').length && $('#banner_image').length )         // use this if you are using id to check
                    {
                        $('#user_profile_form').validate({

                            rules: {
                                profile_image: "required",
                                banner_image: "required",
                            },
                            messages: {
                                profile_image: "Profile image is required",
                                banner_image: "Banner image is required",
                            },

                        });
                    }

                });

            </script>

        @endpush
        {{-- push custom javascript into a components end--}}

    </div>


</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
