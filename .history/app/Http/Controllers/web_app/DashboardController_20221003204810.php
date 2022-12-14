<?php

namespace App\Http\Controllers\web_app;

use App\Http\Controllers\Controller;

use App\Models\app_general\Category;
use App\Models\app_general\Country;
use App\Models\app_general\User;
use App\Models\app_general\UserProfile;
use App\Models\web_app\Opportunity;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
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


    //this function is used to load the main dashboard
    public function mainDashboard(User $user)
    {
        //1. ensure that users can only update their posts
        if($user->id !== auth()->id()){

            abort(403, 'Unathourized view action');

        }

        //2. all countries, categories and user_details
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $user_details = $user;

        /**
         * 3. fetch all opportunities from the database
         *      a. sort by latest
         *      b. filter the request by incoming queries i.e. tag, interest, country, category
         *      c. fetch results from database using get function
         */
        $all_opportunities = Opportunity::with(['opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])
                                            ->orderBy('id', 'DESC')->orderBy('created_at', 'DESC')->latest()
                                            ->filterOpportunities(request(['tag', 'seeking', 'interest', 'country_id', 'category_id']))
                                            ->paginate(9);

        //return main-dashboard view
        return view('web-app.dashboard.main_dashboard', compact(['all_countries', 'all_categories', 'user_details', 'all_opportunities']));
    }


    //this function is used to load user profile page
    public function showUserProfile(User $user){

        //2. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //return the first user record
        $user_details = User::whereIn('id', $user)->with(['user_profile', 'user_opportunities'])->first();


        //process if the user has a profile
        if($user_details->user_profile !== NULL){

            $user_profile_images = UserProfile::whereIn('id', $user_details->user_profile)->with(['user_profile_banner', 'user_profile_image'])->first();

            $user_details['banner_image'] = $this->processImageCollection($user_profile_images->user_profile_banner, "banner_image");
            $user_details['profile_image'] = $this->processImageCollection($user_profile_images->user_profile_image, "profile_image");

        } else {

            $user_profile_images = []; //user profile images is empty
            $user_details['banner_image'] = $this->processImageCollection(NULL, "banner_image");
            $user_details['profile_image'] = $this->processImageCollection(NULL, "profile_image");

        }

        //process user opportunities
        $user_opportunities = Opportunity::where('user_id', $user->id)->with(['opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->latest()->paginate(4);

        //dd($user_opportunities);

        //return edit user profile view
        return view('web-app.dashboard.show_user_profile', compact(['all_countries', 'all_categories', 'user_details', 'user_opportunities', 'user_profile_images']));

    }


    //this function is used to load form for editing user profile
    public function editUserProfile(User $user)
    {
        //1. ensure that users can only update their posts
        if($user->id !== auth()->id()){
            abort(403, 'Unathourized edit action');
        }

        //2. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //return the first user record
        $user_details = User::whereIn('id', $user)->with(['user_profile'])->first();


        //process if the user has a profile
        if($user_details->user_profile !== NULL){

            $user_profile_images = UserProfile::whereIn('id', $user_details->user_profile)->with(['user_profile_banner', 'user_profile_image'])->first();

        } else {

            $user_profile_images = [];

        }

        //return edit user profile view
        return view('web-app.dashboard.edit_user_profile', compact(['all_countries', 'all_categories', 'user_details', 'user_profile_images']));
    }

    //updateUserProfile
    //this function is used to update an opportunity record into the DB
    public function updateUserProfile(Request $request, User $user)
    {
        //1. ensure that users can only update their profile
        if($user->id !== auth()->id()){
            abort(403, 'Unathourized update action');
        }

        //dd($request);//exit();

        //2. validate incoming request data
        $request_data = $this->validateData($request, 'validate_edit_profile');

        //3. map user details data and update
        $user->update([
            'first_name' => $request_data['first_name'],
            'middle_name' => $request_data['middle_name'],
            'last_name' => $request_data['last_name'],
            'username' => ucfirst(substr($request_data['first_name'],0,1)).ucfirst($request_data['last_name']),
            'email' => $request_data['email'],
            'phone' => $request_data['phone'],
        ]);

        //4. map user profile data
        $user_profile_data = [
            'second_email' => $request_data['second_email'],
            'second_phone' => $request_data['second_phone'],
            'first_address' => $request_data['first_address'],
            'second_address' => $request_data['second_address'],
            'city' => $request_data['city'],
            'country_id' => $request_data['country_id'],
            'brief_description' => $request_data['brief_description'],
            'website_url' => $request_data['website'],
            'facebook' => $request_data['facebook'],
            'twitter' => $request_data['twitter'],
            'instagram' => $request_data['instagram']
        ];

        //5. check if this user profile already exists
        $user_profile = UserProfile::where('user_id', $user->id)->first();

        if ($user_profile) {

            $user_profile->update($user_profile_data); //update existing profile record
        }
        else {

            //5.1 add user_id to user profile data
            $user_profile_data['user_id'] = $user->id;

            //5.2 create the new user profile
            $new_user_profile = UserProfile::create($user_profile_data); //create a new profile record

            //dd($new_user_profile->id); exit();

            //6. validate if request has file named profile_banner
            if ($request->hasFile('banner_image')) {

                //6.1 image settings for processing
                $image_settings = [
                    'file_name' => 'banner_image',
                    'image_directory' => 'user_banner_images',
                    'image_height' => 230,
                    'image_width' => 810,
                    'table_relationship' => 'user_profile_banner'
                ];

                //6.2 process profile images and return the file path
                $this->processProfileImages($request, $new_user_profile, $image_settings);
            }

            //7. check if request has other images
            if ($request->hasFile('profile_image')) {

                //7.1 image settings for processing
                $image_settings = [
                    'file_name' => 'profile_image',
                    'image_directory' => 'user_profile_images',
                    'image_height' => 100,
                    'image_width' => 100,
                    'table_relationship' => 'user_profile_image'
                ];

                //7.2 process user profile images and return the file path
                $this->processProfileImages($request, $new_user_profile, $image_settings);
            }

        }

        //5. redirect to edited listing with message
        return redirect('/dashboard/user_profile/' . $user->id.'-'.Str::slug($user->first_name.' '.$user->last_name))->with('message', 'User profile updated successfully');
    }


    //validate all opportunity form data
    protected function validateData($incoming_data, $process_name)
    {

        if ($process_name == 'validate_edit_profile') {

            return ($incoming_data->validate(
                [
                    'first_name' => ['required', 'string', 'min:2', 'max:15'],
                    'middle_name' => ['nullable', 'string', 'min:2', 'max:15'],
                    'last_name' => ['required', 'string', 'min:2', 'max:15'],
                    'email' => ['required', 'email'],
                    'second_email' => ['nullable', 'email'],
                    'first_address' => ['nullable', 'string', 'min:2', 'max:15'],
                    'second_address' => ['nullable', 'string', 'min:2', 'max:15'],
                    'phone' => ['required', 'string', 'min:5', 'max:20'],
                    'second_phone' => ['nullable', 'string', 'min:5', 'max:20'],
                    'country_id' => ['required'],
                    'city' => ['required', 'string', 'min:2', 'max:50'],
                    'brief_description' => ['required', 'string', 'min:50', 'max:2000'],
                    'website' => ['nullable', 'url', 'max:250'],
                    'facebook' => ['nullable', 'url', 'max:250'],
                    'twitter' => ['nullable', 'url', 'max:250'],
                    'instagram' => ['nullable', 'url', 'max:250']
                ]
            ));

        } else {

            return '';
        }
    }


    //process opportunity images create images paths and store images in DB
    protected function processProfileImages($request, $new_user_profile, array $image_settings)
    {

        //1 loop through the array and store the images
        $profile_image = $request->file($image_settings['file_name']);

        //1.1 rename the image giving it a new_image_name
        $image_name = uniqid() . '-' . str_replace(' ', '_', $request->first_name) . '.' . $profile_image->extension();

        //1.2 store the image using the move method into banner_images dir, then create an image path and assing to banner_image array key
        $profile_image->move(storage_path('app/public/' . $image_settings['image_directory']), $image_name);

        //1.3 resize the banner image using intervention package
        $resize_profile_image = Image::make(public_path('storage/' . $image_settings['image_directory'] . '/' . $image_name))->fit($image_settings['image_height'], $image_settings['image_width']);

        //1.4 save the resized image
        $resize_profile_image->save();

        //1.5 create the image path/url for public storage
        $final_image_path = $image_settings['image_directory'] . '/' . $image_name;

        //1.6 process and store other images using the images relation inside Opportunity model
        if ($image_settings['table_relationship'] == 'user_profile_banner') {

            $new_user_profile->user_profile_banner()->create([
                'profile_id' => $new_user_profile->id,
                'image_path' => $final_image_path
            ]);
        } else if ($image_settings['table_relationship'] == 'user_profile_image') {

            $new_user_profile->user_profile_image()->create([
                'profile_id' => $new_user_profile->id,
                'image_path' => $final_image_path
            ]);
        }

    }

     //process opportunity images and return images arrays
    protected function processImageCollection($images_collection, $image_type)
    {

        //use our defult images if no image in collection
        if ($images_collection == NULL) {

            //images_path
            $image_path = $image_type == 'profile_image' ? 'web_app/images/avatar/1_1.jpg' : 'web_app/images/bg/1.jpg';

        } else {

            //1. declare image path
            $image_path = 'storage/' . $images_collection->image_path;

        }

        //return image path
        return $image_path;
    }

}
