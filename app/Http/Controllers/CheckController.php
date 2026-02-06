<?php

namespace App\Http\Controllers;

class CheckController extends Controller
{
    public function test()
    {
        $number = "10";   // now string
        return strtoupper($number);
    }
}
