<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\app_general\MainController;
use App\Http\Controllers\app_general\UsersController;
use App\Http\Controllers\web_app\OpportunitiesController;
use App\Http\Controllers\web_app\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//This is the route to slice360 sample page
Route::view('/sample-home-page', 'sample-home-page')->name('sample-home-page');


/**
 * All App-General Routes
 * - actual routes for accessing home, how-it-works, and about-us pages
 */
Route::controller(MainController::class)->name('app-general.')->group(function () {
    Route::get('/', 'home')->name('home-page')->middleware('visitors_counter');
    Route::get('/home', 'home')->name('home-page')->middleware('visitors_counter');
    Route::get('/index', 'home')->name('home-page')->middleware('visitors_counter');
    Route::get('/how-it-works', 'howItWorks')->name('how-it-works');
    Route::get('/about-us', 'aboutUs')->name('about-us');
});



/**
 * All Web-App.Opportunities Routes
 * - actual routes for accessing CRUD functionality for opportunities
 */
Route::controller(UsersController::class)->name('app-general.users.')->group(function () {
    Route::post('/login-user', 'loginUser')->name('login-user');
    Route::post('/logout-user', 'logoutUser')->name('logout-user')->middleware('auth');
    Route::post('/register-user', 'registerUser')->name('register-user');
    Route::post('/follow_user', 'followUser')->name('follow-user');
    Route::post('/unfollow_user', 'unfollowUser')->name('unfollow-user');
    Route::post('/submit_testimonial', 'submitTestimonial')->name('submit-testimonial');
    Route::post('/get_intouch_message', 'getIntouchMessage')->name('get-intouch-message');
});


/**
 * All Web-App.Opportunities Routes
 * - actual routes for accessing CRUD functionality for opportunities
 */
Route::controller(OpportunitiesController::class)->name('web-app.opportunities.')->group(function () {
    Route::get('/opportunities', 'listOpportunities')->name('list-opportunities');
    Route::get('/opportunities/create', 'createOpportunity')->name('create-opportunity')->middleware('auth');
    Route::get('/opportunities/my_opportunities', 'myOpportunities')->name('my-opportunities')->middleware('auth');
    Route::post('/opportunities', 'storeOpportunity')->name('store-opportunity')->middleware('auth');
    Route::get('/opportunities/{opportunity}', 'showOpportunity')->name('show-opportunity');
    Route::get('opportunities/{opportunity}/edit', 'editOpportunity')->name('edit-opportunity')->middleware('auth');
    Route::patch('/opportunities/{opportunity}', 'updateOpportunity')->name('update-opportunity')->middleware('auth');
    Route::delete('/opportunities/{opportunity}', 'deleteOpportunity')->name('delete-opportunity')->middleware('auth');
    Route::post('/opportunities/follow_opportunity', 'followOpportunity')->name('follow-opportunity');
    Route::post('/opportunities/unfollow_opportunity', 'unfollowOpportunity')->name('unfollow-opportunity');
    Route::post('/opportunities/review_opportunity', 'reviewOpportunity')->name('review-opportunity');
});


/**
 * All Web-App.Dashboard Routes
 * - actual routes for accessing CRUD functionality for opportunities
 */
Route::controller(DashboardController::class)->name('web-app.dashboard.')->group(function () {
    Route::get('/dashboard/index/{user}/', 'mainDashboard')->name('main-dashboard');
    Route::get('/dashboard/user_profile/{user}/', 'showUserProfile')->name('show-user-profile');
    Route::get('/dashboard/user_profile/{user}/edit', 'editUserProfile')->name('edit-user-profile')->middleware('auth');
    Route::patch('/dashboard/user_profile/{user}/', 'updateUserProfile')->name('update-user-profile')->middleware('auth');
});
