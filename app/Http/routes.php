<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\SocialLogin;

Route::get('/', function () {
		
	if (Auth::check())
	{
	    echo 'logged in';
	}
	else
	{
		echo 'not logged in';
	}


    return view('welcome');
});

Route::get('fb-login', 'SocialLoginController@facebookLogin');
Route::get('google-login', 'SocialLoginController@googleLogin');

Route::get('login', function()
	{
		return view('frontend/login');
	});

Route::get('logout', function()
	{
		Auth::logout();
		return redirect('/');
	});

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/account', function()
		{
			return view('account/dashboard');
		});
});


