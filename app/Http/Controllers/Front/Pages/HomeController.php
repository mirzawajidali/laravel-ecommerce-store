<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Home Page
    public function home()
    {
        return view('frontend.pages.index');
    }
}