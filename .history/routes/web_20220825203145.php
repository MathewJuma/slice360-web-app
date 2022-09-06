<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\app_general\MainController;
use App\Http\Controllers\web\OpportunitiesController;

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

//Route::get('/', function () { return view('welcome'); });

/**
 * All App-General Routes
 * - actual routes for accessing home, how-it-works, and about-us pages
 */
Route::controller(MainController::class)->name('app-general.')->group(function () {
    Route::get('/', 'home')->name('home-page');
    Route::get('/home', 'home')->name('home-page');
    Route::get('/index', 'home')->name('home-page');
    Route::get('/how-it-works', 'howItWorks')->name('how-it-works');
    Route::get('/about-us', 'aboutUs')->name('about-us');
});


//All Web-App.Opportunities Routes
Route::controller(OpportunitiesController::class)->name('web-app.opportunities.')->group(function () {
    //actual routes for accessing CRUD functionality for opportunities
    Route::get('/opportunities', 'listAllOpportunities')->name('list-all-opportunities');
    Route::get('/opportunities/create', 'createNewOpportunity')->name('create-new-opportunity');
    Route::get('/opportunities/{opportunity}', 'showSingleOpportunity')->name('show-single-opportunity');
    Route::post('/opportunities', 'storeNewOpportunity')->name('store-new-opportunity');
});