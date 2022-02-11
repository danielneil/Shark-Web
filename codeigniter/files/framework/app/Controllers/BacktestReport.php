<?php

namespace App\Controllers;

class BacktestReport extends BaseController
{
	public function index()
	{
		$data['ticker'] = $this->request->getVar('ticker');

		echo view('header');
		echo view('backtestreport', $data);
		echo view('footer');
	}
}
