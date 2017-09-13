<?php

namespace App\Http\Composers;

use App\Page;

use App\Category;

use Illuminate\Contracts\View\View;

class DataComposer 
{
	public function navigation(View $view)
	{
		$view->with('pages_nav', Page::all());
	}

	public function navigationSidebar(View $view)
	{
		$view->with('pages_nav_sidebar', Category::all());
	}



}