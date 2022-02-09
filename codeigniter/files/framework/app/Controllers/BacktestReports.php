<?php

namespace App\Controllers;

class BacktestReports extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('BacktestReports');
		echo view('footer');
	}
}
