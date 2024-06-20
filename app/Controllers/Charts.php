<?php

namespace App\Controllers;

class Charts extends BaseController
{
    public function index(): string
    {
        return view('Backend/Charts/charts');
    }
}
