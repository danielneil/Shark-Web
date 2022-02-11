<?php

namespace App\Controllers;

class Orders extends BaseController
{
	public function index()
	{
                echo view('header');
                echo view('orders');
                echo view('footer');
	}
}
