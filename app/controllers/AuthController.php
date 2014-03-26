<?php

class AuthController extends Admin\BaseController {

    /**
     * Generate the login page.
     *
     * @return Response
     */
    public function login()
    {
        View::share('title', 'Login (i18n)');

        return View::make('login');
    }

    /**
     * Log the user in.
     *_
     * @return Response
     */
    public function doLogin()
    {
        $loginData = Request::input();
        unset($loginData['_token']);

        if (Auth::attempt($loginData))
        {
            return Redirect::intended('/');
        }

        return Redirect::route('login');
    }

    /**
     * Log the user out.
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();

        return Redirect::intended('/');
    }
}
