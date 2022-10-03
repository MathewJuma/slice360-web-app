<?php

namespace App\Http\Controllers\web_app;



use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\app_general\User;
use App\Models\app_general\Country;
use App\Models\web_app\Opportunity;
use App\Http\Controllers\Controller;
use App\Models\app_general\Category;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;

use App\Models\web_app\OpportunityReview;
use App\Models\web_app\OpportunityFollowing;
use CyrildeWit\EloquentViewable\Support\Period;

class OpportunitiesController extends Controller
{

    //protected variables for all countries and categories
    protected $all_countries;
    protected $all_categories;

    //this is the call constructor
    public function __construct()
    {
        //create instances and fetch all countries
        $countries_table = new Country();
        $this->all_countries = $countries_table->all();

        //create instances and fetch all categories
        $categories_table = new Category();
        $this->all_categories = $categories_table->all();

    }


/**
 * ================================================================================
 * THESE METHODS ARE SPECIFIC TO GENERAL WEB USERS
 * ================================================================================
 */
    //this function is used to list all opportunities
    public function listOpportunities()
    {

        //dd(request('status'));
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        /**
         * 2. fetch all opportunities and their view count, since 2022, from the database
         *      a. sort by latest
         *      b. filter the request by incoming queries i.e. tag, interest, country, category
         *      c. fetch results from database using get function
         */
        $views_period = Period::since(Carbon::create(2022));
        $all_opportunities = Opportunity::with(['opportunity_user', 'opportunity_country', 'opportunity_category', 'opportunity_seeking', 'opportunity_banner_images', 'opportunity_other_images'])
                            ->whereRaw('funding_status != "funding closed"')
                            ->whereRaw('is_published = "Yes"')
                            ->filter(request(['tag', 'interest', 'country_id', 'category_id']))
                            ->latest()
                            ->paginate(9, '*', 'slice360-opportunities');

        dd($all_opportunities);

        //return all opportunities view
        return view('web-app.opportunities.all_opportunities', compact(['all_countries', 'all_categories', 'all_opportunities']));
    }

    //this function is used to list all my opportunities
    public function myOpportunities()
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //2. get current user id
        $user = auth()->user();

        //3fetch all user details
        $user_details = User::whereIn('id', $user)->with(['user_profile', 'user_opportunities'])->first();

