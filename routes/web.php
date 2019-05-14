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

Route::get('/','contrlpanel@showtask');
Route::get('/delete/{id}',['as' =>'delete' ,'uses'=>'contrlpanel@delete']);
Route::get('/status/{id}',['as' =>'status' ,'uses'=>'contrlpanel@status']);
Route::get('/status2/{id}',['as' =>'status2' ,'uses'=>'contrlpanel@status2']);
Route::get('/reset',['as' =>'reset' ,'uses'=>'contrlpanel@reset']);
Route::post('/insert','contrlpanel@store');
Route::post('/update','contrlpanel@update');

