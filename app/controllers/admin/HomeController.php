<?php namespace Admin;

class HomeController extends \BaseController {

    public function index()
    {
        return View::make('admin.home');
    }

}
