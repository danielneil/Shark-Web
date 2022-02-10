<?php

namespace App\Controllers;

class BacktestReports extends BaseController
{
	public function index()
	{
		$data['ticker'] = $this->request->getVar('ticker');

		echo view('header');
		echo view('backtestreports', $data);
		echo view('footer');
	}
}
