<?php

namespace App\Controllers;

class Portfolio extends BaseController
{
	public function index()
	{
                echo view('header');
                echo view('portfolio_correlation');
                echo view('footer');
	}
}
