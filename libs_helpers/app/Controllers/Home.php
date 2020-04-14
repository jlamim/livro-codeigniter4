<?php namespace App\Controllers;

use App\Libraries\Banners;

class Home extends BaseController
{
	public function index()
	{		
		helper('arroba');
		$text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt at justo ut auctor. Nunc ac pharetra augue. Nulla aliquet velit vel bibendum tristique. Quisque id neque a elit ultricies auctor id a nisi. Fusce eget consequat urna. Ut dictum ipsum metus, nec vehicula lorem laoreet eget. Vestibulum condimentum ipsum eu mattis suscipit. Donec fringilla turpis ut euismod pellentesque.";
		echo a_to_arroba($text);
	}

	public function banner()
	{
		$libBanner = new Banners;
		$urlBanner = $libBanner->getBanner('black', '970x90');

		echo "<img src='$urlBanner'/>";
	}

}
