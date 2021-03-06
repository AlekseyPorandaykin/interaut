<?php

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

Route::get('/', 'IndexController@mainPage');
Route::get('add-place', 'BidController@addPlaceBid');
Route::post('add-bid', 'BidController@addBid')->name("add-bid");
Route::get('/formation-documents/{id}', 'BidController@formationDocument')->where('id', '[0-9]+');
Route::get('/formation-documents/{id}/{type}', 'BidController@getDocument');

Route::get('departure-schedule', 'Admin\BidController@getDepartureSchedule');

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', 'Admin\IndexController@mainPage');
    Route::get('new-bid', 'Admin\BidController@newBid');
    Route::put('bids', 'Admin\BidController@create')->name('create-bid');
    Route::get('bids', 'Admin\BidController@show')->name('bids');
    Route::get('now-bids', 'Admin\BidController@showNowBids');
    Route::get('end-bids', 'Admin\BidController@showEndBids');

    Route::get('bids/edit/{id}', 'Admin\BidController@edit');
    Route::post('bids/update/{id}', 'Admin\BidController@update');

    Route::get('/import', 'Admin\ImportController@index');
    Route::post('/import/departure-schedule', 'Admin\ImportController@departureSchedule')->name('departure-schedule');
    Route::post('/import/import-city', 'Admin\ImportController@importCity')->name('import-city');
    Route::post('/import/import-tariffs', 'Admin\ImportController@tariffsReferrals')->name('import-tariffs');

    Route::post('/create-report', 'Admin\BidController@createReport')->name('create-report');

    Route::get('/clients', 'Admin\ClientController@index');
    Route::get('/clients/create', 'Admin\ClientController@create')->name('create-client');
    Route::post('/clients/save', 'Admin\ClientController@save')->name('save-new-client');
    Route::get('/clients/edit/{id}', 'Admin\ClientController@edit');
    Route::get('/clients/delete/{id}', 'Admin\ClientController@delete');
});
Route::get('/home', 'HomeController@index')->name('home');
