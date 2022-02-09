<?php

namespace App\Controllers;

class ConfigLogfile extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('configlogfile');
		echo view('footer');
	}
}
