<?php

namespace App\Controllers;

class BacktestReports extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('backtestreports');
		echo view('footer');
	}
}
