<?php

namespace Database\Factories\web_app;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //genearate the words title
        $title = [];
        for ($i = 0; $i < 3; $i++) {
            $title[] = $this->genarteTitle();
        }
        $actual_title = implode(" ", $title);
        unset($title);

        //categories
        $categories = ['Agriculture', 'Energy', 'Education', 'Transport', 'Real Estate'];
        $categories_keys = array_rand($categories);
        $actual_category = $categories[$categories_keys];

        //country details
        $country_id = rand(1, 3);
        $currency = (($country_id == 1) ? "Kshs" : (($country_id == 2) ? "Ushs" : (($country_id == 3) ? "Tshs" : "USD")));

        //array setters
        $status_array = ['Active','Inactive'];
        $random_status = array_rand($status_array);
        $status = $status_array[$random_status];



        //amounts
        $amount_needed = mt_rand(1000, 100000 * pow(10, 2)) / pow(10, 2);
        $amount_raised_cal = mt_rand(0, 100000 * pow(10, 2)) / pow(10, 2);
        $amount_raised = $amount_raised_cal > $amount_needed ? $amount_needed : $amount_raised_cal;

        //investors
        $no_of_investors = $amount_needed > 10000 ? rand(10, 50) : rand(30, 300);
        $target_inv_cal = rand(0, $no_of_investors + 100);
        $target_investors = $target_inv_cal < $no_of_investors ? 0 : $target_inv_cal;

        //pledging start date
        $p_start_min = strtotime(date('Y-m-d'));
        $p_start_max = strtotime(date('Y-m-d', strtotime(' + 1 months')));
        $pledging_start_date = date('Y-m-d', rand($p_start_min, $p_start_max));

        //pledging close date
        $p_end_min = strtotime(date('Y-m-d', strtotime($pledging_start_date . ' + 3 weeks')));
        $p_end_max = strtotime(date('Y-m-d', strtotime(date("d-m-Y", $p_end_min) . ' + 3 months')));
        $pledging_end_date = date('Y-m-d', $p_end_max);

        //funding start date
        $f_start_min = strtotime(date('Y-m-d', strtotime($pledging_end_date . ' + 1 weeks')));
        $f_start_max = strtotime(date('Y-m-d', strtotime(date("d-m-Y", $f_start_min) . ' + 1 months')));
        $funding_start_date = date('Y-m-d', $f_start_max);

        //funding end date
        $f_end_min = strtotime(date('Y-m-d', strtotime($funding_start_date . ' + 3 weeks')));
        $f_end_max = strtotime(date('Y-m-d', strtotime(date("d-m-Y", $f_end_min) . ' + 2 months')));
        $funding_end_date = date('Y-m-d', $f_end_max);

        //open for pledging and open for funding
        $pledging_array = ['Yes','No'];
        $random_open_for_pledging = array_rand($pledging_array);
        $open_for_pledging = $pledging_array[$random_open_for_pledging];

        //funding status
        $funding_array = ['Yes','No'];
        $random_open_for_funding = array_rand($funding_array);
        $selected_open_for_funding = $funding_array[$random_open_for_funding];
        $open_for_funding = ($open_for_pledging == 'Yes' || $amount_raised == $amount_needed) ? "No" : $selected_open_for_funding;

        //is published status
        $published_array = ['Yes','No'];
        $random_publishing_status = array_rand($published_array);
        $is_published = $published_array[$random_publishing_status];

        //is verified
        $verified_array = ['Yes','No'];
        $random_verified_status = array_rand($verified_array);
        $is_verified = $funding_array[$random_verified_status];

        //is locked
        $locked_array = ['Yes','No'];
        $random_locked_status = array_rand($locked_array);
        $is_locked_selected = $funding_array[$random_locked_status];
        $is_locked = ($is_published == 'Yes') ? "Yes" : $is_locked_selected;

        //is fund raisng
        $is_fund_rasing = $amount_raised < $amount_needed || $amount_needed > 0 ? 'Yes' : 'No';

        //actual status
        $actual_status = ($amount_raised == 0 ? 'opening soon' : ($amount_raised == $amount_needed ? 'funding closed' : (($amount_raised / $amount_needed) > 0.75 ? 'closing soon' : 'fund raising')));

        // Convert back to desired date form
        $detailed_description = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Aliquet enim tortor at auctor urna nunc id. Faucibus in ornare quam viverra orci sagittis. Mauris sit amet massa vitae tortor condimentum lacinia quis. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Ut porttitor leo a diam sollicitudin tempor. Lacus sed viverra tellus in hac habitasse platea. Ut morbi tincidunt augue interdum velit euismod in pellentesque massa. Nunc sed augue lacus viverra vitae congue.</p>
                                <p>Condimentum mattis pellentesque id nibh tortor id aliquet lectus. Aliquet bibendum enim facilisis gravida neque convallis a cras semper. Sit amet justo donec enim diam. Orci phasellus egestas tellus rutrum tellus pellentesque eu. Pellentesque elit eget gravida cum sociis. Proin sed libero enim sed faucibus turpis in eu mi. Sed odio morbi quis commodo odio aenean sed adipiscing diam. Placerat duis ultricies lacus sed turpis tincidunt id aliquet risus. Facilisis mauris sit amet massa vitae tortor condimentum lacinia quis. Eget est lorem ipsum dolor sit. Arcu ac tortor dignissim convallis aenean et tortor. Sed viverra tellus in hac habitasse platea.</p>
                                <p>Blandit libero volutpat sed cras ornare arcu dui. Bibendum neque egestas congue quisque egestas. Amet nisl purus in mollis nunc sed id semper risus. Fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Facilisis mauris sit amet massa vitae tortor condimentum lacinia quis. Libero nunc consequat interdum varius sit. Nulla aliquet enim tortor at auctor urna nunc. Dictum fusce ut placerat orci. Maecenas sed enim ut sem viverra aliquet eget sit. Tellus pellentesque eu tincidunt tortor aliquam. Nec tincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Nam aliquam sem et tortor. Magna fringilla urna porttitor rhoncus dolor purus non enim praesent. Aliquam sem et tortor consequat id porta nibh venenatis cras. Velit egestas dui id ornare arcu odio ut sem. Eget nunc scelerisque viverra mauris in. Egestas integer eget aliquet nibh praesent tristique magna. Feugiat nisl pretium fusce id velit ut tortor pretium viverra.</p>
                                <p>Convallis posuere morbi leo urna molestie. Viverra accumsan in nisl nisi scelerisque eu ultrices. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus. Adipiscing commodo elit at imperdiet. Lacus sed turpis tincidunt id aliquet risus feugiat in. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Amet cursus sit amet dictum sit amet justo donec enim. Magna etiam tempor orci eu lobortis elementum nibh tellus. Dui ut ornare lectus sit amet est placerat in. Malesuada fames ac turpis egestas maecenas pharetra convallis posuere. Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Eget dolor morbi non arcu risus quis varius quam. Sapien eget mi proin sed libero enim sed faucibus turpis. Sit amet justo donec enim diam vulputate. Velit dignissim sodales ut eu sem. Augue ut lectus arcu bibendum at varius. Nunc pulvinar sapien et ligula. Morbi tristique senectus et netus et. In arcu cursus euismod quis. Ut lectus arcu bibendum at.</p>";

        //generate label for tags
        $tags = ['Agriculture', 'Energy', 'Education', 'Transport', 'Real Estate'];
        $tag_keys = array_rand($tags, 3);
        $actual_tag_arrays = array_merge(explode(", ", ($tags[$tag_keys[0]] . ', ' . $tags[$tag_keys[1]] . ', ' . $tags[$tag_keys[2]])), array($actual_category));
        $actual_tags = implode(", ", array_unique($actual_tag_arrays));

        return [
            'user_id' => rand(2, 5),
            'title' => $actual_title,
            'country_id' => $country_id,
            'city' => $this->faker->city(),
            'currency' => $currency,
            'category_id' => rand(1, 5),
            'brief_description' => $this->faker->realTextBetween($minNbChars = 115, $maxNbChars = 200, $indexSize = 2),
            'detailed_description' => $detailed_description,
            'tags' => $actual_tags,
            'amount_needed' => $amount_needed,
            'amount_raised' => $amount_raised,
            'target_investors' => $target_investors == 0 ? '' : $target_investors,
            'number_of_investors' => $no_of_investors,
            'open_for_pledging' => $open_for_pledging,
            'pledging_start_date' => $pledging_start_date,
            'pledging_end_date' => $pledging_end_date,
            'open_for_funding' => $open_for_funding,
            'funding_start_date' => $funding_start_date,
            'funding_end_date' => $funding_end_date,
            'funding_status' => $actual_status,
            'website_url' => $this->faker->url(),
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com',
            'instagram' => 'https://www.instagram.com',
            'click_views' => 0,
            'is_fund_raising' => $is_fund_rasing,
            'is_verified' => $is_verified,
            'is_locked' => $is_locked,
            'is_published' => $is_published,
            'status' => $status,
        ];
    }


    private function genarteTitle()
    {

        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 0; $i < rand(6, 10); $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return ucfirst($randomString);
    }
}
