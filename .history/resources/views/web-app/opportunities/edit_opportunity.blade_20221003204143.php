{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    {{-- new opportunity form --}}
    <form action="{{ route('web-app.opportunities.update-opportunity', $opportunity_details->id) }}" enctype="multipart/form-data" method="post">
        @csrf {{-- prevent cross site scripting --}}
        @method('PATCH') {{-- this will for the form to use PATCH --}}
        <div class="dashboard-title   fl-wrap">
            <h3>Edit Opportunity</h3>
        </div>
        <!-- opportunity details -->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="custom-form">
                <div class="row">
                    <div class="col-md-12">
                        <label>Opportunity Title <i class="fal fa-briefcase"></i></label>
                        <div class="general-input-item">
                            <input type="text" placeholder="Name of your business opportunity" name="title" value="{{ old('title') ?? $opportunity_details->title }}"/>
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
                                <option value="" >Select Country</option>
                                {{-- loop through countries for DB --}}
                                @foreach ($all_countries as $country)
                                    <option value="{{ $country->id }}" {{ $country->id == $opportunity_details->country_id ? "selected" : "" }} >{{ $country->name }}</option>
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
                            <input type="text" placeholder="Nearest city to opportunity" name="city" value="{{ old('city') ?? $opportunity_details->city }}"/>
                            @error('city')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Category</label>
                        <div class="listsearch-input-item">
                            <select data-placeholder="Categories" class="chosen-select no-search-select" name="category_id">
                                <option value="" >Select Categories</option>
                                {{-- loop through categories for DB --}}
                                @foreach ($all_categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $opportunity_details->category_id ? "selected" : "" }}>{{ $category->name }}</option>
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
                            <input type="text" placeholder="Maximum 15 , should be separated by commas" name="tags" value="{{ old('tags') ?? $opportunity_details->tags }}"/>
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
                            <input type="text" placeholder="Brief opportunity description" name="brief_description" value="{{ old('brief_description') ?? $opportunity_details->brief_description}}"/>
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
                            <textarea cols="40" rows="3" name='detailed_description' id="detailed_description" placeholder="Datails opportunity description"  name="" />{{ old('detailed_description') ?? $opportunity_details->detailed_description }}</textarea>

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
            <h3>Opportunity Media</h3>
        </div>
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="custom-form">
                <div class="row">
                    <!--col -->
                    <div class="col-md-6">
                        <div class="add-list-media-header" style="margin-bottom:20px">
                            <label>
                                <span>Video Links</span>
                            </label>
                        </div>
                        <div class="add-list-media-wrap">
                            <label>Youtube  <i class="fab fa-youtube"></i></label>
                            <input type="text" placeholder="https://www.youtube.com/" name="youtube_link" value="{{ old('youtube_link') ?? $opportunity_details->youtube_link}}"/>
                            @error('youtube_link')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!--col end-->

                    <!--col :: Video -->
                    <div class="col-md-6">
                        <div class="add-list-media-header" style="margin-bottom:20px">
                            <label>
                                <span>&nbsp;</span>
                            </label>
                        </div>
                        <div class="add-list-media-wrap">
                            <label>Vimeo <i class="fab fa-vimeo-v"></i></label>
                            <input type="text" placeholder="https://vimeo.com/" name="vimeo_link" value="{{ old('vimeo_link') ?? $opportunity_details->vimeo_link }}"/>
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
                            <input type="text" placeholder="https://www.facebook.com/ -- optional" name="facebook" value="{{ old('facebook') ?? $opportunity_details->facebook }}"/>
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
                            <input type="text" placeholder="https://twitter.com/ -- optional" name="twitter" value="{{ old('twitter') ?? $opportunity_details->twitter }}"/>
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
                            <input type="text" placeholder="https://www.instagram.com/ -- optional" name="instagram" value="{{ old('instagram') ?? $opportunity_details->instagram }}"/>
                            @error('instagram')
                                <p class="form_errors text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn color2-bg float-btn" type="submit">Update Opportunity<i class="fal fa-paper-plane"></i></button>
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

            //when the dom is ready
            $(document).ready(function (e) {

                //what happens when then check box is clicked
                $('.opportunity_seeking').click(function(){

                    //get the number of clicked checkboxes
                    var opportunity_seeking = $("#opportunity_seeking input[type=checkbox]:checked").length;

                    //show error if count is greater less than 1 or greater than 3
                    if(opportunity_seeking < 1 || opportunity_seeking >3){

                        $('.opportunity_seeking_error').show();
                        return false();

                    }else{

                        $('.opportunity_seeking_error').hide();
                        return true();

                    }

                });

                //what happens when the submit button is clicked
                $('#new_opportunity_submit').click(function(e){

                    //return checked checkboxes
                    var opportunity_seeking = $("#opportunity_seeking input[type=checkbox]:checked").length;

                    //Set the Valid Flag to True if at-least one and not more than 3 options are selected.
                    var isValid = opportunity_seeking > 0 && opportunity_seeking < 4;

                    //alert(opportunity_seeking); die();

                    //show error if count is greater less than 1 or greater than 3
                    if(isValid == false){

                        e.preventDefault();

                        $('.opportunity_seeking_error').show();

                    }else{

                        $('.opportunity_seeking_error').hide();

                    }


                });

            });

        </script>

    @endpush
    {{-- push custom javascript into a components end--}}

</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
