<?php

namespace App\Controllers;

class Widgets extends BaseController
{
    public function index(): string
    {
        return view('Backend/Widgets/widgets');
    }
}
