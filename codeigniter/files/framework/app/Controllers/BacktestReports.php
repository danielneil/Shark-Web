<?php

namespace App\Controllers;

class BacktestReport extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('backtestreport');
		echo view('footer');
	}
}
