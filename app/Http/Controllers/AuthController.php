<?php

namespace DevMentor\Http\Controllers;

use DevMentor\Auth\AuthenticateUser;
use DevMentor\Auth\AuthenticateUserListener;
use DevMentor\Auth\UnAuthenticateUser;
use DevMentor\Auth\UnAuthenticateUserListener;
use Illuminate\Http\Request;

class AuthController extends Controller implements AuthenticateUserListener, UnAuthenticateUserListener
{
    /**
     * Enable guest middleware, redirect if already logged in.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * See if there is an auth code, if so then log the user in.
     *
     * @param AuthenticateUser $authenticateUser
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(AuthenticateUser $authenticateUser, Request $request)
    {
        $hasCode = $request->has('code');

        return $authenticateUser->execute($hasCode, $this);
    }

    /**
     * When a user has successfully been logged in.
     *
     * @param $user
     * @return \Illuminate\Routing\Redirector
     */
    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }

    /**
     * Log the user out.
     *
     * @param UnAuthenticateUser $unAuthenticateUser
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function logout(UnAuthenticateUser $unAuthenticateUser)
    {
        return $unAuthenticateUser->execute($this);
    }

    /**
     * When a user has been successfully logged out.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userHasLoggedOut()
    {
        return redirect('/');
    }
}
