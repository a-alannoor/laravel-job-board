<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index()
    {
        return view('index');
    }

    function contact()
    {
        return view('contact', ['pageTitle' => 'Contact']);
    }

    function about()
    {
        return view('about');
    }
}
