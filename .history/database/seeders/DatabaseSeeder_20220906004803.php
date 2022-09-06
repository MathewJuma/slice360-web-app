<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\app_general\User;
use App\Models\app_general\Country;
use App\Models\web_app\Opportunity;
use App\Models\app_general\Category;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create user
        //User::factory(2)->create();
        User::factory()->create(['full_name' => 'Mathew Juma', 'username' => 'MJuma', 'email' => 'athias85@gmail.com', 'phone'=>'+254727074108', 'password' => bcrypt('123456')]);
        //User::factory()->create(['full_name' => 'Betty Maneno', 'username' => 'BManeno', 'email' => 'bmaneno@gmail.com', 'phone'=>'+254727074109', 'password' => bcrypt('123456')]);
        User::factory()->create(['full_name' => 'Frida Mukei', 'username' => 'FMukei', 'email' => 'fmukei@gmail.com', 'phone'=>'+254727074110', 'password' => bcrypt('123456')]);
        //User::factory()->create(['full_name' => 'Kelly Makwaro', 'username' => 'KMakwaro', 'email' => 'kmakwaro@gmail.com', 'phone'=>'+254727074111', 'password' => bcrypt('123456')]);
        User::factory()->create(['full_name' => 'Lucas Otieno', 'username' => 'LOtieno', 'email' => 'lotieno@gmail.com', 'phone'=>'+254727074113', 'password' => bcrypt('123456')]);
        User::factory()->create(['full_name' => 'Nichole Amani', 'username' => 'NAmani', 'email' => 'namani@gmail.com', 'phone'=>'+254727074114', 'password' => bcrypt('123456')]);

        //create countries
        Country::factory()->create(['name' => 'Kenya', 'initial' => 'KE', 'currency' => 'Kshs', 'timezone' => '+03:00', 'status' => 1]);
        Country::factory()->create(['name' => 'Uganda', 'initial' => 'UG', 'currency' => 'Ushs', 'timezone' => '+03:00', 'status' => 1]);
        Country::factory()->create(['name' => 'Tanzania', 'initial' => 'TZ', 'currency' => 'Tshs', 'timezone' => '+03:00', 'status' => 0]);

        //create categories
        Category::factory()->create(['name' => 'Agriculture', 'description' => 'Category for all agriculture opportunities', 'status' => '1']);
        Category::factory()->create(['name' => 'Real Estate', 'description' => 'Category for all real estate opportunities', 'status' => '1']);
        Category::factory()->create(['name' => 'Transport', 'description' => 'Category for all transport opportunities', 'status' => '1']);
        Category::factory()->create(['name' => 'Education', 'description' => 'Category for all education opportunities', 'status' => '1']);
        Category::factory()->create(['name' => 'Energy', 'description' => 'Category for all energy opportunities', 'status' => '1']);

        //create opportunities
        Opportunity::factory(30)->create();
    }
}
