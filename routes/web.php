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
Route::get('/formation-documents/{id}', 'BidController@formationDocument');
Route::get('/formation-documents/{id}/{type}', 'BidController@getDocument');

