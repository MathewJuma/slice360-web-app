<?php

namespace App\Http\Controllers\web_app;


use Illuminate\Http\Request;

use App\Models\app_general\Country;
use App\Models\web_app\Opportunity;
use App\Http\Controllers\Controller;

use App\Models\app_general\Category;
use Intervention\Image\Facades\Image;

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


    //this function is used to list all opportunities
    public function listOpportunities()
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        /**
         * 2. fetch all opportunities from the database
         *      a. sort by latest
         *      b. filter the request by incoming queries i.e. tag, interest, country, category
         *      c. fetch results from database using get function
         */
        $opportunities = Opportunity::with(['opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->paginate(9);

        //return all opportunities view
        return view('web-app.opportunities.all_opportunities', compact(['all_countries', 'all_categories', 'opportunities']));
    }


    //this function is used to load the form for creating a new opportunity
    public function createOpportunity()
    {
        //return the form for creating a new opportunity
        return view('web-app.opportunities.create_opportunity');
    }


    //this function is used process and store a new opportunity into the DB
    public function storeOpportunity()
    {
        return 'about to store data into the database';
    }


    //this function is used to load a single opportunity
    public function showOpportunity()
    {
        //return the page for displaying a single opportunity
        return view('web-app.opportunities.single_opportunity');
    }


    //this function is used to load edit form for a single opportunity
    public function editOpportunity()
    {
        //return the form for editing an opportunity
        return view('web-app.opportunities.edit_opportunity');
    }


    //this function is used to update an opportunity record into the DB
    public function updateOpportunity()
    {
        return 'about to update data into the database';
    }


    //this function is used to delete an opportunity record from the DB
    public function deleteOpportunity()
    {
        return 'about to delete data from the database';
    }

    //validate all form data
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
                    'amount_needed' => ['required', 'string', 'min:6', 'max:15'],
                    'currency' => ['required'],
                    'target_investors' => ['nullable', 'integer', 'max:1000'],
                    'pledging_start_date' => ['required', 'string', 'date', 'date_format:d/m/Y', 'after_or_equal:today'],
                    'pledging_end_date' => ['required', 'string', 'date', 'date_format:d/m/Y', 'after:funding_start_date'],
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

            return ($incoming_data->validate([
                'company' => ['required', 'string', 'min:5', 'max:250'],
                'title' => ['required', 'string', 'min:5', 'max:250'],
                'location' => ['required', 'string', 'max:250'],
                'email' => ['required', 'string', 'email', 'max:250'],
                'website' => ['required', 'string', 'url', 'max:250'],
                'category' => ['required', 'string', 'max:250'],
                'tags' => ['required', 'string', 'max:250'],
                'description' => ['required', 'string', 'max:3000'],
            ])
            );
        } else {

            return '';
        }
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
            } else if ($image_settings['table_relationship'] == 'opportunity_images') {

                $new_opportuntiy->opportunity_images()->create([
                    'opportunity_id' => $new_opportuntiy->id,
                    'image_path' => $final_image_path
                ]);
            }
        }
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