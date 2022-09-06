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

//App General Routes
Route::controller(MainController::class)->name('app-general.')->group(function () {
    //actual routes
    Route::get('/', 'index')->name('home-page');
    Route::get('/home', 'index')->name('home-page');
    Route::get('/index', 'index')->name('home-page');
});