        //4. fetch all current user's opportunities
        $all_opportunities = Opportunity::whereIn('user_id', $user)->with(['opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->latest()->paginate(6, '*', 'my-opportunities');

        //dd($all_opportunities);

        //5. return my opportunities view
        return view('web-app.opportunities.my_opportunities', compact(['all_countries', 'all_categories', 'all_opportunities', 'user_details']));

    }

    //this function is used to load the form for creating a new opportunity
    public function createOpportunity()
    {
        //1. ensure that users can only update their posts
        if(!Auth::check()){
            abort(403, 'Unathourized create action');
        }

        //2. session user_id
        $user_id = session()->get('system_user_id').'-'.Str::slug(session()->get('system_user_name'));

        //2. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $user_details = User::find(session()->get('system_user_id'));

        //return the form for creating a new opportunity
        return view('web-app.opportunities.create_opportunity', compact(['all_countries', 'all_categories', 'user_details']));
    }

    //this function is used process and store a new opportunity into the DB
    public function storeOpportunity(Request $request)
    {

        //dd($request->opportunity_seeking);

        //1. validate incoming data
        $opportunity_data = $this->validateData($request, 'validate_new_opportunity');

        //2. add user id to the opportunity data
        $opportunity_data['user_id'] = auth()->id();

        //3. ensure date format are database ready
        $opportunity_data['pledging_start_date'] = Carbon::createFromFormat('d/m/Y', $opportunity_data['pledging_start_date'])->format('Y-m-d');
        $opportunity_data['pledging_end_date'] = Carbon::createFromFormat('d/m/Y', $opportunity_data['pledging_end_date'])->format('Y-m-d');

        //4. remove banner_images and opportunity_images arrays from the data being saved.
        unset($opportunity_data['banner_images']);
        unset($opportunity_data['opportunity_images']);

        //5. create data into the database
        $new_opportuntiy = Opportunity::create($opportunity_data);

        //6. create opportunity seeking
        if(!empty($request->opportunity_seeking)){

            //loop through each seeking
            foreach($request->opportunity_seeking as $seeking){
                //create seeking
                $new_opportuntiy->opportunity_seeking()->create([
                    'opportunity_id' => $new_opportuntiy->id,
                    'seeking_name' => $seeking
                ]);
            }

        }

        //7. validate if request has file named banner_image
        if ($request->hasFile('banner_images')) {

            //7.1 image settings for processing
            $image_settings = [
                'file_name' => 'banner_images',
                'image_directory' => 'banner_images',
                'image_height' => 1920,
                'image_width' => 1024,
                'table_relationship' => 'opportunity_banner_images'
            ];

            //7.2 process opportunity images and return the file path
            $this->processOpportunityImages($request, $new_opportuntiy, $image_settings);
        }

        //8. check if request has other images
        if ($request->hasFile('opportunity_images')) {

            //8.1 image settings for processing
            $image_settings = [
                'file_name' => 'opportunity_images',
                'image_directory' => 'opportunity_images',
                'image_height' => 800,
                'image_width' => 530,
                'table_relationship' => 'opportunity_other_images'
            ];

            //8.2 process opportunity images and return the file path
            $this->processOpportunityImages($request, $new_opportuntiy, $image_settings);
        }

        //9. redirect to a page showing the created opportunity
        return redirect('/opportunities')->with('message', 'Oppportunity created successfully');
    }

    //this function is used to load a single opportunity
    public function showOpportunity(Request $request, Opportunity $opportunity)
    {
        //cooldown expires after 12 hours
        $viewExpiresAfter = now()->addHours(6);

        //log/record this opportunity view/visit
        views($opportunity)->cooldown($viewExpiresAfter)->record();

        //1. process all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //2. generate a cookie name based on the user type
        if(! Auth::check()){//guest user identified by ip

            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $opportunity->id);

        } else {

            $cookie_name = (Auth::user()->id.'-'. $opportunity->id);//logged in user

        }

        //3. validate that the cookie has not been set
        if(Cookie::get($cookie_name) == ''){//check if cookie is set

            //3.1 set thet cookie using queue method to last for 60mins
            $cookie = Cookie::queue($cookie_name, '1', 60);

            //3.2 count this view
            $opportunity->incrementViewCount();

            //3.3 process opportunity details after counting the current view
            $opportunity_details = $this->processOpportunityDetails($opportunity); //count how many times this opportunity has been viewed

            //3.4 return the page for displaying a single opportunity
            return view('web-app.opportunities.single_opportunity', compact(['all_countries', 'all_categories', 'opportunity_details']))->withCookie($cookie);

        } else {

            //3.1 process opportunity details without counting the current view
            $opportunity_details = $this->processOpportunityDetails($opportunity);

            //3.2 return the page for displaying a single opportunity
            return view('web-app.opportunities.single_opportunity', compact(['all_countries', 'all_categories', 'opportunity_details']));

        }

    }

    //this function is used to load edit form for a single opportunity
    public function editOpportunity(Opportunity $opportunity)
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $user_details = $opportunity->opportunity_user;

        //2. assign $opportunity to opportunity_details for easy reading
        $opportunity_details = $opportunity;

        //3. fetch data related to this opportunity
        $opportunity_details['country_name'] = $opportunity_details->opportunity_country->name;
        $opportunity_details['country_id'] = $opportunity_details->opportunity_country->id;
        $opportunity_details['country_currency'] = $opportunity_details->opportunity_country->currency;
        $opportunity_details['category_name'] = $opportunity_details->opportunity_category->name;
        $opportunity_details['category_id'] = $opportunity_details->opportunity_category->id;
        $opportunity_details['banner_images'] = $this->processImageCollection($opportunity_details->opportunity_banner_images);
        $opportunity_details['other_images'] = $this->processImageCollection($opportunity_details->opportunity_other_images);

