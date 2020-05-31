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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('register/activate/{token}','Auth\RegisterController@registerActivate');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::post('logout', 'Auth\LoginController@logout');
        Route::get('user', 'Auth\LoginController@user');
        Route::resource('user','UserController');
    });
});
Route::group([
    'middleware' => 'auth:api',
    //'prefix' => 'vacancys'
], function () {
    Route::resource('vacancy', 'VacancyController');
    Route::get('city-vacancy',"VacancyController@indexCity");
    Route::get('close-vacancy','VacancyController@close');
    Route::get('vacancy/user/{id}', 'VacancyController@getUserVacancies');
    Route::resource('tag', 'TagController');
    Route::resource('offer', 'OfferController');
    Route::resource('review','ReviewController');
//    Route::get('offer-history/{user_id}','OfferController@offerHistory');
    Route::get('review/average_rating/{user_id}', 'ReviewController@averageRating');

});

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::resource('questionnaire','QuestionnaireController');
        Route::get('questionnaire/show/{id}','QuestionnaireController@getByUserId');
        Route::get('geocode','HEREController@getGeocode');
        Route::get('discover','HEREController@getDiscover');
    });

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::resource('review','ReviewController');
});

Route::group([
    'middleware' => 'auth:api'
], function () {
//    Route::get('offer-actions/{id}/accept','OfferController@acceptOffer');
});

