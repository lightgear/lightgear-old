<?php

class HomeController extends BaseController {

	public function index()
	{
		View::share('title', 'Homepage (i18n)');

		return View::make('home');
	}

}