        //return the form for editing an opportunity
        return view('web-app.opportunities.edit_opportunity', compact(['all_countries', 'all_categories', 'user_details', 'opportunity_details']));
    }

    //this function is used to update an opportunity record into the DB
    public function updateOpportunity(Request $request, Opportunity $opportunity)
    {
        //1. ensure that users can only update their posts
        if($opportunity->user_id !== auth()->id()){
            abort(403, 'Unathourized update action');
        }

        //2. validate incoming request data
        $request_data = $this->validateData($request, 'validate_edit_opportunity');

        //3. ensure date format are database ready
        $request_data['pledging_start_date'] = Carbon::createFromFormat('d/m/Y', $request['pledging_start_date'])->format('Y-m-d');
        $request_data['pledging_end_date'] = Carbon::createFromFormat('d/m/Y', $request['pledging_end_date'])->format('Y-m-d');

        //4. update the opportunity with the request data
        $opportunity->update($request_data);

        //5. redirect to edited listing with message
        return redirect('/opportunities/' . $opportunity->id.'-'.Str::slug($opportunity->title))->with(['message'=>'Opportunity updated successfully']);
    }

    //this function is used to delete an opportunity record from the DB
    public function deleteOpportunity(Request $request, Opportunity $opportunity)
    {
        //1. ensure that users can only update their posts
        if($opportunity->user_id !== auth()->id()){
            abort(403, 'Unathourized delete action');
        }

        //2. delete record from database
        $opportunity->delete();

        //3. redirect to a page showing the created opportunity
        if($request->delete_source === "single_opportunity"){

            return redirect('/opportunities')->with('message', 'Opportunity deleted successfully');

        }else{

            return back()->with('message', 'Opportunity deleted successfully');
        }

    }

    //this function is used to record followers of on opportunity
    public function followOpportunity(Request $request)
    {
        //1. check if this following already exists
        $opportunity_following = OpportunityFollowing::where('user_id', $request['user_id'])->where('opportunity_id', $request['opportunity_id'])->first();

         //2. return exists message if the user already exists
        if ($opportunity_following) {

            //2.1 set update values
            $opportunity_following->user_id = $request['user_id'];
            $opportunity_following->opportunity_id = $request['opportunity_id'];
            $opportunity_following->status = $request['status'];

            //2.2 save the user in  database
            $opportunity_following->update();

            //return response
            return response()->json(['success' => 'A you already following this opportunity.']);
        }

        //3. save following, login the user then return success message
        else {

            //3.1 create a new opportunity following
            $following = new OpportunityFollowing;
            $following->user_id = $request['user_id'];
            $following->opportunity_id = $request['opportunity_id'];
            $following->status = $request['status'];

            //3.2 save the user in  database
            $following->save();

            //return response
            return response()->json(['success' => 'Now following this opportunity.']);
        }

    }

    //this function is used to record followers of on opportunity
    public function unfollowOpportunity(Request $request)
    {
        //1. check if this following already exists
        $opportunity_following = OpportunityFollowing::where('user_id', $request['user_id'])->where('opportunity_id', $request['opportunity_id'])->first();

         //2. return exists message if the user already exists
        if ($opportunity_following) {

            //2.1 set update values
            $opportunity_following->user_id = $request['user_id'];
            $opportunity_following->opportunity_id = $request['opportunity_id'];
            $opportunity_following->status = $request['status'];

            //2.2 save the user in  database
            $opportunity_following->update();

            //return response
            return response()->json(['success' => 'Successfully unfollowed this opportunity.']);
        }

        //3. save following, login the user then return success message
        else {

            //return response
            return response()->json(['not_exists' => 'Currently not following this opportunity.']);
        }

    }

    //this function is used to record followers of on opportunity
    public function reviewOpportunity(Request $request)
    {
        //1. check if this following already exists
        $opportunity_review = OpportunityReview::where('user_id', $request['user_id'])->where('opportunity_id', $request['opportunity_id'])->first();

         //2. return exists message if the user already exists
        if ($opportunity_review) {

            //return response
            return response()->json(['exists' => 'You have already reviewed this opportunity.']);
        }

        //3. save review, login the user then return success message
        else {

            //3.1 create a new opportunity review
            $review = new OpportunityReview;
            $review->user_id = $request['user_id'];
            $review->opportunity_id = $request['opportunity_id'];
            $review->review_description = $request['review_description'];
            $review->description_score = $request['description_score'];
            $review->capital_score = $request['capital_score'];
            $review->category_score = $request['category_score'];
            $review->timeline_score = $request['timeline_score'];
            $review->total_score = $request['total_score'];

            //3.2 save the review in  database
            $review->save();

            //return response
            return response()->json(['success' => 'Successfully reviewed this opportunity.']);
        }

    }


