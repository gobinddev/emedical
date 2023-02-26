<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'customer/auth'], function () {

    Route::post('register', 'API\CustomerAuthController@register'); 
    Route::post('login', 'API\CustomerAuthController@login'); 
    Route::post('socialLogin_Check', 'API\CustomerAuthController@socialLogin_Check'); 
    Route::post('socialLogin', 'API\CustomerAuthController@socialLogin'); 
    Route::post('update_password', 'API\CustomerAuthController@update_password'); 
    Route::post('forgetPassword', 'API\CustomerAuthController@forgetPassword'); 
    Route::post('updateProfile', 'API\CustomerAuthController@updateProfile');
    Route::get('socialHide', 'API\CustomerAuthController@socialHide');  
        
});

Route::group(['prefix' => 'customer'], function () {

    Route::middleware(['auth:api', 'jwt.verify'])->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/getProductCategories', 'API\ApiController@getProductCategories'); 
    Route::post('/getCategoryWiseProducts', 'API\ApiController@getCategoryWiseProducts'); 
    Route::get('/getPopularProducts', 'API\ApiController@getPopularProducts'); 
    Route::get('/getCelebrityPickBanner', 'API\ApiController@getCelebrityPickBanner'); 
    Route::get('/getCelebrityPicks', 'API\ApiController@getCelebrityPicks'); 
    Route::get('/getSliderImages', 'API\ApiController@getSliderImages'); 
    Route::get('/getCms', 'API\ApiController@getCms'); 
    Route::post('/wishlist', 'API\ApiController@wishlist'); 
    Route::post('/getWishlist', 'API\ApiController@getWishlist'); 
    Route::post('/removeWishlist', 'API\ApiController@removeWishlist'); 
    Route::post('/createAppointment', 'API\ApiController@createAppointment'); 
    Route::post('/getAppointments', 'API\ApiController@getAppointments'); 
    Route::post('/addScreenshot', 'API\ApiController@addScreenshot'); 
    Route::post('/getScreenshot', 'API\ApiController@getScreenshot'); 
    Route::get('/getSlider', 'API\ApiController@getSlider'); 

    
    Route::group(['middleware' => ['auth:api', 'jwt.verify']], function () {

    });

    //handle the not found error
    Route::fallback(function(){
      return response()->json([
          'message' => 'URL not found, If error persists, contact to your api provider'], 404);
  });

});

