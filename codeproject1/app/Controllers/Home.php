<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
// .env page name ko env me change krna after full development and inside of page change development into Production and comment 17