<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group(['prefix' => 'v1'], function () {
	
	//articles
	Route::post('article', 'ArticleController@store')->name('store-article');
	Route::get('articles/{article_id}', 'ArticleController@show')->name('get-single-articles');
	Route::get('articles', 'ArticleController@index')->name('get-articles');

	//comments
	Route::post('comment', 'CommentController@store')->name('store-comment'); 
	 
	/*Route::group([ 'middleware' => [ 'jwt.auth'] ], function () {

		Route::get('user', 'Auth\AuthenticateController@getAuthenticatedUser')->name('get-authenticated-user');

		
		Route::get('users', 'UserController@index')->name('get-users');
		Route::post('user', 'UserController@store')->name('store-user');

		Route::get('user_roles', 'UserRoleController@index')->name('get-user-roles');
		Route::get('countries', 'CountryController@index')->name('get-countries');

 
	});
 */
});