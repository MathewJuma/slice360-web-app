<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_app\AdminController;
use App\Http\Controllers\web_app\Slice360BlogController;
use App\Http\Controllers\app_general\MainController;
use App\Http\Controllers\app_general\UsersController;
use App\Http\Controllers\web_app\DashboardController;
use App\Http\Controllers\web_app\OpportunitiesController;

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
Route::controller(MainController::class)->middleware('visitors_counter')->name('app-general.')->group(function () {
    Route::get('/', 'home');
    Route::get('/index', 'home');
    Route::get('/home', 'home')->name('home-page');
    Route::get('/how-it-works', 'howItWorks')->name('how-it-works');
    Route::get('/about-us', 'aboutUs')->name('about-us');
});


/**
 * All app-general.users Routes
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
 * All app-general.admin. Routes
 * - actual routes for accessing CRUD functionality for administrators
 */
Route::controller(AdminController::class)->middleware(['auth', 'isAdmin'])->prefix('/administrator')->name('admin-app.dashboard.')->group(function () {
    Route::get('/index/{user}/', 'mainDashboard')->name('admin-main-dashboard');
});


/**
 * All Admin-App.Opportunities Routes
 * - actual routes for accessing CRUD functionality for opportunities
 */
Route::controller(OpportunitiesController::class)->prefix('/administrator')->name('admin-app.opportunities.')->group(function () {
    Route::get('/admin_fetch_opportunities', 'adminFetchOpportunities')->name('admin-fetch-opportunities')->middleware('auth');
});


/**
 * All Web-App.Opportunities Routes
 * - actual routes for accessing CRUD functionality for opportunities
 */
Route::controller(OpportunitiesController::class)->prefix('/opportunities')->name('web-app.opportunities.')->group(function () {
    Route::get('', 'listOpportunities')->name('list-opportunities');
    Route::get('/create', 'createOpportunity')->name('create-opportunity')->middleware('auth');
    Route::get('/my_opportunities', 'myOpportunities')->name('my-opportunities')->middleware('auth');
    Route::post('', 'storeOpportunity')->name('store-opportunity')->middleware('auth');
    Route::get('/{opportunity}', 'showOpportunity')->name('show-opportunity');
    Route::get('/{opportunity}/edit', 'editOpportunity')->name('edit-opportunity')->middleware('auth');
    Route::patch('/{opportunity}', 'updateOpportunity')->name('update-opportunity')->middleware('auth');
    Route::delete('/{opportunity}', 'deleteOpportunity')->name('delete-opportunity')->middleware('auth');
    Route::post('/follow_opportunity', 'followOpportunity')->name('follow-opportunity');
    Route::post('/unfollow_opportunity', 'unfollowOpportunity')->name('unfollow-opportunity');
    Route::post('/review_opportunity', 'reviewOpportunity')->name('review-opportunity');
});


/**
 * All Web-App.Dashboard Routes
 * - actual routes for accessing CRUD functionality for opportunities
 */
Route::controller(DashboardController::class)->prefix('/dashboard')->name('web-app.dashboard.')->group(function () {
    Route::get('/index/{user}/', 'mainDashboard')->name('main-dashboard')->middleware('auth');
    Route::get('/user_profile/{user}/', 'showUserProfile')->name('show-user-profile');
    Route::get('/user_profile/{user}/edit', 'editUserProfile')->name('edit-user-profile')->middleware('auth');
    Route::patch('/user_profile/{user}/', 'updateUserProfile')->name('update-user-profile')->middleware('auth');
});




/**
 * All Web-App.Dashboard Routes
 * - actual routes for accessing CRUD functionality for opportunities
 */
Route::controller(Slice360BlogController::class)->prefix('/blog')->name('web-app.blog.')->group(function () {
    Route::get('', 'listBlogs')->name('blog-listing');
    Route::get('/{post:id}', 'showBlog')->name('blog-single');
    Route::post('/review_opportunity', 'reviewOpportunity')->name('review-opportunity');
});