/**
 * ================================================================================
 * THESE METHODS ARE SPECIFIC TO WEB ADMINISTRATORS
 * ================================================================================
 */

    //this function is used to list all admin opportunities
    public function adminFetchOpportunities(Request $request)
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //2. get current user id
        $user = auth()->user();

        //3. fetch all user details
        $user_details = User::whereIn('id', $user)->with(['user_profile', 'user_opportunities'])->first();

        if ($request->filled('search')) {

            $all_opportunities = Opportunity::search($request->search)->paginate(15, 'slice360-opportunities'); // search by value
            //dd($all_opportunities);

        } else {

            $all_opportunities = Opportunity::with(['opportunity_user', 'opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->paginate(15, '*', 'slice360-opportunities');

        }

        //dd($all_opportunities);

        //4. return my opportunities view
        return view('admin-app.opportunities.all_admin_opportunities', compact(['all_countries', 'all_categories', 'all_opportunities', 'user_details']));

    }




/**
 * ================================================================================
 * ADDTIONAL METHODS THAT APPLIES TO ALL OPPORTUNITIES
 * ================================================================================
 */
    //validate all opportunity form data
    protected function validateData($incoming_data, $process_name)
    {

        //validate incoming data
        if ($process_name == 'validate_new_opportunity') {

            return ($incoming_data->validate(
                [
                    'title' => ['required', 'string', 'min:5', 'max:25'],
                    'category_id' => ['required'],
                    'country_id' => ['required'],
                    'city' => ['required', 'string', 'min:2', 'max:50'],
                    'tags' => ['required', 'string', 'max:250'],
                    'brief_description' => ['required', 'string', 'min:15', 'max:250'],
                    'detailed_description' => ['required', 'string', 'min:100', 'max:5000'],
                    'pledging_start_date' => ['required', 'string', 'date_format:d/m/Y', 'after_or_equal:today'],
                    'pledging_end_date' => ['required', 'string', 'date_format:d/m/Y', 'after:funding_start_date'],
                    'youtube_link' => ['nullable', 'url', 'max:250'],
                    'vimeo_link' => ['nullable', 'url', 'max:250'],
                    'facebook' => ['nullable', 'url', 'max:250'],
                    'twitter' => ['nullable', 'url', 'max:250'],
                    'instagram' => ['nullable', 'url', 'max:250'],
                    'banner_images' => ['required'],
                    'opportunity_images' => ['required']
                ],
                [
                    'title.required' => 'Please enter your project title',
                    'title.max' => 'Project title must not be more than 30 characters'
                ]
            ));

        } else if ($process_name == 'validate_edit_opportunity') {

            return ($incoming_data->validate(
                [
                    'title' => ['required', 'string', 'min:5', 'max:25'],
                    'category_id' => ['required'],
                    'country_id' => ['required'],
                    'city' => ['required', 'string', 'min:2', 'max:50'],
                    'tags' => ['required', 'string', 'max:250'],
                    'brief_description' => ['required', 'string', 'min:15', 'max:250'],
                    'detailed_description' => ['required', 'string', 'min:100', 'max:5000'],
                    'pledging_start_date' => ['required', 'string', 'date_format:d/m/Y'],
                    'pledging_end_date' => ['required', 'string', 'date_format:d/m/Y'],
                    'youtube_link' => ['nullable', 'url', 'max:250'],
                    'vimeo_link' => ['nullable', 'url', 'max:250'],
                    'facebook' => ['nullable', 'url', 'max:250'],
                    'twitter' => ['nullable', 'url', 'max:250'],
                    'instagram' => ['nullable', 'url', 'max:250']
                ],
                [
                    'title.required' => 'Please enter your project title',
                    'title.max' => 'Project title must not be more than 30 characters'
                ]
            )
            );
        } else {

            return '';
        }
    }


    //this protectected method is used to process opportunity details
    protected function processOpportunityDetails($opportunity){

        //1. assign $opportunity to opportunity_details for easy reading
        $opportunity_details = $opportunity;

        //2. fetch data related to this opportunity
        $opportunity_details['owner_id'] = $opportunity_details->opportunity_user->id;
        $opportunity_details['owner_name'] = $opportunity_details->opportunity_user->first_name.' '.$opportunity_details->opportunity_user->last_name;
        $opportunity_details['owner_email'] = $opportunity_details->opportunity_user->email;
        $opportunity_details['owner_mobile'] = $opportunity_details->opportunity_user->phone;
        $opportunity_details['country_name'] = $opportunity_details->opportunity_country->name;
        $opportunity_details['country_id'] = $opportunity_details->opportunity_country->id;
        $opportunity_details['country_currency'] = $opportunity_details->opportunity_country->currency;
        $opportunity_details['category_name'] = $opportunity_details->opportunity_category->name;
        $opportunity_details['category_id'] = $opportunity_details->opportunity_category->id;
        $opportunity_details['opportunity_seeking'] = $this->processOpportunitySeeking($opportunity_details->opportunity_seeking);
        $opportunity_details['banner_images'] = $this->processImageCollection($opportunity_details->opportunity_banner_images);
        $opportunity_details['other_images'] = $this->processImageCollection($opportunity_details->opportunity_other_images);

        //3. return opportunity details
        return $opportunity_details;
    }


    //process opportunity images create images paths and store images in DB
    protected function processOpportunityImages($request, $new_opportuntiy, array $image_settings)
    {

        //1 loop through the array and store the images
        foreach ($request->file($image_settings['file_name']) as $opportunity_image) {

            //1.1 rename the image giving it a new_image_name
            $image_name = uniqid() . '-' . str_replace(' ', '_', $request->title) . '.' . $opportunity_image->extension();

            //1.2 store the image using the move method into banner_images dir, then create an image path and assing to banner_image array key
            $opportunity_image->move(storage_path('app/public/' . $image_settings['image_directory']), $image_name);

            //1.3 resize the banner image using intervention package
            $resize_opportunity_image = Image::make(public_path('storage/' . $image_settings['image_directory'] . '/' . $image_name))->fit($image_settings['image_height'], $image_settings['image_width']);

            //1.4 save the resized image
            $resize_opportunity_image->save();

            //1.5 create the image path/url for public storage
            $final_image_path = $image_settings['image_directory'] . '/' . $image_name;

            //1.6 process and store other images using the images relation inside Opportunity model
            if ($image_settings['table_relationship'] == 'opportunity_banner_images') {

                $new_opportuntiy->opportunity_banner_images()->create([
                    'opportunity_id' => $new_opportuntiy->id,
                    'image_path' => $final_image_path
                ]);
            } else if ($image_settings['table_relationship'] == 'opportunity_other_images') {

                $new_opportuntiy->opportunity_other_images()->create([
                    'opportunity_id' => $new_opportuntiy->id,
                    'image_path' => $final_image_path
                ]);
            }
        }
    }


    //process opportunity seeking and return imploded string
    protected function processOpportunitySeeking($opportunity_seeking)
    {

        //use our defult images if no image in collection
        if (!$opportunity_seeking->isEmpty()) {

            //1. declare image path
            $opportunity_gap = [];

            //2 loop through image collection
            foreach ($opportunity_seeking as $seeking) {

                //dd($image_details->image_path);
                $opportunity_gap[] = '<span class="finance-details">'.$seeking.'</span>';
            }

            //3. implode
            $opportunity_seek = implode('<span class="funding-separator">&nbsp;&nbsp;|&nbsp;&nbsp;</span>', $opportunity_gap);

        }

        //shuffle image path array
        shuffle($image_path_array);

        //dd($image_path_array);

        //return image path
        return $image_path_array;
    }


    //process opportunity images and return images arrays
    protected function processImageCollection($images_collection)
    {

        //use our defult images if no image in collection
        if ($images_collection->isEmpty()) {

            //images_path
            $banner_images_path = 'web_app/images/all/';
            //image array
            $image_path_array = [$banner_images_path . 'item-restaurant.jpg', $banner_images_path . 'item-gym.jpg', $banner_images_path . 'item-layers.jpg', $banner_images_path . 'agriculture.jpg', $banner_images_path . 'education.jpg', $banner_images_path . 'energy.jpg'];
        } else {

            //1. declare image path
            $image_path_array = [];

            //2. loop through image collection
            foreach ($images_collection as $image_details) {

                //dd($image_details->image_path);
                $image_path_array[] = 'storage/' . $image_details->image_path;
            }
        }

        //shuffle image path array
        shuffle($image_path_array);

        //dd($image_path_array);

        //return image path
        return $image_path_array;
    }
}
