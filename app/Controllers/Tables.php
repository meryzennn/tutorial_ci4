<?php

namespace App\Controllers;

class Tables extends BaseController
{
    public function index(): string
    {
        return view('Backend/Tables/tables');
    }
}
