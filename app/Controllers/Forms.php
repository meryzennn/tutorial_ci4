<?php

namespace App\Controllers;

class Forms extends BaseController
{
    public function index(): string
    {
        return view('Backend/Forms/forms');
    }
}
