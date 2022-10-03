{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    {{-- new opportunity form --}}
    <form action="/opportunities" enctype="multipart/form-data" method="post">
        @csrf
        <div class="dashboard-title   fl-wrap">
            <h3>Add Opportunity</h3>
        </div>
        <!-- opportunity details -->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="custom-form">
                <div class="row">
                    <div class="col-md-12">
                        <label>Opportunity Title <i class="fal fa-briefcase"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="Name of your business opportunity" name="title" value="{{ old('title') }}"/>
                            @error('title')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Country</label>
                        <div class="listsearch-input-item">
                            <select data-placeholder="Country" class="chosen-select no-search-select" name="country_id">
                                <option selected value="" >Select Country</option>
                                {{-- loop through countries for DB --}}
                                @foreach ($all_countries as $country)
                                    <option value='{{ $country->id }}' @if (old('country_id') == $country->id ) selected @endif >{{ $country->name }}</option>
                                @endforeach
                                {{-- loop through countries for DB end --}}
                            </select>
                        </div>
                        @error('country_id')
                            <p class="form_errors text-danger" style="padding-top: 10px !important;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Nearest City <i class="fal fa-briefcase"></i> </label>
                        <div class="general-input-item">
                            <input type="text" placeholder="Nearest city to opportunity" name="city" value="{{ old('city') }}"/>
                            @error('city')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Category</label>
                        <div class="listsearch-input-item">
                            <select data-placeholder="Categories" class="chosen-select no-search-select" name="category_id">
                                <option selected value="" >Select Categories</option>
                                {{-- loop through categories for DB --}}
                                @foreach ($all_categories as $category)
                                    <option value='{{ $category->id }}' @if (old('category_id') == $category->id ) selected @endif>{{ $category->name }}</option>
                                @endforeach
                                {{-- loop through categories for DB end --}}
                            </select>
                        </div>
                        @error('category_id')
                            <p class="form_errors text-danger" style="padding-top: 10px !important;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Keywords/Tags <i class="fal fa-key"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="Maximum 15 , should be separated by commas" name="tags" value="{{ old('tags') }}"/>
                            @error('tags')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- opportunity details end-->


        <div class="dashboard-title  dt-inbox fl-wrap">
            <h3>Opportunity Description</h3>
        </div>
        <!-- opportunity description -->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-form">
                        <label>Breif Description <i class="fal fa-list"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="Brief opportunity description" name="brief_description" value="{{ old('brief_description') }}"/>
                            @error('brief_description')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="custom-form">
                        <label>Detailed Description</label>
                        <div class="general-input-item">
                            <textarea cols="40" rows="3" name='detailed_description' id="detailed_description" placeholder="Datails opportunity description"  name="" />{{ old('detailed_description') }}</textarea>
                        </div>
                        @error('detailed_description')
                            <p class="form_errors text-danger" style="padding-top: 10px !important;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <!-- opportunity description end-->

        <div class="dashboard-title  dt-inbox fl-wrap">
            <h3>Fund Raiser Details</h3>
        </div>
        <!-- opportunity fund-raiser details -->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="custom-form">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Start Date<i class="fal fa-calendar"></i>  </label>
                        <div class="general-input-item">
                            <input type="text" placeholder="Fund raiser start date (dd/mm/yyy)" name="pledging_start_date"  value="{{ old('pledging_start_date') }}"/>
                            @error('pledging_start_date')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>End Date <i class="fal fa-calendar"></i>  </label>
                        <div class="general-input-item">
                            <input type="text" placeholder="Fund raiser end date (dd/mm/yyy)" name="pledging_end_date" value="{{ old('pledging_end_date') }}"/>
                            @error('pledging_end_date')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- profile-edit-container end-->
                        <div class="dashboard-title dt-inbox fl-wrap">
                            <h3>Opportunity Seeking</h3>
                        </div>
                        <!-- profile-edit-container-->
                        <div class="profile-edit-container fl-wrap block_box">
                            <div class="custom-form">
                                <!-- Checkboxes -->
                                <ul class="fl-wrap filter-tags no-list-style ds-tg" style="margin-bottom: -10px !important;">
                                    <li style="padding-right: 25px !important;">
                                        <input id="investors" type="checkbox" name="check" checked>
                                        <label for="investors">Investors</label>
                                    </li>
                                    <li style="padding-right: 25px !important;">
                                        <input id="donors" type="checkbox" name="check" checked>
                                        <label for="donors">Donors</label>
                                    </li>
                                    <li style="padding-right: 25px !important;">
                                        <input id="lenders" type="checkbox" name="check">
                                        <label for="lenders">Lenders</label>
                                    </li>
                                    <li style="padding-right: 25px !important;">
                                        <input id="incubation" type="checkbox" name="check">
                                        <label for="incubation">Incubation</label>
                                    </li>
                                    <li style="padding-right: 25px !important;">
                                        <input id="acceleration" type="checkbox" name="check" checked>
                                        <label for="acceleration">Acceleration</label>
                                    </li>
                                    <li style="padding-right: 25px !important;">
                                        <input id="others" type="checkbox" name="check" checked>
                                        <label for="others">Others</label>
                                    </li>
                                </ul>
                                <!-- Checkboxes end -->
                            </div>
                        </div>
                        <div>Please select atleat on option</div>
                        <!-- profile-edit-container end-->
                    </div>
                </div>
            </div>
        </div>
        <!-- opportunity fund-raiser details end-->

        <div class="dashboard-title  dt-inbox fl-wrap">
            <h3>Opportunity Media</h3>
        </div>
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="custom-form">
                <div class="row">
                    <!--col -->
                    <div class="col-md-4">
                        <div class="add-list-media-header" style="margin-bottom:20px">
                            <label>
                                <span>Banner images</span>
                            </label>
                        </div>
                        <div class="add-list-media-wrap">
                            <div class="listsearch-input-item fl-wrap">
                                <div class="fuzone">
                                    <div class="fu-text">
                                        <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                        <div class="photoUpload-files fl-wrap"></div>
                                    </div>
                                    <input type="file" class="upload" name="banner_images[]" multiple value="{{ old('banner_images') }}">
                                </div>
                            </div>
                            @error('banner_images')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!--col end-->

                    <!--col :: Carousel-->
                    <div class="col-md-4">
                        <div class="add-list-media-header" style="margin-bottom:20px">
                            <label>
                                <span>Other images</span>
                            </label>
                        </div>
                        <div class="add-list-media-wrap">
                            <div class="listsearch-input-item fl-wrap">
                                <div class="fuzone">
                                    <div class="fu-text">
                                        <span><i class="fal fa-images"></i> Click here or drop files to upload</span>
                                        <div class="photoUpload-files fl-wrap"></div>
                                    </div>
                                        <input type="file" class="upload" name="opportunity_images[]" multiple>
                                </div>
                            </div>
                            @error('opportunity_images')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!--col :: Carousel end-->

                    <!--col :: Video -->
                    <div class="col-md-4">
                        <div class="add-list-media-header" style="margin-bottom:20px">
                            <label>
                                <span>Video Links</span>
                            </label>
                        </div>
                        <div class="add-list-media-wrap">
                            <label>Youtube  <i class="fab fa-youtube"></i></label>
                            <input type="text" placeholder="https://www.youtube.com/" name="youtube_link" value="{{ old('youtube_link') }}"/>
                            @error('youtube_link')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                            <label>Vimeo <i class="fab fa-vimeo-v"></i></label>
                            <input type="text" placeholder="https://vimeo.com/" name="vimeo_link" value="{{ old('vimeo_link') }}"/>
                            @error('vimeo_link')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!--col :: Video end-->
                </div>
            </div>
        </div>

        <!-- profile-edit-container end-->
        <div class="dashboard-title  dt-inbox fl-wrap">
            <h3>Social Networks</h3>
        </div>
        <!-- opportunity social networks -->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="custom-form">
                <div class="row">
                    <div class="col-md-12">
                        <label>Facebook <i class="fa fa-facebook"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="https://www.facebook.com/ -- optional" name="facebook" value="{{ old('facebook') }}"/>
                            @error('facebook')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Twitter<i class="fa fa-twitter"></i>  </label>
                        <div class="general-input-item">
                            <input type="text" placeholder="https://twitter.com/ -- optional" name="twitter" value="{{ old('twitter') }}"/>
                            @error('twitter')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Instagram <i class="fa fa-instagram"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="https://www.instagram.com/ -- optional" name="instagram" value="{{ old('instagram') }}"/>
                            @error('instagram')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                <button class="btn color2-bg float-btn general-btn" type="submit">Create Opportunity<i class="fal fa-paper-plane"></i></button>
            </div>
        </div>
        <!-- opportunity social networks end-->

    </form>
    {{-- new opportunity form end --}}

    {{-- push custom javascript into a components --}}
    @push('custom_javascript')

        <script type='text/javascript'>
            tinymce.init({
                selector: '#detailed_description',
                menubar: true,
                plugins: "link image",
                toolbar: 'undo redo | styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code'
            });
        </script>

    @endpush
    {{-- push custom javascript into a components end--}}

</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
