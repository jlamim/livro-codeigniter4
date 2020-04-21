<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// Carregamos a view
		return view('welcome_message');
	}

}
