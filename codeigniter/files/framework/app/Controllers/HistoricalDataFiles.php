<?php

namespace App\Controllers;

class HistoricalDataFiles extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('historicaldatafiles');
		echo view('footer');
	}
}
