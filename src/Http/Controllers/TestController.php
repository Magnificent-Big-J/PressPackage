<?php

namespace rainwaves\Press\Http\Controllers;

use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function index()
    {
        return view('press::test');
    }
}