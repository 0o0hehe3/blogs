<?php 
	namespace App\Http\Controllers;
	
	class HomeController extends Controller
	{
		public function index()
		{
			return view("home.index");
		}

		public function about()
		{
			return view("home.about");
		}

		public function contact()
		{
			return view("home.contact");
		}
	}
?>