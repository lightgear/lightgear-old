<?php namespace Admin;

use Config;

class BaseController extends \BaseController {

    public function __construct()
    {
        Config::set('theme::active', 'sarine');
    }
}
