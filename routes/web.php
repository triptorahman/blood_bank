<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', 'FrontController@index')->name('home.index');

Route::group(['prefix'=>'home'],function(){

    Route::get('/', 'HomeController@index')->name('home.index-another');
    

});




Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

    Route::get('/','Admin\AdminController@index')->name('admin.index');
    
   

    Route::get('/user-management','Admin\UserManagementController@index')->name('admin-usermanagement.list');

    Route::get('/user-management/user-approve/{user_id}','Admin\UserManagementController@approve')->name('admin-usermanagement.user-approved');

    Route::get('/user-management/user-block/{user_id}','Admin\UserManagementController@block')->name('admin-usermanagement.user-block');
    
    Route::get('/post-list','Admin\AdminController@postList')->name('post.list');
    Route::get('/today-post-list','Admin\AdminController@todayPostList')->name('today-post.list');

    Route::get('/donate-list','Admin\AdminController@totalDonateList')->name('donate.list');
    Route::get('/today-donate-list','Admin\AdminController@todayDonateList')->name('today-donate.list');
 
});

Route::group(['prefix'=>'user','middleware'=>'user'],function(){

    Route::get('/','User\UserController@index')->name('user.index'); // show user dashboard
    
    Route::get('/profile/{user_id}','User\UserController@info')->middleware('inactiveuser')->name('user.profile');// show user Info
    Route::get('/Changeprofile/{user_id}','User\UserController@change_info')->middleware('inactiveuser')->name('userChange.profile');
    Route::post('/Changeprofile/{user_id}','User\UserController@update_info');
    
    Route::get('/needblood/create','User\BloodNeedController@create')->middleware('activeuser')->name('bloodneed.create'); //create Blood Request
    Route::post('/needblood/create','User\BloodNeedController@store');// Post method
    
    Route::get('/needblood/history','User\BloodNeedController@index')->middleware('activeuser')->name('bloodneed.history'); // Show all blood request create history

    Route::get('/needblood/edit/{id}','User\BloodNeedController@edit')->middleware('activeuser')->name('bloodneed.edit'); //edit Blood Request
    Route::post('/needblood/edit/{id}','User\BloodNeedController@update');// edit Post method

    Route::get('/needblood/response/{id}','User\BloodNeedController@response')->middleware('activeuser')->name('bloodneed.response'); //taking blood
    Route::post('/needblood/response/{id}','User\BloodNeedController@response_update');// taking blood Post method

    Route::get('/needblood/delete/{id}','User\BloodNeedController@destroy')->middleware('activeuser')->name('bloodneed.delete'); //delete Blood Request

    Route::get('/donateblood/available-post','User\DonateBloodController@index')->middleware('activeuser')->name('donate.available'); // Show all blood request history
    
    Route::get('/donateblood/donate/{id}','User\DonateBloodController@edit')->middleware('activeuser')->name('donate.process'); //donate
    Route::post('/donateblood/donate/{id}','User\DonateBloodController@update');// donate Post method

    Route::get('/donateblood/history','User\DonateBloodController@history')->middleware('activeuser')->name('donate.history'); // Show all blood request history

    Route::get('/donateblood/cancel/{id}','User\DonateBloodController@cancel')->middleware('activeuser')->name('donate.process.cancel'); //cancel
    
    Route::get('/donar-list','User\DonarController@index')->middleware('activeuser')->name('donar.list'); //donar's list with filter
    Route::post('/donar-list','User\DonarController@filter'); //donar's list
 
    
 
     
     
 
 });





Auth::routes(); //authentication 

Route::get('/logout', 'LogoutController@index')->name('logout');;


