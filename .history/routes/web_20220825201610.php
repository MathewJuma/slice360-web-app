<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\app_general\MainController;

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

Route::controller(MainController::class)->name('app-general.')->group(function () {
    //actual routes
    Route::get('/opportunities', 'indexAllOpportunities')->name('show-all-opportunities');
    Route::get('/opportunities/create', 'createNewOpportunity')->name('create-new-opportunity');
    Route::get('/opportunities/{opportunity}', 'showSingleOpportunity')->name('show-single-opportunity');
    Route::post('/opportunities', 'storeNewOpportunity')->name('store-new-opportunity');
});