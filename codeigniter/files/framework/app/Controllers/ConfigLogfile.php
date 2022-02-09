<?php

namespace App\Controllers;

class ConfigLogfile extends BaseController
{
	public function index()
	{
		echo view('configlogfile');
		echo view('footer');
	}
}
