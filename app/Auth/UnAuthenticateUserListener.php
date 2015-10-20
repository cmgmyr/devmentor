<?php

namespace DevMentor\Auth;

interface UnAuthenticateUserListener
{
    /**
     * When a user has been successfully logged out.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function userHasLoggedOut();
}
