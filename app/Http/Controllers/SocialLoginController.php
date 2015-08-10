<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\SocialLogin;

class SocialLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function facebookLogin()
    {
        // get data from request
         $code = \Input::get( 'code' );

        // get fb service
        $fb = \OAuth::consumer('Facebook');

        // check if code is valid

        // if code is provided get user data and sign in
        if ( ! is_null($code))
        {
            // This was a callback request from facebook, get the token           
            $token = $fb->requestAccessToken($code);           

            // Send a request with it
            $result = json_decode($fb->request('/me?fields=id,name,email'), true);

            //check if user exists. If so, login. else create the user.
            $socialLogin = SocialLogin::where('social_id','=',$result['id'])->where('type','=','facebook')->first();

            //If the user hasn't logged in before
            if(!$socialLogin):

                $user = new User;
                //random password
                $password = substr(md5(uniqid(mt_rand(), true)), 0, 10);
                $hashed = \Hash::make($password);

                //create a new user with the social info with a random password (can be changed by the user for direct login)
                $user->name = $result['name'];
                $user->email = $result['email'];
                $user->password = $hashed;
                $user->save();

                $social = new SocialLogin;
                $social->social_id = $result['id'];
                $social->type = 'facebook';
                $social->user_id = $user->id;
                $social->save();
                
                //login the new user into the system
                \Auth::login($user);

            else: //if the user has previously logged in using facebook, find their user id an log them in

                $user = $socialLogin->user_id;
                $u = User::find($user);

                \Auth::logout();

                \Auth::login($u);               

            endif;

            if(\Auth::check())
            {
                return redirect('/account');
            }
            else
            {
                echo 'Not logged in';
            }
        }
        // if not ask for permission first
        else
        {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return redirect((string)$url);
        }
    }

    public function googleLogin()
    {
            $code = \Input::get( 'code' );

            // get google service
            $googleService = \OAuth::consumer('Google');

            // check if code is valid

            // if code is provided get user data and sign in
            if ( ! is_null($code))
            {
                // This was a callback request from google, get the token
                $token = $googleService->requestAccessToken($code);

                // Send a request with it
                $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

                //$message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
                //echo $message. "<br/>";

                    $socialLogin = SocialLogin::where('social_id','=',$result['id'])->where('type','=','google')->first();

                    //If the user hasn't logged in before
                    if(!$socialLogin):

                        $user = new User;
                        //random password
                        $password = substr(md5(uniqid(mt_rand(), true)), 0, 10);
                        $hashed = \Hash::make($password);

                        //create a new user with the social info with a random password (can be changed by the user for direct login)
                        $user->name = $result['name'];
                        $user->email = $result['email'];
                        $user->password = $hashed;
                        
                        //if the user already exists, throw a nice error (NB. need nice error template)
                        try {
                            $user->save();
                        } catch (\Illuminate\Database\QueryException $e) {
                            return 'There has been an error. It\'s possible an account with this email already exists';
                        }


                        $social = new SocialLogin;
                        $social->social_id = $result['id'];
                        $social->type = 'google';
                        $social->user_id = $user->id;
                        $social->save();
                        
                        //login the new user into the system
                        \Auth::login($user);

                    else: //if the user has previously logged in using facebook, find their user id an log them in

                        $user = $socialLogin->user_id;
                        $u = User::find($user);
                        \Auth::logout();
                        \Auth::login($u);               

                    endif;

                    if(\Auth::check())
                    {
                        return redirect('/account');
                    }
                    else
                    {
                        echo 'Not logged in';
                    }

                //Var_dump
                //display whole array.
                dd($result);
            }
            // if not ask for permission first
            else
            {
                // get googleService authorization
                $url = $googleService->getAuthorizationUri();

                // return to google login url
                return redirect((string)$url);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
