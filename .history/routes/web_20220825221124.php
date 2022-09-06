<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\app_general\MainController;
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

Route::get('/welcome', function () {
    return view('welcome')->name('sample-page');
});


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


/**
 * All Web-App.Opportunities Routes
 * - actual routes for accessing CRUD functionality for opportunities
 */
Route::controller(OpportunitiesController::class)->name('web-app.opportunities.')->group(function () {
    Route::get('/opportunities', 'listOpportunities')->name('list-opportunities');
    Route::get('/opportunities/create', 'createOpportunity')->name('create-opportunity');
    Route::post('/opportunities', 'storeOpportunity')->name('store-opportunity');
    Route::get('/opportunities/{opportunity}', 'showOpportunity')->name('show-opportunity');
    Route::get('/opportunities/{opportunity_id}/edit', 'editOpportunity')->name('edit-opportunity');
    Route::patch('/opportunities/{opportunity}', 'updateOpportunity')->name('update-opportunity');
    Route::delete('/opportunities/{opportunity}', 'deleteOpportunity')->name('delete-opportunity');
});