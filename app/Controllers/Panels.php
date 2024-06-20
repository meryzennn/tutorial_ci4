<?php

namespace App\Controllers;

class Panels extends BaseController
{
    public function index(): string
    {
        return view('Backend/Panels/panels');
    }
}
