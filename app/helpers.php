<?php

if ( ! function_exists('logged_in'))
{
    /**
     * Checks if the user is authenticated.
     *
     * @return bool
     */
    function logged_in() {
        return Auth::check();
    }
}
