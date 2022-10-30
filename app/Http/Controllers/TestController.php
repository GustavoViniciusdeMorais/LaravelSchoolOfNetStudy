<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Location;

class TestController extends Controller
{
    
    public function index()
    {
        $location = Location::getLocation();
        return view('tests.index')->with(['location' => $location]);
    }
}
