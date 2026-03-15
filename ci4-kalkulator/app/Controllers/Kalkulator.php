<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kalkulator extends BaseController
{
    public function index()
    {
        return view('kalkulator');
    }
}
